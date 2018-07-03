<?php

/**
 * Class BrokenCar
 */
class BrokenCar {
  protected $car;
  protected $repairDays = 0;
  protected $id;

  /**
   * BrokenCar constructor.
   * @param $car
   * @param $repairDays
   */
  public function __construct($car, $repairDays) {
    $this->car = $car;
    $this->repairDays = $repairDays;
  }

  public function repair() {
    $this->repairDays--;
  }

  /**
   * @return bool
   */
  public function isStillBroken() {

    return $this->repairDays > 0;
  }
}
