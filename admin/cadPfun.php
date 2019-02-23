<?php 
  $nome       =  $_POST['nome'];
  $categoria  = $_POST['categoria'];
  $primeria   = $_POST['primeria'];
  $tags       = $_POST['tags'];
  $link       = $_POST['link'];
  require "../banco.php"; 
  $conectar  = conexao();
  $inserirPA = $conectar->prepare("insert into parceiros(
    nome, categoria, url, primeiraPagina,tags
    )values(
    :nome, :categoria, :url, :primeiraPagina, :tags)");
  $inserirPA -> bindParam(':nome', $nome, PDO::PARAM_STR);
  $inserirPA -> bindParam(':categoria', $categoria, PDO::PARAM_STR);
  $inserirPA -> bindParam(':url', $link, PDO::PARAM_STR);
  $inserirPA -> bindParam(':primeiraPagina', $primeria, PDO::PARAM_STR);
  $inserirPA -> bindParam(':tags', $tags, PDO::PARAM_STR);
  $inserirPA->execute();
  if ($insert = $inserirPA -> rowCount() > 0) {
    include "upload.php";
    echo"<script>
      alert('Informações Atualizadas');window.location.href='g-parceiros.php';
    </script>";
    }else{
    "<script>
      alert('AS informações não foram
      atualizadas');window.location.href='g-parceiros.php';
    </script>";
   }
?>