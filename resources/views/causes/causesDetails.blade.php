@extends('templates.main')
<title>Cause Details</title>
<style>
    /* From here */

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

</style>
@section('content')
<div class="">
    <section>
        <h2 style="margin-top: 0px;">Future for our children</h2>
    </section>
    <div class="container cust-center">
        <div class="col-lg-12 mainbox-cust plr-0 img-cust" style="">
            <div>
                <img id="img-new" src="{{ url('images/causes-details/causes-details-1.jpg') }}"
                    alt="">
            </div>
            <div class="details-text">

                <div>
                    <p>Join us in helping build our bright youngsters a school to showcase their skills ,to make a change and making the world a better place.</p>
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
            </div>
        </div>
    </div>

    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $(".details-text").addClass('hide');
            var img = document.getElementById('img-new');
            var width = img.clientWidth + "px";
            console.log("image width = "+width);
            $(".mainbox-cust").css("cssText", "width:" + width + " !important;");
            $(".details-text").removeClass('hide');
        });

    </script>

    @stop
