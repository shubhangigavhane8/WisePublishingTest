@extends('tvShowDetails.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> TV Show Details</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('tvShowDetails.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Season:</strong>
                {{ $showDetail->season }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Episode:</strong>
                {{ $showDetail->episode }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Quote:</strong>
                {{ $showDetail->quote }}
            </div>
        </div>
    </div>
@endsection