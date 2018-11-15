<?php

namespace Modules\Management\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Models\general\FlashMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use jeremykenedy\LaravelRoles\Models\Permission;
use jeremykenedy\LaravelRoles\Models\Role;
use RoleHelper;

class RoleController extends Controller
{
  /**
   * Display a listing of the resource.
   * @return Response
   */
  public function index()
  {
    $roles = Role::all()->load('permissions');
    return view('management::role.index', compact('roles'));
  }

  /**
   * Show the form for creating a new resource.
   * @return Response
   */
  public function create()
  {
    $permissions = Permission::all();
    return view('management::role.create', compact('permissions'));
  }

  /**
   * Store a newly created resource in storage.
   * @param  RoleRequest $request
   * @return RedirectResponse|Response|Role
   */
  public function store(RoleRequest $request)
  {
    $data = RoleHelper::create($request);

    if ($data instanceof RedirectResponse):
      return $data;
    else:
      return redirect()->route('role')->with('msg', FlashMessage::where('name', 'role.created')->first()->message);
    endif;
  }

  /**
   * Show the specified resource.
   * @return Response
   */
  public function show()
  {
    return view('management::show');
  }

  /**
   * Show the form for editing the specified resource.
   * @param Role $role
   * @return Response
   */
  public function edit(Role $role)
  {
    $role->load('permissions');
    $permissions = Permission::all();
    return view('management::role.edit', compact('role', 'permissions'));
  }

  /**
   * Update the specified resource in storage.
   * @param RoleRequest $request
   * @return RedirectResponse|Response
   */
  public function update(RoleRequest $request)
  {
    $data = RoleHelper::update($request);

    if ($data instanceof RedirectResponse):
      return $data;
    else:
      return redirect()->route('role')->with('msg', FlashMessage::where('name', 'role.updated')->first()->message);
    endif;
  }

  /**
   * Remove the specified resource from storage.
   * @param Role $role
   * @return Response
   * @throws \Exception
   */
  public function destroy(Role $role)
  {
    $role->delete();
    return redirect()->back();
  }
}
