// $(document).ready(function(){
// Initialize Firebase
    var config2 = {
        apiKey: "AIzaSyATUhPiYmpk86MYr_3Ce7CoTCyXbwgHXZQ",
        authDomain: "ticketwalletfamily.firebaseapp.com",
        databaseURL: "https://ticketwalletfamily.firebaseio.com",
        projectId: "ticketwalletfamily",
        storageBucket: "ticketwalletfamily.appspot.com",
        messagingSenderId: "50628195314"
    };
    var app2 = firebase.initializeApp(config2);
//GLOBAL VARIABLES
    var countChamados;
    var database = app2.database().ref();
    var storageRef = app2.storage().ref();

    //GET USER INFO
    // function getUserInfo(){
    //     var user = firebase.auth().currentUser;
    //     if (user != null) {
    //         var database = firebase.database().ref();
    //         var usuarioRef = database.child('chat-atendentes');
    //         var id = $(".u_id");
    //         var nome = $(".u_nome");
    //         var foto = $(".u_foto");
    //         var email = $(".u_email");
    //         var nivel = $(".u_nivel");
    //         var empresa_id = $(".u_empresa_id");
    //         var empresa_nome = $(".u_empresa_nome");

    //         usuarioRef.on('value', function(data){
    //             data.forEach( d => {
    //                 if(d.val().usuario_id == user.uid){
    //                     id.key;
    //                     nome.text(d.val().nome_completo);
    //                     foto.attr("src", d.val().usuario_foto);
    //                     email.val(d.val().usuario);
    //                     email.text(d.val().usuario);
    //                     nivel.val(d.val().tipo);
    //                     empresa_id.val(d.val().empresa_id);
    //                     empresa_nome.val(d.val().empresa_nome);

    //                     if(nivel.val() == "admin"){
    //                         listaChamados();
    //                         contaAnalistas();
    //                         contaEmpresas();
    //                         $("#indexLoading").removeClass("active");
    //                     }else if(nivel.val() == "analista"){
    //                         listaChamadosAnalista(user.uid);
    //                         $(".admin").remove();
    //                         $("#indexLoading").removeClass("active");
    //                     }else if(nivel.val() == "cliente"){
    //                         $("#listaChamados").removeClass("items");
    //                         $("#listaChamados").addClass("items-lista");
    //                         $(".admin").remove();
    //                         $(".analista").remove();
    //                         $("#indexLoading").removeClass("active");
    //                         listaChamadosCliente(user.uid);
    //                     }
    //                 }
    //             });
    //         });
    //     }
    // }

    //GET USER INFO
    // function getUserInfo2(){
    //     var user = firebase.auth().currentUser;
    //     if (user != null) {
    //         var database = firebase.database().ref();
    //         var usuarioRef = database.child('empresas_usuarios');
    //         var id = $(".u_id");
    //         var nome = $(".u_nome");
    //         var foto = $(".u_foto");
    //         var email = $(".u_email");
    //         var nivel = $(".u_nivel");
    //         var empresa_id = $(".u_empresa_id");
    //         var empresa_nome = $(".u_empresa_nome");

    //         usuarioRef.on('value', function(data){
    //             data.forEach( d => {
    //                 if(d.val().usuario_id == user.uid){
    //                     id.val(user.uid);
    //                     nome.text(d.val().nome_completo);
    //                     foto.attr("src", d.val().usuario_foto);
    //                     email.val(d.val().usuario);
    //                     email.text(d.val().usuario);
    //                     nivel.val(d.val().tipo);
    //                     empresa_id.val(d.val().empresa_id);
    //                     empresa_nome.val(d.val().empresa_nome);
    //                     $("#analistaResponsavel").val(d.val().nome_completo);
    //                     $("#remetente").val(d.val().usuario);
    //                 }
    //                 if(nivel.val() == "admin"){
    //                     $("#indexLoading").removeClass("active");
    //                 }else if(nivel.val() == "analista"){
    //                     $(".admin").remove();
    //                     $("#indexLoading").removeClass("active");
    //                 }else if(nivel.val() == "cliente"){
    //                     $(".admin").remove();
    //                     $("#indexLoading").removeClass("active");
    //                 }
    //             })
    //         });
    //     }
    // }

    //LISTA CHAMADOS
    function listaChamados(){
        var database = firebase.database().ref();
        var databaseRef = database.child('chamados');
        var listaChamados = document.getElementById('listaChamados');
        var chamadosEmAberto;
        databaseRef.on('value', function(a){
            $(listaChamados).empty();
            chamadosEmAberto = 0;
            a.forEach( b =>{
                b.forEach( c => {
                    var chamado = document.createElement('li');
                    var prioridade = "";
                    chamado.classList.add(c.val().usuario_id);
                    if(c.val().prioridade == 1){
                        prioridade = "baixa";
                    }else if(c.val().prioridade == 2){
                        prioridade = "média";
                    }else if(c.val().prioridade == 3){
                        prioridade = "alta";
                    }else if(c.val().prioridade == 4){
                        prioridade = "máxima";
                    }
                    if(c.val().status != 6 && c.val().status != 5){
                        chamadosEmAberto++;
                    }
                    var statusAtual = '';
                    if(c.val().status == 1){
                        statusAtual = "Aberto";
                    }else if(c.val().status == 2){
                        statusAtual = "Aguardando Atendente";
                    }else if(c.val().status == 3){
                        statusAtual = "Aguardando Cliente";
                    }else if(c.val().status == 5){
                        statusAtual = "Encerrado pelo Cliente";
                    }else if(c.val().status == 6){
                        statusAtual = "Encerrado pelo Atendente";
                    }
                    var html =  '<a href="admin-ticket.php?chamado_id='+c.val().chamado_id+'='+c.val().quem_abriu_chamado+'">'+
                                    '<h6 class="codigo">'+
                                        '<div  title="'+statusAtual+'" class="legenda status'+c.val().status+'"></div>'+
                                        '<b class="light-blue white-text z-depth-2">#'+c.val().chamado_indice+'</b>'+
                                    '</h6>'+
                                    '<h6 class="titulo truncate">'+
                                        '<b>'+c.val().titulo+'</b>'+
                                    '</h6>'+
                                    '<h6 class="cliente truncate">'+
                                        '<b>'+c.val().usuario_nome+'</b>'+
                                    '<h6 class="data">'+
                                        '<span class="mini-title">'+c.val().data_solicitacao+'</span>'+
                                    '</h6>'+
                                '</a>'+
                                '<h6 class="opcoes click">'+
                                    '<i class="mdi-navigation-more-vert"></i>'+
                                    '<div class="opcoes-list suave">'+
                                        '<span class="editChamado click waves-effect mini-title" data-id="'+c.val().chamado_id+'" data-conta="'+c.val().quem_abriu_chamado+'">'+
                                            '<i class="mdi-communication-import-export left"></i> Mudar prioridade'+
                                        '</span>'+
                                        '<span class="openAnalistas click waves-effect mini-title" data-id="'+c.val().chamado_id+'" data-conta="'+c.val().quem_abriu_chamado+'">'+
                                            '<i class="mdi-social-person-add left"></i> Definir atendente'+
                                        '</span>'+
                                        '<span class="deleteChamado click waves-effect mini-title" data-id="'+c.val().chamado_id+'" data-conta="'+c.val().quem_abriu_chamado+'">'+
                                            '<i class="mdi-action-delete left"></i> Deletar ticket'+
                                        '</span>'+
                                    '</div>'+
                                '</h6>';
                    chamado.innerHTML = html;
                    listaChamados.appendChild(chamado);
                });
            });
            $(".chamados-header .chamadosAbertos span").text(chamadosEmAberto);
        });
        // setTimeout(function(){
        //     Materialize.showStaggeredList("#listaChamados");
        // },2000);
    }

    //LISTA CHAMADOS POR ANALISTA
    function listaChamadosAnalista(){
        var atendenteLogado = $("#idusuario").val();
        var database = firebase.database().ref();
        var databaseRef = database.child('chamados');
        var listaChamados = document.getElementById('listaChamados');
        var chamadosEmAberto;
        databaseRef.on('value', function(a){
            $(listaChamados).empty();
            chamadosEmAberto = 0;
            a.forEach( b =>{
                b.forEach( c => {
                    if(c.val().analista_id == atendenteLogado){
                        var chamado = document.createElement('li');
                        var prioridade = "";
                        chamado.classList.add(c.val().usuario_id);
                        if(c.val().prioridade == 1){
                            prioridade = "baixa";
                        }else if(c.val().prioridade == 2){
                            prioridade = "média";
                        }else if(c.val().prioridade == 3){
                            prioridade = "alta";
                        }else if(c.val().prioridade == 4){
                            prioridade = "máxima";
                        }
                        if(c.val().status != 6 && c.val().status != 5){
                            chamadosEmAberto++;
                        }
                        var html =  '<a href="admin-ticket.php?chamado_id='+c.val().chamado_id+'='+c.val().quem_abriu_chamado+'">'+
                                        '<h6 class="codigo">'+
                                            '<div class="legenda status'+c.val().status+'"></div>'+
                                            '<b class="light-blue white-text z-depth-2">#'+c.val().chamado_indice+'</b>'+
                                        '</h6>'+
                                        '<h6 class="titulo truncate">'+
                                            '<b>'+c.val().titulo+'</b>'+
                                        '</h6>'+
                                        '<h6 class="cliente truncate">'+
                                            '<b>'+c.val().usuario_nome+'</b>'+
                                        '<h6 class="data">'+
                                            '<span class="mini-title">'+c.val().data_solicitacao+'</span>'+
                                        '</h6>'+
                                    '</a>';
                                    // '<h6 class="opcoes click">'+
                                    //     '<i class="mdi-navigation-more-vert"></i>'+
                                    //     '<div class="opcoes-list suave">'+
                                    //         '<span class="editChamado click waves-effect mini-title" data-id="'+c.val().chamado_id+'" data-conta="'+c.val().quem_abriu_chamado+'">'+
                                    //             '<i class="mdi-communication-import-export left"></i> Mudar prioridade'+
                                    //         '</span>'+
                                    //         '<span class="openAnalistas click waves-effect mini-title" data-id="'+c.val().chamado_id+'" data-conta="'+c.val().quem_abriu_chamado+'">'+
                                    //             '<i class="mdi-social-person-add left"></i> Definir atendente'+
                                    //         '</span>'+
                                    //         '<span class="deleteChamado click waves-effect mini-title" data-id="'+c.val().chamado_id+'" data-conta="'+c.val().quem_abriu_chamado+'">'+
                                    //             '<i class="mdi-action-delete left"></i> Deletar chamado'+
                                    //         '</span>'+
                                    //     '</div>'+
                                    // '</h6>';
                        chamado.innerHTML = html;
                        listaChamados.appendChild(chamado);
                    }
                });
            });
            $(".chamados-header .chamadosAbertos span").text(chamadosEmAberto);
        });
        // setTimeout(function(){
        //     Materialize.showStaggeredList("#listaChamados");
        // },2000);
    }

    //LISTA CHAMADOS POR CLIENTE
    // function listaChamadosCliente(){
    //     var urlRef = window.location.search.slice(1).split("=");
    //     if(urlRef == ""){
    //         console.log("tem q logar");
    //     }else{
    //         var databaseRef = database.child('chamados').orderByChild('conta').equalTo(urlRef[1]);
    //         var listaChamados = document.getElementById('listaChamados');
    //         var chamadosEmAberto;

    //         databaseRef.on('value', function(snapshot){
    //             $(listaChamados).empty();
    //             chamadosEmAberto = 0;
    //             snapshot.forEach( c => {
    //                 var chamado = document.createElement('li');
    //                 var prioridade = "";
    //                 chamado.classList.add(c.val().usuario_id);
    //                 if(c.val().prioridade == 1){
    //                     prioridade = "baixa";
    //                 }else if(c.val().prioridade == 2){
    //                     prioridade = "média";
    //                 }else if(c.val().prioridade == 3){
    //                     prioridade = "alta";
    //                 }else if(c.val().prioridade == 4){
    //                     prioridade = "máxima";
    //                 }
    //                 if(c.val().status != 6 && c.val().status != 5){
    //                     chamadosEmAberto++;
    //                 }
    //                 var html =  '<a href="usuario-ticket.php?chamado_id='+c.val().chamado_id+'='+c.val().conta+'">'+
    //                                 '<h6 class="codigo">'+
    //                                     '<div class="legenda status'+c.val().status+'"></div>'+
    //                                     '<b class="light-blue white-text z-depth-2">#'+c.val().chamado_indice+'</b>'+
    //                                 '</h6>'+
    //                                 '<h6 class="titulo truncate">'+
    //                                     '<b>'+c.val().titulo+'</b>'+
    //                                 '</h6>'+
    //                                 '<h6 class="cliente truncate">'+
    //                                     '<b>'+c.val().usuario_empresa_nome+'</b>'+
    //                                 '<h6 class="data">'+
    //                                     '<span class="mini-title">'+c.val().data_solicitacao+'</span>'+
    //                                 '</h6>'+
    //                             '</a>';
    //                 chamado.innerHTML = html;
    //                 listaChamados.appendChild(chamado);
    //             });
    //             $(".chamados-header h6 b span").text(chamadosEmAberto);
    //         });
    //         setTimeout(function(){
    //             Materialize.showStaggeredList("#listaChamados");
    //         },1000);
    //     }
    // }

    //function relistaChamados(){
        //databaseRef = database.child("chamados");
        // databaseRef.on('child_added', function(snap){
        //     var id = $(".u_id").val();
        //     var nivel = $(".u_nivel").val();
        //     if(nivel == 'admin'){
        //         listaChamados();
        //     }else if(nivel == 'analista'){
        //         listaChamadosAnalista(id);
        //     }else if(nivel == 'cliente'){
        //         listaChamadosCliente(id);
        //     }
        // });
        // databaseRef.on('child_changed', function(snap){
        //     var id = $(".u_id").val();
        //     var nivel = $(".u_nivel").text();
        //     if(nivel == 'admin'){
        //         listaChamados();
        //     }else if(nivel == 'analista'){
        //         listaChamadosAnalista(id);
        //     }else if(nivel == 'cliente'){
        //         listaChamadosCliente(id);
        //     }
        // });
    //}
    

    //NOVO CHAMADO
    // function novoChamado(){
    //     $(".novoTicket").click(function(){
    //         $("#novoChamado").addClass("active");
    //     })
    //     $("#novoChamado .fechar").click(function(){
    //         $("#novoChamado").removeClass("active");
    //     })
    //     var urlRef = window.location.search.slice(1).split("=");
    //     var chamadoRef = database.child("chamados/"+urlRef[1]);
    //     var chamadoIndiceRef = database.child("chamados_indice");
    //     var chamadoIndice = 0;
    //     var novoChamado = chamadoRef.push();
    //     var anexosChamado = 0;
    //     var anexosLista = new Array();
    //     var progress = $("#progresso");
    //     var fileInput = document.getElementById("anexos");
    //     fileInput.addEventListener('change', function(e){
    //         var itens = e.target.files.length;
    //         for(var y = 0; y < itens; y++){
    //             var file = e.target.files[y];
    //             console.log(file);
    //             var storageRef = firebase.storage().ref('anexos/'+ novoChamado.key +'/' + file.name);
    //             anexosLista.push(file.name);
    //             var task = storageRef.put(file);

    //             task.on('state_changed',
    //                 function progress(snap){
    //                     $("#novoChamado button").addClass("disable");
    //                     var porcentagem = (snap.bytesTransferred / snap.totalBytes) * 100;
    //                     $("#progresso").css({"width" : porcentagem + "%"});
    //                 },
    //                 function error(err){
    //                     console.log(err);
    //                     $("#alertaT p").text("ocorreu um problema, contate o administrador");
    //                     chamaAlerta();
    //                 },
    //                 function complete(){
    //                     $("#novoChamado button").removeClass("disable");
    //                     anexosChamado = anexosChamado + 1;
    //                 }
    //             );
    //         }
    //     });
    //     chamadoIndiceRef.on("value",function(data){
    //         chamadoIndice = data.val().chamado_indice;
    //     });
    //     $("#novoChamado .form button").click(function(e){
    //         e.preventDefault();
    //         var analistaId = 0;
    //         var conta = urlRef[1];
    //         var dataFechamento = 0;
    //         var dataSolicitacao = geraData();
    //         var descricaoChamado = $("#descricao").val();
    //         var prioridadeChamado = $("#n-prioridade option:selected").val();
    //         if(!prioridadeChamado){
    //             prioridadeChamado = 1;
    //         }
    //         var statusChamado = 1;
    //         var tipoChamado = $("#n-tipo").val();
    //         if(!tipoChamado){
    //             tipoChamado = "solicitação"
    //         }
    //         var tituloChamado = $("#tituloChamado").val();
    //         var usuarioId = $(".u_id").val();
    //         var usuarioNome = $(".u_nome").text();
    //         var usuarioFoto = $(".u_foto").attr("src");
    //         var usuarioEmail = $(".u_email").val();
    //         var quemAbriuChamado = conta;
    //         var emailAbriuChamado = $("#destinatario").val();
    //         if(tituloChamado == ''){
    //             alert("Insira o titulo da ocorrência");
    //         }else if(descricaoChamado == ''){
    //             alert("Descreva sua ocorrência");
    //         }else if(!quemAbriuChamado){
    //             alert("Selecione quem solicita o chamado");
    //         }else{            
    //             novoChamado.set({
    //                 analista_id : analistaId,
    //                 anexos : anexosChamado,
    //                 anexos_lista : anexosLista,
    //                 chamado_id : novoChamado.key,
    //                 chamado_indice: chamadoIndice,
    //                 data_fechamento : dataFechamento,
    //                 data_solicitacao : dataSolicitacao,
    //                 descricao : descricaoChamado,
    //                 respostas : 0,
    //                 prioridade : prioridadeChamado,
    //                 quem_abriu_chamado : quemAbriuChamado,
    //                 email_abriu_chamado : emailAbriuChamado,
    //                 status : statusChamado,
    //                 tipo : tipoChamado,
    //                 titulo : tituloChamado,
    //                 usuario_id : usuarioId,
    //                 usuario_nome : usuarioNome,
    //                 usuario_foto : usuarioFoto,
    //                 usuario_email : usuarioEmail
    //             })
    //             $("#novoChamado").removeClass("active");
    //             $("#alertaT p").text("Chamado criado com sucesso!")
    //             $("#alertaT i").removeClass("mdi-action-delete");
    //             $("#alertaT i").addClass("mdi-communication-chat");
    //             chamaAlerta();
    //             $("#tituloChamado").val("");
    //             $("#pessoasEnvolvidas").val("");
    //             $("#descricao").val("");
    //             $("#progresso").css({"width":"0%"});
    //             novoChamado = chamadoRef.push();
    //             setTimeout(function(){
    //                 // window.location.reload();
    //                 // Materialize.showStaggeredList("#listaChamados");
    //                 atualizaIndice(chamadoIndice);
    //             },1000);
    //         }
    //     });
    // }
    //novoChamado();

    // function atualizaIndice(indice){
    //     var chamadoIndiceRef = database.child("chamados_indice");
    //     chamadoIndiceRef.update({
    //         chamado_indice : ++indice
    //     });
    // }

    //DELETA CHAMADO
    function deletaChamados(){
        $(document).on("click",".deleteChamado",function(){
            var chamado_id = $(this).attr("data-id");
            var cliente_id = $(this).attr("data-conta");
            var chamadoRef = database.child("chamados/"+cliente_id+'/'+chamado_id);
            var chamadoHistoricoRef = database.child("chamados_historico/"+chamado_id);
            $("#alertaT .cancelar, #alertaT .confirmar").removeClass("hide");
            $("#alertaT i").addClass("mdi-action-delete");
            $("#alertaT i").removeClass("mdi-communication-chat");
            $("#alertaT p").text("Deseja realmente apagar esse ticket?");
            $("#alertaT").addClass("active");
            $("#alertaT .cancelar").click(function(){
                $("#alertaT").removeClass("active");
            })
            $("#alertaT .confirmar").click(function(){
                chamadoRef.remove();
                chamadoHistoricoRef.remove();
                $("#alertaT .cancelar, #alertaT .confirmar").addClass("hide");
                $("#alertaT p").text("Ticket apagado com sucesso!");
                setTimeout( function(){
                    $("#alertaT").removeClass("active");
                    window.location.reload();
                }, 2000);
            });
        });
        
    }deletaChamados();
    
    //CHAMADO SELECIONADO
    function chamadoSelecionado(){
        var database = firebase.database().ref();
        var urlRef = window.location.search.slice(1).split("=");
        if(urlRef == ""){
            window.location.replace("index.html");
        }else{
            var databaseRef = database.child('chamados/'+urlRef[2]+'/'+urlRef[1]);
            var id = $(".c_id");
            var tipo = $(".c_tipo");
            var dataAbertura = $(".c_data");
            var titulo = $(".c_titulo");
            var descricao = $(".c_descricao");
            var prioridade = $(".c_prioridade");
            var anexos = $(".c_anexos");
            var nome = $(".p_nome");
            var foto = $(".p_foto");
            var email = $(".p_email");
            var empresa = $(".p_empresa");
            databaseRef.on("value", function(data){
                id.text("#"+data.val().chamado_indice);
                tipo.text(data.val().tipo);
                dataAbertura.text(data.val().data_solicitacao);
                titulo.text(data.val().titulo);
                foto.attr("src",data.val().usuario_foto);
                nome.text(data.val().usuario_nome);
                email.text(data.val().usuario_email);
                empresa.text("Cliente Wallet Family");
                descricao.text(data.val().descricao);
                $("#destinatario").val(data.val().email_abriu_chamado);
                $("#numeroDeRespostas").val(data.val().respostas);
                if(data.val().prioridade == 1){
                    prioridade.text("Baixa").addClass("prioridade1");
                }else if(data.val().prioridade == 2){
                    prioridade.text("Média").addClass("prioridade2");
                }else if(data.val().prioridade == 3){
                    prioridade.text("Alta").addClass("prioridade3");
                }else if(data.val().prioridade == 4){
                    prioridade.text("Máxima").addClass("prioridade4");
                }
                if(data.val().anexos == 0){
                    anexos.addClass("hide");
                }else{
                    anexos.removeClass("hide");
                    var anexosLista = data.val().anexos_lista;
                    var anexoRef = document.getElementById('anexos');
                    $(anexoRef).empty();
                    anexosLista.forEach( a =>{
                        storageRef.child("anexos/"+data.val().chamado_id+'/'+a).getDownloadURL().then(function(url){
                            var anexoChild = document.createElement('div');
                            anexoChild.classList.add("anexo");
                            var png = url.indexOf("png");
                            var jpg = url.indexOf("jpg");
                            if(png > 0 || jpg > 0){
                                var html =  '<a href="'+url+'" target="_blank">'+
                                                '<div class="hover suave">'+
                                                    '<i class="mdi-action-open-in-new white-text"></i>'+
                                                '</div>'+
                                                '<img src="'+url+'" class="responsive-img">'+
                                            '</a>';
                            }else{
                                var html =  '<a href="'+url+'" target="_blank">'+
                                                '<div class="hover suave">'+
                                                    '<i class="mdi-action-open-in-new white-text"></i>'+
                                                '</div>'+
                                                '<img src="img/download.png" class="responsive-img">'+
                                            '</a>';
                            }
                            anexoChild.innerHTML = html;
                            anexoRef.appendChild(anexoChild);
                        });
                    
                    })
                }
                if(data.val().status == 6){
                    setTimeout(function(){
                        listaRespostas(urlRef[1]);
                    },500);
                    setTimeout(function(){
                        var nivel = $(".u_nivel").text();
                        var listaResposta = document.getElementById('respostas');
                        var aviso = document.createElement('div');
                        aviso.classList.add("chamado-item","light-blue","aviso");
                        if(nivel == "cliente"){
                            $("#responderChamado").slideUp("fast",function(){
                                var html =  '<span class="mini-title white-text">'+
                                                '<b>Seu ticket foi solucionado ?:</b>'+
                                            '</span>'+
                                            '<br>'+
                                            '<button class="white red-text mini-title suave encerramentoRecusado">'+
                                                '<i class="mdi-navigation-close left"></i> Não'+
                                            '</button>'+
                                            '<button class="white green-text mini-title suave encerramentoAceito" style="margin-right:20px;">'+
                                                '<i class="mdi-action-done left"></i> Sim'+
                                            '</button>';
                                aviso.innerHTML = html;
                                listaResposta.appendChild(aviso);
                            });
                        }else{
                            $("#responderChamado").slideUp("fast",function(){
                                var html = '<span class="mini-title white-text"><b>Aguardando cliente.</b></span>';
                                aviso.innerHTML = html;
                                listaResposta.appendChild(aviso);
                            });
                        }
                    },1000);
                }else if(data.val().status == 5){
                    setTimeout(function(){
                        listaRespostas(urlRef[1]);
                    },500);
                    setTimeout(function(){
                        $("#responderChamado").slideUp("fast",function(){
                            var listaResposta = document.getElementById('respostas');
                            var aviso = document.createElement('div');
                            aviso.classList.add("chamado-item","light-blue","aviso");
                            var html =  '<span class="mini-title white-text"><b>Ticket encerrado em: '+data.val().data_fechamento+'</b></span>';
                            aviso.innerHTML = html;
                            listaResposta.appendChild(aviso);
                        });
                    },1000);
                }else{
                    setTimeout(function(){
                        listaRespostas(urlRef[1]);
                    },500);
                }
            });
        }
    }

    function encerrarChamado(){
        var urlRef = window.location.search.slice(1).split("=");
        var chamado_id = urlRef[1];
        var cliente_id = urlRef[2];
        $(document).on('click','.encerramentoAceito', function(){
            statusRef = database.child("chamados/"+cliente_id+"/"+chamado_id);
            statusRef.update({
                status : 5,
                data_fechamento: geraData()
            },function(){
                $("#alertaT p").text('Ticket encerrado em:'+geraData()+', Obrigado!');
                chamaAlerta();
            });
            $(this).offsetParent().slideUp("fast");
        });
        $(document).on('click','.encerramentoRecusado', function(){
            statusRef = database.child("chamados/"+cliente_id+"/"+chamado_id);
            statusRef.update({
                status : 2,
                data_fechamento: 0
            },function(){
                $("#alertaT p").text("Encerramento recusado.");
                chamaAlerta();
                $(".chamado-item.aviso").slideUp("fast",function(){
                    $("#responderChamado").slideDown("slow");
                });
            });
        });
    }

    function ResponderChamado(){
        var anexosLista = new Array();
        var anexosChamado = 0;
        var historicoRef = database.child('chamados_historico');
        var urlRef = window.location.search.slice(1).split("=");
        var chamado_id = urlRef[1];
        var cliente_id = urlRef[2];
        var quemAbriuChamado = 0;
        var statusChamado = 0;
        var chamadoRef = database.child('chamados/'+cliente_id+'/'+chamado_id).once("value",function(data){
            quemAbriuChamado = data.val().quem_abriu_chamado;
            statusChamado = data.val().status;
        });
        setTimeout(function(){
            if(statusChamado == 5){
                $("#solucao").attr("checked","checked");
                $("#responderChamado button").addClass("disable");
            }
        },2500);
        var novaResposta = historicoRef.child(chamado_id).push();
        var fileInput = document.getElementById("anexosResposta");
        fileInput.addEventListener('change', function(e){
            var itens = e.target.files.length;
            for(var y = 0; y <= itens; y++){
                var file = e.target.files[y];
                var storageRef = firebase.storage().ref('anexos/'+ chamado_id+'/'+novaResposta.key+'/'+file.name);
                anexosLista.push(file.name);
                var task = storageRef.put(file);
                task.on('state_changed',
                    function progress(snap){
                        $("#responderChamado button").addClass("disable");
                        var porcentagem = (snap.bytesTransferred / snap.totalBytes) * 100;
                        $("#progresso").css({"width" : porcentagem + "%"});
                    },
                    function error(err){
                        console.log(err);
                        $("#alertaT p").text("ocorreu um problema, contate o administrador");
                        chamaAlerta();
                    },
                    function complete(){
                        $("#responderChamado button").removeClass("disable");
                        anexosChamado = anexosChamado + 1;
                    }
                );
            }
        });
        $("#responderChamado").submit(function(e){
            e.preventDefault();   
            $(this).find("button").addClass("disable");
            var resposta = $("#resposta").val();
            var destinario = $("#destinatario").val();
            var analista_nome = $(".u_nome").text();
            var analista_foto = 'https://walletfamily.com/novo/'+$(".u_foto").attr("src");
            var analista_email = "ticket@walletfamily.com";
            var analista_nivel = $(".u_nivel").text();
            var analista_id = $(".u_id").val();
            var dataAtual = geraData();
            var solucao = $("#solucao").is(":checked");
            var id = $("#numeroDeRespostas").val();
            if(resposta != ""){
                //SE A RESPOSTA DIFERENTE DE VAZIO CRIA A NOVA RESPOSTA
                novaResposta.set({
                    chamadoId: chamado_id,
                    chamadoResposta: resposta,
                    analistaNome: analista_nome,
                    analistaFoto: analista_foto,
                    dataResposta: dataAtual,
                    anexos_lista: anexosLista,
                    anexos: anexosChamado,
                    indice: ++id 
                });
                //ATUALIZA O NUMERO DE RESPOSTAS
                updateRespostas = database.child("chamados/"+cliente_id+'/'+chamado_id);
                updateRespostas.update({
                    respostas : id
                });
                //SE O NIVEL DO USUARIO FOR IGUAL A ANALISTA, O SISTEMA ENVIA UM EMAIL PARA O CRIADOR DO CHAMADO
                if(analista_nivel == 'Atendente' || analista_nivel == 'Administrador'){
                    var workflow =  ''+$('.c_titulo').text()+'\n'+
                                    ''+$('.c_descricao').text()+'\n\n';
                    $('.chamado-item').each(function(){
                        var nome = $(this).find('.userName').text();
                        var texto = $(this).find('.mini-descricao').text();
                        if(nome != ''){
                            workflow += nome+':\n'+texto+'\n\n';
                        }
                    });
                    $.post('envio.php', {resposta: workflow, remetente: analista_email, destinatario: destinario, responsavel: analista_nome},function(data){
                        console.log('checa teu email:' + data);
                    })
                }
                //SE O USUARIO MARCAR A RESPOSTA COMO SOLUÇÃO, O SISTEMA MUDA O STATUS DO CHAMADO
                if(solucao == true){
                    updateStatus = database.child("chamados/"+cliente_id+'/'+chamado_id);
                    if(analista_nivel == 'Atendente' || analista_nivel == 'Administrador'){
                        //ATUALIZA STATUS PARA FINALIZADO PELO ANALISTA
                        updateStatus.update({
                            status: 6,
                            data_fechamento: geraData()
                        });
                    }else{
                        //ATUALIZA STATUS PARA FINALIZADO PELO USUARIO
                        updateStatus.update({
                            status: 5,
                            data_fechamento: geraData()
                        });
                    }
                }else{
                    updateStatus = database.child("chamados/"+cliente_id+'/'+chamado_id);
                    if(analista_nivel == 'Atendente' || analista_nivel == 'Administrador'){
                        //ATUALIZA STATUS PARA AGUARDANDO USUARIO
                        updateStatus.update({
                            status: 3
                        });
                    }else{
                        //ATUALIZA STATUS PARA AGUARDANDO ANALISTA
                        updateStatus.update({
                            status: 2
                        });
                    }
                }
                $("#responderChamado")[0].reset();
                $("#progresso").css({"width":"0%"});
                $("#numeroDeRespostas").val(id);
                novaResposta = historicoRef.child(chamado_id).push();
                $(this).find("button").removeClass("disable");
            }else{
                $("#alertaT p").text("Você precisa digitar algo!");
                $("#alertaT").addClass("active");
                setTimeout( function(){
                    $("#alertaT").addClass("out");
                }, 1500);
                setTimeout( function(){
                    $("#alertaT").removeClass("active out");
                }, 2100);
                $(this).find("button").removeClass("disable"); 
            }
        });
    }

    function statusResposta(){
        var urlRef = window.location.search.slice(1).split("=");
        var chamado_id = urlRef[1];
        var cliente_id = urlRef[2];
        var statusRef = database.child("chamados/"+cliente_id+'/'+chamado_id);
        statusRef.on('child_changed',function(data){
            var nivel = $(".u_nivel").text();
            if(data.val() == 6){
                var listaResposta = document.getElementById('respostas');
                var aviso = document.createElement('div');
                aviso.classList.add("chamado-item","light-blue","aviso");
                if(nivel == 'cliente'){
                    $("#responderChamado").slideUp("slow",function(){
                        var html =  '<span class="mini-title white-text">'+
                                        '<b>Seu ticket foi solucionado ?:</b>'+
                                    '</span>'+
                                    '<br>'+
                                    '<button class="white red-text mini-title suave encerramentoRecusado"><i class="mdi-navigation-close left"></i> Não</button>'+
                                    '<button class="white green-text mini-title suave encerramentoAceito" style="margin-right:20px;"><i class="mdi-action-done left"></i> Sim</button>';
                        aviso.innerHTML = html;
                        listaResposta.appendChild(aviso);
                    });
                }else{
                    $("#responderChamado").slideUp("slow",function(){
                        var html =  '<span class="mini-title white-text"><b>Aguardando cliente.</b></span>';
                        aviso.innerHTML = html;
                        listaResposta.appendChild(aviso);
                    });
                }
            }else if(data.val() == 5){
                var listaResposta = document.getElementById('respostas');
                var aviso = document.createElement('div');
                aviso.classList.add("chamado-item","light-blue","aviso");
                if(nivel == 'cliente'){
                    $("#responderChamado").slideUp("slow");
                    var html =  '<span class="mini-title white-text"><b>Você encerrou o ticket.</b></span>';
                    aviso.innerHTML = html;
                    listaResposta.appendChild(aviso);
                    $("#alertaT p").text("Você encerrou o ticket.");
                    $(".chamado-item.aviso button").slideUp("fast");
                    chamaAlerta();
                }else{
                    $("#responderChamado").slideUp("slow");
                    var html = '<span class="mini-title white-text"><b>O cliente encerrou o ticket.</b></span>';
                    aviso.innerHTML = html;
                    listaResposta.appendChild(aviso);
                    $("#alertaT p").text("O cliente encerrou o chamado.");
                    $(".chamado-item.aviso button").slideUp("fast");
                    chamaAlerta();
                }
            }else if(data.val() == 2){
                $(".chamado-item.aviso").slideUp("fast",function(){
                    $("#responderChamado").show("slow");
                });
            }
        });
    }

    function listaRespostas(chamado_id){
        var historicoRef = database.child('chamados_historico/'+chamado_id);
        var listaResposta = document.getElementById('respostas');
        var usuario_nome = $(".u_nome").text();
        historicoRef.orderByChild('indice').on('value',function(data){
            $(listaResposta).empty();
            if(data.exists()){
                data.forEach( d => {
                    var resposta = document.createElement('div');
                    if(d.val().analistaNome == usuario_nome){
                        resposta.classList.add("chamado-item","white","suave");
                    }else{
                        resposta.classList.add("chamado-item","light-blue","suave");   
                    }
                    if(d.val().anexos == 0){
                        if(d.val().analistaNome == usuario_nome){
                            var html = '<div class="titulo">'+
                                            '<div class="foto circle light-blue lighten-1">'+
                                                '<img src="'+d.val().analistaFoto+'" class="responsive-img">'+
                                            '</div>'+
                                            '<h6>'+
                                                '<b class="truncate userName">'+d.val().analistaNome+'</b>'+
                                                '<span>Wallet Family</span>'+
                                            '</h6>'+
                                            '<h6 class="nm light-blue-text">'+
                                                '<b>Atendente</b>'+
                                                '<span class="right mini-title">'+d.val().dataResposta+'</span>'+
                                            '</h6>'+
                                        '</div>'+
                                        '<div class="divider"></div>'+
                                        '<div class="mini-descricao">'+d.val().chamadoResposta+'</div>';
                            resposta.innerHTML = html;
                        }else{
                            var html2 = '<div class="titulo">'+
                                            '<div class="foto circle light-blue lighten-1">'+
                                                '<img src="'+d.val().analistaFoto+'" class="responsive-img">'+
                                            '</div>'+
                                            '<h6 class="white-text">'+
                                                '<b class="truncate userName">'+d.val().analistaNome+'</b>'+
                                                '<span>Wallet Family</span>'+
                                            '</h6>'+
                                            '<h6 class="nm white-text">'+
                                                '<b>Atendente</b>'+
                                                '<span class="right mini-title">'+d.val().dataResposta+'</span>'+
                                            '</h6>'+
                                        '</div>'+
                                        '<div class="divider light-blue darken-2"></div>'+
                                        '<div class="mini-descricao white-text">'+d.val().chamadoResposta+'</div>';
                            resposta.innerHTML = html2;
                        }
                    }else{
                        if(d.val().analistaNome == usuario_nome){
                            var html3 = '<div class="titulo">'+
                                            '<div class="foto circle light-blue lighten-1">'+
                                                '<img src="'+d.val().analistaFoto+'" class="responsive-img">'+
                                            '</div>'+
                                            '<h6>'+
                                                '<b class="truncate userName">'+d.val().analistaNome+'</b>'+
                                                '<span>Wallet Family</span>'+
                                            '</h6>'+
                                            '<h6 class="nm light-blue-text">'+
                                                '<b>Atendente</b>'+
                                                '<span class="right mini-title">'+d.val().dataResposta+'</span>'+
                                            '</h6>'+
                                        '</div>'+
                                        '<div class="divider"></div>'+
                                        '<div class="mini-descricao">'+d.val().chamadoResposta+'</div>';
                            resposta.innerHTML = html3;
                            var anexosLista = d.val().anexos_lista;
                            anexosLista.forEach( a =>{
                                storageRef.child("anexos/"+chamado_id+'/'+d.key+'/'+a).getDownloadURL().then(function(url){
                                    var png = url.indexOf("png");
                                    var jpg = url.indexOf("jpg");
                                    if(png > 0 || jpg > 0){
                                        var html4 = '<div class="anexo">'+
                                                        '<a href="'+url+'" target="_blank">'+
                                                            '<div class="hover suave">'+
                                                                '<i class="mdi-action-open-in-new white-text"></i>'+
                                                            '</div>'+
                                                            '<img src="'+url+'" class="responsive-img">'+
                                                        '</a>'+
                                                    '</div>';
                                    }else{
                                        var html4 = '<div class="anexo">'+
                                                        '<a href="'+url+'" target="_blank">'+
                                                            '<div class="hover suave">'+
                                                                '<i class="mdi-action-open-in-new white-text"></i>'+
                                                            '</div>'+
                                                            '<img src="img/download.png" class="responsive-img">'+
                                                        '</a>'+
                                                    '</div>';
                                    }
                                    resposta.innerHTML += html4;
                                });
                            });
                        }else{
                            var html5 = '<div class="titulo">'+
                                            '<div class="foto circle light-blue lighten-1">'+
                                                '<img src="'+d.val().analistaFoto+'" class="responsive-img">'+
                                            '</div>'+
                                            '<h6 class="white-text">'+
                                                '<b class="truncate userName">'+d.val().analistaNome+'</b>'+
                                                '<span>Wallet Family</span>'+
                                            '</h6>'+
                                            '<h6 class="nm white-text">'+
                                                '<b>Atendente</b>'+
                                                '<span class="right mini-title">'+d.val().dataResposta+'</span>'+
                                            '</h6>'+
                                        '</div>'+
                                        '<div class="divider light-blue darken-2"></div>'+
                                        '<div class="mini-descricao white-text">'+d.val().chamadoResposta+'</div>';
                            resposta.innerHTML = html5;
                            var anexosLista = d.val().anexos_lista;
                            anexosLista.forEach( a =>{
                                storageRef.child("anexos/"+chamado_id+'/'+d.key+'/'+a).getDownloadURL().then(function(url){
                                    var png = url.indexOf("png");
                                    var jpg = url.indexOf("jpg");
                                    if(png > 0 || jpg > 0){
                                        var html6 = '<div class="anexo">'+
                                                        '<a href="'+url+'" target="_blank">'+
                                                            '<div class="hover suave">'+
                                                                '<i class="mdi-action-open-in-new white-text"></i>'+
                                                            '</div>'+
                                                            '<img src="'+url+'" class="responsive-img">'+
                                                        '</a>'+
                                                    '</div>';
                                    }else{
                                        var html6 = '<div class="anexo">'+
                                                        '<a href="'+url+'" target="_blank">'+
                                                            '<div class="hover suave">'+
                                                                '<i class="mdi-action-open-in-new white-text"></i>'+
                                                            '</div>'+
                                                            '<img src="img/download.png" class="responsive-img">'+
                                                        '</a>'+
                                                    '</div>';
                                    }
                                    resposta.innerHTML += html6;
                                });
                            });
                        }
                    }
                    listaResposta.appendChild(resposta);
                });
            }
        });
    }

    //LISTAR ANALISTAS
    // function listaAnalista(){
    //     analistaRef = database.child("empresas_usuarios");
    //     var listaAnalista = document.getElementById("listaAnalistas");

    //     analistaRef.once("value",function(data){
    //         data.forEach( d =>{
    //             $("#listaAnalista").empty();
    //             var analista = document.createElement('li');
    //             analista.innerHTML = '<p><input type="radio" name="analista" class="analista" id="'+d.val().usuario_id+'" value="'+d.val().usuario_id+'" /><label for="'+d.val().usuario_id+'">'+d.val().nome_completo+'</label></p>';
    //             listaAnalista.appendChild(analista);
    //         });
    //     });
    // }

    //ADICIONAR ANALISTAS NO CHAMADO
    function adicionarAnalista(){
        var chamado_id = 0;
        var cliente_id = 0;
        var analistaSelecionado = 0;
        $(document).on("click",".analista",function(){
            analistaSelecionado = $(this).val();
            chamado_id = $("#idCliente").val();
            cliente_id = $("#contaCliente").val();
        });
        $("#analistas form").submit(function(e){
            e.preventDefault();
            if (analistaSelecionado == 0) {
                $("#alertaT p").text("Selecione um atendente primeiro");
                chamaAlerta();
            }else{
                chamadoRef = database.child('chamados/'+cliente_id+'/'+chamado_id);
                chamadoRef.update({
                    analista_id: analistaSelecionado
                });
                $("#analistas").removeClass("active");
                $("#alertaT p").text("Atendente adicionado com sucesso!");
                chamaAlerta();
            }
        });
    }adicionarAnalista();


    function atualizarPrioridades(){
        var chamado_id = 0;
        var cliente_id = 0;
        var mPrioridade = 1;
        $(document).on("click",".editChamado",function(){
            $("#atualizarPrioridade").addClass("active");
            chamado_id = $(this).attr("data-id");
            cliente_id = $(this).attr("data-conta");
        })
        $("#atualizarPrioridade .fechar").click(function(){
            $("#atualizarPrioridade").removeClass("active");
        })
        $("#atualizarPrioridade ul li").click(function(){
            $("#atualizarPrioridade ul li").each(function(){
                $(this).removeClass("select");
            });
            $(this).addClass("select");
            mPrioridade = $(this).attr("data-value");
        });
        $("#atualizarPrioridade form").submit(function(e){
            e.preventDefault();
            chamadoRef = database.child("chamados/"+cliente_id+'/'+chamado_id);
            chamadoRef.update({
                prioridade : mPrioridade
            },function(){
                    $("#atualizarPrioridade").removeClass("active");
                    listaChamados();
                }
            );
        });
    }atualizarPrioridades();
    

    //GERA DATA
    function geraData(){
        // Obtém a data/hora atual
        var data = new Date();

        // Guarda cada pedaço em uma variável
        var dia     = data.getDate();           // 1-31
        var dia_sem = data.getDay();            // 0-6 (zero=domingo)
        var mes     = data.getMonth();          // 0-11 (zero=janeiro)
        var ano2    = data.getYear();           // 2 dígitos
        var ano4    = data.getFullYear();       // 4 dígitos
        var hora    = data.getHours();          // 0-23
        var min     = data.getMinutes();        // 0-59
        var seg     = data.getSeconds();        // 0-59
        var mseg    = data.getMilliseconds();   // 0-999
        var tz      = data.getTimezoneOffset(); // em minutos

        // Formata a data e a hora (note o mês + 1)
        var str_data = dia + '/' + (mes+1) + '/' + ano4;
        if(mes <= '9'){
            mes = '0'+mes;
        }
        if(min <= '9'){
            min = '0'+min;
        }
        if(hora <= '9'){
            hora = '0'+hora;
        }
        var str_hora = hora + ':' + min;
        return str_hora + ' - ' + str_data;
    }

    //CONTA ANALISTAS
    // function contaAnalistas(){
    //     var contagem = 0;
    //     var analistasRef = database.child('empresas_usuarios');
    //     analistasRef.once('value',function(data){
    //         data.forEach( d => {
    //             if(d.val().tipo == 'analista'){
    //                 contagem = contagem + 1;
    //                 $('.analistasCadastrados span').text(contagem);
    //             }
    //         });
    //     });
    // }

    //CONTA EMPRESAS
    // function contaEmpresas(){
    //     var contagem = 0;
    //     var empresasRef = database.child('empresas');
    //     empresasRef.once('value',function(data){
    //         data.forEach( d => {
    //             contagem = contagem + 1;
    //             $('.empresasCadastradas span').text(contagem);
    //         });
    //     });
    // }

    // function carregarEmpresas(){
    //     var empresaRef = database.child('empresas');
    //     var empresaLista = document.getElementById('n-empresa-lista');
    //     empresaRef.once('value', function(data){
    //         data.forEach( d => {
    //             var empresa = document.createElement('li');
    //             empresa.setAttribute('data-empresa', d.key);
    //             var html = d.val().fantasia;
    //             empresa.innerHTML = html;
    //             empresaLista.appendChild(empresa);
    //         });
    //     });
    // }

    // function carregarFuncionarios(){
    //     var funcionarioRef = database.child('empresas_usuarios');
    //     var funcionarioLista = document.getElementById('n-funcionario-lista');
    //     funcionarioRef.once('value', function(data){
    //         data.forEach( d => {
    //             var funcionario = document.createElement('li');
    //             funcionario.setAttribute('data-empresa', d.val().empresa_id);
    //             funcionario.setAttribute('data-funcionario', d.key);
    //             funcionario.setAttribute('data-email', d.val().usuario);
    //             var html = d.val().nome_completo;
    //             funcionario.innerHTML = html;
    //             funcionarioLista.appendChild(funcionario);
    //         });
    //     });
    // }

    function carregarAtendente(){
        var atendenteId = $("#idusuario").val();
        var atendenteNome = $(".perfil .nome").text();
        var atendenteCargo = $(".perfil .cargo").text();
        var atendentesRef = database.child("empresa-usuarios/"+atendenteId);
        var atendenteFoto = $(".perfil img").attr("src");
        firebase.auth().onAuthStateChanged(function(user) {
            if (user) {

            }else{
                firebase.auth().signInAnonymously().then(function(){
                    atendentesRef.set({
                        id: atendenteId,
                        nome: atendenteNome,
                        cargo: atendenteCargo,
                        foto: atendenteFoto
                    });
                }).catch(function(error) {
                    var errorCode = error.code;
                    var errorMessage = error.message;
                    console.log(errorCode+"-"+errorMessage);
                });
            }
        });
    }

    $(".mdi-action-lock-open").click(function(){
        deslogar();
    });

    function deslogar(){
        firebase.auth().signOut().then(function() {
            console.log("Deslogou");
        }).catch(function(error) {
            console.log(error.message);
        });
    }

    function chamaAlerta(){
        $("#alertaT").addClass("active");
        setTimeout( function(){
            $("#alertaT").addClass("out");
        }, 1500);
        setTimeout( function(){
            $("#alertaT").removeClass("active out");
        }, 2100);
    }

    function chamaLoading(){
        $("#loading").addClass("active");
    }

    function analistas(){
        $(document).on("click",".openAnalistas",function(){
            $("#analistas").addClass("active");
            $("#contaCliente").val($(this).attr("data-conta"));
            $("#idCliente").val($(this).attr("data-id"));
        })
        $("#analistas .fechar").click(function(){
            $("#analistas").removeClass("active");
        })
    }
    function ticketAberto(){
        var ticketRef = database.child('chamados');
        var status1 = 0;
        var status2 = 0;
        var status3 = 0;
        var status56 = 0;
        ticketRef.once('value', function(data){
            data.forEach( a => {
                a.forEach( b => {
                    if(b.val().status == 1){
                        status1 = status1 + 1;
                        $(".status1").text(status1);
                    }else if(b.val().status == 2){
                        status2 = status2 + 1;
                        $(".status2").text(status2);
                    }else if(b.val().status == 3){
                        status3 = status3 + 1;
                        $(".status3").text(status3);
                    }else if(b.val().status == 5 || b.val().status == 6){
                        status56 = status56 + 1;
                        $(".status56").text(status56);
                    }
                });
            });
        });
    }