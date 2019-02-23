<?php 
  $id           = $_POST['id'];
  $nome         = $_POST['nome'];
  $email        = $_POST['email'];
  $telefone     = $_POST['telefone'];
  $celular      = $_POST['celular'];
  $cep          = $_POST['cep'];
  $cidade       = $_POST['cidade'];
  $estado       = $_POST['estado'];
  $endereco     = $_POST['endereco'];
  $bairro       = $_POST['bairro'];
  $numero       = $_POST['numero'];
  $deOndeVem    = $_POST['deOndeVem'];
  $nomeParceiro = $_POST['nomeParceiro'];
  require "../banco.php"; 
  $conectar = conexao();
  $update = $conectar->prepare("update cartao_premium set
    nome         = :nome,
    email        = :email,
    telefone     = :telefone,
    celular      = :celular,  
    cep          = :cep,
    cidade       = :cidade,
    estado       = :estado,
    endereco     = :endereco,
    bairro       = :bairro,
    numero       = :numero,
    deOndeVem    = :deOndeVem,
    nomeParceiro = :nomeParceiro
    where id = :id");
  $update -> bindValue(':nome', $nome, PDO::PARAM_STR);
  $update -> bindValue(':email', $email, PDO::PARAM_STR);
  $update -> bindValue(':telefone', $telefone, PDO::PARAM_STR);
  $update -> bindValue(':celular', $celular, PDO::PARAM_STR);
  $update -> bindValue(':cep', $cep, PDO::PARAM_STR);
  $update -> bindValue(':cidade', $cidade, PDO::PARAM_STR);
  $update -> bindValue(':estado', $estado, PDO::PARAM_STR);
  $update -> bindValue(':endereco', $endereco, PDO::PARAM_STR);
  $update -> bindValue(':bairro', $bairro, PDO::PARAM_STR);
  $update -> bindValue(':numero', $numero, PDO::PARAM_STR);
  $update -> bindValue(':numero', $numero, PDO::PARAM_STR);
  $update -> bindValue(':deOndeVem', $deOndeVem, PDO::PARAM_STR);
  $update -> bindValue(':nomeParceiro', $nomeParceiro, PDO::PARAM_STR);
  $update -> bindValue(':id', $id, PDO::PARAM_INT);
  $update->execute();
  if ($insert = $update -> rowCount() > 0) {
    echo"<script>
    alert('INFORMAÇÕES ATUALIZADAS');window.location.href='lista-cpremium.php';
    </script>";
  }else{
    "<script>
    alert('AS informações não foram
    atualizadas');window.location.href='lista-cpremium.php';
    </script>";
  }