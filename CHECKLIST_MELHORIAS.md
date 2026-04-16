# Checklist de Gestão de Melhorias de Código

## 1) Diagnóstico inicial
- [ ] Levantar módulos críticos (autenticação, cadastro de empresas, anúncios, documentos).
- [ ] Mapear arquivos com maior complexidade e acoplamento.
- [ ] Identificar queries lentas e pontos de possível gargalo.
- [ ] Revisar erros recorrentes nos logs da aplicação.

## 2) Qualidade de código
- [ ] Definir padrão de estilo (PHP CS Fixer/Laravel Pint) e aplicar no projeto.
- [ ] Revisar nomes de classes, métodos e variáveis para consistência.
- [ ] Remover código morto, comentários obsoletos e duplicações.
- [ ] Padronizar tratamento de exceções e mensagens de erro.

## 3) Arquitetura e organização
- [ ] Separar responsabilidades de controllers muito grandes.
- [ ] Centralizar regras de negócio em services/use-cases.
- [ ] Revisar uso de repositories/queries para facilitar manutenção.
- [ ] Criar/atualizar documentação de estrutura de pastas e fluxos principais.

## 4) Banco de dados e performance
- [ ] Revisar migrations antigas e consistência de tipos/índices.
- [ ] Validar índices para colunas mais consultadas.
- [ ] Avaliar N+1 queries e aplicar eager loading quando necessário.
- [ ] Revisar paginação e limites de consultas em endpoints/listagens.

## 5) Segurança
- [ ] Revisar validações de entrada (Form Requests/validators).
- [ ] Confirmar políticas de autorização (roles/permissões) em rotas sensíveis.
- [ ] Verificar proteção contra upload indevido e validação de arquivos.
- [ ] Conferir variáveis sensíveis e segredos fora do repositório.

## 6) Testes e confiabilidade
- [ ] Mapear funcionalidades críticas sem cobertura de testes.
- [ ] Criar testes de regressão para fluxos essenciais.
- [ ] Adicionar testes para regras de autorização e validação.
- [ ] Definir baseline de cobertura e evolução por sprint.

## 7) DevEx, CI/CD e operação
- [ ] Padronizar scripts de setup e execução local.
- [ ] Incluir checks automáticos (lint/test/build) no pipeline.
- [ ] Definir checklist de PR com critérios mínimos de aprovação.
- [ ] Documentar rotina de deploy e rollback.

## 8) Priorização e acompanhamento
- [ ] Classificar itens por impacto x esforço (alto/médio/baixo).
- [ ] Definir responsáveis e prazos por item.
- [ ] Quebrar melhorias grandes em entregas menores (incrementais).
- [ ] Revisar o checklist quinzenalmente e atualizar status.

---

## Modelo de status
- **Backlog**: item mapeado, ainda não iniciado.
- **Em andamento**: item com execução ativa.
- **Concluído**: item finalizado e validado.
- **Bloqueado**: depende de decisão/terceiro.
