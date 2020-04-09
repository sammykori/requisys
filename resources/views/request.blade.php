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
                      <th>File name</th>
                      <th>Date & Time</th>
                      <th>Status</th>
                      <th>Purpose</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>File name</th>
                      <th>Date & Time</th>
                      <th>Status</th>
                      <th>Purpose</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </tfoot>
                  @if(count($staffs) >= 1)
                      <tbody id="stafftable">
                         @foreach($staffs as $staff)
                        <tr>
                          <td>{{$staff->file_name}}</td>
                          <td>{{$staff->created_at}}</td>
                          <td>{{strtoupper($staff->status)}}</td>
                        <td>{{$staff->purpose}}</td>
                        <td><button data-request="{{json_encode($staff)}}" class="btn btn-info stfbtn" data-toggle="modal" data-target=".bd-example-modal-lg">Edit</button></td>
                          <td>
                            {!!Form::open(['action' =>['RecordsController@destroy', $staff->id], 'method' => 'POST'])!!}
                              {{Form::hidden('_method', 'DELETE')}}
                              {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                            {!!Form::close()!!}
                          </td>
                        </tr>
                         @endforeach
                      </tbody>
                   
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
                  {{-- @include('inc.messages') --}}
                  <em><h5 id="currentfile">Find File</h5></em>
                  <form class="updateform">
                  <meta name="_token" content="{{csrf_token()}}">
                  <div class="form-group row">
                    <div class="col-sm-10">
                      {{Form::text('file', '', ['class' => 'form-control dropdown-toggle', 'id' => 'searchFile', 'placeholder' => 'Search for file', 'autocomplete' => 'off', 'data-toggle' => 'dropdown', 'aria-haspopup' => 'false', 'aria-expanded' => 'false', 'onkeyup' => 'fileFetch()'])}}                  
                      <input type="hidden" name="file_id" id="searchfileid" value="">
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
                      <input type="hidden" class="form-control" id="record_id" name="record_id">
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
                      <button type="button" class="btn btn-primary savechangesbtn">Save changes</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                
                  </div>
                </form>
            </div>
          </div>
        </div>
        <br/><br/>
        <script>
          var files = [];
          var a_files = [];
          var files_id = [];
          a_files = <?= $files ?>;

          for (key in a_files){
              var k_id = a_files[key];
              files.push(key);
              files_id.push(k_id);
            }

          const drops = document.querySelector('.drops')
          function fileFetch(){
            
            var x = document.getElementById("searchFile").value;
            // console.log(x);
            var matchArray;  
          
            console.log(files);
            matchArray = findMatches(x, files);
            // console.log(matchArray);
            const html = matchArray.map(file => {
              const regex = new RegExp(x, 'gi')
              // console.log("reg "+regex)
              const files = file.replace(regex, `${x}`)
              // console.log("file "+files)
              return `
                      <a class="dropdown-item" onclick = "select(this)">${files}</a>
                      <div class="dropdown-divider"></div>
              `;
              
            }).join('');
            drops.innerHTML = html
          };
          function findMatches(wordToMatch, cities) {
            return files.filter(file => {
                const regex = new RegExp(wordToMatch, 'gi')
                return file.match(regex)
            });
          }
          function select(el){
            document.getElementById("searchFile").value = el.innerText;
            document.getElementById("searchfileid").value = a_files[el.innerText];
            document.getElementById("currentfile").textContent = "Selected file " + el.innerText;
          }
        </script>
        </div>
        <!-- /.container-fluid -->
@endsection

