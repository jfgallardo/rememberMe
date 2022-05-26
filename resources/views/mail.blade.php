<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notification</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>

    <script src="https://cdn.tailwindcss.com"></script>
    

</head>
<body>
    <h1 class="text-3xl font-bold underline">
        Hello {{$name}}
      </h1>
    <div>se le esta notificando la tarea {{$title}} para realizar en el dia de hoy</div>
    
</body>
</html>