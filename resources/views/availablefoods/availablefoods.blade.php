<title>Available Foods</title>
@extends('templates.main')
@section('content')
        <div class="card mb-3">
          <div class="card-header">
            <!-- <i class="fas fa-table"></i> -->
            Available Foods</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Type Of Donation</th>
                    <th>Restaurent Name</th>
                    <th>Phone Number</th>
                    <th>Location</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
@foreach($donations as $data)
                <tr>
                  <td>{{$data->Firstname}}</td>
                  <td>{{$data->Lastname}}</td>
                  <td>{{$data->TypeOfDonation}}</td>
                  <td>{{$data->RestaurentName}}</td>
                  <td>{{$data->Phone}}</td>
                  <td>{{$data->Location}}</td>
                  <td><a href="{{URL::to('edit-donation/' .$data->ID)}}">Edit</a></td>
                  <td><a href="{{URL::to('delete-donation/' .$data->ID)}}">Delete</a></td>       </tr>
@endforeach
              </table>
            </div>
          </div>
        </div>

        
@endsection