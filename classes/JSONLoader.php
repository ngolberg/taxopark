<?php

/**
 * Class JSONLoader
 */
class JSONLoader implements ILoader {
  private $filename;

  /**
   * @return TaxoPark
   */
  public function load() {
    $json = file_get_contents($this->filename);
    $data = json_decode($json);
    $cars = [];
    $drivers = [];
    foreach ($data->cars as $key => $car) {
      $cars[] = new $car->brand($key, $car->km);
    }
    foreach ($data->drivers as $key => $driver) {
      switch ($driver->type) {
        case 'default':
          $drivers[] = new Driver($key);

          break;
        case 'pro':
          $drivers[] = new Profi($key);

          break;
      }
    }

    return new TaxoPark($data->park->places, $cars, $drivers);
  }

  /**
   * JSONLoader constructor.
   * @param $filename
   */
  public function __construct($filename) {
    $this->filename = $filename;
  }
}
