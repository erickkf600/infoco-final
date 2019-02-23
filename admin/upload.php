<?php
// Pasta onde o arquivo vai ser salvo
$_UP['pasta'] = '../assets/img/parceiros/';
// Tamanho máximo do arquivo (em Bytes)
$_UP['tamanho'] = 1024 * 100; // 100Kb
// Array com as extensões permitidas
$_UP['extensoes'] = array('jpg', 'png', 'jpeg');
// Renomeia o arquivo? (Se true, o arquivo será salvo como .png e um nome único)
$_UP['renomeia'] = true;
// Array com os tipos de erros de upload do PHP
$_UP['erros'][0] = 'Não houve erro';
$_UP['erros'][1] = 'O arquivo no upload é maior do que o limite de 100KByte';
$_UP['erros'][2] = 'Envie uma Imagem com as dimensões L-439 x A-364';
$_UP['erros'][3] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
$_UP['erros'][4] = 'O upload do arquivo foi feito parcialmente';
$_UP['erros'][5] = 'Não foi feito o upload do arquivo';
// Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
if ($_FILES['arquivos']['error'] != 0) {
  die("Não foi possível fazer o upload, erro:" . $_UP['erros'][$_FILES['arquivos']['error']]);
  exit; // Para a execução do script
}
// Faz a verificação da extensão do arquivo
$extensao = explode('.', $_FILES['arquivos']['name']);
$extensao = strtolower(end($extensao));
if (array_search($extensao, $_UP['extensoes']) === false) {
  echo 
  "<script>
  function myFunction() {
    alert('Por favor, envie arquivos com as seguintes extensões: png ou jpeg');
  }
  </script>";
  exit;
}
// Faz a verificação do tamanho do arquivo
if ($_UP['tamanho'] < $_FILES['arquivos']['size']) {
  echo "O arquivo enviado é muito grande, envie arquivos de até 100KB.";
  exit;
}
// O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
// Primeiro verifica se deve trocar o nome do arquivo
if ($_UP['renomeia'] == true) {
  $buscar = $conectar->prepare("select * from parceiros order by id desc limit 1");
  $buscar->execute();
  if($itens=$buscar->fetch(PDO::FETCH_OBJ)){
    $id = $itens->id;
  }
  $nome_final = "$id.$extensao";

  // ATUALIZA O NOME
  $update=$conectar->prepare("update parceiros set img ='$nome_final' where id = :id");
  $update -> bindValue(':id', $id, PDO::PARAM_INT);
  $update->execute();
} else {
  // Mantém o nome original do arquivo
  $nome_final = $_FILES['arquivos']['name'];
}

// Depois verifica se é possível mover o arquivo para a pasta escolhida
if (move_uploaded_file($_FILES['arquivos']['tmp_name'], $_UP['pasta'] . $nome_final)) {
  // Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
  echo"<script>
  alert('CADASTRADO');window.location.href='g-parceiros.php';
  </script>";
}else{
  // Não foi possível fazer o upload, provavelmente a pasta está incorreta
  echo"<script>
  alert('Não foi possível enviar o arquivo, tente novamente!');window.location.href='g-parceiros.php';
  </script>";
}
?>