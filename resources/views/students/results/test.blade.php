<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<style>
		td, th, p, div, span {
			font-family: 'nazanin';
			font: 12px;
		}
		.table td,.table th{
			border:1px solid #aaa;
			padding:1px 0;
			text-align:center;
			font-size:12px;
		}
		table{
			width:100%;
			padding:1px 0;
			border-collapse: collapse;
		}
		.head td{
			padding:2px 0;
		}
		@page {
			size: auto;   /* auto is the initial value */
			/* margin:4cm  4% 4cm 2%; */
			margin-header: 0mm; 
			margin-footer: 0mm;
			/* header: html_myHeader;
			footer: html_myFooter; */

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
<body style="direction: rtl; ">
	<div style="color:red;">
		<table class="header_table"  style="width:100%; padding-top:0%">
			<tr>
				<td style="text-align:left;width:30%;padding-left:17%;">
					<img src="{{$university->logo()}}" style="max-width: 80px"/>		
				</td>
				<td  style="text-align:center;width:40%;">
				<p> <span style="font-size: 12px">{{trans('general.governament_title')}}</span></p>					
				<p> <span style="font-size: 12px">{{trans('general.ministry_title')}}</span></p>					
				<p>{{__('general.university_or_inistitute')}}: <span style="font-size: 12px">{{$university->name}}</span></p>	
				<p> <span style="font-size: 12px">{{trans('general.student_affair_authority')}}</span></p>					
				<p> <span style="font-size: 12px">{{__('general.faculty')}}: {{$department->name}}</span> <span style="font-size: 12px">{{__('general.department')}}: {{$department->name}}</span></p>					
				<td style="text-align:right;width:17%;padding-left:0%;">
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
		<div style="border: darkgrey solid 2px; width:60% text-align:right;background-color:cornsilk; padding:1px">
			<p> <span style="font-size: 16px; font-wdith :bold">{{trans('general.credit_base_result_table')}} - {{trans('general.semester')}} {{$semester}}
				&nbsp;&nbsp; &nbsp;&nbsp; {{trans('general.class_year')}}2. &nbsp;&nbsp; &nbsp;&nbsp; .{{trans('general.department')}}{{$department->name}}.&nbsp;&nbsp; &nbsp;&nbsp; {{trans('general.year')}}{{$year}} </span></p>								
		</div>
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
							$score = null;
							if($courseScore){
								if($courseScore->total >= 55){

									$score = $courseScore->total;
									$scoreToCount = $score;
								}
								elseif ($courseScore->validForChanceTwo()) {
									
									$chanceScore = $courseScore->chance_two;
									$scoreToCount = $chanceScore;
								}
								elseif ($courseScore->validForChanceThree()) {
									
									$chanceScore = $courseScore->chance_three;
									$scoreToCount = $chanceScore;

								}
								else {

									$chanceScore = $courseScore->chance_four;
									$scoreToCount = $chanceScore;

								}
							}
							if($scoreToCount){

								$totalScore = ($scoreToCount * $course->subject->credits) + $totalScore;
							}
							
							$credits = $credits + $course->subject->credits;
						?>
						<td>{{ $score ? $score : '' }}</td>
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
							$score = null;
							$courseScore = $course->getStudentScore($student->id);
							if($courseScore){
								if($courseScore->validForChanceTwo()){
									$score = $courseScore->chance_two;
								}
								else {
									$score = null;
								}
							}
							$totalScore =  ($score * $course->subject->credits) + $totalScore ;
							$credits = $credits + $course->subject->credits;
						?>
						<td >{{	$score ? $score : '' }}</td>
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
							$score = null;
							$courseScore = $course->getStudentScore($student->id);
							if($courseScore){
								if($courseScore->validForChanceThree()){
									$score = $courseScore->chance_three;
								}
								else {
									$score = null;
								}
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
				$courses = null;
			@endphp
			@endforeach
		</table> 
	</div>
</body>
</html>
{{-- <script>
	window.print();
</script> --}}
	