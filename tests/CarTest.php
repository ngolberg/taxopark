<?php

declare(strict_types = 1);

spl_autoload_register(function ($class_name) {
  include_once '../classes/' . $class_name . '.php';
});

use PHPUnit\Framework\TestCase;

/**
 * Class CarTest
 */
final class CarTest extends TestCase {
  public function testLubaConsumption() {
    $luba = new Luba(1, 10000);
    $consumption =  $luba->getConsumption();
    $this->assertEquals(0.1, $consumption, 'wrong Luba\'s consumption.');
  }

  public function testLubaBreakageProbability() {
    $luba = new Luba(1, 10000);
    $probability =  $luba->getBreakageProbability();
    $this->assertEquals(31.5, $probability, 'wrong Luba\'s probability.');
  }

  public function testHombaConsumption() {
    $homba = new Homba(1, 10000);
    $consumption =  $homba->getConsumption();
    $this->assertEquals(0.07, $consumption, 'wrong Homba\'s consumption.');
  }

  public function testHombaBreakageProbability() {
    $homba = new Homba(1, 10000);
    $probability =  $homba->getBreakageProbability();
    $this->assertEquals(10.5, $probability, 'wrong Homba\'s probability.');
  }

  public function testHendaiConsumption() {
    $hendai = new Hendai(1, 10000);
    $consumption =  $hendai->getConsumption();
    $this->assertEquals(0.1, $consumption, 'wrong Hendai\'s consumption.');
  }

  public function testHendaiBreakageProbability() {
    $hendai = new Hendai(1, 10000);
    $probability =  $hendai->getBreakageProbability();
    $this->assertEquals(10.5, $probability, 'wrong Hendai\'s probability.');
  }
}
