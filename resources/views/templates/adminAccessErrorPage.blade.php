@extends('templates.main')

<style>
</style>
@section('content')
<div class="container" style="min-height: 500px;">
  <div style="text-align: center;margin-top: 150px">
    <div class="main-logo">
        <img src="{{ url('images/mainLogo.png') }}" width="50" height="50">
        <h2>Food For Everyone</h2>
    </div>
    <h4>You do not have permission to access this page!</h4>
    <div class="col-md-12" style="display: flex;justify-content: center;margin-top: 30px">
      <button type="button" class="button-bg-green btn btn-primary"
          style="padding: 0px;width: 15%;height: 40px;margin-right: 15px">
          <a class="a-none" href="{{route('home')}}">
            Home
          </a>
      </button>
      <button type="button" class="button-bg-green btn btn-primary"
          style="padding: 0px;width: 15%;height: 40px">
          <a class="a-none" href="{{route('login')}}">
            Login
          </a>
      </button>
    </div>
  </div>
  
</div>

<script src="{{ asset('vendor/jquery-validation/dist/jquery.validate.min.js') }}" defer>
</script>
<script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
<script>
    $(document).ready(function () {
      
      $(".header-bottom").addClass('hide');

    });

</script>
@endsection
