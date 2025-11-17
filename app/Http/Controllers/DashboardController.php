<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;

class DashboardController extends Controller
{
    // public function index()
    // {
    //     // Récupère les permissions avec pagination
    //     $permissions = Permission::paginate(5); ok

    //     // Retourne la vue en passant les permissions
    //     return view('dashboard.index', compact('permissions'));
    // }
        public function index(Request $request)
    {
        $mode = $request->get('mode', 'list'); // list par défaut
        $id = $request->get('id'); // list par défaut

        
        if($id)
        {
        $permission = Permission::findOrFail($id);

        }else{
            $query = Permission::query();

        if ($request->has('type') && !empty($request->type)) {
            $query->where('type', 'like', '%' . $request->type . '%');
        }
             $permissions = $query->paginate(5);
        }
        // $permissions = $query->get();
        

        // return view('permission.ShowPermission', compact('permissions'));
        return view('dashboard.index', compact('permissions','mode'));
    }
  
}
