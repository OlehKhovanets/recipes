@include('admin.partials.header')
@include('admin.partials.left-menu', [
    'type' => 'recipes'
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
                        <h5>Оновити питання та відповідь</h5>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <div class="align-items-center justify-content-center mb-0"></div>

                                <div class="ce-example__content _ce-example__content--small">
                                    <label>Ім'я запитання: </label>
                                    <div style="display: flex; justify-content: center">
                                        <input type="text" value="{{ $recipe->title }}" placeholder="Enter question" style="max-width: 650px" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="title" id="title">
                                    </div>
                                    <label>Відповідь: </label>
                                    <div id="editorjs"></div>

                                    <div class="ce-example__button" id="saveButton">
                                        <button onclick="saveData()" class="btn btn-dark btn-sm">Зберегти дані</button>
                                    </div>
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
@include('admin.partials.questions.js-footer-for-update')
