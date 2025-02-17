<?php
/**
 * Этот файл является частью расширения модуля веб-приложения GearMagic.
 * 
 * Пакет русской локализации.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

return [
    '{name}'        => 'Логирование',
    '{description}' => 'Логирование сообщений (ошибок, отладочной информации...) приложения',
    '{permissions}' => [
        'any'  => ['Полный доступ', 'Настройка логирования сообщений']
    ],

    // Form
    'If the logging service is disabled, messages will not be logged' => 'Если служба логирования отключена, записи сообщений производиться не будут',
    // Form: глобальные параметры конфигурации приложения
    'Global parameters' => 'Глобальные параметры конфигурации приложения',
    'Application mode' => 'Режим работы приложения',
    'Debuggin application' => 'Отладка приложения',
    'Debuggin application directive GM_DEBUG' => 'Отладка приложения c помощью параметра &laquo;GM_DEBUG&raquo;',
    'directive GM_DEBUG' => 'параметр &laquo;GM_DEBUG&raquo;',
    'Register error handler' => 'Регистрация обработчика ошибок',
    'Register error handler GM_ENABLE_ERROR_HANDLER' => 'Регистрация обработчика ошибок c помощью параметра &laquo;GM_ENABLE_ERROR_HANDLER&raquo;',
    'directive GM_ENABLE_ERROR_HANDLER' => 'параметр &laquo;GM_ENABLE_ERROR_HANDLER&raquo;',
    'Register error exception' => 'Регистрация обработчика исключений',
    'Register error exception GM_ENABLE_EXCEPTION_HANDLER' => 'Регистрация обработчика исключений c помощью параметра &laquo;GM_ENABLE_EXCEPTION_HANDLER&raquo;',
    'directive GM_ENABLE_EXCEPTION_HANDLER' => 'параметр &laquo;GM_ENABLE_EXCEPTION_HANDLER&raquo;',
    // Form: настройки конфигурации PHP
    'Event and error logging configuration settings' => 'Настройки конфигурации протоколирования событий и ошибок PHP',
    'Display errors with the rest of the output' => 'Вывод ошибок на экран вместе с остальным выводом',
    'parameter "display_errors"' => 'параметр &laquo;display_errors&raquo;',
    'Display errors that occur during startup' => 'Отображение ошибок, возникающие во время запуска',
    'parameter "display_startup_errors"' => 'параметр &laquo;display_startup_errors&raquo;',
    'Logging errors to journal' => 'Вывод ошибок в журнал',
    'parameter "log_errors"' => 'параметр &laquo;log_errors&raquo;',
    'The maximum length of errors in the log in bytes' => 'Максимальной длины ошибок в журнале в байтах',
    'Do not log repeated errors' => 'Не заносить в журнал повторяющиеся ошибки',
    'parameter "ignore_repeated_errors"' => 'параметр &laquo;ignore_repeated_errors&raquo;',
    'Reporting memory leaks' => 'Формирование отчета об утечках памяти',
    'parameter "report_memleaks"' => 'параметр &laquo;report_memleaks&raquo;',
    'Error messages include HTML tags' => 'Сообщения об ошибках включают теги HTML',
    'parameter "html_errors"' => 'параметр &laquo;html_errors&raquo;',
    'Errors are output in XML-RPC format' => 'Ошибки выводятся в формате XML-RPC',
    'parameter "xmlrpc_errors"' => 'параметр &laquo;xmlrpc_errors&raquo;',
    'String, show before error message' => 'Строка, выводимая перед сообщением об ошибке',
    'String output after error message' => 'Строка, выводимая после сообщением об ошибке',
    'The name of the file to which error messages will be added' => 'Имя файла, в который будут добавляются сообщения об ошибках',
    'Setting values are set using ini_set or directives in the web server configuration files' => 'Значения настроек устанавливаются с помощью ini_set или директив в файлах конфигурации веб-сервера',
    'Configure logging service' => 'Настройка службы логирования',
    'Logging service enabled' => 'Служба логирования включена',
    'Performance profiling enabled' => 'Профилирование производительности включено',
    'Database query profiling enabled' => 'Профилирование запросов к базе данных включено',
    'Mail profiling enabled' => 'Профилирование почты включено',
    'Configuring the application errors recording by the logger' => 'Настройка записи <span style="color:#4d82b8">&laquo;Ошибок&raquo;</span> приложения логгером',
    'Error logging enabled' => 'Запись ошибок включена',
    'Automatically create' => 'Автоматически создавать',
    'Message writer name' => 'Имя писателя сообщений',
    'Exclude entry for route' => 'Исключить запись для маршрута',
    'Writing errors to a file' => 'Запись ошибок в файл',
    'Resolution for the error catalog' => 'Разрешение для каталога ошибок',
    'Resolution for error files' => 'Разрешение для файлов ошибок',
    'Maximum file size (in Kb)' => 'Максимальный размер файла (в Кб)',
    'Path to error file' => 'Путь к файлу ошибок',
    'Error logging is available only for:' => 'Запись ошибок доступно только для:',
    'IP address' => 'IP-адрес',
    'User' => 'Пользователь',
    'User role' => 'Роль пользователя',
    'If not one of the fields is filled out, the record is available for all' => 'Если не одно из полей не заполнено, запись доступна для всех',
    'Configuring the application "Debug" record by the logger' => 'Настройка записи <span style="color:#4d82b8">&laquo;Отладки&raquo;</span> приложения логгером',
    'Debug record enabled' => 'Запись отладки включена',
    'Logging debugging' => 'Запись отладки в журнал',
    'Number of journal entries' => 'Количество записей в журнале',
    'Permission for the log directory' => 'Разрешение для каталога журнала',
    'Permission for log files' => 'Разрешение для файлов журнала',
    'Log directory path' => 'Путь к каталогу журнала',
    'A debug record is only available for:' => 'Запись отладки доступна только для:',
    'If not one of the fields is filled out, the entry is available to everyone' => 'Если не одно из полей не заполнено, запись доступна для всех',
    'Global configuration settings are changed only manually in the bootloader script' => 'Глобальные параметры конфигурации изменяются только &laquo;вручную&raquo; в сценарии &laquo;bootstrap&raquo; загрузчика',
    'Delete file' => 'Удалить файл',
    'View file' => 'Просмотреть файл',
    'in debug mode only' => 'только в режиме отладки',
    'reset settings' => 'сбросить настройки',
    // Form: сообщения / заголовки
    'Save settings' => 'Сохранение настроек',
    'Reset settings' => 'Сброс настроек',
    // Form: сообщения / текст
    'settings saved {0} successfully' => 'успешное сохранение настроек "<b>{0}</b>"',
    'settings reseted {0} successfully' => 'успешный сброс настроек "<b>{0}</b>"'
];
