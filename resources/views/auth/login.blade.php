@extends("login.app")
@section("title", "Login SIMAQ")
@section("content")
<div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5"><center>
                <div class="brand-logo">
                  <img src="{{asset('assets/images/simaq.png')}}">
                </div>
                <h3><b>LOGIN SIMAQ</b></h3></center>
                <!-- <h6 class="font-weight-light">Sign in to continue.</h6> -->
                <form class="pt-3" method="POST" action="{{ route('login') }}">
                @csrf
                  <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control @error('nip') is-invalid @enderror form-control-lg" id="nip" name="nip" placeholder="Nip Guru" value="{{ old('nip') }}" required autocomplete="nip" autofocus>
                    @error('nip')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror form-control-lg" id="password" name="password" placeholder="Password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror                  
                  </div>

                   <div class="form-group">
                    <label for="exampleInputPassword1">Level</label>
                     <select name="level" class="form-control" id="level">
                        <option value="">-Pilih Level-</option>
                        <option value="Admin">Admin</option>
                        <option value="Pimpinan">Pimpinan</option>
                        <option value="Wakbid Kesiswaan">Wakbid Kesiswaan</option>
                        <option value="Wakbid Kurikulum">Wakbid Kurikulum</option>
                        <option value="Bendahara">Bendahara</option>
                        <option value="Guru">Guru</option>
                    </select>
                    @error('level')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror                  
                  </div>
                 
                  <div class="mt-3">
                    <!-- <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="../../index.html">LOGIN</a> -->
                    <button type="submit" class="btn btn-block btn-success btn-lg font-weight-medium auth-form-btn">LOGIN</button>
                  </br>
                    <p>Belum Punya Akun? Lakukan <a href="{{ route('register') }}"> {{ __('REGISTER') }}</a></p>
                  
                  </div>
                 
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>

@endsection