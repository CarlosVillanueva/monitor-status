<?php

namespace App\Http\Controllers;
// use Auth;

use Illuminate\Http\Request;
use App\Models\Propiedades_authservice as authservice;
use App\Models\Propiedades_firmapp as firmappservice;



class PageController extends Controller
{

    public function index()
    {
        $databdauth = authservice::all();
        $databdfirmapp = firmappservice::all();

        // dd($databdauth);
        $contador = 0;
        $data = array();
        $dataf = array();
        $datae = array();
        $datac = array();
        
        foreach($databdauth as $urls){
            //var_dump($servicios);
            // dd($urls);
            // $contador = 0;
            $datos = json_decode($urls);
            $urlvalor = $datos->valor;
            $nombre = $datos->nombre;
            $tipo = $datos->tipo;

            // $respuesta = shell_exec('ping '.$urlvalor);
            // dd($respuesta);    
            $curl = curl_init();    

            curl_setopt_array($curl, array(
            CURLOPT_URL => $urlvalor,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $tipo,
            CURLOPT_HTTPHEADER => array(
                'Cookie: symfony=ok9alcpbj169u4qjmjin877n32'
            ),
            ));
    
            $response = curl_exec($curl);
    
            // curl_close($curl);
            // echo $response;
            $estado = curl_getinfo($curl);
            // dd($estado);
            // $estado = json_decode($estado);
            $url = $estado['url'];
            $httpcode = $estado['http_code'];
            // $time = $estado['total_time_us'];
            //definir variables a analisar
            $data['url'] = $url;
            $data['http_code'] = $httpcode;
            // $data['total_time_us'] = $time;
            $data['name'] = $nombre;
            $data['tipo'] = $tipo;


            array_push($dataf,$data); 
            // dd($dataf);
            // curl_close($curl);
            $contador++;
            curl_close($curl);
        }

        foreach($databdfirmapp as $urlsf){
            //var_dump($servicios);
            // dd($urls);
            // $contador = 0;
            $datos = json_decode($urlsf);
            $urlvalor = $datos->valor;
            $nombre = $datos->nombre;
            $tipo = $datos->tipo;


            // $respuesta = shell_exec('ping '.$urlvalor);
            // dd($respuesta);    

            $curl = curl_init();    

            curl_setopt_array($curl, array(
            CURLOPT_URL => $urlvalor,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $tipo,
            CURLOPT_HTTPHEADER => array(
                'Cookie: symfony=ok9alcpbj169u4qjmjin877n32'
            ),
            ));
    
            $response = curl_exec($curl);
    
            // curl_close($curl);
            // echo $response;
            $estado = curl_getinfo($curl);
            // dd($estado);
            // $estado = json_decode($estado);
            $url = $estado['url'];
            $httpcode = $estado['http_code'];
            // $time = $estado['total_time_us'];
            //definir variables a analisar
            $datae['url'] = $url;
            $datae['http_code'] = $httpcode;
            // $datae['total_time_us'] = $time;
            $datae['name'] = $nombre;
            $datae['tipo'] = $tipo;


            array_push($datac,$datae); 
            // dd($dataf);
            // curl_close($curl);
            $contador++;
            curl_close($curl);
        }
        // dd($dataf);
        // dd(json_encode($dataf));
        //   for ($i=0; $i < $dataf ; $i++) { 
        //     //  array_push($dataf,$data); 
        //   }
        return view('home')->with(['authservice'=>$dataf,'firmappservice'=>$datac]);
    }

}


