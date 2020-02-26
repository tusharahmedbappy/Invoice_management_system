@include('pages.header')

<div class="container my-5" >
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                <p>From Details</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                <p>To details</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                <p>Confirm</p>
            </div>
        </div>
    </div>

    <div class="container">
        <form role="form" action="{{url('/invoice-details')}}" method="post">
            @csrf
            <div class="row setup-content" id="step-1">
                <div class="col-md-5 m-auto">
                    <h4>From<hr></h4>
                    <div class="customer_info row">
                        <input type="text"
                               placeholder="From company name"
                               class=" customer_info"
                               name="from_company_name"
                               required
                        >
                        <input type="text"
                               placeholder="From company owner name"
                               class="customer_info"
                               required
                               name="from_owner_name"
                        >
                        <input type="text"
                               placeholder="From address"
                               name="from_address"
                               class="customer_info"
                               required
                        >
                    </div>

                    <button class="btn btn-next nextBtn btn-lg pull-right" type="button" >Next</button>
                </div>
            </div>
            <div class="row setup-content" id="step-2">
                <div class="col-md-5 m-auto">
                    <div class="customer_info row">
                        <input type="text"
                               placeholder="To company name"
                               class="customer_info"
                               name="to_company_name"
                               required
                               autocomplete="on"
                        >
                        <input type="text"
                               name="to_owner_name"
                               placeholder="To company owner name"
                               class="customer_info"
                               required
                        >
                        <input type="text"
                               placeholder="To address"
                               name="to_address"
                               class="customer_info"
                               required
                        >
                    <button class="btn btn-next nextBtn btn-lg pull-right" type="button" >Next</button>
                </div>
            </div>
    </div>
    <div class="row setup-content" id="step-3">
        <div class="col-md-5 m-auto py-5">
            <div class="customer_info" style="margin-left: 30px;">

                <span class=""><input type="checkbox" name="check_confirm" class="customer_info"> I want to create a invoice</span>
                <p></p>
                <button class="btn btn-next nextBtn btn-lg">Confirm</button>
            </div>
        </div>
    </div>
    </form>
</div>



</div>






@include('pages.footer')


<script>
    $(document).ready(function () {

        var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

        allWells.hide();

        navListItems.click(function (e) {
            e.preventDefault();
            var $target = $($(this).attr('href')),
                $item = $(this);

            if (!$item.hasClass('disabled')) {
                navListItems.removeClass('btn-primary').addClass('btn-submited');
                $item.addClass('btn-primary');
                allWells.hide();
                $target.show();
                $target.find('input:eq(0)').focus();
            }
        });

        allNextBtn.click(function(){
            var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                curInputs = curStep.find("input[type='text'],input[type='select'],input[type='url'],input[type='password'],input[type='email']"),
                isValid = true;

            $(".customer_info").removeClass("has-error");
            for(var i=0; i<curInputs.length; i++){
                if (!curInputs[i].validity.valid){
                    isValid = false;
                    $(curInputs[i]).closest(".customer_info").addClass("has-error");
                }
            }

            if (isValid)
                nextStepWizard.removeAttr('disabled').trigger('click');
        });

        $('div.setup-panel div a.btn-primary').trigger('click');
    });




</script>
