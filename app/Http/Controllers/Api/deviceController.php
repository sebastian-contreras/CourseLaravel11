<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Device;
use Illuminate\Http\Request;

class deviceController extends Controller
{
    //
    public function getAllDevices(){
        $devices = Device::all();
        return response()->json($devices);
    }

    public function getDevice($id){
        $device = Device::with('student')->find( $id );
        return response()->json($device);
    }
}
