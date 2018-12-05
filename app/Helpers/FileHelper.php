<?php

use Illuminate\Http\UploadedFile;

class FileHelper
{
  /**
   * Handling of the File uploaded
   * if isValid stores it in /storage/media
   *
   * @param UploadedFile $file
   * @return bool|UploadedFile
   */
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