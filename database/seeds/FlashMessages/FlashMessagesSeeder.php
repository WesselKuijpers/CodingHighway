<?php

use App\Models\general\FlashMessage;
use Illuminate\Database\Seeder;

class FlashMessagesSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $this->Creator(FlashMessagesLoader::LicenseMessage());
    $this->Creator(FlashMessagesLoader::UserMessage());
    $this->Creator(FlashMessagesLoader::CourseMessage());
    $this->Creator(FlashMessagesLoader::ExerciseMessage());
    $this->Creator(FlashMessagesLoader::LessonMessage());
  }

  private function Creator($list)
  {
    foreach ($list as $key => $message):
      $fm = new FlashMessage;

      if (FlashMessage::where('name', $key)->count() != 1):
        $fm->name = $key;
        $fm->message = $message;
        if ($fm->save() && env('APP_ENV') != 'testing'):
          echo "MESSAGE CREATED: {$fm->name}\n";
        endif;
      endif;
    endforeach;
  }


}
