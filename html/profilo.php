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
<?php
require 'strconn.php';
session_start();

 ?>


<body>
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
                      <!--  <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="Cerca il tuo libro!" aria-label="Search" onfocusout="cercaRap()" id="sh">
                            <a class="fa fa-search" onclick="cercaRap()"><a>
                        </form>-->
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <div class="breadcrumb">
        <div class="container">
            <!--<a class="breadcrumb-item" href="index.html">Home</a>
            <span class="breadcrumb-item active">Login</span>-->
        </div>
    </div>
    <section class="static about-sec">
        <div class="container">
          <?php
            echo("<h1>Ciao {$_SESSION['usr']}!</h1>");
           ?>
           <h3>Benvenuto nel tuo profilo.</h3>
           <p>In questa pagina potrai modificare i tuoi dati e goderti i tuoi libri presi in prestito dalla biblioteca! Buona permanenza!</p>
           <br>

           <div class="row">

               <form name ="pro" class="form">
                 <div class="form-group">
                     <h3>I tuoi dati:</h3>
           <?php
             require 'strconn.php';

             if(isset($_SESSION['usr'])){
               $query="SELECT username, email, nome, cognome, telefono FROM utenti WHERE username='{$_SESSION["usr"]}'";
               $tab=$dbconn->query($query);
               if($row=$tab->fetch_array(MYSQLI_NUM)){
                 echo("&nbsp&nbsp&nbsp
                 <input class='form-control mr-sm-2' type='search' placeholder='Username' aria-label='Search' value='{$row[0]}' id='uName' onfocusout='ctrlUser()'>
                 &nbsp&nbsp&nbsp&nbsp
                 <input class='form-control mr-sm-2' type='search' placeholder='Email' value='{$row[1]}' id='eMail' aria-label='Search'>
                 &nbsp&nbsp&nbsp&nbsp
                 <input class='form-control mr-sm-2' type='search' placeholder='Nome' value='{$row[2]}' id='nome' aria-label='Search'>
                 &nbsp&nbsp&nbsp&nbsp
                 <input class='form-control mr-sm-2' type='search' placeholder='Cognome' value='{$row[3]}' id='cogn' aria-label='Search'>
                 &nbsp&nbsp&nbsp&nbsp
                 <input class='form-control mr-sm-2' type='search' placeholder='Telefono' value='{$row[4]}' id='tel' aria-label='Search'>
                 <a onclick='ctrlNDati()' class='btn btn-primary btn-lg active' role='button' aria-pressed='true'>Modifica</a>");
               }
             }

            ?>

          </div>
        </form>




&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<!--<div class="row">-->
   <div class="row">
    <form name ="pro" class="form">
      <div class="form-group">
          <h3>Modifica la password:</h3>

      &nbsp&nbsp&nbsp
      <input class='form-control mr-sm-2' type='password' placeholder='Password precedente' aria-label='Search' id='oPsw' onfocusout='ctrlOPSW()'>
      &nbsp&nbsp&nbsp&nbsp
      <input class='form-control mr-sm-2' type='password' placeholder='Nuova password' id='nPsw' aria-label='Search'>
      &nbsp&nbsp&nbsp&nbsp
      <input class='form-control mr-sm-2' type='password' placeholder='Conferma password' id='cPsw' aria-label='Search'>
      <a onclick='ctrlNPsw()' class='btn btn-primary btn-lg active' role='button' aria-pressed='true'>Modifica</a>




</div>
</form>
</div>
</div>
<section class="recomended-sec">
    <div class="container">
<br><hr><br>
</div>
</section>

<section class="recomended-sec">
    <div class="container">
      <h3>I tuoi libri</h3>
      <p>In questa sezione troverai tutti i tuoi libri presi in prestito dalla biblioteca. Buona lettura!</p><br><br><br>
      <div class="row" id="divLib">

        <?php
        require 'strconn.php';
        $user=$_SESSION['usr'];
        $queryU="SELECT numero FROM utenti WHERE username='{$user}'";
        $tabU=$dbconn->query($queryU);
        $rowU=$tabU->fetch_array(MYSQLI_NUM);
        $nUser=$rowU[0];

        $queryL="SELECT LIBRO FROM prestiti WHERE UTENTE={$nUser} AND fNoDelete=1 AND CURDATE() BETWEEN dataP AND dataR";
        $tabL=$dbconn->query($queryL);
        while($rowL=$tabL->fetch_array(MYSQLI_NUM)){
          $queryLP="SELECT l.titolo, i.percorso, l.file FROM icone AS i, libri AS l WHERE l.codice=i.LIBRO AND l.codice={$rowL[0]}";
          $tabLP=$dbconn->query($queryLP);
          while($rowLP=$tabLP->fetch_array(MYSQLI_NUM)){
            echo("<div class='col-lg-3 col-md-6'>
                <div class='item'>
                    <img src='{$rowLP[1]}' alt='img'>
                    <h6 id='tit'>{$rowLP[0]}</h6>
                    <div class='hover'>
                        <a href='read.php?file={$rowLP[2]}'>
                        <span>Leggi</span>
                        </a>
                    </div>
                </div><br>
                <div class='btn-sec'>
                    <a href='delete.php?titolo={$rowLP[0]}' class='btn yellow'>Elimina dalla libreria</a>
                </div>
            </div>");
            /*echo("<div class='col-lg-3 col-md-6'>
                <div class='item'>
                    <img src='{$row[1]}' alt='img'>
                    <h3>{$row[0]}</h3>
                    <div class='hover'>
                        <a href='product-single.php?titolo={$row[0]}'>
                        <span><i class='fa fa-long-arrow-right' aria-hidden='true'></i></span>
                        </a>
                    </div>
                </div><br><br>
            </div>");*/
          }
        }
         ?>
      </div>
    </div>
</section>

<section class="recomended-sec">
    <div class="container">
<br><hr><br>
</div>
</section>

<section class="recomended-sec">
    <div class="container">
      <h3>Le tue prenotazioni</h3>
      <p>In questa sezione troverai i libri che hai prenotato. Questi non saranno leggibili fino alla data di inizio prestito.</p><br><br><br>
      <div class="row" id="divLib">

        <?php
        require 'strconn.php';
        $user=$_SESSION['usr'];
        $queryU="SELECT numero FROM utenti WHERE username='{$user}'";
        $tabU=$dbconn->query($queryU);
        $rowU=$tabU->fetch_array(MYSQLI_NUM);
        $nUser=$rowU[0];

        $queryL="SELECT LIBRO FROM prestiti WHERE UTENTE={$nUser} AND fNoDelete=1 AND CURDATE()<dataP";
        $tabL=$dbconn->query($queryL);
        while($rowL=$tabL->fetch_array(MYSQLI_NUM)){
          $queryLP="SELECT l.titolo, i.percorso FROM icone AS i, libri AS l WHERE l.codice=i.LIBRO AND l.codice={$rowL[0]}";
          $tabLP=$dbconn->query($queryLP);
          while($rowLP=$tabLP->fetch_array(MYSQLI_NUM)){
            echo("<div class='col-lg-3 col-md-6'>
                <div class='item'>
                    <img src='{$rowLP[1]}' alt='img'>
                    <h6>{$rowLP[0]}</h6>
                    <div class='hover'>
                        <a href='product-single.php?titolo={$rowLP[0]}'>
                        <span><i class='fa fa-long-arrow-right' aria-hidden='true'></i></span>
                        </a>
                    </div>
                </div><br>
                <div class='btn-sec'>
                    <a href='delete.php?titolo={$rowLP[0]}' class='btn yellow'>Disdici prenotazione</a>
                </div>
            </div>");
          }
        }
         ?>
      </div>
    </div>
</section>

<!--</div>-->
           <!--<h3>Modifica i tuoi dati!</h3>
           <p>Puoi modificare uno o più dati relativi al tuo personale profilo. Una volta modificati clicca sul bottone per confermare!</p>-->
<!--&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp-->
<!--<div class="row">
           <form name ="pro" class="form">
             <div class="form-group">-->
               <!--<label for="exampleFormControlSelect1">Generi</label>-->

               <!--<select class="form-control" id="gR">
               </select>-->


               <!--<select class="form-control" id="cG">
               </select>-->
                <!--<h3>Modifica i dati:</h3>
               &nbsp&nbsp&nbsp
               <input class="form-control mr-sm-2" type="search" placeholder="Username" aria-label="Search" id="uName" onfocusout="ctrlUser()">
               &nbsp&nbsp&nbsp&nbsp
               <input class="form-control mr-sm-2" type="search" placeholder="Email" aria-label="Search" id="eMail">
               &nbsp&nbsp&nbsp&nbsp
               <input class="form-control mr-sm-2" type="search" placeholder="Nome" aria-label="Search" id="nome">
               &nbsp&nbsp&nbsp&nbsp
               <input class="form-control mr-sm-2" type="search" placeholder="Cognome" aria-label="Search" id="cogn">
               &nbsp&nbsp&nbsp&nbsp
               <input class="form-control mr-sm-2" type="search" placeholder="Telefono" aria-label="Search" id="tel">


             </div>

           </form>
         </div>-->

            <!--<div class="form" align="center">
                <form>-->
                    <!--<div class="row">-->
                        <!--<div class="col-lg-8 col-md-12">
                            <input type="text" placeholder="Inserisci il tuo username!" name="user" id="user">
                            <span class="required-star">*</span>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <input type="password" placeholder="Inserisci la password" name="psw" id="psw">
                            <span class="required-star">*</span>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <input type="button" class="btn black" value="Login" onclick="ctrlLogin()">
                            <h5>Non ti sei ancora registrato? Cosa aspetti? <a href="register.php"> Clicca qui!</a></h5>
                        </div>-->
                    <!--</div>-->
                <!--</form>
            </div>-->

    </section>
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
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/jquery-3.4.1.js"></script>
    <script src="sha256.js"></script>
    <script language="javascript"></script>

    <script>

    /*function cercaRap(){
      var t=document.getElementById("sh").value;
      window.location.href="ricercaRap.php?titolo="+t;
    }*/

    function ctrlUser(){
      var usr=document.getElementById("uName").value;
      if(usr!=""){
        var jqxhr=$.ajax({
          type:"POST",
          url:"ctrlUserProf.php",
          data:{user:usr},
          dataType:"html"
        });

        jqxhr.done(function(ans){
          if(ans=="1"){
            alert("Non puoi utilizzare questo username, provane un altro.");
            document.getElementById("uName").value="";
          }else if(ans=="2"){
            alert("Questo è il tuo username corrente");
          }else{
            alert("Questo username è utilizzabile. Ora è tutto tuo!");
          }
        }).fail(function(){
          alert("Chiamata fallita!!!");
        });
      }

    }

    function ctrlNDati(){
      var u=document.getElementById("uName").value;
      var e=document.getElementById("eMail").value;
      var n=document.getElementById("nome").value;
      var c=document.getElementById("cogn").value;
      var t=document.getElementById("tel").value;
      var email_reg_exp = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-]{2,})+\.)+([a-zA-Z0-9]{2,})+$/;

      if(u=="" || e=="" || n=="" || c=="" || t==""){
        alert("Inserire tutti i dati per effettuare la modifica!");
      }else if(!email_reg_exp.test(e.trim())){
        alert("Formato email errato");
        document.getElementById("eMail").value="";
      }else{
        var jqxhr=$.ajax({
          type:"POST",
          url:"modificaDati.php",
          data:{user:u, email:e, nome:n, cogn:c, tel:t},
          dataType:"html"
        });

        jqxhr.done(function(ans){
          alert(ans);
        }).fail(function(){
          alert("Chiamata fallita!!!");
        });
      }

    }

    function ctrlOPSW(){
      var oldP=document.getElementById("oPsw").value;
      if(oldP!=""){
        oldP=Sha256.hash(oldP);
        var jqxhr=$.ajax({
          type:"POST",
          url:"ctrlOldPsw.php",
          data:{psw:oldP},
          dataType:"html"
        });

        jqxhr.done(function(ans){
          if(ans=="1"){
            alert("Password riconosciuta");
          }else{
            alert("Password non corretta");
          }
        }).fail(function(){
          alert("Chiamata fallita!!!");
        });
      }
    }

    function ctrlNPsw(){
      var p=document.getElementById("nPsw").value;
      var cp=document.getElementById("cPsw").value;
      var op=document.getElementById("oPsw").value;

      if(p=="" || cp=="" || op==""){
        alert("Inserire tutti i dati richiesti per apportare la modifica alla password!");
      }else if(p!=cp){
        alert("Le due password non corrispondono!");
        document.getElementById("nPsw").value="";
        document.getElementById("cPsw").value="";
        document.getElementById("nPsw").setFocus();
        document.getElementById("cPsw").setFocus();
      }else{
        p=Sha256.hash(p);
        var jqxhr=$.ajax({
          type:"POST",
          url:"modificaPSW.php",
          data:{psw:p},
          dataType:"html"
        });

        jqxhr.done(function(ans){
          alert(ans);
        }).fail(function(){
          alert("Chiamata fallita!!!");
        });
      }

    }


    /*function ctrlLogin(){
      user=document.getElementById("user").value;
      psw=document.getElementById("psw").value;
      if(user=="" || psw==""){
        alert("Per favore inserisci i dati, cosi potrai dedicarti alla lettura dei tuoi libri preferiti!");
      }else{
        psw=Sha256.hash(psw);
        alert(psw);
        var jqxhr=$.ajax({
          type:"POST",
          url:"ctrlLogin.php",
          data:{user:user, psw:psw},
          dataType:"html"
        });
        jqxhr.done(function(ans){
          if(ans=="1"){
            alert("Login effettuato! Buona lettura "+user);
            window.location.href='index.php';
          }else{
            alert("I dati non sono corretti, non disperarti, riprova e andrà meglio!");
          }
        }).fail(function(){
          alert("Chiamata fallita!!!");
        });
      }
    }*/

    </script>

</body>

</html>
