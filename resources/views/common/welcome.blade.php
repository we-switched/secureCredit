
@extends('layouts.newapp')

@section('title', 'Secure Credit')

@section('content')


<main>

    <!-- Hero -->
    <section class="section section bg-soft pb-5 overflow-hidden z-2">
        <div class="container z-2">

            <div id="carouselContent" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                <div class="carousel-item active text-center p-4">
                        <div class="row justify-content-center text-center pt-6">
                            <div class="col-lg-8 col-xl-8">
                                <h1 class="display-2 mb-3">Personal Loan</h1>
                                <p class="lead px-md-6 mb-5">Let us help you to get the Personal Loan</p>
                                <div class="d-flex flex-column flex-wrap flex-md-row justify-content-md-center mb-5">
                                    <a href="{{ url('/personal_loan_first_form') }}"  class="btn btn-primary">Apply Now</a>
                                </div>
                            </div>
                        </div>
                </div>
                
                <div class="carousel-item text-center p-4">
                    <div class="row justify-content-center text-center pt-6">
                        <div class="col-lg-8 col-xl-8">
                            <h1 class="display-2 mb-3">Business Loan</h1>
                            <p class="lead px-md-6 mb-5">Let us help you to get the Business Loan</p>
                            <div class="d-flex flex-column flex-wrap flex-md-row justify-content-md-center mb-5">
                                <a href="{{ url('/business_loan_form') }}"  class="btn btn-primary">Apply Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item text-center p-4">
                    <div class="row justify-content-center text-center pt-6">
                        <div class="col-lg-8 col-xl-8">
                            <h1 class="display-2 mb-3">Home Loan</h1>
                            <p class="lead px-md-6 mb-5">Let us help you to get the Home Loan</p>
                            <div class="d-flex flex-column flex-wrap flex-md-row justify-content-md-center mb-5">
                                <a href="{{ url('/home_loan_form') }}"  class="btn btn-primary">Apply Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item text-center p-4">
                    <div class="row justify-content-center text-center pt-6">
                        <div class="col-lg-8 col-xl-8">
                            <h1 class="display-2 mb-3">Top-Up Loan</h1>
                            <p class="lead px-md-6 mb-5">Let us help you to get the Top-Up Loan</p>
                            <div class="d-flex flex-column flex-wrap flex-md-row justify-content-md-center mb-5">
                                <a href="{{ url('/topup_loan_form') }}"  class="btn btn-primary">Apply Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item text-center p-4">
                    <div class="row justify-content-center text-center pt-6">
                        <div class="col-lg-8 col-xl-8">
                            <h1 class="display-2 mb-3">POS Based Loan</h1>
                            <p class="lead px-md-6 mb-5">Let us help you to get the POS Based Loan</p>
                            <div class="d-flex flex-column flex-wrap flex-md-row justify-content-md-center mb-5">
                                <a href="{{ url('/pos_based_loan_form') }}"  class="btn btn-primary">Apply Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item text-center p-4">
                    <div class="row justify-content-center text-center pt-6">
                        <div class="col-lg-8 col-xl-8">
                            <h1 class="display-2 mb-3">Savings Account</h1>
                            <p class="lead px-md-6 mb-5">Let us help you to get the Savings Account</p>
                            <div class="d-flex flex-column flex-wrap flex-md-row justify-content-md-center mb-5">
                                <a href="{{ url('/savings_account_form') }}"  class="btn btn-primary">Apply Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                   
                  
                    
               </div>
          
            <a class="carousel-control-prev" href="#carouselContent" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true" ></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselContent" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            </div>
            </div>

        </div>
    </section>
    <section class="section section-lg bg-soft">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h1 class="font-weight-light">Our <span class="font-weight-bold">Services</span></h1>
                    <p class="lead">Let us help you choose the right one for you</p>
                </div>
            </div>
            <div class="row mt-6">
                <a href="{{url('/personal_loan_first_form')}}" class="col-md-4 col-4">
                    <!-- Icon box -->
                    <div class="icon-box text-center mb-5">
                        <div class="icon icon-shape icon-shape-sm shadow-soft border border-light rounded">
<lottie-player src="https://assets4.lottiefiles.com/packages/lf20_Y9BNoF.json"  background="transparent"  speed="1" loop autoplay></lottie-player>
                        </div>
                        <h2 class="h5 my-3">Personal Loan</h2>
                    </div>
                    <!-- End of Icon box -->
                </a>



                <a href="{{url('/business_loan_form')}}" class="col-md-4 col-4">
                    <!-- Icon box -->
                    <div class="icon-box text-center mb-5">
                        <div class="icon icon-shape icon-shape-sm shadow-soft border border-light rounded">
                            <lottie-player src="https://assets7.lottiefiles.com/private_files/lf30_zYsLlY.json"  background="transparent"  speed="1" loop autoplay></lottie-player>
                        </div>
                        <h2 class="h5 my-3">Business Loan</h2>
                    </div>
                    <!-- End of Icon box -->
                </a>


                
                <a href="{{url('/home_loan_form')}}" class="col-md-4 col-4">
                    <!-- Icon box -->
                    <div class="icon-box text-center mb-5">
                        <div class="icon icon-shape icon-shape-sm shadow-soft border border-light rounded">
                            <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_TYZsbM.json"  background="transparent"  speed="1" loop autoplay></lottie-player>
                        </div>
                        <h2 class="h5 my-3">Home Loan</h2>
                    </div>
                    <!-- End of Icon box -->
                </a>


                
                <a href="{{url('/loan_against_property_form')}}" class="col-md-4 col-4">
                    <!-- Icon box -->
                    <div class="icon-box text-center mb-5">
                        <div class="icon icon-shape icon-shape-sm shadow-soft border border-light rounded">
                            <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_fVZbXa.json"  background="transparent"  speed="1" loop autoplay></lottie-player>
                        </div>
                        <h2 class="h5 my-3">Loan Against Property</h2>
                    </div>
                    <!-- End of Icon box -->
                </a>


                
                <a href="{{url('/pos_based_loan_form')}}" class="col-md-4 col-4">
                    <!-- Icon box -->
                    <div class="icon-box text-center mb-5">
                        <div class="icon icon-shape icon-shape-sm shadow-soft border border-light rounded">
                            <lottie-player src="https://assets8.lottiefiles.com/private_files/lf30_0Jie0M.json"  background="transparent"  speed="1" loop autoplay></lottie-player>
                        </div>
                        <h2 class="h5 my-3">POS Based Loan</h2>
                    </div>
                    <!-- End of Icon box -->
                </a>


                
                <a href="{{url('/credit_card_balance_transfer_form')}}" class="col-md-4 col-4">
                    <!-- Icon box -->
                    <div class="icon-box text-center mb-5">
                        <div class="icon icon-shape icon-shape-sm shadow-soft border border-light rounded">
                            <lottie-player src="https://assets6.lottiefiles.com/packages/lf20_LvxLBo.json"  background="transparent"  speed="1" loop autoplay></lottie-player>
                        </div>
                        <h2 class="h5 my-3">Credit Card Balance Transfer</h2>
                    </div>
                    <!-- End of Icon box -->
                </a>


                
                <a href="{{url('/fixed_deposit_form')}}" class="col-md-4 col-4">
                    <!-- Icon box -->
                    <div class="icon-box text-center mb-5">
                        <div class="icon icon-shape icon-shape-sm shadow-soft border border-light rounded">
                            <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_SyUX5x.json"  background="transparent"  speed="1" loop autoplay></lottie-player>
                        </div>
                        <h2 class="h5 my-3">Fixed Deposit</h2>
                    </div>
                    <!-- End of Icon box -->
                </a>


                
                <a href="{{url('/current_account_form')}}" class="col-md-4 col-4">
                    <!-- Icon box -->
                    <div class="icon-box text-center mb-5">
                        <div class="icon icon-shape icon-shape-sm shadow-soft border border-light rounded">
                            <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_cSJ1Cy.json"  background="transparent"  speed="1" loop autoplay></lottie-player>
                        </div>
                        <h2 class="h5 my-3">Current Account</h2>
                    </div>
                    <!-- End of Icon box -->
                </a>


                
                <a href="{{url('/savings_account_form')}}" class="col-md-4 col-4">
                    <!-- Icon box -->
                    <div class="icon-box text-center mb-5">
                        <div class="icon icon-shape icon-shape-sm shadow-soft border border-light rounded">
                            <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_kYWLTu.json"  background="transparent"  speed="1" loop autoplay></lottie-player>
                        </div>
                        <h2 class="h5 my-3">Savings Account</h2>
                    </div>
                    <!-- End of Icon box -->
                </a>


                <a href="{{url('/insurance_form')}}" class="col-md-4 col-4">
                    <!-- Icon box -->
                    <div class="icon-box text-center mb-5">
                        <div class="icon icon-shape icon-shape-sm shadow-soft border border-light rounded">
                            <lottie-player src="https://assets6.lottiefiles.com/packages/lf20_94KptK.json"  background="transparent"  speed="1" loop autoplay></lottie-player>
                        </div>
                        <h2 class="h5 my-3">Insurance</h2>
                    </div>
                    <!-- End of Icon box -->
                </a>


                <a href="{{url('/mutual_funds_form')}}" class="col-md-4 col-4">
                    <!-- Icon box -->
                    <div class="icon-box text-center mb-5">
                        <div class="icon icon-shape icon-shape-sm shadow-soft border border-light rounded">
                            <lottie-player src="https://assets2.lottiefiles.com/datafiles/4REnKJixS5dJP42/data.json"  background="transparent"  speed="1" loop autoplay></lottie-player>
                        </div>
                        <h2 class="h5 my-3">Mutual Funds</h2>
                    </div>
                    <!-- End of Icon box -->
                </a>


                <a href="{{url('/demat_account_form')}}" class="col-md-4 col-4">
                    <!-- Icon box -->
                    <div class="icon-box text-center mb-5">
                        <div class="icon icon-shape icon-shape-sm shadow-soft border border-light rounded">
                            <lottie-player src="https://assets6.lottiefiles.com/temporary_files/9kn6oX.json"  background="transparent"  speed="1" loop autoplay></lottie-player>
                        </div>
                        <h2 class="h5 my-3">Demat Account</h2>
                    </div>
                    <!-- End of Icon box -->
                </a>


                <a href="{{url('/invoice_discounting_form')}}" class="col-md-4 col-4">
                    <!-- Icon box -->
                    <div class="icon-box text-center mb-5">
                        <div class="icon icon-shape icon-shape-sm shadow-soft border border-light rounded">
                            <lottie-player src="https://assets9.lottiefiles.com/packages/lf20_aihAMJ.json"  background="transparent"  speed="1" loop autoplay></lottie-player>
                        </div>
                        <h2 class="h5 my-3">Invoice Discounting</h2>
                    </div>
                    <!-- End of Icon box -->
                </a>


                <a href="{{url('/lease_rental_discounting_form')}}" class="col-md-4 col-4">
                    <!-- Icon box -->
                    <div class="icon-box text-center mb-5">
                        <div class="icon icon-shape icon-shape-sm shadow-soft border border-light rounded">
                            <lottie-player src="https://assets9.lottiefiles.com/packages/lf20_0PEZaV.json"  background="transparent"  speed="1" loop autoplay></lottie-player>
                        </div>
                        <h2 class="h5 my-3">Lease Rental Discounting</h2>
                    </div>
                    <!-- End of Icon box -->
                </a>


                <a href="{{url('/topup_loan_form')}}" class="col-md-4 col-4">
                    <!-- Icon box -->
                    <div class="icon-box text-center mb-5">
                        <div class="icon icon-shape icon-shape-sm shadow-soft border border-light rounded">
                            <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_4wDd2K.json"  background="transparent"  speed="1" loop autoplay></lottie-player>
                        </div>
                        <h2 class="h5 my-3">Top-up Loan</h2>
                    </div>
                    <!-- End of Icon box -->
                </a>


                <a href="{{url('/instant_loan_form')}}" class="col-md-4 col-4">
                    <!-- Icon box -->
                    <div class="icon-box text-center mb-5">
                        <div class="icon icon-shape icon-shape-sm shadow-soft border border-light rounded">
                            <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_8EfvqQ.json"  background="transparent"  speed="1" loop autoplay></lottie-player>
                        </div>
                        <h2 class="h5 my-3">Instant Loan</h2>
                    </div>
                    <!-- End of Icon box -->
                </a>


                <a href="#" class="col-md-4 col-4">
                    <!-- Icon box -->
                    <div class="icon-box text-center mb-5">
                        <div class="icon icon-shape icon-shape-sm shadow-soft border border-light rounded">
                            <lottie-player src="https://assets9.lottiefiles.com/private_files/lf30_phpDVV.json"  background="transparent"  speed="1" loop autoplay></lottie-player>
                        </div>
                        <h2 class="h5 my-3">Buy & Sell Property</h2>
                        <span class="badge badge-gray text-uppercase ml-2">Coming Soon</span>
                    </div>
                    <!-- End of Icon box -->
                </a>


                
             

            </div>
        </div>
    </section>
    <section class="section section bg-soft pb-5 overflow-hidden z-2">
        <div class="container z-2">
    <div class="row">
        <div class="col text-center">
            <div class="mt-6 mb-5">
                <h1 class="font-weight-light">About <span class="font-weight-bold">Us</span></h1>
            </div>
        </div>
    </div>
    <!-- End of Title -->
    <div class="row justify-content-center">
        <div class="col-12 col-md-10">
            <div class="alert shadow-soft mb-4 mb-lg-5 text-center" role="alert">
                <p>  To ease your process of fetching a loan, we are at your service! Allow us to help you and we'll surely help you all we can.<br><br>
                    Our process is quick and effective, no long queues. Taking a loan won't frighten you anymore because we assure you a healthy loan delivery.<br><br>
                    Our processing charges are minimal because we know it takes a lot to earn money. A little sum to get a loan of your desired amount is what we are here for.<br><br>
                    We won't vanish right after we meet, we'll be at your service 24x7 and so, there'd be no compromises. Our services are premium and customer friendly.</p>
            </div>
        </div>
    </div>
        </div>
    </section>
</main>

@endsection