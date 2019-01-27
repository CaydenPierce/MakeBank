<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FinTeach</title>
      
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#6329b9">
    <meta name="msapplication-TileColor" content="#603cba">
    <meta name="theme-color" content="#ffffff">
    <!-- Bootstrap -->
    <link href="css/bootstrap-4.0.0.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <!-- font import -->
    <style>
        @import url('https://fonts.googleapis.com/css?family=Rubik:300,300i,400,500,700');
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#"><img src="img/logo.svg" alt="logo" height="56" width="56" class="logo"></a>
        <h1 class="display-4">Financial Advertising Portal</h1>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
       <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto navbar-right">
             <li class="nav-item">
                <a class="nav-link" href="index.html">Portfolio <span class="sr-only">(current)</span></a>
             </li>
             <li class="nav-item active">
                <a class="nav-link" href="articles.html">Articles</a>
             </li>
             <li class="nav-item">
                <a class="nav-link disabled" href="#">Meetings</a>
             </li>
             <li class="log-out">
                <a class="nav-link disabled" href="#">Log Out</a> 
             </li>
          </ul>
          
       </div>
    </nav>
      <br>
      <br>
      <br>
      
    <div class="container">
        <h2 class="header">Tech Articles For You</h2><br>
        <div class="row">
            
            <?php 

              $query = "SELECT * FROM User_tracking WHERE user_id = "
              
            ?>
            
            <div class="col-4">
                
                    <a href="#">
                        <img src="img/actions.jpg" class="article-img" width="350" height="250" href="#">
                    </a>
                    <p class="article-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent fringilla tincidunt elit et commodo. Quisque vitae molestie mi. Maecenas eget gravida ex. Praesent urna odio, pellentesque in ante at, eleifend molestie justo. In eget neque quis felis sollicitudin malesuada eget egestas tortor.</p>
                
            </div>
            <div class="col-4">
                
                    <a href="#">
                        <img src="img/diversification.jpg" class="article-img" width="350" height="250" href="#">
                    </a>
                    <p class="article-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent fringilla tincidunt elit et commodo. Quisque vitae molestie mi. Maecenas eget gravida ex. Praesent urna odio, pellentesque in ante at, eleifend molestie justo. In eget neque quis felis sollicitudin malesuada eget egestas tortor.</p>
                
            </div>
            <div class="col-4">
            
                    <a href="#">
                        <img src="img/free_cash.jpg" class="article-img" width="350" height="250" href="#">
                    </a>
                    <p class="article-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent fringilla tincidunt elit et commodo. Quisque vitae molestie mi. Maecenas eget gravida ex. Praesent urna odio, pellentesque in ante at, eleifend molestie justo. In eget neque quis felis sollicitudin malesuada eget egestas tortor.</p>
                
            </div>
        </div>
    </div>
    
       <div class="row">
          <!--<div class="col-md-4">
             
          </div>-->
       </div>
       <br>
       <hr>
       <div class="row fixed-bottom">
          <div class="text-center col-lg-6 offset-lg-3">
         &nbsp;
          </div>
       </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
    <script src="js/jquery-3.2.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed --> 
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap-4.0.0.js"></script>
  </body>
</html>