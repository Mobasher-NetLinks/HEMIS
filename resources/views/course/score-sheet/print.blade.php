<html>
	<head>
		<style>
			td, th, p, div, span {
				font-family: 'nazanin';
			}
			.table td,.table th{
				border:1px solid #aaa;
				padding:2px 0;
				text-align:center;
				font-size:14px;
			}
			table{
				width:100%;
				padding:2px 0;
				border-collapse: collapse;
			}
			.head td{
				padding:5px 0;
			}
			@page {
				size: auto;   /* auto is the initial value */
				margin:4cm  4% 4cm 2%;
				margin-header: 2mm; 
				margin-footer: 5mm;
				header: html_myHeader;
				footer: html_myFooter;

			}
		</style>
	</head>
	<body style="direction: rtl;">
		<htmlpageheader name="myHeader">	
			<table>
				<tr>	
					<td style="text-align:right;width:33%">
						<h3>وزارت تحصیلات عالی</h3>
						<h3>پوهنتون {{ $course->department->university->name }}</h3>
						<h3>دیپارتمنت {{ $course->department->name }}</h3>	
					</td>
					<td style="text-align:center; width:33%;">
						<img src="{{ $course->department->university->logo() }}" style='max-width: 100px' >				
					</td>		
					<td style="vertical-align:bottom; width: 33%">
						<span style="color: #fff">.</span>
					</td>		    		
				</tr>
				<tr>	
					<td style="text-align: center; padding-top: 10px" colspan="3" >
						شقه نمرات {{ $course->grade != '' ? 'صنف '.$course->grade : '' }}    چانس{{$request->chance}}  سمستر{{  $course->half_year_text }} {{ $course->year != '' ? 'سال '.$course->year : '' }} {{ $course->subject ? 'مضمون '.$course->subject->title : '' }}  ({{ $course->subject ?  round($course->subject->credits) . 'کریدت' : ""}}) {{ $course->teacher ? 'استاد '.$course->teacher->full_name : '' }}
					</td>		
				</tr>
			</table>
		</htmlpageheader>

		<table  class="table" >
			<thead>
				<tr>
					<td width="35px" rowspan="2">
						شماره
					</td>
					<td style="width:100px"  colspan="2">
						شهرت
					</td>
					<td colspan="{{ ($request->chance == 1) ? 5 : 1 }}">
						نمرات  
					</td>
					<td style="width:100px"  colspan="2">
						حاضری
					</td>
					<td width="100" rowspan="2">
						ملاحظات
					</td>
				</tr>
				<tr class="head">
					<td style="width:100px">
						اسم
					</td>
					<td style="width:100px">
						ولد
					</td>
					@if($request->chance == 1)
					<td style="width:100px">
						فعالیت صنفی و حاضری
						<br>
						10%
					</td> 	
					<td style="width:100px">
						کار عملی و خانگی
						<br>
						10%
					</td> 	
					<td style="width:100px">
						ارزیابی وسط سمستر
						<br>
						20%
					</td> 
					<td style="width:100px">
						ارزیابی نهایی  
						<br>
						60%
					</td> 
					<td style="width:100px">
						مجموع نمرات 
						<br>
						100%
					</td> 
					<td style="width:100px">
						مجموع روزهای حاضری 
					</td> 
					<td style="width:100px">
						مجموع غیر حاضر 
					</td> 
					@elseif($request->chance == 2)
					<td>چانس دو</td>
					@elseif($request->chance == 3)
					<td>چانس سه</td>
					@elseif($request->chance == 4)
					<td> چانس چهار</td>
					@endif
				</tr>
			</thead>
			<tbody>
				@php
					$passed = 0;
					$i = 0;
				@endphp

				@foreach($course->students as $student)
				
				@php
					$score = $student->relationLoaded('scores') ? $student->scores->first() : null;
					
					$valid = false;

					if ($request->chance == 1)
						$valid = true;

					if ($request->chance == 2 and $score and $score->validForChanceTwo()) {
						
						$valid = true;
					}
											
					if ($request->chance == 3 and $score and $score->validForChanceThree()) {
						$valid = true;
					}						
					
					if ($request->chance == 4 and $score and $score->validForChanceFour()) {
						$valid = true;
					}						

					if(! $valid)
						continue;

					$passed += $score->passed ?? 0;
				@endphp
				<tr>
					<td>
						{{ ++$i }}
					</td>
					<td>
						{{ $student->fullName }}
					</td>						
					<td>
						{{ $student->father_name }}
					</td>
					@if($request->chance == 1)
					<td>
						@if($request->withScores == 1)
						{{ $score->classwork ?? '' }}
						@endif
					</td>
					<td>
						@if($request->withScores == 1)
						{{ $score->homework ?? '' }}
						@endif
					</td>
					<td>
						@if($request->withScores == 1)
						{{ $score->midterm ?? '' }}
						@endif
					</td>
					<td>
						@if($request->withScores == 1)
						{{ $score->final ?? '' }}
						@endif
					</td>
					<td>
						@if($request->withScores == 1 and $score)
						{{ !$score->isDeprived() ? $score->total : 'محروم' }}
						@endif
					</td>
					<td>
						@if($request->withScores == 1)
						{{ $score->present ?? '' }}
						@endif
					</td>
					<td>
						@if($request->withScores == 1)
						{{ $score->absent ?? '' }}
						@endif
					</td>				
					@elseif($request->chance == 2)
					<td>
						@if($request->withScores == 1)
						{{ $score->chance_two ?? '' }}
						@endif
					</td>
					@elseif($request->chance == 3)
					<td>	
						@if($request->withScores == 1)
						{{ $score->chance_three ?? '' }}
						@endif
					</td>
					@elseif($request->chance == 4)
					<td>
						@if($request->withScores == 1)
						{{ $score->chance_four ?? '' }}
						@endif
					</td>
					@endif
					<td>
					</td>											
				</tr>   
				@endforeach
			</tbody>			
		</table>

		<htmlpagefooter name="myFooter" >
			<p>قرارجدول فوق به تعداد ({{ $i }}) محصل شامل امتحان گردیده که ازجمله ({!! $passed > 0 ? $passed : "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" !!}) محصل کامیاب و ({!! $passed > 0 ? $i - $passed : "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" !!}) ناکام میباشند.</p>
			<table style="width: 80%;">
				<tr>
					<td>امضای  ممتحن:</td>
					<td>امضای  ممیز:</td>
					<td>امضای آمر دیپارتمنت:</td>		
				</tr>
			</table>
			<br>
			<p>
			نوت: 
			از اساتید محترم جداً خواهش میگردد تا شقه امتحان خویش را سه روز بعد از اخذ امتحان به اداره پوهنحی تسلیم نمایند.
			 </p>

			<p style="text-align: left">صفحه: {PAGENO}</p>
		</htmlpagefooter>
	</body>
</html>

