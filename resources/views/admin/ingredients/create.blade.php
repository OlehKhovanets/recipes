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
                        <h5>Додати нову гілку</h5>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <div class="align-items-center justify-content-center mb-0"></div>
                                <div class="ce-example__content _ce-example__content--small">
                                    <form action="{{ route('admin.ingredients.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <label>Назва інгредієнту: </label>
                                        <div style="display: flex; justify-content: center" class="form-group">
                                            <input type="text" placeholder="Ввести назву" style="max-width: 650px" class="form-control @error('name') is-invalid @enderror" aria-label="Default" value="{{ old('name') }}" aria-describedby="inputGroup-sizing-default" name="name">
                                        </div>
                                        <label>Містить калорій на грам: </label>
                                        <div style="display: flex; justify-content: center">
                                            <input type="number" step="0.01" placeholder="Ввести кількість калорій на грам" style="max-width: 650px" value="{{ old('calories_per_gram') }}" class="form-control @error('calories_per_gram') is-invalid @enderror" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="calories_per_gram">
                                        </div>
                                        <div class="ce-example__button">
                                            <button type="submit" class="btn btn-dark btn-sm">Зберегти дані</button>
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
