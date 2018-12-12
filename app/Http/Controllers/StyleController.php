<?php

namespace App\Http\Controllers;

use Modules\Course\Entities\Course;
use App\Models\general\Organisation;
use Illuminate\Support\Facades\Response;

class StyleController extends Controller
{
  public function CourseColors()
  {
    // Get the colors and loop through them
    $courses = Course::all();
    $styles = ":root { \n";

    foreach ($courses as $course) {
      $color = $course->color;
      $color = str_replace("#", "", $color);
      $color = str_split($color, 2);

      $r = hexdec($color[0]);
      $g = hexdec($color[1]);
      $b = hexdec($color[2]);

      $styles .= "--Course" . $course->id . "Red: " . $r . "; \n";
      $styles .= "--Course" . $course->id . "Green: " . $g . "; \n";
      $styles .= "--Course" . $course->id . "Blue: " . $b . "; \n";
    }

    $styles .= "}";

    return Response::make($styles, 200)->header("Content-Type", "text/css");
  }

  public function OrganisationColors()
  {
    $organisations = Organisation::all();
    $styles = ":root { ";

    foreach ($organisations as $organisation) {
      $color = $organisation->color;
      $styles .= "--Organisation" . $organisation->id . "Red: " . $organisation->color;
      $styles .= "--Organisation" . $organisation->id . "Green: " . $organisation->color;
      $styles .= "--Organisation" . $organisation->id . "Blue: " . $organisation->color;
    }
  }

  public function CalculateTextColor()
  {
    $courses = Course::all();
    $styles = "";

    //Looping through all of the colors
    foreach ($courses as $course) {
      $color = $course->color;

      //Replacing the hexadecimal value to a split r, g and b value
      $color = str_replace("#", "", $color);
      $color = str_split($color, 2);

      // Assigning the r, g and b values into a variable
      $r = hexdec($color[0]);
      $g = hexdec($color[1]);
      $b = hexdec($color[2]);

      //Generating the css
      $styles .= ".course-card-" . $course->id . " { \n";
      $styles .= "background: " . "rgb($r, -$g, $b); \n";
      $styles .= "--r: calc($r * 0.2126); \n";
      $styles .= "--g: calc($g * 0.7152); \n";
      $styles .= "--b: calc($b * 0.0722); \n";
      $styles .= "--sum: calc(var(--r) + var(--g) + var(--b)); \n";
      $styles .= "--perceived-lightness: calc(var(--sum) / 255); \n";
      $styles .= "color: hsl(0, 0%, calc((var(--perceived-lightness) - var(--threshold)) * -10000000%)); \n";
      $styles .= "} \n";

      $styles .= ".course-button-" . $course->id . " { \n";
      $styles .= "border-color: rgba(calc($r - 50), calc($g - 50), calc(v$b - 50), var(--border-alpha)) !important; \n";
      $styles .= "--border-alpha: calc((var(--perceived-lightness) - var(--border-threshold)) * 100); \n";
      $styles .= "color: hsl(0, 0%, calc((var(--perceived-lightness) - var(--threshold)) * -10000000%)); \n";
      $styles .= "} \n";

      $styles .= ".course-button-" . $course->id . ":hover { \n";
      $styles .= "color: hsl(0, 0%, calc((var(--perceived-lightness) - var(--threshold)) * -10000000%)); \n";
      $styles .= "border-color: rgba(calc($r - 50), calc($g - 50), calc(v$b - 50), var(--border-alpha)) !important; \n";
      $styles .= "} \n";
    }

    // Returning the variable as css
    return Response::make($styles, 200)->header("Content-Type", "text/css");
  }
}
