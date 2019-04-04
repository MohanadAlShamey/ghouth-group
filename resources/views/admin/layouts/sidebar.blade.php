<section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="{{asset('storage/app/images/users/1.png')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p>{{Auth::user()->name}}</p>
            <!-- Status -->
            <a href="#"><i class="fa fa-circle text-success"></i> متصل</a>
        </div>
    </div>



    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
        <li class="header">التحكم بالموقع</li>
        <!-- Optionally, you can add icons to the links -->

        <li><a href="{{url('admin/users')}}"><i class="fa fa-users"></i> <span>الأعضاء</span></a></li>
        <li><a href="{{url('admin/cats')}}"><i class="fa fa-th-list"></i> <span>الأقسام</span></a></li>
        <li><a href="{{url('admin/posts')}}"><i class="fa fa-users"></i> <span>المقالات</span></a></li>
        <li class="treeview">
            <a href="{{url('admin/settings/header')}}"><i class="fa fa-link"></i> <span>إعدادات الموقع</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="{{url('admin/settings/general')}}">العامة</a></li>
                <li><a href="{{url('admin/settings/social')}}">حسابات التواصل الإجتماعي</a></li>
                <li><a href="{{url('admin/settings/header')}}">رأس الصفحة</a></li>
                <li><a href="{{url('admin/settings/slider')}}">السلايدر</a></li>
                <li><a href="{{url('admin/settings/project')}}">المشاريع</a></li>
                <li><a href="{{url('admin/settings/about')}}">صفحة من نحن</a></li>
            </ul>
        </li>
    </ul><!-- /.sidebar-menu -->
</section>