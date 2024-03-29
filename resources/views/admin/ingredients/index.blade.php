@include('admin.partials.header')
@include('admin.partials.left-menu', [
    'type' => 'ingredients'
])
<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    @include('admin.partials.navbar')
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        @if(Session::has('message'))
            <div class="alert {{ Session::get('alert-class', 'alert-info') }}" id="alert-message">
                {{ Session::get('message') }}
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Інгредієнти</h6>
                        <form action="{{ route('admin.ingredients.create') }}">
                            <button type="submit" class="btn btn-primary">Створити</button>
                        </form>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center justify-content-center mb-0">
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Назва</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Калорій на грам</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Оновити</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($ingredients as $ingredient)
                                        <tr>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $ingredient->name }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $ingredient->calories_per_gram }}</p>
                                            </td>
                                            </td>
                                            <td>
                                                <form action="{{ route('admin.ingredients.edit', ['id' => $ingredient->id]) }}">
                                                    <button type="submit" class="btn btn-primary">Оновити</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{ $ingredients->links() }}
        @include('admin.partials.footer')
    </div>
</main>
@include('admin.partials.footer-js')
