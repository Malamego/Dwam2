<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EvcategoriesRequest;
use App\DataTables\EvcategoriesDataTable;
use App\Models\Evcategory;
use Helper;

class EvcategoryController extends Controller
{
    private $viewPath = 'backend.evcategories';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(EvcategoriesDataTable $dataTable)
    {
        return $dataTable->render("{$this->viewPath}.index", [
            'title' => trans('main.show-all') . ' ' . trans('main.evcategories')
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
            'title' => trans('main.add') . ' ' . trans('main.evcategories'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EvcategoriesRequest $request)
    {
        $requestAll = $request->all();
        if ( $request->file('image')) {
          $requestAll['image'] = Helper::Upload('evcategories', $request->file('image'), 'checkImages');
        }
        $evcat = Evcategory::create($requestAll);

        session()->flash('success', trans('main.added-message'));
        return redirect()->route('evcategories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $evcat = Evcategory::where('id', $id)->with('class_relation')->first();
        $evcat = Evcategory::findOrFail($id);

        return view("{$this->viewPath}.show", [
            'title' => trans('main.show') . ' ' . trans('main.evcategory') . ' : ' . $evcat->title,
            'show' => $evcat,
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
        $evcat = Evcategory::findOrFail($id);
        return view("{$this->viewPath}.edit", [
            'title' => trans('main.edit') . ' ' . trans('main.evcategory') . ' : ' . $evcat->title,
            'edit' => $evcat
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EvcategoriesRequest $request, $id)
    {
        $evcat = Evcategory::find($id);
        $evcat->title = $request->title;
        $evcat->summary = $request->summary;
        $evcat->desc = $request->desc;
        $evcat->keyword = $request->keyword;

        if ($request->hasFile('image')) {
            $evcat->image = Helper::UploadUpdate($evcat->image ?? "", 'evcategories', $request->file('image'), 'checkImages');
        }
        $evcat->save();

        session()->flash('success', trans('main.updated'));
        return redirect()->route('evcategories.show', [$evcat->id]);
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
        $evcat = Evcategory::findOrFail($id);
        if (file_exists(public_path('uploads/' . $evcat->image))) {
            @unlink(public_path('uploads/' . $evcat->image));
        }
        $evcat->delete();

        if ($redirect) {
            session()->flash('success', trans('main.deleted-message'));
            return redirect()->route('evcategories.index');
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
            return redirect()->route('evcategories.index');
        }
    }
}
