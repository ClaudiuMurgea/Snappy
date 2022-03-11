<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('dist/images/logo.svg') }}" rel="shortcut icon">
    <title>Product</title>
    <link rel="stylesheet" href="{{ 'tailwind/app.css' }}" />
    @livewireStyles()
</head>
<body>
    
    {{ $slot }}

    @livewireScripts()
</body>
</html>