<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html " target="_blank">
{{--            <img src="/admin/assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">--}}
            <span class="ms-1 font-weight-bold">Панель рецептів</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            @include('admin.partials.left-menu-item', [
                    'route' => '/',
                    'name' => 'Головна',
                    'isActive' => false
                ])
            @if($type === 'recipes')
                @include('admin.partials.left-menu-item', [
                    'route' => route('admin.recipes.index'),
                    'name' => 'Рецепти',
                    'isActive' => true
                ])
            @else
                @include('admin.partials.left-menu-item', [
                    'route' => route('admin.recipes.index'),
                    'name' => 'Рецепти',
                    'isActive' => false
                ])
            @endif
                @if($type === 'ingredients')
                    @include('admin.partials.left-menu-item', [
                        'route' => route('admin.ingredients'),
                        'name' => 'Інгрідієнти',
                        'isActive' => true
                    ])
                @else
                    @include('admin.partials.left-menu-item', [
                        'route' => route('admin.ingredients'),
                        'name' => 'Інгрідієнти',
                        'isActive' => false
                    ])
                @endif
        </ul>
    </div>
{{--    <div class="sidenav-footer mx-3 ">--}}
{{--        <div class="card card-plain shadow-none" id="sidenavCard">--}}
{{--            <img class="w-50 mx-auto" src="/admin/assets/img/illustrations/icon-documentation.svg" alt="sidebar_illustration">--}}
{{--            <div class="card-body text-center p-3 w-100 pt-0">--}}
{{--                <div class="docs-info">--}}
{{--                    <h6 class="mb-0">Хочеш вийти?</h6>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <form id="logout-form" action="{{ route('logout') }}" method="POST">--}}
{{--            @csrf--}}
{{--            <button type="submit" class="btn btn-dark btn-sm w-100 mb-3">Вихід</button>--}}
{{--        </form>--}}
    </div>
</aside>
