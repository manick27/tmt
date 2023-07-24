@extends('auth/layout')

@section('title')
    {{ __('S\'inscrire') }} |  TMT
@endsection

@section('content')

<main class="main-content  mt-5">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-start">
                  <h4 class="font-weight-bolder">{{ __('S\'inscrire') }}</h4>
                  <p class="mb-0">{{ __('C\'est simple et très facile') }}</p>
                </div>
                <div class="card-body">
                  <form method="POST" action="{{ route('register') }}">
                    @csrf
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="mb-2">
                      <input id="first_name" name="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" placeholder="{{ __('Prénom') }}"  value="{{ old('first_name') }}" aria-label="Name" required>
                    </div>
                    @error('first_name')
                      <span class="invalid-feedback is-invalid" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                    <div class="mb-2">
                      <input id="last_name" name="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" placeholder="{{ __('Nom de famille') }}" value="{{ old('last_name') }}" aria-label="Name" required>
                    </div>
                    @error('last_name')
                      <span class="invalid-feedback is-invalid" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                    <div class="mb-2">
                      <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('E-mail') }}" value="{{ old('email') }}" aria-label="Email" required>
                    </div>
                    @error('email')
                      <span class="invalid-feedback is-invalid" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                    <div class="mb-2">
                        <input id="phone" name="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="{{ __('Téléphone') }}" value="{{ old('phone') }}" aria-label="Name" required>
                    </div>
                    @error('phone')
                      <span class="invalid-feedback is-invalid" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                    <div class="mb-2">
                        <input id="country" name="country" type="text" class="form-control @error('country') is-invalid @enderror" placeholder="{{ __('Pays') }}" value="{{ old('country') }}" aria-label="Name" required>
                    </div>
                    @error('country')
                      <span class="invalid-feedback is-invalid" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                    <div class="mb-2">
                        <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('Mot de passe') }}" aria-label="Password" required>
                    </div>
                    @error('password')
                      <span class="invalid-feedback is-invalid" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                    <div class="mb-2">
                        <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" placeholder="{{ __('Confirmationmot de passe') }}" aria-label="Password" required>
                    </div>
                    @error('password_confirmation')
                      <span class="invalid-feedback is-invalid" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                    <div class="form-check form-check-info text-start">
                      <input class="form-check-input" type="checkbox"  name="condition" id="condition" value="accepted" required>
                      <label class="form-check-label" for="condition">
                        {{ __('J\'accepte les') }} <a href="terms&Condition" class="text-dark font-weight-bolder">{{ __('Termes et Conditions') }}</a>
                      </label>
                      @error('condition')
                        <span class="invalid-feedback is-invalid" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">{{ __('S\'inscrire') }}</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    {{ __('Vous avez déjà un compte?') }}
                    <a href="login" class="text-primary text-gradient font-weight-bold">{{ __('Se connecter') }}</a>
                  </p>
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
