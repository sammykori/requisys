@extends('layouts.app')

@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Requests for Files</h1>
          <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>
          @include('inc.messages')
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">File Requests Table</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Request ID</th>
                      <th>File ID</th>
                      <th>Date & Time</th>
                      <th>Status</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Request ID</th>
                      <th>File ID</th>
                      <th>Date & Time</th>
                      <th>Status</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </tfoot>
                  @if(count($staffs) >= 1)
                    @foreach($staffs as $staff)
                      <tbody>
                        <tr>
                        <td>{{$staff->id}}</td>
                          <td>{{$staff->file_name}}</td>
                          <td>{{$staff->created_at}}</td>
                          <td>{{$staff->status}}</td>
                          <td><button class="btn btn-info">Edit</button></td>
                          <td><button class="btn btn-danger">Delete</button></td>
                        </tr>
                      </tbody>
                    @endforeach
                  @else 
                    <h3>No File Request Found</h3>
                  @endif
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
@endsection

