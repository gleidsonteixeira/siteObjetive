<?php 
include_once 'conexao.php';
session_start();

if (!isset($_SESSION['login'])) {

    ?>
    <!DOCTYPE html>
    <html dir="ltr" lang="pt-BR">
    <head>

        <title>Wallet Family</title>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="expires" content="Tue, 01 Jan 2019 12:12:12 GMT">
        <meta http-equiv="cache-control" content="public" />
        <meta http-equiv="Pragma" content="public">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta name="description" content=""/>
        <meta name="keywords" content=""/>
        <meta name="author" content="Gleidson Teixeira, g.teixeira@objetiveti.com.br"/>
        <meta name="robots" content="index, follow">
        <meta name="language" content="pt-br" />

        <link rel="canonical" href="" />
        <link rel="shortlink" href="" />
        <link rel="stylesheet" href="css/font-awesome.css" type="text/css"/>
        <link rel="stylesheet" href="css/materialize.css" type="text/css"/>
        <link rel="stylesheet" href="css/admin.css" type="text/css"/>
        <link rel="icon" href="" sizes="32x32" />
        <link rel="icon" href="" sizes="192x192" />
        <link rel="apple-touch-icon-precomposed" href="" />

    </head>

    <body style="background-color: #2E3190;">

        <div id="login">
            <form id="formulario_login">
                <div class="logo">
                    <img src="img/wallet-logo2.png">
                </div>
                <div class="input-field">
                    <input type="text" name="usuario" id="usuario">
                    <label for="usuario">Usuário</label>
                </div>
                <div class="input-field">
                    <input type="password" name="senha" id="senha">
                    <label for="senha">Senha</label>
                </div>
                <button type="submit" class="fontbold">Entrar</button>
            </form>
        </div>

        <div id="particles"><canvas class="particles-js-canvas-el" width="1366" height="724" style="width: 100%; height: 100%;"></canvas></div>

        <div id="alerta" class="suave">
            <p class="font"><i class="mdi-alert-error left"></i><span>Mensagem</span></p>
        </div>
        <script src="js/jquery.js"></script>
        <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/goodscroll.js"></script>
        <script src="js/script.js"></script>
        <script src="js/login-ajax.js"></script>
        <script>
            particulas();
        </script>
    </body>
    </html>
    <?php 
}else{
    header('Location: admin.php');
}

?>