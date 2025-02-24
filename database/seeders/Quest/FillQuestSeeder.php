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
            ],

            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Функция f(x) называется s?:0 в точке x₀, если существует s?:1, который является угловым коэффициентом s?:2 к графику функции.',
                'options' => json_encode([
                    [
                        ["str" => "дифференцируемой", "correct" => true],
                        ["str" => "непрерывной", "correct" => false],
                        ["str" => "линейной", "correct" => false]
                    ],
                    [
                        ["str" => "предел", "correct" => true],
                        ["str" => "интеграл", "correct" => false],
                        ["str" => "разрыв", "correct" => false]
                    ],
                    [
                        ["str" => "касательной", "correct" => true],
                        ["str" => "секущей", "correct" => false],
                        ["str" => "асимптоты", "correct" => false]
                    ]
                ]),
                'difficulty' => 70,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Для вычисления производной s?:0 функции f(g(x)) используется s?:1 правило, где производная внешней функции умножается на s?:2 внутренней.',
                'options' => json_encode([
                    [
                        ["str" => "сложной", "correct" => true],
                        ["str" => "обратной", "correct" => false],
                        ["str" => "неявной", "correct" => false]
                    ],
                    [
                        ["str" => "цепное", "correct" => true],
                        ["str" => "произведения", "correct" => false],
                        ["str" => "Лопиталя", "correct" => false]
                    ],
                    [
                        ["str" => "производную", "correct" => true],
                        ["str" => "интеграл", "correct" => false],
                        ["str" => "предел", "correct" => false]
                    ]
                ]),
                'difficulty' => 65,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Если функция имеет s?:0 в точке x₀, то её первая производная s?:1, а вторая производная s?:2.',
                'options' => json_encode([
                    [
                        ["str" => "максимум", "correct" => true],
                        ["str" => "минимум", "correct" => false],
                        ["str" => "перегиб", "correct" => false]
                    ],
                    [
                        ["str" => "равна нулю", "correct" => true],
                        ["str" => "положительна", "correct" => false],
                        ["str" => "отрицательна", "correct" => false]
                    ],
                    [
                        ["str" => "отрицательна", "correct" => true],
                        ["str" => "положительна", "correct" => false],
                        ["str" => "равна нулю", "correct" => false]
                    ]
                ]),
                'difficulty' => 60,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Предел функции f(x) в точке a существует, если s?:0 пределы s?:1 и s?:2 совпадают.',
                'options' => json_encode([
                    [
                        ["str" => "левый", "correct" => false],
                        ["str" => "правый", "correct" => false],
                        ["str" => "левый и правый", "correct" => true]
                    ],
                    [
                        ["str" => "слева", "correct" => true],
                        ["str" => "справа", "correct" => false],
                        ["str" => "на бесконечности", "correct" => false]
                    ],
                    [
                        ["str" => "справа", "correct" => true],
                        ["str" => "слева", "correct" => false],
                        ["str" => "в окрестности", "correct" => false]
                    ]
                ]),
                'difficulty' => 55,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Функция f(x) = x³ имеет s?:0 в точке x=0, где s?:1 производная равна s?:2.',
                'options' => json_encode([
                    [
                        ["str" => "точку перегиба", "correct" => true],
                        ["str" => "максимум", "correct" => false],
                        ["str" => "минимум", "correct" => false]
                    ],
                    [
                        ["str" => "вторая", "correct" => true],
                        ["str" => "первая", "correct" => false],
                        ["str" => "третья", "correct" => false]
                    ],
                    [
                        ["str" => "0", "correct" => true],
                        ["str" => "6", "correct" => false],
                        ["str" => "3", "correct" => false]
                    ]
                ]),
                'difficulty' => 70,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Производная s?:0 функции равна s?:1, а интеграл — s?:2.',
                'options' => json_encode([
                    [
                        ["str" => "скорости", "correct" => true],
                        ["str" => "ускорения", "correct" => false],
                        ["str" => "пути", "correct" => false]
                    ],
                    [
                        ["str" => "ускорению", "correct" => true],
                        ["str" => "скорости", "correct" => false],
                        ["str" => "силе", "correct" => false]
                    ],
                    [
                        ["str" => "пути", "correct" => true],
                        ["str" => "скорости", "correct" => false],
                        ["str" => "массе", "correct" => false]
                    ]
                ]),
                'difficulty' => 65,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Если s?:0 функции f(x) в точке x₀ равен s?:1, то касательная к графику в этой точке s?:2.',
                'options' => json_encode([
                    [
                        ["str" => "предел", "correct" => false],
                        ["str" => "производная", "correct" => true],
                        ["str" => "интеграл", "correct" => false]
                    ],
                    [
                        ["str" => "нулю", "correct" => true],
                        ["str" => "бесконечности", "correct" => false],
                        ["str" => "единице", "correct" => false]
                    ],
                    [
                        ["str" => "горизонтальна", "correct" => true],
                        ["str" => "вертикальна", "correct" => false],
                        ["str" => "не существует", "correct" => false]
                    ]
                ]),
                'difficulty' => 60,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Правило s?:0 используется для раскрытия неопределённостей вида s?:1, где и числитель, и знаменатель стремятся к s?:2.',
                'options' => json_encode([
                    [
                        ["str" => "Лопиталя", "correct" => true],
                        ["str" => "произведения", "correct" => false],
                        ["str" => "цепное", "correct" => false]
                    ],
                    [
                        ["str" => "0/0", "correct" => true],
                        ["str" => "∞/∞", "correct" => false],
                        ["str" => "1^∞", "correct" => false]
                    ],
                    [
                        ["str" => "нулю", "correct" => true],
                        ["str" => "бесконечности", "correct" => false],
                        ["str" => "единице", "correct" => false]
                    ]
                ]),
                'difficulty' => 70,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Функция f(x) = |x| не имеет s?:0 в точке x=0, так как график имеет s?:1, а производная s?:2.',
                'options' => json_encode([
                    [
                        ["str" => "производной", "correct" => true],
                        ["str" => "предела", "correct" => false],
                        ["str" => "интеграла", "correct" => false]
                    ],
                    [
                        ["str" => "излом", "correct" => true],
                        ["str" => "разрыв", "correct" => false],
                        ["str" => "асимптоту", "correct" => false]
                    ],
                    [
                        ["str" => "не существует", "correct" => true],
                        ["str" => "равна 0", "correct" => false],
                        ["str" => "равна 1", "correct" => false]
                    ]
                ]),
                'difficulty' => 65,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Для функции f(x) = e^x производная любого порядка s?:0, а для f(x) = ln(x) вторая производная s?:1.',
                'options' => json_encode([
                    [
                        ["str" => "остаётся e^x", "correct" => true],
                        ["str" => "увеличивается", "correct" => false],
                        ["str" => "равна нулю", "correct" => false]
                    ],
                    [
                        ["str" => "отрицательна", "correct" => true],
                        ["str" => "положительна", "correct" => false],
                        ["str" => "равна нулю", "correct" => false]
                    ]
                ]),
                'difficulty' => 60,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Функция возрастает на интервале, если её s?:0 производная s?:1 нуля.',
                'options' => json_encode([
                    [
                        ["str" => "первая", "correct" => true],
                        ["str" => "вторая", "correct" => false],
                        ["str" => "третья", "correct" => false]
                    ],
                    [
                        ["str" => "больше", "correct" => true],
                        ["str" => "меньше", "correct" => false],
                        ["str" => "равна", "correct" => false]
                    ]
                ]),
                'difficulty' => 65,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Производная частного u(x)/v(x) вычисляется по формуле: (u′v s?:0 u v′) / s?:1.',
                'options' => json_encode([
                    [
                        ["str" => "−", "correct" => true],
                        ["str" => "+", "correct" => false],
                        ["str" => "×", "correct" => false]
                    ],
                    [
                        ["str" => "v²", "correct" => true],
                        ["str" => "u²", "correct" => false],
                        ["str" => "uv", "correct" => false]
                    ]
                ]),
                'difficulty' => 70,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Если вторая производная функции s?:0, то график функции s?:1 вниз.',
                'options' => json_encode([
                    [
                        ["str" => "отрицательна", "correct" => true],
                        ["str" => "положительна", "correct" => false],
                        ["str" => "равна нулю", "correct" => false]
                    ],
                    [
                        ["str" => "выпуклый", "correct" => true],
                        ["str" => "вогнутый", "correct" => false],
                        ["str" => "линейный", "correct" => false]
                    ]
                ]),
                'difficulty' => 60,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Производная обратной функции y = f⁻¹(x) равна s?:0, где y′ = 1 / s?:1.',
                'options' => json_encode([
                    [
                        ["str" => "dx/dy", "correct" => false],
                        ["str" => "1/f′(y)", "correct" => true],
                        ["str" => "f′(x)", "correct" => false]
                    ],
                    [
                        ["str" => "f′(y)", "correct" => true],
                        ["str" => "f(y)", "correct" => false],
                        ["str" => "f′′(y)", "correct" => false]
                    ]
                ]),
                'difficulty' => 75,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Для параметрической функции x(t), y(t) производная dy/dx вычисляется как s?:0 делённое на s?:1.',
                'options' => json_encode([
                    [
                        ["str" => "dy/dt", "correct" => true],
                        ["str" => "dx/dt", "correct" => false],
                        ["str" => "d²y/dt²", "correct" => false]
                    ],
                    [
                        ["str" => "dx/dt", "correct" => true],
                        ["str" => "dy/dt", "correct" => false],
                        ["str" => "dt/dx", "correct" => false]
                    ]
                ]),
                'difficulty' => 70,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Уравнение касательной к графику в точке (x₀, f(x₀)): y = f(x₀) + s?:0 (x s?:1 x₀).',
                'options' => json_encode([
                    [
                        ["str" => "f′(x₀)", "correct" => true],
                        ["str" => "f(x₀)", "correct" => false],
                        ["str" => "f′′(x₀)", "correct" => false]
                    ],
                    [
                        ["str" => "−", "correct" => true],
                        ["str" => "+", "correct" => false],
                        ["str" => "×", "correct" => false]
                    ]
                ]),
                'difficulty' => 65,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Если s(t) — закон движения, то первая производная s′(t) есть s?:0, а вторая s′′(t) — s?:1.',
                'options' => json_encode([
                    [
                        ["str" => "скорость", "correct" => true],
                        ["str" => "ускорение", "correct" => false],
                        ["str" => "путь", "correct" => false]
                    ],
                    [
                        ["str" => "ускорение", "correct" => true],
                        ["str" => "скорость", "correct" => false],
                        ["str" => "сила", "correct" => false]
                    ]
                ]),
                'difficulty' => 60,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Производная третьего порядка функции f(x) = x⁴ будет s?:0, а четвёртого — s?:1.',
                'options' => json_encode([
                    [
                        ["str" => "24x", "correct" => true],
                        ["str" => "12x²", "correct" => false],
                        ["str" => "4x³", "correct" => false]
                    ],
                    [
                        ["str" => "24", "correct" => true],
                        ["str" => "0", "correct" => false],
                        ["str" => "24x", "correct" => false]
                    ]
                ]),
                'difficulty' => 70,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Для неявной функции F(x,y) = 0 производная dy/dx равна s?:0, где F_x и F_y — частные производные по s?:1.',
                'options' => json_encode([
                    [
                        ["str" => "−F_x/F_y", "correct" => true],
                        ["str" => "F_x/F_y", "correct" => false],
                        ["str" => "F_y/F_x", "correct" => false]
                    ],
                    [
                        ["str" => "x и y", "correct" => true],
                        ["str" => "y и x", "correct" => false],
                        ["str" => "t и x", "correct" => false]
                    ]
                ]),
                'difficulty' => 75,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Чтобы найти максимум функции, нужно: 1) найти s?:0 точки, 2) проверить знак s?:1 производной.',
                'options' => json_encode([
                    [
                        ["str" => "критические", "correct" => true],
                        ["str" => "перегиба", "correct" => false],
                        ["str" => "разрыва", "correct" => false]
                    ],
                    [
                        ["str" => "второй", "correct" => true],
                        ["str" => "первой", "correct" => false],
                        ["str" => "третьей", "correct" => false]
                    ]
                ]),
                'difficulty' => 65,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Логарифмическое дифференцирование применяется для функций вида s?:0. После взятия s?:1 от обеих частей используется правило s?:2.',
                'options' => json_encode([
                    [
                        ["str" => "y = u(x)^v(x)", "correct" => true],
                        ["str" => "y = sin(ax)", "correct" => false],
                        ["str" => "y = e^x", "correct" => false]
                    ],
                    [
                        ["str" => "логарифма", "correct" => true],
                        ["str" => "экспоненты", "correct" => false],
                        ["str" => "интеграла", "correct" => false]
                    ],
                    [
                        ["str" => "дифференцирования", "correct" => false],
                        ["str" => "производной сложной функции", "correct" => true],
                        ["str" => "Лопиталя", "correct" => false]
                    ]
                ]),
                'difficulty' => 70,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Эластичность функции E(x) показывает s?:0 изменения спроса при s?:1 цены. Вычисляется как s?:2.',
                'options' => json_encode([
                    [
                        ["str" => "процентное", "correct" => true],
                        ["str" => "абсолютное", "correct" => false],
                        ["str" => "линейное", "correct" => false]
                    ],
                    [
                        ["str" => "1%", "correct" => true],
                        ["str" => "10%", "correct" => false],
                        ["str" => "единичном", "correct" => false]
                    ],
                    [
                        ["str" => "x·f’(x)/f(x)", "correct" => true],
                        ["str" => "f’(x)/x", "correct" => false],
                        ["str" => "f(x)/x", "correct" => false]
                    ]
                ]),
                'difficulty' => 65,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Производная arcsin(x) равна s?:0, а производная arctg(x) — s?:1.',
                'options' => json_encode([
                    [
                        ["str" => "1/√(1−x²)", "correct" => true],
                        ["str" => "−1/√(1−x²)", "correct" => false],
                        ["str" => "1/(1+x²)", "correct" => false]
                    ],
                    [
                        ["str" => "1/(1+x²)", "correct" => true],
                        ["str" => "−1/(1+x²)", "correct" => false],
                        ["str" => "1/√(1+x²)", "correct" => false]
                    ]
                ]),
                'difficulty' => 75,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Приближённое значение функции в точке x₀+Δx: f(x₀+Δx) ≈ f(x₀) + s?:0·Δx. Это называется s?:1.',
                'options' => json_encode([
                    [
                        ["str" => "f’(x₀)", "correct" => true],
                        ["str" => "f(x₀)", "correct" => false],
                        ["str" => "Δx²", "correct" => false]
                    ],
                    [
                        ["str" => "линеаризация", "correct" => true],
                        ["str" => "интегрирование", "correct" => false],
                        ["str" => "оптимизация", "correct" => false]
                    ]
                ]),
                'difficulty' => 60,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Для кусочно-заданной функции дифференцируемость в точке "склейки" требует: 1) s?:0 непрерывности, 2) равенства s?:1 производных.',
                'options' => json_encode([
                    [
                        ["str" => "непрерывности", "correct" => true],
                        ["str" => "разрыва", "correct" => false],
                        ["str" => "периодичности", "correct" => false]
                    ],
                    [
                        ["str" => "левой и правой", "correct" => true],
                        ["str" => "вторых", "correct" => false],
                        ["str" => "обратных", "correct" => false]
                    ]
                ]),
                'difficulty' => 70,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'В полярных координатах производная dr/dθ вычисляется через s?:0 и s?:1 функции r(θ).',
                'options' => json_encode([
                    [
                        ["str" => "r’(θ)", "correct" => true],
                        ["str" => "r(θ)", "correct" => false],
                        ["str" => "θ’(r)", "correct" => false]
                    ],
                    [
                        ["str" => "угол θ", "correct" => false],
                        ["str" => "исходную функцию", "correct" => true],
                        ["str" => "интеграл", "correct" => false]
                    ]
                ]),
                'difficulty' => 75,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'По методу Ньютона корень уравнения ищется итерационно: xₙ₊₁ = xₙ − s?:0/s?:1.',
                'options' => json_encode([
                    [
                        ["str" => "f(xₙ)", "correct" => true],
                        ["str" => "f’(xₙ)", "correct" => false],
                        ["str" => "f’’(xₙ)", "correct" => false]
                    ],
                    [
                        ["str" => "f’(xₙ)", "correct" => true],
                        ["str" => "f(xₙ)", "correct" => false],
                        ["str" => "xₙ²", "correct" => false]
                    ]
                ]),
                'difficulty' => 70,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Производная гиперболического синуса sh(x) равна s?:0, а гиперболического косинуса ch(x) — s?:1.',
                'options' => json_encode([
                    [
                        ["str" => "ch(x)", "correct" => true],
                        ["str" => "sh(x)", "correct" => false],
                        ["str" => "−sh(x)", "correct" => false]
                    ],
                    [
                        ["str" => "sh(x)", "correct" => true],
                        ["str" => "ch(x)", "correct" => false],
                        ["str" => "−ch(x)", "correct" => false]
                    ]
                ]),
                'difficulty' => 65,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Если f’’(x) > 0 на интервале, функция s?:0, а её график s?:1.',
                'options' => json_encode([
                    [
                        ["str" => "вогнута вверх", "correct" => true],
                        ["str" => "выпукла вниз", "correct" => false],
                        ["str" => "линейна", "correct" => false]
                    ],
                    [
                        ["str" => "имеет минимум", "correct" => false],
                        ["str" => "выпуклый", "correct" => false],
                        ["str" => "не имеет перегибов", "correct" => true]
                    ]
                ]),
                'difficulty' => 60,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Согласно s?:0, если f’(x) меняет знак с + на − в x₀, то x₀ — точка s?:1.',
                'options' => json_encode([
                    [
                        ["str" => "достаточному условию экстремума", "correct" => true],
                        ["str" => "теореме Ролля", "correct" => false],
                        ["str" => "правилу Лопиталя", "correct" => false]
                    ],
                    [
                        ["str" => "максимума", "correct" => true],
                        ["str" => "минимума", "correct" => false],
                        ["str" => "перегиба", "correct" => false]
                    ]
                ]),
                'difficulty' => 65,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Сумма производных равна производной s?:0. Например, d/dx (f + g) = s?:1 + s?:2.',
                'options' => json_encode([
                    [
                        ["str" => "суммы", "correct" => true],
                        ["str" => "произведения", "correct" => false],
                        ["str" => "частного", "correct" => false]
                    ],
                    [
                        ["str" => "f’", "correct" => true],
                        ["str" => "f", "correct" => false],
                        ["str" => "g’", "correct" => false]
                    ],
                    [
                        ["str" => "g’", "correct" => true],
                        ["str" => "g", "correct" => false],
                        ["str" => "f’", "correct" => false]
                    ]
                ]),
                'difficulty' => 60,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Функция убывает, если её первая производная s?:0, и возрастает, если производная s?:1.',
                'options' => json_encode([
                    [
                        ["str" => "< 0", "correct" => true],
                        ["str" => "> 0", "correct" => false],
                        ["str" => "= 0", "correct" => false]
                    ],
                    [
                        ["str" => "> 0", "correct" => true],
                        ["str" => "< 0", "correct" => false],
                        ["str" => "≠ 0", "correct" => false]
                    ]
                ]),
                'difficulty' => 55,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Если тело движется по закону s(t) = 3t² - 2t, то его скорость в момент t=2 равна s?:0, а ускорение s?:1.',
                'options' => json_encode([
                    [
                        ["str" => "10", "correct" => true],
                        ["str" => "6", "correct" => false],
                        ["str" => "8", "correct" => false]
                    ],
                    [
                        ["str" => "6", "correct" => true],
                        ["str" => "0", "correct" => false],
                        ["str" => "12", "correct" => false]
                    ]
                ]),
                'difficulty' => 65,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Третья производная координаты по времени называется s?:0, а интеграл ускорения даёт s?:1.',
                'options' => json_encode([
                    [
                        ["str" => "рывок", "correct" => true],
                        ["str" => "мощность", "correct" => false],
                        ["str" => "импульс", "correct" => false]
                    ],
                    [
                        ["str" => "скорость", "correct" => true],
                        ["str" => "путь", "correct" => false],
                        ["str" => "силу", "correct" => false]
                    ]
                ]),
                'difficulty' => 70,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Чтобы максимизировать прибыль P(x), нужно найти точку, где s?:0 производная s?:1.',
                'options' => json_encode([
                    [
                        ["str" => "первая", "correct" => true],
                        ["str" => "вторая", "correct" => false],
                        ["str" => "третья", "correct" => false]
                    ],
                    [
                        ["str" => "= 0", "correct" => true],
                        ["str" => "> 0", "correct" => false],
                        ["str" => "< 0", "correct" => false]
                    ]
                ]),
                'difficulty' => 60,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Для неявной функции x³ + y³ = 1 производная dy/dx равна s?:0, где числитель s?:1, а знаменатель s?:2.',
                'options' => json_encode([
                    [
                        ["str" => "−x²/y²", "correct" => true],
                        ["str" => "−y²/x²", "correct" => false],
                        ["str" => "3x²", "correct" => false]
                    ],
                    [
                        ["str" => "−3x²", "correct" => true],
                        ["str" => "3y²", "correct" => false],
                        ["str" => "−3y²", "correct" => false]
                    ],
                    [
                        ["str" => "3y²", "correct" => true],
                        ["str" => "3x²", "correct" => false],
                        ["str" => "6x", "correct" => false]
                    ]
                ]),
                'difficulty' => 75,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Оптимальный объём производства достигается, когда s?:0 доход равен s?:1 издержкам.',
                'options' => json_encode([
                    [
                        ["str" => "предельный", "correct" => true],
                        ["str" => "общий", "correct" => false],
                        ["str" => "средний", "correct" => false]
                    ],
                    [
                        ["str" => "предельным", "correct" => true],
                        ["str" => "переменным", "correct" => false],
                        ["str" => "постоянным", "correct" => false]
                    ]
                ]),
                'difficulty' => 70,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Если z = f(x,y), то частная производная ∂z/∂x показывает скорость изменения по s?:0 при s?:1 y.',
                'options' => json_encode([
                    [
                        ["str" => "x", "correct" => true],
                        ["str" => "y", "correct" => false],
                        ["str" => "t", "correct" => false]
                    ],
                    [
                        ["str" => "фиксированном", "correct" => true],
                        ["str" => "изменяющемся", "correct" => false],
                        ["str" => "нулевом", "correct" => false]
                    ]
                ]),
                'difficulty' => 65,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Уравнение касательной к кривой y = x³ в точке (1,1): y = s?:0(x - 1) + s?:1.',
                'options' => json_encode([
                    [
                        ["str" => "3", "correct" => true],
                        ["str" => "1", "correct" => false],
                        ["str" => "0", "correct" => false]
                    ],
                    [
                        ["str" => "1", "correct" => true],
                        ["str" => "3", "correct" => false],
                        ["str" => "−1", "correct" => false]
                    ]
                ]),
                'difficulty' => 60,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Согласно основной теореме анализа, интеграл от производной функции на [a,b] равен s?:0 функции на s?:1.',
                'options' => json_encode([
                    [
                        ["str" => "разности", "correct" => true],
                        ["str" => "сумме", "correct" => false],
                        ["str" => "произведению", "correct" => false]
                    ],
                    [
                        ["str" => "концах интервала", "correct" => true],
                        ["str" => "середине", "correct" => false],
                        ["str" => "всей области", "correct" => false]
                    ]
                ]),
                'difficulty' => 75,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Градиент функции f(x,y) — это вектор, состоящий из s?:0 и s?:1 производных. Он указывает направление s?:2 роста функции.',
                'options' => json_encode([
                    [
                        ["str" => "частных", "correct" => true],
                        ["str" => "полных", "correct" => false],
                        ["str" => "обратных", "correct" => false]
                    ],
                    [
                        ["str" => "частных", "correct" => true],
                        ["str" => "интегральных", "correct" => false],
                        ["str" => "вторых", "correct" => false]
                    ],
                    [
                        ["str" => "наибольшего", "correct" => true],
                        ["str" => "наименьшего", "correct" => false],
                        ["str" => "нулевого", "correct" => false]
                    ]
                ]),
                'difficulty' => 70,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Кривизна плоской кривой вычисляется как |s?:0| / (1 + (s?:1)²)^(3/2), где y′ — первая производная, а y′′ — s?:2.',
                'options' => json_encode([
                    [
                        ["str" => "y′′", "correct" => true],
                        ["str" => "y′", "correct" => false],
                        ["str" => "x′", "correct" => false]
                    ],
                    [
                        ["str" => "y′", "correct" => true],
                        ["str" => "y′′", "correct" => false],
                        ["str" => "x′′", "correct" => false]
                    ],
                    [
                        ["str" => "вторая производная", "correct" => true],
                        ["str" => "первая производная", "correct" => false],
                        ["str" => "интеграл", "correct" => false]
                    ]
                ]),
                'difficulty' => 75,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'В вариационном исчислении уравнение Эйлера-Лагранжа имеет вид: d/dt(∂L/∂s?:0) − ∂L/∂s?:1 = 0, где L — s?:2.',
                'options' => json_encode([
                    [
                        ["str" => "q′", "correct" => true],
                        ["str" => "q", "correct" => false],
                        ["str" => "t", "correct" => false]
                    ],
                    [
                        ["str" => "q", "correct" => true],
                        ["str" => "t", "correct" => false],
                        ["str" => "p", "correct" => false]
                    ],
                    [
                        ["str" => "лагранжиан", "correct" => true],
                        ["str" => "гамильтониан", "correct" => false],
                        ["str" => "интеграл", "correct" => false]
                    ]
                ]),
                'difficulty' => 80,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Ряд Тейлора функции f(x) около точки a: f(a) + f′(a)(x−a) + s?:0(x−a)² + ... Коэффициент при (x−a)² равен s?:1.',
                'options' => json_encode([
                    [
                        ["str" => "f′′(a)/2!", "correct" => true],
                        ["str" => "f′(a)/2", "correct" => false],
                        ["str" => "f(a)/2", "correct" => false]
                    ],
                    [
                        ["str" => "f′′(a)/2", "correct" => true],
                        ["str" => "f′(a)/1!", "correct" => false],
                        ["str" => "f(a)/0!", "correct" => false]
                    ]
                ]),
                'difficulty' => 70,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Предельная полезность в экономике — это s?:0 от s?:1 полезности по количеству товара. Она s?:2 с увеличением потребления.',
                'options' => json_encode([
                    [
                        ["str" => "производная", "correct" => true],
                        ["str" => "интеграл", "correct" => false],
                        ["str" => "предел", "correct" => false]
                    ],
                    [
                        ["str" => "общей", "correct" => true],
                        ["str" => "средней", "correct" => false],
                        ["str" => "частичной", "correct" => false]
                    ],
                    [
                        ["str" => "убывает", "correct" => true],
                        ["str" => "возрастает", "correct" => false],
                        ["str" => "не изменяется", "correct" => false]
                    ]
                ]),
                'difficulty' => 65,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Для вектор-функции **r**(t) = ⟨x(t), y(t)⟩ производная **r′**(t) направлена по s?:0 к s?:1. Её модуль равен s?:2.',
                'options' => json_encode([
                    [
                        ["str" => "касательной", "correct" => true],
                        ["str" => "нормали", "correct" => false],
                        ["str" => "секущей", "correct" => false]
                    ],
                    [
                        ["str" => "траектории", "correct" => true],
                        ["str" => "асимптоте", "correct" => false],
                        ["str" => "оси", "correct" => false]
                    ],
                    [
                        ["str" => "скорости", "correct" => true],
                        ["str" => "ускорению", "correct" => false],
                        ["str" => "кривизне", "correct" => false]
                    ]
                ]),
                'difficulty' => 75,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Уравнение теплопроводности: ∂u/∂t = k·s?:0, где s?:1 — оператор s?:2.',
                'options' => json_encode([
                    [
                        ["str" => "∇²u", "correct" => true],
                        ["str" => "∂u/∂x", "correct" => false],
                        ["str" => "∫u dt", "correct" => false]
                    ],
                    [
                        ["str" => "∇²", "correct" => true],
                        ["str" => "d/dt", "correct" => false],
                        ["str" => "Δ", "correct" => false]
                    ],
                    [
                        ["str" => "Лапласа", "correct" => true],
                        ["str" => "Гамильтона", "correct" => false],
                        ["str" => "Фурье", "correct" => false]
                    ]
                ]),
                'difficulty' => 80,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Функция правдоподобия L(θ) в статистике максимизируется при s?:0 производной s?:1. Это основа метода s?:2.',
                'options' => json_encode([
                    [
                        ["str" => "нулевой", "correct" => true],
                        ["str" => "положительной", "correct" => false],
                        ["str" => "отрицательной", "correct" => false]
                    ],
                    [
                        ["str" => "логарифма L(θ)", "correct" => true],
                        ["str" => "L(θ)", "correct" => false],
                        ["str" => "интеграла L(θ)", "correct" => false]
                    ],
                    [
                        ["str" => "максимального правдоподобия", "correct" => true],
                        ["str" => "наименьших квадратов", "correct" => false],
                        ["str" => "Байеса", "correct" => false]
                    ]
                ]),
                'difficulty' => 75,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Поверхность, заданная параметрически **r**(u,v), имеет нормаль, вычисляемую через s?:0 произведение s?:1 производных s?:2.',
                'options' => json_encode([
                    [
                        ["str" => "векторное", "correct" => true],
                        ["str" => "скалярное", "correct" => false],
                        ["str" => "тензорное", "correct" => false]
                    ],
                    [
                        ["str" => "частные", "correct" => true],
                        ["str" => "полные", "correct" => false],
                        ["str" => "обратные", "correct" => false]
                    ],
                    [
                        ["str" => "∂r/∂u и ∂r/∂v", "correct" => true],
                        ["str" => "∂²r/∂u² и ∂²r/∂v²", "correct" => false],
                        ["str" => "dr/du и dr/dv", "correct" => false]
                    ]
                ]),
                'difficulty' => 80,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Дифференциальное уравнение y′ = ky описывает s?:0 рост, решение которого — s?:1. Здесь k — s?:2.',
                'options' => json_encode([
                    [
                        ["str" => "экспоненциальный", "correct" => true],
                        ["str" => "линейный", "correct" => false],
                        ["str" => "логарифмический", "correct" => false]
                    ],
                    [
                        ["str" => "y₀e^(kt)", "correct" => true],
                        ["str" => "y₀ + kt", "correct" => false],
                        ["str" => "ln(kt)", "correct" => false]
                    ],
                    [
                        ["str" => "константа", "correct" => true],
                        ["str" => "переменная", "correct" => false],
                        ["str" => "функция", "correct" => false]
                    ]
                ]),
                'difficulty' => 70,
            ]
        ]);
    }
}
