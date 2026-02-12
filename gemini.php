<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>NamWel Tours | Unforgettable Namibian Safaris</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Poppins:wght@300;600&display=swap" rel="stylesheet">
        <style>
            body {
                font-family: 'Poppins', sans-serif;
            }
            .navbar-brand img {
                height: 60px;
            }

            /* Brand Colors */
            .btn-primary {
                background-color: #f9a825;
                border: none;
                color: #fff;
            } /* Logo Sun Orange */
            .btn-primary:hover {
                background-color: #e69500;
            }
            .text-accent {
                color: #689f38;
            } /* Logo Leaf Green */

            /* Hero Section */
            .hero {
                background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('https://images.unsplash.com/photo-1516026672322-bc52d61a55d5?auto=format&fit=crop&w=1920&q=80');
                background-size: cover;
                background-position: center;
                height: 90vh;
                display: flex;
                align-items: center;
                color: white;
            }

            /* Make sure the form looks "Sleek" */
            .form-control, .form-select {
                border-radius: 8px;
                padding: 10px;
                border: 1px solid #e0e0e0;
            }

            .btn-outline-success {
                color: #689f38;
                border-color: #689f38;
            }

            .btn-outline-success:checked + label,
            .btn-outline-success:hover {
                background-color: #689f38 !important;
                border-color: #689f38 !important;
            }

            .text-warning {
                color: #f9a825 !important; /* Matches your logo sun */
            }

            .feature-icon {
                font-size: 2.5rem;
                color: #689f38;
            }

            /* Testimonial Styling */
            #testimonials {
                background-color: #fdfdfd;
            }
            .testimonial-card {
                max-width: 800px;
                margin: 0 auto;
                padding: 40px;
            }
            .quote-icon {
                font-size: 3rem;
                color: #f9a825; /* Your Sun Orange */
                opacity: 0.3;
                line-height: 1;
            }
            .carousel-indicators [data-bs-target] {
                background-color: #689f38; /* Your Leaf Green */
                width: 12px;
                height: 12px;
                border-radius: 50%;
            }

            .whatsapp-float {
                position: fixed;
                width: 60px;
                height: 60px;
                bottom: 40px;
                right: 40px;
                background-color: #25d366;
                color: #FFF;
                border-radius: 50px;
                text-align: center;
                font-size: 30px;
                box-shadow: 2px 2px 10px rgba(0,0,0,0.2);
                z-index: 1000;
                display: flex;
                align-items: center;
                justify-content: center;
                text-decoration: none;
                transition: transform 0.3s ease;
            }

            .whatsapp-float:hover {
                transform: scale(1.1);
                color: #FFF;
            }
        </style>
    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="Logo-V3.png" alt="NamWel Logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto text-uppercase fw-bold">
                        <li class="nav-item"><a class="nav-link" href="#tours">Tailor-Made Trips</a></li>
                        <li class="nav-item"><a class="nav-link" href="#rentals">Car Rentals</a></li>
                        <li class="nav-item"><a class="nav-link btn btn-primary ms-lg-3 text-white px-4" href="#contact">Inquire Now</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <header class="hero">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 text-start mb-5 mb-lg-0">
                        <h1 class="display-3 fw-bold mb-3 text-white">Experience the Wild <br><span class="text-warning">Charm of Namibia</span></h1>
                        <p class="lead mb-4 text-white-50">Local experts in tailor-made safaris and small group adventures. Where every detail matters.</p>
                        <div class="d-flex align-items-center text-white-50">
                            <span class="me-3">✓ Professional Guides</span>
                            <span class="me-3">✓ 4x4 Car Rentals</span>
                            <span>✓ Nature Focused</span>
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="card border-0 shadow-lg p-4" style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px);">
                            <h4 class="fw-bold mb-3 text-dark">Plan Your Adventure</h4>
                            <form>
                                <div class="mb-3">
                                    <label class="form-label small fw-bold">Where do you want to go?</label>
                                    <select class="form-select">
                                        <option selected>Select Destination...</option>
                                        <option>Etosha National Park</option>
                                        <option>Sossusvlei Dunes</option>
                                        <option>Skeleton Coast</option>
                                        <option>Damaraland</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-bold">Adventure Type</label>
                                    <div class="d-flex gap-2">
                                        <input type="radio" class="btn-check" name="tripType" id="tailor" checked>
                                        <label class="btn btn-outline-success btn-sm w-100" for="tailor">Tailor-Made</label>

                                        <input type="radio" class="btn-check" name="tripType" id="group">
                                        <label class="btn btn-outline-success btn-sm w-100" for="group">Small Group</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label class="form-label small fw-bold">Travelers</label>
                                        <input type="number" class="form-control" placeholder="1-10">
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label class="form-label small fw-bold">Duration</label>
                                        <select class="form-select">
                                            <option>7-10 Days</option>
                                            <option>10-14 Days</option>
                                            <option>14+ Days</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary w-100 py-2 fw-bold text-uppercase">Get My Free Quote</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <section class="py-5">
            <div class="container py-5">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <h2 class="fw-bold mb-4">Your Local <span class="text-accent">Namibian</span> Experts</h2>
                        <p class="text-muted">NamWel Tours and Car Rentals is a local agency specializing in small group tours. Inspired by Namibia's vast landscapes, we create itineraries that combine relaxation, charm, and close ties with nature.</p>
                        <ul class="list-unstyled">
                            <li class="mb-2">✓ Professional Local Guides</li>
                            <li class="mb-2">✓ 100% Tailor-Made Itineraries</li>
                            <li class="mb-2">✓ Quality Fleet for Rugged Terrain</li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <img src="https://images.unsplash.com/photo-1473580044384-7ba9967e16a0?auto=format&fit=crop&w=800&q=80" class="img-fluid rounded-3 shadow" alt="Namibian Landscape">
                    </div>
                </div>
            </div>
        </section>

        <section id="tours" class="py-5 bg-light">
            <div class="container py-5">
                <div class="text-center mb-5">
                    <h2 class="fw-bold">Our Signature <span class="text-accent">Experiences</span></h2>
                    <p class="text-muted">Hand-crafted itineraries designed for nature lovers.</p>
                </div>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <img src="https://images.unsplash.com/photo-1547471080-7cc2caa01a7e?auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Etosha Safari">
                            <div class="card-body">
                                <span class="badge bg-success mb-2">Small Group</span>
                                <h5 class="card-title fw-bold">Wildlife Wonders</h5>
                                <p class="card-text text-muted">A 10-day journey through Etosha National Park and the Caprivi Strip.</p>
                                <a href="#" class="text-decoration-none fw-bold text-accent">Learn More →</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <img src="https://images.unsplash.com/photo-1516026672322-bc52d61a55d5?auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Sossusvlei Dunes">
                            <div class="card-body">
                                <span class="badge bg-warning text-dark mb-2">Tailor-Made</span>
                                <h5 class="card-title fw-bold">The Desert Soul</h5>
                                <p class="card-text text-muted">Explore the iconic red dunes of Sossusvlei and the Skeleton Coast at your own pace.</p>
                                <a href="#" class="text-decoration-none fw-bold text-accent">Learn More →</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <img src="https://images.unsplash.com/photo-1504109586057-7a2ae83d1338?auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Coastal Adventure">
                            <div class="card-body">
                                <span class="badge bg-success mb-2">Small Group</span>
                                <h5 class="card-title fw-bold">Coast & Culture</h5>
                                <p class="card-text text-muted">Combine the charm of Swakopmund with the ancient traditions of Damaraland.</p>
                                <a href="#" class="text-decoration-none fw-bold text-accent">Learn More →</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-5">
            <div class="container py-5">
                <div class="row text-center mb-5">
                    <h2 class="fw-bold">How We Create Your <span class="text-accent">Perfect Trip</span></h2>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="p-3">
                            <h1 class="display-4 fw-bold text-light">01</h1>
                            <h5 class="fw-bold">Inspiration</h5>
                            <p class="small text-muted">Tell us your interests, budget, and preferred pace of travel.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3">
                            <h1 class="display-4 fw-bold text-light">02</h1>
                            <h5 class="fw-bold">Design</h5>
                            <p class="small text-muted">Our experts craft a unique itinerary tailored just for you.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3">
                            <h1 class="display-4 fw-bold text-light">03</h1>
                            <h5 class="fw-bold">Refine</h5>
                            <p class="small text-muted">We adjust every detail until the safari matches your dream.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3">
                            <h1 class="display-4 fw-bold text-light">04</h1>
                            <h5 class="fw-bold">Explore</h5>
                            <p class="small text-muted">Arrive in Namibia and let our professional guides lead the way.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="testimonials" class="py-5">
            <div class="container py-5 text-center">
                <h2 class="fw-bold mb-5">Voices from the <span class="text-accent">Wild</span></h2>

                <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators mb-0">
                        <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="0" class="active"></button>
                        <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="1"></button>
                        <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="2"></button>
                    </div>

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="testimonial-card">
                                <div class="quote-icon mb-3">“</div>
                                <p class="fs-4 italic text-dark mb-4">"NamWel organized a tailor-made safari that exceeded all our expectations. The attention to detail and the local knowledge of our guide made us feel like we were seeing the 'real' Namibia."</p>
                                <h6 class="fw-bold mb-0">Sarah & James Miller</h6>
                                <p class="small text-muted">United Kingdom</p>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="testimonial-card">
                                <div class="quote-icon mb-3">“</div>
                                <p class="fs-4 italic text-dark mb-4">"The combination of relaxation and adventure was perfect. We loved the small group atmosphere—it felt like traveling with friends who happen to be experts on nature."</p>
                                <h6 class="fw-bold mb-0">Lukas Weber</h6>
                                <p class="small text-muted">Germany</p>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="testimonial-card">
                                <div class="quote-icon mb-3">“</div>
                                <p class="fs-4 italic text-dark mb-4">"The 4x4 we rented was in pristine condition, and the itinerary they built for our self-drive tour was flawless. Namibia's landscapes are vast, but NamWel made it feel intimate."</p>
                                <h6 class="fw-bold mb-0">Elena Rossi</h6>
                                <p class="small text-muted">Italy</p>
                            </div>
                        </div>
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon bg-dark rounded-circle" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon bg-dark rounded-circle" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </section>

        <footer class="bg-dark text-white py-4">
            <div class="container text-center">
                <p>&copy; 2026 NamWel Tours and Car Rentals. All Rights Reserved.</p>
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>