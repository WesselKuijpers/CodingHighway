<?php

use Illuminate\Database\Seeder;
use App\Models\general\Organisation;

class OrganisationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(Organisation::class, 10)->create();

      foreach (Organisation::all() as $organisation) {
        $organisation->active = 1;
        $organisation->save();
      }
    }
}
