@include('fontend.include.header')
<!-- Left Side Menu -->
<nav>
    {{--<ul id="nav-mobile-category" class="side-nav">
        <li class="sidenav-logo"><img src="{{ asset('/').$setting->header_logo }}" alt=""></li>
        <li><div class="search-wrapper "><input id="search"><i class="material-icons">search</i>
                <div class="search-results"></div></div></li>
        @foreach($categories as $category)
        <li><a href="{{ url('products',$category->slug) }}"><i class="fas fa-plus"></i>{{ $category->category_name }}</a></li>
       @endforeach
    </ul>--}}

    <!-- Right Profile Sidebar Menu-->
    @if(isset(Auth::user()->roll) && Auth::user()->roll==2)
        <ul id="nav-mobile-account" class="side-nav">
            <li class="profile">
                <div class="li-profile-info">
                    @if($profile->image)
                    <img src="{{ asset('/').$profile->image }}" alt="profile">
                    @endif
                    <h2>{{ $profile->name }}</h2><div class="emailprofile">{{ $profile->email }}</div>
                    <div class="balance">Balance : <span>৳ {{ $profile->wallet }}</span></div></div>
                <div class="bg-profile-li" style="background-image: url(img/bg-profile.jpg);"></div></li>

            <li><a class="waves-effect waves-blue" href="{{ url('/') }}"><i class="fas fa-home"></i>Home</a></li>
            <li><a href="{{ route('fontend-categories.index') }}"><i class="fas fa-envelope"></i>Products</a></li>            <li>
            <li><a href="{{ route('profile.create') }}"><i class="fas fa-user-circle"></i>Profile Edit</a></li>


            <li>
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <div class="collapsible-header">
                            <i class="fas fa-plus"></i>Wallet <span><i class="fas fa-caret-down"></i></span>
                        </div>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="{{ route('account.create') }}"><i class="fas fa-angle-right"></i>Deposit Money</a></li>
                                <li><a href="{{ route('fontend-withdraw.create') }}"><i class="fas fa-angle-right"></i>Withdraw Money</a></li>
                                <li><a href="{{ route('fontend-transfer.create') }}"><i class="fas fa-angle-right"></i>Transfer Money</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>
            <li>
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <div class="collapsible-header">
                            <i class="fas fa-plus"></i>Wallet History<span><i class="fas fa-caret-down"></i></span>
                        </div>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="{{ route('account.index') }}"><i class="fas fa-angle-right"></i>Transaction History</a></li>

                                <li><a href="{{ route('fontend-withdraw.index') }}"><i class="fas fa-angle-right"></i>Withdraw History</a></li>

                                <li><a href="{{ route('fontend-transfer.index') }}"><i class="fas fa-angle-right"></i>Transfer History</a></li>

                            </ul>
                        </div>
                    </li>
                </ul>
            </li>
            <li><a href="{{ route('checkout.index') }}"><i class="fa fa-list"></i>Orders</a></li>
            <li><a href="{{ url('user-message',auth()->user()->id) }}"><i class="fa fa-envelope-square"></i>Message({{ \App\userMessage::where('user_id',auth()->user()->id)->where('status',0)->count() }})</a></li>
            <li><a href="{{ route('contacts.create') }}"><i class="fas fa-envelope"></i>Send Message</a></li>
              <li>
            <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
        @else
    <ul id="nav-mobile-account" class="side-nav">
        <li class="sidenav-logo"><img src="{{ asset('/').$setting->header_logo }}" alt=""></li>

        <li><a class="waves-effect waves-blue" href="{{ url('/') }}"><i class="fas fa-home"></i>Home</a></li>
        <li><a href="{{ route('contacts.create') }}"><i class="fas fa-envelope"></i>Send Message</a></li>
        <li><a href="{{ route('fontend-categories.index') }}"><i class="fas fa-envelope"></i>Products</a></li>
        <li><a href="{{ route('show-login') }}"><i class="fas fa-sign-in-alt"></i>Sign in</a></li>
        <li><a href="{{ route('show-register') }}"><i class="fas fa-sign-out-alt"></i>Registration</a></li>
    </ul>
        @endif
</nav>
@yield('slider')
@yield('body')




@include('fontend.include.footer')