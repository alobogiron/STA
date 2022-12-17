$(document).ready(function(){

    $("#sltEstados").change(function(){
        var idPais = $(this).children("option:selected").attr('id');
        var endereco = "https://servicodados.ibge.gov.br/api/v1/localidades/estados/"+idPais+"/municipios";
        $.ajax({
            url: endereco ,
            type: "GET" ,
            data: {
                orderBy: "nome"
            },
            success: function(cidades){
                console.log(cidades);
                var i;
                if($('#sltCidades').val() == null){
                    var opcoes = "<option selected disabled>Escolha um estado</option>";
                }else{
                    var opcoes = "<option selected value="+$('#sltCidades').val()+">"+$('#sltCidades').val()+"</option>";
                }
                for(i=0; i< cidades.length; i++){
                    opcoes = opcoes + "<option value='"+cidades[i].nome+"'>"+cidades[i].nome+"</option>"
                }
                $("#sltCidades").html(opcoes);
            },
        });
    });
    
    $("#sltPaises").change(function(){
        if($("#sltPaises").val() != "Brasil"){
            $("#sltEstados").attr("disabled","disabled");
            $("#sltCidades").attr("disabled","disabled");
            $('#sltEstados').html('');
            $('#sltCidades').html('');
        }else{
            $("#sltEstados").removeAttr("disabled");
            $("#sltCidades").removeAttr("disabled");

            $.ajax({
                url: "https://servicodados.ibge.gov.br/api/v1/localidades/estados?orderBy=nome" ,
                type: "GET" ,
                data: {
                    orderBy: "nome"
                },
                success: function(estados){
                    var i;
                    if($('#sltEstados').val() == null){
                        var opcoes = "<option selected disabled>Escolha um estado</option>";
                    }else{
                        var opcoes = "<option selected value="+$('#sltEstados').val()+">"+$('#sltEstados').val()+"</option>";
                    }
                    for(i=0; i< estados.length; i++){
                        opcoes = opcoes + "<option value='"+estados[i].nome+"' id="+estados[i].id+">"+estados[i].nome+"</option>"
                    }
                    $("#sltEstados").html(opcoes);
                    $("#sltEstados").trigger("change");
                },
            });
        }
    });

    $.ajax({
        url: "https://servicodados.ibge.gov.br/api/v1/localidades/paises?orderBy=nome" ,
        type: "GET" ,
        data: {
            orderBy: "nome"
        },
        success: function(paises){
            var i;
            if($('#sltPaises').val() == null){
                var opcoes = "<option selected disabled>Escolha um país</option>";
            }else{
                var opcoes = "<option selected value="+$('#sltPaises').val()+">"+$('#sltPaises').val()+"</option>";
                $("#sltPaises").trigger("change");
            }
            for(i=0; i< paises.length; i++){
                opcoes = opcoes + "<option value='"+paises[i].nome+"'>"+paises[i].nome+"</option>"
            }
            $("#sltPaises").html(opcoes);
        },
    });
    
}); // Localidade funcs

$(function () {

    var display;
    var viewportWidth = $(window).innerWidth();

    $(window).resize(function() {
        viewportWidth = $(window).innerWidth();
        display = $('.menu-desktop').css('display');

        if(viewportWidth > 558){
            $(".menu-mobile").css("display", "none");
            $(".menu-desktop").css("display", "block");
        }else{
            $(".menu-desktop").css("display", "none");
            $(".menu-mobile").css("display", "block");
        }
    });
    
    $(document).ready(function(){
        var path = window.location.pathname;
        var page = path.split("/").pop();
        console.log(page);
        
        if((page == "paciente_menu.php") || (page == "regis_paciente.php")  ){
            console.log('to aqui1');
            $('.menu-desktop .menu-item a').eq(2).addClass('active');
        }else if(page == "sessao_menu.php"){
            console.log('to aqui2');
            $('.menu-desktop .menu-item a').eq(3).addClass('active');
        }else if((page == "tentativa_menu.php") || (page == "rel_paciente.php")){
            $('.menu-desktop .menu-item a').eq(1).addClass('active');
        }

        viewportWidth = $(window).innerWidth();
        display = $('.menu-desktop').css('display');

        if(viewportWidth > 558){
            $(".menu-mobile").css("display", "none");
            $(".menu-desktop").css("display", "block");
        }else{
            $(".menu-desktop").css("display", "none");
            $(".menu-mobile").css("display", "block");
        }
    });

    $(".menu-desktop .logo").click(function(){
        if(viewportWidth > 558){
            display = $('.menu-desktop').css('display');
            if(display == "block"){
                $('.menu-desktop .logo').css("background-color", "#282838");
                $('.menu-desktop').css("box-shadow", "5px 0px 5px #ccc");
                $('.menu-item a').css("text-align", "initial");
                $(".menu-item a span").fadeIn('slow');
                $(".menu-user .user-name").fadeIn();
                $(".menu-user .options").fadeIn();
                $(".menu-desktop").animate({
                    width: '300px'
                });
                $(".menu-item a").animate({
                    padding: '20px 0px 20px 30px'
                });
                $(".menu-item a span").animate({
                    padding: '0 10px'
                });
            }else{
            $(".menu-mobile").css("display", "none");
            $(".menu-desktop").css("display", "block");
            }
        }
    });

    $(".menu-mobile .logo").click(function(){
        if(viewportWidth <= 558){
            display = $('.menu-mobile').css('display');
            if(display == "block"){
                $(".menu-desktop").fadeIn();
                $('.menu-desktop').css("box-shadow", "5px 0px 5px #ccc");
                $('.menu-item a').css("text-align", "initial");
                $(".menu-item a span").fadeIn('slow');
                $(".menu-user .user-name").fadeIn();
                $(".menu-user .options").fadeIn();
                $(".menu-desktop").animate({
                    width: '300px'
                });
                $(".menu-item a").animate({
                    padding: '20px 0px 20px 30px'
                });
                $(".menu-item a span").animate({
                    padding: '0 10px'
                });
            }else{
                $(".menu-desktop").css("display", "none");
                $(".menu-mobile").css("display", "block");
        }
        }
    });

    $(".container").click(function(){
        if(viewportWidth > 558){
            $('.menu-desktop .logo').css("background-color", "#43425D");
            $('.menu-desktop').css("box-shadow", "initial");
            $('.menu-item a').css({"text-align": "center", "padding": "20px 0"});
            $('.menu-item a span').css({"padding": "0", "display": "none"});
            $(".menu-user .user-name").css("display", "none");
            $(".menu-user .options").css("display", "none");
            $(".menu-desktop").animate({
                width: '100px'
            });
        }else{
            $(".menu-desktop").fadeOut();
            $('.logo').css("background-color", "transparent");
            $('.menu-desktop').css("box-shadow", "initial");
            $('.menu-item a').css({"text-align": "center", "padding": "20px 0"});
            $('.menu-item a span').css({"padding": "0", "display": "none"});
            $(".menu-user .user-name").css("display", "none");
            $(".menu-user .options").css("display", "none");
            $(".menu-desktop").animate({
                width: '100px'
            });
            $(".menu-mobile").fadeIn();
            
        }
    });
});

$(document).ready(function(){

    for(var i = 1; i <= 3; i++){
        console.log($('#percent'+i).text());
        if(parseFloat($('#percent'+i).text()) > 0){
            $('.percent'+i).addClass('link-success')
            $('#percent-ico'+i).addClass('bi bi-arrow-up-square-fill')
        }else if(parseFloat($('#percent'+i).text()) == 0){
            $('.percent'+i).addClass('link-dark')
            $('#percent-ico'+i).addClass('bi bi-arrow-up-square-fill')
        }else{
            $('.percent'+i).addClass('link-danger')
            $('#percent-ico'+i).addClass('bi bi-arrow-down-square-fill')
        }
    }
});





/*
var modal = document.getElementById("myModal");
var btn = document.getElementById("myBtn");
var span = document.getElementById("close")[0];

btn.onclick = function(){
    modal.style.display = "block";
}

span.onclick = function(){
    modal.style.display = "none";
}

window.onclick = function(event){
    if(event.target == modal){
        modal.style.display = "none";
    }
}
*/