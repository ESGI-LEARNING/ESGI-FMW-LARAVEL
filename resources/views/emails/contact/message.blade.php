@component('mail::message')
# Nouveau message de contact

**Nom** : {{ $details['name'] }}

**Email** : {{ $details['email'] }}

**Message** :

{{ $details['message'] }}

Merci,
{{ config('app.name') }}
@endcomponent
