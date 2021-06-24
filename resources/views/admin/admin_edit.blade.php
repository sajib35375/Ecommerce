
@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="container">
        <div class="row">
            <div style="margin-top: 100px;" class="col-md-8">
                <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="#">Admin Name</label>
                        <input name="name" class="form-control" value="{{ $edit_profile->name }}" type="text">
                    </div>
                    <div class="form-group">
                        <label for="#">Admin Email</label>
                        <input name="email" class="form-control" value="{{ $edit_profile->email }}" type="text">
                    </div>
                    <div class="form-group">
                        <label for="#">Admin Profile Photo</label>
                        <input id="file" name="photo" class="form-control-file" value="{{ $edit_profile->profile_photo_path }}" type="file">
                        <img id="image" style="width: 100px;height: 100px;" src="{{ !empty($edit_profile->profile_photo_path) ? url($edit_profile->profile_photo_path) : url('images/joker.jpg')}}" alt="">
                    </div>
                    <div class="form-group">
                        <input value="Update" class="btn btn-info" type="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function (){
       $('#file').change(function (e){
          let reader = new FileReader();
          reader.onload = function (e){
              $('#image').attr('src',e.target.result);
          }
          reader.readAsDataURL(e.target.files['0']);
       });

    });
    </script>



@endsection
