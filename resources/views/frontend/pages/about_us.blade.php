@extends('frontend.layouts.master')
@section('title','About Us')
@section('content')
    <!--==================== About Owner Section Start ====================-->
    <div class="full-row">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12">
                    <span class="h6 text-primary">Our Company</span>
                    <h3 class="text-dark down-line-primary mb-4">Experienc & Experience</h3>
                    <span class="text-general mt-4 mb-4 sub-title ordenery-font font-italic font-medium">Aliquam nostra condimentum blandit diam libero habitant odio, aliquam a nam faucibus rhoncus malesuada porta vitae.</span>
                    <p>Aliquam tincidunt cursus. Sed id urna venenatis Ligula est condimentum praesent pretium netus tempor id mollis est. Amet. Nascetur nunc senectus bibendum. Quis amet odio dapibus maecenas laoreet amet quis nunc. Elementum, laoreet,
                        libero litora dis pretium nam praesent neque tortor libero nostra. Aliquet luctus sapien, imperdiet felis feugiat. Hymenaeos ad accumsan sodales.</p>

                    <p>Convallis venenatis pharetra ut eu laoreet consequat mauris. Commodo aliquet id. Fringilla neque nam scelerisque. Ridiculus iaculis nascetur sagittis pulvinar litora feugiat aliquam pretium fringilla nibh pulvinar.</p>
                </div>
                <div class="col-lg-5 col-md-12 sm-mx-none">
                    <img class="sm-mb-30" src="{{asset('frontend/assets/images/banner/54.png')}}" alt="Image not found!">
                </div>
            </div>
        </div>
    </div>



    <div class="full-row bg-secondary" style="padding-bottom: 100px">
        <div class="container position-relative z-index-1">
            <div class="row">
                <div class="col-lg-12 mb-5">
                    <span class="h5 text-center text-white d-table w-50 mx-auto">Take a look at our</span>
                    <h3 class="text-white down-line-white mb-4 text-center w-75 mx-auto w-sm-100 text-center">Service Speciality</h3>
                    <span class="text-light mt-4 mb-4 sub-title ordenery-font text-center w-50 mx-auto">Aliquam nostra condimentum blandit diam libero habitant odio, aliquam a nam faucibus rhoncus malesuada porta vitae.</span>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="d-flex my-3">
                        <div class="pe-3 text-light text-end">
                            <h4 class="mb-3"><a class="text-light" href="service.html">Experience support team</a></h4>
                            <p>Fusce nec tortor velit ante sagittis nunc malesuada. Lectus malesuada fringilla fames fames fermentum curabitur, duis fusce varius.</p>
                        </div>
                        <span class="d-table py-1"><i class="far fa-dot-circle text-primary"></i></span>
                    </div>
                    <div class="d-flex my-3">
                        <div class="pe-3 text-light text-end">
                            <h4 class="mb-3"><a class="text-light" href="service.html">Handle emergency situations</a></h4>
                            <p>Fusce nec tortor velit ante sagittis nunc malesuada. Lectus malesuada fringilla fames fames fermentum curabitur, duis fusce varius.</p>
                        </div>
                        <span class="d-table py-1"><i class="far fa-dot-circle text-primary"></i></span>
                    </div>
                </div>
                <div class="col-lg-3 mx-auto sm-mx-none">
                    <img class="y-center position-relative" src="{{asset('frontend/assets/images/icon/1.png')}}" alt="Image not found!">
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="d-flex my-3">
                        <span class="d-table py-1"><i class="far fa-dot-circle text-primary"></i></span>
                        <div class="ps-3 text-light text-left">
                            <h4 class="mb-3"><a class="text-light" href="service.html">Hight technology instrument</a></h4>
                            <p>Fusce nec tortor velit ante sagittis nunc malesuada. Lectus malesuada fringilla fames fames fermentum curabitur, duis fusce varius.</p>
                        </div>
                    </div>
                    <div class="d-flex my-3">
                        <span class="d-table py-1"><i class="far fa-dot-circle text-primary"></i></span>
                        <div class="ps-3 text-light text-left">
                            <h4 class="mb-3"><a class="text-light" href="service.html">Access control system</a></h4>
                            <p>Fusce nec tortor velit ante sagittis nunc malesuada. Lectus malesuada fringilla fames fames fermentum curabitur, duis fusce varius.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="full-row bg-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-5">
                    <div class="bg-light p-5 sm-mb-40" style="margin-top: -120px">
                        <span class="h6 text-center text-primary">Found us in</span>
                        <h4 class="text-secondary down-line-secondary mb-4">Best Skills</h4>
                        <span class="text-dark mt-4 mb-4 sub-title ordenery-font font-italic">Aliquam nostra condimentum blandit diam libero habitant odio, aliquam a nam faucibus rhoncus malesuada porta vitae.</span>
                        <p>Facilisis sagittis mollis dignissim, curabitur vel morbi purus fermentum mi nostra dui sit faucibus ornare odio vitae sit eu eu ultrices cum ligula taciti mollis vestibulum adipiscing lorem in primis tempus netus interdum diam
                            velit eu mollis, diam facilisi id parturient dui etiam placerat sociis.</p>
                        <a href="shop-grid.html" class="btn btn-primary text-dark">Go To Shop</a>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">
                    <div class="capability-avg ps-md-5">
                        <div class="bar-progress fact-counter text-white position-relative mb-5">
                            <span>Network Security</span>
                            <div class="mt-2 progress bg-light count wow fadeIn" data-wow-duration="0ms">
                                <div class="skill-percent"><span class="count-num" data-speed="3000" data-stop="90">0</span>%</div>
                                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="90" aria-valuemax="100"> </div>
                            </div>
                        </div>
                        <div class="bar-progress fact-counter text-white position-relative mb-5">
                            <span>Event Security Coverage</span>
                            <div class="mt-2 progress bg-light count wow fadeIn" data-wow-duration="0ms">
                                <div class="skill-percent"><span class="count-num" data-speed="3000" data-stop="82">0</span>%</div>
                                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="82" aria-valuemax="100"> </div>
                            </div>
                        </div>
                        <div class="bar-progress fact-counter text-white position-relative mb-5">
                            <span>Personal Security</span>
                            <div class="mt-2 progress bg-light count wow fadeIn" data-wow-duration="0ms">
                                <div class="skill-percent"><span class="count-num" data-speed="3000" data-stop="75">0</span>%</div>
                                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="75" aria-valuemax="100"> </div>
                            </div>
                        </div>
                        <div class="bar-progress fact-counter text-white position-relative mb-5">
                            <span>Building and House Security</span>
                            <div class="mt-2 progress bg-light count wow fadeIn" data-wow-duration="0ms">
                                <div class="skill-percent"><span class="count-num" data-speed="3000" data-stop="99">0</span>%</div>
                                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="99" aria-valuemax="100"> </div>
                            </div>
                        </div>
                        <div class="bar-progress fact-counter text-white position-relative mb-5">
                            <span>Business Strategy</span>
                            <div class="mt-2 progress bg-light count wow fadeIn" data-wow-duration="0ms">
                                <div class="skill-percent"><span class="count-num" data-speed="3000" data-stop="80">0</span>%</div>
                                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="80" aria-valuemax="100"> </div>
                            </div>
                        </div>
                        <div class="bar-progress fact-counter text-white position-relative mb-5">
                            <span>Markeating Policy</span>
                            <div class="mt-2 progress bg-light count wow fadeIn" data-wow-duration="0ms">
                                <div class="skill-percent"><span class="count-num" data-speed="3000" data-stop="51">0</span>%</div>
                                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="51" aria-valuemax="100"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="full-row bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-5">
                    <span class="h6 text-center text-primary d-table w-50 mx-auto">Year In Business</span>
                    <h3 class="text-secondary down-line-secondary mb-4 text-center w-75 mx-auto w-sm-100 text-center">History Timeline</h3>
                    <span class="text-dark mt-4 mb-4 sub-title ordenery-font text-center w-50 font-italic mx-auto">Aliquam nostra condimentum blandit diam libero habitant odio, aliquam a nam faucibus rhoncus malesuada porta vitae.</span>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-simple history-tab tab-action">
                        <ul class="nav nav-pills wc-tabs" id="pills-tab-one" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="pills-1985-one-tab" data-bs-toggle="pill" href="#pills-1985-one" role="tab" aria-controls="pills-1985-one" aria-selected="true">1985</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="pills-1995-one-tab" data-bs-toggle="pill" href="#pills-1995-one" role="tab" aria-controls="pills-1995-one" aria-selected="true">1995</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="pills-2005-one-tab" data-bs-toggle="pill" href="#pills-2005-one" role="tab" aria-controls="pills-2005-one" aria-selected="true">2005</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="pills-2011-one-tab" data-bs-toggle="pill" href="#pills-2011-one" role="tab" aria-controls="pills-2011-one" aria-selected="true">2011</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="pills-2015-one-tab" data-bs-toggle="pill" href="#pills-2015-one" role="tab" aria-controls="pills-2015-one" aria-selected="true">2015</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="pills-2019-one-tab" data-bs-toggle="pill" href="#pills-2019-one" role="tab" aria-controls="pills-2019-one" aria-selected="true">2019</a>
                            </li>
                        </ul>
                        <div class="tab-content icon-hover-primary" id="pills-tabContent-one">
                            <div class="tab-pane fade show active woocommerce-Tabs-panel woocommerce-Tabs-panel--description" id="pills-1985-one" role="tabpanel" aria-labelledby="pills-1985-one-tab">
                                <h5 class="text-white my-4 text-dark text-center">Establish New Security Depeartment</h5>
                                <p class="w-50 mx-auto w-sm-100 text-center">Phasellus metus neque vel. Integer erat convallis sociosqu parturient varius sapien, tempus vehicula magnis purus ultrices. Molestie eget tortor ligula sapien justo phasellus habitasse, viverra sollicitudin per odio
                                    Senectus turpis. Pellentesque dictum tempor quam non leo morbi facilisis scelerisque varius. Lacinia hymenaeos semper. Molestie pharetra cubilia maecenas maecenas.</p>
                            </div>
                            <div class="tab-pane fade" id="pills-1995-one" role="tabpanel" aria-labelledby="pills-1995-one-tab">
                                <h5 class="text-white my-4 text-dark text-center">Establish New Security Depeartment</h5>
                                <p class="w-50 mx-auto w-sm-100 text-center">Phasellus metus neque vel. Integer erat convallis sociosqu parturient varius sapien, tempus vehicula magnis purus ultrices. Molestie eget tortor ligula sapien justo phasellus habitasse, viverra sollicitudin per odio
                                    Senectus turpis. Pellentesque dictum tempor quam non leo morbi facilisis scelerisque varius. Lacinia hymenaeos semper. Molestie pharetra cubilia maecenas maecenas.</p>
                            </div>
                            <div class="tab-pane fade" id="pills-2005-one" role="tabpanel" aria-labelledby="pills-2005-one-tab">
                                <h5 class="text-white my-4 text-dark text-center">Establish New Security Depeartment</h5>
                                <p class="w-50 mx-auto w-sm-100 text-center">Phasellus metus neque vel. Integer erat convallis sociosqu parturient varius sapien, tempus vehicula magnis purus ultrices. Molestie eget tortor ligula sapien justo phasellus habitasse, viverra sollicitudin per odio
                                    Senectus turpis. Pellentesque dictum tempor quam non leo morbi facilisis scelerisque varius. Lacinia hymenaeos semper. Molestie pharetra cubilia maecenas maecenas.</p>
                            </div>
                            <div class="tab-pane fade" id="pills-2011-one" role="tabpanel" aria-labelledby="pills-2011-one-tab">
                                <h5 class="text-white my-4 text-dark text-center">Establish New Security Depeartment</h5>
                                <p class="w-50 mx-auto w-sm-100 text-center">Phasellus metus neque vel. Integer erat convallis sociosqu parturient varius sapien, tempus vehicula magnis purus ultrices. Molestie eget tortor ligula sapien justo phasellus habitasse, viverra sollicitudin per odio
                                    Senectus turpis. Pellentesque dictum tempor quam non leo morbi facilisis scelerisque varius. Lacinia hymenaeos semper. Molestie pharetra cubilia maecenas maecenas.</p>
                            </div>
                            <div class="tab-pane fade" id="pills-2015-one" role="tabpanel" aria-labelledby="pills-2015-one-tab">
                                <h5 class="text-white my-4 text-dark text-center">Establish New Security Depeartment</h5>
                                <p class="w-50 mx-auto w-sm-100 text-center">Phasellus metus neque vel. Integer erat convallis sociosqu parturient varius sapien, tempus vehicula magnis purus ultrices. Molestie eget tortor ligula sapien justo phasellus habitasse, viverra sollicitudin per odio
                                    Senectus turpis. Pellentesque dictum tempor quam non leo morbi facilisis scelerisque varius. Lacinia hymenaeos semper. Molestie pharetra cubilia maecenas maecenas.</p>
                            </div>
                            <div class="tab-pane fade" id="pills-2019-one" role="tabpanel" aria-labelledby="pills-2019-one-tab">
                                <h5 class="text-white my-4 text-dark text-center">Establish New Security Depeartment</h5>
                                <p class="w-50 mx-auto w-sm-100 text-center">Phasellus metus neque vel. Integer erat convallis sociosqu parturient varius sapien, tempus vehicula magnis purus ultrices. Molestie eget tortor ligula sapien justo phasellus habitasse, viverra sollicitudin per odio
                                    Senectus turpis. Pellentesque dictum tempor quam non leo morbi facilisis scelerisque varius. Lacinia hymenaeos semper. Molestie pharetra cubilia maecenas maecenas.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==================== About Owner Section End ====================-->
@endsection
