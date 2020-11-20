@extends('templates.main')
<title>Cause Details</title>
<style>
    .mainbox-cust {
        margin-bottom: 80px;
        border-radius: 13px;
        box-shadow: 0 5px 20px 0 rgba(0, 0, 0, 0.5);
        display: inline-block;

    }

    .wrapper section>h2::before {
        width: 190px !important;
        left: 42% !important;
    }

    .cust-center {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .img-cust {
        width: auto !important;
        overflow: hidden !important;

    }

		/* Begin: Progress Bar */

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

		/* Begin:Donate Now Button */

		.borderes a {
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

    .borderes a:hover {
        background: #01d262 none repeat scroll 0 0;
        color: white;
    }

		/* End Donate Now Button */

		/* End: Progress Bar */

</style>
@section('content')
<section>
    <h2 style="margin-top: 0px;">Future for our children</h2>
</section>
<div class="container cust-center">
    <div class="col-lg-12 mainbox-cust plr-0 img-cust" style="">
        <div>
            <img id="img-new" src="{{ url('images/causes-details/causes-details-1.jpg') }}"
                alt="">
        </div>
        <div class="ffe-font" style="padding-left: 10px;padding-right: 10px;padding-top: 10px;">

            <div>
                <p>Join us in helping build our bright youngsters a school to showcase their skills ,to make a
                    change and making the world a better place.</p>
            </div>
            <div>
                <p>
                    We are planning to build a school in Ashok Nagar, Delhi for our children.This project requires
                    lots of effort as well as capital.We have been blessed to have engineers and architects who have
                    agreed to work voluntarily for us but still we have needs to meet inorder to make this dream a
                    reality.Any help in the form of volunteering or donation is highly appreciated.We try to build
                    all of our projects as transparent as possible.If you have any queries we'd be happy to help
                    you.Please send us an email or contact us for more details.
                </p>
            </div>
						{{-- Begin:  Progress Bar --}}
						<div class="progress-div col-lg-offset-3 col-lg-6" style="height: 215px;margin-top: 15px;">
							<div class="progress-text">
								<p class="progress-top">50%</p>
                <div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0"
									aria-valuemax="100" style="width:50%;background-color: #01d262;"></div>
                </div>
                <p class="progress-left">Raised: <span class="progress-amount">1200 ₹</span></p>
                <p class="progress-right">Goal: <span class="progress-amount">2400 ₹</span></p>
							</div>
							<h2 class="borderes" style="text-align: center;margin-top: 100px;"><a style="text-decoration: none;" href="#">DONATE NOW</a></h2>
						</div>
            {{-- End: Progress Bar --}}
        </div>
    </div>
</div>

<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $(".details-text").addClass('hide');
        var img = document.getElementById('img-new');
        var width = img.clientWidth + "px";
        $(".mainbox-cust").css("cssText", "width:" + width + " !important;");
        $(".details-text").removeClass('hide');
    });

</script>

@stop
