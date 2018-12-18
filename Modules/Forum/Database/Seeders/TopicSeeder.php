<?php

namespace Modules\Forum\Database\Seeders;

use Modules\Forum\Entities\Topic;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TopicSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    if (Topic::where('name', 'BUG REPORT')->count() != 1):
      $topic = new Topic;
      $topic->name = 'BUG REPORT';
      $topic->save();
    endif;
  }
}
