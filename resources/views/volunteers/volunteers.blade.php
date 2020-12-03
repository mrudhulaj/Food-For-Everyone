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
    @if(count($volunteers) == 0) <p style="text-align: center;margin-top: 100px"><b>No volunteers found.</b></p> @endif
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
{{--  Begin: Submitted Modal  --}}
<div class="modal fade" id="submittedModal" tabindex="-1" role="dialog" aria-labelledby="submittedModalLabel"
aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content" style="border-radius: 13px;border: none">
          <div class="modal-header ffe-font">
              <h5 class="modal-title" id="submittedModalLabel">Volunteer Request Submitted !
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </h5>
          </div>
          <div class="modal-body col-lg-12 ffe-font" style="padding: 20px;">
              <p class="ffe-font">Your request is successfully submitted.The details provided will be subject to admin approval and you will be contacted soon.</p>
          </div>
          <div class="modal-footer">
              <button id="" data-dismiss="modal" type="button" class="btn btn-secondary mdl-btn-cancel">
                  Close
              </button>
          </div>
      </div>
  </div>
</div>
{{--  End: Submitted Modal  --}}
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

      let saved = "{{$saved}}";
      if(saved == '1'){
        jQuery.noConflict(); 
        $('#submittedModal').modal('show'); 
      }
    });
</script>
@stop

