<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
	<meta http-eqiv="X-UA-Compatible" content="IE=edge" />
	<meta name="robots" content="noindex">
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<link rel="shortcut icon" href="https://infocomn.com.br/icon.png">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	<?php require_once"header.php" ?>
	<div class="container bg-dark p-5 mt-5 col-md-6">
		<form action="cadPfun.php" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Nome" name="nome" required>
			</div>
			<div class="form-group">
				<select name="categoria" class="form-control" required>
					<option selected disabled>Categorias</option>
					<option value="comercio">Comércio</option>
					<option value="moda">Moda</option>
					<option value="saude">Saude</option>
					<option value="beleza">Beleza</option>
					<option value="educacao">Educação</option>
					<option value="servicos">Serviços</option>
					<option value="lazer">Lazer</option>
					<option value="alimentacao">Alimentacão</option>
				</select>
			</div>
			<div class="form-group">
				<select name="primeria" class="form-control" required>
					<option selected disabled value="">Inserir na primeira página?</option>
					<option value="sim">Sim</option>
					<option value="nao">Não</option>
				</select>
			</div>
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Palavras Chave" name="tags" required>
				<small class="text-muted">Separe as palavra por virgula</small>
			</div>
			<div class="form-group">
				<input type="url" class="form-control" placeholder="Site ou Rede Social" name="link">
			</div>
			<div class='input-wrapper'>
				<label for='foto'>Selecionar uma foto</label>
				<small class="text-muted">Tamanho maximo de </small>
				<input type="file" name="arquivos" id="foto" accept="image/jpeg, image/png, image/jpg" />
				<span id='file-name'></span>
			</div>
			<button type="submit" class="btn btn-success">CADASTRAR</button>
		</form>
	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>