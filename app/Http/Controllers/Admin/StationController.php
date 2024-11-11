<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Station;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Station::latest()->paginate(10);
        return Inertia::render("Admin/Stations/Index", compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render("Admin/Stations/Create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "name" => "required|unique:stations,name",
            "ville" => "required"
        ]);
        Station::create([
            "name" => $request->name,
            "ville" => $request->ville,
            "solde" => $request->solde,
            "gerant_name" => $request->gerant_name,
            "gerant_phone" => $request->gerant_phone,
            "gerant_rep_name" => $request->gerant_rep_name,
            "gerant_rep_phone" => $request->gerant_rep_phone,
        ]);
        // Cache::forget('station_count');
        // Cache::forget('station_count_index');
        return redirect()->route('admin.stations.index')->with([
            "success" => "station added successfly"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Station $station)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Station $station)
    {
        return Inertia::render("Admin/Stations/Edit", compact("station"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Station $station)
    {
        $this->validate($request, [
            "name" => "required",
            "ville" => "required"
        ]);
        $station->update([
            "name" => $request->name,
            "ville" => $request->ville,
            "solde" => $request->solde,
            "gerant_name" => $request->gerant_name,
            "gerant_phone" => $request->gerant_phone,
            "gerant_rep_name" => $request->gerant_rep_name,
            "gerant_rep_phone" => $request->gerant_rep_phone,
        ]);
        // Cache::forget('station_count');
        // Cache::forget('station_count_index');
        return redirect()->route('admin.stations.index')->with([
            "success" => "station updated successfly"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Station $station)
    {
        if ($station) {
            $station->delete();
        }
        return redirect()->route("admin.stations.index")->with([
            "success" => "data delete with success"
        ]);
    }
}
