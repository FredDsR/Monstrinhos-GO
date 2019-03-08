<?php
require_once('controladores/sessao.php');
isSessaoValida();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Site administrativo do jogo MonstrinhosGO para a disciplina de desenvolvimento web">
    <meta name="author" content="Frederico Reckziegel, Juliana Herreira Cunha, Kewelin Bonato">
    <title>Editando <?=$monstro->getNome();?></title>
    <link href="../assets/js/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
  </head>
  <body>
  
    <!-- navegacao -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="fundo">
      <div class="container">
       
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Olá <?php echo $_SESSION['nome'];?>!
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li>
                <a href="sessao.php?op=logout" class="btn btn-danger btn-md" role="button">Sair</a>
            </li>
          </ul>
          
        </div>
      </div>
      
    </nav>

    <!-- conteudo -->
    <div class="container">

      <section id="listagem" class="row">
          <div class="col-lg-12">
              <h2>Editando <?=$monstro->getNome();?></h2>
              <a href="../jogar.php" class="btn btn-info btn-sm" role="button">Voltar</a>
          </div>
          <div class="col-lg-12">

              <form method="post" action="monstro.php" enctype="multipart/form-data">
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="cad-nome">Nome</label>
                      <input type="text" class="form-control" name="nome" id="cad-nome" placeholder="Nome do bixo" value="<?=$monstro->getNome();?>" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="cad-hp">HP</label>
                      <input type="number" class="form-control" name="hp" id="cad-hp" min="1" placeholder="Pontos de vida" value="<?=$monstro->getHp();?>" required>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="cad-ataque">Ataque</label>
                      <input type="number" class="form-control" name="ataque" id="cad-ataque" placeholder="Pontos de Ataque" value="<?=$monstro->getAtaque();?>" required>
                    </div>
                    <div class="form-group col-md-6"> 
                      <label for="cad-defesa">Defesa</label>
                      <input type="number" class="form-control" name="defesa" id="cad-defesa" placeholder="Pontos de Defesa" value="<?=$monstro->getDefesa();?>" required>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="cad-lat">Agilidade</label>
                      <input type="text" class="form-control" name="agilidade" id="cad-lat" placeholder="Agilidade" value="<?=$monstro->getAgilidade();?>" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="cad-long">Sorte</label>
                      <input type="text" class="form-control" name="sorte" id="cad-long" placeholder="Sorte" value="<?=$monstro->getSorte();?>" required>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-6" >
                      <label for="cad-imgold">Imagem antiga</label>
                      <img src="../assets/img/monstrinhos/<?=$monstro->getImagem();?>" id="cad-imgold">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="form-img">Nova imagem</label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="form-img-poke" name="novoArquivo">
                        <label class="custom-file-label" for="form-img-poke">Escolher arquivo ...</label>
                        <div class="invalid-feedback">Arquivo inválido</div>
                      </div>
                    </div>
                  </div>
                  <input type="hidden" name="op" value="atualizar">
                  <input type="hidden" name="id" value="<?=$monstro->getId();?>">
                  
                  <button type="submit" class="btn btn-primary">Atualizar</button>
                </form>
          </div>
      </section>
      

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark" id="fundo">
      <div class="container" style="background-color: white"> 
        <div class="row">
            <div class="col-sm-6 text-center text-white">
              <a href="#" >Termos de Compromisso</a>
            </div>
            <div class="col-sm-6 text-center text-white">
                <a href="#">Política de Privacidade</a>
            </div>
        </div>
        <div style="color:black">
          <p class="m-0 text-center">Copyright &copy; 2018</p>
        </div>
      </div>
      <!-- /.container -->
    </footer>

    <script src="assets/js/jquery/jquery.min.js"></script>
    <script src="assets/js/bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
