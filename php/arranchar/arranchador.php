<?php
	
	require '../config.php'; 
	require '../connection.php'; #connection deve ser chamado anetes do database 
	require '../database.php';	

	if (isset($_POST['user_id'])){//	if (isset($_POST['cafe_datas'])){	
		$user_id = $_POST['user_id'];
    	//$qtd_cafe = $_POST['cafe_quantidade'];
    	$cafe = $_POST['cafe_datas'];
		//$qtd_almoco = $_POST['almoco_quantidade'];
		$almoco = $_POST['almoco_datas'];
		//$qtd_jantar = $_POST['jantar_quantidade'];
		$jantar = $_POST['jantar_datas'];
		//$qtd_ceia = $_POST['ceia_quantidade'];
		$ceia = $_POST['ceia_datas'];
		$des_cafe = $_POST['des_cafe'];
		$des_almoco = $_POST['des_almoco'];
		$des_jantar = $_POST['des_jantar'];
		$des_ceia = $_POST['des_ceia'];

		$qtd_ref = count($cafe);	
		if($qtd_ref > 0){
			for($i = 0; $i < $qtd_ref; $i++){			
				if($cafe[$i]){
					DBOnDuplicate('arranchado','user_id, cafe, data_ref'," '$user_id','X','$cafe[$i]'","cafe","X");
				}
			}
		}
		$qtd_ref = count($almoco);	
		if($qtd_ref > 0){
			for($i = 0; $i < $qtd_ref; $i++){			
				if($almoco[$i]){
					DBOnDuplicate('arranchado','user_id, almoco, data_ref'," '$user_id','X','$almoco[$i]'","almoco","X");
				}
			}
		}
		$qtd_ref = count($jantar);	
		if($qtd_ref > 0){
			for($i = 0; $i < $qtd_ref; $i++){	
				if($jantar[$i]){		
					DBOnDuplicate('arranchado','user_id, jantar, data_ref'," '$user_id','X','$jantar[$i]'","jantar","X");
				}
			}
		}
		$qtd_ref = count($ceia);	
		if($qtd_ref > 0){
			for($i = 0; $i < $qtd_ref; $i++){	
				if($ceia[$i]){		
					DBOnDuplicate('arranchado','user_id, ceia, data_ref'," '$user_id','X','$ceia[$i]'","ceia","X");
				}
			}
		}
		if(($_POST['des_cafe']) != "banana"){
			$qtd_ref = count($des_cafe); 
	  	if($qtd_ref > 0){
				for($i = 0; $i < $qtd_ref; $i++){			 
					DBUpdate('arranchado',"cafe = '' ", "data_ref= '$des_cafe[$i]'");
					//DBDelete("arranchado","cafe='' and almoco= '' and jantar= '' and ceia= ''");
				}	
			}
		}
		if(($_POST['des_almoco']) != "banana"){
			$qtd_ref = count($des_almoco); 
	  	if($qtd_ref > 0){
				for($i = 0; $i < $qtd_ref; $i++){			 
					DBUpdate('arranchado',"almoco = '' ", "data_ref= '$des_almoco[$i]'");
					//DBDelete("arranchado","cafe='' and almoco= '' and jantar= '' and ceia= ''");
				}	
			}
		}
		if(($_POST['des_jantar']) != "banana"){
			$qtd_ref = count($des_jantar); 
	  	if($qtd_ref > 0){
				for($i = 0; $i < $qtd_ref; $i++){			 
					DBUpdate('arranchado',"jantar = '' ", "data_ref= '$des_jantar[$i]'");
					//DBDelete("arranchado","cafe='' and almoco= '' and jantar= '' and ceia= ''");
				}	
			}
		}
		if(($_POST['des_ceia']) != "banana"){
			$qtd_ref = count($des_ceia); 
	  	if($qtd_ref > 0){
				for($i = 0; $i < $qtd_ref; $i++){			 
					DBUpdate('arranchado',"ceia = '' ", "data_ref= '$des_ceia[$i]'");
					//DBDelete("arranchado","cafe='' and almoco= '' and jantar= '' and ceia= ''");
				}	
			}
		}

		
	DBDelete("arranchado","(cafe='' or cafe is null ) and (almoco= '' or almoco is null) and (jantar= '' or jantar is null) and (ceia= '' or ceia is null)");

	}	
		/*
		if(($_POST['des_cafe']) != "banana"){
			$qtd_desarranchar = count($des_cafe); 
	  	if($qtd_desarranchar > 0){
				for($i = 0; $i < $qtd_desarranchar; $i++){			
					DBDelete('arranchado', "refeicao='cafe' and data_ref= '$des_cafe[$i]' ");
				}	
			}
		}*/

	








?>