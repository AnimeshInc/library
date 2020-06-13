<aside class="main-sidebar">
<section class="sidebar">
<ul class="sidebar-menu" data-widget="tree">
    <li
        <?=($_SERVER['PHP_SELF']=='/index.php')?'class="active"':
        '';?>>
        <a href="index.php"><i class="fa fa-calendar"></i><span>Главная</span></a>
    </li>
    <li class="header">Пользователи</li>
    <li <?=($_SERVER['PHP_SELF']=='/list-user.php')?'class="active"':'';?>>
        <a href="list-user.php"><i class="fafa-users"></i><span>Сотрудники</span></a>
    </li>
</ul>
<ul class="sidebar-menu">
    <li class="header">Справочник</li>
    <li <?=($_SERVER['PHP_SELF']=='/list-izdanie.php')?'class="active"':'';?>>
    <a href="list-izdanie.php"><i class="fa fa-users"></i><span>Издания</span></a>
    </li>
    <li <?=($_SERVER['PHP_SELF']=='/list-poluchenie.php')?'class="active"':'';?>>
    <a href="list-poluchenie.php"><i class="fa fa-users"></i><span>Получено</span></a>
    </li>
    <li <?=($_SERVER['PHP_SELF']=='/list-role.php')?'class="active"':'';?>>
    <a href="list-role.php"><i class="fa fa-users"></i><span>Роли</span></a>
    </li>
</ul>
<ul class="sidebar-menu">
    <li class="header">Услуги</li>
    <li <?=($_SERVER['PHP_SELF']=='/list-subscribe.php')?'class="active"':'';?>>
    <a href="list-subscribe.php"><i class="fa fa-users"></i><span>Подписки</span></a>
    </li>
    <li <?=($_SERVER['PHP_SELF']=='/list-delivery.php')?'class="active"':'';?>>
    <a href="list-delivery.php"><i class="fa fa-users"></i><span>Доставка</span></a>
    </li>
</ul>
<ul class="sidebar-menu">
    <li class="header">Запросы</li>
    <li <?=($_SERVER['PHP_SELF']=='/list-query1.php')?'class="active"':'';?>>
    <a href="list-query1.php"><i class="fa fa-users"></i><span>Запрос №1</span></a>
    </li>
    <li <?=($_SERVER['PHP_SELF']=='/list-query2.php')?'class="active"':'';?>>
    <a href="list-query2.php"><i class="fa fa-users"></i><span>Запрос №2</span></a>
    </li>
    <li <?=($_SERVER['PHP_SELF']=='/list-query3.php')?'class="active"':'';?>>
    <a href="list-query3.php"><i class="fa fa-users"></i><span>Запрос №3</span></a>
    </li>
</ul>
</section>
</aside>