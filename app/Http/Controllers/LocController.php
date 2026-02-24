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
    public function __construct()
    {
        $this->middleware('auth')->only([
            'create', 'store', 'edit', 'update'
        ]);
    }
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
		$location->description=$request->input('description');
		$location->distance=$request->input('distance');
		$location->host=$request->input('host');
		$location->sqm=$request->input('sqm');
		$location->code=$request->input('code');
		$location->url_gmap=$request->input('url_gmap');
		$location->url_wiki=$request->input('url_wiki');
		$location->url_openstr=$request->input('url_openstr');
		$location->link_ody=$request->input('link_ody');
		$location->south=$request->input('south');
		$location->north=$request->input('north');
		$location->west=$request->input('west');
		$location->east=$request->input('east');
		$location->auto1=$request->input('auto1');
		$location->auto2=$request->input('auto2');
		$location->train=$request->input('train');
		$location->bus=$request->input('bus');
		$location->brief=$request->input('brief');
				
		switch($request->input('relief')){
			case 'Холмы':
				$location->hills=$request->input('relief');
				break;
			case 'Низина':
				$location->valley=$request->input('relief');
				break;
			case 'Плато':
				$location->plato=$request->input('relief');
				break;
		}
		
		switch($request->input('lp')){
			case 'Серая':
				$location->gray=$request->input('lp');
				break;
			case 'Синяя':
				$location->blue=$request->input('lp');
				break;
			case 'Голубая':
				$location->lightblue=$request->input('lp');
				break;
			case 'Зеленая':
				$location->green=$request->input('lp');
				break;
			case 'Желтая':
				$location->yellow=$request->input('lp');
				break;
			case 'Оранжевая':
				$location->orange=$request->input('lp');
				break;
			case 'Красная':
				$location->red=$request->input('lp');
				break;
		}
								
		$filecontroller=new FileController;

		if($request->hasFile('mapimg')){
            $location->mapimg=$filecontroller->uploadmap($request);
            $location->mapimgext=$request->file('mapimg')->extension();
        }
        
		if($request->hasFile('pano')){
			$location->pano=$filecontroller->uploadpano($request);
			$location->panoext=$request->file('pano')->extension();
        }
        				
		$location->save();
		
		return redirect()->route('locations.index')->withErrors($validated)->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($param)
    {
		$location = Location::where('id', $param)
            ->orWhere('name', $param)
            ->firstOrFail();
		return view('point', compact('location'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
		return view('locedit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LocationRequest $request, Location $location)
    {
        $validated=$request->validated();

		$location->name=$request->input('name');
		$location->lat=$request->input('lat');
		$location->long=$request->input('long');
		$location->description=$request->input('description');
		$location->distance=$request->input('distance');
		$location->host=$request->input('host');
		$location->sqm=$request->input('sqm');
		$location->code=$request->input('code');
		$location->url_gmap=$request->input('url_gmap');
		$location->url_wiki=$request->input('url_wiki');
		$location->url_openstr=$request->input('url_openstr');
		$location->link_ody=$request->input('link_ody');
		$location->south=$request->input('south');
		$location->north=$request->input('north');
		$location->west=$request->input('west');
		$location->east=$request->input('east');
		$location->auto1=$request->input('auto1');
		$location->auto2=$request->input('auto2');
		$location->train=$request->input('train');
		$location->bus=$request->input('bus');
		$location->brief=$request->input('brief');
		
		switch($request->input('relief')){
			case 'Холмы':
				$location->hills=$request->input('relief');
				break;
			case 'Низина':
				$location->valley=$request->input('relief');
				break;
			case 'Плато':
				$location->plato=$request->input('relief');
				break;
		}
		
		switch($request->input('lp')){
			case 'Серая':
				$location->gray=$request->input('lp');
				break;
			case 'Синяя':
				$location->blue=$request->input('lp');
				break;
			case 'Голубая':
				$location->lightblue=$request->input('lp');
				break;
			case 'Зеленая':
				$location->green=$request->input('lp');
				break;
			case 'Желтая':
				$location->yellow=$request->input('lp');
				break;
			case 'Оранжевая':
				$location->orange=$request->input('lp');
				break;
			case 'Красная':
				$location->red=$request->input('lp');
				break;
		}
		
        $filecontroller=new FileController;

		if($request->hasFile('mapimg')){
            $location->mapimg=$filecontroller->uploadmap($request);
            $location->mapimgext=$request->file('mapimg')->extension();
        }
        
		if($request->hasFile('pano')){
			$location->pano=$filecontroller->uploadpano($request);
			$location->panoext=$request->file('pano')->extension();
        }
        
		$location->save();
		
		return redirect()->route('locations.index')->withErrors($validated)->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        $location->delete();
        return redirect()->route('locations.index');
    }
}
