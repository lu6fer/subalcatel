<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Subalcatel</title>
        <!-- Bootstrap css -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link rel="stylesheet" href="//rawgithub.com/mgcrea/bootstrap-additions/master/dist/bootstrap-additions.min.css">
        <link rel="stylesheet" href="//rawgithub.com/mgcrea/angular-motion/master/dist/angular-motion.min.css">
        <link rel="stylesheet" href="{{ elixir('css/subalcatel.css') }}">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body ng-app="subalcatelApp">
        <div ng-controller="main">
            <div navbar></div>
            <div content></div>
            <div footer class="hidden-xs"></div>
        </div>

        <script type="text/javascript"
                src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.js"></script>
        <script type="text/javascript"
                src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular-animate.js"></script>
        <script type="text/javascript"
                src="https://cdnjs.cloudflare.com/ajax/libs/angular-strap/2.2.1/angular-strap.js"></script>
        <script type="text/javascript"
                src="https://cdnjs.cloudflare.com/ajax/libs/angular-strap/2.2.1/angular-strap.tpl.js"></script>
        <script type="text/javascript"
                src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.2.14/angular-ui-router.min.js"></script>

        <!--<script type="text/javascript"
                src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
        <script type="text/javascript"
                src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular-animate.min.js"></script>
        <script type="text/javascript"
                src="https://cdnjs.cloudflare.com/ajax/libs/angular-strap/2.2.1/angular-strap.min.js"></script>
        <script type="text/javascript"
                src="https://cdnjs.cloudflare.com/ajax/libs/angular-strap/2.2.1/angular-strap.tpl.min.js"></script>-->
        <script type="text/javascript" src="{{ elixir('js/subalcatel.js') }}"></script>
    </body>
</html>