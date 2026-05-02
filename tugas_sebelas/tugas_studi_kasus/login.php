<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Aplikasi Pengelolaan Buku</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body { background-color: #f4f7f6; font-family: 'Segoe UI', sans-serif; }
            .card { border: none; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.08); }
        </style>
    </head>

    <body>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card p-4">
                        <h3 class="fw-bold text-center mb-4">Selamat Datang</h3>
                        <?php if (isset($_GET['message'])): ?>
                            <div class="alert alert-info">
                                <?= htmlspecialchars($_GET['message']) ?>
                            </div>
                        <?php endif; ?>

                        <form method="post" action="proses_login.php">
                            <div class="mb-3">
                                <label class="form-label">ID </label>
                                <input type="text" name="idpengguna" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama pengguna </label>
                                <input type="text" name="username" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kata sandi </label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-dark p-2">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>