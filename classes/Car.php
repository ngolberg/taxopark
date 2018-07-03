<?php

/**
 * Base class for all types of cars.
 */
abstract class Car {
  /**
   * Consumption is measured in liter per 1 km.
   */
  protected $consumption = 0.1;
  protected $mileage = 0;
  protected $id;

  /**
   * Car constructor.
   * @param int $id
   * @param int $mileage
   */
  function __construct($id, $mileage) {
    $this->id = $id;
    $this->mileage = $mileage;
  }

  /**
   * @param int $mileage
   */
  public function increaseMileage($mileage) {
    if ($mileage > 0) {
      $this->mileage += $mileage;
    }
  }

  /**
   * @return int
   */
  public function getBreakageProbability() {
    $percent = $this->calculateBreakageProbability();

    return ($percent > 100) ? 100 : $percent;
  }

  /**
   * @return float
   */
  protected function calculateBreakageProbability() {

    return 0.5 + $this->mileage/1000;
  }

  /**
   * @return float
   */
  public function getConsumption() {

    return $this->consumption;
  }

  /**
   * @return int
   */
  public function getId() {

    return $this->id;
  }

  /**
   * @return int
   */
  public function getMileage() {

    return $this->mileage;
  }
}
