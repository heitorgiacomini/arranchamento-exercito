<?php
	//error_reporting(0);
	//ini_set("display_errors", 0 ); //não retorna erros
	// pega valor dentro de array bidimensional
	function outputValue($array){
	  foreach($array as $key => $value){
		if(is_array($value)){
		  outputValue($value);
		  continue;
		}
		echo "$value" . PHP_EOL;
	  }
	  return $value;
	}
	//grava registros
	function DBCreate($table,$fields,$values, $where = null){
		//$table = DB_PREFIX.'_'.$table;
		//$data = DBEscape($data);
		//$fields= implode(' ,',array_keys($data));
		//$values= "'".implode("', '",$data)."'";		
		$where = ($where) ? "  WHERE {$where}" : null;
		$query ="INSERT INTO $table ({$fields}) VALUES ({$values}) {$where}";
		$status = DBExecute($query);
		if (!$status){
			return false;
		}else{
			return $status;	
		}
	}
	//Ler Registros
	function DBRead($table,$params = null, $fields = '*'){
		$table = DB_PREFIX.$table;
		$params = ($params) ? " {$params}" : null;#serve apenas para tirar espaços desnecessários após a Tabela, caso o esteja sem parâmetros
		$query = "SELECT {$fields} FROM {$table} {$params}";
		$result = DBExecute($query);		
		if(!mysqli_num_rows($result)){
			return false;
		}
		else{
			while ($res= mysqli_fetch_assoc($result)){
				$data[] = $res;	
			}	#fetch_assoc convert em um array
		return $data;
		}		
	}
	//Altera Registros
	function DBUpdate($table, $content, $where ){ //$where =null
		#FOREACH É um loop de repeticao que passa pelos indices $key do meu array e pelos valores $value 
		//foreach ($data as $key => $value){  
		//$fields[] ="{$key} = '{$value}'";		
		//} 
		//UPDATE Customers SET ContactName='Alfred Schmidt' WHERE CustomerID=1;
		//$fields = implode(', ',$fields);
		$table = DB_PREFIX.$table;
		$where = ($where) ? "  WHERE {$where}" : null;
		$query= "UPDATE {$table} SET {$content} {$where}"; # TEM QUE TER WHERE PORQUE CASO CONTRÁRIO  todos os campos seriam alterados
		//var_dump($query);
		return DBExecute($query);		
		//$atualizar = DBUpdate('senha', "senha = '123' ", " idusuario = 'heitor giacomini' ");
		//UPDATE `energia`.`senha` SET `senha`='123' WHERE `idusuario`='heitorgiacomini';
	}	
	function DBDelete($table,$where){
		//DELETE FROM Customers WHERE CustomerName='Alfreds Futterkiste';
		//DBDelete('arranchado', refeicao='almoco' and data_ref= '28-11-2018');
		$query= "DELETE FROM {$table} WHERE {$where}";
		return DBExecute($query);	
	}
	function DBOnDuplicate($table,$fields, $values, $refeicao, $value){
		//'arranchado','posto, usuario, ceia, data_ref'," '$pst' ,'$nome','X','$cafe[$i]'"
		//insert into table (a,b,c) values (4,5,6) ON DUPLICATE KEY UPDATE c=6;
		$query= "INSERT INTO {$table} ($fields) values ($values) ON DUPLICATE KEY UPDATE $refeicao = '$value'";
		return DBExecute($query);	
	}
	function DBReplace(){

	}
	#executa Querys-> inserões no DB
	function DBExecute($query){
		$link = DBConnect();
		$result = mysqli_query($link,$query)  ;//or die(mysqli_error($link)) ;
		DBClose($link);	
		return $result;	
	}
?>