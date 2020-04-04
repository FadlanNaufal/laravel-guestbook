@extends('layouts.template')

@section('content')
<div class="container">
<section class="section">
          <div class="section-header">
            <h1>Guest</h1>
          </div>
          <a href="{{route('guest.create')}}" class="btn btn-primary">Add Guest</a>
          <br><br>
          <div class="section-body">
                <div class="card">
                    <div class="card-body">
                    <table class="table table-responsive">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Guest Name</th>
                          <th scope="col">Guest Type</th>
                          <th scope="col">Guest Need</th>
                          <th scope="col">Guest Image</th>
                          <th scope="col">Guest Status</th>
                          <th scope="col">Time In</th>
                          <th scope="col">Time Out</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($guest as $guest)
                        <tr>
                          <th scope="row">{{$loop->index+1}}</th>
                          <td>{{$guest->guest_name}}</td>
                          <td>{{$guest->guest_type}}</td>
                          <td>{{$guest->guest_need}}</td>
                          <td>
                              <img src="{{ asset('upload/'.$guest->guest_picture) }}" style="width : 200px; height :120px" alt="" class="img-thumbnail">
                          </td>
                          <td>
                              @if ($guest->guest_status == "leave")
                               <span class="badge badge-success">Leave</span>
                              @else
                              <span class="badge badge-primary">In</span>
                              @endif
                          </td>
                          <td>{{$guest->created_at->diffForHumans()}}</td>
                          <td>{{$guest->leave_at}}</td>
                          <td>
                              <div class="btn-group">
                               <a href="{{route('guest.edit',$guest)}}" class="btn btn-info" style="color: white">
                                <i class="fas fa-edit"></i>
                              </a>
            					<form action="{{route('guest.destroy',$guest)}}" method="POST">
            						@csrf @method('delete')
                                    <button onclick="return confirm('Are you sure?')" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
            					</form>
                              </div>
                          </td>
                        </tr>
                        <tr>
                        @endforeach
                      </tbody>
                    </table>
                    </div>
                </div>
          </div>
        </section>
</div>
@endsection
