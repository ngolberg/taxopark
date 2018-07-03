<?php

/**
 * Class Driver
 */
class Driver {
  protected $performance = 10;
  protected $consumption_k = 1;
  protected $id;

  /**
   * Driver constructor.
   * @param $id
   */
  function __construct($id) {
    $this->id = $id;
  }

  /**
   * @return int
   */
  public function getPerformance() {

    return $this->performance;
  }

  /**
   * @return float
   */
  public function getConsumptionK() {

    return $this->consumption_k;
  }
}
