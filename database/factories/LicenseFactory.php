<?php

use Faker\Generator as Faker;
use App\Models\general\License;

$factory->define(License::class, function (Faker $faker) {
  return [
    'key' => $faker->uuid,
    'expires_at' => '2020-12-31 23:59:59',
    'expires' => false
  ];
});
