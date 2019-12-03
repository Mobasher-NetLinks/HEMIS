@extends('layouts.app')

@section('content')
    <div class="portlet box">        
        <div class="portlet-body">
            <!-- BEGIN FORM-->            
            {!! Form::open(['route' => 'groups.store', 'method' => 'post', 'class' => 'form-horizontal']) !!}
                <div class="form-body" id="app">
                    <div class="row">
                        @if(auth()->user()->allUniversities())
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('university') ? ' has-error' : '' }}">
                                {!! Form::label('university', trans('general.university'), ['class' => 'control-label col-sm-3']) !!}                                
                                <div class="col-sm-8">
                                    {!! Form::select('university', $universities, null, ['class' => 'form-control select2', 'placeholder' => trans('general.select')]) !!}
                                    @if ($errors->has('university'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('university') }}</strong>
                                        </span>
                                    @endif                                                                                                   
                                </div>
                            </div>
                        </div>
                        @else
                            {!! Form::hidden('university', auth()->user()->university_id) !!}
                        @endif                     
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('department') ? ' has-error' : '' }}">
                                {!! Form::label('department', trans('general.department'), ['class' => 'control-label col-sm-3']) !!}                                
                                <div class="col-sm-8">
                                    {!! Form::select('department', $department, null, ['class' => 'form-control select2-ajax', 'remote-url' => route('api.departments'), 'remote-param' => '[name="university"]']) !!}
                                    @if ($errors->has('department'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('department') }}</strong>
                                        </span>
                                    @endif                                                                                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                {!! Form::label('name', trans('general.name'), ['class' => 'control-label col-sm-3']) !!}
                                <div class="col-sm-8">
                                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('kankor_year') ? ' has-error' : '' }}">
                                {!! Form::label('kankor_year', trans('general.kankor_year'), ['class' => 'control-label col-sm-3']) !!}
                                <div class="col-sm-8">
                                    {!! Form::text('kankor_year', null, ['class' => 'form-control']) !!}
                                    @if ($errors->has('kankor_year'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('kankor_year') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('semester') ? ' has-error' : '' }}">
                                {!! Form::label('semester', trans('general.semester'), ['class' => 'control-label col-sm-3']) !!}
                                <div class="col-sm-8">
                                    {!! Form::text('semester', null, ['class' => 'form-control']) !!}
                                    @if ($errors->has('semester'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('semester') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">                        
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                {!! Form::label('description', trans('general.description'), ['class' => 'control-label col-sm-3']) !!}
                                <div class="col-sm-8">
                                    {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => 3]) !!}
                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif                                                                                                   
                                </div>
                            </div>
                        </div>
                
                    </div>
                <hr>
                <div class="form-actions fluid">
                    <div class="row">
                        <div class="col-md-offset-2 col-md-8">
                            <button type="submit" class="btn green">{{ trans('general.save') }}</button>
                            <a href="{{ route('groups.index') }}" class="btn default">{{ trans('general.cancel') }}</a>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
            <!-- END FORM-->
        </div>
    </div>
@endsection('content')

@push('scripts')
<script>
    $(function () {
        $('.select2').change(function () {
            $('.select2-ajax').val(null).trigger('change');
        })
    })
</script>
@endpush