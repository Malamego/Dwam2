<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="nav-item start {{ active_route('admin.index') }}">
                <a href="{{ aurl('/') }}" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">{{ trans('main.dashboard') }}</span>
                </a>
            </li>

            <li class="heading">
                <h3 class="uppercase">{{ trans('main.users') }}</h3>
            </li>

            <li class="nav-item  {{ active_route('users.*') }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-users"></i>
                    <span class="title">{{ trans('main.users') }}</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ active_route('users.create') }}">
                        <a href="{{ route('users.create') }}" class="nav-link ">
                            <span class="title">{{ trans('main.add') }} {{ trans('main.user') }}</span>
                        </a>
                    </li>
                    <li class="nav-item {{ active_route('users.index') }}">
                        <a href="{{ route('users.index') }}" class="nav-link ">
                            <span class="title">{{ trans('main.show-all') }} {{ trans('main.users') }}</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item  {{ active_route('roles.*') }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-get-pocket"></i>
                    <span class="title">{{ trans('main.roles') }}</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ active_route('roles.create') }}">
                        <a href="{{ route('roles.create') }}" class="nav-link ">
                            <span class="title">{{ trans('main.add') }} {{ trans('main.role') }}</span>
                        </a>
                    </li>
                    <li class="nav-item {{ active_route('roles.index') }}">
                        <a href="{{ route('roles.index') }}" class="nav-link ">
                            <span class="title">{{ trans('main.show-all') }} {{ trans('main.roles') }}</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item  {{ active_route('permissions.*') }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-tripadvisor"></i>
                    <span class="title">{{ trans('main.permissions') }}</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ active_route('permissions.create') }}">
                        <a href="{{ route('permissions.create') }}" class="nav-link ">
                            <span class="title">{{ trans('main.add') }} {{ trans('main.permissions') }}</span>
                        </a>
                    </li>
                    <li class="nav-item {{ active_route('permissions.index') }}">
                        <a href="{{ route('permissions.index') }}" class="nav-link ">
                            <span class="title">{{ trans('main.show-all') }} {{ trans('main.permissions') }}</span>
                        </a>
                    </li>
                </ul>
            </li>

             <!-- Add Post  (Mario Added) -->
             <li class="heading">
                 <h3 class="uppercase">{{ trans('main.posts') }}</h3>
             </li>

             <li class="nav-item  {{ active_route('posts.*') }}">
                 <a href="javascript:;" class="nav-link nav-toggle">
                     <i class="icon-users"></i>
                     <span class="title">{{ trans('main.posts') }}</span>
                     <span class="arrow"></span>
                 </a>
                 <ul class="sub-menu">
                     <li class="nav-item {{ active_route('posts.create') }}">
                         <a href="{{ route('posts.create') }}" class="nav-link ">
                             <span class="title">{{ trans('main.add') }} {{ trans('main.post') }}</span>
                         </a>
                     </li>
                     <li class="nav-item {{ active_route('posts.index') }}">
                         <a href="{{ route('posts.index') }}" class="nav-link ">
                             <span class="title">{{ trans('main.show-all') }} {{ trans('main.posts') }}</span>
                         </a>
                     </li>
                     <li class="nav-item {{ active_route('eposts.create') }}">
                         <a href="{{ route('eposts.create') }}" class="nav-link ">
                             <span class="title">{{ trans('main.add') }} {{ trans('main.epost') }}</span>
                         </a>
                     </li>
                     <li class="nav-item {{ active_route('eposts.index') }}">
                         <a href="{{ route('eposts.index') }}" class="nav-link ">
                             <span class="title">{{ trans('main.show-all') }} {{ trans('main.eposts') }}</span>
                         </a>
                     </li>

                     <li class="nav-item {{ active_route('vposts.create') }}">
                         <a href="{{ route('vposts.create') }}" class="nav-link ">
                             <span class="title">{{ trans('main.add') }} {{ trans('main.vpost') }}</span>
                         </a>
                     </li>
                     <li class="nav-item {{ active_route('vposts.index') }}">
                         <a href="{{ route('vposts.index') }}" class="nav-link ">
                             <span class="title">{{ trans('main.show-all') }} {{ trans('main.vposts') }}</span>
                         </a>
                     </li>

                     <li class="nav-item {{ active_route('evposts.create') }}">
                         <a href="{{ route('evposts.create') }}" class="nav-link ">
                             <span class="title">{{ trans('main.add') }} {{ trans('main.evpost') }}</span>
                         </a>
                     </li>
                     <li class="nav-item {{ active_route('evposts.index') }}">
                         <a href="{{ route('evposts.index') }}" class="nav-link ">
                             <span class="title">{{ trans('main.show-all') }} {{ trans('main.evposts') }}</span>
                         </a>
                     </li>

                 </ul>
             </li>

             <!-- Add Post Taq  (Mario Added) -->
             <li class="heading">
                 <h3 class="uppercase">{{ trans('main.taqs') }}</h3>
             </li>

             <li class="nav-item  {{ active_route('ptaq.*') }}">
                 <a href="javascript:;" class="nav-link nav-toggle">
                     <i class="icon-users"></i>
                     <span class="title">{{ trans('main.taqs') }}</span>
                     <span class="arrow"></span>
                 </a>
                 <ul class="sub-menu">
                     <li class="nav-item {{ active_route('ptaqs.create') }}">
                         <a href="{{ route('ptaqs.create') }}" class="nav-link ">
                             <span class="title">{{ trans('main.add') }} {{ trans('main.ptaq') }}</span>
                         </a>
                     </li>
                     <li class="nav-item {{ active_route('ptaqs.index') }}">
                         <a href="{{ route('ptaqs.index') }}" class="nav-link ">
                             <span class="title">{{ trans('main.show-all') }} {{ trans('main.ptaqs') }}</span>
                         </a>
                     </li>

                     <li class="nav-item {{ active_route('eptaqs.create') }}">
                         <a href="{{ route('eptaqs.create') }}" class="nav-link ">
                             <span class="title">{{ trans('main.add') }} {{ trans('main.eptaq') }}</span>
                         </a>
                     </li>
                     <li class="nav-item {{ active_route('eptaqs.index') }}">
                         <a href="{{ route('eptaqs.index') }}" class="nav-link ">
                             <span class="title">{{ trans('main.show-all') }} {{ trans('main.eptaqs') }}</span>
                         </a>
                     </li>

                     <li class="nav-item {{ active_route('vtaqs.create') }}">
                         <a href="{{ route('vtaqs.create') }}" class="nav-link ">
                             <span class="title">{{ trans('main.add') }} {{ trans('main.vtaq') }}</span>
                         </a>
                     </li>
                     <li class="nav-item {{ active_route('vtaqs.index') }}">
                         <a href="{{ route('vtaqs.index') }}" class="nav-link ">
                             <span class="title">{{ trans('main.show-all') }} {{ trans('main.vtaqs') }}</span>
                         </a>
                     </li>


                     <li class="nav-item {{ active_route('evtaqs.create') }}">
                         <a href="{{ route('evtaqs.create') }}" class="nav-link ">
                             <span class="title">{{ trans('main.add') }} {{ trans('main.evtaq') }}</span>
                         </a>
                     </li>
                     <li class="nav-item {{ active_route('evtaqs.index') }}">
                         <a href="{{ route('evtaqs.index') }}" class="nav-link ">
                             <span class="title">{{ trans('main.show-all') }} {{ trans('main.evtaq') }}</span>
                         </a>
                     </li>
                 </ul>
             </li>

             <!-- Add Post category  (Mario Added) -->
             <li class="heading">
                 <h3 class="uppercase">{{ trans('main.categories') }}</h3>
             </li>

             <li class="nav-item  {{ active_route('pcategories.*') }}">
                 <a href="javascript:;" class="nav-link nav-toggle">
                     <i class="icon-users"></i>
                     <span class="title">{{ trans('main.categories') }}</span>
                     <span class="arrow"></span>
                 </a>
                 <ul class="sub-menu">
                     <li class="nav-item {{ active_route('pcategories.create') }}">
                         <a href="{{ route('pcategories.create') }}" class="nav-link ">
                             <span class="title">{{ trans('main.add') }} {{ trans('main.pcategory') }}</span>
                         </a>
                     </li>
                     <li class="nav-item {{ active_route('pcategories.index') }}">
                         <a href="{{ route('pcategories.index') }}" class="nav-link ">
                             <span class="title">{{ trans('main.show-all') }} {{ trans('main.pcategories') }}</span>
                         </a>
                     </li>
                     <li class="nav-item {{ active_route('epcategories.create') }}">
                         <a href="{{ route('epcategories.create') }}" class="nav-link ">
                             <span class="title">{{ trans('main.add') }} {{ trans('main.epcategory') }}</span>
                         </a>
                     </li>
                     <li class="nav-item {{ active_route('epcategories.index') }}">
                         <a href="{{ route('epcategories.index') }}" class="nav-link ">
                             <span class="title">{{ trans('main.show-all') }} {{ trans('main.epcategories') }}</span>
                         </a>
                     </li>

                     <li class="nav-item {{ active_route('vcategories.create') }}">
                         <a href="{{ route('vcategories.create') }}" class="nav-link ">
                             <span class="title">{{ trans('main.add') }} {{ trans('main.vcategory') }}</span>
                         </a>
                     </li>
                     <li class="nav-item {{ active_route('vcategories.index') }}">
                         <a href="{{ route('vcategories.index') }}" class="nav-link ">
                             <span class="title">{{ trans('main.show-all') }} {{ trans('main.vcategories') }}</span>
                         </a>
                     </li>

                     <li class="nav-item {{ active_route('evcategories.create') }}">
                         <a href="{{ route('evcategories.create') }}" class="nav-link ">
                             <span class="title">{{ trans('main.add') }} {{ trans('main.evcategory') }}</span>
                         </a>
                     </li>
                     <li class="nav-item {{ active_route('evcategories.index') }}">
                         <a href="{{ route('evcategories.index') }}" class="nav-link ">
                             <span class="title">{{ trans('main.show-all') }} {{ trans('main.evcategories') }}</span>
                         </a>
                     </li>
                 </ul>
             </li>

             <!-- Add Site Seeting   (Mario Added) -->
             <li class="heading">
                 <h3 class="uppercase">{{ trans('main.settings') }}</h3>
             </li>

             <li class="nav-item  {{ active_route('setting.*') }}">
                 <a href="javascript:;" class="nav-link nav-toggle">
                     <i class="icon-users"></i>
                     <span class="title">{{ trans('main.settings') }}</span>
                     <span class="arrow"></span>
                 </a>
                 <ul class="sub-menu">
                     <li class="nav-item {{ active_route('settings.edit') }}">
                         <a href="{{ route('settings.edit', 1) }}" class="nav-link ">
                             <span class="title">{{ trans('main.edit') }} {{ trans('main.settings') }}</span>
                         </a>
                     </li>
                     <li class="nav-item {{ active_route('settings.show') }}">
                         <a href="{{ route('settings.show', 1) }}" class="nav-link ">
                             <span class="title">{{ trans('main.show-all') }} {{ trans('main.settings') }}</span>
                         </a>
                     </li>

                 </ul>
             </li>

        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
