<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <title>@yield('title')</title>
</head>
<body>
<header class="navbar navbar-expand navbar-light  flex-column flex-md-row bd-navbar"style="background-color: #e3f2fd;">
  <div class="navbar-nav-scroll">
    <ul class="navbar-nav bd-navbar-nav flex-row">
      <li class="nav-item">
        <a class="nav-link " href="/admin" >Admin Home</a>
      </li>
    </ul>
  </div>

  <ul class="navbar-nav ml-md-auto">
    
  </ul>

  <ul class="mb-3 mb-md-0 ml-md-3">
	<li class="nav-item dropdown">
      <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{Auth::user()->email}}
      </a>
      <div class="dropdown-menu dropdown-menu-md-right" aria-labelledby="bd-versions">
        <a class="dropdown-item" href="{{ route('logout') }}"
        onclick = "event.preventDefault();
        document.getElementById('logout-form').submit();">{{ __('Logout') }}
        </a>
        <form id = "logout-form" action = "{{ route('logout') }}" method = "POST" style = "display: none;">
              @csrf
        </form>
      </div>
    </li>
  </ul>
</header>

<main class="py-4">
<div class="container-fluid">
        @yield('content')
        </div>
    </main>
    
</body>
</html> 