# Mapeamento de Melhorias — Módulos de Usuários e Empresas

## Objetivo
Mapear os principais pontos de melhoria nos módulos de **Usuários** e **Empresas**, com foco em manutenção, segurança, consistência de regras de negócio e performance.

## Escopo analisado
- `app/Http/Controllers/UserController.php`
- `app/Services/UserService.php`
- `app/Http/Requests/UserStoreRequest.php`
- `app/Http/Requests/UserUpdateRequest.php`
- `app/Models/User.php`
- `app/Http/Controllers/CompanyController.php`
- `app/Services/CompanyService.php`
- `app/Http/Requests/CreateCompanyRequest.php`
- `app/Http/Requests/UpdateCompanyRequest.php`
- `app/Models/Company.php`

---

## Resumo executivo

### Ganhos rápidos (Quick Wins)
1. Corrigir regras de validação inválidas em `UserStoreRequest`/`UserUpdateRequest`.
2. Ajustar lógica de `department_id` no `UserService` (condição redundante).
3. Padronizar mensagens de sucesso/erro e corrigir inconsistências de texto.
4. Trocar arrays legados `array(...)` por sintaxe curta `[...]` e padronizar padrões PSR/Laravel.

### Melhorias estruturais
1. Criar enum/constantes para status/tipos de empresa (eliminar números mágicos `1..6`).
2. Extrair fluxo de aprovação/reprovação de empresa para Action/Service transacional.
3. Fortalecer autorização (Policies/Gates) em ações sensíveis de usuário/empresa.
4. Revisar fluxo de atualização de senha com validação dedicada (`confirmed`, `min`, `current_password`).

---

## Backlog priorizado (impacto x esforço)

| ID | Módulo | Problema | Evidência | Impacto | Esforço | Prioridade |
|---|---|---|---|---|---|---|
| U01 | Usuários | Regra de validação com sintaxe incorreta (`required:max`) | `UserStoreRequest` e `UserUpdateRequest` | Alto | Baixo | **P1** |
| U02 | Usuários | Regra de departamento redundante/inconsistente | `UserService::addNewUser` e `editUser` | Médio | Baixo | **P1** |
| U03 | Usuários | Falta de validação robusta de senha | `UserService::updatePassword` e controllers | Alto | Médio | **P1** |
| U04 | Usuários | Falta de autorização explícita em operações administrativas | `UserController` (`store`, `update`, `destroy`) | Alto | Médio | **P1** |
| U05 | Usuários | Mensagens e fluxos de retorno inconsistentes | `UserController` + `UserService` | Médio | Baixo | **P2** |
| E01 | Empresas | Regras de validação vazias para criar/atualizar empresa | `Company::$rules` + Requests | Alto | Médio | **P1** |
| E02 | Empresas | Uso de números mágicos para status/tipo de empresa | `CompanyController`, `Company` | Médio | Médio | **P1** |
| E03 | Empresas | Aprovação/reprovação sem transação e sem trilha de auditoria | `CompanyController::approve/disapprove` | Alto | Médio | **P1** |
| E04 | Empresas | Falta de notificação no fluxo de reprovação (TODO pendente) | `CompanyController::disapprove` | Médio | Baixo | **P2** |
| E05 | Empresas | Operações de registro de empresa sem transação para múltiplas tabelas | `CompanyService::registerCompany` | Alto | Médio | **P1** |
| E06 | Empresas | Métodos de modelo com nomes potencialmente conflitantes e sem fallback | `Company::status`, `Company::business_volume`, `typeName` | Médio | Baixo | **P2** |
| X01 | Transversal | Duplicação de lógica e responsabilidades em controllers | `UserController` e `CompanyController` | Médio | Médio | **P2** |

---

## Detalhamento técnico por módulo

### 1) Módulo de Usuários

#### U01 — Corrigir validações inválidas
- **Situação atual:** regras como `required:max:255|min:3|string` estão com separador incorreto (`:` em vez de `|` após `required`).
- **Risco:** validação pode não se comportar como esperado, permitindo dados inconsistentes.
- **Melhoria proposta:**
  - Ajustar para `required|string|min:3|max:255`.
  - Em update, validar email/role com regras explícitas e consistentes.

#### U02 — Ajustar regra de `department_id`
- **Situação atual:** blocos condicionais redundantes no `UserService`:
  - `if role_id != 8 => null`
  - `else if role_id != 7 => null`
- **Risco:** lógica confusa; manutenção difícil; comportamento implícito.
- **Melhoria proposta:**
  - Definir claramente quais papéis exigem `department_id`.
  - Ex.: `if (!in_array($roleId, [7,8], true)) { $data['department_id'] = null; }`.

#### U03 — Endurecer fluxo de senha
- **Situação atual:** comparação manual de `password` e `repassword` sem FormRequest específico.
- **Risco:** baixa robustez de validação e ausência de requisitos mínimos de senha.
- **Melhoria proposta:**
  - Criar `UpdateUserPasswordRequest` com regras:
    - `password => required|string|min:8|confirmed`
    - opcional: `current_password`
  - Padronizar retorno em caso de erro com mensagens consistentes.

#### U04 — Reforçar autorização
- **Situação atual:** `authorize()` sempre `true` nos requests e ausência explícita de policy em ações críticas.
- **Risco:** possibilidade de acesso indevido por perfis não autorizados.
- **Melhoria proposta:**
  - Implementar `UserPolicy`/`CompanyPolicy`.
  - Aplicar `$this->authorize(...)` no início das ações sensíveis.

#### U05 — Padronização de retorno/mensagens
- **Situação atual:** parte do feedback está no controller e parte no service; textos divergentes.
- **Risco:** UX inconsistente e difícil rastreabilidade de fluxo.
- **Melhoria proposta:**
  - Centralizar convenção de flash messages.
  - Revisar textos e ortografia (ex.: “coencidem”, “exclida”).

---

### 2) Módulo de Empresas

#### E01 — Definir regras reais de validação para empresa
- **Situação atual:** `CreateCompanyRequest` e `UpdateCompanyRequest` retornam `Company::$rules`, porém `Company::$rules` está vazio.
- **Risco:** entradas críticas sem validação.
- **Melhoria proposta:**
  - Definir regras mínimas (nome, NUIT, tipo, status, contatos, documentos).
  - Diferenciar regras de create/update quando necessário.

#### E02 — Remover números mágicos
- **Situação atual:** status `1,2,4,6` e tipo `1,2` espalhados no código.
- **Risco:** alta chance de erro em manutenção e baixa legibilidade.
- **Melhoria proposta:**
  - Criar constantes/enum (`CompanyStatus`, `CompanyType`).
  - Atualizar controller, service e model para usar identificadores semânticos.

#### E03 — Transacionalidade e auditoria em aprovação/reprovação
- **Situação atual:** atualização direta de status sem transação, sem log de auditoria estruturado.
- **Risco:** inconsistências em caso de falha e pouca rastreabilidade.
- **Melhoria proposta:**
  - Envolver fluxo em `DB::transaction`.
  - Persistir histórico de status (quem aprovou/reprovou, quando, motivo).

#### E04 — Notificações pendentes
- **Situação atual:** comentário TODO no fluxo de reprovação para envio de e-mail.
- **Risco:** empresa não recebe feedback tempestivo.
- **Melhoria proposta:**
  - Implementar notificação assíncrona (queue/job) para mudança de status.

#### E05 — Registro de empresa sem transação
- **Situação atual:** `registerCompany` faz update da empresa e creates em CAEs/telefones/emails sem transação.
- **Risco:** dados parcialmente gravados se ocorrer erro em uma etapa.
- **Melhoria proposta:**
  - Encapsular todo fluxo em `DB::transaction`.
  - Validar arrays (`caes`, `phones`, `emails`) com regras de formato e duplicidade.

#### E06 — Melhorias no Model `Company`
- **Situação atual:** métodos `status()` e `business_volume()` dependem de valores inteiros sem retorno default; `tipoEmpresa()` vazio.
- **Risco:** retorno `null` silencioso e regras de apresentação acopladas ao model.
- **Melhoria proposta:**
  - Implementar fallback explícito (`Desconhecido`).
  - Migrar rótulos para enum/Presenter/Resource.
  - Remover método vazio `tipoEmpresa()` ou implementar corretamente.

---

## Plano de execução sugerido (2 sprints)

### Sprint 1 — Segurança e confiabilidade (P1)
1. Corrigir validações de usuários (`U01`) e empresas (`E01`).
2. Corrigir regra de departamento (`U02`).
3. Reforçar validação de senha (`U03`).
4. Adicionar transações em `registerCompany` e fluxos de aprovação/reprovação (`E03`, `E05`).

### Sprint 2 — Sustentabilidade técnica e UX (P2)
1. Introduzir enums/constantes de status e tipo (`E02`).
2. Implementar policies para ações críticas (`U04`).
3. Padronizar mensagens e retornos (`U05`).
4. Implementar notificação de reprovação (`E04`) e limpar model (`E06`).

---

## Critérios de aceite mínimos
- Nenhum endpoint de criação/edição de usuário/empresa sem validação explícita.
- Fluxos de aprovação/reprovação/registro com transação e testes de rollback.
- Ações sensíveis protegidas por policy/gate.
- Sem números mágicos no domínio de status/tipo de empresa.
- Mensagens de erro/sucesso padronizadas nos módulos.

## Métricas de sucesso
- Redução de bugs de cadastro/atualização reportados em produção.
- Redução de inconsistência de dados (registros órfãos/parciais).
- Tempo menor de manutenção em regras de usuário/empresa.
- Aumento de cobertura de testes para fluxos críticos.
