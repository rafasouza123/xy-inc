Instalação:
Edite o arquivo config.php com os dados do MySql.
Execute em seu navegador o arquivo setup.php.



buscar.php:
interface para realizar a busca de um POI nas proximidades.
faz requisição usando ajax ao arquivo /json/js_buscar.php que retorna json.

cadastrar.php:
interface para cadastrar um novo POI.
faz requisição usando ajax ao arquivo /json/js_cadastrar.php que retorna json.

config.php:
arquivo de conexão com o banco de dados. Necessario alteração conforme dados de seu servidor.

index.php:
página inicial, traz menu de opções.

listar.php:
interface para listar todos os POIs.
faz requisição usando ajax ao arquivo /json/js_listar.php que retorna json.

setup.php:
cria a table no banco de dados. Necessário previa configuração do config.php.