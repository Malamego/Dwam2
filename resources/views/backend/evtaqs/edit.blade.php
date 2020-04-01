@extends('backend.theme.layout.app')

@section('styles')
    @include('backend.evtaqs.incs._styles')
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject bold uppercase font-blue">{{$title}}</span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-circle btn-icon-only btn-default" href="{{route('evtaqs.index')}}" data-toggle="tooltip" title="{{trans('main.show-all')}}   {{trans('main.evtaqs')}}"> <i class="fa fa-list"></i> </a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form method="post" action="{{ route('evtaqs.update', [$edit->id]) }}" class="form-horizontal" role="form" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        @include('backend.evtaqs.incs._fields', [
                            'data' => collect($edit),
                            'action' => 'edit'
                        ])
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-2 col-md-10">
                                    <button type="submit" class="btn green">{{ trans('main.edit') }} {{ trans('main.evtaq') }}</button>
                                    <a href="{{ route('evtaqs.index') }}" class="btn default">{{ trans('main.cancel') }}</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    @include('backend.evtaqs.incs._scripts', [
        'data' => collect($edit)
    ])
@endsection
