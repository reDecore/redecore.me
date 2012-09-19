App =
{
    init: function()
    {
        $(document).click(function()
        {
            $('div.sysPopupAlert').dialog('destroy').remove();
        });
    },
    
    alert: function(text, delay)
    {
        delay = delay || 1500;

        var div = $('<div class="sysPopupAlert" />');
        
        $('body').append(div.html(text));
        
        div.dialog({
            title: 'Сообщение',
            height: 140,
            resizable: false,
            width: 'auto',
            show: 'show'
        });

        div.dialog('widget').delay(delay).fadeOut(400, function()
        {
            div.dialog('destroy').remove();
        });
    },

    // обертка
    jGrowl: function(title, text) {
        $.jGrowl.defaults.closer = false;

        $.jGrowl(text, {position: 'bottom-right', sticky: false, life: 5000, header: title});
    },
    
    existDialog: function(selector, options)
    {
        selector = $(selector);

        selector.dialog($.extend({
            hide: 'slow',
            modal: true,
            resizable: false,
            width: 530,
            hide: null,
            show: null,
            position: ['center', 100],
            autoOpen: false,
            dialogClass: 'sysDialog',
            close: function(event, ui) {
                $(this).remove();
            }
        }, options));

        var widget = selector.dialog('widget').css('position', 'fixed');

        selector.dialog("open");
    },
    
    ajaxDialogLoading : false,
    ajaxDialog: function(url, options)
    {
    	if (App.ajaxDialogLoading) return false;
    	App.ajaxDialogLoading = true;
    	
        //wtf?
    	//App.dialogHandlers.postAjaxLoaded = null;
    	App.dialogHandlers.postAjaxLoadedStack = [];
    	
    	var id = options && options.id ? options.id : "sysAjaxDialog_" + $time().toString().substr(5) + parseInt(Math.random() * (99999999 - 11111111) + 11111111);
        $('<div id="' + id + '"></div>').load(url, function(data) {
            App.existDialog(this, options);
            if (App.dialogHandlers.postAjaxLoaded) App.dialogHandlers.postAjaxLoaded.call(this);
            if (App.dialogHandlers.postAjaxLoadedStack) {
            	for (var i=0; i<App.dialogHandlers.postAjaxLoadedStack.length; i++) {
            		App.dialogHandlers.postAjaxLoadedStack[i].call(this);
            	}
            }
            
            App.ajaxDialogLoading = false;
        });
    },
    
    // обработчики для диалогов
    dialogHandlers: {postAjaxLoaded: null, postAjaxLoadedStack: []},
    
    ping: function(interval)
    {
        setTimeout(function()
        {
            $.get('/index/ping');
            
            App.ping(interval);
        }, (interval * 1000));
    },
    
    showMessages: function(data, options)
    {
        options = options || {};
    	if (data.redirect) return location.href = options.redirect ? options.redirect : data.redirect;
    	
        if (!data || typeof(data.msg) == 'undefined' || !data.msg) return;
        
    	$(".sysFormFieldError").hide();
        for (var i=0; i<data.msg.length; i++) {
        	if (data.msg[i].type == "field-error") {
        		$(".sysFormFieldError_"+data.msg[i].field).show().html('<span class="error-field">' + data.msg[i].text + '</span><br/>');
        	} else App.alert(data.msg[i].text);
        }
    },

    // для добавления функций на странице
    // ex: App.local.someFunct: function(data) { }
    local: {},

    // обработчики сообщений от realplexor
    cometHandlers: {},
    
    _: function(id) {
        if (typeof(l10n_messages) == 'undefined' || typeof(l10n_messages[id]) == 'undefined') return id;
        var a = 'MSG_TEST';
        return l10n_messages[id];
    },
    
    menu : {
    	namespace : '',
    	
    	init : function(namespace)
    	{
    		if (namespace) App.menu.namespace = namespace;
    		
    		$('ul#my-menu ul').each(function(i) { // Check each submenu:
    			if ($.cookie(App.menu.namespace + 'submenuMark-' + i)) {  // If index of submenu is marked in cookies:
    				$(this).show().prev().removeClass('collapsed').addClass('expanded'); // Show it (add apropriate classes)
    			}else {
    				$(this).hide().prev().removeClass('expanded').addClass('collapsed'); // Hide it
    			}
    			$(this).prev().addClass('collapsible').click(function() { // Attach an event listener
    				var this_i = $('ul#my-menu ul').index($(this).next()); // The index of the submenu of the clicked link
    				if ($(this).next().css('display') == 'none') {

    					// When opening one submenu, we hide all same level submenus:
    					$(this).parent('li').parent('ul').find('ul').each(function(j) {
    						if (j != this_i) {
    							$(this).slideUp(200, function () {
    								$(this).prev().removeClass('expanded').addClass('collapsed');
    								App.menu.cookieDel($('ul#my-menu ul').index($(this)));
    							});
    						}
    					});
    					// :end

    					$(this).next().slideDown(200, function () { // Show submenu:
    						$(this).prev().removeClass('collapsed').addClass('expanded');
    						App.menu.cookieSet(this_i);
    					});
    				}else {
    					$(this).next().slideUp(200, function () { // Hide submenu:
    						$(this).prev().removeClass('expanded').addClass('collapsed');
    						App.menu.cookieDel(this_i);
    						$(this).find('ul').each(function() {
    							$(this).hide(0, App.menu.cookieDel($('ul#my-menu ul').index($(this)))).prev().removeClass('expanded').addClass('collapsed');
    						});
    					});
    				}
    			return false; // Prohibit the browser to follow the link address
    			});
    		});    		
    	},
    	
    	cookieSet : function (index) {
    		$.cookie(App.menu.namespace + 'submenuMark-' + index, 'opened', {expires: null, path: '/'}); // Set mark to cookie (submenu is shown):
    	},
    	
    	cookieDel : function (index) {
    		$.cookie(App.menu.namespace + 'submenuMark-' + index, null, {expires: null, path: '/'}); // Delete mark from cookie (submenu is hidden):
    	}
    }, 
    
    initTinyMce : function(opts)
    {
    	var _opts = $.extend({	
    		mode : "textareas",
    		theme : "advanced",
    		plugins : "paste",
    		skin : "default",
    		language : "ru",
    		force_br_newlines : true,
    		force_p_newlines : false,
    		forced_root_block : '',		
    		theme_advanced_buttons1 : "bold,italic,underline,|,bullist,numlist,|,link,unlink,image,|,code,|,undo,redo,|,outdent,indent,|,hr,removeformat,visualaid",
    		theme_advanced_buttons2 : "",
    		theme_advanced_buttons3 : "",
    		theme_advanced_toolbar_location : "top",
    		theme_advanced_toolbar_align : "left",
    		theme_advanced_statusbar_location : "bottom",
    		theme_advanced_resizing : true,		
    		theme_advanced_resize_horizontal : false,
    		//theme_advanced_source_editor_width : 617,
    		//theme_advanced_source_editor_height : 600,
    		//theme_advanced_resizing_max_height : 2048,
    		//auto_reset_designmode : true,

    		//valid_elements : 'p,br,u,ul,ol,li,strong,b,i,img[src|title|alt|width|height],a[href|title|alt|target],blockquote,span,div',
            
            extended_valid_elements: 'style',
    		paste_auto_cleanup_on_paste : true,
    		paste_convert_headers_to_strong : false,
    		fix_list_elements : true,
    		paste_remove_spans : true,
    		
    		convert_urls : false,
    		content_css : "/css/tiny.css"
    	}, opts || {});
    	
    	tinyMCE.init(_opts);
    },

    currentUser : {
    	id:0
    },
    
    toIntArray : function (obj)
    {
    	var a = [];
    	for (var i in obj) a.push(parseInt(obj[i]));
    	return a;
    },
    
    plural : function (number, plurals, echoZero)
    {
        if (number == 0 && echoZero) {
        	if (typeof(echoZero) == 'string') {
        		return echoZero;
        	}
            string = plurals[2];
            number = 'нет';
        } else {
            plural = (number % 10 == 1 && number % 100 != 11 ? 0 : (number % 10 >= 2 && number % 10 <= 4 && (number % 100 < 10 || number % 100 >= 20) ? 1 : 2));
            switch(plural) {
                case 0:
                default:
                    string = plurals[0];
                    break;
                case 1:
                    string = plurals[1];
                    break;
                case 2:
                    string = plurals[2];
                    break;
            }                  
        }

        return sprintf(string, number);
    },
    
    isUrl : function (s) {
    	var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/
    	return regexp.test(s);
    },
    
    nextPageLoader : {
    	proceed: false,
    	options: null,
    	container: null,
    	lastPage: false,
    	suspend: false,
        items: 0,

    	init : function(options) {
            var _self = App.nextPageLoader, _options = null;

    		App.nextPageLoader.options = _options = $.extend({
                'loading': '.sysNextPageLoading',
                'maxItems': 10000,
                'more': '.sysNextPageMore'
            }, options || {});

    		_self.container = $(options.container);
            _self.items = _options.count;

    		if (typeof(_options.offset) == "undefined") _options.offset = 0;
    		if (typeof(_options.page) == "undefined") _options.page = 1;
    		
    		if (!options.noAuto) {
    			_self.onScroll();
    			$(window).scroll(_self.onScroll);
    		}
    	},
    	
    	onScroll: function() {
            var _self = App.nextPageLoader, _options = _self.options;

	        var bottomPosition = _options.bottomPosition
                ? $(_options.bottomPosition).offset().top / 2
                : (_self.container.offset().top + _self.container.outerHeight()) / 2;
	        var currPosition   = ($(window).scrollTop() + $(window).height());

	        if (currPosition >= bottomPosition) {
	        	_self.loadNextPage();
	        }
    	},
    	
    	loadNextPage: function() {
            var _self = App.nextPageLoader, _options = _self.options;

    		if (_self.proceed || _self.lastPage || _self.suspend) return false;

            if (_options.more_url && _options.more && _self.items >= _options.maxItems) {
                //$(_options.more).show();
                $(_options.more + " [href]").attr("href", _options.more_url);
                return false;
            }

    		_self.proceed = true;
            if (_options.loading) $(_options.loading).show();
    		
    		_options.offset += _options.page > 1 ? _options.perPage : _options.count;
            _self.items += _options.perPage;
    		_options.page += 1;

    		$.postJSON(encodeURI(_options.url), {"perPage":_options.perPage, "offset": _options.offset, "page": _options.page, "params": _options.postParams}, function(data){
    			if (_options.onLoad) _options.onLoad.call(this, data);
    			else {
    				if (data.html) {
                        // hack for empty html (only \n example)
                        data.html = $(data.html + '<script type="text/javascript"></script>');
    					_self.container.append(data.html);
    	    			if (_options.afterAppend) _options.afterAppend.call(this, data);
    				}
    				_self.lastPage = data.lastPage;
    			}

                if (_options.loading) $(_options.loading).hide();
    			_self.proceed = false;
    		});
    	},

        loadNewest: function(count) {
            var _self = App.nextPageLoader, _options = _self.options;

            if (_self.proceed) return false;
            _self.proceed = true;

            $.postJSON(_options.url, {"newest": count || true, "perPage":_options.perPage, "offset": _options.offset, "page": _options.page, "params": _options.postParams}, function(data){
                if (data.html) {
                    data.html = $(data.html);
                    _self.container.prepend(data.html);
                    if (_options.afterPrepend) _options.afterPrepend.call(this, data);
                }

                _options.offset += data.count;
                _options.postParams = $.extend(_options.postParams, data.postParams || {});

                _self.proceed = false;
            });
        }
    },

    tabledList : {
        init: function(container)
        {
            $(container).masonry({
                itemSelector: 'div.pin',
                gutterWidth: 10,
                isAnimated: false,
                isFitWidth: $(container).hasClass('center')
            });

            App.tabledList.checkHeight(container, $(container).find('div.pin'));
        },
        append: function(container, items)
        {
            $(container).masonry('appended', items);
            App.tabledList.checkHeight(container, items);
        },
        prepend: function(container, items)
        {
            $(container).masonry('reload');
            App.tabledList.checkHeight(container, items);
        },
        checkHeight: function(container, items)
        {
            items.filter('div.pin').each(function()
            {
                var pin = $(this);

                var pinHeight = pin.height();

                function checkSize()
                {
                    var currHeight = pin.height();

                    if (pinHeight != currHeight) {
                        $(container).masonry('reload', function(){
                            pinHeight = currHeight;
                            setTimeout(checkSize, 50);
                        });
                    } else {
                        setTimeout(checkSize, 100);
                    }
                }

                checkSize();
            });
        }
    },

    smiles: {
        _input: null,
        _btn: null,
        _openClick: false,

        toggle: function(btn, input)
        {
            if (!input) return false;
            
            var pos = $(btn).offset();
            $("#sysSmilesPopup").css({top: pos.top-$("#sysSmilesPopup").height() - 23, left: pos.left});
            $("#sysSmilesPopup").toggle();

            App.smiles._btn = btn;
            App.smiles._input = input;

            if ($(btn).hasClass("SmileOpen")) {
                $(btn).removeClass("SmileOpen");
                $(document).unbind('click', App.smiles._documentClick);
            } else {
                $(btn).addClass("SmileOpen");
                App.smiles._openClick = true;
                $(document).bind('click', App.smiles._documentClick);
            }
        },

        _documentClick: function() {
            if (!App.smiles._openClick) App.smiles.toggle(App.smiles._btn, App.smiles._input);
            App.smiles._openClick = false;
        },

        insert: function(item)
        {
            if (App.smiles._input) {
                var posStart = App.smiles._input.caret().start;
                var val = App.smiles._input.val();
                val = val.substring(0, posStart) + $(item).attr("alt") + " " + val.substring(posStart);
                App.smiles._input.val(val);
                App.smiles._input.focus();

                posStart += $(item).attr("alt").toString().length + 1;
                App.smiles._input.caret({start:posStart, end:posStart});
            }
            App.smiles.toggle(App.smiles._btn, App.smiles._input);
        }
    },

    scrollPopup: {
        open: function(options) {
            $("#spopup").remove();
            $("BODY").addClass("spopup_noscroll").append('<div id="spopup" style="display: none"><div class="center"><div class="obj"></div></div></div>');

            options = $.extend({'width': 400}, options || {});
            $("#spopup DIV.obj").css({"width": options.width + "px", "margin-left": "-" + (options.width / 2) + "px"}).html(options.html);
            if (options.html) $("#spopup DIV.obj").html(options.html);
            $("#spopup").show();
        },

        close: function() {
            $("#spopup").remove();
            $("BODY").removeClass("spopup_noscroll");
        }
    }
};

$(document).ready(App.init);

if (typeof jQuery.datepicker !== 'undefined') {
    jQuery.datepicker.setDefaults({
        closeText: 'Закрыть',
        prevText: '&#x3c;Пред',
        nextText: 'След&#x3e;',
        currentText: 'Сегодня',
        monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь',
        'Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
        monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн',
        'Июл','Авг','Сен','Окт','Ноя','Дек'],
        dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
        dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
        dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
        firstDay: 1,
        isRTL: false
    });
}

$.postJSON = function(url, params, callback, options)
{
    $.post(url, params, function(data) {
    	callback = callback || function() {};    	
    	App.showMessages(data, options);
    	callback(data);
    }, "json");
};

$.ourGetJSON = function(url, params, callback) 
{
    $.get(url, params, function(data) {
    	callback = callback || function() {};    	
    	App.showMessages(data);    	
    	callback(data);
    }, "json");
};

$.fn.reloadImg = function()
{
    var url = $(this).attr('src').toString();
    
	url = url.replace(/[?&]nocache=.*?(&|$)/g,"$1");
	if(url.indexOf("?")!=-1) url = url+"&";
	else url = url+"?";

	$(this).attr('src',url + "nocache=" + new Date());
}

$.fn.postForm = function(callback, params, serializeParams, options)
{
    formData = $(this).serializeArray();
    if (params) {
        for (idx in params) formData.push({"name": idx, "value": params[idx]});
    }
    
    if (serializeParams) {
        for (idx in serializeParams) formData.push(serializeParams[idx]);
    }
    
	$.postJSON($(this).attr('action'), formData, callback, options);
}

$.fn.htmlPostForm = function(container, callback, params, serializeParams)
{
    formData = $(this).serializeForm(params, serializeParams);
    
	$(container).load($(this).attr('action'), formData, function(data) {
    	callback = callback || function() {};    	
    	callback(data);
	});
	
	return false;
}

$.fn.serializeForm = function(params, serializeParams)
{
    formData = $(this).serializeArray();
    if (params) {
        for (idx in params) formData.push({"name": idx, "value": params[idx]});
    }
    
    if (serializeParams) {
        for (idx in serializeParams) formData.push(serializeParams[idx]);
    }
    
    return formData;
}

$.fn.serializeHash = function()
{
    var p = this.serializeArray(), result = {};
    for (var i=0; i<p.length; i++) {
        result[p[i].name] = p[i].value;
    }
    return result;
};

$.fn.applyParams = function(actionurl)
{
    var params    = jQuery.queryString();
    var paramsNew = this.serializeHash();
    for (var i in paramsNew) {
        if (paramsNew[i] == '') {
            delete params[i];
        } else {
            params[i] = paramsNew[i];
        }
    }
    if (typeof actionurl === 'undefined' || actionurl == '') {
        location.search = '?' + jQuery.queryString(params);
    } else {
        var trim = function(str, charlist) {
            charlist = !charlist ? ' \s\xA0' : charlist.replace(/([\[\]\(\)\.\?\/\*\{\}\+\$\^\:])/g, '\$1');
            var re = new RegExp('^[' + charlist + ']+|[' + charlist + ']+$', 'g');
            return str.replace(re, '');
        };
        var path = '';
        for (var i in params) {
            path += i + '/'+ encodeURI(params[i]) + '/';
        }

        location.href = '/' + trim(actionurl, '/') + '/' + path;
    }
};

$.fn.charCount = function(options){
    // default configuration properties
    var defaults = {
        allowed: 140,
        warning: 25,
        css: 'counter',
        counterElement: 'span',
        cssWarning: 'warning',
        cssExceeded: 'exceeded',
        counterText: ''
    };

    var options = jQuery.extend(defaults, options);


    function calculate(obj){
        var count = $(obj).val().length;
        var available = options.allowed - count;
        if(available <= options.warning && available >= 0){
            $(obj).next().addClass(options.cssWarning);
        } else {
            $(obj).next().removeClass(options.cssWarning);
        }
        if(available < 0){
            $(obj).next().addClass(options.cssExceeded);
        } else {
            $(obj).next().removeClass(options.cssExceeded);
        }
        $(obj).next().html(options.counterText + available);
    };


        $(this).after('<'+ options.counterElement +' class="' + options.css + '">'+ options.counterText +'</'+ options.counterElement +'>');
        calculate(this);
        $(this).keyup(function(){calculate(this)});
        $(this).change(function(){calculate(this)});
};

$.fn.emptyVal = function(options)
{
	var input = $(this);

	if (input.attr("inited") == 'inited') return input;
	input.attr("inited", "inited");
	
    options = $.extend({
    	text: "Enter the text",
    	color: "#999999"
    }, options);

    if (input.attr("empty_text")) options.text = input.attr("empty_text");

	if (input.attr("is_empty") == "yes") {
		input.val(options.text);
		input.css({"color": options.color});
        if (options.disableSubmit) input.closest('FORM').find('[type="submit"]').attr("disabled", "disabled");
	}

    var onChange = function() {
    	if (!$.trim(input.val())) {
            input.attr("is_empty", "yes");
            if (options.disableSubmit) input.closest('FORM').find('[type="submit"]').attr("disabled", "disabled");
        } else {
            input.attr("is_empty", "no");
            if (options.disableSubmit) input.closest('FORM').find('[type="submit"]').attr("disabled", null);
        }
    };

    input.keyup(onChange); input.change(onChange);
    
    input.focus(function() {
    	if (input.attr("is_empty") == "yes") {
    		input.val("");
    		input.css({"color": "#000000"});
    	}
    });

    input.blur(function() {
    	if (input.attr("is_empty") == "yes") {
    		input.val(options.text);
    		input.css({"color": options.color});
    	}
    });
    
    input.closest('FORM').submit(function(){
        if (input.attr("is_empty") == "yes") {
        	input.focus();
            return false;
        };

        if (options.formSubmit) return options.formSubmit.call(this);
        return true;
    });
    
    return input;
};


function getGets(name, full, sGets)
{
	var sGets = typeof sGets != "undefined" ? sGets : document.location.toString().split("#",2)[0].split("?",2)[1];
	if(typeof sGets == "undefined") sGets = '';

	if(name) {
		var aGets = sGets.split("&");
		for(var i=0; i<aGets.length; i++) {
			var aGet = aGets[i].split("=",2);
			if(aGet[0] == name) return full ? aGets[i] : aGet[1];
		}
		
		return '';
	}
	
	return sGets ? sGets : '';
}


function CloneChild()
{
    this._aChilds = {};
	this._aChildsNum = {};
	
	this.set = function(containerId) 
	{
		this._aChilds[containerId] = $("#"+containerId).children().eq(0).clone();
		this._aChildsNum[containerId] = 1;
	}
	
	this.clone = function(containerId, count, maxChildren, emptyValue, actionObj, callback)
	{
		var jContainer = $("#"+containerId);
		var jChildren = jContainer.children();
		var jChild = this._aChilds[containerId] ? this._aChilds[containerId] : jChildren.eq(0);
		var currChildrens = typeof this._aChildsNum[containerId] != "undefined" ? this._aChildsNum[containerId] : jChildren.length;

		for(var i=0; i<count && (!maxChildren || (currChildrens+i)<maxChildren); i++) {
			var jClone = jChild.clone().hide( );
			if(emptyValue) {
				jClone.val('');
				jClone.children('INPUT').val('');
			}
			if(typeof this._aChildsNum[containerId] != "undefined") this._aChildsNum[containerId]++;
			jContainer.append(jClone);
			jClone.fadeIn("slow", function() { if (callback) callback.call(this, jClone); });
		}
		
		if(actionObj && maxChildren && (currChildrens+i)>=maxChildren) $(actionObj).hide();
		
		return false;
	}
}

var cloneChild = new CloneChild();    


$.extend({URLEncode:function(c){var o='';var x=0;c=c.toString();var r=/(^[a-zA-Z0-9_.]*)/;
while(x<c.length){var m=r.exec(c.substr(x));
  if(m!=null && m.length>1 && m[1]!=''){o+=m[1];x+=m[1].length;
  }else{if(c[x]==' ')o+='+';else{var d=c.charCodeAt(x);var h=d.toString(16);
  o+='%'+(h.length<2?'0':'')+h.toUpperCase();}x++;}}return o;},
URLDecode:function(s){var o=s;var binVal,t;var r=/(%[^%]{2})/;
while((m=r.exec(o))!=null && m.length>1 && m[1]!=''){b=parseInt(m[1].substr(1),16);
t=String.fromCharCode(b);o=o.replace(m[1],t);}return o;}
});


/**
*
*  Javascript sprintf
*  http://www.webtoolkit.info/
*
*
**/

sprintfWrapper = {

	init : function () {

		if (typeof arguments == "undefined") { return null; }
		if (arguments.length < 1) { return null; }
		if (typeof arguments[0] != "string") { return null; }
		if (typeof RegExp == "undefined") { return null; }

		var string = arguments[0];
		var exp = new RegExp(/(%([%]|(\-)?(\+|\x20)?(0)?(\d+)?(\.(\d)?)?([bcdfosxX])))/g);
		var matches = new Array();
		var strings = new Array();
		var convCount = 0;
		var stringPosStart = 0;
		var stringPosEnd = 0;
		var matchPosEnd = 0;
		var newString = '';
		var match = null;

		while (match = exp.exec(string)) {
			if (match[9]) { convCount += 1; }

			stringPosStart = matchPosEnd;
			stringPosEnd = exp.lastIndex - match[0].length;
			strings[strings.length] = string.substring(stringPosStart, stringPosEnd);

			matchPosEnd = exp.lastIndex;
			matches[matches.length] = {
				match: match[0],
				left: match[3] ? true : false,
				sign: match[4] || '',
				pad: match[5] || ' ',
				min: match[6] || 0,
				precision: match[8],
				code: match[9] || '%',
				negative: parseInt(arguments[convCount]) < 0 ? true : false,
				argument: String(arguments[convCount])
			};
		}
		strings[strings.length] = string.substring(matchPosEnd);

		if (matches.length == 0) { return string; }
		if ((arguments.length - 1) < convCount) { return null; }

		var code = null;
		var match = null;
		var i = null;

		for (i=0; i<matches.length; i++) {

			if (matches[i].code == '%') { substitution = '%' }
			else if (matches[i].code == 'b') {
				matches[i].argument = String(Math.abs(parseInt(matches[i].argument)).toString(2));
				substitution = sprintfWrapper.convert(matches[i], true);
			}
			else if (matches[i].code == 'c') {
				matches[i].argument = String(String.fromCharCode(parseInt(Math.abs(parseInt(matches[i].argument)))));
				substitution = sprintfWrapper.convert(matches[i], true);
			}
			else if (matches[i].code == 'd') {
				matches[i].argument = String(Math.abs(parseInt(matches[i].argument)));
				substitution = sprintfWrapper.convert(matches[i]);
			}
			else if (matches[i].code == 'f') {
				matches[i].argument = String(Math.abs(parseFloat(matches[i].argument)).toFixed(matches[i].precision ? matches[i].precision : 6));
				substitution = sprintfWrapper.convert(matches[i]);
			}
			else if (matches[i].code == 'o') {
				matches[i].argument = String(Math.abs(parseInt(matches[i].argument)).toString(8));
				substitution = sprintfWrapper.convert(matches[i]);
			}
			else if (matches[i].code == 's') {
				matches[i].argument = matches[i].argument.substring(0, matches[i].precision ? matches[i].precision : matches[i].argument.length)
				substitution = sprintfWrapper.convert(matches[i], true);
			}
			else if (matches[i].code == 'x') {
				matches[i].argument = String(Math.abs(parseInt(matches[i].argument)).toString(16));
				substitution = sprintfWrapper.convert(matches[i]);
			}
			else if (matches[i].code == 'X') {
				matches[i].argument = String(Math.abs(parseInt(matches[i].argument)).toString(16));
				substitution = sprintfWrapper.convert(matches[i]).toUpperCase();
			}
			else {
				substitution = matches[i].match;
			}

			newString += strings[i];
			newString += substitution;

		}
		newString += strings[i];

		return newString;

	},

	convert : function(match, nosign){
		if (nosign) {
			match.sign = '';
		} else {
			match.sign = match.negative ? '-' : match.sign;
		}
		var l = match.min - match.argument.length + 1 - match.sign.length;
		var pad = new Array(l < 0 ? 0 : l).join(match.pad);
		if (!match.left) {
			if (match.pad == "0" || nosign) {
				return match.sign + pad + match.argument;
			} else {
				return pad + match.sign + match.argument;
			}
		} else {
			if (match.pad == "0" || nosign) {
				return match.sign + match.argument + pad.replace(/0/g, ' ');
			} else {
				return match.sign + match.argument + pad;
			}
		}
	}
}

sprintf = sprintfWrapper.init;