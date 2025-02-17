/*!
 * Контроллер формы.
 * Расширение "Логирование".
 * Модуль "Конфигурация".
 * Copyright 2015 Вeб-студия GearMagic. Anton Tivonenko <anton.tivonenko@gmail.com>
 * https://gearmagic.ru/license/
 */

Ext.define('Gm.be.config.logger.FormController', {
    extend: 'Gm.view.form.PanelController',
    alias: 'controller.gm-be-config-logger-form',

    /**
     * Срабатывает при клике на флагов "Служба логирования включена".
     * @param {Ext.form.field.Checkbox} me
     * @param {Boolean} value Значение.
     */
    onCheckLoggerLogging: function (me, value) {
        let disabled = value ? false : true,
            p = this.getViewCmp('profiling-enabled'),
            q = this.getViewCmp('qprofiling-enabled'),
            m = this.getViewCmp('mprofiling-enabled');
        // доступны только в режиме отладки приложения
        p.setDisabled(p.gearDebug ? disabled : true);
        q.setDisabled(true);
        m.setDisabled(true);
        if (disabled) {
            p.setValue(0);
            q.setValue(0);
            m.setValue(0);
        }
    },

    /**
     * Срабатывает при клике на флагов "Профилирование производительности включено".
     * @param {Ext.form.field.Checkbox} me
     * @param {Boolean} value Значение.
     */
    onCheckLoggerProfiling: function (me, value) {
        let disabled = value ? false : true,
            q = this.getViewCmp('qprofiling-enabled'),
            m = this.getViewCmp('mprofiling-enabled');
        // доступны только при профилировании производительности
        q.setDisabled(disabled);
        m.setDisabled(disabled);
        if (disabled) {
            q.setValue(0);
            m.setValue(0);
        }
    }
});
