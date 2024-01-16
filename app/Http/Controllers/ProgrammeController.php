<?php

namespace App\Http\Controllers;

use App\Models\Programme;
use Illuminate\Http\Request;

class ProgrammeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programmes = Programme::get();
        return view('programmes.index',compact('programmes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('programmes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $prog = new Programme();
        $prog ->nom_candidat= $request->nom_candidat;
        $prog ->prenom_candidat= $request->prenom_candidat;
        $prog ->email_candidat= $request->email_candidat;
        $prog ->fonction_candidat= $request->fonction_candidat;
        $prog ->projet = $request->projet;
        $file = $request->file('document');
        $fileName = $file->getClientOriginalName();
        $destination ='Programmes_file';
        $file->move($destination,$fileName);
        $prog ->document= $fileName;
        $prog ->save();


        return redirect()->route('programmes');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $programmes = Programme::findorFail($id);
        return view('programmes.edit',compact('programmes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $programmes = Programme::findorFail($id);
        $programmes->update($request->all());
        return redirect()->route('programmes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $programmes = Programme::findorFail($id);
        $programmes->delete();
        return redirect()->route('programmes');
    }









}
