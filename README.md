# Sistema de Gerenciamento de Clínica Odontológica

## Visão Geral
O Sistema de Gerenciamento de Clínica Odontológica é uma aplicação web desenvolvida para facilitar o agendamento de consultas, o cadastro de pacientes e médicos, e a administração das atividades diárias em uma clínica odontológica. O sistema visa melhorar a eficiência operacional da clínica e proporcionar uma experiência mais conveniente para os pacientes.

## Requisitos do Sistema

### Requisitos Funcionais
- **Cadastro de Pacientes:** Cadastro de novos pacientes com informações como nome, CPF, telefone, e-mail, etc.
- **Cadastro de Médicos:** Cadastro de médicos com detalhes como nome, especialidade, telefone, e-mail, etc.
- **Marcação de Consultas:** Marcação de consultas com médicos disponíveis em datas e horários específicos.
- **Lembrete de Consulta:** Envio de lembretes automáticos de consulta por e-mail para os pacientes alguns dias antes da data da consulta.

### Requisitos Não Funcionais
- **Segurança:** Garantia da segurança dos dados do paciente e médico, protegendo contra acesso não autorizado.
- **Desempenho:** Sistema responsivo e de alta performance, mesmo durante períodos de alta carga.
- **Usabilidade:** Interface do usuário intuitiva e fácil de usar, tanto para os pacientes quanto para os funcionários da clínica.

## Arquitetura do Sistema
O sistema segue uma arquitetura em camadas, separando a interface do usuário, a lógica de negócios e o acesso a dados:

- **Interface do Usuário:** Desenvolvida usando HTML, CSS e JavaScript.
- **Lógica de Negócios:** Implementada em PHP orientado a objetos.
- **Acesso a Dados:** Realizado por meio de consultas SQL ao banco de dados MySQL.



## Modelo de Dados
O banco de dados do sistema consiste em três tabelas principais:

- **Pacientes:** Armazena informações sobre os pacientes cadastrados na clínica.
- **Médicos:** Mantém registros dos médicos que atuam na clínica.
- **Consultas:** Registra as consultas marcadas pelos pacientes, associando um paciente a um médico em uma data e horário específicos.



## Guia do Usuário

### Cadastro de Pacientes
1. Acesse a página de cadastro de pacientes.
2. Preencha o formulário com as informações do paciente.
3. Clique no botão "Cadastrar" para salvar as informações.

### Cadastro de Médicos
1. Acesse a página de cadastro de médicos.
2. Preencha o formulário com os detalhes do médico.
3. Clique no botão "Cadastrar" para salvar as informações.

### Marcação de Consultas
1. Acesse a página de agendamento de consultas.
2. Selecione o paciente e o médico desejados.
3. Escolha a data e hora da consulta.
4. Clique no botão "Agendar Consulta" para confirmar.

## Guia de Instalação
1. Clone o repositório do sistema para o seu ambiente de desenvolvimento:
   ```bash
   git clone https://github.com/yourusername/nome-do-repositorio.git
