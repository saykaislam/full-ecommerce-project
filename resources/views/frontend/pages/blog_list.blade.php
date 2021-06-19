@extends('frontend.layouts.master')
@section('title','Blogs')
@section('content')
    <!-- breadcrumb -->
    <div class="full-row bg-light overlay-dark py-5">
        <div class="container">
            <div class="row text-center text-white">
                <div class="col-12">
                    <h3 class="mb-2 text-primary">Blogs</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
    <div class="full-row">
        <div class="container">
            <div class="row row-cols-md-3 row-cols-1 g-4">
                @foreach( $blogs as $blog)
                    <div class="col">
                        <div class="thumb-blog-simple transation hover-img-zoom">
                            <div class="post-image overflow-hidden">
                                <a href="{{route('blog-details',$blog->slug)}}"> <img class="lazyload" src="{{ asset('frontend/assets/images/placeholder.jpg') }}"  data-src="{{asset('uploads/blogs/'.$blog->image)}}" alt="Image not found!"> </a>
                            </div>
                            <div class="post-content py-3">
                                <div class="post-meta font-mini text-uppercase list-color-light mb-1">
                                    <a href="{{route('blog-details',$blog->slug)}}"><span>{{$blog->author}}</span></a>
                                </div>
                                <h5><a href="{{route('blog-details',$blog->slug)}}" class="transation text-dark hover-text-primary d-block">{{$blog->title}}</a></h5>
                                <p>{!! Str::limit($blog->short_description, 150) !!}</p>
                                <div class="date text-primary font-small text-uppercase"><span>{{date('jS M Y',strtotime($blog->created_at))}}</span></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
