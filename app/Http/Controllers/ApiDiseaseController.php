<?php

namespace App\Http\Controllers;

use App\Http\Resources\DiseaseResource;
use App\Models\Disease;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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


    public function api(){
        
    $url = "http://127.0.0.1:8000/classify";
    $image = asset("storage/diseases/1.png");
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_POST,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$image);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    $resp = curl_exec($ch);
    if($e =curl_exec($ch)) {
        echo $e;
    }else{
    return(json_decode($resp));
        
    curl_close($ch);

    }
    // $response = Http::get('http://127.0.0.1:8000/classify');
    // $response->body();
    // $data =  $response->json();

    // $url = 'http://127.0.0.1:8000/classify';
    // $data = array('key1' => 'value1', 'key2' => 'value2');

    // // use key 'http' even if you send the request to https://...
    // $options = array(
    //     'http' => array(
    //         'header'  => "Content-type: multipart/form-data\r\n",
    //         'method'  => 'POST',
    //         'content' => http_build_query($data)
    //     )
    // );
    // $context  = stream_context_create($options);
    // $result = file_get_contents($url, false, $context);
    // if ($result === FALSE) { /* Handle error */ }

    // var_dump($result);



    // $url = "http://127.0.0.1:8000/classify";
    // $image = asset("storage/diseases/1.png");

    // $ch = curl_init();
    // curl_setopt_array($ch, [
    //     CURLOPT_URL => $url,
    //     CURLOPT_RETURNTRANSFER => true,
    //     CURLOPT_POST => true,
    //     CURLOPT_POSTFIELDS => [
    //         'file' => new \CurlFile($image, 'image/png', $image)
    //     ],
    //     CURLOPT_HTTPHEADER => [
    //         'Accept: application/json',
    //         'Content-Type: multipart/form-data',   
    //     ],
    // ]);
    // $resp = curl_exec($ch);

    // if($e =curl_exec($ch)) {
    //     echo $e;
    // }else{
    //    return(json_decode($resp));
        
    // curl_close($ch);

    // }
    }

    public function upload(Request $request){
        $validator =  Validator::make($request->all(),[
            "image"=>'required|image|mimes:png,jpg,jpeg,gif'
        ]);
    if($validator->fails()){
        return response()->json([
            "msg"=>$validator->errors()
        ,409]);
    }else{
        $image_name= Storage::putFile("images",$request->image);
    }


    //ده المفروض نبقى نرجع فيه المرض 
    //    return response()->json([
    //     "category"=>"category created successfuly"
    //    ,201]);
        
    }
}
