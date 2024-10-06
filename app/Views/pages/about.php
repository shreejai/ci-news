<?php

namespace App\Controllers;
        
if (session()->getFlashdata('message')): ?>
 <div class="alert alert-success">
   <?= session()->getFlashdata('message') ?>
 </div>
<?php endif; ?>

<?php 
  if(session()->getFlashdata('data')):
    $cars = session()->getFlashdata('data');
  endif;
?>

<?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>

<?php if(!empty($cars)): ?>
      <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Year</th>
                    <th>License Plate</th>
                    <th>License State</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($cars as $car): ?>
                    <tr>
                        <td><?= esc($car['vin']) ?></td>
                        <td><?= esc($car['make']) ?></td>
                        <td><?= esc($car['model']) ?></td>
                        <td><?= esc($car['year']) ?></td>
                        <td><?= esc($car['licensePlate']) ?></td>
                        <td><?= esc($car['licenseState']) ?></td>
                        <td>
                            <a href="<?= site_url('/car/fetchQuotes').'?licensePlate='.urlencode($car['licensePlate']). '&licenseState=' . urlencode($car['licenseState']) ?>" class="btn btn-primary">View quotes</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
<?php else: 
    header("Location: /");
    exit();
?>
<?php endif; ?>