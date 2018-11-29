<?php

use Illuminate\Database\Seeder;

class PermissionsAndRoleSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $this->call(RoleSeeder::class);
    $this->call(PermissionSeeder::class);

    $rpl = new RolePermissionsLoader();
    $rpl->User();
    $rpl->Teacher();
    $rpl->Admin();
    $rpl->SystemAdmin();
  }
}
