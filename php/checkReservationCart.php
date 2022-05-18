<?php 
session_start();
// Get the json content sent from xhttp encoded by utf-8
// $content = trim(file_get_contents('php://input'));
// echo $jsonContent;

// Decode the json content encoded by utf-8
// $decodeContent = json_decode($content, true);
// print_r($decodeContent);

// First check if the session cart is set and is an array
if (isset($_SESSION['reservationCart']) && is_array($_SESSION['reservationCart'])) {
    // Check if the cart is empty
    if (empty($_SESSION['reservationCart'])) {
        echo "Empty";
    } else {
        // If the cart is not empty, echo Ok
        echo "Ok";
    }
} else {
    // If the cart is not set, echo 0
    echo "Empty";
}
?>