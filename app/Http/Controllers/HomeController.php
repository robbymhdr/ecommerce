<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isMember');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        
        if($request->has('search')){
            $barangs = Barang::where('nama_barang', 'like', '%'. $request->search . '%')->paginate(20);
            $cek = Barang::where('nama_barang', 'like', '%'. $request->search . '%')->paginate(20)->count();
        if($cek==0){
            return back()->with('failed', 'Barang Kosong bitch!');
        }

        }else{
            
            $barangs = Barang::paginate(20);
        }

        $data =
            [
                'title' => 'Home',
            ];
      
        return view('home', compact('barangs'), $data);
    }
}
