<div class="row">
    <div class="col-lg-5 col-md-8">
        <form action="{{ route('submit') }}" method="post" id="submit-form">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" name="surname" class="form-control" placeholder=" ">
                <label>Введите фамилию</label>
                <div class="invalid-feedback">
                    Пожалуйста, заполните поле
                </div>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="name" class="form-control" placeholder=" ">
                <label>Введите имя</label>
                <div class="invalid-feedback">
                    Пожалуйста, заполните поле
                </div>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="otch" class="form-control" placeholder=" ">
                <label>Введите отчество</label>
                <div class="invalid-feedback">
                    Пожалуйста, заполните поле
                </div>
            </div>
            <div class="form-floating mb-3">
                <input type="date" min="1940-01-01" max="{{ date("Y-m-d") }}" name="birthdate" class="form-control" placeholder=" ">
                <label>Введите дату рождения</label>
                <div class="invalid-feedback">
                    Пожалуйста, заполните поле
                </div>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="snils" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3} [0-9]{2}" class="form-control" placeholder=" ">
                <label>Введите номер СНИЛС</label>
                <div class="invalid-feedback">
                    Пожалуйста, заполните поле
                </div>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="polis" class="form-control" placeholder=" ">
                <label>Введите номер полиса ОМС</label>
                <div class="invalid-feedback">
                    Пожалуйста, заполните поле
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Сохранить</button>
        </form>
    </div>
</div>
