<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Truck;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TruckController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Truck::latest()->paginate(12);
        return Inertia::render("Admin/Trucks/Index", compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Trucks/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "matricule" => "required|unique:camions,matricule",
            "consommation" => "required",
        ]);
        Truck::create([
            "matricule" => $request->matricule,
            "consommation" => $request->consommation,
            "marque" => $request->marque,
            "genre" => $request->genre,
            "type_carburant" => $request->type_carburant,
            "n_chasie" => $request->n_chasie,
            "puissanse_fiscale" => $request->pupuissanse_fiscale,
            "premier_mise" => $request->premier_mise,
        ]);
        // Cache::forget('camion_count');
        // Cache::forget('camion_aej_count');
        return redirect()->route('admin.trucks.index')->with([
            "success" => "camion added successly"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Truck $truck) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Truck $truck)
    {
        return Inertia::render('Admin/Trucks/Edit', compact("truck"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Truck $truck)
    {
        $this->validate($request, [
            'matricule' => [
                'required',
                Rule::unique('camions', 'matricule')->ignore($truck->id),
            ],
            "consommation" => "required",
        ]);
        $truck->update([
            "matricule" => $request->matricule,
            "consommation" => $request->consommation,
            "marque" => $request->marque,
            "genre" => $request->genre,
            "type_carburant" => $request->type_carburant,
            "n_chasie" => $request->n_chasie,
            "puissanse_fiscale" => $request->pupuissanse_fiscale,
            "premier_mise" => $request->premier_mise,
        ]);
        return redirect()->route("admin.trucks.index")->with([
            "success" => "data update with success"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Truck $truck)
    {
        $truck->delete();
        return redirect()->route("admin.trucks.index")->with([
            "success" => "data delete with success"
        ]);
    }
}
