  <div class="container">
  <nav class="navbar navbar-info bg-info">
  <span class="navbar-brand mb-0 h1"></span>
</nav>

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block mt-5">
                <center><img src="<?= base_url('assets/img/profile/default.jpg'); ?>" width="80%" class="rounded-circle"></center>
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Aplikasi Inventory</h1>
                    <h3 class="h4 text-gray-900 mb-4">Login</h3>
                  </div>

                  <form class="user" method="post" action="<?= base_url('Auth/proses'); ?>">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email Address..." required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                  </form>
                  <hr>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

    <!-- Footer -->
        <div class="container my-auto">
          <div class="font-weight-bold copyright text-center text-warning my-auto">
            <span>Copyright &copy; CV. Sukses Jaya Mandiri <?= date('Y'); ?></span>
          </div>
        </div>

  </div>