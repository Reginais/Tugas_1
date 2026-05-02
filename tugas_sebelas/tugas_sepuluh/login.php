<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Aplikasi Musik</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    </head>

    <body class="bg-light">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-primary text-white py-3 text-center">
                            <h5 class="mb-0"><i></i> Selamat datang di TemuLagu </h5>
                        </div>
                        <div class="card-body p-4">
                            <h6 class="mb-3 text-center text-muted">Nikmati harimu bersama lagu-lagu kami</h6>
                            <?php if (isset($_GET['message'])): ?>
                                <div class="alert alert-info alert-dismissible fade show">
                                    <?= htmlspecialchars($_GET['message']) ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            <?php endif; ?>
                            <form method="post" action="proses_login.php">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Username </label>
                                    <input type="text" name="username" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Password </label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-sign-in-alt me-1"></i> Login
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>