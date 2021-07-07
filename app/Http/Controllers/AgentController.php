<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddAgentRequest;
use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agents=Agent::all();
        return view('agents.list',compact('agents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddAgentRequest $request)
    {
        $agent = new Agent();
        $agent->name = $request->input('name');
        $agent->code = $request->input('code');
        $agent->address = $request->input('address');
        $agent->phone = $request->input('phone');
        $agent->email = $request->input('email');
        $agent->manager=$request->input('manager');
        $agent->status=$request->input('status');
        $agent->save();
        Session::flash('success','Tạo đại lý thành công');
        return redirect()->route('agent.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agent=Agent::findOrFail($id);
        return view('agents.edit',compact('agent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $agent=Agent::findOrFail($id);
        $agent->name = $request->input('name');
        $agent->code = $request->input('code');
        $agent->address = $request->input('address');
        $agent->phone = $request->input('phone');
        $agent->email = $request->input('email');
        $agent->manager=$request->input('manager');
        $agent->status=$request->input('status');
        $agent->save();
        Session::flash('success','Sửa đại lý thành công');
        return redirect()->route('agent.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agent=Agent::findOrFail($id);
        $agent->delete();
        Session::flash('success','Xóa đại lý thành công');
        return redirect()->route('agent.list');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        if(!$keyword){
            return redirect()->route('agent.list');
        }
        $agents=Agent::where('name','LIKE','%'.$keyword.'%')->get();
        return view('agents.list',compact('agents'));
    }
}
