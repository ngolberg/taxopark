<?php

/**
 * Class WorkingDay
 */
class WorkingDay {
  private $workingUnits = [];
  private $brokenCars = [];

  /**
   * Assigning drivers to cars.
   *
   * @param array $cars
   * @param array $drivers
   * @param array $brokenCars
   */
  public function __construct($cars, $drivers, $brokenCars) {
    $driver_c = 0;
    $len_cars = count($cars);
    $len_drivers = count($drivers);
    for ($i = 0; $i < $len_cars; $i++) {
      if ($len_drivers > $i) {
          $this->workingUnits[] = new WorkingUnit($cars[$i], $drivers[$driver_c]);
          $driver_c++;
      }
      else {

        break;
      }
    }
    $this->brokenCars = $brokenCars;
  }

  /**
   * @return array
   */
  public function getWorkingUnits() {

    return $this->workingUnits;
  }

  /**
   * @return array
   */
  public function getBrokenCars() {

    return $this->brokenCars;
  }

  /**
   * The method displays statistics of the working day.
   *
   * @param int $key
   *
   * @return array
   */
  public function getStatistics($key) {
    $result = ['day' => ($key + 1), 'units' => [], 'summary' => []];

    foreach ($this->workingUnits as $workingUnit) {
      $car = $workingUnit->getCar();
      $result['units'][] = ['id' => $car->getId(),
        'total consumption' => $workingUnit->getTotalConsumption(),
        'driver' => get_class($workingUnit->getDriver()),
        'car' => get_class($workingUnit->getCar()),
        'number of trips' => $workingUnit->getTripsCount(),
        'distance' => $workingUnit->getTotalDistance(),
      ];
    }

    $result['summary']['broken cars'] = count($this->brokenCars);
    $result['summary']['active cars'] = count($this->workingUnits);

    return $result;
  }
}
