<?php

namespace App\Controllers;
       
if (session()->getFlashdata('message')): ?>
 <div class="alert alert-success">
   <?php echo session()->getFlashdata('message') ?>
 </div>
<?php endif; ?>

<?php 
  if(session()->getFlashdata('data')):
    $quotes = session()->getFlashdata('data');
  endif;
?>

<?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>

<?php if(!empty($quotes)): ?>
      <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Price</th>
                    <th>Overview of Work</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($quotes as $quote): ?>
                    <tr>
                        <td><?= esc($quote['price']) ?></td>
                        <td><?= esc($quote['overviewOfWork']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
<?php else: 
    header("Location: /");
    exit();
?>
<?php endif; ?>