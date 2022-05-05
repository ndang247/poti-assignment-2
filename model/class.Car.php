<?php
class Car
{
    // Let attributes be public for now
    public $id;
    public $category;
    public $availability;
    public $brand;
    public $model;
    public $model_year;
    public $mileage;
    public $fuel_type;
    public $seats;
    public $price_per_day;
    public $description;

    public function __construct($id, $category, $availability, $brand, $model, $model_year, $mileage, $fuel_type, $seats, $price_per_day, $description)
    {
        $this->id = $id;
        $this->category = $category;
        $this->availability = $availability;
        $this->brand = $brand;
        $this->model = $model;
        $this->model_year = $model_year;
        $this->mileage = $mileage;
        $this->fuel_type = $fuel_type;
        $this->seats = $seats;
        $this->price_per_day = $price_per_day;
        $this->description = $description;
    }

    // Return this instance of the class with all of its attributes
    // public function getCar()
    // {
    //     return get_object_vars($this);
    // }
}
