<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pfu;

class ApiDataController extends Controller
{

    public function getPfu()
    {
        try {
            $data = Pfu::all(); 

            return response()->json(['data' => $data], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to retrieve data.'], 500);
        }
    }
}
