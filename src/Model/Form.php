<?php
/**
 * Этот файл является частью расширения модуля веб-приложения GearMagic.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

namespace Gm\Backend\Config\Logger\Model;

use Gm;
use Gm\Helper\Json;
use Gm\Backend\Config\Model\ServiceForm;
use Gm\Panel\Helper\ExtField;

/**
 * Модель данных конфигурации службы "Логирование".
 * 
 * Cлужба {@see \Gm\Log\Logger}.
 * 
 * @author Anton Tivonenko <anton.tivonenko@gmail.com>
 * @package Gm\Backend\Config\Logger\Model
 * @since 1.0
 */
class Form extends ServiceForm
{
    /**
     * {@inheritdoc}
     */
    public function init(): void
    {
        parent::init();

        $this->unifiedName = Gm::$app->logger->getObjectName();
    }

    /**
     * {@inheritdoc}
     */
    public function maskedAttributes(): array
    {
        return [
            'enabled'             => 'enabled',
            'enableProfiling'     => 'enableProfiling',
            'enableProfilingDb'   => 'enableProfilingDb',
            'enableProfilingMail' => 'enableProfilingMail',
            'targets'             => 'targets'
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function beforeLoad(array &$data): void
    {
        ExtField::checkboxValue($data, 'enabled', true, false); // служба логирования
        ExtField::checkboxValue($data, 'enableProfiling', true, false); // профилирование производительности
        ExtField::checkboxValue($data, 'enableProfilingDb', true, false); // профилирование запросов к базе данных
        ExtField::checkboxValue($data, 'enableProfilingMail', true, false); // профилирование почты
    }

    /**
     * {@inheritdoc}
     */
    public function beforeSave(bool $isInsert): bool
    {
        if ($this->targets) {
            $targets = array();
            foreach($this->targets as $name => $options) {
                // если указано "разрешение на каталог"
                if (!empty($options['dirMode'])) {
                    $options['dirMode'] = octdec($options['dirMode']);
                }
                // если указано "разрешение на файлы"
                if (!empty($options['fileMode'])) {
                    $options['fileMode'] = octdec($options['fileMode']);
                }
                //
                if (isset($options['enabled']) && $options['enabled'] == 'on')
                    $options['enabled'] = true;
                else
                    $options['enabled'] = false;
                if (isset($options['autoCreate']) && $options['autoCreate'] == 'on')
                    $options['autoCreate'] = true;
                else
                    $options['autoCreate'] = false;
                $options['allowedIPs'] = empty($options['allowedIPs']) ? array() : Json::tryDecode($options['allowedIPs']);
                $options['allowedUsers'] = empty($options['allowedUsers']) ? array() : Json::tryDecode($options['allowedUsers']);
                $options['allowedRoles'] = empty($options['allowedRoles']) ? array() : Json::tryDecode($options['allowedRoles']);
                $options['excludeRoutes'] = empty($options['excludeRoutes']) ? array() : Json::tryDecode($options['excludeRoutes']);
                $targets[$name] = $options;
            }
            $this->targets = $targets;
        }

        return parent::beforeSave($isInsert);
    }
}
