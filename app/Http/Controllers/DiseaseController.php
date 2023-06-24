<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DiseaseController extends Controller
{
    //

   
    public function all(){ //select *
        $diseases = Disease::all(); //query+fetch
        return view('diseases.all',["diseases"=>$diseases]); // . or /

    }
        
    

}