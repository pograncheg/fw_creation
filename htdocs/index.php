<?php

require_once './Fw/init.php';

if (!defined('CORE')) {
    die();
}

// echo 'Это точка входа в приложение';

$config = new Fw\Core\Config;
$templateId = $config->get('template/id');
$app->startBuffer();
$app->header($templateId);
$content = ob_get_contents();
$app->getPager()->addString("<link rel='icon' href='https://cdn-icons-png.flaticon.com/512/5541/5541717.png' type='image/x-icon'>");
$app->getPager()->addCss('/Fw/assets/main.css');
$app->getPager()->setProperty('title', 'MySite');
$app->getPager()->setProperty('h1', 'Главная');
$content = $app->endBuffer(['<head>'], ['<head>' . $app->getPager()->getHead()], $content);
$arrReplace = $app->getPager()->getAllReplace();
$content = $app->endBuffer(array_keys($arrReplace), array_values($arrReplace), $content);
$app->restartBuffer();
echo $content;
?>

<pre>
-------- 25.07.2024 --------
1) Создан класс Page для работы с содержимым html страницы.
2) Добавлена инициализация Page в конструктор Application в поле $pager.
3) Тестирование использования методов класса Page.
4) Настройка nginx.
-------- 24.07.2024 --------
1) Доработка Application, внедрение буффера.
2) Создана страница истории изменения проекта.
-------- 23.07.2024 --------
1) Создан класс, реализующий контейнер инстансов InstanceContainer.
2) Добавление константы подключения ядра (в init.php).
3) Создание структуры шаблона сайта.
</pre>



<?php $app->footer($templateId); ?>
