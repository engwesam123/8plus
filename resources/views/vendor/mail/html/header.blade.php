<tr>
<td class="header">
<a href="{{ route('UI.index') }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')

{{-- @php
    $setting = App\Setting::first()
@endphp
@if ($setting )
<img src="{{ $setting->miniLogo }}" width="300px" class="logo" alt="{{ $setting->blog_name }}">
@endif --}}
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
