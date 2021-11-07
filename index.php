<?php 
  session_start();
  error_reporting(0);
	ini_set("display_errors", 0); 
//ALTER TABLE `exercito`.`arranchado`  ADD CONSTRAINT `user_id_data_ref_UNIQUE` UNIQUE (`data_ref` ASC, `user_id` ASC)  
	require ('php/config.php'); 
	require ('php/connection.php'); #connection deve ser chamado anetes do database 
	require ('php/database.php');	

  $_SESSION["status"] = ''; 
  $_SESSION['login'] = ''; 

	if (isset($_POST['pw'])){
		//print_r($_POST);
		//var_dump($_POST);

		$pst = $_POST['posto'];
    $nome = $_POST['un'];
    $senha = $_POST['pw'];

    $leitura = DBRead('usuario',"Where nome = '{$nome}' AND posto = '{$pst}'", 'senha, user_id');
    //var_dump($leitura);
    $pass = @array_values($leitura[0]);
    //var_dump($pass);
    $word= $pass[0];
    //var_dump($word);
    $user_id= $pass[1];
    //var_dump($user_id);
    if ($senha && ($senha == $word)){
      //echo "DEU CERTOOOOOOOOO";
      $_SESSION["status"] = "open";
      $_SESSION["posto"] = $pst;
      $_SESSION["login"] = $nome;
      $_SESSION["user_id"] = $user_id;
      echo "<meta http-equiv='refresh' content='0; url=subpagina/arranchar.php'>"; /*http://chivunk.000webhostapp.com/subpagina/arranchar.php*/
      exit();
    }
		
	}	

    
    
/*
if (isset($_POST['entrar'])){
    $login = $_POST['login'];
    $senha = $_POST['senha']; 
    if ($senha != null && $senha != ' '){ 
    $leitura = DBRead('usuario',"Where email = '{$login}'", ' senha');
    $pass = @array_values($leitura[0]);
    //var_dump($pass);
    $word= $pass[0];
    //echo $word;   
      if ($word == $senha){
        unset($_SESSION['status']);
        unset($_SESSION['login']);
        session_destroy;        //file_put_contents("C:/wamp64/www/php/usuario.txt", $login);
        $_SESSION["login"]= $login;     //$ip = file_get_contents();//pega o endereco ip dentro do arquivo .txt
        $_SESSION['status'] = 1;  
        header("Location: subpagina/home.php");
        exit;
      }else{
        echo "<div class='alert alert-danger'><strong>Falha!</strong> Dados não correspondem.</div>";
      }
    }
  }

	
	
	foreach ($_POST as $key => $value) {
        echo "<tr>";
        echo "<td>";
        echo $key;
        echo "</td>";
        echo "<td>";
        echo $value;
        echo "</td>";
        echo "</tr>";
    }*/
?>
<!doctype html lang="pt-br"> 
<head>
  <meta charset="utf-8">
  <meta name="viewport"       content="width=device-width, initial-scale=1.0, user-scalable=no">
  <!-- Chrome, Firefox OS and Opera -->
  <meta name="theme-color" content="#4cac4c">
  <!-- Windows Phone -->
  <meta name="msapplication-navbutton-color" content="#4cac4c">
  <!-- iOS Safari -->
  <meta name="apple-mobile-web-app-status-bar-style" content="#4cac4c">
  <title>CHIVUNK</title>   
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>
  <link rel="stylesheet" href="css-dayone/style.css">

 <style type="text/css">
  body{
    background: #84de94;
  }
  .login-html{
    background: rgba(40, 101, 87, 0.28);
  } 
  .login-html .sign-in-htm, .login-html .sign-up-htm {
    left: -42px;
    right: -40px;
  }

  .login-form .group .input, .login-form .group .button {
    padding: 15px 39px;
  }
   option{
    background-color: #4d8232b3;
  }
 </style> 
</head>

<body background="ex.jpg">
  <div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Entrar</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Cadastrar</label>
		<div class="login-form">
			<div class="sign-in-htm">
        <div class="row" style="display:flex">
          <select id="selecio" style="height: 41px;margin-top: 20px;background-color: #509e5187;color: black;font-size: large;border-radius: 12px;">
            <option value="SD EV">SD EV</option>
            <option value="SD EP">SD EP</option>
            <option value="CB">CB</option>
            <option value="SGT">SGT</option>
            <option value="S TEN">S TEN</option>
            <option value="TEN">TEN</option>
            <option value="CAP">CAP</option>
          </select>
          <div class="group">
            <label for="user" class="label" style="color : #fff">Nome</label>
            <input id="user" type="text" class="input" style="margin-left: 8px;margin-right: 104px;padding-left: 27px;padding-right: 65px;">
          </div>
        </div>    
        <div class="group">
					<label for="pass" class="label" style="color : #fff">Senha</label>
					<input id="pass" type="password" class="input" data-type="password">
				</div>
				<div class="group">
					<input id="check" type="checkbox" class="check" checked>
					<label for="check"><span class="icon"></span>Mantenha-me logado</label>
				</div>
				<div class="group">
					<input type="submit" class="button" value="Entrar" onClick="autoLogIn()">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<a href="#forgot">Esqueceu a senha?</a>
				</div>
			</div>
			<!--<div class="sign-up-htm">
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="user" type="text" class="input">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" class="input" data-type="password">
				</div>
				<div class="group">
					<label for="pass" class="label">Repeat Password</label>
					<input id="pass" type="password" class="input" data-type="password">
				</div>
				<div class="group">
					<label for="pass" class="label">Email Address</label>
					<input id="pass" type="text" class="input">
				</div>
				<div class="group">
					<input type="submit" class="button" value="Sign Up">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<label for="tab-1">Already Member?</a>
				</div>
			</div>-->
		</div>
	</div>
</div>
  
   <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>


<?php
  echo "console.log('".$_SESSION['login']."');";
?>
      


function autoLogIn() {

  var posto = document.getElementById("selecio").value;
  var usuario = document.getElementById("user").value;
  var senha = document.getElementById("pass").value;

  var form = document.createElement("form");

  form.name = "entrar";
  document.body.appendChild(form);
  form.method = "POST";
  form.action = "index.php";

  var element0 = document.createElement("INPUT");         
  element0.name="posto"
  element0.value = posto;
  element0.type = 'hidden'
  form.appendChild(element0);
  var element1 = document.createElement("INPUT");         
  element1.name="un"
  element1.value = usuario;
  element1.type = 'hidden'
  form.appendChild(element1);
  var element2 = document.createElement("INPUT");         
  element2.name="pw"
  element2.value = senha;
  element2.type = 'hidden'
  form.appendChild(element2); 
  


  form.submit();
}



/*
$(document).ready(function(){
    $("button").click(function(){
        $.post("demo_test_post.asp",
        {
          name: "Donald Duck",
          city: "Duckburg"
        },
        function(data,status){
            alert("Data: " + data + "\nStatus: " + status);
        });
    });
});*/
</script>
</body>

</html>
