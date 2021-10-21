<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Materiel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function index()
    {
        $data = DB::table('clients as A')
        ->select(DB::raw('A.id, A.name, count(*) as mat_count, SUM(C.price) as ventes_amount'))
        ->join('liens as B', 'A.id', '=', 'B.client_id')
        ->leftJoin('materiels as C', function ($join)
        {
            $join->on('B.materiel_id', '=', 'C.id');
            $join->where('B.is_sold', '=', 1);
        })
        ->groupBy('A.id')
        ->havingRaw('mat_count > ? and ventes_amount > ?', [30, 30000])
        ->get();
        
        return view('question-1', [
            'data' => $data,
            'total' => Client::all()->count(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if (empty($data['materiel_id']) && $data['name'] && $data['price'] ) {
            $materiel = Materiel::create([
                'name' => $data['name'],
                'price' => $data['price'],
            ]);
        } elseif ($data['materiel_id']) {
            $materiel = Materiel::find($data['materiel_id']);
        }
    
        $client = Client::find($data['client_id']);
        $client->materiels()->attach($materiel);
    
        return back()->with('success', 'Enregistré avec succès.');
    }

    public function list()
    {
        $clients = DB::table('clients as A')
        ->select(DB::raw('A.id, A.name, SUM(C.price) as ventes_amount'))
        ->join('liens as B', 'A.id', '=', 'B.client_id')
        ->leftJoin('materiels as C', function ($join)
        {
            $join->on('B.materiel_id', '=', 'C.id');
            $join->where('B.is_sold', '=', 1);
        })
        ->groupBy('A.id')
        ->orderBy('ventes_amount', 'DESC')
        ->get();
    
        return view('question-3', [
            'clients' => $clients
        ]);
    }
}
