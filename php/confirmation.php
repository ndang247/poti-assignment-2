<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/c818109c96.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/confirmation.css" />
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/reservation.css">
    <title>Confirmation</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light sticky" style="background-color: #e3f2fd">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php">Hertz-UTS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="reservation.php" target="_blank">
                            <input type="submit" class="btn btn-reservation" name="action" value="Car Reservation">
                        </form>
                        <!-- <a class="nav-link" href="#">Car Reservation</a> -->
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <div class="container pt-5">
            <div class="pt-5 p-2">
                <h1 class="text-center">
                    <?php
                    session_start();
                    // Display the confirmation page if the cart exists
                    // Otherwise display empty cart message
                    if (isset($_SESSION['reservationCart'])) {
                        echo "Confirmation";
                    } else echo "<p>Your reservation cart is empty.</p>
                    <p>Please go to home to select a vehicle.</p>";
                    ?>
                </h1>
            </div>
            <div>
                <?php
                $totalCost = 0;

                // User input
                $name = $_POST['firstName'] . " " . $_POST['lastName'];
                $email = $_POST['email'];
                $address1 = $_POST['address1'];
                $address2 = $_POST['address2'];
                $suburb = $_POST['city'];
                $country = $_POST['country'];
                $state = $_POST['state'];
                $postCode = $_POST['postCode'];
                $payment = $_POST['payment'];

                // Set date and time
                date_default_timezone_set('Australia/Sydney');
                $date = date("d-M-Y");
                $time = date("H:i A, D,");

                // Loop over the cart items if the cart is set and is an array
                if (isset($_SESSION['reservationCart']) && is_array($_SESSION['reservationCart'])) {
                    echo "<p class='text-center'>Thank you for choosing Hertz-UTS!</p>
                    <h2>Customer's Details:</h2>
                    <p><span class='fw-bold'>Name: </span>" . $name . "</p>
                    <p><span class='fw-bold'>Email: </span> " . $email . "</p>
                    <p><span class='fw-bold'>Address Line 1: </span> " . $address1 .  "</p>
                    <p><span class='fw-bold'>Address Line 2: </span> " . $address2 .  "</p>
                    <p><span class='fw-bold'>Suburb: </span> " . $suburb . "</p>
                    <p><span class='fw-bold'>Country: </span> " . $country . "</p>
                    <p><span class='fw-bold'>State: </span> " . $state . "</p>
                    <p><span class='fw-bold'>Post Code: </span> " . $postCode . "</p>
                    <p><span class='fw-bold'>Payment Type: </span> " . $payment .  "</p>
                    <h2>Your rental details are below:</h2>
                    <table class='confirmationTable'>
                        <tr>
                            <th class='cell'>Image</th>
                            <th class='cell'>Vehicle</th>
                            <th class='cell'>Price Per Day</th>
                            <th class='cell'>Rental Days</th>
                        </tr>";
                    foreach ($_SESSION['reservationCart'] as $item) {
                        $totalCost += $item['subTotal'];
                        echo "<tr>
                                <td class='cell'><img src='../images/" . $item['model'] . ".jpg' alt='" . $item['brand'] . " " . $item['model'] . "' class='img-fluid img-thumbnail table-img'></td>
                                <td class='cell'>" . $item['model_year'] . " " . $item['brand'] . " " . $item['model'] . "</td>
                                <td class='cell'>$" . $item['price_per_day'] . "</td>
                                <td class='cell'>" . $item['rentalDays'] . "</td>
                            </tr>";
                    }
                    echo "<tr>
                            <td colspan='5' class='total'><span class='fw-bold'>Total Cost: </span>$" . $totalCost . "</td>
                        </tr>
                    </table>
                    <br>
                    <p>Thank you for choosing Hertz-UTS!</p>
                    <p>Please finalise your payment to process the order further.</p>
                    <p>Order Time: " . $time . " " . $date . "</p>";
                    unset($_SESSION['reservationCart']);
                    session_unset();
                    session_destroy();
                    // Test to see if the session cart is destroy after unset
                    if (isset($_SESSION['reservationCart'])) print_r($_SESSION['reservationCart']);
                }
                ?>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>