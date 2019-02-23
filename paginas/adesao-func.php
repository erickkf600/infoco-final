<?php 
	session_start();
	$post = filter_input_array(INPUT_POST, FILTER_DEFAULT);

	$nome = $post['nome'];
	$cnpj = $post['cnpj'];
	$nomeFantasia = $post['nomeFantasia'];
	$inscricaoMunicipal = $post['inscricaoMunicipal'];
	$inscricaoEstadual = $post['inscricaoEstadual'];
	$segmentoProfissional = $post['segmentoProfissional'];

	$cep = $post['cep'];
	$municipio = $post['municipio'];
	$estado = $post['estado'];
	$endereco = $post['endereco'];
	$bairro = $post['bairro'];
	$numero = $post['numero'];

	$plano = $post['plano'];
	$valor = $post['valor'];

	$telefone = $post['telefone'];
	$celular = $post['celular'];
	$whastapp = $post['whastapp'];
	$email = $post['email'];
	$facebook = $post['facebook'];
	$instagram = $post['instagram'];
	$twitter = $post['twitter'];
	$site = $post['site'];
	$forma  = "Mercado Pago";
	$ref = rand(1,9999);

	$link = 'http://localhost/INFOCO%20FINAL/adesao';
	if (empty($nome)) {
		$_SESSION['nome_vazio'] = "Preencha o campo nome*";
		echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$link'>";
	}

	$inserir = $conectar->prepare("insert  into  fichaadesao(
	nome, 
	cnpj, 
	nomeFantasia, 
	inscricaoMunicipal, 
	inscricaoEstadual, 
	segmentoProfissional, 
	cep, 
	municipio, 
	estado, 
	endereco, 
	bairro, 
	numero,
	plano,
	telefone,
	celular,
	whastapp,
	email,
	facebook,
	instagram,
	twitter,
	site)
	values(
	 :nome, 
	 :cnpj, 
	 :nomeFantasia, 
	 :inscricaoMunicipal, 
	 :inscricaoEstadual, 
	 :segmentoProfissional, 
	 :cep, 
	 :municipio, 
	 :estado, 
	 :endereco, 
	 :bairro, 
	 :numero,
	 :plano,
	 :telefone,
	 :celular,
	 :whastapp,
	 :email,
	 :facebook,
	 :instagram,
	 :twitter,
	 :site)");
	$inserir -> bindParam(':nome', $nome, PDO::PARAM_STR);
	$inserir -> bindParam(':cnpj', $cnpj, PDO::PARAM_STR);
	$inserir -> bindParam(':nomeFantasia', $nomeFantasia, PDO::PARAM_STR);
	$inserir -> bindParam(':inscricaoMunicipal', $inscricaoMunicipal, PDO::PARAM_STR);
	$inserir -> bindParam(':inscricaoEstadual', $inscricaoEstadual, PDO::PARAM_STR);
	$inserir -> bindParam(':segmentoProfissional', $segmentoProfissional, PDO::PARAM_STR);
	$inserir -> bindParam(':cep', $cep, PDO::PARAM_STR);
	$inserir -> bindParam(':municipio', $municipio, PDO::PARAM_STR);
	$inserir -> bindParam(':estado', $estado, PDO::PARAM_STR);
	$inserir -> bindParam(':endereco', $endereco, PDO::PARAM_STR);
	$inserir -> bindParam(':bairro', $bairro, PDO::PARAM_STR);
	$inserir -> bindParam(':numero', $numero, PDO::PARAM_STR);
	$inserir -> bindParam(':plano', $plano, PDO::PARAM_STR);
	$inserir -> bindParam(':telefone', $telefone, PDO::PARAM_STR);
	$inserir -> bindParam(':celular', $celular, PDO::PARAM_STR);
	$inserir -> bindParam(':whastapp', $whastapp, PDO::PARAM_STR);
	$inserir -> bindParam(':email', $email, PDO::PARAM_STR);
	$inserir -> bindParam(':facebook', $facebook, PDO::PARAM_STR);
	$inserir -> bindParam(':instagram', $instagram, PDO::PARAM_STR);
	$inserir -> bindParam(':twitter', $twitter, PDO::PARAM_STR);
	$inserir -> bindParam(':site', $site, PDO::PARAM_STR);
	if($inserir->execute()){
	$inserirFA = $conectar->prepare("insert into fatura(ref, tipoPagamento, valor, cnpj)
	values(:ref, :tipoPagamento, :valor, :cnpj)");
	$inserirFA -> bindParam(':ref', $ref, PDO::PARAM_STR);
	$inserirFA -> bindParam(':tipoPagamento', $forma, PDO::PARAM_STR);
	$inserirFA -> bindParam(':valor', $valor, PDO::PARAM_STR);
	$inserirFA -> bindParam(':cnpj', $cnpj, PDO::PARAM_STR);
	$inserirFA->execute();
    }
	if ($inserirFA) {
		$buscador = $conectar->prepare("SELECT * from fatura where ref=:ref LIMIT 1");
 		$buscador -> bindValue(':ref', $ref, PDO::PARAM_STR);
 		$buscador->execute();
 		if ($buscador) {
 			$fat = $buscador->fetch(PDO::FETCH_OBJ);
 			  $ref = $fat->ref;
              $refcod = base64_encode($ref);
              header("location: http://localhost/INFOCO%20FINAL/pagamento/$refcod");
 		}else{
 			$_SESSION['falha_envio']="Ops algo deu errado. Tente novamente.*";
			echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$link'>";
 		}
	}


	?>