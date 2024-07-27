<?php

require_once './Fw/init.php';

if (!defined('CORE')) {
    die();
}

$app->startBuffer();
$app->header();
echo "<p id='content'>Content</p>";
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

<?php 
$app->footer();
$content = $app->endBuffer();
$app->restartBuffer();
echo $content;
?>