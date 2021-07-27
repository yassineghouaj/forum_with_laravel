<?php

namespace App\Http\Controllers;

use App\Http\Middleware\isAdmin;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function __construct(){

         return $this->middleware(isAdmin::class);
        
    }

    public function single()
    {
        return view('threads.show');
    }

    public function create()
    {
        return view('threads.create');
    }

    public function users()
    {
        return view('admin.users.index');
    }

    public function categoriesIndex()
    {
        return view('admin.categories.index');
    }

    public function categoriesCreate()
    {
        return view('admin.categories.create');
    }

    public function threadsIndex()
    {
        return view('admin.threads.index');
    }
}