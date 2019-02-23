<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require "assets/vendor/autoload.php";
$link = 'http://localhost/INFOCO%20FINAL/contato';
session_start();
$post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$nome = $post['nome'];
$email = $post['email'];
$telefone = $post['telefone'];
$mensagem = $post['mensagem'];

$motivo = $_POST['motivo'];
$captcha = $_POST['g-recaptcha-response']; 
if (isset($captcha)) {
	$secreto = '6Le3L4wUAAAAACyaYvObGJwmn9j2ymwui3ecSapV';
	$ip = $_SERVER['REMOTE_ADDR'];
	$var = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secreto&response=$captcha&remoteip=$ip");
	$resposta = json_decode($var, true);
}
if (empty($captcha)) {
	$_SESSION['captcha_vazio'] = "Resolva o Captcha*";
	echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$link'>";
}

	//VALIDADOR DE CAMPOS 		
if (empty($nome)) {
	$_SESSION['nome_vazio'] = "Preencha o campo nome*";
	echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$link'>";
}
if (empty($email)) {
	$_SESSION['email_vazio'] = "Preencha o campo email*";
	echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$link'>";
}
if (empty($email)) {
	$_SESSION['telefone_vazio'] = "Preencha o campo telefone*";
	echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$link'>";
}
if (empty($motivo)) {
	$_SESSION['setor_vazio'] = "Selecione um setor no qual deseja fazer contato*";
	echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$link'>";
}
if (empty($mensagem)) {
	$_SESSION['mensagem_vazio'] = "Digite sua mensagem*";
	echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$link'>";
}

if ($motivo == 'comercial') {
	$destino = 'erickkf600@gmail.com';
}else{
	$destino = 'geekkiing@gmail.com';
}

	//ENVIAR A MENSAGEM
if (isset($post)) {
  $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
  try {
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'infocomn.com.br';  					  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'contato@infocomn.com.br';                 // SMTP username
    $mail->Password = '82944452';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($email, $motivo);
    $mail->addAddress($destino, $nome);     // Add a recipient           // Name is optional
    $mail->addReplyTo('erickkf600@gmail.com', $motivo); 

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $motivo;
    $mail->Body    = 
    "<p>Você recebeu uma mensagem de</p>
    <p>Nome: $nome</p>
    <p>Telefone: $telefone</p>  
    <p>Email: $email</p>
    <p>MENSAGEM:</p>
    <p>$mensagem</p>";
    $mail->AltBody = $mensagem;

    $mail->send();
    $_SESSION['email_enviado'] = "Sua Mensagem foi enviado com sucesso.";
    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$link'>";
	} catch (Exception $e) {
	$_SESSION['email_erro'] = "Ocorreu um Erro no envio.". $mail->ErrorInfo;
	echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$link'>";
	}

}

?>	