<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\StudInsert;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use SebastianBergmann\ObjectEnumerator\Exception;

class StudInsertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $data = Post::orderBy('id', 'DESC')->paginate(5);
        return view('posts.index', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
/////////////////////////////////////////////////////////
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $insert = StudInsert::create([
                'title' =>  $request->input('title'),
                'body' => $request->input('body'),
                'user_id' => Auth::user()->id,

            ]);
            return redirect('index')->with('status', "Insert successfully");
        } catch (Exception $e) {
            return redirect('home')->with('failed', "operation failed");
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    ///////////////////////////////////////////////
   
   
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    ///////////////////////////////////////////////
   


    
    /////////////////////////////////////////////////////////////////////
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



    public function destroy($id)
    {
        $post = StudInsert::find($id);
        $post->delete();
        return redirect('/')->with('status', 'data Deleted successfully');
    }
}
