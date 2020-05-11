@extends('layouts.master')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="container pt-5" style="padding-top: 5rem !important;">
        <div class="page-background-image"></div>
        <h1>{{ $contact_page->getTranslatedAttribute('title', app()->getLocale()) }}</h1>
        <div class="page-content__wrap">
          {!! $contact_page->getTranslatedAttribute('body', app()->getLocale()) !!}
          <!--Section: Contact v.2-->
            <section class="mb-4">
                <div class="row">
                    <!--Grid column-->
                    <div class="col-md-6 mb-md-0 mb-5">
                        <form id="contact-form" name="contact-form" action="mail.php" method="POST">
                            <!--Grid row-->
                            <div class="row">
                                <!--Grid column-->
                                <div class="col-md-6">
                                    <div class="mb-0">
                                        <input type="text" id="name" name="name" class="form-control">
                                        <label for="name" class="">{{ __('Your name') }}</label>
                                    </div>
                                </div>
                                <!--Grid column-->
                                <!--Grid column-->
                                <div class="col-md-6">
                                    <div class="mb-0">
                                        <input type="text" id="email" name="email" class="form-control">
                                        <label for="email" class="">{{ __('Your email') }}</label>
                                    </div>
                                </div>
                                <!--Grid column-->
                            </div>
                            <!--Grid row-->
                            <!--Grid row-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-0">
                                        <input type="text" id="subject" name="subject" class="form-control">
                                        <label for="subject" class="">{{ __('Subject') }}</label>
                                    </div>
                                </div>
                            </div>
                            <!--Grid row-->
                            <!--Grid row-->
                            <div class="row">
                                <!--Grid column-->
                                <div class="col-md-12">
                                    <div class="md-form">
                                        <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                                        <label for="message">{{ __('Your message') }}</label>
                                    </div>
                                </div>
                            </div>
                            <!--Grid row-->
                        </form>
                        <div class="text-center text-md-left">
                            <a class="btn btn-primary text-white" onclick="document.getElementById('contact-form').submit();">{{ __('Send') }}</a>
                        </div>
                        <div class="status"></div>
                    </div>
                    <!--Grid column-->
                    <!--Grid column-->
                    <div class="col-md-3 text-center">
                        <ul class="list-unstyled mb-0">
                            <li><i class="fas fa-map-marker-alt fa-2x"></i>
                                <p>{{ __('San Francisco, CA 94126, USA') }}</p>
                            </li>
                            <li><i class="fas fa-phone mt-4 fa-2x"></i>
                                <p>+ 01 234 567 89</p>
                            </li>
                            <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                                <p>contact@mdbootstrap.com</p>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->
                    <!--Grid column-->
                    <div class="col-md-3 text-center">
                        <img src="{{ asset('/images/contact-page-illustration.jpg') }}" alt="img" width="100%">
                    </div>
                    <!--Grid column-->
                </div>
            </section>
        <!--Section: Contact v.2-->
        </div>
    </div>
</div>
@endsection

<style>
    .page-background-image {
        background-image: url('{{ Voyager::image($contact_page->image) }}');
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        width: 100%; 
        height: 100px;
    }
</style>

<section class="mb-4">
    <div class="row">
        <div class="col-auto">
            <p>Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within a matter of hours to help you.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-md-0 mb-5">
            <form id="contact-form" action="mail.php" method="POST" name="contact-form">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-0">
                            <input id="name" name="name" type="text" class="form-control" /> 
                            <label class="" for="name">Your name</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-0">
                            <input id="email" name="email" type="text" class="form-control" />
                            <label class="" for="email">Your email</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-0">
                            <input id="subject" name="subject" type="text" class="form-control" /> 
                            <label class="" for="subject">Subject</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form">
                            <textarea id="message" class="form-control md-textarea" name="message" rows="2"></textarea>
                            <label for="message">Your message</label>
                        </div>
                    </div>
                </div>
            </form>
            <div class="text-center text-md-left">
                <a class="btn btn-primary text-white">Send</a>
            </div>
        </div>
        <div class="col-md-3 text-center">
            <ul class="list-unstyled mb-0">
                <li>
                    <p><i class="fas fa-map-marker-alt fa-2x"></i> San Francisco, CA 94126, USA</p>
                </li>
                <li>
                    <p><i class="fas fa-phone mt-4 fa-2x"></i> + 01 234 567 89</p>
                </li>
                <li>
                    <p><i class="fas fa-envelope mt-4 fa-2x"></i> contact@mdbootstrap.com</p>
                </li>
            </ul>
        </div>
    </div>
</section>
