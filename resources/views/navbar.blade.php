<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Nidux Test</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home <span class="sr-only"></span></a>
      </li>


      @auth()
        <li class="nav-item">
          <a class="nav-link" href="/register">CRUD usuarios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/get-custom-countries">CRUD países</a>
        </li>
        <li class="nav-item">
          <form action="/logout" method="post" >
            @csrf
            <a class="nav-link" href="#"  onclick="this.closest('form').submit()">Logout</a>
          </form>
        </li>
      @endauth
      @guest()

      <li class="nav-item">
        <a class="nav-link" href="login">Login</a>
      </li>
      @endguest

    </ul>

  </div>
</nav>