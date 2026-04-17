# Checklist de pendências por módulo

Data da revisão: 2026-04-17

## 1) Site público (landing/produtos/contato)
- **Status:** Parcialmente ok.
- **Pendente:** revisão visual final em ambiente real para validar imagens de categorias e links após login.

## 2) Autenticação / Registro
- **Status:** Resolvido.
- **Corrigido:** campos de upload `Form::file` estavam com assinatura incorreta (3 argumentos), o que podia ignorar atributos HTML.

## 3) Empresas (complemento cadastral)
- **Status:** Resolvido.
- **Corrigido:** mesma correção de assinatura `Form::file` para NUIT/Alvará.

## 4) Exchange (compra/venda)
- **Status:** Resolvido nas rotas principais de formulário/links.
- **Corrigido:**
  - form de oferta para rota correta (`offer-store`)
  - parâmetros de rota para `{announcement}` passados corretamente.

## 5) Certificados
- **Status:** Resolvido.
- **Corrigido:** campo `Form::file` no pedido de certificado com assinatura correta.

## 6) Usuários / Admin menu
- **Status:** Melhorado.
- **Observação:** recomenda-se teste manual em perfis distintos (superuser/admin/empresa/empresa_estrangeira) para validar permissões visuais de menu.

## 7) Documentos
- **Status:** Melhorado.
- **Observação:** já há resolução robusta de URL (`url_resolved`), mas ainda requer teste com arquivos antigos e novos no ambiente produtivo.

## 8) Pendência técnica identificada
- **Status:** Resolvido.
- Implementado envio de email na reprovação de empresa (`CompanyController@disapprove`).
