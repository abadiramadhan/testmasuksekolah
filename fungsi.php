<?php
 error_reporting(0);
session_start();
 
function login_validasi(){
 
$timeout=20;
 
$_SESSION['expires_by']=time()+$timeout;
 
}
 
function cek_login(){
 
$exp_time=$_SESSION['expires_by'];
 
if(time()<$exp_time){
 
login_validasi();
 
return true;
 
}else{
 
unset($_SESSION['expires_by']);
 
return false;
 
}
 
}
 
?>