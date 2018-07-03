<?php

spl_autoload_register(function ($class_name) {
  include_once 'classes/' . $class_name . '.php';
});

$simulator = TaxoParkSimulator::getInstance();
$simulator->createTaxopark(new JSONLoader('data.json'));
$simulator->simulateWork(20);
$statistic = $simulator->getTaxopark()->getStatistics();

/**
 * display the result
 */
echo '<pre>';
print_r($statistic);
echo '</pre>';
