<?php
namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // GET ALL BOOKS
    public function getAll()
    {
        try {
            $books = Book::all();
            return response()->json(['status' => 'success', 'data' => $books], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
    // GET ONE BOOK
    public function getOne($id)
    {
        try {
            $book = Book::find($id);
            if(!$book) return response()->json(['status' => 'error', 'message' => 'Book not found'], 404);
            return response()->json(['status' => 'success', 'data' => $book], 200);
        } catch (\Exception $e){
            return response()->json(['status'=>'error', 'message'=>$e->getMessage()], 500);
        }
    }
    // CREATE BOOK
    public function create(Request $request)
    {
        try {
            $book = Book::create($request->all());
            return response()->json(['status'=>'success', 'data'=>$book], 201);
        } catch(\Exception $e){
            return response()->json(['status'=>'error', 'message'=>$e->getMessage()], 500);
        }
    }
    // UPDATE BOOK
    public function update(Request $request, $id)
    {
        try {
            $book = Book::find($id);
            if(!$book) return response()->json(['status'=>'error', 'message'=>'Book not found'], 404);
            $book->update($request->all());
            return response()->json(['status'=>'success', 'data'=>$book], 200);
        } catch(\Exception $e){
            return response()->json(['status'=>'error', 'message'=>$e->getMessage()], 500);
        }
    }
    // DELETE BOOK
    public function delete($id)
    {
        try {
            $book = Book::find($id);
            if(!$book) return response()->json(['status'=>'error', 'message'=>'Book not found'], 404);
            $book->delete();
            return response()->json(['status'=>'success', 'data'=>'Book deleted'], 200);
        } catch(\Exception $e){
            return response()->json(['status'=>'error', 'message'=>$e->getMessage()], 500);
        }
    }

    public function filterBooksByParam($author, $year)
{
    try {
        $books = Book::where('author', $author)->where('year', $year)->get();
        if ($books->isEmpty()) return response()->json(['status' => 'error', 'message' => 'Book not found'], 404);
        return response()->json(['status' => 'success', 'data' => $books], 200);
    } catch (\Exception $e) {
        return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
    }
}
public function filterBooksByQuery(Request $request)
{
    try {
        $books = Book::where('author', $request->author)->where('year', $request->year)->get();
        if ($books->isEmpty()) return response()->json(['status' => 'error', 'message' => 'Book not found'], 404);
        return response()->json(['status' => 'success', 'data' => $books], 200);
    } catch (\Exception $e) {
        return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
    }
}
}