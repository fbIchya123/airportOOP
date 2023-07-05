<?php

abstract class Plane{
    public $name;
    public $maxSpeed;
    public $status = "на земле";

    public function __construct($name, $maxSpeed){
        $this->name = $name;
        $this->maxSpeed = $maxSpeed;
    }

    public function takeoff(){
        echo $this->name . " взлетел<br>";
        $this->status = "в воздухе";
    }
    
    public function landing(){
        echo $this->name . " приземлился<br>";
        $this->status = "на земле";
    }

    public function getStatus(){
        echo $this->name . " " . $this->status . "<br>";
    }
}

class MiGG extends Plane{
    
    public function attack(){
        echo "Выстрел<br>";
    }
}

class TU_154 extends Plane{}


class Airport{
    public $airport_name;
    public $tu;
    public $migg;

    public function __construct($airport_name, Plane $plane){
        $this->airport_name = $airport_name;
        $this->tu = new TU_154("Таня", 355);
        $this->migg = $plane;
    }

    public function setPlane(){
        $this->migg->landing();
        echo $this->migg->name . " принят в аэропорту " . $this->name . "<br>";
    }

    public function flewAway(){
        $this->tu->takeoff();
        echo $this->tu->name . " вылетел из аэропорта<br>";
    }

    public function parkPlane($plane){
        echo $plane->name . " припаркован<br>";
    }

    public function readyPlane($plane){
        echo $plane->name . " готов к вылету<br>";
    }

    public function refuelPlane($plane){
        echo $plane->name . " заправлен<br>";
    }

    public function repairPlane($plane){
        echo $plane->name . " починен<br>";
    }
}



$migg = new MiGG("Вася", 415);
$migg->attack();
$migg->takeoff();
$migg->getStatus();

$sher = new Airport('Sheremetevo', $migg);
echo $sher->tu->getStatus();

$sher->setPlane();
$sher->flewAway();