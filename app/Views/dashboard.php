<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">

    <div class="p-5 mb-4 bg-light rounded-3 border">
        <div class="container-fluid py-3">
            <h1 class="display-5 fw-bold">Selamat Datang, <?= session()->get('fullname') ?>!</h1>
            <p class="col-md-8 fs-4">Username Anda: <strong><?= session()->get('username') ?></strong></p>
            <a href="<?= base_url('admin/news') ?>" class="btn btn-primary btn-lg">Kelola Berita</a>
            <a href="<?= base_url('auth/logout') ?>" class="btn btn-danger btn-lg">Logout</a>
        </div>
    </div>

</body>
</html>
