<?php

namespace App;

use Modules\Forum\Entities\Answer;
use Modules\Forum\Entities\Question;
use Modules\Forum\Entities\Reply;
use Modules\Forum\Entities\Vote;
use App\Models\general\License;
use App\Models\general\Organisation;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;
use Modules\Course\Entities\Review;
use Modules\Course\Entities\Solution;
use Modules\Blipd\Entities\Planning;
use Modules\Organisation\Entities\Group;
use Modules\Organisation\Entities\GroupUsers;
use Modules\Course\Entities\Result;

use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;
use Laravel\Scout\Searchable;

class User extends Authenticatable implements MustVerifyEmailContract
{
  use Notifiable;
  use HasRoleAndPermission;
  use Searchable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'firstname', 'insertion', 'lastname', 'email', 'password', 'api_token'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password', 'remember_token',
  ];

  public function getFullname()
  {
    $total = $this->firstname;

    if (!empty($this->insertion)):
      $total .= " " . $this->insertion;
    endif;

    $total .= " " . $this->lastname;

    return $total;
  }

  public function license()
  {
    return $this->hasMany(License::class);
  }

  public function organisation()
  {
    return $this->belongsToMany(Organisation::class, 'licenses')->first();
  }

  public function organisations()
  {
    return $this->belongsToMany(Organisation::class, 'licenses');
  }

  public function questions()
  {
    return $this->hasMany(Question::class);
  }

  public function answers()
  {
    return $this->hasMany(Answer::class);
  }

  public function votes()
  {
    return $this->hasMany(Vote::class);
  }

  public function replies()
  {
    return $this->hasMany(Reply::class);
  }

  public function progress($course_id = null)
  {
    if ($course_id == null):
      return $this->hasMany(UserProgress::class);
    else:
      return $this->hasMany(UserProgress::class)->where('course_id', $course_id);
    endif;
  }

  public function solutions()
  {
    return $this->hasMany(Solution::class);
  }

  public function reviews()
  {
    return $this->hasMany(Review::class);
  }

  public function plannings()
  {
    return $this->hasMany(Planning::class);
  }

  public function groups()
  {
    return $this->belongsToMany(Group::class, 'group_users');
  }

  public function results()
  {
      return $this->hasMany(Result::class);
  }
}
