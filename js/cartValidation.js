const cartValidation = () => {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText === "Empty") {
                console.log(this.responseText);
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

    // let rentalDays = document.querySelectorAll("#numRentalDays");
    // console.log(rentalDays);
    // let carIds = document.querySelectorAll("#carId");
    // console.log(carIds);

    // for (const rentDay of rentalDays) {
    //     const day = parseFloat(rentDay.value);
    //     console.log(day);
    //     Check for decimal, string input, negative numbers and the number of days in a month
    //     if (isNaN(day) || day % 1 !== 0 || day < 1 || day > 31) {
    //         alert("Please enter a valid day");
    //         return false;
    //     }
    // }
    // updateCart(carIds, rentalDays);
    // return false;
}

function rentalDaysValidation() {
    cartValidation();

    let rentalDays = document.querySelectorAll("#numRentalDays");
    // console.log(rentalDays);
    let carIds = document.querySelectorAll("#carId");
    // console.log(carIds);

    if (rentalDays.length > 0 && carIds.length > 0) {
        for (const rentDay of rentalDays) {
            // Check for decimal, string input, negative numbers and the number of days in a month
            const day = parseFloat(rentDay.value);
            // console.log(day);
            if (isNaN(day) || day % 1 !== 0 || day < 1) {
                alert("Please enter a valid day");
                return false;
            }
        }
        updateCart(carIds, rentalDays);
        return true;
    }
    else return false;
}

const updateCart = (carIds, rentalDays) => {
    for (let i = 0; i < carIds.length; i++) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
            }
        }
        xhttp.open("POST", "../php/updateReservationCart.php", true);
        // Set request header content-type to json encoded utf-8
        xhttp.setRequestHeader("Content-type", "application/json; charset=utf-8");
        xhttp.send(JSON.stringify({ id: carIds[i].value, days: rentalDays[i].value }));
    }
}