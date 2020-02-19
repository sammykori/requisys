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
                          <td>{{$pending->name}}</td>
                          <td>{{$pending->file_name}}</td>
                          <td>{{$pending->created_at}}</td>
                        <td><button class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg">View</button></td>
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
          <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Approve Record Requisition</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  @include('inc.messages')
                  <p>File Information</p>
                  <label>File Name</label>
                  <h4>{{$pending->file_name}}</h4>
                  <div class="row">
                    <div class="col-sm-6">
                      <label>File Company</label>
                      <h5>{{$pending->company}}</h5>
                    </div>
                    <div class="col-sm-6">
                      <label>File Service  Type</label>
                      <h5>{{$pending->service_type}}</h5>
                    </div>
                  </div>
                  <hr>
                  <p>Staff Information</p>
                  <label>Name</label>
                  <h4>{{$pending->name}}</h4>
                  <label>Rank</label>
                  <h5>{{$pending->rank}}</h5>
                  <div class="row">
                    <div class="col-sm-6">
                      <label>Email</label>
                      <h5>{{$pending->email}}</h5>
                    </div>
                    <div class="col-sm-6">
                      <label>Extension</label>
                      <h5>{{$pending->extension}}</h5>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger mr-auto" data-dismiss="modal">Dissaprove</button>
                  <button type="button" class="btn btn-success" data-dismiss="modal">Approve</button>                
                </div>
            </div>
          </div>
        </div>
        </div>
        <!-- /.container-fluid -->
@endsection