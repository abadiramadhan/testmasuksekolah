<?php
session_start();
//periksa apakah user telah login atau memiliki session
if(!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
 ?><script language='javascript'> document.location='login'</script><?php
} else {
 unset($_SESSION);
 session_destroy();
 ?> 
 <script language='javascript'> document.location='login'</script><?php
}
?> 