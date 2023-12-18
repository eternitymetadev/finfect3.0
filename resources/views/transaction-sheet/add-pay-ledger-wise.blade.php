@extends('layout.main')
@section('title')Vendor Ledger Wise Dues @endsection
@section('page-heading')Vendor Ledger Wise Dues @endsection
@section('slug') > Vendor Ledger Wise Dues @endsection
@section('content')


<!-- for dataTable -->
@include('cdns.dataTable')


<!-- topbar -->
<div class="topbar sticky d-flex align-items-center justify-content-between animate__animated animate__fadeInDown">
    <div class="flex-grow-1 d-flex align-items-center justify-content-start">
        <div class="searchInputBlock form-group animate__animated animate__fadeIn">
            <svg xmlns="http://www.w3.org/2000/svg" class="inputIcon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#83838380" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
            <input type="search" class="keywordSearch form-control form-control-sm withIcon" placeholder="search..."/>
        </div>
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
            <div class="table-responsive">
                <table id="addPayLedger" class="table table-sm">
                    <thead>
                        <tr>
                            <th><input type="checkbox" class="selectAll" /></th>
                            <th>Vendor Code</th>
                            <th>Vendor Name</th>
                            <th class="forCurrency">Ledger Balance</th>
                            <th class="actionCol text-center">Status</th>
                        </tr>
                    </thead>

                    <tbody>
                    @for ($i = 0; $i < 15; $i++)
                        <tr>
                            <td><input type="checkbox" name="checked_invoices[]" class="selectRow" value="{{$i}}" /></td>
                            <td><p class="detail"> ADKRITI THE CREATION</p></td>
                            <td><p class="detail"> # FRC-CHD-00473</p></td>
                            <td class="text-right"><p class="detail"><span class="currency">{{3434 * $i}}</span></p></td>
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
            </div>

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
    const table = $('#addPayLedger').DataTable({
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
