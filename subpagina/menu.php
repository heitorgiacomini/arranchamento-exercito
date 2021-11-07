
  <div class="navbar-fixed" id="navbar">
  <nav style="background-color: #1e6745;top: 0;"> 
    <a href="#" class="left brand-logo" onClick="showSideNav();"> <i class="material-icons" style="font-size: 67px" ;>dehaze</i> </a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
      <li><a href="#about">INICIO</a></li>
      <li><a  name="footer" href="../sair.php">SAIR</a></li>
    </ul>
    </nav>
</div>
  
  <ul id="slide-out" class="side-nav" style=" background-color: #72c19c;">
    <li>
      <div class="userView">
       <img class="background" src="../img/br.jpg">
       <a href="#!user"><img class="circle" src="../img/soldier-salute.svg"></a> 
       <a class="user-name" href="#!name"><span class="black-text name" style="font-size:23px"><?php echo $_SESSION["login"];?></span></a>          
      </div>
    </li>
    <li class="no-padding">
    <ul class="collapsible collapsible-accordion">
      <li class="bold"><a class="collapsible-header waves-effect  teal darken-1" href="#">Arranchamento</a>
        <div class="collapsible-body">
          <ul>
            <li><a href="arranchar.php">Arranchar-me</a></li>
       <li><a href="previa-arranchados.php">Prévia arranchados</a></li>
          </ul>
        </div>
      </li>
      <li class="bold"><a class="collapsible-header waves-effect teal lighten-1">Mapa da Força</a></li>
      <li class="bold"><a class="collapsible-header waves-effect teal lighten-1">Desempenho Fisico dos Militares</a></li>
      <li class="bold"><a class="collapsible-header waves-effect teal lighten-1">Controle de Faltas</a></li>
      <li class="bold"><a class="collapsible-header waves-effect teal lighten-1">Escala de Serviço</a></li>
      <li class="bold"><a class="collapsible-header waves-effect teal lighten-1">Pedido de Viatura</a></li>
      <li class="bold"><a class="collapsible-header waves-effect teal lighten-1">Pedido de Catanho</a></li>
      <li class="bold"><a class="collapsible-header waves-effect teal lighten-1">Banco de Dados do Militares</a></li>
      <li class="bold"><a class="collapsible-header waves-effect teal lighten-1" href="../sair.php">SAIR</a></li>     
      <li class="bold"><a class="collapsible-header waves-effect teal lighten-1">Pesquisa de Interesse</a></li>
      </ul>    
    </li>            
  </ul>
  <a href="#" data-activates="slide-out" class="button-collapse"></a> 