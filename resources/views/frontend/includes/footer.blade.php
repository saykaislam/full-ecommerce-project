<footer class="full-row bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="footer-widget mb-5">
                    <div class="footer-logo mb-4">
                        @php
                        $logo = \App\Model\GeneralSetting::first();
                        @endphp
                        <a href="#"><img src="{{url($logo->footer_logo)}}" alt="" /></a>
                    </div>
                    <div class="widget-ecommerce-contact">
                        <span class="font-medium font-500 text-dark">Got Questions ? Call us!</span>
                        <div class="text-dark h4 font-400 mt-2">01689-063954</div>
                        <span class="h6 mt-5 text-secondary">Address :</span>
                        <div class="text-general">5th Floor (Lift Button-4), BBTOA Building, 9 No South,<br> Mirpur Rd, Dhaka 1207</div>
                    </div>
                </div>
                <div class="footer-widget media-widget mb-5">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-widget category-widget mb-5">
                    <h3 class="widget-title mb-4">Company Info</h3>
                    <ul>
                        <li><a href="{{route('about-us')}}">About Us</a></li>
                        <li><a href="{{route('contact-us')}}">Contact Us</a></li>
                        <li><a href="#">Policy</a></li>
                        <li><a href="#">FAQS</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-widget category-widget mb-5">
                    <h3 class="widget-title mb-4 xs-mx-none">Quick Links</h3>
                    <ul>
                        <li><a href="{{route('blog-list')}}">Blog</a></li>
                        <li><a href="{{route('user.dashboard')}}">My Accounts</a></li>
                        <li><a href="#">Policy</a></li>
                        <li><a href="#">FAQS</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <div class="footer-widget widget-nav mb-5">
                    <h3 class="widget-title mb-4">Customer Support</h3>
                    <ul>
                        <li><a href="#">My Account</a></li>
                        <li><a href="#">Track your Order</a></li>
                        <li><a href="#">Wishlist</a></li>
                        <li><a href="#">Customer Service</a></li>
                        <li><a href="#">Returns/Exchange</a></li>
                        <li><a href="#">FAQs</a></li>
                        <li><a href="#">Product Support</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="full-row copyright bg-gray py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
{{--                <span class="text-dark sm-mb-10 d-block">© 2021 BDShop All right reserved</span>--}}

            </div>
            <div class="col-md-6">
                <ul class="list-ml-30 d-flex align-items-center justify-content-md-end">
                    <li>
                        <a href="#"><img src="{{asset('frontend/assets/images/cards/1.png')}}" alt=""></a>
                    </li>
                    <li>
                        <a href="#"><img src="{{asset('frontend/assets/images/cards/2.png')}}" alt=""></a>
                    </li>
                    <li>
                        <a href="#"><img src="{{asset('frontend/assets/images/cards/3.png')}}" alt=""></a>
                    </li>
                    <li>
                        <a href="#"><img src="{{asset('frontend/assets/images/cards/4.png')}}" alt=""></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--==================== Copyright Section End ====================-->

<!-- Scroll to top -->
<a href="#" class="bg-primary text-white" id="scroll"><i class="fa fa-angle-up"></i></a>
<!-- End Scroll To top -->

<!--============== Modal Start ==============-->
<div class="overlay-dark modal fade quick-view-modal" id="quick-view">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="close view-close">
                <span class=""><i class="fas fa-times"></i></span>
            </div>
            <div class="quickView-preloader text-center" style="padding-top: 20px; padding-bottom: 20px;">
                <img  src="{{asset('frontend/assets/img/loading2.gif')}}" width="20%">
            </div>
            <div class="modal-body property-block summary p-3" id="quickView-modal-body">

            </div>
        </div>
    </div>
</div>
