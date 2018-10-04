<?php
/**
 * Created by PhpStorm.
 * User: matthijsdevos
 * Date: 04-10-18
 * Time: 10:46
 */

return [
  //user
  [
    'name' => 'UserEdit',
    'slug' => 'user.edit',
    'model' => 'App\User',
    'description' => 'Access to modifying your own data'
  ],
  [
    'name' => 'UserActivation',
    'slug' => 'user.activate',
    'model' => '',
    'description' => 'Access to enter the license key'
  ],
  // course
  [
    'name' => 'CourseShow',
    'slug' => 'course.show',
    'model' => 'App\Models\course\Course',
    'description' => 'Access to be able of viewing the Courses'
  ],
  [
    'name' => 'CourseCreate',
    'slug' => 'course.create',
    'model' => 'App\Models\course\Course',
    'description' => 'Access to be able of creating new courses'
  ],
  [
    'name' => 'CourseEdit',
    'slug' => 'course.edit',
    'model' => 'App\Models\course\Course',
    'description' => 'Access to be able of editing a course'
  ],
  [
    'name' => 'CourseDelete',
    'slug' => 'course.delete',
    'model' => 'App\Models\course\Course',
    'description' => 'Access to be able of deleting a course'
  ],
  //exercise
  [
    'name' => 'ExerciseShow',
    'slug' => 'exercise.show',
    'model' => 'App\Models\course\Exercise',
    'description' => 'Access to be able of viewing the Exercises'
  ],
  [
    'name' => 'ExerciseCreate',
    'slug' => 'exercise.create',
    'model' => 'App\Models\course\Exercise',
    'description' => 'Access to be able of creating new Exercises'
  ],
  [
    'name' => 'ExerciseEdit',
    'slug' => 'exercise.edit',
    'model' => 'App\Models\course\Exercise',
    'description' => 'Access to be able of editing a Exercise'
  ],
  [
    'name' => 'ExerciseDelete',
    'slug' => 'exercise.delete',
    'model' => 'App\Models\course\Exercise',
    'description' => 'Access to be able of deleting a exercise'
  ],
  //lesson
  [
    'name' => 'LessonShow',
    'slug' => 'lesson.show',
    'model' => 'App\Models\course\Lesson',
    'description' => 'Access to be able of viewing the Lessons'
  ],
  [
    'name' => 'LessonCreate',
    'slug' => 'lesson.create',
    'model' => 'App\Models\course\Lesson',
    'description' => 'Access to be able of creating new Lesson'
  ],
  [
    'name' => 'LessonEdit',
    'slug' => 'lesson.edit',
    'model' => 'App\Models\course\Lesson',
    'description' => 'Access to be able of editing a lesson'
  ],
  [
    'name' => 'LessonDelete',
    'slug' => 'lesson.delete',
    'model' => 'App\Models\course\Lesson',
    'description' => 'Access to be able of deleting a lesson'
  ],
  //level
  [
    'name' => 'LevelShow',
    'slug' => 'level.show',
    'model' => 'App\Models\course\Level',
    'description' => 'Access to be able of viewing the Levels'
  ],
  [
    'name' => 'LevelCreate',
    'slug' => 'level.create',
    'model' => 'App\Models\course\Level',
    'description' => 'Access to be able of creating new level'
  ],
  [
    'name' => 'LevelEdit',
    'slug' => 'level.edit',
    'model' => 'App\Models\course\Level',
    'description' => 'Access to be able of editing a level'
  ],
  [
    'name' => 'LevelDelete',
    'slug' => 'level.delete',
    'model' => 'App\Models\course\Level',
    'description' => 'Access to be able of deleting a level'
  ],
  //system admin
  [
    'name' => 'SystemAdminCreate',
    'slug' => 'sa.create',
    'model' => '',
    'description' => 'Access to be able of enabling / disabling the sa role'
  ],
  //overige
  [
    'name' => 'ErrorShow',
    'slug' => 'error.show',
    'model' => '',
    'description' => ''
  ]
];