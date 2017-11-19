<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Backend') }}</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
        @yield('style-custom')

    </head>
    <body>

        <div class="container">  
            <div class="page-header">
                
                @include('flash::message')

                <h1>Developers SAC</h1>
                <p class="text-right">
                    <a href="{{ route('employee.form') }}" class="btn btn-default">
                    New Employee
                    </a>
                </p>
            </div>

            @yield('content')
            
            <footer class="footer">
                <hr>
                <p class="text-right">© {{ date('Y') }} Company, Inc.</p>
            </footer>

        </div> 

        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        @yield('script-custom')

    </body>
</html>
