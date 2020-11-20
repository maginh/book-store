<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Book Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#03a6f3">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/jquery-3.4.1.js"></script>
    <script src="sha256.js"></script>
    <script language="javascript"></script>

    <?php
      require 'strconn.php';
      $titolo=$_REQUEST['titolo'];
      $query="SELECT i.percorso, l.descrizione, l.nPagine, l.dataP, a.nome, a.cognome FROM libri AS l, immagini AS i, autori AS a WHERE l.codice=i.LIBRO AND a.numero=l.AUTORE AND l.titolo='{$titolo}' ORDER BY i.nome";
      $tab=$dbconn->query($query);
     ?>
     <?php
     require 'strconn.php';
     session_start();

      ?>
    <header>

        <!--<div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-3"><a href="#" class="web-url">www.bookstore.com</a></div>
                    <div class="col-md-6">
                        <h5>Free Shipping Over $99 + 3 Free Samples With Every Order</h5></div>
                    <div class="col-md-3">
                        <span class="ph-number">Call : 800 1234 5678</span>
                    </div>
                </div>
            </div>
        </div>-->
        <div class="main-menu">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="logo"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav ml-auto">
                          <li class="navbar-item active">
                              <a href="index.php" class="nav-link">Home</a>
                          </li>
                          <li class="navbar-item">
                              <a href="biblio.php" class="nav-link">I libri</a>
                          </li>
                          <?php
                          if(!isset($_SESSION['usr'])){
                            echo("<li class='navbar-item'>
                                <a href='login.php' class='nav-link'>Login</a>
                            </li>");

                          }
                           ?>
                          <?php
                            require 'strconn.php';
                            if(isset($_SESSION['usr'])){
                              echo("<li class='navbar-item'>
                                  <a href='profilo.php' class='nav-link'>Profilo</a>
                              </li><li class='navbar-item'>
                                  <a href='logout.php' class='nav-link'>Logout</a>
                              </li>");

                            }
                           ?>
                      </ul>
                        <!--<div class="cart my-2 my-lg-0">
                            <span>
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                            <span class="quntity">3</span>
                        </div>-->
                        <div class="search-container">
  <form action="ricercaRap.php">
    <input type="text" placeholder="Search.." name="titolo">
    <button type="submit"><i class="fa fa-search"></i></button>
  </form>
</div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <div class="breadcrumb">
        <div class="container">
            <!--<a class="breadcrumb-item" href="index.html">Home</a>
            <span class="breadcrumb-item active">Terms and Condition</span>-->
        </div>
    </div>
    <section class="product-sec">
        <div class="container">
            <?php
              require 'strconn.php';
              $tab=$dbconn->query($query);
              if(!$row=$tab->fetch_array(MYSQLI_NUM)){
                echo("<h1>Libro non trovato</h1>");
              }else{
                echo("<h1>{$titolo}</h1>");
              }
             ?>
          <!--  <h1>7 Day Self publish How to Write a Book</h1>-->
            <div class="row">

              <!--  <div class="col-md-6 slider-sec">-->

                    <!-- main slider carousel -->

                    <!--<div id="myCarousel" class="carousel slide">-->

                        <!-- main slider carousel items -->
                        <?php
                          $tab=$dbconn->query($query);
                          if($row=$tab->fetch_array(MYSQLI_NUM)){
                            $c=0;
                            $cc=0;
                            $tt="<div class='col-md-6 slider-sec'>";
                            $tt.="<div id='myCarousel' class='carousel slide'>";
                            $tt.="<div class='carousel-inner'>";
                            $tab=$dbconn->query($query);
                            while($row=$tab->fetch_array(MYSQLI_NUM)){
                              if($c==0){
                                $tt.="<div class='active item carousel-item' data-slide-number='{$c}'>
                                    <img src='{$row[0]}' class='img-fluid'>
                                </div>";
                              }else{
                                $tt.="<div class='item carousel-item' data-slide-number='{$c}'>
                                    <img src='{$row[0]}' class='img-fluid'>
                                </div>";
                              }
                              $c=$c+1;
                            }
                            $tt.="</div>";
                            $tab=$dbconn->query($query);
                            $tt.="<ul class='carousel-indicators list-inline'>";
                            while($row=$tab->fetch_array(MYSQLI_NUM)){
                              if($cc==0){
                                $tt.="<li class='list-inline-item active'>
                                    <a id='carousel-selector-{$cc}' class='selected' data-slide-to='{$cc}' data-target='#myCarousel'>
                                    <img src='{$row[0]}' class='img-fluid'>
                                </a>
                                </li>";
                              }else{
                                $tt.="<li class='list-inline-item'>
                                    <a id='carousel-selector-{$cc}' data-slide-to='{$cc}' data-target='#myCarousel'>
                                    <img src='{$row[0]}' class='img-fluid'>
                                </a>
                                </li>";
                              }

                              $cc=$cc+1;
                            }
                            $tt.="</ul>";
                            $tt.="</div>";
                            $tt.="</div>";
                            echo($tt);
                          }else{
                            echo("");
                          }

                         ?>
                      <!--<div class="carousel-inner">

                      </div>-->

                        <!--<div class="carousel-inner">
                            <div class="active item carousel-item" data-slide-number="0">
                                <img src="images/product1.jpg" class="img-fluid">
                            </div>
                            <div class="item carousel-item" data-slide-number="1">
                                <img src="images/product2.jpg" class="img-fluid">
                            </div>
                            <div class="item carousel-item" data-slide-number="2">
                                <img src="images/product3.jpg" class="img-fluid">
                            </div>
                        </div>-->

                        <!-- main slider carousel nav controls -->

                        <!--<ul class="carousel-indicators list-inline">-->



                            <!--<li class="list-inline-item active">
                                <a id="carousel-selector-0" class="selected" data-slide-to="0" data-target="#myCarousel">
                                <img src="images/product1.jpg" class="img-fluid">
                            </a>
                            </li>
                            <li class="list-inline-item">
                                <a id="carousel-selector-1" data-slide-to="1" data-target="#myCarousel">
                                <img src="images/product2.jpg" class="img-fluid">
                            </a>
                            </li>
                            <li class="list-inline-item">
                                <a id="carousel-selector-2" data-slide-to="2" data-target="#myCarousel">
                                <img src="images/product3.jpg" class="img-fluid">
                            </a>
                          </li>-->

                        <!--</ul>-->

                    <!--</div>-->

                    <!--/main slider carousel-->

                <!--</div>-->

                <div class="col-md-6 slider-content">
                    <?php
                      $tab=$dbconn->query($query);
                      if($row=$tab->fetch_array(MYSQLI_NUM)){
                        echo("<p style='text-align:justify'>{$row[1]}</p>");
                      }
                        echo("");
                     ?>
                    <p></p>
                    <ul>
                        <li>

                            <?php
                              $tab=$dbconn->query($query);
                              if($row=$tab->fetch_array(MYSQLI_NUM)){
                                echo("<a class='name'>N° Pagine</a><a class='clm'>:</a><a class='price final'>&nbsp;&nbsp;{$row[2]}</a>");
                              }else{
                                echo("");
                              }

                             ?>
                        </li>
                        <li>

                            <?php
                              $tab=$dbconn->query($query);
                              if($row=$tab->fetch_array(MYSQLI_NUM)){
                                echo("<a class='name'>Anno di pubblicazione</a><a class='clm'>:</a><a class='price final'>&nbsp;&nbsp;{$row[3]}</a>");
                              }else{
                                echo("");
                              }

                             ?>
                        </li>
                        <li>

                            <?php
                              $tab=$dbconn->query($query);
                              if($row=$tab->fetch_array(MYSQLI_NUM)){
                                $at=$row[4];
                                $at.=" ";
                                $at.=$row[5];
                                echo("<a class='name'>Autore</a><a class='clm'>:</a><a class='price final'>&nbsp;&nbsp;{$at}</a>");
                              }else{
                                echo("");
                              }


                             ?>
                        </li>
                        <!--<li>
                            <span class="name">Kindle Price</span><span class="clm">:</span>
                            <span class="price final">$3.37</span>
                        </li>-->
                        <!--<li><span class="save-cost">Save $7.62 (69%)</span></li>-->
                    </ul>
                    <!--<div class="btn-sec">-->
                      <?php
                        require 'strconn.php';
                        $tab=$dbconn->query($query);
                        if($row=$tab->fetch_array(MYSQLI_NUM)){
                          if(isset($_SESSION['usr'])){
                            echo("<button class='btn black' onclick='verifica()'>Verifica disponibilità</button>");
                          }else{
                            echo("<button class='btn black' onclick='rimanda()'>Verifica disponibilità</button>");
                          }

                        }else{
                          echo("");
                        }

                       ?>
                       <button class='btn yellow' onclick="prestito()" style="display: none" id="btnPres">Aggiungi libro!</button>
                       <button class='btn yellow' onclick="prenotazione()" style="display: none" id="btnPren">Prenota!</button>
                        <!--<button class="btn black">Buy Now</button>-->
                    <!--</div> -->
                </div>
            </div>
        </div>
    </section>

    <section class="testimonial-sec">
        <div class="container">
            <div id="testimonal" class="owl-carousel owl-theme">
                  <?php
                    require 'strconn.php';
                    $tab=$dbconn->query($query);
                    if($row=$tab->fetch_array(MYSQLI_NUM)){
                      $tt=$_REQUEST['titolo'];
                      $queryL="SELECT codice FROM libri WHERE titolo='{$tt}'";
                      $tabL=$dbconn->query($queryL);
                      $rowL=$tabL->fetch_array(MYSQLI_NUM);
                      $nLibro=$rowL[0];

                      $query="SELECT r.testo, u.username FROM recensioni AS r, utenti AS u, libri AS l WHERE l.codice=r.LIBRO AND u.numero=r.UTENTE AND l.codice={$nLibro}";
                      $tab=$dbconn->query($query);
                      if($row=$tab->fetch_array(MYSQLI_NUM)){
                        $tab=$dbconn->query($query);
                        while($row=$tab->fetch_array(MYSQLI_NUM)){
                          echo("<div class='item'><h3>{$row[0]}</h3>
                          <div class='box-user'>
                              <h4 class='author'>{$row[1]}</h4>
                          </div></div>");
                        }
                      }else{
                        echo("<div class='item'><section class='product-sec'>
                            <div class='container'>
                                <h1>Non sono presenti recensioni</h1>
                            </div>
                        </section></div>");
                      }
                    }else{
                      echo("");
                    }


                   ?>


            </div>
        </div>

        <?php
        require 'strconn.php';
        $titolo=$_REQUEST['titolo'];
        $query="SELECT i.percorso, l.descrizione, l.nPagine, l.dataP, a.nome, a.cognome FROM libri AS l, immagini AS i, autori AS a WHERE l.codice=i.LIBRO AND a.numero=l.AUTORE AND l.titolo='{$titolo}' ORDER BY i.nome";
        $tab=$dbconn->query($query);
        if($row=$tab->fetch_array(MYSQLI_NUM)){
          if(isset($_SESSION['usr'])){
            echo("<div class='row'>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <div class='col-lg-4 col-md-8'>
                  <form class='form-horizontal'>
                    <div class='form-group'>
                        <textarea placeholder='Inserisci la tua recensione qui' class='form-control mr-sm-2' id='txtArea' rows='12' style='border:solid 3px black'></textarea>
                    </div>

                    <div class='btn-sec'>
                      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <a onclick='addRec()' class='btn yellow' align='center' id='addR'>Aggiungi recensione</a>
                    </div>
                    <div class='btn-sec'>
                      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <a onclick='modRec()' class='btn yellow' align='center' style='display: none' id='modR'>Modifica recensione</a>
                    </div>
                  </form>
                </div>
              </div>");

          }

        }else{
          echo("");
        }


         ?>






    </section>
    <!--<section class="related-books">
        <div class="container">
            <h2>You may also like these book</h2>
            <div class="recomended-sec">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="item">
                            <img src="images/img1.jpg" alt="img">
                            <h3>how to be a bwase</h3>
                            <h6><span class="price">$49</span> / <a href="#">Buy Now</a></h6>
                            <div class="hover">
                                <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="item">
                            <img src="images/img2.jpg" alt="img">
                            <h3>How to write a book...</h3>
                            <h6><span class="price">$19</span> / <a href="#">Buy Now</a></h6>
                            <span class="sale">Sale !</span>
                            <div class="hover">
                                <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="item">
                            <img src="images/img3.jpg" alt="img">
                            <h3>7-day self publish...</h3>
                            <h6><span class="price">$49</span> / <a href="#">Buy Now</a></h6>
                            <div class="hover">
                                <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="item">
                            <img src="images/img4.jpg" alt="img">
                            <h3>wendy doniger</h3>
                            <h6><span class="price">$49</span> / <a href="#">Buy Now</a></h6>
                            <div class="hover">
                                <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>-->
    <!--<footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="address">
                        <h4>Our Address</h4>
                        <h6>The BookStore Theme, 4th Store
                        Beside that building, USA</h6>
                        <h6>Call : 800 1234 5678</h6>
                        <h6>Email : info@bookstore.com</h6>
                    </div>
                    <div class="timing">
                        <h4>Timing</h4>
                        <h6>Mon - Fri: 7am - 10pm</h6>
                        <h6>​​Saturday: 8am - 10pm</h6>
                        <h6>​Sunday: 8am - 11pm</h6>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="navigation">
                        <h4>Navigation</h4>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="privacy-policy.html">Privacy Policy</a></li>
                            <li><a href="terms-conditions.html">Terms</a></li>
                            <li><a href="products.html">Products</a></li>
                        </ul>
                    </div>
                    <div class="navigation">
                        <h4>Help</h4>
                        <ul>
                            <li><a href="">Shipping & Returns</a></li>
                            <li><a href="privacy-policy.html">Privacy</a></li>
                            <li><a href="faq.html">FAQ’s</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form">
                        <h3>Quick Contact us</h3>
                        <h6>We are now offering some good discount
                            on selected books go and shop them</h6>
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <input placeholder="Name" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" placeholder="Email" required>
                                </div>
                                <div class="col-md-12">
                                    <textarea placeholder="Messege"></textarea>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn black">Alright, Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h5>(C) 2017. All Rights Reserved. BookStore Wordpress Theme</h5>
                    </div>
                    <div class="col-md-6">
                        <div class="share align-middle">
                            <span class="fb"><i class="fa fa-facebook-official"></i></span>
                            <span class="instagram"><i class="fa fa-instagram"></i></span>
                            <span class="twitter"><i class="fa fa-twitter"></i></span>
                            <span class="pinterest"><i class="fa fa-pinterest"></i></span>
                            <span class="google"><i class="fa fa-google-plus"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>-->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    <script src="js/custom.js"></script>
    <script>
    function verifica(){
      var t="<?php echo($titolo); ?>";
      var jqxhr=$.ajax({
        type:"POST",
        url:"ctrlDisp.php",
        data:{titolo:t},
        dataType:"html"
      });
      jqxhr.done(function(ans){
        if(ans=="0"){
          alert("Copie esaurite, è possibile prenotare il libro!");
          document.getElementById("btnPren").style.display="";
        }else if(ans=="1"){
          alert("Questo libro è gia presente nella tua libreria!");
        }else{
          alert(ans);
          document.getElementById("btnPres").style.display="";
        }
      }).fail(function(){
        alert("Chiamata fallita!!!");
      });
    }
    function rimanda(){
      window.location.href='login.php';
    }

    function prestito(){
      var t="<?php echo($titolo); ?>";
      var jqxhr=$.ajax({
        type:"POST",
        url:"pres.php",
        data:{titolo:t},
        dataType:"html"
      });
      jqxhr.done(function(ans){
        if(ans=="0"){
          alert("Ci spiace ma non è stato possibile effettuare il prestito");
        }else{
          alert("Prestito effettuato, potrai iniziare a leggere il tuo libro da oggi stesso!");
        }
      }).fail(function(){
        alert("Chiamata fallita!!!");
      });
    }

    function prenotazione(){
      var t="<?php echo($titolo); ?>";
      var jqxhr=$.ajax({
        type:"POST",
        url:"pren.php",
        data:{titolo:t},
        dataType:"html"
      });
      jqxhr.done(function(ans){
        if(ans=="1"){
          alert("Hai gia effettuato una prenotazione per questo libro!");
        }else if(ans=="2"){
          alert("Ci spiace ma non è stato possibile effettuare la prenotazione");
        }else{
          alert("Potrai inziare a leggere il tuo libro dal: " +ans);
        }
      }).fail(function(){
        alert("Chiamata fallita!!!");
      });
    }

    function addRec(){
      var t="<?php echo($titolo); ?>";
      var txt=document.getElementById("txtArea").value;
      var jqxhr=$.ajax({
        type:"POST",
        url:"addRecensione.php",
        data:{titolo:t, testo:txt},
        dataType:"html"
      });
      jqxhr.done(function(ans){
        if(ans=="1"){
          alert("Recensione aggiunta con successo!");
          window.location.href='index.php';
        }else if(ans=="2"){
          alert("Hai gia aggiunto una recensione per questo libro, vuoi modificarla?");
          document.getElementById("addR").style.display="none";
          document.getElementById("modR").style.display="";
        }else{
          alert("Ci spiace ma non è stato possibile aggiungere la recensione.");
        }
      }).fail(function(){
        alert("Chiamata fallita!!!");
      });
    }

    function modRec(){
      var t="<?php echo($titolo); ?>";
      var txt=document.getElementById("txtArea").value;
      var jqxhr=$.ajax({
        type:"POST",
        url:"modRecensione.php",
        data:{titolo:t, testo:txt},
        dataType:"html"
      });
      jqxhr.done(function(ans){
        if(ans=="1"){
          alert("Recensione modificata con successo!");
          window.location.href='index.php';
        }else{
          alert("Ci spiace ma non è stato possibile modificare la recensione.");
        }
      }).fail(function(){
        alert("Chiamata fallita!!!");
      });
    }



    </script>
</body>

</html>
