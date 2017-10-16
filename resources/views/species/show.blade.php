@extends('layouts.app')
@section('title', 'View')
@section('css')
    <style>
        .viewBlock {
            margin-top: 15px;
        }

        .viewBlock .row:nth-child(2) {
            padding-right: 15px;
        }

        .viewBlock .row:nth-child(2) > div {
            border: 1px solid #D8D8D8;
        }
		.panel-heading {
			background-image: none;
			background-color: #E82000;
			color: white;
			border-radius: 10px;
			border: 1px solid #FFFFFF;
			padding: 10px; 
			width: 200px;
			text-align: center;
		}
    </style>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        $("#showHistoryBtn").click(function(e) {
            e.preventDefault();
            $(this).hide();
            $("#hideHistoryBtn").removeClass("btn-outline-primary");
            $("#hideHistoryBtn").addClass("btn-primary");
            $("#hideHistoryBtn").show();
            $(".historyBtn").show();

        });
        $("#hideHistoryBtn").click(function(e) {
            e.preventDefault();
            $(this).hide();
            $("#showHistoryBtn").removeClass("btn-primary");
            $("#showHistoryBtn").addClass("btn-outline-primary");
            $("#showHistoryBtn").show();
            $(".historyBtn").hide();
        });
		$('#collapse1').collapse("show");
    });

	
</script>
@endsection
@section('content')
	<h1 style="text-align: center;">
	{{$species->species_name}} | {{$species->common_name}}
	</h1>
	<div class="panel-group" id="accordion">
        <div class="panel panel-default">
			<a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
				<div class="panel-heading">
					<h4 class="panel-title">
					Name Type
					</h4>
				</div>
			</a>
			<div id="collapse1" class="panel-collapse collapse in">
			  <div class="panel-body">
			  <div class="row">
			  @foreach ($schemeArr as $scheme)			
						  @if ($scheme->category == 'name_type')
							  <div class="viewBlock col-xl-3 col-lg-4 col-md-6 col-xs-12">
								  <div class="row">
									  <strong>{{$scheme->name}}:</strong>
									  <span style="position: absolute; top: 0; right: 18px;">
										  <a class="historyBtn" style="display: none;" href="{{route('species.history', ['id' => $species->id, 'key' => $scheme->key])}}"><i class="fa fa-history" aria-hidden="true"></i></a>
									  </span>
								  </div>
								  <div class="row">
									  <div class="col-12" style="min-height: 27px;">
										  {{$species->getAttribute($scheme->key)}}
									  </div>
								  </div>
							  </div>
						  @else

						  @endif
					  @endforeach
					  </div>
			  </div>
			</div>
		</div>
		<br>
		<div class="panel panel-default">
			<a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
				<div class="panel-heading">
					<h4 class="panel-title">
					Uses
					</h4>
				</div>
			</a>
			<div id="collapse2" class="panel-collapse collapse in">
			  <div class="panel-body">
			  <div class="row">
			  @foreach ($schemeArr as $scheme)			
						  @if ($scheme->category == 'uses')
							  <div class="viewBlock col-xl-3 col-lg-4 col-md-6 col-xs-12">
								  <div class="row">
									  <strong>{{$scheme->name}}:</strong>
									  <span style="position: absolute; top: 0; right: 18px;">
										  <a class="historyBtn" style="display: none;" href="{{route('species.history', ['id' => $species->id, 'key' => $scheme->key])}}"><i class="fa fa-history" aria-hidden="true"></i></a>
									  </span>
								  </div>
								  <div class="row">
									  <div class="col-12" style="min-height: 27px;">
										  {{$species->getAttribute($scheme->key)}}
									  </div>
								  </div>
							  </div>
						  @else

						  @endif
					  @endforeach
					  </div>
			  </div>
			</div>
		</div>
		<br>
		<div class="panel panel-default">
			<a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
				<div class="panel-heading">
					<h4 class="panel-title">
					Harvest Season
					</h4>
				</div>
			</a>
			<div id="collapse3" class="panel-collapse collapse in">
			  <div class="panel-body">
			  <div class="row">
			  @foreach ($schemeArr as $scheme)			
						  @if ($scheme->category == 'season')
							  <div class="viewBlock col-xl-3 col-lg-4 col-md-6 col-xs-12">
								  <div class="row">
									  <strong>{{$scheme->name}}:</strong>
									  <span style="position: absolute; top: 0; right: 18px;">
										  <a class="historyBtn" style="display: none;" href="{{route('species.history', ['id' => $species->id, 'key' => $scheme->key])}}"><i class="fa fa-history" aria-hidden="true"></i></a>
									  </span>
								  </div>
								  <div class="row">
									  <div class="col-12" style="min-height: 27px;">
										  {{$species->getAttribute($scheme->key)}}
									  </div>
								  </div>
							  </div>
						  @else

						  @endif
					  @endforeach
					  </div>
			  </div>
			</div>
		</div>
		<br>
		<div class="panel panel-default">
			<a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
				<div class="panel-heading">
					<h4 class="panel-title">
					Habitat
					</h4>
				</div>
			</a>
			<div id="collapse4" class="panel-collapse collapse in">
			  <div class="panel-body">
			  <div class="row">
			  @foreach ($schemeArr as $scheme)			
						  @if ($scheme->category == 'habitat')
							  <div class="viewBlock col-xl-3 col-lg-4 col-md-6 col-xs-12">
								  <div class="row">
									  <strong>{{$scheme->name}}:</strong>
									  <span style="position: absolute; top: 0; right: 18px;">
										  <a class="historyBtn" style="display: none;" href="{{route('species.history', ['id' => $species->id, 'key' => $scheme->key])}}"><i class="fa fa-history" aria-hidden="true"></i></a>
									  </span>
								  </div>
								  <div class="row">
									  <div class="col-12" style="min-height: 27px;">
										  {{$species->getAttribute($scheme->key)}}
									  </div>
								  </div>
							  </div>
						  @else

						  @endif
					  @endforeach
					  </div>
			  </div>
			</div>
		</div>
		<br>
		<div class="panel panel-default">
			<a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
				<div class="panel-heading">
					<h4 class="panel-title">
					Locations
					</h4>
				</div>
			</a>
			<div id="collapse5" class="panel-collapse collapse in">
			  <div class="panel-body">
			  <div class="row">
			  @foreach ($schemeArr as $scheme)			
						  @if ($scheme->category == 'locations')
							  <div class="viewBlock col-xl-3 col-lg-4 col-md-6 col-xs-12">
								  <div class="row">
									  <strong>{{$scheme->name}}:</strong>
									  <span style="position: absolute; top: 0; right: 18px;">
										  <a class="historyBtn" style="display: none;" href="{{route('species.history', ['id' => $species->id, 'key' => $scheme->key])}}"><i class="fa fa-history" aria-hidden="true"></i></a>
									  </span>
								  </div>
								  <div class="row">
									  <div class="col-12" style="min-height: 27px;">
										  {{$species->getAttribute($scheme->key)}}
									  </div>
								  </div>
							  </div>
						  @else

						  @endif
					  @endforeach
					  </div>
			  </div>
			</div>
		</div>
		<br>
		<div class="panel panel-default">
			<a data-toggle="collapse" data-parent="#accordion" href="#collapse6">
				<div class="panel-heading">
					<h4 class="panel-title">
					Growth Form
					</h4>
				</div>
			</a>
			<div id="collapse6" class="panel-collapse collapse in">
			  <div class="panel-body">
			  <div class="row">
			  @foreach ($schemeArr as $scheme)			
						  @if ($scheme->category == 'growth_form')
							  <div class="viewBlock col-xl-3 col-lg-4 col-md-6 col-xs-12">
								  <div class="row">
									  <strong>{{$scheme->name}}:</strong>
									  <span style="position: absolute; top: 0; right: 18px;">
										  <a class="historyBtn" style="display: none;" href="{{route('species.history', ['id' => $species->id, 'key' => $scheme->key])}}"><i class="fa fa-history" aria-hidden="true"></i></a>
									  </span>
								  </div>
								  <div class="row">
									  <div class="col-12" style="min-height: 27px;">
										  {{$species->getAttribute($scheme->key)}}
									  </div>
								  </div>
							  </div>
						  @else

						  @endif
					  @endforeach
					  </div>
			  </div>
			</div>
		</div>
		<br>
		<div class="panel panel-default">
			<a data-toggle="collapse" data-parent="#accordion" href="#collapse7">
				<div class="panel-heading">
					<h4 class="panel-title">
					General Information
					</h4>
				</div>
			</a>
			<div id="collapse7" class="panel-collapse collapse in">
			  <div class="panel-body">
			  <div class="row">
			  @foreach ($schemeArr as $scheme)			
						  @if ($scheme->category == 'general')
							  <div class="viewBlock col-xl-3 col-lg-4 col-md-6 col-xs-12">
								  <div class="row">
									  <strong>{{$scheme->name}}:</strong>
									  <span style="position: absolute; top: 0; right: 18px;">
										  <a class="historyBtn" style="display: none;" href="{{route('species.history', ['id' => $species->id, 'key' => $scheme->key])}}"><i class="fa fa-history" aria-hidden="true"></i></a>
									  </span>
								  </div>
								  <div class="row">
									  <div class="col-12" style="min-height: 27px;">
										  {{$species->getAttribute($scheme->key)}}
									  </div>
								  </div>
							  </div>
						  @else

						  @endif
					  @endforeach
					  </div>
			  </div>
			</div>
		</div>
		<br>
		<div class="panel panel-default">
			<a data-toggle="collapse" data-parent="#accordion" href="#collapse8">
				<div class="panel-heading">
					<h4 class="panel-title">
					Descriptions
					</h4>
				</div>
			</a>
			<div id="collapse8" class="panel-collapse collapse in">
			  <div class="panel-body">
			  <div class="row">
			  @foreach ($schemeArr as $scheme)			
						  @if ($scheme->category == 'long_descr')
							  <div class="viewBlock col-md-6 col-xs-12">
								<div class="row">
								<strong>{{$scheme->name}}:</strong>
								<span style="position: absolute; top: 0; right: 18px;">
								<a class="historyBtn" style="display: none;" href="{{route('species.history', ['id' => $species->id, 'key' => $scheme->key])}}"><i class="fa fa-history" aria-hidden="true"></i></a>
								</span>
								</div>
								<div class="row">
								<div class="col-12" style="height: 200px; overflow-y: auto;">
								{{$species->getAttribute($scheme->key)}}
								</div>
								</div>
								</div>		  
						  @else
						  @endif
					  @endforeach
					  </div>
			  </div>
			</div>
		</div>
	</div>
	<div class="row">
        <div class="col-12">
            <a href="#" id="showHistoryBtn" class="no-loading btn btn-outline-primary float-right" style="margin-left: 15px;">Show History Buttons</a>
            <a href="#" id="hideHistoryBtn" class="no-loading btn btn-outline-primary float-right" style="margin-left: 15px; display: none;">Hide History Buttons</a>
            <a href="{{route('species.edit', ['id' => $species->id])}}" class="float-right btn btn-outline-primary">Edit This Species</a>
        </div>
        <div class="col-12">
            <p style="text-align: right; margin: 0; color: gray;">Version: {{$species->version}} </p>
            <p style="text-align: right; margin: 0; color: gray;">Created By: {{\App\User::find($species->user_id)->name}}</p>
            <p style="text-align: right; margin: 0; color: gray;">Created At: {{$species->created_at}}</p>
            @if(!$species->is_approved)
                <p style="text-align: right; margin: 0; color: #941728;">This version hasn't been approved</p>
            @endif
        </div>
    </div>
@endsection
