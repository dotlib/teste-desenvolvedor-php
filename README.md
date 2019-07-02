[![](http://www.dotlib.com.br/site/images/footer/bra.png)](http://www.dotlib.com)

## Instruções

- Execute os comandos **composer install && composer dump-autoload** para instalar as dependências e prepará-las para uso.
- Renomeie o arquivo **.env.example** para **.env** e configure sua conexão com o banco de dados MySQL.
- Execute o comando **php artisan key:generate** para finalizar a configuração do projeto.
- Por fim, execute o comando **php artisan migrate --seed** para popular o banco de dados.

<br />
### Credênciais

- Login: **dotlib@dotlib.com**
- Senha: **dotlib**

<br />
## Atualização I
- Execute o comando **php artisan migrate** para aplicar as alterações no banco.
- Execute o comando **php artisan db:seed --class=UpdateDotlibUser** para atualizar o usuário administrador.
