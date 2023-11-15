<?php
// Cornelius Documentation

// Clearing the results table


include("voteDAO.php");
$dao = new VoteDAO();



$dao->clearTable();
?>