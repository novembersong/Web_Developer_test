<?php

namespace App\Http\Controllers;

use App\Models\CodeGenerators;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CodeGeneratorController extends Controller
{
    public function index(){
        $min_date = new \DateTime('2021-01-01');

        $max_date = new \DateTime('2021-03-30');

        $max_date = $max_date->modify( '+1 day' );

        $interval = new \DateInterval('P1D');
        $daterange = new \DatePeriod($min_date, $interval ,$max_date);

            foreach($daterange as $date) {

                $date = $date->format("d-F-Y");

                //get random code 6 digits
                $pass = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 6);

                if (ctype_alpha($pass) != true && ctype_digit($pass)!= true){
                    for($i=0; $i<strlen($pass);$i++){
                        for($k=0;$k<strlen($pass);$k++){
                            if($pass[$i] == $pass[$k] && $i != $k){
                                // if find same alphanumeric
                                dd($pass[$k]." is duplicate");
                            }

                        }
                    }

//            dd("code is :".$pass);
                    $code = $pass;

                    $code_store = new CodeGenerators();
                    $code_store->date = $date;
                    $code_store->code = $code;
                    $code_store->save();
                }

            }

        return redirect()->route('code.list');
    }

    public function showCode(){
        $data = CodeGenerators::all();

        return view('codeGenerator.show',compact('data'));
    }

    public function showDetailCode($id){
        $data = CodeGenerators::all();
        $code = CodeGenerators::where('date','=',$id)->pluck('code');
//        dd($code);

        return response()->json([
            'data' => $data,
            'code' => $code
        ]);
    }
}
