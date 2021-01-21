<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Minha geladeira</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/product">Products</a>
        </li>
      </ul>
    </div>

    <div class="d-flex">
      <ul class="navbar-nav">

        @if(session('login') != null)
            <li class="nav-item">
                <form class="nav-link" aria-current="page" action="/session" method="POST">
                @csrf
                @method('DELETE')
                    <button type="submit" class="btn btn-light">Logout</button>
                </form>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/user/create">Signup</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/session">Signin</a>
            </li>
        @endif

      </ul>
    </div>
  </div>
</nav>
