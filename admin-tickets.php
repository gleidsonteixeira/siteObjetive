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
        <link rel="stylesheet" href="css/estilo2.css" type="text/css"/>
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
                <h6 class="font white-text">
                    <div class="nome">
                        <?php echo $_SESSION['ds_nome'];  ?>
                    </div>
                    <span class="cargo u_nivel"><?php if($_SESSION['tipo_usuario_idtipo_usuario'] == 1){echo "Administrador";}else{echo "Atendente";}  ?></span>
                </h6>
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
            <h3 class="font suave"><span>Tickets</span></h3>
            <div class="tickets">
                <div id="corpo">
                    <div class="chamados">
                        <ul class="nm items-lista">
                            <li style="opacity: 1;">
                                <a style="color: #999;">
                                    <h6 class="codigo">
                                        <div class="legenda status" style="background-color: #999;"></div>
                                        <b>#id</b>
                                    </h6>
                                    <h6 class="titulo truncate">
                                        <b>Titulo do Ticket</b>
                                    </h6>
                                    <h6 class="cliente truncate">
                                        <b>Cliente</b>
                                        <h6 class="data">
                                            <span class="mini-title">data da solicitação</span>
                                        </h6>
                                    </a>
                                </li>
                            </ul>
                            <ul id="listaChamados" class="nm items-lista"></ul>
                        </div>
                        <div id="alertaT" class="suave">
                            <div class="alertaConteudo white suave">
                                <i class="mdi-communication-chat light-blue white-text circle"></i>
                                <p class="nm"></p>
                                <span class="cancelar hide suave click">Cancelar</span>
                                <span class="confirmar hide suave click">Confirmar</span>
                            </div>
                        </div>
                        <div id="atualizarPrioridade" class="suave">
                            <div class="lista white suave">
                                <span class="fechar right light-blue white-text circle click">
                                    <i class="mdi-navigation-close"></i>
                                </span>
                                <h6 class="mini-title">
                                    <b>Defina a prioridade</b>
                                </h6>
                                <form>
                                    <ul id="listaPrioridade">
                                        <li class="click mini-title select" data-value="1"><b>baixa</b></li>
                                        <li class="click mini-title" data-value="2"><b>média</b></li>
                                        <li class="click mini-title" data-value="3"><b>alta</b></li>
                                        <li class="click mini-title" data-value="4"><b>máxima</b></li>
                                    </ul>
                                    <button class="light-blue white-text">Confirmar</button>
                                </form>
                            </div>
                        </div>
                        <div id="indexLoading" class="suave hide">
                            <div class="preloader-wrapper big active">
                                <div class="spinner-layer spinner-blue-only">
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
                        <div id="analistas" class="suave">
                            <div class="lista white suave">
                                <span class="fechar right light-blue white-text circle click">
                                    <i class="mdi-navigation-close"></i>
                                </span>
                                <h6 class="mini-title">
                                    <b>Escolha um atendente</b>
                                </h6>
                                <form>
                                    <input type="search" name="buscaAnalista" placeholder="Procurar atendente" class="blue-grey lighten-5">
                                    <input type="hidden" id="contaCliente">
                                    <input type="hidden" id="idCliente">
                                    <ul id="listaAnalistas">
                                        <?php 
                                        $rs = $con->query("select idusuario,ds_nome from usuario;");

                                        while($row = $rs->fetch(PDO::FETCH_OBJ)){

                                            ?>
                                            <li>
                                                <p>
                                                    <input type="radio" name="analista" class="analista" id="<?php echo $row->idusuario; ?>" value=<?php echo $row->idusuario; ?> />
                                                    <label for="<?php echo $row->idusuario; ?>"><?php echo $row->ds_nome; ?></label>
                                                </p>
                                            </li>
                                            <?php 
                                        }
                                        ?>
                                    </ul>
                                    <button class="light-blue white-text">Confirmar</button>
                                </form>
                            </div>
                        </div>
                        <div id="alerta" class="suave">
                            <div class="alertaConteudo white suave">
                                <i class="mdi-communication-chat light-blue white-text circle"></i>
                                <p class="nm"></p>
                            </div>
                        </div>
                    </div>
                    <div id="alerta" class="suave">
                        <p class="font"><i class="mdi-alert-error left"></i>
                            <span>Cliente Encerrado</span>
                        </p>
                    </div>
                </div>
            </div>

            <script src="js/jquery.js"></script>
            <script src="js/materialize.js"></script>
            <script src="https://www.gstatic.com/firebasejs/4.9.0/firebase-app.js"></script>
            <script src="https://www.gstatic.com/firebasejs/4.9.0/firebase-auth.js"></script>
            <script src="https://www.gstatic.com/firebasejs/4.9.0/firebase-storage.js"></script>
            <script src="https://www.gstatic.com/firebasejs/4.9.0/firebase-database.js"></script>
            <script src="js/tickets.js"></script>
            <script src="js/script.js"></script>
            <script>
                carregarAtendente();
                if($(".u_nivel").text() == 'Administrador'){
                    listaChamados();
                }else{
                    listaChamadosAnalista();
                }
                analistas();
            </script>
        </body>
        </html>

        <?php 
    }else{
        header('Location: index.php');
    }
    ?>