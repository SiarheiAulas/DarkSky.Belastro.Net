<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Http\Requests\LocationRequest;

class LocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $location_infinity=Location::where('host','infinity')->get();
        $location_vBug=Location::where('host','vBug')->get();
        $location_betelgeise=Location::where('host','betelgeise')->get();
        $location_hv=Location::where('host','hv')->get();
        $location_cirrus=Location::where('host','cirrus')->get();
        $location_domachevo=Location::where('host','domachevo')->get();
        $location_observatory=Location::where('host','observatory')->get();
        $location_astroplaces=Location::where('host','astroplaces')->get();

        return view('list', compact(['location_infinity','location_vBug','location_hv','location_betelgeise','location_cirrus','location_domachevo','location_observatory','location_astroplaces']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('loccreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LocationRequest $request)
    {
        $validated=$request->validated();

        $location= new Location;
		
		$location->name=$request->input('name');
		$location->lat=$request->input('lat');
		$location->long=$request->input('long');
		$location->direction=$request->input('direction');
		$location->lp=$request->input('lp');
		$location->horizon=$request->input('horizon');
		$location->hills=$request->input('hills');
		$location->transp=$request->input('transp');
		$location->description=$request->input('description');
		$location->url=$request->input('url');
		$location->distance=$request->input('distance');
		$location->host=$request->input('host');
		$location->sqm=$request->input('sqm');
		
		$location->save();
		
		return redirect()->route('locations.index')->withErrors($validated)->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $location=Location::find($id);
		$url=$location->url;
		return redirect()->away($url);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $location=Location::find($id);
		return view('locedit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LocationRequest $request, $id)
    {
        $validated=$request->validated();

		$location= Location::find($id);
		
		$location->name=$request->input('name');
		$location->lat=$request->input('lat');
		$location->long=$request->input('long');
		$location->direction=$request->input('direction');
		$location->lp=$request->input('lp');
		$location->horizon=$request->input('horizon');
		$location->hills=$request->input('hills');
		$location->transp=$request->input('transp');
		$location->description=$request->input('description');
		$location->url=$request->input('url');
		$location->distance=$request->input('distance');
		$location->host=$request->input('host');
		$location->sqm=$request->input('sqm');
		
		$location->save();
		
		return redirect()->route('locations.index')->withErrors($validated)->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location=Location::find($id);
        $location->delete();
        return redirect()->route('locations.index');
    }
}
