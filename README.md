СТРУКТУРА ДИРЕКТОРИЙ
-------------------
      actions/            contains actions (controllers)
      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      forms/              contains form classes
      jobs/               contains jobs classes for queue
      mail/               contains view files for e-mails
      messages/           contains messages for i18n
      migrations/         contains migrations for database
      models/             contains model classes
      modules/            contains modules
      query/              contains query classes
      runtime/            contains files generated during runtime
      search/             contains search classes
      tests/              contains various tests for the basic application
      traits/             contains traits
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources
      widgets/            contains widgets classes for front


ТРЕБОВАНИЯ
------------

Минимальные требования:
- PHP >=8.4
- MySQL >=8.0

УСТАНОВКА
------------

1. Сделай clone репозитория, затем выполни команду:
~~~
composer install
~~~

2. Создай локальные .env (см. .env.example) и env.php (см. env.php.example):

3. Сконфигурируй подключение к базе и запусти миграции:
~~~
yii migrate
~~~

4. Запусти миграцию для хранения задач. Подробнее:
> https://www.yiiframework.com/extension/yiisoft/yii2-queue/doc/guide/3.0/ru/driver-db

5. Сбилди стили:
~~~
yii convert/scss
~~~

SWAGGER
------------

Документация находятся в php классах. Генерируется автоматически.

Общее описание: 
> /modules/<версия>/Module.php. 

Описание Path в контроллерах у action, моделей - у декораторов внутри соответствующего модуля.

Адрес документации:
> https://site-name/v1/swagger/doc
