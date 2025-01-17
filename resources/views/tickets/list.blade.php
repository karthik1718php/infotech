@extends('layouts.layout')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-12">

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">Ticket List</div>
            <div class="card-body">
                <a href="{{ route('create-ticket') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Ticket</a>
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">title</th>
                        <th scope="col">description</th>
                        <th scope="col">status</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($tickets as $ticket)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $ticket->title }}</td>
                            <td>{{ $ticket->description }}</td>
                            <td>{{ $ticket->status }}</td>
                        </tr>
                        
                        @empty
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>No Tickets Found!</strong>
                                </span>
                            </td>
                        @endforelse
                    </tbody>
                  </table>


            </div>
        </div>
    </div>    
</div>
    
@endsection