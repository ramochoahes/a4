<?php

namespace App\Http\Controllers;


use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use App\Course; # makes Class model accessible to controller functions below
use Session;# allows sessions
use App\Tag;



class ModelController extends Controller {


    public function createFunction(Request $request) {
      # SETS INFO TO VIEW MAKECLASS

        $allData = Course::all();
        $reusedData = $allData->take(1);
        $username = $request->input('username');
        $description = $request->input('description');
        $category = $request->input('category');
        $other = $request->input('other');

        # SETS INPUT TO DB
        if ($_GET!=null) {

          # Custom error message
         $messages = [
             'author_id.not_in' => 'Author not selected.',
         ];
         $this->validate($request, [
             'username' => 'required|min:3',
             'description' => 'required',
             'category' => 'required',
         ], $messages);

          #$course = Course::all(); # get collection
          $course = new Course(); #not a collection
          $course->username = $request->username;
          $course->description = $request->description;
          $course->category = $request->category;
          $course->other = 'other';
          $course->save();#persists to DB (CREATE part of CRUD)

          # Session used to have memory between page loads
          Session::flash('message', 'Course was added.');
          return view('makeClass')
          # SENDS TO VIEW
          ->with([
            'reusedData'=>$reusedData,
            'allData'=>$allData,

            ])
            ->withUsername($username)
            ->withCourse($course)
            ->withCategory($category);

        }
        # NO DATA, CREATE NEW
        else{

          $course = new Course(); #not a collection
          return view('makeClass')

          # SENDS TO VIEW IF NO DATA
          ->with([
            'reusedData'=>$reusedData,
            'allData'=>$allData,

            ])
            ->withUsername($username)
            ->withCourse($course)
            ->withCategory($category);
        }



    }
    # FINDS EDIT :
    # GETs (gets data to edit)

    public function editFunction(Request $request) {
      #$page = $request->input('username');
      #$allData = Course::all()->username;
      $page = Course::all()->first();# We need this here to work
      #$page = Course::where('username', $id)->first();

      if(is_null($page)){

        Session::flash('message', "User not found.");
        #return "page is null"; # nowhere to return to
        return View('editClass')
        ->withPage($page);
      }

      return View('editClass')
      ->withPage($page);
    }

    # SAVE EDIT
    # POSTs (this will save our data to DB)
    public function SaveEditFunction(Request $request) {


      $this->validate($request, [
          'username' => 'required|min:3',
          'description' => 'required',
          'category' => 'required',
      ]);

      $page = Course::where('username', $request->username)->first();
      $page->username = $request->username;
      $page->description = $request->description;
      $page->category = $request->category;
      $page->other = $request->other;
      $page->save();#persists to DB (CREATE part of CRUD)

echo "saveEditFunction";
      Session::flash('message', 'Changes saved.');
      return redirect('editClass');

    }

# FINDS CLASS TO DELETE
    /**
    * GET FOR READING
    * Page to confirm deletion. responds to a GET request
    */

    public function confirmDelete(Request $request) {
        # Ask if they want to delete it
        $page = Course::where('username', $request->username )->first();

        if(!$page) {

            Session::flash('message', 'Username deleted.');
            return view('makeClass');
        }

echo "confirmDelete";
        return view('deleteClass')->with('page', $page);
    }

    /**
    * POST FOR CREATING AND UPLOADING
    * Actually delete the book from form when confirmed in the above function
    */

    # ACTUAL DELETE
    public function delete(Request $request) {
        # Get the user class to be deleted.
        $page = Course::where('username', $request->searchId)->first();

        if(!$page) {
            Session::flash('message', 'Deletion failed; user not found.');
            return redirect('deleteSearch')->with('page', $page);
        }

        $page->delete();

        # Finish
        Session::flash('message', 'Class was deleted.');
        return redirect('deleteClass')->with('page', $page);
    }


    # SEARCH USERNAME TO DELETE
    public function searchDelete(Request $request) {

      if($_GET!=null){# need to find username list

        $page = Course::where('username', $request->searchId)->first();
        return view('deleteClass')->with('page', $page);
      }
      else {
echo "else";
        $page = Course::where('username', $request->searchId)->first();
        Session::flash('message', 'Username not found.');
        return view('deleteSearch')->with('page', $page);


      }

    }
#{{$page->username}}
#placeholder='{{$username}}' value='{{$username}}'
# {{$category}}


}
