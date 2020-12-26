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
    .checkmark-cust {
        position: absolute;
        top: 0;
        left: 0;
        height: 18px;
        width: 18px;
        background-color: #dfe5f7;
        border-radius: 5px;
    }

    /* On mouse-over, add a grey background color */
    .checkbox-container:hover input~.checkmark-cust {
        background-color: #ccc;
    }

    /* When the checkbox is checked, add a blue background */
    .checkbox-container input:checked~.checkmark-cust {
        background-color: #00A348;
    }

    /* Create the checkmark/indicator (hidden when not checked) */
    .checkmark-cust:after {
        content: "";
        position: absolute;
        display: none;
    }

    /* Show the checkmark when checked */
    .checkbox-container input:checked~.checkmark-cust:after {
        display: block;
    }

    /* Style the checkmark/indicator */
    .checkbox-container .checkmark-cust:after {
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

    .modal-header {
        background-color: #00E660;
        color: black;
        font-weight: bold;
        border-radius: 13px 13px 0px 0px;
    }

    .form-group label {
        font-weight: normal;
    }

    /* End: Custom checkbok */

</style>
@section('content')
<div class="container">
  @include('templates.alertSuccessMessage')
    <div class="row justify-content-center">
        <div class="col-md-4" style="margin-bottom: 50px;">
            <div style="text-align: center;">
                <div class="main-logo">
                    <img src="{{ url('images/mainLogo.png') }}" width="50" height="50">
                    <h2>Food For Everyone</h2>
                </div>
            </div>
            <div class="card" style="border-radius: 13px;box-shadow: 0 5px 20px 0 rgba(0, 0, 0, 0.5);">
                <div class="card-header">
                    Sign In
                </div>

                <div class="card-body" style="margin-top: 15px;">
                    <form method="POST" name="login" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12" style="display: flex;justify-content: center">
                              <div class="col-md-11">
                                <input id="Email" type="Email"
                                class="form-control{{ $errors->has('Email') ? ' is-invalid' : '' }}"
                                name="Email" value="{{ old('Email') }}" required autofocus
                                placeholder="Email">
                                @if($errors->has('Email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Email') }}</strong>
                                    </span>
                                @endif
                              </div>

                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12" style="display: flex;justify-content: center;">
                              <div class="col-md-11">
                                <input id="Password" type="Password"
                                class="form-control{{ $errors->has('Password') ? ' is-invalid' : '' }}"
                                name="Password" required placeholder="Password">
                                @if($errors->has('Password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Password') }}</strong>
                                    </span>
                                @endif
                              </div>
                            </div>
                        </div>

                        {{--  <div class="form-group row" style="margin-top: 25px;">
                            <div class="col-md-12" style="display: flex;justify-content: center">
                                <div class="form-check">
                                    <label class="checkbox-container">
                                        <span>
                                            Remember Me
                                        </span>
                                        <input type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <span class="checkmark-cust"></span>
                                    </label>
                                </div>
                            </div>
                        </div>  --}}

                        <div class="form-group row mb-0" style="margin-top: 30px;">
                            <div class="col-md-12" style="display: flex;justify-content: center">
                                <button type="submit" class="button-bg-green btn btn-primary"
                                    style="padding: 0px;width: 80%;height: 40px">
                                    Login
                                </button>
                            </div>
                        </div>

                        <div class="form-group row mb-0" style=" margin-top: 30px">
                            <div class="col-md-12" style="display: flex;justify-content: center">
                                <label for="" style="font-weight: normal">Don't have an account?
                                    <a class="btn btn-link cust-a" data-toggle="modal" data-target="#registrationModal"
                                        style="padding-left: 0px;font-weight: bold;margin-top: -3px;">Sign Up</a>
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-12" style="margin-top: 30px">
                <a style="display: flex;justify-content: center" class="btn btn-link cust-a"
                    href="{{ route('password.request') }}">
                    Forgot Your Password?
                </a>
                <a style="display: flex;justify-content: center" class="btn btn-link cust-a"
                    href="{{ route('password.request') }}">
                    Terms & Conditions
                </a>
            </div>

        </div>
    </div>
</div>
{{-- Begin :Modal Registration Form --}}
<div class="modal fade" id="registrationModal" tabindex="-1" role="dialog" aria-labelledby="registrationModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius: 13px;border: none">
            <div class="modal-header ffe-font">
                <h5 class="modal-title" id="registrationModalLabel">Join Us!
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h5>
            </div>
            <div class="modal-body col-lg-12 ffe-font" style="padding: 20px;">
                <form method="POST" action="{{ route('register') }}" aria-label="Register"
                    name="register" id="register">
                    @csrf

                    <div class="form-group row">
                        <label for="firstName" class="col-md-5 col-form-label text-md-right">First Name</label>

                        <div class="col-md-7">
                            <input id="firstName" type="text"
                                class="form-control{{ $errors->has('FirstName') ? ' is-invalid' : '' }}"
                                name="firstName" value="{{ old('FirstName') }}" required autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="lastName" class="col-md-5 col-form-label text-md-right">Last Name</label>

                        <div class="col-md-7">
                            <input id="lastName" type="text"
                                class="form-control{{ $errors->has('LastName') ? ' is-invalid' : '' }}"
                                name="lastName" value="{{ old('LastName') }}" required autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                      <label for="phone" class="col-md-5 col-form-label text-md-right">Phone</label>

                      <div class="col-md-7">
                          <input id="phone" name="phone" maxlength="10" minlength="10" type="text"
                              class="form-control" required autofocus>
                      </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-md-5 col-form-label text-md-right">Type</label>

                        <div class="col-md-7">
                            <select class="form-control" name="typeOfAccount" id="typeOfAccount" style="height: 34px !important;">
                                <option hidden selected="" value="">Select</option>
                                <option value="Volunteer">Volunteer</option>
                                {{--  <option value="Donater">Donater</option>  --}}
                                <option value="User">User</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="newEmail" class="col-md-5 col-form-label text-md-right">E-Mail Address</label>

                        <div class="col-md-7">
                            <input id="newEmail" type="email"
                                class="form-control{{ $errors->has('newEmail') ? ' is-invalid' : '' }}"
                                name="newEmail" value="{{ old('newEmail') }}" required>
                                <label id="newEmailExist-error" style="color: #0a6511;" for="newEmail"></label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="newPassword" class="col-md-5 col-form-label text-md-right">Password</label>

                        <div class="col-md-7">
                            <input id="newPassword" type="password" data-rule-password="true"
                                class="form-control{{ $errors->has('newPassword') ? ' is-invalid' : '' }}"
                                name="newPassword" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-5 col-form-label text-md-right">Confirm
                            Password</label>

                        <div class="col-md-7">
                            <input id="confirmPassword" data-rule-password="true" data-rule-equalTo="#newPassword" type="password" class="form-control" name="confirmPassword"
                                required>
                        </div>
                    </div>

                    <div class="form-group row mb-0" style="text-align: right">
                        <div class="col-md-12">
                            <button id="registerbtn" type="button" class="btn btn-primary button-bg-green"
                                style="padding: 6px 12px;border-radius: 4px;">
                                Register
                            </button>
                            <button type="button" class="btn btn-secondary" style="font-weight: bold"
                                data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer" style="padding: 0px;">
            </div>
        </div>
    </div>
</div>
{{-- End :Modal Registration Form --}}

<script src="{{ asset('vendor/jquery-validation/dist/jquery.validate.min.js') }}" defer>
</script>
<script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
<script>
    $(document).ready(function () {

      // Check if email already exist, else submit the registration form.
      $('#registerbtn').on('click', function() {
          var isFormValid = $("#register").valid();
          console.log("is valid = "+isFormValid);
            if(isFormValid == true){
              $.ajax({
                  url:'{{ route("checkEmailExist") }}',
                  type:'GET',
                  data:{
                    newEmail : $("#newEmail").val(),
                  },
                  success:function(data) {
                    if(data == true){
                      $('#newEmailExist-error').html("Email already exist. Click 'Forgot Password'");
                      console.log("Email exist error");
                    }
                    else{
                      $('#register').submit();
                    }
                  }
              });
            }
      });

      // Login Form validation
      $("form[name='login']").validate({
            rules: {
                loginEmail: {
                    required: true,
                    email: true
                },
                loginPassword: {
                    required: true,
                    minlength: 8
                }
            },
            messages: {
                loginPassword: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                loginEmail: "Please enter a valid email address"
            },
            submitHandler: function (form) {
                form.submit();
            }
        });

      // Registration form validation
        $("form[name='register']").validate({
            rules: {
                firstName: "required",
                lastName: "required",
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    required: true,
                    minlength: 10,
                    maxlength:10,
                    number:true
                },
                typeOfAccount: {
                    required: true
                },
                password: {
                    required: true,
                    minlength: 8
                },
                confirmPassword: {
                    required: true,
                    minlength: 8
                },
            },
            messages: {
                firstName: "Please enter your first name",
                lastName: "Please enter your last name",
                typeOfAccount: {
                    required: "Please select an account type",
                },
                phone: {
                    required: "Please enter your mobile number",
                    number:"Please enter numbers only",
                    minlength: "Please enter valid number with 10 digits",
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                confirmPassword: {
                    required: "Please confirm password",
                    minlength: "Your password must be at least 5 characters long",
                    equalTo: "Please enter the same password as above"
                },
                email: "Please enter a valid email address"
            },
            submitHandler: function (form) {
                form.submit();
            }
        });

    });

</script>
@endsection
