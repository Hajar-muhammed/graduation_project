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
        
    public function api(){
      
            // $homepage = file_get_contents('http://127.0.0.1:8000/classify');
            // echo $homepage;
            // return view('diseases.api',["homepage"=>$homepage]); // . or /


            $url = "http://127.0.0.1:8000/classify";
            $ch = curl_init();
            curl_setopt($ch,CURLOPT_URL,$url);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch,CURLOPT_CONNECTTIMEOUT, 4);
            $json = curl_exec($ch);
            return view('diseases.api',["json"=>$json , "ch"=>$ch]); // . or /


    }

}