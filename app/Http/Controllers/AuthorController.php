<?php

namespace App\Http\Controllers;

use App\Author;

use Illuminate\Http\Request;
/*
we require the author model
we have five methods
we return the response in json format
In the  first function we get all the authors details
*/
class AuthorController extends Controller
{

    public function showAllAuthors()
    {
        return response()->json(Author::all());
    }

    public function showOneAuthor($id)
    {
        return response()->json(Author::find($id));
    }
    /*
    we validate any user that wants to send data to the the api
    */
    public function create(Request $request)
    {
      $this->validate($request, [
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'location' => 'required|alpha'
      ]);
        $author = Author::create($request->all());

        return response()->json($author, 201);
    }

    public function update($id, Request $request)
    {
        $author = Author::findOrFail($id);
        $author->update($request->all());

        return response()->json($author, 200);
    }

    public function delete($id)
    {
        Author::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}
