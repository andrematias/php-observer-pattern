# Design Patterns

## Tipos de padrões

- Padrões criacionais

    Ajudam na construção de objetos, facilita na criação de objetos que contém
    muitas composições ou parametros por exemplo.

- Padrões Estruturais

    Ajudam na composição de mutiplos objetos mantendo uma estrutura organizada.

- Padrões Comportamentais

    Diz qual será a responsabilidade do objeto dentro da estrutura do projeto.

## Padrão Observer

 Este padrão faz parte do grup de *padrões comportamentais*, então, ele vai
 definir dentro do nosso código qual a responsabilidade dos objetos que
 implementam a lógica dele.

### Problema

Na empresa temos um arquivo que se editado errado a aplicação principal pode não
funcionar corretamente.
Uma de nossa aplicação permite a edição desse arquivo através de rotinas
internas. Para controlar toda a interação da ferramenta nesse arquivo precisamos
registrar tudo, como abertura, edição e fechamento do arquivo.

### Solução procedural

A cada interação podemos verificar o tipo com a condicional *if* e gerar um log,
alarme ou disparar um e-mail.

### Solução com OOP

Utilizamos o conceito de disparar eventos a cada interação com o arquivo
respeitando contratos de objetos.
