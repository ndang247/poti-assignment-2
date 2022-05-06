<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/c818109c96.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/checkout.css">
    <title>Checkout</title>
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

    <main class="flex-shrink-0">
        <div class="container pt-5 pb-5">
            <div class="pt-5 pb-2">
                <h1 class="text-center">Checkout</h1>
            </div>
            <div>
                <h3>Customer Details and Payment</h3>
                <p>Please fill in your details. <span style="color:red">*</span> indicates required field.</p>
            </div>
            <div>
                <form id="checkoutForm" method="POST" action="confirmation.php" class="needs-validation" onsubmit="return isValidate(event)" novalidate>
                    <div id="checkout" class="row g-3">
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label d-flex align-items-center">
                                <i class="fa-solid fa-user"></i>&nbsp;First Name <span style="color:red">*</span>
                            </label>
                            <input type="text" class="form-control" name="firstName" placeholder="First Name" value="" required>
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="lastName" class="form-label d-flex align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                </svg>&nbsp;Last Name <span style="color:red">*</span>
                            </label>
                            <input type="text" class="form-control" name="lastName" placeholder="Last Name" value="" required>
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="email" class="form-label d-flex align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                                </svg>&nbsp;Email <span style="color:red">*</span>
                            </label>
                            <input type="email" class="form-control" name="email" placeholder="you@example.com" required>
                            <div class="invalid-feedback">
                                Please enter a valid email address for updates.
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="address" class="form-label d-flex align-items-center">
                                <i class="fa-solid fa-address-card"></i>&nbsp;Address Line 1<span style="color:red">*</span>
                            </label>
                            <input type="text" class="form-control" name="address1" placeholder="1234 Main St" required>
                            <div class="invalid-feedback">
                                Please enter your address.
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="address" class="form-label d-flex align-items-center">
                                <i class="fa-solid fa-address-card"></i>&nbsp;Address Line 2
                            </label>
                            <input type="text" class="form-control" name="address2" placeholder="Address Line 2">
                            <!-- <div class="invalid-feedback">
                                Please enter your address.
                            </div> -->
                        </div>
                        <div class="col-12">
                            <label for="suburb" class="form-label d-flex align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                    <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                                    <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                </svg>&nbsp;City <span style="color:red">*</span>
                            </label>
                            <input type="text" class="form-control" name="city" placeholder="Sydney" required>
                            <div class="invalid-feedback">
                                Please enter your city.
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="country" class="form-label d-flex align-items-center">
                                <i class="fa-solid fa-earth-oceania"></i>&nbsp;Country <span style="color:red">*</span>
                            </label>
                            <select class="form-select" name="country" required>
                                <option value="">Choose...</option>
                                <option>Australia</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid country.
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="state" class="form-label d-flex align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-star" viewBox="0 0 16 16">
                                    <path d="M7.84 4.1a.178.178 0 0 1 .32 0l.634 1.285a.178.178 0 0 0 .134.098l1.42.206c.145.021.204.2.098.303L9.42 6.993a.178.178 0 0 0-.051.158l.242 1.414a.178.178 0 0 1-.258.187l-1.27-.668a.178.178 0 0 0-.165 0l-1.27.668a.178.178 0 0 1-.257-.187l.242-1.414a.178.178 0 0 0-.05-.158l-1.03-1.001a.178.178 0 0 1 .098-.303l1.42-.206a.178.178 0 0 0 .134-.098L7.84 4.1z" />
                                    <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z" />
                                </svg>&nbsp;State <span style="color:red">*</span>
                            </label>
                            <select class="form-select" name="state" required>
                                <option value="">Choose...</option>
                                <option>New South Wales</option>
                                <option>Victoria</option>
                                <option>Queensland</option>
                                <option>South Australia</option>
                                <option>Western Australia</option>
                                <option>Northern Territory</option>
                                <option>Tasmania</option>
                            </select>
                            <div class="invalid-feedback">
                                Please provide a valid state.
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="zip" class="form-label d-flex align-items-center">
                                <i class="fa-solid fa-signs-post"></i>&nbsp;Post Code <span style="color:red">*</span>
                            </label>
                            <input type="text" class="form-control" name="postCode" placeholder="2194" required>
                            <div class="invalid-feedback">
                                Post Code is required.
                            </div>
                        </div>
                        <div class="12">
                            <label for="state" class="form-label d-flex align-items-center">
                                <i class="fa-solid fa-credit-card"></i>&nbsp;Payment <span style="color:red">*</span>
                            </label>
                            <select class="form-select" name="payment" required>
                                <option value="">Choose...</option>
                                <option>Visa</option>
                                <option>Mastercard</option>
                                <option>Debit</option>
                                <option>Paypal</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a payment.
                            </div>
                        </div>
                    </div>
                    <hr class="my-5">
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <input id="purchaseBtn" class="w-100 btn btn-primary btn-continue" type="submit" value="Continue">
                        <button id="loadingBtn" class="w-100 btn btn-loading" type="button" disabled hidden>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Loading...
                        </button>
                    </div>
                </form>
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
    <script src="../js/checkoutValidation.js"></script>
</body>

</html>