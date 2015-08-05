<?php
require_once __DIR__."/../vendor/autoload.php";
require_once __DIR__."/../src/Place.php";

session_start();
if (empty($_SESSION['list_of_cities'])) {
  $_SESSION['list_of_cities'] = array();
}

$app = new Silex\Application();

$app->get("/", function() {

  $output = "";

  foreach (Place::getAll as $city) {
    $output = $output . "<p>" . $city->getCityName() . "</p>";
  }

  return $output;
});

return $app;
?>
