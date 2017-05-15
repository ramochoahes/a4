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

dump($request->username);
dump($_GET);
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

          $course = new Course(); #not a collection
          #$course = Course::all(); # get collection
          $course->username = $request->username;
          $course->description = $request->description;
          $course->category = $request->category;
          $course->other = 'other';
          $course->save();#persists to DB (CREATE part of CRUD)



          # Session used to have memory between page loads
          Session::flash('message', 'Course was added.');
echo "Create: if not null";
          return view('makeClass');
          /*->with([

            'reusedData'=>$reusedData,
            'allData'=>$allData,

            ])->withUsername($username)->withCourse($course)->withCategory($category);*/

        }

        else{
echo "Hello from else : No _GET data";
          $course = new Course(); #not a collection
          return view('makeClass');
          /*->with([

            'reusedData'=>$reusedData,
            'allData'=>$allData,

            ])->withUsername($username)->withCourse($course)->withCategory($category);*/
        }


# EDIT
    }
    # GET
    public function editFunction(Request $request) {
#$page = $request->input('username');
      $allData = Course::all();
      $page = Course::where('username', "Broly")->first();# We need this here to work

#dump($$request->searchId);
      if(is_null($page)){

        Session::flash('message', "User not found.");
        return; # nowhere to return to

      }

echo "editFunction";
      return View('editClass')
      ->withPage($page);
    }

# SAVE EDIT
    # POST (this will save our data to DB)
    #request passed so we can get data from the form
    public function SaveEditFunction(Request $request) {


      $this->validate($request, [
          'username' => 'required|min:3',
          'description' => 'required',
          'category' => 'required',
      ]);

      # instead of instatiating a new book like in the create, here we fetched it
      $page = Course::where('username', "Broly")->first();
      #$test = $request->id2;
dump($request->searchId);

      $page->username = $request->username;
      $page->description = $request->description;
      $page->category = $request->category;
      $page->other = $request->other;
      $page->save();#persists to DB (CREATE part of CRUD)
echo "saveEditFunction";
      Session::flash('message', 'Changes saved.');
      return redirect('editClass');

    }

    /**
    * GET FOR READING
    * Page to confirm deletion. responds to a GET request
    */

    public function confirmDelete(Request $request) {
        # Get the book task if they want to delete it
        #$page = Course::where('username', $request->username )->first();
        $page = Course::where('username', "SomeKindaAlien")->first();
dump($request->searchId);
        if(!$page) {
            Session::flash('message', 'Username not found.');
            return redirect('deleteClass');
        }
echo "confirmDelete";
        return view('deleteClass')->with('page', $page);
    }

    /**
    * POST FOR CREATING AND UPLOADING
    * Actually delete the book from form when confirmed in the above function
    */


    public function delete(Request $request) {
        # Get the book to be deleted.
        $page = Course::where('username', $request->searchId)->first();
dump($request->searchId);
        if(!$page) {
            Session::flash('message', 'Deletion failed; user not found.');
            return redirect('deleteSearch');
        }

        $page->delete();
echo "delete";
        # Finish
        Session::flash('message', 'Class was deleted.');
        return redirect('deleteClass');
    }



    public function searchDelete(Request $request) {


echo "searchDelete";
dump($request->searchId);

      if($_GET!=null){
        $page = Course::where('username', $request->searchId)->first();
        return view('deleteClass')->with('page', $page);
      }
      else {
        $page = Course::where('username', "SomeKindaAlien")->first();
        return view('deleteSearch')->with('page', $page);


      }



    }
#{{$page->username}}
#placeholder='{{$username}}' value='{{$username}}'
# {{$category}}


}
