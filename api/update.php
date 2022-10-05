<?php

    include_once("connection.php");

    $originalDate  = $_POST['data'];
    $timestamp     = strtotime($originalDate); 
    $newDate       = date("Y-m-d", $timestamp );
    $nome          = $_POST['nome'];
    $cpfUsu        = $_POST['cpf'];
    $cell          = $_POST['tel'];
    $email         = $_POST['email'];
    $endereco      = $_POST['address'];
    $texto         = $_POST['texto'];
    $id         = $_POST['id'];

    function validacaoCPF($cpf) {
        // Extrai somente os números
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }
        // // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
        // // Faz o calculo para validar o CPF funçao que faz a soma dos resultados do calculo do cpf, o valor multiplica-se 
        // por 10 e divide-se por 11 se o resultado for igual a 10 ou 11 o cpf é valido para o os numeros verificadores, repetese
        // para o proximo digito verificador 
        for ($aux = 9; $aux < 11; $aux++) {
            for ($d = 0, $c = 0; $c < $aux; $c++) {
                $d += $cpf[$c] * (($aux + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return $cpf;
    }
    function removerCaracteresEspeciais($nome){
        $res = preg_replace('/[0-9\@\.\;\" "]+/', '', $nome);
        return $res;
    }
    $newCpf  = validacaoCPF($cpfUsu);
    $newNome = removerCaracteresEspeciais($nome); 
    // echo("PRINTR POST");
    // print_r($_POST);
    // } || Email LIKE '%$email%' where Nome LIKE '%$nome%'Email LIKE \"$nome\" OR WHERE  Nome LIKE \"%$nome%\"

    $query ="UPDATE `usuario` SET `Nome`=\'$newNome\',`Email`=\'$email\',`Cpf`=\'$newCpf\',`Cell`=\'$cell\',`Endereco`=\'$endereco\',`Texto`=\'$texto\',`DataNascimento`=\'$newDate\' WHERE id = \'$id\';";;
    $salvar = mysqli_query($conexao, $query);
    
    function carregaDados($salvar){
        $i=0;
        $limiteRegistros = 10;
        while($i < $limiteRegistros ){
            $teste[$i] = mysqli_fetch_array($salvar);
            $i++;
        }
        return json_encode($teste);
    }
    $result = carregaDados($salvar);
    print_r(($result));
    mysqli_close($conexao);

?>
