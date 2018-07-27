$(document).ready(function(){

    $('ul.tabs').tabs();
    $('.tooltipped').tooltip({delay: 10});
    $('select').material_select();
    
    verSenha();
    responder();
    analistas();
    //novoChamado();
    verChamadoLista();
    alerts();
    menu();
    ajusteRelatorio();
    //graficos();
    filtroSolicitacao();
    filtros();
    selectiSearch();
    selectiSearchControl();
    
})
$(window).scroll(function(){
    responder();
})
$(window).resize(function(){
    ajusteRelatorio();
})

function verSenha(){
    $(".ver").click(function(){
        var tipo = $(this).next("input").attr("type");
        if (tipo == 'password'){
            $(this).next("input").attr("type", "text");
        } else {
            $(this).next("input").attr("type", "password");
        }
    })
}

function activeTicket(){
    $(".tickets .itens li").click(function(){
        $(".tickets .itens li").each(function(){
            $(this).removeClass("active");
        })
        $(this).addClass("active");
        $(".ticket-descricao").addClass("active");
        $(".overlay").addClass("active");

        var foto = $(this).find(".foto img").attr("src");
        var assunto = $(this).find(".assunto").text();
        var nome = $(this).find("span.left").text();
        
        $(".ticket-descricao .foto img").attr("src", foto);
        $(".ticket-descricao h6 .assunto").text(assunto);
        $(".ticket-descricao h6 .nome").text(nome);
        console.log(nome)
    });

    $(".ticket-descricao .foto").click(function(){
        $(this).offsetParent().addClass("active");
        $(".overlay").addClass("active");
    })
    $(".ticket-descricao .close").click(function(){
        $(this).offsetParent().removeClass("active");
        $(".overlay").removeClass("active");
    })
}

function filtroSolicitacao(){
    $("#f-tipo").change(function(){
        var tipo = $(this).select().val();
        $("#listaChamados li").each(function(){
            var tiposelecionado = $(this).find(".tipo").text();
            if(tipo == tiposelecionado){
                $(this).css({"display":"block"})
            }else if(tipo == 'Todas'){
                $(this).css({"display":"block"})
            }else{
                $(this).css({"display":"none"})
            }
        })
    })

    $("#f-prioridade").change(function(){
        var prioridade = $(this).select().val();
        $("#listaChamados li").each(function(){
            var prioridadeselecionado = $(this).find(".prioridade").text();
            if(prioridade == prioridadeselecionado){
                $(this).css({"display":"block"})
            }else if(prioridade == 'Todas'){
                $(this).css({"display":"block"})
            }else{
                $(this).css({"display":"none"})
            }
        })
    })

    $("#f-status").change(function(){
        var status = $(this).select().val();
        $("#listaChamados li").each(function(){
            var statusselecionado = $(this).find(".legenda").attr("data-status");
            console.log(statusselecionado+'+'+status);
            if(status == statusselecionado){
                $(this).css({"display":"block"})
            }else if(status == 0){
                $(this).css({"display":"block"})
            }else{
                $(this).css({"display":"none"})
            }
        })
    })
}

function responder(){
    $(".responder").click(function(){
        var altura = $(".chamados").height();
        var deslize = $(".chamados").scrollTop();
        $("#resposta").focus();
        $(".chamados").animate({
            scrollTop: altura
        },{
            duration: 300,
            specialEasing: {
                height: "easeInOut"
            }
        })
        if(deslize > 0){
            $(this).addClass("hide");
        }else{
            $(this).removeClass("hide");
        }
    })
}

function analistas(){
    $(".openAnalistas").click(function(){
        $("#analistas").addClass("active");
    })
    $("#analistas .fechar").click(function(){
        $("#analistas").removeClass("active");
    })
}

function novoChamado(){
    $(".novoTicket").click(function(){
        $("#novoChamado").addClass("active");
    })
    $("#novoChamado .fechar").click(function(){
        $("#novoChamado").removeClass("active");
    })
}

function verChamadoLista(){
    $(".items-lista li i.click").click(function(){
        var a = $(this).offsetParent().attr("data-state");
        
        $(".items-lista li").each(function(){
            $(this).removeClass("active");
            $(this).find("i.click").removeClass("mdi-content-remove-circle");
            $(this).find("i.click").addClass("mdi-content-add-circle");
            $(this).attr("data-state", 0);
        })
        
        if(a == 0){
            $(this).offsetParent().addClass("active");
            $(this).offsetParent().find("i.click").removeClass("mdi-content-add-circle");
            $(this).offsetParent().find("i.click").addClass("mdi-content-remove-circle");
            $(this).offsetParent().attr("data-state", 1);
        }else{
            $(this).offsetParent().removeClass("active");
            $(this).offsetParent().find("i.click").removeClass("mdi-content-remove-circle");
            $(this).offsetParent().find("i.click").addClass("mdi-content-add-circle");
            $(this).offsetParent().attr("data-state", 0);
        }
        
    })
    $(".items-lista li i.mais").click(function(){
	    $(this).offsetParent().find(".actions").toggleClass("active");
	    $(this).toggleClass("light-blue-text");
    })
}

function alerts(){
    $(".activeAlert").click(function(){
        $("#alerta").addClass("active");
        setTimeout( function(){
            $("#alerta").addClass("out");
        }, 1500);
        setTimeout( function(){
            $("#alerta").removeClass("active out");
        }, 2100);
    })
    $(".activeAlert2").click(function(){
        $("#alerta2").addClass("active");
        setTimeout( function(){
            $("#alerta2").addClass("out");
        }, 1500);
        setTimeout( function(){
            $("#alerta2").removeClass("active out");
        }, 2100);
    })
}

function menu(){
    $(".nav-menu").click(function(){
        $("#topo, .menu, .chamados").toggleClass("active");
    })
}

function ajusteRelatorio(){
    var a = $(window).width();
    if(a >= 768){
        $(".relatorio-container .row").addClass("valign-wrapper");
        $(".relatorio-container .row .col.replace").addClass("valign");
    }else{
        $(".relatorio-container .row").removeClass("valign-wrapper");
        $(".relatorio-container .row .col.replace").removeClass("valign");
    }
}

function filtros(){
    $(".filtros").click(function(){
        $("#filtros").addClass("active");
    });
    $("#filtros i").click(function(){
        $("#filtros").removeClass("active");
    });
}

function selectiSearch(){
    $('.selectiSearch').each(function(){
        var primeiroFilho = $(this).find('ul li:first-child').text();
        $(this).find('input').val(primeiroFilho);
    });
}
function selectiSearchControl(){
    $(document).on('click','#n-empresa-lista li', function(){
        var nome = $(this).text();
        var id = $(this).attr('data-empresa');
        var input = $('#n-empresa');
        input.val(nome);
        input.attr('data-empresa',id);

        $("#n-funcionario-lista li").each(function(){
            var empresaFuncionario = $(this).attr('data-empresa');
            if(id == empresaFuncionario){
                $(this).css({"display":"block"})
            }else{
                $(this).css({"display":"none"})
            }
        });
    });
    $(document).on('click','#n-funcionario-lista li', function(){
        var nome = $(this).text();
        var id = $(this).attr('data-funcionario');
        var id2 = $(this).attr('data-empresa');
        var id3 = $(this).attr('data-email');
        var input = $('#n-funcionario');
        input.val(nome);
        input.attr('data-funcionario',id);
        input.attr('data-empresa',id2);
        input.attr('data-email',id3);
    });
}


function graficos(){
    var ctx1 = document.getElementById("grafico1").getContext('2d');
    var grafico1 = new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
            datasets: [{
                label: 'Faturamento 2013',
                data: [700, 1200, 900, 1200, 700, 1000, 730, 750, 700, 720, 730, 1100],
                backgroundColor: [
                    '#03a9f4',
                    '#03a9f4',
                    '#03a9f4',
                    '#03a9f4',
                    '#03a9f4',
                    '#03a9f4',
                    '#03a9f4',
                    '#03a9f4',
                    '#03a9f4',
                    '#03a9f4',
                    '#03a9f4',
                    '#03a9f4'
                ],
                borderWidth: 2,
                stepped: true
            },{
                label: 'Faturamento 2014',
                data: [800, 1300, 1000, 1300, 800, 1100, 830, 850, 800, 820, 830, 1200],
                backgroundColor: [
                    '#039be5',
                    '#039be5',
                    '#039be5',
                    '#039be5',
                    '#039be5',
                    '#039be5',
                    '#039be5',
                    '#039be5',
                    '#039be5',
                    '#039be5',
                    '#039be5',
                    '#039be5'
                ],
                borderWidth: 2,
                stepped: true
            },{
                label: 'Faturamento 2015',
                data: [900, 1400, 1100, 1400, 900, 1200, 930, 950, 900, 920, 930, 1300],
                backgroundColor: [
                    '#0288d1',
                    '#0288d1',
                    '#0288d1',
                    '#0288d1',
                    '#0288d1',
                    '#0288d1',
                    '#0288d1',
                    '#0288d1',
                    '#0288d1',
                    '#0288d1',
                    '#0288d1',
                    '#0288d1'
                ],
                borderWidth: 2,
                stepped: true
            },{
                label: 'Faturamento 2016',
                data: [1000, 1500, 1200, 1500, 1000, 1300, 1030, 1050, 1000, 1020, 1030, 1400],
                backgroundColor: [
                    '#0277bd',
                    '#0277bd',
                    '#0277bd',
                    '#0277bd',
                    '#0277bd',
                    '#0277bd',
                    '#0277bd',
                    '#0277bd',
                    '#0277bd',
                    '#0277bd',
                    '#0277bd',
                    '#0277bd'
                ],
                borderWidth: 2,
                stepped: true
            }]
        },
        options: {
            responsive: true,
            scales: {
                xAxes: [{
                    stacked: true
                }],
                yAxes: [{
                    ticks: {
                        min: 600
                    }
                }]
            },
            legend: {
                position: 'bottom'
            },
            tooltips: {
                mode: 'index',
                intersect: false
            }
        }
    });
}

//FIREBASE

//empresas
//{"empresa_id":0,"cnpj":"0","razao_social":"0","fantasia":"0","endereco":"0","telefone":"0","contato":"0","email":"0"}

//empresas usuarios
//{"empresa_id":0,"usuario_id":0,"nome_completo":"0","usuario":"0","senha":"0","ativo":"0","tipo":"0","empresas_empresa_id":0}

//chamados anexo
//{"chamado_id":0,"anexo":"0","chamados_chamado_id":0,"chamados_empresas_empresa_id":0}

//chamados
//{"chamado_id":0,"empresa_id":0,"data_solicitacao":"0","hora_solicitacao":"0","quem_abriu_chamado":"0","usuario_id":0,"analista_id":0,"titulo":"0","emails":"0","descricao":"0","prioridade":"0","tipo_solicitacao":"0","status":"0","data_fechamento":"0","hora_fechamento":"0","analista_id_fechamento":0,"usuario_nome":"Flávio Vilarin"}

//analistas
//{"analista_id":0,"nome_completo":"0","usuario":"0","senha":"0","ativo":"0","chamados_chamado_id":0,"chamados_empresas_empresa_id":0}

//chamados historico
//{"chamado_id":0,"historico_id":0,"usuario_id":0,"analista_id":0,"data":"0","hora":"0","descricao":"0","solucao":"0","chamados_chamado_id":0,"chamados_empresas_empresa_id":0}

//historico anexo
//{"historico_id":0,"anexo":"0","chamados_historico_chamado_id":0,"chamados_historico_chamados_chamado_id":0,"chamados_historico_chamados_empresas_empresa_id":0}

//tipo solicitacao
//{"solicitacao_id":0,"descricao":"0"}


