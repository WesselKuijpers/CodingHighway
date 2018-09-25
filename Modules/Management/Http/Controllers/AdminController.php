<?php

namespace Modules\Management\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use jeremykenedy\LaravelRoles\Models\Role;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        // gets the search query
        $query = $request['query'];

        // unsets the request, needed for if statement to work properly
        unset($request);

        // finds users by query if any was passed in, else return all the users
        if(isset($query))
        {
            $users = User::search($query)->get();
        }
        else
        {
            $users = User::all();
        }
        return view('management::admin/index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('management::admin/create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        // gets the array of users that are currently admin
        if (isset($request['noAdmins'])) {
            foreach ($request['noAdmins'] as $key => $val) {
                // determines if the users permissions need to be terminated, and if so do it.
                if ($val == 1) {
                    // do nothing
                }
                else
                {
                    $user = User::find($key);
                    $user->detachRole(Role::where('slug', 'sa')->get());
                }
            }
        }

        // fetches the users that need to be mad admin
        if (isset($request['admins']))
        {
            foreach ($request['admins'] as $adminId)
            {
                // find the user that was passed in
                $user = User::find($adminId);

                // if it is already admin do nothing, if not make it admin
                if($user->hasRole('sa'))
                {
                    //do nothing.
                }
                else
                {
                    $user->attachRole(Role::where('slug', 'sa')->get()->first()->id);
                }

            }
        }
        // return back to the index.
        return back();
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('management::admin/show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('management::admin/edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
