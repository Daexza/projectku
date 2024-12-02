<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modernize Free</title>

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />

  <!-- External CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />

</head>

<body>
  <!-- Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">

  @include('layout.sidebar')
    <!-- Main Wrapper -->
    <div class="body-wrapper">
    @include('layout.navbar')

      <!-- Main Content -->
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <h1>Welcome to the Dashboard</h1>
            <p>This is the main content area.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- External JS -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>

</html>
