<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Blog Dasar</a>

        <div class="navbar-nav">
            <a class="nav-link" href="{{ route('products.index') }}">Products</a>
            <a class="nav-link" href="{{ route('about') }}">About</a>
            <a class="nav-link" href="{{ route('contact.form') }}">Contact</a>
        </div>
    </div>
</nav>