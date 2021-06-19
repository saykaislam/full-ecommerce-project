@extends('frontend.layouts.master')
@section('title','Contact Us')
@section('content')

    <!--==================== Contact Section Start ====================-->
    <div class="full-row">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-7">
                    <h3 class="down-line mb-5">Send Message</h3>
                    <div class="form-simple mb-5">
                        <form id="contact-form" action="#" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Full Name:</label>
                                        <input type="text" class="form-control bg-gray" name="name" required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Your Email:</label>
                                        <input type="email" class="form-control bg-gray" name="email" required="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label>Subject:</label>
                                        <input type="text" class="form-control bg-gray" name="subject" required="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label>Message:</label>
                                        <textarea class="form-control bg-gray" name="message" rows="8" required=""></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-primary" name="submit" type="submit">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5">
                    <h3 class="down-line mb-5">Contact Us</h3>
                    <p>Nullam vel enim risus. Integer rhoncus hendrerit sem egestas porttitor.</p>
                    <div class="d-flex mb-3">
                        <ul>
                            <li class="mb-3">
                                <strong>Office Address :</strong><br> Level 13, 2 Elizabeth St, Melbourne, Victoria 3000 Australia
                            </li>
                            <li class="mb-3">
                                <strong>Contact Number :</strong><br> (1) 000 991 8830, (800) 8001-8588
                            </li>
                            <li class="mb-3">
                                <strong>Email Address :</strong><br> Info@patron.com, support@patron.com
                            </li>
                        </ul>
                    </div>
                    <h4 class="mb-2">Career Info</h4>
                    <p>If you’re interested in employment opportunities at Unicoder, please email us:<br> <a href="#">support@unicoderbd.com</a></p>
                </div>
            </div>
        </div>
    </div>
    <!--==================== Contact Section End ====================-->
    <!--==================== Map Section Start ====================-->
    <div class="full-row p-0">
        <div class="container-fluid">
            <div class="row">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14604.557245622878!2d90.360452!3d23.778053!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x14c0ec04f1828c03!2sSoftware%20Company%20in%20Bangladesh%20-%20Star%20It%20Ltd!5e0!3m2!1sen!2sbd!4v1621244823177!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                {{--                <div id="map" style="height: 500px; width: 100%; overflow: hidden;"></div>--}}
            </div>
        </div>
    </div>
    <!--==================== Map Section End ====================-->
@endsection
@push('js')

@endpush
