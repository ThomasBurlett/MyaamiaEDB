@extends('layouts.app')
@section('title', 'Search Results')
@section('css')

@endsection
@section('js')

@endsection
@section('content')
    <div class="row">
        @if(!count($speciesArr))
            <div class="col-12">
                No Result Found !
            </div>
        @endif
        @foreach ($speciesArr as $species)
            <div class="col-md-6 col-xs-12 speciesNameCard" style="padding: 0px 30px; margin-top: 15px;">
                <div class="row" style="border: 1px solid #DDDDDD; padding: 15px;">
                    <div style="float: left; width: calc(100% - 135px); white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                        <h4><a href="{{route('species.show', ['id' => $species->id])}}">{{$species->species_name ? $species->species_name : 'No Species Name'}}</a></h4>
                    </div>
                    <div style="float: left; width: 50px; text-align: right; margin-left: 30px;">
                        <a href="{{route('species.edit', ['id' => $species->id])}}" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    </div>

                    <div style="float: left; width: 50px; text-align: right; margin-left: 5px;">
                        <a href="#" class="btn btn-danger" onclick="event.preventDefault(); showWarningBox('deleteSpecies', {id: '{{$species->id}}'});"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>






@endsection
