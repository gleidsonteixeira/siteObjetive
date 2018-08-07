$(document).ready(function(){
    $('.slider').slider();
    $(".button-collapse").sideNav({closeOnClick:true});
    
    menu();
    inserirVideo();
    novoBanner();
    menuAdmin();
    editarInfos();
    chatAdmin();
    permissoesAtendente();

    
    //comoFunciona();
    avaliacoes();
});
$(window).resize(function(){});
$(window).scroll(function(){
    rolarBarraProgress();
    menu();
    //comoFunciona();
    
});
$(window).load(function(){});

function avaliacoes(){
    setTimeout(function(){
        $(".avaliacoes").addClass("active");
    },3000)
}

function comoFunciona(){
    var scroll = window.pageYOffset;
    var posicaoX = $("#como-funciona").offset().top;
    //var posicaoY = $("#como-funciona").offset().left;
    var largura = $(window).width();
    if(scroll == posicaoX){
        $(".menu").css({"position":"fixed"});
        
    }else{
        $(".menu").css({"position":"absolute"});
    }
}

function permissoesAtendente(){
    $("#tipo_usu").change(function(){
        if($(this).select().val() == 2){
            $(".soPraAtendente").css({"display":"block"});
        }else{
            $(".soPraAtendente").css({"display":"none"});
        }
    });
}

function quadrado(e){
    return $(e).height($(e).width());
}
function menu(){
    var a=window.pageYOffset;
    if(a>1){
        $("#topo").addClass("active");
    }else{
        $("#topo").removeClass("active");
    }
    $('.menu li').click(function(){
        $('.menu li').each(function(){
            $(this).removeClass('active');
        });
        $(this).addClass('active');
    });
}
function inserirVideo(){
    $("#video .close").click(function(){
        $("#video .video").empty();
        $("#video").removeClass("active");
    })
    $(".chamaVideo").click(function(){
        var url = $(this).attr("data-video");
        $("#video").addClass("active");
        $("#video .video").html('<iframe width="850" height="478" src="'+url+'" frameborder="0" allowfullscreen></iframe>');
    })
}

function novoBanner(){
    $(".novoBannerBtn").click(function(){
        $(".novoBanner").addClass("active");
    });
    $(".novoBanner .close").click(function(){
        $(".novoBanner").removeClass("active");
        $('#formulario')[0].reset();
        CKEDITOR.instances.p_conteudo.setData(""); 
        $("#custId").val('');
    });
    
    $(".lista-usuarios li .editar-usuario").click(function(){

        var id = $(this).attr("data-idusu");
        var nome = $(this).attr("data-nome");
        var login = $(this).attr("data-login");
        var senha = $(this).attr("data-senha");
        var img = $(this).attr("data-img");
        var tipo = $(this).attr("data-tipo");
        var email = $(this).attr("data-email");
        var acesso = $(this).attr("data-acesso");

        if (acesso[0] === '1') {
            $('#Dashboard').attr("checked", true);
        }
        
        if (acesso[1] === '1') {
            $('#Banners').attr("checked", true);
        }
        
        if (acesso[2] === '1') {
            $('#Depoimentos').attr("checked", true);
        }
        
        if (acesso[3] === '1') {
            $('#Tickets').attr("checked", true);
        }
        
        if (acesso[4] === '1') {
            $('#Chat').attr("checked", true);
        }
        
        if (acesso[5] === '1') {
            $('#Blog').attr("checked", true);
        }
        
        if (acesso[6] === '1') {
            $('#Categorias').attr("checked", true);
        }
        
        if (acesso[7] === '1') {
            $('#FAQs').attr("checked", true);
        }

        if (acesso[8] === '1') {
            $('#Newsletter').attr("checked", true);
        }
        
        if (acesso[9] === '1') {
            $('#Informações').attr("checked", true);
        }
        
        if (acesso[10] === '1') {
            $('#Usuarios').attr("checked", true);
        }
        
        $(".novoBanner").addClass("active");
        $(".novoBanner label").addClass("active");
        $("#nome").val(nome);
        $("#email").val(email);
        $("#usuario").val(login);
        $("#senha").val(senha);
        $("#custId").val(id);
        $("#tipo_usu").val(tipo);

    })

     $(".lista-usuarios li .deletar-usuario").click(function(){
        var id = $(this).attr("data-idusu");
        var formData = { 
            'idusu' : id
        }

        $.ajax({
            url: "admin-usuario-crud.php",
            type: "POST",
            data: formData,
            dataType: 'json',
            success: function(retorno){
                if (retorno.status == '1'){
                    $("#alerta p span").text(retorno.mensagem);
                    $("#alerta").addClass("active");
                    setTimeout(function(){
                        window.location.reload();
                    },2000);
                }else{
                    $("#alerta p span").text(retorno.mensagem);
                    $("#alerta").addClass("active");
                    setTimeout(function(){
                        window.location.reload();
                    },2000);
                }
            }
        });

    })

    $(".lista-post li .editar-blog").click(function(){

        var id = $(this).attr("data-id");
        var titulo = $(this).attr("data-titulo");
        var data = $(this).attr("data-dataTime");
        var idCategoria = $(this).attr("data-idcategoria");
        var img = $(this).attr("data-img");
        var conteudo = $(this).attr("data-conteudo");
        var palavrasChave = $(this).attr("data-palavrasChave");
        var autor = $(this).attr("data-autor");
        var desc = $(this).attr("data-desc");

        $(".novoBanner").addClass("active");
        $(".novoBanner label").addClass("active");
        $("#custId").val(id);
        $("#titulo").val(titulo);
        $("#categoria").val(idCategoria);
        $("#autor").val(autor);
        $("#descricao").val(desc);

        CKEDITOR.instances.p_conteudo.setData(conteudo); 
        $("#palavrasChave").val(palavrasChave);

    })

    $(".lista-post li .deletar-blog").click(function(){
        var id = $(this).attr("data-id");
        var formData = { 
            'idpost_blog' : id
        }

        $.ajax({
            url: "admin-blog-crud.php",
            type: "POST",
            data: formData,
            dataType: 'json',
            success: function(retorno){
                if (retorno.status == '1'){
                    $("#alerta p span").text(retorno.mensagem);
                    $("#alerta").addClass("active");
                    setTimeout(function(){
                        window.location.reload();
                    },2000);
                }else{
                    $("#alerta p span").text(retorno.mensagem);
                    $("#alerta").addClass("active");
                    setTimeout(function(){
                        window.location.reload();
                    },2000);
                }
            }
        });

    })

    $(".lista-categoria li .editar-categoria").click(function(){

        var id = $(this).attr("data-id");
        var categoria = $(this).attr("data-categoria");

        $(".novoBanner").addClass("active");
        $(".novoBanner label").addClass("active");
        $("#custId").val(id);
        $("#categoria").val(categoria);

    })

    $(".lista-categoria li .deletar-categoria").click(function(){
        var ds_cat = $(this).attr("data-ds_cat");
        var formData = { 
            'ds_categoria' : ds_cat
        }
        
        $.ajax({
            url: "admin-categoria-crud.php",
            type: "POST",
            data: formData,
            dataType: 'json',
            success: function(retorno){
                if (retorno.status == '1'){
                    $("#alerta p span").text(retorno.mensagem);
                    $("#alerta").addClass("active");
                    setTimeout(function(){
                        window.location.reload();
                    },2000);
                }else{
                    $("#alerta p span").text(retorno.mensagem);
                    $("#alerta").addClass("active");
                    setTimeout(function(){
                        window.location.reload();
                    },2000);
                }
            }
        });

    })

    $(".lista-faqs li .editar-faq").click(function(){
        var pergunta = $(this).attr("data-pergunta");
        var resposta = $(this).attr("data-resposta");
        var cusId = $(this).attr("data-idfaqs");

        $(".novoBanner").addClass("active");
        $(".novoBanner label").addClass("active");
        $("#pergunta").val(pergunta);
        $("#resposta").val(resposta);
        $("#custId").val(cusId);
    })

    $(".lista-faqs li .deletar-faq").click(function(){
        var idfaqs = $(this).attr("data-idfaqs");
        var formData = { 
            'idfaqs' : idfaqs
        }

        $.ajax({
            url: "admin-faqs-crud.php",
            type: "POST",
            data: formData,
            dataType: 'json',
            success: function(retorno){
                if (retorno.status == '1'){
                    $("#alerta p span").text(retorno.mensagem);
                    $("#alerta").addClass("active");
                    setTimeout(function(){
                        window.location.reload();
                    },2000);
                }else{
                    $("#alerta p span").text(retorno.mensagem);
                    $("#alerta").addClass("active");
                    setTimeout(function(){
                        window.location.reload();
                    },2000);
                }
            }
        });

    })

    $(".lista-depoimentos li .alterar-depoimento").click(function(){
        var autor = $(this).attr("data-entrevistado");
        var depoimento = $(this).attr("data-depoimento");
        var img = $(this).attr("data-img");
        var iddepo = $(this).attr("data-iddepo");

        $(".novoBanner").addClass("active");
        $(".novoBanner label").addClass("active");
        $("#autor").val(autor);
        $("#depoimento").val(depoimento);
        $("#iddepo").val(iddepo);

    })

    $(".lista-depoimentos li .deletar-depoimento").click(function(){
        var iddepo = $(this).attr("data-iddepo");
        var formData = { 
            'iddepo' : iddepo
        }

        $.ajax({
            url: "admin-depoimento-crud.php",
            type: "POST",
            data: formData,
            dataType: 'json',
            success: function(retorno){
                if (retorno.status == '1'){
                    $("#alerta p span").text(retorno.mensagem);
                    $("#alerta").addClass("active");
                    setTimeout(function(){
                        window.location.reload();
                    },2000);
                }else{
                    $("#alerta p span").text(retorno.mensagem);
                    $("#alerta").addClass("active");
                    setTimeout(function(){
                        window.location.reload();
                    },2000);
                }
            }
        });

    })

    $(".lista-banners li .editar-banner").click(function(){
        var pretitulo = $(this).attr("data-pretitulo");
        var titulo = $(this).attr("data-titulo");
        var img = $(this).attr("data-img-banner");
        var linkvideo = $(this).attr("data-link");
        var idbanner = $(this).attr("data-idbanner");

        $(".novoBanner").addClass("active");
        $(".novoBanner label").addClass("active");
        $("#idbanner").val(idbanner);
        $("#pretitulo").val(pretitulo);
        $("#titulo").val(titulo);
        $("#link").val(linkvideo);

    })

    $(".lista-banners li .deletar-banner").click(function(){
        var idbanner = $(this).attr("data-idbanner");
        var formData = { 
            'idbanner' : idbanner
        }

        $.ajax({
            url: "admin-banners-crud.php",
            type: "POST",
            data: formData,
            dataType: 'json',
            success: function(retorno){
                if (retorno.status == '1'){
                    $("#alerta p span").text(retorno.mensagem);
                    $("#alerta").addClass("active");
                    setTimeout(function(){
                        window.location.reload();
                    },2000);
                }else{
                    $("#alerta p span").text(retorno.mensagem);
                    $("#alerta").addClass("active");
                    setTimeout(function(){
                        window.location.reload();
                    },2000);
                }
            }
        });
    })

    $(".lista-newsletter li .deletar-newsletter").click(function(){
        var idnewsletter = $(this).attr("data-idnewsletter");
        var formData = { 
            'idnewsletter' : idnewsletter
        }

        $.ajax({
            url: "admin-newsletter-crud.php",
            type: "POST",
            data: formData,
            dataType: 'json',
            success: function(retorno){
                if (retorno.status == '1'){
                    $("#alerta p span").text(retorno.mensagem);
                    $("#alerta").addClass("active");
                    setTimeout(function(){
                        window.location.reload();
                    },2000);
                }else{
                    $("#alerta p span").text(retorno.mensagem);
                    $("#alerta").addClass("active");
                    setTimeout(function(){
                        window.location.reload();
                    },2000);
                }
            }
        });
    })

}
function chat(){
    $("#chat .abre-gaveta").click(function(){
        $("#chat").css({"height":"100vh"})
        $("#chat .gaveta").addClass("active");
        $("#chat").css({"z-index":"9999"});
    });
    $("#chat .fecha-gaveta").click(function(){
        $("#chat").css({"height":"100px"})
        $("#chat .gaveta").removeClass("active");
        $("#chat").css({"z-index":"995"});
    });
}

function depoimentos(){
    var largura = window.pageXOffset;
    if(largura > 960){
        $("#depoimentos .slidedepoimentos").jCarouselLite({
            speed: 300,
            visible: 3,
            btnNext: "#depoimentos .next",
            btnPrev: "#depoimentos .prev"
        });
    }else{
        $("#depoimentos .slidedepoimentos").jCarouselLite({
            speed: 300,
            visible: 1,
            btnNext: "#depoimentos .next",
            btnPrev: "#depoimentos .prev"
        });
    }
}

function particulas(){
    particlesJS("particles", {
        "particles": {
            "number": {
                "value": 80,
                "density": {
                    "enable": true,
                    "value_area": 800
                }
            },
            "color": {
                "value": "#ffffff"
            },
            "shape": {
                "type": "circle",
                "stroke": {
                    "width": 0,
                    "color": "#000000"
                },
                "polygon": {
                    "nb_sides": 5
                },
                "image": {
                    "src": "img/github.svg",
                    "width": 100,
                    "height": 100
                }
            },
            "opacity": {
                "value": 0.5,
                "random": false,
                "anim": {
                    "enable": false,
                    "speed": 1,
                    "opacity_min": 0.1,
                    "sync": false
                }
            },
            "size": {
                "value": 3,
                "random": true,
                "anim": {
                    "enable": false,
                    "speed": 40,
                    "size_min": 0.1,
                    "sync": false
                }
            },
            "line_linked": {
                "enable": true,
                "distance": 150,
                "color": "#ffffff",
                "opacity": 0.4,
                "width": 1
            },
            "move": {
                "enable": true,
                "speed": 6,
                "direction": "none",
                "random": false,
                "straight": false,
                "out_mode": "out",
                "bounce": false,
                "attract": {
                    "enable": false,
                    "rotateX": 600,
                    "rotateY": 1200
                }
            }
        },
        "interactivity": {
            "detect_on": "canvas",
            "events": {
                "onhover": {
                    "enable": true,
                    "mode": "grab"
                },
                "onclick": {
                    "enable": true,
                    "mode": "push"
                },
                "resize": true
            },
            "modes": {
                "grab": {
                    "distance": 140,
                    "line_linked": {
                        "opacity": 1
                    }
                },
                "bubble": {
                    "distance": 400,
                    "size": 40,
                    "duration": 2,
                    "opacity": 8,
                    "speed": 3
                },
                "repulse": {
                    "distance": 200,
                    "duration": 0.4
                },
                "push": {
                    "particles_nb": 4
                },
                "remove": {
                    "particles_nb": 2
                }
            }
        },
        "retina_detect": true
    });
}

function menuAdmin(){
    $(".menu-btn").click(function(){
        $("#sidenav").toggleClass("active");
        $("#content").toggleClass("active");
    });
}

function editarInfos(){
    // $(".pagina h6 i").click(function(){
    //     $(this).offsetParent().find(".overflow").addClass("active");
    // });

    $(".pagina h6 .editar-pag-principal").click(function(){
        var palavra = $(this).attr("data-palavra");
        var titulo = $(this).attr("data-titulo");
        var idpag = $(this).attr("data-idpag");

        $(this).offsetParent().find(".overflow").addClass("active");
        $(".overflow label").addClass("active");
        $("#tituloDaPagina").val(titulo);
        $("#palavrasChave").val(palavra);
        $("#idpag").val(idpag);
    })

    $(".pagina h6 .editar-pag-tipo-conta").click(function(){
        var palavra = $(this).attr("data-palavra");
        var titulo = $(this).attr("data-titulo");
        var idtipc = $(this).attr("data-idtipc");

        $(this).offsetParent().find(".overflow").addClass("active");
        $(".overflow label").addClass("active");
        $("#tituloDaPaginaTC").val(titulo);
        $("#palavrasChaveTC").val(palavra);
        $("#idtipc").val(idtipc);
    })

    $(".pagina h6 .editar-pag-faq").click(function(){
        var palavra = $(this).attr("data-palavra");
        var titulo = $(this).attr("data-titulo");
        var idfaq = $(this).attr("data-idfaq");

        $(this).offsetParent().find(".overflow").addClass("active");
        $(".overflow label").addClass("active");
        $("#tituloDaPaginaF").val(titulo);
        $("#palavrasChaveF").val(palavra);
        $("#idfaq").val(idfaq);
    })

    $(".pagina h6 .editar-contatos").click(function(){
        var email = $(this).attr("data-email");
        var tel = $(this).attr("data-tel");
        var whats = $(this).attr("data-whats");
        var idcontatos = $(this).attr("data-idcontatos");

        $(this).offsetParent().find(".overflow").addClass("active");
        $(".overflow label").addClass("active");
        $("#email").val(email);
        $("#telefone").val(tel);
        $("#whatsapp").val(whats);
        $("#idcontatos").val(idcontatos);
    })


    $(".pagina h6 .editar-rede-social").click(function(){
        var face = $(this).attr("data-face");
        var insta = $(this).attr("data-insta");
        var yout = $(this).attr("data-yout");
        var idrede = $(this).attr("data-idrede");

        $(this).offsetParent().find(".overflow").addClass("active");
        $(".overflow label").addClass("active");
        $("#idredesocial").val(idrede);
        $("#facebook").val(face);
        $("#Instagram").val(insta);
        $("#youtube").val(yout);
    })

    $(".pagina h6 .editar-pag-blog").click(function(){
        var palavra = $(this).attr("data-palavra");
        var titulo = $(this).attr("data-titulo");
        var idblog = $(this).attr("data-idblog");

        $(this).offsetParent().find(".overflow").addClass("active");
        $(".overflow label").addClass("active");
        $("#tituloDaPaginaB").val(titulo);
        $("#palavrasChaveB").val(palavra);
        $("#idblog").val(idblog);
    })

    $(".overflow .close").click(function(){
        $(".overflow").removeClass("active");
    });
}

function chatAdmin(){
    $(".chat ul li").click(function(){
        $(".chat ul li").each(function(){
            $(this).removeClass("active");
        });
        $(this).addClass("active");
    });
    $("button.tab").click(function(){
        $("button.tab").removeClass("active");
        $(this).addClass("active");    
    });
}
var b = 0; 

function aparecer(item, altura){
    var scrolling = window.pageYOffset;
    var a = ($(item).offset() || { "top": NaN }).top - altura;
    var ultimoid = $('#idUltimo').val();

    if(scrolling >= a){
        if (b == 0) {
            var formData = { 
                'requisicao_post' : '5',
                'idultimopost' : ultimoid
            }

            $.ajax({
                url: "admin-blog-crud.php",
                type: "POST",
                data: formData,
                dataType: 'json',
                success: function(retorno){

                    for (var i = 0; i < retorno.length; i++) {
                        if (i == (retorno.length-1)) {
                            $("#idUltimo").val(retorno[i].idpost_blog);
                        }

                        console.log(retorno[i]);
                        var ul = $('ul.posts');

                        ul.append('<li class="suave">'+
                            '<a href="#!">'+
                            '<div class="imagem">'+
                            '<img src="'+retorno[i].img+'" class="responsive-img">'+
                            '<span>'+retorno[i].ds_categoria+'</span>'+
                            '</div>'+
                            '<div class="dados">'+
                            '<h3 class="font">'+retorno[i].titulo+'</h3>'+
                            '<p class="font">'+retorno[i].p_conteudo+'</p>'+
                            '<b class="font">Leia mais<i class="mdi-navigation-arrow-forward right"></i></b>'+
                            '<div class="clear"></div>'+
                            '</div>'+
                            '</a>'+
                            '</li>');
                    }
                }
            });
            b = 1;
        }
    }else{
        b = 0;
    }
}


function rolarBarraProgress(){
    // var height = window.pageYOffset;
    // var innerHeight = $('body').innerHeight();
    // var janela = $(window).height();

    // var offset = $("footer:last").offset();

    

    // if ((innerHeight - 850) <= height) {
    //     alert(Math.floor(offset.top) +' / ' + innerHeight + ' / ' + height + ' / ' + janela);


    // }
}


