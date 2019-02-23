<?php 
 $a = 0;
   include 'list-user.php';
   if (isset($_COOKIE['counte'])) {
      $counte = $_COOKIE['counte'] + 1;
  } else {
    $counte = 1;
    $a++;
  }
  setcookie('counte', "$counte", time()+60*60*24);
  $abre =@fopen("list-user.php","w");
  $ss ='<?php $a='.$a.'; ?>';
  $escreve = fwrite($abre, $ss);
 require "pag-control.php"; 
 require "banco.php"; 
 $conectar = conexao();
 $sim = 'sim';
 $ativo = 'ativo';
 $buscar = $conectar->prepare("SELECT * from parceiros where status = :ativo");
 $buscar -> bindParam(':ativo', $ativo, PDO::PARAM_STR, 5);
 $buscar->execute();
 $cadastros = $buscar -> rowCount();
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport"content="width=device-width,initial-scale=1,shrink-to-fit=no">
  <meta name="description"content="Ingresse na nossa rede de networking e receba benefícios exclusivos, um mundo de oportunidades esperam por você!"/>
  <meta name="keywords" content="infoco publicidades, infocomn, marketing, infoco publicidade, infoco, networking, plataforma comercial, comercios, nova iguaçu, nova iguacu, rede networking">
  <meta name="author" content="Erick Ferreira">
  <meta name="google-site-verification" content="VEPmj7vef9AH59emCHJnJ2tNlZYxiEbAjlAjU1UKuRI" />
  <meta name="title" content="InFoco Publicidades: rede de networking | plataforma digital"/>
  <link rel="stylesheet"href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="canonical" href="https://infocomn.com.br/" hreflang="pt-br" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"/>
  <link rel="shortcut icon" href="https://infocomn.com.br/icon.png">
  <link href="http://localhost/INFOCO%20FINAL/assets/css/core.css" rel="stylesheet" type="text/css">
  <title>InFoco Publicidades: rede de networking | plataforma digital</title>
</head>
<body>
  <div class="loader text-center"><span class="span"></span></div>
  <a class="scrollToTop" href="#" title="voltar ao topo infoco"><i class="fas fa-chevron-up"></i></a>	
  <?php require load(); ?>

  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script> 
  <script type="text/javascript" src="http://localhost/INFOCO%20FINAL/assets/js/script.js"></script> 
  <script async defer src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v3.2"></script>
  <script src='https://www.google.com/recaptcha/api.js'></script>
</body>
</html>