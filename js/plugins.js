
function css_browser_selector(e){var r=e.toLowerCase(),i=function(e){return r.indexOf(e)>-1},t="gecko",o="webkit",a="safari",n="chrome",s="opera",d="mobile",c=0,l=window.devicePixelRatio?(window.devicePixelRatio+"").replace(".","_"):"1",w=[!/opera|webtv/.test(r)&&/msie\s(\d+)/.test(r)&&(c=1*RegExp.$1)?"ie ie"+c+(6==c||7==c?" ie67 ie678 ie6789":8==c?" ie678 ie6789":9==c?" ie6789 ie9m":c>9?" ie9m":""):/trident\/\d+.*?;\s*rv:(\d+)\.(\d+)\)/.test(r)&&(c=[RegExp.$1,RegExp.$2])?"ie ie"+c[0]+" ie"+c[0]+"_"+c[1]+" ie9m":/firefox\/(\d+)\.(\d+)/.test(r)&&(re=RegExp)?t+" ff ff"+re.$1+" ff"+re.$1+"_"+re.$2:i("gecko/")?t:i(s)?s+(/version\/(\d+)/.test(r)?" "+s+RegExp.$1:/opera(\s|\/)(\d+)/.test(r)?" "+s+RegExp.$2:""):i("konqueror")?"konqueror":i("blackberry")?d+" blackberry":i(n)||i("crios")?o+" "+n:i("iron")?o+" iron":!i("cpu os")&&i("applewebkit/")?o+" "+a:i("mozilla/")?t:"",i("android")?d+" android":"",i("tablet")?"tablet":"",i("j2me")?d+" j2me":i("ipad; u; cpu os")?d+" chrome android tablet":i("ipad;u;cpu os")?d+" chromedef android tablet":i("iphone")?d+" ios iphone":i("ipod")?d+" ios ipod":i("ipad")?d+" ios ipad tablet":i("mac")?"mac":i("darwin")?"mac":i("webtv")?"webtv":i("win")?"win"+(i("windows nt 6.0")?" vista":""):i("freebsd")?"freebsd":i("x11")||i("linux")?"linux":"","1"!=l?" retina ratio"+l:"","js portrait"].join(" ");return window.jQuery&&!window.jQuery.browser&&(window.jQuery.browser=c?{msie:1,version:c}:{}),w}!function(e,r){var i=css_browser_selector(navigator.userAgent),t=e.documentElement;t.className+=" "+i;var o=i.replace(/^\s*|\s*$/g,"").split(/ +/);r.CSSBS=1;for(var a=0;a<o.length;a++)r["CSSBS_"+o[a]]=1;var n=function(r){return e.documentElement[r]||e.body[r]};r.jQuery&&!function(e){function i(){if(0==m){try{var e=n("clientWidth"),r=n("clientHeight");if(e>r?u.removeClass(a).addClass(s):u.removeClass(s).addClass(a),e==b)return;b=e}catch(i){}m=setTimeout(o,100)}}function o(){try{u.removeClass(p),u.addClass(360>=b?d:640>=b?c:768>=b?l:1024>=b?w:"pc")}catch(e){}m=0}var a="portrait",s="landscape",d="smartnarrow",c="smartwide",l="tabletnarrow",w="tabletwide",p=d+" "+c+" "+l+" "+w+" pc",u=e(t),m=0,b=0;r.CSSBS_ie?setInterval(i,1e3):e(r).on("resize orientationchange",i).trigger("resize"),e(r).load(i)}(r.jQuery)}(document,window);


/*++++++++++++++++++++++++++++++++++++++++++++++++++++
	matchMedia.js
++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
/*! matchMedia() polyfill - Test a CSS media type/query in JS. Authors & copyright (c) 2012: Scott Jehl, Paul Irish, Nicholas Zakas, David Knight. Dual MIT/BSD license */

window.matchMedia || (window.matchMedia = function() {
    "use strict";

    // For browsers that support matchMedium api such as IE 9 and webkit
    var styleMedia = (window.styleMedia || window.media);

    // For those that don't support matchMedium
    if (!styleMedia) {
        var style       = document.createElement('style'),
            script      = document.getElementsByTagName('script')[0],
            info        = null;

        style.type  = 'text/css';
        style.id    = 'matchmediajs-test';

        script.parentNode.insertBefore(style, script);

        // 'style.currentStyle' is used by IE <= 8 and 'window.getComputedStyle' for all other browsers
        info = ('getComputedStyle' in window) && window.getComputedStyle(style, null) || style.currentStyle;

        styleMedia = {
            matchMedium: function(media) {
                var text = '@media ' + media + '{ #matchmediajs-test { width: 1px; } }';

                // 'style.styleSheet' is used by IE <= 8 and 'style.textContent' for all other browsers
                if (style.styleSheet) {
                    style.styleSheet.cssText = text;
                } else {
                    style.textContent = text;
                }

                // Test if media query is true or false
                return info.width === '1px';
            }
        };
    }

    return function(media) {
        return {
            matches: styleMedia.matchMedium(media || 'all'),
            media: media || 'all'
        };
    };
}());

(function(e) {
    e.fn.notifyMe = function(t) {
        var n = e.extend({
            msgError404: "Service is not available at the moment. Please check your internet connection or try again later.",
            msgError503: "Oops. Looks like something went wrong. Please try again later.",
            msgErrorValidation: "This email address looks fake or invalid. Please enter a real email address.",
            msgErrorFormat: "Your e-mail address is incorrect. Please check it and try again.",
            msgSuccess: "Congrats! You are in list. We will inform you as soon as we finish."
        }, t);
        var r = e(this);
        var i = e(this).find("input[name=email]");
        var s = e(this).attr("action");
        var o = e(this).find(".note");
        var u = e("<p class='message error-text'></p>").appendTo(e(this));
        var a = e("<i class='error-text'></i>").appendTo(e(this));
        var f = "fa fa-spinner fa-spin";
        var l = "fa fa-check-circle";
        var c = "fa fa-exclamation-circle";
        i.after(a);
        e(this).off("submit").on("submit", function(t) {
            t.preventDefault();
            var h = i.val();
            var p = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if (p.test(h) && h != null) {
                a.removeClass();
                a.addClass(f);
                e(this).removeClass("error success");
                u.text("");
                o.show();
                e.ajax({
                    type: "POST",
                    url: s,
                    data: {
                        email: h
                    },
                    dataType: "json",
                    error: function(e) {
                        r.addClass("error");
                        o.hide();
                        a.removeClass();
                        a.addClass(c);
                        if (e.status == 404) {
                            u.text(n.msgError404)
                        } else {
                            u.text(n.msgError503)
                        }
                    }
                }).done(function(e) {
                    o.hide();
                    if (e.status == "success") {
                        r.addClass("success-full").removeClass("bad-email");
                        a.removeClass(f);
						a.removeClass(c);
                        a.addClass(l);
                        u.text(n.msgSuccess);
                        i.val(null);
                    } else {
                        r.addClass("error");
                        a.removeClass(l);
                        a.addClass(c);
                        if (e.type == "ValidationError") {
                            u.text(n.msgErrorValidation)
                        } else {
                            u.text(n.msgError503)
                        }
                    }
                })
            } else {
                e(this).addClass("bad-email");
                o.hide();
                a.removeClass(l);
                a.addClass(c);
                u.text(n.msgErrorFormat);
            }
        })
    }
})(jQuery)


