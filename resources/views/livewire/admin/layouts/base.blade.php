<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">

<head>

    <meta charset="utf-8" />
    <title>Dashboard | NZCoding</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/admin/images/favicon.ico') }}">

    <!-- jsvectormap css -->
    <link href="{{ asset('assets/admin/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet"
        type="text/css" />

    <!--Swiper slider css-->
    <link href="{{ asset('assets/admin/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Layout config Js -->
    <script src="{{ asset('assets/admin/js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/admin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/admin/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('assets/admin/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Sweet Alert css-->
    <link href="{{ asset('assets/admin/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- custom cdn-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

    @stack('styles')
    @livewireStyles
</head>
<style>
   
    .page-content {
        margin-top: 5px;
    }

    .page-title-box {
        background: transparent;
        box-shadow: none;
    }

    .spinner-border-sm {
        width: 12px;
        height: 12px;
        border-width: 1px;
    }

    .spinner-border-xs {
        width: 10px;
        height: 10px;
        border-width: 1px;
    }

    .sinput {
        border: 1px solid #CED4DA;
        border-radius: 4px;
        padding: 5px 7px;
        font-size: 12.5px;
    }

    .sinput:focus {
        border: 1px solid #046A70;
        box-shadow: none;
        outline: none;
    }

    .search_cont {
        text-align: right;
    }

    .sort_cont {
        text-align: left;
    }

    @media screen and (max-width: 720px) {
        .search_cont {
            text-align: center;
        }

        .sort_cont {
            text-align: center;
        }
    }

    .btn-sm {
        padding: 5px 17px;
        font-size: 13.5px;
    }
</style>

<body>
    <div id="layout-wrapper">
        @livewire('admin.layouts.inc.navbar')
        @livewire('admin.layouts.inc.sidebar')
        <div class="vertical-overlay"></div>

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    {{ $slot }}
                </div>
            </div>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © NZCoding.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by NZCoding
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('assets/admin/js/plugins.js') }}"></script>

    <!-- apexcharts -->
    <script src="{{ asset('assets/admin/libs/apexcharts/apexcharts.min.js') }}"></script>
    <!-- Vector map-->
    <script src="{{ asset('assets/admin/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/jsvectormap/maps/world-merc.js') }}"></script>
    <!--Swiper slider js-->
    <script src="{{ asset('assets/admin/libs/swiper/swiper-bundle.min.js') }}"></script>
    <!-- Dashboard init -->
    <script src="{{ asset('assets/admin/js/pages/dashboard-ecommerce.init.js') }}"></script>
    <!-- App js -->
    <script src="{{ asset('assets/admin/js/app.js') }}"></script>

    <!-- Sweet Alerts js -->
    <script src="{{ asset('assets/admin/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        $(document).ready(function() {
            toastr.options = {
                "progressBar": true,
                "positionClass": "toast-bottom-left"
            };
        });

        window.addEventListener('success', event => {
            toastr.success(event.detail.message);
        });
        window.addEventListener('warning', event => {
            toastr.warning(event.detail.message);
        });
        window.addEventListener('error', event => {
            toastr.error(event.detail.message);
        });
        @if (Session::has('success'))
            toastr.options = {
                "progressBar": true,
                "positionClass": "toast-bottom-left"
            }
            toastr.success("{{ session('success') }}");
        @endif
        @if (Session::has('error'))
            toastr.options = {
                "progressBar": true,
                "positionClass": "toast-top-right"
            }
            toastr.error("{{ session('error') }}");
        @endif

        //SWL
        window.addEventListener('show-delete-confirmation', event => {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: !0,
                confirmButtonClass: "btn btn-primary w-xs me-2 mt-2",
                cancelButtonClass: "btn btn-danger w-xs mt-2",
                confirmButtonText: "Yes, delete it!",
                buttonsStyling: !1,
                showCloseButton: !0
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deleteConfirmed')
                }
            })
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.statusPreLoad').on('click', function() {
                $(this).html(
                    '<span class="spinner-border spinner-border-xs" role="status" aria-hidden="true"></span>'
                    );
            });
            $('.btnPreLoad').on('click', function() {
                $(this).html(
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'
                    );
            });
        });
    </script>

    @stack('scripts')
    @livewireScripts
</body>

</html>
