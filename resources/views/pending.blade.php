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
                      <th>Requestor</th>
                      <th>Request type</th>
                      <th>Date & Time</th>
                      <th>Status</th>
                      <th>More Info</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th>Requestor</th>
                        <th>Request type</th>
                        <th>Date & Time</th>
                        <th>Status</th>
                        <th>More Info</th>
                    </tr>
                  </tfoot>
                  @if(count($pending) >= 1)
                      <tbody id="pendingtable">
                        @foreach($pending as $pending)
                        <tr>
                          <td>{{$pending->name}}</td>
                          <td>{{ucfirst($pending->file_name)}}</td>
                          <td>{{date("Y-m-d H:m:s", strtotime($pending->created_at))}}</td>
                          <td>{{strtoupper($pending->status)}}</td>
                        <td><button class="btn btn-info pendingview" data-pending="{{json_encode($pending)}}" data-toggle="modal" data-target=".bd-example-modal-lg">View</button></td>
                        </tr>
                        @endforeach
                      </tbody>
                  @else 
                    <div class="alert alert-info">No File Request Found</div>
                  @endif
                </table>
              </div>
            </div>
          </div>
          <div class="modal fade bd-example-modal-lg pendingmodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                  <h6 id="file_name"></h6>
                  <div class="row">
                    <div class="col-sm-6">
                      <label>File Company</label>
                      <h6 id="company_name"></h6>
                    </div>
                    <div class="col-sm-6">
                      <label>File Service  Type</label>
                      <h6 id="service_type"></h6>
                    </div>
                  </div>
                  <hr>
                  <p>Staff Information</p>
                  <label>Name</label>
                  <h6 id="staff_name"></h6>
                  <label>Rank</label>
                  <h6 id="rank"></h6>
                  <div class="row">
                    <div class="col-sm-6">
                      <label>Email</label>
                      <h6 id="email"></h6>
                    </div>
                    <div class="col-sm-6">
                      <label>Extension</label>
                      <h6 id="ext"></h6>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger mr-auto disapprovebtn">Dissaprove</button>
                  <button type="button" class="btn btn-success approvebtn">Approve</button>                
                </div>
            </div>
          </div>
        </div>
        </div>
        <!-- /.container-fluid -->

        <form id="updatestatus" style="display:none">
           <meta name="_token" content="{{csrf_token()}}">
            <input type="hidden" name="record_id" id="record_identification">
        </form>
@endsection