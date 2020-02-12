<div class="fixed-bottom rodape">
    <div class="col-lg-12 text-primary">
        Copyright ©2019 - Sistema NewPet. Todos os direitos reservados. <span class="float-right">versão 1.0.0</span>
    </div>
</div>
<script type="text/javascript" src="js/jquery.js" charset="utf-8"></script>
<script type="text/javascript" src="js/bootstrap.js" charset="utf-8"></script>
<script type="text/javascript" src="js/jquery_ui.js" charset="utf-8"></script>
<script type="text/javascript" src="js/jquery_loading.js" charset="utf-8"></script>
<script type="text/javascript" src="js/jquery_mask.js" charset="utf-8"></script>
<script type="text/javascript" src="js/fontawesome_5.12.0.min.js" charset="utf-8"></script>
<script type="text/javascript" src="js/functions.js" charset="utf-8"></script>

<script type="text/javascript">
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
</script>
</body>
</html>