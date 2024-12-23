<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
  <script type="text/javascript"
  src="https://app.sandbox.midtrans.com/snap/snap.js"
  data-client-key="{{config('midtrans.client_key')}}"></script>
<!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->

  <title>@yield('title', 'Dashboard')</title>

  

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <!-- External CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-vVn5lQuuV9FOG9kn7IqW5LfWIfBR/QMtwPmR2JweAAnWt8/XZuwEfjvYlyNht5R/Xap2o5+hj4rIwrfuBavZow=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

</head>

<body>
  <!-- Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">

    @include('layout.sidebar') <!-- Sidebar -->

    <!-- Main Wrapper -->
    <div class="body-wrapper">
      @include('layout.header') <!-- Navbar -->

      <!-- Main Content -->
      <div class="container-fluid">
        @yield('content') <!-- Konten dinamis -->
      </div>
    </div>
  </div>

  <!-- External JS -->
  <script src="{{ asset('assets/js/custom.js') }}"></script>
  <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>


</body>

</html>
