<?php

class OrganisationStyleHelper
{
  public static function load($color, $fontcolor)
  {
    return '
    .btn-organisation, .btn-organisation:hover{
      color: ' . $fontcolor . ';
      background-color: ' . $color . ';
      border: 1px solid '.$color.';
    }
    .nav-organisation{
      background-color: ' . $color . ';
    }
    .nav-link{
      color: '.$fontcolor.';
    }
    .organisation-text{
      color: '.$fontcolor.';
    }
    ';
  }
}
