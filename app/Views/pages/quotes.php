<?php

namespace App\Controllers;
       
if (session()->getFlashdata('message')): ?>
 <div class="alert alert-success">
   <?= session()->getFlashdata('message') ?>
   <? //var_dump(session()->get('data')); ?>
 </div>
<?php endif; ?>

<?php 
  if(session()->getFlashdata('data')):
    $quotes = session()->getFlashdata('data');
    //var_dump($quotes);
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
<?php else: ?>
<p>No quotes to show</p>
<?php endif; ?>