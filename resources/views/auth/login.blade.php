@extends('auth/layout')

@section('title')
    {{ __('Log In') }} |  TMT
@endsection

@section('content')

  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-start">
                  <h4 class="font-weight-bolder">{{ __('Se connecter') }}</h4>
                  <p class="mb-0">{{ __('Entrez votre email et votre mot de passe pour vous connecter') }}</p>
                </div>
                <div class="card-body">
                  <form method="POST" action="{{ route('login') }}">
                    @csrf

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="mb-3">
                      <input id="email" type="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="{{ __('E-mail') }}" aria-label="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                      @error('email')
                        <span class="invalid-feedback is-invalid" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="{{ __('Mot de passe') }}" aria-label="Password" name="password" required autocomplete="current-password">
                      @error('password')
                        <span class="invalid-feedback is-invalid" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox"  name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                      <label class="form-check-label" for="remember">{{ __('Souviens-toi de moi') }}</label>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">{{ __('Connexion') }}</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    {{ __('Je n\'ai pas de compte?') }}
                    <a href="register" class="text-primary text-gradient font-weight-bold">{{ __('S\'inscrire') }}</a>
                  </p>
                  @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Mot de passe oublé?') }}
                    </a>
                  @endif
                </div>
              </div>
            </div>
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signin-ill.jpg');
          background-size: cover;">
                <span class="mask bg-gradient-primary opacity-6"></span>
                <h4 class="mt-5 text-white font-weight-bolder position-relative">"Attention is the new currency"</h4>
                <p class="text-white position-relative">The more effortless the writing looks, the more effort the writer actually put into the process.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

@endsection
