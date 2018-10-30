<?php

class OrganisationStyleHelper
{
  public static function load($color, $fontcolor)
  {
    return '
    .btn-organisation{
      color: ' . $fontcolor . ';
      background-color: ' . $color . ';
    }
    .nav-organisation{
      background-color: ' . $color . ';
    }
    .nav-link{
      color: '.$fontcolor.';
    }
    ';
  }
}
