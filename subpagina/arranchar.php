<?php
  session_start();  
  require ('../php/config.php'); 
  require ('../php/connection.php'); #connection deve ser chamado antes do database 
  require ('../php/database.php');
  if (!isset($_SESSION['status']) || $_SESSION['status'] != "open" ) {
    echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
    exit();
  }    
  $pst = $_SESSION['posto'];
  $usuario = $_SESSION['login'];
  $user_id =  $_SESSION['user_id'];
  function messses($user_id,$refection){// $request =  @DBRead('arranchado',"WHERE user_id='$user_id' AND $refection= 'X'", "data_ref");
    $request =  @DBRead('arranchado',"WHERE user_id='$user_id' AND $refection= 'X' ", "data_ref");
    //echo $refection;
    //var_dump($request);
    if($request){
      $quantidadeArrays = count($request);
      $cafee = '';
      for ($x = 0; $x < $quantidadeArrays ;$x++){
        $parray = ($request[$x]);
        $parray = $parray['data_ref'];
        if($quantidadeArrays-1 == $x){
          $cafee = $cafee.$parray;
        }
        else{
          $cafee = $cafee.$parray.',';
        }
      } 
      return $cafee;   
    }
  }
  $cafer   = messses($user_id, "cafe"); 
  $almocor = messses($user_id, "almoco"); 
  $jantarr = messses($user_id, "jantar"); 
  $ceiar   = messses($user_id, "ceia");
?>
<!doctype html>
<html>
 <head>
  <meta charset="utf-8">
  <meta name="viewport"       content="width=device-width, initial-scale=1.0, user-scalable=no">
  <meta name="autor"          content="Heitor Giacomini">
  <meta name="revisit-after"  content="5 days">
  <meta name="robots"        	content="index,follow">
  <!-- Chrome, Firefox OS and Opera -->
  <meta name="theme-color" content="#4cac4c">
  <!-- Windows Phone -->
  <meta name="msapplication-navbutton-color" content="#4cac4c">
  <!-- iOS Safari -->
  <meta name="apple-mobile-web-app-status-bar-style" content="#4cac4c">
  <title>CHIVUNK</title>
  <!-- Compiled and minified CSS -->

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/materialize.min.css">
  <link rel="stylesheet" href="css/css-picker/picker.css">
  <link rel="stylesheet" href="css/css-flat/style.css">
  <link rel="stylesheet" href="css/font-awesome.css">
  <!--insere simbolo de check confirmado-->
  <link rel="stylesheet" href="css/css-sub/style.css">

<style>
  body {
  background-color: #4FECA2;
  }
  .jekyllandhyde{
    width:0px;
	right: 40%;
    position: relative;
  }
  .btn {
    margin-top: -68px;
    width: 90%;
    height: 50px;
  }
</style>	
</head>
<body > 
<?php
  require ("menu.php");
?>
   
  
  <section id="main" class="main-section" style="margin-top:  18px">
  <center>
  <div class="row" >
	  <div class="col s1 m1 l1"></div>
	  <div class="col s10 m10 l10">
	  	 <h4 style="color:#134c42;text-align:justify;">Selecione a refeição e em seguida o dia que deseja comer.</h4>
	  </div>
	  <div class="col s1 m1 l1"></div>
	  </div>
    <div class="row" >
      <div class="col s6 m6 l6">
        <div class="jekyllandhyde" >
            <input readonly="true" id="coffe" type="text" class="form-control date" value="<?php echo $cafer;?>">
          </div>
        <a id="btn_cafe" onclick="event.preventDefault(); document.getElementById('coffe').focus(); return false;" href="#" class="btn blue">
          Café             
        </a> 
      </div>
      <div class="col s6 m6 l6"> 
        <div class="jekyllandhyde" >
            <input readonly="true" id="lunch" type="text" class="form-control date" value="<?php echo $almocor;?>">
          </div>
        <a id="btn_almoco" onclick="event.preventDefault(); document.getElementById('lunch').focus(); return false;" href="#" class="btn green">
          Almoço        
        </a> 
      </div>      
    </div>
    <div class="row">
      <div class="col s6 m6 l6">
        <div class="jekyllandhyde" >
            <input readonly="true" id="dinner" type="text" class="form-control date" value="<?php echo $jantarr;?>">
          </div> 
        <a id="btn_jantar" onclick="event.preventDefault(); document.getElementById('dinner').focus(); return false;" href="#" class="btn yellow">
          Jantar         
        </a>      
      </div>
      <div class="col s6 m6 l6">
        <div class="jekyllandhyde" >
            <input readonly="true" id="supper" type="text" class="form-control date" value="<?php echo $ceiar;?>">
          </div>
        <a id="btn_ceia" style="" onclick="document.getElementById('supper').focus(); return false;" href="#" class="btn red">
          Ceia        
        </a>  
      </div>


    </div>

    <button id="button" style="content: "ATUALIZAR" onclick="inserir();"></button>
  </center>  
</section>
  
 
</body>
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="js/jquery-2.1.1.min.js" ></script>
<script src="js/materialize.min.js" ></script> 
<script src="js/jquery-ui.min.js"></script> 
<script src="js/picker/piquer.js"></script> 
  <!--https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js-->
<script  src="js/picker/index.js"></script> 
<script  src="js/js-sub/index.js"></script> 
	
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
	

<script>
$( "input" ).click(function() {
  event.preventDefault();
});
$( "#btn_cafe" ).click(function() {
  document.getElementsByClassName("datepicker")[0].style.backgroundColor = "#2196F3"; 
});
$( "#btn_almoco" ).click(function() {
  document.getElementsByClassName("datepicker")[0].style.backgroundColor = "#64b168";
});  
$( "#btn_jantar" ).click(function() {
  document.getElementsByClassName("datepicker")[0].style.backgroundColor = "#f3e24f ";
});
  $( "#btn_ceia" ).click(function() {
  document.getElementsByClassName("datepicker")[0].style.backgroundColor = "#e65c52 ";
});  
  
</script>
  
<script>
  var user_id = "<?php echo $user_id; ?>" ;

  function inserir() {
    var cafe =   ($( "#coffe" ).val()).split(",");
    var almoco = ($( "#lunch" ).val()).split(",");
    var jantar = ($( "#dinner" ).val()).split(",");
    var ceia =   ($( "#supper" ).val()).split(",");

    console.log("cafe", cafe);
    console.log("almoco", almoco);
    console.log("jantar", jantar);
    console.log("ceia", ceia);

    //13-11-2018,14-11-2018,16-11-2018,22-11-2018
    var from_db_cafe = "<?php echo $cafer; ?>".split(",");
    var from_db_almoco = "<?php echo $almocor; ?>".split(",");
    var from_db_jantar = "<?php echo $jantarr; ?>".split(",");
    var from_db_ceia = "<?php echo $ceiar; ?>".split(",");
    
    var des_cafe = from_db_cafe.filter(v => cafe.indexOf(v) == -1);  
    var des_almoco = from_db_almoco.filter(v => almoco.indexOf(v) == -1);  
    var des_jantar = from_db_jantar.filter(v => jantar.indexOf(v) == -1);  
    var des_ceia = from_db_ceia.filter(v => ceia.indexOf(v) == -1);  

    //$qtd_desarranchar = (count($des_cafe)) ? count($des_cafe) : null; 

    des_cafe = des_cafe.length != 0 ? des_cafe : 'banana';
    des_almoco = des_almoco.length != 0 ? des_almoco : 'banana';
    des_jantar = des_jantar.length != 0 ? des_jantar : 'banana';
    des_ceia = des_ceia.length != 0 ? des_ceia : 'banana';

    console.log("des_cafe",des_cafe,des_cafe.length);
    console.log("des_almoco",des_almoco);
    console.log("des_jantar",des_jantar);
    console.log("des_ceia",des_ceia);

    $.post("../php/arranchar/arranchador.php",
    {
      user_id: user_id,   
      cafe_datas: cafe,
      almoco_datas: almoco,
      jantar_datas: jantar,
      ceia_datas: ceia,
      des_cafe: des_cafe,
      des_almoco: des_almoco,
      des_jantar: des_jantar,
      des_ceia: des_ceia
    },
    function(data,status){
      location.reload();
      console.log("Data: " + data + "\n Status: " + status); 
      alert("Status: " + status);
    });
    
  }

</script>	
</html>