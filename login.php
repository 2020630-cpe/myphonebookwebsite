<?php
session_start();

if(isset($_SESSION['username'])){
    header("Location: index.php");
    exit();
}

    // Ensure that no output is sent before session_start()
    ob_start();
    require('db.php');

    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);

        // Check if user exists in the database
        $query = "SELECT * FROM `users` WHERE username='$username' AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $rows = mysqli_num_rows($result);

        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: index.php");
            exit();
        } else {
            $errorMessage = "Incorrect Username/Password.";
        }
    }
    ob_end_flush(); // Flush output buffer
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Nelyy PHONEBOOK</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- awesome fontfamily -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="" /></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
         <div class="header">
            <div class="container-fluid">
               <div class="row d_flex">
                  <div class=" col-md-2 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="index.html"><img src="images/logo.png" alt="#" /></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-8 col-sm-9">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">
                              <li class="nav-item active">
                                 <a class="nav-link" href="index.php">Home</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="about.php">About</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="phonebook.php">Phonebook</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="contacts.php">Contacts</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="login1.php">Login</a>
                              </li>
                           </ul>
                        </div>
                     </nav>
                  </div>
                  <div class="col-md-2 d_none">
                     <ul class="email text_align_right">

                        <li> <a href="Javascript:void(0)"> <i class="fa fa-search" style="cursor: pointer;" aria-hidden="true"> </i></a> </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- end header -->
      <!-- start slider section -->
      <div id="top_section" class=" banner_main">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div id="myCarousel" class="carousel slide" data-ride="carousel">
                     <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                        <li data-target="#myCarousel" data-slide-to="3"></li>
                     </ol>
                     <div class="carousel-inner">
                        <div class="carousel-item active">
                           <div class="container-fluid">
                              <div class="carousel-caption relative">
                                 <div class="bluid">
                                    <h1>Nelyy <br>PHONEBOOK </h1>
                                    <p>This name suggests that the phonebook serves as a valuable repository of important contacts and cherished memories. It conveys the idea of preserving meaningful relationships and facilitating delightful connections with others.
                                    </p>
                                    <a class="read_more" href="about.html">About Nelyy Phonebook </a><a class="read_more" href="contact.html">Contact </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="carousel-item">
                           <div class="container-fluid">
                              <div class="carousel-caption relative">
                                 <div class="bluid">
                                    <h1>The  <br>Shutterword Explorer </h1>
                                    <p>This name reflects my passiom for photography ("shutter") and reading ("word").
                                    It highlights my curosity and adventurous nature in discovering new places capturing moments through the lens, and immersing yourself in the world of stories and imagination. Additionally, it acknowledges my love for horror movies and anime, which contribute to my sense of thrill and fascination with different realms of storytelling. Showcases my interest in tinkering, fixing, and improving things, indicating my practical and hands-on approach to problem-solving.
                                    </p>
                                    <a class="read_more" href="about.html">About Nelyy PHONEBOOK </a><a class="read_more" href="contact.html">Contact </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="carousel-item">
                           <div class="container-fluid">
                              <div class="carousel-caption relative">
                                 <div class="bluid">
                                    <h1>My  <br>Pictures </h1>
                                    <p>Capturing a moment in a photograph is freezing time, preserving the beauty and emotions that fade away but remain eternally alive within the frame.
                                    </p>
                                    <a class="read_more" href="about.html">About Nelyy PHONEBOOK </a><a class="read_more" href="contact.html">Contact </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="carousel-item">
                           <div class="container-fluid">
                              <div class="carousel-caption relative">
                                 <div class="bluid">
                                    <h1>Creative  <br>Work Idea </h1>
                                    <p>There are many variations of passages of Lorem Ipsum <br>available, but the majority have suffered alteration
                                    </p>
                                    <a class="read_more" href="about.html">About Company </a><a class="read_more" href="contact.html">Contact </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                     <i class="fa fa-angle-left" aria-hidden="true"></i>
                     <span class="sr-only">Previous</span>
                     </a>
                     <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                     <i class="fa fa-angle-right" aria-hidden="true"></i>
                     <span class="sr-only">Next</span>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end slider section -->
      <!-- about -->
      <div class="about">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage text_align_center">
                     <h2>About Nelyy PHONEBOOK</h2>
                     <p>There are many variations of passages of Lorem Ipsum available, but the majority have </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end about -->
      <!-- portfolio -->
      <div class="portfolio">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage text_align_left">
                     <h2>My Portfolio  </h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <div id="ho_nf" class="portfolio_main text_align_left">
                     <figure>
                        <img src="images/prot1.png" alt="#"/>
                        <div class="portfolio_text">
                           <div class="li_icon">
                              <a href="Javascript:void(0)"><i class="fa fa-search" aria-hidden="true"></i></a>
                              <a href="Javascript:void(0)"><i class="fa fa-link" aria-hidden="true"></i></a>
                           </div>
                           <h3>Carrency Dashbord</h3>
                           <p>There are many variations of passages of Lorem Ipsum available, but the majoraity have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable</p>
                        </div>
                     </figure>
                  </div>
               </div>
               <div class="col-md-6">
                  <div id="ho_nf" class="portfolio_main text_align_left">
                     <figure>
                        <img src="images/prot2.png" alt="#"/>
                        <div class="portfolio_text">
                           <div class="li_icon">
                              <a href="Javascript:void(0)"><i class="fa fa-search" aria-hidden="true"></i></a>
                              <a href="Javascript:void(0)"><i class="fa fa-link" aria-hidden="true"></i></a>
                           </div>
                           <h3>Carrency Dashbord</h3>
                           <p>There are many variations of passages of Lorem Ipsum available, but the majoraity have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable</p>
                        </div>
                     </figure>
                  </div>
               </div>
               <div class="col-md-6">
                  <div id="ho_nf" class="portfolio_main text_align_left">
                     <figure>
                        <img src="images/prot3.png" alt="#"/>
                        <div class="portfolio_text">
                           <div class="li_icon">
                              <a href="Javascript:void(0)"><i class="fa fa-search" aria-hidden="true"></i></a>
                              <a href="Javascript:void(0)"><i class="fa fa-link" aria-hidden="true"></i></a>
                           </div>
                           <h3>Carrency Dashbord</h3>
                           <p>There are many variations of passages of Lorem Ipsum available, but the majoraity have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable</p>
                        </div>
                     </figure>
                  </div>
               </div>
               <div class="col-md-6">
                  <div id="ho_nf" class="portfolio_main text_align_left">
                     <figure>
                        <img src="images/prot4.png" alt="#"/>
                        <div class="portfolio_text">
                           <div class="li_icon">
                              <a href="Javascript:void(0)"><i class="fa fa-search" aria-hidden="true"></i></a>
                              <a href="Javascript:void(0)"><i class="fa fa-link" aria-hidden="true"></i></a>
                           </div>
                           <h3>Carrency Dashbord</h3>
                           <p>There are many variations of passages of Lorem Ipsum available, but the majoraity have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable</p>
                        </div>
                     </figure>
                  </div>
               </div>
               <div class="col-md-12">
                  <a class="read_more" href="portfolio.html">See More</a>
               </div>
            </div>
         </div>
      </div>
      <!-- end portfolio -->
      <!-- footer -->
      <footer>
         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class="col-md-3">
                     <a class="logo_footer" href="index.html"><img src="images/logo_footer.png" alt="#" /></a>
                  </div>
                  <div class="col-md-9">
                     <form class="newslatter_form">
                        <input class="ente" placeholder="Enter your email" type="text" name="Enter your email">
                        <button class="subs_btn">Sbscribe Now</button>
                     </form>
                  </div>
                  <div class="col-md-3 col-sm-6"
                  >
                     <div class="Informa helpful">
                        <h3>Useful  Link</h3>
                        <ul>
                           <li><a href="index.php">Home</a></li>
                           <li><a href="about.php">About</a></li>
                           <li><a href="phonebook.php">Phonebook</a></li>
                           <li><a href="contact.php">Contact Details</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-3 col-sm-6">
                     <div class="Informa">
                        <h3>Phonebook</h3>
                        <ul>
                           <li>It is a long established                             
                           </li>
                           <li>fact that a reader will                            
                           </li>
                           <li>be distracted by the                          
                           </li>
                           <li>readable content of a                              
                           </li>
                           <li>page when                          
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-3 col-sm-6">
                     <div class="Informa conta">
                        <h3>Contact Us</h3>
                        <ul>
                           <li> <a href="Javascript:void(0)"> <i class="fa fa-map-marker" aria-hidden="true"></i> Location
                              </a>
                           </li>
                           <li> <a href="Javascript:void(0)"><i class="fa fa-phone" aria-hidden="true"></i> Call 09125981529
                              </a>
                           </li>
                           <li> <a href="Javascript:void(0)"> <i class="fa fa-envelope" aria-hidden="true"></i> neliavalencia0@gmail.com
                              </a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="copyright text_align_left">
               <div class="container">
                  <div class="row d_flex">
                     <div class="col-md-6">
                        <p>© 2023 Nelyy PHONEBOOK  <a href="https://html.design/"> Free Html Template</a></p>
                     </div>
                     <div class="col-md-6">
                        <ul class="social_icon text_align_center">
                           <li> <a hgref="https://www.facebook.com/nelia.valencia.338?mibextid=ZbWKwL><i class="fa fa-facebook-f"></i></a></li>
                          <li> <a href="https://www.instagram.com/nelia.Valencia?fbclid=IwAR0DdennDdFjedwMaF057Fgp1qq9_JelK8e0IqAlIolEuHBKVSlHSPFHABM"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                           <li> <a href="Javascript:void(0)"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>