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
				<td style="text-align:right;width:30%;padding-right:17%;vertical-align:top;">
					<img src="{{ asset('img/wezarat-logo.jpg') }}"  style="max-width: 80px"/>		
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
				<th rowspan="2" style="width:2%">{{__('general.number')}}</th>
				<th colspan = "6" style="width:30%"  >{{__('general.fame')}}</th>
			<th colspan = "{{$subjects->count()}}" style="width:41%" >{{__('general.subjects')}}</th>
				<th rowspan="2" style="width:3%">{{__('general.sumOfScores')}}</th>
				<th rowspan="2" style="width:3%">{{__('general.averageOfScores')}}</th>
				<th rowspan="2" style="width:3%">{{__('general.catagory')}}</th>
				<th rowspan="2" style="width:3%">{{__('general.result')}}</th>
				<th rowspan="2" style="width:3%">{{__('general.grade')}}</th>
				<th rowspan="2" style="width:3%">{{__('general.present')}}</th>
				<th rowspan="2" style="width:3%">{{__('general.absent')}}</th>
				<th rowspan="2" style="width:7%">{{__('general.consideration')}}</th>

			</tr>
			<tr class="tr">
				{{-- fame --}}
				<td >{{__('general.name')}}</td>
				<td >{{__('general.last_name')}}</td>
				<td >{{__('general.father_name')}}</td>
				<td >{{__('general.grandfather_name')}}</td>
				<td >{{__('general.form_no')}}</td>
				<td>{{__('general.chance')}}</td>
				{{-- subjects --}}
				@foreach($subjects as $subject)
				<td>{{$subject->subject->title}}</td>
				@endforeach
			</tr>
			@php
				$x = true;
			@endphp
			@foreach($students as $student)

			@php                    
				$courses = $student->courses->where('semester', $semester)->where('year', $year);
			@endphp   
			<tr class="tr">
				{{-- fame --}}
			<td >{{$loop->iteration}}</td>
			<td >{{$student->name}}</td>
				<td >{{$student->last_name}}</td>
				<td >{{$student->father_name}}</td>
				<td >{{$student->grandfather_name}}</td>
				<td >{{$student->form_no}}</td>
				@if($x = true)
				@foreach($courses as $course)
				<td>
					<table>
						<tr><td>{{$course->score->total >= 55 ?  $course->score->total : "0"}}</td></tr>
						<tr><td>{{$course->score->total < 55 and  $course->score->chance_two != null ? $course->score->chance_two  :"0"}}</td></tr>
						<tr><td>{{$course->score->total < 55 and  $course->score->chance_two < 55 ? $course->score->chance_three  : "0"}}</td></tr>
					</table>
				</td>
				@endforeach
				@endif
				@php
					$x = false;
				@endphp
				<td ></td>
				<td ></td>
				<td ></td>
				<td ></td>
				<td ></td>
				<td ></td>
				<td ></td>
				<td ></td>
			</tr>
			@endforeach
		</table> 

	</div>

	<script>
		window.print();
	</script>
</body>
</html>
	