<?php

namespace Database\Seeders\Quest;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlankQuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('blank_quests')->insert([
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Какой язык разметки используется для создания структуры веб-страниц?',
                'correct' => '["html"]',
                'difficulty' => 50,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Как называется протокол, используемый для безопасной передачи данных в вебе? (аббревиатура)',
                'correct' => '["https", "ssl", "tls"]',
                'difficulty' => 40,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Какой метод HTTP используется для получения данных от сервера?',
                'correct' => '["get"]',
                'difficulty' => 35,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Как называется технология для стилизации веб-страниц? (аббревиатура)',
                'correct' => '["css"]',
                'difficulty' => 50,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Какой тег HTML используется для подключения JavaScript к странице?',
                'correct' => '["<script>", "script"]',
                'difficulty' => 30,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Как называется объектная модель документа, представляющая структуру HTML? (аббревиатура)',
                'correct' => '["dom"]',
                'difficulty' => 25,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Какой системой контроля версий чаще всего пользуются разработчики? (название)',
                'correct' => '["git"]',
                'difficulty' => 45,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Какая функция в PHP выводит данные в поток вывода?',
                'correct' => '["echo", "print"]',
                'difficulty' => 20,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Как называется технология для асинхронных запросов в JavaScript? (аббревиатура)',
                'correct' => '["ajax"]',
                'difficulty' => 30,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Какой заголовок HTTP используется для перенаправления браузера?',
                'correct' => '["location"]',
                'difficulty' => 15,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Какой язык программирования чаще всего используется для создания динамических веб-страниц на стороне сервера?',
                'correct' => '["php", "python", "javascript", "ruby"]',
                'difficulty' => 40,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Какой фреймворк на JavaScript используется для создания пользовательских интерфейсов?',
                'correct' => '["react", "angular", "vue"]',
                'difficulty' => 30,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Какой метод HTTP используется для отправки данных на сервер, например, при отправке формы?',
                'correct' => '["post"]',
                'difficulty' => 35,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Какой инструмент используется для управления зависимостями в проектах на JavaScript?',
                'correct' => '["npm", "yarn"]',
                'difficulty' => 25,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Какой тег HTML используется для создания ссылок?',
                'correct' => '["<a>", "a"]',
                'difficulty' => 50,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Какой язык используется для написания стилей в веб-разработке?',
                'correct' => '["css"]',
                'difficulty' => 50,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Какой HTTP-код означает "Страница не найдена"?',
                'correct' => '["404"]',
                'difficulty' => 45,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Какой тег HTML используется для вставки изображений?',
                'correct' => '["<img>", "img"]',
                'difficulty' => 40,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Какой язык используется для создания интерактивных элементов на веб-страницах?',
                'correct' => '["javascript"]',
                'difficulty' => 50,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Какой HTTP-код означает "Успешный запрос"?',
                'correct' => '["200"]',
                'difficulty' => 45,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Какой язык используется для написания сценариев на стороне сервера в Node.js?',
                'correct' => '["javascript"]',
                'difficulty' => 30,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Какой инструмент используется для автоматизации задач в веб-разработке, таких как минификация CSS и JavaScript?',
                'correct' => '["webpack", "gulp", "grunt"]',
                'difficulty' => 20,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Какой HTTP-код означает "Внутренняя ошибка сервера"?',
                'correct' => '["500"]',
                'difficulty' => 40,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Какой тег HTML используется для создания таблиц?',
                'correct' => '["<table>", "table"]',
                'difficulty' => 45,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Какой язык используется для создания запросов к базам данных в веб-приложениях?',
                'correct' => '["sql"]',
                'difficulty' => 35,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Какой метод JavaScript используется для добавления нового элемента в конец массива?',
                'correct' => '["push"]',
                'difficulty' => 25,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Какой фреймворк на Python используется для веб-разработки?',
                'correct' => '["django", "flask"]',
                'difficulty' => 20,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Какой тег HTML используется для создания списка с точками?',
                'correct' => '["<ul>", "ul"]',
                'difficulty' => 50,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Какой HTTP-код означает "Доступ запрещён"?',
                'correct' => '["403"]',
                'difficulty' => 40,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Какой метод JavaScript используется для преобразования JSON-строки в объект?',
                'correct' => '["json.parse"]',
                'difficulty' => 30,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Какой тег HTML используется для создания заголовка первого уровня?',
                'correct' => '["<h1>", "h1"]',
                'difficulty' => 50,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Какой метод JavaScript используется для поиска элемента по его идентификатору?',
                'correct' => '["getelementbyid"]',
                'difficulty' => 35,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Какой HTTP-код означает "Перенаправление"?',
                'correct' => '["301", "302"]',
                'difficulty' => 40,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Какой язык используется для создания анимаций и интерактивности на веб-страницах?',
                'correct' => '["javascript"]',
                'difficulty' => 45,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Какой тег HTML используется для создания формы?',
                'correct' => '["<form>", "form"]',
                'difficulty' => 40,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Какой метод JavaScript используется для выполнения HTTP-запроса?',
                'correct' => '["fetch", "xmlhttprequest"]',
                'difficulty' => 25,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Какой язык используется для создания стилей в веб-разработке?',
                'correct' => '["css"]',
                'difficulty' => 50,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Какой тег HTML используется для создания кнопки?',
                'correct' => '["<button>", "button"]',
                'difficulty' => 45,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Какой HTTP-код означает "Успешное создание ресурса"?',
                'correct' => '["201"]',
                'difficulty' => 30,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Какой метод JavaScript используется для преобразования объекта в JSON-строку?',
                'correct' => '["json.stringify"]',
                'difficulty' => 30,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Какой механизм используется для защиты от CSRF-атак в веб-приложениях?',
                'correct' => '["csrf-token", "csrf токен"]',
                'difficulty' => 25,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Какой протокол используется для реального времени в веб-приложениях (чат, уведомления)?',
                'correct' => '["websocket"]',
                'difficulty' => 20,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Какой препроцессор CSS добавляет функции вроде переменных и миксинов?',
                'correct' => '["sass", "scss", "less"]',
                'difficulty' => 30,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Какой язык является надмножеством JavaScript с строгой типизацией?',
                'correct' => '["typescript"]',
                'difficulty' => 35,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Как называется технология для создания переиспользуемых компонентов в вебе?',
                'correct' => '["web components"]',
                'difficulty' => 15,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Какой запрос GraphQL используется для получения данных?',
                'correct' => '["query"]',
                'difficulty' => 20,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Какой стандарт используется для аутентификации через JSON-токены?',
                'correct' => '["jwt"]',
                'difficulty' => 25,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Какой инструмент используется для контейнеризации приложений?',
                'correct' => '["docker"]',
                'difficulty' => 30,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Какой заголовок HTTP управляет кешированием ресурсов в браузере?',
                'correct' => '["cache-control"]',
                'difficulty' => 35,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Какая команда Git используется для клонирования репозитория?',
                'correct' => '["git clone"]',
                'difficulty' => 40,
            ],


            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Чему равна производная функции f(x) = 5?',
                'correct' => '["0"]',
                'difficulty' => 80,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Найдите производную функции f(x) = 3x + 2',
                'correct' => '["3"]',
                'difficulty' => 75,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Чему равна производная функции f(x) = x² в точке x=3?',
                'correct' => '["6"]',
                'difficulty' => 70,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Найдите производную функции f(x) = x³ + 2x',
                'correct' => '["3x²+2","3x^2+2"]',
                'difficulty' => 65,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Чему равна производная функции f(x) = x·sin(x)?',
                'correct' => '["sin(x)+x·cos(x)","sinx+xcosx"]',
                'difficulty' => 50,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Найдите производную функции f(x) = (x+1)/(x-1)',
                'correct' => '["-2/(x-1)²","-2/(x-1)^2"]',
                'difficulty' => 45,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Чему равна производная функции f(x) = cos(x)?',
                'correct' => '["-sin(x)","-sinx"]',
                'difficulty' => 60,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Найдите вторую производную функции f(x) = e^x',
                'correct' => '["e^x","e^x"]',
                'difficulty' => 55,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Чему равна производная функции f(x) = ln(2x)?',
                'correct' => '["1/x"]',
                'difficulty' => 50,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Тело движется по закону s(t) = 3t². Какова скорость в момент t=2?',
                'correct' => '["12"]',
                'difficulty' => 60,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Что такое производная функции в математике?',
                'correct' => '["мера изменения функции","скорость изменения функции","предел отношения приращения функции к приращению аргумента"]',
                'difficulty' => 70,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Что описывает геометрический смысл производной?',
                'correct' => '["угловой коэффициент касательной","тангенс угла наклона касательной"]',
                'difficulty' => 65,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Что такое вторая производная функции?',
                'correct' => '["производная от производной","скорость изменения скорости","мера изменения наклона касательной"]',
                'difficulty' => 60,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Какая функция называется дифференцируемой?',
                'correct' => '["функция, имеющая производную","функция, для которой существует предел отношения приращения функции к приращению аргумента"]',
                'difficulty' => 55,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Что такое касательная к графику функции?',
                'correct' => '["прямая, которая касается графика функции в точке","прямая, которая имеет общую точку с графиком функции и совпадает с ним в окрестности этой точки"]',
                'difficulty' => 50,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Какая связь между непрерывностью и дифференцируемостью функции?',
                'correct' => '["дифференцируемая функция всегда непрерывна","непрерывность - необходимое условие дифференцируемости"]',
                'difficulty' => 60,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Что такое производная по направлению?',
                'correct' => '["предел отношения приращения функции вдоль заданного направления к приращению аргумента","мера изменения функции вдоль заданного направления"]',
                'difficulty' => 45,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Что такое частная производная?',
                'correct' => '["производная функции нескольких переменных по одной из переменных","производная, где все переменные кроме одной считаются постоянными"]',
                'difficulty' => 50,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Какая функция называется первообразной?',
                'correct' => '["функция, производная которой равна исходной функции","функция, которая при дифференцировании дает исходную функцию"]',
                'difficulty' => 55,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Что такое дифференциал функции?',
                'correct' => '["главная часть приращения функции","линейная часть приращения функции","произведение производной на приращение аргумента"]',
                'difficulty' => 50,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Что такое предел функции в точке?',
                'correct' => '["значение, к которому стремится функция при приближении аргумента к точке","число, к которому стремится функция при приближении x к заданной точке"]',
                'difficulty' => 70,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Чему равен предел функции f(x) = 5 при x → 3?',
                'correct' => '["5"]',
                'difficulty' => 65,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Чему равен предел функции f(x) = (x² - 1)/(x - 1) при x → 1?',
                'correct' => '["2"]',
                'difficulty' => 60,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Что такое бесконечно малая функция?',
                'correct' => '["функция, предел которой равен нулю","функция, которая стремится к нулю при стремлении аргумента к некоторой точке"]',
                'difficulty' => 55,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Чему равен предел функции f(x) = sin(x)/x при x → 0?',
                'correct' => '["1"]',
                'difficulty' => 50,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Что такое неопределенность вида 0/0?',
                'correct' => '["ситуация, когда и числитель, и знаменатель стремятся к нулю","неопределенность, возникающая при вычислении предела, когда и числитель, и знаменатель стремятся к нулю"]',
                'difficulty' => 60,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Чему равен предел функции f(x) = (2x² + 3x)/(x² + 1) при x → ∞?',
                'correct' => '["2"]',
                'difficulty' => 55,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Что такое асимптота функции?',
                'correct' => '["прямая, к которой график функции стремится на бесконечности","линия, к которой график функции приближается, но никогда не пересекает"]',
                'difficulty' => 50,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Чему равен предел функции f(x) = 1/x при x → 0?',
                'correct' => '["∞","бесконечность","не существует"]',
                'difficulty' => 60,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Что такое правило Лопиталя?',
                'correct' => '["метод вычисления пределов с неопределенностями","правило, позволяющее вычислять пределы через производные"]',
                'difficulty' => 45,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Чему равен предел функции f(x) = (x² - 4)/(x - 2) при x → 2?',
                'correct' => '["4"]',
                'difficulty' => 65,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Что такое предел функции на бесконечности?',
                'correct' => '["значение, к которому стремится функция при x → ∞ или x → -∞","число, к которому приближается функция при неограниченном увеличении или уменьшении аргумента"]',
                'difficulty' => 60,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Чему равен предел функции f(x) = (3x + 2)/(x + 1) при x → ∞?',
                'correct' => '["3"]',
                'difficulty' => 55,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Что такое односторонние пределы?',
                'correct' => '["пределы, вычисленные при приближении к точке слева или справа","пределы функции при x → a+ или x → a-"]',
                'difficulty' => 50,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Чему равен предел функции f(x) = e^x при x → -∞?',
                'correct' => '["0"]',
                'difficulty' => 60,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Что такое неопределенность вида ∞/∞?',
                'correct' => '["ситуация, когда и числитель, и знаменатель стремятся к бесконечности","неопределенность, возникающая при вычислении предела, когда и числитель, и знаменатель стремятся к бесконечности"]',
                'difficulty' => 55,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Чему равен предел функции f(x) = ln(x) при x → 1?',
                'correct' => '["0"]',
                'difficulty' => 50,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Что такое замечательные пределы?',
                'correct' => '["пределы, которые часто используются в математике и имеют особое значение","пределы, такие как lim(sin(x)/x) при x → 0"]',
                'difficulty' => 45,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Чему равен предел функции f(x) = (1 + 1/x)^x при x → ∞?',
                'correct' => '["e"]',
                'difficulty' => 60,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Что такое непрерывность функции в точке?',
                'correct' => '["функция непрерывна, если предел функции в точке равен значению функции в этой точке","функция непрерывна, если lim f(x) = f(a) при x → a"]',
                'difficulty' => 55,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Чему равен предел функции f(x) = (x³ - 8)/(x - 2) при x → 2?',
                'correct' => '["12"]',
                'difficulty' => 60,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Что такое неопределенность вида ∞ - ∞?',
                'correct' => '["ситуация, когда два выражения стремятся к бесконечности, и их разность не определена","неопределенность, возникающая при вычислении предела разности двух бесконечно больших функций"]',
                'difficulty' => 55,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Чему равен предел функции f(x) = (x² + 3x)/(2x² - 5) при x → ∞?',
                'correct' => '["0.5","1/2"]',
                'difficulty' => 50,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Что такое предел последовательности?',
                'correct' => '["число, к которому стремятся члены последовательности при увеличении номера","значение, к которому приближаются элементы последовательности при n → ∞"]',
                'difficulty' => 45,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Чему равен предел функции f(x) = (1 - cos(x))/x² при x → 0?',
                'correct' => '["0.5","1/2"]',
                'difficulty' => 55,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Что такое неопределенность вида 0^0?',
                'correct' => '["ситуация, когда основание степени стремится к нулю, а показатель степени тоже стремится к нулю","неопределенность, возникающая при вычислении предела функции вида f(x)^g(x), где f(x) → 0 и g(x) → 0"]',
                'difficulty' => 50,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Чему равен предел функции f(x) = (x + sin(x))/x при x → ∞?',
                'correct' => '["1"]',
                'difficulty' => 60,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Что такое предел функции в бесконечности?',
                'correct' => '["значение, к которому стремится функция при x → ∞ или x → -∞","число, к которому приближается функция при неограниченном увеличении или уменьшении аргумента"]',
                'difficulty' => 55,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Чему равен предел функции f(x) = (x² - 9)/(x - 3) при x → 3?',
                'correct' => '["6"]',
                'difficulty' => 65,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Что такое неопределенность вида 1^∞?',
                'correct' => '["ситуация, когда основание степени стремится к 1, а показатель степени стремится к бесконечности","неопределенность, возникающая при вычислении предела функции вида f(x)^g(x), где f(x) → 1 и g(x) → ∞"]',
                'difficulty' => 50,
            ]
        ]);
    }
}
