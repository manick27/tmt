@extends('admin/layout')

@section('title')
    Créer un blog |  TMT
@endsection

@section('content')

  <div class="main-content position-relative max-height-vh-100 h-100">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg bg-transparent shadow-none position-absolute px-4 w-100 z-index-2 mt-n11">
      <div class="container-fluid py-1">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 ps-2 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="text-white opacity-5" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Profile</li>
          </ol>
          <h6 class="text-white font-weight-bolder ms-2">Profile</h6>
        </nav>
        <div class="collapse navbar-collapse me-md-0 me-sm-4 mt-sm-0 mt-2" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" placeholder="Type here...">
            </div>
          </div>
          <ul class="navbar-nav justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="/myProfile" class="nav-link text-white font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Profil</span>
              </a>
            </li>
            <li class="nav-item d-xl-none ps-3 pe-0 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0">
                <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                  <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line bg-white"></i>
                    <i class="sidenav-toggler-line bg-white"></i>
                    <i class="sidenav-toggler-line bg-white"></i>
                  </div>
                </a>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end px-2 py-3 ms-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="/assets/admin/assets/img/team-2.jpg" class="avatar avatar-sm me-3">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New message</span> from Laur
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          13 minutes ago
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="/assets/admin/assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark me-3">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New album</span> by Travis Scott
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          1 day
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="avatar avatar-sm bg-gradient-secondary me-3 my-auto">
                        <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <title>credit-card</title>
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                              <g transform="translate(1716.000000, 291.000000)">
                                <g transform="translate(453.000000, 454.000000)">
                                  <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                  <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                </g>
                              </g>
                            </g>
                          </g>
                        </svg>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          Payment successfully completed
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          2 days
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="card shadow-lg mx-4 card-profile-bottom">
      <div class="card-body p-3">
        <div class="row gx-4">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
                @if (Auth::user()->image)
                    <img src="/images/{{ Auth::user()->image }}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                @else
                    <i class="ni ni-satisfied text-dark text-sm opacity-10"></i>
                @endif
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
                {{ Auth::user()->first_name}} {{Auth::user()->last_name }}
              </h5>
              <p class="mb-0 font-weight-bold text-sm">
                {{ Auth::user()->email}}
              </p>
            </div>
          </div>
          <!-- Second Nav-menu -->
            <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                <div class="nav-wrapper position-relative end-0">
                <ul class="nav nav-pills nav-fill p-1">
                    <li class="nav-item">
                        <a href="#" data-target="#" data-toggle="pill" class="nav-link mb-0 px-0 active py-1 d-flex align-items-center justify-content-center">
                            <i class="ni ni-email-83"></i>
                            <span class="ms-2">Créer Blog</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a data-toggle="pill" href="/blogs" class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center">
                            <i class="ni ni-app"></i>
                            <span class="ms-2">Liste Blogs</span>
                        </a>
                    </li>
                </ul>
                </div>
            </div>
            <!-- End of second Nav-Menu -->

        </div>
      </div>
    </div>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            {{-- <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0">Edit Profile</p>
                <button class="btn btn-primary btn-sm ms-auto">Settings</button>
              </div>
            </div> --}}
            <div class="card-body">
            @if(session('message'))
                <div class="alert alert-success"><b>Well done ! </b> {{ session('message') }}.</div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger"><b>Danger ! </b> {{ session('error') }}.</div>
            @endif
                <form enctype="multipart/form-data" action="{{ route('add.blog') }}" method="POST">
                    @csrf

                    <p class="text-uppercase text-sm">Informations sur le blog</p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="title" class="form-control-label">Titre</label>
                          <input class="form-control" type="text" name="title" id="title" placeholder="Entrer un titre ici..." required autofocus>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="image" class="form-control-label">Image</label>
                          <input class="form-control" type="file" name="image" id="image" required>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="service_id" class="form-control-label">Sélectionner le service</label>
                          <select class="form-control" name="service_id" id="service_id" placeholder="Entrer un titre ici...">
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}">{{ $service->title }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="description" class="form-control-label">Description</label>
                          <textarea class="form-control" name="description" id="description" cols="30" rows="3" placeholder="Entrer la description ici..." required></textarea>
                        </div>
                      </div>
                      <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                          <button type="submit" class="btn btn-primary btn-sm ms-auto">Publier</button>
                        </div>
                      </div>
                  </div>
                </form>
          </div>
        </div>
      </div>
      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a href="/" class="font-weight-bold" target="_blank">TMT</a>
                for a better web.
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="/" class="nav-link text-muted" target="_blank">Accueil</a>
                </li>
                <li class="nav-item">
                  <a href="/#about" class="nav-link text-muted" target="_blank">A propos</a>
                </li>
                <li class="nav-item">
                  <a href="/blogs" class="nav-link text-muted" target="_blank">Blogs</a>
                </li>
                <li class="nav-item">
                  <a href="/services" class="nav-link pe-0 text-muted" target="_blank">Services</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>

@endsection
