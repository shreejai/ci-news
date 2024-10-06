<!DOCTYPE html>
<html>
<head>
    <title>Cars List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Cars</h1>
        <?php if(session()->getFlashdata('message')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('message') ?></div>
        <?php endif; ?>
        <?php if(session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Year</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($cars as $car): ?>
                    <tr>
                        <td><?= esc($car['car_id']) ?></td>
                        <td><?= esc($car['make']) ?></td>
                        <td><?= esc($car['model']) ?></td>
                        <td><?= esc($car['year']) ?></td>
                        <td>
                            <a href="<?= site_url('cars/'.$car['car_id'].'/quotes') ?>" class="btn btn-primary">View Quotes</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="<?= site_url('fetch-cars') ?>" class="btn btn-success">Fetch Cars</a>
        <a href="<?= site_url('fetch-quotes') ?>" class="btn btn-info">Fetch Quotes</a>
    </div>
</body>
</html>