<?php

use App\Models\general\License;
use App\Models\general\Organisation;
use App\Models\general\UserOrganisations;
use App\User;
use Illuminate\Database\Seeder;

class UserLicensesSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
//    $users = User::all();
//
//    foreach($users as $user):
//      $license = License::where('user_id', null)->first();
//      $license->user_id = $user->id;
//      $license->save();
//    endforeach;
//
//    $licenses = License::all();
//    foreach ($licenses as $l):
//      $l->organisation_id = Organisation::inRandomOrder()->first()->id;
//      $l->save();
//    endforeach;
  }
}
