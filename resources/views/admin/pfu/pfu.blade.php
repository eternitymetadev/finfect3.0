@extends('layout.main')
@section('title')PFU List @endsection
@section('page-heading')PFU List @endsection
@section('slug') > PFU List @endsection
@section('content')

<link href="{{asset('assets/css/pages/pfu-page/pfu-page.css')}}" rel="stylesheet" />
<link href="{{asset('assets/css/pages/common/common.css')}}" rel="stylesheet" />

<!-- for dataTable -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet" />

<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>


<!-- custom style -->

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
        @canany(['save-pfu'])
        <button class="btn btn-sm btn-primary animate__animated animate__fadeIn" data-bs-toggle="modal"
            data-bs-target="#addPfuDialog">
            Add
            <svg xmlns="http://www.w3.org/2000/svg" class="icon right" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-plus">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
        </button>
        @endcanany

        <button id="exportMyLedger" class="btn btn-sm btn-primary animate__animated animate__fadeIn">
            Export
            <svg xmlns="http://www.w3.org/2000/svg" class="icon right" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-download-cloud">
                <polyline points="8 17 12 21 16 17"></polyline>
                <line x1="12" y1="12" x2="12" y2="21"></line>
                <path d="M20.88 18.09A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.29"></path>
            </svg>
        </button>

    </div>
</div>
<!-- topbar end -->


<div class="contentSection pt-3 mt-3">
    <div class="animate__animated animate__fadeIn">
        @if(false)
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
                            <th>Sr No.</th>
                            <th>PFU</th>
                            <th>Domain</th>
                            <th>Client Code</th>
                            <th class="text-center">Status</th>
                            <th class="actionCol text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($pfuLists as $pfu)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$pfu->pfu}}</td>
                            <td>{{$pfu->domain}}</td>
                            <td>{{$pfu->client_code}}</td>
                            <td class="text-center">
                                @php
                                switch($pfu->status) {
                                case 0:
                                $status = 'error';
                                $statusText = 'Inactive';
                                break;
                                case 1:
                                $status = 'success';
                                $statusText = 'Active';
                                break;
                                case 2:
                                $status = 'warning';
                                $statusText = 'Pending';
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
                                <div class="iconButtonsContainer d-flex align-items-center justify-content-center"
                                    style="gap: 0.5rem">
                                    <a class="iconButton edit_pfu" data-id="{{$pfu->id}}" data-pfu="{{$pfu->pfu}}"
                                        data-domain="{{$pfu->domain}}" data-client-code="{{$pfu->client_code}}" data-status="{{$pfu->status}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-edit-2">
                                            <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @php
                        $i++;
                        @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        @endif
    </div>

</div>



<!-- Modal to add pfu -->
<div class="modal fade" id="addPfuDialog" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
    aria-labelledby="addPfuDialogLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <form id="addPfuForm" class="modal-content">
            @csrf
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Add Pfu</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pfuModal" style="max-width: 700px">
                <div class="d-flex align-items-center flex-wrap">
                    <div class="d-flex justify-content-center align-items-center innerSection relative">
                        <div class="form-check form-switch" style="position: absolute; right: 1rem; top: 0.5rem">
                            <input class="form-check-input" name="is_active" type="checkbox" role="switch" checked
                                id="flexSwitchCheckDefault">
                        </div>
                        <img src="{{asset('assets/images/vendor.svg')}}" alt="" onclick="resetFrom()"
                            class="animate__animated animate__fadeIn" />
                    </div>
                    <div class="d-flex flex-wrap innerSection">
                        <div class="form-group">
                            <label for="mobileNumber" class="form-label">PFU Name</label>
                            <input name="pfuName" type="text" id="pfuName" class="form-control" placeholder="eg. SD-1"
                                oninput="this.value = this.value.toUpperCase()" required autofocus />
                            <svg xmlns="http://www.w3.org/2000/svg" class="inputIcon" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign">
                                <circle cx="12" cy="12" r="4"></circle>
                                <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path>
                            </svg>
                            <span class="error-message" style="color:red;" id="pfuName-error"></span>
                        </div>
                        <div class="form-group">
                            <label for="mobileNumber" class="form-label">Domain</label>
                            <input name="domain" type="text" class="form-control" placeholder="eg. frontiers.com"
                                required />
                            <svg xmlns="http://www.w3.org/2000/svg" class="inputIcon" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="2" y1="12" x2="22" y2="12"></line>
                                <path
                                    d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                                </path>
                            </svg>
                            <div class="invalid-feedback">Enter a valid domain name </div>
                        </div>
                        <div class="form-group">
                            <label for="mobileNumber" class="form-label">Client Code</label>
                            <input name="clientCode" type="text" class="form-control" placeholder="eg. FRC-CHD-00473" />
                            <svg xmlns="http://www.w3.org/2000/svg" class="inputIcon" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                <polyline points="14 2 14 8 20 8"></polyline>
                                <line x1="16" y1="13" x2="8" y2="13"></line>
                                <line x1="16" y1="17" x2="8" y2="17"></line>
                                <polyline points="10 9 9 9 8 9"></polyline>
                            </svg>
                            <div class="invalid-feedback">Enter a valid client code</div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary animate__animated animate__fadeInUp discard"
                    data-bs-dismiss="modal1">Discard & Close</button>
                <button type="submit" class="btn btn-sm btn-primary animate__animated animate__fadeInUp"
                    id="pfuSubmitButton">
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
<!-- end of Modal to add pfu -->

<!-- Modal to Update pfu -->
<div class="modal fade" id="editPfuDialog" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
    aria-labelledby="addPfuDialogLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <form id="updatePfuForm" method="post" class="modal-content">
            @csrf
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Update Pfu</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pfuModal" style="max-width: 700px">
                <input name="edit_pfu_id" type="hidden" id="edit_pfu_id" />
                <div class="d-flex align-items-center flex-wrap">
                    <div class="d-flex justify-content-center align-items-center innerSection relative">
                        <div class="form-check form-switch" style="position: absolute; right: 1rem; top: 0.5rem">
                            <input class="form-check-input pfu_status" name="is_active" type="checkbox" role="switch"
                                id="flexSwitchCheckDefault">
                        </div>
                        <img src="{{asset('assets/images/vendor.svg')}}" alt="" onclick="resetFrom()"
                            class="animate__animated animate__fadeIn" />
                    </div>
                    <div class="d-flex flex-wrap innerSection">
                        <div class="form-group">
                            <label for="mobileNumber" class="form-label">PFU Name</label>
                            <input name="pfuName" type="text" id="editPfuName" class="form-control"
                                placeholder="eg. SD-1" oninput="this.value = this.value.toUpperCase()" required
                                autofocus />
                            <svg xmlns="http://www.w3.org/2000/svg" class="inputIcon" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign">
                                <circle cx="12" cy="12" r="4"></circle>
                                <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path>
                            </svg>
                            <span class="error-message" style="color:red;" id="pfuName-editError"></span>
                        </div>
                        <div class="form-group">
                            <label for="mobileNumber" class="form-label">Domain</label>
                            <input name="domain" type="text" class="form-control" id="edit_domain"
                                placeholder="eg. frontiers.com" required />
                            <svg xmlns="http://www.w3.org/2000/svg" class="inputIcon" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="2" y1="12" x2="22" y2="12"></line>
                                <path
                                    d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                                </path>
                            </svg>
                            <div class="invalid-feedback">Enter a valid domain name </div>
                        </div>
                        <div class="form-group">
                            <label for="mobileNumber" class="form-label">Client Code</label>
                            <input name="clientCode" type="text" id="edit_client_code" class="form-control"
                                placeholder="eg. FRC-CHD-00473" />
                            <svg xmlns="http://www.w3.org/2000/svg" class="inputIcon" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                <polyline points="14 2 14 8 20 8"></polyline>
                                <line x1="16" y1="13" x2="8" y2="13"></line>
                                <line x1="16" y1="17" x2="8" y2="17"></line>
                                <polyline points="10 9 9 9 8 9"></polyline>
                            </svg>
                            <div class="invalid-feedback">Enter a valid client code</div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary animate__animated animate__fadeInUp discard"
                    data-bs-dismiss="modal1">Discard & Close</button>
                <button type="submit" class="btn btn-sm btn-primary animate__animated animate__fadeInUp"
                    id="pfuSubmitButton">
                    <span>Update</span>
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
<!-- end of Modal to add pfu -->


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
            'targets': [0, 5],
            'orderable': false,

        }]
    });
    table.draw();


    // custom serach input for datatable
    $('.keywordSearch').on('keyup', function() {
        // const searchKeyword = this.value.replace(/[^a-zA-Z0-9 ]/g, ''); // written to remove special characters
        table.search(this.value).draw();
    });


    $(".btn-close, .discard").on('click', function() {
        resetFrom()
    });


    function resetFrom() {
        $('#addPfuForm').trigger("reset");
    }


    // $('#addPfuForm').on('submit', function(e){
    //     e.preventDefault();
    //     console.log('formData');
    //     $('#pfuSubmitButton span').html('...');
    //     $('#pfuSubmitButton').attr('disabled', true);
    //     $('#pfuSubmitButton').siblings('.discard').attr('disabled', true);
    //     $('.btn-close').attr('disabled', true);

    //     setTimeout(() => {
    //         $('#pfuSubmitButton span').html('Submit');
    //         $('#pfuSubmitButton').removeAttr('disabled');
    //         $('#pfuSubmitButton').siblings('.discard').removeAttr('disabled');
    //         $('.btn-close').removeAttr('disabled');
    //         resetFrom()
    //     }, 1500);
    // })
    $('#addPfuForm').submit(function(event) {
        event.preventDefault();
        var formData = $(this).serialize();

        $.ajax({
            url: '/save-pfu',
            type: 'POST',
            data: formData,
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function() {
                $('#pfuSubmitButton span').html('...');
                $('#pfuSubmitButton').attr('disabled', true);
                $('#pfuSubmitButton').siblings('.discard').attr('disabled', true);
                $('.btn-close').attr('disabled', true);
            },
            success: function(response) {
                // Handle success response
                resetFrom();
                Swal.fire({
                        title: 'Success!',
                        text: 'Pfu added successful',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        location.reload();
                    });
            },
            error: function(xhr) {
                console.log(xhr.responseJSON)
                var errors = xhr.responseJSON.errors;

                $.each(errors, function(field, errorMessage) {
                    var errorElement = $('#' + field + '-error');
                    errorElement.text(errorMessage); // Show only the first error message
                    errorElement.show(); // Show error message
                });
            },
            complete: function() {
                $('#pfuSubmitButton span').html('Submit');
                $('#pfuSubmitButton').removeAttr('disabled');
                $('#pfuSubmitButton').siblings('.discard').removeAttr('disabled');
                $('.btn-close').removeAttr('disabled');
            }


        });
    });

    $('.edit_pfu').click(function() {

        var pfu_id = $(this).attr('data-id');
        $('#editPfuDialog').modal('show');
        var pfu = $(this).attr('data-pfu');
        var domain = $(this).attr('data-domain');
        var client_code = $(this).attr('data-client-code');
        var pfu_status = $(this).attr('data-status');

        $('#edit_pfu_id').val(pfu_id);
        $('#editPfuName').val(pfu);
        $('#edit_domain').val(domain);
        $('#edit_client_code').val(client_code);
        if (pfu_status == 1) {
            $('.pfu_status').prop('checked', true);
        }else{
            $('.pfu_status').prop('checked', false);
        }




    });

    $('#updatePfuForm').submit(function(event) {
        event.preventDefault();
        var formData = $(this).serialize();

        $.ajax({
            url: '/update-pfu',
            type: 'POST',
            data: formData,
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                // Handle success response
                Swal.fire({
                    title: 'Success!',
                    text: 'Pfu updated successful',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(() => {
                    location.reload();
                });
                // Perform any other actions on successful form submission
            },
            error: function(xhr) {

                // Handle validation errors
                console.log(xhr.responseJSON)
                var errors = xhr.responseJSON.errors;

                $.each(errors, function(field, errorMessage) {
                    var errorElement = $('#' + field + '-editError');
                    errorElement.text(
                        errorMessage); // Show only the first error message
                    errorElement.show(); // Show error message
                });
            }
        });
    });

});
</script>

@endsection