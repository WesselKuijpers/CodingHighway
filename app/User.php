<?php

namespace App;

use App\Models\forum\Answer;
use App\Models\forum\Question;
use App\Models\forum\Reply;
use App\Models\forum\Vote;
use App\Models\general\License;
use App\Models\general\Organisation;
use App\Models\general\UserOrganisation;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;
use App\Review;
use App\Solution;

use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;
use Laravel\Scout\Searchable;
use phpDocumentor\Reflection\Types\Boolean;

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
      $total .= " ".$this->insertion;
    endif;

    $total .= " ".$this->lastname;

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

  public function progress($course_id)
  {
    return $this->hasMany(UserProgress::class)->where('course_id', $course_id);
  }

  public function solutions()
  {
      return $this->hasMany(Solution::class);
  }

  public function reviews()
  {
      return $this->hasMany(Review::class);
  }
}
