// currency formatter
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
$(".currency").each(function () {
    if (+$(this).text() < 0) $(this).addClass("negative");
    if (+$(this).text() >= 0) $(this).addClass("positive");
    $(this).text(formatIndianCurrency($(this).text()));
});

// for password input
$(document).on("click", ".inputIcon", function () {
    if ($(this).siblings("input").attr("type") == "password")
        $(this).siblings("input").attr("type", "text");
    else $(this).siblings("input").attr("type", "password");

    $(this).parent().children(".right").toggle();
});
