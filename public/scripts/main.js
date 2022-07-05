function ajaxCall(link, values) 
{
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

function insertCountry()
{
  let name = $("#insertName").val()
  let countryCode = $("#insertCountryCode").val()
  let capital = $("#insertCapital").val()
  let population = $("#insertPopulation").val()

  let values = {
    name, countryCode, capital, population
  }

  ajaxCall("/create", values).done(function (response) {
    alert("Country inserted successfully")

    location.reload()
  });
}

function updateCountriesWithApi()
{
  ajaxCall("/update/api").done(function (response) {
    location.reload()
  });
}

function deleteCountry(countryId)
{
  let values = {
    countryId
  }

  ajaxCall("/delete", values).done(function (response) {
    location.reload()
  });
}

function showEditModal()
{}

function updateCountry()
{}

function deleteAllCountries()
{
  ajaxCall("/delete/all").done(function (response) {
    location.reload()
  });
}

$(document).ready(function () 
{
  $(document).on('click', '#insertButton', function () {
    $(".insertModal").show()
  });

  $(document).on('click', '#insertSave', function () {
    insertCountry()
  });

  $(document).on('click', '#updateApiButton', function () {
    updateCountriesWithApi()
  });

  $(document).on('click', '.delete-button', function () {
    deleteCountry($(this).val())
  });

  $(document).on('click', '.edit-button', function () {
    showEditModal()
  });

  $(document).on('click', '#saveEdit', function () {
    updateCountry()
  });

  $(document).on('click', '#clearTableButton', function () {
    deleteAllCountries()
  });

});