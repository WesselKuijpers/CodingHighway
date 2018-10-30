<?php

use App\Models\general\License;
use Faker\Provider\Uuid as UuidGenerator;

class LicenseKeyHelper
{
  public static function UserKey()
  {
    $license = new License;
    $uuid = UuidGenerator::uuid();
    $looping = true;

    while ($looping):
      if (License::where('key', $uuid)->count() == 0):
        $license->key = $uuid;
        $license->expires_at = \Carbon\Carbon::now()->addYear();
        $license->expired = false;
        if ($license->save()):
          $looping = false;
          return $license;
        endif;
      else:
        $uuid = UuidGenerator::uuid();
      endif;
    endwhile;

    return false;
  }

  public static function OrganisationKey($amount, $organisationId)
  {
    for ($i = 0; $i < $amount; $i++):
      $license = new License;
      $uuid = UuidGenerator::uuid();
      $looping = true;

      while ($looping):
        if (License::where('key', $uuid)->count() == 0):
          $license->key = $uuid;
          $license->expires_at = \Carbon\Carbon::now()->addYear();
          $license->organisation_id = $organisationId;
          $license->expired = false;
          if ($license->save()):
            $looping = false;
          endif;
        else:
          $uuid = UuidGenerator::uuid();
        endif;
      endwhile;
    endfor;
    return "Done";
  }
}
