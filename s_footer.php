 </div> <!--FIM DIV CORPO -->
<div class="fixed-bottom bg-primary align-middle">
    <div class="text-white align-middle p-2">
        Newpet - versão 1.0.0
    </div>
</div>
</body>
    <script type="text/javascript" src="js/jquery.js" charset="utf-8"></script>
    <script type="text/javascript" src="js/bootstrap.js" charset="utf-8"></script>
    <script type="text/javascript" src="js/jquery_ui.js" charset="utf-8"></script>
    <script type="text/javascript" src="js/jquery_loading.js" charset="utf-8"></script>
    <script type="text/javascript" src="js/jquery_mask.js" charset="utf-8"></script>
    <script type="text/javascript" src="js/fontawesome_5.12.0.min.js" charset="utf-8"></script>
    <script type="text/javascript" src="js/menu.js" charset="utf-8"></script>
    <script type="text/javascript" src="js/functions.js" charset="utf-8"></script>
    
    <script type="text/javascript">
    //FUNÇÃO MOSTRAR E OCULTAR DIV
        $(document).ready(function(){
            $(document).on("change", "#checked", function(){
                $("#cpf, #cnpj").fadeOut();
                $("#"+$(this).attr("doc")).fadeIn();
                
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
        });
    </script>
</html>