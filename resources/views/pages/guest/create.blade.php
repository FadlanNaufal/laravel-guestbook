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
                        <form action="{{route('guest.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Guest Name</label>
                                <input type="text" class="form-control" name="guest_name">
                            </div>
                            <div class="form-group">
                                <label for="">Guest Type</label>
                                <select name="guest_type" id="" class="form-control">
                                    <option value="parent">Parent</option>
                                    <option value="alumni">Alumni</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Guest Need</label>
                                <textarea name="guest_need" id="" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Guest Phone</label>
                                <input type="number" class="form-control" name="guest_phone">
                            </div>
                            <div class="form-group">
                                <label for="">Guest Picture</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div id="my_camera"></div>
                                        <br/>
                                        <input type=button value="Take Snapshot" onClick="take_snapshot()">
                                        <input type="hidden" name="guest_picture" class="image-tag">
                                    </div>
                                    <div class="col-md-6">
                                        <div id="results">Your captured image will appear here...</div>
                                    </div>
                                </div>
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

<script language="JavaScript">
    Webcam.set({
        width: 490,
        height: 390,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
    Webcam.attach( '#my_camera' );
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'" name="guest_picture"/>';
        } );
    }
</script>


@endsection
