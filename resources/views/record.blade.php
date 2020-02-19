@extends('layouts.app')

@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Records / Files</h1>
          <p class="mb-4">Fill a form for the type of File you want to request and continue to track till your request have been approved <a>official DataTables documentation</a>.</p>
          
          {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">+Add a Request</button>
          <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Records / File Requisition Form</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body"> --}}
                  @include('inc.messages')
                  <p>Find File</p>
                  {!! Form::open(['action' => 'RecordsController@store', 'method'=> 'POST']) !!}
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

                          {{Form::select('sup', $sup->pluck('name', 'id'), null, ['placeholder' => 'Select Division Head to approve', 'class' => 'custom-select form-control'])}}
                            {{-- <select class="custom-select form-control">
                                <option selected>Select Superior to Approve</option>
                                <option value="1">Paul Datsa</option>
                                <option value="2">Golda Adjei</option>
                                <option value="3">Isaac Boateng</option>
                            </select> --}}
                        </div>
                    </div>
                {{-- </div> --}}
                {{-- <div class="modal-footer"> --}}
                    <br>
                    <br>
                    <div class="form-group">
                        {{Form::submit('Save Changes', ['class' => 'btn btn-primary'])}}
                        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                {{-- </div> --}}
                {!! Form::close() !!} 
              {{-- </div>
            </div>
          </div> --}}
          <br/><br/>

          <script>
            var files;
            const drops = document.querySelector('.drops')
            function fileFetch(){
              var x = document.getElementById("searchFile").value;
              // console.log(x);
              var matchArray;
              files = <?= $files ?>;
              // console.log(files);
              matchArray = findMatches(x, files);
              // console.log(matchArray);
              const html = matchArray.map(file => {
                const regex = new RegExp(x, 'gi')
                console.log("reg "+regex)
                const files = file.replace(regex, `${x}`)
                console.log("file "+files)
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
            }
          </script>
      </div>
      <!-- End of Main Content -->
      

@endsection
