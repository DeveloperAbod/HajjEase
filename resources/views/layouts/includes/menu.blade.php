<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item mt-2 {{ Route::is('home') ? 'active open' : '' }}">
                <a href="{{ Route('home') }}"><i class="la la-home"></i><span class="menu-title">الصفحة الرئيسية</span></a>
            </li>

            <li class="nav-item has-sub {{ Route::is('users.*') || Route::is('roles.*') ? 'open' : '' }}">
                <a href="#"><i class="la la-user"></i><span class="menu-title">المستخدمين والصلاحيات</span></a>
                <ul class="menu-content">
                    <li class="{{ Route::is('users.index') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ Route('users') }}"><i class="ft-layers"></i><span>جميع
                                المستخدمين</span></a>
                    </li>
                    <li class="{{ Route::is('users.create') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ Route('users.create') }}"><i
                                class="ft-plus-circle"></i><span>اضافة مستخدم</span></a>
                    </li>
                    <li class="{{ Route::is('roles.index') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ Route('roles') }}"><i class="ft-layers"></i><span>جميع
                                الصلاحيات</span></a>
                    </li>
                    <li class="{{ Route::is('roles.create') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ Route('roles.create') }}"><i
                                class="ft-plus-circle"></i><span>اضافة صلاحية</span></a>
                    </li>
                </ul>
            </li>

            <li class="nav-item has-sub {{ Route::is('trips.*') ? 'open' : '' }}">
                <a href="#"><i class="la la-plane"></i><span class="menu-title">الرحلات</span></a>
                <ul class="menu-content">
                    <li class="{{ Route::is('trips') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('trips') }}">
                            <i class="ft-layers"></i>
                            <span>جميع الرحلات</span>
                        </a>
                    </li>
                    <li class="{{ Route::is('trips.create') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('trips.create') }}">
                            <i class="ft-plus-circle"></i>
                            <span>اضافة رحلة</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item has-sub {{ Route::is('pilgrims.*') ? 'open' : '' }}">
                <a href="#"><i class="la la-users"></i><span class="menu-title">الحجاج</span></a>
                <ul class="menu-content">
                    <li class="{{ Route::is('pilgrims') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('pilgrims') }}">
                            <i class="ft-layers"></i>
                            <span>جميع الحجاج</span>
                        </a>
                    </li>
                    <li class="{{ Route::is('pilgrims.create') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('pilgrims.create') }}">
                            <i class="ft-plus-circle"></i>
                            <span>اضافة حاج</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item has-sub {{ Route::is('offices.*') ? 'open' : '' }}">
                <a href="#"><i class="la la-building"></i><span class="menu-title">المكاتب</span></a>
                <ul class="menu-content">
                    <li class="{{ Route::is('offices') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('offices') }}">
                            <i class="ft-layers"></i>
                            <span>جميع المكاتب</span>
                        </a>
                    </li>
                    <li class="{{ Route::is('offices.create') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('offices.create') }}">
                            <i class="ft-plus-circle"></i>
                            <span>اضافة مكتب</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-sub {{ Route::is('bookings.*') ? 'open' : '' }}">
                <a href="#"><i class="la la-ticket"></i><span class="menu-title">الحجوزات</span></a>
                <ul class="menu-content">
                    <li class="{{ Route::is('bookings') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('bookings') }}">
                            <i class="ft-layers"></i>
                            <span>جميع الحجوزات</span>
                        </a>
                    </li>
                    <li class="{{ Route::is('bookings.create') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('bookings.create') }}">
                            <i class="ft-plus-circle"></i>
                            <span>اضافة حجز</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-sub {{ Route::is('payments.*') ? 'open' : '' }}">
                <a href="#"><i class="la la-credit-card"></i><span class="menu-title">المدفوعات</span></a>
                <ul class="menu-content">
                    <li class="{{ Route::is('payments') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('payments') }}">
                            <i class="ft-layers"></i>
                            <span>جميع المدفوعات</span>
                        </a>
                    </li>
                    <li class="{{ Route::is('payments.create') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('payments.create') }}">
                            <i class="ft-plus-circle"></i>
                            <span>اضافة مدفوعات</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->
