<?php

/**
 * Class WorkingUnit
 */
class WorkingUnit {
  private $tripsCount = 0;
  private $car;
  private $driver;
  private $totalConsumption = 0;
  private $totalDistance = 0;

  /**
   * WorkingUnit constructor.
   * @param Car $car
   * @param Driver $driver
   */
  public function __construct(Car $car, Driver $driver) {
    $this->car = $car;
    $this->driver = $driver;
  }

  /**
   * @return Car
   */
  public function getCar() {

    return $this->car;
  }

  /**
   * @return Driver
   */
  public function getDriver() {

    return $this->driver;
  }

  /**
   * @param $distance
   */
  public function addTrip($distance) {
    if ($distance > 0) {
      $this->tripsCount++;
      $this->getCar()->increaseMileage($distance);
      $this->totalConsumption += $this->getCar()->getConsumption() * $this->getDriver()->getConsumptionK() * $distance;
      $this->totalDistance += $distance;
    }
  }

  /**
   * @return int
   */
  public function getTotalConsumption() {

    return $this->totalConsumption;
  }

  /**
   * @return int
   */
  public function getTotalDistance() {

    return $this->totalDistance;
  }

  /**
   * @return int
   */
  public function getTripsCount() {

    return $this->tripsCount;
  }
}
