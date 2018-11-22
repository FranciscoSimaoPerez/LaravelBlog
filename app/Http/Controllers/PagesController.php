<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Laravel Blog'
        ];
        return view('pages.index', compact('data'));
    }
}
