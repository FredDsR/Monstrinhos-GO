<?php

require_once('controladores/sessao.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Site administrativo do jogo MonstrinhosGO para a disciplina de desenvolvimento web">
    <meta name="author" content="Frederico Reckziegel, Juliana Herreira Cunha, Kewelin Bonato">
    <title>Monstrinhos GO</title>
    <link href="assets/js/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
  </head>
  <body>
  <script type="text/javascript">
      var colour = "#FFFFFF";
      var sparkles = 50;
      var x = (ox = 400);
      var y = (oy = 300);
      var swide = 800;
      var shigh = 600;
      var sleft = (sdown = 0);
      var tiny = new Array();
      var star = new Array();
      var starv = new Array();
      var starx = new Array();
      var stary = new Array();
      var tinyx = new Array();
      var tinyy = new Array();
      var tinyv = new Array();
      window.onload = function() {
        if (document.getElementById) {
          var i, rats, rlef, rdow;
          for (var i = 0; i < sparkles; i++) {
            var rats = createDiv(3, 3);
            rats.style.visibility = "hidden";
            document.body.appendChild((tiny[i] = rats));
            starv[i] = 0;
            tinyv[i] = 0;
            var rats = createDiv(5, 5);
            rats.style.backgroundColor = "transparent";
            rats.style.visibility = "hidden";
            var rlef = createDiv(1, 5);
            var rdow = createDiv(5, 1);
            rats.appendChild(rlef);
            rats.appendChild(rdow);
            rlef.style.top = "2px";
            rlef.style.left = "0px";
            rdow.style.top = "0px";
            rdow.style.left = "2px";
            document.body.appendChild((star[i] = rats));
          }
          set_width();
          sparkle();
        }
      };

      function sparkle() {
        var c;
        if (x != ox || y != oy) {
          ox = x;
          oy = y;
          for (c = 0; c < sparkles; c++)
            if (!starv[c]) {
              star[c].style.left = (starx[c] = x) + "px";
              star[c].style.top = (stary[c] = y) + "px";
              star[c].style.clip = "rect(0px, 5px, 5px, 0px)";
              star[c].style.visibility = "visible";
              starv[c] = 50;
              break;
            }
        }
        for (c = 0; c < sparkles; c++) {
          if (starv[c]) update_star(c);
          if (tinyv[c]) update_tiny(c);
        }
        setTimeout("sparkle()", 40);
      }

      function update_star(i) {
        if (--starv[i] == 25) star[i].style.clip = "rect(1px, 4px, 4px, 1px)";
        if (starv[i]) {
          stary[i] += 1 + Math.random() * 3;
          if (stary[i] < shigh + sdown) {
            star[i].style.top = stary[i] + "px";
            starx[i] += ((i % 5) - 2) / 5;
            star[i].style.left = starx[i] + "px";
          } else {
            star[i].style.visibility = "hidden";
            starv[i] = 0;
            return;
          }
        } else {
          tinyv[i] = 50;
          tiny[i].style.top = (tinyy[i] = stary[i]) + "px";
          tiny[i].style.left = (tinyx[i] = starx[i]) + "px";
          tiny[i].style.width = "2px";
          tiny[i].style.height = "2px";
          star[i].style.visibility = "hidden";
          tiny[i].style.visibility = "visible";
        }
      }

      function update_tiny(i) {
        if (--tinyv[i] == 25) {
          tiny[i].style.width = "1px";
          tiny[i].style.height = "1px";
        }
        if (tinyv[i]) {
          tinyy[i] += 1 + Math.random() * 3;
          if (tinyy[i] < shigh + sdown) {
            tiny[i].style.top = tinyy[i] + "px";
            tinyx[i] += ((i % 5) - 2) / 5;
            tiny[i].style.left = tinyx[i] + "px";
          } else {
            tiny[i].style.visibility = "hidden";
            tinyv[i] = 0;
            return;
          }
        } else tiny[i].style.visibility = "hidden";
      }
      document.onmousemove = mouse;

      function mouse(e) {
        set_scroll();
        y = e ? e.pageY : event.y + sdown;
        x = e ? e.pageX : event.x + sleft;
      }

      function set_scroll() {
        if (typeof self.pageYOffset == "number") {
          sdown = self.pageYOffset;
          sleft = self.pageXOffset;
        } else if (document.body.scrollTop || document.body.scrollLeft) {
          sdown = document.body.scrollTop;
          sleft = document.body.scrollLeft;
        } else if (
          document.documentElement &&
          (document.documentElement.scrollTop ||
            document.documentElement.scrollLeft)
        ) {
          sleft = document.documentElement.scrollLeft;
          sdown = document.documentElement.scrollTop;
        } else {
          sdown = 0;
          sleft = 0;
        }
      }
      window.onresize = set_width;

      function set_width() {
        if (typeof self.innerWidth == "number") {
          swide = self.innerWidth;
          shigh = self.innerHeight;
        } else if (
          document.documentElement &&
          document.documentElement.clientWidth
        ) {
          swide = document.documentElement.clientWidth;
          shigh = document.documentElement.clientHeight;
        } else if (document.body.clientWidth) {
          swide = document.body.clientWidth;
          shigh = document.body.clientHeight;
        }
      }

      function createDiv(height, width) {
        var div = document.createElement("div");
        div.style.position = "absolute";
        div.style.height = height + "px";
        div.style.width = width + "px";
        div.style.overflow = "hidden";
        div.style.backgroundColor = colour;
        return div;
      }
  </script>
    <div class="row d-none d-lg-block"> <!-- em telas pequenas estas classes fazem esconder o elemento -->
       <img src="assets/img/site/monstros.jpg" class="img-fluid">
    </div>

    <!-- navegacao -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="fundo">
      <div class="container">
       
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#sobre">Jogo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#cadastro-novo">Cadastre-se</a>
              </li>
            <li class="nav-item">
              <a class="nav-link" href="#contato">Contato</a>
            </li>
          <?php
            if(checkSessao()){ ?>
              <li>
                <a class="nav-link" href="jogar.php">Entrar</a>
              </li>
              <li>
                <a href="controladores/sessao.php?op=logout" class="btn btn-danger btn-md" role="button" id="botaozinho">Sair</a>
              </li>
          <?php
            }else{ ?>
              <li>      
                <form class="form-inline" method="post" action="controladores/sessao.php">
                  <label class="sr-only" for="form-email">E-mail</label>
                  <input type="email" class="form-control mb-2 mr-sm-2" name="email" id="form-email" placeholder="E-mail" required>
                
                  <label class="sr-only" for="form-senha">Senha</label>
                  <div class="input-group mb-2 mr-sm-2">
                    <input type="password" class="form-control" name="password" id="form-senha" placeholder="Senha" required>
                  </div>
                  <input type="hidden" name="op" value="login">
                  <button type="submit" class="btn btn-outline-dark">Login</button>
                </form> 
              <?php
            }
                if(isset($_GET['error'])){ ?>
                  <p style="color:red; background-color:yellow; text-align: center;">Login e Senha não conferem!</p>
              <?php } ?>
            </li>
          </ul>
          
        </div>
      </div>
      
    </nav>

    <!-- conteudo -->

    <div class="container">
      <section id="sobre" class="row">
          <div class="col-lg-12">
          <br><br>
              <h2>Sobre o Jogo <br/> <br/></h2>
              <a name="sobre"></a>
          </div>
          <div class="col-lg-8">
              <p>Este sistema visa aplicar conceitos de programação backend e frontend, utilizando como referência o jogo fictício "MonstrinhosGO".</p>
              <p>Nesta disciplina o objetivo é criar um painel administrativo para cadastros dos itens do jogo</p>
          </div>
          <div class="col-lg-4">
            <img src="assets/img/site/turma.jpg" class="img-fluid">
          </div>
      </section>
    
      <section id="cadastro-novo" class="row">
          <div class="col-lg-12">
          <br><br>
              <h2>Cadastre-se <br/><br/></h2>
              <a name="cadastre-se"></a>
          </div>
          <div class="col-lg-12">
              <form>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="cad-nome">Nome</label>
                      <input type="text" class="form-control" name="nome" id="cad-nome" placeholder="Nome Completo">
                    </div>

                    <div class="form-group col-md-6">
                      <label for="cad-nomeuser">Nome de Usuário</label>
                      <input type="text" class="form-control" name="nomeusuario" id="cad-nomeuser" placeholder="Nome de usuário no jogo">
                    </div>
                    
                    <div class="form-group col-md-6">
                      <label for="cad-email">E-mail</label>
                      <input type="email" class="form-control" name="email" id="cad-email" placeholder="Email">
                    </div>

                    <div class="form-group col-md-6">
                      <label for="cad-senha">Senha</label>
                      <input type="password" class="form-control" name="senha" id="cad-senha" placeholder="Password">
                    </div>
                  </div>
 
                  <button type="submit" class="btn btn-outline-success" >Cadastrar</button>
                </form>
          </div>
          
      </section>

      <section id="contato" class="row">
          <div class="col-lg-12">
            <br><br>
              <h2>Entre em contato com a equipe de desenvolvimento</h2>
              <a name="contato"></a>
              <ul>
              <img src="assets/img/site/redondo.png" width="20%">
              </ul>
          </div>
          <div class="col-lg-12">

          </div>
          <div class="col-lg-12">
              <form>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="form-contato-nome">Nome</label>
                      <input type="text" class="form-control" name="nome" id="form-contato-nome" placeholder="Nome Completo">
                    </div>
                    
                    <div class="form-group col-md-6">
                      <label for="form-contato-email">E-mail</label>
                      <input type="email" class="form-control" name="email" id="form-contato-email" placeholder="Email">
                    </div>

                    <div class="form-group col-md-12">
                      <label for="form-contato-msg">Mensagem</label>
                      <textarea class="form-control" name="senha" id="cad-senha" placeholder="Sua Mensagem"></textarea>
                    </div>
                  </div>
 
                  <button type="submit" class="btn btn-outline-info">Enviar</button>
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
