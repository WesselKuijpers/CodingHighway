<?php

use App\Models\general\License;
use App\Models\general\Organisation;
use App\Models\general\UserOrganisation;
use App\User;
use Illuminate\Database\Seeder;

class UserOrganisationLicensesSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $user = User::find(1);
    $organisation = Organisation::inRandomOrder()->first();
    $license = License::inRandomOrder()->first();

    $userOrgan = new UserOrganisation;
    $userOrgan->user_id = $user->id;
    $userOrgan->organisation_id = $organisation->id;
    $userOrgan->save();

    $license->user_id = $user->id;
    $license->organisation_id = $organisation->id;
    $license->save();

    $licenses = License::where('user_id', null)->get();
    foreach ($licenses as $l):
      $l->organisation_id = Organisation::inRandomOrder()->first()->id;
      $l->save();
    endforeach;
  }
}
