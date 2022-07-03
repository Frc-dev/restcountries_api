function ajaxCall(link, values) {
    return $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: link,
        type: "get",
        dataType: "json",
        data: values,
    });
}

function printJSONResult(result) {
    $("#countryTable").append(
        "<div class='result' style='width: 1200px; margin-left:40px; margin-top: 20px; font-size: 20px'>" + result.value + "</div><hr>"
    )
}