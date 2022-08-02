<div class="vertical-menu mm-active">
    <div data-simplebar="init" class="h-100 mm-show"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: -15px; bottom: 0px;"><div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden scroll;"><div class="simplebar-content" style="padding: 0px;">
        <!--- Sidemenu -->
        <div id="sidebar-menu" class="mm-active">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled mm-show" id="side-menu">
                @if(isset($categories))
                    @foreach($categories as $category)
                <li>
                @if(count($category->child)>0)
                    <a href="javascript: void(0);" class="{{count($category->child)>0? 'has-arrow':''}} waves-effect">
                        <i class="mdi mdi-face"></i>
                        <span>{{$category->name}}</span>
                    </a>
                    @else 
                    <a href='@switch($category->istype)
                                @case(1)
                                    {{"/profile"}}
                                    @break;
                                @case(2)
                                    {{"/transaction"}}
                                    @break;
                                @case(3)
                                    {{"/payment"}}
                                    @break;
                                @case(4)
                                   {{"/server"}}
                                   @break;
                                @case(5)
                                   {{"/proxy"}}
                                   @break;
                                @case(6)
                                   {{"/blog"}}
                                   @break;
                                @case(7)
                                   {{"/contact"}}
                                   @break;
                                @default
                                    {{"#section-works"}}
                            @endswitch ' class="{{count($category->child)>0? 'has-arrow':''}} waves-effect">
                        <i class="mdi mdi-face"></i>
                        @if($category->istype == 3)
                        <span class="badge rounded-pill bg-danger float-end" style="font-size: 11px">{{number_format($members->point - $members->charge, 0, '', ',')}} đ</span>
                        @endif
                        <span>{{$category->name}}</span>
                    </a>
                    @endif
                    @if(count($category->child)>0)
                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                     
                        @if( $category->istype == 4)
                            @foreach($servers as $server)
                                <li><a href='/server/{{$server->id}}/'>{{$server->name}}</a>
                            @endforeach
                        @else
                         @foreach($category->child as $child)
                            <li><a href='@switch($child->istype)
                                @case(1)
                                    {{"/profile"}}
                                    @break;
                                @case(2)
                                    {{"/transaction"}}
                                    @break;
                                @case(3)
                                    {{"/payment"}}
                                    @break;
                                @case(5)
                                   {{"/proxy"}}
                                   @break;
                                @case(6)
                                   {{"/blog"}}
                                   @break;
                                @case(7)
                                   {{"/contact"}}
                                   @break;
                                @default
                                    {{"/"}}
                            @endswitch '>{{$child->name}}</a></li>
                            
                        @endforeach
                        @endif
                    </ul>
                    @endif
                </li>
                @endforeach
                @endif
                

            </ul>
        </div>
        <!-- Sidebar -->
    </div></div></div></div><div class="simplebar-placeholder" style="width: auto; height: 603px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: block; height: 47px;"></div></div></div>
</div>