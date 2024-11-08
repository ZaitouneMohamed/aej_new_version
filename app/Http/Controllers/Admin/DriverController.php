<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class DriverController extends Controller
{
    public function index()
    {
        $data = Driver::latest()->paginate(12);
        return Inertia::render("Admin/Drivers/Index", compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Drivers/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $this->validate($request, [
            "full_name" => "required",
            "code" => "required|unique:chaufeurs,code",
            "phone" => " required",
        ]);
        Driver::create($validatedData);
        // Cache::forget('chauffeur_count');
        // Cache::forget('active_chauffeurs');
        return redirect()->route('admin.drivers.index')->with([
            "success" => "chaufeur added successly"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Driver $driver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Driver $driver)
    {
        return Inertia::render('Admin/Drivers/Edit', compact('driver'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Driver $driver)
    {
        $this->validate($request, [
            "full_name" => "required",
            "phone" => "required",
            'code' => [
                'required',
                Rule::unique('chaufeurs', 'code')->ignore($driver->id),
            ],
        ]);
        $driver->update([
            "full_name" => $request->full_name,
            "code" => $request->code,
            "numero_2" => $request->numero_2,
            "adresse" => $request->adresse,
            "phone" => $request->phone,
            "email" => $request->email,
            "cnss" => $request->cnss,
            "cni"   => $request->cni,
        ]);
        return redirect()->route('admin.drivers.index')->with([
            "success" => "chaufeur updated successly"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Driver $driver)
    {
        if ($driver) {
            $driver->delete();
        }
        return redirect()->route("admin.drivers.index")->with([
            "success" => "item delete with success"
        ]);
    }
}
