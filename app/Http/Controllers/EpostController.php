<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EpostsRequest;
use App\DataTables\EpostsDataTable;
use App\Models\Epost;
use App\Models\Epcategory;
use App\Models\Eptaq;
use Hash;
use Helper;

class EpostController extends Controller
{
    private $viewPath = 'backend.eposts';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(EpostsDataTable $dataTable)
    {
        return $dataTable->render("{$this->viewPath}.index", [
            'title' => trans('main.show-all') . ' ' . trans('main.eposts')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $epcat = Epcategory::all();
        $eptaq = Eptaq::all();
        return view("{$this->viewPath}.create", [
            'title' => trans('main.add') . ' ' . trans('main.eposts'),
            'epcat' => $epcat,
            'eptaq' => $eptaq,
        ]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EpostsRequest $request)
    {
        $requestAll = $request->all();
        $requestAll['image'] = Helper::Upload('eposts', $request->file('image'), 'checkImages');
        $requestAll['user_id'] = auth()->user()->id;
        $epos = Epost::create($requestAll);
        if ($requestAll['eptaq_id'])
        {
          $epos->eptaqs_relation()->attach($requestAll['eptaq_id']);
        }
        session()->flash('success', trans('main.added-message'));
        return redirect()->route('eposts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $epos = Epost::where('id', $id)->with('epcategory_relation')->first();
        return view("{$this->viewPath}.show", [
            'title' => trans('main.show') . ' ' . trans('main.eposts') . ' : ' . $epos->title,
            'show' => $epos,
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
        $epos = Epost::where('id', $id)->with('epcategory_relation', 'user_relation', 'eptaqs_relation')->first();
        $epcat = Epcategory::all();
        $eptaq = Eptaq::all();
        return view("{$this->viewPath}.edit", [
            'title' => trans('main.edit') . ' ' . trans('main.eposts') . ' : ' . $epos->title,
            'edit' => $epos,
            'epcat' => $epcat,
            'eptaq' => $eptaq,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EpostsRequest $request, $id)
    {
        $epos = Epost::find($id);
        if (!$epos) {
          return back();
        }
        $epos->title = $request->title;
        $epos->content  = $request->content;
        $epos->desc  = $request->desc;
        $epos->epcat_id  = $request->epcat_id;
        $epos->keyword   = $request->keyword;
        $epos->status = $request->status;
        $epos->user_id = auth()->user()->id;

        if ($request->hasFile('image')) {
            $epos->image = Helper::UploadUpdate($epos->image ?? null, 'eposts', $request->file('image'), 'checkImages');
        }

        $epos->save();
       if ($request->eptaq_id) {
        $epos->eptaqs_relation()->sync($request->eptaq_id);
         }
        session()->flash('success', trans('main.updated'));
        return redirect()->route('eposts.show', [$epos->id]);
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
        $epos = Epost::findOrFail($id);
        if (file_exists(public_path('uploads/' . $epos->image))) {
            @unlink(public_path('uploads/' . $epos->image));
        }
        $epos->delete();

        if ($redirect) {
            session()->flash('success', trans('main.deleted-message'));
            return redirect()->route('eposts.index');
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
            return redirect()->route('eposts.index');
        }
    }
}
