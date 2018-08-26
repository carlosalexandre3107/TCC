# SACH (Sistema de controle de jornada de trabalho) - TCC

[![image.png](https://uploaddeimagens.com.br/images/001/579/052/original/SACH_-_TELA_DE_LANÇAMENTO.png?1535292762)](https://uploaddeimagens.com.br/images/001/579/052/original/SACH_-_TELA_DE_LANÇAMENTO.png?1535292762)

Devenvolvi este projetos no ano de 2014 para ajudar o setor de RH da faculdade a controlar a jornada de trabalhos dos colaboradores.

## Iniciando

Se quiser ver uma [Demo](https://easyjourney.herokuapp.com) do projeto. 
Acesso: 
Matricula: 1
Senha: 123456

### Instalação

Para rodar o projetos localmente, basta instalar o [XAMPP](https://www.apachefriends.org)

### Criar banco de dados e seed inicial
```
CREATE DATABASE [nomedobanco];
```
Assim que o banco de dados estiver criado. Deve ser executado o script SQL [Seed.SQL](https://github.com/carlosalexandre3107/TCC/blob/master/DAO/Seed.sql)

### Configurando banco de dados

Alterar as configurações do banco no arquivo no arquivo [Repositorio.class.php](https://github.com/carlosalexandre3107/TCC/blob/master/DAO/Repositorio.class.php)

```
$servidor	  = "localhost";
$usuario	  = "root";
$senha		  = "";
$nomeBanco  = "nomedobanco";
```

## Desenvolvido com

* [PHP7](https://secure.php.net) - PHP 7(Sem framework)
* [PHPJasperXML](https://github.com/BBFMedia/PHPJasperXML) - Para gerenciar os relatórios
* [MySQL](https://www.mysql.com) - Banco de dados
* [HTML, JS e CSS] - Sem uso de framework ou biblioteca. (exigência da faculdade)

## Autor

* **Carlos Alexandre** - [Github](https://github.com/carlosalexandre3107)

## Licença

Não tem licença alguma. Use à vontade, espero que ajuda. Há, pode até chamar de seu.
