<?php

namespace App\Http\Controllers;
use App\Models\Commande;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
               $commande = Commande::all();
        return view('commandes/index', compact('commande'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('commandes/create');

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
            'date_cmd' => 'required|max:255',
            'montant_cmd' => 'required|numeric',
            'id_clt' => 'required|max:255',
         
        ]);
        $commande = Commande::create($storeData);

        return redirect('/commande')->with('completed', 'commande has been saved!');

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
       
        $commande = commande::findOrFail($id);
        return view('commandes/edit', compact('commande'));

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
            'date_cmd' => 'required|max:255',
            'montant_cmd' => 'required|numeric',
            'id_clt' => 'required|max:255',
        ]);
        Commande::whereId($id)->update($updateData);
        return redirect('/commande')->with('completed', 'commande has been updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
               $Commande->delete();

        return redirect('/Commande')->with('completed', 'Commande has been deleted');

    }
}
