<?php 

namespace App\Http\Controllers;

use App\Recomendation;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;

class RecomendationsController extends Controller
{
	public function __construct(){

	}

	public function index() {

		$recomendations = Recomendation::all();

		return response()->json([
			'recomendation'=> $recomendations->toArray()
		]);
	}

	public function store(Request $request) {

		$this->validate($request, [
	       'nombre' => 'required',
	       'descripcion'=>'required'
    	 ]);

		$recomendation = new Recomendation();
		$recomendation->nombre = $request->nombre;
		$recomendation->descripcion = $request->descripcion;

		if($recomendation->save()) {
			return response()->json([
				'estado' => 1
			]);
		} 
	}

	public function remove(Request $request) {

		 $this->validate($request, [
	        'id' => 'required|numeric'
    	 ]);

		$recomendation = new Recomendation();
		if($recomendation->destroy($request->id)) {

			return Response()->json(['estado'=>1]);
		}
	}

	public function update(Request $request) {

		$this->validate($request, [
	        'id' => 'required|numeric'
    	 ]);

		$recomendation = Recomendation::find($request->id);
		//$sitio->id = 1;
		$recomendation->nombre = $request->nombre;
		$recomendation->descripcion = $request->descripcion;
		$recomendation->save();

	}
}