<?php 
include_once 'conexao.php';
session_start();
if (isset($_SESSION['login'])) {

    header('Location: admin.php');
    
}else{
    if (isset($_GET['pesquisa'])) {
        if (!empty($_GET['pesquisa'])) {
            $pesq_blog = $_GET['pesquisa'];
            
            ?>
            <!DOCTYPE html>
            <html dir="ltr" lang="pt-BR">
            <head>

                <title>Pesquisa - <?php echo $pesq_blog; ?></title>

                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <meta http-equiv="expires" content="Tue, 01 Jan 2019 12:12:12 GMT">
                <meta http-equiv="cache-control" content="public" />
                <meta http-equiv="Pragma" content="public">
                <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
                <meta name="description" content=""/>
                <meta name="keywords" content=''/>
                <meta name="author" content="Gleidson Teixeira, g.teixeira@objetiveti.com.br"/>
                <meta name="robots" content="index, follow">
                <meta name="language" content="pt-br" />

                <link rel="canonical" href="https://walletfamily.com" />
                <link rel="shortlink" href="https://walletfamily.com" />
                <link rel="stylesheet" href="css/font-awesome.css" type="text/css"/>
                <link rel="stylesheet" href="css/materialize.css" type="text/css"/>
                <link rel="stylesheet" href="css/extras.css" type="text/css"/>
                <link rel="icon" href="https://walletfamily.com/iconsite.png" sizes="32x32" />
                <link rel="icon" href="https://walletfamily.com/iconsite.png" sizes="192x192" />
                <link rel="apple-touch-icon-precomposed" href="https://walletfamily.com/iconsite.png" />
                <!-- Global site tag (gtag.js) - Google Analytics -->
                <script async src="https://www.googletagmanager.com/gtag/js?id=UA-122824438-1"></script>
                <script>
                    window.dataLayer = window.dataLayer || [];
                    function gtag(){dataLayer.push(arguments);}
                    gtag('js', new Date());

                    gtag('config', 'UA-122824438-1');
                </script>

            </head>

            <body class="white">

                <ul id="slide-out" class="side-nav font">
                    <div class="perfil">
                        <img src="img/wallet-logo.png"/>
                        <p class="condesed white-text">
                            (99) 99999-9999<br>
                            contato@seusite.com.br
                        </p>
                    </div>
                    <li>
                        <a href="index.php" class="active suave font">
                            Início
                        </a>
                    </li>
                    <li>
                        <a href="tipodeconta.php" class="suave scrollto font">
                            Tipos de Contas
                        </a>
                    </li>
                    <li>
                        <a href="index.php#como-funciona" class="suave scrollto font">
                            Como Funciona
                        </a>
                    </li>
                    <li>
                        <a href="index.php#vantagens" class="suave scrollto font">
                            Vantagens
                        </a>
                    </li>
                    <li>
                        <a href="faq.php" class="suave scrollto font">
                            FAQ
                        </a>
                    </li>
                </ul>
                <i class="mdi-navigation-menu click menu-btn circle button-collapse hide-on-large-only" data-activates="slide-out"></i>

                <header id="topo" class="suave interno">
                    <div class="logo suave">
                        <h1 class="nm" alt="Direto na Mídia">
                            <a href="index.php" title="" class="font suave">
                                <img src="img/wallet-logo.png" alt="Wallet Family"/>
                            </a>
                        </h1>
                    </div>
                    <div class="menu hide-on-med-and-down suave">
                        <ul class="nm">
                            <li>
                                <a href="index.php" class="active suave font">
                                    Início
                                </a>
                            </li>
                            <li>
                                <a href="tipodeconta.php" class="suave font scrollto">
                                    Tipos de Contas
                                </a>
                            </li>
                            <li>
                                <a href="index.php#como-funciona" class="suave font scrollto">
                                    Como Funciona
                                </a>
                            </li>
                            <li>
                                <a href="index.php#vantagens" class="suave font scrollto">
                                    Vantagens
                                </a>
                            </li>
                            <li>
                                <a href="faq.php" class="suave font scrollto">
                                    FAQ
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="acoes">
                        <a href="https://walletfamily.com/acessowallet/" class="login font suave">
                            <b class="hide-on-med-and-down">Entrar</b>
                            <b class="hide-on-large-only"><i class="mdi-action-lock"></i></b>
                        </a>
                        <a href="https://walletfamily.com/register/" class="hide-on-small-only novaConta font suave">
                            <b class="hide-on-med-and-down">Criar conta</b>
                            <b class="hide-on-large-only"><i class="mdi-social-person-add"></i></b>
                        </a>
                    </div>
                </header>

                <main>
                    <section id="chat">
                        <button class="but abre-gaveta">
                            <span>
                                <i class="mdi-communication-forum left"></i>
                                Fale Conosco
                            </span>
                        </button>
                        <div class="gaveta">
                            <div class="boas-vindas suave">
                                <span class="click fecha-gaveta click">
                                    <i class="mdi-navigation-close"></i>
                                </span>
                                <h6 class="font"><i class="mdi-communication-forum suave"></i></h6>    
                            </div>
                            <div class="chat-logout suave">
                                <p class="font">Este é o atendimento online da Wallet Family, preencha os campos abaixo para iniciar.</p>
                                <form id="comecar-conversa">
                                    <div class="input-field">
                                        <input type="text" id="chat-nome" name="nome" required>
                                        <label for="nome">Digite seu nome</label>
                                    </div>
                                    <div class="input-field">
                                        <input type="email" id="chat-email" name="email" required>
                                        <label for="email">Digite seu email</label>
                                    </div>
                                    <button type="submit" class="font"><b>começar</b></button>
                                    <span class="click fecha-gaveta">Agora não</span>
                                </form>
                            </div>
                            <div class="chat-login deactive">
                                <ul class="nm">
                                    <li class="atendente"><span>Olá, como podemos ajudá-lo?</span></li>
                                </ul>
                                <input type="hidden" id="sala">
                                <input type="hidden" id="nome">
                                <input type="text" id="chat-resposta" placeholder="Digite sua pergunta" required>
                                <button><i class="mdi-content-send"></i></button>
                            </div>
                        </div> 
                    </section>
                    <section id="blog-interna">
                        <div class="titulo">
                            <h1 class="fontbold">Busca</h1>
                            <!-- <p class="font">Veja as principais notícias sobre o mercado financeiro.</p> -->
                        </div>
                        <div class="container">
                            <div class="row nm">
                                <div class="col l8 offset-l2 m8 offset-m2 s12">
                                    <h4 class="center-align font">Resultados para:<span><?php echo $pesq_blog; ?></span></h4>
                                    <ul class="posts">
                                        <?php 
                                        $rs = $con->query("select post_blog.* from post_blog where ds_titulo LIKE '%".$pesq_blog."%';");

                                        while($row = $rs->fetch(PDO::FETCH_OBJ)){

                                            ?>
                                            <li class="suave">
                                                <a href="blog-post.php?idpost_blog=<?php echo $row->idpost_blog ?>">
                                                    <div class="imagem">
                                                        <img src="<?php echo $row->ds_caminho_img_destaque ?>" class="responsive-img">
                                                        <span><?php echo $row->categoria_ds_categoria ?></span>
                                                    </div>
                                                    <div class="dados">
                                                        <h3 class="font"><?php echo $row->ds_titulo ?></h3>
                                                        <p class="font"><?php echo $row->ds_conteudo ?></p>
                                                        <div class="clear"></div>
                                                    </div>
                                                </a>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </section>
                </main>

                <footer id="" class="">
                    <div class="container">
                        <div class="row">
                            <div class="col l2 m4 s6">
                                <ul>
                                    <li><h6 class="font"><b>Recursos</b></h6></li>
                                    <li class="font"><a href="#!">Emissão de Boletos</a></li>
                                    <li class="font"><a href="#!">Cartão de Crédito</a></li>
                                    <li class="font"><a href="#!">Recargas</a></li>
                                </ul>
                            </div>
                            <div class="col l2 m4 s6">
                                <ul>
                                    <li><h6 class="font"><b>Wallet Family</b></h6></li>
                                    <li class="font"><a href="">Quem somos</a></li>
                                    <li class="font"><a href="">Termos de uso</a></li>
                                    <li class="font"><a href="">Regras</a></li>
                                    <li class="font"><a href="">Blog</a></li>
                                    <li class="font"><a href="">FAQ</a></li>
                                </ul>
                            </div>
                            <div class="col l3 m4 s12 center-on-small-only">
                                <ul>
                                    <?php 
                                    $rs = $con->query("select * from contatos;");
                                    while($row = $rs->fetch(PDO::FETCH_OBJ)){
                                        ?>
                                        <li><h6 class="font"><b>Contatos</b></h6></li>
                                        <li class="font"><?php echo $row->ds_email; ?></a></li>
                                        <li class="font"><?php //echo $row->ds_telefone; ?></li>
                                        <li class="font">Av Humberto Monte 2929 - sala 307 - Fortaleza-CE</li>
                                        <?php 
                                    }
                                    ?>
                                </ul>

                            </div>
                            <div class="col l4 offset-l1 m10 offset-m1 s12 ajuste">
                                <ul>
                                    <li><h6 class="font"><b>Inscreva-se para novidades</b></h6></li>
                                    <li class="font" style="line-height: 20px;">A Wallet Family está constantemente evoluindo e crescendo, faça parte da nossa lista vip e fique sempre por dentro dos nossos lançamentos!</a></li>
                                </ul>
                                <form id="formulario_newsletter">
                                    <div class="input-field">
                                        <input type="email" name="email-newletter" id="email-newletter">
                                        <label for="email-newletter">Digite seu email...</label>
                                        <button type="submit"><i class="mdi-content-send"></i></button>
                                    </div>
                                </form>
                            </div>

                        </div>
                        <div class="redes">
                            <?php 
                            $rs = $con->query("select * from redes_sociais;");
                            while($row = $rs->fetch(PDO::FETCH_OBJ)){
                                ?>
                                <a target="_blank" href="<?php echo $row->ds_facebook; ?>" class="suave"><i class="fa fa-facebook"></i></a>
                                <a target="_blank" href="<?php echo $row->ds_youtube; ?>" class="suave"><i class="fa fa-youtube-play"></i></a>
                                <a target="_blank" href="<?php echo $row->ds_instagram; ?>" class="suave"><i class="fa fa-instagram"></i></a>
                                <a target="_blank" href="#!" class="suave hide"><i class="fa fa-google-plus"></i></a>
                                <?php 
                            }

                            $rs = $con->query("select * from contatos;");
                            while($row = $rs->fetch(PDO::FETCH_OBJ)){
                                ?>
                                <a target="_blank" href="https://api.whatsapp.com/send?phone=55<?php echo $row->ds_whatsapp; ?>&text=Ol%C3%A1%20Wallet%20Family%20desejo%20saber%20mais" class="suave"><i class="fa fa-whatsapp"></i></a>
                                <?php 
                            }
                            ?>
                        </div>
                    </div>

                    <h5 class="center-align nm font"><b>&copy 2018 Wallet Family | Todos os direitos reservados.</b></h5>
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
                    logarAnonimamente();
                    chat();
                    depoimentos();
                </script>
            </body>
            </html>
            <?php 
            
        }
    }
}
?>