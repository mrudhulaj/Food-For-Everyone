{{-- @extends('layouts.app') --}}
@extends('templates.main')

<style>
    .justify-content-center {
        justify-content: center !important;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
        margin-right: -15px;
        margin-left: -15px;
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, .125);
        border-radius: .25rem;
    }

    .card-header:first-child {
        border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;
    }

    .card-header {
        padding: .75rem 1.25rem;
        margin-bottom: 0;
        background-color: rgba(0, 0, 0, .03);
        border-bottom: 1px solid rgba(0, 0, 0, .125);
        background-color: #00E660;
        font-weight: bold;
        display: flex;
        justify-content: center;
        font-size: 18px;
        border-radius: 13px 13px 0px 0px !important;
        margin-right: -1px;
        margin-left: -1px;

    }

    .card-body {
        flex: 1 1 auto;
        padding: 2.25rem;
    }

    .cust-center {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /*Begin: Custom checkbox */

/* The container */
.checkbox-container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 15px;
  font-weight: normal;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.checkbox-container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 18px;
  width: 18px;
  background-color: #dfe5f7;
 border-radius: 5px; 
}

/* On mouse-over, add a grey background color */
.checkbox-container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.checkbox-container input:checked ~ .checkmark {
  background-color: #00A348;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.checkbox-container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.checkbox-container .checkmark:after {
  left: 7px;
  top: 3px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}

/* End: Custom checkbok */

</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4" style="margin-bottom: 50px;">
          <div style="text-align: center;">
            <div class="main-logo">
              <img src="{{ url('images/mainLogo.png') }}" width="50"
                  height="50">
              <h2>Food For Everyone</h2>
            </div>
          </div>
            <div class="card" style="border-radius: 13px;box-shadow: 0 5px 20px 0 rgba(0, 0, 0, 0.5);">
                <div class="card-header">
                  Sign In 
                </div>

                <div class="card-body" style="margin-top: 15px;">
                    <form method="POST" action="{{ route('login') }}"
                        aria-label="{{ __('Login') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12" style="display: flex;justify-content: center">
                                <input id="email" type="email"
                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                    name="email" value="{{ old('email') }}" required autofocus placeholder="Email" style="width: 80%">

                                @if($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12" style="display: flex;justify-content: center;">
                                <input id="password" type="password"
                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                    name="password" required placeholder="Password" style="width: 80%">

                                @if($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif 
                            </div>
                        </div>

                        <div class="form-group row" style="margin-top: 25px;">
                          <div class="col-md-12" style="display: flex;justify-content: center">
                            <div class="form-check">
                              <label class="checkbox-container">
                                <span>
                                  {{ __('Remember Me') }}
                                </span>
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <span class="checkmark"></span>
                              </label>
                            </div>
                          </div>
                      </div>

                        <div class="form-group row mb-0">
                          <div class="col-md-12" style="display: flex;justify-content: center">
                            <button type="submit" class="button-bg-green btn btn-primary" style="padding: 0px;width: 80%;height: 40px">
                                {{ __('Login') }}
                            </button>
                          </div>
                      </div>

                      <div class="form-group row mb-0" style=" margin-top: 30px">
                        <div class="col-md-12" style="display: flex;justify-content: center">
                          <label for="" style="font-weight: normal">Don't have an account? 
                            <a class="btn btn-link cust-a" href="#" style="padding-left: 0px;font-weight: bold;margin-top: -3px;">Sign Up</a>
                          </label>
                        </div>
                      </div>
                    </form>
                </div>
            </div>
            <div class="col-md-12" style="margin-top: 30px">
              <a style="display: flex;justify-content: center" class="btn btn-link cust-a" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
              </a>
              <a style="display: flex;justify-content: center" class="btn btn-link cust-a" href="{{ route('password.request') }}">
                Terms & Conditions
              </a>
            </div> 

        </div>
    </div>
</div>
@endsection
