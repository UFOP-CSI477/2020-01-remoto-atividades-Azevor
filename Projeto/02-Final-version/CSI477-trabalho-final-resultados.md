# **CSI477-2020-01 - Remoto - Trabalho Final - Resultados**
## *Aluno: Gildo Tiago Azevedo*

--------------


### Resumo

  O projeto consiste no controle pessoal de finanças para registro de entrada (receitas) e saída (despesas), e visualização de balanço financeiro, dentre outras informações desejáveis, distribuídos mensalmente.
  Para a implementação será utilizado o framework laravel, recursos de desenvolvimento web (html, css, js, etc) e banco de dados mysql para armazenamento dos registros diversos.

### 1. Funcionalidades implementadas

* Cadastro e autenticação de usuário: Foi utilizado o pacote ui:auth do laravel, recebendo somente ajustes necessários
* Cadastro de categorias:
-- Adicionar categoria: Na página inicial, clicar em "Categoria" e em seguida "Adicionar Categoria";
-- Editar categoria (opção 1): Na página inicial, clicar no nome da categoria, caso o mesmo exista na lista de transações efetuadas.
-- Editar categoria (opção 2): Na página inicial, clicar em "Categoria". Na lista de categorias cadastradas, clicar no lápis em frente a categoria desejada.
-- Excluir categoria: Na página inicial, clicar em "Categoria". Na lista de categorias cadastradas, clicar no 'X' em frente a categoria desejada.
-- Adicionar nova transação: Na página inicial, clicar em "Transação".
* Registro de entrada (receitas) e saída (despesas): A página inicial do sistema apresenta a lista de transações com os respectivos valores financeiros, além do saldo movimentado no mês apresentado e o saldo geral (todas as movimentações de todos os períodos).
Para visualizar outro período basta selecionar nas opções o mês e/ou ano desejado.
* Exclusão de registro financeiro: Na página inicial, clicar no nome da transação, caso o mesmo exista na lista de transações efetuadas.
  
### 2. Funcionalidades previstas e não implementadas
* Gerar relatório financeiro por período: Esta implementação foi proposta com objetivo de possibilitar a impressão e exportação de dados para outros formatos (excel, cvs etc). Entretanto, entre o início do projeto e a data prevista para apresentação não consegui estudar os meios necessários para implementar neste projeto.

### 3. Outras funcionalidades implementadas
* Alteração do período por meio interativo: A princípio a página apenas receberia as transações e estas seriam acumuladas numa lista. Entretanto, para melhor apresentação, foi aplicado uma divisão desta apresentação por período, onde o usuário pode modificar o mês e/ou o ano que deseja visualizar as informações.
-- Na página inicial, clicar no combobox disponível e selecionar os dados desejados. Após a seleção os dados são atualizados na tela.

### 4. Principais desafios e dificuldades
Uma das dificuldades foi pensar em uma maneira de apresentar os dados do período selecionado com os dados relacionados no banco de dados de maneira interativa. Como a rota index recebe requisições via get, foi possível então, com o uso de javascript, direcionar a página para sua própria rota (index), mas passando as informações desejadas (mes/ano). Caso seja passado alguma informação inválida, o mesmo é tratado para receber a data atual.
Outra dificuldade foi fazer as consultas através do blade, invés dos convencionais comandos sql, sendo esta dúvida resolvida com o auxílio da documentação do laravel e notas de aula.

### 5. Instruções para instalação e execução
* Após baixar/clonar os arquivos e instalar o composer dentro do diretório gerenpilas
```
$ composer install
```
* Renomear o arquivo .env.example para .env
* Gerar chave
```
$ php artisan key:generate
```
* Criar banco de dados mysql vazio em seu gerenciador, com o nome gerenpilas
* Configurar o arquivo .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gerenpilas
DB_USERNAME=root
DB_PASSWORD=
* Migrar as tabelas
```
$ php artisan migrate
```
* Rodar o servidor
```
$ php artisan serve
```
* Abrir o navegador no endereço localhost:8000
