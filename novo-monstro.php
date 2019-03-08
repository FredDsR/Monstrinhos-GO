<?php
require_once('controladores/sessao.php');
isSessaoValida();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Site administrativo do jogo Monstrinhos Go para a disciplina de desenvolvimento web">
    <meta name="author" content="Frederico Reckziegel, Juliana Herreira Cunha, Kewelin Bonato">
    <title>Novo Monstrinho</title>
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
  
    <!-- navegacao -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="fundo">
      <div class="container">
       
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
          
          <ul class="navbar-nav ml-auto">

            <li class="nav-item active">
              <a class="nav-link" href="#">Olá Admin! Caminho livre para criatividade!
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
              <h2>Novo Monstrinho</h2>
              <a href="jogar.php" type="button" class="btn btn-outline-info" role="button">Voltar</a>
          </div>
          <div class="col-lg-12">

              <form method="post" action="controladores/monstro.php" enctype="multipart/form-data"><!-- este enctype viabiliza envio de arquivos via post -->
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="cad-nome">Nome</label>
                      <input type="text" class="form-control" name="nome" id="cad-nome" placeholder="Nome do bixo" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="cad-hp">HP</label>
                      <input type="number" class="form-control" name="hp" id="cad-hp" min="1" placeholder="Pontos de vida" required>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="cad-ataque">Ataque</label>
                      <input type="number" class="form-control" name="ataque" id="cad-ataque" placeholder="Pontos de Ataque" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="cad-defesa">Defesa</label>
                      <input type="number" class="form-control" name="defesa" id="cad-defesa" placeholder="Pontos de Defesa" required>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="cad-lat">Agilidade</label>
                      <input type="number" class="form-control" name="agilidade" id="cad-lat" placeholder="Pontos de Agilidade" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="cad-long">Sorte</label>
                      <input type="number" class="form-control" name="sorte" id="cad-long" placeholder="Pontos de Sorte" required>
                    </div>
                  </div>

                  <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="inputPassword4">Imagem</label>
                        <div class="custom-file">
                          <input type="file" name="imagem" class="custom-file-input" id="validatedCustomFile" required>
                          <label class="custom-file-label" for="validatedCustomFile">Escolher arquivo ...</label>
                          <div class="invalid-feedback">Arquivo inválido</div>
                        </div>
                      </div>
                    </div>
                  <input type="hidden" name="op" value="inserir">
                  <button type="submit" class="btn btn-outline-primary">Cadastrar</button>
                </form>

          </div>
         
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
  </body>
</html>
