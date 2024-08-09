<?php

include '../init.php';

$app->getPager()->addString("<link rel='icon' href='https://cdn-icons-png.flaticon.com/512/5541/5541717.png' type='image/x-icon'>");
$app->getPager()->setProperty('title', 'MySite');
$app->getPager()->setProperty('h1', 'Форма');
$app->getPager()->addCss('/Fw/assets/css/main.css');

$app->startBuffer();
$app->header();
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
                // 'default' => 'Введите имя',
            ],
            [
                'type' => 'password',
                'name' => 'password',
                'title' => 'Пароль'
            ],
            [
                'type' => 'number',
                'name' => 'number',
                'title' => 'Выберите количество',
                'min' => 10,
                'step' => 2
            ],
            [
                'type' => 'select',
                'name' => 'server',
                'multiple' => true,
                'additional_class' => 'js-login',
                'attr' => [
                    'data-id' => '17'
                ],
                'title' => 'Выберите сервер',
                'list' => [
                    [
                        'title' => 'Онлайнер',
                        'value' => 'onliner',
                        'additional_class' => 'mini--option',
                        'attr' => [
                            'data-id' => '188'
                        ]
                    ],
                    [
                        'title' => 'Тутбай',
                        'value' => 'tut',
                        'selected' => true
                    ]
                ]
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

        ]
    ]
);
// $app->includeComponent(
//     'fw:interface.form',
//     'main',
//     [
//         'additional_class' => 'window--full-form',
//         'attr' => [  // доп атрибуты
//             'data-form-id' => 'form-123'
//         ],
//         'method' => 'post',
//         'action' => '/handler.php', //url отправки
//         'elements' => [  //список элементов формы
//             [
//                 'type' => 'text',
//                 'name' => 'login',
//                 'additional_class' => 'js-login',
//                 'attr' => [
//                     'data-id' => '17'
//                 ],
//                 'title' => 'Логин',
//                 'default' => 'Введите имя',
//             ],
//             [
//                 'type' => 'password',
//                 'name' => 'password',
//                 'title' => 'Пароль'
//             ],
//             [
//                 'type' => 'select',
//                 'name' => 'server',
//                 'additional_class' => 'js-login',
//                 'attr' => [
//                     'data-id' => '17'
//                 ],
//                 'size' => '3',
//                 'multiple' => true,
//                 'title' => 'Выберите сервер',
//                 'list' => [
//                     [
//                         'title' => 'Онлайнер',
//                         'value' => 'onliner',
//                         'additional_class' => 'mini--option',
//                         'attr' => [
//                             'data-id' => '188'
//                         ],
//                         'selected' => true
//                     ],
//                     [
//                         'title' => 'Тутбай',
//                         'value' => 'tut',
//                     ]
//                 ]
//             ],
//             [
//                 'type' => 'textarea',
//                 'name' => 'description',
//                 'additional_class' => 'js-login',
//                 'rows' => 3,
//                 'cols' => 30,
//                 'attr' => [
//                     'data-id' => '17'
//                 ],
//                 'title' => 'Описание'
//             ],
//             [
//                 'type' => 'checkbox',
//                 'name' => 'loginRem',
//                 'additional_class' => 'js-login',
//                 'attr' => [
//                     'data-id' => '17'
//                 ],
//                 'title' => 'Запомнить?'
//             ],
//             [
//                 'type' => 'radio',
//                 'name' => 'sex',
//                 'additional_class' => 'js-login',
//                 'list' => [
//                     [
//                         'value' => 'male',
//                         'title' => 'Мужской',
//                         'checked' => true
//                     ],
//                     [
//                         'value' => 'female',
//                         'title' => 'Женский'
//                     ],
//                 ],
//                 'title' => 'Ваш пол'
//             ],
//             [
//                 'type' => 'checkbox',
//                 'name' => 'loginRem',
//                 'additional_class' => 'js-login',
//                 'attr' => [
//                     'data-id' => '17'
//                 ],
//                 'title' => 'Запомнить?'
//             ],
//             [
//                 'type' => 'checkbox',
//                 'name' => 'change',
//                 'additional_class' => 'js-login',
//                 'attr' => [
//                     'data-id' => '17'
//                 ],
//                 'title' => 'Отметь подходящее',
//                 'multiple' => true,
//                 'list' => [
//                     [
//                         'title' => 'HTML',
//                         'value' => 'html',
//                     ],
//                     [
//                         'title' => 'CSS',
//                         'value' => 'css',
//                     ],
//                     [
//                         'title' => 'Javascript',
//                         'value' => 'JS',
//                     ]
//                 ]
//             ],
//             [
//                 'type' => 'number',
//                 'name' => 'number',
//                 'additional_class' => 'js-login',
//                 'min' => 10,
//                 'attr' => [
//                     'data-id' => '8'
//                 ],
//                 'title' => 'Сколько?'
//             ],
//             [
//                 'type' => 'text',
//                 'name' => 'multiText',
//                 'additional_class' => 'js-login',
//                 'attr' => [
//                     'data-id' => '17'
//                 ],
//                 'title' => 'ФИО',
//                 'multiple' => true,
//                 'list' => [
//                     [
//                         'title' => 'Фамилия',
//                     ],
//                     [
//                         'title' => 'Имя',
//                     ],
//                     [
//                         'title' => 'Отчество',
//                      ]
//                 ]
//             ],  
//         ]
//     ]     
// );

$app->footer();
?>
