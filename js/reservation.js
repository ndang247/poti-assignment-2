const deleteCar = (id) => {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText === "Deleted") {
                // After delete the car, reload the page
                location.reload();
            }
            // console.log(this);
        }
        // console.log(this.readyState + " " + this.status);
    }
    xhttp.open("POST", "../php/updateReservationCart.php", true);
    // Set request header content-type to json encoded utf-8
    xhttp.setRequestHeader("Content-type", "application/json; charset=utf-8");
    xhttp.send(id);
    // console.log(id);
}