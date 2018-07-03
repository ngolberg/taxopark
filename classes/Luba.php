<?php

/**
 * Class Luba
 */
class Luba extends Car {
  /**
   * @return float
   */
  public function calculateBreakageProbability() {

    return parent::calculateBreakageProbability() * 3;
  }
}
