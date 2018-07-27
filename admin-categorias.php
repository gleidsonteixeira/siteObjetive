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
                <?php 
                $arr1 = str_split($_SESSION['ds_acesso_menu']);

                if ($arr1[0] == 1) {

                    ?>
                    <li>
                        <a href="admin.php" class="font suave"><i class="mdi-action-dashboard"></i>Dashboard</a>
                    </li>
                    <?php 
                }

                if ($arr1[1] == 1) {

                    ?>
                    <li>
                        <a href="admin-banners.php" class="font suave"><i class="mdi-action-view-carousel"></i>Banners</a>
                    </li>
                    <?php 
                }

                if ($arr1[2] == 1) {

                    ?>
                    <li>
                        <a href="admin-depoimentos.php" class="font suave"><i class="mdi-action-account-circle"></i>Depoimentos</a>
                    </li>
                    <?php 
                }

                if ($arr1[3] == 1) {

                    ?>
                    <li>
                        <a href="admin-tickets.php" class="font suave"><i class="mdi-social-group"></i> Tickets</a>
                    </li>
                    <?php 
                }

                if ($arr1[4] == 1) {

                    ?>
                    <li>
                        <a href="admin-chat.php" class="font suave"><i class="mdi-action-question-answer"></i> Chat</a>
                    </li>
                    <?php 
                }

                if ($arr1[5] == 1) {

                    ?>
                    <li>
                        <a href="admin-blog.php" class="font suave"><i class="mdi-editor-insert-comment"></i> Blog</a>
                    </li>
                    <?php 
                }

                if ($arr1[6] == 1) {

                    ?>
                    <li>
                        <a href="admin-categorias.php" class="font suave"><i class="mdi-action-view-list"></i> Categorias</a>
                    </li>
                    <?php 
                }

                if ($arr1[7] == 1) {

                    ?>
                    <li>
                        <a href="admin-faq.php" class="font suave"><i class="mdi-action-help"></i> FAQs</a>
                    </li>
                    <?php 
                }

                if ($arr1[8] == 1) {

                    ?>
                    <li>
                        <a href="admin-newsletter.php" class="font suave"><i class="mdi-communication-email"></i> Newsletter</a>
                    </li>
                    <?php 
                }

                if ($arr1[9] == 1) {

                    ?>
                    <li>
                        <a href="admin-info.php" class="font suave"><i class="mdi-action-info"></i> Informações</a>
                    </li>
                    <?php 
                }

                if ($arr1[10] == 1) {

                    ?>
                    <li>
                        <a href="admin-usuarios.php" class="font suave"><i class="mdi-social-person-add"></i> Usuários</a>
                    </li>
                    <?php 
                }

                ?>
                <li>
                    <a href="logout.php" class="font suave"><i class="mdi-action-lock-open"></i> Sair</a>
                </li>

            </ul>
        </div>

        <div id="content" class="active suave">
            <i class="mdi-navigation-menu menu-btn suave click"></i>
            <h3 class="font suave"><span>Categorias do Blog</span></h3>
            <div class="lista-categoria">
                <ul>
                    <?php 
                    $rs = $con->query("select * from categoria;");
                    $i = 1;
                    while($row = $rs->fetch(PDO::FETCH_OBJ)){
                        if ($i == 1) {

                            ?>
                            <li>
                                <h6 class="font nome pergunta"><?php echo $row->ds_categoria ?></h6>

                            </li>

                            <?php 
                            $i++;
                        }else{
                            ?>
                            <li>
                                <h6 class="font nome pergunta"><?php echo $row->ds_categoria ?></h6>
                                <div class="controls suave">
                                    <a class="font click suave editar-categoria" data-id='<?php echo $row->idcategoria ?>' data-categoria='<?php echo $row->ds_categoria ?>'>
                                        <i class="mdi-content-create"></i>Editar
                                    </a>
                                    <a class="font click suave deletar-categoria" data-ds_cat=<?php echo $row->ds_categoria ?>>
                                        <i class="mdi-action-delete"></i>Deletar
                                    </a>
                                </div>
                            </li>
                            <?php
                        }
                    }
                    ?>
                </ul>
                <div class="novoBanner suave">
                    <i class="mdi-navigation-close click close"></i>
                    <form class="white suave" id="formulario" style="padding-top: 20px;">
                        <h6 class="fontbold">Cadastrar Categoria</h6>
                        <div class="input-field">
                            <input type="text" id="categoria" name="categoria">
                            <label for="categoria">Categoria</label>
                        </div>
                        <input type="submit" class="fontbold" value="confirmar">
                        <input type="hidden" id="custId" name="custId">
                    </form>
                </div>
                <button class="novoBannerBtn fontbold"><i class="mdi-content-add left"></i> add Categoria</button>
            </div>
            <div id="alerta" class="suave">
                <p class="font"><i class="mdi-alert-error left"></i><span>Mensagem</span></p>
            </div>
        </div>


        <script src="js/jquery.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/goodscroll.js"></script>
        <script src="js/script.js"></script>
        <script src="js/categoria-ajax.js"></script>
        <script src="js/jcarousellite.js"></script>
    </body>
    </html>
    <?php 
    
}else{
    header('Location: index.php');
}
?>