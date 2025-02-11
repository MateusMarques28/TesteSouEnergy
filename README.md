# Módulo TermsAcceptance Magento 2

## Visão Geral

O **TermsAcceptance** é um módulo desenvolvido para Magento 2 que adiciona um sistema de aceitação de termos de privacidade pelos clientes. A funcionalidade garante que os clientes sejam notificados sobre mudanças nos termos e que sua aceitação seja devidamente registrada e exibida no painel administrativo.

### Funcionalidades Principais:

- Exibição de um modal após o login do cliente, solicitando a aceitação dos termos.
- Armazenamento do aceite em uma tabela própria no banco de dados.
- Adição de uma coluna na grid de clientes no admin, indicando quem aceitou os termos.
- Opção para ativar ou desativar a exibição do modal pelo admin.

---

## Instalação

### Requisitos:

- Magento 2.4+
- PHP 7.4+
- Docker
- Acesso ao terminal e permissões para rodar comandos do Magento

### Passo a Passo:

1. Navegue até a pasta `app/code` do seu Magento:
   ```sh
   cd /var/www/html/app/code
   ```
2. Copie ou clone o módulo dentro de `app/code/Company/TermsAcceptance`.
3. Execute os seguintes comandos no terminal:
   ```sh
   bin/start
   bin/magento module:enable Company_TermsAcceptance
   bin/magento setup:upgrade
   bin/magento setup:di:compile
   bin/magento cache:clean
   bin/magento cache:flush
   bin/magento indexer:reindex
   ```
4. Acesse o admin do Magento em https://magento.test/admin e verifique as novas funcionalidades na grid de clientes e nas configurações do sistema.
5. Use essas credenciais para acessar o admin:

**Username: john.smith**

**Password: password123**

---

## Configuração

Para ativar ou desativar a exibição do modal:

1. Acesse **Stores** > **Configuration** > **Policy** > **Configuração do Modal** > **Configurações Gerais** > **Ativar Modal de Termos?** .
2. Habilite ou desabilite a opção **Exibir Modal de Aceite**.
3. Salve as configurações.

---

## Testes e Validação

### Testar o Modal:

1. Acesse o site https://magento.test como cliente.
2. Se o modal estiver ativado, ele deve aparecer após o login na página de My Account.
3. O botão de aceitação deve registrar a data do aceite na tabela `company_terms_acceptance`.

### Testar a Grid de Clientes:

1. No admin, acesse **Customers** > **All Customers**.
2. Verifique a nova coluna "Termos Aceitos".

---

## Estrutura do Código

### Arquitetura Adotada

O módulo segue a arquitetura padrão do Magento 2, utilizando:

- **Plugin (Interceptor)**: Para modificar a query da grid de clientes e incluir a nova coluna.
- **Observer**: Para capturar o evento de login e exibir o modal.
- **UI Component**: Para adicionar e configurar a nova coluna no admin.
- **Helper**: Para gerenciar a lógica de exibição do modal com base nas configurações do admin.

### Principais Arquivos:

- `Controller/AcceptTerms.php`: Controlador que salva a aceitação do cliente.
- `Plugin/CustomerGridPlugin.php`: Adiciona a coluna na grid de clientes.
- `view/adminhtml/ui_component/customer_listing.xml`: Configura a exibição da coluna.
- `Helper/Data.php`: Gerencia as configurações do módulo.
- `etc/adminhtml/system.xml`: Define a opção para ativar/desativar o modal no admin.
