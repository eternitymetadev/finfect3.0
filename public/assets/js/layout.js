let drawerState = localStorage.getItem("drawerState");

var urlSlashCount = window.location.href.split("/").length - 1;

if (urlSlashCount > 3)
    var activeRoute = window.location.href.replace(
        /^(([^\/]*\/){3}[^\/]*)\/.*/,
        "$1"
    );
else var activeRoute = window.location.href;

$(document).ready(function () {
    // to change theme onload
    var currentMode = localStorage.getItem("themeMode");
    currentMode === "dark"
        ? $("body").addClass("darkMode")
        : $("body").removeClass("darkMode");

    // to show active state on drawer items
    $(`li.menu a.nav-link`).closest("li.menu").removeClass("active");

    $(`li.menu a.nav-link[href="${activeRoute}"]`)
        .closest("li.menu")
        .addClass("active");

    $(`ul.nav-content li.menu a.nav-link[href="${activeRoute}"]`)
        .closest("ul.nav-content")
        .addClass("show");

    $(`a.nav-link[href="${activeRoute}"]`)
        .closest("ul.nav-content")
        .prev("a.nav-link.collapsed")
        .attr("aria-expanded", "true");

    // to set drawer state
    $("#loading").addClass("active");
    if (drawerState != null) {
        if (drawerState == "open") {
            $("#sidebar").removeClass("close");
            $(".openIcon").addClass("none");
            $(".closeIcon").removeClass("none");
            $(".longLogo").removeClass("none");
            $(".squareLogo").addClass("none");
            $("#loading").removeClass("active");
        }
        if (drawerState == "close") {
            $("#sidebar").addClass("close");
            $(".openIcon").addClass("none");
            $(".closeIcon").removeClass("none");
            $(".longLogo").addClass("none");
            $(".squareLogo").removeClass("none");
            $("#loading").removeClass("active");
        }
    } else {
        $("#sidebar").removeClass("close");
        $(".openIcon").addClass("none");
        $(".closeIcon").removeClass("none");
        $(".longLogo").removeClass("none");
        $(".squareLogo").addClass("none");
        $("#loading").removeClass("active");
    }

    // to toggle drawer state
    $(".toggleSidebar").click(function () {
        $("#sidebar").toggleClass("close");
        $(".toggleIcon").toggleClass("none");
        $(".logo").toggleClass("none");
        if (drawerState == "close") {
            localStorage.setItem("drawerState", "open");
        } else {
            localStorage.setItem("drawerState", "close");
        }
    });

    // to close drawer onload if screen is for mobile
    if (window.innerWidth < 600) {
        $("aside.sidebar").addClass("close");
    }

    $("#toggleTheme").click(function () {
        var currentMode = localStorage.getItem("themeMode");
        var newMode = currentMode === "dark" ? "light" : "dark";
        localStorage.setItem("themeMode", newMode);
        $("body").toggleClass("darkMode");
    });

    // other global js
    $(document).on("keypress", "input[type='number']", function (e) {
        let charCode = e.which ? e.which : e.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
    });
    $(document).on("keypress", "input.number", function (e) {
        let charCode = e.which ? e.which : e.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
    });

    // indian currency formatter
    function formatIndianCurrency(amount) {
        var number = parseFloat(amount);
        if (!isNaN(number)) {
            var formattedAmount = number.toLocaleString("en-IN", {
                style: "currency",
                currency: "INR",
            });

            return formattedAmount;
        }
        return amount;
    }

    // remove error on input change
    $(document).on("keyup", "input", (event) => {
        $(event.target).siblings(".invalid-feedback").hide();
    });

    // Example starter JavaScript for disabling form submissions if there are invalid fields
    // (() => {
    //     "use strict";

    //     // Fetch all the forms we want to apply custom Bootstrap validation styles to
    //     const forms = document.querySelectorAll(".needs-validation");

    //     // Loop over them and prevent submission
    //     Array.from(forms).forEach((form) => {
    //         form.addEventListener(
    //             "submit",
    //             (event) => {
    //                 if (!form.checkValidity()) {
    //                     event.preventDefault();
    //                     event.stopPropagation();
    //                 }

    //                 form.classList.add("was-validated");
    //             },
    //             false
    //         );
    //     });
    // })();

    // ---for drag and drop file input---
    $(".dragAndDrop").change(function () {
        const file = this.files[0];
        const nameTag = $(this).siblings("span.fileName");
        const rendorImage = $(this).siblings("img.rendoredImage");
        const openImage = $(this).parent().siblings("a.openImage");
        const uploadButton = $(this).parent().siblings(".uploadButton");
        if (file) {
            let reader = new FileReader();
            reader.onload = function (event) {
                nameTag.html(`${file.name}`);
                rendorImage.attr("src", event.target.result);
                openImage.attr("href", event.target.result);
                uploadButton.removeClass("disabled");
            };
            reader.readAsDataURL(file);
        }
    });

    $(".clearFileInput").on("click", function (event) {
        const input = $(this)
            .siblings("label.dropArea")
            .children("input.dragAndDrop");
        const nameTag = $(this)
            .siblings("label.dropArea")
            .children("span.fileName");
        const rendorImage = $(this)
            .siblings("label.dropArea")
            .children("img.rendoredImage");
        const uploadButton = $(this).siblings(".uploadButton");

        input.val("");
        nameTag.html("");
        rendorImage.attr("src", "/assets/images/dragAndDrop.png");
        uploadButton.addClass("disabled");
    });

    $(".uploadButton").on("click", function (event) {
        const processBlock = $(this).siblings(".process");
        processBlock.addClass("processing");
        const input = $(this)
            .siblings("label.dropArea")
            .children("input.dragAndDrop");
        setTimeout(() => {
            processBlock.removeClass("processing");
            $(this).addClass("disabled");
            input.val("");
        }, 1500);
    });
    // ---for drag and drop file input end---

    // for global loading
    function startWorking() {
        $("#loading").addClass("working");
    }
    function stopWorking() {
        $("#loading").removeClass("working");
    }
});
