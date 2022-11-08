<section class="get-flight-two" id="contact">
            <div class="get-flight-two__shape-3 zoom-fade-2">
                <img src="assets/images/shapes/get-flight-two-shape-3.png" alt="">
            </div>
            <div class="get-flight-two__shape-4 float-bob-x">
                <img src="assets/images/shapes/get-flight-two-shape-4.png" alt="">
            </div>
            <div class="container">
                <div class="get-flight-two__content-box">
                    <div class="get-flight-two__shape-2 wow slideInRight" data-wow-delay="100ms"
                        data-wow-duration="2500ms">
                        <img src="assets/images/shapes/contact_taxi3.png" alt="" class="float-bob-y">
                    </div>
                    <div class="get-flight-two__inner">
                        <div class="get-flight-two__shape-1 float-bob-x">
                            <img src="assets/images/shapes/get-flight-two-shape-1.png" alt="">
                        </div>
                        <div class="section-title text-left">
                            <span class="section-title__tagline">Contact Us</span>
                            <h2 class="section-title__title">Request for private taxi</h2>
                        </div>

                        <div class="loading-container">
                            <div class="loading"></div>
                            <div id="loading-text">loading</div>
                        </div>
                        <div class="result-error"></div>
                        <div class="result-success"></div>
                        <form id="contact-form" action="assets/inc/sendemail.php" class="get-flight__form contact-form-validated"
                            novalidate="novalidate" method="POST">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6">
                                    <div class="get-flight__form-input-box">
                                        <input type="text" id="name" name="name" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div class="get-flight__form-input-box">
                                        <input type="text" id="surname" name="surname" placeholder="Surname">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div class="get-flight__form-input-box">
                                        <input type="email" id="email" name="email" placeholder="E-mail">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div class="get-flight__form-input-box">
                                        <input type="tel" id="phone" name="phone" placeholder="Phone Number" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div class="get-flight__form-input-box">
                                        <textarea class="contact-message" name="message" id="message" cols="42" rows="4" placeholder="Your Message..."></textarea>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="get-flight__form-input-box">
                                                <input type="text" name="date" id="datepicker" placeholder="Select date">
                                                <div class="get-flight__icon-box">
                                                    <i class="far fa-calendar-alt"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="get-flight__form-input-box">
                                                <input type="text" name="time" id="time" placeholder="Select time">
                                                <div class="get-flight__icon-box">
                                                    <i class="far fa-clock"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div class="get-flight__form-input-box">
                                        <button type="submit" id="contact_btn" class="thm-btn get-flight__btn">Send Now</button>
                                    </div>
                                </div>
                            </div>
                            <p class="get-flight__content-text"> <span>*</span> After sending request. We’ll contact you
                            for more details.</p>
                        </form>
                    </div>
                </div>
            </div>
        </section>