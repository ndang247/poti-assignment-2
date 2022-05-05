<?php
session_start();

// Get the json content sent from xhttp encoded by utf-8
$jsonContent = trim(file_get_contents('php://input'));
// echo $jsonContent;

// Decode the json content encoded by utf-8
$contentArray = json_decode($jsonContent, true);
// print_r($contentArray);

// Initialise the session array to store list of reserved cars
if (!isset($_SESSION['reservationCart'])) $_SESSION['reservationCart'] = array();

// First check if the car array is set and is an array, otherwise it is delete action
if (isset($contentArray) && is_array($contentArray)) {
    // Check if the car is already in the cart
    $found = false;
    foreach ($_SESSION['reservationCart'] as $car) {
        if ($car['id'] == $contentArray['id']) {
            $found = true;
            break;
        }
    }

    // If the car is found in the cart, update the rent days and cost and echo found, else add it to the cart and echo -1
    if ($found) {
        for ($i = 0; $i < sizeof($_SESSION['reservationCart']); $i++) {
            if ($_SESSION['reservationCart'][$i]['id'] == $contentArray['id']) {
                $_SESSION['reservationCart'][$i]['rentalDays'] += $contentArray['days'];
                $_SESSION['reservationCart'][$i]['subTotal'] = $_SESSION['reservationCart'][$i]['price_per_day'] * $_SESSION['reservationCart'][$i]['rentalDays'];
                break;
            }
        }
        echo $found;
        // print_r($_SESSION['reservationCart']);
    } else {
        // If the car is not found in the cart, add it to the cart
        array_push($_SESSION['reservationCart'], array(
            'id' => $contentArray['id'],
            'category' => $contentArray['category'],
            'availability' => $contentArray['availability'],
            'brand' => $contentArray['brand'],
            'model' => $contentArray['model'],
            'model_year' => $contentArray['model_year'],
            'mileage' => $contentArray['mileage'],
            'fuel_type' => $contentArray['fuel_type'],
            'seats' => $contentArray['seats'],
            'price_per_day' => $contentArray['price_per_day'],
            'description' => $contentArray['description'],
            'rentalDays' => 0,
            'subTotal' => 0
        ));
        echo -1;
    }

    // print_r($_SESSION['reservationCart']);
} else {
    // Delete a car from the cart
    $id = $contentArray;
    foreach ($_SESSION['reservationCart'] as $key => $car) {
        // echo $id;
        // break;
        if ($car['id'] == $id) {
            array_splice($_SESSION['reservationCart'], $key, 1);
            // After deleting the car, echo 2 to indicate that the car is deleted
            echo 2;
            break;
        }
    }
    // If the cart is empty
    if (count($_SESSION['reservationCart']) == 0) {
        // Unset the cart
        unset($_SESSION['reservationCart']);
        session_destroy();
    }
}
