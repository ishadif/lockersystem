@component('mail::message')
# Introduction

Selamat! akun anda telah dibuat dan dapat mengakses Sistem Loker Universitas Bakrie. NIM anda adalah {{ $student->id }} dan password anda: "{{ $student->id }}@password". segera ubah password anda untuk menjaga keamanan akun anda.

@component('mail::button', ['url' => '/login'])
akses sistem loker
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
