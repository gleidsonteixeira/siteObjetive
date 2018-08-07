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
                <img src='<?php echo $_SESSION['ds_caminho_img'];  ?>'>
                <h6 class="font white-text"><?php echo $_SESSION['ds_nome'];  ?><span><?php if($_SESSION['tipo_usuario_idtipo_usuario'] == 1){echo "Administrador";}else{echo "Atendente";}  ?></span></h6>
                <input type="hidden" name="idusuario" id="idusuario" value='<?php echo $_SESSION['idusuario'];  ?>'>
                <a href="admin-perfil.php"><i class="mdi-content-create"></i></a>
            </div>
            <span class="font">Área Administrativa:</span>
            <ul class="nm">
                <?php include "menu.php"; ?>
            </ul>
        </div>

        <div id="content" class="active suave">
            <i class="mdi-navigation-menu menu-btn suave click"></i>
            <h3 class="font suave"><span>Cases</span></h3>
            <div class="lista-banners">
                <ul>
                    <?php 
                    $rs = $con->query("select * from banner;");
                    while($row = $rs->fetch(PDO::FETCH_OBJ)){
                        ?>
                        <li>
                            <img src='<?php echo $row->ds_caminho_img_banner; ?>' class="responsive-img">
                            <div class="sub-infos">
                                <span class="font">Pré-titulo:</span>
                                <h6 class="truncate">
                                    <?php echo $row->ds_pre_titulo; ?>
                                </h6>
                            </div>
                            <div class="sub-infos">
                                <span class="font">Titulo:</span>
                                <h6 class="truncate">
                                    <?php echo $row->ds_titulo; ?>
                                </h6>
                            </div>
                            <div class="sub-infos">
                                <span class="font">Link do case:</span>
                                <h6 class="truncate">
                                    <?php echo $row->ds_link_video; ?>
                                </h6>
                            </div>
                            <div class="controls suave">
                                <a class="font click suave editar-banner" data-idbanner='<?php echo $row->idbanner; ?>' data-pretitulo='<?php echo $row->ds_pre_titulo; ?>' data-titulo='<?php echo $row->ds_titulo; ?>' data-img-banner='<?php echo $row->ds_caminho_img_banner; ?>' data-link='<?php echo $row->ds_link_video; ?>' ><i class="mdi-content-create"></i>Editar</a>
                                <a class="font click suave deletar-banner" data-idbanner='<?php echo $row->idbanner; ?>'><i class="mdi-action-delete"></i>Deletar</a>
                            </div>
                        </li>

                        <?php 
                    }
                    ?>
                </ul>
                <div class="novoBanner suave">
                    <i class="mdi-navigation-close click close"></i>
                    <form class="white suave" enctype="multipart/form-data" id="formulario">
                        <h6 class="fontbold">Cadastrar Case</h6>
                        <div class="input-field">
                            <input type="text" id="pretitulo" name="pretitulo">
                            <label for="pretitulo">Pré-titulo</label>
                        </div>
                        <div class="input-field">
                            <input type="text" id="titulo" name="titulo">
                            <label for="titulo">Titulo</label>
                        </div>
                        <div class="input-field">
                            <span style="font-size: 12px;padding-bottom: 5px;display: block;color: #2E3190;">Escolher Banner</span>
                            <input type="file" name="arquivo">
                        </div>
                        <div class="input-field">
                            <input type="text" id="link" name="link">
                            <label for="link">Link do vídeo</label>
                        </div>
                        <input type="hidden" id="idbanner" name="idbanner">
                        <input type="submit" class="fontbold" value="confirmar">
                    </form>
                </div>
                <button class="novoBannerBtn fontbold"><i class="mdi-content-add left"></i> add Case</button>
            </div>
            <div id="alerta" class="suave">
                <p class="font"><i class="mdi-alert-error left"></i><span>Mensagem</span></p>
            </div>
        </div>


        <script src="js/jquery.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/goodscroll.js"></script>
        <script src="js/script.js"></script>
        <script src="js/banner-ajax.js"></script>
        <script>
            bannersAdmin();
        </script>
    </body>
    </html>
    <?php
    
}else{
    header('Location: index.php');
}
?>