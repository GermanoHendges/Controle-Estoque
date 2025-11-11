INSTRUÇÕES RÁPIDAS
------------------
1) Coloque os arquivos em seu servidor PHP (ex: htdocs ou www).
2) Edite db.php se necessário para ajustar host/usuario/senha do MySQL.
3) A tabela usada é `controle_estoque`.`usuarios` com colunas (id, nome, email, senha).
4) Para inserir logins, edite `seed_users.php` (adicione/remova entradas no array $users),
   abra `seed_users.php` no navegador uma vez para executar as inserções, depois delete/remova este arquivo por segurança.
5) Após login, o usuário é redirecionado a `estoque.php` — substitua o conteúdo por seu sistema de estoque ou inclua seu arquivo de CRUD.
