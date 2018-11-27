<?php

class OrganisationStyleHelper
{
  public static function load($color, $fontcolor)

  {
    $color = str_replace("#", "", $color);
    $color = str_split($color, 2);

    $r = hexdec($color[0]);
    $g = hexdec($color[1]);
    $b = hexdec($color[2]);
    return '
    .btn-organisation, .btn-organisation:hover{
      color: hsl(0, 0%, calc((var(--perceived-lightness) - var(--threshold)) * -10000000%)) !important;
      background: rgb(' . $r . $g . $b . ');
      border: 1px solid ' . $r . $g . $b . ' !important;
    }
    .nav-organisation{
      background: rgb(' . $r . $g . $b . ');
    }
    .nav-link{
      color: ' . $fontcolor . ' !important;
    }
    .organisation-text{
      color: ' . $fontcolor . ' !important;
    }
    ';
  }
}
