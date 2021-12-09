<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currículo  Download</title>
    <link rel="stylesheet" type="text/css" href="css/curriculo.css">
    <script src="https://kit.fontawesome.com/5d7c26c4ce.js" crossorigin="anonymous"></script>
</head>
    <style type="text/css">
             * {
                  margin: 0;
                  padding: 0;
                }
                .container {
                  display: grid;
                  grid-template-columns: 1fr 2.5fr;
                  grid-template-rows: 10vh 30vh 50vh 10vh;
                  grid-template-areas: "menu menu" "header text" "main div" "footer footer";
                }
                menu {
                  background: rgb(2,0,36);
                  background: orange;
                  grid-area: menu;
                  color: black;
                }
                menu h1{
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    padding-top: 3vh;
                    
                }
                header {
                  display: flex;
                  align-items: center;
                  justify-content: center;
                  grid-area: header;
                  color: black;
                 

                }
                text{
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                  background-color: red;
                  grid-area: text;
                  color: black;  
                  padding-left: 36vh;              
                }
                main {
                  color: black;
                  grid-area: main;
                  
                }
                div {
                  color: black;
                  grid-area: div;
                }
                footer {
                  color: black;
                  grid-area: footer;
                }
                .image{
                    
                    width: auto;
                    height: 20vh;
                    border-radius: 30%;

                }
                footer h1
                {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    padding-top: 3vh;
                    
                }
                h1{
                    padding-top: 3vh;
                }
                .texto{
                  display: flex;
                  justify-content: center;
                  flex-direction: column;
                  padding-left: 36vh;
                }
                main{
                  display: flex;
                  flex-direction: column;
                  justify-content: center;
                  padding-left: 15vh;
                }

    </style>

<?php
    ini_set('default_charset', 'utf-8');
    if($_POST){
    $nome = $_POST['nome'];   
    $email = $_POST['email'];   
    $profissao = $_POST['profissao'];    
    $idade = $_POST['idade']; 
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone']; 
    $cidade = $_POST['cidade'];  
    $estado = $_POST['estado'];
    $estadocivil = $_POST['estadocivil'];
    $filho = $_POST['filho'];
    $experiencias = $_POST['experiencias'];
    $escolaridade = $_POST['escolaridade'];
    
    if(isset($_FILES['foto']))
    {
        $ext = strtolower(substr($_FILES['foto']['name'],-4));
        $new_name = $_POST['nome'].$ext;
        $dir = 'img/';

        move_uploaded_file($_FILES['foto']['tmp_name'], $dir.$new_name);
    }
    
    $a = "$nome.html";
    
    $arquivo = fopen($a, 'a+');
    
    $texto = '<h1>Bem vindo(a) '.$nome. '!</h1>';
    $texto .= '<h3 style="color:red">'.$email.'</h3>';
    $texto .= '<h4>Seu telefone é: '.$telefone.'</h4>';
    
    fwrite($arquivo,$texto);
    
    fclose($arquivo);
    
}


?>

<?php

function calcularIdade($date){
    $date = date('Y-m-d', strtotime(str_replace("/", "-", $date)));
            $time = strtotime($date);
            
            if($time === false){
                return '';
            }
            $year_diff = '';
            $date = date('Y-m-d', $time);
            
            list ($year, $month, $day) = explode('-', $date);
            
            $year_diff = date('Y') - $year;
            $month_diff = date('m') - $month;
            $day_diff = date('d') -$day;
            
            if ($day_diff < 0 && $month_diff < 0 || $month_diff < 0){
                $year_diff--;
            }
            return $year_diff;
            
            echo "Nome: $nome".calcularIdade($date)." anos de idade.";
        }
        
        ?>
<body>
    <div class="container">
       <menu>
          <h1>Currículo</h1>
        </menu>
        <header>
          <img src="http://paulod.profrodolfo.com.br/PHP%20-%20Curriculo/'.$dir.$new_name.'" class="image">
        </header>
        <text>
            <h3>Nome:'.mb_strtoupper($nome).'</h3>
            <br>
            <h3>Idade:'.calcularIdade($date).'</h3>
            <br>
            <h3>E-mail:'.$email.'</h3>
            <br>
            <h3>Telefone: '.$telefone.'</h3>
            <br>
            <h3>Profissão: '.$profissao.'</h3>
        </text>

        <main>
          <h3>Endereço: '.$endereco.'</h3>
          <br>
          <h3>'.$cidade.' - '.$estado.'</h3>
          <br>
          <h3>Estado Civil: '.$estadocivil.'</h3>
          <br>
          <h3>Possui Filhos: '.$filho.'</h3>

        </main>

        <div class="texto">
          <h3>Experiências: '.$experiencias.'</h3>
          <br>
          <h3>Escolaridade: '.$escolaridade.'</h3>
          <br>
        </div>
        
    </div>
</body>
</html>