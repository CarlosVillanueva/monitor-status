<?php

namespace App\Http\Controllers;
// use Auth;

use Illuminate\Http\Request;
use App\Models\Propiedades as propied;


class PageController extends Controller
{

    public function index()
    {
        $databd = propied::all();
        // dd($data);
        $contador = 0;
        $data = array();
        $dataf = array();
        
        foreach($databd as $urls){

            //var_dump($servicios);
            // dd($urls);
            // $contador = 0;

            $datos = json_decode($urls);
            $urlvalor = $datos->valor;
            // dd($urlvalor);    
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => $urlvalor,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Cookie: symfony=ok9alcpbj169u4qjmjin877n32'
            ),
            ));
    
            $response = curl_exec($curl);
    
            // curl_close($curl);
            // echo $response;
            $estado = curl_getinfo($curl);
            // $estado = json_decode($estado);
            $url = $estado['url'];
            $httpcode = $estado['http_code'];
            $time = $estado['total_time_us'];
            //definir variables a analisar
            $data['url'] = $url;
            $data['http_code'] = $httpcode;
            $data['total_time_us'] = $time;


            array_push($dataf,$data); 

            // dd($dataf);

            // curl_close($curl);
            $contador++;
            curl_close($curl);


        }
        dd($dataf);
        dd(json_encode($dataf));
        //   for ($i=0; $i < $dataf ; $i++) { 
        //     //  array_push($dataf,$data); 
        //   }

        return view('home')->with(['data'=>$dataf]);
    }

}


