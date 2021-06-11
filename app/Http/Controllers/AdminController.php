<?php

namespace App\Http\Controllers;

use App\Admin;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('IsLogin');
    }

    public function index(Request $request) {
        if ($request->ajax()) {
            $data = Admin::all();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                           return '
                           <button class="btn btn-info btn-sm mr-1" onclick="modal_detail(\''.route('admin.show', $data->id).'\', \'Detail data ' . $data->name . '\')"><i class="fa fa-fw fa-list"></i></button>

                           <a href="'.route('admin.edit', $data->id).'" class="btn btn-warning btn-sm mr-1"><i class="fa fa-fw fa-edit"></i></a>

                           <button class="btn btn-danger btn-sm" onclick="confirm_delete(\''.route('admin.destroy', $data->id).'\', \'Are you sure want to delete ' . $data->name . '?\')"><i class="fa fa-fw fa-trash"></i></button>
                            ';
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.index');
    }

    public function store(Request $request) {
        $request->validate(
            [
                'username' => 'required',
                'password' => 'required|confirmed',
                'password_confirmation' => 'required',
                'name' => 'required',
            ], [],
            [
                'username' => 'Username',
                'password' => 'Password',
                'password_confirmation' => 'Confirm Password',
                'name' => 'Name',
            ]);
        DB::beginTransaction();
        try{
            $admin = Admin::create($request->all());
            DB::commit();
            return redirect()->back()->with(['msg' => ['type' => 'success', 'msg' => 'Data ' . $admin->name . ' Added Successfully']]);
        }catch(Exception $ex){
            DB::rollback();
            return redirect()->back()->with(['msg' => ['type' => 'danger', 'msg' => 'Error occurs']]);
        }
    }

    public function show(Admin $admin) {
        return view('admin.detail', ['data' => $admin]);
    }

    public function edit(Admin $admin) {
        return view('admin.edit', ['data' => $admin]);
    }

    public function update(Request $request, Admin $admin) {
        $request->validate(
            [
                'username' => 'required',
                'name' => 'required',
            ], [],
            [
                'username' => 'Username',
                'name' => 'Name',
            ]);
        if($request->password || $request->password_confirmation){
            $request->validate(
                [
                    'password' => 'required|confirmed',
                    'password_confirmation' => 'required',
                ], [],
                [
                    'password' => 'Password',
                    'password_confirmation' => 'Confirm Password',
                ]);
        }
        DB::beginTransaction();
        try{
            if($request->password || $request->password_confirmation){
                $admin->update($request->all());
            }else{
                $admin->update($request->except(['password']));
            }
            DB::commit();
            return redirect()->back()->with(['msg' => ['type' => 'success', 'msg' => 'Data ' . $admin->name . ' Updated Successfully']]);
        }catch(Exception $ex){
            DB::rollback();
            return redirect()->back()->with(['msg' => ['type' => 'danger', 'msg' => 'Error occurs']]);
        }
    }

    public function destroy(Admin $admin) {
        DB::beginTransaction();
        try{
            $admin->delete();
            DB::commit();
            session()->flash('msg', ['type' => 'success', 'msg' => 'Data ' . $admin->name . ' Deleted Successfully']);
            return responseApi(200, route('admin.index'), 'ok');
        }catch(Exception $ex){
            DB::rollback();
            return redirect()->back()->with(['msg' => ['type' => 'danger', 'msg' => 'Terjadi kesalahan tidak terduga']]);
        }
    }
}
