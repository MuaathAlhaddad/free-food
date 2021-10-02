<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="background-image: url(../argon/img/theme/school-profile-cover.png); background-size: cover; background-position: center top;">
    <!-- Mask -->
    <span class="mask bg-gradient-default opacity-8"></span>
    <!-- Header container -->
    <div class="container-fluid d-flex align-items-center">
        <div class="row {{ $rowClass ?? '' }}">
            @isset($website)
                <div class="col-md-12 {{ $class ?? '' }}">
                    <h1 class="display-2 text-white">Free Food</h1>

                    <p class="text-white mt-0 mb-5">This system accepts nay kind of food, just need ot know some details concerning food type, like if it is cooked or raw, packaged, cold or hot, is it haram or halal, and so on.</p>
{{--                    <img src="{{ asset('argon') }}/img/icons/common/logo.png" width="300" height="300">--}}
                </div>

            @else
                <div class="col-md-12 {{ $class ?? '' }}">
                    <h1 class="display-2 text-white">{{ $title }}</h1>
                    @if (isset($description) && $description)
                        <p class="text-white mt-0 mb-5">{{ $description }}</p>
                    @endif
                </div>
            @endisset
        </div>

    </div>
</div>
