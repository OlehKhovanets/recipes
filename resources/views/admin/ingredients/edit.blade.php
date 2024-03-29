@include('admin.partials.header')
@include('admin.partials.left-menu', [
    'type' => 'ingredients'
])
<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    @include('admin.partials.navbar')
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h5>Оновити гілку</h5>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <div class="align-items-center justify-content-center mb-0"></div>
                                <div class="ce-example__content _ce-example__content--small">
                                    <form action="{{ route('admin.ingredients.update', ['id' => $ingredient->id]) }}" method="POST"  enctype="multipart/form-data">
                                        @csrf
                                        <label>Назва інгредієнту: </label>
                                        @error('name')
                                        <div style="color: red">Поле не може бути пустим</div>
                                        @enderror
                                        <div style="display: flex; justify-content: center">
                                            <input type="text" placeholder="Ввести назву" style="max-width: 650px" value="{{ $ingredient->name }}" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="name">
                                        </div>
                                        <label>Кількість калорій на грам: </label>
                                        @error('name')
                                        <div style="color: red">Поле не може бути пустим</div>
                                        @enderror
                                        <div style="display: flex; justify-content: center">
                                            <input type="number" placeholder="Ввести назву" style="max-width: 650px" value="{{ $ingredient->calories_per_gram }}" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="calories_per_gram">
                                        </div>
                                        <div class="ce-example__button">
                                            <button type="submit" class="btn btn-dark btn-sm">Оновити дані</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.partials.footer')
    </div>
</main>
@include('admin.partials.footer-js')
