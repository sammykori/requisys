@extends('layouts.app')

@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Pending Requests</h1>
          <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>
          @include('inc.messages')
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Pending Requests Table</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Request ID</th>
                      <th>Requestor</th>
                      <th>Request type</th>
                      <th>Date & Time</th>
                      <th>More Info</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th>Request ID</th>
                        <th>Requestor</th>
                        <th>Request type</th>
                        <th>Date & Time</th>
                        <th>More Info</th>
                    </tr>
                  </tfoot>
                  @if(count($pending) >= 1)
                    @foreach($pending as $pending)
                      <tbody>
                        <tr>
                        <td>{{$pending->id}}</td>
                          <td>{{$pending->user_id}}</td>
                          <td>file</td>
                          <td>{{$pending->created_at}}</td>
                          <td><button class="btn btn-info">View</button></td>
                        </tr>
                      </tbody>
                    @endforeach
                  @else 
                    <div class="alert alert-info">No File Request Found</div>
                  @endif
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
@endsection