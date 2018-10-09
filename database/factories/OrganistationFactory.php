<?php

use Faker\Generator as Faker;
use App\Models\general\Organisation;

$factory->define(Organisation::class, function (Faker $faker) {
  return [
    'name' => $faker->company,
    'street' => $faker->streetName,
    'housenumber' => $faker->buildingNumber,
    'zipcode' => $faker->postcode,
    'city' => $faker->city,
    'email' => $faker->companyEmail,
    'paper_invoice' => $faker->boolean,
    'color' => $faker->hexColor,
    'fontcolor' => $faker->hexcolor,
    'link' => $faker->url
  ];
});
