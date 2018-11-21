<?php
/**
 * Created by PhpStorm.
 * User: matthijsdevos
 * Date: 25-10-18
 * Time: 09:27
 */

class PermissionsLoader
{
  public static function UserPermissions()
  {
    return [
      'edit' => [
        'name' => 'UserEdit',
        'slug' => 'user.edit',
        'model' => 'App\User',
        'description' => 'Access to modifying your own data'
      ],
      'activation' => [
        'name' => 'UserActivation',
        'slug' => 'user.activate',
        'model' => '',
        'description' => 'Access to enter the license key'
      ]
    ];
  }

  public static function CoursePermissions()
  {
    return [
      'show' => [
        'name' => 'CourseShow',
        'slug' => 'course.show',
        'model' => 'App\Models\course\Course',
        'description' => 'Access to be able of viewing the Courses'
      ],
      'create' => [
        'name' => 'CourseCreate',
        'slug' => 'course.create',
        'model' => 'App\Models\course\Course',
        'description' => 'Access to be able of creating new courses'
      ],
      'edit' => [
        'name' => 'CourseEdit',
        'slug' => 'course.edit',
        'model' => 'App\Models\course\Course',
        'description' => 'Access to be able of editing a course'
      ],
      'delete' => [
        'name' => 'CourseDelete',
        'slug' => 'course.delete',
        'model' => 'App\Models\course\Course',
        'description' => 'Access to be able of deleting a course'
      ],
    ];
  }

  public static function ExercisePermissions()
  {
    return [
      'show' => [
        'name' => 'ExerciseShow',
        'slug' => 'exercise.show',
        'model' => 'App\Models\course\Exercise',
        'description' => 'Access to be able of viewing the Exercises'
      ],
      'create' => [
        'name' => 'ExerciseCreate',
        'slug' => 'exercise.create',
        'model' => 'App\Models\course\Exercise',
        'description' => 'Access to be able of creating new Exercises'
      ],
      'edit' => [
        'name' => 'ExerciseEdit',
        'slug' => 'exercise.edit',
        'model' => 'App\Models\course\Exercise',
        'description' => 'Access to be able of editing a Exercise'
      ],
      'delete' => [
        'name' => 'ExerciseDelete',
        'slug' => 'exercise.delete',
        'model' => 'App\Models\course\Exercise',
        'description' => 'Access to be able of deleting a exercise'
      ]
    ];
  }

  public static function LessonsPermissions()
  {
    return [
      'show' => [
        'name' => 'LessonShow',
        'slug' => 'lesson.show',
        'model' => 'App\Models\course\Lesson',
        'description' => 'Access to be able of viewing the Lessons'
      ],
      'create' => [
        'name' => 'LessonCreate',
        'slug' => 'lesson.create',
        'model' => 'App\Models\course\Lesson',
        'description' => 'Access to be able of creating new Lesson'
      ],
      'edit' => [
        'name' => 'LessonEdit',
        'slug' => 'lesson.edit',
        'model' => 'App\Models\course\Lesson',
        'description' => 'Access to be able of editing a lesson'
      ],
      'delete' => [
        'name' => 'LessonDelete',
        'slug' => 'lesson.delete',
        'model' => 'App\Models\course\Lesson',
        'description' => 'Access to be able of deleting a lesson'
      ]
    ];
  }

  public static function LevelPermissions()
  {
    return [
      'show' => [
        'name' => 'LevelShow',
        'slug' => 'level.show',
        'model' => 'App\Models\course\Level',
        'description' => 'Access to be able of viewing the Levels'
      ],
      'create' => [
        'name' => 'LevelCreate',
        'slug' => 'level.create',
        'model' => 'App\Models\course\Level',
        'description' => 'Access to be able of creating new level'
      ],
      'edit' => [
        'name' => 'LevelEdit',
        'slug' => 'level.edit',
        'model' => 'App\Models\course\Level',
        'description' => 'Access to be able of editing a level'
      ],
      'delete' => [
        'name' => 'LevelDelete',
        'slug' => 'level.delete',
        'model' => 'App\Models\course\Level',
        'description' => 'Access to be able of deleting a level'
      ]
    ];
  }

  public static function SystemAdminPermissions()
  {
    return [
      'SystemAdminCreate' => [
        'name' => 'SystemAdminCreate',
        'slug' => 'sa.create',
        'model' => '',
        'description' => 'Access to be able of enabling / disabling the sa role'
      ]
    ];
  }

  public static function OverigePermissions()
  {
    return [
      'ErrorShow' => [
        'name' => 'ErrorShow',
        'slug' => 'error.show',
        'model' => '',
        'description' => ''
      ]
    ];
  }

  public static function OrganisationPermissions()
  {
    return [
      'show' => [
        'name' => 'OrganisationShow',
        'slug' => 'organisation.show',
        'model' => '',
        'description' => 'Permission to show the organisations'
      ],
      'create' => [
        'name' => 'OrganisationCreate',
        'slug' => 'organisation.create',
        'model' => '',
        'description' => 'Permission to create a organisation'
      ],
      'edit' => [
        'name' => 'OrganisationEdit',
        'slug' => 'organisation.edit',
        'model' => '',
        'description' => 'Permission to edit a organisation'
      ],
      'delete' => [
        'name' => 'OrganisationDelete',
        'slug' => 'organisation.delete',
        'model' => '',
        'description' => 'Permission to delete a organisation'
      ]
    ];
  }

  public static function LicensePermissions()
  {
    return [
      'create' => [
        'name' => 'LicenseCreate',
        'slug' => 'licenses.create',
        'model' => '',
        'description' => 'permission to create licenses'
      ]
    ];
  }

  public static function RoleAdminPermissions()
  {
    return [
      'show' => [
        'name' => 'RoleShow',
        'slug' => 'role.show',
        'model' => '',
        'description' => 'Permission to show the roles'
      ],
      'create' => [
        'name' => 'RoleCreate',
        'slug' => 'role.create',
        'model' => '',
        'description' => 'Permission to create a role'
      ],
      'edit' => [
        'name' => 'RoleEdit',
        'slug' => 'role.edit',
        'model' => '',
        'description' => 'Permission to edit a role'
      ],
      'delete' => [
        'name' => 'RoleDelete',
        'slug' => 'role.delete',
        'model' => '',
        'description' => 'Permission to delete a role'
      ],
      'roleuser' => [
        'name' => 'RoleUser',
        'slug' => 'roleuser.management',
        'model' => '',
        'description' => 'Permission to attach/detach roles from users'
      ]
    ];
  }
}