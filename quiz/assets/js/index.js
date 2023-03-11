$(document).ready(function () {

    $("#tarif").prop("disabled", true)
    $("#jurusan").on("change", function () {
        let jurusan = $("#jurusan").children("option").filter(":selected").val();

        let split = jurusan.split("$")

        $("#tarif").val(split[1])

    })
})