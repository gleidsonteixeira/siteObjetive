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
        </ul>
        <i class="mdi-navigation-menu click menu-btn circle button-collapse hide-on-large-only" data-activates="slide-out"></i>

        <header id="topo" class="suave">
            <div class="logo suave">
                <h1 class="nm" alt="Direto na Mídia">
                    <a href="index.php" title="" class="font suave">
                        <img src="img/wallet-logo.png" alt="Wallet Family"/>
                    </a>
                </h1>
            </div>
            <div class="menu hide-on-med-and-down suave">
                <ul class="nm">
                    <li class="active">
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
                        <a href="#como-funciona" class="suave font scrollto">
                            Como Funciona
                        </a>
                    </li>
                    <li>
                        <a href="#vantagens" class="suave font scrollto">
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
            <section id="video" class="suave">
                <i class="mdi-navigation-close close white-text click"></i>
                <div class="video"></div>
            </section>
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
                        <ul class="nm"></ul>
                        <input type="hidden" id="sala">
                        <input type="hidden" id="nome">
                        <input type="text" id="chat-resposta" placeholder="Digite sua pergunta" required>
                        <button><i class="mdi-content-send"></i></button>
                    </div>
                </div> 
            </section>
            <section id="banner">
                <div class="slider">
                    <ul class="slides">
                        <?php 
                        $rs = $con->query("select * from banner;");
                        while($row = $rs->fetch(PDO::FETCH_OBJ)){
                            ?>

                            <li>
                                <img src=<?php echo $row->ds_caminho_img_banner; ?> alt="">
                                <div class="caption right-align">
                                    <h6 class="subtitulo font"><?php echo $row->ds_pre_titulo; ?></h6>
                                    <h1 class="titulo fontbold"><?php echo $row->ds_titulo; ?></h1>
                                    <div class="clear"></div>
                                    <a data-video=<?php echo $row->ds_link_video; ?> class="font click chamaVideo"><b>Assista o vídeo</b><i class="mdi-av-play-arrow right"></i></a>
                                </div>
                            </li>
                            <?php 
                            }
                        ?>
                </ul>
            </div>
        </section>
        <section id="recursos">
            <div class="container">
                <div class="row nm">
                    <div class="col l6 m12 s12">
                        <div class="descricao">
                            <h6 class="subtitulo font">Facilite sua vida com as carteiras digitais</h6>
                            <h1 class="titulo fontbold">Wallet Family</h1>
                            <div class="clear"></div>
                            <p>Para investir com inteligência e performace, a Wallet Family transforma vidas e tudo fica mais fácil para gerenciar seu dinheiro.</p>
                            <a href="https://walletfamily.com/register/" class="fontbold suave"><span>Criar Conta</span></a>
                        </div>
                    </div>
                    <div class="col l6 m12 s12 wow bounceInRight">
                        <ul>
                            <li class="suave">
                                <img src="img/icones/ico1.png" class="suave">
                                <div class="sublista suave">
                                    <h6 class="font suave"><b>Cartões</b></h6>
                                    <span class="font suave um"><b>Visa</b></span>
                                    <span class="font suave dois"><b>Master Card</b></span>
                                    <span class="font suave tres"><b>American Express</b></span>
                                    <span class="font suave quatro"><b>Hipercard</b></span>
                                </div>
                                <div class="hover suave">
                                    <h6 class="font suave"><b>Cartões pré pagos</br>Cartões de Crédito</b></h6>
                                </div>
                            </li>
                            <li>
                                <img src="img/icones/ico5.png" class="suave">
                                <div class="sublista suave">
                                    <h6 class="font suave"><b>Criptomoedas</b></h6>
                                    <span class="font suave um"><b>Bitcoin</b></span>
                                    <span class="font suave dois"><b>Ripple</b></span>
                                    <span class="font suave tres"><b>Ethereum</b></span>
                                    <span class="font suave quatro"><b>Litecoin</b></span>
                                </div>
                                <div class="hover suave">
                                    <h6 class="font suave"><b>Recarregue sua carteira utilizando criptomoedas</b></h6>
                                </div>
                            </li>
                            <li>
                                <img src="img/icones/ico4.png" class="suave">
                                <div class="sublista suave">
                                    <h6 class="font suave"><b>Recargas</b></h6>
                                    <span class="font suave um"><b>Google Play</b></span>
                                    <span class="font suave dois"><b>Netflix</b></span>
                                    <span class="font suave tres"><b>Playstation Store</b></span>
                                    <span class="font suave quatro"><b>Legue of Legends</b></span>
                                </div>
                                <div class="hover suave">
                                    <h6 class="font suave"><b>Telefonia</br>netflix</br>google play</br>playstore</b></h6>
                                </div>
                            </li>
                            <li>
                                <img src="img/icones/ico3.png" class="suave">
                                <div class="sublista suave">
                                    <h6 class="font suave"><b>Pagamentos</b></h6>
                                    <span class="font suave um"><b>Água</b></span>
                                    <span class="font suave dois"><b>Luz</b></span>
                                    <span class="font suave tres"><b>Telefone</b></span>
                                    <span class="font suave quatro"><b>Internet</b></span>
                                </div>
                                <div class="hover suave">
                                    <h6 class="font suave"><b>pague suas contas</br>de forma fácil</b></h6>
                                </div>
                            </li>
                            <div class="clear"></div>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section id="aplicativos">
            <div class="container">
                <div class="row nm">
                    <div class="col l7 m6 s12">
                        <img src="img/aplicativos.png">
                    </div>
                    <div class="col l4 m6 s12">
                        <h3 class="fontbold">Abra sua conta digital na Wallet Family</h3>
                        <ul>
                            <li>
                                <h6 class="fontbold"><i class="mdi-action-done"></i>Fácil de usar</h6>
                                <p class="font">0s melhores serviços e atendimento, inclusive nas redes sociais. Tudo para seu dinheiro render.</p>
                            </li>
                            <li>
                                <h6 class="fontbold"><i class="mdi-action-done"></i>Fácil de receber</h6>
                                <p class="font">Você pode gerar um boleto de cobrança e receber direto em sua conta simples e seguro.</p>
                            </li>
                            <li>
                                <h6 class="fontbold"><i class="mdi-action-done"></i>Fácil de gerenciar</h6>
                                <p class="font">Simplicidade e experiência, para você gerenciar seu negócio com rapidez e comodidade.</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section id="como-funciona">
            <div class="container">
                <h3 class="center-align fontbold">Como Funciona</h3>
                <div class="row nm">
                    <div class="col l4 center-align m4 s12">
                        <div class="item suave">
                            <i class="mdi-action-account-balance-wallet suave"></i>
                            <h6 class="font"><b>Crie sua conta</b></h6>
                            <p class="font">Crie sua conta de forma simples e rápida em poucos minutos.</p>
                        </div>
                    </div>
                    <div class="col l4 center-align m4 s12">
                        <div class="item suave">
                            <i class="mdi-action-assignment-ind suave"></i>
                            <h6 class="font"><b>Informe seus dados</b></h6>
                            <p class="font">Complete seus dados pessoais e bancários.</p>
                        </div>
                    </div>
                    <div class="col l4 center-align m4 s12">
                        <div class="item suave">
                            <i class="mdi-editor-attach-money suave"></i>
                            <h6 class="font"><b>Comece a receber</b></h6>
                            <p class="font">Após a aprovação você está pronto para gerenciar e receber suas cobranças.</p>
                        </div>
                    </div>
                </div>
                <a href="https://walletfamily.com/register/" class="fontbold"><span>Criar Conta</span></a>
            </div>
        </section>
        <section id="vantagens">
            <div class="container">
                <div class="row nm">
                    <!-- <div class="col m8 offset-m2 s12 hide-on-large-only">
                        <img src="img/cartoes.png">
                    </div> -->
                    <div class="col l4 m12 s12">
                        <h3 class="fontbold">Menores taxas do mercado</h3>
                        <ul>
                            <li>
                                <h6 class="fontbold"><i class="mdi-action-done"></i>Transferências entre associados</h6>
                                <p class="font">Realize suas transferências entre contas direto do seu smartphone. </p>
                            </li>
                            <li>
                                <h6 class="fontbold"><i class="mdi-action-done"></i>Evite filas em bancos e lotéricas</h6>
                                <p class="font">A alternativa que você precisava para evitar filas, otimizando seu tempo de forma inteligente e, é claro, economizando dinheiro.</p>
                            </li>
                            <li>
                                <h6 class="fontbold"><i class="mdi-action-done"></i>Faça cobrança por boletos</h6>
                                <p class="font">Utilizando a Wallet Family, você pode emitir boleto bancário diretamente da sua plataforma com agilidade e o menor preço.</p>
                            </li>
                        </ul>
                    </div>
                    <div class="col l5 m8 offset-m2 s12">
                        <img src="img/cartoes.png">
                    </div>
                </div>
            </div>
        </section>
        <section id="blog">
            <div class="container">
                <h3 class="center-align fontbold">Blog</h3>
                <div class="row nm">
                    <?php 

                    $rs = $con->query("select post_blog.* from post_blog order by data_hora LIMIT 2;");
                    $i = 1;
                    while($row = $rs->fetch(PDO::FETCH_OBJ)){
                        if ($i == 2) {
                            ?>
                            <div class="col l6 m6 s12 hide-on-small-only">
                                <div class="item suave">
                                    <span class="data white-text"><b><?php echo $row->data_hora; ?></b></span>
                                    <div class="imagem">
                                        <img src="<?php echo $row->ds_caminho_img_destaque; ?>">
                                    </div>
                                    <div class="descricao">
                                        <h6><b><?php echo $row->categoria_ds_categoria; ?></b></h6>
                                        <h5 class="fontbold"><?php echo $row->ds_titulo; ?>.</h5>
                                        <p class="font" style="height: 150px; overflow: hidden;"><?php echo $row->ds_conteudo; ?></p>
                                        <a href="blog-post.php?idpost_blog=<?php echo $row->idpost_blog ?>" class="fontbold">Leia mais <i class="mdi-navigation-arrow-forward right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <?php 
                        }else{
                            ?>
                            <div class="col l6 m6 s12">
                                <div class="item suave">
                                    <span class="data white-text"><b><?php echo $row->data_hora; ?></b></span>
                                    <div class="imagem">
                                        <img src="<?php echo $row->ds_caminho_img_destaque; ?>">
                                    </div>
                                    <div class="descricao">
                                        <h6><b><?php echo $row->categoria_ds_categoria; ?></b></h6>
                                        <h5 class="fontbold"><?php echo $row->ds_titulo; ?>.</h5>
                                        <p class="font" style="height: 150px; overflow: hidden;"><?php echo $row->ds_conteudo; ?></p>
                                        <a href="blog-post.php?idpost_blog=<?php echo $row->idpost_blog ?>" class="fontbold">Leia mais <i class="mdi-navigation-arrow-forward right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }

                        $i++;
                    }
                    ?>
                </div>
                <a href="blog.php" class="fontbold vermais"><span>Ver todos</span></a>
            </div>
        </section>
        <section id="depoimentos">
            <div class="container">
                <div class="next click suave"><i class="mdi-hardware-keyboard-arrow-right"></i></div>
                <div class="prev click suave"><i class="mdi-hardware-keyboard-arrow-left"></i></div>
                <div class="slidedepoimentos">
                    <ul>
                        <?php 
                        $rs = $con->query("select * from depoimento;");
                        while($row = $rs->fetch(PDO::FETCH_OBJ)){
                            ?>
                            <li class="item">
                                <p><?php echo $row->ds_depoimento; ?></p>
                                <img src=<?php echo $row->ds_caminho_img_entrevistado; ?>>
                                <h6 class="font">
                                    <?php echo $row->ds_nome_entrevistado; ?>
                                </h6>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
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
                        <li class="font"><a href="#!">Quem somos</a></li>
                        <li class="font"><a href="#!">Termos de uso</a></li>
                        <li class="font"><a href="#!">Regras</a></li>
                        <li class="font"><a href="blog.php">Blog</a></li>
                        <li class="font"><a href="faq.php">FAQ</a></li>
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
                <div id="alerta" class="suave">
                    <p class="font"><i class="mdi-alert-error left"></i><span>Mensagem</span></p>
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
        <h5 class="center-align nm font">
        &copy 2018 Wallet Family | Todos os direitos reservados.</b>
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
<script>
    logarAnonimamente();
    chat();
    depoimentos();
    deslogarAutomaticamente();
</script>

</body>
</html>
<?php 
}
?>