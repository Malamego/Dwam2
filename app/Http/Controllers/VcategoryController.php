<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\VcategoriesRequest;
use App\DataTables\VcategoriesDataTable;
use App\Models\Vcategory;
use Helper;

class VcategoryController extends Controller
{
    private $viewPath = 'backend.vcategories';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(VcategoriesDataTable $dataTable)
    {
        return $dataTable->render("{$this->viewPath}.index", [
            'title' => trans('main.show-all') . ' ' . trans('main.vcategories')
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
            'title' => trans('main.add') . ' ' . trans('main.vcategories'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VcategoriesRequest $request)
    {
        $requestAll = $request->all();

        if ( $request->file('image')) {
          $requestAll['image'] = Helper::Upload('vcategories', $request->file('image'), 'checkImages');
        }

        $vcat = Vcategory::create($requestAll);

        session()->flash('success', trans('main.added-message'));
        return redirect()->route('vcategories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $vcat = Vcategory::where('id', $id)->with('class_relation')->first();
        $vcat = Vcategory::findOrFail($id);

        return view("{$this->viewPath}.show", [
            'title' => trans('main.show') . ' ' . trans('main.vcategory') . ' : ' . $vcat->title,
            'show' => $vcat,
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
        $vcat = Vcategory::findOrFail($id);
        return view("{$this->viewPath}.edit", [
            'title' => trans('main.edit') . ' ' . trans('main.vcategory') . ' : ' . $vcat->title,
            'edit' => $vcat
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VcategoriesRequest $request, $id)
    {
        $vcat = Vcategory::find($id);
        $vcat->title = $request->title;
        $vcat->summary = $request->summary;
        $vcat->desc = $request->desc;
        $vcat->keyword = $request->keyword;

        if ($request->hasFile('image')) {
            $vcat->image = Helper::UploadUpdate($vcat->image ?? "", 'vcategories', $request->file('image'), 'checkImages');
        }
        $vcat->save();

        session()->flash('success', trans('main.updated'));
        return redirect()->route('vcategories.show', [$vcat->id]);
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
        $vcat = Vcategory::findOrFail($id);
        if (file_exists(public_path('uploads/' . $vcat->image))) {
            @unlink(public_path('uploads/' . $vcat->image));
        }
        $vcat->delete();

        if ($redirect) {
            session()->flash('success', trans('main.deleted-message'));
            return redirect()->route('vcategories.index');
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
            return redirect()->route('vcategories.index');
        }
    }
}
