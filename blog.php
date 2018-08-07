<?php 
include_once 'conexao.php';
session_start();
if (isset($_SESSION['login'])) {

    header('Location: admin.php');
    
}else{

    ?>
    <!DOCTYPE html>
    <html dir="ltr" lang="pt-BR">
    <head>
        <?php 
        $rs = $con->query("select * from pagina_blog;");
        while($row = $rs->fetch(PDO::FETCH_OBJ)){
            ?>
            <title><?php echo utf8_encode($row->ds_titulo); ?></title>

            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta http-equiv="expires" content="Tue, 01 Jan 2019 12:12:12 GMT">
            <meta http-equiv="cache-control" content="public" />
            <meta http-equiv="Pragma" content="public">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
            <meta name="description" content="<?php echo utf8_encode($row->ds_descricao); ?>"/>
            <meta name="keywords" content='<?php echo utf8_encode($row->ds_palavras_chaves); ?>'/>
            <meta name="author" content="Gleidson Teixeira, g.teixeira@objetiveti.com.br"/>
            <meta name="robots" content="index, follow">
            <meta name="language" content="pt-br" />
            <?php 
        }
        ?>
        <link rel="canonical" href="https://objetiveti.com.br" />
        <link rel="shortlink" href="https://objetiveti.com.br" />
        <link rel="stylesheet" href="css/font-awesome.css" type="text/css"/>
        <link rel="stylesheet" href="css/materialize.css" type="text/css"/>
        <link rel="stylesheet" href="css/extras.css" type="text/css"/>
        <link rel="icon" href="img/favicon.jpg" sizes="32x32" />
        <link rel="icon" href="img/favicon.jpg" sizes="192x192" />
        <link rel="apple-touch-icon-precomposed" href="img/favicon.jpg" />
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-122824438-1"></script>
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
            ga('create', 'UA-104056819-1', 'auto');
            ga('send', 'pageview');
        </script>
    </head>

    <body class="white">
        <section id="inicio" class="interna">
            <div class="menu suave">
                <div class="verMenu click">
                    <i class="mdi-navigation-menu"></i>
                </div>
                <div class="logo">
                    <a href="index.php"><img src="img/logo-objetive-ti.png" alt="Objetive TI" class="responsive-img"/></a>
                </div>
                <ul class="nm">
                    <!-- <li>
                        <a href="#!">Data Center</a>
                    </li>
                    <li>
                        <a href="#!">Desenvolvimento</a>
                    </li>
                    <li>
                        <a href="#!">Marketing Digital</a>
                    </li> -->
                    <li>
                        <a href="#como-trabalhamos" class="scrollto">Como Trabalhamos</a>
                    </li>
                    <li>
                        <a href="#cases" class="scrollto">Cases</a>
                    </li>
                    <li>
                        <a href="#blog" class="scrollto">Blog</a>
                    </li>
                    <!-- <li>
                        <a href="faq.php">FAQ</a>
                    </li> -->
                </ul>
                <div class="areaCliente">
                    <a href="#!" class="waves-effect"><i class="mdi-action-account-circle left"></i> Área do Cliente</a> 
                </div>
            </div>
            <!-- <div class="avaliacoes">
                <i class="mdi-social-mood fix suave"></i>
                <span class="suave">O que achou de nossa empresa?</span>
            </div> -->
        </section>

        <main>
            <section id="blog-interna">
                <div class="titulo">
                    <h2><b>Blog</b></h2>
                    <!-- <p class="font">Veja as principais notícias sobre o mercado financeiro.</p> -->
                </div>
                <div class="container">
                    <div class="row nm">
                        <div class="col l3 m5 s12" style="margin-top: 80px;background-color: #a6296e; border-radius: 4px;">
                            <div class="pesquisar nm">
                                <h6 class="white-text">Pesquisa:</h6>
                                <form action="pesquisa.php" method="GET">
                                    <div class="input-field">
                                        <input type="text" id="pesquisa" name="pesquisa" placeholder="Pesquisar">
                                        <button type="submit"><i class="mdi-action-search"></i></button>
                                    </div>
                                </form>
                            </div>
                            <div class="pesquisar">
                                <h6 class="white-text">Categorias:</h6>
                                <ul class="categorias">
                                    <?php 
                                    $rs_cat = $con->query("select * from categoria;");
                                    while($row_cat = $rs_cat->fetch(PDO::FETCH_OBJ)){
                                        ?>
                                        <li class="font suave"><a href="blog.php?ds_categoria=<?php echo $row_cat->ds_categoria; ?>"><?php echo $row_cat->ds_categoria; ?></a></li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                            <!-- <div class="pesquisar" style="margin-top: 20px;">
                                <h6>Publicações recentes:</h6>
                                <ul class="recentes">
                                    <?php 
                                    // $rs_cat = $con->query("select idpost_blog,ds_titulo,ds_caminho_img_destaque from post_blog order by data_hora LIMIT 5;");
                                    // while($row_cat = $rs_cat->fetch(PDO::FETCH_OBJ)){
                                        ?>
                                        <li class="font suave">
                                            <a href="blog-post.php?idpost_blog=<?php //echo $row_cat->idpost_blog ?>">
                                                <img src="<?php //echo $row_cat->ds_caminho_img_destaque ?>" class="responsive-img">
                                                <?php //echo $row_cat->ds_titulo ?>
                                            </a>
                                        </li>
                                        <?php
                                    //}
                                    ?>
                                </ul>
                            </div> -->
                        </div>
                        <div class="col l9 m7 s12">
                            <ul class="posts">
                                <?php 
                                $rs;
                                if (isset($_GET['ds_categoria'])) {
                                    if(!empty($_GET['ds_categoria'])){
                                        if ($_GET['ds_categoria'] == 'Todos') {
                                            $rs = $con->query("select post_blog.* from post_blog LIMIT 5;");
                                        }else{
                                            $ds_categoria = $_GET['ds_categoria'];
                                            $rs = $con->query("select post_blog.* from post_blog where categoria_ds_categoria = '$ds_categoria' LIMIT 5;");
                                        }
                                    }else{
                                        header("Location: blog.php");
                                    }
                                }else{
                                    $rs = $con->query("select post_blog.* from post_blog LIMIT 5;");
                                }
                                
                                $ultimoId = 0 ;
                                while($row = $rs->fetch(PDO::FETCH_OBJ)){
                                    ?>
                                    <li class="suave">
                                        <a href="blog-post.php?idpost_blog=<?php echo $row->idpost_blog ?>">
                                            <div class="imagem">
                                                <img src="<?php echo $row->ds_caminho_img_destaque ?>" class="responsive-img">
                                            </div>
                                            <div class="dados">
                                                <span class="upper mini-title">
                                                    <?php 
                                                    $rs_cat = $con->query("select ds_categoria from categoria where ds_categoria = '$row->categoria_ds_categoria';");
                                                    while($row_cat = $rs_cat->fetch(PDO::FETCH_OBJ)){
                                                        echo $row_cat->ds_categoria;
                                                    }
                                                    ?>
                                                </span>
                                                <h3><b><?php echo $row->ds_titulo ?></b></h3>
                                                <p><?php echo $row->ds_conteudo ?></p>
                                                <div class="autor np">
                                                    <div class="foto"><img src="<?php echo $row->ds_caminho_img_autor; ?>" class="foto"></div>
                                                    <h6 class="upper mini-title"><?php echo $row->ds_autor ?></h6>
                                                    <span class="data"><b>
                                                        <?php 
                                                        $data = $row->data_hora;
                                                        $array = explode('-', $data); 
                                                        echo $array[2]."/".$array[1]."/".$array[0]; 
                                                        ?>

                                                    </b></span>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                        </a>
                                    </li>
                                    <?php 
                                    $ultimoId = $row->idpost_blog; 
                                }
                                ?>
                                <input type="hidden" name="idUltimo" id="idUltimo" value="<?php echo $ultimoId; ?>">
                            </ul>   
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    
    <footer>
        <div class="container">
            <div class="row">
                <div class="col l5 m4 s12 center-on-small-only">
                    <h5><img src="img/logo-objetive-ti2.png" alt="Objetive TI"></h5>
                    <p style="padding-right:20px;">A Objetive TI é uma empresa 100% focada no crescimento do seu negócio. Nossa equipe multidisciplinar está pronta para lhe ajudar em todos os âmbitos necessários.</p>
                    <ul>
                        <?php 
                            //$rs = $con->query("select * from contatos;");
                            //while($row = $rs->fetch(PDO::FETCH_OBJ)){
                        ?>
                        <li class="font"><?php //echo $row->ds_email; ?></a></li>
                        <li class="font"><?php //echo $row->ds_telefone; ?></li>
                        <li class="font">Av Desembargador Moreira 1701 - sala 807 - Fortaleza-CE</li>
                        <?php 
                            //}
                        ?>
                    </ul>
                    <div class="redes">
                        <?php 
                            //$rs = $con->query("select * from redes_sociais;");
                            //while($row = $rs->fetch(PDO::FETCH_OBJ)){
                        ?>
                        <a target="_blank" href="<?php //echo $row->ds_facebook; ?>" class="suave"><i class="fa fa-facebook"></i></a>
                        <a target="_blank" href="<?php //echo $row->ds_youtube; ?>" class="suave"><i class="fa fa-youtube-play"></i></a>
                        <a target="_blank" href="<?php //echo $row->ds_instagram; ?>" class="suave"><i class="fa fa-instagram"></i></a>
                        <a target="_blank" href="#!" class="suave hide"><i class="fa fa-google-plus"></i></a>
                        <?php 
                            //}
                            //$rs = $con->query("select * from contatos;");
                            //while($row = $rs->fetch(PDO::FETCH_OBJ)){
                        ?>
                        <a target="_blank" href="https://api.whatsapp.com/send?phone=55<?php //echo $row->ds_whatsapp; ?>&text=Ol%C3%A1%20Wallet%20Family%20desejo%20saber%20mais" class="suave"><i class="fa fa-whatsapp"></i></a>
                        <?php 
                            //}
                        ?>
                    </div>
                </div>
                <div class="col l2 m4 s6">
                    <ul>
                        <li><h6 style="color: #f06060;"><b>Soluções</b></h6></li>
                        <li class="font"><a href="#!">Data Center</a></li>
                        <li class="font"><a href="#!">Desenvolvimento</a></li>
                        <li class="font"><a href="#!">Marketing Digital</a></li>
                    </ul>
                </div>
                <div class="col l2 m4 s6">
                    <ul>
                        <li><h6 style="color:#8d6cd3;"><b>A Empresa</b></h6></li>
                        <li class="font"><a href="#!">Sobre</a></li>
                        <li class="font"><a href="blog.php">Blog</a></li>
                        <!-- <li class="font"><a href="faq.php">FAQ</a></li> -->
                    </ul>
                </div>
                <div class="col l3 m10 offset-m1 s12 ajuste">
                    <ul>
                        <li><h6 style="color:#a6296e;"><b>Inscreva-se para novidades</b></h6></li>
                        <li class="font" style="line-height: 20px;">Faça parte da nossa lista vip para receber nossas atualizações!</a></li>
                    </ul>
                    <form id="formulario_newsletter">
                        <div class="input-field">
                            <input type="email" name="email-newletter" id="email-newletter">
                            <label for="email-newletter">Digite seu email...</label>
                            <button type="submit"><i class="mdi-content-send"></i></button>
                        </div>
                    </form>
                </div>
                <div id="alerta" class="suave hide">
                    <p class="font"><i class="mdi-alert-error left"></i><span>Mensagem</span></p>
                </div>
            </div>
        </div>
        <h5 class="center-align nm font">
            &copy 2018 Objetive TI - Feito com <i class="mdi-action-favorite"></i> para você.</b>
        </h5>
    </footer>

    <script src="js/jquery.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/jcarousellite.js"></script>
    <script src="js/goodscroll.js"></script>
    <script src="https://www.gstatic.com/firebasejs/4.9.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/4.9.0/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/4.9.0/firebase-storage.js"></script>
    <script src="https://www.gstatic.com/firebasejs/4.9.0/firebase-database.js"></script>
    <script src="js/firebase.js"></script>
    <script src="js/script.js"></script>
    <script src="js/newsletter-ajax.js"></script>
    <script>
        aparecer("footer",400);
        $(window).scroll(function(){
            aparecer("footer",400);
        });
    </script>
</body>
</html>
<?php 
}
?>