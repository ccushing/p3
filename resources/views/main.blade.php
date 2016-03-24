<!DOCTYPE html>
<html>
<head>

    <title>Charles Cushing P3 - CSCI E-15 : Developer's Best Friend</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/6.1.1/css/bootstrap-slider.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/6.1.1/bootstrap-slider.min.js"></script>
    <link href='css/p3.css' rel='stylesheet'>

</head>
<body>

    <div class="container">


        <div class="row">
            <div class="col-md-10">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h1 class="panel-title">CSCI E-15 : Project #3</h1>
                        <h2>Developer's Best Friend</h2>
                        <h5><span class="label label-author pull-right">Submitted by : Charles Cushing</span></h5>
                    </div>

                    <div class="panel-body">
                        

                        <p>Developer's best friend contains components which generate random data for developer's to use for testing their code. The first component, called Lorem Ipsum Generator, generates random text. Options are provided for randomly including headers and lists in the randomly generated text. The second component, called Random User Generator, generates up to 100 random users and provides options for including different fields including a face pic.  </p>


                        @yield('active-component')
                        
                    </div>
                </div>

            </div>

        </div>

    </div>

    <script src="js/p3.js" type="text/javascript"></script>

</body>




</html>
