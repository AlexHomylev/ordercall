<?php

return [
    'work' => [
        'title' => 'Включить',
        'control_type' => waHtmlControl::SELECT,
        'options' => [
            '0' => 'выкл..',
            '1' => 'вкл.',
        ],
    ],
    'email_from' => [
        'title' => 'Почта отправителя',
        'control_type' => waHtmlControl::INPUT,
    ],
    'email_to' => [
        'title' => 'Почта получателя',
        'control_type' => waHtmlControl::INPUT,
    ],
    'link' => [
        'title' => 'Ссылка на документ с политикой обработки персональных данных',
        'control_type' => waHtmlControl::INPUT,
    ],
];