<?php

require './Fw/init.php';
if (!defined('CORE')) {
    die();
}

$app->getPager()->addString("<link rel='icon' href='https://cdn-icons-png.flaticon.com/512/5541/5541717.png' type='image/x-icon'>");
$app->getPager()->setProperty('title', 'MySite');
$app->getPager()->setProperty('h1', 'Главная');
// $app->getPager()->addCss('/Fw/assets/main.css');

$app->startBuffer();
$app->header();
?>

<!-- <pre>
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
</pre> -->

<?php 
    
    $app->includeComponent(
        'fw:interface.form',
        'main',
        [
            'additional_class' => 'window--full-form',
            'attr' => [  // доп атрибуты
                'data-form-id' => 'form-123'
            ],
            'method' => 'post',
            'action' => '/handler.php', //url отправки
            'elements' => [  //список элементов формы
                [
                    'type' => 'text',
                    'name' => 'login',
                    'additional_class' => 'js-login',
                    'attr' => [
                        'data-id' => '17'
                    ],
                    'title' => 'Логин',
                    'default' => 'Введите имя',
                ],
                [
                    'type' => 'password',
                    'name' => 'password',
                    'title' => 'Пароль'
                ],
                [
                    'type' => 'select',
                    'name' => 'server',
                    'additional_class' => 'js-login',
                    'attr' => [
                        'data-id' => '17'
                    ],
                    'size' => '3',
                    'multiple' => true,
                    'title' => 'Выберите сервер',
                    'list' => [
                        [
                            'title' => 'Онлайнер',
                            'value' => 'onliner',
                            'additional_class' => 'mini--option',
                            'attr' => [
                                'data-id' => '188'
                            ],
                            'selected' => true
                        ],
                        [
                            'title' => 'Тутбай',
                            'value' => 'tut',
                        ]
                    ]
                ],
                [
                    'type' => 'textarea',
                    'name' => 'description',
                    'additional_class' => 'js-login',
                    'rows' => 3,
                    'cols' => 30,
                    'attr' => [
                        'data-id' => '17'
                    ],
                    'title' => 'Описание'
                ],
                [
                    'type' => 'checkbox',
                    'name' => 'loginRem',
                    'additional_class' => 'js-login',
                    'attr' => [
                        'data-id' => '17'
                    ],
                    'title' => 'Запомнить?'
                ],
                [
                    'type' => 'radio',
                    'name' => 'sex',
                    'additional_class' => 'js-login',
                    'list' => [
                        [
                            'value' => 'male',
                            'title' => 'Мужской',
                            'checked' => true
                        ],
                        [
                            'value' => 'female',
                            'title' => 'Женский'
                        ],
                    ],
                    'title' => 'Ваш пол'
                ],
                [
                    'type' => 'checkbox',
                    'name' => 'loginRem',
                    'additional_class' => 'js-login',
                    'attr' => [
                        'data-id' => '17'
                    ],
                    'title' => 'Запомнить?'
                ],
                [
                    'type' => 'checkbox',
                    'name' => 'change',
                    'additional_class' => 'js-login',
                    'attr' => [
                        'data-id' => '17'
                    ],
                    'title' => 'Отметь подходящее',
                    'multiple' => true,
                    'list' => [
                        [
                            'title' => 'HTML',
                            'value' => 'html',
                        ],
                        [
                            'title' => 'CSS',
                            'value' => 'css',
                        ],
                        [
                            'title' => 'Javascript',
                            'value' => 'JS',
                        ]
                    ]
                ],
                [
                    'type' => 'number',
                    'name' => 'number',
                    'additional_class' => 'js-login',
                    'min' => 10,
                    'attr' => [
                        'data-id' => '8'
                    ],
                    'title' => 'Сколько?'
                ],
                [
                    'type' => 'text',
                    'name' => 'multiText',
                    'additional_class' => 'js-login',
                    'attr' => [
                        'data-id' => '17'
                    ],
                    'title' => 'ФИО',
                    'multiple' => true,
                    'list' => [
                        [
                            'title' => 'Фамилия',
                        ],
                        [
                            'title' => 'Имя',
                        ],
                        [
                            'title' => 'Отчество',
                         ]
                    ]
                ],  
            ]
        ]     
    );
    $app->footer();
?>