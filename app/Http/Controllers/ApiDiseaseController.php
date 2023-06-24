<?php

namespace App\Http\Controllers;

use App\Http\Resources\DiseaseResource;
use App\Models\Disease;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Ixudra\Curl\Facades\Curl;

class ApiDiseaseController extends Controller
{
    public function all(){
        $diseases = Disease::all();
        return DiseaseResource::collection($diseases);
    }

    public function show($id){
        $disease =  Disease::find($id);
        if($disease == null){
             return response()->json([
                 "msg"=>"This Disease Not Found",404
             ]);
         }
        return new DiseaseResource($disease);
   }
    
   

    public function classify (Request $request) {
        $validator =  Validator::make($request->all(),[
            "image"=>'required|image|mimes:png,jpg,jpeg,gif'
        ]);
        if($validator->fails()){
            return response()->json([
                "msg"=>$validator->errors()
            ,409]);
        }else{
            $image_name= Storage::putFile("images",$request->image);
            $fieldName = 'file';
            $pathToFile = storage_path('app/public/'.$image_name);
            $endpoint = 'http://127.0.0.1:8000/classify';
            $response = Curl::to($endpoint)
                ->withFile($fieldName, $pathToFile)
                ->post();
            Storage::delete($image_name);

            $arr = json_decode($response);
            $id=0;   
            for($i=0; $i<=6; $i++){
                if ($arr[0] == $i){
                    $id= $i+1;
                } elseif($arr[1]== $i){
                        $id= $i+1;
                }
            }
            $disease =  Disease::find($id);
            $name = $disease->name;
            return response()->json([
              "disease"=>$name
            ]);
  
        }   
        
    }
}
