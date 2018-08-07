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
                <h6 class="font white-text"><?php echo $_SESSION['ds_nome'];  ?><span><?php if($_SESSION['tipo_usuario_idtipo_usuario'] == 1){echo "Administrador";}else{echo "Atendente";}  ?></span></h6>
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
            <h3 class="font suave"><span>Informações</span></h3>
            <div class="pagina suave">
                <?php 
                $rs = $con->query("select * from pagina_principal;");
                while($row = $rs->fetch(PDO::FETCH_OBJ)){
                    ?>
                    <h6 class="fontbold">Página principal <i class="mdi-content-create right click suave editar-pag-principal" data-idpag='<?php echo utf8_encode($row->idpagina_principal); ?>' data-titulo='<?php echo utf8_encode($row->ds_titulo); ?>'  data-palavra='<?php echo utf8_encode($row->ds_palavras_chaves); ?>' data-desc='<?php echo utf8_encode($row->ds_descricao); ?>'></i></h6>

                    <p><b>Titulo:</b><?php echo utf8_encode($row->ds_titulo); ?></p>
                    <p><b>Descrição:</b><?php echo utf8_encode($row->ds_descricao); ?></p>
                    <p><b>Palavras chave:</b><?php echo utf8_encode($row->ds_palavras_chaves); ?> </p>

                    <div class="overflow suave">
                        <i class="mdi-navigation-close close click"></i>
                        <form class="white suave" id="formulario-pag-principal">
                            <h6 class="fontbold">Editar principal</h6>
                            <div class="input-field">
                                <input type="text" id="tituloDaPagina" name="tituloDaPagina">
                                <label for="tituloDaPagina">Titulo da Página</label>
                            </div>
                            <div class="input-field">
                                <input type="text" id="descricaoDaPagina" name="descricaoDaPagina">
                                <label for="descricaoDaPagina">Descrição da Página</label>
                            </div>
                            <div class="input-field">
                                <textarea id="palavrasChave" name="palavrasChave" class="materialize-textarea"></textarea>
                                <label for="palavrasChave">Palavras Chave</label>
                            </div>
                            <input type="hidden" name="idpag" id="idpag">
                            <input type="submit" class="fontbold" value="confirmar">
                        </form>
                    </div>
                    <?php 
                }
                ?>
            </div>
            <div class="pagina suave">

                <?php 
                $rs = $con->query("select * from pagina_tipo_conta;");
                while($row = $rs->fetch(PDO::FETCH_OBJ)){
                    ?>

                    <h6 class="fontbold">Página tipo de conta <i class="mdi-content-create right click suave editar-pag-tipo-conta" data-idtipc='<?php echo utf8_encode($row->idpagina_tipo_conta); ?>' data-titulo='<?php echo utf8_encode($row->ds_titulo); ?>'  data-palavra='<?php echo utf8_encode($row->ds_palavras_chaves); ?>' data-desc='<?php echo utf8_encode($row->ds_descricao); ?>'></i></h6>

                    <p><b>Titulo:</b><?php echo utf8_encode($row->ds_titulo); ?></p>
                    <p><b>Descrição:</b><?php echo utf8_encode($row->ds_descricao); ?></p>
                    <p><b>Palavras chave:</b><?php echo utf8_encode($row->ds_palavras_chaves); ?> </p>

                    <div class="overflow suave">
                        <i class="mdi-navigation-close close click"></i>
                        <form class="white suave" id="formulario-tipo-conta">
                            <h6 class="fontbold">Editar tipo de conta</h6>
                            <div class="input-field">
                                <input type="text" id="tituloDaPaginaTC" name="tituloDaPaginaTC">
                                <label for="tituloDaPaginaTC">Titulo da Página</label>
                            </div>
                            <div class="input-field">
                                <input type="text" id="descricaoDaPaginaTC" name="descricaoDaPaginaTC">
                                <label for="descricaoDaPaginaTC">Descrição da Página</label>
                            </div>
                            <div class="input-field">
                                <textarea id="palavrasChaveTC" name="palavrasChaveTC" class="materialize-textarea"></textarea>
                                <label for="palavrasChaveTC">Palavras Chave</label>
                            </div>
                            <input type="hidden" name="idtipc" id="idtipc">
                            <input type="submit" class="fontbold" value="confirmar">
                        </form>
                    </div>
                    <?php 
                }
                ?>
            </div>
            <div class="pagina suave">
                <?php 
                $rs = $con->query("select * from pagina_faq;");
                while($row = $rs->fetch(PDO::FETCH_OBJ)){
                    ?>
                    <h6 class="fontbold">Página faq <i class="mdi-content-create right click suave editar-pag-faq" data-idfaq='<?php echo utf8_encode($row->idpagina_faq); ?>' data-titulo='<?php echo utf8_encode($row->ds_titulo); ?>'  data-palavra='<?php echo utf8_encode($row->ds_palavras_chaves); ?>' data-desc='<?php echo utf8_encode($row->ds_descricao); ?>'></i></h6>

                    <p><b>Titulo:</b><?php echo utf8_encode($row->ds_titulo); ?></p>
                    <p><b>Descrição:</b><?php echo utf8_encode($row->ds_descricao); ?></p>
                    <p><b>Palavras chave:</b><?php echo utf8_encode($row->ds_palavras_chaves); ?></p>

                    <div class="overflow suave">
                        <i class="mdi-navigation-close close click"></i>
                        <form class="white suave" id="formulario-pag-faq">
                            <h6 class="fontbold">Editar FAQ</h6>
                            <div class="input-field">
                                <input type="text" id="tituloDaPaginaF" name="tituloDaPaginaF">
                                <label for="tituloDaPaginaF">Titulo da Página</label>
                            </div>
                            <div class="input-field">
                                <input type="text" id="descricaoDaPaginaF" name="descricaoDaPaginaF">
                                <label for="descricaoDaPaginaF">Descrição da Página</label>
                            </div>
                            <div class="input-field">
                                <textarea id="palavrasChaveF" name="palavrasChaveF" class="materialize-textarea"></textarea>
                                <label for="palavrasChaveF">Palavras Chave</label>
                            </div>
                            <input type="hidden" name="idfaq" id="idfaq">
                            <input type="submit" class="fontbold" value="confirmar">
                        </form>
                    </div>
                    <?php 
                }
                ?>
            </div>
            <div class="pagina suave">
                <?php 
                $rs = $con->query("select * from pagina_blog;");
                while($row = $rs->fetch(PDO::FETCH_OBJ)){
                    ?>
                    <h6 class="fontbold">Página Blog <i class="mdi-content-create right click suave editar-pag-blog" data-idblog='<?php echo utf8_encode($row->idpagina_blog); ?>' data-titulo='<?php echo utf8_encode($row->ds_titulo); ?>'  data-palavra='<?php echo utf8_encode($row->ds_palavras_chaves); ?>' data-desc='<?php echo utf8_encode($row->ds_descricao); ?>'></i></h6>

                    <p><b>Titulo:</b><?php echo utf8_encode($row->ds_titulo); ?></p>
                    <p><b>Descrição:</b><?php echo utf8_encode($row->ds_descricao); ?></p>
                    <p><b>Palavras chave:</b><?php echo utf8_encode($row->ds_palavras_chaves); ?></p>

                    <div class="overflow suave">
                        <i class="mdi-navigation-close close click"></i>
                        <form class="white suave" id="formulario-pag-blog">
                            <h6 class="fontbold">Editar Blog</h6>
                            <div class="input-field">
                                <input type="text" id="tituloDaPaginaB" name="tituloDaPaginaB">
                                <label for="tituloDaPaginaF">Titulo da Página</label>
                            </div>
                            <div class="input-field">
                                <input type="text" id="descricaoDaPaginaB" name="descricaoDaPaginaB">
                                <label for="descricaoDaPaginaB">Descrição da Página</label>
                            </div>
                            <div class="input-field">
                                <textarea id="palavrasChaveB" name="palavrasChaveB" class="materialize-textarea"></textarea>
                                <label for="palavrasChaveB">Palavras Chave</label>
                            </div>
                            <input type="hidden" name="idblog" id="idblog">
                            <input type="submit" class="fontbold" value="confirmar">
                        </form>
                    </div>
                    <?php 
                }
                ?>
            </div>
            <div class="pagina">
                <?php 
                $rs = $con->query("select * from contatos;");
                while($row = $rs->fetch(PDO::FETCH_OBJ)){
                    ?>
                    <h6 class="fontbold">Contatos <i class="mdi-content-create right click suave editar-contatos" data-idcontatos='<?php echo utf8_encode($row->idcontatos); ?>' data-tel='<?php echo $row->ds_telefone; ?>'  data-whats='<?php echo $row->ds_whatsapp; ?>' data-email='<?php echo $row->ds_email; ?>'></i></h6>

                    <p style="margin-bottom: 0;"><b>Telefone:</b><?php echo $row->ds_telefone; ?></p>
                    <p class="nm"><b>Whatsapp:</b><?php echo $row->ds_whatsapp; ?></p>
                    <p style="height: auto; margin-top: 0;"><b>Email:</b><?php echo $row->ds_email; ?></p>

                    <div class="overflow suave">
                        <i class="mdi-navigation-close close click"></i>
                        <form class="white suave" id="formulario-contatos">
                            <h6 class="fontbold">Editar contatos</h6>
                            <div class="input-field">
                                <input type="text" id="telefone" name="telefone">
                                <label for="telefone">Telefone</label>
                            </div>
                            <div class="input-field">
                                <input type="text" id="whatsapp" name="whatsapp">
                                <label for="whatsapp">Whatsapp</label>
                            </div>
                            <div class="input-field">
                                <input type="text" id="email" name="email">
                                <label for="email">Email</label>
                            </div>
                            <input type="hidden" name="idcontatos" id="idcontatos">
                            <input type="submit" class="fontbold" value="confirmar">
                        </form>
                    </div>
                    <?php 
                }
                ?>
            </div>
            <div class="pagina">
                <?php 
                $rs = $con->query("select * from redes_sociais;");
                while($row = $rs->fetch(PDO::FETCH_OBJ)){
                    ?>
                    <h6 class="fontbold">Redes Sociais <i class="mdi-content-create right click suave editar-rede-social" data-idrede='<?php echo utf8_encode($row->idredes_sociais); ?>' data-face='<?php echo $row->ds_facebook; ?>'  data-insta='<?php echo $row->ds_instagram; ?>' data-yout='<?php echo $row->ds_youtube; ?>'></i></h6>
                    
                    <p style="margin-bottom: 0;"><b>Facebook:</b><?php echo $row->ds_facebook; ?></p>
                    <p class="nm"><b>Instagram:</b><?php echo $row->ds_instagram; ?></p>
                    <p style="height: auto; margin-top: 0;"><b>Youtube:</b><?php echo $row->ds_youtube; ?></p>

                    <div class="overflow suave">
                        <i class="mdi-navigation-close close click"></i>
                        <form class="white suave" id="formulario-rede-social">
                            <h6 class="fontbold">Editar redes sociais</h6>
                            <div class="input-field">
                                <input type="text" id="facebook" name="facebook">
                                <label for="facebook">Facebook</label>
                            </div>
                            <div class="input-field">
                                <input type="text" id="Instagram" name="Instagram">
                                <label for="Instagram">Instagram</label>
                            </div>
                            <div class="input-field">
                                <input type="text" id="youtube" name="youtube">
                                <label for="youtube">Youtube</label>
                            </div>
                            <input type="hidden" name="idredesocial" id="idredesocial">
                            <input type="submit" class="fontbold" value="confirmar">
                        </form>
                    </div>
                    <?php 
                }
                ?>
            </div>
            <div id="alerta" class="suave">
                <p class="font"><i class="mdi-alert-error left"></i><span>Mensagem</span></p>
            </div>
        </div>


        <script src="js/jquery.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/goodscroll.js"></script>
        <script src="js/script.js"></script>
        <script src="js/jcarousellite.js"></script>
        <script src="js/admin-info-ajax.js"></script>
    </body>
    </html>
    <?php 

}else{
    header('Location: index.php');
}
?>