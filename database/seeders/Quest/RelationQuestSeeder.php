<?php

namespace Database\Seeders\Quest;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RelationQuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('relation_quests')->insert([
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Соотнесите языки программирования с их основным предназначением.',
                'first_column' => json_encode(['HTML', 'CSS', 'JavaScript', 'PHP', 'SQL']),
                'second_column' => json_encode(['Разметка веб-страницы', 'Стилизация страниц', 'Динамическое поведение', 'Серверная логика', 'Работа с базами данных']),
                'difficulty' => 50,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Соотнесите HTTP-методы с их назначением.',
                'first_column' => json_encode(['GET', 'POST', 'PUT', 'DELETE', 'PATCH']),
                'second_column' => json_encode(['Получение данных', 'Отправка данных', 'Обновление ресурса', 'Удаление ресурса', 'Частичное обновление']),
                'difficulty' => 50,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Соотнесите элементы HTML с их предназначением.',
                'first_column' => json_encode(['<div>', '<span>', '<a>', '<form>', '<table>']),
                'second_column' => json_encode(['Блочный контейнер', 'Строчный контейнер', 'Гиперссылка', 'Форма для отправки данных', 'Таблица']),
                'difficulty' => 60,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Соотнесите популярные фреймворки с языками программирования.',
                'first_column' => json_encode(['React', 'Laravel', 'Django', 'Vue', 'Spring']),
                'second_column' => json_encode(['JavaScript', 'PHP', 'Python', 'JavaScript', 'Java']),
                'difficulty' => 50,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Соотнесите уровни HTTP-ответов с их назначением.',
                'first_column' => json_encode(['1xx', '2xx', '3xx', '4xx', '5xx']),
                'second_column' => json_encode(['Информационные', 'Успешные', 'Перенаправления', 'Ошибки клиента', 'Ошибки сервера']),
                'difficulty' => 55,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Соотнесите типы данных JavaScript с их примерами.',
                'first_column' => json_encode(['String', 'Number', 'Boolean', 'Array', 'Object']),
                'second_column' => json_encode(['"Hello"', '42', 'true/false', '[1, 2, 3]', '{"key": "value"}']),
                'difficulty' => 50,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Соотнесите CSS-свойства с их назначением.',
                'first_column' => json_encode(['color', 'font-size', 'margin', 'padding', 'display']),
                'second_column' => json_encode(['Цвет текста', 'Размер шрифта', 'Внешний отступ', 'Внутренний отступ', 'Тип отображения элемента']),
                'difficulty' => 60,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Соотнесите способы хранения данных в браузере с их характеристиками.',
                'first_column' => json_encode(['Cookies', 'LocalStorage', 'SessionStorage', 'IndexedDB', 'Cache API']),
                'second_column' => json_encode(['Хранение небольших данных, отправляемых на сервер', 'Долговременное хранение данных в браузере', 'Хранение данных на время сессии', 'База данных в браузере', 'Кеширование ресурсов для работы оффлайн']),
                'difficulty' => 65,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Соотнесите ключевые концепции ООП с их описанием.',
                'first_column' => json_encode(['Абстракция', 'Инкапсуляция', 'Наследование', 'Полиморфизм']),
                'second_column' => json_encode(['Скрытие деталей реализации', 'Сокрытие данных внутри объекта', 'Передача свойств и методов от родителя к потомку', 'Использование одного интерфейса для разных типов данных']),
                'difficulty' => 55,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Соотнесите типы атак на веб-приложения с их описанием.',
                'first_column' => json_encode(['SQL-инъекция', 'XSS', 'CSRF', 'DDoS', 'Brute Force']),
                'second_column' => json_encode(['Внедрение SQL-кода', 'Внедрение вредоносного скрипта', 'Атака через поддельные запросы', 'Перегрузка сервера запросами', 'Перебор паролей']),
                'difficulty' => 70,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Соотнесите форматы изображений с их особенностями.',
                'first_column' => json_encode(['JPEG', 'PNG', 'GIF', 'SVG', 'WEBP']),
                'second_column' => json_encode(['Сжатие с потерями', 'Поддержка прозрачности', 'Анимация', 'Векторная графика', 'Современный формат сжатия']),
                'difficulty' => 50,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Соотнесите основные HTTP-заголовки с их назначением.',
                'first_column' => json_encode(['Content-Type', 'Authorization', 'Cache-Control', 'User-Agent', 'Accept']),
                'second_column' => json_encode(['Тип содержимого', 'Аутентификация пользователя', 'Настройки кэширования', 'Идентификация клиента', 'Форматы данных, поддерживаемые клиентом']),
                'difficulty' => 55,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Соотнесите виды API с их описанием.',
                'first_column' => json_encode(['REST', 'SOAP', 'GraphQL', 'gRPC', 'WebSocket']),
                'second_column' => json_encode(['Стандартный API на основе HTTP', 'Протокол обмена на XML', 'Гибкий API с запросами данных', 'Высокопроизводительный RPC API', 'Двусторонняя связь в реальном времени']),
                'difficulty' => 60,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Соотнесите принципы SOLID с их кратким описанием.',
                'first_column' => json_encode(['Single Responsibility', 'Open/Closed', 'Liskov Substitution', 'Interface Segregation', 'Dependency Inversion']),
                'second_column' => json_encode(['Одна ответственность на класс', 'Открыто для расширения, закрыто для изменения', 'Замена подклассов без изменения поведения', 'Разделение интерфейсов на небольшие', 'Зависимости должны строиться на абстракциях']),
                'difficulty' => 65,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Соотнесите типы данных в SQL с их применением.',
                'first_column' => json_encode(['VARCHAR', 'TEXT', 'INT', 'FLOAT', 'BOOLEAN']),
                'second_column' => json_encode(['Строки переменной длины', 'Длинные тексты', 'Целые числа', 'Числа с плавающей запятой', 'Логическое значение']),
                'difficulty' => 50,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Соотнесите способы аутентификации с их характеристиками.',
                'first_column' => json_encode(['Basic Auth', 'OAuth', 'JWT', 'SAML', 'API Key']),
                'second_column' => json_encode(['Простая аутентификация через логин/пароль', 'Авторизация через сторонние сервисы', 'Токен на основе JSON', 'Протокол единого входа', 'Ключ доступа к API']),
                'difficulty' => 60,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Соотнесите элементы Flexbox с их назначением.',
                'first_column' => json_encode(['justify-content', 'align-items', 'flex-wrap', 'order', 'align-self']),
                'second_column' => json_encode(['Выравнивание по основной оси', 'Выравнивание по поперечной оси', 'Перенос строк', 'Определение порядка элементов', 'Выравнивание конкретного элемента']),
                'difficulty' => 55,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Соотнесите принципы безопасности с их значением.',
                'first_column' => json_encode(['Confidentiality', 'Integrity', 'Availability', 'Non-Repudiation', 'Authentication']),
                'second_column' => json_encode(['Конфиденциальность данных', 'Целостность данных', 'Доступность данных', 'Невозможность отрицания действий', 'Подтверждение личности']),
                'difficulty' => 65,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Соотнесите виды тестирования безопасности с их описанием.',
                'first_column' => json_encode(['Penetration Testing', 'Vulnerability Assessment', 'Security Audit', 'Threat Modeling', 'Code Review']),
                'second_column' => json_encode(['Проверка защиты через атаки', 'Анализ уязвимостей', 'Аудит безопасности системы', 'Определение возможных угроз', 'Анализ исходного кода на безопасность']),
                'difficulty' => 70,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Соотнесите популярные базы данных с их характеристиками.',
                'first_column' => json_encode(['MySQL', 'PostgreSQL', 'MongoDB', 'Redis', 'SQLite']),
                'second_column' => json_encode(['Реляционная СУБД', 'Расширенная реляционная СУБД', 'Документо-ориентированная БД', 'Ключ-значение БД', 'Легковесная встроенная БД']),
                'difficulty' => 50,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Соотнесите популярные CSS-препроцессоры с их особенностями.',
                'first_column' => json_encode(['SASS', 'LESS', 'Stylus', 'PostCSS', 'SCSS']),
                'second_column' => json_encode(['Поддержка вложенности и переменных', 'Компактный синтаксис', 'Гибкая настройка', 'Плагинная архитектура', 'Расширенный синтаксис CSS']),
                'difficulty' => 55,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Соотнесите фреймворки JavaScript с их ключевыми особенностями.',
                'first_column' => json_encode(['React', 'Vue', 'Angular', 'Svelte', 'Next.js']),
                'second_column' => json_encode(['Компонентный подход, виртуальный DOM', 'Реактивность и простота', 'Полноценный MVC-фреймворк', 'Компиляция в нативный JavaScript', 'Фреймворк для SSR и статических сайтов']),
                'difficulty' => 60,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Соотнесите популярные CMS с их особенностями.',
                'first_column' => json_encode(['WordPress', 'Joomla', 'Drupal', 'Magento', 'Ghost']),
                'second_column' => json_encode(['Самая популярная CMS', 'Гибкая система управления контентом', 'Сложная, но мощная CMS', 'Ориентирована на e-commerce', 'Минималистичный движок для блогов']),
                'difficulty' => 55,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Соотнесите основные шаблоны проектирования с их предназначением.',
                'first_column' => json_encode(['Singleton', 'Factory Method', 'Observer', 'Decorator', 'Strategy']),
                'second_column' => json_encode(['Гарантирует единственный экземпляр', 'Создает объекты через фабрику', 'Подписка на события', 'Декорирование объектов', 'Выбор поведения во время выполнения']),
                'difficulty' => 65,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Соотнесите способы хранения состояния в React.',
                'first_column' => json_encode(['useState', 'useReducer', 'Context API', 'Redux', 'Recoil']),
                'second_column' => json_encode(['Локальное состояние компонента', 'Сложное состояние с редюсерами', 'Глобальное состояние через контекст', 'Централизованное хранилище', 'Современный атомарный подход']),
                'difficulty' => 60,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Соотнесите виды атак на веб-приложения с их механизмами.',
                'first_column' => json_encode(['SQL-инъекция', 'XSS', 'CSRF', 'DDoS', 'Brute Force']),
                'second_column' => json_encode(['Внедрение SQL-кода в запросы', 'Внедрение вредоносного JavaScript', 'Подмена запросов от имени пользователя', 'Перегрузка сервера трафиком', 'Перебор паролей']),
                'difficulty' => 70,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Соотнесите основные принципы REST API.',
                'first_column' => json_encode(['Stateless', 'Client-Server', 'Cacheable', 'Layered System', 'Uniform Interface']),
                'second_column' => json_encode(['Сервер не хранит состояние клиента', 'Клиент и сервер независимы', 'Клиент может кэшировать данные', 'Многоуровневая архитектура', 'Единообразный доступ к ресурсам']),
                'difficulty' => 65,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Соотнесите атрибуты HTML-форм с их назначением.',
                'first_column' => json_encode(['action', 'method', 'name', 'autocomplete', 'novalidate']),
                'second_column' => json_encode(['URL-адрес для отправки данных', 'Метод запроса (GET/POST)', 'Имя элемента формы', 'Автозаполнение полей', 'Отключение встроенной валидации']),
                'difficulty' => 50,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Соотнесите способы оптимизации производительности веб-сайта.',
                'first_column' => json_encode(['Минификация', 'Lazy Loading', 'CDN', 'Gzip', 'Code Splitting']),
                'second_column' => json_encode(['Сжатие кода CSS и JS', 'Отложенная загрузка контента', 'Распределение ресурсов по серверам', 'Сжатие HTTP-ответов', 'Разделение кода на модули']),
                'difficulty' => 55,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Соотнесите популярные алгоритмы сортировки с их сложностью.',
                'first_column' => json_encode(['Bubble Sort', 'Merge Sort', 'Quick Sort', 'Heap Sort', 'Insertion Sort']),
                'second_column' => json_encode(['O(n^2)', 'O(n log n)', 'O(n log n)', 'O(n log n)', 'O(n^2)']),
                'difficulty' => 60,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Соотнесите уровни HTTP-кодов с их значением.',
                'first_column' => json_encode(['1xx', '2xx', '3xx', '4xx', '5xx']),
                'second_column' => json_encode(['Информационные', 'Успешные', 'Перенаправления', 'Ошибки клиента', 'Ошибки сервера']),
                'difficulty' => 50,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Соотнесите основные структуры данных с их особенностями.',
                'first_column' => json_encode(['Array', 'Linked List', 'Stack', 'Queue', 'Hash Table']),
                'second_column' => json_encode(['Набор элементов с индексами', 'Связанный список узлов', 'Стек LIFO', 'Очередь FIFO', 'Хранение пар ключ-значение']),
                'difficulty' => 55,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Соотнесите основные принципы асинхронного программирования.',
                'first_column' => json_encode(['Callback', 'Promise', 'Async/Await', 'Event Loop', 'Concurrency']),
                'second_column' => json_encode(['Функции обратного вызова', 'Объект для обработки асинхронных данных', 'Современный синтаксис для работы с асинхронностью', 'Цикл обработки событий', 'Параллельное выполнение задач']),
                'difficulty' => 65,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Соотнесите принципы CSS с их описанием.',
                'first_column' => json_encode(['Specificity', 'Inheritance', 'Cascade', 'Flexbox', 'Grid']),
                'second_column' => json_encode(['Приоритетность правил', 'Наследование стилей', 'Последовательность применения правил', 'Макет на основе гибких контейнеров', 'Макет на основе сетки']),
                'difficulty' => 55,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Соотнесите основные директивы SQL с их функциями.',
                'first_column' => json_encode(['SELECT', 'INSERT', 'UPDATE', 'DELETE', 'JOIN']),
                'second_column' => json_encode(['Выборка данных', 'Добавление данных', 'Обновление данных', 'Удаление данных', 'Объединение таблиц']),
                'difficulty' => 50,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Соотнесите уровни кеширования с их характеристиками.',
                'first_column' => json_encode(['Browser Cache', 'CDN Cache', 'Server Cache', 'Database Cache', 'Memory Cache']),
                'second_column' => json_encode(['Кеширование в браузере пользователя', 'Кеширование на периферийных серверах', 'Кеширование на сервере', 'Кеширование в базе данных', 'Кеширование в оперативной памяти']),
                'difficulty' => 60,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Соотнесите фреймворки бэкенда с их языками программирования.',
                'first_column' => json_encode(['Django', 'Express.js', 'Laravel', 'Spring', 'FastAPI']),
                'second_column' => json_encode(['Python', 'JavaScript', 'PHP', 'Java', 'Python']),
                'difficulty' => 55,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Соотнесите основные уязвимости веб-приложений с их рисками.',
                'first_column' => json_encode(['SQL Injection', 'XSS', 'CSRF', 'Broken Authentication', 'Security Misconfiguration']),
                'second_column' => json_encode(['Использование SQL-запросов для атак', 'Использование вредоносного JavaScript', 'Фальсификация запросов от имени пользователя', 'Небезопасная аутентификация', 'Ошибки конфигурации системы безопасности']),
                'difficulty' => 70,
            ],
            [
                'topic_id' => 1,
                'vis' => 1,
                'quest' => 'Соотнесите основные принципы DevOps с их описанием.',
                'first_column' => json_encode(['CI/CD', 'Infrastructure as Code', 'Monitoring', 'Logging', 'Automation']),
                'second_column' => json_encode(['Непрерывная интеграция и развертывание', 'Описание инфраструктуры в коде', 'Мониторинг работы системы', 'Логирование событий', 'Автоматизация процессов разработки и развертывания']),
                'difficulty' => 65,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Сопоставьте простые арифметические операции с их результатами.',
                'first_column' => json_encode(['2 + 2', '3 * 4', '9 / 3', '5 - 3']),
                'second_column' => json_encode(['4', '12', '3', '2']),
                'difficulty' => 30,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Соедините числа с их квадратами.',
                'first_column' => json_encode(['2', '3', '4', '5']),
                'second_column' => json_encode(['4', '9', '16', '25']),
                'difficulty' => 40,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Сопоставьте числа с их простыми делителями.',
                'first_column' => json_encode(['6', '10', '12', '15']),
                'second_column' => json_encode(['2, 3', '2, 5', '2, 3', '3, 5']),
                'difficulty' => 50,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Соедините геометрические фигуры с их характеристиками.',
                'first_column' => json_encode(['Круг', 'Треугольник', 'Квадрат', 'Прямоугольник']),
                'second_column' => json_encode(['Радиус и диаметр', 'Сумма углов 180°', 'Все углы прямые', 'Противоположные стороны равны']),
                'difficulty' => 45,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Сопоставьте дроби с их десятичными эквивалентами.',
                'first_column' => json_encode(['1/2', '1/4', '3/5', '7/10']),
                'second_column' => json_encode(['0.5', '0.25', '0.6', '0.7']),
                'difficulty' => 40,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Соедините уравнения с их решениями.',
                'first_column' => json_encode(['x + 3 = 5', '2x = 6', 'x - 4 = 2', '3x = 9']),
                'second_column' => json_encode(['x = 2', 'x = 3', 'x = 6', 'x = 3']),
                'difficulty' => 50,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Соедините площади фигур с их размерами.',
                'first_column' => json_encode(['Площадь квадрата 4 см²', 'Площадь прямоугольника 6 см²', 'Площадь круга 9 см²', 'Площадь треугольника 5 см²']),
                'second_column' => json_encode(['Сторона 2 см', 'Стороны 2 см и 3 см', 'Радиус 3 см', 'Основание 5 см и высота 2 см']),
                'difficulty' => 55,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Сопоставьте функции с их графиками.',
                'first_column' => json_encode(['y = x + 2', 'y = x²', 'y = 2x', 'y = |x|']),
                'second_column' => json_encode(['Прямая линия с наклоном 1', 'Парабола', 'Прямая линия с наклоном 2', 'График с углом на оси X']),
                'difficulty' => 60,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Сопоставьте углы с их измерениями.',
                'first_column' => json_encode(['Прямой угол', 'Острий угол', 'Тупой угол', 'Развернутый угол']),
                'second_column' => json_encode(['90°', 'Менее 90°', 'Больше 90°', '180°']),
                'difficulty' => 30,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Сопоставьте числа с их факториалами.',
                'first_column' => json_encode(['3', '4', '5', '6']),
                'second_column' => json_encode(['6', '24', '120', '720']),
                'difficulty' => 40,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Соедините углы с их названиями.',
                'first_column' => json_encode(['45°', '90°', '180°', '270°']),
                'second_column' => json_encode(['Острый угол', 'Прямой угол', 'Развернутый угол', 'Тупой угол']),
                'difficulty' => 35,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Сопоставьте простые числа с их номерами.',
                'first_column' => json_encode(['2', '3', '5', '7']),
                'second_column' => json_encode(['1-е', '2-е', '3-е', '4-е']),
                'difficulty' => 30,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Соедините квадраты с их сторонами.',
                'first_column' => json_encode(['16 см²', '25 см²', '36 см²', '49 см²']),
                'second_column' => json_encode(['4 см', '5 см', '6 см', '7 см']),
                'difficulty' => 45,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Сопоставьте процентные значения с их дробями.',
                'first_column' => json_encode(['50%', '25%', '75%', '10%']),
                'second_column' => json_encode(['1/2', '1/4', '3/4', '1/10']),
                'difficulty' => 40,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Соедините уравнения с их решениями.',
                'first_column' => json_encode(['x + 7 = 10', '2x + 3 = 11', 'x/2 = 5', '3x = 12']),
                'second_column' => json_encode(['x = 3', 'x = 4', 'x = 10', 'x = 4']),
                'difficulty' => 50,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Сопоставьте геометрические фигуры с их описанием.',
                'first_column' => json_encode(['Ромб', 'Круг', 'Треугольник', 'Квадрат']),
                'second_column' => json_encode(['Все стороны равны', 'Все углы прямые', 'Все стороны равны, но углы разные', 'Радиус и диаметр']),
                'difficulty' => 45,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Сопоставьте делители чисел с их результатами.',
                'first_column' => json_encode(['12', '16', '20', '18']),
                'second_column' => json_encode(['2, 3, 4, 6', '2, 4, 8', '2, 4, 5', '2, 3, 6']),
                'difficulty' => 50,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Соедините дроби с их упрощенными значениями.',
                'first_column' => json_encode(['4/8', '6/12', '8/16', '10/20']),
                'second_column' => json_encode(['1/2', '1/2', '1/2', '1/2']),
                'difficulty' => 35,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Сопоставьте числа с их квадратными корнями.',
                'first_column' => json_encode(['16', '25', '36', '49']),
                'second_column' => json_encode(['4', '5', '6', '7']),
                'difficulty' => 40,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Сопоставьте математические выражения с их результатами.',
                'first_column' => json_encode(['7 + 5', '6 * 3', '8 - 2', '18 / 3']),
                'second_column' => json_encode(['12', '18', '6', '6']),
                'difficulty' => 30,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Соедините уравнения с их решениями.',
                'first_column' => json_encode(['3x = 9', '2x + 5 = 11', 'x - 4 = 2', 'x + 6 = 10']),
                'second_column' => json_encode(['x = 3', 'x = 3', 'x = 6', 'x = 4']),
                'difficulty' => 45,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Сопоставьте геометрические фигуры с их периметрами.',
                'first_column' => json_encode(['Квадрат со стороной 4 см', 'Прямоугольник 2 см и 5 см', 'Треугольник со сторонами 3 см, 4 см, 5 см']),
                'second_column' => json_encode(['16 см', '14 см', '12 см']),
                'difficulty' => 50,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Сопоставьте числа с их степенями.',
                'first_column' => json_encode(['2^3', '3^2', '4^2', '5^2']),
                'second_column' => json_encode(['8', '9', '16', '25']),
                'difficulty' => 40,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Соедините дроби с их десятичными значениями.',
                'first_column' => json_encode(['3/4', '5/8', '7/10', '1/2']),
                'second_column' => json_encode(['0.75', '0.625', '0.7', '0.5']),
                'difficulty' => 45,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Сопоставьте значения углов с их типами.',
                'first_column' => json_encode(['30°', '90°', '120°', '180°']),
                'second_column' => json_encode(['Острый угол', 'Прямой угол', 'Тупой угол', 'Развернутый угол']),
                'difficulty' => 35,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Соедините геометрические фигуры с их площадями.',
                'first_column' => json_encode(['Квадрат со стороной 5 см', 'Прямоугольник 4 см и 6 см', 'Треугольник с основанием 6 см и высотой 4 см']),
                'second_column' => json_encode(['25 см²', '24 см²', '12 см²']),
                'difficulty' => 50,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Сопоставьте числа с их логарифмами.',
                'first_column' => json_encode(['log(100)', 'log(1000)', 'log(10)', 'log(1)']),
                'second_column' => json_encode(['2', '3', '1', '0']),
                'difficulty' => 55,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Сопоставьте математические выражения с их результатами.',
                'first_column' => json_encode(['(3+4) * 2', '6^2', '15 - 7', '8 * 3']),
                'second_column' => json_encode(['14', '36', '8', '24']),
                'difficulty' => 40,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Сопоставьте числа с их двоичными представлениями.',
                'first_column' => json_encode(['2', '4', '7', '10']),
                'second_column' => json_encode(['10', '100', '111', '1010']),
                'difficulty' => 50,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Соедините математические выражения с их результатами.',
                'first_column' => json_encode(['6 * (5 + 2)', '8 * 4', '3 * 5', '12 / 4']),
                'second_column' => json_encode(['42', '32', '15', '3']),
                'difficulty' => 40,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Соедините числовые последовательности с их правилами.',
                'first_column' => json_encode(['1, 4, 9, 16, 25', '2, 4, 6, 8, 10', '3, 6, 9, 12, 15']),
                'second_column' => json_encode(['Квадраты чисел', 'Четные числа', 'Числа, кратные 3']),
                'difficulty' => 45,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Сопоставьте числовые выражения с их значениями.',
                'first_column' => json_encode(['3 + 4 * 2', '5 * 6 - 3', '8 / 2 + 1', '7 * 3 - 4']),
                'second_column' => json_encode(['11', '27', '5', '17']),
                'difficulty' => 35,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Сопоставьте правильные вычисления с их результатами.',
                'first_column' => json_encode(['2^3 + 1', '5 * 6 / 3', '7 - 3 * 2', '9 + 8 / 4']),
                'second_column' => json_encode(['9', '10', '1', '11']),
                'difficulty' => 40,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Сопоставьте графики функций с их уравнениями.',
                'first_column' => json_encode(['y = x + 2', 'y = x²', 'y = -x', 'y = 2x']),
                'second_column' => json_encode(['Прямая линия с наклоном 1', 'Парабола', 'Прямая линия с наклоном -1', 'Прямая линия с наклоном 2']),
                'difficulty' => 60,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Сопоставьте числа с их порядковыми номерами.',
                'first_column' => json_encode(['1', '3', '5', '10']),
                'second_column' => json_encode(['Первое', 'Третье', 'Пятое', 'Десятое']),
                'difficulty' => 20,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Соедините длины сторон с их периметрами.',
                'first_column' => json_encode(['Стороны квадрата 6 см', 'Стороны прямоугольника 3 см и 8 см', 'Стороны треугольника 3 см, 4 см, 5 см']),
                'second_column' => json_encode(['24 см', '22 см', '12 см']),
                'difficulty' => 50,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Сопоставьте числа с их натуральными делителями.',
                'first_column' => json_encode(['6', '12', '15', '18']),
                'second_column' => json_encode(['1, 2, 3, 6', '1, 2, 3, 4, 6, 12', '1, 3, 5, 15', '1, 2, 3, 6, 9, 18']),
                'difficulty' => 45,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Сопоставьте правильные пропорции с их решениями.',
                'first_column' => json_encode(['2 / 4 = 6 / x', '3 / 5 = 9 / x', '8 / 16 = x / 4']),
                'second_column' => json_encode(['x = 12', 'x = 15', 'x = 2']),
                'difficulty' => 50,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Соедините числа с их квадратами.',
                'first_column' => json_encode(['2', '3', '4', '5']),
                'second_column' => json_encode(['4', '9', '16', '25']),
                'difficulty' => 30,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Сопоставьте углы с их размерами.',
                'first_column' => json_encode(['45°', '90°', '120°', '180°']),
                'second_column' => json_encode(['Острый угол', 'Прямой угол', 'Тупой угол', 'Развернутый угол']),
                'difficulty' => 35,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Сопоставьте числа с их натуральными логарифмами.',
                'first_column' => json_encode(['e^1', 'e^2', 'e^3', 'e^4']),
                'second_column' => json_encode(['2.718', '7.389', '20.085', '54.598']),
                'difficulty' => 55,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Соедините числа с их делителями.',
                'first_column' => json_encode(['12', '18', '20', '24']),
                'second_column' => json_encode(['1, 2, 3, 4, 6, 12', '1, 2, 3, 6, 9, 18', '1, 2, 4, 5, 10, 20', '1, 2, 3, 4, 6, 8, 12, 24']),
                'difficulty' => 40,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Сопоставьте уравнения с их решениями.',
                'first_column' => json_encode(['x + 6 = 12', '2x - 3 = 7', '3x = 15', 'x/3 = 4']),
                'second_column' => json_encode(['x = 6', 'x = 5', 'x = 5', 'x = 12']),
                'difficulty' => 45,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Соедините числа с их квадратными корнями.',
                'first_column' => json_encode(['49', '81', '100', '121']),
                'second_column' => json_encode(['7', '9', '10', '11']),
                'difficulty' => 40,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Сопоставьте выражения с их значениями.',
                'first_column' => json_encode(['(2 + 3) * 4', '9 * 5 - 10', '7 + (3 * 2)', '6 * (7 + 2)']),
                'second_column' => json_encode(['20', '35', '13', '54']),
                'difficulty' => 40,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Соедините дроби с их десятичными значениями.',
                'first_column' => json_encode(['1/2', '3/4', '2/5', '7/10']),
                'second_column' => json_encode(['0.5', '0.75', '0.4', '0.7']),
                'difficulty' => 35,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Сопоставьте геометрические фигуры с их площадями.',
                'first_column' => json_encode(['Квадрат со стороной 4 см', 'Прямоугольник 5 см и 3 см', 'Круг с радиусом 2 см']),
                'second_column' => json_encode(['16 см²', '15 см²', '12.57 см²']),
                'difficulty' => 45,
            ],
            [
                'topic_id' => 2,
                'vis' => 1,
                'quest' => 'Сопоставьте функции с их графиками.',
                'first_column' => json_encode(['y = 2x', 'y = x²', 'y = -x', 'y = 3']),
                'second_column' => json_encode(['Прямая линия с наклоном 2', 'Парабола', 'Прямая линия с наклоном -1', 'Горизонтальная прямая линия']),
                'difficulty' => 60,
            ]
        ]);
    }
}
