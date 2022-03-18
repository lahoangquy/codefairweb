<section id="contact" class="section" data-stellar-background-ratio="-0.2">
    <div class="contact-form">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-xs-12">
                    <div class="contact-us">
                        <h3>Contact With us</h3>
                        <div class="contact-address">
                            @if ($settings->meta_key['address'])
                                <p>{!! $settings->meta_key['address'] !!}</p>
                            @endif
                            @if ($settings->meta_key['phone_number'])
                                <p class="phone">Phone: <span>{{ $settings->meta_key['phone_number'] }}</span></p>
                            @endif
                            @if ($settings->meta_key['support_email'])
                                <p class="email">
                                    E-mail:
                                    <span>({{ $settings->meta_key['support_email'] }})</span>
                                </p>
                            @endif
                        </div>
                        <div class="social-icons">
                            <ul>
                                @if ($settings->meta_key['social_fb'])
                                    <li class="facebook">
                                        <a href="{!! $settings->meta_key['social_fb'] !!}" target="_blank"><i
                                                class="fa fa-facebook"></i></a>
                                    </li>
                                @endif
                                @if ($settings->meta_key['social_instagram'])
                                    <li class="facebook">
                                        <a href="{!! $settings->meta_key['social_instagram'] !!}" target="_blank"><i
                                                class="fa fa-instagram"></i></a>
                                    </li>
                                @endif
                                @if ($settings->meta_key['social_youtube'])
                                    <li class="facebook">
                                        <a href="{!! $settings->meta_key['social_youtube'] !!}" target="_blank"><i
                                                class="fa fa-youtube"></i></a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-xs-12">
                    <div class="contact-block">
                        <form id="contactForm">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="name"
                                            name="name"
                                            placeholder="Your Name"
                                            required
                                            data-error="Please enter your name"
                                        />
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input
                                            type="text"
                                            placeholder="Your Email"
                                            id="email"
                                            class="form-control"
                                            name="name"
                                            required
                                            data-error="Please enter your email"
                                        />
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                      <textarea
                          class="form-control"
                          id="message"
                          placeholder="Your Message"
                          rows="8"
                          data-error="Write your message"
                          required
                      ></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="submit-button text-center">
                                        <button class="btn btn-common" id="submit" type="submit">Send Message</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
