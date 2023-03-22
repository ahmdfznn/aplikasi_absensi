<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="/js/jquery.js"></script>
    <style>
        .shadow-1 {
            box-shadow: 0 0 10px gray;
        }

        .shadow-input {
            box-shadow: 0 0 10px indigo;
        }
    </style>
</head>

<body class="flex justify-center items-center w-screen h-screen bg-gray-300">
    <main
        class="p-10 pt-24 shadow-1 border border-gray-600/50 relative bg-white rounded-lg flex flex-col items-center justify-evenly">
        {{ $slot }}
    </main>
</body>

</html>
