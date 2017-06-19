<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>D&D Dashboard V1.0</title>

    <!-- Bootstrap Core CSS -->
    <link href="/assets/css/bootstrap.min.css?v=<?=time();?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/assets/css/sb-admin.css?v=<?=time();?>" rel="stylesheet">



    <!-- Custom Fonts -->
    <link href="/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- RPG Awesome Icons -->
    <link rel="stylesheet" href="/assets/Rpg-Awesome-master/css/rpg-awesome.css">

    <!-- jQuery -->
    <script type="text/javascript" src="/assets/js/jquery.min.js"></script>

    <!-- Dropdown menu -->
    <script type="text/javascript" src="/assets/js/bootstrap-dropdownhover.min.js"></script>
    <script type="text/javascript" src="/assets/css/bootstrap-dropdownhover.min.css"></script>
    <script type="text/javascript" src="/assets/css/animate.min.css"></script>

    <style type="text/css">
        
        #wrapper {
            padding-left: 0px !important;
        }

        #page-wrapper {
            padding: 10px;
            height: 100%;
        }


    </style>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<script type="text/javascript">
    




</script>  




    @include('layouts.partials._navigation')

    @include('layouts.partials._sidebar-home')

    @yield('content')

    @include('layouts.partials._footer')

</body>

</html>