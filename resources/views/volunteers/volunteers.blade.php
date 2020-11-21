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

</style>
@section('content')
<section>
    <h2 style="margin-top: 0px;">Our volunteers</h2>
    <p>Meet our superhero's.The people who bring joy to our kids and elders.The silent warriors.</p>
</section>
<div class="container" style="padding-bottom: 50px;padding-top: 50px;">
  <div class="col-lg-12" style="width: auto">
    <div class="item" style="border-radius: 10px;">
        <img src="{{ url('images/volanteer_1.jpg') }}"
            style="border-top-left-radius: 10px;border-bottom-left-radius: 10px;">
        <div class="text" style="height: 178px;">
            <h3>Laura Jammy</h3>
            <h6>Designer</h6>
            <p>With us since 2015</p>
            <h5><a style="" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a><a href="#"><i class="fa fa-twitter"
                        aria-hidden="true"></i></a><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></h5>
        </div>
    </div>
  </div>
    {{-- Multiple same items --}}
    <div class="col-lg-12" style="width: auto">
      <div class="item" style="border-radius: 10px;">
          <img src="{{ url('images/volanteer_1.jpg') }}"
              style="border-top-left-radius: 10px;border-bottom-left-radius: 10px;">
          <div class="text" style="height: 178px;">
              <h3>Laura Jammy</h3>
              <h6>Designer</h6>
              <p>With us since 2015</p>
              <h5><a style="" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a><a href="#"><i class="fa fa-twitter"
                          aria-hidden="true"></i></a><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></h5>
          </div>
      </div>
    </div>  <div class="col-lg-12" style="width: auto">
      <div class="item" style="border-radius: 10px;">
          <img src="{{ url('images/volanteer_1.jpg') }}"
              style="border-top-left-radius: 10px;border-bottom-left-radius: 10px;">
          <div class="text" style="height: 178px;">
              <h3>Laura Jammy</h3>
              <h6>Designer</h6>
              <p>With us since 2015</p>
              <h5><a style="" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a><a href="#"><i class="fa fa-twitter"
                          aria-hidden="true"></i></a><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></h5>
          </div>
      </div>
    </div>  <div class="col-lg-12" style="width: auto">
      <div class="item" style="border-radius: 10px;">
          <img src="{{ url('images/volanteer_1.jpg') }}"
              style="border-top-left-radius: 10px;border-bottom-left-radius: 10px;">
          <div class="text" style="height: 178px;">
              <h3>Laura Jammy</h3>
              <h6>Designer</h6>
              <p>With us since 2015</p>
              <h5><a style="" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a><a href="#"><i class="fa fa-twitter"
                          aria-hidden="true"></i></a><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></h5>
          </div>
      </div>
    </div>  <div class="col-lg-12" style="width: auto">
      <div class="item" style="border-radius: 10px;">
          <img src="{{ url('images/volanteer_1.jpg') }}"
              style="border-top-left-radius: 10px;border-bottom-left-radius: 10px;">
          <div class="text" style="height: 178px;">
              <h3>Laura Jammy</h3>
              <h6>Designer</h6>
              <p>With us since 2015</p>
              <h5><a style="" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a><a href="#"><i class="fa fa-twitter"
                          aria-hidden="true"></i></a><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></h5>
          </div>
      </div>
    </div>  <div class="col-lg-12" style="width: auto">
      <div class="item" style="border-radius: 10px;">
          <img src="{{ url('images/volanteer_1.jpg') }}"
              style="border-top-left-radius: 10px;border-bottom-left-radius: 10px;">
          <div class="text" style="height: 178px;">
              <h3>Laura Jammy</h3>
              <h6>Designer</h6>
              <p>With us since 2015</p>
              <h5><a style="" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a><a href="#"><i class="fa fa-twitter"
                          aria-hidden="true"></i></a><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></h5>
          </div>
      </div>
    </div>
    {{-- End multiple same items --}}
</div>
@stop
