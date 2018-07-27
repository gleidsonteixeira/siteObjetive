//CONECTION
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

    //LOGIN
    $(".loginBtn").click(function(){
        login();
    })
    function login(){
        var email = $("#email").val();
        var password = $("#senha").val();
        if(email == ""){
            $("#alerta p").text("Digite seu email");
            chamaAlerta();
        }else{
            chamaLoading();
            firebase.auth().signInWithEmailAndPassword(email, password).catch(function(error) {
                var errorCode = error.code;
                var errorMessage = error.message;
                if(errorCode){
                    if(errorCode == "auth/invalid-email"){
                        $("#alerta p").text("Email inválido");
                    }else if(errorCode == "auth/wrong-password"){
                        $("#alerta p").text("Senha Incorreta");
                    }
                    chamaAlerta();
                    $("#loading").removeClass("active");
                }
            });
            firebase.auth().onAuthStateChanged(function(user) {
                if (user) {
                    var userRef = database.child('empresas_usuarios').child(user.uid);
                    userRef.on("value",function(data){
                        window.location.replace("index.html");
                        $("#indexLoading").removeClass("active");
                    })
                }
            });
        }
    }

    //LOGOUT
    $(".logoutBtn").click(function(){
        firebase.auth().signOut().then(function() {
            // Sign-out successful.
            window.location.replace("login.html");
        }).catch(function(error) {
            // An error happened.
            $("#alert p").text("Ocorreu um erro, contate o administrador.");
            chamaAlerta();
        });
    });

    function chamaAlerta(){
        $("#alerta").addClass("active");
        setTimeout( function(){
            $("#alerta").addClass("out");
        }, 1500);
        setTimeout( function(){
            $("#alerta").removeClass("active out");
        }, 2100);
    }

    function chamaLoading(){
        $("#loading").addClass("active");
    }