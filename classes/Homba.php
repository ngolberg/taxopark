<?php

/**
 * Class Homba
 */
class Homba extends Car {
  /**
   * @return float
   */
  public function getConsumption() {
    return $this->consumption * 0.7;
  }
}
