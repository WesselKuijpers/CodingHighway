<?php

namespace App;

use App\Models\forum\Answer;
use App\Models\forum\Question;
use App\Models\forum\Reply;
use App\Models\forum\Vote;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;

use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;

class User extends Authenticatable implements MustVerifyEmailContract
{
  use Notifiable;
  use HasRoleAndPermission;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'firstname', 'insertion', 'lastname', 'email', 'password',
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
    return $this->belongsTo(License::class);
  }

  public function organisation()
  {
    return $this->hasManyThrough(Organisation::class, UserOrganisation::class);
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
}
