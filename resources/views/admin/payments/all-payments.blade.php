@extends('layout.main')
@section('title')All Payments @endsection
@section('page-heading')All Payments @endsection
@section('slug') > All Payments @endsection
@section('content')

<link href="{{asset('assets/css/pages/bank-page/bankPage.css')}}" rel="stylesheet" />
<link href="{{asset('assets/css/pages/common/common.css')}}" rel="stylesheet" />

<!-- for dataTable -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet" />

<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>


<!-- topbar -->
<div class="topbar sticky d-flex align-items-center justify-content-between animate__animated animate__fadeInDown">
    <div class="flex-grow-1 d-flex align-items-center justify-content-start">
        <div class="searchInputBlock form-group animate__animated animate__fadeIn">
            <svg xmlns="http://www.w3.org/2000/svg" class="inputIcon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#83838380" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
            <input type="search" class="keywordSearch form-control form-control-sm withIcon" placeholder="search..."/>
        </div>
    </div>
    <div class="actionButtonsBlock flex-grow-1 d-flex align-items-center justify-content-end">
         <button id="exportAllPayments" class="btn btn-sm btn-primary animate__animated animate__fadeIn">
            Export
            <svg xmlns="http://www.w3.org/2000/svg" class="icon right" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download-cloud"><polyline points="8 17 12 21 16 17"></polyline><line x1="12" y1="12" x2="12" y2="21"></line><path d="M20.88 18.09A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.29"></path></svg>
        </button>

    </div>
</div>
<!-- topbar end -->


<div class="contentSection pt-3 mt-3">
    <div class="animate__animated animate__fadeIn">
        @if(false)
            <div class="noDataView">
                <img src="{{asset('assets/images/vendor.svg')}}" alt="" />
                <p>No records found,<br/>please import new ledger balance sheet.</p>
                <a class="actionLink" data-bs-toggle="modal" data-bs-target="#myLedgerSheetUploadDialog">Import</a>
            </div>
        @elseif(true)
        
        <div class="tableContainer">
            <div class="table-responsive">
                <table id="paymentTable" class="table table-sm">
                    <thead>
                        <tr>
                            <th>Sr</th>
                            <th>Transaction No</th>
                            <th>Txn Date</th>
                            <th>User</th>
                            <th>PFU</th>
                            <th>Mode</th>
                            <th class="forCurrency">Amount</th>
                            <th class="text-center">Status</th>
                            <th>Create By</th>
                            <th>Approved By</th>
                            <th>Updated At</th>
                        </tr>
                    </thead>

                    <tbody>
                    @for ($i = 0; $i < 15; $i++)
                        <tr>
                            <td>{{$i + 1}}</td>
                            <td>12345678QWERTYU</td>
                            <td>12-12-2023</td>
                            <td>Vineet Thakur</td>
                            <td>SD 1</td>
                            <td>Invoice</td>
                            <td class="text-right"><span class="currency">{{3434 * $i}}</span></td>
                               <td class="text-center">
                                @php
                                    switch($i) {
                                        case 1:
                                            $status = 'success';
                                            $statusText = 'Paid';
                                            break;
                                        case 2:
                                           $status = 'warning';
                                            $statusText = 'Partial';
                                            break;
                                        case 3:
                                           $status = 'error';
                                            $statusText = 'Unpaid';
                                            break;
                                        default:
                                            $status = 'info';
                                            $statusText = 'payment';

                                    }
                                @endphp

                                <span class="chip mx-auto {{$status}}">
                                    {{$statusText}}
                                </span>
                            </td>
                            <td>Vikas Thakur</td>
                            <td>Sahil Thakur</td>
                            <td>13-12-2023</td>
                        </tr>
                    @endfor
                    </tbody>
                </table>     
            </div>
        </div>

        @endif
    </div>
    
</div>


<script>

$(document).ready(function() {

    // initializatoin of dataTable
    const table = $('#paymentTable').DataTable({
        dom: '<"dt-row"<rtb>><"footer-row"lp><"clear">',
        "language": {
            "lengthMenu": "Rows _MENU_"
        },
        buttons: [
            'excel'
        ],
        columnDefs:[{
            'targets': [0],
            'orderable': false,

        }]
    });
    table.draw();

    
    // Add a click event listener to the button
    $('#exportAllPayments').on('click', function() {
        var data = table.buttons.exportData({
            format: {
                header: function ( data, columnIdx ) {
                    return columnIdx + ': ' + data;
                }
            }
        });
        console.log(data)
    });

    // custom serach input for datatable
    $('.keywordSearch').on( 'keyup', function () {
        // const searchKeyword = this.value.replace(/[^a-zA-Z0-9 ]/g, ''); // written to remove special characters
        table.search(this.value).draw();
    });



});


</script>

@endsection