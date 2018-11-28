<?php

use App\Http\Requests\SolutionRequest;
use App\Solution;
use Illuminate\Support\Facades\Auth;
use App\Models\general\SolutionMedia;
use App\Models\general\Media;
use Illuminate\Support\Facades\Storage;

class SolutionHelper
{
    public static function Create(SolutionRequest $request)
    {
        $validated = $request->validated();
        $solution = new Solution;
        
        $solution->exercise_id = $validated['exercise_id'];
        $solution->user_id = Auth::id();
        $solution->content = $validated['content'];

        if($solution->save()):

            if (!empty($validated['media'])):
                foreach ($validated['media'] as $m):
                  $file = FileHelper::store($m);
      
                  $media = new Media;
                  $media->content = '/storage/media/' . $file->hashName();
                  if ($media->save()):
                    $ms = new SolutionMedia;
                    $ms->media_id = $media->id;
                    $ms->solution_id = $solution->id;
                    $ms->save();
                  endif;
                endforeach;
              endif;

            return true;
        else:
            return false;
        endif;
    }

    public static function Update(SolutionRequest $request)
    {
        $validated = $request->validated();
        $solution = Solution::find($validated['id']);
        
        $solution->exercise_id = $validated['exercise_id'];
        $solution->user_id = Auth::id();
        $solution->content = $validated['content'];

        if($solution->save()):

            if (!empty($validated['media'])):
                foreach ($validated['media'] as $m):
                  $file = FileHelper::store($m);
      
                  $media = new Media;
                  $media->content = '/storage/media/' . $file->hashName();
                  if ($media->save()):
                    $ms = new SolutionMedia;
                    $ms->media_id = $media->id;
                    $ms->solution_id = $solution->id;
                    $ms->save();
                  endif;
                endforeach;
              endif;

            return true;
        else:
            return false;
        endif;
    }

    public static function Destroy(SolutionRequest $request)
    {
        $validated = $request->validated();
        $solution = Solution::find($validated['id']);
        foreach($solution->media as $media):
            $name = str_replace('/storage', '/public', $media->content);
            Storage::disk('local')->delete($name);
            $media->delete();
        endforeach;

        if($solution->delete()):
            return true;
        else:
            return false;
        endif;
    }
}
