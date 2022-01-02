@extends('frontend.front')
@section('title'){{ w('Contact') }}@endsection
@section('content')

<div role="main" class="main">
    <section class="section section-tertiary section-no-border pb-3 mt-0">
        <div class="container">
            <div class="row col-lg-10 pt-4">
                <div class="col ">
                    <h2 class="text-uppercase font-weight-light mt-4 pt-3 text-color-primary">{{ w('Contact Us') }}</h2>
                </div>
            </div>

        </div>
    </section>

    <div class="container">

        <div class="row pt-4 mb-4">
            <div class="col-lg-7">

                <h2 class="mb-0">{{ w('Send Us a Message') }}</h2>

                <p class="lead mb-4 mt-1">{{ w('Contact us or give us a call to discover how we can help.') }}</p>

                <form class="contact-form" action="{{ route('UI.storeContact') }}" method="POST">
                    @csrf

                    <div class="form-row">
                        <div class="form-group col">
                            <input type="text" placeholder="{{ w('Full Name') }}" value=""
                            data-msg-required="Please enter your name."
                            maxlength="100" class="form-control" name="full_name" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <input type="email" placeholder="{{ w('Your E-mail') }}" value=""
                            data-msg-required="Please enter your email address."
                            data-msg-email="Please enter a valid email address."
                            maxlength="100" class="form-control" name="email" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <input type="text" placeholder="{{ w('Subject') }}" value=""
                            data-msg-required="Please enter the subject."
                            maxlength="100" class="form-control" name="subject" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <textarea maxlength="5000" placeholder="{{ w('Message') }}"
                            data-msg-required="Please enter your message."
                            rows="5" class="form-control" name="message" required></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <input type="submit" value="{{ w('Send Message') }}" class="btn btn-lg btn-primary mb-4 btn-contenct-save"
                             data-loading-text="Loading...">
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-lg-5">

                <h4 class="text-color-dark mb-1 pb-3">{{ w('Corporate Headquarters') }}</h4>

                <!-- Google Maps - Go to the bottom of the page to change settings and map location. -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3401.542880742338!2d34.454068014630685!3d31.509246354845097!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14fd7f69bbfa530b%3A0xcea9f021fe5243d!2z2KvZhdin2YbZitipINio2YTYsyB8OFBsdXM!5e0!3m2!1sen!2ssa!4v1640610103863!5m2!1sen!2ssa" width="500" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                 @php
                     $setting = App\Setting::first();
                 @endphp
                @if (isset($setting))
                    <ul class="list list-icons mt-4 mb-4">
                        <li>
                            <strong>{{ w('Address') }}:</strong> <span>{{ $setting->address }}</span>
                        </li>
                        <li>
                            <strong>{{ w('Phone') }}:</strong> <span dir="ltr">{{ $setting->phone }}</span>
                        </li>
                        <li>
                            <strong>{{ w('Email') }}:</strong>
                            <a href="mailto:{{ $setting->email }}"> {{ $setting->email }}</a>
                        </li>
                    </ul>
                @endif

            </div>
        </div>

    </div>
</div>


@push('scripts')
    <script>
        $(document).on('click', '.btn-contenct-save', function (event) {
                event.preventDefault();
                let form = jQuery(this).parents('form'),
                    formAction = form.attr('action'),
                    formData = new FormData($('.contact-form')[0]);
            jQuery('.is-invalid').removeClass('is-invalid');
            jQuery.ajax({
                    type: 'post',
                    url: formAction,
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        jQuery('.text-danger').remove();
                        if (response.status) {
                            $('.contact-form')[0].reset();
                            toastr.success(response.data);
                            setTimeout(function () {
                                location.reload()
                            }, 1000);
                        }
                    },
                    error: function (response) {
                        let error = response.responseJSON
                        jQuery('.text-danger').remove();
                        for (let index in error.errors) {
                            form.find('[name="' + index + '"]').addClass('is-invalid');
                            form.find('[name="' + index + '"]').parents('.form-group').append(('<div class="text-danger" >' + error.errors[index][0] + '</div>'));
                        }


                    }
                });
            });

            $(document).ajaxStart(function () {
                jQuery('.fa-spin').removeClass('invisible');
            }).ajaxStop(function () {
                jQuery('.fa-spin').addClass('invisible');
            });
    </script>
@endpush

@endsection
