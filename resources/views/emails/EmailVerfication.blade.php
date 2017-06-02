@component('mail::message')
# Confirmación de cuenta Virtual IVR

Para confirmar su cuenta de click en el siguiente vínculo.

@component('mail::button', ['url' => url('verifyemail') . '/' . $email_token])
Verificar
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
