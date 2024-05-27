  <!-- Footer Start -->
  <div class="notify">
      @include('notify::components.notify')
  </div>
  <div class="container-fluid bg-dark text-white-50 footer pb-3 mt-5">
      <div class="container ">
          <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5) ;">
              <div class="row g-4">
                  <div class="col-lg-6">
                      <a href="#">
                          <h1 class="text-primary mb-0 fs-1">E-site</h1>
                      </a>
                  </div>
                  <div class="col-lg-6">
                      <div class="d-flex justify-content-end pt-3">
                          <a class="btn  btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i
                                  class="fab fa-twitter"></i></a>
                          <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i
                                  class="fab fa-facebook-f"></i></a>
                          <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i
                                  class="fab fa-youtube"></i></a>
                          <a class="btn btn-outline-secondary btn-md-square rounded-circle" href=""><i
                                  class="fab fa-linkedin-in"></i></a>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row g-5">
              <div class="col-lg-4 col-md-6">
                  <div class="footer-item">
                      <h4 class="text-light mb-3">Why People Like us!</h4>
                      <p class="mb-4">typesetting, remaining essentially unchanged. It was
                          popularised in the 1960s with the like Aldus PageMaker including of Lorem Ipsum.</p>
                      {{-- <a href="" class="btn border-secondary py-2 px-4 rounded-pill text-primary">Read More</a> --}}
                  </div>
              </div>

              <div class="col-lg-4 col-md-6">
                  <div class="d-flex flex-column text-start footer-item">
                      <h4 class="text-light mb-3">Account</h4>
                      <a class="btn-link" href="{{ route('user_profile.edit') }}">My Account</a>
                      @auth
                          <a class="btn-link" href="{{ route('cart', Auth::user()->id) }}">Shopping Cart</a>
                      @else
                          <a class="btn-link" href="{{ route('guest_cart') }}">Shopping Cart</a>
                      @endauth

                      <a class="btn-link" href="{{ route('user_orders_lists') }}">Order History</a>
                  </div>
              </div>
              <div class="col-lg-4 col-md-6">
                  <div class="footer-item">
                      <h4 class="text-light mb-3">Contact</h4>
                      <p>Address: Pokhara -18</p>
                      <p>Email: timisinasagar04@gmail.com</p>
                      <p>Phone: +977-9819113548</p>
                      {{-- <p>Payment Accepted</p>
                      <img src="img/payment.png" class="img-fluid" alt=""> --}}
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Footer End -->


  <!-- Back to Top -->
  <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i
          class="fa fa-arrow-up"></i></a>


  <!-- JavaScript Libraries -->
  @notifyJs
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/lib/easing/easing.min.js"></script>
  <script src="/lib/waypoints/waypoints.min.js"></script>
  <script src="/lib/lightbox/js/lightbox.min.js"></script>
  <script src="/lib/owlcarousel/owl.carousel.min.js"></script>

  <!-- Template Javascript -->
  <script src="/js/main.js"></script>
  </body>

  </html>
