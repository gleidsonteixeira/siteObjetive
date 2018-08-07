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
        $rs = $con->query("select * from pagina_principal;");
        while($row = $rs->fetch(PDO::FETCH_OBJ)){
            ?>
            <title><?php echo utf8_encode($row->ds_titulo); ?></title>

            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta http-equiv="expires" content="Tue, 01 Jan 2019 12:12:12 GMT">
            <meta http-equiv="cache-control" content="public" />
            <meta http-equiv="Pragma" content="public">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
            <meta name="description" content=""/>
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

        <!-- <ul id="slide-out" class="side-nav font">
            <div class="perfil">
                <img src="img/wallet-logo.png"/>
                <p class="condesed white-text">
                    contato@walletfamily.com
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
                <a href="#como-funciona" class="suave scrollto font">
                    Como Funciona
                </a>
            </li>
            <li>
                <a href="#vantagens" class="suave scrollto font">
                    Vantagens
                </a>
            </li>
            <li>
                <a href="faq.php" class="suave scrollto font">
                    FAQ
                </a>
            </li>
        </ul> -->
        <!-- <i class="mdi-navigation-menu click menu-btn circle button-collapse hide-on-large-only" data-activates="slide-out"></i> -->

        <!-- <header id="topo" class="suave">
            <div class="ativarMenu">
                <i class="mdi-navigation-menu"></i>
            </div>
            <a href="https://objetiveti.com.br/portal" class="suave">
                <b class="hide-on-med-and-down">Entrar</b>
                <b class="hide-on-large-only"><i class="mdi-action-lock"></i></b>
            </a>
        </header> -->

        <main>
            <section id="inicio">
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
                <div class="menuOculto hide">
                    <ul>
                        <li>
                            <a href="#!">
                                <div class="icone"></div>
                                <h6>menu 1</h6>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="imagem">
                    <img src="img/produtos.png" alt="Soluções ObjetiveTI">
                </div>
                <div class="texto-direito">
                    <h6>experimente</h6>
                    <h1><b></b></h1>
                    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <a href="#!">Link</a> -->
                    </div>
                <!-- <div class="avaliacoes">
                    <i class="mdi-social-mood fix suave"></i>
                    <span class="suave">O que achou de nossa empresa?</span>
                </div> -->
            </section>
            <section id="como-trabalhamos">
                <h2><b>Como Trabalhamos</b></h2>
                <div class="etapa">
                    <div class="meio">
                        <div style="background-color:#f06060;" class="icone">
                            <!-- <img src="" alt="Passo-1: Avaliamos o seu cenário"> -->
                        </div>
                        <h6 style="color:#f06060;" class="upper mini-title">Passo 1</h6>
                        <h5 style="color:#f06060;"><b>Avaliamos o seu cenário (Diagnóstico)</b></h5>
                        <p>A Objetive TI levanta as informações necessárias para o projeto com os colaboradores que entendem o processo da empresa através de entrevistas, análise de documentos e sistemas.</p>
                    </div>
                </div>
                <div class="etapa">
                    <div class="meio">
                        <div style="background-color:#8d6cd3;" class="icone"></div>
                        <h6 style="color:#8d6cd3;" class="upper mini-title">Passo 2</h6>
                        <h5 style="color:#8d6cd3;"><b>Entendemos o seu problema (Análise de Mudança)</b></h5>
                        <p>É realizada análise dessas informações através de relatórios, gráficos, planilha e métodos que mostram a apuração dos requisitos. Assim conseguimos identificar o problema.</p>
                    </div>
                </div>
                <div class="etapa">
                    <div class="meio">
                        <div style="background-color:#a6296e;" class="icone"></div>
                        <h6 style="color:#a6296e;" class="upper mini-title">Passo 3</h6>
                        <h5 style="color:#a6296e;"><b>Geramos a solução (Aplicação)</b></h5>
                        <p>Apresentamos a solução personalizada ao cliente que segue sua regra de negócio de forma a entregar o que a empresa precisa e o que ela busca.</p>
                    </div>
                </div>
            </section>
            <section id="cases">
                <div class="slider">
                    <ul class="slides">
                        <?php 
                        $rs = $con->query("select * from banner;");
                        while($row = $rs->fetch(PDO::FETCH_OBJ)){
                            ?>
                            <li>
                                <img src=<?php echo $row->ds_caminho_img_banner; ?> alt="<?php echo $row->ds_titulo; ?>" title="<?php echo $row->ds_titulo; ?>">
                                <div class="caption right-align">
                                    <h6 class="subtitulo font upper mini-title">
                                        <?php echo $row->ds_pre_titulo; ?>
                                    </h6>
                                    <h1 class="titulo fontbold nm">
                                        <b>
                                            <?php echo $row->ds_titulo; ?>
                                        </b>
                                    </h1>
                                    <div class="clear"></div>
                                    <a href=<?php echo $row->ds_link_video; ?> target="_blank" class="suave mini-title upper">Conhecer</a>
                                    <!-- <a data-video=<?php //echo $row->ds_link_video; ?> class="font click chamaVideo">
                                        <b>Assista o vídeo</b><i class="mdi-av-play-arrow right"></i>
                                    </a> -->
                                </div>
                            </li>
                            <?php 
                        }
                        ?>
                    </ul>
                </div>
            </section>
            <section id="blog">
                <div class="container">
                    <h2 class="center-align"><b>Blog</b></h2>
                    <div class="row nm">
                        <?php 
                        $rs = $con->query("select post_blog.* from post_blog order by data_hora LIMIT 3;");
                        while($row = $rs->fetch(PDO::FETCH_OBJ)){
                                ?>
                                <div class="col l4 m6 s12 hide-on-small-only">
                                    <div class="item suave">
                                        <div class="imagem">
                                            <a href="blog-post.php?idpost_blog=<?php echo $row->idpost_blog ?>">
                                                <img src="<?php echo $row->ds_caminho_img_destaque; ?>">
                                            </a>
                                        </div>
                                        <div class="descricao">
                                            <h6 class="upper mini-title"><b><?php echo $row->categoria_ds_categoria; ?></b></h6>
                                            <h5 class="fontbold"><b><?php echo $row->ds_titulo; ?>.</b></h5>
                                            <p class="font" style="height: 150px; overflow: hidden;">
                                                <?php echo $row->ds_conteudo; ?>
                                            </p>
                                        </div>
                                        <div class="autor">
                                            <div class="foto"></div>
                                            <h6 class="upper mini-title"><?php echo $row->ds_autor; ?></h6>
                                            <span class="data"><b>
                                                <?php 
                                                $data = $row->data_hora;
                                                $array = explode('-', $data); 
                                                echo $array[2]."/".$array[1]."/".$array[0]; 
                                                ?>

                                            </b></span>
                                        </div>
                                    </div>
                                </div>
                                
                            <?php
                            }
                            ?>
                        </div>
                        <a href="blog.php" class="vermais suave upper mini-title"><span>Ver todos</span></a>
                    </div>
                </section>
            <!-- <section id="chat">
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
                        <ul class="nm"></ul>
                        <input type="hidden" id="sala">
                        <input type="hidden" id="nome">
                        <input type="text" id="chat-resposta" placeholder="Digite sua pergunta" required>
                        <button><i class="mdi-content-send"></i></button>
                    </div>
                </div> 
            </section> -->
            <!--  -->
            <!-- <section id="vantagens">
                
            </section> -->
            
            <!-- <section id="depoimentos">
                 <div class="container">
                    <div class="next click suave"><i class="mdi-hardware-keyboard-arrow-right"></i></div>
                    <div class="prev click suave"><i class="mdi-hardware-keyboard-arrow-left"></i></div>
                    <div class="slidedepoimentos">
                        <ul>
                            <?php 
                                //$rs = $con->query("select * from depoimento;");
                                //while($row = $rs->fetch(PDO::FETCH_OBJ)){
                            ?>
                                <li class="item">
                                    <p><?php //echo $row->ds_depoimento; ?></p>
                                    <img src=<?php //echo $row->ds_caminho_img_entrevistado; ?>>
                                    <h6 class="font">
                                        <?php //echo $row->ds_nome_entrevistado; ?>
                                    </h6>
                                </li>
                            <?php
                                //}
                            ?>
                        </ul>
                    </div>
                </div>
            </section> -->
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
<!-- <script src="https://www.gstatic.com/firebasejs/4.9.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.9.0/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.9.0/firebase-storage.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.9.0/firebase-database.js"></script>
<script src="js/firebase.js"></script> -->
<script src="js/typed.js"></script>
<script src="js/script.js"></script>
<script>
    var typed = new Typed('.texto-direito h1 b', {
        strings: ["Ser diferente.", "Crescer.","Objetive TI"],
        typeSpeed: 80,
        startDelay: 200,
        backSpeed: 50,
        backDelay: 1500,
        loop: true,
        loopCount: Infinity
    });
</script>

</body>
</html>
<?php 
}
?>