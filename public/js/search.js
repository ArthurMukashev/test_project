$(document).ready(function () {
    $("input[name='snils']").mask("999-999-999 99");
    $("input[name='polis']").mask("9999 9999 9999 9999");
    $("#search-form").on('submit', function (event) {
        event.preventDefault();
        let timerInterval;
        swal.fire({
            title: 'Поиск',
            html: 'Пожалуйста, подождите',
            onBeforeOpen: () => {
                swal.showLoading();
                search();
            },
            timer: 1000,
            onClose: () => {
                clearInterval(timerInterval);
            }
        })
    })
})

function search() {
    $.ajax({
        url: 'list-client-submit',
        type: 'GET',
        data: $("#search-form").serialize(),
        success: function (response) {
            $("#search-result").html("");
            if (response === "empty") {
                swal.fire('Ошибка!', 'Ни одно из полей не заполнено', 'error');
            } else {
                a = JSON.parse(response);
                if (a != null) {
                    a.forEach(function (element) {
                        $("#search-result").append("<tr>" +
                            "<td>" + element["surname"] + "</td> " +
                            "<td>" + element["name"] + "</td>" +
                            "<td>" + element["otch"] + "</td>" +
                            "<td>" + element['birthdate'] + "</td>" +
                            "<td>" + element["snils"] + "</td>" +
                            "<td>" + element["polis"] + "</td>" +
                            "</tr>");
                    })
                }
            }

        },
        error: function (error) {
            console.log(error);
        }
    })
}
