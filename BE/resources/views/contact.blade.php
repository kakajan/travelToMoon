@extends('layouts.app')
@section('title', 'Contact Page')
@section('mainContent')
    <!-- Contact Section-->
    <section class="page-section mt-5" id="contact">
        <div class="container">
            <!-- Contact Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Contact Me</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Contact Section Form-->
            <div class="row justify-content-center">
                <div class="col-lg-8 col-xl-7">
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- * * SB Forms Contact Form * *-->
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- This form is pre-integrated with SB Forms.-->
                    <!-- To make this form functional, sign up at-->
                    <!-- https://startbootstrap.com/solution/contact-forms-->
                    <!-- to get an API token!-->

                    <form id="contactForm" method="POST" action="/contact">
                        @csrf
                        <!-- Name input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="name" type="text" name="fullName"
                                placeholder="Enter your name..." data-sb-validations="required" />
                            <label for="name">Full name</label>
                            <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                        </div>
                        <!-- Email address input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="email" name="email" type="email"
                                placeholder="name@example.com" data-sb-validations="required,email" />
                            <label for="email">Email address</label>
                            <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                            <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                        </div>
                        <!-- Phone number input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="phone" name="phone" type="tel"
                                placeholder="(123) 456-7890" data-sb-validations="required" />
                            <label for="phone">Phone number</label>
                            <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.
                            </div>
                        </div>
                        <!-- Message input-->
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="message" name="message" type="text" placeholder="Enter your message here..."
                                style="height: 10rem" data-sb-validations="required"></textarea>
                            <label for="message">Message</label>
                            <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                        </div>
                        <!-- Submit success message-->
                        <!---->
                        <!-- This is what your users will see when the form-->
                        <!-- has successfully submitted-->
                        <div class="d-none" id="submitSuccessMessage">
                            <div class="text-center mb-3">
                                <div class="fw-bolder">Form submission successful!</div>
                                To activate this form, sign up at
                                <br />
                                <a
                                    href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                            </div>
                        </div>
                        <!-- Submit error message-->
                        <!---->
                        <!-- This is what your users will see when there is-->
                        <!-- an error submitting the form-->
                        <div class="d-none" id="submitErrorMessage">
                            <div class="text-center text-danger mb-3">Error sending message!</div>
                        </div>
                        <!-- Submit Button-->
                        <button class="btn btn-primary btn-xl" type="submit">Send</button>
                    </form>

                    <div class="col-12 row">
                        @foreach ($messages as $message)
                            <div class="col-12">
                                <div class="col-8">
                                    <div class="card card-white post">
                                        {{ $message->id }}
                                        <div>
                                            <a href="/show-edit-message/{{ $message->id }}">Edit</a>
                                            <a href="/delete-message/{{ $message->id }}">Delete</a>
                                        </div>
                                        <div class="post-heading">
                                            <div class="float-left image">
                                                <img src="http://bootdey.com/img/Content/user_1.jpg"
                                                    class="img-circle avatar" alt="user profile image">
                                            </div>
                                            <div class="float-left meta">
                                                <div class="title h5">
                                                    <a href="#"><b>{{ $message->fullName }}</b></a>
                                                    made a Message.
                                                </div>
                                                <h6 class="text-muted time">{{ $message->phone }}</h6>
                                            </div>
                                        </div>
                                        <div class="post-description">
                                            <p>{{ $message->message }}</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script></script>
@endsection
