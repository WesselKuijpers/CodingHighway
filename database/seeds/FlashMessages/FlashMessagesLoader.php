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

  public static function CourseMessage()
  {
    return [
      'course.create.error' => 'Er ging iets fout tijdens het aanmaken van de cursus',
      'course.created' => 'Cursus aangemaakt',
      'course.update.error' => 'Er ging iets fout tijdens het bijwerken van de cursus',
      'course.updated' => 'Wijzigingen opgeslagen',
    ];
  }

  public static function ExerciseMessage()
  {
    return [
      'exercise.create.error' => 'Er ging iets fout tijdens het aanmaken van de oefening',
      'exercise.created' => 'Oefening aangemaakt',
      'exercise.update.error' => 'Er ging iets fout tijdens het bijwerken van de oefening',
      'exercise.updated' => 'Wijzigingen opgeslagen',
    ];
  }

  public static function LessonMessage()
  {
    return [
      'lesson.create.error' => 'Er ging iets fout tijdens het aanmaken van de les',
      'lesson.created' => 'Les aangemaakt',
      'lesson.update.error' => 'Er ging iets fout tijdens het bijwerken van de les',
      'lesson.updated' => 'Wijzigingen opgeslagen',
    ];
  }

  public static function LevelMessage()
  {
    return [
      'level.create.error' => 'Er ging iets fout tijdens het aanmaken van een level',
      'level.created' => 'level aangemaakt',
      'level.update.error' => 'Er ging iets fout tijdens het bijwerken van een level',
      'level.updated' => 'Wijzigingen opgeslagen',
    ];
  }
}