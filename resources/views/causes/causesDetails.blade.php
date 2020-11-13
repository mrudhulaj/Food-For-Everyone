@extends('templates.main')
<title>Cause Details</title>
<style>
.wrapper section>h2::before {
    left: 40% !important;
    width: 280px !important;
}

.cust-center {
    display: flex;
    align-items: center;
    justify-content: center;
}

table {
    margin-bottom: 80px;
    border-radius: 13px;
    box-shadow: 0 5px 20px 0 rgba(0, 0, 0, 0.5);
    display: inline-block;
}

.td-img {}

</style>
@section('content')
<div class="">
<section>
    <h2 style="margin-top: 0px;">Future for our children</h2>
</section>
<div class="container cust-center">
    <table style="overflow: hidden;" class="cust-table">
        <thead>
            <th>
                <img id="img-new"
                    src="{{ url('images/causes-details/causes-details-1.jpg') }}" alt="">
            </th>
        </thead>
        <tbody>
            <tr>
                <td>
                  Join us in helping build our bright youngsters a school to showcase their skills and to make them a change and making the world a better place.
                </td>
            </tr>
            <tr>
              <td>
                
              </td>
            </tr>
        </tbody>
    </table>
</div>
<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script>
    $(document).ready(function () {
        var img = document.getElementById('img-new');
        var width = img.clientWidth+"px";
        console.log("Image width = "+width);
        $("table").css("width", width);
    });

</script>

@stop
