<?php 
    echo "asdasd";
    die;
    include ("./preparedsqls.php");
   
     $date = date('Y-m-d ');
    $ejecuta = new preparedsqls();
   
    
    if(isset($_POST['action'])){
	$action = $_POST['action'];
    } else {
	die("Ninguna accion ha sido a definida");
    }
    //echo $action;
    $ejecuta  = new preparedsqls();
    
     
    
    
    switch ($action){
        
         case $action === 'buscar': 
             
                $sql1 = ("SELECT * FROM  `tipos_productos` LIMIT 0 , 30");
                $sql= str_replace("''","null", $sql1);
                echo $ejecuta->ejecutar($sql1,$action);
                break;
         
	default :
                break;
        
    }
    ?>