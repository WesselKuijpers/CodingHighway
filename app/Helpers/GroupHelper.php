<?php

use Modules\Organisation\Http\Requests\GroupRequest;
use Modules\Organisation\Entities\Group;
use Modules\Organisation\Entities\GroupUsers;

class GroupHelper 
{
    public static function create(GroupRequest $request)
    {
        DB::beginTransaction();
        $saved = true;
        $validated = $request->validated();

        $group = new Group;
        $group->teacher_id = $validated['teacher'];
        $group->organisation_id = $validated['organisation'];
        $group->course_id = $validated['course'];
        if($group->save()):
            $saved = true;
        else:
            $saved = false;
            if(!$saved):
                DB::rollback();
                // TODO: change to dynamic flashmessage
                return redirect()->back()->with('error', "er is iets fout gegaan bij het opslaan van de groep");
            endif;
        endif;

        foreach ($validated['users'] as $user):
            $gu = new GroupUsers;
            $gu->group_id = $group->id;
            $gu->user_id = $user;
            if($gu->save()):
                $saved = true;
            else:
                $saved = false;
                break;
            endif;
        endforeach;

        if($saved):
            DB::commit();
            return $validated['course'];
        else:
            DB::rollback();
            // TODO: change to dynamic flashmessage
            return redirect()->back()->with('error', "er is iets fout gegaan bij het opslaan van de groep");
        endif;
    }
}
