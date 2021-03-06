<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

$idUsuario = 0;
$display_cpf = $cpfcnpj = $nome = $nasc = $email = $responsavel = $fixo = $celular = $cep = $rua = $num = $cidade = $bairro = $estado = $complemento = $tam = null;
$display_cnpj = ' style="display:none;" ';

$titulo = "CADASTRO DO USUÁRIO";

if(!empty($user)){
    $titulo = "ALTERAR DADOS DO USUÁRIO";
        
    foreach($user as $i => $us) {
        $data = explode("-", $user[$i]->nascimento_usuario);

        $idUsuario = $user[$i]->id_usuario;
        $cpfcnpj = $user[$i]->cpf_cnpj_usuario;
        $nome = $user[$i]->nome_empresa_usuario;
        $nasc = $data[2].'/'.$data[1].'/'.$data[0];
        $email = $user[$i]->email_usuario;
        $responsavel = $user[$i]->responsavel_empresa_usuario;
        $fixo = $user[$i]->fixo_usuario;
        $celular = $user[$i]->celular_usuario;
        $cep = $user[$i]->cep_usuario;
        $rua = $user[$i]->rua_usuario; 
        $num = $user[$i]->num_usuario;
        $cidade = $user[$i]->cidade_usuario;
        $bairro = $user[$i]->bairro_usuario;
        $estado = $user[$i]->estado_usuario;
        $complemento = $user[$i]->complemento_usuario;

        $tam = mb_strlen($cpfcnpj, 'utf8');

        if(strlen($cpfcnpj) > 14){
            $display_cnpj = null;
            $display_cpf  = ' style="display:none;" ';
        }
    }
}
?>
<div class="row pt-3">         
    <div class="col-2"></div>
    <div class="col-8 text-center">
        <h3 class="text-center"><?= $titulo ?></h3>
    </div>
    <div class="col-1 pr-0 mr-0"></div>
</div>
<div class="row">
    <div class="col-2"></div>
    <div class="col-8 text-right">
        <a href="#" class="btn btn-outline-primary" onclick="Voltar();"> <i class="fas fa-reply mr-2"></i> Voltar</a>
    </div>
    <div class="col-2 pr-0 mr-0"></div>
</div>
<div class="row">  
    <div class="col-2"></div>
    <div class="col-8">   
        <div class="row">
            <div class="col-lg-12 pt-2">
                <?php
                    if ($this->session->flashdata('Success') !="") {
                        echo "<p class='alert alert-success text-center'><i class='fas fa-check-circle'></i> " .$msg. "</p>";
                    } elseif ($this->session->flashdata('Error') !="") {
                        echo "<p class='alert alert-danger text-center'><i class='fas fa-exclamation-circle'></i> " .$msg. "</p>";
                    }
                ?>
                <h5 class="text-primary"> Dados Pessoais</h5>
            </div>
        </div>
        <form action="<?= site_url('Usuario/CadastraUsuario')?>" method="post">
            <div class="form-row">
                <div class="col-lg-1">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input checkradio" id="checkedcpf" name="check" doc="cpf" value="1" <?php if ($cpfcnpj == null) { echo "checked"; } elseif ($tam == '14') { echo "checked"; } else { echo ""; }?> >
                        <label class="custom-control-label" for="checkedcpf"> CPF</label>
                    </div>
                </div>
                <div class="col-lg-2" >
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input checkradio" id="checkedcnpj" name="check" doc="cnpj" value="2" <?php if ($tam == '18') { echo "checked"; } else { echo "";} ?>>
                        <label class="custom-control-label" for="checkedcnpj"> CNPJ</label>
                    </div>
             </div>
                <div class="col-lg-9"></div>
            </div>
            <!-- INICIO DIV CAMPOS CPF -->
            <div id="cpf" <?php echo $display_cpf;?>> 
                <div class="form-row">
                    <div class="col-lg-4">
                        <label for="cpfcnpj" class="mb-0 mt-2">CPF:</label>
                        <input type="text" name="cpf" class="form-control cpf" id="" placeholder="000.000.000-00" value="<?= $cpfcnpj ?>">
                    </div>
                    <div class="col-lg-8"></div>
                </div> 
                <div class="form-row">
                    <div class="col-lg-12">
                        <label for="" class="mb-0 mt-2">Nome Completo:</label>
                        <input type="text" name="nome" class="form-control" id="" maxlength="500" placeholder="Nome Completo do Usuário" value="<?= $nome?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-lg-4">
                        <label for="nascimento" class="mb-0 mt-2">Data de Nascimento:</label>
                        <input type="text" name="nascimento" class="form-control data" id="" placeholder="00/00/0000" value="<?= $nasc; ?>">
                    </div>
                    <div class="col-lg-8">
                        <label for="email" class="mb-0 mt-2">E-mail:</label>
                        <input type="email" name="email_usuario" class="form-control" id="" maxlength="200" placeholder="E-mail de contato" value="<?= $email?>">
                    </div>
                </div> 
            </div>
            <!-- FIM DIV CAMPOS CPF -->
            <!-- INICIO DIV CAMPOS CNPJ -->
            <div  id="cnpj"  <?php echo $display_cnpj;?>>
                <div class="form-row">
                    <div class="col-lg-4">
                        <label for="cpfcnpj" class="mb-0 mt-2">CNPJ:</label>
                        <input type="text" name="cnpj" class="form-control cnpj" id=""  placeholder="00.000.000/0000-00" value="<?= $cpfcnpj?>">
                    </div>
                    <div class="col-lg-8"></div>
                </div> 
                <div class="form-row">
                    <div class="col-lg-12">
                        <label for="" class="mb-0 mt-2">Nome da Empresa:</label>
                        <input type="text" name="empresa" class="form-control" id="" maxlength="300" placeholder="Nome da empresa" value="<?= $nome ?>">
                    </div>
                </div> 
                <div class="form-row">
                    <div class="col-lg-12">
                        <label for="" class="mb-0 mt-2">Responsável:</label>
                        <input type="text" name="responsavel" class="form-control" id="" maxlength="300" placeholder="Nome do Responsável" value="<?= $responsavel ?>">
                    </div>
                </div> 
                <div class="form-row">
                    <div class="col-lg-12">
                        <label for="email" class="mb-0 mt-2">E-mail:</label>
                        <input type="email" name="email_empresa" class="form-control" id="" maxlength="200" placeholder="E-mail de contato" value="<?= $email ?>">
                    </div>
                </div>
            </div>
            <!-- INICIO DIV CAMPOS CNPJ -->
            <div class="form-row">
                <div class="col-lg-6">
                    <label for="fixo" class="mb-0 mt-2">Telefone Fixo:</label>
                    <input type="text" name="fixo" class="form-control fixo" id="" placeholder="(99) 9999-9999" value="<?= $fixo ?>">
                </div>
                <div class="col-lg-6">
                    <label for="celular" class="mb-0 mt-2">Celular:</label>
                    <input type="text" name="celular" class="form-control cel" id="" placeholder="(99) 99999-9999" value="<?= $celular ?>">
                </div>
            </div>
            <div class="row pt-4">
                <div class="col-lg-12 pt-4">
                    <h5 class="text-primary"> Endereço</h5>
                </div>
            </div>
            <div class="form-row">
                <div class="col-lg-4">
                    <label class="mb-0 mt-2">CEP:</label>
                    <input type="text" name="cep" class="form-control cep" id="cep" placeholder="00.000-000" required value="<?= $cep ?>">
                </div>
                <div class="col-lg-8"></div>
            </div> 
            <small id="passwordHelpInline" class="text-muted">
                *Digite o CEP e ao sair do campo o endereço será preenchido automáticamente. Pode utilizar a tecla TAB após digitar o CEP.
            </small> 
            <div class="form-row">
                <div class="col-lg-12">
                    <label for="" class="mb-0 mt-2">Rua:</label>
                    <input type="text" name="rua" class="form-control" id="rua" placeholder="Rua" value="<?= $rua ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="col-lg-3">
                    <label class="mb-0 mt-2">Número:</label>
                    <input type="text" name="numero" class="form-control" id="" placeholder="" maxlength="5" onkeypress="return somenteNumeros(event)" value="<?= $num ?>">
                </div>
                <div class="col-lg-9">
                    <label class="mb-0 mt-2">Cidade:</label>
                    <input type="text" name="cidade" class="form-control" id="cidade" placeholder="Cidadae" value="<?= $cidade ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="col-lg-10">
                    <label class="mb-0 mt-2">Bairro:</label>
                    <input type="text" name="bairro" class="form-control" id="bairro" placeholder="Bairro" value="<?= $bairro ?>">
                </div>
                <div class="col-lg-2">
                    <label class="mb-0 mt-2">UF:</label>
                    <input type="text" name="estado" class="form-control" id="uf"  maxlength="2" placeholder="UF" value="<?= $estado ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="col-lg-12">
                    <label for="" class="mb-0 mt-2">Complemento:</label>
                    <input type="text" name="complemento" class="form-control" id="" maxlength="500" placeholder="Complemento" value="<?= $complemento ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="col-lg-12 mt-3 mb-4 pb-4 text-right">                    
                    <!-- SE NÃO EXISTIR DADOS CADASTRADOS, MOSTRAR BOTÃO SALVAR -->
                    <input type="hidden" name="id" value="<?= $idUsuario?>" />
                    <button type="submit" class="btn btn-success padbutton"><i class="fas fa-arrow-right ml-2"></i> Próximo</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-2 pr-0 mr-0"></div>
</div> <!-- FIM DIV CONTEÚDO -->
