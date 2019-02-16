<?php 
   $a = 0;
   include 'list-user.php';
   if (isset($_COOKIE['counte'])) {
      $counte = $_COOKIE['counte'] + 1;
  } else {
    $counte = 1;
    $a++;
  }
  setcookie('counte', "$counte", time()+5*4);
  $abre =@fopen("list-user.php","w");
  $ss ='<?php $a='.$a.'; ?>';
  $escreve = fwrite($abre, $ss);
?>