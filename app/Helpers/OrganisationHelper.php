<?php

use App\Http\Requests\OrganisationRequest;
use App\Models\general\Media;
use App\Models\general\Organisation;
use App\Models\general\UserOrganisations;
use Illuminate\Support\Facades\Auth;

class OrganisationHelper
{
  /**
   * create
   *
   * @param  OrganisationRequest $request
   *
   * @return Organisation|\Illuminate\Http\RedirectResponse
   */
  public static function create(OrganisationRequest $request)
  {
    $validated = $request->validated();
    try {
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
      $organisation->requester = $validated['requester'];
      $organisation->phone = $validated['phone'];

      if ($organisation->save()):
        $organisation->CompileTheme();
        if (!empty($validated['media'])):
          $file = FileHelper::store($validated['media']);

          $media = new Media;
          $media->content = '/storage/media/' . $file->hashName();
          if ($media->save()):
            $organisation->image = $media->id;
          endif;
          $organisation->save();
        endif;

        // Adds current user to newly created organisation as first memeber
        $user = Auth::user();
        $userOrg = new UserOrganisations;
        $userOrg->user_id = $user->id;
        $userOrg->organisation_id = $organisation->id;
        $userOrg->save();

        return $organisation;
      else:
        return redirect()->back()->with('error', FlashMessageLoad('organisation.create.error'));
      endif;
    } catch (\Illuminate\Database\QueryException $queryException) {
      return redirect()->back()->with('error', FlashMessageLoad('organisation.create.error'));
    }
  }

  /**
   * edit
   *
   * @param  OrganisationRequest $request
   *
   * @return \Illuminate\Http\RedirectResponse
   */
  public static function edit(OrganisationRequest $request)
  {
    $validated = $request->validated();
    try {
      $organisation = Organisation::find($validated['id']);
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
      $organisation->phone = $validated['phone'];

      if ($organisation->save()):
        $organisation->CompileTheme();
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
        return redirect()->back()->with('error', FlashMessageLoad('organisation.update.error'));
      endif;
    } catch (\Illuminate\Database\QueryException $queryException) {
      return redirect()->back()->with('error', FlashMessageLoad('organisation.update.error'));
    }
  }
}
