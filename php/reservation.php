<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/reservation.css">
    <script src="https://kit.fontawesome.com/c818109c96.js" crossorigin="anonymous"></script>
    <title>Reservation Cart</title>
</head>

<body class="d-flex flex-column h-100">
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
                </ul>
            </div>
        </div>
    </nav>

    <main class="flex-shrink-0">
        <div class="container pt-5 pb-5">
            <div class="pt-5 pb-5">
                <h1 class="text-center">Car Reservation</h1>
                <div class="table-responsive">
                    <form id='reservationCart' method='POST' action='checkout.php' onsubmit='return cartValidation()'>
                        <?php
                        session_start();
                        // Check if the session reservation cart is set and is an array
                        if (isset($_SESSION['reservationCart']) && is_array($_SESSION['reservationCart'])) {
                            echo "
                            <table class='table table-striped'>
                                <thead>
                                    <tr>
                                        <th scope='col'>Image</th>
                                        <th scope='col'>Vechile</th>
                                        <th scope='col'>Price Per Day</th>
                                        <th scope='col'>Rental Days</th>
                                        <th scope='col'>Action</th>
                                    </tr>
                                </thead>
                                <tbody>";
                            foreach ($_SESSION['reservationCart'] as $car) {
                                echo "
                                <tr class='align-middle'>
                                    <td><img src='../images/" . $car['model'] . ".jpg' alt='" . $car['brand'] . " " . $car['model'] . "' class='img-fluid img-thumbnail table-img'></td>
                                    <td>" . $car['model_year'] . " " . $car['brand'] . " " . $car['model'] . "</td>
                                    <td>$" . $car['price_per_day'] . "</td>
                                    <td><input id='numRentalDays' type='text' class='form-control' placeholder='Rental Days' name='rentalDays' value=1 required></td>
                                    <td><input type='button' class='btn btn-danger' name='action' value='Delete' onclick='deleteCar(" . $car['id'] . ")'></td>
                                </tr>";
                                echo "<input id='carId' value=" . $car['id'] . " hidden>";
                            }
                            echo "
                                </tbody>
                            </table>";
                        } else {
                            echo "
                            <div class='pt-5 pb-5'>
                            <p class='text-center empty-cart'><i class='far fa-surprise'></i>&nbsp;Oops. Your reservation is empty</p>
                            </div>";
                        }
                        ?>
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <input type='submit' class='w-100 btn btn-primary btn-checkout' name='action' value='Checkout'>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer mt-auto footer-color">
        <div class="container py-4 mt-4">
            <ul class='nav justify-content-center'>
                <li class='nav-item'><a href='../index.php' class='nav-link px-2 text-muted'>Home</a></li>
                <li class='nav-item'><a href='#' class='nav-link px-2 text-muted'>Our cars</a></li>
                <li class='nav-item'><a href='#' class='nav-link px-2 text-muted'>Our service</a></li>
                <li class='nav-item'><a href='#' class='nav-link px-2 text-muted'>About us</a></li>
                <li class='nav-item'><a href='#' class='nav-link px-2 text-muted'>Policy</a></li>
            </ul>
            <ul class='nav justify-content-center py-3'>
                <li class='nav-item'><a href='#' class='nav-link px-2 text-muted'><b>Contact us: </b></a></li>
                <li class='nav-item'><a href='#' class='nav-link px-2 text-muted'>Phone: 04xx xxx xxx</a></li>
                <li class='nav-item'><a href='#' class='nav-link px-2 text-muted'>Email: info@hertzuts.com</a></li>
            </ul>
            <div class='d-flex justify-content-center py-4 border-top'>
                <p>© <script>
                        document.write(new Date().getFullYear())
                    </script> Hertz-UTS, Inc. All rights reserved.</p>
            </div>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="../js/reservation.js"></script>
    <script src="../js/cartValidation.js"></script>
</body>

</html>