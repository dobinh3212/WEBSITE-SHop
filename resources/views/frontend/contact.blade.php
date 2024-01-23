@extends('frontend.layout.__index')
@section('content')
    <!-- PAGE-TITLE-AREA -->

    @if (session('status'))
        <script type="text/javascript">
            Swal.fire({
                icon: 'success',
                iconColor:'green',
                html: '<h4 style="color:black;font-weight:500;">'+ <?= json_encode( session('status')) ?> +'</h4>',
                background:'#fff',
                toast: true,
                position: 'center',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            })
        </script>
    @endif
    @if($banner)
        <section class="page-title-area" style="background: url({{ ($banner) ? $banner->image :'' }})no-repeat;background-position: center center;background-size: cover;">
            <a href="{{ ($banner && $banner->url) ? $banner->url :'javacsript:void(0)' }}" style="display:block;" {{ ($banner && $banner->url) ? "target='$banner->target'" :'' }} >
                <div class="page-title-overlay">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="page-title">
                                    <h3>{{ ($banner) ? $banner->title :'' }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </section>
    @endif
    <!-- PAGE-TITLE-AREA:END -->

    <!-- BREADCRUMBS -->
    <div class="title-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="bred-title">
                        <h3>Liên Hệ</h3>
                    </div>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Trang Chủ</a>
                        </li>
                        <li><a href="about-us.html">Liên Hệ</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMBS:END -->

    <div class="touch-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="headline">
                        <h2>Liên Hệ</h2>
                    </div>
                    <div class="stay-left">
                        <p>Mọi thắc mắc xin liên hệ với chúng tôi </p>
                        <form action="{{ route("post.contact") }}" method="post">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="touch-left">
                                        Họ và tên : (<span style="color:red;">*</span>)
                                        <br>
                                        <input type="text" name="name" required>
                                        <br> Email : (<span style="color:red;">*</span>)
                                        <br>
                                        <input type="text" name="email" required>
                                        <span class="text-danger">Error</span>
                                        <br> Phone Number : (<span style="color:red;">*</span>)
                                        <br>
                                        <input type="text" name="phone" required>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="touch-single">
                                        Nội Dung : (<span style="color:red;">*</span>)
                                        <br>
                                        <textarea name="content" required></textarea>
                                        @if($errors->has('content'))
                                            <p class="text-danger" style="clear:both;">
                                                <strong>Error : </strong> {{ $errors->first('content') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form_submit">
                                <input type="submit" name="submit" value="Send Message">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stay-single">
                        <i class="fa fa-map-marker"></i>
                        <div class="stay-text">
                            <h5>Address :</h5>
                            <p>{{ $setting->address }}</p>
                            <p>{{ $setting->address2 }}</p>
                        </div>
                    </div>
                    <div class="stay-single">
                        <div class="stay-single">
                            <i class="fa fa-envelope-o"></i>
                            <div class="stay-text">
                                <h5>Email :</h5>
                                <p>{{ $setting->email }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="stay-single">
                        <div class="stay-single">
                            <i class="fa fa-phone"></i>
                            <div class="stay-text">
                                <h5>customer support :</h5>
                                <p>
                                    {{ $setting->hotline }}
                                    <br> {{ $setting->phone }}

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
