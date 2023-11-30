@extends('layout.main')
@section('title')Users List @endsection
@section('page-heading')Users List @endsection
@section('slug') > Users List @endsection
@section('content')

<link href="{{asset('assets/css/pages/users-page/usersPage.css')}}" rel="stylesheet" />
<link href="{{asset('assets/css/pages/common/common.css')}}" rel="stylesheet" />

<link href="{{asset('assets/css/select2/selectize.css')}}" rel="stylesheet" />



<!-- for dataTable -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet" />

<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>


<!-- selectize js -->
<script src="{{asset('assets/js/select2/selectize.min.js')}}"></script>

<!-- custom style -->

<!-- topbar -->
<div class="topbar sticky d-flex align-items-center justify-content-between animate__animated animate__fadeInDown">
    <div class="flex-grow-1 d-flex align-items-center justify-content-start">
        <div class="searchInputBlock form-group animate__animated animate__fadeIn">
            <svg xmlns="http://www.w3.org/2000/svg" class="inputIcon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#83838380" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
            <input type="search" class="keywordSearch form-control form-control-sm withIcon" placeholder="search..."/>
        </div>
    </div>

    <div class="actionButtonsBlock flex-grow-1 d-flex align-items-center justify-content-end">
        <button class="btn btn-sm btn-primary animate__animated animate__fadeIn" data-bs-toggle="modal" data-bs-target="#addUserDialog">
            Add
            <svg xmlns="http://www.w3.org/2000/svg" class="icon right"  width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
        </button>

         <button id="exportMyLedger" class="btn btn-sm btn-primary animate__animated animate__fadeIn">
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
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>password</th>
                            <th>Role</th>
                            <th class="text-center">Status</th>
                            <th class="actionCol text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php 
                        $i = 1;
                        @endphp
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$user->pfu}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->mobile}}</td>
                            <td>{{$user->email}}</td>
                            <td><span class="swan-tooltip" data-tooltip="kkkkkkkk">***********</span></td>
                            <td>{{$user->getRoleNames()->first();}}</td>
                            <td class="text-center">
                                @php
                                    switch($user->status == '1') {
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




<!-- modal for removing template -->
<div class="modal fade" id="deleteReportTemplate" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-body">
                <div class="modal-body">
                    <div class="Delt-content text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-alert-circle deleteAlertIcon">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="8" x2="12" y2="12"></line>
                            <line x1="12" y1="16" x2="12.01" y2="16"></line>
                        </svg>
                        <h5 class="my-2">Delete Template</h5>
                        <span>Are you sure you want to delete this report template?</span>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="d-flex justify-content-end align-content-center mt-4" style="gap: 1rem;">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit"
                            class="btn btn-danger btn-modal delete-btn-modal deleteReportTemplateconfirm">Yeah! Sure
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal to add user -->
<div class="modal fade" id="addUserDialog" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="addUserDialogLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <form id="addUserForm" method="post" class="modal-content">
        @csrf
        <div class="modal-header">
            <h6 class="modal-title" id="exampleModalLabel">Add User</h6>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            
            <div class="d-flex align-items-center flex-wrap"> 
                <div class="form-row">
                    <div class="form-group col-md-6"> 
                        <label for="mobileNumber" class="form-label">Role</label>
                        <select class="form-select @error('roles') is-invalid @enderror" aria-label="Roles" id="roles" name="roles[]">
                            <option value="">--select role--</option>
                                @forelse ($roles as $role)

                                    @if ($role!='Super Admin')
                                        <option value="{{ $role }}" {{ in_array($role, old('roles') ?? []) ? 'selected' : '' }}>
                                        {{ $role }}
                                        </option>
                                    @else
                                        @if (Auth::user()->hasRole('Super Admin'))   
                                            <option value="{{ $role }}" {{ in_array($role, old('roles') ?? []) ? 'selected' : '' }}>
                                            {{ $role }}
                                            </option>
                                        @endif
                                    @endif

                                @empty

                                @endforelse
                            </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="mobileNumber" class="form-label">PFU</label>
                        <select name="pfu[]" class="pfu form-control" required >
                            <option value="">--select pfu--</option>
                            <option value="sd1">SD1</option>
                            <option value="sd2">SD2</option>
                            <option value="sd3">SD3</option>
                        </select>
                        <div class="invalid-feedback">Enter a valid pfu name </div>
                    </div>
                </div>
            
                <div class="form-row">
                    <div class="form-group">
                        <label for="mobileNumber" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="mobileNumber" class="form-label">Mobile</label>
                        <input name="mobile" class="form-control number" placeholder="XXXX XXX XXX" pattern="^[6789][0-9]{9}$" maxlength="10" required />
                        <span class="error" id="mobileError"></span>
                    </div>
                    <div class="form-group">
                        <label for="mobileNumber" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                        <span class="error" id="emailError"></span>
                    </div>
                    <div class="form-group">
                        <label for="mobileNumber" class="form-label">Password</label>
                        <input type="text" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                        <span class="error" id="passwordError"></span>
                    </div>
                </div>

                <!-- <div class="form-row dropDownSelection">
                    <label class="label col-12">Access</label>

                    <ul class="main animate__animated animate__fadeIn">
                        <?php
                        $columnsAvailable = array(
                            array("label" => "label 1"),
                            array("label" => "label 2", "child" => array(array("label" => "L2 child 1"), array("label" => "L2 child 2"))),
                            array("label" => "label 3"),
                            array("label" => "label 4", "child" => array(array("label" => "L4 child 1"), array("label" => "L4 child 2"))),
                            array("label" => "label 5"),
                            array("label" => "label 6", "child" => array(array("label" => "L6 child 1"), array("label" => "L6 child 2"))),
                            array("label" => "label 7"),
                            array("label" => "label 8", "child" => array(array("label" => "L8 child 1"), array("label" => "L8 child 2"))),
                            array("label" => "label 9"),
                            array("label" => "label 10", "child" => array(array("label" => "L10 child 1"), array("label" => "L10 child 2"))),
                            array("label" => "label 11"),
                            array("label" => "label 12", "child" => array(array("label" => "L12 child 1"), array("label" => "L12 child 2"))),
                        );
                        ?>

                        @foreach($columnsAvailable as $columnsItem)
                            <li class="animate__animated animate__fadeIn">
                                <input type="checkbox" name="{{$columnsItem['label']}}"
                                        id="{{$columnsItem['label']}}"/>
                                <label for="{{$columnsItem['label']}}">
                                    {{$columnsItem['label']}}
                                </label>
                                @if(array_key_exists('child', $columnsItem))
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="feather feather-chevron-down toggleChildCols">
                                        <polyline points="6 9 12 15 18 9"></polyline>
                                    </svg>
                                    <ul style="display: none" class="subMain animate__animated animate__fadeIn">
                                        @foreach($columnsItem['child'] as $childColumnsItem)
                                            <li>
                                                <input type="checkbox"
                                                        name="{{$childColumnsItem['label']}}"
                                                        id="{{$childColumnsItem['label']}}"/>
                                                <label for="{{$childColumnsItem['label']}}">
                                                    {{$childColumnsItem['label']}}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div> -->
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-secondary animate__animated animate__fadeInUp discard" data-bs-dismiss="modal1">Discard & Close</button>
            <button type="submit" class="btn btn-sm btn-primary animate__animated animate__fadeInUp" id="userSubmitButton">
                <span>Submit</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="icon right" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </button>
        </div>
    </form>
  </div>
</div>
<!-- end of Modal to add user -->


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
            'targets': [0,5],
            'orderable': false,

        }]
    });
    table.draw();

    
    // custom serach input for datatable
    $('.keywordSearch').on( 'keyup', function () {
        // const searchKeyword = this.value.replace(/[^a-zA-Z0-9 ]/g, ''); // written to remove special characters
        table.search(this.value).draw();
    });


    $(".btn-close, .discard").on('click', function(){
        resetFrom()
    });


    function resetFrom(){
        $('#addUserForm').trigger("reset");
    }


    $('#addUserForm').on('submit', function(e){
    e.preventDefault();
    
    // $('#userSubmitButton span').html('...');
    // $('#userSubmitButton').attr('disabled', true);
    // $('#userSubmitButton').siblings('.discard').attr('disabled', true);
    // $('.btn-close').attr('disabled', true);

    
    var formData = $(this).serialize();

    $.ajax({
        url: `{{ route('users.store') }}`, 
        type: 'POST', 
        data: formData,
        success: function(response) {
            // Clear previous error messages
            $('.error').text('');

                if (response.success === false && response.formErrors === true) {
                    if (response.errors.hasOwnProperty('email')) {
                        $('#emailError').text(response.errors.email[0]);
                    }
                    if (response.errors.hasOwnProperty('mobile')) {
                        $('#mobileError').text(response.errors.mobile[0]);
                    }
                    if (response.errors.hasOwnProperty('password')) {
                        $('#passwordError').text(response.errors.password[0]);
                    }
                    // Handle other error fields similarly if needed
                } else if (response.validation === false) {
                    // Handle other types of errors or validations
                } else if (response.success === true) {

                    // If success is true, reload the page
                    // $('#userSubmitButton span').html('Submit');
                    // $('#userSubmitButton').removeAttr('disabled');
                    // $('#userSubmitButton').siblings('.discard').removeAttr('disabled');
                    // $('.btn-close').removeAttr('disabled');
                     Swal.fire({
                        title: 'Success!',
                        text: 'User created successfully',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        location.reload();
                    });
                }
           
        },
        error: function(xhr, status, error) {
            // Handle error response
            console.error(error);
            // Display a generic error message if needed
        }
    });
});

    let selectOptions = [
                    {value: 'sd1', title: 'SD 1'},
                    {value: 'sd2', title: 'SD 2'},
                    {value: 'sd3', title: 'SD 3'},
                    {value: 'sd4', title: 'SD 4'},
                    {value: 'ma1', title: 'MA 1'},
                    {value: 'ma2', title: 'MA 2'},
                    {value: 'ma3', title: 'MA 3'},
                ]

    function initiatePfuSelect(forInput, maxItems, options) {
        $(`${forInput}`).selectize({ 
            valueField: 'value',
            labelField: 'title',
            searchField: 'title',
            maxItems: maxItems,
            options: options,
            create: false
        });
    }
    initiatePfuSelect('.pfu', selectOptions.length, selectOptions);


    $('select[name="role"]').on('change', function(){
        const role = $('select[name="role"]').val();

        if(role == 'maker' || role == 'approver') {
            initiatePfuSelect('.pfu', selectOptions.length, selectOptions);
        } else {
            initiatePfuSelect('.pfu', 1, selectOptions);
          }
    });

});


</script>


<!-- for checkboxes -->
<script>
    $(".toggleChildCols").click(function () {
        $(this).siblings("ul").toggle();
    });

    $('input[type="checkbox"]').change(function (e) {

        var checked = $(this).prop("checked");
        var container = $(this).parent();
        var siblings = container.siblings();

        container.find('input[type="checkbox"]').prop({
            indeterminate: false,
            checked: checked
        });

        function checkSiblings(el) {
            var parent = el.parent().parent(),
                all = true;
            el.siblings().each(function () {
                let returnValue = all = ($(this).children('input[type="checkbox"]').prop("checked") === checked);
                return returnValue;
            });
            if (all && checked) {
                parent.children('input[type="checkbox"]').prop({
                    indeterminate: false,
                    checked: checked
                });
                checkSiblings(parent);
            } else if (all && !checked) {
                parent.children('input[type="checkbox"]').prop("checked", checked);
                parent.children('input[type="checkbox"]').prop("indeterminate", (parent.find('input[type="checkbox"]:checked').length > 0));
                checkSiblings(parent);

            } else {
                el.parents("li").children('input[type="checkbox"]').prop({
                    indeterminate: true,
                    checked: false
                });
            }
        }

        checkSiblings(container);
    });

</script>

@endsection