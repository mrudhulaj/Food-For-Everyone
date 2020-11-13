@extends('templates.main')
<title>Cause Details</title>
<style>
    .wrapper section>h2::before {
        width: 190px !important;
        left: 42% !important;
    }

    .box {
        width: 350px;
        height: 725px;
    }

    .mainbox-cust {
        margin-bottom: 80px;
        border-radius: 13px;
        box-shadow: 0 5px 20px 0 rgba(0, 0, 0, 0.5);
        display: inline-block;
        /* margin-left: 55px !important; */
        /* margin-right: 55px !important; */

    }

    .box .box-content h2 {
        color: #3c354e;
        font-family: "Roboto", sans-serif;
        font-size: 20px;
        font-weight: 700;
        margin: 100px 0 15px;
    }

    hr {
        margin-top: 20px;
        margin-bottom: 20px;
        border: 0;
        border-top: 2px solid #01d262 !important;
        width: 50% !important;
    }

    .box-p,
    .progress-text {
        color: #595959;
        font-family: "Roboto", sans-serif;
        font-size: 15px;
        font-weight: 400;
        margin: 0;
        text-align: center;
    }

    .progress-text {
        margin: 0 auto;
        position: relative;
        text-align: center;
    }

    .progress {
        background-color: #e5e5e5 !important;
        height: 10px !important;
        margin-top: 20px !important;
        max-width: 100% !important;
    }

    .progress-amount {
        color: #01d262;
    }

    .progress-left {
        left: 0;
        margin-top: 15px;
        position: absolute;
    }

    .progress-right {
        right: 0;
        margin-top: 15px;
        position: absolute;
    }

    .box-content h2 a {
        background: #fff none repeat scroll 0 0;
        border-radius: 30px;
        color: #05ce68;
        font-family: "Roboto", sans-serif;
        font-size: 16px;
        font-weight: 500;
        padding: 15px 40px;
        text-decoration: none;
        border: 1px solid #05ce68;
    }

    .box-content h2 a:hover {
        background: #01d262 none repeat scroll 0 0;
        color: white;
    }

    .img-div {
        overflow: hidden;
        border-top-left-radius: inherit;
        border-top-right-radius: inherit;
        display: flex;
        justify-content: center;

    }

    .learn-more {
        color: #00ab47;
        /* font-weight: bold; */
    }

    .learn-more:hover {
        color: #00A348 !important;
        font-weight: bold !important;
        text-decoration: none;
    }

    .h2-title:hover {
        color: #00A348 !important;
        font-weight: bold !important;
        text-decoration: none;
    }

    .cust-center {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .img-cust {
        width: auto !important;
        overflow: hidden !important;
        /* border-bottom-left-radius: inherit !important; */
        /* border-bottom-right-radius: inherit !important; */

    }

</style>
@section('content')
<div class="">
    <section>
        <h2 style="margin-top: 0px;">Future for our children</h2>
    </section>
    <div class="container cust-center">
        <div class="row" style="border: 2px solid red">
            <div class="col-lg-12 mainbox-cust plr-0 img-cust" style="">
                <div class="">
                    <img src="{{ url('images/causes-details/causes-details-1.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="container cust-center">
      <div class="row" style="border: 2px solid red">
          <div class="col-lg-12 mainbox-cust plr-0 img-cust" style="">
              <div class="">
                  <p>We are planning to build a school in Ashok Nagar, Delhi for our children.This project requires lots of effort as well as capital.We have been blessed to have engineers and architects who have agreed to work voluntarily for us but still we have needs to meet inorder to make this dream a reality.Any help in the form of volunteering or donation is highly appreciated.We try to build all of our projects as transparent as possible.If you have any queries we'd be happy to help you.Please send us an email or contact us for more details.</p>
              </div>
          </div>
      </div>
  </div>
@stop
