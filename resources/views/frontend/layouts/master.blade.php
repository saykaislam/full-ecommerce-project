<!DOCTYPE html>
<html lang="en">


<head>
    <!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="BigBazar - Multipurpose Ecommerce HTML Template">

    <meta name="author" content="root">
    <title>@yield('title') | Saad Food</title>

    <!-- Favicon -->
{{--    <link rel="shortcut icon" href="{{asset('frontend/assets/images/favicon.png')}}">--}}

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">

    <!--  CSS Style -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/webfonts/flaticon/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/layerslider.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/template.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/category/grocery-store.css')}}">
    {{--toastr css--}}
    <style>
        @media only screen and (max-width: 600px) {
            .header-sticky {
                position: fixed!important;
                top: 0;
                z-index: 9999999;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    @stack('css')
</head>


<body>

<div id="page_wrapper" class="bg-light">

    <!--==================== Header Section Start ====================-->
@include('frontend.includes.header')
<!--==================== Header Section End ====================-->

    <!--==================== Banner Section Start ====================-->
@yield('content')

<!--==================== Footer Section Start ====================-->
@include('frontend.includes.footer')
    <!--==================== Footer Section End ====================-->

    <!--==================== Copyright Section Start ====================-->

    <!--============== Modal End ==============-->

</div>

<!-- Include Scripts -->
<script src="{{asset('frontend/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/greensock.js')}}"></script>
<script src="{{asset('frontend/assets/js/layerslider.transitions.js')}}"></script>
<script src="{{asset('frontend/assets/js/layerslider.kreaturamedia.jquery.js')}}"></script>
<script src="{{asset('frontend/assets/js/popper.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/wow.js')}}"></script>
<script src="{{asset('frontend/assets/js/jquery.countdown.js')}}"></script>
<script src="{{asset('frontend/assets/js/custom.js')}}"></script>
<script src="{{ asset('frontend/assets/js/lazysizes.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


<!-- Initializing the slider -->
<script>
    $(document).ready(function() {
        $('#slider').layerSlider({
            sliderVersion: '6.0.0',
            type: 'responsive',
            responsiveUnder: 0,
            layersContainer: 1200,
            hideUnder: 0,
            hideOver: 100000,
            skin: 'v6',
            globalBGColor: '#ffffff',
            navStartStop: false,
            skinsPath: 'assets/skins/',
            height: 479
        });
    });
</script>
@stack('js')
{!! Toastr::message() !!}
<script>
    function showFrontendAlert(type, message){
        if(type == 'danger'){
            type = 'error';
        }
        swal({
            position: 'top-end',
            type: type,
            title: message,
            showConfirmButton: false,
            timer: 3000
        });
    }
</script>
<script>
    @if($errors->any())
    @foreach($errors->all() as $error )
    toastr.error('{{$error}}','Error',{
        closeButton:true,
        progressBar:true
    });
    @endforeach
    @endif


    $(document).ready(function() {


    })

    //add to cart
    function addToCart(productId, variant) {
        //alert(variant)
        $('.cart-popup').empty();
        $.post('{{ route('product.add.cart') }}', {
            _token: '{{ csrf_token() }}',
            product_id: productId,
            variant: variant,
    }, function (data) {

            $('.cart-popup').html(data);
            toastr.success('Item has been added to cart');
            var countValue = $('.cartCount').val()
            $('.cartCountTotal').text(countValue);
            //document.getElementsByClassName("cartCountTotal").innerHTML = data;
            console.log(countValue)
        });
    }
    function addToWishList(id){
        @if (Auth::check() && (Auth::user()->user_type == 'customer'))
        $.post('{{ route('user.wishlists.store') }}', {_token:'{{ csrf_token() }}', id:id}, function(data){
            if(data != 0){
                $('#wishlist').html(data);
                toastr.success('Item has been added to wishlist');
            }
            else{
                toastr.error('Please login first');
            }
        });
        @else
            toastr.error('Please login first');
        @endif

    }

    function showQuickViewModal(id){
        $('.quickView-preloader').show();
        $('#quickView-modal-body').html(null);
        $('#quick-view').modal();
        $.post('{{ route('show.quick-view.modal') }}', {_token:'{{ csrf_token() }}', id:id}, function(data){
            $('.quickView-preloader').hide();
            $('#quickView-modal-body').html(data);
            getVariantPrice();
        });
    }


    $('#option-choice-form input').on('change', function(){
        getVariantPrice();
    });

    function getVariantPrice(){
        //alert('oh no!!')
        if($('#option-choice-form input[name=quantity]').val() > 0 && checkAddToCartValidity()){
            $.ajax({
                type:"POST",
                url: '{{ route('products.variant_price') }}',
                data: $('#option-choice-form').serializeArray(),
                success: function(data){
                    $('#option-choice-form #chosen_price_div').removeClass('d-none');
                    $('#option-choice-form #chosen_price_div #chosen_price').html('৳ ' +data.price);
                    $('#available-quantity').html(data.quantity);
                    $('.input-number').prop('max', data.quantity);
                    console.log(data.quantity);
                    if(parseInt(data.quantity) < 1 && data.digital  != 1){
                        $('.buy-now').hide();
                        $('.add-to-cart').hide();
                    }
                    else{
                        $('.buy-now').show();
                        $('.add-to-cart').show();
                    }
                }
            });
        }
    }
    function checkAddToCartValidity() {
        var names = {};
        $('#option-choice-form input:radio').each(function () { // find unique names
            names[$(this).attr('name')] = true;
        });
        var count = 0;
        $.each(names, function () { // then count them
            count++;
        });

        if ($('#option-choice-form input:radio:checked').length == count) {
            return true;
        }

        return false;
    }

    //direct buy
    function buyNow(){
        if(checkAddToCartValidity()) {
            //$('#addToCart').modal();
            $('.quickView-preloader').show();
            $.ajax({
                type:"POST",
                url: '{{ route('product.direct.buy') }}',
                data: $('#option-choice-form').serializeArray(),
                success: function(data){
                    $('.quickView-preloader').hide();
                  /*  //$('#addToCart-modal-body').html(null);
                    //$('.c-preloader').hide();
                    //$('#modal-size').removeClass('modal-lg');
                    //$('#addToCart-modal-body').html(data);
                    updateNavCart();
                    $('#cart_items_sidenav').html(parseInt($('#cart_items_sidenav').html())+1);*/
                    window.location.replace("{{ route('shopping-cart') }}");
                }
            });
        }
        else{
            showFrontendAlert('warning', 'Please choose all the options');
        }
    }
    //global (normal and variant) add to cart
    function addToCartGlobal(){
        if(checkAddToCartValidity()) {
            $('.cart-popup').empty()
            $('.quickView-preloader').show();
            $.ajax({
                type:"POST",
                url: '{{ route('product.global.addToCart') }}',
                data: $('#option-choice-form').serializeArray(),
                success: function(data){
                    console.log(data)
                    $('.quickView-preloader').hide();
                    $('.cart-popup').html(data);
                    toastr.success('Item has been added to cart');
                    var countValue = $('.cartCount').val()
                    $('.cartCountTotal').text(countValue);
                }
            });
        }
        else{
            showFrontendAlert('warning', 'Please choose all the options');
        }
    }


    function addToCompare(id){
        $.post('{{ route('compare.addToCompare') }}', {_token:'{{ csrf_token() }}', id:id}, function(data){
            $('#compare').html(data);
            $('#compare_2').html(data);
            toastr.success( "Item has been added to compare list");
            $('#compare_items_sidenav').html(parseInt($('#compare_items_sidenav').html())+1);

        });

    }
    // search here..........
    $('#search').on('keyup', function(){
        search();
    });
    $('#search').on('focus', function(){
        search();
    });

    $('#search2').on('keyup', function(){
        search();
    });
    $('#search2').on('focus', function(){
        search();
    });

    function search(){
        //alert('ssss')
        var search = $('#search').val();
        var search2 = $('#search2').val();
        if(search.length > 0){
            $('body').addClass("typed-search-box-shown");

            $('.typed-search-box').removeClass('d-none');
            $('.search-preloader').removeClass('d-none');
            $.post('{{ route('search.ajax') }}', { _token: '{{ @csrf_token() }}', search:search}, function(data){
                if(data == '0'){
                    // $('.typed-search-box').addClass('d-none');
                    $('#search-content').html(null);
                    //$('#search-content2').html(null);
                    $('.typed-search-box .search-nothing').removeClass('d-none').html('Sorry, nothing found for <strong>"'+search+'"</strong>');
                    $('.search-preloader').addClass('d-none');

                }
                else{
                    $('.typed-search-box .search-nothing').addClass('d-none').html(null);
                    $('#search-content').html(data);
                    //$('#search-content2').html(data);
                    $('.search-preloader').addClass('d-none');
                }
            });
        }else if (search2.length > 0){
            $('body').addClass("typed-search-box-shown");

            $('.typed-search-box').removeClass('d-none');
            $('.search-preloader').removeClass('d-none');
            $.post('{{ route('search.ajax') }}', { _token: '{{ @csrf_token() }}', search:search2}, function(data){
                if(data == '0'){
                    // $('.typed-search-box').addClass('d-none');
                    $('#search-content2').html(null);
                    $('.typed-search-box .search-nothing').removeClass('d-none').html('Sorry, nothing found for <strong>"'+search+'"</strong>');
                    $('.search-preloader').addClass('d-none');

                }
                else{
                    $('.typed-search-box .search-nothing').addClass('d-none').html(null);
                    $('#search-content2').html(data);
                    $('.search-preloader').addClass('d-none');
                }
            });
        }
        else {
            $('.typed-search-box').addClass('d-none');
            $('body').removeClass("typed-search-box-shown");
        }
    }
    //sticky header

    $(window).scroll(function(){
        if ($(window).scrollTop() >= 300) {
            $('#search-box').hide();
            $('#search-box-2').show();
        }
        else {
            $('#search-box').show();
            $('#search-box-2').hide();
        }
    });


</script>
</body>

</html>
