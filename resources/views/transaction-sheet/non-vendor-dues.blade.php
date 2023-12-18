@extends('layout.main')
@section('title')Non Vendor Dues @endsection
@section('page-heading')Non Vendor Dues @endsection
@section('slug') > Non Vendor Dues @endsection
@section('content')


<!-- for dataTable -->
@include('cdns.dataTable')

<link rel="stylesheet" href="{{asset('assets/css/pages/non-vendor-dues/non-vendor-dues.css')}}" />


<!-- topbar -->
<div class="topbar sticky d-flex align-items-center justify-content-between animate__animated animate__fadeInDown">
    <div class="flex-grow-1 d-flex align-items-center justify-content-start">

    </div>
</div>
<!-- topbar end -->


<div class="contentSection pt-3 mt-3">
    <div class="animate__animated animate__fadeIn">
        @if(false)
            <div class="noDataView">
                <img src="{{asset('assets/images/vendor.svg')}}" alt="" />
                <p>No records found,<br/>please import new ledger balance sheet.</p>
                <a class="actionLink" data-bs-toggle="modal" data-bs-target="#invoiceDuesUploadDialog">Import</a>
            </div>
        @elseif(true)

        <div class="tableContainer">
            <div class="d-flex">
                <div class="form-group-row flex-grow-1 d-flex align-items-center animate__animated animate__fadeIn">
                    <input type="checkbox" class="form-control-checkbox selectAll" id="selectAllRows" />
                    <label for="selectAllRows">Select All</label>
                </div>
                <div class="d-flex align-items-center justify-content-end animate__animated animate__fadeIn" style="gap: 1rem; flexWrap: wrap">
                    <div class="statusIndicator" style="--color: var(--successColor)"><span class="colorBox"></span><label class="text">Sent To Approval</label></div>
                    <div class="statusIndicator" style="--color: var(--warningColor)"><span class="colorBox"></span><label class="text">Pending</label></div>
                </div>
            </div>

            <div class="d-flex flex-column pt-4">
                @for ($i = 0; $i < 15; $i++)
                    <div class="rowItem">
                        <div class="checkBox">
                            <input type="checkbox" name="other_dues[]" class="selectRow" value="{{$i}}" />
                        </div>
                        <div class="items">
                            <div class="item">
                                <span class="heading">Vendor info</span>
                                <span class="md line-clamp clamp-1 bold">R K Eneterprises and Industries Private Limited </span>
                                <span class="sm line-clamp clamp-1">Code: <span class="bold">05177</span></span>
                                <span class="md line-clamp clamp-1">AX/IAG: <span class="bold">FAGMA-02438</span></span>
                                <span class="sm line-clamp clamp-1">UNID: <span class="bold">10467</span></span>
                                <span class="lg line-clamp clamp-1">AX Voucher: <span class="bold">FPTERFMA23-04589</span></span>
                            </div>
                            <div class="item">
                                <span class="heading">Bank info</span>
                                <span class="lg line-clamp clamp-1 bold">Punjab National Bank, Bohapur</span>
                                <span class="lg line-clamp clamp-1">A/C No: <span class="bold">1263001500371061</span></span>
                                <span class="lg line-clamp clamp-1">IFSC: <span class="bold">PUNB012630</span></span>
                            </div>
                            <div class="item">
                                <span class="heading">Payment info</span>
                                <span class="lg line-clamp clamp-1">Req Type: <span class="bold">TER</span></span>
                                <span class="lg line-clamp clamp-1">Type: <span class="bold">Regular Payment</span></span>
                                <span class="lg line-clamp clamp-1">Date: <span class="bold">25-11-2023 06:00 PM</span></span>
                            </div>
                            <div class="item">
                                <span class="heading">Balance</span>
                                <span class="amountBox">
                                    <span class="head">Closing</span>
                                    <span class="amount">0.00</span>
                                </span>
                                <span class="amountBox">
                                    <span class="head">Due</span>
                                    <span class="amount">20,368.00</span>
                                </span>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>









            <!-- <div class="table-responsive">
                <table id="vendorInvoiceDues" class="table table-sm">
                    <thead>
                        <tr>
                            <th><input type="checkbox" class="selectAll" /></th>
                            <th>Vendor Info</th>
                            <th>Payment Info</th>
                            <th>Bank Info</th>
                            <th class="forCurrency">Closing Balance</th>
                            <th class="forCurrency">Due Amount</th>
                            <th class="actionCol text-center">Status</th>
                        </tr>
                    </thead>

                    <tbody>
                    @for ($i = 0; $i < 15; $i++)
                        <tr>
                            <td><input type="checkbox" name="checked_invoices[]" class="selectRow" value="{{$i}}" /></td>
                            <td>
                                <p class="detail">
                                    06013 <span class="bold">Ravishanker Kumar</span> <br>
                                    Code: <span class="bold">Ravishanker Kumar</span> <br>
                                    UNID: <span class="bold">Ravishanker Kumar</span> <br>
                                    AX/AIG: <span class="bold">Ravishanker Kumar</span> <br>
                                    AX Voucher: <span class="bold">Ravishanker Kumar</span>
                                </p>
                            </td>
                            <td>
                               <p class="detail">
                                    <span class="bold"># FRC-CHD-00473</span> <br>
                                    <span class="date">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                        12 Nov 2023
                                    </span>
                                </p>
                            </td>
                            <td class="text-left">
                               <p class="detail">
                                    Amount: <span class="currency">{{3434 * $i}}</span>
                                    <span class="date">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                        12 Nov 2023
                                    </span>
                                </p>
                            </td>
                            <td class="text-left">
                               <p class="detail">
                                    <span class="bold"># FRC-CHD-00473</span> <br>
                                    <span class="date">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                        12 Nov 2023
                                    </span>
                                </p>
                            </td>
                            <td class="text-right"><span class="currency">{{3434 * $i}}</span></td>
                            <td class="actionCol text-center">
                            @php
                                $statusOptions = [
                                    1 => ['warning', 'Waiting'],
                                    2 => ['info', 'Processing'],
                                ];

                                $statusKey = isset($statusOptions[$i]) ? $i : 0;
                                list($status, $statusText) = $statusOptions[$statusKey] ?? ['warning', 'Waiting'];
                            @endphp
                                <span class="chip mx-auto {{$status}}">
                                    {{$statusText}}
                                </span>
                            </td>
                        </tr>
                    @endfor
                    </tbody>
                </table>
            </div> -->

            <div class="selectedRowsActionBar animate__animated animate__fadeInUp" style="display: none">
                <div class="flex-grow-1 d-flex flex-column">
                    <span class="subTitle">Bank Balance: ₹4,20,000</span>
                    <span class="title">Total Payable Amount: ₹20,000</span>
                </div>

                <button type="submit" class="submitSelected btn btn-sm btn-primary animate__animated animate__fadeInUp" disabled="disabled" id="createTransaction">
                    <span>Create Transaction</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon right" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                </button>
            </div>
        </div>

        @endif
    </div>

</div>

<script>

$(document).ready(function() {

    // initializatoin of dataTable
    const table = $('#vendorInvoiceDues').DataTable({
        dom: '<"dt-row"<rtb>><"footer-row"lp><"clear">',
        "language": {
            "lengthMenu": "Rows _MENU_"
        },
        buttons: [
            'excel'
        ],
        columnDefs:[{
            'targets': [0,1,6],
            'orderable': false,

        }]
    });
    table.draw();


    // custom serach input for datatable
    $('.keywordSearch').on( 'keyup', function () {
        // const searchKeyword = this.value.replace(/[^a-zA-Z0-9 ]/g, ''); // written to remove special characters
        table.search(this.value).draw();
    });


    // create Transaction
    $('#createTransaction').on('click', function(e){
        e.preventDefault();
        $('#createTransaction span').html('Processing...');
        $('#createTransaction').attr('disabled', true);
        $('input[type="checkbox"]').css("pointer-events", "none");
        $('#loading').addClass('working');

        setTimeout(() => {
            $('#createTransaction span').html('Create Transaction');
            $('#createTransaction').removeAttr('disabled');
            $('input[type="checkbox"]').css("pointer-events", "all");
            $('#loading').removeClass('working');
            $('input[type="checkbox"]').prop("checked", false);
            $(".selectedRowsActionBar").hide();
        }, 1500);
    })

});


</script>

@endsection
