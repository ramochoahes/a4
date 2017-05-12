<?php

namespace App\Http\Controllers;


use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use App\Course; # makes Class model accessible to controller functions below

class ModelController extends Controller {


    public function courseFunction(Request $request) {

        /*
        # Instantiate a new Course Model object from our Model file
        $course = new Course();

        # Set the parameters
        # Note how each parameter corresponds to a field in the table]
        $course->username = 'SomeKindaAlien';
        $course->description = 'Description of class';
        $course->category = 'Some category';
        $course->other = 'https://www.w3schools.com/css/trolltunga.jpg';
        # Invoke the Eloquent `save` method to generate a new row in the
        # `books` table, with the above data
        #$course->save();
        */



        $allData = Course::all();
        $reusedData = $allData->sortByDesc('username')->take(3);
        $username = $request->input('username');
$course = Course::all();

        if ($request!=null) {
          echo "hello";
          $course = new Course();

          $course->username = $request->username;
          $course->description = $request->description;
          $course->category = $request->category;
          $course->other = 'https://www.w3schools.com/css/trolltunga.jpg';
          #$course->save();
#dump($course);

          return view('makeClass')->with([

            'reusedData'=>$reusedData,
            'allData'=>$allData,

            ])->withUsername($username)->withCourse($course);


        }

        else{
          echo "hi again";
          return view('makeClass')->with([

            'reusedData'=>$reusedData,
            'allData'=>$allData,

            ])->withUsername($username)->withCourse($course);
        }





    }



    #return redirect ('makeClass');

          /*
          $test = Course::all(); # returns the collection
          $test = Course::orderBy('created_at', 'decending')->limit(1)->get();


          echo $test; # JSON string object returned

          foreach ($test as $tests){
            dump($tests['username']);
          } #array returned without needing to convert it into one

          foreach ($test as $tests){
            dump($tests->username);
          }# collection object returned
          */
    /*
    @foreach ($username as $usernameTest)
      <h2>  {{$usernameTest['username']}} </h2>
    @endforeach
    */




}
