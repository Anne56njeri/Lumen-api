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
  public function showOneAuthor()
  {
    return response()->json(Author::find($id));
  }
  public function create (Request $request)
  {
    $author = Author::create($request->all());
    return response()->json($author, 201);
  }
  public funciton update($id ,Request $request)
  {
    $author = Author::findorFail($id);
    $author->update($request->all());
    return response()->json($author,200);
  }
  public function delete($id)
  {
    Author::findorFail($id)->delete();
    return response('Deleted succefully',200);
  }
}
