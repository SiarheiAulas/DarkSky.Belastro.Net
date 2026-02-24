<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oddy;
use App\Models\Location;
use App\Http\Requests\OddysRequest;


class OddysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->only([
            'create', 'store', 'edit', 'update'
        ]);
    }  
    public function index()
    {
		$oddys=Oddy::all();
		$loc=Location::where('host','infinity')->get();
        return view('oddys', compact('oddys','loc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('oddycreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OddysRequest $request)
    {
		$validated=$request->validated();
		
        $oddy= new Oddy;
		$oddy->header=$request->input('header');
		$oddy->url=$request->input('url');
		$oddy->description=$request->input('description');
		$oddy->save();

		return redirect()->route('oddys.index')->withErrors($validated)->withInput();
	}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Oddy $oddy)
    {
        return view('oddy', compact('oddy'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Oddy $oddy)
    {
         return view('oddyedit', compact('oddy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OddysRequest $request, Oddy $oddy)
    {
    	$validated=$request->validated();
		
		$oddy->header=$request->input('header');
		$oddy->url=$request->input('url');
		$oddy->description=$request->input('description');
		$oddy->save();
		
		return redirect()->route('oddys.index')->withErrors($validated)->withInput();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Oddy $oddy)
    {
        $oddy->delete();
        return redirect()->route('oddys.index');

    }
}
