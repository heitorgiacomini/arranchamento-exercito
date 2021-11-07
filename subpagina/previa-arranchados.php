<?php
  session_start();  
  require '../php/config.php'; 
  require '../php/connection.php'; #connection deve ser chamado antes do database 
  require '../php/database.php';
  if (!isset($_SESSION['status']) || $_SESSION['status'] != "open") {
    echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
    exit();
  }
  if (isset($_GET['dia'])){   
    $dia = $_GET['dia'];
    $mes = $_GET['mes'];
    $ano = $_GET['ano'];
    $deira = $dia.'-'.$mes.'-'.$ano;
    $request = @DBRead('arranchado',"INNER JOIN usuario ON arranchado.user_id = usuario.user_id WHERE  data_ref = '$deira' ORDER BY usuario.nmr_posto ASC", "usuario.posto, usuario.numero, usuario.nome, arranchado.cafe, arranchado.almoco, arranchado.jantar, arranchado.ceia");       
  }else{
    $deira='DATA NAO SELECIONADA'; 
  }
/*SELECT usuario.posto, usuario.nome, arranchado.cafe, arranchado.almoco, arranchado.jantar, arranchado.ceia
FROM arranchado
INNER JOIN usuario ON arranchado.user_id = usuario.user_id  
 WHERE  data_ref = '$deira' 
  ORDER BY usuario.nmr_posto DESC;

INNER JOIN usuario ON arranchado.user_id = usuario.user_id WHERE  data_ref = '$deira' ORDER BY usuario.nmr_posto DESC
*/


?> 
<!doctype html>
<html lang="en" >
<head>
  <meta charset="utf-8">
  <meta name="viewport"       content="width=device-width, initial-scale=1.0, user-scalable=no">
  <meta name="autor"          content="Heitor Giacomini">
  <meta name="revisit-after"  content="5 days">
  <meta name="robots"         content="index,follow">
  <!-- Chrome, Firefox OS and Opera -->
  <meta name="theme-color" content="#4cac4c">
  <!-- Windows Phone -->
  <meta name="msapplication-navbutton-color" content="#4cac4c">
  <!-- iOS Safari -->
  <meta name="apple-mobile-web-app-status-bar-style" content="#4cac4c">
  <title>CHIVUNK</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<!--https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css-->
  <link rel='stylesheet' href='css/bootstrap.min.css'>
  <link rel="stylesheet" href="css/css-Responsive-Table-Bootstrap/style.css">  
  <link rel="stylesheet" href="css/materialize.min.css">

<style>
  body {
  background-color: #4FECA2;
  }
  table{
    background-color: white;
  }
</style> 
</head>

<body>
<?php
  require "menu.php";
?>

<section id="main" class="main-section" style="margin-top:  18px">
  <center>

<div class="row" >
  <div class="col s12 m12 l12">
    <form >
      DIA: <select name="dia" style="display: inline-block;width: 70px;">
        <option value="01">01</option>
        <option value="02">02</option>
        <option value="03">03</option>
        <option value="04">04</option>
        <option value="05">05</option>
        <option value="06">06</option>
        <option value="07">07</option>
        <option value="08">08</option>
        <option value="09">09</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
        <option value="22">22</option>
        <option value="23">23</option>
        <option value="24">24</option>
        <option value="25" selected>25</option>
        <option value="26">26</option>
        <option value="27">27</option>
        <option value="28">28</option>
        <option value="29">29</option>
        <option value="30">30</option>
        <option value="31">31</option>
      </select>

MÊS: <select name="mes" style="display: inline-block;width: 70px;">
        <option value="01">01</option>
        <option value="02">02</option>
        <option value="03" selected>03</option>
        <option value="04">04</option>
        <option value="05">05</option>
        <option value="06">06</option>
        <option value="07">07</option>
        <option value="08">08</option>
        <option value="09">09</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
      </select>

ANO: <select name="ano" style="display: inline-block;width: 70px;">
        <option value="2018">2018</option>
        <option value="2019">2019</option>
        <option value="2020">2020</option>
        <option value="2021" selected>2021</option>
        <option value="2022">2022</option>
        <option value="2023">2023</option>
        <option value="2024">2024</option>
        <option value="2025">2025</option>
      </select>      
      &nbsp;&nbsp;  
      <input type="submit" value="Enviar" style="width: 70px; height: 3rem; background-color: #369d2c; border-radius: 16px; font-weight: bold;">
  </form>    

   </div>   
</div>

  <div class="row" >
    <div class="col s12 m12 l12">
  <h2> Arranchamento 2º CIA</h2>
  <h3 class="text-center" style="color :white; font-weight:bold; font-size:18px">Militares da 2º CIA arranchados para o dia <b style="color :black;"><?php echo $deira; ?></b>:</h3>
<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <div class="table-responsive">
        <table summary="militares arranchados" class="table table-bordered table-hover">          
          <thead>
            <tr>
              <th>GRAD</th>
              <th>NUMERO</th>
              <th>NOME</th>
              <th>CAFE</th>
              <th>ALMOCO</th>
              <th>JANTAR</th>
              <th>CEIA</th>
            </tr>
          </thead>
          <tbody>
<?php
  //var_dump($request);
  if(@$request){
    $quantidadeArrays = count($request);
    for ($x = 0; $x < $quantidadeArrays ;$x++){
      $parray = ($request[$x]); 
        echo "\n<tr>\n";
        echo "<td>".$parray['posto']."</td>\n";
        echo "<td>".$parray['numero']."</td>\n";
        echo "<td>".$parray['nome']."</td>\n";
        echo "<td>".$parray['cafe']."</td>\n";
        echo "<td>".$parray['almoco']."</td>\n";
        echo "<td>".$parray['jantar']."</td>\n";
        echo "<td>".$parray['ceia']."</td>\n";
    }   
  }
?>
          </tbody>
        </table>
      </div><!--end of .table-responsive-->
    </div>
  </div>
</div>
</div> 
</div>
</center>
</section>

    




</body>
<script  src="js/js-Responsive-Table-Bootstrap/index.js"></script>
<script type="text/javascript" src="js/jquery-2.1.1.min.js" ></script>
<script src="js/materialize.min.js" ></script> 
<script type="text/javascript">
/*SIDENAV*/
  try{
    $(".button-collapse").sideNav();    
  }catch(erou) {}   
  /*var $ = jQuery;
  jQuery(document).ready(function($){*/
  $(document).mousemove(function (e) {   
  });  
/*SIDENAV*/
function showSideNav(){
  $('.button-collapse').sideNav('show'); 
}
</script>

</html>
