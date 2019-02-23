<?php
require "../banco.php"; 
$conectar = conexao();
$_UP['pasta'] = '../assets/img/parceiros/';
$_UP['tamanho'] = 1024 * 100; // 100Kb
$_UP['extensoes'] = array('jpg', 'png', 'jpeg');
$_UP['renomeia'] = true;
$_UP['erros'][0] = 'Não houve erro';
$_UP['erros'][1] = 'O arquivo no upload é maior do que o limite de 100KByte';
$_UP['erros'][2] = 'Envie uma Imagem com as dimensões L-439 x A-364';
$_UP['erros'][3] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
$_UP['erros'][4] = 'O upload do arquivo foi feito parcialmente';
$_UP['erros'][5] = 'Não foi feito o upload do arquivo';
if($_FILES['arquivos']['error']!=0){
  die("Não foi possível fazer o upload, erro:" . $_UP['erros'][$_FILES['arquivos']['error']]);
  exit; 
}
$extensao=explode('.', $_FILES['arquivos']['name']);
$extensao=strtolower(end($extensao));
if(array_search($extensao, $_UP['extensoes'])===false){
  echo 
      "<script>
        function myFunction() {
        alert('Por favor, envie arquivos com as seguintes extensões: png ou jpeg');
          }
        </script>";
  exit;
}
if($_UP['tamanho']<$_FILES['arquivos']['size']){
  echo "O arquivo enviado é muito grande, envie arquivos de até 100KB.";
  exit;
}
if($_UP['renomeia']==true){
  $id = $_POST['id'];
  $buscar = $conectar->prepare("select * from parceiros where id = :id limit 1");
  $buscar -> bindValue(':id', $id, PDO::PARAM_INT);
  $buscar->execute();
  if($itens=$buscar->fetch(PDO::FETCH_OBJ)){
    $id = $itens->id;
  }
  $nome_final = "$id.$extensao";
  $update=$conectar->prepare("update parceiros set img ='$nome_final' where id = :id");
  $update -> bindValue(':id', $id, PDO::PARAM_INT);
  $update->execute();
  }else{
  $nome_final = $_FILES['arquivos']['name'];
 }
  if (move_uploaded_file($_FILES['arquivos']['tmp_name'], $_UP['pasta'] . $nome_final)) {
    echo"<script>
      alert('Imagem Atualizada');window.location.href='g-parceiros.php';
    </script>"; 
  }else{
    echo"<script>
    alert('Não foi possível enviar o arquivo, tente novamente!');window.location.href='g-parceiros.php';
    </script>";
  }
?>