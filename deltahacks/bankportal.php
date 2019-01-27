<!DOCTYPE html>
<head>
    <title>Financial Advisor Portal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
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
                  <ul class="navbar-nav mr-auto ml-auto">
                     
                     <li class="nav-item bank-port">
                        <a class="nav-link disabled" href="#">Log Out</a> 
                     </li>
                  </ul>
                  
               </div>
            </nav>
  <div class="container title-center">
    <h2 class="CustomerProfile">Customer Profile</h2>
  </div>
  
    <div class="form-div container">
      <form action="#" method="GET">
        <button type="submit" class="submit-button"><i class="fas fa-search"></i></button>
        <input class="fa-input" type="text" name="name" placeholder="Search for Customer..">
        
      </form>
    </div>
  
    <div class="container" id="top-container">
        <div class="container">
    <p class="lvl">Lv. 1&nbsp;&nbsp;</p><br>
        <p class="learning-title bp-lt" style="font-weight:700; font-size:1rem;">Beginner Investor</p>
      <div class="row">
        <div class="col-5">
          <div class="progress" id="progress-one">
            <div class="progress-bar bp-progress" role="progressbar" aria-valuenow="70"
            aria-valuemin="0" aria-valuemax="100" style="width:70%">
                <span class="sr-only">70% Complete</span>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-3">
          <img src="img/portrait-2.JPG" class="portrait bp-portrait" width="200" height="300" alt="portrait">
          <button id="meeting-button">Schedule Meeting</button>
          <button id="invest-button">See invested stocks</button>
        </div>
        <div class="col-9">
          <h4 class="aa-name">Alexander Aatrovich M 20</h4>
          <i style="margin-right: 10px" class="fas fa-map-marker-alt"></i><p class="location" style="display: inline">1854 Sekund Cupe Ave, Toronto, ON, B6M 4D6</p>
          <div class="row pos-7">
              <div class="col">
                <div class="stats-header" style="color: black">Amount Invested</div>
                <p class="color-num">$616.67</p>
                <div class="paragraphs">
                  <p class="desc">Shares Purchased:</p>
                  <p class="desc">Preferred Sector:</p>
                  <p class="desc">Risk Tolerance:</p>
                </div>
              </div>
              <div class="col">
                <div class="stats-header" style="color: black">Current Portfolio Value</div>
                <p class="color-num">$727.87</p>
                <div class="paragraphs" style="color: grey">
                  <p class="desc">10</p>
                  <p class="desc">Tech</p>
                  <p class="desc">Passive</p>
                </div>  
              </div>
              <div class="col">
                <div class="stats-header" style="color: black">Gain/Loss</div>
                <p class="color-sh">+$112.20</p>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <h2 class="recommend">Recommended Investment Strategies and Product Offerings</h2>
  </div>
  
  <div class="container center-col">
    <div class="row center-col">
      <div class="col-3 retainer">
        <p class="type-ret">A</p>
      </div>
      <div class="col-3 retainer">
        <p class="type-ret">B</p>
      </div>
      <div class="col-3 retainer">
        <p class="type-ret">C</p>
      </div>
    </div>
  </div>
  <div class="row fixed-bottom">
          <div class="text-center col-lg-6 offset-lg-3">
         &nbsp;
          </div>
       </div>
</body>