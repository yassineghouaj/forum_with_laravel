<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\StudReply;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StudReplyController extends Controller
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
    public function reply(Request $request)
    {

        try {

            $reply = StudReply::create([
                'reply' =>  $request->input('reply'),
                'user_id' =>  Auth::user()->id,
                'post_id' =>  $request->input('post_id'),


            ]);
            
             return redirect('posts')->with('status', "replyed  successfully");
        } catch (Exception $e) {
             return redirect('reply')->with('failed', "operation failed");
        }
        // }
    }
}
