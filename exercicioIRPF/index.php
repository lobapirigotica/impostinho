<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="./css/style.css" media="screen" />
    <title>IRPF</title>
</head>
<body>
    <div id="titulo">Cálculo de INSS e IRPF</div>

    <div id="formulario">
    <form action="calculo.php" method="post">
       
            <input id="barra_nome" name="nome" type="text" placeholder="Nome">
        
        
            <input id="barra_salario" name="salario" type="number" placeholder="Salário">
        
        
            <input id="barra_enviar" name="submit" type="submit">
        

    </form>
    </div>
    <div id="dados">
    <?php
        
        $dados = file_get_contents("dados.txt");
        if($dados){
            $dados_separados = explode("|", $dados);
            foreach($dados_separados as $key => $value)
                if($key % 5 ==0){
                    echo($value."<br>");
                }else{
                    echo($value);
                }
        }

    ?>
    </div>
</body>
</html>