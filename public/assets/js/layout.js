let drawerState = localStorage.getItem("drawerState");
let activeRoute = window.location.pathname;

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
});
