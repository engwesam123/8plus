
@component('mail::message')

<style>
    span{
        font-weight: bold;
    }
</style>
<span > {{ t('Mail from') }}</span> : {{ $contact_us->email }}
<br>
<span >{{ t('Full Name') }}</span>  : {{ $contact_us->full_name }} <br>
<span >{{ t('Subject') }} </span> : {{ $contact_us->subject }} <br>
<br>
<span >{{ t('Message') }}</span>  : {{ $contact_us->message }} <br>
<br>
@component('mail::button', ['url' => route('UI.index') ])
<span >{{ t("Home") }}</span>
@endcomponent

<span >{{ t('Thanks') }},{{  $contact_us->email }}
<br>

@php
    $setting = App\Setting::first()
@endphp
<span >{{ $setting->blog_name }}</span>
@endcomponent
