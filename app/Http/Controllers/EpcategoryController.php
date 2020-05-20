<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EpcategoriesRequest;
use App\DataTables\EpcategoriesDataTable;
use App\Models\Epcategory;
use Helper;

class EpcategoryController extends Controller
{
    private $viewPath = 'backend.epcategories';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(EpcategoriesDataTable $dataTable)
    {
        return $dataTable->render("{$this->viewPath}.index", [
            'title' => trans('main.show-all') . ' ' . trans('main.epcategories')
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
            'title' => trans('main.add') . ' ' . trans('main.epcategories'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EpcategoriesRequest $request)
    {
        $requestAll = $request->all();

        if ( $request->file('image')) {
          $requestAll['image'] = Helper::Upload('epcategories', $request->file('image'), 'checkImages');
        }

        $epcat = Epcategory::create($requestAll);

        session()->flash('success', trans('main.added-message'));
        return redirect()->route('epcategories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $epcat = Epcategory::where('id', $id)->with('class_relation')->first();
        $epcat = Epcategory::findOrFail($id);

        return view("{$this->viewPath}.show", [
            'title' => trans('main.show') . ' ' . trans('main.epcategory') . ' : ' . $epcat->title,
            'show' => $epcat,
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
        $epcat = Epcategory::findOrFail($id);
        return view("{$this->viewPath}.edit", [
            'title' => trans('main.edit') . ' ' . trans('main.epcategory') . ' : ' . $epcat->title,
            'edit' => $epcat
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EpcategoriesRequest $request, $id)
    {
        $epcat = Epcategory::find($id);
        $epcat->title = $request->title;
        $epcat->summary = $request->summary;
        $epcat->desc = $request->desc;
        $epcat->keyword = $request->keyword;

        if ($request->hasFile('image')) {
            $epcat->image = Helper::UploadUpdate($epcat->image ?? "", 'epcategories', $request->file('image'), 'checkImages');
        }
        $epcat->save();

        session()->flash('success', trans('main.updated'));
        return redirect()->route('epcategories.show', [$epcat->id]);
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
        $epcat = Epcategory::findOrFail($id);
        if (file_exists(public_path('uploads/' . $epcat->image))) {
            @unlink(public_path('uploads/' . $epcat->image));
        }
        $epcat->delete();

        if ($redirect) {
            session()->flash('success', trans('main.deleted-message'));
            return redirect()->route('epcategories.index');
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
            return redirect()->route('epcategories.index');
        }
    }
}
