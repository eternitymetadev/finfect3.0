// login steps 1: mobile input, 2: otp input, 3: vendor selection
let step = 1;

// submit functions
(() => {
    "use strict";
    const forms = document.querySelectorAll(".needs-validation");
    Array.from(forms).forEach((form) => {
        form.addEventListener(
            "submit",
            (event) => {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                } else {
                    event.preventDefault();
                    if (step == 1) {
                        processEmail();
                    } else if (step == 2) {
                        validatePassword();
                    } else if (step == 3) {
                        selectedVendorLogin();
                    }
                }
                form.classList.add("was-validated");
            },
            false
        );
    });
})();

const helpLineBottom = document.getElementById("helpLineBottom");
const textContainer = document.getElementById("textContainer");
const formFields = document.getElementById("formFields");
const submitButton = document.getElementById("submitButton");
const loader = document.getElementById("loaderContainer");

const step1Text = `<p class="title">Login</p>
                <p class="description">
                  Please enter your registered email address to continue.
                </p>`;

const step2Text = `<p class="title">Enter password</p>
                <p class="description">
                  Please enter your password to continue <br/><span class="link" onclick="showStepOne()">Change email</span>
                </p>`;

const step3Text = `<p class="title">Login</p>
                <p class="description">
                  Please select vendor code with which you want to login.
                </p>`;

const mobileInput = `<div class="form-group">
                        <label for="email" class="form-label">
                        Email
                        </label>
                        <input
                            autofocus
                            id="email"
                            type="text"
                            class="form-control"
                            value=""
                            placeholder="email@your.domain"
                            pattern="^[^\s@]+@[^\s@]+\.[a-zA-Z]{2,}$"
                            required
                        />
                        <svg xmlns="http://www.w3.org/2000/svg" class="inputIcon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                        <div class="invalid-feedback">Email address not found</div>
                    </div>`;
const passwordField = `<div class="form-group">
                        <label for="password" class="form-label">
                            Password
                        </label>
                        <input
                            id="password"
                            type="password"
                            class="form-control"
                            value=""
                            placeholder="********"
                            required
                        />
                        <svg xmlns="http://www.w3.org/2000/svg" class="inputIcon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="inputIcon right" style="display: none" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye-off"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="inputIcon right" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                        <div class="invalid-feedback">Invalid Password</div>
                    </div>`;

let vendorSelection = `<div class="form-group">
                            <label for="vendorSelection" class="form-label">
                                Vendor Code
                            </label>
                            <select
                                autofocus
                                id="vendorSelection"
                                class="form-control"
                                value=""
                                required
                            >
                                <option value="" selected disabled>--select vendor--</option>
                                <option value="1">Option 2</option>
                                <option value="2">Option 3</option>
                            </select>
                            <svg class="inputIcon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 4C10.9391 4 9.92172 4.42143 9.17157 5.17157C8.42143 5.92172 8 6.93913 8 8C8 9.06087 8.42143 10.0783 9.17157 10.8284C9.92172 11.5786 10.9391 12 12 12C13.0609 12 14.0783 11.5786 14.8284 10.8284C15.5786 10.0783 16 9.06087 16 8C16 6.93913 15.5786 5.92172 14.8284 5.17157C14.0783 4.42143 13.0609 4 12 4ZM6 8C6 6.4087 6.63214 4.88258 7.75736 3.75736C8.88258 2.63214 10.4087 2 12 2C13.5913 2 15.1174 2.63214 16.2426 3.75736C17.3679 4.88258 18 6.4087 18 8C18 9.5913 17.3679 11.1174 16.2426 12.2426C15.1174 13.3679 13.5913 14 12 14C10.4087 14 8.88258 13.3679 7.75736 12.2426C6.63214 11.1174 6 9.5913 6 8ZM8 18C7.20435 18 6.44129 18.3161 5.87868 18.8787C5.31607 19.4413 5 20.2044 5 21C5 21.2652 4.89464 21.5196 4.70711 21.7071C4.51957 21.8946 4.26522 22 4 22C3.73478 22 3.48043 21.8946 3.29289 21.7071C3.10536 21.5196 3 21.2652 3 21C3 19.6739 3.52678 18.4021 4.46447 17.4645C5.40215 16.5268 6.67392 16 8 16H16C17.3261 16 18.5979 16.5268 19.5355 17.4645C20.4732 18.4021 21 19.6739 21 21C21 21.2652 20.8946 21.5196 20.7071 21.7071C20.5196 21.8946 20.2652 22 20 22C19.7348 22 19.4804 21.8946 19.2929 21.7071C19.1054 21.5196 19 21.2652 19 21C19 20.2044 18.6839 19.4413 18.1213 18.8787C17.5587 18.3161 16.7956 18 16 18H8Z" fill="#186E93"/>
                            </svg>
                        </div>`;

const resendOtpButton = ``;
const supportLink = `Need help? <a href="#">Support</a>`;

function processEmail() {
    var email = $("#email").val();

    $("#submitButton").attr("disabled", true);
    $("#submitButton").addClass("loading");
    $("#loaderContainer").addClass("loading");
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    // AJAX request 
    $.ajax({
        type: 'POST',
        url: '/validate-email', // Replace with your Laravel route for step 1
        data: {
            email: email,
            _token: CSRF_TOKEN // Ensure CSRF token is sent
        },
        headers: {
            'X-CSRF-TOKEN': CSRF_TOKEN
        },
        success: function(response) {
            if (response.success) {
                // Email check successful, proceed to step two
                $("#submitButton").removeAttr("disabled");
                $("#submitButton").removeClass("loading");
                $("#loaderContainer").removeClass("loading");
                $(".invalid-feedback").hide();
                showStepTwo(); // You need to define this function to show step two
            } else {
                // Email check failed
                $("#email").siblings(".invalid-feedback").show();
                $("#submitButton").removeAttr("disabled");
                $("#submitButton").removeClass("loading");
                $("#loaderContainer").removeClass("loading");
            }
        },
        error: function(xhr, status, error) {
            // Handle AJAX error if any
            console.error(error);
            $("#submitButton").removeAttr("disabled");
            $("#submitButton").removeClass("loading");
            $("#loaderContainer").removeClass("loading");
        }
    });
}

function validatePassword() {
    var password = $("#password").val();

    if (password.length > 0) {
        $("#submitButton").attr("disabled", true);
        $("#submitButton").addClass("loading");
        $("#loaderContainer").addClass("loading");

        // AJAX request
        $.ajax({
            type: 'POST',
            url: '/validate-password', 
            data: {
                password: password,
                _token: $('meta[name="csrf-token"]').attr('content') 
            },
            success: function(response) {
                if (response.success) {
                    console.log(response.user_pfu);
                    // Password validation successful
                    $("#submitButton").removeAttr("disabled");
                    $("#submitButton").removeClass("loading");
                    $("#loaderContainer").removeClass("loading");
                    $(".invalid-feedback").hide();
                    vendorSelection = `<div class="form-group">
                            <label for="vendorSelection" class="form-label">
                                Vendor Code
                            </label>
                            <select
                                autofocus
                                id="vendorSelection"
                                class="form-control"
                                value=""
                                name="pfu"
                                required
                            >
                            <option value="" selected disabled>--select vendor--</option>
                            ${response.user_pfu.map((unit, index)=>(
                                `<option value="${unit.id}">${unit.pfu}</option>`
                            ))}
                                
                            </select>
                            <svg class="inputIcon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 4C10.9391 4 9.92172 4.42143 9.17157 5.17157C8.42143 5.92172 8 6.93913 8 8C8 9.06087 8.42143 10.0783 9.17157 10.8284C9.92172 11.5786 10.9391 12 12 12C13.0609 12 14.0783 11.5786 14.8284 10.8284C15.5786 10.0783 16 9.06087 16 8C16 6.93913 15.5786 5.92172 14.8284 5.17157C14.0783 4.42143 13.0609 4 12 4ZM6 8C6 6.4087 6.63214 4.88258 7.75736 3.75736C8.88258 2.63214 10.4087 2 12 2C13.5913 2 15.1174 2.63214 16.2426 3.75736C17.3679 4.88258 18 6.4087 18 8C18 9.5913 17.3679 11.1174 16.2426 12.2426C15.1174 13.3679 13.5913 14 12 14C10.4087 14 8.88258 13.3679 7.75736 12.2426C6.63214 11.1174 6 9.5913 6 8ZM8 18C7.20435 18 6.44129 18.3161 5.87868 18.8787C5.31607 19.4413 5 20.2044 5 21C5 21.2652 4.89464 21.5196 4.70711 21.7071C4.51957 21.8946 4.26522 22 4 22C3.73478 22 3.48043 21.8946 3.29289 21.7071C3.10536 21.5196 3 21.2652 3 21C3 19.6739 3.52678 18.4021 4.46447 17.4645C5.40215 16.5268 6.67392 16 8 16H16C17.3261 16 18.5979 16.5268 19.5355 17.4645C20.4732 18.4021 21 19.6739 21 21C21 21.2652 20.8946 21.5196 20.7071 21.7071C20.5196 21.8946 20.2652 22 20 22C19.7348 22 19.4804 21.8946 19.2929 21.7071C19.1054 21.5196 19 21.2652 19 21C19 20.2044 18.6839 19.4413 18.1213 18.8787C17.5587 18.3161 16.7956 18 16 18H8Z" fill="#186E93"/>
                            </svg>
                        </div>`;
                    showStepThree(); // You need to define this function to show step three
                } else {
                   
                    $("#password").siblings(".invalid-feedback").show();
                    $("#submitButton").removeAttr("disabled");
                    $("#submitButton").removeClass("loading");
                    $("#loaderContainer").removeClass("loading");
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
                $("#submitButton").removeAttr("disabled");
                $("#submitButton").removeClass("loading");
                $("#loaderContainer").removeClass("loading");
            }
        });
    } else {
        alert("Password cannot be empty");
        $("#password").siblings(".invalid-feedback").show();
    }
}

function selectedVendorLogin() {
    console.log("logging in");
    submitButton.setAttribute("disabled", true);
    submitButton.classList.add("loading");
    loader.classList.add("loading");
    var pfu = $('#vendorSelection').val();
    // AJAX request for login-step-3
    $.ajax({
        type: 'POST',
        url: '/login-pfu', // Replace with your Laravel route for step 3
        data: {
            pfu: pfu,
            _token: $('meta[name="csrf-token"]').attr('content') 
        },
        success: function(response) {
            if (response.success) {
                // User logged in successfully, redirect to dashboard
                window.location.replace("/dashboard");
            } else {
                // Handle login failure if needed
                console.error('Login failed');
            }
        },
        error: function(xhr, status, error) {
            // Handle AJAX error if any
            console.error(error);
        },
        complete: function() {
            // Remove loading indicators after AJAX request completes
            submitButton.removeAttribute("disabled");
            submitButton.classList.remove("loading");
            loader.classList.remove("loading");
        }
    });

    // Simulating a delay for visual effect (remove this in production)
    setTimeout(() => {
        submitButton.removeAttribute("disabled");
        submitButton.classList.remove("loading");
        loader.classList.remove("loading");
        // window.location.replace("/dashboard");
    }, 1500);
}

function showStepOne() { 
    step = 1;
    otpValue = "";
    helpLineBottom.innerHTML = supportLink;
    submitButton.removeAttribute("disabled");
    textContainer.innerHTML = step1Text;
    formFields.innerHTML = mobileInput;
    submitButton.querySelector(".btnText").innerHTML = "Proceed";
    submitButton.querySelector(".loadingText").innerHTML = "Processing...";
}
function showStepTwo() {
    step = 2;
    textContainer.innerHTML = step2Text;
    formFields.innerHTML = passwordField;
    $("#password").focus();
    $("#password").siblings(".invalid-feedback").hide();
    submitButton.querySelector(".btnText").innerHTML = "Validate";
    submitButton.querySelector(".loadingText").innerHTML = "Validating...";
}
function showStepThree() {
    step = 3;
    helpLineBottom.innerHTML = supportLink;
    textContainer.innerHTML = step3Text;
    formFields.innerHTML = vendorSelection;
    submitButton.innerHTML = "Login";
    submitButton.querySelector(".loadingText").innerHTML = "logging in...";
}
