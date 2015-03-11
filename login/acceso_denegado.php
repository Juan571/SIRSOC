<?php
function negar_acceso_url()
{
    if($_SERVER['REQUEST_URI'] == $_SERVER['PHP_SELF'])
    {
        //include_once('404.php');
       // header("Location: 404.php");
       header("Location: index.php");
    }
}
?>