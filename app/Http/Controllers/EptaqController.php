<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EptaqsRequest;
use App\DataTables\EptaqsDataTable;
use App\Models\Eptaq;
use Helper;

class EptaqController extends Controller
{
    private $viewPath = 'backend.eptaqs';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(EptaqsDataTable $dataTable)
    {
        return $dataTable->render("{$this->viewPath}.index", [
            'title' => trans('main.show-all') . ' ' . trans('main.eptaqs')
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
            'title' => trans('main.add') . ' ' . trans('main.eptaqs'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EptaqsRequest $request)
    {
        $requestAll = $request->all();
        $eptaq = Eptaq::create($requestAll);

        session()->flash('success', trans('main.added-message'));
        return redirect()->route('eptaqs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eptaq = Eptaq::findOrFail($id);

        return view("{$this->viewPath}.show", [
            'title' => trans('main.show') . ' ' . trans('main.eptaq') . ' : ' . $eptaq->name,
            'show' => $eptaq,
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
        $eptaq = Eptaq::findOrFail($id);
        return view("{$this->viewPath}.edit", [
            'title' => trans('main.edit') . ' ' . trans('main.ptaq') . ' : ' . $eptaq->name,
            'edit' => $eptaq
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EptaqsRequest $request, $id)
    {
        $eptaq = Eptaq::find($id);
        $eptaq->name = $request->name;
        $eptaq->save();

        session()->flash('success', trans('main.updated'));
        return redirect()->route('eptaqs.show', [$eptaq->id]);
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
        $eptaq = Eptaq::findOrFail($id);
        $eptaq->delete();

        if ($redirect) {
            session()->flash('success', trans('main.deleted-message'));
            return redirect()->route('eptaqs.index');
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
            return redirect()->route('eptaqs.index');
        }
    }
}
