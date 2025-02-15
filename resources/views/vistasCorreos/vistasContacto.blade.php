<x-mail::message>
    #Formulario de contacto
    Nombre: **{{$nombre}}**

    Email: **{{$email}}**

    <x-mail::panel>
        {{$body}}
    </x-mail::panel>
</x-mail::message>