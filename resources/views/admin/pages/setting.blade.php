<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Website Settings</title>

  <!-- Bootstrap 5.3 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(to right, #ffd6ba, #ffe1c6);
      font-family: 'Segoe UI', sans-serif;
      min-height: 100vh;
      padding: 40px 0;
    }

    /* Animation Keyframes */
    @keyframes slideDown {
      0% {
        transform: translateY(-50px);
        opacity: 0;
      }
      100% {
        transform: translateY(0);
        opacity: 1;
      }
    }

    .card {
      border-radius: 20px;
      box-shadow: 0 15px 30px rgba(0,0,0,0.1);
      animation: slideDown 0.8s ease-out;
    }

    .form-control:focus {
      border-color: #ff6f61;
      box-shadow: 0 0 0 0.2rem rgba(255,111,97,0.25);
    }

    .input-group-text {
      background-color: #ffe3d6;
      border: none;
      color: #ff6f61;
    }

    .btn-primary {
      background-color: #ff6f61;
      border: none;
      transition: all 0.3s;
    }

    .btn-primary:hover {
      background-color: #ff4c3b;
    }

    img#logoPreview {
      max-height: 100px;
      border-radius: 10px;
      margin-top: 10px;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="card p-4 mx-auto" style="max-width: 850px;">
    <h2 class="text-center text-danger mb-4">Website Settings</h2>

    <form action="#" method="POST">
      <!-- CSRF Token -->
      <input type="hidden" name="_token" value="PLACEHOLDER_CSRF_TOKEN">

      <!-- Site Logo URL -->
      <div class="mb-3 row align-items-center">
        <label class="col-sm-2 col-form-label"><i class="bi bi-image"></i> Logo URL</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="site_logo" name="site_logo" placeholder="Enter Logo URL" value="https://example.com/logo.png" oninput="updateLogo(this.value)">
          <img id="logoPreview" src="https://example.com/logo.png" alt="Logo Preview">
        </div>
      </div>

      <!-- Site Title -->
      <div class="mb-3 row">
        <label class="col-sm-2 col-form-label"><i class="bi bi-card-text"></i> Site Title</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="site_title" placeholder="Enter Site Title" value="BINGO">
        </div>
      </div>

      <!-- Description -->
      <div class="mb-3 row">
        <label class="col-sm-2 col-form-label"><i class="bi bi-journal-text"></i> Description</label>
        <div class="col-sm-10">
          <textarea class="form-control" name="site_description" rows="3" placeholder="Enter Site Description">This is my website description.</textarea>
        </div>
      </div>

      <!-- Contact -->
      <div class="mb-3 row">
        <label class="col-sm-2 col-form-label"><i class="bi bi-telephone"></i> Contact</label>
        <div class="col-sm-5">
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
            <input type="email" class="form-control" name="contact_email" placeholder="Email" value="info@example.com">
          </div>
        </div>
        <div class="col-sm-5">
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-telephone"></i></span>
            <input type="text" class="form-control" name="contact_phone" placeholder="Phone" value="+880-31-000-000">
          </div>
        </div>
      </div>

      <!-- Footer Text -->
      <div class="mb-3 row">
        <label class="col-sm-2 col-form-label"><i class="bi bi-card-text"></i> Footer Text</label>
        <div class="col-sm-10">
          <textarea class="form-control" name="footer_text" rows="2">© 2025 My Website. All rights reserved.</textarea>
        </div>
      </div>

      <!-- Social Links -->
      <div class="mb-3 row">
        <label class="col-sm-2 col-form-label"><i class="bi bi-share"></i> Social Links</label>
        <div class="col-sm-10 row g-2">
          <div class="col-md-6">
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-facebook"></i></span>
              <input type="text" name="facebook" class="form-control" placeholder="Facebook URL" value="https://facebook.com">
            </div>
          </div>
          <div class="col-md-6">
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-twitter"></i></span>
              <input type="text" name="twitter" class="form-control" placeholder="Twitter URL" value="https://twitter.com">
            </div>
          </div>
          <div class="col-md-6">
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-youtube"></i></span>
              <input type="text" name="youtube" class="form-control" placeholder="YouTube URL" value="https://youtube.com">
            </div>
          </div>
          <div class="col-md-6">
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-github"></i></span>
              <input type="text" name="github" class="form-control" placeholder="Github URL" value="https://github.com">
            </div>
          </div>
        </div>
      </div>

      <div class="text-center mt-4">
        <button type="submit" class="btn btn-primary btn-lg"><i class="bi bi-save"></i> Save Settings</button>
      </div>
    </form>
  </div>
</div>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
  function updateLogo(url){
    document.getElementById('logoPreview').src = url;
  }
</script>

</body>
</html>
