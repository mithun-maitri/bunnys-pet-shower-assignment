<?php

namespace App\Http\Controllers\Services;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services;
use App\User;
use App\Types;
use App\ServicesTypesMapping;
use \DB;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {	
    	//DB::enableQueryLog();
		$services = DB::table('services')
		->select(DB::raw('services.id, services.name, GROUP_CONCAT(types.name) as offered_types'))
		->leftJoin('services_types_mapping', 'services.id', '=', 'services_types_mapping.services_id')
		->leftJoin('types', 'services_types_mapping.types_id', '=', 'types.id')
		->groupBy('services.id')
		->get();
    	//echo("<pre>");print_r(DB::getQueryLog());exit;
        return view('pages.services')->with('services', $services);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$types = Types::all();
    	return view('pages.add_services')->with('types', $types);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	if($request->isMethod('post')){
    		$formData = $request->all();
    		$service = new Services();
    		$service->name = $formData['service_name'];
    		$service->created_at = date('Y-m-d H:i:s');
    		$service->updated_at = date('Y-m-d H:i:s');
    		$service->save();
    		$lastInsertedId = $service->id;
    		
    		foreach(explode(',', $formData['selected_pet_types']) as $typeId){
	    		$serviceTypesMapping = new ServicesTypesMapping();
	    		$serviceTypesMapping->services_id = $lastInsertedId;
	    		$serviceTypesMapping->types_id = $typeId;
	    		$serviceTypesMapping->save();
    		}
    		return json_encode(array('success'=>true));
    	}
    	return json_encode(array('success'=>false));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$service = Services::find($id);
    	$serviceTypesMapping = ServicesTypesMapping::select('types_id')->where('services_id', '=', $id)->get()->toArray();
    	$typeIds = [];
    	foreach($serviceTypesMapping as $res){
    		array_push($typeIds, $res['types_id']);
    	}
        $types = Types::all();
    	return view('pages.edit_services')->with('service', $service)->with('types', $types)->with('typeIds', $typeIds);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
    	if($request->isMethod('post')){
    		$formData = $request->all();
    		$service = Services::find($formData['service_id']);
    		$service->name = $formData['service_name'];
    		$service->created_at = date('Y-m-d H:i:s');
    		$service->updated_at = date('Y-m-d H:i:s');
    		$service->save();
    		$lastInsertedId = $formData['service_id'];
    		
     		ServicesTypesMapping::where('services_id', $formData['service_id'])->delete();
    		foreach(explode(',', $formData['selected_pet_types']) as $typeId){
	    		$serviceTypesMapping = new ServicesTypesMapping();
	    		$serviceTypesMapping->services_id = $lastInsertedId;
	    		$serviceTypesMapping->types_id = $typeId;
	    		$serviceTypesMapping->save();
    		}
    		return json_encode(array('success'=>true));
    	}
    	return json_encode(array('success'=>false));
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if($id){
        	Services::find($id)->delete();
        	return redirect('services');
        }
    }
}
