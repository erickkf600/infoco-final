<?php 
	session_start();
	$post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
	$nome = $post['nome'];
	$email = $post['email'];
	$telefone = $post['telefone'];
	$celular = $post['celular'];
	$deOndeVem = $post['deOndeVem'];
	$nomeParceiro = $post['nomeParceiro'];

	$cep = $post['cep'];
	$cidade = $post['municipio'];
	$estado = $post['estado'];
	$endereco = $post['endereco'];
	$bairro = $post['bairro'];
	$numero = $post['numero'];
	$link = 'https://infocomn.com.br/cartao-premium';
	if (empty($nome)) {
	$_SESSION['nome_vazio'] = "Preencha o campo nome*";
	echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$link'>";
}
	$inserir = $conectar->prepare("insert  into  cartao_premium (
	nome, email, telefone, celular, cep, cidade, estado, endereco, bairro, numero, deOndeVem, nomeParceiro)
	values(:nome, :email, :telefone, :celular, :cep, :cidade, :estado, :endereco, 
	:bairro, :numero, :deOndeVem, :nomeParceiro)");
	$inserir -> bindParam(':nome', $nome, PDO::PARAM_STR);
	$inserir -> bindParam(':email', $email, PDO::PARAM_STR);
	$inserir -> bindParam(':telefone', $telefone, PDO::PARAM_STR);
	$inserir -> bindParam(':celular', $celular, PDO::PARAM_STR);
	$inserir -> bindParam(':cep', $cep, PDO::PARAM_STR);
	$inserir -> bindParam(':cidade', $cidade, PDO::PARAM_STR);
	$inserir -> bindParam(':estado', $estado, PDO::PARAM_STR);
	$inserir -> bindParam(':endereco', $endereco, PDO::PARAM_STR);
	$inserir -> bindParam(':bairro', $bairro, PDO::PARAM_STR);
	$inserir -> bindParam(':numero', $numero, PDO::PARAM_STR);
	$inserir -> bindParam(':deOndeVem', $deOndeVem, PDO::PARAM_STR);
	$inserir -> bindParam(':nomeParceiro', $nomeParceiro, PDO::PARAM_STR);
	$inserir->execute();
	if($inserir){
		$_SESSION['sucesso_envio']="Parabêns você esta cadastrado, em breve seu cartão chegara em sua casa*";
		echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$link'>";
	}else{
		$_SESSION['falha_envio']="Ops algo deu errado. Tente novamente.*";
		echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$link'>";
	}

?>