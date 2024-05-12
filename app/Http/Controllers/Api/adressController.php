<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Adress;
use Illuminate\Http\Request;

class adressController extends Controller
{
    //
    public function getAdressStudent($id)
    {
        $adress = Adress::with('student')->find($id);
        // $adress = Adress::find($id);

        return response()->json($adress);
    }
}
