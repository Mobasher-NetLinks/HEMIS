
<html dir="rtl">
<head>
<style>
	@page {
		margin:0; /* <any of the usual CSS values for margins> */
					/*(% of page-box width for LR, of height for TB) */
		margin-header: 0; /* <any of the usual CSS values for margins> */
		margin-footer: 0; /* <any of the usual CSS values for margins> */
		background: url('{{ asset('img/app/card-dari.jpg') }}');
		background-image-resize: 4;
	}
	
	div {
		font-family: 'nazanin';
		font-size: 12px;
	}

	@page eng{
		margin:0 5px 0 5px; 
		margin-header: 0;
		margin-footer: 0;
		background: url('{{ asset('img/app/card-eng.jpg') }}');
		background-image-resize: 4;
	}
	div.eng {
	    page-break-before: always;
	    page: eng;
	}
</style>
</head>
	<body>
		<div>
			<div style="margin-right:60px; width: 208px;text-align:center; float:right; {{ strlen($student->university->name) > 40 ? 'font-size: 8px;padding-top:53px; ' : 'padding-top:48px;' }}">
					پوهنتون {{ $student->university->name }}
			</div>

			<div style="margin-top: 5px">
				<img src="{{ $student->university->logo() }}" style='margin-top: 2px; margin-left: 2px; float: left' >
			</div>

			<div style="float: left">
				<img src="{{ $student->photo() }}" style='max-height:78px; max-width:58px; float: left; margin-left: 10px; margin-top: 40px;'>
			</div>
			
			<div style="float: right; margin-right:73px; margin-top:21px; width: 150px;">
				{{ $student->name }} {{ $student->last_name }}
			</div>
			
			<div style="float: right; clear: right; margin-right:73px; margin-top:6px; width: 150px;">
				{{ $student->father_name }}
			</div>

			<div style="float: right; clear: right; margin-right:73px; margin-top:5px; width: 150px;">
				{{ $student->department->faculty ?? '' }}
			</div>

			<div  style="float: right; clear: right; margin-right:73px; margin-top:3px; width: 150px;">
				{{ $student->form_no }}
			</div>
		</div>

		<div class="eng">
			<div style="margin-right:60px; width: 200px;text-align:center; float:right; {{ strlen($student->university->name) > 40 ? 'font-size: 8px;padding-top:53px; ' : 'padding-top:48px;' }}">
				{{ $student->university->name_eng }}
			</div>

			<div style="margin-top: 5px">
				<img src="{{ $student->university->logo() }}" style='margin-top: 2px; margin-left: 2px; float: left' >
			</div>
			
			<div style="float: right; clear; right; width: 66px">
				<img src="{{ $student->photo() }}" style='max-height:78px; max-width:58px; float: right; margin-right: 10px; margin-top: 40px;'>
			</div>

			<div style="float: left; margin-left:73px; margin-top:20px; width: 160px; text-align: left">
				{!! $student->name_eng != '' ? $student->name_eng." ".$student->last_name_eng : "<span style='color: #fff'>sdf</span>" !!}
			</div>

			<div style="float: left; clear: left; margin-left:73px; margin-top:10px; width: 160px;text-align: left">
			{!! $student->department_eng != '' ? $student->department_eng : "<span style='color: #fff'>sdf</span>" !!}
			</div>

			<div  style="float: left; clear: left; margin-left:73px; margin-top:6px; width: 160px;text-align: left">
				{{ $student->form_no }}
			</div>
			<p style="float: left; clear: left; margin-left:2px; color:gray; font-weight: bold; font-family: Times New Roman, font-style: oblique margin-top:6px; width: 160px;text-align: left">
				Expire Date: {{$student->kankor_year + 4 }} Year
			</p>
		</div>	
	</body>
</html>
