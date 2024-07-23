<x-mail::message>
    # Verificación de correo electrónico

    Hola {{ $user->name }},
    en el siguiente enlace puedes verificar tu correo electrónico:

    <x-mail::button :url="$url">
        Verificar correo electrónico
    </x-mail::button>

</x-mail::message>
