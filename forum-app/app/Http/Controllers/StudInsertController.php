<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\StudInsert;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class StudInsertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student.reply');
    }

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
            return redirect('posts')->with('status', "Insert successfully");
        } catch (Exception $e) {
            return redirect('home')->with('failed', "operation failed");
        }
        // }
    }
}
