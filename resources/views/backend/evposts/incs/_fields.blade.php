<div class="form-body">
    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.title') }} <span class="required"></span> </label>
        <div class="col-md-6">
            <input type="text" name="title" value="{{ getData($data, 'title') }}" class="form-control" placeholder="{{ trans('main.title') }}" required>
            @if ($errors->has('title'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('title') }}</strong>
                </span>
            @endif
        </div>
    </div>


    {{-- Add Post's Category --}}
    <div class="form-group{{ $errors->has('evcat_id') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.vcategory') }} <span class="required"></span> </label>
        <div class="col-md-6">
            <select class="form-control select2" id="evcat_id" name="evcat_id">
              <option value="">{{ trans('main.select Category') }}</option>
              @foreach ($evcat as $pc)
                  <option value="{{ $pc->id }}" {{ getData($data, 'evcat_id') == $pc->id ? 'selected' : '' }}>{{ $pc->title }}</option>
              @endforeach
            </select>
            @if ($errors->has('evcat_id'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('evcat_id') }}</strong>
                </span>
            @endif
        </div>
    </div>

    {{-- Add Post's Taq --}}
    <div class="form-group{{ $errors->has('evtaq_id') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.vtaqs') }} <span class="required"></span> </label>
          <option value="">{{ trans('main.selectTaqsPost') }}</option>
        <div class="col-md-6">
            <select class="form-control select2" name="evtaq_id[]" id="evtaq_id" multiple>
              @foreach ($evtaq as $pt)
                  <option value="{{ $pt->id }}" {{ getData($data, 'evtaq_id') == $pt->id ? 'selected' : '' }}>{{ $pt->name }}</option>
              @endforeach
            </select>
            @if ($errors->has('evtaq_id'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('evtaq_id') }}</strong>
                </span>
            @endif
        </div>
    </div>


    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
        <label class="control-label col-md-2">{{ trans('main.image') }}</label>
        <div class="col-md-6">
            <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                    @if (checkValue(getData($data, 'image')))
                        <img src="{{ ShowImage(getData($data, 'image')) }}" alt="" />
                    @endif
                </div>
                <div>
                    <span class="btn red btn-outline btn-file">
                        <span class="fileinput-new"> {{ trans('main.select_image') }} </span>
                        <span class="fileinput-exists"> {{ trans('main.change') }} </span>
                        <input type="file" name="image">
                    </span>
                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> {{ trans('main.remove') }} </a>
                </div>
            </div>
            @if ($errors->has('image'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('image') }}</strong>
                </span>
            @endif
        </div>
    </div>


    <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.status') }} <span class="required"></span> </label>
        <div class="col-md-6">
            <select class="form-control select2" id="status" name="status">
                <option value="">{{ trans('main.status') }}</option>
                <option value="active" {{ getData($data, 'status') == 'active' ? ' selected' : '' }}>{{trans('main.active')}}</option>
                <option value="inactive" {{ getData($data, 'status') == 'inactive' ? ' selected' : '' }}>{{trans('main.inactive')}}</option>
            </select>
            @if ($errors->has('status'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('status') }}</strong>
                </span>
            @endif
        </div>
    </div>


    <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.content') }} <span class="required"></span> </label>
        <div class="col-md-6">
            <input type="text" name="content" value="{{ getData($data, 'content') }}" class="form-control" placeholder="{{ trans('main.content') }}" required>
            @if ($errors->has('content'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('content') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('desc') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.description') }} <span class="required"></span> </label>
        <div class="col-md-6">
            <input type="text" name="desc" value="{{ getData($data, 'desc') }}" class="form-control" placeholder="{{ trans('main.desc') }}" required>
            @if ($errors->has('desc'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('desc') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('keyword') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.keyword') }} <span class="required"></span> </label>
        <div class="col-md-6">
            <input type="text" name="keyword"  value="{{ getData($data, 'keyword') }}" class="form-control" placeholder="{{ trans('main.keyword') }}" required>
            @if ($errors->has('keyword'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('keyword') }}</strong>
                </span>
            @endif
        </div>
    </div>

</div>
