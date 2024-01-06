@extends('layout.main')
@section('title')Invoice Dues @endsection
@section('page-heading')Invoice Dues @endsection
@section('slug') > Invoice Dues @endsection
@section('content')

<link href="{{asset('assets/css/pages/bank-page/bankPage.css')}}" rel="stylesheet" />
<link href="{{asset('assets/css/pages/common/common.css')}}" rel="stylesheet" />

<!-- for dataTable -->
@include('cdns.dataTable')


<!-- topbar -->
<div class="topbar sticky d-flex align-items-center justify-content-between animate__animated animate__fadeInDown">
    <div class="flex-grow-1 d-flex align-items-center justify-content-start">
        <div class="searchInputBlock form-group animate__animated animate__fadeIn">
            <svg xmlns="http://www.w3.org/2000/svg" class="inputIcon" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="#83838380" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-search">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
            <input type="search" class="keywordSearch form-control form-control-sm withIcon" placeholder="search..." />
        </div>
    </div>
    <div class="actionButtonsBlock flex-grow-1 d-flex align-items-center justify-content-end">
        <button class="btn btn-sm btn-primary animate__animated animate__fadeIn" data-bs-toggle="modal"
            data-bs-target="#invoiceDuesUploadDialog">
            Import
            <svg xmlns="http://www.w3.org/2000/svg" class="icon right" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-upload-cloud">
                <polyline points="16 16 12 12 8 16"></polyline>
                <line x1="12" y1="12" x2="12" y2="21"></line>
                <path d="M20.39 18.39A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.3"></path>
                <polyline points="16 16 12 12 8 16"></polyline>
            </svg>
        </button>

    </div>
</div>
<!-- topbar end -->


<div class="contentSection pt-3 mt-3">
    <div class="animate__animated animate__fadeIn">
        @if(count($vendorInvoiceDue) <= 0)
        <div class="noDataView">
            <img src="{{asset('assets/images/vendor.svg')}}" alt="" />
            <p>No records found,<br />please import new ledger balance sheet.</p>
            <a class="actionLink" data-bs-toggle="modal" data-bs-target="#invoiceDuesUploadDialog">Import</a>
        </div>
        @elseif(true)

        <div class="tableContainer">
            <div class="table-responsive">
                <table id="qwerty" class="table table-sm">
                    <thead>
                        <tr>
                            <th>Vendor A/c</th>
                            <th>Name</th>
                            <th>Group</th>
                            <th>Invoice No</th>
                            <th>Invoice Data</th>
                            <th class="forCurrency">Amount</th>
                            <th class="forCurrency">Due Amount</th>
                            <th>Ax Voucher</th>

                            <!-- <th class="actionCol text-center">Action</th> -->
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($vendorInvoiceDue as $vendorInvoice) <tr>
                            <td>{{$vendorInvoice->VendorDetail->erp_code}}</td>
                            <td>{{$vendorInvoice->VendorDetail->name}}</td>
                            <td>{{$vendorInvoice->VendorDetail->vendor_group}}</td>
                            <td>{{$vendorInvoice->invoice_no}}</td>
                            <td>{{$vendorInvoice->invoice_date}}</td>
                            <td class="text-right"><span class="currency">{{$vendorInvoice->amount}}</span></td>
                            <td class="text-right"><span class="currency">{{$vendorInvoice->payment_due_amount}}</span></td>
                            <td>{{$vendorInvoice->ax_voucher_no}}</td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        @endif
    </div>

</div>

<!-- Modal to upload my ledger sheet -->
<div class="modal fade" id="invoiceDuesUploadDialog" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
    aria-labelledby="invoiceDuesUploadDialogLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body" style="max-width: 600px">
                <div class="uploadFormDialog">
                    <img src="{{asset('assets/images/vendor.svg')}}" alt="" class="animate__animated animate__fadeIn" />
                    <p class="subject animate__animated animate__fadeInUp">Upload ledger sheet</p>
                    <div class="form-group" style="width: 100%">
                        <input type="file"
                            class="form-control form-control-sm file animate__animated animate__fadeIn" id="invoice_dues"/>
                        <label class="helperText right animate__animated animate__fadeIn">Last Updated: 29 Jan 2023
                            18:30:40</label>
                    </div>
                    <button class="btn btn-primary animate__animated animate__fadeInUp" id="myLedgerSubmitButton">
                        Submit
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon right" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </button>
                    <a class="link animate__animated animate__fadeInUp">Download Smaple</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end of Modal to upload my ledger sheet -->

<script>
$(document).ready(function() {

    // initializatoin of dataTable
    const table = $('#qwerty').DataTable({
        dom: '<"dt-row"<rtb>><"footer-row"lp><"clear">',
        "language": {
            "lengthMenu": "Rows _MENU_"
        },
        buttons: [
            'excel'
        ],
        columnDefs: [{
            'targets': [3, 4, 5],
            'orderable': false,

        }]
    });
    table.draw();


    // Add a click event listener to the button
    $('#exportInvoiceDues').on('click', function() {
        var data = table.buttons.exportData({
            format: {
                header: function(data, columnIdx) {
                    return columnIdx + ': ' + data;
                }
            }
        });
        console.log(data)
    });

    // custom serach input for datatable
    $('.keywordSearch').on('keyup', function() {
        // const searchKeyword = this.value.replace(/[^a-zA-Z0-9 ]/g, ''); // written to remove special characters
        table.search(this.value).draw();
    });


    $('#myLedgerSubmitButton').click(function() {

        $(this).html('...');
        $(this).attr('disabled', true);
        $('.uploadFormDialog').css("pointer-events", "none");
        const pfu = localStorage.getItem('pfuValue');
        let formData = new FormData();
        let fileInput = $('#invoice_dues')[0].files[0];
        formData.append('invoice_dues', fileInput);
        formData.append('pfu', pfu);
        let csrfToken = $('meta[name="csrf-token"]').attr('content');
        // Perform AJAX request
        $.ajax({
            url: '/upload-vendor-invoicedues',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function(response) {
                if (response.success) {
                    $.toast({
                        heading: 'Success',
                        text: 'Data imported successfully',
                        icon: 'success',
                        position: 'top-right',
                        loader: true,
                        loaderBg: '#ffffff'
                    })
                    setTimeout(function() {
                        location.reload();
                    }, 3000);

                } else {
                    $.toast({
                        heading: 'Error',
                        text: 'Something went wrong',
                        icon: 'error',
                        position: 'top-right',
                        loader: false,
                        loaderBg: '#ffffff',
                        hideAfter: false,
                        hideAfter: 7000
                    })
                    let newDate = '20 Nov 2023 13:30:00';
                    $('#myLedgerSubmitButton').html('Update');
                    $('#myLedgerSubmitButton').removeAttr('disabled');
                    $('.uploadFormDialog').css("pointer-events", "all");
                    $('.helperText').html(`Last Updated: ${newDate}`);
                }


            },
            error: function(xhr, status, error) {
                var errorMessage = 'An error occurred while processing your request.';
                console.log(xhr.responseJSON);
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }
                $.toast({
                    heading: 'Error',
                    text: errorMessage,
                    icon: 'error',
                    position: 'top-right',
                    loader: false,
                    loaderBg: '#ffffff',
                    hideAfter: false,
                    hideAfter: 7000
                })

                let newDate = '20 Nov 2023 13:30:00';
                $('#myLedgerSubmitButton').html('Submit');
                $('#myLedgerSubmitButton').removeAttr('disabled');
                $('.uploadFormDialog').css("pointer-events", "all");
                $('.helperText').html(`Last Updated: ${newDate}`);
                // Display an error message or perform other error handling tasks
            }
        });

        return false;
    });



});
</script>

@endsection