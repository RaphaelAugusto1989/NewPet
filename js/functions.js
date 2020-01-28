
//CARREGAR LOAD
$(window).load(function() {
	// Animate loader off screen
	$(".se-pre-con").fadeOut("slow");;
});

//FUNÇÃO VOLTAR PÁGINA
function Voltar() {
	window.open(document.referrer,'_self');
}

//FUNÇÃO OCULTAR E EXIBIR SENHA
$(document).ready(function(){
	$('#showPassword').on('click', function(){
		var passwordField = $('#password');
		var passwordFieldType = passwordField.attr('type');
		if(passwordFieldType == 'password') {
			passwordField.attr('type', 'text');
			$(this).html('<i class="fas fa-eye-slash"></i>');
		} else {
			passwordField.attr('type', 'password');
			$(this).html('<i class="fas fa-eye"></i>');
		}
	});
});

//FUNÇÃO BALÃO DE TEXTO "TOOLTIP"
$(function() {
    // var tooltips = $("[title]").tooltip({
    //   position: {
    //     my: "left top",
    //     at: "right+5 top-5",
    //     collision: "none"
    //   }
	// });
	
	$( "#show-option" ).tooltip({
		show: {
		  effect: "slideDown",
		  delay: 250
		}
	  });
	  $( "#hide-option" ).tooltip({
		hide: {
		  effect: "explode",
		  delay: 250
		}
	  });
	  $( "#open-event" ).tooltip({
		show: null,
		position: {
		  my: "left top",
		  at: "left bottom"
		},
		open: function( event, ui ) {
		  ui.tooltip.animate({ top: ui.tooltip.position().top + 10 }, "fast" );
		}
	  });
});

//FUNÇÃO PARA BUSCAR CEP
jQuery(function($){
    $(".cep").change(function(){
       var cep_code = $(this).val();
       if( cep_code.length <= 0 ) return;
       $.get("https://apps.widenet.com.br/busca-cep/api/cep.json", { code: cep_code },
          function(result){
             if( result.status!=1 ){
                alert(result.message || "Houve um erro desconhecido");
                return;
             }
             $("input#cep").val( result.code );
             $("input#estado").val( result.state );
             $("input#cidade").val( result.city );
             $("input#bairro").val( result.district );
             $("input#endereco").val( result.address );
             $("input#estado").val( result.state );
          });
    });
 });

 //FUNÇÃO MASCARA PARA FORMULARIO
 $(document).ready(function(){
    $(".cpf").mask("999.999.999-99");
    $(".cnpj").mask("99.999.999/9999-99");
	$(".fixo").mask("(99) 9999-9999");
	$(".cel").mask("(99) 99999-9999");
	$(".moeda").mask("#.##0,00", {reverse: true});
	$(".hora").mask("99:99");
	$(".data").mask("99/99/9999");
	$(".cep").mask("99.999-999");
})

//FUNÇÃO MASCARA PARA FORMULARIO CPF E CNPJ NO MESMO INPUT
$("#cpfcnpj").keydown(function(){
    try {
        $("#cpfcnpj").unmask();
    } catch (e) {}

    var tamanho = $("#cpfcnpj").val().length;

    if(tamanho < 11){
        $("#cpfcnpj").mask("999.999.999-99");
    } else {
        $("#cpfcnpj").mask("99.999.999/9999-99");
    }

    // ajustando foco
    var elem = this;
    setTimeout(function(){
        // mudo a posição do seletor
        elem.selectionStart = elem.selectionEnd = 10000;
    }, 0);
    // reaplico o valor para mudar o foco
    var currentValue = $(this).val();
    $(this).val('');
    $(this).val(currentValue);
});

//FUNÇÃO PARA VERIFICAR SE O E-MAIL É VALIDO
function validaEmail(email) {
	teste_arroba = "false"; //VAR PARA VERIFICAR SE FOI DIGITADO PELO MENOS UM ARROBA NO E-MAIL
	teste_ponto = "false";  //VAR PARA VERIFICAR SE FOI DIGITADO PELO MENOS UM PONTO NO E-MAIL
									
	tamanho_email = email.length;

	if (tamanho_email > 4) {
		for (i=0; i < tamanho_email; i++) {
			if (((email.charAt(i) == "@") || (email.charAt(i) == ".")) && ((i == 0) || (i == parseInt(tamanho_email) - 1))) {   //DIGITOU'@' OU '.' NA PRIMEIRA OU �LTIMA POSI\u00C7\u00C1O
				return (false);
			} else {
				if (email.charAt(i) == "@")  { //ACHOU ARROBA
					if (teste_arroba == "true") { //ENCONTROU 2 ARROBAS
						return (false);
					} else {
						teste_arroba = "true";
						if ((email.charAt(i + 1) == ".") || (email.charAt(i - 1) == ".") || (email.charAt(i + 1) == "@")) {	//ACHOU "@.", ".@" OU "@@"
							return (false);
						}
					}
				} else {
					if (email.charAt(i) == ".") { //ACHOU PONTO
						teste_ponto = "true";
						if ((email.charAt(i + 1) == ".") || (email.charAt(i - 1) == ".")) {	//ACHOU ".."
							return (false);
						}

					}
				}
			}
		}

		if (teste_arroba == "false" || teste_ponto == "false") { //NÃO ENCONTROU ARROBA OU PONTO NO EMAIL
			return (false);
		}
	} else { //email com menos de 5 caracteres
		return (false);
	}
	return (true);
}

//FUNÇÃO VERIFICA SE CPF É VÁLIDO
function validaCPF(cpf) {
	cpf = cpf.replace(".","");
	cpf = cpf.replace(".","");
	cpf = cpf.replace(".","");
	cpf = cpf.replace("-","");
	rcpf1 = cpf.substr(0,9)
	rcpf2 = cpf.substr(9,2)

        // if(rcpf1.substring(1,9)/rcpf1.substring(0,1)==11111111)
	//	return false;
 
        d1 = 0;

        for (i=0; i<9; i++)
	    d1 += rcpf1.charAt(i)*(10-i);
        d1 = 11 - (d1 % 11);
        
        if (d1 > 9) d1 = 0;

        if (rcpf2.charAt(0) != d1)
	    return false;

        d1 *= 2;

        for (i=0; i<9; i++)
            d1 += rcpf1.charAt(i)*(11-i);
        d1 = 11 - (d1 % 11);

        if (d1 > 9) d1 = 0;

        if (rcpf2.charAt(1) != d1)
	   return false;

        return true;
}

//FUNÇÃO PARA VERIFICAR SE CNPJ É VÁLIDO
function validaCNPJ(strCNPJ) {

	if (strCNPJ == "") {
		return true;
	}

	x = strCNPJ;
	var temp = "";

	for(i=0;i<19;i++) {
		if(x.substr(i,1) != "." && x.substr(i,1) != "/" && x.substr(i,1) != "-") {
			temp = temp + x.substr(i,1);
		}
	}

	strCNPJ = temp;
	
	if (parseFloat(strCNPJ) > 0) {
		var
			strDV = strCNPJ.substr(12, 2),
			intSoma,
			intDigito = 0,
			strControle = "",
			strMultiplicador = "543298765432";
			strCNPJ = strCNPJ.substr(0, 12);

		for(var j = 1; j <= 2; j++) {
			intSoma = 0;

			for(var i = 0; i <= 11; i++) {
				intSoma += (parseInt(strCNPJ.substr(i, 1), 10) * parseInt(strMultiplicador.substr(i, 1), 10))
			}

			if(j == 2) { 
				intSoma += (2 * intDigito) 
			}
			intDigito = (intSoma * 10) % 11;

			if(intDigito == 10) {
				intDigito = 0
			}

			strControle += intDigito.toString();
			strMultiplicador = "654329876543";
		}

		return(strControle == strDV);
	} else {
		return false;
	}
}



