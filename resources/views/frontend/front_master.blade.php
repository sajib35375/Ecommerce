<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">
    <title>Flipmart premium HTML5 & CSS3 Template</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">


    <!-- Customizable CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/blue.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.transitions.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/rateit.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap-select.min.css') }}">



    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.css') }}">


    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
@include('frontend.body.header')

<!-- ============================================== HEADER : END ============================================== -->

            <!-- ============================================== SIDEBAR ============================================== -->


            @yield('content')

            <!-- ============================================== CONTENT : END ============================================== -->
        </div>
        <!-- /.row -->


      @include('frontend.body.brand')
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div>
    <!-- /.container -->
</div>
<!-- /#top-banner-and-menu -->








@include('frontend.body.footer')
=================================================== FOOTER : END============================================================= -->

<!-- For demo purposes – can be removed on production -->

<!-- For demo purposes – can be removed on production : End -->

<!-- JavaScripts placed at the end of the document so the pages load faster -->
<script src="{{ asset('frontend/assets/js/jquery-1.11.1.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap-hover-dropdown.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/echo.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/jquery.easing-1.3.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap-slider.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/jquery.rateit.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/assets/js/lightbox.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/scripts.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<script>
    @if( Session::has('message') )
    var type = "{{ Session::get('alert_type','info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}")
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}")
            break;
        case 'danger':
            toastr.warning("{{ Session::get('message') }}")
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}")
            break;
    }

    @endif
    </script>
{{--add to cart modal--}}

<div id="addtocart" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div style="width: 800px;height: 350px;margin: auto;" class="modal-content">
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="card">
                                <label for="#">Product Name :<span id="product_name"></span></label>
                                <img style="width: 160px;height: 200px;" id="p_img" src="" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <ul class="list-group">
                                <li class="list-group-item">Product Price :<span id="price"></span> </li>
                                <li class="list-group-item">Product code :<span id="code"></span></li>
                                <li class="list-group-item">Brands :<span id="brands"></span></li>
                                <li class="list-group-item">Category :<span id="category"></span></li>
                                <li class="list-group-item">stock :<span style="background: green;" class="badge badge-pill badge-success" id="available"></span><span style="background: red;" class="badge badge-pill badge-danger" id="stockout"></span></li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="#">Color</label>
                            <select class="form-control" name="color" id="p_color">
                                <option selected disabled value="">-select-</option>

                            </select>
                        </div>
                        <br>
                        <div id="sizeArea" class="form-group">
                            <label for="#">Size</label>
                            <select class="form-control" name="size" id="p_size">
                                <option selected disabled value="">-select-</option>

                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="#">Quantity</label>
                            <input name="quantity" id="qnt" class="form-control" type="number">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="cart_id">
                        <input class="btn btn-danger cart_btn" value="AddToCart" type="submit">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    $(document).ready(function (){
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.modal_btn').click(function (e){
            e.preventDefault();
            let id = $(this).attr('modal_id');

            $.ajax({
                url : '/show/add_to_cart/'+id,
                success : function (data){

                    $('#addtocart').modal('show');
                    $('#qnt').html(data.product.product_quantity);
                    if (data.product.product_discount_price){
                        $('#price').html(data.product.product_discount_price);
                    }else{
                        $('#price').html(data.product.product_selling_price);
                    }
                    $('ul li #code').html(data.product.product_code);
                    $('ul li #brands').html(data.product.brand.brand_name_en);
                    $('ul li #category').html(data.product.category.category_name_en);
                    $('#p_img').attr('src','/'+data.product.product_thumbnail);
                    $('#product_name').html(data.product.product_name_eng);
                    $('input[name="cart_id"]').val(data.product.id);
                    $('select[name="color"]').empty();
                    $.each(data.color,function (key,value){
                        $('select[name="color"]').append('<option value="'+value+'">'+value+'</option>');
                    });
                    $('select[name="size"]').empty();
                    $.each(data.size,function (key,value){
                        $('select[name="size"]').append('<option value="'+value+'">'+value+'</option>');
                    });
                    if (data.size==""){
                        $('#sizeArea').hide();
                    }else{
                        $('#sizeArea').show();
                    }
                    if (data.product.product_quantity > 0){
                        $('#stockout').text('');
                        $('#available').text('');
                        $('#available').text('available');
                    }else{
                        $('#stockout').text('');
                        $('#available').text('');
                        $('#stockout').text('stockout');
                    }
                }
            });

        });


        $(document).on('click','.cart_btn',function (e){
            e.preventDefault();
            let cart_id = $('input[name="cart_id"]').val();
            let product_name = $('#product_name').text();
            // let price = $('#price').text();
            // let code = $('#code').text();
            let brand = $('#brands').text();
            let category = $('#category').text();
            let quantity = $('#qnt').val();
            let color = $('#p_color option:selected').text();
            let size = $('#p_size option:selected').text();


            $.ajax({
                type :"POST",
                dataType:'json',
                 data :{
                     name:product_name,
                     brand:brand,
                     category:category,
                     color:color,
                     size:size,
                     quantity:quantity
                 },
                // contentType :false,
                // processData :false,
                url :'/AddToCart-store/'+cart_id,
                success :function (data){
                    $('#addtocart').modal('hide');
                    // console.log(data);
                    miniCart();
                    const Toast = Swal.mixin({
                        toast:true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)){
                        Toast.fire({
                            type:'success',
                            title:data.success
                        })
                    }else{
                        Toast.fire({
                            type:'error',
                            title:data.error
                        })
                    }

                }
            });
        })





    });


</script>
<script>
    function miniCart(){
        $.ajax({
           type : 'GET',
            url : '/AddTo/MiniCart/',
           dataType : 'json',
            success : function (data){
                $('#cartSubTotal').text(data.cartTotal);
                $('#Qty').text(data.cartQty);
                var miniCart = "";
              $.each(data.cartCount,function (key,value){
                  miniCart += `<div class="cart-item product-summary">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <div class="image"> <a href="detail.html"><img src="/${value.options.image}" alt=""></a> </div>
                                        </div>
                                        <div class="col-xs-7">
                                            <h3 class="name"><a href="index.php?page-detail">${value.name}</a></h3>
                                            <div class="price">${value.price} * ${value.qty}</div>
                                        </div>
                                        <div class="col-xs-1 action"> <button type="submit" id=${value.rowId} onclick="miniCartRemove(this.id)"><i class="fa fa-trash"></i></button> </div>
                                    </div>
                                </div>
                                <!-- /.cart-item -->
                                <div class="clearfix"></div>
                                <hr>`;

              });
              $('#miniCart').html(miniCart);
            }
        });
    }
    miniCart();

    function miniCartRemove(rowId){
        $.ajax({
             type:"GET",
             url :'/remove/MiniCart/product/'+rowId,
              dataType:'json',
              success : function(data){
                  miniCart();

                  const Toast = Swal.mixin({
                  toast:true,
                  position: 'top-end',
                  icon: 'success',
                  showConfirmButton: false,
                  timer: 1500,
                  });
                  if( $.isEmptyObject(data.error) ){
                      Toast.fire({
                      type : 'success',
                      title : data.success,
                  });
                  }else{
                  Toast.fire({
                  type : 'error',
                  title : data.error,
                  });
                  }
              }
      });


    }








</script>


</body>
</html>
