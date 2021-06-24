@extends('admin.admin_master')
@section('admin')


   <section>
       <div class="content">
          <div class="row">
              <div class="col-md-8">
                    @include('validate')
                  <div class="box">
                      <div class="box-header with-border">
                          <h3 class="box-title">All Brands</h3>

                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                          <div class="table-responsive">
                              <table id="example1" class="table table-bordered table-striped">
                                  <thead>
                                  <tr>
                                      <th>Brand Name English</th>
                                      <th>Brand Name Bangla</th>
                                      <th>Brand Image</th>
                                      <th>Action</th>

                                  </tr>
                                  </thead>
                                  <tbody>
                                  @foreach( $brands as $brand )
                                  <tr>
                                      <td>{{ $brand->brand_name_en }}</td>
                                      <td>{{ $brand->brand_name_ban }}</td>
                                      <td><img style="width: 70px;height: 40px;" src="{{ $brand->brand_image }}" alt=""></td>
                                      <td>
                                          <a class="btn btn-info" href="{{ route('brand.edit',$brand->id) }}">Edit</a>
                                          <a class="btn btn-danger" href="{{ route('brand.delete',$brand->id) }}">Delete</a>
                                      </td>

                                  </tr>
                                  @endforeach
                                  </tbody>
                                  <tfoot>
                                  <tr>
                                      <th>Brand Name English</th>
                                      <th>Brand Name Bangla</th>
                                      <th>Brand Image</th>
                                      <th>Action</th>

                                  </tr>
                                  </tfoot>
                              </table>
                          </div>
                      </div>
                      <!-- /.box-body -->
                  </div>
                  <!-- /.box -->


              </div>
              <!-- /.box -->


                 <div class="col-md-4">
                     <form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
                         @csrf
                         <div class="form-group">
                             <label for="#">Brand Name English</label>
                             <input name="name_en" class="form-control" type="text">
                             @error('name_en')
                                 <span class="text-danger">{{ $message }}</span>
                             @enderror
                         </div>
                         <div class="form-group">
                             <label for="#">Brand Name Bangla</label>
                             <input name="name_ban" class="form-control" type="text">
                             @error('name_ban')
                             <span class="text-danger">{{ $message }}</span>
                             @enderror
                         </div>
                         <div class="form-group">
                             <label for="#">Brand Image</label>
                             <input name="image" class="form-control-file" type="file">
                             @error('image')
                             <span class="text-danger">{{ $message }}</span>
                             @enderror
                         </div>
                         <div class="form-group">
                             <input value="Add" class="btn btn-success btn-sm" type="submit">
                         </div>
                     </form>
                 </div>









          </div>

       </div>
       </div>
   </section>



    @endsection