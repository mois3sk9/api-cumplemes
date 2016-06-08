<?php 

namespace App\Http\Controllers;

use App\Sitio;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;

class SitiosController extends Controller
{
	public function __construct(){

	}

	public function index() {

		$sitios = Sitio::all();

		return response()->json([
			'sitios'=> $sitios->toArray()
		]);
	}

	public function store(Request $request) {

		$this->validate($request, [
	       'nombre' => 'required',
	       'descripcion'=>'required',
	       'lat' => 'required',
	       'lon' => 'required'
    	 ]);

		$sitio = new Sitio();
		$sitio->lat = $request->lat;
		$sitio->lon = $request->lon;
		$sitio->nombre = $request->nombre;
		$sitio->descripcion = $request->descripcion;

		if($sitio->save()) {
			return response()->json([
				'estado' => 1
			]);
		} 
	}

	public function remove(Request $request) {

		 $this->validate($request, [
	        'id' => 'required|numeric'
    	 ]);

		$sitio = new Sitio();
		if($sitio->destroy($request->id)) {

			return Response()->json(['estado'=>1]);
		}
	}

	public function update(Request $request) {

		$this->validate($request, [
	        'id' => 'required|numeric'
    	 ]);

		$sitio = Sitio::find($request->id);
		//$sitio->id = 1;
		$sitio->nombre = $request->name;
		$sitio->lat = $request->lat;
		$sitio->lon = $request->lon;
		$sitio->descripcion = $request->descripcion;
		$sitio->save();

	}
}