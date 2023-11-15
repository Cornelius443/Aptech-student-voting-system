<!-- Generate id UI for students to vote -->

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

            <style>
                #email{
                    background-color: rgb(77, 74, 74);
                    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                    color: white;
                    border: none;
                    width: 70%;
                    margin: auto;
                }

                #phoneNo{
                    background-color: rgb(77, 74, 74);
                    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                    color: white;
                    border: none;
                    width: 70%;
                    margin: auto;
                }

                footer{
                    position: relative;
                    top: 90px;
                }
            </style>
        </head>
    <body onload="myFunction1()" class="myPage">
    <div class="sidenav" id="mysidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closenav()">&times;</a>
  <a href="../index.php"><p> <i class="fa-solid fa-house"></i> Home</p></a>
  <a href=""><p><i class="fa-solid fa-chart-simple fa-fade"></i> View Live Results</p></a>

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
           
            
            <h2>Fill In Your Details To Generate Student Id</h2>
        <form action="../include/getId.php" method="post">
                  
            <?php if(isset($_GET['error'])){ ?>
            <div id="message-container" class="alert   alert-warning  alert-dismissible" style=" border-left: 4px solid red;">
            <button class="btn-close" data-bs-dismiss="alert"></button>
            <p style="margin-left: 20px;"><?php echo $_GET['error']?></p>
            </div>
            <?php } else if(isset($_GET['success'])){ ?>
            <div id="message-container"  class="alert alert-success alert-dismissible" style=" border-left: 4px solid green;">
            <button class="btn-close" data-bs-dismiss="alert"></button>
            <p style="margin-left: 20px;"><?php echo $_GET['success']?></p>
            </div>
            <?php } ?>
                <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                </div>

                <div class="form-group">
                        <label for="phoneNo">phone_Number :</label><br>
                        <input type="text" class="form-control" name="phoneNo" id="phoneNo" placeholder="Enter phone number" required>
                    </div>

             
                
                
                <button type="submit" id="sub" class="btn btn-danger mt-4"><i class="fa-solid fa-check-to-slot"></i> Generate ID</button>
            
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
       
                // setTimeout(function(){
                //     $('#message-container').fadeOut('slow', function(){
                //         $(this).remove();
                //     });
                // }, 2000);
           
        </script>




</html>
