<?php

namespace App\Http\Controllers;
use App\Models\Fournisseur;
use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $fournisseur = Fournisseur::all();
        return view('fournisseurs/index', compact('fournisseur'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fournisseurs/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $storeData = $request->validate([
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'contact' => 'required|numeric',
            
        ]);
        $fournisseur = Fournisseur::create($storeData);

        return redirect('/fournisseur')->with('completed', 'fournisseur has been saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $fournisseur = Fournisseur::findOrFail($id);
        return view('fournisseurs/edit', compact('fournisseur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateData = $request->validate([
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'contact' => 'required|numeric',
           
        ]);
        Fournisseur::whereId($id)->update($updateData);
        return redirect('/fournisseur')->with('completed', 'fournisseur has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
               $fournisseur = Fournisseur::findOrFail($id);
        $fournisseur->delete();

        return redirect('/fournisseur')->with('completed', 'client has been deleted');

    }
}
