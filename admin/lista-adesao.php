<?php 
require "../banco.php";
$conectar = conexao(); 
$buscar = $conectar->prepare("SELECT * from fichaadesao where status=:ativo");
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
  <a href="https://infocomn.com.br/adesao" class="btn btn-danger float-right mt-2 mr-2">CADASTRAR</a>
  <main>
    <div class="container">
      <div class="accordion card-collapse" id="accordionExample">
        <?php 
        while ($itens=$buscar->fetch(PDO::FETCH_OBJ)){ 
          $id = $itens->id;
          $idc = base64_encode($id);
          $nome = $itens->nome;
          $cnpj = $itens->cnpj; 
          $nomeFantasia= $itens->nomeFantasia;
          $inscricaoMunicipal = $itens->inscricaoMunicipal;
          $inscricaoEstadual = $itens->inscricaoEstadual;
          $segmentoProfissional = $itens->segmentoProfissional; 
          $cep = $itens->cep; 
          $municipio = $itens->municipio;
          $estado = $itens->estado;   
          $cidade = $itens->municipio;   
          $endereco = $itens->endereco; 
          $bairro = $itens->bairro;
          $numero = $itens->numero;
          $plano = $itens->plano;
          $situacao = $itens->situacao;

          $telefone = $itens->telefone; 
          $celular = $itens->celular;
          $whastapp = $itens->whastapp;
          $email = $itens->email;
          $facebook = $itens->facebook;
          $instagram = $itens->instagram;
          $twitter = $itens->twitter;
          $site = $itens->site;
          $data = $itens->dataCadastro;
          $data = date('d/m/Y', strtotime($data));
          ?>
          <div class="card">
            <div class="card-header" data-toggle="collapse" href="#collapse<?php echo$id?>">
             <?php echo"<p class='h5' style='margin-bottom: 3px'>$id - $nome</p>"; ?>
             <?php echo"<p style='margin-bottom: -10px'>
             <span class='text-danger font-weight-bold'>Data do cadastro:</span> $data | 
             <span class='text-danger font-weight-bold'>De onde vem:</span> $plano | 
             <span class='text-danger font-weight-bold'>Situação:</span> $situacao<p/>"; ?>
             <i class="fa fa-angle-right"></i>
           </div>
           <div class="collapse waraper" id="collapse<?php echo$id?>">
            <div class="card">
              <div class="card-header bg-warning">
                <p class="h4 text-light">Detalhes</p>
              </div>
              <div class="card-body">
                <form method="post" action="ediAfunc.php">
                  <div class="row">
                    <div class="col-lg-4">
                      <small >Nome:</small>
                      <input type="text"class="form-control" name="nome" value="<?php echo$nome ?>">
                    </div>
                    <div class="col-lg-4">
                      <small>Nome Fantasia:</small>
                      <input type="text"class="form-control" name="nomeFantasia" value="<?php echo$nomeFantasia ?>">
                    </div>
                      <div class="col-lg-4">
                      <small>CNPJ:</small>
                      <input type="text"class="form-control" name="cnpj" value="<?php echo$cnpj ?>">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <small>Segmento Profissional:</small>
                      <input type="text"class="form-control" name="segmentoProfissional" value="<?php echo$segmentoProfissional ?>">
                    </div>
                    <div class="col-md-3">
                      <small>Inscrição Municipal:</small>
                        <input type="text"class="form-control" name="inscricaoMunicipal" value="<?php echo$inscricaoMunicipal ?>">
                    </div>
                    <div class="col-md-3">
                      <small>Inscrição Estadual:</small>
                      <input type="text"class="form-control" name="inscricaoEstadual" value="<?php echo$inscricaoEstadual ?>">
                    </div>
                    <div class="col-md-3">
                      <small>Plano:</small>
                      <select name="plano" class="form-control" required>
                        <option selected value="<?php echo$plano ?>"><?php echo$plano ?></option>
                        <option value="Básico">Básico</option>
                        <option value="Intermediário">Intermediário</option>
                        <option value="Avançado">Avançado</option>
                        <option value="Super">Super</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-2">
                      <small>CEP:</small>
                      <input type="text"class="form-control" name="cep" value="<?php echo$cep ?>">
                    </div>
                    <div class="col-lg-2">
                      <small>Cidade:</small>
                      <input type="text"class="form-control" name="municipio" value="<?php echo$cidade ?>">
                    </div>
                    <div class="col-lg-1">
                      <small>Estado:</small>
                      <input type="text"class="form-control" name="estado" value="<?php echo$estado ?>">
                    </div> 
                    <div class="col-lg-4">
                      <small>Endereço:</small>
                      <input type="text"class="form-control" name="endereco" value="<?php echo$endereco ?>">
                    </div>
                    <div class="col-lg-2">
                      <small>Bairro:</small>
                      <input type="text"class="form-control" name="bairro" value="<?php echo$bairro ?>">
                    </div>
                    <div class="col-lg-1">
                      <small>Número:</small>
                      <input type="text"class="form-control" name="numero" value="<?php echo$numero ?>">
                      <input type="hidden"class="form-control" name="id" value="<?php echo$id ?>">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <small>Email:</small>
                      <input type="text"class="form-control" name="email" value="<?php echo$email ?>">
                    </div>
                    <div class="col-md-3">
                      <small>Telefone:</small>
                        <input type="text"class="form-control" name="telefone" value="<?php echo$telefone ?>">
                    </div>
                    <div class="col-md-3">
                      <small>Celular:</small>
                      <input type="text"class="form-control" name="celular" value="<?php echo$celular ?>">
                    </div>
                    <div class="col-md-3">
                      <small>Whatsapp?:</small>
                      <select name="whastapp" class="form-control" required>
                        <option selected value="<?php echo$whastapp ?>"><?php echo$whastapp ?></option>
                        <option value="sim">sim</option>
                        <option value="não">não</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3">
                      <small >Facebook:</small>
                      <input type="text"class="form-control" name="facebook" value="<?php echo$facebook ?>">
                    </div>
                    <div class="col-lg-3">
                      <small>Instagram:</small>
                      <input type="text"class="form-control" name="instagram" value="<?php echo$instagram ?>">
                    </div>
                      <div class="col-lg-3">
                      <small>Twitter:</small>
                      <input type="text"class="form-control" name="twitter" value="<?php echo$twitter ?>">
                    </div>
                    <div class="col-lg-3">
                      <small>Site:</small>
                      <input type="text"class="form-control" name="site" value="<?php echo$site ?>">
                      <input type="hidden"class="form-control" name="id" value="<?php echo$id ?>">
                    </div>
                  </div>
                  <button type="submit" class="btn w-25 btn-success mt-4 mr-2 atua">ATUALIZAR</button>
                </form>
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