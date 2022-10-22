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
                    <a class="nav-item nav-link" href="{{ route('user.profile') }}">Profile</a>
                    <a class="nav-item nav-link" href="">Logout</a>
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
