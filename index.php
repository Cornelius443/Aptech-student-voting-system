
<!-- Welcome Page ui -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="fontawesome-free-6.3.0-web/css/all.min.css">
    <link href="img/unnamed.png" rel="icon" style="border-radius: 60px;">
    <title>Student Voting System</title>
</head>
<body onload="myFunction()" class="myPage" id="home">
<iframe id="loader" src="pages/loader.php" style="display: block; border: none; width: 100%; height: 100vh;"></iframe>
<div class="sidenav" id="mysidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closenav()">&times;</a>
  <a href="pages/liveResults.php"><p><i class="fa-solid fa-chart-simple fa-fade"></i> View Live Results</p></a>
  <a href="pages/Voting_form.php"><p><i class="fa-solid fa-check-to-slot fa-fade"></i> Vote</p></a>

</div>


<button class="btn"  id="nav_btn" onclick="opennav()"><i class="fa-solid fa-bars"></i></button>
<div id="header">
        <img id="aptechLogo" src="img/Aptech_Logo.png" alt="">
        <div id="links">
       
        <a href="pages/liveResults.php"><p><i class="fa-solid fa-chart-simple fa-fade"></i> View Live Results</p></a>
        
        </div>
    </div>
<div class="container">
<img src="img/unnamed.png" alt="">
    <h1>Welcome to the Student Voting System</h1>
    <p>Make your voice heard by participating in the faculty election. Follow the link below to cast your vote:</p>
    <a href="pages/Voting_form.php" class="btn btn-danger bg-gradient mt-3"><i class="fa-solid fa-check-to-slot"></i> Vote Now</a>
</div>
<footer id="homeFoot">

    <p>&copy; 2023 Aptech Owerri. All rights reserved.</p>


</footer >
</body>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="js/loader.js"></script>
<script src="js/script.js"></script>

