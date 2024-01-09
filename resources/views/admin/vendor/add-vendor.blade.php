@extends('layout.main')
@section('title')Create Vendor @endsection
@section('page-heading')Create Vendor @endsection
@section('slug') > Create Vendor @endsection
@section('content')

<!-- for selectize -->
@include('cdns.selectize')


<div class="contentSection pt-3 mt-3">
    <div class="animate__animated animate__fadeIn">
        <form id="addVendorForm" enctype="multipart/form-data">
            @csrf
            <div class="formRow pt-0">
                <div class="form-group" style="flex: 2; min-width: 46%">
                    <label for="companyName" class="form-label">Company Name</label>
                    <input name="companyName" type="text" id="companyName" class="form-control" placeholder="Name here"
                        required autofocus />
                </div>
                <div class="form-group" style="flex: 1; min-width: 40%">
                    <label for="natureOfAssesse" class="form-label">Nature of Assesse</label>
                    <select name="natureOfAssesse" type="text" id="natureOfAssesse" class="form-control"
                        placeholder="select ..." required></select>
                </div>
                @php
                $role = optional(Auth::user()->roles->first())->name;
                if($role == 'Approver'){
                @endphp
                <div class="form-group" style="flex: 1 1 260px">
                    <label for="vendorCode" class="form-label">Code</label>
                    <input name="vendorCode" type="text" id="vendorCode" class="form-control"
                        placeholder="Holder Name here" required />
                </div>
                @php } @endphp
                <div class="form-group" style="flex: 1 1 260px">
                    <label for="state" class="form-label">State</label>
                    <select name="state" type="text" id="state" class="form-control" placeholder="--state--"
                        required></select>
                </div>
                <div class="form-group" style="flex: 1 1 260px">
                    <label for="pincode" class="form-label">Pincode</label>
                    <input name="pincode" type="text" id="pincode" class="form-control number" maxlength="6"
                        pattern="^[1-9][0-9]{5}$" placeholder="XXXXXX" required />
                </div>
                <div class="form-group" style="width: 100%">
                    <label for="vendorAddress" class="form-label">Address</label>
                    <textarea name="vendorAddress" id="vendorAddress" class="form-control" placeholder="address here..."
                        required></textarea>
                </div>
            </div>

            <div class="formRow">
                <h6 class="groupHead">Contact Person</h6>
                <div class="form-group" style="flex: 1 1 260px">
                    <label for="contactPersonName" class="form-label">Name</label>
                    <input name="contactPersonName" type="text" id="contactPersonName" class="form-control"
                        placeholder="Name here" required />
                </div>
                <div class="form-group" style="flex: 1 1 260px">
                    <label for="contactPersonDesignation" class="form-label">Designation</label>
                    <input name="contactPersonDesignation" type="text" id="contactPersonDesignation"
                        class="form-control" placeholder="Holder Name here" required />
                </div>
                <div class="form-group" style="flex: 1 1 260px">
                    <label for="contactPersonMobile" class="form-label">Mobile</label>
                    <input name="contactPersonMobile" pattern="^[9876][0-9]{9}$" type="text" id="contactPersonMobile"
                        class="form-control number" maxlength="10" placeholder="XXXX XXX XXX" required />
                </div>
                <div class="form-group" style="flex: 1 1 260px">
                    <label for="contactPersonEmail" class="form-label">Primary Email</label>
                    <input name="contactPersonEmail" pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$" type="text"
                        id="contactPersonEmail" class="form-control" placeholder="e.g. email@your.domai" required />
                </div>
                <div class="form-group" style="flex: 1 1 260px">
                    <label for="contactPersonAltEmail" class="form-label">Secondary Email</label>
                    <input name="contactPersonAltEmail" pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$" type="text"
                        id="contactPersonAltEmail" class="form-control" placeholder="e.g. email@your.domai" />
                </div>
            </div>


            <div class="formRow">
                <h6 class="groupHead">Bank Info</h6>
                <div class="form-group" style="flex: 1 1 260px">
                    <label for="accountNumber" class="form-label">A/c Number</label>
                    <input name="accountNumber" type="number" id="accountNumber" class="form-control number"
                        placeholder="XXXXXXXXXX" required />
                </div>
                <div class="form-group" style="flex: 1 1 260px">
                    <label for="ifsc" class="form-label">IFSC Code</label>
                    <input name="ifsc" max-length="11" pattern="^[A-Z]{4}[0][0-9]{6}$" type="text" id="ifsc"
                        class="form-control" placeholder="XXXXXXXXXX" required />
                </div>
                <div class="form-group" style="flex: 1 1 260px">
                    <label for="branch" class="form-label">Branch Name</label>
                    <input name="branch" type="text" id="branch" class="form-control" placeholder="Branch Name"
                        required />
                </div>
                <div class="form-group" style="flex: 1 1 45%">
                    <label for="bankName" class="form-label">Bank Name</label>
                    <select name="bankName" type="text" id="bankName" class="form-control" placeholder="Bank Name here"
                        required></select>
                </div>
                <div class="form-group" style="flex: 1 1 45%">
                    <label for="holderName" class="form-label">A/c Holder Name</label>
                    <input name="holderName" type="text" id="holderName" class="form-control"
                        placeholder="Holder Name here" required />
                </div>
                @php
                if($role == 'Approver'){
                @endphp
                <div class="form-group" style="flex: 1 1 260px">
                    <label for="cashFlow" class="form-label">Cash Flow</label>
                    <select name="cashFlow" type="text" id="cashFlow" class="form-control" placeholder="select ..."
                        required></select>
                </div>
                <div class="form-group" style="flex: 1 1 260px">
                    <label for="vendorGroup" class="form-label">Vendor Group</label>
                    <select name="vendorGroup" type="text" id="vendorGroup" class="form-control"
                        placeholder="select ..." required></select>
                </div>
                <div class="form-group" style="flex: 1 1 260px">
                    <label for="paymentTerms" class="form-label">Terms of Payment</label>
                    <select name="paymentTerms" type="text" id="paymentTerms" class="form-control"
                        placeholder="select ..." required></select>
                </div>
                @php } @endphp
            </div>

            <div class="formRow">
                <h6 class="groupHead">Other Info</h6>
                <div class="form-group" style="flex: 1 1 260px; min-width: 40%">
                    <label for="ownerName" class="form-label">Owner Name</label>
                    <input name="ownerName" type="text" id="ownerName" class="form-control" placeholder="Name here"
                        required />
                </div>
                <div class="form-group" style="flex: 1 1 260px; min-width: 40%">
                    <label for="natureOfService" class="form-label">Nature of Service</label>
                    <input name="natureOfService" type="text" id="natureOfService" class="form-control"
                        placeholder="Name here" required />
                </div>
                <div class="form-group" style="flex: 1 1 260px; min-width: 40%">
                    <label for="msmeNumber" class="form-label">MSME Number</label>
                    <input name="msmeNumber" type="number" id="msmeNumber" class="form-control" placeholder="XXXXXXXXXX"
                        required />
                </div>
                <div class="form-group" style="flex: 1 1 260px; min-width: 40%">
                    <label for="gstNumber" class="form-label">GSTIN</label>
                    <input name="gstNumber" max-length="11" type="text" id="gstNumber" maxlength="16"
                        class="form-control" placeholder="XXXXXXXXXX" required />
                </div>
                <div class="form-group" style="flex: 1 1 260px; min-width: 40%">
                    <label for="gstNumber" class="form-label">Pan </label>
                    <input name="panNumber" type="text" id="panNumber" class="form-control" placeholder="XXXXXXXXXX"
                        required />
                </div>
            </div>

            <div class="formRow">
                <h6 class="groupHead">Upload Documents</h6>

                <div class="form-group fileInputGroup">
                    <label class="form-label">MSME Certificate</label>
                    <svg xmlns="http://www.w3.org/2000/svg" class="clearFileInput" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-x-circle">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="15" y1="9" x2="9" y2="15"></line>
                        <line x1="9" y1="9" x2="15" y2="15"></line>
                    </svg>
                    <span class="btn btn-sm btn-primary uploadButton disabled">Update</span>
                    <!-- <a href="" target="_blank" class="openImage">
                        <svg xmlns="http://www.w3.org/2000/svg"  width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                    </a> -->
                    <label for="msmeCertificate" class="dropArea">
                        <input type="file" id="msmeCertificate" name="msmeCertificate" class="dragAndDrop file" />
                        <img class="rendoredImage animate__animated animate__fadeIn"
                            src="{{asset('assets/images/dragAndDrop.png')}}" alt="rendoredImage" />
                        <span class="fileName animate__animated animate__fadeIn"></span>
                    </label>
                    <div class="process animate__animated animate__fadeIn">
                        <svg class="spinner" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-loader">
                            <line x1="12" y1="2" x2="12" y2="6"></line>
                            <line x1="12" y1="18" x2="12" y2="22"></line>
                            <line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line>
                            <line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line>
                            <line x1="2" y1="12" x2="6" y2="12"></line>
                            <line x1="18" y1="12" x2="22" y2="12"></line>
                            <line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line>
                            <line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line>
                        </svg>
                    </div>

                </div>

                <div class="form-group fileInputGroup">
                    <label class="form-label">GSTIN Certificate</label>
                    <svg xmlns="http://www.w3.org/2000/svg" class="clearFileInput" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-x-circle">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="15" y1="9" x2="9" y2="15"></line>
                        <line x1="9" y1="9" x2="15" y2="15"></line>
                    </svg>
                    <span class="btn btn-sm btn-primary uploadButton disabled">Update</span>
                    <!-- <a href="" target="_blank" class="openImage">
                        <svg xmlns="http://www.w3.org/2000/svg"  width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                    </a> -->
                    <label for="gstCertificate" class="dropArea">
                        <input type="file" id="gstCertificate" name="gstCertificate" class="dragAndDrop file" />
                        <img class="rendoredImage animate__animated animate__fadeIn"
                            src="{{asset('assets/images/dragAndDrop.png')}}" alt="rendoredImage" />
                        <span class="fileName animate__animated animate__fadeIn"></span>
                    </label>
                    <div class="process animate__animated animate__fadeIn">
                        <svg class="spinner" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-loader">
                            <line x1="12" y1="2" x2="12" y2="6"></line>
                            <line x1="12" y1="18" x2="12" y2="22"></line>
                            <line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line>
                            <line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line>
                            <line x1="2" y1="12" x2="6" y2="12"></line>
                            <line x1="18" y1="12" x2="22" y2="12"></line>
                            <line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line>
                            <line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line>
                        </svg>
                    </div>

                </div>

                <div class="form-group fileInputGroup">
                    <label class="form-label">Cencel Cheque</label>
                    <svg xmlns="http://www.w3.org/2000/svg" class="clearFileInput" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-x-circle">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="15" y1="9" x2="9" y2="15"></line>
                        <line x1="9" y1="9" x2="15" y2="15"></line>
                    </svg>
                    <span class="btn btn-sm btn-primary uploadButton disabled">Update</span>
                    <!-- <a href="" target="_blank" class="openImage">
                        <svg xmlns="http://www.w3.org/2000/svg"  width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                    </a> -->
                    <label for="cancelCheque" class="dropArea">
                        <input type="file" id="cancelCheque" name="cancelCheque" class="dragAndDrop file" />
                        <img class="rendoredImage animate__animated animate__fadeIn"
                            src="{{asset('assets/images/dragAndDrop.png')}}" alt="rendoredImage" />
                        <span class="fileName animate__animated animate__fadeIn"></span>
                    </label>
                    <div class="process animate__animated animate__fadeIn">
                        <svg class="spinner" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-loader">
                            <line x1="12" y1="2" x2="12" y2="6"></line>
                            <line x1="12" y1="18" x2="12" y2="22"></line>
                            <line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line>
                            <line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line>
                            <line x1="2" y1="12" x2="6" y2="12"></line>
                            <line x1="18" y1="12" x2="22" y2="12"></line>
                            <line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line>
                            <line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line>
                        </svg>
                    </div>

                </div>

                <div class="form-group fileInputGroup">
                    <label class="form-label">Pan</label>
                    <svg xmlns="http://www.w3.org/2000/svg" class="clearFileInput" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-x-circle">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="15" y1="9" x2="9" y2="15"></line>
                        <line x1="9" y1="9" x2="15" y2="15"></line>
                    </svg>
                    <span class="btn btn-sm btn-primary uploadButton disabled">Update</span>
                    <!-- <a href="" target="_blank" class="openImage">
                        <svg xmlns="http://www.w3.org/2000/svg"  width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                    </a> -->
                    <label for="otherDocument" class="dropArea">
                        <input type="file" id="otherDocument" name="panUpload" class="dragAndDrop file" />
                        <img class="rendoredImage animate__animated animate__fadeIn"
                            src="{{asset('assets/images/dragAndDrop.png')}}" alt="rendoredImage" />
                        <span class="fileName animate__animated animate__fadeIn"></span>
                    </label>
                    <div class="process animate__animated animate__fadeIn">
                        <svg class="spinner" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-loader">
                            <line x1="12" y1="2" x2="12" y2="6"></line>
                            <line x1="12" y1="18" x2="12" y2="22"></line>
                            <line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line>
                            <line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line>
                            <line x1="2" y1="12" x2="6" y2="12"></line>
                            <line x1="18" y1="12" x2="22" y2="12"></line>
                            <line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line>
                            <line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line>
                        </svg>
                    </div>
                </div>

            </div>

            <div class="d-flex align-items-center justify-content-end" style="gap: 1.5rem">
                <button type="button" class="btn btn-sm btn-secondary animate__animated animate__fadeInUp discard"
                    onclick="resetForm()" style="min-width: 100px">
                    Discard
                </button>
                <button type="submit" class="btn btn-sm btn-primary animate__animated animate__fadeInUp"
                    id="vendorSubmitButton">
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


<script src="{{asset('assets/js/static-data/banks.js')}}"></script>
<script src="{{asset('assets/js/static-data/states-district.js')}}"></script>
<script src="{{asset('assets/js/static-data/vendor-options.js')}}"></script>
<script>
$('#natureOfAssesse').selectize({
    maxItems: 1,
    plugins: ["clear_button"],
    options: vendorOptions.NatureOfAssessee,
    valueField: 'name',
    labelField: 'name',
    searchField: 'name',
    create: false
});
$('#bankName').selectize({
    maxItems: 1,
    plugins: ["clear_button"],
    options: banks,
    valueField: 'name',
    labelField: 'name',
    searchField: 'name',
    create: false
});
$('#state').selectize({
    maxItems: 1,
    plugins: ["clear_button"],
    options: states,
    valueField: 'state',
    labelField: 'state',
    searchField: 'state',
    create: false
});
$('#cashFlow').selectize({

    maxItems: 1,
    plugins: ["clear_button"],
    options: vendorOptions.CashFlow,
    valueField: 'Code',
    labelField: 'Code',
    searchField: 'Code',
    create: false
});
$('#vendorGroup').selectize({
    maxItems: 1,
    plugins: ["clear_button"],
    options: vendorOptions.VendorGroup,
    valueField: 'vg',
    labelField: 'vg',
    searchField: 'vg',
    create: false
});
$('#paymentTerms').selectize({
    maxItems: 1,
    plugins: ["clear_button"],
    options: vendorOptions.TermsofPayment,
    valueField: 'PaymentTerm',
    labelField: 'PaymentTerm',
    searchField: 'PaymentTerm',
    create: false
});




function resetForm() {
    $('a.clear').click();
    $('#addVendorForm').trigger("reset");
}

$("#addVendorForm").validate({
    rules: {
        companyName: {
            required: true
        },
        vendorCode: {
            required: true,
            minlength: 5
        },
        pincode: {
            required: true,
            maxlength: 6
        },
        vendorAddress: {
            required: true
        },
        contactPersonName: {
            required: true
        },
        contactPersonDesignation: {
            required: true
        },
        contactPersonMobile: {
            required: true,
            minlength: 10
        },
        contactPersonEmail: {
            required: true
        },
        contactPersonAltEmail: {
            required: true
        },
        accountNumber: {
            required: true
        },
        ifsc: {
            required: true,
            minlength: 11
        },
        branch: {
            required: true
        },
        holderName: {
            required: true
        },
        ownerName: {
            required: true
        },
        natureOfService: {
            required: true
        },
        msmeNumber: {
            required: true
        },
        gstNumber: {
            required: true,
            minlength: 16,
            maxlength: 16
        }
    },
    messages: {
        companyName: {
            required: 'Required'
        },
        vendorCode: {
            required: 'Required',
            minlength: 'Minimum 5 characters required'
        },
        pincode: {
            required: 'Required'
        },
        vendorAddress: {
            required: 'Required'
        },
        contactPersonName: {
            required: 'Required'
        },
        contactPersonDesignation: {
            required: 'Required'
        },
        contactPersonMobile: {
            required: 'Required',
            length: 'Enter a valid mobile number'
        },
        contactPersonEmail: {
            required: 'Required'
        },
        contactPersonAltEmail: {
            required: 'Required'
        },
        accountNumber: {
            required: 'Required'
        },
        ifsc: {
            required: 'Required',
            minlength: 'Enter a valid ifsc code'
        },
        branch: {
            required: 'Required'
        },
        holderName: {
            required: 'Required'
        },
        ownerName: {
            required: 'Required'
        },
        natureOfService: {
            required: 'Required'
        },
        msmeNumber: {
            required: 'Required'
        },
        gstNumber: {
            required: 'Required',
            minlength: 'Enter a valid gstin number',
            maxlength: 'Enter a valid gstin number'
        }
    },
    submitHandler: function(form) {
        const pfu = localStorage.getItem('pfuValue');
        const formData = new FormData(form);
        formData.append('pfu', pfu);
        $.ajax({
            url: '/add-vendor',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function() {
                $('#vendorSubmitButton span').html('...');
                $('#vendorSubmitButton').attr('disabled', true);
                $('#vendorSubmitButton').siblings('.discard').attr('disabled', true);
                $('.btn-close').attr('disabled', true);
                $("#loading").addClass("working");

            },
            success: function(response) {

                if (response.success) {
                    // Handle success scenario
                    // resetFrom();
                    $("#loading").removeClass("working");
                    $.toast({
                        heading: 'Success',
                        text: 'Vendor added successfully',
                        icon: 'success',
                        position: 'top-right',
                        loader: true,
                        loaderBg: '#ffffff',
                        bgColor: '#18c964',
                    })
                    setTimeout(function() {
                        location.reload();
                    }, 3000);

                } else if (response.error) {
                    $.toast({
                        heading: 'Error',
                        text: 'Vendor already exist in this pfu',
                        icon: 'error',
                        position: 'top-right',
                        loader: false,
                        loaderBg: '#ffffff',
                        hideAfter: false,
                        hideAfter: 7000
                    })
                    $('#vendorSubmitButton span').html('Submit');
                    $('#vendorSubmitButton').removeAttr('disabled');
                    $('#vendorSubmitButton').siblings('.discard').removeAttr('disabled');
                    $('.btn-close').removeAttr('disabled');
                    $("#loading").removeClass("working");
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
                    $('#vendorSubmitButton span').html('Submit');
                    $('#vendorSubmitButton').removeAttr('disabled');
                    $('#vendorSubmitButton').siblings('.discard').removeAttr('disabled');
                    $('.btn-close').removeAttr('disabled');
                    $("#loading").removeClass("working");
                }
            },
            error: function(xhr, status, error) {
                var errorMessage = 'An error occurred while processing your request.';
                console.log(xhr.responseJSON);
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                } else if (xhr.responseJSON.errors.vendorCode && xhr.responseJSON.errors
                    .vendorCode.length > 0) {
                    errorMessage = xhr.responseJSON.errors.vendorCode[0];
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

                $('#vendorSubmitButton span').html('Submit');
                $('#vendorSubmitButton').removeAttr('disabled');
                $('#vendorSubmitButton').siblings('.discard').removeAttr('disabled');
                $('.btn-close').removeAttr('disabled');
                $("#loading").removeClass("working");
                // Display an error message or perform other error handling tasks
            }
        });
    }
});
</script>
@endsection