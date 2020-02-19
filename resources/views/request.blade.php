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
                        <td><button id = "{{$staff->id}}" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg">Edit</button></td>
                          <td>
                            {!!Form::open(['action' =>['RecordsController@destroy', $staff->id], 'method' => 'POST'])!!}
                              {{Form::hidden('_method', 'DELETE')}}
                              {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                            {!!Form::close()!!}
                          </td>
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
          {{-- MODAL eDIT? --}}

          <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Edit File Record</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  @include('inc.messages')
                  <p>Find File</p>
                  {{-- {!! Form::open(['action' => ['RecordsController@update', $staff->id], 'method'=> 'POST']) !!} --}}
                  <div class="form-group row">
                    <div class="col-sm-10">
                      {{Form::text('file', '', ['class' => 'form-control dropdown-toggle', 'id' => 'searchFile', 'placeholder' => 'Search for file', 'autocomplete' => 'off', 'data-toggle' => 'dropdown', 'aria-haspopup' => 'false', 'aria-expanded' => 'false', 'onkeyup' => 'fileFetch()'])}}
                      {{-- <input type="text" class="form-control" id="searchFile" placeholder="Search for File"> --}}
                      <div class="dropdown-menu col-sm-11 drops">
                        
                      </div>
                    </div>
                  </div>
                  <br>
                  <hr>
                  <br>
                  <p>Requisition Details</p>
                  <div class="form-group row">
                    <div class="col-sm-10">
                      {{Form::text('purpose', '', ['class' => 'form-control', 'id' => 'purpose', 'placeholder' => 'Purpose'])}}
                      {{-- <input type="text" class="form-control" id="purpose" placeholder="Purpose"> --}}
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-10">

                      {{-- {{Form::select('sup', $sup->pluck('name', 'id'), null, ['placeholder' => 'Select Division Head to approve', 'class' => 'custom-select form-control'])}} --}}
                        {{-- <select class="custom-select form-control">
                            <option selected>Select Superior to Approve</option>
                            <option value="1">Paul Datsa</option>
                            <option value="2">Golda Adjei</option>
                            <option value="3">Isaac Boateng</option>
                        </select> --}}
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <br>
                  <br>
                  <div class="form-group">
                      {{Form::submit('Save Changes', ['class' => 'btn btn-primary'])}}
                      {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                
                    {!! Form::close() !!}
                  </div>
            </div>
          </div>
        </div>
        <br/><br/>

        </div>
        <!-- /.container-fluid -->
@endsection

