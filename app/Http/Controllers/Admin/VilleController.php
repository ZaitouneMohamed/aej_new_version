<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class VilleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Ville::latest()->paginate(10);
        return Inertia::render("Admin/Villes/Index" , compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render("Admin/Villes/Create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $this->validate($request,[
            "name"=> "required|unique:villes,name",
            "km_proposer"=> "required|numeric",
        ]);
        Ville::create($validatedData);
        return redirect()->route("admin.villes.index")->with("success","data create with success");
    }

    /**
     * Display the specified resource.
     */
    public function show(Ville $ville)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ville $ville)
    {
        return Inertia::render("Admin/Villes/Edit", compact("ville"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ville $ville)
    {
        $validatedData = $this->validate($request, [
            'name' => [
                'required',
                Rule::unique('villes', 'name')->ignore($ville->id),
            ],
            "km_proposer"=> "required|numeric",
        ]);
        $ville->update($validatedData);
        return redirect()->route("admin.villes.index")->with("success","data updated with success");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ville $ville)
    {
        if ($ville->exists()) {
            $ville->delete();
        }
        return redirect()->route("admin.villes.index")->with("success","data delete with success");
    }
}
