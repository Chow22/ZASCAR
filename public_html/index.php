<!doctype html>
<html lang="en" class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="canonical" href="http://html5-templates.com/" />
        <title>HTML5 Page Layout Template</title>
        <meta name="description" content="Simple HTML5 Page layout template with header, footer, sidebar etc.">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/script.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>

    <body>
        <header>                         
            <div id="logo"><img src="img/logo.png">ZASCAR Enterprises
             <a  href="vista/login.php"><img class="login-img" src="img/loginbutton.png" alt=""/></a>
            </div>
            <br>
             <br>
            <nav>  
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="vista/miCuenta.html">MiCuenta</a></li>                                                        
                    <li><a href="http://html-css-js.com/css/code/">CSS</a></li>
                    <li><a href="http://htmlcheatsheet.com/js/">JS</a></li>
                </ul>
               
            </nav>
        </header>
        <section>
            <strong>En ZASCAR podrás encontrar gente con la que viajar, ahorrando así el nivel de emisiones hacia el medio ambiente, y agilizando el tráfico en la carretera</strong>
        </section>
        <section id="pageContent">
            <main role="main">
                <section class="section-white">
  <div class="container">

    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        <div class="item active">
            <img src="img/carousel0.png" alt="...">
          <div class="carousel-caption">
            <h2>Heading</h2>
          </div>
        </div>
        <div class="item">
            <img src="img/carousel1.jpg" alt="...">
          <div class="carousel-caption">
            <h2>Heading</h2>
          </div>
        </div>
        <div class="item">
            <img src="img/carousel2.jpg" alt="...">
          <div class="carousel-caption">
            <h2>Heading</h2>
          </div>
        </div>
      </div>

      <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
      </a>
    </div>

  </div>
</section>
            </main>
            <aside>
                <div></div>
                <div></div>
                <div></div>
            </aside>
        </section>
        
        <?php 
            include 'footer.php';
        ?>

    </body>>