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
    <div class="registration-form">
        <h3 class="text-center mb-4">Registration Form</h3>
    
        <form action="{{ route('account.processRegister') }}" method="post">
                        @csrf
                        <div class="mb-3 position-relative input-group">
                            <input type="text" class="form-control @error('firstName') is-invalid @enderror" name="firstName" id="firstName" placeholder="First Name" value="{{ old('firstName') }}">
                            <span class="form-icon"><i class="bi bi-person"></i></span>
                            @error('firstName')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="mb-3 position-relative input-group">
                            <input type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" id="lastName" placeholder="Last Name" value="{{ old('lastName') }}">
                            <span class="form-icon"><i class="bi bi-person"></i></span>
                            @error('lastName')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="mb-3 position-relative input-group">
                            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" placeholder="Username" value="{{ old('username') }}">
                            <span class="form-icon"><i class="bi bi-person-badge"></i></span>
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="mb-3 position-relative input-group">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email Address" value="{{ old('email') }}">
                            <span class="form-icon"><i class="bi bi-envelope"></i></span>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="mb-3 position-relative input-group">
                            <input type="text" class="form-control @error('referral_code') is-invalid @enderror" name="referral_code" id="referral_code" placeholder="Referral Code" value="{{ old('referral_code') }}">
                            <span class="form-icon"><i class="bi bi-person-badge"></i></span>
                            @error('referral_code')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <select class="form-select @error('gender') is-invalid @enderror" name="gender" id="gender">
                                <option selected disabled>Gender</option>
                                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                            @error('gender')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="mb-3 position-relative input-group">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
                            <span class="form-icon"><i class="bi bi-lock"></i></span>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="mb-3 position-relative input-group">
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password">
                            <span class="form-icon"><i class="bi bi-lock"></i></span>
                            @error('password_confirmation')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100">Register</button>
                    </form>


    </div>
</div>








	</p>
  </div>
</section>

</main><!-- End #main -->




@endsection