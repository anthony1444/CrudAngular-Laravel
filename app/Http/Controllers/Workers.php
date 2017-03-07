<?php

namespace App\Http\Controllers;

use App\Worker;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class Workers extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id = null) {
        if ($id == null) {
        	$workers=Worker::orderBy('id', 'asc');
        	$workers->each(function($workers){
        			$workers->charge;
        	});
            return $workers->get();
        } else {
            return $this->show($id);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) {
        $Worker = new Worker($request->All());
        $Worker->save();

        return 'Worker record successfully created with id ' . $Worker->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        return Worker::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {
        $worker = Worker::find($id);
        $worker->cedula=$request->cedula;
        $worker->nombre = $request->nombre;
        $worker->apellido = $request->apellido;
        $worker->email = $request->email;
        $worker->charge = $request->charge;
        $worker->save();

      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $Worker = Worker::find($id);

        $Worker->delete();

        return "Worker record successfully deleted #" . $id;
    }
} 