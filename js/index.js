
// Define a function takes one parameter an object and returns the object with the new property added
const addToReservation = (car) => {
    if (!car.availability) {
        // console.log(car.availability);
        customAlert("Sorry, the car is not available now. Please try other cars", "unavailable");
    }
    else {
        reserve(car);
    }
}

const customAlert = (t, a) => {
    var warning = document.querySelector("#alert");

    switch (a) {
        case "unavailable":
            warning.classList.remove("alert-success", "alert-info");
            warning.classList.add("active-availability-alert", "alert-danger");
            break;
        case "add":
            warning.classList.remove("alert-danger", "alert-info");
            warning.classList.add("active-availability-alert", "alert-success");
            break;
        case "exist":
            warning.classList.remove("alert-danger", "alert-success");
            warning.classList.add("active-availability-alert", "alert-info");
            break;
        default:
            break;
    }

    warning.innerHTML = t;

    // var closeBtn = document.createElement("button");
    // closeBtn.type = "button";
    // closeBtn.className = "btn-close";
    // closeBtn.ariaLabel = "Close";
    // closeBtn.onclick = () => closeAlert();

    // warning.appendChild(closeBtn);

    clearTimeout(closeAlert);
    setTimeout(closeAlert, 4000);
}

const closeAlert = () => {
    var warning = document.querySelector("#alert");
    warning.classList.remove("active-availability-alert", "alert-danger", "alert-success", "alert-info");
}

const reserve = (car) => {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText == "-1") {
                customAlert("You have successfully add the car to your reservation cart", "add");
            }
            else {
                customAlert("This car has already added to your reservation cart", "exist");
            }
            // console.log(this);
        }
        // console.log(this.readyState + " " + this.status);
    }
    xhttp.open("POST", "php/updateReservationCart.php", true);
    // Set request header content-type to json encoded utf-8
    xhttp.setRequestHeader("Content-type", "application/json; charset=utf-8");
    xhttp.send(JSON.stringify(car));
}

let products = [];

function showCars() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var cars = JSON.parse(this.responseText);
            products = cars.products;

            for (const product of products) {
                // var product = products[i];

                var card = document.createElement("div");
                card.className = "card mb-5";
                card.style.width = "18rem";

                var img = document.createElement("img");
                img.className = "card-img-top";
                img.src = "./images/" + product.model + ".jpg";
                img.alt = product.brand + " " + product.model;

                var cardBody = document.createElement("div");
                cardBody.className = "card-body car-info";

                var cardTitle = document.createElement("h5");
                cardTitle.className = "card-title";
                cardTitle.innerHTML = product.brand + " " + product.model;

                var mileage = document.createElement("p");
                mileage.className = "card-text";
                mileage.innerHTML = "<b>Mileage: </b>" + product.mileage;

                var fuelType = document.createElement("p");
                fuelType.className = "card-text";
                fuelType.innerHTML = "<b>Fuel type: </b>" + product.fuel_type;

                var seats = document.createElement("p");
                seats.className = "card-text";
                seats.innerHTML = "<b>Seats: </b>" + product.seats;

                var pricePerDay = document.createElement("p");
                pricePerDay.className = "card-text";
                pricePerDay.innerHTML = "<b>Price per day: </b>" + product.price_per_day;

                var availability = document.createElement("p");
                availability.className = "card-text";
                availability.innerHTML = product.availability ? "<b>Availability: </b> Yes" : "<b>Availability: </b> No";

                var description = document.createElement("p");
                description.className = "card-text";
                description.innerHTML = "<b>Description: </b>" + product.description;

                var addToCartBtn = document.createElement("input");
                addToCartBtn.type = "button";
                addToCartBtn.className = "btn btn-add-to-cart";
                addToCartBtn.style.backgroundColor = product.availability ? "" : "#CCCCCC";
                addToCartBtn.name = "action";
                addToCartBtn.value = "Add to cart";
                addToCartBtn.data = product;
                addToCartBtn.onclick = function () { addToReservation(this.data); }

                cardBody.appendChild(cardTitle);
                cardBody.appendChild(mileage);
                cardBody.appendChild(fuelType);
                cardBody.appendChild(seats);
                cardBody.appendChild(pricePerDay);
                cardBody.appendChild(availability);
                cardBody.appendChild(description);
                cardBody.appendChild(addToCartBtn);

                card.appendChild(img);
                card.appendChild(cardBody);
                document.getElementById("cars").appendChild(card);
            }
        }
    };
    // xhttp.onreadystatechange = function() {
    //   if (xhttp.readyState == 4 && xhttp.status == 200) {
    //     console.log(xhttp.responseText);
    //   }
    // }
    xhttp.open("GET", "data/cars.json", true);
    xhttp.send();
}