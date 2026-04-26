<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    
    public function index(){

    $services = Service::all();
    return view("services.index", ["servs" => $services]);

    }

    public function store(Request $request){

    Service::create([

    "service_name"=>$request->s_service_name,
    "price"=>$request->s_price,
    "duration"=>$request->s_duration,
    "description"=>$request->s_description


    ]);

    return redirect("/services");

    }

    public function edit($id){

    $service = Service::findOrFail($id);

    return view("services.edit", ["serv" => $service]);

    }

    public function update(Request $request, $id){

    $service = Service::findOrFail($id);

    $service ->update([

    "service_name"=>$request->s_service_name,
    "price"=>$request->s_price,
    "duration"=>$request->s_duration,
    "description"=>$request->s_description

    ]);

    return redirect("/services");

    }

    public function delete($id){

    $service = Service::findOrFail($id);

    $service ->delete();

    return redirect("/services");
    }

}
