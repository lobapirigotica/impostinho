<?php
    if(isset($_POST['submit'])){
       $nome = $_POST['nome'];
       $salario_bruto = $_POST['salario'];

        if($salario_bruto <= 1045){
            $descontoINSS = $salario_bruto * 0.075;
        }

        elseif($salario_bruto > 1045 && $salario_bruto <= 2089.60){
            $descontoINSS = $salario_bruto * 0.09;
        }

        elseif($salario_bruto > 1045 && $salario_bruto <= 2089.60){
            $descontoINSS = $salario_bruto * 0.12;
        }

        else{
            $descontoINSS = $salario_bruto * 0.14;
        }

        $salarioMenosINSS = $salario_bruto - $descontoINSS;
        
        if($salarioMenosINSS <= 1903.98){
            $descontoIRPF = 0.0;
            $deducao = 0.0;
        }

        elseif($salarioMenosINSS > 1903.98 && $salarioMenosINSS <= 2826.65) {
            $descontoIRPF = $salario * 0.075;
            $deducao = 142.80;  
        }

        elseif($salarioMenosINSS > 2826.65 && $salarioMenosINSS <= 3751.05){
            $descontoIRPF = $salario * 0.15;
            $deducao = 354.80;
        }

        elseif($salarioMenosINSS > 3751.05 && $salarioMenosINSS <= 4664.68){
            $descontoIRPF = $salarioMenosINSS * 0.225;
            $deducao = 636.13;
        }

        elseif($salarioMenosINSS > 4664.68){
            $descontoIRPF = $salarioMenosINSS * 0.275;
            $deducao = 869.36;
        }

        $descontoIRPF = $descontoIRPF + $deducao;

        $salario_liquido = $salario_bruto - $descontoINSS - $descontoIRPF;

        $file = fopen("dados.txt", "a");

        fwrite($file, "|Nome: ".$nome." |");
        fwrite($file, "Sario Bruto: ".$salario_bruto." |");
        fwrite($file, "Desconto INSS: ".$descontoINSS." |");
        fwrite($file, "Desconto IRPF: ".$descontoIRPF." |");
        fwrite($file, "Salario Líquido: ".$salario_liquido." ");

        fclose($file);

        
        
       header("Location: index.php");
    }
    else{
        header("Location: index.php");
        return;
    }

?>