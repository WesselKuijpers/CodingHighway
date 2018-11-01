<?php

class OrganisationStyleHelper
{
  public static function load($color, $fontcolor)
  {
    return '
    .btn-organisation, .btn-organisation:hover{
      color: ' . $fontcolor . ' !important;
      background-color: ' . $color . ' !important;
      border: 1px solid '.$color.' !important;
    }
    .nav-organisation{
      background-color: ' . $color . ' !important;
    }
    .nav-link{
      color: '.$fontcolor.' !important;
    }
    .organisation-text{
      color: '.$fontcolor.' !important;
    }
    ';
  }
}
