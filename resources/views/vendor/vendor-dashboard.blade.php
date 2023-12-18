@extends('layout.main')
@section('title')Vendor Dashboard @endsection
@section('page-heading')Vendor Dashboard @endsection
@section('slug') > Vendor Dashboard @endsection
@section('content')



<link href="{{asset('assets/css/pages/common/common.css')}}" rel="stylesheet" />
<link href="{{asset('assets/css/pages/vendor/vendor-dashboard.css')}}" rel="stylesheet" />

<!-- for dataTable -->
@include('cdns.dataTable')

<!-- for selectize -->
@include('cdns.selectize')

<!-- top widgets -->
<div class="widgetsBlock">
    <div class="widget listing">
        <h3>Top 5 Categories</h3>

        @for ($i = 0; $i < 5; $i++)
        <div class="listItem">
            <div class="basic">
                <span>Information Technology</span>
                <span>Total vendors: 232</span>
            </div>
            <div class="spend">
                <span>YTD Spend</span>
                <span>₹ 9.20 Cr.</span>
            </div>
        </div>
        @endfor
    </div>
    <div class="widget listing">
        <h3>Last 5 Sensitive Payments</h3>

        @for ($i = 0; $i < 5; $i++)
        <div class="listItem">
            <div class="basic">
                <span>Shashi Enterprises</span>
                <span>Category: Information technology</span>
            </div>
            <div class="spend">
                <span>Value</span>
                <span>₹ 9.20 Cr.</span>
            </div>
        </div>
        @endfor
    </div>
    <div class="widget actions">
        <div class="action small">
            <span class="heading">Total</span>
            <div>
                <span>1996</span>
                <button class="btn btn-sm animate__animated animate__fadeIn">
                    Export
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon left" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 16 12 12 8 16"></polyline><line x1="12" y1="12" x2="12" y2="21"></line><path d="M20.39 18.39A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.3"></path><polyline points="16 16 12 12 8 16"></polyline></svg>
                </button>
            </div>
        </div>
        <div class="action small">
            <span class="heading">Active</span>
            <div>
                <span>1996</span>
                <button class="btn btn-sm animate__animated animate__fadeIn">
                    Export
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon left" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 16 12 12 8 16"></polyline><line x1="12" y1="12" x2="12" y2="21"></line><path d="M20.39 18.39A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.3"></path><polyline points="16 16 12 12 8 16"></polyline></svg>
                </button>
            </div>
        </div>

        <div class="action large">
            <span class="heading">New Vendor</span>
            <div>
                <a class="btn btn-primary animate__animated animate__fadeIn" href="{{url('/vendors/create')}}">
                    <img src="{{asset('assets/images/create.svg')}}" alt="create vendor" />
                    Create
                </a>
                <button class="btn btn-primary animate__animated animate__fadeIn">
                    <img src="{{asset('assets/images/invite.svg')}}" alt="invite vendor" />
                    Invite
                </button>
            </div>
        </div>
    </div>
</div>
<!-- top widgets end -->


<h2 class="blockTitle">Vendor List</h2>

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

            <!-- topbar -->
            <div class="topbar d-flex align-items-center justify-content-between animate__animated animate__fadeInDown mb-4">
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
                            <td>Name goes Here</td>
                            <td>Q09822</td>
                            <td>FIN12340</td>
                            <td>+91-8529698369</td>
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
                                    <a class="iconButton" data-bs-toggle="modal" data-bs-target="#viewvendorDialog">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
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



<!-- Modal to view vendor -->
<div class="modal fade" id="viewvendorDialog" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="viewvendorDialogLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="modal-body" style="max-width: min(90vw, 900px)">
            <div class="details">
                <div class="top">
                    <div class="identity d-flex align-items-center justify-content-between">
                        <div class="flex-grow-1 d-flex align-items-center justify-content-start">
                            <img src="{{asset('assets/images/vendor.svg')}}" alt="avatar" />
                            <div class="">
                                <p class="vendorName">
                                    Bobby Golden Transport Pvt. Lt
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
                                        <path d="M8.04959 0.146868C7.37105 -0.0725965 6.63653 -0.0431649 5.97772 0.229886C5.31892 0.502936 4.77893 1.00175 4.45459 1.63687L3.64859 3.21287C3.55281 3.4005 3.40022 3.55309 3.21259 3.64887L1.63559 4.45487C1.00047 4.77921 0.501659 5.3192 0.228608 5.978C-0.0444425 6.6368 -0.0738744 7.37133 0.14559 8.04987L0.69159 9.73487C0.756409 9.93509 0.756409 10.1507 0.69159 10.3509L0.146591 12.0359C-0.0728742 12.7144 -0.0434426 13.4489 0.229608 14.1077C0.502659 14.7665 1.00147 15.3065 1.63659 15.6309L3.21259 16.4369C3.40022 16.5326 3.55281 16.6852 3.64859 16.8729L4.45459 18.4499C4.77893 19.085 5.31892 19.5838 5.97772 19.8568C6.63653 20.1299 7.37105 20.1593 8.04959 19.9399L9.73459 19.3939C9.93481 19.3291 10.1504 19.3291 10.3506 19.3939L12.0356 19.9389C12.714 20.1584 13.4485 20.1291 14.1072 19.8563C14.766 19.5834 15.3061 19.0848 15.6306 18.4499L16.4366 16.8729C16.5324 16.6852 16.685 16.5326 16.8726 16.4369L18.4496 15.6319C19.0849 15.3075 19.5839 14.7673 19.857 14.1083C20.13 13.4493 20.1593 12.7145 19.9396 12.0359L19.3936 10.3509C19.3288 10.1507 19.3288 9.93509 19.3936 9.73487L19.9386 8.04987C20.1581 7.37145 20.1288 6.63701 19.856 5.97822C19.5831 5.31943 19.0845 4.77937 18.4496 4.45487L16.8726 3.64887C16.685 3.55309 16.5324 3.4005 16.4366 3.21287L15.6316 1.63587C15.3072 1.00053 14.7671 0.501561 14.108 0.228495C13.449 -0.0445707 12.7143 -0.0738649 12.0356 0.145868L10.3506 0.691868C10.1504 0.756686 9.93481 0.756686 9.73459 0.691868L8.04959 0.146868ZM4.80259 9.79987L6.21659 8.38587L9.04459 11.2149L14.7016 5.55787L16.1166 6.97187L9.04459 14.0419L4.80259 9.79987Z"
                                        fill="@if(true) #17c964 @else #f31260 @endif"/>
                                        <!-- change condtion here for active and inactive vendors -->
                                    </svg>
                                </p>
                                <p class="vendorCode">N27VEN-OTH-0460</p>
                            </div>
                        </div>
                        <div class="status">
                            @if(false)
                            <span class="chip success">Active</span>
                            @else
                            <a class="chip primary" href="#">Request Modification ►</a>
                            @endif
                        </div>
                    </div>

                    <div class="detailBlock">
                        <p class="blockHeading">Contact information</p>
                        <hr />
                        <div class="detailDesBlock">
                            <div class="detailDes">
                                <span>Email ID</span>
                                :
                                <span>santisaini169@gmail.com</span>
                            </div>

                              <div class="detailDes">
                                <span>Phone No.</span>
                                :
                                <span>+91 9991162810</span>
                            </div>
                        </div>
                    </div>

                    <div class="detailBlock">
                        <p class="blockHeading">KYC information</p>
                        <hr />
                        <div class="detailDesBlock">
                            <div class="detailDes">
                                <span>PAN No.</span>
                                :
                                <span>ECKPK5705G</span>
                            </div>
                            <div class="detailDes">
                                <span>GSTIN</span>
                                :
                                <span>06ECKPK5705G1ZL</span>
                            </div>
                            <div class="detailDes">
                                <span>MSME No.</span>
                                :
                                <span>432KPK5705G323</span>
                            </div>
                        </div>
                    </div>

                    <div class="detailBlock">
                        <p class="blockHeading">Other information</p>
                        <hr />
                        <div class="detailDesBlock">
                            <div class="detailDes">
                                <span>Owner Name</span>
                                :
                                <span>Santi Saini</span>
                            </div>
                            <div class="detailDes">
                                <span>Address</span>
                                :
                                <span>Bestech Business Tower, Sector 66, Mohali, Punjab 160062</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <p class="blockHeading">Bank Information</p>
                    <hr class="m-0" />
                    <div class="bankCard animate__animated animate__fadeIn">
                        <img src="http://localhost:8000/assets/images/logo.svg" alt="bank logo" class="bankLogo animate__animated animate__fadeIn">
                        <div class="bankDetail animate__animated animate__fadeIn">
                            <div class="detailItem d-flex align-items-center">
                                <span class="key">A/c Holder</span>
                                <span class="value flex-grow-1">: Anil Wires &amp; Cables</span>
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
                    </div>
                </div>

                <div>
                    <p class="blockHeading">documents</p>
                    <hr class="m-0" />
                    <div class="docBlock animate__animated animate__fadeIn">
                        <a class="imageContainer" href="{{asset('assets/images/vendor.svg')}}" target="_blank">
                            <span class="animate__animated animate__fadeIn">File Name</span>
                            <img src="{{asset('assets/images/vendor.svg')}}" alt="doc"  />
                        </a>
                        <a class="imageContainer" href="{{asset('assets/images/vendor.svg')}}" target="_blank">
                            <span class="animate__animated animate__fadeIn">File Name</span>
                            <img src="{{asset('assets/images/vendor.svg')}}" alt="doc"  />
                        </a>
                        <a class="imageContainer" href="{{asset('assets/images/vendor.svg')}}" target="_blank">
                            <span class="animate__animated animate__fadeIn">File Name</span>
                            <img src="{{asset('assets/images/vendor.svg')}}" alt="doc"  />
                        </a>
                        <a class="imageContainer" href="{{asset('assets/images/vendor.svg')}}" target="_blank">
                            <span class="animate__animated animate__fadeIn">File Name</span>
                            <img src="{{asset('assets/images/vendor.svg')}}" alt="doc"  />
                        </a>
                        <a class="imageContainer" href="{{asset('assets/images/vendor.svg')}}" target="_blank">
                            <span class="animate__animated animate__fadeIn">File Name</span>
                            <img src="{{asset('assets/images/vendor.svg')}}" alt="doc"  />
                        </a>
                    </div>
                </div>

                <div>
                    <p class="blockHeading">States Available</p>
                    <hr class="m-0" />
                    <div class="statesBlock animate__animated animate__fadeIn">
                        <span class="chip">HP</span>
                        <span class="chip">UP</span>
                        <span class="chip">JK</span>
                        <span class="chip">HR</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-footer justify-content-center">
           @if(false)
            <button class="btn btn-sm actionButton reject animate__animated animate__fadeIn">
                Reject
                <svg xmlns="http://www.w3.org/2000/svg" class="icon right" width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.54321 0C12.9585 0 16.5432 3.58467 16.5432 8C16.5432 12.4153 12.9585 16 8.54321 16C4.12788 16 0.543213 12.4153 0.543213 8C0.543213 3.58467 4.12788 0 8.54321 0ZM3.33788 3.82167C2.41821 4.966 1.86755 6.419 1.86755 8C1.86755 11.6843 4.85888 14.6757 8.54321 14.6757C10.1242 14.6757 11.5772 14.125 12.7212 13.2053L3.33788 3.82167ZM13.6872 12.2533C14.6439 11.098 15.2192 9.61567 15.2192 8C15.2192 4.31533 12.2279 1.324 8.54321 1.324C6.92755 1.324 5.44521 1.89933 4.28988 2.856L13.6872 12.2533Z" fill="#FFF1F5"/>
                </svg>
            </button>

            <button class="btn btn-sm actionButton accept animate__animated animate__fadeIn">
                Approve
                <svg xmlns="http://www.w3.org/2000/svg" class="icon right" width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8 16C6.41775 16 4.87101 15.5308 3.55542 14.6518C2.23982 13.7727 1.21446 12.5233 0.608964 11.0615C0.00346254 9.59967 -0.154959 7.99113 0.153723 6.43928C0.462405 4.88743 1.22432 3.46197 2.34314 2.34315C3.46196 1.22433 4.88744 0.462403 6.43929 0.153721C7.99114 -0.15496 9.59967 0.00346629 11.0615 0.608968C12.5233 1.21447 13.7727 2.23985 14.6518 3.55545C15.5308 4.87104 16 6.41776 16 8.00001C16 10.1217 15.1572 12.1566 13.6569 13.6569C12.1566 15.1572 10.1217 16 8 16ZM8 1.33334C6.68146 1.33334 5.39251 1.72433 4.29618 2.45687C3.19985 3.18942 2.3454 4.23061 1.84082 5.44878C1.33623 6.66696 1.20419 8.0074 1.46142 9.30061C1.71866 10.5938 2.35362 11.7817 3.28597 12.7141C4.21832 13.6464 5.40617 14.2813 6.69938 14.5386C7.99259 14.7958 9.33305 14.6638 10.5512 14.1592C11.7694 13.6546 12.8106 12.8001 13.5431 11.7038C14.2757 10.6075 14.6667 9.31855 14.6667 8.00001C14.6667 6.2319 13.9643 4.5362 12.714 3.28596C11.4638 2.03572 9.76811 1.33334 8 1.33334ZM7.94665 10.8887C7.92298 10.9875 7.8722 11.0778 7.80001 11.1493C7.73782 11.2119 7.66249 11.2599 7.57947 11.2898C7.49644 11.3196 7.40779 11.3306 7.31998 11.322C7.18138 11.3317 7.04364 11.2936 6.92964 11.2142C6.81565 11.1348 6.73224 11.0187 6.69332 10.8853L4.81331 9.00668C4.71183 8.89231 4.65786 8.74351 4.66239 8.59068C4.66692 8.43785 4.72961 8.29251 4.83768 8.18435C4.94576 8.07619 5.09106 8.01337 5.24389 8.00873C5.39672 8.00408 5.54554 8.05795 5.65999 8.15934L7.11332 9.61534L10.0867 4.34401C10.1294 4.26589 10.1873 4.19711 10.257 4.14173C10.3267 4.08636 10.4068 4.0455 10.4925 4.02158C10.5783 3.99765 10.6679 3.99115 10.7562 4.00244C10.8445 4.01374 10.9297 4.0426 11.0067 4.08734C11.1615 4.18285 11.273 4.33481 11.3178 4.5111C11.3626 4.68739 11.3371 4.87419 11.2467 5.032L7.94665 10.8887Z" fill="#EFFFEE"/>
                </svg>
            </button>
            @else
                <div class="btnGroup d-flex align-items-center justify-content-center">
                    <span>Balance Confirmation</span>
                    <span>Account Statement</span>
                    <span>Send Login Link</span>
                </div>
            @endif
      </div>
    </div>
  </div>
</div>
<!-- end of Modal to view vendor -->



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
