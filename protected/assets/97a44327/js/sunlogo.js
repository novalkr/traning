(function($){

var ns = namespace('jviba');

/**
 * Constructor for Sunlogo
 */
ns.Sunlogo = function(model, options, controller)
{
    debug && console.log('application.Sunlogo::constructor()');
    if (!model) {
        model = MVC.createModel({
            className: 'jviba.model.map.Sun'
        }, this);
    }
    if (!controller) {
        var self = this;
        controller = MVC.createController(model, this, {
            events: {
                onTimerTick: function() {
                    self.handleSunTime(new Date());
                },
                onSunsetStart: function(initialTime) {
                    if (self._currentFaze != 'sunset') {
                        var effect = new jviba.SunsetEffect(
                            self.sunsetImage,
                            self.sunEventsDurations.sunset,
                            initialTime
                        );
                        effect.run();
                        self._currentFaze = 'sunset';
                    }
                },
                onSunriseStart: function(initialTime) {
                    if (self._currentFaze != 'sunrise') {
                        var effect = new jviba.SunriseEffect(
                            self.sunsetImage,
                            self.sunEventsDurations.sunrise,
                            initialTime
                        );
                        effect.run();
                        self._currentFaze = 'sunrise';
                    }
                }
            }
        });
    }
    options = options || {};
    if (!options.updateInterval) {
        options.updateInterval = 10000;
    }
    
    ns.Sunlogo.superclass.constructor.call(this, model, options, controller);
};

extend(ns.Sunlogo, View);
var proto = ns.Sunlogo.prototype;

/**
 * Currently runned sun faze
 */
proto._currentFaze = null;

/**
 * Sun fazes data
 */
proto.sunFazes = null;

/**
 * Sun events data
 */
proto.sunEventsDurations = null;

/**
 * Sunset image
 */
proto.sunsetImage = null;

/**
 * Initialization of sunlogo component
 */
proto.init = function()
{
    debug && console.log('application.Sunlogo::init()');
    ns.Sunlogo.superclass.init.call(this);
    this.sunsetImage = $('#logo-image-sunset');
    var controller = this.getController();
    var model = this.getModel();
    if (!this.options.location) {
        this.options.location = [48.023, 37.80224];
    }
    this.sunFazes = model.getFazes(this.options.location[0], this.options.location[1]);
    this.sunEventsDurations = model.getEventsDuration(this.options.location[0], this.options.location[1]);
    $.ui.timer_instance({
        id: 'sunlogo_timer',
        interval: this.options.updateInterval,
        callback: function(event) {
            controller.sendEvent('onTimerTick');
        }
    });
};

/**
 * Handles current time changes
 * 
 * @param current time
 */
proto.handleSunTime = function(time)
{
    debug && console.log('application.Sunlogo::handleSunTime()...' + (new Date()).toString());
    
    if (time >= this.sunFazes.sunrise && time < this.sunFazes.sunriseEnd) {
        this.getController().sendEvent('onSunriseStart', time - this.sunFazes.sunrise);
        return;
    }
    if (time >= this.sunFazes.sunsetStart && time < this.sunFazes.sunset) {
        this.getController().sendEvent('onSunsetStart', time - this.sunFazes.sunsetStart);
        return;
    }
    if (time >= this.sunFazes.sunset || time < this.sunFazes.sunrise) {
        this.getController().sendEvent('onSunsetStart', this.sunEventsDurations.sunset);
        return;
    }
    if (time >= this.sunFazes.sunrise) {
        this.getController().sendEvent('onSunriseStart', this.sunEventsDurations.sunrise);
        return;
    }
};


/***
 * Abstract sun effect class
 */
ns.SunEffect = function(logo, duration, initialTime, timerId)
{
    debug && console.log('SunEffect::constructor()');
    this.logo = logo;
    this.duration = duration;
    this.initialTime = initialTime;
    this._timerId = timerId;
    ns.SunEffect.superclass.constructor.call(this);
}

extend(ns.SunEffect, Component);
var proto = ns.SunEffect.prototype;

/**
 * Timer Id
 */
proto.timerId = null;

/**
 * Sunset duration (in milliseconds)
 */
proto.duration = null;

/**
 * Logo selector totime change
 */
proto.logo = null;

/**
 * Initial time of starting effect
 */
proto.initialTime = 0;

/**
 * Whether effect is in run state
 */
proto._isRun = false;

/**
 * Initialization of effect
 */
proto.init = function()
{
    debug && console.log('SunEffect::init()');
    ns.SunEffect.superclass.init.call(this);
    this.updateInterval = 50;
    this.timeElapsed = 0;
    this.timeElapsed += this.initialTime;
}

/**
 * Running effect
 */
proto.run = function()
{
    debug && console.log('SunEffect::run()...' + (new Date()).toString());
    var self = this;
    $.ui.timer_instance({id: 'sunlogo_timer'}).pauseTimeout(this.duration - this.timeElapsed);
    $.ui.timer_instance({
        id: this.getTimerId(),
        interval: this.updateInterval,
        callback: function(event) {
            self.onChangeTime();
        }
    });
    this._isRun = true;
}

/**
 * Stopping effect
 */
proto.stop = function()
{
    debug && console.log('SunEffect::stop()...' + (new Date()).toString());
    $.ui.timer_instance({id: this.getTimerId()}).stop();
    this._isRun = false;
}

proto.getTimerId = function()
{
    return this._timerId;
}

/**
 * Returns whether effect is currently in run state
 */
proto.isRunned = function()
{
    return this._isRun;
}

/**
 * Change GUI callback
 */
proto.onChangeTime = function()
{
    this.timeElapsed += this.updateInterval;
    if (this.timeElapsed >= this.duration) {
        this.stop();
    }
}


/***
 * Sunset effect
 */
ns.SunsetEffect = function(logo, duration, initialTime)
{
    debug && console.log('SunsetEffect::constructor()');
    ns.SunsetEffect.superclass.constructor.call(this, logo, duration, initialTime, 'sunsetTimer');
}

extend(ns.SunsetEffect, ns.SunEffect);
var proto = ns.SunsetEffect.prototype;

/**
 * Sunset animation opacity delta (per updateInterval)
 */
proto._sunsetOpacityDelta = null;

/**
 * Sunset image current opacity value
 */
proto._sunsetOpacity = 0;

/**
 * Effect initialization
 */
proto.init = function()
{
    debug && console.log('SunsetEffect::init()');
    ns.SunsetEffect.superclass.init.call(this);
    this._sunsetOpacityDelta = this.updateInterval / this.duration;
    this._sunsetOpacity += (this.initialTime * this._sunsetOpacityDelta) / this.updateInterval;
}

/**
 * Change GUI callback
 */
proto.onChangeTime = function()
{
    debug && console.log('SunsetEffect::onChangeTime()');
    ns.SunsetEffect.superclass.onChangeTime.call(this);
    this._sunsetOpacity += this._sunsetOpacityDelta;
    if(this._sunsetOpacity > 0) {
        $('#logo-image').css('opacity', 0);
    } else {
        $('#logo-image').css('opacity', 1);
    }
    this.logo.css('opacity', this._sunsetOpacity);
}

/***
 * Sunrise effect
 */
ns.SunriseEffect = function(logo, duration, initialTime)
{
    debug && console.log('SunriseEffect::constructor()');
    ns.SunriseEffect.superclass.constructor.call(this, logo, duration, initialTime, 'sunriseTimer');
}

extend(ns.SunriseEffect, ns.SunEffect);
var proto = ns.SunriseEffect.prototype;

/**
 * Sunrise animation opacity delta (per updateInterval)
 */
proto._sunriseOpacityDelta = null;

/**
 * Sunset image current opacity value
 */
proto._sunsetOpacity = 1;

/**
 * Effect initialization
 */
proto.init = function()
{
    debug && console.log('SunriseEffect::init()');
    ns.SunriseEffect.superclass.init.call(this);
    this._sunriseOpacityDelta = - this.updateInterval / this.duration;
    this._sunsetOpacity += (this.initialTime * this._sunriseOpacityDelta) / this.updateInterval;
}

/**
 * Change GUI callback
 */
proto.onChangeTime = function()
{
    debug && console.log('SunriseEffect::onChangeTime()');
    ns.SunriseEffect.superclass.onChangeTime.call(this);
    this._sunsetOpacity += this._sunriseOpacityDelta;
    if(this._sunsetOpacity > 0) {
        $('#logo-image').css('opacity', 0);
    } else {
        $('#logo-image').css('opacity', 1);
    }
    this.logo.css('opacity', this._sunsetOpacity);
}

/**
 * Creating logo view
 */
$(document).ready(function() {
    if (jviba.features.sun.enabled) {
        debug && console.log('geolocation...');
        debug && console.log(jviba.geolocation);
        var logo = new jviba.Sunlogo(null, {location: jviba.geolocation});
        debug && console.log('sun fazes...');
        debug && console.log(logo.getModel().getFazes(
           jviba.geolocation[0],
           jviba.geolocation[1]
        ));
    }
});

})(jQuery);