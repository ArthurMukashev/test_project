$(document).ready(function () {
    $("input[name='snils']").mask("999-999-999 99");
    $("input[name='polis']").mask("9999 9999 9999 9999");
    $("#submit-form").on('submit', function (event) {
        event.preventDefault();
        let timerInterval;
        swal.fire({
            title: 'Сохранение',
            html: 'Пожалуйста, подождите...',
            onBeforeOpen: () => {
                $('#err_list').html('');
                $('#errors').attr('class', '');
                swal.showLoading();
                $.ajax({
                    url: 'submit-form',
                    type: 'POST',
                    data: $("#submit-form").serialize(),
                    success: function (response) {
                        switch (response) {
                            case 'Polis changed':{
                                swal.fire('Успешно!','Полис обновлен','success');
                                break;
                            }
                            case 'FIO polis changed':{
                                swal.fire('Успешно!','ФИО и полис обновлены','success');
                                break;
                            }
                            case 'Saved':{
                                swal.fire('Успешно!','Запись добавлена','success');
                                break;
                            }
                            default:break;
                        }
                    },
                    error: function (response) {
                        var a = response.responseJSON.errors;
                        var errs = ['name', 'surname', 'otch', 'birthdate', 'snils', 'polis'];
                        errs.forEach(function (element) {
                            if (a != null) {
                                if (a[element] !== undefined) {
                                    $("#errors").attr('class', 'alert alert-danger');
                                    a[element].forEach(elem => $("#err_list").append('<li>' + elem + '</li>'));
                                }
                            }
                        })

                        if (response.status === 422) {
                            swal.fire({
                                title: 'Ошибка!',
                                html: 'Проверьте введенные данные.',
                                icon: 'error'
                            })
                        } else {
                            swal.fire({
                                title: 'Ошибка!',
                                html: response.responseJSON.message,
                                icon: 'error'
                            })
                        }

                    }

                })
            },
            timer: 1000,
            onClose: () => {
                clearInterval(timerInterval);
            }
        })
    })
})
