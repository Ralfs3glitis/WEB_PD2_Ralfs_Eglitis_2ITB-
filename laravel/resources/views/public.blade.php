<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <meta name="description" content="Books n stuff">
</head>

<body>
    <div id="root"></div>
    
    @viteReactRefresh
    @vite('resources/js/index.jsx')
</body>

</html>
