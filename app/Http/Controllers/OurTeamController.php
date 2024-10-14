<?php

namespace App\Http\Controllers;

use App\Models\OurTeam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreTeamRequest;

class OurTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = OurTeam::orderByDesc('id')->paginate(10);
        return view('admin.teams.index',compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.teams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeamRequest $request)
    {
        DB::transaction(function() use ($request) {
            $validated = $request->validated();   
            if ($request->hasFile('avatar')) {
                $avatarPath = $request->file('avatar')->store('avatars', 'public');
                $validated['avatar'] = $avatarPath;
            }
            $newTeam =  OurTeam::create($validated);
        }); // Tambahkan kurung tutup di sini
        return redirect()->route('admin.teams.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(OurTeam $ourTeam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OurTeam $team)
    {
        return view('admin.teams.edit',compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTeamRequest $request, OurTeam $team)
    {
        DB::transaction(function() use ($request, $team) {
            $validated = $request->validated();   
            
            if ($request->hasFile('avatar')) {
                $avatarPath = $request->file('avatar')->store('avatars', 'public');
                $validated['avatar'] = $avatarPath;
            }
    
            $team->update($validated);
        });
    
        return redirect()->route('admin.teams.index')->with('success', 'Data tim berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OurTeam $team)
    {
        $team->delete();
        return redirect()->route('admin.teams.index')->with('success', 'Anggota tim berhasil dihapus');
    }
}
