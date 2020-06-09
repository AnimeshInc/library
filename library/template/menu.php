<aside class="main-sidebar">
<section class="sidebar">
<ul class="sidebar-menu" data-widget="tree">
<li
<?=($_SERVER['PHP_SELF']=='/index.php')?'class="active"':
'';?>>

<a href="index.php"><i class="fa fa-calendar"></i><span>Главная</span></a>

</li>
<li class="header">Пользователи</li>
<li <?=($_SERVER['PHP_SELF']=='/list-teacher.php')?'class="active"':'';?>>
<a href="list-teacher.php"><i class="fafa-users"></i><span>Сотрудники</span></a>
</li>
</ul>

<ul class="sidebar-menu">
    <li class="header">Справочник</li>
    <li <?=($_SERVER['PHP_SELF']=='/list-izdanie.php')?'class="active"':'';?>>
    <a href="list-izdanie.php"><i class="fa fa-users"></i><span>Издания</span></a>
    </li>
    <li <?=($_SERVER['PHP_SELF']=='/list-subscribe.php')?'class="active"':'';?>>
    <a href="list-subscribe.php"><i class="fa fa-users"></i><span>Подписки</span></a>
    </li>
    <li <?=($_SERVER['PHP_SELF']=='/list-delivery.php')?'class="active"':'';?>>
    <a href="list-delivery.php"><i class="fa fa-users"></i><span>Доставка</span></a>
    </li>
</ul>
</section>
</aside>