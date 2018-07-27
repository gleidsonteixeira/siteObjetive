<?php 
session_start();

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
                        <div class="chamado-item white suave">
                            <h5 class="mini-title">
                                <b class="light-blue white-text z-depth-2 c_id"></b> 
                                <b class="light-blue white-text z-depth-2 c_tipo"></b>
                                <span class="right c_data"></span>
                            </h5>
                            <h4 class="light c_titulo"></h4>
                            <div class="titulo">
                                <div class="foto">
                                    <img src="img/p1.png" class="responsive-img circle p_foto"/>
                                </div>
                                <h6><b class="truncate p_nome"></b><span class="p_empresa"></span></h6>
                                <h6 class="nm">
                                    <b class="light-blue-text p_email"></b>
                                </h6>
                            </div>
                            <div class="divider"></div>
                            <div class="mini-descricao c_descricao"></div>
                            <p>
                                <b>Prioridade:</b>
                                <span class="white-text c_prioridade" style="font-weight: bold;"></span>
                            </p>
                            <p class="c_anexos hide">
                                <b>Anexos:</b>
                                <div id="anexos" class="anexos"></div>
                            </p>
                        </div>
                        <div id="respostas"></div>
                        <div class="chamado-item transparent np" style="box-shadow:none;height:0;"></div>
                        <form id="responderChamado" class="white">
                            <h6 class="mini-title"><b>Responder</b></h6>
                            <input type="hidden" id="numeroDeRespostas">
                            <textarea id="resposta" class="materialize-textarea" placeholder="Escreva sua resposta"></textarea>
                            <div class="file-field input-field nm">
                                <div class="btn light-blue">
                                    <span style="text-transform: capitalize;">
                                        <i class="mdi-editor-attach-file left"></i> Anexar
                                    </span>
                                    <input id="anexosResposta" type="file" multiple>
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="Envie um ou mais arquivos">
                                </div>
                                <div class="progress blue-grey lighten-4">
                                    <div id="progresso" class="determinate light-blue"></div>
                                </div>
                                <!-- <p>
                                    <input type="checkbox" id="solucao"/>
                                    <label for="solucao">Chamado solucionado</label>
                                </p> -->
                            </div>
                            <div class="right-align">
                                <a class="light-blue white-text click openAnalistas hide">
                                    <i class="mdi-action-done left"></i> Aceitar solução
                                </a>
                                <a class="light-blue white-text click openAnalistas hide">
                                    <i class="mdi-navigation-close left"></i> Rejeitar solução
                                </a>
                                <button type="submit" class="light-blue white-text">
                                    <i class="mdi-content-send right"></i> Enviar
                                </button>
                            </div>
                        </form>
                    </div>
                    <div id="alerta" class="suave">
                        <p class="font"><i class="mdi-alert-error left"></i><span>Cliente Encerrado</span></p>
                    </div>
                    <div id="alertaT" class="suave">
                        <p class="font"><i class="mdi-alert-error left"></i><span></span></p>
                    </div>
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
            chamadoSelecionado();
            ResponderChamado();
            encerrarChamado();
            statusResposta();
        </script>
    </body>
    </html>
    <?php 
}else{
    echo "<script> window.close(); </script>";
}
?>