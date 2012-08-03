function Tabzilla()
{
    if (typeof jQuery != 'undefined' && jQuery) {
        jQuery(document).ready(Tabzilla.init);
    } else {
        Tabzilla.run();
    }
}

Tabzilla.READY_POLL_INTERVAL = 40;
Tabzilla.readyInterval = null;
Tabzilla.jQueryCDNSrc =
    '//www.mozilla.org/media/js/libs/jquery-1.7.1.min.js';
Tabzilla.LINK_TITLE = {
    CLOSED: "Mozilla links",
    OPENED: "Close (Esc)"
}

Tabzilla.hasCSSTransitions = (function() {
    var div = document.createElement('div');
    div.innerHTML = '<div style="'
        + '-webkit-transition: color 1s linear;'
        + '-moz-transition: color 1s linear;'
        + '-ms-transition: color 1s linear;'
        + '-o-transition: color 1s linear;'
        + '"></div>';

    var hasTransitions = (
           (div.firstChild.style.webkitTransition !== undefined)
        || (div.firstChild.style.MozTransition !== undefined)
        || (div.firstChild.style.msTransition !== undefined)
        || (div.firstChild.style.OTransition !== undefined)
    );

    delete div;

    return hasTransitions;
})();

/**
 * Sets up the DOMReady event for Tabzilla
 *
 * Adapted from the YUI Event component. Defined in Tabzilla so we do not
 * depend on YUI or jQuery. The YUI DOMReady implementation is based on work
 * Dean Edwards, John Resig, Matthias Miller and Diego Perini.
 */
Tabzilla.run = function()
{
    var webkit = 0, isIE = false, ua = navigator.userAgent;
    var m = ua.match(/AppleWebKit\/([^\s]*)/);

    if (m && m[1]) {
        webkit = parseInt(m[1], 10);
    } else {
        m = ua.match(/Opera[\s\/]([^\s]*)/);
        if (!m || !m[1]) {
            m = ua.match(/MSIE\s([^;]*)/);
            if (m && m[1]) {
                isIE = true;
            }
        }
    }

    // Internet Explorer: use the readyState of a defered script.
    // This isolates what appears to be a safe moment to manipulate
    // the DOM prior to when the document's readyState suggests
    // it is safe to do so.
    if (isIE) {
        if (self !== self.top) {
            document.onreadystatechange = function() {
                if (document.readyState == 'complete') {
                    document.onreadystatechange = null;
                    Tabzilla.ready();
                }
            };
        } else {
            var n = document.createElement('p');
            Tabzilla.readyInterval = setInterval(function() {
                try {
                    // throws an error if doc is not ready
                    n.doScroll('left');
                    clearInterval(Tabzilla.readyInterval);
                    Tabzilla.readyInterval = null;
                    Tabzilla.ready();
                    n = null;
                } catch (ex) {
                }
            }, Tabzilla.READY_POLL_INTERVAL);
        }

    // The document's readyState in Safari currently will
    // change to loaded/complete before images are loaded.
    } else if (webkit && webkit < 525) {
        Tabzilla.readyInterval = setInterval(function() {
            var rs = document.readyState;
            if ('loaded' == rs || 'complete' == rs) {
                clearInterval(Tabzilla.readyInterval);
                Tabzilla.readyInterval = null;
                Tabzilla.ready();
            }
        }, Tabzilla.READY_POLL_INTERVAL);

    // FireFox and Opera: These browsers provide a event for this
    // moment.  The latest WebKit releases now support this event.
    } else {
        Tabzilla.addEventListener(document, 'DOMContentLoaded', Tabzilla.ready);
    }
};

Tabzilla.ready = function()
{
    if (!Tabzilla.DOMReady) {
        Tabzilla.DOMReady = true;

        var onLoad = function() {
            Tabzilla.init();
            Tabzilla.removeEventListener(
                document,
                'DOMContentLoaded',
                Tabzilla.ready
            );
        };

        // if we don't have jQuery, dynamically load jQuery from CDN
        if (typeof jQuery == 'undefined') {
            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.src = Tabzilla.jQueryCDNSrc;
            document.getElementsByTagName('body')[0].appendChild(script);

            if (script.readyState) {
                // IE
                script.onreadystatechange = function() {
                    if (   script.readyState == 'loaded'
                        || script.readyState == 'complete'
                    ) {
                        onLoad();
                    }
                };
            } else {
                // Others
                script.onload = onLoad;
            }
        } else {
            onLoad();
        }
    }
};

Tabzilla.init = function()
{
    if (!Tabzilla.hasCSSTransitions) {
        // add easing functions
        jQuery.extend(jQuery.easing, {
            'easeInOut':  function (x, t, b, c, d) {
                if (( t /= d / 2) < 1) {
                    return c / 2 * t * t + b;
                }
                return -c / 2 * ((--t) * (t - 2) - 1) + b;
            }
        });
    }

    Tabzilla.link  = document.getElementById('tabzilla');
    Tabzilla.panel = Tabzilla.buildPanel();

    // add panel as first element of body element
    var body = document.getElementsByTagName('body')[0];
    body.insertBefore(Tabzilla.panel, body.firstChild);

    // set up event listeners for link
    Tabzilla.addEventListener(Tabzilla.link, 'click', function(e) {
        Tabzilla.preventDefault(e);
        Tabzilla.toggle();
    });

    Tabzilla.$panel = jQuery(Tabzilla.panel);
    Tabzilla.$link  = jQuery(Tabzilla.link);

    Tabzilla.$panel.addClass('tabzilla-closed');
    Tabzilla.$link.addClass('tabzilla-closed');
    Tabzilla.$panel.removeClass('tabzilla-opened');
    Tabzilla.$link.removeClass('tabzilla-opened');

    Tabzilla.$panel.attr("tabindex","-1");
    Tabzilla.$link.attr({
        "role": "button",
        "aria-expanded": "false",
        "aria-controls": Tabzilla.$panel.attr("id"),
        "title": Tabzilla.LINK_TITLE.CLOSED
    });

    Tabzilla.opened = false;

    jQuery(document).keydown(function(e) {
        if (e.which === 27 && Tabzilla.opened) {
            Tabzilla.toggle();
        }
    });
    Tabzilla.$link.keypress(function(e) {
        if (e.which === 32) {
            Tabzilla.toggle();
            Tabzilla.preventDefault(e);
        }
    });
    Tabzilla.$panel.keypress(function(e) {
        if (e.which === 13) {
            Tabzilla.toggle();
            Tabzilla.$link.focus();
        }
    });
};

Tabzilla.buildPanel = function()
{
    var panel = document.createElement('div');
    panel.id = 'tabzilla-panel';
    panel.innerHTML = Tabzilla.content;
    return panel;
};

Tabzilla.addEventListener = function(el, ev, handler)
{
    if (typeof el.attachEvent != 'undefined') {
        el.attachEvent('on' + ev, handler);
    } else {
        el.addEventListener(ev, handler, false);
    }
};

Tabzilla.removeEventListener = function(el, ev, handler)
{
    if (typeof el.detachEvent != 'undefined') {
        el.detachEvent('on' + ev, handler);
    } else {
        el.removeEventListener(ev, handler, false);
    }
};

Tabzilla.toggle = function()
{
    if (Tabzilla.opened) {
        Tabzilla.close();
    } else {
        Tabzilla.open();
    }
};

Tabzilla.open = function()
{
    if (Tabzilla.opened) {
        return;
    }

    if (Tabzilla.hasCSSTransitions) {
        Tabzilla.$panel.addClass('tabzilla-opened');
        Tabzilla.$link.addClass('tabzilla-opened');
        Tabzilla.$panel.removeClass('tabzilla-closed');
        Tabzilla.$link.removeClass('tabzilla-closed');
    } else {
        // jQuery animation fallback
        jQuery(Tabzilla.panel).animate({ height: 200 }, 200, 'easeInOut').toggleClass("open");;
    }
    
    Tabzilla.$link.attr({
        "aria-expanded": "true",
        "title": Tabzilla.LINK_TITLE.OPENED
    });
    Tabzilla.$panel.focus();
    Tabzilla.opened = true;
};

Tabzilla.close = function()
{
    if (!Tabzilla.opened) {
        return;
    }

    if (Tabzilla.hasCSSTransitions) {
        Tabzilla.$panel.removeClass('tabzilla-opened');
        Tabzilla.$link.removeClass('tabzilla-opened');
        Tabzilla.$panel.addClass('tabzilla-closed');
        Tabzilla.$link.addClass('tabzilla-closed');
    } else {
        // jQuery animation fallback
        jQuery(Tabzilla.panel).animate({ height: 0 }, 200, 'easeInOut', function(){
            $(this).toggleClass("open");
        });
        
    }

    Tabzilla.$link.attr({
        "aria-expanded": "false",
        "title": Tabzilla.LINK_TITLE.CLOSED
    });
    Tabzilla.opened = false;
};

Tabzilla.preventDefault = function(ev)
{
    if (ev.preventDefault) {
        ev.preventDefault();
    } else {
        ev.returnValue = false;
    }
};

Tabzilla.content =
    '<div id="tabzilla-contents">'
    + '  <div id="tabzilla-promo">'
    + '    <div class="snippet" id="tabzilla-promo-beta">'
    + '    <a href="http://www.mozilla.org/firefox/beta/?WT.mc_id=tzfxbeta&amp;WT.mc_ev=click">'
    + '      <b>Download Firefox Beta</b>, provide feedback and help make the '
    + '      next version of Firefox even more awesome.</a>'
    + '    </div>'
    + '  </div>'
    + '  <div id="tabzilla-nav">'
    + '    <ul>'
    + '      <li><h2>Mozilla</h2>'
    + '        <ul>'
    + '          <li><a href="http://www.mozilla.org/mission/">Mission</a></li>'
    + '          <li><a href="http://www.mozilla.org/about/">About</a></li>'
    + '          <li><a href="http://www.mozilla.org/projects/">Projects</a></li>'
    + '          <li><a href="http://support.mozilla.org/">Support</a></li>'
    + '          <li><a href="https://developer.mozilla.org">Developer Network</a></li>'
    + '        </ul>'
    + '      </li>'
    + '      <li><h2>Products</h2>'
    + '        <ul>'
    + '          <li><a href="http://www.mozilla.org/firefox">Firefox</a></li>'
    + '          <li><a href="http://www.mozilla.org/thunderbird">Thunderbird</a></li>'
    + '        </ul>'
    + '      </li>'
    + '      <li><h2>Innovations</h2>'
    + '        <ul>'
    + '          <li><a href="https://webfwd.org/">WebFWD</a></li>'
    + '          <li><a href="http://mozillalabs.com/">Labs</a></li>'
    + '          <li><a href="https://www.mozilla.org/webmaker/">Webmaker</a></li>'
    + '        </ul>'
    + '      </li>'
    + '      <li><h2>Get Involved</h2>'
    + '        <ul>'
    + '          <li><a href="http://www.mozilla.org/contribute/">Volunteer</a></li>'
    + '          <li><a href="http://www.mozilla.org/en-US/about/careers.html">Careers</a></li>'
    + '          <li><a href="http://www.mozilla.org/en-US/about/mozilla-spaces/">Find us</a></li>'
    + '          <li><a href="https://donate.mozilla.org/">Join us</a></li>'
    + '        </ul>'
    + '      </li>'
    + '      <li id="tabzilla-search">'
    + '        <a href="http://www.mozilla.org/community/directory.html">Website Directory</a>'
    + '        <form title="Search Mozilla sites" role="search" action="http://www.google.com/cse">'
    + '          <input type="hidden" value="002443141534113389537:ysdmevkkknw" name="cx">'
    + '          <input type="hidden" value="FORID:0" name="cof">'
    + '          <label for="q">Search</label>'
    + '          <input type="search" placeholder="Search" id="q" name="q">'
    + '        </form>'
    + '      </li>'
    + '    </ul>'
    + '  </div>'
    + '</div>';

Tabzilla();
