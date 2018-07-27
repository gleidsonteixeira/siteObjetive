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
            <h3 class="font suave"><span>Usuários</span></h3>
            <div class="lista-usuarios">
                <ul>
                    <?php 
                    $rs = $con->query("select * from usuario;");

                    while($row = $rs->fetch(PDO::FETCH_OBJ)){
                        if ($row->idusuario != $_SESSION['idusuario']) {

                            ?>
                            <li class="suave">
                                <img src='<?php echo $row->ds_caminho_img; ?>'>
                                <h6 class="font truncate"><?php echo $row->ds_nome; ?><span><?php  if($row->tipo_usuario_idtipo_usuario == 1){ echo "Administrador"; }else{ echo "Atendente"; } ?></span></h6>
                                <p class="font truncate"><?php echo $row->ds_email; ?></p>
                                <i class="mdi-content-create click editar-usuario" data-idusu=<?php echo $row->idusuario; ?> data-nome='<?php echo $row->ds_nome; ?>' data-login='<?php echo $row->ds_login; ?>' data-senha='<?php echo $row->ds_senha; ?>' data-img='<?php echo $row->ds_caminho_img; ?>' data-tipo='<?php echo $row->tipo_usuario_idtipo_usuario; ?>' data-email='<?php echo $row->ds_email; ?>' data-acesso='<?php echo $row->ds_acesso_menu; ?>'></i>
                                <i class="mdi-action-delete deletar-usuario" data-idusu=<?php echo $row->idusuario; ?>></i>
                            </li>
                            <?php 
                        }
                    }
                    ?>

                </ul>
                <div class="novoBanner suave">
                    <i class="mdi-navigation-close click close"></i>
                    <form class="white suave" enctype="multipart/form-data" id="formulario" style="width: 600px;position: absolute;left: calc(50% - 300px);overflow: hidden;">
                        <h6 class="fontbold">Cadastrar Usuário</h6>
                        <div style="width: 50%; float: left; padding-right: 10px;">
                            <div class="input-field">
                                <input type="text" id="nome" name="nome" require>
                                <label for="nome">Nome</label>
                            </div>
                            <div class="input-field">
                                <input type="text" id="email" name="email" require>
                                <label for="email">Email</label>
                            </div>
                            <div class="input-field nm">
                                <span style="font-size: 12px;padding-bottom: 14px;display: block;color: #2E3190;">Escolher Foto</span>
                                <input type="file" name="arquivo">
                            </div>
                        </div>
                        <div style="width: 50%; float: left; padding-left: 10px;">
                            <div class="input-field">
                                <input type="text" id="usuario" name="usuario" require>
                                <label for="usuario">Login</label>
                            </div>
                            <div class="input-field">
                                <input type="password" id="senha" name="senha" require>
                                <label for="senha">Senha</label>
                            </div>
                            <div class="input-field nm">
                                <span style="font-size: 12px;padding-bottom: 5px;display: block;color: #2E3190;">Cargo</span>
                                <select class="browser-default nm" id="tipo_usu" name="tipo_usu" style="margin-bottom: 20px;">
                                    <option value="1">Admin</option>
                                    <option value="2">Atendente</option>
                                </select>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <h6 class="soPraAtendente fontbold" style="margin-top: 20px;">Páginas visíveis</h6>
                        <div class="soPraAtendente" style="width: 33.333%; float: left;">
                            <p style="margin: 0;line-height:30px;padding-left:25px;position:relative;">
                                <label>
                                    <input type="checkbox" class="filled-in" style="position: absolute; left: 0; top:10px; opacity: 1;" id="Dashboard" name="Dashboard" />
                                    <span>Dashboard</span>
                                </label>
                            </p>
                            <p style="margin: 0;line-height:30px;padding-left:25px;position:relative">
                                <label>
                                    <input type="checkbox" class="filled-in" style="position: absolute; left: 0; top:10px; opacity: 1;"  id="Banners" name="Banners" />
                                    <span>Banners</span>
                                </label>
                            </p>
                            <p style="margin: 0;line-height:30px;padding-left:25px;position:relative">
                                <label>
                                    <input type="checkbox" class="filled-in" style="position: absolute; left: 0; top:10px; opacity: 1;"  id="Depoimentos" name="Depoimentos" />
                                    <span>Depoimentos</span>
                                </label>
                            </p>
                            <p style="margin: 0;line-height:30px;padding-left:25px;position:relative">
                                <label>
                                    <input type="checkbox" class="filled-in" style="position: absolute; left: 0; top:10px; opacity: 1;"  id="Tickets" name="Tickets" />
                                    <span>Tickets</span>
                                </label>
                            </p>
                        </div>
                        <div class="soPraAtendente" style="width: 33.333%; float: left;">
                            <p style="margin: 0;line-height:30px;padding-left:25px;position:relative">
                                <label>
                                    <input type="checkbox" class="filled-in" style="position: absolute; left: 0; top:10px; opacity: 1;"  id="Chat" name="Chat" />
                                    <span>Chat</span>
                                </label>
                            </p>
                            <p style="margin: 0;line-height:30px;padding-left:25px;position:relative">
                                <label>
                                    <input type="checkbox" class="filled-in" style="position: absolute; left: 0; top:10px; opacity: 1;"  id="Blog" name="Blog" />
                                    <span>Blog</span>
                                </label>
                            </p>
                            <p style="margin: 0;line-height:30px;padding-left:25px;position:relative">
                                <label>
                                    <input type="checkbox" class="filled-in" style="position: absolute; left: 0; top:10px; opacity: 1;"  id="Categorias" name="Categorias" />
                                    <span>Categorias</span>
                                </label>
                            </p>
                            <p style="margin: 0;line-height:30px;padding-left:25px;position:relative">
                                <label>
                                    <input type="checkbox" class="filled-in" style="position: absolute; left: 0; top:10px; opacity: 1;"  id="FAQs" name="FAQs" />
                                    <span>FAQs</span>
                                </label>
                            </p>
                        </div>
                        <div class="soPraAtendente" style="width: 33.333%; float: left;">
                            <p style="margin: 0;line-height:30px;padding-left:25px;position:relative">
                                <label>
                                    <input type="checkbox" class="filled-in" style="position: absolute; left: 0; top:10px; opacity: 1;"  id="Newsletter" name="Newsletter" />
                                    <span>Newsletter</span>
                                </label>
                            </p>
                            <p style="margin: 0;line-height:30px;padding-left:25px;position:relative">
                                <label>
                                    <input type="checkbox" class="filled-in" style="position: absolute; left: 0; top:10px; opacity: 1;"  id="Informações" name="Informações" />
                                    <span>Informações</span>
                                </label>
                            </p>
                            <p style="margin: 0;line-height:30px;padding-left:25px;position:relative">
                                <label>
                                    <input type="checkbox" class="filled-in" style="position: absolute; left: 0; top:10px; opacity: 1;"  id="Usuarios" name="Usuarios" />
                                    <span>Usuários</span>
                                </label>
                            </p>
                        </div>
                        <div class="clear"></div>
                        <input type="submit" class="fontbold" value="confirmar" style="margin-top: 20px;">
                        <input type="hidden" id="custId" name="custId">
                    </form>
                </div>
                <button class="novoBannerBtn fontbold">
                    <i class="mdi-content-add left"></i> add Usuário
                </button>
            </div>
            <div id="alerta" class="suave">
                <p class="font"><i class="mdi-alert-error left"></i><span>Mensagem</span></p>
            </div>
        </div>


        <script src="js/jquery.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/goodscroll.js"></script>
        <script src="js/script.js"></script>
        <script src="js/usuario-ajax.js"></script>
    </body>
    </html>
    <?php 

}else{
    header('Location: index.php');
}
?>