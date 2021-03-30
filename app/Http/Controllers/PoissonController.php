<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poisson;
class PoissonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $poisson = Poisson::all();
        return view('poissons/index', compact('poisson'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
                return view('poissons/create');
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
             'title'  => 'required|max:255',      
            'prix' => 'required|max:255',
            'qte_stock' => 'required|max:255',
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ]);

                //dd($request->image);

    

        $imageName = time().'.'.$request->images->extension();  

     

        $request->images->move(public_path('images'), $imageName);
        

  
        $poisson = new  Poisson();
        $poisson->title=$request->title;
        $poisson->prix=$request->prix;
         $poisson->qte_stock=$request->qte_stock;
          $poisson->images= $imageName;
          $poisson->save();

        return redirect('/poisson')->with('completed', 'poisson has been saved!');

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
                $poisson = Poisson::findOrFail($id);
        return view('poissons/edit', compact('poisson'));

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
             'title'=>'required|max:255',
            'prix' => 'required|max:255',
            'qte_stock' => 'required|max:255',
           
        ]);
        Poisson::whereId($id)->update($updateData);
        return redirect('/poisson')->with('completed', 'poisson has been updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $poisson = Poisson::findOrFail($id);
        $poisson->delete();

        return redirect('/poisson')->with('completed', 'suppression reussit');
    }
}
