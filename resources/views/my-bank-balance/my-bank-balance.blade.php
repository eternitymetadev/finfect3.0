@extends('layout.main')
@section('title')My Bank Balance @endsection
@section('page-heading')My Bank Balance @endsection
@section('slug') > My Bank Balance @endsection
@section('content')

<link href="{{asset('assets/css/pages/bank-page/bankPage.css')}}" rel="stylesheet" />


<div class="col-12 d-flex align-items-center justify-content-between animate__animated animate__fadeInDown">
    <div class="flex-grow-1 d-flex align-items-center justify-content-start">
        <div class="form-group col-md-6  animate__animated animate__fadeIn">
            <svg xmlns="http://www.w3.org/2000/svg" class="inputIcon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#83838380" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
            <input type="search" class="form-control form-control-sm withIcon" placeholder="search..."/>
        </div>
    </div>
    <div class="flex-grow-1 d-flex align-items-center justify-content-end">
        <button class="btn btn-sm btn-primary animate__animated animate__fadeIn">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon left" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
            Bank
        </button>
    </div>
</div>

<!-- <div class="col-12 pt-3"> -->
<div class="contentSection pt-3 mt-3">

    <div class="bankPage animate__animated animate__fadeIn">
     
    @for ($i = 0; $i < 5; $i++)
         <div class="bankCard animate__animated animate__fadeIn">
            <img src="{{asset('assets/images/logo.svg')}}" alt="bank logo" class="bankLogo animate__animated animate__fadeIn"/>
            <div class="bankDetail animate__animated animate__fadeIn">
                <div class="detailItem d-flex align-items-center">
                    <span class="key">A/c Holder</span>
                    <span class="value flex-grow-1">: Anil Wires & Cables</span>
                </div>
                 <div class="detailItem d-flex align-items-center">
                    <span class="key">A/c Number</span>
                    <span class="value flex-grow-1">: 0353104000163361</span>
                </div>
                 <div class="detailItem d-flex align-items-center">
                    <span class="key">Branch</span>
                    <span class="value flex-grow-1">: Hisar, Haryana</span>
                </div>
                 <div class="detailItem d-flex align-items-center">
                    <span class="key">IFSC</span>
                    <span class="value flex-grow-1">: IBKL0000353</span>
                </div>
            </div>

            <div class="balanceBlock animate__animated animate__fadeIn">
                <button class="actionLabel animate__animated animate__fadeIn">Edit</button>
                <button class="actionLabel discard animate__animated animate__fadeIn none">Discard</button>
                <label class="form-label">Closing Balance</label>

                <div class="balanceAmount animate__animated animate__fadeIn">
                    <span class="updatedAmount">43543423.00</span>
                </div>

                <div class="balanceUpdate animate__animated animate__fadeIn none">
                    <div class="form-group flex-grow-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="inputIcon" height="1em" viewBox="0 0 320 512"><path d="M0 64C0 46.3 14.3 32 32 32H96h16H288c17.7 0 32 14.3 32 32s-14.3 32-32 32H231.8c9.6 14.4 16.7 30.6 20.7 48H288c17.7 0 32 14.3 32 32s-14.3 32-32 32H252.4c-13.2 58.3-61.9 103.2-122.2 110.9L274.6 422c14.4 10.3 17.7 30.3 7.4 44.6s-30.3 17.7-44.6 7.4L13.4 314C2.1 306-2.7 291.5 1.5 278.2S18.1 256 32 256h80c32.8 0 61-19.7 73.3-48H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H185.3C173 115.7 144.8 96 112 96H96 32C14.3 96 0 81.7 0 64z"/></svg>
                        <input type="text" class="form-control form-control-sm withIcon number" placeholder="Enter Amount"/>
                    </div>
                    <button class="btn btn-sm btn-primary updateBalance">Update</button>
                </div>
            </div>
        </div>
        @endfor

    </div>
    
</div>

<script>

$(document).ready(function() {
 
    $('.updatedAmount').each(function() {
        $(this).text(formatIndianCurrency($(this).text()));
    });

    $('.actionLabel').click(function() {
        $(this).toggleClass('none');
        $(this).siblings('.actionLabel').toggleClass('none');
        $(this).siblings('.balanceUpdate').toggleClass('none');
        $(this).siblings('.balanceAmount').toggleClass('none');
    });

    $('.updateBalance').click(function() {
        $(this).html('...');
        $(this).attr('disabled', true);
        $(this).parent().siblings('.discard').attr('disabled', true);

        setTimeout(() => {
            $(this).html('Update');
            $(this).removeAttr('disabled');
            $(this).parent().siblings('.discard').removeAttr('disabled');
            $(this).parent().siblings('.discard').click();
        }, 1500);
        
    });
});


</script>

@endsection