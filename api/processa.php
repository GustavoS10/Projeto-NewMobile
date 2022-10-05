<?php
    include_once("connection.php");

    #conversao de datas para o db
    $originalDate  = $_POST['data'];
    $timestamp     = strtotime($originalDate); 
    $newDate       = date("Y-m-d", $timestamp );
    $nome          = $_POST['nome'];
    $cpfUsu        = $_POST['cpf'];
    $cell          = $_POST['tel'];
    $email         = $_POST['email'];
    $endereco      = $_POST['address'];
    $texto         = $_POST['texto'];

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
    $query = "insert into usuario (Nome, Email, Cpf, Cell, Endereco, Texto, DataNascimento) 
    values ('$newNome', '$email', '$newCpf', '$cell', '$endereco','$texto','$newDate')";
    $salvar = mysqli_query($conexao, $query);
    mysqli_close($conexao);
    header("Location: http://localhost/newmobile/dados/dados.html");
?>