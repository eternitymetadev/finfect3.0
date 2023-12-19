@extends('layout.main')
@section('title')My Bank Balance @endsection
@section('page-heading')My Bank Balance @endsection
@section('slug') > My Bank Balance @endsection
@section('content')

<link href="{{asset('assets/css/pages/bank-page/bankPage.css')}}" rel="stylesheet" />


<div class="col-12 d-flex align-items-center justify-content-between animate__animated animate__fadeInDown">
    <div class="flex-grow-1 d-flex align-items-center justify-content-start">
        <div class="form-group col-md-6  animate__animated animate__fadeIn">
            <svg xmlns="http://www.w3.org/2000/svg" class="inputIcon" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="#83838380" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-search">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
            <input type="search" class="form-control form-control-sm withIcon" placeholder="search..." />
        </div>
    </div>
    <div class="flex-grow-1 d-flex align-items-center justify-content-end">
        <button class="btn btn-sm btn-primary animate__animated animate__fadeIn" data-bs-toggle="modal"
            data-bs-target="#addBankDialog">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon left" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-plus">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            Bank
        </button>
    </div>
</div>

<div class="contentSection pt-3 mt-3">

    <div class="bankPage animate__animated animate__fadeIn">

        @foreach ($bankdetails as $bankdetail) <div class="bankCard animate__animated animate__fadeIn">
            <img src="{{asset('assets/images/logo.svg')}}" alt="bank logo"
                class="bankLogo animate__animated animate__fadeIn" />
            <div class="bankDetail animate__animated animate__fadeIn">
                <div class="detailItem d-flex align-items-center">
                    <span class="key">A/c Holder</span>
                    <span class="value flex-grow-1">: {{$bankdetail->acc_holder_name}}</span>
                </div>
                <div class="detailItem d-flex align-items-center">
                    <span class="key">A/c Number</span>
                    <span class="value flex-grow-1">: {{$bankdetail->bank_acc_no}}</span>
                </div>
                <div class="detailItem d-flex align-items-center">
                    <span class="key">Branch</span>
                    <span class="value flex-grow-1">: {{$bankdetail->branch_name}}</span>
                </div>
                <div class="detailItem d-flex align-items-center">
                    <span class="key">IFSC</span>
                    <span class="value flex-grow-1">: {{$bankdetail->ifsc_code}}</span>
                </div>
            </div>

            <div class="balanceBlock animate__animated animate__fadeIn">
                @if(!empty($bankdetail->checkCurrentBalance->bank_balance))
                <button class="actionLabel animate__animated animate__fadeIn" disabled>Edit</button>
                @else
                <button class="actionLabel animate__animated animate__fadeIn">Edit</button>
                @endif
                <button class="actionLabel discard animate__animated animate__fadeIn none">Discard</button>
                <label class="form-label">Closing Balance</label>

                <div class="balanceAmount animate__animated animate__fadeIn">
                    <span class="updatedAmount">{{$bankdetail->checkCurrentBalance->bank_balance ?? '0'}}</span>
                </div>

                <div class="balanceUpdate animate__animated animate__fadeIn none">
                    <div class="form-group flex-grow-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="inputIcon" height="1em" viewBox="0 0 320 512">
                            <path
                                d="M0 64C0 46.3 14.3 32 32 32H96h16H288c17.7 0 32 14.3 32 32s-14.3 32-32 32H231.8c9.6 14.4 16.7 30.6 20.7 48H288c17.7 0 32 14.3 32 32s-14.3 32-32 32H252.4c-13.2 58.3-61.9 103.2-122.2 110.9L274.6 422c14.4 10.3 17.7 30.3 7.4 44.6s-30.3 17.7-44.6 7.4L13.4 314C2.1 306-2.7 291.5 1.5 278.2S18.1 256 32 256h80c32.8 0 61-19.7 73.3-48H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H185.3C173 115.7 144.8 96 112 96H96 32C14.3 96 0 81.7 0 64z" />
                        </svg>
                        <input type="text" class="form-control form-control-sm withIcon number amount"
                            placeholder="Enter Amount" />
                    </div>
                    <button class="btn btn-sm btn-primary updateBalance" value="{{$bankdetail->id}}">Update</button>
                </div>
            </div>
        </div>
        @endforeach

    </div>

</div>


<!-- Modal to add Bank -->
<div class="modal fade" id="addBankDialog" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
    aria-labelledby="addBankDialogLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <form id="addBankForm" class="modal-content" enctype="multipart/form-data">
            @csrf
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Add Bank</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bankModal" style="max-width: 650px">
                <div class="d-flex align-items-center justify-content-center flex-wrap">
                    <img id="bankLogoImage" src="{{asset('assets/images/add-bank.svg')}}" class="bankLogo"
                        style="max-width: 120px" alt="bank illustration" class="animate__animated animate__fadeIn" />
                    <div class="d-flex flex-wrap innerSection flex-grow-3">
                        <div class="form-group">
                            <label for="accountNumber" class="form-label">A/c Number</label>
                            <input name="accountNumber" type="number" id="accountNumber" class="form-control number"
                                placeholder="XXXXXXXXXX" required />
                            <span class="invalid-feedback" id="accountNumber-error">Required</span>
                        </div>
                        <div class="form-group">
                            <label for="holderName" class="form-label">A/c Holder Name</label>
                            <input name="holderName" type="text" id="holderName" class="form-control"
                                placeholder="Holder Name here" required />
                            <span class="invalid-feedback" id="holderName-error"></span>
                        </div>
                        <div class="form-group">
                            <label for="ifsc" class="form-label">IFSC Code</label>
                            <input name="ifsc" max-length="11" pattern="^[A-Z]{4}[0][0-9]{6}$" type="text" id="ifsc"
                                class="form-control" placeholder="XXXXXXXXXX" required />
                            <span class="invalid-feedback" id="ifsc-error"></span>
                        </div>
                        <div class="form-group">
                            <label for="branch" class="form-label">Branch Name</label>
                            <input name="branch" type="text" id="branch" class="form-control" placeholder="Branch Name"
                                required />
                            <span class="invalid-feedback" id="branch-error"></span>
                        </div>

                        <div class="form-group">
                            <label for="bankName" class="form-label">Bank Name</label>
                            <input name="bankName" type="text" id="bankName" class="form-control"
                                placeholder="Bank Name here" required autofocus />
                            <span class="invalid-feedback" id="bankName-error"></span>
                        </div>
                        <div class="form-group">
                            <label for="bankLogo" class="form-label">Bank Logo</label>
                            <input name="bankLogo" type="file" accept="image/*" id="bankLogo" class="form-control file"
                                required />
                            <span class="invalid-feedback" id="bankLogo-error"></span>
                        </div>
                    </div>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary animate__animated animate__fadeInUp discard"
                    data-bs-dismiss="modal">Discard & Close</button>
                <button type="submit" class="btn btn-sm btn-primary animate__animated animate__fadeInUp"
                    id="bankSubmitButton">
                    <span>Submit</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon right" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-chevron-right">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </button>
            </div>
        </form>
    </div>
</div>
<!-- end of Modal to add Bank -->


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

        var button = $(this);
        var bank_id = $(this).val();
        var amount = $('.amount').val();

        button.html('...');
        button.attr('disabled', true);
        button.parent().siblings('.discard').attr('disabled', true);

        $.ajax({
            url: '/update-balance',
            method: 'POST',
            data: {
                bank_id: bank_id,
                amount: amount

            },
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                // Handle successful response
                button.html('Update');
                button.removeAttr('disabled');
                button.parent().siblings('.discard').removeAttr('disabled');
                button.parent().siblings('.discard').click();
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error(error);
                // Revert button state on error
                button.html('Update');
                button.removeAttr('disabled');
                button.parent().siblings('.discard').removeAttr('disabled');
            }
        });

        return false; // Prevent default behavior of the button click
    });

    $('#bankLogo').change(function() {
        const file = this.files[0];
        console.log(file);
        if (file) {
            let reader = new FileReader();
            reader.onload = function(event) {
                $('#bankLogoImage').attr('src', event.target.result);
            }
            reader.readAsDataURL(file);
        }
    });

    $(".btn-close, .discard").on('click', function() {
        resetFrom()
    });


    function resetFrom() {
        $('#bankLogoImage').attr('src', "{{asset('assets/images/add-bank.svg')}}");
        $('#addBankForm').trigger("reset");
    }
    $('#addBankForm').submit(function(event) {
        event.preventDefault();
        var pfu = localStorage.getItem('pfuValue');;
        var formData = new FormData(this);
        formData.append('pfu', pfu);
        $.ajax({
            url: '/add-bank',
            type: 'POST',
            data: formData,
            dataType: 'json',
            processData: false, // Important: prevent jQuery from automatically processing the form data
            contentType: false, // Important: set content type to false for FormData
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function() {
                $('#bankSubmitButton span').html('...');
                $('#bankSubmitButton').attr('disabled', true);
                $('#bankSubmitButton').siblings('.discard').attr('disabled', true);
                $('.btn-close').attr('disabled', true);

            },
            success: function(response) {
                if (response.errors) {
                    var errorMessage = response.message;

                    var errorElement = $('#accountNumber-error');
                    errorElement.text(
                        errorMessage);
                    errorElement.show();
                } else {
                    // Handle success scenario
                    resetFrom();
                    Swal.fire({
                        title: 'Success!',
                        text: 'Bank added successfully',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        location.reload();
                    });
                }
            },
            error: function(xhr) {
                console.log(xhr.responseJSON)
                var errors = xhr.responseJSON.errors;

                $.each(errors, function(field, errorMessage) {
                    var errorElement = $('#' + field + '-error');
                    errorElement.text(
                        errorMessage); // Show only the first error message
                    errorElement.show(); // Show error message
                });
            },
            complete: function() {
                $('#bankSubmitButton span').html('Submit');
                $('#bankSubmitButton').removeAttr('disabled');
                $('#bankSubmitButton').siblings('.discard').removeAttr('disabled');
                $('.btn-close').removeAttr('disabled');
                // resetFrom()
            }


        });
    });


});
</script>

@endsection