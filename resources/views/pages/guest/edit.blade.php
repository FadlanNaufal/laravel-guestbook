@extends('layouts.template')

@section('content')
<div class="container">
<section class="section">
          <div class="section-header">
            <h1>Add Guest</h1>
          </div>
          <div class="col-sm-12">
                @if($errors->any())
				    @foreach($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                            </button>
                            {{ session ('error') }}
                        </div>
                        </div>
                    @endforeach
                @endif
                 @if(session('warning'))
                        <div class="alert alert-warning">
                            {{ session ('warning') }}
                        </div>
                @endif
                @if(session('success'))
                 <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                            </button>
                            {{ session ('success') }}
                        </div>
                        </div>
                @endif
        </div>
          <a href="{{route('guest.index')}}" class="btn btn-warning">Back</a>
          <br><br>
          <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('guest.update',$guest)}}" method="POST" enctype="multipart/form-data">
                          @csrf @method('patch')
                            <div class="form-group">
                                <label for="">Guest Name</label>
                                <input type="text" class="form-control" name="guest_name" value="{{$guest->guest_name}}">
                            </div>
                            <div class="form-group">
                                <label for="">Guest Need</label>
                                <textarea name="guest_need" id="" cols="30" rows="10" class="form-control">
                                 {{$guest->guest_need}}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Guest Phone</label>
                                <input type="number" class="form-control" name="guest_phone" value="{{$guest->guest_phone}}"> 
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
          </div>
        </section>
</div>




@endsection
