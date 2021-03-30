<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\CommandesPoissons as ModelsCommandesPoissons;
use App\Models\Poisson;
use CommandesPoissons;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends BaseController
{

    public function index()
    {
        $poissons = Poisson::all();
        return view('index', compact('poissons'));
    }

    public function cartAdded(Request $request)
    {
        DB::beginTransaction();

       //dd(json_decode($_COOKIE['cart']));

        $commande = new Commande();
        $commandePoisson = new ModelsCommandesPoissons();
        $cartDatas = json_decode($_COOKIE['cart']);
        $total = 0;

       // dd($cartDatas);
        
        try{

            foreach($cartDatas as $key=> $data){
                if ($key !=0) {
                   $total += $data->prix * $data->quantity;
                }
               
            }
    
            $commande->montant_cmd = $total;
          
            DB::insert($commande);
            DB::commit();
        }catch(\Exception $e){
            throw $e;
        }
         
        return view('index');
       
    }
}
