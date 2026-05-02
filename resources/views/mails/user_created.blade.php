<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ env('APP_NAME') }}</title>

    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            <label>Estimado usuario: {{$data['user']->name}} {{$data['user']->last_name}} </label><br><br>
            <label>Se le informa que se le ha creado una cuenta en: <strong>PeopleExperts</strong> con los siguientes datos: </label><br><br>
            <fieldset>
                <legend>Credenciales</legend>
                <p>Usuario: {{$data['user']->email}}</p>
                <p>Contraseña: {{$data['textPlainPass']}} </p>
                <p>Url: {{$data['url']}} </p>
                </fieldset>
            <p>Saludos</p>
        </div>
    </body>
</html>
