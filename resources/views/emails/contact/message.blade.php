@component('mail::message')
# Nouveau message de contact

**Nom** : {{ $name }}

**Email** : {{ $email }}

**Message** :

{{ $message }}

Merci,
{{ config('app.name') }}
@endcomponent
