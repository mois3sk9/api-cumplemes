<?php 

namespace App\Http\Controllers;

use App\Recordatory;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;

class RecordatoriesController extends Controller
{
	public function __construct(){

	}

	public function index() {

		$recordatories = Recordatory::all();

		return response()->json([
			'recordatory'=> $recordatories->toArray()
		]);
	}

	public function store(Request $request) {

		$this->validate($request, [
	       'mensaje' => 'required',
	       'fecha'=>'date|required'
    	 ]);

		$recordatory = new Recordatory();
		$recordatory->mensaje = $request->mensaje;
		$recordatory->fecha = $request->fecha;

		if($recordatory->save()) {
			return response()->json([
				'estado' => 1
			]);
		} 
	}

	public function remove(Request $request) {

		 $this->validate($request, [
	        'id' => 'required|numeric'
    	 ]);

		$recordatory = new Recordatory();
		if($recordatory->destroy($request->id)) {

			return Response()->json(['estado'=>1]);
		}
	}

	public function update(Request $request) {

		$this->validate($request, [
	        'id' => 'required|numeric',
	        'mensaje' =>'required',
	        'fecha' => 'required|date'
    	 ]);
		
		$recordatory = Recordatory::find($request->id);
		//$sitio->id = 1;
		$recordatory->mensaje = $request->mensaje;
		$recordatory->fecha = $request->fecha;
		$recordatory->save();

	}
}