<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? config('app.name') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="/js/jquery.js"></script>
    <style>
        body {
            overflow-x: hidden;
        }

        .shadow-1 {
            box-shadow: 0 0 10px gray;
        }

        .shadow-input {
            box-shadow: 0 0 5px blue;
        }
    </style>
</head>

<body>

    @include('components.navbar')

    <main class="flex justify-center">
        {{ $slot }}
    </main>
</body>

</html>
