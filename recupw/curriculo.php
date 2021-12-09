<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currículo Finalizado</title>
    <link rel="stylesheet" type="text/css" href="css/curriculo.css">
</head>

<?php
    ini_set('default_charset', 'utf-8');
    if($_POST){
    $nome = $_POST['nome'];   
    $email = $_POST['email'];   
    $profissao = $_POST['profissao'];    
    $date = $_POST['idade']; 
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone']; 
    $cidade = $_POST['cidade'];  
    $estado = $_POST['estado'];
    $estadocivil = $_POST['estadocivil'];
    $filho = $_POST['filho'];
    $experiencias = $_POST['experiencias'];
    $escolaridade = $_POST['escolaridade'];
    $arquivo = $_FILES['foto']['name'];
    

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
            
            echo "Seu nome é $nome, você tem ".calcularIdade($date)." anos.";
        }
        
if(isset($_FILES['foto']))
    {
        $ext = strtolower(substr($_FILES['foto']['name'],-4));
        $new_name = $_POST['nome'].$ext;
        $dir = 'img/';

        move_uploaded_file($_FILES['foto']['tmp_name'], $dir.$new_name);
    }
    
    $a = "$nome.html";
    
    $arquivo = fopen($a, 'a+');
    
    $html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currículo -  Download</title>
    <link rel="stylesheet" type="text/css" href="css/curriculo.css">
    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/5d7c26c4ce.js" crossorigin="anonymous"></script>
</head>
<!-- CSS - Curriculo -->
    <style type="text/css">
             *{
    margin: 0;
}
input{
    margin-bottom: 5px;
}
#header{
    margin-right: 5%;
}
h1{
    margin-bottom: 10px;
}
body{
    background-color: rgb(255, 255, 255);
    font-family: sans-serif;
    font-size: 1em;
    color: black;
    margin-left: 36%;
    margin-top: 2%;
    justify-content: center;
    align-content: center;
    
}
#experiencias, #referencias, #objetivos, #formacoes{
    display: flex;
    align-items: center;
    align-content: center;
    padding: 1px;
    
}
#formacoes{
    padding-top: 10px;
}
fieldset{
    border: 0;
    margin: 0;
    padding: 10px;
    margin-left: -0.9%;
}
#estadocivil{
    margin-top: 10%;
}

input, select, textarea, button{
    border-radius: 5%;
    font-family: sans-serif;
    font-size: 1em;
    color: black;
}
.campo input[type="text"], .campo input[type="email"], .campo select, .campo textarea, .campo input[type="radio"]{
    padding: 0.2em;
    color: black;
    box-shadow: 2px 2px 2px rgba(0,0,0,0.2);
    display: block;

}
#button:hover{
    background: #ccbbff;
    box-shadow: inset 2px 2px 2px rgba(0,0,0,0.2);
    text-shadow: none;
}

#button, select{
    cursor: pointer;
}
#button{
    margin-left: 8.5%;
    margin-top: 2%;
}


    </style>
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
            <h3>Telefone:'.$telefone.'</h3>
            <br>
            <h3>Profissão:'.$profissao.'</h3>
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

        <div>
          <h3>Experiências: '.$experiencias.'</h3>
          <br>
          <h3>Escolaridade: '.$escolaridade.'</h3>
          <br>
        </div>
        
    </div>
</body>
</html>';
  
    fwrite($arquivo,$html);
    
    fclose($arquivo);
    
  
}


?>

<body>
       <div class="container">
             <menu>
                <h1>
                    Currículo criado com exito!!!
                </h1>
              </menu>
            <!-- <header>
                header
            </header> -->

              <div>
                    <?php
            echo '<a href="'.$a.'" download class="button_download">Donwload</a>';

                    ?>
              </div>

        </div>
        
</body>
</html>