<?php

/*
 * Class TaxoParkSimulator simulates the routine of the texopark.
 */
class TaxoParkSimulator {
  private static $instance = null;
  private const AVERAGE_DISTANCE = 7;
  private const REPAIR_DAYS = 3;
  private $taxopark;

  /**
   * @return null|TaxoParkSimulator
   */
  public static function getInstance() {
    if (null === self::$instance)  {
      self::$instance = new self();
    }

    return self::$instance;
  }

  private function __clone() {}

  private function __construct() {}

  /**
   * @param ILoader $loader
   */
  public function createTaxopark(ILoader $loader) {
    $this->taxopark = $loader->load();
  }

  /**
   * @param WorkingDay $workingDay
   */
  private function simulateWorkingDayRoutine() {
    $workingDay = $this->taxopark->getCurrentDay();
    $units = $workingDay->getWorkingUnits();
    foreach ($units as $workingUnit) {
      $probability = $workingUnit->getCar()->getBreakageProbability();
      $tripsPerDay = $workingUnit->getDriver()->getPerformance();
      if (rand(0, 1000) / 10 <= $probability) {
        $breakingTrip = rand(1, $tripsPerDay);

        $tripsPerDay = $breakingTrip - 1;
        $this->taxopark->registerBreakage($workingUnit, self::REPAIR_DAYS);
      }
      for ($i = 0; $i < $tripsPerDay; $i++) {
        $workingUnit->addTrip(self::AVERAGE_DISTANCE);
      }
    }

    $brokenUnits = $workingDay->getBrokenCars();
    foreach ($brokenUnits as $brokenCar) {
      $brokenCar->repair();
    }
  }

  /**
   * @param int $days
   */
  public function simulateWork($days) {
    for ($i = 0; $i < $days; $i++) {
      $this->taxopark->startWorkingDay();
      $this->simulateWorkingDayRoutine();
    }
  }

  /**
   * @return Taxopark $taxopark
   */
  public function getTaxopark() {

    return $this->taxopark;
  }
}
