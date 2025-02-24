<?php require 'nav.php'; ?>

<section class="position-relative py-5" style="background-color: #711E1E;">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center text-white">
                <h1 class="display-4 fw-bold mb-4">Contact Us</h1>
                <p class="lead mb-0">We'd Love to Hear From You</p>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-4">
                <div class="pe-lg-4">
                    <h3 class="fw-bold mb-4">Get in Touch</h3>
                    <p class="text-muted mb-5">Have questions? We're here to help. Send us a message and we'll respond as soon as possible.</p>
                    
                    <div class="mb-4">
                        <div class="d-flex mb-4">
                            <div class="flex-shrink-0">
                                <div class="rounded-circle bg-primary bg-opacity-10 p-3" style="width: 48px; height: 48px;">
                                    <i class="bi bi-geo-alt" style="color: #711E1E; font-size: 20px;"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="fw-bold">Our Location</h5>
                                <p class="text-muted mb-0">123 Fashion Street<br>Osogbo, Nigeria</p>
                            </div>
                        </div>
                        
                        <div class="d-flex mb-4">
                            <div class="flex-shrink-0">
                                <div class="rounded-circle bg-primary bg-opacity-10 p-3" style="width: 48px; height: 48px;">
                                    <i class="bi bi-envelope" style="color: #711E1E; font-size: 20px;"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="fw-bold">Email Us</h5>
                                <p class="text-muted mb-0">info@voguevista.com<br>support@voguevista.com</p>
                            </div>
                        </div>
                        
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <div class="rounded-circle bg-primary bg-opacity-10 p-3" style="width: 48px; height: 48px;">
                                    <i class="bi bi-telephone" style="color: #711E1E; font-size: 20px;"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="fw-bold">Call Us</h5>
                                <p class="text-muted mb-0">+234 901 976 4242<br>Mon-Fri, 9am-6pm EST</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-5">
                        <h5 class="fw-bold mb-3">Follow Us</h5>
                        <div class="d-flex gap-2">
                            <a href="#" class="btn btn-outline-dark rounded-circle p-2">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <a href="#" class="btn btn-outline-dark rounded-circle p-2">
                                <i class="bi bi-instagram"></i>
                            </a>
                            <a href="#" class="btn btn-outline-dark rounded-circle p-2">
                                <i class="bi bi-twitter-x"></i>
                            </a>
                            <a href="#" class="btn btn-outline-dark rounded-circle p-2">
                                <i class="bi bi-linkedin"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-8">
                <div class="card border-0 shadow-lg rounded-4">
                    <div class="card-body p-5">
                        <h3 class="fw-bold mb-4">Send Us a Message</h3>
                        <form action="process_contact.php" method="POST">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
                                        <label for="subject">Subject</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" id="message" name="message" placeholder="Your Message" style="height: 150px" required></textarea>
                                        <label for="message">Your Message</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-lg py-3 px-5 text-white" style="background-color: #711E1E;">
                                        Send Message
                                        <i class="bi bi-send ms-2"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<style>
.form-control:focus {
    border-color: #711E1E;
    box-shadow: 0 0 0 0.25rem rgba(113, 30, 30, 0.25);
}

.form-floating label {
    color: #6c757d;
}
</style>

<?php require 'footer.php'; ?>