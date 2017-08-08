<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                @if(Auth::guard('student')->check())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Mahasiswa <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="/permohonan">Permohonan Sewa</a>
                            </li>
                            <li>
                                <a href="/sewa">Sewa Loker</a>
                            </li>
                            <li>
                                <a href="/permohonan-maintenance">Permohonan Perbaikan Loker</a>
                            </li>
                        </ul>
                    </li>
                @endif

                @if(Auth::check())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Permohonan <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="/staff/permohonan">Permohonan Sewa</a>
                            </li>
                            <li>
                                <a href="/staff/permohonan-maintenance">Permohonan Perbaikan Loker</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="/staff/sewa">Sewa Loker</a></li>
                    <li><a href="/staff/maintenance">Perbaikan Loker</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Pembayaran Sewa <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="/staff/payment-submission">Permohonan Pembayaran</a>
                            </li>
                            <li>
                                <a href="/staff/payment">Riwayat pembayaran</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Pembayaran Perawatan <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="/staff/submission/maintenance-payments">Permohonan Pembayaran</a>
                            </li>
                            <li>
                                <a href="/staff/maintenance-payments">Riwayat Pembayaran</a>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Staff <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="/staff/users">Daftar Staff</a>
                            </li>
                            <li>
                                <a href="/staff/register">Buat Staff Baru</a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
            
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                    @include('layouts.partials.staff-nav')
                @endif
                <!-- Authentication Links -->
                @if (Auth::guard('student')->check())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::guard('student')->user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/profile">Profil</a></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>