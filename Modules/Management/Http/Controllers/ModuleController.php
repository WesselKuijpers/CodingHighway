<?php

namespace Modules\Management\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Nwidart\Modules\Facades\Module;

class ModuleController extends Controller
{
  public function __construct()
  {
    $this->middleware('permission:module.management');
  }

  public function index()
  {
    $modules = Module::all();
    return view('management::module.index', compact('modules'));
  }

  public function zetaan($module)
  {
    $module = Module::find($module);
    $module->enable();
    return redirect()->back();
  }

  public function zetuit($module)
  {
    $module = Module::find($module);
    $module->disable();
    return redirect()->back();
  }
}
