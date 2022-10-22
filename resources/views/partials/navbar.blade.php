<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">HealthTIFY</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="{{ route('shop.index') }}">Shop</a>
                @auth
                    @hasrole('admin')
                        <a class="nav-item nav-link" href="{{ route('dashboard.index') }}">Dashboard</a>
                    @endhasrole
                    @hasrole('pegawai')
                        <a class="nav-item nav-link" href="{{ route('pegawai.index') }}">Dashboard</a>
                    @endhasrole
                    <a class="nav-item nav-link" href="{{ route('user.profile') }}">Profile</a>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="nav-item nav-link"
                            style="background: none; border:none">LOGOUT</button>
                    </form>
                @endauth
                @guest
                    <a class="nav-item nav-link" href="{{ route('login') }}">Login</a>
                    <a class="nav-item nav-link" href="{{ route('register') }}">Registration</a>
                @endguest
            </div>
        </div>
    </div>
</nav>

<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <center>
            <h1 class="display-4">Di Dalam <span>Tubuh</span> yang<span> Sehat</span><br>Terdapat<span> Jiwa </span>yang
                <span>Kuat</span>
            </h1>
        </center>
    </div>
</div>
