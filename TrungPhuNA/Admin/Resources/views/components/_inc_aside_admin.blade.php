@inject('permissionService', 'TrungPhuNA\Admin\Services\PermissionService')
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            @foreach($sidebarGlobal ?? [] as $sideG)
                @if ($permissionService->can($sideG->m_permission))
                <li class="{{ $sideG->m_sub_flag ? 'treeview' : '' }} js-nav-item {{ \Request::route()->getName() == ($sideG->m_route ?? '')
                    || in_array(Request::segment(2), explode(',',$sideG->m_prefix))  ? 'active' : '' }}">
                    <a href="{{ $sideG->m_route ? (\Route::has($sideG->m_route) ? route($sideG->m_route) : "#") : '#' }}" title="{{ $sideG->m_name }}">
                        <i class="fa {{ $sideG->m_icon }}"></i>
                        <span> {{ $sideG->m_name }}</span>
                        @if($sideG->m_sub_flag)
                            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                        @endif
                    </a>
                    @php
                        $subMenuGlobal = json_decode($sideG->m_sub_menu, true) ?? [];
                    @endphp
                    @if($sideG->m_sub_flag)
                        <ul class="treeview-menu">
                            @foreach($subMenuGlobal['name'] as $keyG => $subG)
                                <li class="js-nav-link {{ \Request::route()->getName() == $subMenuGlobal['route'][$keyG] ||
                                    Request::segment(2) == ($subMenuGlobal['prefix'][$keyG] ?? '') ? 'active' : '' }} ">
                                    <a title="{{ $subG }}" href="{{ \Route::has($subMenuGlobal['route'][$keyG]) ? route($subMenuGlobal['route'][$keyG]) : "#" }}"><i
                                            class="fa fa-circle-o"></i>{{ $subG }}</a></li>
                            @endforeach
                        </ul>
                    @endif
                </li>
                @endif
            @endforeach
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
