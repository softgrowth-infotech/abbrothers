<?php  
session_start(); 

session_unset(); 
session_destroy();  
header("Location:loginfile");//use for the redirection to some page  
?>