<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EvtaqsRequest;
use App\DataTables\EvtaqsDataTable;
use App\Models\Evtaq;
use Helper;

class EvtaqController extends Controller
{
    private $viewPath = 'backend.evtaqs';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(EvtaqsDataTable $dataTable)
    {
        return $dataTable->render("{$this->viewPath}.index", [
            'title' => trans('main.show-all') . ' ' . trans('main.evtaqs')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("{$this->viewPath}.create", [
            'title' => trans('main.add') . ' ' . trans('main.evtaqs'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EvtaqsRequest $request)
    {
        $requestAll = $request->all();
        $evtaq = Evtaq::create($requestAll);

        session()->flash('success', trans('main.added-message'));
        return redirect()->route('evtaqs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evtaq = Evtaq::findOrFail($id);

        return view("{$this->viewPath}.show", [
            'title' => trans('main.show') . ' ' . trans('main.evtaq') . ' : ' . $evtaq->name,
            'show' => $evtaq,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evtaq = Evtaq::findOrFail($id);
        return view("{$this->viewPath}.edit", [
            'title' => trans('main.edit') . ' ' . trans('main.evtaq') . ' : ' . $evtaq->name,
            'edit' => $evtaq
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EvtaqsRequest $request, $id)
    {
        $evtaq = Evtaq::find($id);
        $evtaq->name = $request->name;
        $evtaq->save();

        session()->flash('success', trans('main.updated'));
        return redirect()->route('evtaqs.show', [$evtaq->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  bool  $redirect
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $redirect = true)
    {
        $evtaq = Evtaq::findOrFail($id);
        $evtaq->delete();

        if ($redirect) {
            session()->flash('success', trans('main.deleted-message'));
            return redirect()->route('evtaqs.index');
        }
    }


    /**
     * Remove the multible resource from storage.
     *
     * @param  array  $data
     * @return \Illuminate\Http\Response
     */
    public function multi_delete(Request $request)
    {
        if (count($request->selected_data)) {
            foreach ($request->selected_data as $id) {
                $this->destroy($id, false);
            }
            session()->flash('success', trans('main.deleted-message'));
            return redirect()->route('evtaqs.index');
        }
    }
}
