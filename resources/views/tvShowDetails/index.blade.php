@extends('tvShowDetails.layout')
@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Show details</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('tvShowDetails.create') }}"> Create new Quote </a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Season</th>
            <th>Episode</th>
            <th>Quotes</th>
            <th width="250px">Action</th>
        </tr>
        @foreach ($tvShowDetails as $i => $showDetails)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $showDetails->season }}</td>
            <td>{{ $showDetails->episode }}</td>
            <td>{{ $showDetails->quote }}</td>
            <td>
                <form action="{{ route('tvShowDetails.destroy',$showDetails->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('tvShowDetails.show',$showDetails->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('tvShowDetails.edit',$showDetails->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    @endsection