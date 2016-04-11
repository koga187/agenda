# Agenda
Projeto para acompanhamento de projetos atraves do uso do kanban.

#INSTALAÇÃO WINDOWS + IIS + SQL SERVER

Instalação do php + IIS (Colocar o php no Path da sua maquina)

    https://technet.microsoft.com/pt-br/library/hh994592.aspx

Após a instalação, extrair o projeto em uma pasta com permissão total.

Baixar o composer (Com a opção shell menus habilitada)

    https://getcomposer.org/download/

Dentro da raiz do projeto executar o comando abaixo:

    composer install
    
Aguarde o Download das dependencias.

Enquanto instala as dependencias, você precisa instalar o driver de conexão do php 5.6 com o SQLserver (Baixar o SQLSRV32.EXE)

    https://www.microsoft.com/en-us/download/details.aspx?id=20098
    
Após o download execute o programa que irá gerar uma séries de arquivos que você extrairá dentro da pasta do C:/php/ext.
Depois da extração você terá que abrir o arquivo php.ini, dentro da raiz pasta de instalação do php e adicionar as seguintes linhas:

    extension=php_sqlsrv_56_ts.dll
    extension=php_pdo_sqlsrv_56_ts.dll
    
Reinicie o IIS para ele carregar as nova bibliotecas (Caso ele não reinicie, é por que existe algum problema com os drivers)

####Relatório

Para o funcionamento do relatório você deverá criar um usuário especifico para o sistema acessa-lo e o mesmo deverá ser adicionado junto ao link vide exemplo:

        http://usuario:senha@linkDoReport
        
No arquivo `views/timelime/timeline.html.twig` você vai alterar a tag iframe atributo src conforme exemplo abaixo
        
        `<iframe src="http://usuario:senha@linkDoReport"...`

Ao terminar o download você precisa abrir o arquivo doctrine_config e editar de acordo com as configurações do seu banco o trecho:

    $sqlServerInfo = array(
      'driver'  => 'sqlsrv',
      'host'    => '127.0.0.1',
      'port'    => '1433',
      'user'    => 'php_user',
      'password'=> 'q1p0w2o9!',
      'dbname'  => 'agendamento'
    );

você precisa apenas substiruir o host, porta, user e senha.

Após isso você irá criar o banco de dados chamado agendamento (caso queira alterar o nome do banco lembrar de alterar o dbname no passo anterior).

Após a criação do banco, entre com o cmd no diretório bin/ dentro do projeto e execute o comando:

    php doctrine orm:validate-schema
    
Caso a mensagem for positiva, ele informará que você não sincronizou as entidades do projeto.
Para sincroniza-las você irá rodar o comando:

    php doctrine orm:schema-tool:create
    
Com esse comando ele criará as tabelas no banco. Após isso você irá criar o hosts do site atravéz do IIS (Apontando para pasta web/ dentro do projeto).

    http://support.simpledns.com/kb/a82/virtual-hosting-with-iis-internet-information-services.aspx
    



# INSTALAÇÃO DEV VAGRANT (UBUNTU+MYSQL+APACHE)

Faça a Instalação do VirtualBox e Vagrant.

        https://www.virtualbox.org/
        https://www.vagrantup.com/
        
execute a linha de comando abaixo dentro da razi do projeto:

        vagrant up
        
...
