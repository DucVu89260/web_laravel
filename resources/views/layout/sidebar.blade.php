<div class="sidebar" data-color="azure" data-image="http://web_laravel.test/img/full-screen-image-3.jpg">
<!--

    Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
    Tip 2: you can also add an image using data-image tag

    -->

    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
            Creator
        </a>

        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
            DV89260
        </a>
    </div>

    <div class="sidebar-wrapper ps-container ps-theme-default" data-ps-id="231252d3-cd71-406c-94be-a329d79e38ca">

        <div class="user">
            <div class="info">
                <div class="photo">
                    <img src="http://web_laravel.test/img/default-avatar.png">
                </div>

                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                    <span>
                        {{ session()->get('level') ? 'Super admin' : 'Admin' }}
                    </span>
                    <span>
                        {{ session()->get('name') }}
                        <b class="caret"></b>
                    </span>
                    
                </a>

                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li>
                            <a href="#pablo">
                                <span class="sidebar-mini">MP</span>
                                <span class="sidebar-normal">My Profile</span>
                            </a>
                        </li>

                        <li>
                            <a href="#pablo">
                                <span class="sidebar-mini">S</span>
                                <span class="sidebar-normal">Settings</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('logout')}}">
                                <span class="sidebar-mini">LO</span>
                                <span class="sidebar-normal">Log out</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <ul class="nav">
            <li class="active">
                <a href="#">
                    <i class="pe-7s-graph"></i>
                    <p>Single Link</p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" href="#componentsExamples">
                    <i class="pe-7s-plugin"></i>
                    <p>Menu with links
                     <b class="caret"></b>
                 </p>
             </a>
             <div class="collapse" id="componentsExamples">
                <ul class="nav">
                    <li>
                        <a href="#pablo">
                            <span class="sidebar-mini">L1</span>
                            <span class="sidebar-normal">Link 1</span>
                        </a>
                    </li>
                    <li>
                        <a href="#pablo">
                            <span class="sidebar-mini">L2</span>
                            <span class="sidebar-normal">Link 2</span>
                        </a>
                    </li>
                    <li>
                        <a href="#pablo">
                            <span class="sidebar-mini">L3</span>
                            <span class="sidebar-normal">Link 3</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
    <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div><div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
    <div class="sidebar-background" style="background-image: url(../assets/img/full-screen-image-3.jpg) "></div><div class="sidebar-background" style="background-image: url(http://web_laravel.test/img/full-screen-image-3.jpg) "></div></div>