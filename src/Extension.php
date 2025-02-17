<?php
/**
 * Расширение модуля веб-приложения GearMagic.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

namespace Gm\Backend\Config\Logger;

/**
 * Расширение "Логирование".
 * 
 * Настройка логирования сообщений (ошибок, уведомлений, предупреждений, отладочной 
 * информации и т.д.) приложения.
 * 
 * Расширение принадлежит модулю "Конфигурация".
 * 
 * @author Anton Tivonenko <anton.tivonenko@gmail.com>
 * @package Gm\Backend\Config\Logger
 * @since 1.0
 */
class Extension extends \Gm\Panel\Extension\Extension
{
    /**
     * {@inheritdoc}
     */
    public string $id = 'gm.be.config.logger';

    /**
     * {@inheritdoc}
     */
    public string $defaultController = 'form';
}