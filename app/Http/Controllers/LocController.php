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
    $validated = $request->validated();

    $location = new Location;
    
    $location->name = $request->input('name');
    $location->lat = $request->input('lat');
    $location->long = $request->input('long');
    $location->description = $request->input('description');
    $location->distance = $request->input('distance');
    $location->host = $request->input('host');
    $location->sqm = $request->input('sqm');
    $location->code = $request->input('code');
    $location->url_gmap = $request->input('url_gmap');
    $location->url_wiki = $request->input('url_wiki');
    $location->url_openstr = $request->input('url_openstr');
    $location->link_ody = $request->input('link_ody');
    $location->south = $request->has('south') ? 'На юге' : null;
    $location->north = $request->has('north') ? 'На севере' : null;
    $location->west = $request->has('west') ? 'На западе' : null;
    $location->east = $request->has('east') ? 'На востоке' : null;
    $location->auto1 = $request->has('auto1') ? 'Автомобиль (легковой)' : null;
    $location->auto2 = $request->has('auto2') ? 'Автомобиль (внедорожник)' : null;
    $location->train = $request->has('train') ? 'Поезд' : null;
    $location->bus = $request->has('bus') ? 'Автобус' : null;
    $location->brief = $request->input('brief');
    
    $relief = $request->input('relief');
    if ($relief == 'Холмы') {
        $location->hills = 'Холмы';
    } elseif ($relief == 'Низина') {
        $location->valley = 'Низина';
    } elseif ($relief == 'Плато') {
        $location->plato = 'Плато';
    }

    $lp = $request->input('lp');
    if ($lp == 'Серая') {
        $location->gray = 'Серая';
    } elseif ($lp == 'Синяя') {
        $location->blue = 'Синяя';
    } elseif ($lp == 'Голубая') {
        $location->lightblue = 'Голубая';
    } elseif ($lp == 'Зеленая') {
        $location->green = 'Зеленая';
    } elseif ($lp == 'Желтая') {
        $location->yellow = 'Желтая';
    } elseif ($lp == 'Оранжевая') {
        $location->orange = 'Оранжевая';
    } elseif ($lp == 'Красная') {
        $location->red = 'Красная';
    }
    
    $filecontroller = new UploadController;

    if ($request->hasFile('mapimg')) {
        $location->mapimg = $filecontroller->uploadmap($request);
        $location->mapimgext = $request->file('mapimg')->extension();
    }
    
    if ($request->hasFile('pano')) {
        $location->pano = $filecontroller->uploadpano($request);
        $location->panoext = $request->file('pano')->extension();
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
    $validated = $request->validated();

    $location->name = $request->input('name');
    $location->lat = $request->input('lat');
    $location->long = $request->input('long');
    $location->description = $request->input('description');
    $location->distance = $request->input('distance');
    $location->host = $request->input('host');
    $location->sqm = $request->input('sqm');
    $location->code = $request->input('code');
    $location->url_gmap = $request->input('url_gmap');
    $location->url_wiki = $request->input('url_wiki');
    $location->url_openstr = $request->input('url_openstr');
    $location->link_ody = $request->input('link_ody');
    $location->south = $request->has('south') ? 'На юге' : null;
    $location->north = $request->has('north') ? 'На севере' : null;
    $location->west = $request->has('west') ? 'На западе' : null;
    $location->east = $request->has('east') ? 'На востоке' : null;
    $location->auto1 = $request->has('auto1') ? 'Автомобиль (легковой)' : null;
    $location->auto2 = $request->has('auto2') ? 'Автомобиль (внедорожник)' : null;
    $location->train = $request->has('train') ? 'Поезд' : null;
    $location->bus = $request->has('bus') ? 'Автобус' : null;
    $location->brief = $request->input('brief');

    $location->hills = null;
    $location->valley = null;
    $location->plato = null;
    
    $relief = $request->input('relief');
    if ($relief == 'Холмы') {
        $location->hills = 'Холмы';
    } elseif ($relief == 'Низина') {
        $location->valley = 'Низина';
    } elseif ($relief == 'Плато') {
        $location->plato = 'Плато';
    }

    $location->gray = null;
    $location->blue = null;
    $location->lightblue = null;
    $location->green = null;
    $location->yellow = null;
    $location->orange = null;
    $location->red = null;
    
    $lp = $request->input('lp');
    if ($lp == 'Серая') {
        $location->gray = 'Серая';
    } elseif ($lp == 'Синяя') {
        $location->blue = 'Синяя';
    } elseif ($lp == 'Голубая') {
        $location->lightblue = 'Голубая';
    } elseif ($lp == 'Зеленая') {
        $location->green = 'Зеленая';
    } elseif ($lp == 'Желтая') {
        $location->yellow = 'Желтая';
    } elseif ($lp == 'Оранжевая') {
        $location->orange = 'Оранжевая';
    } elseif ($lp == 'Красная') {
        $location->red = 'Красная';
    }

    $filecontroller = new UploadController;

    if ($request->hasFile('mapimg')) {
        $location->mapimg = $filecontroller->uploadmap($request);
        $location->mapimgext = $request->file('mapimg')->extension();
    }
    
    if ($request->hasFile('pano')) {
        $location->pano = $filecontroller->uploadpano($request);
        $location->panoext = $request->file('pano')->extension();
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
