@extends('backend.theme.layout.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject bold uppercase font-blue">{{$title}}</span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-circle btn-icon-only btn-default" href="{{ route('eposts.create') }}" data-toggle="tooltip" title="{{trans('main.add')}}  {{trans('main.eposts')}}"> <i class="fa fa-plus"></i> </a>
                        <a class="btn btn-circle btn-icon-only btn-default" href="{{ route('eposts.edit', [$show->id]) }}" data-toggle="tooltip" title="{{ trans('main.edit') }}  {{ trans('main.job') }}"> <i class="fa fa-edit"></i> </a>
                        <span data-toggle="tooltip" title="{{ trans('main.delete') }}  {{ trans('main.job') }}">
                            <a data-toggle="modal" data-target="#myModal{{ $show->id }}" class="btn btn-circle btn-icon-only btn-default" href=""> <i class="fa fa-trash"></i> </a>
                        </span>
                        <div class="modal fade" id="myModal{{ $show->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal">x</button>
                                        <h4 class="modal-title">
                                            {{trans('main.delete')}}
                                        </h4>
                                    </div>
                                    <div class="modal-body">
                                        {{trans('main.ask-delete')}} {{ $show->title }} !
                                    </div>
                                    <div class="modal-footer">
                                        {!! Form::open([ 'method' => 'DELETE', 'route' => ['eposts.destroy', $show->id] ]) !!}
                                        {!! Form::submit(trans('main.approval'), ['class' => 'btn btn-danger']) !!}
                                        <a class="btn btn-default" data-dismiss="modal">
                                            {{ trans('main.cancel') }}
                                        </a>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-circle btn-icon-only btn-default" href="{{ route('eposts.index') }}" data-toggle="tooltip" title="{{trans('main.show-all')}}  {{trans('main.eposts')}}"> <i class="fa fa-list"></i> </a>
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#" data-original-title="{{trans('main.full-screen')}}" title="{{trans('main.full-screen')}}"> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <strong>{{trans('main.title')}} : </strong>
                            {{ $show->title }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.ecategory')}} : </strong>
                            {{ $show->epcategory_relation->title }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.user')}} : </strong>
                            {{ $show->user_relation->name }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.description')}} : </strong>
                            {{ trans( $show->desc) }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.keyword')}} : </strong>
                            {{ $show->keyword }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.status')}} : </strong>
                            {{ $show->status }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.image')}} : </strong>
                            <img style="width: 200px; height: 150px;" src="{{ ShowImage($show->image) }}" alt="">
                            <br><hr>
                        </div>
                        <div class="col-md-12">
                            <strong>{{trans('main.content')}} : </strong>
                            {!! $show->content !!}
                            <br><hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
