<div class="bottom-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-3">
                <div class="logo">
                    <a href="index.html">
                        <a class="navbar-brand" href="#">HealthTIFY</a>
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="search">
                    <form action="{{ route('shop.search') }}" method="GET">
                        <input type="text" name="nama" value="{{ old('nama') }}" placeholder="Search">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
            <div class="col-md-3">
                <div class="user">
                    <a href="{{ route('shop.cart') }}" class="btn cart">
                        <i class="fa fa-shopping-cart"></i>
                        @auth
                            <span>({{ \DB::table('carts')->where('user_id', auth()->user()->id)->count() }})</span>
                        @endauth
                        @guest
                            <span>(0)</span>
                        @endguest
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
