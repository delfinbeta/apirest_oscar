<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('css/fonts.css')}}" rel="stylesheet">
  <link href="{{asset('css/app.css')}}" rel="stylesheet">
  <link href="{{asset('css/sb-admin-2.css')}}" rel="stylesheet">
</head>

<body id="page-top">

<div id="app">
<flat-pickr v-model="date" @on-change="doSomethingOnChange" @on-close="doSomethingOnClose"></flat-pickr>

</div>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('js/app.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('js/sb-admin-2.js')}}"></script>

  <script src="{{asset('js/all.js')}}"></script>
</body>

</html>