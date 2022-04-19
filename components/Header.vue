<template>
  <!-- desktop header -->
  <header class="desktop-header-3 fixed-top">

    <div class="container">

      <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="{{ url('/') }}"><img src="/assets/images/logo.svg" alt="Arafat" /></a> <button aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarNavDropdown" data-toggle="collapse" type="button"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
            <li class="nav-item scrollspy"><a href="{{ $req->route()->named('index')?'':'/' }}#about" class="nav-link">About</a></li>
            <li class="nav-item scrollspy"><a href="{{ $req->route()->named('index')?'':'/' }}#services" class="nav-link">Services</a></li>
            <li class="nav-item scrollspy"><a href="{{ $req->route()->named('index')?'':'/' }}#experience" class="nav-link">Experience</a></li>
            <li class="nav-item"><a href="/projects" class="nav-link">Projects</a></li>
            <li class="nav-item"><a href="https://arafatkn.com" class="nav-link">Blog</a></li>
            <li class="nav-item scrollspy"><a href="{{ $req->route()->named('index')?'':'/' }}#contact" class="nav-link">Contact</a></li>
          </ul>
        </div>
      </nav>

    </div>

  </header>
</template>