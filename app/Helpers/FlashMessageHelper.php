<?php

use App\Models\general\FlashMessage;

if (!function_exists('FlashMessageLoad')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function FlashMessageLoad($key)
    {
      $fm = FlashMessage::where('name', $key)->first();

      if ($fm != null):
        return $fm->message;
      else:
        return '';
      endif;
    }
}
