<?php

namespace App\Http\Controllers;


use Validator;
use Illuminate\Http\Request;
use App\Class; # makes Class model accessible to controller
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
        # if it fails return to the same page with the errors
        if ($validator->fails()) {
    	       return redirect('validation') //change this to your desired url
        		->withErrors($validator)
        		->withInput();
          }
        else {

          return redirect('makeClass');
        }

      }

      return view('validation');
    }


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

    public function returnMakeClass(Request $request){

      return view('makeClass');

    }



      /*public function classFunction() {

          # Instantiate a new Class Model object from our Model file
          $class = new Class();

          # Set the parameters
          # Note how each parameter corresponds to a field in the table]
          $class->username = 'SomeKindaAlien';
          $class->description = 'Description of class';
          $class->category = 'Some category';
          $class->other = 'Other stuff';


          # Invoke the Eloquent `save` method to generate a new row in the
          # `books` table, with the above data
          $class->save();

          dump($class);
      }*/



}
