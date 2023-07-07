<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user=array();
        if(session()->has('loginid'))
        {
            $user=User::where('id',session()->get('loginid'))->first();

        }
        $tasks=Task::orderBy('created_at', 'desc')->where('user_id',$user->id)->simplePaginate(15);
        return view('task.index',compact('tasks','user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $user=User::where('id',session()->get('loginid'))->first();
        $inputs=$request->all();
        $inputs['user_id']=$user->id;
        $realTimestampStart=substr($request->date,0,10);
        $inputs['date']=date('Y-m-d H:i:s',(int)$realTimestampStart);
        $result=Task::create($inputs);
        return redirect()->route('task.index')->with('swal-success','تسک باموفقیت ایجاد شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('task.edit',compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $inputs=$request->all();
        $realTimestampStart=substr($request->date,0,10);
        $inputs['date']=date('Y-m-d H:i:s',(int)$realTimestampStart);
        $result=$task->update($inputs);
        return redirect()->route('task.index')->with('swal-success','تسک باموفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $result=$task->delete();
        return redirect()->route('task.index')->with('swal-success','تسک باموفقیت حدف شد');
    }

    public function status(Task $task)
    {
        $task->status = $task->status == 0 ? 1 : 0;
        $result = $task->save();
        if ($result) {
            if ($task->status == 0) {
                return response()->json(['status' => true, 'checked' => false]);
            } else {
                return response()->json(['status' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }
}
