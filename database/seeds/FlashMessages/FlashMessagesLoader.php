<?php
/**
 * Created by PhpStorm.
 * User: matthijsdevos
 * Date: 25-10-18
 * Time: 09:27
 */

class FlashMessagesLoader
{
  public static function LicenseMessage()
  {
    return [
      'license.active' => 'Deze licentie is al geactiveerd',
      'license.invalid' => 'Deze licentie is niet geldig',
      'license.activated' => 'Licentie is geactiveerd',
      'license.expired' => 'Deze licentie is verlopen',
      'license.error' => 'Er ging iets fout tijdens het activeren'
    ];
  }

  public static function UserMessage()
  {
    return [
      'user.error' => 'Er ging iets fout tijdens het wijzigen van je gegevens',
      'user.invalid' => 'Je mag niet iemand anders zijn gegevens aanpassen',
      'user.edit' => 'Wijzigingen succesvol opgeslagen'
    ];
  }
}