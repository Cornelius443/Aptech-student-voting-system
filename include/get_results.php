<?php
// Cornelius documentation

// Include connection file
include("connection.php");

// Fetch live results from the database
$query = "SELECT candidate, category, COUNT(*) as total_votes FROM casted_votes GROUP BY candidate, category";
$result = $conn->query($query);

// Fetch the results into an array
$data = array();
while ($row = $result->fetch_assoc()) {
     // Sanitize each value in the $row array using htmlspecialchars
     $sanitizedRow = array_map('htmlspecialchars', $row);
    
    $data[] = $sanitizedRow;
   
}

// Close the database connection
$conn->close();

// Output the results as JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
