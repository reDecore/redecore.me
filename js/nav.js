Nav = {
    deep: 0,
    _handlers: {},
    _lastHandler: null,
    _initTitle: null,

    init: function()
    {
        Nav._initTitle = document.title;

        if (window.addEventListener) {
            window.setTimeout( function(){
                window.addEventListener("popstate", function(e) {

                    if (Nav._initTitle) {
                        document.title = Nav._initTitle;
                        if (window.addthis) window.addthis.update('share', 'title', Nav._initTitle);
                    }

                    Nav._callHandler(null, e.state && e.state.type=="nav" ? e.state.handler : null, document.location);

                    if (Nav.deep>0) Nav.deep--;

                    e.preventDefault();
                }, false);
            }, 1);
        }
    },

    addHandler: function(ident, callback)
    {
        Nav._handlers[ident] = callback;
    },

    go: function(elm, handler)
    {
        var url = typeof(elm) == "string" ? elm : $(elm).attr("href");

        if (handler && Nav._handlers[handler] && window.history && history.pushState && window.addEventListener) {
            var oldUrl = document.location.toString();
            history.pushState({"type": "nav", "handler": handler}, null, url);
            Nav._callHandler(elm, handler, url, oldUrl);
            Nav.deep++;
            return false;
        }

        Nav._lastHandler = null;

        if (url == elm) {
            document.location.href = url;
            return false;
        }

        return true;
    },

    toFirst: function()
    {
        history.go(-Nav.deep); Nav.deep=0;
    },

    _callHandler: function(elm, handler, url, oldUrl)
    {	
        if (Nav._lastHandler && Nav._handlers[Nav._lastHandler]) Nav._handlers[Nav._lastHandler].call(this);
        if (handler && Nav._handlers[handler]) Nav._handlers[handler].call(this, elm, url, oldUrl);
        Nav._lastHandler = handler;
    }
}
$(document).ready(Nav.init);