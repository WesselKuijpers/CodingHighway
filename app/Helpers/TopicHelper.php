<?php

use App\Models\general\Media;
use Modules\Forum\Entities\Topic;
use Modules\Forum\Http\Requests\TopicRequest;

class TopicHelper
{
  /**
   * @param TopicRequest $request
   * @return \Illuminate\Http\RedirectResponse|Topic
   */
  public static function create(TopicRequest $request)
  {
    $data = $request->validated();

    $topic = new Topic;
    $topic->name = $data['name'];
    $topic->course_id = $data['course_id'];

    if (!empty($data['media'])):
      $file = FileHelper::store($data['media']);

      $media = new Media;
      $media->content = '/storage/media/' . $file->hashName();
      if ($media->save()):
        $topic->media_id = $media->id;
      endif;
    endif;

    if ($topic->save()):
      return $topic;
    else:
      return redirect()->back()->with('error', 'Problemen tijdens het aanmaken van de topic');
    endif;
  }
}