@extends('layouts.app')

@push('styles')
<style type="text/css">
    td input {
        padding-left:3px;
        max-width: 60px;
    }
    @keyframes spinner {
        to {transform: rotate(360deg);}
    }
     
    @-webkit-keyframes spinner {
        to {-webkit-transform: rotate(360deg);}
    }    
    .spinner {
        width: 24px;
        height: 24px;
        position: relative;
        top: 5px;
        right: 0px;
    }
    .fa.feed-back {
        font-size: 16px;
        position: relative;
        top: 4px;
        right: 0px;
    }
    .spinner:before {
        content: 'Loading…';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 16px;
        height: 16px;
        margin-top: -10px;
        margin-left: -10px;
    }
    .spinner:not(:required):before {
        content: '';
        border-radius: 50%;
        border: 2px solid transparent;
        border-top-color: #03ade0;
        border-bottom-color: #03ade0;
        animation: spinner .8s ease infinite;
        -webkit-animation: spinner .8s ease infinite;
    }
    .disabled{
        pointer-events: none;
        cursor: no-drop;
        opacity: 0.6;
    }
</style>
@endpush

@section('content')
    <div class="alert alert-info">
        <h4>اساتید گرامی!</h4>
        <p>لطفا پس از وارد کردن نمره, کلید Enter را بزنید تا نمره ثبت سیستم شود.</p>
    </div>
    <div class="alert alert-info">
        <h4>محترمو ښوونکو!</h4>
        <p>دنمرو درسولو وروسته تا سو Enter  تڼۍ کیکاٰژی.</p>
    </div>
    <div class="portlet light bordered">
        <div class="portlet-title" style="border: 0">
            
            @if (auth('user')->check())
            <a href="{{ route('courses.index') }}" class="btn btn-default"><i class="icon-arrow-right"></i> {{ trans('general.back') }}</a>
            <a href="{{ route('course.attendance.print', $course ) }}" class="btn btn-default" target="blank"><i class="fa fa-print"></i> {{ trans('general.print_attendance') }}</a>
            <div class="btn-group">
                <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="javascript:;" aria-expanded="false"> 
                    {{ trans('general.print_scores_sheet') }}
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('course.scoresSheet.print', [$course, 'chance' => 1]) }}" class="btn btn-default" target="blank"><i class="fa fa-print"></i> {{ trans('general.print_scores_sheet') }} امتحان فاینل</a></li>
                    <li><a href="{{ route('course.scoresSheet.print', [$course, 'chance' => 2] ) }}" class="btn btn-default" target="blank"><i class="fa fa-print"></i> {{ trans('general.print_scores_sheet') }} چانس دوم</a></li>
                    <li><a href="{{ route('course.scoresSheet.print', [$course, 'chance' => 3] ) }}" class="btn btn-default" target="blank"><i class="fa fa-print"></i> {{ trans('general.print_scores_sheet') }} چانس سوم</a></li>
                    <li><a href="{{ route('course.scoresSheet.print', [$course, 'chance' => 4] ) }}" class="btn btn-default" target="blank"><i class="fa fa-print"></i> {{ trans('general.print_scores_sheet') }} چانس چهارم</a></li>                    
                </ul>
            </div>
            
            <div class="btn-group">
                <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="javascript:;" aria-expanded="false"> 
                    {{ trans('general.print_filled_scores_sheet') }}
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('course.scoresSheet.print', [$course, 'chance' => 1, 'withScores' => 1]) }}" class="btn btn-default" target="blank"><i class="fa fa-print"></i> {{ trans('general.print_filled_scores_sheet') }} امتحان فاینل</a></li>
                    <li><a href="{{ route('course.scoresSheet.print', [$course, 'chance' => 2, 'withScores' => 1] ) }}" class="btn btn-default" target="blank"><i class="fa fa-print"></i> {{ trans('general.print_filled_scores_sheet') }} چانس دوم</a></li>
                    <li><a href="{{ route('course.scoresSheet.print', [$course, 'chance' => 3, 'withScores' => 1] ) }}" class="btn btn-default" target="blank"><i class="fa fa-print"></i> {{ trans('general.print_filled_scores_sheet') }} چانس سوم</a></li>
                    <li><a href="{{ route('course.scoresSheet.print', [$course, 'chance' => 4, 'withScores' => 1] ) }}" class="btn btn-default" target="blank"><i class="fa fa-print"></i> {{ trans('general.print_filled_scores_sheet') }} چانس چهارم</a></li>                    
                </ul>
            </div>
                        
            @elseif (auth('teacher')->check())
            <div class="btn-group">
                <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="javascript:;" aria-expanded="false"> 
                    {{ trans('general.print_scores_sheet') }}
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('teacher.course.scoresSheet.print', [$course, 'chance' => 1]) }}" class="btn btn-default" target="blank"><i class="fa fa-print"></i> {{ trans('general.print_scores_sheet') }} امتحان فاینل</a></li>
                    <li><a href="{{ route('teacher.course.scoresSheet.print', [$course, 'chance' => 2] ) }}" class="btn btn-default" target="blank"><i class="fa fa-print"></i> {{ trans('general.print_scores_sheet') }} چانس دوم</a></li>
                    <li><a href="{{ route('teacher.course.scoresSheet.print', [$course, 'chance' => 3] ) }}" class="btn btn-default" target="blank"><i class="fa fa-print"></i> {{ trans('general.print_scores_sheet') }} چانس سوم</a></li>
                    <li><a href="{{ route('teacher.course.scoresSheet.print', [$course, 'chance' => 4] ) }}" class="btn btn-default" target="blank"><i class="fa fa-print"></i> {{ trans('general.print_scores_sheet') }} چانس چهارم</a></li>                    
                </ul>
            </div>
            
            <div class="btn-group">
                <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="javascript:;" aria-expanded="false"> 
                    {{ trans('general.print_filled_scores_sheet') }}
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('teacher.course.scoresSheet.print', [$course, 'chance' => 1, 'withScores' => 1]) }}" class="btn btn-default" target="blank"><i class="fa fa-print"></i> {{ trans('general.print_filled_scores_sheet') }} امتحان فاینل</a></li>
                    <li><a href="{{ route('teacher.course.scoresSheet.print', [$course, 'chance' => 2, 'withScores' => 1] ) }}" class="btn btn-default" target="blank"><i class="fa fa-print"></i> {{ trans('general.print_filled_scores_sheet') }} چانس دوم</a></li>
                    <li><a href="{{ route('teacher.course.scoresSheet.print', [$course, 'chance' => 3, 'withScores' => 1] ) }}" class="btn btn-default" target="blank"><i class="fa fa-print"></i> {{ trans('general.print_filled_scores_sheet') }} چانس سوم</a></li>
                    <li><a href="{{ route('teacher.course.scoresSheet.print', [$course, 'chance' => 4, 'withScores' => 1] ) }}" class="btn btn-default" target="blank"><i class="fa fa-print"></i> {{ trans('general.print_filled_scores_sheet') }} چانس چهارم</a></li>                    
                </ul>
            </div> <a href="{{ route('teacher.timetable.course') }}" class="btn btn-default"><i class="icon-arrow-right"></i> {{ trans('general.back') }}</a>
            @endif
            

            <div class="tools"> </div>
        </div>
        <div class="portlet-body flip-scroll">            
            <div class="form-horizontal">                                    
                <div class="form-body" id="app">
                    <table class="table table-striped table-condensed flip-content">
                        <tr>
                            <th style="width: 60px">شماره</th>
                            <th>{{ trans('general.kankor_id') }}</th>
                            <th>{{ trans('general.name') }}</th>
                            <th>{{ trans('general.father_name') }}</th>
                            <th>{{ trans('general.kankor_year') }}</th>
                            <th>{{ trans('general.the_amount_of_present') }}</th>
                            <th>{{ trans('general.absent') }}</th>
                            <th>{{ trans('general.homework') }}</th>
                            <th>{{ trans('general.classwork') }}</th>
                            <th>{{ trans('general.midterm') }}</th>
                            <th>{{ trans('general.final') }}</th>
                            <th>{{ trans('general.total') }}</th>
                            <th>{{ trans('general.chance_two') }}</th>
                            <th>{{ trans('general.chance_three') }}</th>
                            <th>{{ trans('general.chance_four') }}</th>
                            <th></th>
                            @can('edit-course')
                            <th>{{ trans('general.delete') }}</th>
                            @endcan
                        </tr>
                        @foreach($course->students as $student)
                        @php                    
                            $score = $student->scores->first();
                        @endphp         

                             <tr class="{{ ! optional($score)->passed ? 'danger' : '' }}" >
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $student->form_no }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->father_name }}</td>
                                <td>{{ $student->kankor_year }}</td>
                                <td>
                                    <input type="hidden" class="score-input" name="id" value="{{ $score->id ?? ''  }}">
                                    <input type="hidden" class="score-input" name="student_id" value="{{ $student->id }}">
                                    <input type="hidden" value="{{$score->isDeprived() ? '1' : '0'}}" class = "is-deprived">
                                    <input type="number" step="0.01" class="form-control score-input" name="present" disabled min="0" max="40" value="{{  $course->subject->credits * 16 ?? ''  }}">
                                </td>
                                <td>
                                    <input type="number" step="0.01" class="form-control score-input" name="absent" min="0" max="10" value="{{ $score->absent ?? ''  }}">
                                </td>
                                <td>
                                    <input type="number" step="0.01" class="form-control score-input" name="homework" min="0" max="40" value="{{ $score->homework ?? ''  }}">
                                </td>
                                <td>
                                    <input type="number" step="0.01" class="form-control score-input" name="classwork" min="0" max="10" value="{{ $score->classwork ?? ''  }}">
                                </td>
                                <td>
                                    <input type="number" step="0.01" class="form-control score-input" name="midterm" min="0" max="20" value="{{ $score->midterm ?? ''  }}">
                                </td>
                                <td>
                                    <input type="number" step="0.01" class="form-control score-input" name="final" min="0" max="60" value="{{ $score->final ?? ''  }}">
                                </td>
                                <td style="vertical-align: middle" class="total">
                                    {{  ! $score->isDeprived()  ? $score->total : 'محروم'  }}
                                </td>  
                                <td>
                                    <input type="number" step="0.01" class="form-control score-input" name="chance_two" min="0" max="100" value="{{ $score->chance_two ?? ''  }}">
                                </td>
                                <td>
                                    <input type="number" step="0.01" class="form-control score-input" name="chance_three" min="0" max="100" value="{{ $score->chance_three ?? ''  }}">
                                </td>
                                <td>
                                    <input type="number" step="0.01" class="form-control score-input" name="chance_four" min="0" max="100" value="{{ $score->chance_four ?? ''  }}">
                                </td>
                                <td>
                                    <i class="fa fa-times-circle hide failed font-red feed-back"></i> 
                                    <div class="loading"></div> 
                                    <i class="fa fa-check-circle hide success font-green feed-back"></i>                                                                        
                                </td>
                                @can('edit-course')
                                <td>
                                    <a href="javascript:;" 
                                        onclick="event.preventDefault();
                                        if(confirm('آیا مایل به پیشروی هستید؟')){
                                        document.getElementById('student-id-field').value='{{ $student->id }}';
                                        document.getElementById('delete-form').submit();}" 
                                        class="dropdown-toggle" 
                                        title="{{ trans('general.logout') }}">

                                        <i class="fa fa-remove"></i>                           
                                    </a>
                                </td>
                                @endcan
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

    @if(auth()->user()->can('edit-course'))
    <div class="row">
        <div class="col-md-6">
            <div class="portlet box">
                <div class="portlet-title" style="color: #000">
                   <h4>{{ trans('general.add_student_individually') }}</h4>
                </div>
                <div class="portlet-body">
                    <!-- BEGIN FORM-->   
                    @if($errors->any())
                    <div class="alert alert-info">
                         <p>{{ $errors->first() ?? ""}}</p>
                    </div>  
                    @endif

                    {!! Form::open(['route' => ['attendance.student.add', $course], 'method' => 'post', 'class' => 'form-horizontal']) !!}
                        <div class="form-body" id="app">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group {{ $errors->has('student_id') ? ' has-error' : '' }}">
                                        {!! Form::label('student_id', trans('general.new_student'), ['class' => 'control-label col-sm-3']) !!}                                
                                        <div class="col-sm-7">
                                            {!! Form::select('student_id', [], null, ['class' => 'form-control select2-students', 'placeholder' => trans('general.select')]) !!}
                                            @if ($errors->has('student_id'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('student_id') }}</strong>
                                                </span>
                                            @endif                                                                                                   
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions fluid">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" class="btn green">{{ trans('general.add') }}</button>
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
                    <!-- END FORM-->
                </div>
            </div>
        </div>
    </div>
    @endif

    {!! Form::open(['route' => ['attendance.student.remove', $course], 'method' => 'delete', 'id' => 'delete-form', 'class' => 'form-horizontal', 'style' => 'display: none']) !!}
        <input type="hidden" id="student-id-field" name="student_id" >
        <button type="submit" class="btn btn-xs btn-danger" ></button>
    {!! Form::close() !!}
@endsection

@push('styles')
    <style>
        .score-input {
            text-align: left;
            direction: ltr;
            width: 80px;
        }
    </style>
@endpush


@push('scripts')


<script>

@if((auth('teacher')->check() and auth('teacher')->user()->id == $course->teacher_id) and $course->active == true)
    var userCanSubmit = true;

    function submitScore (input, parent) 
    {                           
        var loading = parent.find('.loading').removeClass("spinner");
        var success = parent.find('.success').addClass("hide");
        var failed = parent.find('.failed').addClass("hide");
        var tr = parent;        
        var inputs = tr.find('.score-input');
        var formData = {};
                    
        loading.addClass("spinner"); 

        inputs.each(function(index, element){                
            formData[element.name] = element.value;
        })

        formData['course_id'] = {!! $course->id !!}
        formData['subject_id'] = {!! $course->subject_id !!}
        formData['semester'] = {!! $course->semester !!}
        // console.log(formData);
        $.ajax({
            type        : 'POST', 
            url         : '{{ auth("teacher")->check() ? route("teacher.scores.store", $course) : route("scores.store", $course) }}', 
            data        : formData, 
            dataType    : 'json',
            encode      : true
        }).done(function(result) {  
            loading.removeClass("spinner");

            userCanSubmit = true;
            tr.find("input[name='id']").val(result.id);
            if(result.present % 25 < result.absent){
                tr.find(".total").html('محروم');              
            }
            else{
                tr.find(".total").html(result.total);              
            }
            if(result.success) {  
                success.removeClass("hide");
            } else {
                failed.removeClass("hide");         
            }

        }).fail(function(data) {     
            loading.removeClass("spinner");
            
            userCanSubmit = true;
            failed.removeClass("hide"); 
            
            if (data.responseJSON.success) {
                alert(data.responseJSON.message)
                               
            } else {
                alert(data.responseJSON.message)
            }
                            
        });
    }

    $(function () {                
        $('.score-input').keypress(function (e) {            
            if (e.which == 13 && userCanSubmit) {
                userCanSubmit = false;
                submitScore($(this), $(this).parent().parent());
            }
        });
    });

    // $('.table tr').each(function(index, element) {
    //     const isDeprived = $(element).find('.is-deprived').val(); 
    //     if(isDeprived === '1') {
    //         $(element).find('input').attr('disabled', 'disabled');
    //     }
    //     console.log($(element).find('.is-deprived').val());
    // });
@else

    $('.score-input').attr('disabled', 'disabled');
@endif
</script>
@endpush


