/**
 * wbt.formstyler.js v1.0.2
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 *
 * Copyright 2012, WBTech
 * http://wbtech.pro/
 */
// TODO: separate basic styles and custom styles
// TODO: add tabindex and hotkeys
// TODO: input-file
// TODO: add custom templates
;(function($){
    var wbtFormStyler = {
        // Selects
        selectsRegisterEvents: function() {
            var openSelect = function ($this){
                if($this.hasClass("wbt-input-select__active")) {
                    $(".wbt-input-select").removeClass("wbt-input-select__active");
                } else {
                    $(".wbt-input-select").removeClass("wbt-input-select__active");
                    if (!$this.find('.wbt-input-select__styled').prop('disabled')){
                        $this.addClass("wbt-input-select__active");
                    }
                }
            };
            var changeSelect = function ($this){
                var $item = $this.closest(".wbt-input-select_item"),
                $select = $this.closest(".wbt-input-select"),
                $text = $select.find(".wbt-input-select_text");
                $item.siblings().removeClass("wbt-input-select_item__active").end().addClass("wbt-input-select_item__active");
                $select.find("option").prop("selected", false).eq($item.index()).prop("selected", true);
                $text.text($this.text());
                $select.find("select").trigger("change");//.focus();
            };
            $("body")
                .on("click", ".wbt-input-select", function(e){
                    wbtFormStyler.cfg.stopPropagation = true; 
                    e.preventDefault();
                    var $this = $(this);
                    openSelect($this);
                })
                .on("click", ".wbt-input-select_link", function(e){
                    wbtFormStyler.cfg.stopPropagation = true;
                    var $this = $(this);
                    changeSelect($this);
                })
                .on("click", function(e){
                    if(!wbtFormStyler.cfg.stopPropagation) {
                        $(".wbt-input-select").removeClass("wbt-input-select__active");
                    }
                    wbtFormStyler.cfg.stopPropagation = false;
                })
                .on("change", ".wbt-input-select__styled", function(){
                    $this = $(this);
                    $option = $this.find("option:selected");
                    $this.siblings(".wbt-input-select_options").find(".wbt-input-select_item").removeClass("wbt-input-select_item__active").eq($option.index()).addClass("wbt-input-select_item__active");
                    $this.parent().find(".wbt-input-select_text").text($option.text());
                });
                $(document).keydown(function(e) {
                    var code = (e.keyCode || e.which);
                    if (code === 32) {
                        if ($('.wbt-input-select:focus').length){
                            e.preventDefault();
                            $this = $('.wbt-input-select:focus');
                            openSelect($this);
                            $('.wbt-input-select_item__active').focus();
                        }
                        else {
                            if ($('.wbt-input-select_item:focus').length){
                                e.preventDefault();
                                changeSelect($('.wbt-input-select_item:focus'));
                                $this = $('.wbt-input-select').focus();
                                openSelect($this);
                            }
                        }
                    };
                    if (code === 9) {  
                        $this = $('.wbt-input-select');
                        if ($this.hasClass('wbt-input-select__active')){
                            changeSelect($('.wbt-input-select_item:focus'))
                            $this.focus();
                            openSelect($this);
                        }
                    };
                    if (code === 38 || code === 40) {
                        if ($('.wbt-input-select__active').length){
                            e.preventDefault();
                            activeSelect = $('.wbt-input-select_item:focus').length ? $('.wbt-input-select_item:focus') : $('.wbt-input-select_item').eq(0);
                            if (code === 38) {
                                activeSelect.prev().focus();
                            }
                            else {
                                activeSelect.next().focus();
                            }
                        }
                    };
                });

        },
        log10: function(arg) {  
            return Math.log(arg)/Math.log(10);  
        },
        selectsStyle: function($el) {
            $.each($el, function(index, el){
                var $el = $(el),
                    $elSelected = $el.find("option:selected"),
                    tempHTML = "",
                    resetOption,
                    defaultText = $elSelected.text();

                $el.wrap('<div class="wbt-input-select" tabindex="0" />').parent();//.addClass($el.data("class"));

                tempHTML = '<div class="wbt-input-select_options"><ul class="wbt-input-select_list">';
                $.each($el.find("option"), function(key, el) {
                    // Remove first option, use it as placeholder
                    if(key == 0 && $(el).attr("value") == "default") {
                        // If nothing selected
                        if(!$elSelected.length) {
                            defaultText = '<span class="wbt-input-select_default">' + $(el).text() + '</span>';
                        }
                        $(el).closest('.wbt-input-select').attr('data-default', $(el).text());
                        $(el).remove()
                    } else {
                        tempHTML += '<li tabindex="1" class="wbt-input-select_item' + (key == $elSelected.index() ? " wbt-input-select_item__active" : "") + '"><div class="wbt-input-select_link">' + $(el).text() + '</div>';
                    }
                });
                tempHTML += '</ul></div>';

                tempHTML =
                    '<div class="wbt-input-select_selected">' +
                        '<span class="wbt-input-select_text">' + defaultText + '</span>' +
                        '<span class="wbt-input-select_button"></span>' +
                        '</div>' + tempHTML;

                $el.before(tempHTML);
                

                // Set select to blank state if no options selected
                if(!$elSelected.length) {
                    $el.prop("selectedIndex", -1);
                }

                $el.addClass("wbt-input__styled wbt-input-select__styled").prop("tabindex", "-1");
            });
        },

        // Checkboxes
        checkboxesRegisterEvents: function() {
            //var _active_class = "wbt-input-checkbox__active";
            $("body")
                .on("click", ".wbt-input-checkbox", function(e){
                    e.preventDefault();
                    $(this).find(".wbt-input-checkbox__styled").click();
                })
                .on("click", ".wbt-input-checkbox__styled", function(e){
                    e.stopPropagation();
                    $(this).closest(".wbt-input-checkbox").toggleClass("wbt-input-checkbox__active");
                    //var wbt_input = $(this).closest(".wbt-input-checkbox");
                    //$(this).closest('.my-manager').find('.wbt-input-checkbox')
                    //.not(wbt_input[0]).removeClass(_active_class).find('input[type=checkbox]').attr('checked', false)
                    //wbt_input.toggleClass(_active_class);
                    //wbt_input.find('input[type=checkbox]').attr('checked', wbt_input.hasClass(_active_class));
                });
            $(document).keydown(function(e) {
                var code = (e.keyCode || e.which);
                if (code === 32) {
                    $this = $('.wbt-input-checkbox:focus')
                    if ($this.length){
                        e.preventDefault();
                        $this.find(".wbt-input-checkbox__styled").click();
                    }
                };
            });
        },
        checkboxesStyle: function($el) {
            $.each($el, function(index, el){
                var $el = $(el);
                $el
                    .wrap('<div tabindex="0" class="wbt-input-checkbox' + ($el.prop("checked") ? ' wbt-input-checkbox__active' : '') + '" />')
                    .before('<span class="wbt-input-checkbox_icon" />')
                    .addClass("wbt-input__styled wbt-input-checkbox__styled").prop('tabindex', '-1');
            });
        },

        // Radios
        radiosRegisterEvents: function() {
            $("body")
                .on("click", ".wbt-input-radio", function(e){
                    e.preventDefault();
                    $(this).find(".wbt-input-radio__styled").click();
                })
                .on("click", ".wbt-input-radio__styled", function(e){
                    e.stopPropagation();
                    var $this = $(this);
                    $this
                        .prop("checked", true)
                        .closest(".wbt-input-radio").addClass("wbt-input-radio__active");

                    $(".wbt-input-radio__styled").filter("[name='" + $this.prop("name") + "']").not($this)
                        .prop("checked", false)
                        .closest(".wbt-input-radio").removeClass("wbt-input-radio__active");
                });
            $(document).keydown(function(e) {
                var code = (e.keyCode || e.which);
                if (code === 32) {
                    $this = $('.wbt-input-radio:focus')
                    if ($this.length){
                        e.preventDefault();
                        $this.find(".wbt-input-radio__styled").click();
                    }
                };
            });
        },
        radiosStyle: function($el) {
            $.each($el, function(index, el){
                var $el = $(el);
                $el
                    .wrap('<div tabindex="0" class="wbt-input-radio' + ($el.prop("checked") ? ' wbt-input-radio__active' : '') + '" />')
                    .before('<span class="wbt-input-radio_icon" />')
                    .addClass("wbt-input__styled wbt-input-radio__styled").prop('tabindex', -1);
            });
        },

        // Ranges
        rangesRegisterEvents: function() {
            $("body")
                .on("mousedown touchstart", ".wbt-input-range_track", function(e){
                    var $this = $(this),
                        closestHandle = 2,
                        minDistance;

                    wbtFormStyler.ranges.pointerPressed = true;
                    wbtFormStyler.ranges.currentInstance = $this.closest(".wbt-input-range").data("wbtFormStyler.rangeInstance");

                    // Find closest handle
                    $.each(wbtFormStyler.ranges.currentInstance.$handles, function(index, el) {
                        var distance = Math.abs(parseInt($(el).position().left) - e.offsetX);
                        if(!minDistance) {
                            minDistance = distance;
                            closestHandle = index;
                        }
                        if(distance < minDistance) {
                            minDistance = distance;
                            closestHandle = index;
                        }
                    });

                    wbtFormStyler.ranges.currentInstance.activeHandle = closestHandle;
                    wbtFormStyler.rangesSetPosition(e.pageX);
                })
                .on("mousedown touchstart", ".wbt-input-range_handle", function(e){
                    e.preventDefault();
                    e.stopPropagation();
                    var $this = $(this);
                    wbtFormStyler.ranges.pointerPressed = true;
                    wbtFormStyler.ranges.currentInstance = $this.closest(".wbt-input-range").data("wbtFormStyler.rangeInstance");
                    wbtFormStyler.ranges.currentInstance.activeHandle = wbtFormStyler.ranges.currentInstance.$handles.index($(this));
                })
                .on("mouseup mouseleave touchend", function(e){
                    if(wbtFormStyler.ranges.pointerPressed) {
                    wbtFormStyler.ranges.pointerPressed = false;
                        wbtFormStyler.ranges.currentInstance.$inputs.eq(wbtFormStyler.ranges.currentInstance.activeHandle).change();
                        wbtFormStyler.ranges.currentInstance.$inputs.eq(wbtFormStyler.ranges.currentInstance.activeHandle).siblings('.wbt-input__styled').change();
                    }
                })
                .on("mousemove touchmove", function(e){
                    if(wbtFormStyler.ranges.pointerPressed) {
                        if(e.type == 'touchmove'){ 
                            e = window.event;
                            wbtFormStyler.rangesSetPosition(e.touches[0].pageX);
                        }else{
                            wbtFormStyler.rangesSetPosition(e.pageX);
                        }
                    }
                })
                .on("change", ".wbt-input-range__styled", function(){
                    var $this = $(this),
                        index,
                        newVal;
                    wbtFormStyler.ranges.currentInstance = $this.closest(".wbt-input-range").data("wbtFormStyler.rangeInstance");
                    index = $this.closest(".wbt-input-range").find(".wbt-input-range__styled").index($this);
                    newVal = wbtFormStyler.log10(wbtFormStyler.ranges.currentInstance.$inputs.eq(index).val());
                    wbtFormStyler.ranges.currentInstance.$texts.eq(index).text(wbtFormStyler.handlePrice(Math.round(Math.pow(10, newVal))));
                    wbtFormStyler.ranges.currentInstance.activeHandle = index;
                    wbtFormStyler.rangesSetPositionByValue(newVal);
                })
                .on("change", ".wbt-input-range_text", function(){
                    var $this = $(this),
                        index,
                        newVal;
                    wbtFormStyler.ranges.currentInstance = $this.closest(".wbt-input-range").data("wbtFormStyler.rangeInstance");
                    index = $this.closest(".wbt-input-range").find(".wbt-input-range_text").index($this);
                        newVal = wbtFormStyler.ranges.currentInstance.$texts.eq(index).text();

                    wbtFormStyler.ranges.currentInstance.activeHandle = index;
                    wbtFormStyler.rangesSetPositionByValue(wbtFormStyler.log10(newVal.replace(/[^\d.]/g, "")));
                });

            var timeout;
            $(window).on("resize", function(){
                // Update slider on resize
                clearTimeout(timeout);
                timeout = setTimeout(wbtFormStyler.rangesUpdateState, 100);
            });
        },

        handlePrice : function(price) {
        var x = (price+'').split('.');
        var x1 = x[0];
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) x1 = x1.replace(rgx, '$1 $2');
        return x1;
        },
        rangesUpdateState: function(){
            $(".wbt-input-range").each(function(){
                var $this = $(this),
                    instance = $this.data("wbtFormStyler.rangeInstance");

                instance.offset = (instance.$el.offset().left);
                instance.width =  (instance.$track.width());
                instance.ticks = ((instance.max - instance.min + instance.step) / instance.step);
                instance.ticksWidth =  (instance.width / (instance.ticks - 1));

                $this.data("wbtFormStyler.rangeInstance", instance);
            });
        },

        rangesSetPositionByValue: function(value, comparePermit) {
            var tickPosition = (value - wbtFormStyler.ranges.currentInstance.min) * wbtFormStyler.ranges.currentInstance.ticksWidth / wbtFormStyler.ranges.currentInstance.step + wbtFormStyler.ranges.currentInstance.offset;
            wbtFormStyler.rangesSetPosition(tickPosition, comparePermit);
        },



        rangesSetPosition: function(position, comparePermit) {
            var tickIndex,
                tickValue,
                tickPercent,
                tickPercentInvert;
            if (comparePermit == undefined) {
                comparePermit = true
            }
            regularSetPosition = function () {
                // Set form input and label values
                wbtFormStyler.ranges.currentInstance.$inputs.eq(wbtFormStyler.ranges.currentInstance.activeHandle).val(Math.round(Math.pow(10,tickValue)));
                wbtFormStyler.ranges.currentInstance.$texts.eq(wbtFormStyler.ranges.currentInstance.activeHandle).text(wbtFormStyler.handlePrice(Math.round(Math.pow(10,tickValue))));
                // Set handle position
                wbtFormStyler.ranges.currentInstance.$handles.eq(wbtFormStyler.ranges.currentInstance.activeHandle).css("left", tickPercent);
                // Set mid-handle selection position
                if(wbtFormStyler.ranges.currentInstance.$handles.length == 1) {
                    wbtFormStyler.ranges.currentInstance.$selection.css("right", tickPercentInvert);
                } else {
                    if(wbtFormStyler.ranges.currentInstance.$handles.eq(wbtFormStyler.ranges.currentInstance.activeHandle).hasClass("wbt-input-range_handle-second")) {
                        wbtFormStyler.ranges.currentInstance.$selection.css("right", tickPercentInvert);
                    } else {
                        wbtFormStyler.ranges.currentInstance.$selection.css("left", tickPercent);
                    }
                }
            };

            differenceSetPosition = function ($numHandle) {
                $secondHandle = $numHandle == 0 ? 1 : 0;
                 // Set form input and label values
                wbtFormStyler.ranges.currentInstance.$inputs.eq(wbtFormStyler.ranges.currentInstance.activeHandle).val(Math.round(Math.pow(10,tickValue)));
                if (comparePermit)
                    wbtFormStyler.ranges.currentInstance.$inputs.eq($secondHandle).val(Math.round(Math.pow(10,tickValue)));
                    $comparePermit = true

                wbtFormStyler.ranges.currentInstance.$texts.eq(wbtFormStyler.ranges.currentInstance.activeHandle).text(wbtFormStyler.handlePrice(Math.round(Math.pow(10,tickValue))));
                wbtFormStyler.ranges.currentInstance.$texts.eq($secondHandle).text(wbtFormStyler.handlePrice(Math.round(Math.pow(10,tickValue))));
                // Set handle position
                wbtFormStyler.ranges.currentInstance.$handles.eq(wbtFormStyler.ranges.currentInstance.activeHandle).css("left", tickPercent);
                wbtFormStyler.ranges.currentInstance.$handles.eq($secondHandle).css("left", tickPercent);
                // Set mid-handle selection position
                wbtFormStyler.ranges.currentInstance.$selection.css("right", tickPercentInvert);
                wbtFormStyler.ranges.currentInstance.$selection.css("left", tickPercent);
            };

            
            tickIndex = Math.round((position - wbtFormStyler.ranges.currentInstance.offset) / wbtFormStyler.ranges.currentInstance.ticksWidth);
            tickValue = tickIndex * wbtFormStyler.ranges.currentInstance.step + wbtFormStyler.ranges.currentInstance.min;

            if(tickValue > wbtFormStyler.ranges.currentInstance.max) {
                tickValue = wbtFormStyler.ranges.currentInstance.max
            }
            if(tickValue < wbtFormStyler.ranges.currentInstance.min) {
                tickValue = wbtFormStyler.ranges.currentInstance.min
            }

            tickPercent = (tickValue - wbtFormStyler.ranges.currentInstance.min) / (wbtFormStyler.ranges.currentInstance.max - wbtFormStyler.ranges.currentInstance.min) * 100 + "%";
            tickPercentInvert = (1 - (tickValue - wbtFormStyler.ranges.currentInstance.min) / (wbtFormStyler.ranges.currentInstance.max - wbtFormStyler.ranges.currentInstance.min)) * 100 + "%";

            // Hack to allow non-valid range values (i.e. non equal to range set by min + N*step)
            //wbtFormStyler.ranges.currentInstance.$inputs.eq(wbtFormStyler.ranges.currentInstance.activeHandle).prop("step", tickValue - wbtFormStyler.ranges.currentInstance.min);
            
            if (wbtFormStyler.ranges.currentInstance.activeHandle==0){
                if (tickValue>wbtFormStyler.log10(wbtFormStyler.ranges.currentInstance.$inputs.eq(wbtFormStyler.ranges.currentInstance.activeHandle).siblings('.wbt-input__styled').val())){
                    differenceSetPosition(wbtFormStyler.ranges.currentInstance.activeHandle);
                }else {
                    regularSetPosition();
                }
            }
            else {
                if (tickValue<wbtFormStyler.log10(wbtFormStyler.ranges.currentInstance.$inputs.eq(wbtFormStyler.ranges.currentInstance.activeHandle).siblings('.wbt-input__styled').val())){
                   differenceSetPosition(wbtFormStyler.ranges.currentInstance.activeHandle);
                }else {
                    regularSetPosition();
                }}
        },
        rangesInitInstance: function($el) {
            var newInstance = {};
            // Cache instance state
            newInstance.$el = $el;
            newInstance.$track = $el.find(".wbt-input-range_track");
            newInstance.$selection = $el.find(".wbt-input-range_selection");
            newInstance.$handles = $el.find(".wbt-input-range_handle");
            newInstance.$texts = $el.find(".wbt-input-range_text");
            newInstance.$inputs = $el.find(".wbt-input-range__styled");
            newInstance.min = parseFloat(newInstance.$inputs.eq(0).data("wbt-min")) < 10000 ? wbtFormStyler.log10(10000) : wbtFormStyler.log10(parseFloat(newInstance.$inputs.eq(0).data("wbt-min")));
            newInstance.max = wbtFormStyler.log10(parseFloat(newInstance.$inputs.eq(0).data("wbt-max"))) || 10000;
            newInstance.step = wbtFormStyler.log10(parseFloat(newInstance.$inputs.eq(0).data("wbt-step")));
            newInstance.units = newInstance.$inputs.eq(0).data("wbt-units") || "";
            newInstance.offset = (newInstance.$el.offset().left);
            newInstance.width = (newInstance.$track.width());
            newInstance.ticks = (newInstance.max - newInstance.min + newInstance.step) / newInstance.step;

            if(newInstance.ticks > 1) {
                newInstance.ticksWidth = (newInstance.width / (newInstance.ticks - 1));
            } else {
                newInstance.ticksWidth = 1;
            }

            // Set initial state
            wbtFormStyler.ranges.currentInstance = newInstance;
            $.each(newInstance.$handles, function(index, el) {
                var $comparePermit;
                wbtFormStyler.ranges.currentInstance.activeHandle = index;
                if (index==0){
                    $startPosition = newInstance.$inputs.eq(index).val() || newInstance.min;
                    if (newInstance.$inputs.eq(index).val().length){
                        $startPosition = wbtFormStyler.log10(newInstance.$inputs.eq(index).val())
                    }
                    $comparePermit = false
                }
                else{
                    $startPosition = newInstance.$inputs.eq(index).val() || newInstance.max;
                    if (newInstance.$inputs.eq(index).val().length){
                        $startPosition = wbtFormStyler.log10(newInstance.$inputs.eq(index).val())
                    }
                    $comparePermit = true
                }
                wbtFormStyler.rangesSetPositionByValue($startPosition, $comparePermit);
            });

            // Add text input labels
            newInstance.$texts.eq(0)
                .before($("<span>", {
                    'class': "wbt-input-range_label",
                    'text': ""
                }))
                .after($("<span>", {
                    'class': "wbt-input-range_label",
                    'text': newInstance.units
                }));
            if(newInstance.$texts.length == 2) {
                newInstance.$texts.eq(1)
                    .before($("<span>", {
                        'class': "wbt-input-range_label",
                        'text': ""
                    }))
                    .after($("<span>", {
                        'class': "wbt-input-range_label",
                        'text': newInstance.units
                    }));
            }

            // Store instance data in wrapper data
            newInstance.$el.data("wbtFormStyler.rangeInstance", newInstance);
        },
        rangesStyle: function($el) {
            // Sort inputs in groups according to name attribute
            var groups = {};
            $.each($el, function(index, el){
                var $el = $(el),
                    name = $el.data("name").slice(3);
                if(!groups[name]) {
                    groups[name] = $();
                }
                groups[name] = groups[name].add($el);
            });

            $.each(groups, function(index, $el){
                // Hide unstyled inputs
                $el.addClass("wbt-input__styled wbt-input-range__styled");

                // Add markup
                $el.eq(0)
                    .wrap('<div class="wbt-input-range" />')
                    .before(
                        '<div class="wbt-input-range_text-wrap wbt-input-range_text-wrap-first"><span class="wbt-input-range_text wbt-input-range_text-first">' +  $el.eq(0).text() + '"</span></div>' +
                        ($el.length > 1 ? '<div class="wbt-input-range_text-wrap wbt-input-range_text-wrap-second"><span class="wbt-input-range_text wbt-input-range_text-second">' +  $el.eq(1).text() + '</span></div>' : '') +
                        '<div class="wbt-input-range_track">' +
                        '<div class="wbt-input-range_selection"></div>' +
                        '<span class="wbt-input-range_handle wbt-input-range_handle-first"></span>' +
                        ($el.length > 1 ? '<span class="wbt-input-range_handle wbt-input-range_handle-second"></span>' : '') +
                        '</div>');

                // Move second input (if any) near first
                if($el.length > 1) {
                    $el.eq(1).insertAfter($el.eq(0));
                }

                // Initialize and store object in data attribute of wrapper
                wbtFormStyler.rangesInitInstance($el.parent(".wbt-input-range"));
            });
        },

        defaults: {
            watchDOMChanges: true
        }
    };

    $.fn.wbtFormStyler = function(params){
        // Init plugin on first run
        if(!wbtFormStyler.cfg) {
            wbtFormStyler.cfg = {};
            $.extend(wbtFormStyler.cfg, wbtFormStyler.defaults, params);

            wbtFormStyler.ranges = {};

            if(wbtFormStyler.cfg.watchDOMChanges) {
                var query = this;
                $(document).on("wbtdomchange", function(){
                    $(query.selector).wbtFormStyler();
                });
            }
            // Register event handlers
            wbtFormStyler.selectsRegisterEvents();
            wbtFormStyler.checkboxesRegisterEvents();
            wbtFormStyler.radiosRegisterEvents();
            wbtFormStyler.rangesRegisterEvents();
        }

        // Style uninitialized inputs
        var filtered = this.filter(":not(.wbt-input__styled)");
        // Style them
        wbtFormStyler.selectsStyle(filtered.filter("select"));
        wbtFormStyler.checkboxesStyle(filtered.filter("input[type=checkbox]"));
        wbtFormStyler.radiosStyle(filtered.filter("input[type=radio]"));
        wbtFormStyler.rangesStyle(filtered.filter("input[type=wbtrange]"));
        return this;
    };
})(jQuery);