<?php 
include_once 'conexao.php';
session_start();
if (isset($_SESSION['login'])) {

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

    <body>

        <div id="sidenav" class="active suave">
            <div class="logo">
                <img src="img/wallet-logo.png" alt="wallet-logo" >
            </div>
            <div class="perfil">
                <img src=<?php echo $_SESSION['ds_caminho_img'];  ?>>
                <h6 class="font white-text"><div class="nome"><?php echo $_SESSION['ds_nome'];  ?></div><span class="cargo"><?php if($_SESSION['tipo_usuario_idtipo_usuario'] == 1){echo "Administrador";}else{echo "Atendente";}  ?></span></h6>
                <input type="hidden" name="idusuario" id="idusuario" value=<?php echo $_SESSION['idusuario'];  ?>>
                <a href="admin-perfil.php"><i class="mdi-content-create"></i></a>
            </div>
            <span class="font">Área Administrativa:</span>
            <ul class="nm">
                <?php include "menu.php"; ?>
            </ul>
        </div>

        <div id="content" class="active suave">
            <i class="mdi-navigation-menu menu-btn suave click"></i>
            <h3 class="font suave"><span>Chat</span></h3>
            <div class="chat">
                
                <div class="topo-chat">
                    <span class="left">Estados do chat:</span>
                </div>
                <select id="estado" class="browser-default">
                    <option value="aguardando">Aguardando atendente</option>
                    <option value="emAtendimento">Chat em atendimento</option>
                    <option value="encerrado">Chat encerrado</option>
                </select>
                <div class="loading">
                    <div class="preloader-wrapper small active">
                        <div class="spinner-layer">
                            <div class="circle-clipper left">
                                <div class="circle"></div>
                            </div>
                            <div class="gap-patch">
                                <div class="circle"></div>
                            </div>
                            <div class="circle-clipper right">
                                <div class="circle"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="clientes nm"></ul>
                <ul class="conversa nm"></ul>
                <form id="responderAtendente">
                    <input type="text" id="respostaAtendente" name="resposta" placeholder="Responda o cliente">
                    <button><i class="mdi-content-send"></i></button>
                </form>
            </div>
            <div id="alerta" class="suave">
                <p class="font"><i class="mdi-alert-error left"></i><span>Cliente Encerrado</span></p>
            </div>
        </div>

        <script src="js/jquery.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/goodscroll.js"></script>
        <script src="https://www.gstatic.com/firebasejs/4.9.0/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/4.9.0/firebase-auth.js"></script>
        <script src="https://www.gstatic.com/firebasejs/4.9.0/firebase-storage.js"></script>
        <script src="https://www.gstatic.com/firebasejs/4.9.0/firebase-database.js"></script>
        <script src="js/firebase.js"></script>
        <script src="js/script.js"></script>
        <script src="js/jcarousellite.js"></script>
        <script>
            listaChatUsuarios();
            escolherConversa();
            responderConversa();
            $(".sair").click(function(){
                deslogar();
            });
            carregarAtendente();
        </script>
    </body>
    </html>

    <?php 
}else{
    header('Location: index.php');
}
?>