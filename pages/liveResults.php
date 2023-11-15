<!-- Cornelius Documentation -->
<!-- Viewing Live Results -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Voting Results</title>
    <link href="../img/unnamed.png" rel="icon" style="border-radius: 60px;">
    <link rel="stylesheet" href="../style/live.css">
    <link rel="stylesheet" href="../fontawesome-free-6.3.0-web/css/all.min.css">
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Including jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body onload="myFunction1()" class="myPage">
<div class="sidenav" id="mysidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closenav()">&times;</a>
  <a href="../index.php"><p> <i class="fa-solid fa-house"></i> Home</p></a>
  <a href="Voting_form.php"><p><i class="fa-solid fa-check-to-slot fa-fade"></i> Vote</p></a>

</div>


<button class="btn"  id="nav_btn" onclick="opennav()"><i class="fa-solid fa-bars"></i></button>
<iframe id="loader" src="loader.php" style="display: block; border: none; width: 100%; height: 100vh;"></iframe>
<div id="header">
        <img id="aptechLogo" src="../img/Aptech_Logo.png" alt="">
        <div id="links">
        <a href="../index.php"><p><i class="fa-solid fa-house fa-fade"></i> Home</p></a>
        <a href="Voting_form.php"><p><i class="fa-solid fa-check-to-slot fa-fade"></i> Vote</p></a>
      
        </div>
    </div>
<div class="container">
<img class="fa-beat" src="../img/unnamed.png" alt="">
    <div class="row">
        <div class="col-md-12">
            <div id="live-results-container">
                <!-- Live results will be inserted here -->
            </div>
        </div>
    </div>
    <a style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;" class="btn btn-danger" href="../include/clear_table.php">Clear Table</a>
</div>
<footer id="homeFoot">

    <p>&copy; 2023 Aptech Owerri. All rights reserved.</p>


</footer >
<script>
$(document).ready(function() {
    function updateLiveResults() {
        $.ajax({
            url: '../include/get_results.php', // Replace with the actual file name
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                // Build HTML to display live results
                var html = '<h3 class="mt-4">Live Voting Results</h3>';
                html += '<table class="table">';
                html += '<thead class="thead-dark">';
                html += '<tr>';
                html += '<th>Candidate</th>';
                html += '<th>Category</th>';
                html += '<th>Total Votes</th>';
                html += '</tr>';
                html += '</thead>';
                html += '<tbody>';

                // Loop through the results and create table rows
                for (var i = 0; i < data.length; i++) {
                    var votes = data[i].total_votes;
                    var category = data[i].category;
                    var rowClass = '';

                    // Determine the class based on the total votes within each category
                    if (votes == getMaxVotesForCategory(data, category)) {
                        rowClass = 'high-votes';
                    } else if (votes == getMinVotesForCategory(data, category)) {
                        rowClass = 'low-votes';
                    }

                    html += '<tr class="' + rowClass + '">';
                    html += '<td>' + data[i].candidate + '</td>';
                    html += '<td>' + category + '</td>';
                    html += '<td>' + votes + '</td>';
                    html += '</tr>';
                }

                html += '</tbody>';
                html += '</table>';

                // Update the content on the page
                $('#live-results-container').html(html);
            }
        });
    }

    // Helper function to get the maximum votes for a specific category
    function getMaxVotesForCategory(data, category) {
        return Math.max(...data.filter(item => item.category === category).map(item => item.total_votes));
    }

    // Helper function to get the minimum votes for a specific category
    function getMinVotesForCategory(data, category) {
        return Math.min(...data.filter(item => item.category === category).map(item => item.total_votes));
    }

    // Update live results initially and then every 3 seconds (adjust as needed)
    updateLiveResults();
    setInterval(updateLiveResults, 3000);
});


</script>


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="../js/loader.js"></script>
<script src="../js/script.js"></script>
</body>
</html>
