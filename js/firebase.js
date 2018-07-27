// Initialize Firebase
var config = {
    apiKey: "AIzaSyBrQpalBLEPKS8kQFVmBDUWipsIM2QZLiU",
    authDomain: "chatwalletfamily.firebaseapp.com",
    databaseURL: "https://chatwalletfamily.firebaseio.com",
    projectId: "chatwalletfamily",
    storageBucket: "chatwalletfamily.appspot.com",
    messagingSenderId: "795712211937"
};
firebase.initializeApp(config);

var database = firebase.database().ref();

function logarAnonimamente(){

    $("#comecar-conversa").submit(function(e){
        e.preventDefault();
        var nome = $("#chat-nome").val();
        var email = $("#chat-email").val();
        
        if(nome != "" && email != ""){
            firebase.auth().signInAnonymously().then(function(){
                $(".chat-logout").addClass("active");
                cadastraUsuario(nome,email);
            }).catch(function(error) {
                var errorCode = error.code;
                var errorMessage = error.message;
                console.log(errorCode+"-"+errorMessage);
            });
        }else{
            alert("Você precisa preencher os campos!");
        }
    });

    firebase.auth().onAuthStateChanged(function(user) {
        if (user) {
            $(".chat-logout").addClass("deactive");
            $(".chat-login").removeClass("deactive");
            $("#sala").val(user.uid);
            $("#nome").val(user.displayName);
            criarSala(user.uid,user.displayName);
            ativarChat();
            listarChat(user.uid);
        }
    });
    
    $(".fecha-gaveta").click(function(){
        deslogar();
    });
    $(".mdi-action-lock-open").click(function(){
        deslogar();
    });
}
function deslogar(){
    firebase.auth().signOut().then(function() {
        $(".chat-logout").removeClass("deactive");
        $(".chat-login").addClass("deactive");
        $(".boas-vindas span").text("");
        console.log("Deslogou");
    }).catch(function(error) {
        console.log(error.message);
    });
    var sala = $("#sala").val();
    var chatRef = database.child("chat-salas/"+sala);
    chatRef.set({
        status: 1
    })
}
function deslogarAutomaticamente(){
    // $(document).mousemove(function() {
    //     setTimeout(function() {
    //         //deslogar();
    //         console.log("acabou o tempo");
    //     }, 2000);
    // });
}

function cadastraUsuario(nome,email){
    firebase.auth().onAuthStateChanged(function(user) {
        if (user) {
            var userRef = database.child('chat_usuarios/'+user.uid);
                userRef.set({
                    nome: nome,
                    email: email,
                    tipo: 'usuario',
                    status: "aguardando"
                });
            user.updateProfile({
                displayName: nome,
                email: email
            }).then(function(){
                console.log("Usuário cadastrado com sucesso!")
            })
            $(".chat-logout").addClass("active");
            $(".chat-login").removeClass("active");
        }
    });
}

function carregarAtendente(){
    var atendenteId = $("#idusuario").val();
    var atendenteNome = $(".perfil .nome").text();
    var atendenteCargo = $(".perfil .cargo").text();
    var atendentesRef = database.child("chat-atendentes/"+atendenteId);
    var atendenteFoto = $(".perfil img").attr("src");
    firebase.auth().onAuthStateChanged(function(user) {
        if (user) {
            console.log("Já to logado!");
        }else{
            firebase.auth().signInAnonymously().then(function(){
                atendentesRef.set({
                    id: atendenteId,
                    nome: atendenteNome,
                    cargo: atendenteCargo,
                    foto: atendenteFoto
                });
                console.log(atendenteFoto);
            }).catch(function(error) {
                var errorCode = error.code;
                var errorMessage = error.message;
                console.log(errorCode+"-"+errorMessage);
            });
        }
    });
}

function criarSala(sala,nome){
    var chatRef = database.child("chat-salas/"+sala);
    chatRef.set({
        status: 0,
        nome: nome,
        atendente: 0,
        atendenteId: 0
    });
}

function ativarChat(){
    var sala = $("#sala").val();
    var nome = $("#nome").val();
    var chatRespostasRef = database.child("chat-respostas/"+sala);
    var chatIndice = database.child("chat-indice");
    var count = 0;
    chatIndice.once('value').then(function(data){
        count = data.val().indice;
    });
    //RESPONDER CHAT LADO USUARIO
    $(".chat-login button").click(function(){
        var resposta = $("#chat-resposta").val();
        if(resposta != ""){
            if(sala != ""){
                var entrada = chatRespostasRef.push();
                entrada.set({
                    resposta: resposta,
                    indice: ++count,
                    autor: 'usuario',
                    nome: nome
                });
                chatIndice.set({
                    indice: count
                });
                count++;
                $("#chat-resposta").val("");
                $("#chat-resposta").focus();
            }else{
                alert("A sala não está setada");
            }
        }
    });
}
function listarChat(sala){
    //LISTAR CHAT LADO USUARIO
    var chatRef = database.child("chat-respostas/"+sala);
    var usuarioRef = database.child("chat_usuarios/"+sala);
    var ul = $(".chat-login ul");
    chatRef.on("value", function(data){
        if(data == ''){

        }else{
            ul.empty();
            ul.append('<li class="atendente"><span>Olá, como podemos ajuda-lo?</span></li>');
            data.forEach(element => {
                ul.append("<li class="+element.val().autor+"><span>"+element.val().resposta+"</span></li>");
                ul.scrollTop(9999);
            });
        }
    });
    usuarioRef.on("value", function(data){
        if(data.val().status == "encerrado"){
            ul.append('<li class="atendente"><span class="recomecar click">Sua sessão expirou<div class="but-chat">clique para reconectar</div></span></li>');
            ul.scrollTop(9999);
            $("#chat-resposta").addClass("disabled");
        }else{
            $("#chat-resposta").removeClass("disabled");
        }
    });
    $(document).on("click", ".but-chat",function(){
        deslogar();
    });
}

function listaChatUsuarios(){
    firebase.auth().onAuthStateChanged(function(user) {
        if (user) {
            var chatRef = database.child("chat_usuarios");
            var ul = $("ul.clientes");
            chatRef.on("value", function(data){
                ul.empty();
                data.forEach(element => {
                    if(element.val().status == "encerrado"){
                        ul.append('<li class="font click truncate" data-estado="'+element.val().status+'" data-key="'+element.key+'">'+element.val().nome+'</li>');
                    }else if(element.val().status == "emAtendimento"){
                        ul.append('<li class="font click truncate" data-estado="'+element.val().status+'" data-key="'+element.key+'">'+element.val().nome+'<span class="font but2 click">encerrar</span></li>');
                    }else{
                        ul.append('<li class="font click truncate" data-estado="'+element.val().status+'" data-key="'+element.key+'">'+element.val().nome+'<span class="font but click">atender</span></li>');
                    }
                });
                //ul.find("li:first-child").addClass("active");
                $(".loading").css({"opacity":"0"});
                chatEstadoSelecionado("aguardando");
                listaConversa();
            });
        }else{
            console.log("Tem que logar!");
        }
    });   
}
function chatEstados(){
    $("#estado").change(function(){
        var estado = $(this).val();
        chatEstadoSelecionado(estado);
    })
}chatEstados();
function chatEstadoSelecionado(estado){
    $("ul.clientes li").each(function(){
        var liEstado = $(this).attr("data-estado");
        if(liEstado == estado){
            $(this).css({"display":"block"});
        }else{
            $(this).css({"display":"none"});
        }
    });
}
function escolherConversa(){
    firebase.auth().onAuthStateChanged(function(user) {
        if (user) {
            $(document).on("click","ul.clientes li",function(){
                var key = $(this).attr("data-key");
                var chatRef = database.child("chat_usuarios");
                var ul = $("ul.conversa");
                $("ul.clientes li").removeClass("active");
                $(this).addClass("active");
                chatRef = database.child("chat-respostas/"+key);    
                chatRef.on("value", function(data){
                    ul.empty();
                    data.forEach(element => {
                        ul.append("<li class="+element.val().autor+"><h6>"+element.val().nome+"</h6><span>"+element.val().resposta+"</span></li>");
                        ul.scrollTop(9999);
                    });
                });
            });
            $(document).on("click","ul.clientes li .but",function(){
                var key = $(this).offsetParent().attr("data-key");
                var atendenteId = $("#idusuario").val();
                var atendenteNome = $(".perfil .nome").text();
                var usuarioRef = database.child("chat_usuarios/"+key);
                var salaRef = database.child("chat-salas/"+key);
                usuarioRef.update({
                    status: "emAtendimento"
                });
                salaRef.update({
                    atendente: atendenteNome,
                    atendenteId: atendenteId
                })
            });
            $(document).on("click","ul.clientes li .but2",function(){
                var key = $(this).offsetParent().attr("data-key");
                var usuarioRef = database.child("chat_usuarios/"+key);
                usuarioRef.update({
                    status: "encerrado"
                });
                $("#alerta p").text("Conversa encerrada.");
                $("#alerta").addClass("active");
                setTimeout(function(){
                    $("#alerta").removeClass("active");
                },2000);
            });
        }else{
            console.log("Tem que logar!");
        }
    }); 
}

function listaConversa(){
    var ul = $("ul.conversa");
    var liAtivo = $("ul.clientes li.active");
    var key = liAtivo.attr("data-key");
    var chatRef = database.child("chat-respostas/"+key);
    chatRef.on("value", function(data){
        ul.empty();
        data.forEach(element => {
            ul.append("<li class="+element.val().autor+"><h6>"+element.val().nome+"</h6><span>"+element.val().resposta+"</span></li>");
            ul.scrollTop(9999);
        });
    });
}

function responderConversa(){
    firebase.auth().onAuthStateChanged(function(user) {
        if (user) {
            //RESPONDER CHAT LADO ATENDENTE
            var count = 0;
            var liAtivo = $("ul.clientes li.active");
            var atendenteNome = $(".perfil .nome").text();
            var sala = liAtivo.attr("data-key");
            var chatRef = database.child("chat-respostas/"+sala);
            var chatIndice = database.child("chat-indice");
            chatIndice.once('value').then(function(data){
                count = data.val().indice;
            });

            $("#responderAtendente").submit(function(e){
                e.preventDefault();
                var resposta = $("#respostaAtendente").val();
                liAtivo = $("ul.clientes li.active");
                sala = liAtivo.attr("data-key");
                chatRef = database.child("chat-respostas/"+sala);
                if(resposta != ""){
                    if(sala != "" && liAtivo.length != 0){
                        var entrada = chatRef.push();
                            entrada.set({
                                resposta: resposta,
                                indice: ++count,
                                autor: 'atendente',
                                nome: atendenteNome
                            });
                            chatIndice.set({
                                indice: count
                            });
                        count++;
                        $("#respostaAtendente").val("");
                        $("#respostaAtendente").focus();
                    }else{
                        $("#alerta p").text("Escolha uma coversa.");
                        $("#alerta").addClass("active");
                        setTimeout(function(){
                            $("#alerta").removeClass("active");
                        },2000);
                    }
                }else{
                    $("#alerta p").text("A resposta não pode ser vazia.");
                    $("#alerta").addClass("active");
                    setTimeout(function(){
                        $("#alerta").removeClass("active");
                    },2000);
                }
            });
        }else{
            console.log("Tem que logar!");
        }
    }); 
}

function desconectarUsuario(uid){
    admin.auth().deleteUser(uid)
    .then(function() {
        console.log("Usuario Deletado");
    })
    .catch(function(error) {
        console.log("Erro:", error);
    });
}