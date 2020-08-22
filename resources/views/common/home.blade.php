@extends('layouts.app')

@section('title', 'Home')

@section('content')

<div class="section-dark">
    <div class="wrap w50">
      <div class="text-center"><h3><i class="fa fa-tachometer" style="color:whitesmoke"></i>Dashboard</h3></div>
      <div class="team2-people-row">
        
        <div class="_4-col">
          <a href="/PersonalLoan/details" style="text-decoration: none; color: white">
            <div class="team2-profile-card team2-profile-card-dark">
              <div class="team2-profilecard-wrapper">
                <div class="profile-pic-personal-loan"></div>
                <h3 class="team2-profilename">Personal Loan</h3>
                <div class="tagline">{{$personal_loan_count}} applications</div>
              </div>
              <div class="div-block">
                <button type="button" class="btn-2 apply-btn w-button">View Applicants</button>
              </div>
            </div>
          </a>
        </div>

        <div class="_4-col">
          <a href="/BusinessLoan/details" style="text-decoration: none; color: white">
            <div class="team2-profile-card team2-profile-card-dark">
              <div class="team2-profilecard-wrapper">
                <div class="profile-pic-business-loan"></div>
                <h3 class="team2-profilename">Business Loan</h3>
                <div class="tagline">{{$business_loan_count}} applications</div>
              </div>
              <div class="div-block">
                <button type="button" class="btn-2 apply-btn w-button">View Applicants</button>
              </div>
            </div>
          </a>
        </div>

        <div class="_4-col _4-col-last">
          <a href="/HomeLoan/details" style="text-decoration: none; color: white">
            <div class="team2-profile-card team2-profile-card-dark">
              <div class="team2-profilecard-wrapper">
                <div class="profile-pic-home-loan"></div>
                <h3 class="team2-profilename">Home Loan</h3>
                <div class="tagline">{{$home_loan_count}} applications</div>
              </div>
              <div class="div-block">
                <button type="button" class="btn-2 apply-btn w-button">View Applicants</button>
              </div>
            </div>
          </a>
        </div>

      </div>
      
      <div class="team2-people-row">
      
        <div class="_4-col">
          <a href="/LoanAgainstProperty/details" style="text-decoration: none; color: white">
            <div class="team2-profile-card team2-profile-card-dark">
              <div class="team2-profilecard-wrapper">
                <div class="profile-pic-loan-against-property"></div>
                <h3 class="team2-profilename">Loan against Property</h3>
                <div class="tagline">{{$loan_against_property_count}} applications</div>
              </div>
              <div class="div-block">
                <button type="button" class="btn-2 apply-btn w-button">View Applicants</button>
              </div>
            </div>
          </a>
        </div>

        <div class="_4-col">
          <a href="/PosBasedLoan/details" style="text-decoration: none; color: white">
            <div class="team2-profile-card team2-profile-card-dark">
              <div class="team2-profilecard-wrapper">
                <div class="profile-pic-pos-based-loan"></div>
                <h3 class="team2-profilename">POS Based<br>Loan</h3>
                <div class="tagline">{{$pos_based_loan_count}} applications</div>
              </div>
              <div class="div-block">
                <button type="button" class="btn-2 apply-btn w-button">View Applicants</button>
              </div>
            </div>
          </a>
        </div>

        <div class="_4-col _4-col-last">
          <a href="/CreditCardBalanceTransfer/details" style="text-decoration: none; color: white">
          <div class="team2-profile-card team2-profile-card-dark">
            <div class="team2-profilecard-wrapper">
              <div class="profile-pic-credit-card-balance-transfer"></div>
              <h3 class="team2-profilename">Credit Card Balance Transfer</h3>
              <div class="tagline">{{$credit_card_balance_transfer_count}} applications</div>
            </div>
            <div class="div-block">
              <button type="button" class="btn-2 apply-btn w-button">View Applicants</button>
            </div>
          </div>
        </a>
        </div>
      </div>

      <div class="team2-people-row">
        
        <div class="_4-col">
          <a href="/FixedDeposit/details" style="text-decoration: none; color: white">
          <div class="team2-profile-card team2-profile-card-dark">
            <div class="team2-profilecard-wrapper">
              <div class="profile-pic-fixed-deposit"></div>
              <h3 class="team2-profilename">Fixed Deposit</h3>
              <div class="tagline">{{$fixed_deposit_count}} applications</div>
            </div>
            <div class="div-block">
              <button type="button" class="btn-2 apply-btn w-button">View Applicants</button>
            </div>
          </div>
        </a>
        </div>

        <div class="_4-col">
          <a href="/CurrentAccount/details" style="text-decoration: none; color: white">
          <div class="team2-profile-card team2-profile-card-dark">
            <div class="team2-profilecard-wrapper">
              <div class="profile-pic-current-account"></div>
              <h3 class="team2-profilename">Current Account</h3>
              <div class="tagline">{{$current_account_count}} applications</div>
             </div>
             <div class="div-block">
              <button type="button" class="btn-2 apply-btn w-button">View Applicants</button>
            </div>
          </div>
        </a>
        </div>

        <div class="_4-col _4-col-last">
          <a href="/SavingsAccount/details" style="text-decoration: none; color: white">
          <div class="team2-profile-card team2-profile-card-dark">
            <div class="team2-profilecard-wrapper">
              <div class="profile-pic-savings-account"></div>
              <h3 class="team2-profilename">Savings Account</h3>
              <div class="tagline">{{$savings_account_count}} applications</div>
            </div>
            <div class="div-block">
              <button type="button" class="btn-2 apply-btn w-button">View Applicants</button>
            </div>
          </div>
          </a>
        </div>

      </div>

      <div class="team2-people-row">

        <div class="_4-col">
          <a href="/Insurance/details" style="text-decoration: none; color: white">
          <div class="team2-profile-card team2-profile-card-dark">
            <div class="team2-profilecard-wrapper">
              <div class="profile-pic-insurance"></div>
              <h3 class="team2-profilename">Insurance</h3>
              <div class="tagline">{{$insurance_count}} applications</div>
            </div>
            <div class="div-block">
              <button type="button" class="btn-2 apply-btn w-button">View Applicants</button>
            </div>
          </div>
          </a>
        </div>

        <div class="_4-col">
          <a href="/MutualFunds/details" style="text-decoration: none; color: white">
          <div class="team2-profile-card team2-profile-card-dark">
            <div class="team2-profilecard-wrapper">
              <div class="profile-pic-mutual-funds"></div>
              <h3 class="team2-profilename">Mutual Funds</h3>
              <div class="tagline">{{$mutual_funds_count}} applications</div>
            </div>
            <div class="div-block">
              <button type="button" class="btn-2 apply-btn w-button">View Applicants</button>
            </div>
          </div>
          </a>
        </div>

        <div class="_4-col _4-col-last">
          <a href="/DematAccount/details" style="text-decoration: none; color: white">
          <div class="team2-profile-card team2-profile-card-dark">
            <div class="team2-profilecard-wrapper">
              <div class="profile-pic-demat-account"></div>
              <h3 class="team2-profilename">Demat Account</h3>
              <div class="tagline">{{$demat_account_count}} applications</div>
            </div>
            <div class="div-block">
              <button type="button" class="btn-2 apply-btn w-button">View Applicants</button>
            </div>
          </div>
          </a>
        </div>

      </div>

      <div class="team2-people-row">
        
        <div class="_4-col _4-col-last">
          <a href="/InstantLoan/details" style="text-decoration: none; color: white">
          <div class="team2-profile-card team2-profile-card-dark">
            <div class="team2-profilecard-wrapper">
              <div class="profile-pic-instant-loan"></div>
              <h3 class="team2-profilename">Instant<br>Loan</h3>
              <div class="tagline">{{$instant_loan_count}} applications</div>
            </div>
            <div class="div-block">
              <button type="button" class="btn-2 apply-btn w-button">View Applicants</button>
            </div>
          </div>
          </a>
        </div>

        <div class="_4-col">
          <a href="/InvoiceDiscounting/details" style="text-decoration: none; color: white">
          <div class="team2-profile-card team2-profile-card-dark">
            <div class="team2-profilecard-wrapper">
              <div class="profile-pic-invoice-discounting"></div>
              <h3 class="team2-profilename">Invoice Discounting</h3>
              <div class="tagline">{{$invoice_discounting_count}} applications</div>
            </div>
            <div class="div-block">
              <button type="button" class="btn-2 apply-btn w-button">View Applicants</button>
            </div>
          </div>
          </a>
        </div>

        <div class="_4-col _4-col-last">
          <a href="/LeaseRentalDiscounting/details" style="text-decoration: none; color: white">
          <div class="team2-profile-card team2-profile-card-dark">
            <div class="team2-profilecard-wrapper">
              <div class="profile-pic-lease-rental-discounting"></div>
              <h3 class="team2-profilename">Lease Rental Discounting</h3>
              <div class="tagline">{{$lease_rental_discounting_count}} applications</div>
            </div>
            <div class="div-block">
              <button type="button" class="btn-2 apply-btn w-button">View Applicants</button>
            </div>
          </div>
          </a>
        </div>

      </div>

    </div>
  </div>

@endsection