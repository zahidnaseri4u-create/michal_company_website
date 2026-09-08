<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dashboard | Tapeli - Responsive Admin Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Zoyothemes">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

```
<link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico') }}">
<link href="{{ asset('backend/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style">
<link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
```

</head>

<body data-menu-color="light" data-sidebar="default">

```
<div id="app-layout">

    @include('admin.body.header')

    @include('admin.body.sidebar')

    <div class="content-page">

        @yield('admin')

        @include('admin.body.footer')

    </div>

</div>

@if(session('success') || session('error') || session('warning') || session('info') || $errors->any())

    <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 99999;">

        @if(session('success'))
            <div class="toast align-items-center text-bg-success border-0" role="alert">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('success') }}
                    </div>

                    <button
                        type="button"
                        class="btn-close btn-close-white me-2 m-auto"
                        data-bs-dismiss="toast"
                        aria-label="Close">
                    </button>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="toast align-items-center text-bg-danger border-0" role="alert">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('error') }}
                    </div>

                    <button
                        type="button"
                        class="btn-close btn-close-white me-2 m-auto"
                        data-bs-dismiss="toast"
                        aria-label="Close">
                    </button>
                </div>
            </div>
        @endif

        @if(session('warning'))
            <div class="toast align-items-center text-bg-warning border-0" role="alert">
                <div class="d-flex">
                    <div class="toast-body text-dark">
                        {{ session('warning') }}
                    </div>

                    <button
                        type="button"
                        class="btn-close me-2 m-auto"
                        data-bs-dismiss="toast"
                        aria-label="Close">
                    </button>
                </div>
            </div>
        @endif

        @if(session('info'))
            <div class="toast align-items-center text-bg-info border-0" role="alert">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('info') }}
                    </div>

                    <button
                        type="button"
                        class="btn-close me-2 m-auto"
                        data-bs-dismiss="toast"
                        aria-label="Close">
                    </button>
                </div>
            </div>
        @endif

        @if($errors->any())
            <div class="toast align-items-center text-bg-danger border-0" role="alert">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ $errors->first() }}
                    </div>

                    <button
                        type="button"
                        class="btn-close btn-close-white me-2 m-auto"
                        data-bs-dismiss="toast"
                        aria-label="Close">
                    </button>
                </div>
            </div>
        @endif

    </div>

@endif

<script src="{{ asset('backend/assets/libs/jquery/jquery.min.js') }}"></script>

<script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('backend/assets/libs/simplebar/simplebar.min.js') }}"></script>

<script src="{{ asset('backend/assets/libs/node-waves/waves.min.js') }}"></script>

<script src="{{ asset('backend/assets/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>

<script src="{{ asset('backend/assets/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>

<script src="{{ asset('backend/assets/libs/feather-icons/feather.min.js') }}"></script>

<script src="{{ asset('backend/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

<script src="https://apexcharts.com/samples/assets/stock-prices.js"></script>

<script src="{{ asset('backend/assets/js/pages/analytics-dashboard.init.js') }}"></script>

<script src="{{ asset('backend/assets/js/app.js') }}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.toast').forEach(function (toastElement) {
            const toast = new bootstrap.Toast(toastElement, {
                delay: 4000
            });

            toast.show();
        });
    });
</script>
```

</body>

</html>
