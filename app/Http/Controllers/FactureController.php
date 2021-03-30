<?php

namespace App\Http\Controllers;
use App\Models\Facture;
use Illuminate\Http\Request;

class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $facture = Facture::all();
        return view('factures/index', compact('facture'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
               return view('factures/create');
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
            'prix' => 'required|numeric',
            'qte_prod' => 'required|numeric',
            'montant' => 'required|max:255',
            'date' => 'required|max:255',
        ]);
        $facture = Facture::create($storeData);

        return redirect('/facture')->with('completed', 'facture has been saved!');
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
        $facture = Facture::findOrFail($id);
        return view('factures/edit', compact('facture'));
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
             'prix' => 'required|numeric',
            'qte_prod' => 'required|numeric',
            'montant' => 'required|max:255',
            'date' => 'required|max:255',
           
        ]);
        Facture::whereId($id)->update($updateData);
        return redirect('/facture')->with('completed', 'facture has been updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $facture = Facture::findOrFail($id);
        $facture->delete();

        return redirect('/facture')->with('completed', 'facture has been deleted');
    }
}
