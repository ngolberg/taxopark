<?php

/**
 * Class Profi
 */
class Profi extends Driver {
  /**
   * @return float
   */
  public function getPerformance() {

    return parent::getPerformance() * 1.3;
  }

  /**
   * @return float
   */
  public function getConsumptionK() {

    return parent::getConsumptionK() * 0.8;
  }
}
