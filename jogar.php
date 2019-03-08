<?php
require_once('controladores/sessao.php');
require_once('src/Monstro.php');
isSessaoValida();

$monstro = new Monstro();
$monstrosDoBanco = $monstro->selecionarTodos();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Site administrativo do jogo MonstrinhosGO para a disciplina de desenvolvimento web">
    <meta name="author" content="Frederico Reckziegel, Juliana Herreira Cunha, Kewelin Bonato">
    <title>Sua área - MonstrinhosGO</title>
    <link href="assets/js/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
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
                <a href="controladores/sessao.php?op=logout" class="btn btn-danger btn-md" role="button">Sair</a>
            </li>
          
          </ul>
          
        </div>
      </div>
      
    </nav>
    <!-- /navegacao -->

    <!-- conteudo -->
    <div class="container">

      <section id="listagem" class="row">
          <div class="col-lg-12">
            <img src="assets/img/site/redondo.png" width="20%">
              <h2>Cadastro dos Monstrinhos</h2>
              <a href="novo-monstro.php"  type="button" class="btn btn-outline-info" role="button">Criar novo</a>
          </div>
        <?php 
          foreach($monstrosDoBanco as $monstro){ ?>
          <!-- item -->
          <div class="col-lg-3">
              <img src="assets/img/monstrinhos/<?=$monstro->getImagem();?>">
          </div>
          <div class="col-lg-9">
              <p>Nome: <?=$monstro->getNome();?> </p>
              <p>HP: <?=$monstro->getHp();?></p>
              <p>Ataque: <?=$monstro->getAtaque();?></p>
              <p>Defesa: <?=$monstro->getDefesa();?></p>
              <p>Agilidade: <?=$monstro->getAgilidade();?></p>
              <p>Sorte: <?=$monstro->getSorte();?></p>
              <a href="controladores/monstro.php?op=editar&id=<?=$monstro->getId();?>" class="btn btn-outline-success"role="button">Editar</a>
              <a href="controladores/monstro.php?op=excluir&id=<?=$monstro->getId();?>" class="btn btn-outline-danger" role="button">Excluir</a>
          </div>
          <!-- /item -->
          <?php } ?>
          
      </section>
      

    </div>
    <!-- /container -->

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
    <script src="assets/js/jogo/apiworkaround.js"></script>  
  </body>
</html>
