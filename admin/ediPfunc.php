<?php 
 $id 		= $_POST['id'];
 $nome 		= $_POST['nome'];
 $categoria	= $_POST['categoria'];
 $primeira 	= $_POST['primeira'];
 $tags 		= $_POST['tags'];
 $link 		= $_POST['link'];
  require "../banco.php"; 
 $conectar = conexao();
 $update = $conectar->prepare("update parceiros set
  nome = :nome,
  categoria = :categ,
  url = :link,	
  primeiraPagina = :primeira,
  tags = :tags
  where id = :id");
 $update -> bindValue(':nome', $nome, PDO::PARAM_STR);
 $update -> bindValue(':categ', $categoria, PDO::PARAM_STR);
 $update -> bindValue(':link', $link, PDO::PARAM_STR);
 $update -> bindValue(':primeira', $primeira, PDO::PARAM_STR);
 $update -> bindValue(':tags', $tags, PDO::PARAM_STR);
 $update -> bindValue(':id', $id, PDO::PARAM_INT);
 $update->execute();
 if ($insert = $update -> rowCount() > 0) {
 	echo"<script>
		alert('PARCEIRO CADASTRADA');window.location.href='g-parceiros.php';
	</script>";
 }else{
 	"<script>
		alert('AS informações não foram
		atualizadas');window.location.href='g-parceiros.php';
	</script>";
 }