@include('pages.header')
<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom mb-5">
    <a class="navbar-brand" href="{{url('/')}}">
{{--        <img src="{{asset('invoice/img/logo.png')}}" alt="">--}}
        <img src="{{asset('invoice/img/button.svg')}}" alt="">

        <b>In</b>voice
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{url('/')}}">Home </a>
            </li>

        </ul>
        <ul class="navbar-nav m-auto">

        </ul>
        <ul class="navbar-nav ml-auto" >
            <li class="nav-item">
                <a class="nav-link text-success" href="{{url('/invoice_manage_ui')}}">
                    <span>Create your invoice <i class="la la-inbox"></i></span>
                </a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link text-warning">Singin <i class="la la-sign-in"></i></a>
            </li>
        </ul>
    </div>
</nav>
<div class="container-fluid">

    <div class="row">
        <div class="col-md-6">
            <img src="{{asset('invoice/img/business.gif')}}" alt="">
        </div>
        <div class="col-md-6 my-5">
                <h3 class="text-secondary">
                    Why do I need an invoice for business?
                </h3>
            <p class="pl-5">
                The good news is, your blog is in business. You've got your first project approved by the client, and now what?
            </p>
            <p class="pl-5">
                Sometimes business is done with a handshake, but for tax purposes, both for you and your client, having a paper trail is a must. Having your invoice and many times your W-9 ready is important to making sure you get paid in a timely fashion. I personally like to send the invoice before the work commences so there is no doubt about the charges for services rendered. If additional services are needed, then another invoice can always be issued.
            </p>
            <p class="pl-5">
                Even if you haven't gotten a gig yet, it's good to just create one, first of all because it gives some clarity to you as to how you want to bill your services. Also, it puts intentions out into the universe that you will be making money with your blog. That's not a bad thing, no?
            </p>
        </div>
        <div class="col-md-12 mx-4">
            <div class="row ">
                <div class="col-md-5"><hr></div>
                <span class=" reloder_img"><img src="{{asset('invoice/img/reloder.gif  ')}}" alt=""></span>
                <div class="col-md-5"><hr></div>
            </div>
        </div>
        <div class="col-md-6 my-3">
            <h3 class="text-secondary">
                What are the important parts of my sponsored posts invoice?
            </h3>
            <p class="pl-5">
                Now let’s get to the nitty-gritty.

                Let’s quickly look at the parts you need on your invoice, and then look at them in-depth with the help of our own custom-made sponsored posts invoice.

                Your invoice will need:
            </p>
                <ul class="pl-5">
                    <li>your contact information</li>
                    <li>the invoice number and date of issue</li>
                    <li>the service description</li>
                    <li>the subtotal</li>
                    <li>any applicable taxes and/or discounts</li>
                    <li>the total due</li>
                    <li>the payment terms</li>
                    <li>make checks payable to/your bank account information</li>
                    <li>Let’s look at each in turn.</li>
                </ul>











        </div>
        <div class="col-md-6 my-5">
            <img src="{{asset('invoice/img/background.gif')}}" alt="">
        </div>
    </div>
</div>
@include('pages.footer')
