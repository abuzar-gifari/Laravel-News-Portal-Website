
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

@php
    $current_language = \App\Models\Language::where('short_name',$current_short_name)->first();
    $current_language_id = $current_language->id;
@endphp




<div class="website-menu">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                            <!-- home menu -->
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('home') }}">{{ HOME }}</a>
                            </li>



                            <!-- show category and sub-category section in navbar -->
                            @foreach ($global_categories as $single_category_item)
                            
                                @if ($current_language_id==$single_category_item->language_id)
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="javascript:void;" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ $single_category_item->category_name }}
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                                            @foreach ($single_category_item->rSubCategory as $sub_category_item)
                                                <li><a class="dropdown-item" href="{{ route('category',$sub_category_item->id) }}">{{ $sub_category_item->sub_category_name }}</a></li>
                                            @endforeach

                                        </ul>
                                    </li>    
                                @endif
                                
                            @endforeach
                            <!--// show category and sub-category section in navbar -->
                            


                            <!-- photo & video gallery menus -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ GALLERY }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{ route('photo_gallery') }}">{{ PHOTO_GALLERY }}</a></li>
                                    <li><a class="dropdown-item" href="{{ route('video_gallery') }}">{{ VIDEO_GALLERY }}</a></li>
                                </ul>
                            </li>


                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>