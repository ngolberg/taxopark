<?php

/**
 * Class TaxoPark
 */
class TaxoPark {
  private $placeCount;
  private $cars = [];
  private $drivers = [];
  private $workingDays;
  private $brokenCars = [];

  /**
   * TaxoPark constructor.
   * @param int $placeCount
   * @param array $cars
   * @param array $drivers
   */
  public function __construct($placeCount, $cars, $drivers) {
    $this->placeCount = $placeCount;
    $this->cars = $cars;
    $this->drivers = $drivers;
  }

  /**
   * @return WorkingDay
   */
  public function startWorkingDay() {
    $activeCars = [];

    foreach ($this->cars as $car) {
      $carId = $car->getId();
      if (isset($this->brokenCars[$carId])) {
        if (!$this->brokenCars[$carId]->isStillBroken()) {
          unset($this->brokenCars[$carId]);
          $activeCars[] = $car;
        }
      }
      else {
        $activeCars[] = $car;
      }
    }

    $wd = new WorkingDay($activeCars, $this->drivers, array_values($this->brokenCars));
    $this->workingDays[] = $wd;

    return $wd;
  }

  /**
   * @return WorkingDay
   */
  public function getCurrentDay() {

    return end($this->workingDays);
  }

  /**
   * @param $workingUnit
   * @param $repairDays
   */
  public function registerBreakage($workingUnit, $repairDays) {
    $car = $workingUnit->getCar();
    $this->brokenCars[$car->getId()] = new BrokenCar($car, $repairDays);
  }

  /**
   * @return array
   */
  public function getStatistics() {
    $result = [];

    foreach ($this->workingDays as $key => $wd) {
      $result[] = $wd->getStatistics($key);
    }

    return $result;
  }
}
