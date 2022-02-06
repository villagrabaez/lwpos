<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="{{ asset('assets/css/loader.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('assets/js/loader.js') }}"></script>
<link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
<link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
<!-- END GLOBAL MANDATORY STYLES -->

<link rel="stylesheet" href="{{ asset('plugins/sweetalerts/sweetalert2.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/notification/snackbar/snackbar.min.css') }}">

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
<link href="{{ asset('plugins/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" class="dashboard-analytics" />
<!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

<style>
  aside {
    display: none !important;
  }
  .page-item.active .page-lilnk {
    z-index: 3;
    color: #fff;
    background-color: #3b3f5c;
    border-color: #3b3f5c;
  }
  @media (max-width: 400px) {
    .mtmobile {
      margin-bottom: 20px !important;
    }
    .mbmobile {
      margin-bottom: 10px !important;
    }
    .hideonsm {
      display: none !important;
    }
    .inblock {
      display: block;
    }
  }
</style>

@livewireStyles