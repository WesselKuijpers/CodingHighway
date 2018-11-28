<?php

class OrganisationStyleHelper
{
  public static function load($color)

  {
    $color = str_replace("#", "", $color);
    $color = str_split($color, 2);

    $r = hexdec($color[0]);
    $g = hexdec($color[1]);
    $b = hexdec($color[2]);

//    $styles .= "background: " . "rgb($r, -$g, $b); \n";
//    $styles .= "--r: calc($r * 0.2126); \n";
//    $styles .= "--g: calc($g * 0.7152); \n";
//    $styles .= "--b: calc($b * 0.0722); \n";
//    $styles .= "--sum: calc(var(--r) + var(--g) + var(--b)); \n";
//    $styles .= "--perceived-lightness: calc(var(--sum) / 255); \n";
//    $styles .= "color: hsl(0, 0%, calc((var(--perceived-lightness) - var(--threshold)) * -10000000%)); \n";
    return '
.btn-organisation, .btn-organisation:hover{
      background: rgb(' . $r . ',' . $g . ',' . $b . ') !important;
      --r: calc(' . $r . ' * 0.2126);
      --g: calc(' . $g . ' * 0.7152);
      --b: calc(' . $b . ' * 0.0722);
      --sum: calc(var(--r) + var(--g) + var(--b));
      --perceived-lightness: calc(var(--sum) / 255);
      color: hsl(0, 0%, calc((var(--perceived-lightness) - var(--threshold)) * -10000000%)) !important;
      border-color: rgba(calc(' . $r . ' - 50), calc(' . $g . ' - 50), calc(' . $b . ' - 50), var(--border-alpha)) !important;
      --border-alpha: calc((var(--perceived-lightness) - var(--border-threshold)) * 100) !important;
}
.nav-organisation
{
background: rgb(' . $r . ', ' . $g . ', ' . $b . ');
--r: calc(' . $r . ' * 0.2126); 
--g: calc(' . $g . ' * 0.7152); 
--b: calc(' . $b . ' * 0.0722); 
--sum: calc(var(--r) + var(--g) + var(--b)); 
}

.organisation-link {
--r: calc(' . $r . ' * 0.2126); 
--g: calc(' . $g . ' * 0.7152); 
--b: calc(' . $b . ' * 0.0722); 
--sum: calc(var(--r) + var(--g) + var(--b));
--perceived-lightness: calc(var(--sum) / 255); 
color: hsl(0, 0%, calc((var(--perceived-lightness) - var(--threshold)) * -10000000%)) !important; 
}
.
nav - link{
  color:
  ' . $color[0] . ' !important;
    }
    .organisation - text{
  color:
  ' . $color[0] . ' !important;
    }
    ';
  }
}
