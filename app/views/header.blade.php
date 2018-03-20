'@section ("header")


        <header class="navbar navbar-fixed-top"  style="background-color: black;" role="banner">
            <div class="container-fluid">
                <div style="float:left" ><h4 style="color: white;"> CPHL/UNHLS HLIMS COORDINATION SUPPORT SYSTEM</h4>
                </div>
                <div style="float:right">
                @if (Auth::check())
                <ul class="nav navbar-nav navbar-right">

                    <li class="user_menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
							{{Auth::user()->name}}
							<span class="navbar_el_icon ion-person"></span> <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href='{{ URL::to("user/".Auth::user()->id."/edit") }}'>{{trans('messages.edit-profile')}}</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ URL::route("user.logout") }}">{{trans('messages.logout')}}</a></li>
                        </ul>
                    </li>

                </ul>
                </div>

                @endif


            </div>
        </header>




@show