@extends('layouts.app')

@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <h1 class="h3 mb-4 text-gray-800">Requisitions Dashboard</h1>
          <div class="row">
              <div class="col-sm-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title">Record / File</h5>
                      <p class="card-text">Request for Files and Records from the Records Unit</p>
                      <a href="./record" class="btn btn-primary">Request</a>
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                          <h5 class="card-title">Water</h5>
                          <p class="card-text">Request for water from the Administration Division</p>
                          <a href="./water" class="btn btn-primary">Request</a>
                        </div>
                      </div>
                </div>
                <div class="col-sm-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                          <h5 class="card-title">Vehicle</h5>
                          <p class="card-text">Request for a Vehicle for Official duties</p>
                          <a href="./vehicle" class="btn btn-primary">Request</a>
                        </div>
                      </div>
                </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title">Petty Cash</h5>
                      <p class="card-text">Request for Petty Cash from Finance Division</p>
                      <a href="#" class="btn btn-primary">Request</a>
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                          <h5 class="card-title">Purchase</h5>
                          <p class="card-text">Request for purchase of goods and stationary at the Procurement Unit</p>
                          <a href="#" class="btn btn-primary">Request</a>
                        </div>
                      </div>
                </div>
                <div class="col-sm-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                          <h5 class="card-title">Work Order</h5>
                          <p class="card-text">Request for Work Order</p>
                          <a href="#" class="btn btn-primary">Request</a>
                        </div>
                      </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->
@endsection
