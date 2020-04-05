@extends('layouts.template')

@section('content')
<div class="container">
<section class="section">
          <div class="section-header">
            <h1>Report by Date</h1>
          </div>
          <div class="row">
              <div class="col-md-12">
                  <div class="card">
                  <div class="card-body">
                        <form action="{{route('report-filter-date')}}" method="post">
                            @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <input type="date" class="form-control" name="from_date">
                            </div>
                            <div class="col-md-4">
                                <input type="date" class="form-control" name="to_date">
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-info">Search</button>
                            </div>
                            </div>
                        </form>
                  </div>
                  </div>
              </div>
          </div>
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
