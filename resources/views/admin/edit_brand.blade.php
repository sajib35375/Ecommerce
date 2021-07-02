@extends('admin.admin_master')
@section('admin')


    <section>
        <div class="content">
            <div class="row">

                @include('validate')

                <div class="col-md-10">
                    <a style="float: right; margin-bottom: 20px;" class="btn  btn-secondary" href="{{ route('brand.index') }}">Back</a>
                    <h2>Edit Brand</h2>

                    <hr>
                    <form action="{{ route('brand.update',$edit_brand->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="#">Brand Name English</label>
                            <input name="name_en" class="form-control" value="{{ $edit_brand->brand_name_en }}" type="text">
                        </div>
                        <div class="form-group">
                            <label for="#">Brand Name Bangla</label>
                            <input name="name_ban" class="form-control" value="{{ $edit_brand->brand_name_ban }}" type="text">
                        </div>
                        <div class="form-group">
                            <label for="#">Brand Image</label>
                            <input name="image" class="form-control-file" value="{{ $edit_brand->brand_image }}" type="file">
                        </div>
                        <div class="form-group">
                            <input value="update" class="btn btn-success" type="submit">
                        </div>
                    </form>
                </div>









            </div>

        </div>
        </div>
    </section>



@endsection
