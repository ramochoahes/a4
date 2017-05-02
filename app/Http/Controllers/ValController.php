<?php

namespace App\Http\Controllers;


use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;

class ValController extends Controller
{

    public function getVal(Request $request) {

      if ($_GET) {

        $validator = Validator::make($request->all(), [
            	'email' => 'required',
            	'password' => 'required',
                ]);

        if ($validator->fails()) {
    	       return redirect('index') //change this to your desired url
        		->withErrors($validator)
        		->withInput();
          }
        else {

          return redirect('site');
        }

      }

      return view('index');
    }

    /*public function returnIndex(){
      return view('index');

    }*/

    public function returnSite(Request $request){

      $correct = "Correct";
      $wrong = "Wrong";

      if(Input::get('Yes')!=null){

        return view('sitetwo');

      }

      return view('site')->withCorrect($correct)->withWrong($wrong);

    }

    public function returnSiteTwo(Request $request){

      $correct = "Correct";
      $wrong = "Wrong";
      return view('sitetwo')->withCorrect($correct)->withWrong($wrong);

    }


}
