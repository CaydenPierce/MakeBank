<?php 

session_start();

$_SESSION['user_id'] = 1;

include "db.php";

?>

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
        <a class="navbar-brand" href="index.php"><img src="img/logo.svg" alt="logo" height="56" width="56" class="logo"></a>
    <h1 class="display-4">Financial Advertising Portal</h1>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
       <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto ml-auto">
             <li class="nav-item">
                <a class="nav-link" href="index.php">Stocks<span class="sr-only">(current)</span></a>
             </li>
        <li class="nav-item">
                <a class="nav-link" href="stocks.php">Portfolio</a>
             </li>
             <li class="nav-item active">
                <a class="nav-link" href="articles.php">Articles</a>
       </li>
             <li class="nav-item">
                <a class="nav-link" href="meetings.html">Meetings</a>
             </li>
       <li class="nav-item">
        <a class="nav-link disabled" href="#">Log Out</a> 
       </li>
          </ul>
          
       </div>
    </nav>
    <br>
    <br>
    <br>
    
  <?php 

  $user_id = $_SESSION['user_id'];

  $query = "SELECT * FROM User_tracking WHERE user_id = $user_id";

  $result = mysqli_query($connection, $query);

  if(!$result) {
    die("failed " . mysqli_error($result));
  }

  $row = mysqli_fetch_assoc($result);

  $diversification = $row['diversification'];
  $free_cash = $row['free_cash'];
  $volatility = $row['volatility'];
  $financial_literacy = $row['financial_literacy'];

  /* learning will be done in sequential ordering based on what we believe users are lacking knowledge in */
  
  $articles = array();

  /*need to check which articles have already been viewed but thats a later issue*/

  // if($financial_literacy < 1) {
  //   $articles = ["personal", "personal", "personal"];
  // } else if($diversification < 1) {
  //   $articles = ["diversification", "personal", "volatility"];
  // } else if($free_cash < 1) {
  //   $articles = ["free_cash" , "free_cash", "volatility"];
  // } else if($volatility < 1) {
  //   $articles = ["volatility" ,"volatility" ,"volatility" ];
  // } else {
  //   $articles = ["strategies", "strategies", "actions"];
  // }

  $article_query = "SELECT * FROM Articles WHERE seen = 0 LIMIT 3";

  $article_result = mysqli_query($connection, $article_query);

  if(!$result) {
    die("failed " . mysqli_error($result));
  }

  $article_info = array();
  while ($row = mysqli_fetch_assoc($article_result)) {
    $article_info[] = $row;
  }

  
?>



    <div class="container">
    <h2 class="header">Learning Resources For You</h2><br>
        <div class="row">
      
            
      <div class="col-4">
        
          <a href="#">
            <img src="img/<?php echo $article_info[0]['image']; ?>" class="article-img" alt="article-img-1" width="350" height="250" href="#">
          </a>
          <p class="article-text" ><?php echo $article_info[0]['article_title']; ?></p>
          

          <a href="<!-- <?php echo $article_info[0]['article_url']; ?> -->"><p class="article-textl" data-articleid=<?php echo $article_info[0]['article_id']; ?>>Learn More</p></a>

            </div>
            <div class="col-4">
                
          <a href="#">
            <img src="img/<?php echo $article_info[1]['image']; ?>" class="article-img" alt="article-img-2" width="350" height="250" href="#">
          </a>
          <p class="article-text" data-articleid=<?php echo $article_info[1]['article_id']; ?>><?php echo $article_info[1]['article_title']; ?></p>
<a href="<?php echo $article_info[1]['article_url']; ?>"><p class="article-textl" data-articleid=<?php echo $article_info[2]['article_id']; ?>>Learn More</p></a>
        
            </div>
      <div class="col-4">
      
          <a href="#">
            <img src="img/<?php echo $article_info[2]['image']; ?>" class="article-img" alt="article-img-3" width="350" height="250" href="#">
          </a>
          <p class="article-text" ><?php echo $article_info[2]['article_title']; ?></p>  <a href="<?php echo $article_info[2]['article_url']; ?>"><p class="article-textl" data-articleid=<?php echo $article_info[2]['article_id']; ?>>Learn More</p></a>

        
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

  <script type="text/javascript">
$(".article-textl").click(function(){

  var art = $(this);
  var art_id = $(art).data();

  var pen = {}
  pen.hi = art_id['articleid']

  console.log(pen.hi);


  $.ajax({
  url: 'update_articles.php',
  type: 'POST',
  data: pen,
  success: function(data) {
    console.log(data)
  }
});
});
</script>


  </body>
</html>
