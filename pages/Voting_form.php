
<!-- Voting Form UI-->
<!DOCTYPE html>
<html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <script src="../bootstrap/js/jquery.min.js"></script>
            <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
            <link rel="stylesheet" href="../fontawesome-free-6.3.0-web/css/all.min.css">
            <link href="../img/unnamed.png" rel="icon" style="border-radius: 60px;">
            <link rel="stylesheet" href="../style/index.css">
           
            <title>Student Voting System</title>
        </head>
    <body onload="myFunction1()" class="myPage">
    <div class="sidenav" id="mysidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closenav()">&times;</a>
  <a href="../index.php"><p> <i class="fa-solid fa-house"></i> Home</p></a>
  <a href="liveResults.php"><p><i class="fa-solid fa-chart-simple fa-fade"></i> View Live Results</p></a>

</div>


<button class="btn"  id="nav_btn" onclick="opennav()"><i class="fa-solid fa-bars"></i></button>
    <iframe id="loader" src="loader.php" style="display: block; border: none; width: 100%; height: 100vh;"></iframe>
    <div id="header">
        <img id="aptechLogo" src="../img/Aptech_Logo.png" alt="">
        <div id="links">
        <a href="../index.php"><p> <i class="fa-solid fa-house"></i> Home</p></a>
        <a href="liveResults.php"><p><i class="fa-solid fa-chart-simple fa-fade"></i> Live Results</p></a>
        </div>
    </div>
    <div id="scroll">
        <p>WELCOME TO APTECH STUDENT VOTING SYSTEM</p>
        
      
    </div>
    <div id="contain" class="container">
            <img class="fa-beat" src="../img/unnamed.png" alt="">
            <img id="img2" class="fa-beat" src="../img/unnamed.png" alt="">
            
            <h2>Aptech Student Voting System</h2>
        <form action="../include/vote.php" method="post">
                  
            <?php if(isset($_GET['error'])){ ?>
            <div id="message-container" class="alert   alert-warning  alert-dismissible" style=" border-left: 2px solid red;">

            <p style="margin-left: 20px;"><?php echo $_GET['error']?></p>
            </div>
            <?php } else if(isset($_GET['success'])){ ?>
            <div id="message-container"  class="alert alert-success alert-dismissible" style=" border-left: 2px solid green;">

            <p style="margin-left: 20px;"><?php echo $_GET['success']?></p>
            </div>
            <?php } ?>
                <div class="form-group">
                    <label for="studentId">Student ID:</label>
                    <input type="text" class="form-control" id="studentId" placeholder="Enter Student ID" name="studentId">
                </div>

                <div class="form-group">
                        <label for="category">Choose Category:</label>
                        <select class="form-control" id="category" name="category" >
                            <option value="">Select Category</option>
                            <option value="best_dressed">Best Dressed</option>
                            <option value="best_academically">Best Academically</option>
                            <option value="most_punctual">Most Punctual</option>
                            <!-- Add more categories as needed -->
                        </select>
                    </div>

                <div class="form-group">
                    <label for="candidate">Choose Faculty:</label>
                    <select class="form-control" id="candidate" name="candidate" >
                        <option value="">Select Faculty </option>
                        <option value="Mr Chibyke">Mr Chibyke </option>
                        <option value="Mr Abang">Mr Abang</option>
                        <option value="Mr Femi">Mr Femi</option>
                        <!-- Add more candidates as needed -->
                    </select>
                 
                </div>
                
                
                <button type="submit" id="sub" class="btn btn-danger mt-4"><i class="fa-solid fa-check-to-slot"></i> Cast Vote</button>
            
        </form>
        </div>
<footer id="formFoot">

    <p>&copy; 2023 Aptech Owerri. All rights reserved.</p>


</footer>
    </body>
    
        <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../js/loader.js"></script>
        <script src="../js/script.js"></script>

        <script>
       
                setTimeout(function(){
                    $('#message-container').fadeOut('slow', function(){
                        $(this).remove();
                    });
                }, 2000);
           
        </script>




</html>
