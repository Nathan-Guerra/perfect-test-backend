 # Desafio Perfect Pay
 ## O Desafio é desenvolver um sistema de vendas onde consiste um cadastro de produtos, o próprio cadastro de vendas onde será preenchido alguns dados também referente a cliente, uma dashboard onde estará centralizado os dados de produtos, consulta de vendas e um relatório simplificado de vendas.

---
<p align="center">
 <a href="#features">Features</a> •
 <a href="#pré-requisitos">Pré Requisitos</a> •
 <a href="#implementação">Implementação</a> •
 <a href="#configuração">Configuração</a>
</p>

<h4 align="center"> 
	🛑 Desafio Perfect Pay Em Andamento 🛑
</h4>

 ### Features

- [x] Cadastro de clientes
- [x] Cadastro de vendas
- [x] Cadastro de produtos
- [x] Relatório Simples
- [x] Busca de Vendas por período de tempo e cliente
- [ ] Cadastro de imagens
- [ ] Testes Unitários

 ### Pré-requisitos

Antes de começar, você vai precisar ter instalado em sua máquina as seguintes ferramentas:
[Composer](https://getcomposer.org), [Npm](https://npmjs.com).


 ### Implementação

 - Primeiro, clone o repositório para uma pasta desejada 
 ```
 $ git clone https://github.com/Nathan-Guerra/perfect-test-backend.git
 ```
 - Entre na pasta do projeto
 ```
 $ cd perfect-test-backend
```
 - Atualize as dependências
```
 $ composer install
```

 ### Configuração

 - Configure o .env da sua aplicação com os dados correto do seu banco de dados

 - Após fazer a configuração do ambiente, migre as tabelas
```
 $ php artisan migrate
```
 - Suba um servidor de testes com 
```
 $ php artisan serve
```
 - Por padrão, ele é utilizado na porta 8000 do seu localhost. Então para acessar seu servidor de teste, utilize o [localhost:8000](http://localhost:8000)
  
 Qualquer dúvida sobre o teste, fique a vontade para entrar em contato comigo.

 Nathan Guerra de Oliveira <br/>
 e-mail: nguerra123.ng@gmail.com
