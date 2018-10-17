<?php

use App\Http\Requests\OrganisationRequest;
use App\Models\general\Organisation;
use App\Models\general\Media;

class OrganisationHelper
{
    /**
     * create
     *
     * @param  OrganisationRequest $request
     *
     * @return Organisation $organisation | false
     */
    public static function create(OrganisationRequest $request)
    {
        $validated = $request->validated();

        $organisation = new Organisation;
        $organisation->name = $validated['name'];
        $organisation->street = $validated['street'];
        $organisation->housenumber = $validated['housenumber'];
        $organisation->zipcode = $validated['zipcode'];
        $organisation->city = $validated['city'];
        $organisation->email = $validated['email'];
        $organisation->paper_invoice = $validated['paper_invoice'];
        $organisation->color = $validated['color'];
        $organisation->fontcolor = $validated['fontcolor'];
        $organisation->link = $validated['link'];

        if ($organisation->save()):
            if (!empty($validated['media'])):
                $file = FileHelper::store($validated['media']);

                $media = new Media;
                $media->content = '/storage/media/' . $file->hashName();
                if ($media->save()):
                    $organisation->image = $media->id;
                endif;
                $organisation->save();
            endif;

            return $organisation;
        else:
            return false;
        endif;
    }
}
