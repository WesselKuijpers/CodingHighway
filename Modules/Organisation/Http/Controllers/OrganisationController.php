<?php

namespace Modules\Organisation\Http\Controllers;

use App\Models\general\Organisation;
use App\Models\course\Course;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Requests\OrganisationRequest;
use Illuminate\Support\Facades\Redirect;
use jeremykenedy\LaravelRoles\Models\Role;
use App\Http\Requests\LicenseCreateRequest;
use OrganisationHelper;
use LicenseKeyHelper;

class OrganisationController extends Controller
{
  public function __construct()
  {
    $this->middleware('role:sa')->only(['index']);
    $this->middleware('permission:organisation.show')->only(['show']);
    $this->middleware('permission:organisation.create')->only(['create', 'store']);
    $this->middleware('permission:organisation.edit')->only(['edit', 'update']);
    $this->middleware('permission:organisation.delete')->only(['destroy']);
  }

  /**
   * Display a listing of the resource.
   * @return Response
   */
  public function index()
  {
    $organisations = Organisation::all();
    return view('organisation::index', compact('organisations'));
  }

  public function activate(OrganisationRequest $request)
  {
    $data = $request->validated();

    if (!empty($data['organisation_id'])):
      $organisation = Organisation::find($data['organisation_id']);
      $organisation->active = 1;
      
      $user = User::find($organisation->requester);
      $user->attachRole(Role::where('slug', 'admin')->first());

      if ($organisation->save()):
        return redirect()->route('organisation');
      else:
        return redirect()->back();
      endif;
    endif;
  }

  /**
   * Show the form for creating a new resource.
   * @return Response
   */
  public function create()
  {
    return view('organisation::create');
  }

  /**
   * Store a newly created resource in storage.
   * @param  OrganisationRequest $request
   * @return Response
   */
  public function store(OrganisationRequest $request)
  {
    // $data variable attempts to create a organisation via the organisation helper, if successful return true, else return false.
    $data = OrganisationHelper::create($request);

    // if $data is true redirect to the organisation overview, else redirect back with an error.
    if ($data != false):
      return redirect()->route('organisation');
    else:
      return back()->with('error', 'Er is iets mis gegaan met het verzenden!');
    endif;
  }

  /**
   * Show the specified resource.
   * @return Response
   */
  public function show($id)
  {
    $organisation = Organisation::find($id);
    $courses = Course::all();
    return view('organisation::show', ['organisation' => $organisation, 'courses' => $courses]);
  }

  /**
   * Show the form for editing the specified resource.
   * @param Organisation $id
   * @return Response
   */
  public function edit(Organisation $id)
  {
    return view('organisation::edit', ['organisation' => $id]);
  }

  /**
   * Update the specified resource in storage.
   * @param  OrganisationRequest $request
   * @return Redirect
   */
  public function update(OrganisationRequest $request)
  {
    if (!$request->authorize()):
      return redirect()->back->with('error', 'Je hebt geen rechten om dit te mogen doen');
    endif;

    OrganisationHelper::edit($request);

    return redirect()->route('organisation.show', ['id' => $request->id])->with('msg', 'Wijzigen opgeslagen');
  }

  /**
   * Remove the specified resource from storage.
   * @return Response
   */
  public function destroy()
  {
  }

  public function generateLicenses(LicenseCreateRequest $request)
  {
      $data = $request->validated();
      LicenseKeyHelper::OrganisationKey($data['amount'], $data['organisation_id']);

      return redirect()->route('organisation.show', ['id' => $data['organisation_id']]);
  }
}
