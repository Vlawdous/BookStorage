<?php

namespace App\DataFixtures;

class FixtureData
{
    public const COVER_TYPE_LIST = [
        'hard',
        'soft'
    ];

    public const PRODUCT_TYPE_LIST = [
        'book',
        'household',
        'stationery'
    ];

    public const PRODUCT_DATA_LIST = [
        // Книги для тестов getNewHighRatingBooks
        [
            'product' => [
                'name' => 'JavaScript и Node.js для веб-разработчиков',
                'description' => 'Топовая книжка по базе JS',
                'alias' => 'js-and-node-for-development',
                'imageSrc' => 'https://cdn.img-gorod.ru/310x500/nomenclature/28/795/2879545.jpg',
                'price' => 1499.50,
                'productType' => 'book'
            ],
            'book' => [
                'datePublicate' => '2023-03-15',
                'numberOfPages' => 410,
                'publisher' => 'ТЕСТ 1',
                'circulation' => 2,
                'weight' => 0.450,
                'ageLimit' => 12,
                'horizontalLength' => 16.2,
                'verticalLength' => 10.1,
                'width' => 4,
                'coverType' => 'hard'
            ],
            'rating' => [
                [
                    'ratingValue' => 4.5,
                    'plusText' => 'Ваще огонь',
                    'minusText' => null,
                    'totalText' => 'Прочитал эту замечательную книгу. Теперь при сложении 2 + 2 получаю 22. Прозрение!'
                ],
                [
                    'ratingValue' => 4.8,
                    'plusText' => 'Ваще огонь',
                    'minusText' => null,
                    'totalText' => 'Прочитал эту замечательную книгу. Теперь при сложении 2 + 2 получаю 22. Прозрение!'
                ],
                [
                    'ratingValue' => 4.9,
                    'plusText' => 'Ваще огонь',
                    'minusText' => null,
                    'totalText' => 'Прочитал эту замечательную книгу. Теперь при сложении 2 + 2 получаю 22. Прозрение!'
                ],
                [
                    'ratingValue' => 4.1,
                    'plusText' => 'Ваще огонь',
                    'minusText' => null,
                    'totalText' => 'Прочитал эту замечательную книгу. Теперь при сложении 2 + 2 получаю 22. Прозрение!'
                ]
            ]
        ],


        [
            'product' => [
                'name' => 'YoptaScript. Новое молодёжное движение',
                'description' => 'Как чётко писать на YoptaScript',
                'alias' => 'js-for-gentleman',
                'imageSrc' => 'https://cdn.img-gorod.ru/310x500/nomenclature/28/536/2853698.jpg',
                'price' => 1525.59,
                'productType' => 'book'
            ],
            'book' => [
                'datePublicate' => '2023-03-16',
                'numberOfPages' => 356,
                'publisher' => 'ТЕСТ 2',
                'circulation' => 1,
                'weight' => 0.420,
                'ageLimit' => 16,
                'horizontalLength' => 16.2,
                'verticalLength' => 10.1,
                'width' => 4,
                'coverType' => 'hard'
            ],
            'rating' => [
                [
                    'ratingValue' => 3.9,
                    'plusText' => 'Неплохо подходит в качестве кулька для скорлупы',
                    'minusText' => 'Ёпта, я скрипты пришёл писать, а не читать ваши книжки',
                    'totalText' => 'В общем, трата времени, не покупаем'
                ],
                [
                    'ratingValue' => 3.2,
                    'plusText' => 'Неплохо подходит в качестве кулька для скорлупы',
                    'minusText' => 'Ёпта, я скрипты пришёл писать, а не читать ваши книжки',
                    'totalText' => 'В общем, трата времени, не покупаем'
                ],
                [
                    'ratingValue' => 2.6,
                    'plusText' => 'Неплохо подходит в качестве кулька для скорлупы',
                    'minusText' => 'Ёпта, я скрипты пришёл писать, а не читать ваши книжки',
                    'totalText' => 'В общем, трата времени, не покупаем'
                ],
            ]
        ],


        [
            'product' => [
                'name' => 'Научись нестандартно срать на PHP',
                'description' => 'Названием всё сказано',
                'alias' => 'php-very-nice',
                'imageSrc' => 'https://cdn.img-gorod.ru/310x500/nomenclature/23/344/2334417.jpg',
                'price' => 1337.28,
                'productType' => 'book'
            ],
            'book' => [
                'datePublicate' => '2023-03-17',
                'numberOfPages' => 550,
                'publisher' => 'ТЕСТ 3',
                'circulation' => 2,
                'weight' => 0.650,
                'ageLimit' => 14,
                'horizontalLength' => 16.2,
                'verticalLength' => 10.1,
                'width' => 4,
                'coverType' => 'soft'
            ],
            'rating' => [
                [
                    'ratingValue' => 5.0,
                    'plusText' => 'Крутяк. В туалете самое то',
                    'minusText' => 'Атсутствуют',
                    'totalText' => 'Bruh'
                ],
                [
                    'ratingValue' => 5.0,
                    'plusText' => 'Крутяк. В туалете самое то',
                    'minusText' => 'Атсутствуют',
                    'totalText' => 'Bruh'
                ]
            ]
        ],


        [
            'product' => [
                'name' => 'Golang для маленьких и тупых',
                'description' => 'Самое то для автора проекта',
                'alias' => 'ya-debil',
                'imageSrc' => 'https://cdn.img-gorod.ru/310x500/nomenclature/28/024/2802483.jpg',
                'price' => 2550.0,
                'productType' => 'book'
            ],
            'book' => [
                'datePublicate' => '2023-03-17',
                'numberOfPages' => 410,
                'publisher' => 'ТЕСТ 4',
                'circulation' => 2,
                'weight' => 0.450,
                'ageLimit' => 12,
                'horizontalLength' => 16.2,
                'verticalLength' => 10.1,
                'width' => 4,
                'coverType' => 'hard'
            ],
        ],


        [
            'product' => [
                'name' => 'Golang для старых и умных',
                'description' => 'Ааааоооооаааааауууууууу',
                'alias' => 'golang-moment',
                'imageSrc' => 'https://cdn.img-gorod.ru/310x500/nomenclature/28/024/2802483.jpg',
                'price' => 3799.0,
                'productType' => 'book'
            ],
            'book' => [
                'datePublicate' => '2023-03-15',
                'numberOfPages' => 410,
                'publisher' => 'ТЕСТ 5',
                'circulation' => 2,
                'weight' => 0.450,
                'ageLimit' => 12,
                'horizontalLength' => 16.2,
                'verticalLength' => 10.1,
                'width' => 4,
                'coverType' => 'soft'
            ],
            'rating' => [
                [
                    'ratingValue' => 4.5,
                    'plusText' => 'Крутая книга',
                    'minusText' => null,
                    'totalText' => 'СКОКА СКОКА ОНА СТОИТ?!'
                ]
            ]
        ]
    ];
}