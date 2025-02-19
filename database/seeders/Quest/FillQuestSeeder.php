<?php

namespace Database\Seeders\Quest;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FillQuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('fill_quests')->insert([
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'HTML расшифровывается как s?:0.',
                'options' => json_encode([
                    [["str" => "HyperText Markup Language", "correct" => true], ["str" => "HighText Machine Learning", "correct" => false], ["str" => "HyperTool Multi Language", "correct" => false], ["str" => "HyperTransfer Markup Language", "correct" => false]]
                ]),
                'difficulty' => 90,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'CSS используется для s?:0 веб-страниц.',
                'options' => json_encode([
                    [["str" => "стилизации", "correct" => true], ["str" => "логики", "correct" => false], ["str" => "хранения данных", "correct" => false], ["str" => "управления сервером", "correct" => false]]
                ]),
                'difficulty' => 85,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'JavaScript является s?:0 языком программирования.',
                'options' => json_encode([
                    [["str" => "интерпретируемым", "correct" => true], ["str" => "компилируемым", "correct" => false], ["str" => "машинным", "correct" => false], ["str" => "низкоуровневым", "correct" => false]]
                ]),
                'difficulty' => 80,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'HTTP означает s?:0.',
                'options' => json_encode([
                    [["str" => "HyperText Transfer Protocol", "correct" => true], ["str" => "Hyperlink Text Protocol", "correct" => false], ["str" => "High Transfer Process", "correct" => false], ["str" => "Hyper Transfer Page", "correct" => false]]
                ]),
                'difficulty' => 85,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Основной язык разметки для создания веб-страниц - это s?:0.',
                'options' => json_encode([
                    [["str" => "HTML", "correct" => true], ["str" => "CSS", "correct" => false], ["str" => "JavaScript", "correct" => false], ["str" => "PHP", "correct" => false]]
                ]),
                'difficulty' => 95,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Какой метод HTTP используется для отправки данных на сервер? s?:0',
                'options' => json_encode([
                    [["str" => "POST", "correct" => true], ["str" => "GET", "correct" => false], ["str" => "DELETE", "correct" => false], ["str" => "PUT", "correct" => false]]
                ]),
                'difficulty' => 75,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Какая технология используется для асинхронных запросов в JavaScript? s?:0',
                'options' => json_encode([
                    [["str" => "AJAX", "correct" => true], ["str" => "JSON", "correct" => false], ["str" => "React", "correct" => false], ["str" => "Node.js", "correct" => false]]
                ]),
                'difficulty' => 80,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Какой тег HTML используется для создания гиперссылки? s?:0',
                'options' => json_encode([
                    [["str" => "<a>", "correct" => true], ["str" => "<link>", "correct" => false], ["str" => "<href>", "correct" => false], ["str" => "<hyper>", "correct" => false]]
                ]),
                'difficulty' => 90,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Какой атрибут HTML используется для задания альтернативного текста изображения? s?:0',
                'options' => json_encode([
                    [["str" => "alt", "correct" => true], ["str" => "title", "correct" => false], ["str" => "src", "correct" => false], ["str" => "href", "correct" => false]]
                ]),
                'difficulty' => 85,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Какой метод JavaScript используется для вывода сообщения в консоль? s?:0',
                'options' => json_encode([[["str" => "console.log", "correct" => true], ["str" => "alert", "correct" => false], ["str" => "print", "correct" => false], ["str" => "document.write", "correct" => false]]]),
                'difficulty' => 85,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'HTML используется для создания s?:0 веб-страниц, а CSS отвечает за их s?:1.',
                'options' => json_encode([
                    [['str' => 'структуры', 'correct' => true], ['str' => 'дизайна', 'correct' => false], ['str' => 'функционала', 'correct' => false], ['str' => 'анимации', 'correct' => false]],
                    [['str' => 'внешний вид', 'correct' => true], ['str' => 'данные', 'correct' => false], ['str' => 'безопасность', 'correct' => false], ['str' => 'бэкенд', 'correct' => false]]
                ]),
                'difficulty' => 90,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'JavaScript является s?:0 языком программирования, который выполняется s?:1.',
                'options' => json_encode([
                    [['str' => 'интерпретируемым', 'correct' => true], ['str' => 'компилируемым', 'correct' => false], ['str' => 'машинным', 'correct' => false], ['str' => 'функциональным', 'correct' => false]],
                    [['str' => 'в браузере', 'correct' => true], ['str' => 'на сервере', 'correct' => false], ['str' => 'в базе данных', 'correct' => false], ['str' => 'на клиенте и сервере', 'correct' => false]]
                ]),
                'difficulty' => 85,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Основной метод взаимодействия клиента и сервера в веб-приложениях осуществляется через s?:0.',
                'options' => json_encode([
                    [['str' => 'HTTP-запросы', 'correct' => true], ['str' => 'SQL-запросы', 'correct' => false], ['str' => 'CSS-стили', 'correct' => false], ['str' => 'JavaScript-код', 'correct' => false]]
                ]),
                'difficulty' => 80,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'В CSS свойство s?:0 отвечает за цвет текста, а s?:1 — за размер шрифта.',
                'options' => json_encode([
                    [['str' => 'color', 'correct' => true], ['str' => 'background', 'correct' => false], ['str' => 'font-size', 'correct' => false], ['str' => 'margin', 'correct' => false]],
                    [['str' => 'font-size', 'correct' => true], ['str' => 'padding', 'correct' => false], ['str' => 'border', 'correct' => false], ['str' => 'opacity', 'correct' => false]]
                ]),
                'difficulty' => 75,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Для создания интерактивных элементов в HTML используются атрибуты s?:0.',
                'options' => json_encode([
                    [['str' => 'onClick', 'correct' => true], ['str' => 'src', 'correct' => false], ['str' => 'href', 'correct' => false], ['str' => 'alt', 'correct' => false]]
                ]),
                'difficulty' => 80,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Фреймворк s?:0 является одним из самых популярных для создания SPA (Single Page Application).',
                'options' => json_encode([
                    [['str' => 'React', 'correct' => true], ['str' => 'Bootstrap', 'correct' => false], ['str' => 'jQuery', 'correct' => false], ['str' => 'Django', 'correct' => false]]
                ]),
                'difficulty' => 70,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Протокол HTTPS обеспечивает s?:0 при передаче данных между клиентом и сервером.',
                'options' => json_encode([
                    [['str' => 'безопасность', 'correct' => true], ['str' => 'скорость', 'correct' => false], ['str' => 'доступность', 'correct' => false], ['str' => 'оптимизацию', 'correct' => false]]
                ]),
                'difficulty' => 85,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'API для асинхронного взаимодействия с сервером в JavaScript называется s?:0.',
                'options' => json_encode([
                    [['str' => 'Fetch API', 'correct' => true], ['str' => 'jQuery', 'correct' => false], ['str' => 'DOM API', 'correct' => false], ['str' => 'WebSockets', 'correct' => false]]
                ]),
                'difficulty' => 80,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Главным языком разметки в веб-разработке является s?:0.',
                'options' => json_encode([
                    [['str' => 'HTML', 'correct' => true], ['str' => 'CSS', 'correct' => false], ['str' => 'JavaScript', 'correct' => false], ['str' => 'PHP', 'correct' => false]]
                ]),
                'difficulty' => 95,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'CSS-фреймворк s?:0 популярен для быстрой верстки адаптивных сайтов.',
                'options' => json_encode([
                    [['str' => 'Bootstrap', 'correct' => true], ['str' => 'Sass', 'correct' => false], ['str' => 'Vue.js', 'correct' => false], ['str' => 'Express.js', 'correct' => false]]
                ]),
                'difficulty' => 75,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Язык программирования s?:0 используется для создания динамических веб-приложений.',
                'options' => json_encode([
                    [['str' => 'JavaScript', 'correct' => true], ['str' => 'HTML', 'correct' => false], ['str' => 'CSS', 'correct' => false], ['str' => 'PHP', 'correct' => false]]
                ]),
                'difficulty' => 85,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Для стилизации HTML-документов используется s?:0.',
                'options' => json_encode([
                    [['str' => 'CSS', 'correct' => true], ['str' => 'JavaScript', 'correct' => false], ['str' => 'SQL', 'correct' => false], ['str' => 'Python', 'correct' => false]]
                ]),
                'difficulty' => 90,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'В JavaScript оператор s?:0 используется для объявления переменной.',
                'options' => json_encode([
                    [['str' => 'let', 'correct' => true], ['str' => 'define', 'correct' => false], ['str' => 'var', 'correct' => false], ['str' => 'set', 'correct' => false]]
                ]),
                'difficulty' => 80,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Метод fetch() используется для выполнения s?:0 запросов.',
                'options' => json_encode([
                    [['str' => 'HTTP', 'correct' => true], ['str' => 'SQL', 'correct' => false], ['str' => 'FTP', 'correct' => false], ['str' => 'DNS', 'correct' => false]]
                ]),
                'difficulty' => 75,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Сетевой протокол s?:0 используется для передачи данных в Интернете.',
                'options' => json_encode([
                    [['str' => 'HTTP', 'correct' => true], ['str' => 'TCP', 'correct' => false], ['str' => 'UDP', 'correct' => false], ['str' => 'IP', 'correct' => false]]
                ]),
                'difficulty' => 85,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'HTML-элемент s?:0 используется для создания ссылки.',
                'options' => json_encode([
                    [['str' => 'a', 'correct' => true], ['str' => 'div', 'correct' => false], ['str' => 'span', 'correct' => false], ['str' => 'p', 'correct' => false]]
                ]),
                'difficulty' => 95,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'В CSS свойство s?:0 отвечает за расположение элемента.',
                'options' => json_encode([
                    [['str' => 'position', 'correct' => true], ['str' => 'display', 'correct' => false], ['str' => 'align', 'correct' => false], ['str' => 'flex', 'correct' => false]]
                ]),
                'difficulty' => 80,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'В JavaScript функция s?:0 используется для вывода информации в консоль.',
                'options' => json_encode([
                    [['str' => 'console.log', 'correct' => true], ['str' => 'print', 'correct' => false], ['str' => 'echo', 'correct' => false], ['str' => 'debug', 'correct' => false]]
                ]),
                'difficulty' => 85,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Система контроля версий s?:0 является самой популярной среди разработчиков.',
                'options' => json_encode([
                    [['str' => 'Git', 'correct' => true], ['str' => 'SVN', 'correct' => false], ['str' => 'Mercurial', 'correct' => false], ['str' => 'Perforce', 'correct' => false]]
                ]),
                'difficulty' => 75,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Язык разметки s?:0 используется для написания стилей в веб-разработке.',
                'options' => json_encode([
                    [['str' => 'CSS', 'correct' => true], ['str' => 'HTML', 'correct' => false], ['str' => 'JavaScript', 'correct' => false], ['str' => 'PHP', 'correct' => false]]
                ]),
                'difficulty' => 90,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Основные принципы разработки веб-приложений описаны в методологии s?:0. В основе лежит скоординированная работа всех участников проекта.',
                'options' => json_encode([
                    [["str" => "Agile", "correct" => true], ["str" => "Waterfall", "correct" => false], ["str" => "Scrum", "correct" => false], ["str" => "DevOps", "correct" => false]],
                    [["str" => "Планирование", "correct" => true], ["str" => "Тестирование", "correct" => false], ["str" => "Анализ данных", "correct" => false], ["str" => "Поставка", "correct" => false]]
                ]),
                'difficulty' => 75,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'HTML5 был официально принят в s?:0. Этот стандарт добавил множество новых возможностей, таких как видео и аудио теги.',
                'options' => json_encode([
                    [["str" => "2014", "correct" => false], ["str" => "2012", "correct" => true], ["str" => "2015", "correct" => false], ["str" => "2010", "correct" => false]]
                ]),
                'difficulty' => 60,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'CSS позволяет использовать s?:0 для анимации и переходов. Это свойство позволяет изменять стиль элемента с течением времени.',
                'options' => json_encode([
                    [["str" => "transition", "correct" => true], ["str" => "transform", "correct" => false], ["str" => "animation", "correct" => false], ["str" => "keyframes", "correct" => false]]
                ]),
                'difficulty' => 70,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'JavaScript использует тип данных s?:0 для работы с числами с плавающей запятой, а также для выражений, требующих точности.',
                'options' => json_encode([
                    [["str" => "number", "correct" => true], ["str" => "float", "correct" => false], ["str" => "double", "correct" => false], ["str" => "int", "correct" => false]]
                ]),
                'difficulty' => 65,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Для работы с сервером в JavaScript применяется объект s?:0. Он позволяет отправлять запросы на сервер и обрабатывать ответы.',
                'options' => json_encode([
                    [["str" => "XMLHttpRequest", "correct" => true], ["str" => "Fetch", "correct" => false], ["str" => "Axios", "correct" => false], ["str" => "jQuery", "correct" => false]]
                ]),
                'difficulty' => 80,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'С помощью фреймворка s?:0 можно эффективно создавать интерфейсы для веб-приложений с помощью компонентной структуры.',
                'options' => json_encode([
                    [["str" => "React", "correct" => true], ["str" => "Angular", "correct" => false], ["str" => "Vue", "correct" => false], ["str" => "Svelte", "correct" => false]]
                ]),
                'difficulty' => 70,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Серверный язык программирования с синтаксисом, похожим на JavaScript, но предназначенный для работы на сервере, называется s?:0.',
                'options' => json_encode([
                    [["str" => "Node.js", "correct" => true], ["str" => "PHP", "correct" => false], ["str" => "Python", "correct" => false], ["str" => "Ruby", "correct" => false]]
                ]),
                'difficulty' => 85,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Для сохранения данных в виде ключ-значение в браузере используется объект s?:0.',
                'options' => json_encode([
                    [["str" => "localStorage", "correct" => true], ["str" => "sessionStorage", "correct" => false], ["str" => "cookies", "correct" => false], ["str" => "IndexedDB", "correct" => false]]
                ]),
                'difficulty' => 60,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'При использовании фреймворка s?:0, разработчики могут легко настраивать роутинг и управлять состоянием приложения.',
                'options' => json_encode([
                    [["str" => "Vue", "correct" => true], ["str" => "React", "correct" => false], ["str" => "Angular", "correct" => false], ["str" => "Ember", "correct" => false]]
                ]),
                'difficulty' => 75,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Чтобы включить поддержку CORS на сервере, необходимо добавить соответствующий заголовок s?:0.',
                'options' => json_encode([
                    [["str" => "Access-Control-Allow-Origin", "correct" => true], ["str" => "Content-Type", "correct" => false], ["str" => "Authorization", "correct" => false], ["str" => "X-Content-Type-Options", "correct" => false]]
                ]),
                'difficulty' => 90,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Для оптимизации загрузки веб-страниц рекомендуется использовать s?:0, чтобы загружать ресурсы асинхронно, не блокируя рендеринг страницы.',
                'options' => json_encode([
                    [["str" => "async", "correct" => true], ["str" => "defer", "correct" => false], ["str" => "load", "correct" => false], ["str" => "document", "correct" => false]]
                ]),
                'difficulty' => 70,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'При использовании CSS Grid, свойство s?:0 позволяет настроить количество строк в контейнере.',
                'options' => json_encode([
                    [["str" => "grid-template-rows", "correct" => true], ["str" => "grid-template-columns", "correct" => false], ["str" => "grid-gap", "correct" => false], ["str" => "grid-row", "correct" => false]]
                ]),
                'difficulty' => 75,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Для получения данных с внешнего API в JavaScript удобно использовать суть команды s?:0, которая позволяет обработать запросы асинхронно.',
                'options' => json_encode([
                    [["str" => "fetch", "correct" => true], ["str" => "XMLHttpRequest", "correct" => false], ["str" => "ajax", "correct" => false], ["str" => "request", "correct" => false]]
                ]),
                'difficulty' => 80,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Для работы с пользовательским интерфейсом в мобильных приложениях с использованием HTML, CSS и JavaScript используется технология s?:0.',
                'options' => json_encode([
                    [["str" => "PWA", "correct" => true], ["str" => "AMP", "correct" => false], ["str" => "React Native", "correct" => false], ["str" => "Flutter", "correct" => false]]
                ]),
                'difficulty' => 75,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'В отличие от сессий, cookies хранятся на стороне клиента и могут быть использованы для хранения данных на s?:0.',
                'options' => json_encode([
                    [["str" => "долгосрочный период", "correct" => true], ["str" => "короткий период", "correct" => false], ["str" => "сессию", "correct" => false], ["str" => "мгновенно", "correct" => false]]
                ]),
                'difficulty' => 60,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Фреймворк s?:0 предназначен для создания высокопроизводительных веб-приложений с использованием серверного рендеринга и статики.',
                'options' => json_encode([
                    [["str" => "Next.js", "correct" => true], ["str" => "Nuxt.js", "correct" => false], ["str" => "Express", "correct" => false], ["str" => "Angular", "correct" => false]]
                ]),
                'difficulty' => 80,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Чтобы избежать конфликтов стилей при использовании нескольких библиотек, применяется метод с помощью s?:0, который позволяет стилизовать компоненты в изоляции.',
                'options' => json_encode([
                    [["str" => "CSS-in-JS", "correct" => true], ["str" => "Scoped CSS", "correct" => false], ["str" => "SASS", "correct" => false], ["str" => "PostCSS", "correct" => false]]
                ]),
                'difficulty' => 85,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Для более легкой работы с клиентским состоянием данных в веб-приложениях, часто используется библиотека s?:0.',
                'options' => json_encode([
                    [["str" => "Redux", "correct" => true], ["str" => "jQuery", "correct" => false], ["str" => "Vuex", "correct" => false], ["str" => "Moment.js", "correct" => false]]
                ]),
                'difficulty' => 75,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Для защиты веб-приложений от атак через подделку запросов, рекомендуется использовать механизм s?:0.',
                'options' => json_encode([
                    [["str" => "CSRF токен", "correct" => true], ["str" => "JWT", "correct" => false], ["str" => "OAuth", "correct" => false], ["str" => "CORS", "correct" => false]]
                ]),
                'difficulty' => 85,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'При создании SPA (Single Page Application), рендеринг всего контента обычно происходит через s?:0, что делает страницы динамичными и повышает производительность.',
                'options' => json_encode([
                    [["str" => "JavaScript", "correct" => true], ["str" => "HTML", "correct" => false], ["str" => "CSS", "correct" => false], ["str" => "PHP", "correct" => false]]
                ]),
                'difficulty' => 80,
            ]


        ]);
    }
}
