<?php

require_once './Fw/init.php';
if (!defined('CORE')) {
    die();
}

$app->getPager()->addString("<link rel='icon' href='https://cdn-icons-png.flaticon.com/512/5541/5541717.png' type='image/x-icon'>");
$app->getPager()->setProperty('title', 'MySite');
$app->getPager()->setProperty('h1', 'Главная');
$app->getPager()->addCss('/Fw/assets/main.css');

$app->startBuffer();
$app->header();
?>

<pre>
-------- 04.08.2024 --------
1) Создание файловой структуры хранения компонентов и шаблонов.
2) Описание общего класса компонентов Base.
3) Описание класса управления шаблоном компонента Template.
4) Доработка Application. Описание метода includeComponent.
5) Доработка Page и буффер. Разделение showHead на showCss, showJs и showString. 
-------- 01.08.2024 --------
1) Создание класса \Core\Type\Dictionary, реализующего интерейсы Iterator, ArrayAccess
, Countable, JsonSerializable.
2) Реализация дополнительных методов get($name), set($name, $value), __construct($values, bool $readonly = false), getValues(), setValues($values)
, clear() и свойства  $readonly.
3) Создание классов Request, Server и Session, которые наследуются от Dictionary.
4) Доработка класса Application.
-------- 29.07.2024 --------
1) Перенесен старт буфера и заполнения тестовыми данными в header().
2) Перенесен endBuffer() и вывод окончательного контента после замены макросов в footer();
-------- 27.07.2024 --------
1) Обращение к классу за его названием исправлено на использование ::class.
2) В класс Application добавлена инициализация класса Config для получения id шаблона.
3) В методе showProperty возврат значения исправлен на вывод.
4) Добавлен вывод макросов в head и последующая их замена в буфере.
5) Весь контент перенесен до использования буфера (в частности footer).
6) Обработка содержимого буфера перенесена в метод endBuffer() класса Application.
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
    
    // $app->includeComponent(
    //     'fw:interface.form',
    //     'main',
    //     [
    //         "sort" => "id",
    //     ]
    // );
    $app->includeComponent(
        'fw:interface.form',
        'main',
        [
            "sort" => "id",
        ]
    );
    $app->footer();
?>