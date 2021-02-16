# Design Patterns

## Tipos de padrões

- Padrões criacionais

    Fornecem meios de criação de um objeto e de como ele será instanciado.

- Padrões Estruturais

    Tratam da composição de objetos por heranças e interfaces para diferentes
    funcionalidades.

- Padrões Comportamentais

    Tratam das interações e comunicação entre os objetos além da divisão de
    responsabilidades.

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
