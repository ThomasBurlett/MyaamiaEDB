<nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse" style="background-color: black !important;">
    <button class="no-loading navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="{{route('home.index')}}" style="line-height: 40px; height: 40px; vertical-align: middle; font-size: 1.6em; width: 130px; padding: 0; margin: 0;">
        <img src="{{asset('img/miami.png')}}" style="vertical-align: middle; height: 26px; margin-top: -7px;" alt=".">
        EDB</a>
    <div class="collapse navbar-collapse justify-content-right" id="navbarCollapse">
        <form class="form-inline mr-auto">
            <style>
                #headerSearchBtn > i {
                    color: #5cb85c;
                }
                #headerSearchBtn:hover > i {
                    color: antiquewhite;
                }

                #headerSearchBox {
                    background-color: black !important;
                    color: antiquewhite !important;
                    border: 1px solid #5cb85c !important;
                }
            </style>
            <input id="headerSearchBox" class="form-control mr-sm-2" type="text" placeholder="Search By Species">
            <button id="headerSearchBtn" type="submit" class="no-loading btn btn-outline-success my-2 my-sm-0"><i class="fa fa-search" aria-hidden="true"></i></button>
            <script>
                $( document ).ready(function() {
                    $('#headerSearchBtn').click(function(e) {
                        e.preventDefault();
                        var q = $('#headerSearchBox').val();
                        if(!q) return;
                        loading();
                        window.location.href = "{{route('search.result')}}?q=" + q;
                    });
                });
            </script>
            {{--<a class="btn btn-outline-success my-2 my-sm-0" href="{{route('search.index')}}" style="margin-left: 8px;">Advanced Search</a>--}}
        </form>

        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="{{route('home.index')}}">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('search.index')}}">Advanced Search</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('species.index')}}">All Species</a></li>
            @if(!Auth::guest() && Auth::user()->role_id != 4)
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarActionsLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Actions
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarActionsLink">
                        <a class="dropdown-item" href="{{url('/species/create')}}">Add Species</a>
                        @if(in_array(Auth::user()->role_id, [1, 2]))
                            <a class="dropdown-item" href="{{url('/species/approval')}}">Approval Page</a>
                        @endif
                        @if(Auth::user()->role_id == 1)
                            <a class="dropdown-item" href="{{url('/user')}}">User Management</a>
                            <a class="dropdown-item" href="{{url('/import')}}">Data Import</a>
                            <a class="dropdown-item" href="{{url('/backup')}}">Backup</a>
                        @endif
                    </div>
                </li>
            @endif

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDocsLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Docs
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDocsLink">
                    <a class="dropdown-item" href="{{route('docs.index')}}">About</a>
                    <a class="dropdown-item" href="{{route('docs.user')}}">User FAQs</a>
                    @if(!Auth::guest() && Auth::user()->role_id == 1)
                    <a class="dropdown-item" href="{{route('docs.admin')}}">Admin Document</a>
                    @endif
                </div>
            </li>

            @if (Auth::guest())
                <li class="nav-item"><a class="nav-link" href="{{url('/login')}}">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="{{url('/register')}}">Register</a></li>
            @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarUserLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarUserLink">
                        <a class="dropdown-item" href="{{route('user.edit', ['id' => Auth::user()->id])}}">Profile</a>
                        @if(Auth::user()->role_id == 3)
                            <a class="dropdown-item" href="{{url('/request')}}">Request Result</a>
                        @endif

                        <a class="dropdown-item" href="{{ route('cas.logout') }}"
                           onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('cas.logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>
            @endif
        </ul>

    </div>
    <div style="width: 100%; position: absolute; top: 56px; left: 0; right: 0; height: 20px;  background-image: url({{asset("img/newribbonwork1.png")}}); background-color: black; background-repeat: repeat-x; background-size: 40px;" id="headerSepBar"></div>

</nav>
