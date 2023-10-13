<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>
<p align="center"><img src="https://github.com/Null-ch/PIN_ERP_TEST/assets/65172872/692a4cbe-445b-475a-94f7-47446119bc44" width="400"></p>

Ссылка на тестовое задание: https://docs.google.com/document/d/1fl4eCKdpSXUNyu899NCKaDy_fdHcVPDE-GoO9siZPX4/edit

# ОПИСАНИЕ ПРОЕКТА

В данном проекте реализуется Тестовое задание на позицию PHP-разработчика (Laravel):
- Административная часть сервиса;
- Создание моделей;
- Создание валидации;
- Система ролей и проверка прав (через мидлвейр и политику прав);
- Отправка уведомлений на Email при создании запиви в БД (создание продукта);
- Конфигурация и запуск проекта в Docker;

Данные хранятся в подключенном контейнере PostgreSQL

# ИНСТАЛЯЦИЯ

Склонируйте проект в директорию с сервером:

`https://github.com/Null-ch/MAMP_laravel_test_task.git`

Переименуйте .env.example в .env:

Затем, открыв из папки проекта консоль, введите команду для установки пакетов Laravel:

`composer update`

Открываем из папки проекта консоль, введите команду для сборки проекта:

`docker-compose up --build`
Для использования команд php artisan может потребоваться вход в терминал (если у вас будут ошибки). 
Команда: `docker compose exec app bash`

Открываем новую консоль в директории проекта введите команду для генерации таблиц базы данных:

`php artisan migrate`

В открытой консоли директории проекта введите команду для генерации учетных записей в базе данных:

`php artisan migrate --seed`

УЗ Администратора логин: admin1@example.com пароль: admin
УЗ Пользователя логин: user@example.com пароль: user

Затем введите команду для генерации ключа:

`php artisan key:generate`
## Ссылки
- Проект доступен после установки по ссылке: http://localhost:8076/
- pgAdmin доступен после установки по ссылке: http://localhost:5050/login (логин: admin@gmail.com пароль: admin)
- Данные учетной записи для пользователя БД: 
   * POSTGRES_DB: test
   * POSTGRES_USER: test-user
   * POSTGRES_PASSWORD: root
