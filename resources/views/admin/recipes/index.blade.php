@include('admin.partials.header')
@include('admin.partials.left-menu', [
    'type' => 'recipes'
])
<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
@include('admin.partials.navbar')
<!-- End Navbar -->
    <div class="container-fluid py-4">
        @if(Session::has('message'))
            <div class="alert alert-info" id="alert-message">
                <span style="color: white">{{ Session::get('message') }}</span>
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Рецепти</h6>

                        <form action="/admin/recipe-builder/create">
                            <button type="submit" class="btn btn-primary">Створити</button>
                        </form>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center justify-content-center mb-0">
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Назва</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Тип прийому</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Кількість порцій</th>
{{--                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Гілки</th>--}}
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Картинка</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Загрузити картинку</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Оновити</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Видалити</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($recipes as $recipe)
                                        <tr>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $recipe->title }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ config('recipes.type_of_meal')[$recipe->type_of_meal] }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $recipe->number_of_servings }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0"><img style="max-width: 60px" src="{{ $recipe->image_path }}"></p>
                                            </td>
                                            <td>
                                                <form action="/admin/recipe-builder/{{$recipe->id}}/upload-image" class="uploadForm" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div style="max-width: 180px">
                                                        <input type="file" placeholder="" style="max-width: 650px" class="form-control fileInput" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="image" id="fileInput">
                                                    </div>
                                                </form>
                                            </td>
{{--                                            <td>--}}

{{--                                                @foreach($recipe->ingredients as $branch)--}}
{{--                                                    <p class="text-sm font-weight-bold mb-0">--}}
{{--                                                        {{ $branch->name }}--}}
{{--                                                    </p>--}}
{{--                                                @endforeach--}}
{{--                                            </td>--}}
                                            <td>
                                                <form action="/admin/recipe-builder/{{$recipe->id}}/edit">
                                                    <button type="submit" class="btn btn-primary">Оновити</button>
                                                </form>
                                            </td>
                                            <td class="align-middle text-center">
                                                <button type="submit" class="btn btn-danger" onclick="remove({{ $recipe->id }})">Видалити</button>
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
        {{ $recipes->links() }}
        @include('admin.partials.footer')
    </div>
</main>
@include('admin.partials.footer-js')
