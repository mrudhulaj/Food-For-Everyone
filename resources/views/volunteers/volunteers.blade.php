@extends('templates.main')
<title>Volunteers</title>
<style>
    .wrapper section>h2::before {
        width: 190px !important;
        left: 43% !important;
    }

    .item {
        box-shadow: 0px 2px 10px 0px rgba(0, 0, 0, 0.15);
        width: 365px;
        margin-right: 10px;
        margin-bottom: 30px;
        margin-top: 30px;
    }

    .item .text {
        box-shadow: 0 2px 10px 0 rgba(0, 0, 0, 0.15);
        float: right;
        width: 205px;
        padding: 5px 30px;
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    .item .text h5 a{
      padding-right: 10px;
    }

    .cust-img-div{
      width: 160px !important;
      height: 178px;
      overflow: hidden;
      box-shadow: 0 2px 10px 0 rgba(0, 0, 0, 0.15);
      border-radius: 10px 0px 0px 10px;
    }

</style>
@section('content')
<section>
  <div class="container" style="padding: 0px 10px 0px 10px;">
    @include('templates.alertSuccessMessage')
  </div>
    <h2 style="margin-top: 0px;padding-left: 232px;">
      Our volunteers
      <button class="btn button-bg-green" style="padding: 0px;width: 170px;height: 40px;float: right;margin-right: 60px;">
          @guest
            <a class="a-none" href="javascript:void(0)" data-toggle="modal" data-target="#defaultModal">Become A Volunteer</a>
          @else
            <a class="a-none" href="{{ route('addVolunteerView') }}">
              @if(Session::get('user')=="Admin" || Session::get('user')=="Volunteer")
                Add Volunteer
              @else
                Become A Volunteer
              @endif
            </a>
          @endguest
      </button>
    </h2>
    <p>Meet our superhero's.The people who bring joy to our kids and elders.The silent warriors.</p>
</section>
<div class="container" style="padding-bottom: 100px;padding-top: 50px;">
  @php $i = 0; @endphp {{-- To dynamically set Occup,Links etc to same height if name height differ --}}
  @foreach($volunteers as $volunteersData)
  <div class="col-lg-12" style="width: auto">
    <div class="item" style="border-radius: 10px;">
      <div class="col-lg-5 plr-0 cust-img-div">
        <img src="{{ asset($volunteersData->ProfileImage) }}"
        style="border-top-left-radius: 10px;border-bottom-left-radius: 10px;width: 160px;height: 178px;">
      </div>
        <div class="text col-lg-7 plr-0" style="height: 178px;">
            <h3 class="vNames">{{$volunteersData->FirstName." ".$volunteersData->LastName}}</h3>
            <h6 class="vOccup-{{$i}}">{{$volunteersData->Occupation}}</h6>
            <p>With us since {{ date('Y', strtotime($volunteersData->CreatedDate)) }}</p>
            <h5 style="" class="">
              <a href="#">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
              <a href="#">
                <i class="fa fa-twitter" aria-hidden="true"></i>
              </a>
              <a href="#">
                <i class="fa fa-behance" aria-hidden="true"></i>
              </a>
            </h5>
        </div>
    </div>
  </div>
  @php $i++; @endphp {{-- To dynamically set Occup,Links etc to same height if name height differ --}}
  @endforeach
</div>
@include('templates.custom-scripts')
@include('templates.defaultModal', ['title' => 'Login Required','message' => 'Please login or sign up to continue.'])
<script>
  // To dynamically set Occup,Links etc to same height if name height differ
   $(document).ready(function () {
     var i = 0;
      jQuery('.vNames').each(function() {
          var vNameHeight =  $(this).height();

          if(vNameHeight == 26){
            $(".vOccup-"+i).css("cssText", "margin-top:35px !important;");
          }
          i++;
      });
    });
</script>
@stop

