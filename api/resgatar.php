<?php
    include_once("../api/connection.php");
    $query ="SELECT * FROM `usuario`;";
    $salvar = mysqli_query($conexao, $query);
    function carregaDados($salvar){
        $i=0;
        $limiteRegistros = 10;
        while($i < $limiteRegistros ){
            $teste[$i] = mysqli_fetch_array($salvar);
            $i++;
        }
        return ($teste);
    }
    $result = carregaDados($salvar);
    print_r(json_encode($result));
    mysqli_close($conexao);
?>
