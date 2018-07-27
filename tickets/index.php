<?php 
session_start();

if (isset($_POST['nomeCompleto']) && isset($_POST['conta']) && isset($_POST['img'])) {

    if (!empty($_POST['nomeCompleto']) && !empty($_POST['conta']) && !empty($_POST['img'])) {

        $_SESSION['nomeCompleto']   = $_POST['nomeCompleto'];
        $_SESSION['conta']   = $_POST['conta'];
        $_SESSION['img']   = $_POST['img'];

        $_SESSION['tickets'] = true;


    }else{
        echo "<script> window.close(); </script>";
    }
}else if (isset($_GET['logout'])) {
    session_destroy();
    ?>
    <script> 
        window.close();
    </script>
    <?php

    echo "dokd";

}

if (isset($_SESSION['tickets'])) {

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
                <img class="u_foto" src="<?php echo $_SESSION['img']; ?>">
                <h6 class="font white-text" style="padding-top: 0;">
                    <div class="nome u_nome truncate">
                        <?php echo $_SESSION['nomeCompleto']; ?>
                    </div>
                    <span class="cargo u_nivel" style="text-transform: capitalize;">cliente</span>
                    <span id="idusuario" class="u_id"><?php echo $_SESSION['conta']; ?></span>
                </h6>
            </div>
            <span class="font">Área Administrativa:</span>
            <ul class="nm">
                <li>
                    <a href="index.php" class="font suave"><i class="mdi-social-group"></i> Tickets</a>
                </li>
                <li>
                    <a href="index.php?logout" class="font suave"><i class="mdi-action-lock-open"></i> Sair</a>
                </li>
            </ul>
        </div>

        <div id="content" class="active suave">
            <i class="mdi-navigation-menu menu-btn suave click"></i>
            <h3 class="font suave"><span>Tickets</span></h3>
            <div class="tickets">
                <div id="corpo">
                    <div class="chamados">
                        <ul class="nm items-lista">
                            <li style="opacity:1;">
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
                                    </h6>
                                </a>
                            </li>
                        </ul>
                        <ul id="listaChamados" class="nm items-lista"></ul>
                        <button class="novoTicket fontbold"><i class="mdi-content-add left"></i>Novo Ticket</button>
                    </div>

                    <div id="novoChamado" class="suave">
                        <div class="form white suave">
                            <a class="fechar right light-blue white-text circle click">
                                <i class="mdi-navigation-close"></i>
                            </a>
                            <h6 class="mini-title">
                                <b>Novo Ticket</b>
                            </h6>
                            <input type="text" id="tituloChamado" name="titulodochamado" placeholder="Ocorrência" required>
                            <input type="text" id="destinatario" class="u_email" placeholder="Digite seu email" required>
                            <input type="hidden" id="contaChamado" name="contadochamado">
                            <input type="hidden" id="emailAbriuChamado">
                            <textarea id="descricao" class="materialize-textarea" placeholder="Descrição" required></textarea>
                            <div class="file-field input-field nm">
                                <div class="btn light-blue">
                                    <span style="text-transform: capitalize;">
                                        <i class="mdi-editor-attach-file left"></i> Anexar
                                    </span>
                                    <input id="anexos" type="file" multiple>
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="Envie um ou mais arquivos">
                                </div>
                            </div>
                            <div class="progress blue-grey lighten-4">
                                <div id="progresso" class="determinate light-blue"></div>
                            </div>
                            <div class="selecti" style="width: 100%">
                                <select id="n-tipo">
                                    <option value="#" disabled selected>Tipo de Solicitação</option>
                                    <option value="suporte">Suporte</option>
                                    <!-- <option value="consultoria">Consultoria</option>
                                        <option value="solicitação">Solicitação</option> -->
                                    </select>
                                </div>
                                <div class="right-align">
                                    <button type="submit" class="light-blue white-text">
                                        <i class="mdi-content-send right"></i> Enviar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="alerta" class="suave">
                        <p class="font"><i class="mdi-alert-error left"></i><span>Cliente Encerrado</span></p>
                    </div>
                    <div id="alertaT" class="suave">
                        <div class="alertaConteudo white suave">
                            <i class="mdi-communication-chat light-blue white-text circle"></i>
                            <p class="nm"></p>
                            <span class="cancelar hide suave click">Cancelar</span>
                            <span class="confirmar hide suave click">Confirmar</span>
                        </div>
                    </div>
                </div>
            </div>

            <script src="js/jquery.js"></script>
            <script src="js/materialize.js"></script>
            <script src="js/goodscroll.js"></script>
            <script src="https://www.gstatic.com/firebasejs/4.9.0/firebase-app.js"></script>
            <script src="https://www.gstatic.com/firebasejs/4.9.0/firebase-auth.js"></script>
            <script src="https://www.gstatic.com/firebasejs/4.9.0/firebase-storage.js"></script>
            <script src="https://www.gstatic.com/firebasejs/4.9.0/firebase-database.js"></script>
            <script src="js/scriptTickets.js"></script>
            <script src="js/tickets.js"></script>
            <script src="js/script.js"></script>
            <script>
                carregarUsuario();
                listaChamadosCliente();
                novoChamado();
            </script>
        </body>
        </html>
        <?php 
    }else{
        echo "<script> window.close(); </script>";
    }
    ?>