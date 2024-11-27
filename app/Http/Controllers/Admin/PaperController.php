<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\PapierCollection;
use App\Models\Paper;
use App\Models\Truck;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PaperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Paper::latest()->paginate(10);
        return Inertia::render("Admin/Papers/Index", compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $trucks = Truck::latest()->get();
        return Inertia::render('Admin/Papers/Create', compact("trucks"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'title' => "required",
            "date_debut" => "required|date",
            "date_fin" => "required",
            "camion_id" => "required|exists:camions,id",
        ]);
        Paper::create([
            "title" => $request->title,
            "description" => $request->description,
            "date_debut" => $request->date_debut,
            "date_fin" => $request->date_fin,
            "camion_id" => $request->camion_id,
        ]);
        return redirect()->route("admin.papers.index")->with("success", "data create with success");
    }

    /**
     * Display the specified resource.
     */
    public function show(Paper $paper)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paper $paper)
    {
        $trucks = Truck::latest()->get();
        return Inertia::render("Admin/Papers/Edit", compact("trucks", "paper"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paper $paper)
    {
        $this->validate(request(), [
            "title" => "required",
            "date_debut" => "required",
            "date_fin" => "required",
            "camion_id" => "required|exists:camions,id",
        ]);
        $paper->update([
            "title" => $request->title,
            "description" => $request->description,
            "date_debut" => $request->date_debut,
            "date_fin" => $request->date_fin,
            "camion_id" => $request->camion_id,
        ]);
        return redirect()->route("admin.papers.index")->with("success", 'data updated with success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paper $paper)
    {
        //
    }
}
