@extends('frontend.layout.app')

@section('content')
    <!-- ***** Breadcrumb Area Start ***** -->
    <div class="breadcrumb-area">
        <div class="container h-100">
            <div class="row h-100 align-items-end">
                <div class="col-12">
                    <div class="breadcumb--con">
                        <h2 style="text-align: right;">عرض الدروس</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> الرئيسية</a></li>

                                <li class="breadcrumb-item active" aria-current="page">الدروس</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Background Curve -->
        <div class="breadcrumb-bg-curve">
            <img src="{{ asset('frontend/img/core-img/curve-5.png') }}" alt="">
        </div>
    </div>
    <!-- ***** Breadcrumb Area End ***** -->

    <!-- ***** Blog Area Start ***** -->
    <div class="uza-blog-area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-center">تفاصيل اليوم</h3>
                </div>
                <div class="col-md-12">
                    <p class="pull-right">
                      <!-- $data[0]['showdate'] -->
                        <strong> تاريخ العرض :   </strong>  @if ($data[] )  {{ $data[0]['showdate'] }} @endif
                    </p>
                </div>
                <div class="col-md-12">
                    <p class="pull-right">
                        <strong> اسم اليوم :  </strong> @if ($data[] ) {{ $data[0]['course_relation']['name'] }} @endif
                    </p>
                </div>
                <div class="col-md-12">
                    <p class="pull-right">
                        <strong> تفاصيل اليوم :  </strong> @if ($data[] ) {{ $data[0]['course_relation']['desc'] }} @endif
                    </p>
                </div>
                <!-- <div class="col-md-12">
                    <p class="pull-right">
                        <strong> سعر المساق  :  </strong> {{ $data[0]['course_relation']['price'] }} جنية مصري
                    </p>
                </div> -->
            </div>
        </div>
    </div>
    <!-- ***** Blog Area End ***** -->

    <!-- ***** Blog Area Start ***** -->
    <div class="uza-blog-area section-padding-80">
        <div class="container">
            <div class="row">
                @foreach ($data[0]['course_relation']['lessons_relation'] as $l)
                    <!-- Single Blog Post -->
                    <div class="col-12 col-lg-4">
                        <div class="single-blog-post bg-img mb-80" style="background-image: url('{{ ShowImage($l['image']) }}')">
                            <!-- Post Content -->
                            <div class="post-content">
                                <a href="#" class="post-title" style="text-align: right;">{{ $l['title'] }}</a>
                                <p>{{ str_limit(strip_tags($l['content']), 100) }}</p>
                                <a href="{{ url('/lesson/'.$l['id']) }}" class="read-more-btn">المزيد <i class="arrow_carrot-2left"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- ***** Blog Area End ***** -->
@endsection
