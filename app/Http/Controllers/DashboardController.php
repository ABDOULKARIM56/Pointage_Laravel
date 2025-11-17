<?php

namespace App\Http\Controllers;

use App\Models\Conge;
use App\Models\Departement;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Service;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $mode = $request->get('mode', 'list'); // list par défaut

        // Récupère les permissions avec pagination
        $permissions = Permission::paginate(5); 
        $services = Service::paginate(5); 
        $conges = Conge::paginate(5); 
        $departements = Departement::paginate(5); 

        // Retourne la vue en passant les permissions
        return view('dashboard.index', compact('mode','departements','services','conges','permissions'));
    }
        public function index_permission(Request $request)
    {
        $mode = $request->get('mode', 'list'); // list par défaut
        $id = $request->get('id'); // list par défaut

        
        if($id)
        {
        $permissions = Permission::findOrFail($id);

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
      public function index_departement(Request $request)
    {
        $mode = $request->get('mode', 'list'); // list par défaut
        $id = $request->get('id'); // list par défaut

        
        if($id)
        {
        $departements = Departement::findOrFail($id);

        }else{
            $query = Departement::query();

        $filters = ['nom', 'description'];

        $query->where(function ($q) use ($request, $filters) {
            foreach ($filters as $field) {
                if ($request->has('nom') && !empty($request->nom)) {
                    $q->orWhere($field, 'like', '%' . $request->nom . '%');
                }
            }
        })->distinct();
             $departements = $query->paginate(5);
        }
        

        return view('dashboard.index', compact('departements','mode'));
    }
     public function index_service(Request $request)
    {
        $mode = $request->get('mode', 'list'); // list par défaut
        $id = $request->get('id'); // list par défaut

        
        if($id)
        {
        $services = Service::findOrFail($id);

        }else{
            $query = Service::query();

        if ($request->has('type') && !empty($request->type)) {
            $query->where('type', 'like', '%' . $request->type . '%');
        }
             $services = $query->paginate(5);
        }
        

        return view('dashboard.index', compact('services','mode'));
    }
     public function index_conge(Request $request)
    {
        $mode = $request->get('mode', 'list'); // list par défaut
        $id = $request->get('id'); // list par défaut

        
        if($id)
        {
        $conges = Conge::findOrFail($id);

        }else{
            $query = Conge::query();

        if ($request->has('type') && !empty($request->type)) {
            $query->where('type', 'like', '%' . $request->type . '%');
        }
             $conges = $query->paginate(5);
        }
        

        return view('dashboard.index', compact('conges','mode'));
    }
  
}
