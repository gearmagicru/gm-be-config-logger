<?php
/**
 * Этот файл является частью расширения модуля веб-приложения GearMagic.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

namespace Gm\Backend\Config\Logger\Controller;

use Gm;
use Gm\Exception;
use Gm\Panel\Widget\EditWindow;
use Gm\Backend\Config\Controller\ServiceForm;

/**
 * Контроллер конфигурации службы "Логирование".
 * 
 * Cлужба {@see \Gm\Log\Logger}.
 * 
 * @author Anton Tivonenko <anton.tivonenko@gmail.com>
 * @package Gm\Backend\Config\Logger\Controller
 * @since 1.0
 */
class Form extends ServiceForm
{
    /**
     * Возвращает элементы панели формы (Gm.view.form.Panel GmJS).
     * 
     * @return array
     * 
     * @throws Exception\InvalidArgumentException Писатель с целью не существует.
     */
    protected function getFormItems(): array
    {
        /** @var \Gm\Log\Logger $service */
        $service = Gm::$app->logger;

        $errorPrependString = ini_get('error_prepend_string');
        $errorAppendString  = ini_get('error_append_string');
        /** @var \Gm\Log\Writer\FileWriter $appWriter */
        $appWriter = $service->getWriter('application');
        if ($appWriter === null) {
            throw new Exception\InvalidArgumentException(sprintf('Writer with target "%s" not exists.', 'application'));
        }

        $tagetApp = $tagetApp = null;
        if (isset($service->targets)) {
            $tagetApp   = $service->targets['application'] ?? null;
            $tagetDebug = $service->targets['debug'] ?? null;
        }
        return [
            [
                'xtype'       => 'fieldset',
                'title'       => '#Global parameters',
                'collapsible' => true,
                'defaults'    => [
                    'labelAlign' => 'right',
                    'labelWidth' => 220
                ],
                'items' => [
                    [
                        'xtype'      => 'displayfield',
                        'fieldLabel' => '#Application mode',
                        'name'       => 'debugGmMode',
                        'ui'         => 'parameter',
                        'value'      => '<b>' . GM_MODE . '</b>'
                    ],
                    [
                        'xtype'      => 'checkbox',
                        'fieldLabel' => '#Debuggin application',
                        'name'       => 'debugGmDebug',
                        'readOnly'   => true,
                        'ui'         => 'switch',
                        'boxLabel'   => '#directive GM_DEBUG',
                        'checked'    => GM_DEBUG,
                        'autoEl'     => [
                            'tag'       => 'div',
                            'data-qtip' => '#Debuggin application directive GM_DEBUG'
                        ]
                    ],
                    [
                        'xtype'      => 'checkbox',
                        'fieldLabel' => '#Register error handler',
                        'name'       => 'debugGmEnableErrorHandler',
                        'readOnly'   => true,
                        'ui'         => 'switch',
                        'boxLabel'   => '#directive GM_ENABLE_ERROR_HANDLER',
                        'checked'    => GM_ENABLE_ERROR_HANDLER,
                        'autoEl'     => [
                            'tag'       => 'div',
                            'data-qtip' => '#Register error handler GM_ENABLE_ERROR_HANDLER'
                        ]
                    ],
                    [
                        'xtype'      => 'checkbox',
                        'fieldLabel' => '#Register error exception',
                        'name'       => 'debugGmEnableExceptionHandler',
                        'readOnly'   => true,
                        'ui'         => 'switch',
                        'boxLabel'   => '#directive GM_ENABLE_EXCEPTION_HANDLER',
                        'checked'    => GM_ENABLE_EXCEPTION_HANDLER,
                        'autoEl'     => [
                            'tag'       => 'div',
                            'data-qtip' => '#Register error exception GM_ENABLE_EXCEPTION_HANDLER'
                        ]
                    ]
                ]
            ],
            [
                'xtype' => 'label',
                'ui'    => 'fieldset-comment',
                'html'  => '#Global configuration settings are changed only manually in the bootloader script'
            ],
            [
                'xtype'       => 'fieldset',
                'title'       => '#Event and error logging configuration settings',
                'collapsible' => true,
                'collapsed'   => true,
                'defaults'    => [
                    'labelAlign' => 'right',
                    'labelWidth' => 330
                ],
                'items' => [
                    [
                        'xtype'      => 'checkbox',
                        'fieldLabel' => '#Display errors with the rest of the output',
                        'name'       => 'debugDisplayErrors',
                        'readOnly'   => true,
                        'ui'         => 'switch',
                        'checked'    => ini_get('display_errors'),
                        'boxLabel'   => '#parameter "display_errors"'
                    ],
                    [
                        'xtype'      => 'checkbox',
                        'fieldLabel' => '#Display errors that occur during startup',
                        'name'       => 'debugDisplayStartupErrors',
                        'ui'         => 'switch',
                        'checked'    => ini_get('display_startup_errors'),
                        'boxLabel'   => '#parameter "display_startup_errors"'
                    ],
                    [
                        'xtype'      => 'checkbox',
                        'fieldLabel' => '#Logging errors to journal',
                        'name'       => 'debugLogErrors',
                        'readOnly'   => true,
                        'ui'         => 'switch',
                        'checked'    => ini_get('log_errors'),
                        'boxLabel'   => '#parameter "log_errors"'
                    ],
                    [
                        'xtype'      => 'displayfield',
                        'fieldLabel' => '#The maximum length of errors in the log in bytes',
                        'name'       => 'debugLogErrorsMaxLen',
                        'ui'         => 'parameter',
                        'value'      => ini_get('log_errors_max_len')
                    ],
                    [
                        'xtype'      => 'checkbox',
                        'fieldLabel' => '#Do not log repeated errors',
                        'name'       => 'debugIgnoreRepeatedErrors',
                        'readOnly'   => true,
                        'ui'         => 'switch',
                        'checked'    => ini_get('ignore_repeated_errors'),
                        'boxLabel'   => '#parameter "ignore_repeated_errors"'
                    ],
                    [
                        'xtype'      => 'checkbox',
                        'fieldLabel' => '#Reporting memory leaks',
                        'name'       => 'debugReportMemleaks',
                        'readOnly'   => true,
                        'ui'         => 'switch',
                        'checked'    => ini_get('report_memleaks'),
                        'boxLabel'   => '#parameter "report_memleaks"'
                    ],
                    [
                        'xtype'      => 'checkbox',
                        'fieldLabel' => '#Error messages include HTML tags',
                        'name'       => 'debugHtmlErrors',
                        'readOnly'   => true,
                        'ui'         => 'switch',
                        'checked'    => ini_get('html_errors'),
                        'boxLabel'   => '#parameter "html_errors"'
                    ],
                    [
                        'xtype'      => 'checkbox',
                        'fieldLabel' => '#Errors are output in XML-RPC format',
                        'name'       => 'debugXmlrpcErrors',
                        'readOnly'   => true,
                        'ui'         => 'switch',
                        'checked'    => ini_get('xmlrpc_errors'),
                        'boxLabel'   => '#parameter "xmlrpc_errors"'
                    ],
                    [
                        'xtype'      => 'displayfield',
                        'fieldLabel' => '#String, show before error message',
                        'name'       => 'debugErrorPrependString',
                        'ui'         => 'parameter',
                        'readOnly'   => true,
                        'value'      => $errorPrependString ? '"' . $errorPrependString . '"' : '" "'
                    ],
                    [
                        'xtype'      => 'displayfield',
                        'fieldLabel' => '#String output after error message',
                        'name'       => 'debugErrorAppendString',
                        'ui'         => 'parameter',
                        'readOnly'   => true,
                        'value'      => $errorAppendString ? '"' . $errorAppendString . '"' : '" "'
                    ],
                    [
                        'xtype'      => 'displayfield',
                        'fieldLabel' => '#The name of the file to which error messages will be added',
                        'name'       => 'debugErrorLog',
                        'ui'         => 'parameter',
                        'readOnly'   => true,
                        'value'      => '"' . ini_get('error_log') . ' "'
                    ]
                ]
            ],
            [
                'xtype' => 'label',
                'ui'    => 'fieldset-comment',
                'html'  => '#Setting values are set using ini_set or directives in the web server configuration files'
            ],
            [
                'xtype'       => 'fieldset',
                'title'       => '#Configure logging service',
                'collapsible' => true,
                'collapsed'   => true,
                'defaults' => [
                    'labelAlign' => 'right',
                    'labelWidth' => 350
                ],
                'items' => [
                    [
                        'xtype'      => 'checkbox',
                        'id'         => $this->module->viewId('form__logging-enabled'),
                        'fieldLabel' => '#Logging service enabled',
                        'name'       => 'enabled',
                        'ui'         => 'switch',
                        'listeners'  => ['change' => 'onCheckLoggerLogging'],
                        'checked'    => $service->enabled
                    ],
                    [
                        'xtype'      => 'checkbox',
                        'id'         => $this->module->viewId('form__profiling-enabled'),
                        'fieldLabel' => '#Performance profiling enabled',
                        'boxLabel'   => '#in debug mode only',
                        'name'       => 'enableProfiling',
                        'ui'         => 'switch',
                        'listeners'  => ['change' => 'onCheckLoggerProfiling'],
                        'gearDebug'  => GM_DEBUG,
                        'disabled'   => !GM_DEBUG || !$service->enabled,
                        'checked'    => $service->enableProfiling
                    ],
                    [
                        'xtype'      => 'checkbox',
                        'id'         => $this->module->viewId('form__qprofiling-enabled'),
                        'fieldLabel' => '#Database query profiling enabled',
                        'boxLabel'   => '#in debug mode only',
                        'name'       => 'enableProfilingDb',
                        'ui'         => 'switch',
                        'gearDebug'  => GM_DEBUG,
                        'disabled'   => !GM_DEBUG || !$service->enableProfiling,
                        'checked'    => $service->enableProfilingDb
                    ],
                    [
                        'xtype'      => 'checkbox',
                        'id'         => $this->module->viewId('form__mprofiling-enabled'),
                        'fieldLabel' => '#Mail profiling enabled',
                        'boxLabel'   => '#in debug mode only',
                        'name'       => 'enableProfilingMail',
                        'ui'         => 'switch',
                        'gearDebug'  => GM_DEBUG,
                        'disabled'   => !GM_DEBUG || !$service->enableProfiling,
                        'checked'    => $service->enableProfilingMail
                    ]
                ]
            ],
            [
                'xtype' => 'label',
                'ui'    => 'fieldset-comment',
                'html'  => '#If the logging service is disabled, messages will not be logged'
            ],
            [
                'xtype'       => 'fieldset',
                'title'       => '#Configuring the application errors recording by the logger',
                'collapsible' => true,
                'collapsed'   => true,
                'defaults'    => [
                    'labelAlign' => 'right',
                    'labelWidth' => 240
                ],
                'items' => [
                    [
                        'xtype'      => 'checkbox',
                        'fieldLabel' => '#Error logging enabled',
                        'name'       => 'targets[application][enabled]',
                        'ui'         => 'switch',
                        'checked'    => $tagetApp['enabled'] ?? 0
                    ],
                    [
                        'xtype'      => 'checkbox',
                        'fieldLabel' => '#Automatically create',
                        'name'       => 'targets[application][autoCreate]',
                        'ui'         => 'switch',
                        'checked'    => $tagetApp['autoCreate'] ?? 0
                    ],
                    [
                        'xtype'      => 'textfield',
                        'fieldLabel' => '#Message writer name',
                        'name'       => 'targets[application][writer]',
                        'width'      => 400,
                        'value'      => $tagetApp['writer'] ?? 'error'
                    ],
                    [
                        'xtype'      => 'tagfield',
                        'fieldLabel' => '#Exclude entry for route',
                        'name'       => 'targets[application][excludeRoutes]',
                        'anchor'     => '100%',
                        'value'      => isset($tagetApp['excludeRoutes']) ? implode(',', $tagetApp['excludeRoutes']) : '',
                        'store'      => [],
                        'encodeSubmitValue' => true,
                        'autocomplete' => 'off',
                        'queryMode'    => 'local',
                        'createNewOnEnter' => true
                    ],
                    [
                        'xtype' => 'label',
                        'ui'    => 'header-line',
                        'text'  => '#Writing errors to a file'
                    ],
                    [
                        'xtype'      => 'textfield',
                        'fieldLabel' => '#Resolution for the error catalog',
                        'name'       => 'targets[application][dirMode]',
                        'width'      => 310,
                        'emptyText'  => '0775',
                        'value'      => isset($tagetApp['dirMode']) ? ($tagetApp['dirMode'] ? '0' . decoct($tagetApp['dirMode']) : '') : ''
                    ],
                    [
                        'xtype'      => 'textfield',
                        'fieldLabel' => '#Resolution for error files',
                        'name'       => 'targets[application][fileMode]',
                        'width'      => 310,
                        'value'      => isset($tagetApp['fileMode']) ? ($tagetApp['fileMode'] ? '0' . decoct($tagetApp['fileMode']) : '') : ''
                    ],
                    [
                        'xtype'      => 'textfield',
                        'fieldLabel' => '#Maximum file size (in Kb)',
                        'name'       => 'targets[application][maxFileSize]',
                        'emptyText'  => '10240',
                        'width'      => 310,
                        'value'      => $tagetApp['maxFileSize'] ?? ''
                    ],
                    [
                        'xtype'      => 'textfield',
                        'fieldLabel' => '#Path to error file',
                        'anchor'     => '100%',
                        'name'       => 'targets[application][logFile]',
                        'emptyText'  => '@runtime::/log/app.log',
                        'value'      => $tagetApp['logFile'] ?? ''
                    ],
                    [
                        'xtype' => 'toolbar',
                        'items' => [
                            '->',
                            [
                                'xtype'       => 'button',
                                'cls'         => 'g-form__button g-form__button_blue',
                                'text'        => '<i class="fal fa-file"></i> ' . $this->module->t('View file'),
                                'handler'     => 'loadWidget',
                                'disabled'    => !$appWriter->existsLogFile(),
                                'handlerArgs' => ['route' => '@backend/debugtoolbar'],
                                'disabled'    => true
                            ],
                            [
                                'xtype'       => 'button',
                                'cls'         => 'g-form__button g-form__button_red',
                                'text'        => '<i class="far fa-trash-alt"></i> ' . $this->module->t('Delete file'),
                                'disabled'    => !$appWriter->existsLogFile(),
                                'handler'     => 'request',
                                'handlerArgs' => ['url' => '@backend/debugtoolbar'],
                                'disabled'    => true
                            ]
                        ],
                        [
                            'xtype' => 'label',
                            'ui'    => 'header-line',
                            'text'  => '#Error logging is available only for:'
                        ],
                        [
                            'xtype'      => 'tagfield',
                            'fieldLabel' => '#IP address',
                            'name'       => 'targets[application][allowedIPs]',
                            'anchor'     => '100%',
                            'value'      => isset($tagetApp['allowedIPs']) ? implode(',', $tagetApp['allowedIPs']) : '',
                            'store'        => [],
                            'encodeSubmitValue' => true,
                            'autocomplete' => 'off',
                            'queryMode'    => 'local',
                            'createNewOnEnter' => true
                        ],
                        [
                            'xtype'      => 'tagfield',
                            'fieldLabel' => '#User',
                            'name'       => 'targets[application][allowedUsers]',
                            'anchor'     => '100%',
                            'store'      => [],
                            'value'      => isset($tagetApp['allowedUsers']) ? implode(',', $tagetApp['allowedUsers']) : '',
                            'store'      => [
                                'fields' => ['id', 'name', 'img'],
                                'proxy'  => [
                                    'type'        => 'ajax',
                                    'url'         => ['@backend/users/trigger/combo'],
                                    'extraParams' => ['combo' => 'users', 'noneRow' => 0, 'side' => 0],
                                    'reader'      => [
                                        'type'         => 'array',
                                        'rootProperty' => 'data'
                                    ]
                                ]
                            ],
                            'listConfig' => [
                                'itemTpl' => ['<div class="g-boundlist-item g-boundlist-item_offset" data-qtip="{name}">{img}{name}</div>']
                            ],
                            'encodeSubmitValue' => true,
                            'displayField'     => 'name',
                            'valueField'       => 'id',
                            'createNewOnEnter' => false,
                            'createNewOnBlur'  => false,
                            'filterPickList'   => true,
                            'queryMode'        => 'local'
                        ],
                        [
                            'xtype'      => 'tagfield',
                            'fieldLabel' => '#User role',
                            'name'       => 'targets[application][allowedRoles]',
                            'anchor'     => '100%',
                            'store'      => [],
                            'value'      => isset($tagetApp['allowedRoles']) ? implode(',', $tagetApp['allowedRoles']) : '',
                            'store'      => [
                                'fields' => ['id', 'name'],
                                'proxy'  => [
                                    'type'        => 'ajax',
                                    'url'         => ['@backend/user-roles/trigger/combo'],
                                    'extraParams' => ['combo' => 'roles', 'noneRow' => 0],
                                    'reader'      => [
                                        'type'         => 'array',
                                        'rootProperty' => 'data'
                                    ]
                                ]
                            ],
                            'encodeSubmitValue' => true,
                            'displayField'     => 'name',
                            'valueField'       => 'id',
                            'createNewOnEnter' => false,
                            'createNewOnBlur'  => false,
                            'filterPickList'   => true,
                            'queryMode'        => 'remote'
                        ]
                    ]
                ]
            ],
            [
                'xtype' => 'label',
                'ui'    => 'fieldset-comment',
                'html'  => '#If not one of the fields is filled out, the record is available for all'
            ],
            [
                'xtype'       => 'fieldset',
                'title'       => '#Configuring the application "Debug" record by the logger',
                'collapsible' => true,
                'collapsed'   => true,
                'defaults'    => [
                    'labelAlign' => 'right',
                    'labelWidth' => 240
                ],
                'items' => [
                    [
                        'xtype'      => 'checkbox',
                        'fieldLabel' => '#Debug record enabled',
                        'name'       => 'targets[debug][enabled]',
                        'ui'         => 'switch',
                        'checked'    => $tagetDebug['enabled'] ?? 0
                    ],
                    [
                        'xtype'      => 'checkbox',
                        'fieldLabel' => '#Automatically create',
                        'name'       => 'targets[debug][autoCreate]',
                        'ui'         => 'switch',
                        'checked'    => $tagetDebug['autoCreate'] ?? 0
                    ],
                    [
                        'xtype'      => 'textfield',
                        'fieldLabel' => '#Message writer name',
                        'name'       => 'targets[debug][writer]',
                        'width'      => 400,
                        'value'      => $tagetDebug['writer'] ?? 'debug'
                    ],
                    [
                        'xtype'      => 'tagfield',
                        'fieldLabel' => '#Exclude entry for route',
                        'name'       => 'targets[debug][excludeRoutes]',
                        'anchor'     => '100%',
                        'value'      => isset($tagetDebug['excludeRoutes']) ? implode(',', $tagetDebug['excludeRoutes']) : 'debugtoolbar',
                        'store'      => [],
                        'encodeSubmitValue' => true,
                        'autocomplete' => 'off',
                        'queryMode'    => 'local',
                        'createNewOnEnter' => true
                    ],
                    [
                        'xtype' => 'label',
                        'ui'    => 'header-line',
                        'text'  => '#Logging debugging'
                    ],
                    [
                        'xtype'      => 'numberfield',
                        'fieldLabel' => '#Number of journal entries',
                        'name'       => 'targets[debug][historySize]',
                        'width'      => 310,
                        'emptyText'  => 50,
                        'value'      => $tagetDebug['historySize'] ?? ''
                    ],
                    [
                        'xtype'      => 'textfield',
                        'fieldLabel' => '#Permission for the log directory',
                        'name'       => 'targets[debug][dirMode]',
                        'width'      => 310,
                        'emptyText'  => '0775',
                        'value'      => isset($tagetDebug['dirMode']) ? ($tagetDebug['dirMode'] ? '0' . decoct($tagetDebug['dirMode']) : '') : ''
                    ],
                    [
                        'xtype'      => 'textfield',
                        'fieldLabel' => '#Permission for log files',
                        'name'       => 'targets[debug][fileMode]',
                        'width'      => 310,
                        'value'      => isset($tagetDebug['fileMode']) ? ($tagetDebug['fileMode'] ? '0' . decoct($tagetDebug['fileMode']) : '') : ''
                    ],
                    [
                        'xtype'      => 'textfield',
                        'fieldLabel' => '#Log directory path',
                        'anchor'     => '100%',
                        'name'       => 'targets[debug][path]',
                        'emptyText'  => '@runtime::/log',
                        'value'      => $tagetDebug['path'] ?? ''
                    ],
                    [
                        'xtype' => 'toolbar',
                        'items' => [
                            '->',
                            [
                                'xtype'       => 'button',
                                'cls'         => 'g-form__button g-form__button_blue',
                                'text'        => '<i class="fal fa-file"></i> ' . $this->module->t('View file'),
                                'handler'     => 'loadWidget',
                                'handlerArgs' => ['route' => '@backend/debugtoolbar'],
                                'disabled'    => true
                            ],
                            [
                                'xtype'       => 'button',
                                'cls'         => 'g-form__button g-form__button_red',
                                'text'        => '<i class="far fa-trash-alt"></i> ' . $this->module->t('Delete file'),
                                'handler'     => 'request',
                                'handlerArgs' => ['url' => '@backend/debugtoolbar/grid/clear'],
                                'disabled'    => true
                            ]
                        ]
                    ],
                    [
                        'xtype' => 'label',
                        'ui'    => 'header-line',
                        'text'  => '#A debug record is only available for:'
                    ],
                    [
                        'xtype'      => 'tagfield',
                        'fieldLabel' => '#IP address',
                        'name'       => 'targets[debug][allowedIPs]',
                        'anchor'     => '100%',
                        'value'      => isset($tagetDebug['allowedIPs']) ? implode(',', $tagetDebug['allowedIPs']) : '',
                        'store'        => [],
                        'encodeSubmitValue' => true,
                        'autocomplete' => 'off',
                        'queryMode'    => 'local',
                        'createNewOnEnter' => true
                    ],
                    [
                        'xtype'      => 'tagfield',
                        'fieldLabel' => '#User',
                        'name'       => 'targets[debug][allowedUsers]',
                        'anchor'     => '100%',
                        'store'      => [],
                        'value'      => isset($tagetDebug['allowedUsers']) ? implode(',', $tagetDebug['allowedUsers']) : '',
                        'store'      => [
                            'fields' => ['id', 'name', 'img'],
                            'proxy'  => [
                                'type'        => 'ajax',
                                'url'         => ['@backend/users/trigger/combo'],
                                'extraParams' => ['combo' => 'users', 'noneRow' => 0, 'side' => 0],
                                'reader'      => [
                                    'type'         => 'array',
                                    'rootProperty' => 'data'
                                ]
                            ]
                        ],
                        'listConfig' => [
                            'itemTpl' => ['<div class="g-boundlist-item g-boundlist-item_offset" data-qtip="{name}">{img}{name}</div>']
                        ],
                        'encodeSubmitValue' => true,
                        'displayField'     => 'name',
                        'valueField'       => 'id',
                        'createNewOnEnter' => false,
                        'createNewOnBlur'  => false,
                        'filterPickList'   => true,
                        'queryMode'        => 'remote'
                    ],
                    [
                        'xtype'      => 'tagfield',
                        'fieldLabel' => '#User role',
                        'name'       => 'targets[debug][allowedRoles]',
                        'anchor'     => '100%',
                        'store'      => [],
                        'value'      => isset($tagetDebug['allowedRoles']) ? implode(',', $tagetDebug['allowedRoles']) : '',
                        'store'      => [
                            'fields' => ['id', 'name'],
                            'proxy'  => [
                                'type'        => 'ajax',
                                'url'         => ['@backend/user-roles/trigger/combo'],
                                'extraParams' => ['combo' => 'roles', 'noneRow' => 0],
                                'reader'      => [
                                    'type'         => 'array',
                                    'rootProperty' => 'data'
                                ]
                            ]
                        ],
                        'encodeSubmitValue' => true,
                        'displayField'     => 'name',
                        'valueField'       => 'id',
                        'createNewOnEnter' => false,
                        'createNewOnBlur'  => false,
                        'filterPickList'   => true,
                        'queryMode'        => 'remote'
                    ],
                ]
            ],
            [
                'xtype' => 'label',
                'ui'    => 'fielset-comment',
                'html'  => '#If not one of the fields is filled out, the entry is available to everyone'
            ],
            [
                'xtype'  => 'toolbar',
                'dock'   => 'bottom',
                'border' => 0,
                'style'  => ['borderStyle' => 'none'],
                'items'  => [
                    [
                        'xtype'    => 'checkbox',
                        'boxLabel' => $this->module->t('reset settings'),
                        'name'     => 'reset',
                        'ui'       => 'switch'
                    ]
                 ]
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function createWidget(): EditWindow
    {
        /** @var EditWindow $window */
        $window = parent::createWidget();

        // окно компонента (Ext.window.Window Sencha ExtJS)
        $window->height = 600;
        $window->width = 700;

        // панель формы (Gm.view.form.Panel GmJS)
        $window->form->autoScroll = true;
        $window->form->controller = 'gm-be-config-logger-form';
        $window->form->items = $this->getFormItems();
        $window
            ->setNamespaceJS('Gm.be.config.logger')
            ->addRequire('Gm.be.config.logger.FormController');
        return $window;
    }
}
