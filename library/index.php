<?php
$header = 'Главная. Последние издания:';
require_once 'template/header.php';
?>
<div class="row">
<div class="col-xs-12">
<div class="box">
<section class="box-body">
<h3><?=$header;?></h3>
</section>
<div class="box-body">
<?php if ($librarys) : ?>
<table class="table table-bordered tablehover">
<?php foreach ($librarys as $day) :
?>
<tr>
<th colspan="3">
<h4 class="center-block">
<?=$day['name'];?>
</h4>
</th>
</tr>
<?php if ($day['gruppa']) : ?>
<?php foreach ($day['gruppa'] as $gruppa) : ?>
<tr>
<th colspan="3"><?=$gruppa['name'];?></th>
</tr>
<?php foreach ($gruppa['library'] as $library ) : ?>
<tr>
<td><?=$library['lesson_num'];?></td>
<td><?=$library['subject'];?></td>
<td><?=$library['classroom'];?></td>
</tr>
<?php endforeach;?>
<?php endforeach;?>
<?php else: ?>
<?php endif; ?>
<?php endforeach;?>
</table>
<?php else: ?>
<p>Список изданий отсуствует</p>
<?php endif; ?>
</div>
</div>
</div>
</div>
<?php
require_once 'template/footer.php';
?>