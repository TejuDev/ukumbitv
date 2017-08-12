/*! modernizr 3.5.0 (Custom Build) | MIT *
 * https://modernizr.com/download/?-backdropfilter-csstransitions-touchevents-prefixed-prefixes-setclasses !*/
!function(e,n,t){function r(e,n){return typeof e===n}function o(){var e,n,t,o,i,s,a;for(var l in S)if(S.hasOwnProperty(l)){if(e=[],n=S[l],n.name&&(e.push(n.name.toLowerCase()),n.options&&n.options.aliases&&n.options.aliases.length))for(t=0;t<n.options.aliases.length;t++)e.push(n.options.aliases[t].toLowerCase());for(o=r(n.fn,"function")?n.fn():n.fn,i=0;i<e.length;i++)s=e[i],a=s.split("."),1===a.length?Modernizr[a[0]]=o:(!Modernizr[a[0]]||Modernizr[a[0]]instanceof Boolean||(Modernizr[a[0]]=new Boolean(Modernizr[a[0]])),Modernizr[a[0]][a[1]]=o),C.push((o?"":"no-")+a.join("-"))}}function i(e){var n=x.className,t=Modernizr._config.classPrefix||"";if(b&&(n=n.baseVal),Modernizr._config.enableJSClass){var r=new RegExp("(^|\\s)"+t+"no-js(\\s|$)");n=n.replace(r,"$1"+t+"js$2")}Modernizr._config.enableClasses&&(n+=" "+t+e.join(" "+t),b?x.className.baseVal=n:x.className=n)}function s(){return"function"!=typeof n.createElement?n.createElement(arguments[0]):b?n.createElementNS.call(n,"http://www.w3.org/2000/svg",arguments[0]):n.createElement.apply(n,arguments)}function a(){var e=n.body;return e||(e=s(b?"svg":"body"),e.fake=!0),e}function l(e,t,r,o){var i,l,u,f,c="modernizr",p=s("div"),d=a();if(parseInt(r,10))for(;r--;)u=s("div"),u.id=o?o[r]:c+(r+1),p.appendChild(u);return i=s("style"),i.type="text/css",i.id="s"+c,(d.fake?d:p).appendChild(i),d.appendChild(p),i.styleSheet?i.styleSheet.cssText=e:i.appendChild(n.createTextNode(e)),p.id=c,d.fake&&(d.style.background="",d.style.overflow="hidden",f=x.style.overflow,x.style.overflow="hidden",x.appendChild(d)),l=t(p,e),d.fake?(d.parentNode.removeChild(d),x.style.overflow=f,x.offsetHeight):p.parentNode.removeChild(p),!!l}function u(e,n){return!!~(""+e).indexOf(n)}function f(e){return e.replace(/([a-z])-([a-z])/g,function(e,n,t){return n+t.toUpperCase()}).replace(/^-/,"")}function c(e,n){return function(){return e.apply(n,arguments)}}function p(e,n,t){var o;for(var i in e)if(e[i]in n)return t===!1?e[i]:(o=n[e[i]],r(o,"function")?c(o,t||n):o);return!1}function d(e){return e.replace(/([A-Z])/g,function(e,n){return"-"+n.toLowerCase()}).replace(/^ms-/,"-ms-")}function m(n,t,r){var o;if("getComputedStyle"in e){o=getComputedStyle.call(e,n,t);var i=e.console;if(null!==o)r&&(o=o.getPropertyValue(r));else if(i){var s=i.error?"error":"log";i[s].call(i,"getComputedStyle returning null, its possible modernizr test results are inaccurate")}}else o=!t&&n.currentStyle&&n.currentStyle[r];return o}function v(n,r){var o=n.length;if("CSS"in e&&"supports"in e.CSS){for(;o--;)if(e.CSS.supports(d(n[o]),r))return!0;return!1}if("CSSSupportsRule"in e){for(var i=[];o--;)i.push("("+d(n[o])+":"+r+")");return i=i.join(" or "),l("@supports ("+i+") { #modernizr { position: absolute; } }",function(e){return"absolute"==m(e,null,"position")})}return t}function h(e,n,o,i){function a(){c&&(delete k.style,delete k.modElem)}if(i=r(i,"undefined")?!1:i,!r(o,"undefined")){var l=v(e,o);if(!r(l,"undefined"))return l}for(var c,p,d,m,h,y=["modernizr","tspan","samp"];!k.style&&y.length;)c=!0,k.modElem=s(y.shift()),k.style=k.modElem.style;for(d=e.length,p=0;d>p;p++)if(m=e[p],h=k.style[m],u(m,"-")&&(m=f(m)),k.style[m]!==t){if(i||r(o,"undefined"))return a(),"pfx"==n?m:!0;try{k.style[m]=o}catch(g){}if(k.style[m]!=h)return a(),"pfx"==n?m:!0}return a(),!1}function y(e,n,t,o,i){var s=e.charAt(0).toUpperCase()+e.slice(1),a=(e+" "+P.join(s+" ")+s).split(" ");return r(n,"string")||r(n,"undefined")?h(a,n,o,i):(a=(e+" "+E.join(s+" ")+s).split(" "),p(a,n,t))}function g(e,n,r){return y(e,t,t,n,r)}var C=[],S=[],_={_version:"3.5.0",_config:{classPrefix:"",enableClasses:!0,enableJSClass:!0,usePrefixes:!0},_q:[],on:function(e,n){var t=this;setTimeout(function(){n(t[e])},0)},addTest:function(e,n,t){S.push({name:e,fn:n,options:t})},addAsyncTest:function(e){S.push({name:null,fn:e})}},Modernizr=function(){};Modernizr.prototype=_,Modernizr=new Modernizr;var w=_._config.usePrefixes?" -webkit- -moz- -o- -ms- ".split(" "):["",""];_._prefixes=w;var x=n.documentElement,b="svg"===x.nodeName.toLowerCase(),z=_.testStyles=l;Modernizr.addTest("touchevents",function(){var t;if("ontouchstart"in e||e.DocumentTouch&&n instanceof DocumentTouch)t=!0;else{var r=["@media (",w.join("touch-enabled),("),"heartz",")","{#modernizr{top:9px;position:absolute}}"].join("");z(r,function(e){t=9===e.offsetTop})}return t});var T="Moz O ms Webkit",P=_._config.usePrefixes?T.split(" "):[];_._cssomPrefixes=P;var E=_._config.usePrefixes?T.toLowerCase().split(" "):[];_._domPrefixes=E;var j={elem:s("modernizr")};Modernizr._q.push(function(){delete j.elem});var k={style:j.elem.style};Modernizr._q.unshift(function(){delete k.style}),_.testAllProps=y,_.testAllProps=g,Modernizr.addTest("backdropfilter",g("backdropFilter")),Modernizr.addTest("csstransitions",g("transition","all",!0));var N=function(n){var r,o=w.length,i=e.CSSRule;if("undefined"==typeof i)return t;if(!n)return!1;if(n=n.replace(/^@/,""),r=n.replace(/-/g,"_").toUpperCase()+"_RULE",r in i)return"@"+n;for(var s=0;o>s;s++){var a=w[s],l=a.toUpperCase()+"_"+r;if(l in i)return"@-"+a.toLowerCase()+"-"+n}return!1};_.atRule=N;_.prefixed=function(e,n,t){return 0===e.indexOf("@")?N(e):(-1!=e.indexOf("-")&&(e=f(e)),n?y(e,n,t):y(e,"pfx"))};o(),i(C),delete _.addTest,delete _.addAsyncTest;for(var L=0;L<Modernizr._q.length;L++)Modernizr._q[L]();e.Modernizr=Modernizr}(window,document);