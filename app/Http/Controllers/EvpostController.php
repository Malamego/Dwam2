<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EvpostsRequest;
use App\DataTables\EvpostsDataTable;
use App\Models\Evpost;
use App\Models\Evcategory;
use App\Models\Evtaq;
use Hash;
use Helper;

class EvpostController extends Controller
{
    private $viewPath = 'backend.evposts';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(EvpostsDataTable $dataTable)
    {
        return $dataTable->render("{$this->viewPath}.index", [
            'title' => trans('main.show-all') . ' ' . trans('main.evposts')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $evcat = Evcategory::all();
        $evtaq = Evtaq::all();
        return view("{$this->viewPath}.create", [
            'title' => trans('main.add') . ' ' . trans('main.evposts'),
            'evcat' => $evcat,
            'evtaq' => $evtaq,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EvpostsRequest $request)
    {
        $requestAll = $request->all();        
        $requestAll['image'] = Helper::Upload('evposts', $request->file('image'), 'checkImages');
        $requestAll['user_id'] = auth()->user()->id;
        $evpos = Evpost::create($requestAll);
        if ($requestAll['evtaq_id'])
        {
          $evpos->evtaqs_relation()->attach($requestAll['evtaq_id']);
        }
        session()->flash('success', trans('main.added-message'));
        return redirect()->route('evposts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evpos = Evpost::where('id', $id)->with('evcategory_relation')->first();
        return view("{$this->viewPath}.show", [
            'title' => trans('main.show') . ' ' . trans('main.post') . ' : ' . $evpos->title,
            'show' => $evpos,
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
        $evpos = Evpost::where('id', $id)->with('evcategory_relation', 'user_relation', 'evtaqs_relation')->first();
        $evcat = Evcategory::all();
        $evtaq = Evtaq::all();
        return view("{$this->viewPath}.edit", [
            'title' => trans('main.edit') . ' ' . trans('main.post') . ' : ' . $evpos->title,
            'edit' => $evpos,
            'evcat' => $evcat,
            'evtaq' => $evtaq,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EvpostsRequest $request, $id)
    {
        $evpos = Evpost::find($id);
        if (!$evpos) {
          return back();
        }
        $evpos->title = $request->title;
        $evpos->content  = $request->content;
        $evpos->desc  = $request->desc;
        $evpos->evcat_id  = $request->evcat_id;
        $evpos->keyword   = $request->keyword;
        $evpos->status = $request->status;
        $evpos->user_id = auth()->user()->id;

        if ($request->hasFile('image')) {
            $evpos->image = Helper::UploadUpdate($evpos->image ?? null, 'evposts', $request->file('image'), 'checkImages');
        }

        $evpos->save();
       if ($request->evtaq_id) {
        $evpos->evtaqs_relation()->sync($request->evtaq_id);
         }
        session()->flash('success', trans('main.updated'));
        return redirect()->route('evposts.show', [$evpos->id]);
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
        $evpos = Evpost::findOrFail($id);
        if (file_exists(public_path('uploads/' . $evpos->image))) {
            @unlink(public_path('uploads/' . $evpos->image));
        }
        $evpos->delete();

        if ($redirect) {
            session()->flash('success', trans('main.deleted-message'));
            return redirect()->route('evposts.index');
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
            return redirect()->route('evposts.index');
        }
    }
}
