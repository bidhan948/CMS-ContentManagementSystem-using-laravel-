<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class page extends Controller
{
    function listing()
    {
        $data['result'] = DB::table('pages')->orderby('id', 'desc')->get();
        return view('admin.page.list', $data);
    }

    function submit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:pages',
            'description' => 'required',
        ]);

        $data = array(
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
            'description' => $request->input('description'),
            'status' => 1,
            'added_on' => date('Y-m-d h:i:s')
        );
        DB::table('pages')->insert($data);
        $request->session()->flash('msg', 'page has been sucessfully added');
        return redirect('admin/page/list');
    }

    function delete(Request $request, $id)
    {
        if ($data['result'] = DB::table('pages')->where('id', $id)->delete()) {
            $request->session()->flash('msg', 'page deleted sucessfully');
            return redirect('admin/page/list');
        } else {
            $request->session()->flash('msg', 'something error occured try again');
            return redirect('admin/page/list');
        }
    }

    function edit(Request $request, $id)
    {
        $data['result'] = DB::table('pages')->where('id', $id)->get();
        return view('admin.page.edit', $data);
    }


    function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
        ]);

        $data = array(
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
            'description' => $request->input('description'),
            'post_date' => $request->input('post_date'),
            'status' => 1,
            'added_on' => date('Y-m-d h:i:s')
        );

       if (DB::table('pages')->where('id',$id)->update($data)){
            $request->session()->flash('msg', 'page has been sucessfully updated');
            return redirect('admin/page/list');
       }
       else{
            $request->session()->flash('msg', 'update failed');
            return redirect('admin/page/list');
       }
    }
}
