const cartValidation = () => {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText == "0") {
                alert("No car has been reserved.");
                // Redirect to home page if no car has been reserved.
                window.location.href = "../index.php";
            }
        }
    }
    xhttp.open("POST", "../php/checkReservationCart.php", true);
    // Set request header content-type to json encoded utf-8
    xhttp.setRequestHeader("Content-type", "application/json; charset=utf-8");
    xhttp.send();

    let rentalDays = document.querySelectorAll("#numRentalDays");
    // console.log(rentalDays);
    let carIds = document.querySelectorAll("#carId");
    // console.log(carIds);

    for (const rentDay of rentalDays) {
        // Check for decimal, string input, negative numbers and the number of days in a month
        const day = parseFloat(rentDay.value);
        // console.log(day);
        if (isNaN(day) || day % 1 !== 0 || day < 1 || day > 31) {
            alert("Please enter a valid day");
            return false;
        }
    }
    updateCart(carIds, rentalDays);
    return true;
}

const updateCart = (cardIds, rentalDays) => {
    for (let i = 0; i < cardIds.length; i++) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
            }
        }
        xhttp.open("POST", "../php/updateReservationCart.php", true);
        // Set request header content-type to json encoded utf-8
        xhttp.setRequestHeader("Content-type", "application/json; charset=utf-8");
        xhttp.send(JSON.stringify({ id: cardIds[i].value, days: rentalDays[i].value }));
    }
}