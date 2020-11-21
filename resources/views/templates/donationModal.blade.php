{{-- Modal Donation Form --}}
<style>
    #amount-error{
      margin-top: -22px;
      margin-bottom: 22px;
    }

</style>

<div class="modal fade" id="donationModal" tabindex="-1" role="dialog" aria-labelledby="donationModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius: 13px;border: none">
            <div class="modal-header ffe-font">
                <h5 class="modal-title" id="donationModalLabel">Donation
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h5>
            </div>
            <div class="modal-body col-lg-12 ffe-font" style="padding: 20px;">
                <div class="page-wrapper font-poppins" style="min-height: auto;">
                    <div class="wrapper wrapper--w680">
                        <div style="padding: 30px 30px 0px 30px;">
                            <div class="card-body">
                                <form action="" method="POST" enctype="multipart/form-data" name="donationForm">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="row row-space">
                                        <div class="col-2">
                                            <div class="input-group">
                                                <label class="label ffe-font">First Name</label>
                                                <input class="input--style-4" type="text" name="firstName" value="">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="input-group">
                                                <label class="label ffe-font">Last name</label>
                                                <input class="input--style-4" type="text" name="lastName"
                                                    value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row row-space">

                                        <div class="col-lg-12">
                                            <div class="input-group col-lg-12">
                                                <label class="label ffe-font">Amount</label>
                                                <div class="p-t-10 col-lg-12 plr-0">
                                                    <div class="col-lg-3 plr-0" style="padding-right: 10px;">
                                                        <button type="button" class="btn btn-secondary btn-money"
                                                            style="width: 100%">₹ 100</button>
                                                    </div>
                                                    <div class="col-lg-3 plr-0" style="padding-right: 10px;">
                                                        <button type="button" class="btn btn-secondary btn-money"
                                                            style="width: 100%">₹ 500</button>
                                                    </div>
                                                    <div class="col-lg-3 plr-0" style="padding-right: 10px;">
                                                        <button type="button" class="btn btn-secondary btn-money"
                                                            style="width: 100%">₹ 1000</button>
                                                    </div>
                                                    <div class="col-lg-3 plr-0">
                                                        <button type="button" class="btn btn-secondary btn-money"
                                                            style="width: 100%">₹ 2000</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group col-lg-12 amount-div">
                                        <span class="input-group-addon left-input-addon" id="sizing-addon1">₹</span>
                                        <input class="input--style-4" id="amount" type="text" name="amount"
                                            aria-describedby="sizing-addon1" style="border-radius: 0px 5px 5px 0px;">
                                    </div>

                                    <div class="input-group col-lg-12">
                                        <label class="label ffe-font">Phone</label>
                                        <input class="input--style-4" type="text" name="phone">
                                    </div>
                                    <div class="input-group col-lg-12">
                                        <label class="label ffe-font">Email</label>
                                        <input class="input--style-4" type="text" name="email">
                                        <p style="text-align: center;margin-top: 5px;" class="ffe-font">A reciept will
                                            be send to your email after the donation is made.</p>
                                    </div>
                                    <div class="" style="text-align: center;">
                                        <button type="submit" id="submitbtn" data-toggle="modal"
                                            data-target="#confirmationModal" class="btn button-bg-green"
                                            style="padding: 0px;width: 120px;height: 60px;">
                                            Donate
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="padding: 0px;">
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script>
    $(".btn-money").click(function () {
        var money = $(this).text();
        money = money.replace("₹ ", "");
        $('#amount').val(money);
    });

    $(document).ready(function () {

      // Donation form validation
        $("form[name='donationForm']").validate({            
          errorPlacement: function(error, element) {
                if (element.parent().hasClass('amount-div')) {
                  error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            },
            rules: {
                firstName: "required",
                lastName: "required",
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    required: true,
                    number: true
                },
                amount: {
                    required: true,
                    number: true
                },
            },
            messages: {
                firstName: "Please enter your first name",
                lastName: "Please enter your last name",
                phone: {
                    required: "Please enter your mobile number",
                    number: "Please enter numbers only"
                },
                amount: {
                    required: "Please enter an amount",
                    number: "Please enter numbers only"
                },
                email: "Please enter a valid email address"
            },
            submitHandler: function (form) {
                form.submit();
            }
        });

    });

</script>
{{-- End: Modal Donation Form --}}
