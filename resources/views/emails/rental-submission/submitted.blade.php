@component('mail::message')
# Hai, {{ $submission->student->name }}

Permohonan sewa loker anda telah kami terima dan akan segera di proses segera. Berikut adalah detail permohonan anda. Silahkan kunjungi halaman permohonan anda untuk mengetahui informasi lebih lanjut dengan menekan tombol di bawah ini.

@component('mail::table')
| No. Permohonan| status         | Tanggal Pengajuan  |
| ------------- |:--------------:| ------------------:|
|{{ $submission->id }}| {{$submission->approved == 0 ? 'belum disetujui' : 'disetujui'}} | {{ $submission->created_at }}|
@endcomponent

@component('mail::button', ['url' => $submission->path()])
Detail Permohonan
@endcomponent

Terima Kasih,<br>
{{ config('app.name') }}
@endcomponent
