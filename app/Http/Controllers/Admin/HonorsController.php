<?php

namespace App\Http\Controllers\Admin;

use App\Models\Honor;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreHonorRequest;
use App\Http\Requests\UpdateHonorRequest;

class HonorsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('honor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $honors = Honor::all();

        return view('admin.honors.index', compact('honors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('honor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.honors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHonorRequest $request)
    {
        $honor = Honor::create($request->all());
        session()->flash('message', __('global.create_success', ["attribute" => sprintf("<b>%s %s</b>", __('global.new'), __('cruds.honor.title_singular'))]));

        return redirect()->route('settings.honors.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Honor $honor)
    {
        abort_if(Gate::denies('honor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.honors.edit', compact('honor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHonorRequest $request, Honor $honor)
    {
        $honor->update($request->all());

        session()->flash('message', __('global.update_success', ["attribute" => sprintf("<b>%s</b>", __('cruds.honor.title_singular'))]));

        return redirect()->route('settings.honors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Honor $honor)
    {
        abort_if(Gate::denies('honor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $honor->delete();

        session()->flash('info', __('global.delete_success', ["attribute" => sprintf("<b>%s</b>", __('cruds.honor.title_singular'))]));

        return back();
    }
}
