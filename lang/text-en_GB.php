<?php
/**
 * Этот файл является частью расширения модуля веб-приложения GearMagic.
 * 
 * Пакет английской (британской) локализации.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

return [
    '{name}' => 'Logging',
    '{description}' => 'Logging of messages (errors, debugging information ...) of the application',
    '{permissions}' => [
        'any'  => ['Full access', 'Configuring logging of messages']
    ],

    // Form
    'If the logging service is disabled, messages will not be logged' => 'If the logging service is disabled, messages will not be logged',
    // Form: глобальные параметры конфигурации приложения
    'Global parameters' => 'Global application configuration options',
    'Application mode' => 'Application mode',
    'Debuggin application' => 'Debuggin application',
    'directive GM_DEBUG' => 'directive &laquo;GM_DEBUG&raquo;',
    'Register error handler' => 'Register error handler',
    'Register error handler GM_ENABLE_ERROR_HANDLER' => 'Register error handler &laquo;GM_ENABLE_ERROR_HANDLER&raquo;',
    'directive GM_ENABLE_ERROR_HANDLER' => 'directive &laquo;GM_ENABLE_ERROR_HANDLER&raquo;',
    'Register error exception' => 'Register error exception',
    'Register error exception GM_ENABLE_EXCEPTION_HANDLER' => 'Register error exception &laquo;GM_ENABLE_EXCEPTION_HANDLER&raquo;',
    'directive GM_ENABLE_EXCEPTION_HANDLER' => 'directive &laquo;GM_ENABLE_EXCEPTION_HANDLER&raquo;',
    // Form: настройки конфигурации PHP
    'Event and error logging configuration settings' => 'PHP event and error logging configuration settings',
    'Display errors with the rest of the output' => 'Display errors with the rest of the output',
    'parameter "display_errors"' => 'parameter &laquo;display_errors&raquo;',
    'Display errors that occur during startup' => 'Display errors that occur during startup',
    'parameter "display_startup_errors"' => 'parameter &laquo;display_startup_errors&raquo;',
    'Logging errors to journal' => 'Logging errors to journal',
    'parameter "log_errors"' => 'parameter &laquo;log_errors&raquo;',
    'The maximum length of errors in the log in bytes' => 'The maximum length of errors in the log in bytes',
    'Do not log repeated errors' => 'Do not log repeated errors',
    'parameter "ignore_repeated_errors"' => 'parameter &laquo;ignore_repeated_errors&raquo;',
    'Reporting memory leaks' => 'Reporting memory leaks',
    'parameter "report_memleaks"' => 'parameter &laquo;report_memleaks&raquo;',
    'Error messages include HTML tags' => 'Error messages include HTML tags',
    'parameter "html_errors"' => 'parameter &laquo;html_errors&raquo;',
    'Errors are output in XML-RPC format' => 'Errors are output in XML-RPC format',
    'parameter "xmlrpc_errors"' => 'параметр &laquo;xmlrpc_errors&raquo;',
    'String, show before error message' => 'String, show before error message',
    'String output after error message' => 'String output after error message',
    'The name of the file to which error messages will be added' => 'The name of the file to which error messages will be added',
    'Setting values are set using ini_set or directives in the web server configuration files' => 'Setting values are set using ini_set or directives in the web server configuration files',
    'Configure logging service' => 'Configure logging service',
    'Logging service enabled' => 'Logging service enabled',
    'Performance profiling enabled' => 'Performance profiling enabled',
    'Database query profiling enabled' => 'Database query profiling enabled',
    'Configuring the application errors recording by the logger' => 'Configuring the application errors recording by the logger',
    'Error logging enabled' => 'Error logging enabled',
    'Automatically create' => 'Automatically create',
    'Message writer name' => 'Message writer name',
    'Exclude entry for route' => 'Exclude entry for route',
    'Writing errors to a file' => 'Writing errors to a file',
    'Resolution for the error catalog' => 'Resolution for the error catalog',
    'Resolution for error files' => 'Resolution for error files',
    'Maximum file size (in Kb)' => 'Maximum file size (in Kb)',
    'Path to error file' => 'Path to error file',
    'Error logging is available only for:' => 'Error logging is available only for:',
    'IP address' => 'IP address',
    'User' => 'User',
    'User role' => 'User role',
    'If not one of the fields is filled out, the record is available for all' => 'If not one of the fields is filled out, the record is available for all',
    'Configuring the application "Debug" record by the logger' => 'Configuring the application "Debug" record by the logger',
    'Debug record enabled' => 'Debug record enabled',
    'Logging debugging' => 'Logging debugging',
    'Number of journal entries' => 'Number of journal entries',
    'Permission for the log directory' => 'Permission for the log directory',
    'Permission for log files' => 'Permission for log files',
    'Log directory path' => 'Log directory pat',
    'A debug record is only available for:' => 'A debug record is only available for:',
    'If not one of the fields is filled out, the entry is available to everyone' => 'If not one of the fields is filled out, the entry is available to everyone',
    'Global configuration settings are changed only manually in the bootloader script' => 'Global configuration settings are changed only manually in the bootloader script',
    'Delete file' => 'Delete file',
    'View file' => 'View file',
    'in debug mode only' => 'in debug mode only',
    'reset settings' => 'reset settings',
    // Form: сообщения / заголовки
    'Save settings' => 'Save settings',
    'Reset settings' => 'Reset settings',
    // Form: сообщения / текст
    'settings saved {0} successfully' => 'settings saved "<b>{0}</b>" successfully',
    'settings reseted {0} successfully' => 'settings reseted "<b>{0}</b>" successfully'
];
