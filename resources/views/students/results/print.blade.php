<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<style>
	body {
		direction: rtl;
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        background-color: #FAFAFA;
        font: 8pt "Arial";
    }
    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }
    .page {
        width: 100%;
        min-height: 100%;
        padding: 2mm;
        margin: 3mm auto;
        border: 1px #D3D3D3 solid;
        border-radius: 2px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
    @page {
        size: A4;
        margin: 0;
    }
    @media print {
        html, body {
            width: 210mm;
            height: 297mm;        
        }
        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
    }
	p {
		margin:0;
	}
	.table td,.table th{	    
	    padding:1px 1px; 	        
		border: 1px solid #000;
	}
	.inner-table tr:first-child td, .inner-table tr:first-child th {
		border-top: 0
	}
	.inner-table tr td:first-child, .inner-table tr th:first-child {
		border-right: 0
	}
	.inner-table tr:last-child td, .inner-table tr:last-child th {
		border-bottom: 0
	}
	.inner-table tr td:last-child, .inner-table tr th:last-child {
		border-left: 0
	}
	table{
	    width:100%;
		border-collapse: collapse;
	}
	.bg-grey {
		background-color: #d8d8d8;
	}
	.center {
		text-align: center;
	}
	td{
		word-wrap:break-word;
		text-align: center;
		text-decoration: ivory;
	}
</style>
</head>
<body>
	<div class="page">
		<table class="header_table"  style="width:100%;">
			<tr>
				<td style="text-align:left;width:30%;padding-left:17%;vertical-align:top;">
					<img src="{{file_exists($university->photo_url) ? asset($university->photo_url) : asset('img/wezarat-logo.jpg') }}"  style="max-width: 80px"/>		
                </td>
                <td  style="text-align:center;width:40%;vertical-align:top;">
					<br>
					<br>
				<p> <span style="font-size: 12px">{{trans('general.governament_title')}}</span></p>					
				<p> <span style="font-size: 12px">{{trans('general.ministry_title')}}</span></p>					
				<p>پوهنتون/موسسه تحصیلی: <span style="font-size: 12px">{{$university->name}}</span></p>	
				<p> <span style="font-size: 12px">{{trans('general.student_affair_authority')}}</span></p>					
				<p> <span style="font-size: 12px">پوهنځی: {{$department->faculty}}</span> <span style="font-size: 12px">دیپارتمنت: {{$department->name}}</span</p>					
				<td style="text-align:right;width:17%;padding-left:0%;vertical-align:top;">
					<img src="{{ asset('img/wezarat-logo.jpg') }}"  style="max-width: 80px"/>		
				</td>
				<td style="text-align:right;width:10%;padding-right:1%; padding-left:1%; vertical-align:top;">
					<table class="table" >
						<tr>
							<td colspan="2">{{__('general.summary_of_result')}}</td>
						</tr>
						<tr>
							<td>{{__('general.number_of_involment')}}</td>
							<td>{{$students->count()}}</td>
						</tr>
						<tr>
							<td>{{__('general.number_of_involment_students')}}</td>
							<td>{{$students->count()}}</td>

						</tr>
						<tr>
							<td>{{__('general.number_of_passed_students')}}</td>
							<td>{{9}}</td>
						</tr>
						<tr>
							<td>{{__('general.credits')}}</td>
							<td>10</td>
						</tr>
						<tr>
							<td>{{__('general.danger_credits')}}</td>
							<td>{{9}}</td>
						</tr>
						<tr>
							<td>{{__('general.failled_students')}}</td>
							<td>{{$students->count()}}</td>
						</tr>
						<tr>
							<td>{{__('general.divested_students')}}</td>
							<td>{{$students->count()}}</td>
						</tr>
					</table>
				</td>	
			</tr>
		</table>
		<div style="border: darkgrey solid 2px; text-align:right;background-color:cornsilk; padding:4px">
			<p> <span style="font-size: 16px; font-wdith :bold">{{trans('general.credit_base_result_table')}} - {{trans('general.semester')}} {{$semester}}
				&nbsp;&nbsp; &nbsp;&nbsp; {{trans('general.class_year')}}2. &nbsp;&nbsp; &nbsp;&nbsp; .{{trans('general.department')}}{{$department->name}}.&nbsp;&nbsp; &nbsp;&nbsp; {{trans('general.year')}}{{$year}} </span></p>								
		</div>
		<br>
		<table class="table"  style="width:100%;table-layout: fixed;">
			<tr>
				<th rowspan="3" style="width:2%">{{__('general.number')}}</th>
				<th colspan = "2" style="width:13%"  >{{__('general.fame')}}</th>
				<th colspan = "{{$subjectsCount * 2 + 2}}" style="width:50%" >{{__('general.subjects_and_cridits')}}</th>
				<th rowspan="3" style="width:4%">{{__('general.sumOfCridits')}}</th>
				<th rowspan="3" style="width:4%">{{__('general.sumOfPassedCridits')}}</th>
				<th rowspan="3" style="width:4%">{{__('general.sumOfScores')}}</th>
				<th rowspan="3" style="width:4%">{{__('general.averageOfScores')}}</th>
				<th rowspan="3" style="width:4%">{{__('general.result')}}</th>
				<th rowspan="3" style="width:4%">{{__('general.grade')}}</th>
				<th colspan="2" style="width:4%">{{__('general.attendance')}}</th>
				<th rowspan="3" style="width:7%">{{__('general.consideration')}}</th>
			</tr>
			<tr>
				{{-- fame --}}
				<td rowspan="2" >{{__('general.name')}}</td>
				<td rowspan="2" >{{__('general.father_name')}}</td>
				{{-- subjects --}}
				<td colspan="2" >{{__('general.subjects')}}</td>
				@foreach($courseSubjects as $course)
				<td colspan="2" >{{$course->subject->title}}</td>
				@endforeach
				{{-- attendance --}}
				<td rowspan ="2">{{__('general.present')}}</td>
				<td rowspan ="2" >{{__('general.absent')}}</td>

			</tr>
			<tr>
				<td>{{__('general.form_no')}}</td>
				<td>{{__('general.chance')}}</td>
				@foreach($courseSubjects as $course)
				<td >{{__('general.score')}}</td>
				<td	>{{__('general.scoreAndCridit')}}</td>
				@endforeach
			</tr>
			@php
				$credits = 0;
				$totalScore = 0;
				$score = "";
				$courses = null;
			@endphp
			@foreach($students as $student)

				<?php                  
					$courses = $student->courses()->where('semester',$semester)->where('year',$year)->get();
				?>
				@if($courses->count() > 0 )
				<tr>
					{{-- students score section --}}
					<td rowspan="3">{{$loop->iteration}}</td>
					<td>{{$student->name . ' ' . $student->last_name}}</td>
					<td>{{$student->father_name ? $student->father_name : '' }}</td>
					<td rowspan="3">{{$student->form_no ? $student->form_no  : ''}}</td>
					{{-- chance 1 --}}
					<td>1</td>
					{{-- subjects score --}}
					@foreach($courses as $course)
						<?php
							$courseScore = $course->getStudentScore($student->id);
							if($courseScore->total >= 55){
								$score = $courseScore->total;
							}
							elseif ($courseScore->validForChanceTwo()) {
								
								$score = $courseScore->chance_two;
							}
							else {

								$score = $courseScore->chance_three;
							}
							$totalScore =  ($score * $course->subject->credits) + $totalScore ;
							$credits = $credits + $course->subject->credits;
						?>
						<td>{{$score ? $score : '' }}</td>
						<td>{{ $score ? $score * $course->subject->credits : ''}}</td>
					@endforeach
					<td>{{$credits ?  $credits : '' }}</td>
					<td>{{$credits ?  $credits : ''}}</td>
					<td>{{$totalScore ? $totalScore : '' }}</td>
					<td>{{ $totalScore ?  number_format($totalScore/$credits,2) : ''}}</td>
					<td>{{ $totalScore ?  __('general.passed') : ''}}</td>
					<td>{{ $totalScore ?  getGrade($totalScore/$credits) : ''}}</td>
					<td></td>
					<td></td>
					<td rowspan="3"></td>
				</tr>
				<tr>
					<td colspan="2" rowspan="2">{{__('general.criditsCompletion')}}</td>
					<td>2</td>
					@foreach($courses as $course)
						<?php
							$courseScore = $course->getStudentScore($student->id);
							if($courseScore->validForChanceTwo()){
								$score = $courseScore->total;
							}
							else {
								$score = null;
							}
							$totalScore =  ($score * $course->subject->credits) + $totalScore ;
							$credits = $credits + $course->subject->credits;
						?>
						<td >{{$score ? $score : '' }}</td>
						<td >{{ $score ? $score * $course->subject->credits : ''}}</td>
					@endforeach
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					{{-- <td></td> --}}
				</tr>
				<tr>
					<td>3</td>
					@foreach($courses as $course)
						<?php
							$courseScore = $course->getStudentScore($student->id);
							if($courseScore->validForChanceThree()){
								$score = $courseScore->total;
							}
							else {
								$score = null;
							}
							$totalScore =  ($score * $course->subject->credits) + $totalScore ;
							$credits = $credits + $course->subject->credits;
						?>
						<td >{{$score ? $score : '' }}</td>
						<td >{{ $score ? $score * $course->subject->credits : ''}}</td>
					@endforeach
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr> 
			@endif
			@php
				$credits = 0;
				$totalScore = 0;
				$score = "";
				$courses = null;
			@endphp
			@endforeach
		</table> 
	</div>
</body>
</html>
	