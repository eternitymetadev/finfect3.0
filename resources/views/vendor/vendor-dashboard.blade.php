@extends('layout.main')
@section('title')Vendor Dashboard @endsection
@section('page-heading')Vendor Dashboard @endsection
@section('slug') > Vendor Dashboard @endsection
@section('content')



<link href="{{asset('assets/css/pages/common/common.css')}}" rel="stylesheet" />

<!-- for dataTable -->
@include('cdns.dataTable')

<!-- for selectize -->
@include('cdns.selectize')





<!-- topbar -->
<div class="topbar sticky d-flex align-items-center justify-content-between animate__animated animate__fadeInDown">
    <div class="flex-grow-1 d-flex align-items-center justify-content-start">
        <div class="searchInputBlock form-group animate__animated animate__fadeIn">
            <svg xmlns="http://www.w3.org/2000/svg" class="inputIcon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#83838380" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
            <input type="search" class="keywordSearch form-control form-control-sm withIcon" placeholder="search..."/>
        </div>
    </div>
    <div class="actionButtonsBlock flex-grow-1 d-flex align-items-center justify-content-end">
        <button class="btn btn-sm btn-primary animate__animated animate__fadeIn" data-bs-toggle="modal" data-bs-target="#vendorsUploadDialog">
            Import
            <svg xmlns="http://www.w3.org/2000/svg" class="icon right" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload-cloud"><polyline points="16 16 12 12 8 16"></polyline><line x1="12" y1="12" x2="12" y2="21"></line><path d="M20.39 18.39A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.3"></path><polyline points="16 16 12 12 8 16"></polyline></svg>
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
                <a class="actionLink" data-bs-toggle="modal" data-bs-target="#vendorsUploadDialog">Import</a>
            </div>
        @elseif(true)

        <div class="tableContainer">
            <div class="table-responsive">
                <table id="qwerty" class="table table-sm">
                    <thead>
                        <tr>
                            <th>Sr. No</th>
                            <th>Name</th>
                            <th>Vendor Code</th>
                            <th>Finfect Code</th>
                            <th>Contact Info</th>
                            <th class="text-center">Status</th>
                            <th class="actionCol text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                    @for ($i = 0; $i < 15; $i++)
                        <tr>
                            <td>{{$i + 1}}</td>
                            <td>Some text</td>
                            <td>reewrewr</td>
                            <td>reewrewr</td>
                            <td>reewrewr</td>
                            <td class="text-center">
                                @php
                                    switch($i == 0) {
                                        case 1:
                                            $status = 'success';
                                            $statusText = 'Active';
                                            break;
                                        case 2:
                                           $status = 'warning';
                                            $statusText = 'Pending';
                                            break;
                                        case 3:
                                           $status = 'error';
                                            $statusText = 'Inactive';
                                            break;
                                        default:
                                            $status = 'success';
                                            $statusText = 'Active';

                                    }
                                @endphp

                                <span class="chip mx-auto {{$status}}">
                                    {{$statusText}}
                                </span>
                            </td>
                            <td class="actionCol text-center">
                                <div class="iconButtonsContainer d-flex align-items-center justify-content-center" style="gap: 0.5rem">
                                    <a class="iconButton" data-bs-toggle="modal" data-bs-target="#addUserDialog">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endfor
                    </tbody>
                </table>
            </div>
        </div>

        @endif
    </div>

</div>

<!-- Modal to upload vendors -->
<div class="modal fade" id="vendorsUploadDialog" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="vendorsUploadDialogLabel" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="modal-body" style="max-width: 600px">
            <div class="uploadFormDialog">
                <img src="{{asset('assets/images/vendor.svg')}}" alt="" class="animate__animated animate__fadeIn" />
                <p class="subject animate__animated animate__fadeInUp">Upload Vendors</p>
                <div class="form-group" style="width: 100%">
                    <input type="file" class="form-control form-control-sm file animate__animated animate__fadeIn" />
                </div>
                <button class="btn btn-primary animate__animated animate__fadeInUp" id="myLedgerSubmitButton">
                    Upload
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon right" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                </button>
                <a class="link animate__animated animate__fadeInUp">Download Smaple</a>
            </div>
        </div>
    </div>
  </div>
</div>
<!-- end of Modal to upload vendors -->

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
        columnDefs:[{
            'targets': [3,4,5],
            'orderable': false,

        }]
    });
    table.draw();


    // Add a click event listener to the button
    $('#exportMyLedger').on('click', function() {
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


    // import button functioning
    $('#myLedgerSubmitButton').click(function() {
        $(this).html('...');
        $(this).attr('disabled', true);
        $('.uploadFormDialog').css("pointer-events", "none");
        setTimeout(() => {
            let newDate = '20 Nov 2023 13:30:00';
            $(this).html('Update');
            $(this).removeAttr('disabled');
            $('.uploadFormDialog').css("pointer-events", "all");
            $('.helperText').html(`Last Updated: ${newDate}`);
        }, 3500);
    });



});


</script>

@endsection
