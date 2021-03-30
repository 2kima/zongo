<?php

namespace App\Http\Controllers;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $client = Client::all();
        return view('clients/index', compact('client'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients/create');
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
        $client = Client::create($storeData);

        return redirect('/client')->with('completed', 'client has been saved!');

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
       
        $client = client::findOrFail($id);
        return view('clients/edit', compact('client'));

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
        Client::whereId($id)->update($updateData);
        return redirect('/client')->with('completed', 'client has been updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
               $client = Client::findOrFail($id);
        $client->delete();

        return redirect('/client')->with('completed', 'client has been deleted');

    }
}
