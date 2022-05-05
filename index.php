<?php
include("model/class.Car.php");

$bmw = new Car("1", "sedan", true, "BMW", "320i", "2019", "4398", "Petrol", "5", "260", "");
$camry = new Car("2", "sedan", true, "Toyota", "Camry", "2018", "18930", "Petrol", "5", "150", "");
$captiva = new Car("3", "wagon", false, "Nissan", "Captiva", "2018", "6230", "Petrol", "7", "200", "");
$cherokee = new Car("4", "suv", true, "Jeep", "Cherokee", "2018", "6481", "Petrol", "7", "230", "");
$civic = new Car("5", "sedan", true, "Honda", "Civic", "2017", "20130", "Petrol", "5", "180", "");
$glc = new Car("6", "suv", true, "Mercedes", "GLC", "2016", "40436", "Petrol", "5", "280", "");
$golf = new Car("7", "sedan", true, "Volkswagen", "Golf", "2015", "25321", "Petrol", "5", "210", "");
$jimny = new Car("8", "wagon", false, "Suzuki", "Jimny", "2019", "2001", "Diesel", "5", "140", "");
$sonata = new Car("9", "sedan", true, "Hyundai", "Sonata", "2013", "77892", "Petrol", "5", "120", "");
$xTrail = new Car("10", "suv", false, "Nissan", "X-Trail", "2016", "27675", "Petrol", "7", "170", "");

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
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <link rel="stylesheet" href="css/index.css">
  <title>Hertz-UTS</title>
</head>

<body onload="showCars();">
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

  <main>
    <div class="container pt-5">
      <div class="pt-5 p-2 d-flex justify-content-around flex-wrap" id="cars">
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

  <footer class="py-3 mt-4" style="background-color: #e3f2fd">
    <ul class="nav justify-content-center">
      <li class="nav-item"><a href="index.php" class="nav-link px-2 text-muted">Home</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Our cars</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Our service</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About us</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Policy</a></li>
    </ul>
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
      <li class="nav-item"><a href="index.php" class="nav-link px-2 text-muted"><b>Contact us: </b></a></li>
      <li class="nav-item"><a href="index.php" class="nav-link px-2 text-muted">Phone: 04xx xxx xxx</a></li>
      <li class="nav-item"><a href="index.php" class="nav-link px-2 text-muted">Email: info@hertzuts.com</a></li>
    </ul>
    <p class="text-center text-muted">&copy; <script>
        document.write(new Date().getFullYear())
      </script> Hertz-UTS, Inc</p>
  </footer>

  <!-- Availability alert -->
  <div class="alert alert-dismissible fade show availability-alert mb-0" role="alert" id="alert">
    <button type="button" class="btn-close" aria-label="Close" onclick="closeAlert()"></button>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="js/index.js"></script>
</body>

</html>