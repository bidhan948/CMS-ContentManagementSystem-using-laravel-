<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class contact extends Controller
{
    function listing()
    {
        $data['result'] = DB::table('contacts')->orderby('id', 'desc')->get();
        return view('admin.contact.list', $data);
    }
}
