
## Arquivo Postman

Dentro da raíz do projeto em uma pasta chamada "postman", se encontra o arquivo `JSON` com todas as rotas criadas no aplicativo Postman para poderem ser testadas previamente

- Para tudo funcionar corretamente, é necessário primeiro rodar o comando `php artisan migrate` para a tabela `produtos` ser criada corretamente no banco `MySQL`

## Telas da aplicação

### Início

Está tela representa a home da aplicação, a qual é responsável pela listagem de todos os produtos cadastrados, sendo possível excluir 
algum selecionado, apresentando uma mensagem de confirmação

<img src="/public/img/inicio.png" alt="tela inicial da aplicação com a listagem de produtos"/>

### Cadastro de Produtos

Está tela representa o cadastro de produtos

<img src="/public/img/cadastrar-produtos.png" alt="tela inicial da aplicação com a listagem de produtos"/>

## Documentação da API

#### Retorna todos os itens

```http
  GET /produto/listar
```
Retorna todos os produtos cadastrados em formato JSON, como mostrado abaixo:
```json
[
    {
        "id": 3,
        "created_at": "2023-08-26T06:44:51.000000Z",
        "updated_at": "2023-08-26T06:44:51.000000Z",
        "nome": "Mouse Gamer",
        "descricao": "É um dispositivo de mão que controla o movimento de um ponteiro na tela (normalmente a imagem de uma seta)",
        "preco": "199.99",
        "quantidade": 100
    },
    {
        "id": 24,
        "created_at": "2023-08-27T19:38:42.000000Z",
        "updated_at": "2023-08-27T19:38:42.000000Z",
        "nome": "Teclado Mecânico",
        "descricao": "Um teclado mecânico tem interruptores individuais embaixo de cada tecla que são operados por mola com pequenos contatos de metal que fecham o circuito quando você pressiona.",
        "preco": "249.99",
        "quantidade": 50
    }
]
```

#### Retorna um produto detalhado

```http
  GET /produto/detalhes/{produto}
```

- Como parâmetro deve ser passado o `ID` do produto desejado

Retorna os detalhes de um produto específico em formato JSON, como mostrado abaixo abaixo:
```json
[
    {
        "id": 3,
        "created_at": "2023-08-26T06:44:51.000000Z",
        "updated_at": "2023-08-26T06:44:51.000000Z",
        "nome": "Mouse Gamer",
        "descricao": "É um dispositivo de mão que controla o movimento de um ponteiro na tela (normalmente a imagem de uma seta)",
        "preco": "199.99",
        "quantidade": 100
    }
]
```

#### Cadastra um novo produto

```http
  POST /produto/cadastrar
```
Para cadastrar um novo produto, é necessário passar no corpo da requisição os seguintes atributos:

```
{
  "nome": "Mouse",
  "descricao": "É um dispositivo de mão que controla o  movimento de um ponteiro na tela (normalmente a imagem de uma seta)",
  "preco": 199.99,
  "quantidade": 20
}
```

#### Buscar um produto específico

```http
  POST /produto/buscar/{o que deseja buscar}
```

- `{o que deseja buscar}` deve ser substituído por algum nome de produto previamente cadastrado, por exemplo, se desejarmos buscar por "mouse", podemos buscar de diversas formas diferentes, como:
- Mouse;
- mo;
- MoUs;
Essa consulta também retorna um JSON com os detalhes do produto pesquisado.

#### Atualizar um produto específico

```http
  PATCH /produto/atualizar/{produto}
```
- `{produto}` deve ser substituído pelo ID de algum produto previamente cadastrado, com os respectivos dados no body listados abaixo:

```
{
  "nome": "Mouse",
  "descricao": "É um dispositivo de mão que controla o  movimento de um ponteiro na tela (normalmente a imagem de uma seta)",
  "preco": 199.99,
  "quantidade": 20
}
```

#### Deletar um produto específico

```http
  DELETE /produto/excluir/{produto}
```
- `{produto}` deve ser substituído pelo ID de algum produto previamente cadastrado, com os respectivos dados no body listados abaixo:
