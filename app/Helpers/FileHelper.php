<?php

use Illuminate\Http\UploadedFile;

class FileHelper
{
  public static function store(UploadedFile $file)
  {
    if ($file->isValid()):
      if ($file->store('public/media')):
        return $file;
      else:
        return false;
      endif;
    endif;

  }
}