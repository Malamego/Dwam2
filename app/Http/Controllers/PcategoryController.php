<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PcategoriesRequest;
use App\DataTables\PcategoriesDataTable;
use App\Models\Pcategory;
use Helper;

class PcategoryController extends Controller
{
    private $viewPath = 'backend.pcategories';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PcategoriesDataTable $dataTable)
    {
        return $dataTable->render("{$this->viewPath}.index", [
            'title' => trans('main.show-all') . ' ' . trans('main.pcategories')
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
            'title' => trans('main.add') . ' ' . trans('main.pcategories'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PcategoriesRequest $request)
    {
        $requestAll = $request->all();

        if ( $request->file('image')) {
          $requestAll['image'] = Helper::Upload('pcategories', $request->file('image'), 'checkImages');
        }
        $pcat = Pcategory::create($requestAll);

        session()->flash('success', trans('main.added-message'));
        return redirect()->route('pcategories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $pcat = Pcategory::where('id', $id)->with('class_relation')->first();
        $pcat = Pcategory::findOrFail($id);

        return view("{$this->viewPath}.show", [
            'title' => trans('main.show') . ' ' . trans('main.pcategory') . ' : ' . $pcat->title,
            'show' => $pcat,
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
        $pcat = Pcategory::findOrFail($id);
        return view("{$this->viewPath}.edit", [
            'title' => trans('main.edit') . ' ' . trans('main.pcategory') . ' : ' . $pcat->title,
            'edit' => $pcat
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PcategoriesRequest $request, $id)
    {
        $pcat = Pcategory::find($id);
        $pcat->title = $request->title;
        $pcat->summary = $request->summary;
        $pcat->desc = $request->desc;
        $pcat->keyword = $request->keyword;

        if ($request->hasFile('image')) {
            $pcat->image = Helper::UploadUpdate($pcat->image ?? null, 'pcategories', $request->file('image'), 'checkImages');
        }
        $pcat->save();

        session()->flash('success', trans('main.updated'));
        return redirect()->route('pcategories.show', [$pcat->id]);
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
        $pcat = Pcategory::findOrFail($id);
        if (file_exists(public_path('uploads/' . $pcat->image))) {
            @unlink(public_path('uploads/' . $pcat->image));
        }
        $pcat->delete();

        if ($redirect) {
            session()->flash('success', trans('main.deleted-message'));
            return redirect()->route('pcategories.index');
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
            return redirect()->route('pcategories.index');
        }
    }
}
