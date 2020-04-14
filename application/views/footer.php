<div class="fixed-bottom rodape">
    <div class="col-lg-12 text-primary">
        Copyright ©2020- Sistema NewPet. Todos os direitos reservados. <span class="float-right">versão 1.0.5</span>
    </div>
</div>
<script type="text/javascript" src="<?= base_url('assets/js/jquery.js') ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.js') ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?= base_url('assets/js/jquery_ui.js') ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?= base_url('assets/js/jquery_loading.js') ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?= base_url('assets/js/jquery_mask.js') ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?= base_url('assets/js/fontawesome_5.12.0.min.js') ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?= base_url('assets/js/functions.js') ?>" charset="utf-8"></script>

<script type="text/javascript">
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

        $(document).on("keyup", ".cpfRecLogin",function(){
            var cpf = $(this).val().replace(/[^ 0-9]/g, "");
            $(this).val(cpf);
        })
    });
    
    //FUNÇÃO MOSTRA MSG DE CAPSLOCK ATIVADO
    var input = document.getElementById("password");
    var text = document.getElementById("msgCapsLock");
    input.addEventListener("keyup", function(event) {
        if (event.getModifierState("CapsLock")) {
            text.style.display = "block";
        } else {
            text.style.display = "none"
        }
    });
</script>
</body>
</html>