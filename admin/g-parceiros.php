<?php 
	require "../banco.php";
	$conectar = conexao(); 
	$buscar = $conectar->prepare("SELECT * from parceiros where status=:ativo");
	$buscar -> bindValue(':ativo', 'ativo', PDO::PARAM_STR);
	$buscar->execute();
?>
<!DOCTYPE html>
<html lang="tp-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
	<meta http-eqiv="X-UA-Compatible" content="IE=edge" />
	<meta name="robots" content="noindex">
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<link rel="shortcut icon" href="https://infocomn.com.br/icon.png">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" />
</head>

<body>
	<?php require_once "header.php" ?>
	<a href="cad-parc.php" class="btn btn-danger float-right mt-2 mr-2">CADASTRAR</a>
  <main>
  	<div class="container">
  		<div class="accordion card-collapse" id="accordionExample">
  			<?php 
			while ($itens=$buscar->fetch(PDO::FETCH_OBJ)){ 
			$id = $itens->id;
			$idc = base64_encode($id);
			$nome = $itens->nome;
			$cat = $itens->categoria;
			$img = $itens->img;
			$primeira = $itens->primeiraPagina;
			$tags = $itens->tags;
			$url = $itens->url;
			include "editarfoto.php";
		  ?>
		<div class="card">
			<div class="card-header d-flex" data-toggle="collapse" href="#collapse<?php echo$id?>">
			<img src="http://localhost/INFOCO%20FINAL/assets/img/parceiros/<?php echo$img ?>" width="75" height="70">
			<span class="ml-3">	
             <?php echo"<p class='h5' style='margin-bottom: 3px'>$id - $nome</p>"; ?>
             <?php echo"<p style='margin-bottom: -10px'><span class='text-danger font-weight-bold'>Categoria:</span> $cat<p/>"; ?>
            </span> 
             <i class="fa fa-angle-right"></i>
           </div>
           <div class="collapse waraper" id="collapse<?php echo$id?>">
           	<div class="card">
           	  <div class="card-header bg-warning">
                <p class="h4 text-light">Detalhes</p>
              </div>
              <div class="card-body">
              	<div class="row">
              	  <div class="col-md-4 col-lg-4">
              	   <img src="http://localhost/INFOCO%20FINAL/assets/img/parceiros/<?php 
              	     echo$img ?>" width="250px" class="img-fluid">
              		 <button type="button" class="btn btn-info btn-just-icon btn-sm" data-toggle="modal"data-target="#mudar<?php echo$id?>"><i class="far fa-edit"></i></button>
              		</div>
              		<div class="col-md-8 col-lg-8">
              		  <form method="post" action="ediPfunc.php">
                        <div class="row">
                        	<div class="col-lg-6">
                        		<small >Nome:</small>
                        		<input type="text"class="form-control" name="nome" value="<?php
                        		echo$nome ?>">
                        	</div>
                        	<div class="col-lg-6">
                        		<small>Categoria:</small>
                        		<select name="categoria" class="form-control" required>
                        			<option selected value="<?php echo$cat ?>"><?php echo$cat ?></option>
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
                        </div>
                        <div class="row">
                        	<div class="col-md-6">
                        		<small>Primeira Pagina:</small>
                        		<select name="primeira" class="form-control" required>
                        			<option selected value="<?php echo$primeira ?>"><?php echo$primeira ?></option>
                        			<option value="sim">Sim</option>
								    <option value="nao">Não</option>
                        		</select>
                        	</div>
                        	<div class="col-md-6">
                        		<small>Url:</small>
                        		<input type="text"class="form-control" name="link" value="<?php echo$url ?>">
                        		<input type="hidden" name="id" value="<?php echo$id ?>" required>
                        	</div>
                        </div>
                        <small>Palavras Chaves:</small>
                        <input type="text"class="form-control" name="tags" value="<?php echo$tags ?>" required>
                       <button type="submit" class="btn w-25 btn-success mt-4 mr-2 atua">ATUALIZAR</button>
                     </form>
              		</div>
              	</div>
              </div>
              	<div class="card-footer">
              		<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#comfirm"><i class="far fa-trash-alt"></i></button>
                </div>
           	</div>
           </div>
		</div>
	    <?php } ?>
  		</div>
  	</div>
  </main>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
<div class="modal fade" id="comfirm">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-danger text-white">EXCLUIR</div>
			<div class="modal-body">Tem certeza que quer excluir este cadastro?</div>
			<div class="modal-footer">
				<a href="delete.php?id=<?php echo $idc?>" class="btn btn-success">SIM</a>
				<button type="button" class="btn btn-danger" data-dismiss="modal">NÃO</button>
			</div>
		</div>
	</div>
</div>