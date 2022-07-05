
<!-- 'global short name' is by default EN (English) -->

@if (!session()->get('session_short_name'))

    <!-- 'session_short_name' comes from LanguageController -->

    @php
        $current_short_name = $global_short_name;
    @endphp

@else 

    @php
        $current_short_name = session()->get('session_short_name');
    @endphp

@endif

<!-- // -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
        <meta name="description" content="">
        <title>News Portal Website</title>        
		
        <link rel="icon" type="image/png" href="{{ asset('dist-front') }}/uploads/favicon.png">

        <!-- All CSS -->
        @include('front.layout.styles')
        
        <!-- All Javascripts -->
        @include('front.layout.scripts')

        <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;500;600;700&display=swap" rel="stylesheet">

        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-6212352ed76fda0a"></script>        
        
        <!-- Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-84213520-6"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'UA-84213520-6');
        </script>
    
    </head>
    <body>
        <div class="top">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <ul>
                            <li class="today-text">{{ TODAY }}: January 20, 2022</li>
                            <li class="email-text">contact@arefindev.com</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="right">
                            @if ($global_page_data->faq_status=="Show")
                                <li class="menu"><a href="{{ route('faq') }}">FAQ</a></li>
                            @endif
                            @if ($global_page_data->about_status=="Show")
                                <li class="menu"><a href="{{ route('about') }}">About</a></li>
                            @endif
                            @if ($global_page_data->contact_status=="Show")
                                <li class="menu"><a href="{{ route('contact') }}">Contact</a></li>
                            @endif
                            @if ($global_page_data->login_status=="Show")
                                <li class="menu"><a href="{{ route('login') }}">Login</a></li>
                            @endif
                            <li>
                                <div class="language-switch">
                                    <form action="{{ route('front_language') }}" method="post">@csrf
                                        <select name="short_name" onchange="this.form.submit()">
                                            @foreach ($global_language_data as $item)
                                                <option value="{{ $item->short_name }}" @if ($item->short_name == $current_short_name)
                                                    selected
                                                @endif>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="heading-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 d-flex align-items-center">
                        <div class="logo">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('uploads/logo.png') }}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-8">
                        {{-- @if ($global_top_ad_data->top_ad_status=="Show")
                            <div class="ad-section-1">
                                @if ($data->top_ad_url=="")
                                    <img src="{{ asset('uploads/'.$global_top_ad_data->top_ad) }}" alt="No Image Found">
                                @else
                                    <a href="{{ $global_top_ad_data->top_ad_url }}"><img src="{{ asset('uploads/'.$global_top_ad_data->top_ad) }}" alt="No Image Found"></a>
                                @endif
                            </div>
                        @endif --}}
                    </div>
                </div>
            </div>
        </div>
        @include('front.layout.nav')       




        @yield('content')
        

        

        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="item">
                            <h2 class="heading">{{ FOOTER_COL_1_HEADING }}</h2>
                            <p>
                                {{ FOOTER_COL_1_TEXT }}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="item">
                            <h2 class="heading">{{ FOOTER_COL_2_HEADING }}</h2>
                            <ul class="useful-links">
                                <li><a href="index.html">Home</a></li>
                                <li><a href="{{ route('terms') }}">Terms and Conditions</a></li>
                                <li><a href="privacy.html">Privacy Policy</a></li>
                                <li><a href="disclaimer.html">Disclaimer</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    
                    <div class="col-md-3">
                        <div class="item">
                            <h2 class="heading">{{ FOOTER_COL_3_HEADING }}</h2>
                            <div class="list-item">
                                <div class="left">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="right">
                                    {{ FOOTER_ADDRESS }}
                                </div>
                            </div>
                            <div class="list-item">
                                <div class="left">
                                    <i class="far fa-envelope"></i>
                                </div>
                                <div class="right">
                                    {{ FOOTER_EMAIL }}
                                </div>
                            </div>
                            <div class="list-item">
                                <div class="left">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div class="right">
                                    {{ FOOTER_PHONE }}
                                </div>
                            </div>
                            <ul class="social">
                                <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href=""><i class="fab fa-twitter"></i></a></li>
                                <li><a href=""><i class="fab fa-pinterest-p"></i></a></li>
                                <li><a href=""><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href=""><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- News Letter Section -->
                    <div class="col-md-3">
                        <div class="item">
                            <h2 class="heading">{{ FOOTER_COL_4_HEADING }}</h2>
                            <p>
                                {{ NEWSLETTER_TEXT }} 
                            </p>
                            <form action="{{ route('subscribe') }}" method="post" class="form_subscribe_ajax">
                                @csrf
                                <div class="form-group">
                                    <input type="email" name="email" placeholder="{{ EMAIL_ADDRESS }}" class="form-control">
                                    <span class="text-danger error-text email_error"></span>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="{{ SUBSCRIBE_NOW }}">
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--// News Letter Section -->
                
                </div>
            </div>
        </div>

        <div class="copyright">
            {{ COPYRIGHT_TEXT }}
        </div>
     
        <div class="scroll-top">
            <i class="fas fa-angle-up"></i>
        </div>
		
        @include('front.layout.scripts_footer')   
        
        
        <!-- Send Email by Ajax Request -->
        <script>
            (function($){
                $("form_subscribe_ajax").on('submit',function(e){
                    e.preventDefault();
                    $("#loader").show();
                    var form = this;
                    $.ajax({
                        url:$(form).attr('action'),
                        method:$(form).attr('method'),
                        data: new FormData(form),
                        processData:false,
                        dataType:'json',
                        contentType:false,
                        beforeSend:function(){
                            $(form).find('span.error-text').text('');
                        },
                        success:function(data)
                        {
                            $('#loader').hide();
                            if (data.code == 0) {
                                $.each(data.error_message,function(prefix,val){
                                    $(form).find('span.'+prefix+'_error').text(val[0]);
                                });
                            }
                            else if (data.code == 1) {
                                $(form)[0].reset();
                                iziToast.success({
                                    title:'',
                                    position:'topRight',
                                    message:data.success_message,
                                });
                            }
                        }
                    })
                })
            })(jQuery);
        </script>
        <div id="loader"></div>

                
        <!-- Because There Have Multiple Errors -->
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <script>
                    iziToast.error({
                        title: '',
                        position: 'topRight',
                        message: '{{ $error }}',
                    });
                </script>
            @endforeach
        @endif

        @if (session()->get('error'))
            <script>
                iziToast.error({
                    title: '',
                    position: 'topRight',
                    message: '{{ session()->get('error') }}',
                });
            </script>
        @endif

        @if (session()->get('success_message'))
            <script>
                iziToast.success({
                    title: '',
                    position: 'topRight',
                    message: '{{ session()->get('success_message') }}',
                });
            </script>
        @endif
		
   </body>
</html>