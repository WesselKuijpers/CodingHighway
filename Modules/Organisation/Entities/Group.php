<?php

namespace Modules\Organisation\Entities;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Modules\Course\Entities\Course;
use App\Models\general\Organisation;

class Group extends Model
{
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::Class);
    }

    public function organisation()
    {
        return $this->belongsTo(Organisation::class);
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'group_users');
    }
}
