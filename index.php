<?php
include("model/class.Car.php");

$bmw = new Car("1", "Sedan", true, "BMW", "320i", "2019", "4328", "Petrol", "5", "260", "xxxxx");
$camry = new Car("2", "Sedan", true, "Toyota", "Camry", "2018", "14630", "Petrol", "5", "150", "xxxxx");
$captiva = new Car("3", "Wagon", false, "Holden", "Captiva", "2018", "6510", "Petrol", "7", "200", "xxxxx");
$cherokee = new Car("4", "Suv", true, "Jeep", "Cherokee", "2018", "4398", "Petrol", "7", "230", "xxxxx");
$civic = new Car("5", "Sedan", true, "Honda", "Civic", "2017", "21240", "Petrol", "5", "180", "xxxxx");
$glc = new Car("6", "Suv", true, "Mercedes", "GLC", "2016", "42656", "Petrol", "5", "280", "xxxxx");
$golf = new Car("7", "Sedan", true, "Volkswagen", "Golf", "2015", "23311", "Petrol", "5", "210", "xxxxx");
$jimny = new Car("8", "Wagon", false, "Suzuki", "Jimny", "2019", "3728", "Diesel", "5", "140", "xxxxx");
$sonata = new Car("9", "Sedan", true, "Hyundai", "Sonata", "2013", "82722", "Petrol", "5", "120", "xxxxx");
$xTrail = new Car("10", "Suv", false, "Nissan", "X-trail", "2016", "32472", "Petrol", "7", "170", "xxxxx");

$cars = array(
  "status" => "OK",
  "products" => array(
    $bmw,
    $camry,
    $captiva,
    $cherokee,
    $civic,
    $glc,
    $golf,
    $jimny,
    $sonata,
    $xTrail
  )
);

file_put_contents("data/cars.json", json_encode($cars, JSON_PRETTY_PRINT));
?>

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <link rel="stylesheet" href="css/index.css">
  <title>Hertz-UTS</title>
</head>

<body onload="showCars();" class="d-flex flex-column h-100">

  <nav class="navbar navbar-expand-lg navbar-light sticky" style="background-color: #e3f2fd">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Hertz-UTS</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <form method="POST" action="php/reservation.php" target="_blank">
              <input type="submit" class="btn btn-reservation" name="action" value="Car Reservation">
            </form>
            <!-- <a class="nav-link" href="#">Car Reservation</a> -->
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main class="flex-shrink-0">
    <div class="container pt-5">
      <div class="pt-5 pb-5 d-flex justify-content-around flex-wrap" id="cars">
        <!-- <div class="card mb-5" style="width: 18rem">
            <img src="./images/320i.jpg" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">
                <b>Example: </b>
                Some quick example text to build on the card title and make up the
                bulk of the card's content.
              </p>
              <p class="card-text">
                Some quick example text to build on the card title and make up the
                bulk of the card's content.
              </p>
              <input class="btn btn-primary" name="action" value="Add to cart">
            </div>
          </div>
        </div> -->
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

  <!-- Availability alert -->
  <div class="alert fade show availability-alert mb-0" role="alert" id="alert">
    <!-- <button type="button" class="btn-close" aria-label="Close" onclick="closeAlert()"></button> -->
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="js/index.js"></script>

</body>

</html>