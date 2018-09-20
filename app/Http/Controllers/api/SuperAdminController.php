<?php

namespace App\Http\Controllers\api;

use SuperAdminHelper;
use App\Http\Requests\SuperAdminRequest;
use App\Http\Controllers\Controller;

class SuperAdminController extends Controller
{
  public function create(SuperAdminRequest $request)
  {
    $data = SuperAdminHelper::create($request);

    return $data;
  }
}
