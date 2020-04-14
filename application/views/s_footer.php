<footer class="fixed-bottom bg-primary align-middle">
    <div class="text-white align-middle p-2">
        <small>Newpet - versão 1.0.1</small>
    </div>
</footer>
</div><!--FIM DIV CORPO -->
</body>
<script type="text/javascript" src="<?= base_url('assets/js/jquery_loading.js') ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?= base_url('assets/js/jquery_mask.js') ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?= base_url('assets/js/fontawesome_5.12.0.min.js') ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?= base_url('assets/js/menu.js') ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?= base_url('assets/js/functions.js') ?>" charset="utf-8"></script>   
<script type="text/javascript">
    //FUNÇÃO VOLTAR PÁGINA
    function Voltar() {
        window.open(document.referrer,'_self');
    }

    //MOSTRAR TIPO DE CONSULTA
    $(document).ready(function(){
        $(document).on("change", "#tipo", function(){
            $("#cpf").hide();
            $("#"+$(this).attr("doc")).fadeIn();
            
        }); 
    });

    $('#tipo').change(function(){ 
        var tipo = $('#tipo').val();
        if (valor == '1') {
            $('#nome').show();
        } else {
            $('#nome').hide();
        }

        if ($this.valor == '2') {
            $('#pet').show();
        } else {
            $('#pet').hide();
        }

        if ($this.valor == '3') {
            $('#cpf').show();
        } else {
            $('#cpf').hide();
        }

        if ($this.valor == '4') {
            $('#fone').show();
        } else {
            $('#fone').hide();
        }
    });

    //FUNÇÃO MOSTRAR E OCULTAR DIV CPF/CNPJ
    $(document).ready(function(){
        $(document).on("change", ".checkradio", function(){
            $("#cpf, #cnpj").hide();
            $("#"+$(this).attr("doc")).fadeIn();
            
        }); 
    });

    //FUNÇÃO MOSTRAR E OCULTAR DIV ATIVADO/DESATIVADO
    $('#ativo').click(function() {
        $("#ativado").toggle(this.checked);

        if($("#ativo").is(':checked')){
            $("#ativado").fadeIn();
            $("#desativado").hide();
        } else {
            $("#desativado").fadeIn();
            $("#ativado").hide();
        }
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
    });
    
    //FUNÇÃO MOSTRAR CALENDÁRIO
    $( function() {
        $( ".data" ).datepicker({
            dateFormat : 'dd/mm/yy',
            // showOn: "button",
            // buttonImage: "img/calendar.png",
            // buttonSize: "10",
            // buttonImageOnly: true,
            // buttonText: "Select date"
            dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
            dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
            dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
            monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
            monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
            nextText: 'Próximo',
            prevText: 'Anterior'
        });
    } );

    //FUNÇÃO PARA BUSCAR CEP
    $(document).ready(function() {

    function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $("#rua").val("");
        $("#bairro").val("");
        $("#cidade").val("");
        $("#uf").val("");
        $("#ibge").val("");
    }

        //Quando o campo cep perde o foco.
        $("#cep").blur(function() {

            //Nova variável "cep" somente com dígitos.
            var cep = $(this).val().replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if(validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    $("#rua").val("...");
                    $("#bairro").val("...");
                    $("#cidade").val("...");
                    $("#uf").val("...");
                    $("#ibge").val("...");

                    //Consulta o webservice viacep.com.br/
                    $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                        if (!("erro" in dados)) {
                            //Atualiza os campos com os valores da consulta.
                            $("#rua").val(dados.logradouro);
                            $("#bairro").val(dados.bairro);
                            $("#cidade").val(dados.localidade);
                            $("#uf").val(dados.uf);
                            $("#ibge").val(dados.ibge);
                        } //end if.
                        else {
                            //CEP pesquisado não foi encontrado.
                            limpa_formulário_cep();
                            alert("CEP não encontrado.");
                        }
                    });
                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        });
    });//FIM DA FUNÇÃO PARA BUSCAR CEP

    //FUNÇÃO PARA DIGITAR SÓ NÚMEROS NO INPUT
    function somenteNumeros(e) {
        var charCode = e.charCode ? e.charCode : e.keyCode;
        // charCode 8 = backspace   
        // charCode 9 = tab
        if (charCode != 8 && charCode != 9) {
            // charCode 48 equivale a 0   
            // charCode 57 equivale a 9
            if (charCode < 48 || charCode > 57) {
                return false;
            }
        }
    }

    //GERA PASSWORD AUTOMATICAMENTE
    function geraPassword() {
        var pass = "";
        var chars = 8; //Número de caracteres da senha

        generate = function(chars) {
            for (var i= 0; i < chars; i++) {
                pass = pass + getRandomChar();
            }
            document.getElementById("password").value = pass;
            //$("#senha").val(pass);
        }
        
        this.getRandomChar = function() {
            var ascii = [[48, 57],[97,122]];
            var i = Math.floor(Math.random()*ascii.length);
            return String.fromCharCode(Math.floor(Math.random()*(ascii[i][1]-ascii[i][0]))+ascii[i][0]);
        }
        generate(chars);
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

    //FUNÇÃO MOSTRAR DADOS NO MODAL EXCLUSÃO
    $(document).on("click", ".btnExcluir", function(){
       var id   = $(this).attr("data-id");
       var nome = $(this).attr("data-nome");
       
       $("#recipient-name").html(nome);
       $("#linkExclusao").attr("href", "./ExcluiUsuario/"+id);
    })

</script>
</html>