@extends('layouts.hospital_layouts')

@section('title')
	医院后台
@stop

@section('content')
   
    <div class="card card-map">
		<div class="header">
            <h4 class="title">Google Maps</h4>
        </div>
		<div class="map">
			<div id="map"></div>
		</div>
	</div>
			
@stop