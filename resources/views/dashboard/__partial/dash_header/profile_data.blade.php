<div class="user-info-dropdown">
    <div class="dropdown">
        @if(Auth::check())
            <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                            <span class="user-icon">
                                <img
                                    src="{{ asset('storage') . (auth()->user()->image ?? "/User/Images/default.jpg") }}"
                                    alt=""/>
                            </span>

                <span class="user-name">{{auth()->user()->name ?? "Unknown"}}</span>
            </a>
        @else
            <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                            <span class="user-icon">
                                <img src="{{ asset('storage/User/Images/default.jpg')  }}" alt=""/>
                            </span>

                <span class="user-name">Unknown</span>
            </a>
        @endif
        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
{{--            <a class="dropdown-item" href="profile.html"><i class="dw dw-user1"></i> Profile</a>--}}
{{--            <a class="dropdown-item" href="profile.html"><i class="dw dw-settings2"></i> Setting</a>--}}
{{--            <a class="dropdown-item" href="faq.html"><i class="dw dw-help"></i> Help</a>--}}
            <a class="dropdown-item" href="{{ route('admin.logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                    class="dw dw-logout"></i>
                Log Out
            </a>
        </div>
        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</div>
