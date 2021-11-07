<?php

  $from_sql_db_data = array(
    array (
    'posto' =>  'CAP' ,
      'numero' => null  ,
      'nome' =>  'MUENZER' ,
      'cafe' =>  'X' ,
      'almoco' =>  'X' ,
      'jantar' =>  'X' ,
      'ceia' =>  'X' ,
    ),
    array (
      'posto' =>  'TEN' ,
      'numero' =>  null ,
      'nome' =>  'CAPRILE' ,
      'cafe' =>  'X' ,
      'almoco' =>  'X' ,
      'jantar' =>  'X' ,
      'ceia' =>  'X' ,
    ),
    array (
    'posto' =>  'ST' ,
      'numero' =>  null ,
      'nome' =>  'JEILTON' ,
      'cafe' =>  'X' ,
      'almoco' =>  'X' ,
      'jantar' =>  'X' ,
      'ceia' =>  'X' ,
    ),
    array (
    'posto' =>  'SGT' ,
      'numero' =>  null ,
      'nome' =>  'DANILO' ,
      'cafe' =>  'X' ,
      'almoco' =>  'X' ,
      'jantar' =>  'X' ,
      'ceia' =>  'X' ,
    ),
    array (
    'posto' =>  'SGT' ,
      'numero' =>  null ,
      'nome' =>  'RESENDE' ,
      'cafe' =>  'X' ,
      'almoco' =>  'X' ,
      'jantar' =>  'X' ,
      'ceia' =>  'X' ,
    ),
    array (
    'posto' =>  'CB' ,
      'numero' =>  '203' ,
      'nome' =>  'gonzaga' ,
      'cafe' =>  'X' ,
      'almoco' =>  'X' ,
      'jantar' =>  'X' ,
      'ceia' =>  'X' ,
    ),
    array (
      'posto' =>  'CB' ,
      'numero' =>  '202' ,
      'nome' =>  'elias',
      'cafe' =>  'X' ,
      'almoco' =>  'X' ,
      'jantar' =>  'X' ,
      'ceia' =>  'X' ,
    ),
    array (
      'posto' =>  'SD EP',
      'numero' =>  '490' ,
      'nome' =>  'luiz' ,
      'cafe' =>  'X'  ,
      'almoco' =>  'X'  ,
      'jantar' =>  'X'  ,
      'ceia' =>  'X'  ,
    ),
    array (
      'posto' =>  'SD EP'  ,
      'numero' =>  '448'  ,
      'nome' =>  'guedes'  ,
      'cafe' =>  'X'  ,
      'almoco' =>  'X'  ,
      'jantar' =>  'X'  ,
      'ceia' =>  'X'  ,
    ),
    array (
      'posto' =>  'SD EP'  ,
      'numero' =>  '488'  ,
      'nome' =>  'julio'  ,
      'cafe' =>  'X'  ,
      'almoco' =>  'X'  ,
      'jantar' =>  'X'  ,
      'ceia' =>  'X'  ,
    ),
    array (
      'posto' =>  'SD EV'  ,
      'numero' =>  '605'  ,
      'nome' =>  'heitor'  ,
      'cafe' =>  'X'  ,
      'almoco' => null,
      'jantar' => null,
      'ceia' => null,
    )    
  );


?>

<table summary="militares arranchados" class="table table-bordered table-hover" border="1">          
          <thead>
            <tr>
              <td colspan="7">
                2º CIA DE FUZILEIROS
              </td>
            </tr>
            <tr>
              <td colspan="7">
                ARRANCHAMENTO DIA 6 DE NOVEMBRO DE 2018
              </td>
            </tr>
            <tr>
              <td colspan="7">
                ARRANCHAMENTO DIA 6 (TERCA-FEIRA) DE NOVEMBRO DE 2018 
              </td>
            </tr>  
            <tr>
              <th>IDENTIFICADOR</th>
              <th>CAFE</th>
              <th>ALMOCO</th>
              <th>JANTAR</th>
              <th>CEIA</th>
            </tr>
          </thead>
          <tbody>






<?php

  //var_dump($request);


  if($from_sql_db_data){
    $quantidadeArrays = count($from_sql_db_data);
    for ($x = 0; $x < $quantidadeArrays ;$x++){
      $parray = ($from_sql_db_data[$x]); 
        echo "\n<tr>\n";
        echo "<td>".$parray['posto']." ".$parray['numero']." ".$parray['nome']." "."</td>\n";
        echo "<td>".$parray['cafe']."</td>\n";
        echo "<td>".$parray['almoco']."</td>\n";
        echo "<td>".$parray['jantar']."</td>\n";
        echo "<td>".$parray['ceia']."</td>\n";
    }   
  }

  
?>
          </tbody>
        </table>