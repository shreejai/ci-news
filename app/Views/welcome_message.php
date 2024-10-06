<!DOCTYPE html>
<html>
<head>
    <title>Cars List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>PHP Test</h1>
        <?php session()->getFlashdata('message'); ?>
        <?php if(session()->getFlashdata('message')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('message') ?></div>
        <?php endif; ?>
        <?php if(session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?> 
        <a href="<?= site_url('/car/fetchCars') ?>" class="btn btn-success">Fetch Cars</a>
    </div>
</body>
</html>