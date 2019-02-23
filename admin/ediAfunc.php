<?php 
  $id                   = $_POST['id'];
  $nome                 = $_POST['nome']; 
  $cnpj                 = $_POST['cnpj']; 
  $nomeFantasia         = $_POST['nomeFantasia'];
  $inscricaoMunicipal   = $_POST['inscricaoMunicipal'];
  $inscricaoEstadual    = $_POST['inscricaoEstadual'];
  $segmentoProfissional = $_POST['segmentoProfissional']; 
  $cep                  = $_POST['cep']; 
  $municipio            = $_POST['municipio'];
  $estado               = $_POST['estado'];   
  $endereco             = $_POST['endereco']; 
  $bairro               = $_POST['bairro'];
  $numero               = $_POST['numero'];
  $plano                = $_POST['plano'];

  $telefone             = $_POST['telefone']; 
  $celular              = $_POST['celular'];
  $whastapp             = $_POST['whastapp'];
  $email                = $_POST['email'];
  $facebook             = $_POST['facebook'];
  $instagram            = $_POST['instagram'];
  $twitter              = $_POST['twitter'];
  $site                 = $_POST['site'];
  require "../banco.php"; 
 $conectar = conexao();
 $update = $conectar->prepare("update fichaadesao set
  nome                 = :nome, 
  cnpj                 = :cnpj,
  nomeFantasia         = :nomeFantasia,
  inscricaoMunicipal   = :inscricaoMunicipal,  
  inscricaoEstadual    = :inscricaoEstadual,
  segmentoProfissional = :segmentoProfissional,
  cep                  = :cep,
  municipio            = :municipio,
  estado               = :estado,
  endereco             = :endereco,
  bairro               = :bairro,
  numero               = :numero,
  plano                = :plano,
  telefone             = :telefone,
  celular              = :celular,
  whastapp             = :whastapp,
  email                = :email,
  facebook             = :facebook,
  instagram            = :instagram,
  twitter              = :twitter,
  site                 = :site
  where id = :id");
 $update -> bindValue(':nome', $nome, PDO::PARAM_STR);
 $update -> bindValue(':cnpj', $cnpj, PDO::PARAM_STR);
 $update -> bindValue(':nomeFantasia', $nomeFantasia, PDO::PARAM_STR);
 $update -> bindValue(':inscricaoMunicipal', $inscricaoMunicipal, PDO::PARAM_STR);
 $update -> bindValue(':inscricaoEstadual', $inscricaoEstadual, PDO::PARAM_STR);
 $update -> bindValue(':segmentoProfissional', $segmentoProfissional, PDO::PARAM_STR);
 $update -> bindValue(':cep', $cep, PDO::PARAM_STR);
 $update -> bindValue(':municipio', $municipio, PDO::PARAM_STR);
 $update -> bindValue(':estado', $estado, PDO::PARAM_STR);
 $update -> bindValue(':endereco', $endereco, PDO::PARAM_STR);
 $update -> bindValue(':bairro', $bairro, PDO::PARAM_STR);
 $update -> bindValue(':numero', $numero, PDO::PARAM_STR);
 $update -> bindValue(':plano', $plano, PDO::PARAM_STR);
 $update -> bindValue(':telefone', $telefone, PDO::PARAM_STR);
 $update -> bindValue(':celular', $celular, PDO::PARAM_STR);
 $update -> bindValue(':whastapp', $whastapp, PDO::PARAM_STR);
 $update -> bindValue(':email', $email, PDO::PARAM_STR);
 $update -> bindValue(':facebook', $facebook, PDO::PARAM_STR);
 $update -> bindValue(':instagram', $instagram, PDO::PARAM_STR);
 $update -> bindValue(':twitter', $twitter, PDO::PARAM_STR);
 $update -> bindValue(':site', $site, PDO::PARAM_STR);
 $update -> bindValue(':id', $id, PDO::PARAM_INT);
 $update->execute();
 if ($insert = $update -> rowCount() > 0) {
 	echo"<script>
		alert('INFORMAÇÕES ATUALIZADAS');window.location.href='lista-adesao.php';
	</script>";
 }else{
 	"<script>
		alert('As informações não foram
		atualizadas');window.location.href='lista-adesao.php';
	</script>";
 }