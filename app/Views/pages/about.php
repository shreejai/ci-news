<?php

namespace App\Controllers;

echo "Hello world from about.php";

use CodeIgniter\Controller;
        
if (session()->getFlashdata('message')): ?>
 <div class="alert alert-success">
   <?= session()->getFlashdata('message') ?>
   <? var_dump(session()->get('data')); ?>
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
                        <td>
                            <a href="<?= site_url('cars/'.$car['vin'].'/quotes') ?>" class="btn btn-primary">View Quotes</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
<?php else: ?>
<p>No cars found.</p>
<?php endif; ?>