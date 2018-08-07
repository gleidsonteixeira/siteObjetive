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
            <h3 class="font suave"><span>Blog</span></h3>
            <div class="lista-post">
                <ul>
                    <?php 
                    $rs = $con->query("select post_blog.*,categoria.ds_categoria from post_blog, categoria
                        where post_blog.categoria_ds_categoria = categoria.ds_categoria;");
                    while($row = $rs->fetch(PDO::FETCH_OBJ)){
                        ?>
                        <li class="suave">
                            <div class="imagem">
                                <div class="data font"><?php echo $row->data_hora ?></div>
                                <img src="<?php echo $row->ds_caminho_img_destaque ?>">
                            </div>
                            <div class="dados">
                                <h6 class="font truncate"><?php echo $row->ds_titulo ?><span><?php echo $row->ds_categoria ?></span></h6>
                                <p class="font"><?php echo $row->ds_conteudo ?></p>
                                <i class="mdi-content-create click editar-blog" data-id='<?php echo $row->idpost_blog; ?>' data-titulo='<?php echo $row->ds_titulo; ?>' data-dataTime='<?php echo $row->ds_data_hota; ?>' data-img='<?php echo $row->ds_caminho_img_destaque; ?>' data-idcategoria='<?php echo $row->categoria_idcategoria; ?>' data-conteudo='<?php echo $row->ds_conteudo; ?>' data-palavrasChave='<?php echo $row->ds_palavras_chaves; ?>' data-autor='<?php echo $row->ds_autor ?>' data-desc='<?php echo $row->ds_descricao; ?>'></i>
                                <i class="mdi-action-delete click deletar-blog" data-id='<?php echo $row->idpost_blog; ?>'></i>
                            </div>
                        </li>
                        <?php 
                    }
                    ?>
                    
                </ul>
                <div class="novoBanner post suave">
                    <i class="mdi-navigation-close click close"></i>
                    <form class="white suave" enctype="multipart/form-data" id="formulario" style="padding-top: 20px;">
                        <h6 class="fontbold">Novo Post</h6>
                        <div class="row nm">
                            <div class="col l8 m8 s12">
                                <div class="input-field">
                                    <input type="text" id="titulo" name="titulo" require>
                                    <label for="titulo">Titulo</label>
                                </div>
                                <div class="input-field">
                                    <input type="text" id="autor" name="autor" value="<?php echo $_SESSION['ds_nome']; ?>" readonly>
                                    <label for="autor">Autor</label>
                                </div>
                                <div class="input-field">
                                    <textarea id="p_conteudo" name="p_conteudo" class="materialize-textarea"></textarea>
                                </div>
                            </div>
                            <div class="col l4 m4 s12">
                                <div class="input-field nm">
                                    <span style="font-size: 12px;padding-bottom: 5px;display: block;color: #2E3190;">Imagem</span>
                                    <input type="file" name="arquivo">
                                </div>
                                <div class="input-field">
                                    <span style="font-size: 12px;padding-bottom: 5px;display: block;color: #2E3190;">Categoria</span>
                                    <select class="browser-default" name="ds_categoria" id="ds_categoria" style="margin-bottom: 20px;">
                                        <?php 
                                        $rs = $con->query("select * from categoria;");
                                        while($row = $rs->fetch(PDO::FETCH_OBJ)){
                                            ?>
                                            <option value='<?php echo $row->ds_categoria ?>'><?php echo $row->ds_categoria ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>

                                </div>
                                <div class="input-field">
                                    <textarea id="descricao" name="descricao" class="materialize-textarea"></textarea>
                                    <label for="descricao">Descrição</label>
                                </div>
                                <div class="input-field">
                                    <textarea id="palavrasChave" name="palavrasChave" class="materialize-textarea"></textarea>
                                    <label for="palavrasChave">Palavras Chave</label>
                                </div>
                                <input type="submit" class="fontbold" value="confirmar">
                                <input type="hidden" id="custId" name="custId">
                            </div>
                        </div>
                    </form>
                </div>
                <button class="novoBannerBtn fontbold"><i class="mdi-content-add left"></i> add Post</button>
            </div>
            <div id="alerta" class="suave">
                <p class="font"><i class="mdi-alert-error left"></i><span>Mensagem</span></p>
            </div>
        </div>


        <script src="js/jquery.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/goodscroll.js"></script>
        <script src="js/script.js"></script>
        <script src="js/blog-ajax.js"></script>
        <script src="js/jcarousellite.js"></script>
        <script src="js/ckeditor/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('p_conteudo', {enterMode: Number(2)}).on('key' ,function(){});
                //Variavél que armazena o conteúdo
                //CKEDITOR.instances.c_conteudo.getData();
            </script>
        });

    </body>
    </html>
    <?php 

}else{
    header('Location: index.php');
}
?>