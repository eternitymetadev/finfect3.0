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
