# Guia de Actualização — PME Export App

## Versões alvo
| Componente | Versão anterior | Versão actual |
|---|---|---|
| PHP | ^8.2 | ^8.2 (mínimo 8.2.0) |
| Laravel Framework | ^10/11 | **^12.0** |
| Laravel Passport | ^10/11 | **^12.0** |
| Spatie Permission | ^5 | **^6.10** |
| Doctrine DBAL | ^3.6 | **^3.9** |
| PHPUnit | ^10 | **^11.0** |
| Laravel Pint | — | **^1.21** (novo) |
| Pest PHP | — | **^3.8** (novo) |
| Laravel IDE Helper | — | **^3.5** (dev, novo) |

---

## Incompatibilidades corrigidas

### 1. Ficheiros obsoletos eliminados
Os seguintes ficheiros foram removidos porque o Laravel 12 eliminou o conceito de HTTP/Console Kernel e de Handler dedicado:

| Ficheiro removido | Substituição |
|---|---|
| `app/Http/Kernel.php` | `bootstrap/app.php` → `->withMiddleware()` |
| `app/Console/Kernel.php` | `routes/console.php` com `Schedule::` |
| `app/Exceptions/Handler.php` | `bootstrap/app.php` → `->withExceptions()` |

### 2. `AppServiceProvider` — Passport 12
`Passport::tokensExpireIn()` e `Passport::refreshTokensExpireIn()` foram **removidos** no Passport 12.
Configuração migrada para `config/passport.php` (ficheiro criado).

```php
// ANTES (incompatível)
Passport::tokensExpireIn(Carbon::now()->addDays(15));
Passport::refreshTokensExpireIn(Carbon::now()->addDays(30));

// DEPOIS — config/passport.php
'tokens_expire_in'         => now()->addDays(15),
'refresh_tokens_expire_in' => now()->addDays(30),
```

### 3. `AuthServiceProvider` — `registerPolicies()` removido
O método `registerPolicies()` foi eliminado no Laravel 12. As políticas são agora auto-descobertas a partir de `app/Policies/`.

### 4. `RouteServiceProvider` — classe base removida
`Illuminate\Foundation\Support\Providers\RouteServiceProvider` foi removida.
O provider foi reescrito a estender `ServiceProvider` directamente. O registo de rotas permanece em `bootstrap/app.php`.

### 5. `EventServiceProvider` — referência a classe inexistente
A referência a `PMEexport\Events\Event` (que não existia) foi removida do array `$listen`.

### 6. `config/app.php` — providers do framework duplicados
A lista manual de `Illuminate\Auth\AuthServiceProvider`, `BusServiceProvider`, etc. foi removida. O Laravel 12 carrega-os via `ServiceProvider::defaultProviders()`. Os providers da aplicação foram movidos para `bootstrap/providers.php`.

### 7. `bootstrap/providers.php` — criado (canónico no Laravel 12)
Ficheiro introduzido no Laravel 11/12 como forma canónica de registar providers da aplicação.

### 8. `config/auth.php` — tabela renomeada
```php
// ANTES
'table' => 'password_resets',
// DEPOIS
'table' => 'password_reset_tokens',
```

### 9. Migration de passwords — actualizada
A migration `create_password_resets_table` foi actualizada para criar `password_reset_tokens` (padrão desde Laravel 10). Para bases de dados existentes executar:
```sql
RENAME TABLE password_resets TO password_reset_tokens;
```

### 10. Middleware — assinaturas actualizadas (PHP 8.2)
Todos os middleware foram actualizados com tipos modernos:
- `Language`
- `RedirectIfAuthenticated`
- `RedirectIfEmpresa`
- `TrustProxies`

### 11. Modelo `User` — `casts()` como método (Laravel 12)
O array `protected $casts` foi convertido para o método `protected function casts(): array`.
Adicionado o cast `'password' => 'hashed'` (Laravel 10+).

### 12. Rotas — namespace routing removido
`Route::group(['namespace' => '...'])` foi removido no Laravel 9+. Os grupos no `web.php` foram actualizados para remover a chave `namespace`. O namespace dos controllers é resolvido via `bootstrap/app.php`.

### 13. `routes/api.php` — middleware `cors` removido por grupo
O middleware `cors` já não precisa de ser listado por grupo de rotas. É aplicado globalmente pelo `HandleCors` no stack de middleware global.

### 14. `routes/console.php` — actualizado para Laravel 12
Adicionado `use Illuminate\Support\Facades\Schedule` para permitir agendamento de tarefas directamente no ficheiro.

### 15. Testes — modernizados para Pest 3 + PHPUnit 11
- `tests/TestCase.php`: removida trait `CreatesApplication` (obsoleta no L12)
- `tests/CreatesApplication.php`: removida chamada a `Kernel::class` (eliminado no L12)
- `tests/Pest.php`: criado (ponto de entrada do Pest)
- Testes de exemplo convertidos para sintaxe Pest
- `phpunit.xml`: actualizado para formato PHPUnit 11 (removidos atributos deprecados, adicionado `<source>`)

### 16. `composer.json` — dependências actualizadas
- `doctrine/dbal`: `^3.6` → `^3.9`
- `laravel/tinker`: `^2.8` → `^2.10`
- `spatie/laravel-permission`: `^6.0` → `^6.10`
- Adicionados (dev): `laravel/pint`, `pestphp/pest`, `pestphp/pest-plugin-laravel`, `barryvdh/laravel-ide-helper`
- Adicionados scripts: `pint`, `test`, `test:coverage`
- Corrigido `autoload` para incluir `Database\\Factories\\`

### 17. `pint.json` — criado
Configuração de estilo de código com preset Laravel.

### 18. `.env.example` — saneado
- Removidas credenciais reais (AWS keys, passwords de email)
- Adicionadas variáveis do Passport (`PASSPORT_PRIVATE_KEY`, etc.)
- Adicionada `APP_TIMEZONE=Africa/Maputo`
- Adicionada `VITE_APP_NAME`

### 19. Timezone corrigido
`America/Sao_Paulo` → `Africa/Maputo` (Moçambique, UTC+2).

### 20. Ficheiro `.pem` removido do repositório
`PMEEXPORT.pem` foi removido. Chaves privadas nunca devem ser commitadas. Adicionado `*.pem` ao `.gitignore`.

---

## Procedimento de instalação / actualização

```bash
# 1. Instalar dependências
composer install

# 2. Copiar ficheiro de ambiente
cp .env.example .env
php artisan key:generate

# 3. Configurar .env (DB, mail, AWS, etc.)

# 4. Instalar Passport (gera chaves RSA e clientes OAuth)
php artisan passport:install

# 5. Executar migrations
php artisan migrate

# 6. Executar seeders (se aplicável)
php artisan db:seed

# 7. Limpar caches
php artisan optimize:clear

# 8. Executar testes
composer test

# 9. Verificar estilo de código
composer pint
```

---

## Notas adicionais

### `laravelcollective/html`
Este pacote está marcado como **abandonado** (`"abandoned": "spatie/laravel-html"`). Mantido via repositório local (`packages/laravelcollective/html`) por compatibilidade com as views existentes. Recomenda-se migração gradual para `spatie/laravel-html` ou para as directivas Blade nativas do Laravel.

### `prettus/l5-repository`
A versão `^3.0` é compatível com Laravel 12. O método `findWithoutFail()` foi removido nas versões recentes — se surgir erro, substituir por `find()` com tratamento de excepção ou `firstWhere()`.

### Bases de dados existentes
Se a base de dados já tiver a tabela `password_resets`, executar:
```sql
RENAME TABLE password_resets TO password_reset_tokens;
```
Ou usar a migration incluída que cria ambas as tabelas para compatibilidade retroactiva.
