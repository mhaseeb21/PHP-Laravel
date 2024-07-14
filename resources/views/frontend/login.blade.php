@extends('frontend.master')

@section('master-container')

<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs ">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center ">
      <h2>Inner Page</h2>
      <ol>
        <li><a href="index.html">Home</a></li>
        <li>Inner Page</li>
      </ol>
    </div>
  </div>
</section><!-- End Breadcrumbs -->

<section class="inner-page">
  <div class="container">
    <p>

    <div class="container">
        <div class="login-form">
            <h3 class="text-center mb-4">Login Form</h3>
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <form action="{{ route('account.authenticate') }}" method="post">
                @csrf
                <div class="mb-3 position-relative input-group">
                    <input type="email" value="{{ old('email') }}" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email">
                    <span class="form-icon"><i class="bi bi-person"></i></span>
                    @error('email')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3 position-relative input-group">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password">
                    <span class="form-icon"><i class="bi bi-lock"></i></span>
                    @error('password')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>

    </p>
  </div>
</section>

</main><!-- End #main -->

@endsection
