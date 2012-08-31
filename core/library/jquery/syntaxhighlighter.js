/*
 GNU Affero General Public License version 3 {@link http://www.gnu.org/licenses/agpl-3.0.html}
 GNU Affero General Public License version 3 {@link http://www.gnu.org/licenses/agpl-3.0.html}
 GNU Affero General Public License version 3 {@link http://www.gnu.org/licenses/agpl-3.0.html}
 GNU Affero General Public License version 3 {@link http://www.gnu.org/licenses/agpl-3.0.html}
 GNU Affero General Public License version 3 {@link http://www.gnu.org/licenses/agpl-3.0.html}
 GNU Affero General Public License version 3 {@link http://www.gnu.org/licenses/agpl-3.0.html}
*/
if(typeof window.console==="undefined")window.console={};
if(typeof window.console.emulated==="undefined"){if(typeof window.console.log==="function")window.console.hasLog=true;else{if(typeof window.console.log==="undefined")window.console.log=function(){};window.console.hasLog=false}if(typeof window.console.debug==="function")window.console.hasDebug=true;else{if(typeof window.console.debug==="undefined")window.console.debug=!window.console.hasLog?function(){}:function(){for(var a=["console.debug:"],b=0;b<arguments.length;b++)a.push(arguments[b]);window.console.log.apply(window.console,
a)};window.console.hasDebug=false}if(typeof window.console.warn==="function")window.console.hasWarn=true;else{if(typeof window.console.warn==="undefined")window.console.warn=!window.console.hasLog?function(){}:function(){for(var a=["console.warn:"],b=0;b<arguments.length;b++)a.push(arguments[b]);window.console.log.apply(window.console,a)};window.console.hasWarn=false}if(typeof window.console.error==="function")window.console.hasError=true;else{if(typeof window.console.error==="undefined")window.console.error=
function(){var a="An error has occured.";if(window.console.hasLog){a=["console.error:"];for(var b=0;b<arguments.length;b++)a.push(arguments[b]);window.console.log.apply(window.console,a);a="An error has occured. More information is available in your browser's javascript console."}for(b=0;b<arguments.length;++b){if(typeof arguments[b]!=="string")break;a+="\n"+arguments[b]}if(typeof Error!=="undefined")throw Error(a);else throw a;};window.console.hasError=false}if(typeof window.console.trace==="function")window.console.hasTrace=
true;else{if(typeof window.console.trace==="undefined")window.console.trace=function(){window.console.error("console.trace does not exist")};window.console.hasTrace=false}window.console.emulated=true}
(function(a){a.appendStylesheet=a.appendStylesheet||function(b,e){if(!(document.body||0)){setTimeout(function(){a.appendStylesheet.apply(a,[b,e])},500);return a}var c="stylesheet-"+b.replace(/[^a-zA-Z0-9]/g,""),d=a("#"+c);if(typeof e==="undefined")e=false;if(d.length===1)if(e)d.remove();else return a;d=document.getElementsByTagName(a.browser.safari?"head":"body")[0];var f=document.createElement("link");f.type="text/css";f.rel="stylesheet";f.media="screen";f.href=b;f.id=c;d.appendChild(f);return a};
a.appendScript=a.appendScript||function(b,e){if(!(document.body||0)){setTimeout(function(){a.appendScript.apply(a,[b,e])},500);return a}var c="script-"+b.replace(/[^a-zA-Z0-9]/g,""),d=a("#"+c);if(typeof e==="undefined")e=false;if(d.length===1)if(e)d.remove();else return a;d=document.getElementsByTagName(a.browser.safari?"head":"body")[0];var f=document.createElement("script");f.type="text/javascript";f.src=b;f.id=c;d.appendChild(f);return a}})(jQuery);
(function(a){a.fn.findAndSelf=a.fn.findAndSelf||function(b){return a(this).find(b).andSelf().filter(b)};Number.prototype.replace=Number.prototype.replace||function(){return String(this).replace.apply(this,arguments)};if(a.SyntaxHighlighter)window.console.warn("SyntaxHighlighter has already been defined...");else a.SyntaxHighlighter={config:{load:true,highlight:true,debug:false,wrapLines:true,lineNumbers:true,stripEmptyStartFinishLines:true,stripInitialWhitespace:true,alternateLines:false,defaultClassname:"highlight",
theme:"balupton",themes:["balupton"],addSparkleExtension:true,prettifyBaseUrl:"http://github.com/balupton/jquery-syntaxhighlighter/raw/master/prettify",baseUrl:"http://github.com/balupton/jquery-syntaxhighlighter/raw/master"},init:function(b){var e=this.config,c=e.baseUrl;if(c[c.length-1]==="/")e.baseUrl=c.substr(0,c.length-2);delete c;a.extend(true,this.config,b||{});a.Sparkle&&a.Sparkle.addExtension("syntaxhighlighter",function(){a(this).syntaxHighlight()});a.fn.syntaxHighlight=a.fn.SyntaxHighlight=
this.fn;e.load&&this.load();e.highlight&&this.highlight();return this},load:function(){var b=this.config,e=b.prettifyBaseUrl,c=b.baseUrl;b=b.themes;if(!this.loaded()){a.appendScript(e+"/prettify.min.js");a.appendStylesheet(e+"/prettify.min.css");a.appendStylesheet(c+"/styles/style.min.css");a.each(b,function(d,f){a.appendStylesheet(c+"/styles/theme-"+f+".min.css")});a.browser.msie&&a.appendStylesheet(c+"/styles/ie.min.css");this.loadedExtras=true}return this},loadedExtras:false,loaded:function(){return typeof prettyPrint!==
"undefined"&&this.loadedExtras},determineLanguage:function(b){for(var e=null,c=/lang(uage)?-([a-z0-9]+)/g,d=c.exec(b);d!==null;){e=d[2];d=c.exec(b)}return e},fn:function(){var b=a(this);a.SyntaxHighlighter.highlight({el:b});return this},highlight:function(b){if(typeof b!=="object")b={};var e=this,c=e.config,d=b.el||false;d instanceof jQuery||(d=a("body"));if(e.loaded()){var f=c.defaultClassname,j="";if(typeof f==="array"){j="."+f.join(",.");f=f.join(" ")}else{f=String(f);j="."+f.replace(" ",",.")}if(j===
"."||!f){window.console.error("SyntaxHighlighter.highlight: Invalid defaultClassname.",[this,arguments],[c.defaultClassname]);window.console.trace()}d=d.findAndSelf("code,pre").filter("[class*=lang],"+j).filter(":not(.prettyprint)");d.css({"overflow-y":"visible","overflow-x":"visible","white-space":"pre"}).addClass("prettyprint "+f).each(function(){var g=a(this),i=g.attr("class");i=e.determineLanguage(i);g.addClass("lang-"+i)});c.lineNumbers&&d.addClass("linenums");c.theme&&d.addClass("theme-"+c.theme);
c.alternateLines&&d.addClass("alternate");prettyPrint();c.stripEmptyStartFinishLines&&d.find("li:first-child > :first-child, li:last-child > :first-child").each(function(){var g=a(this),i=/^([\r\n\s\t]|\&nbsp;)*$/.test(g.html()),h=g.parent();h=g.siblings();if(i&&(h.length===0||h.length===1&&h.filter(":last").is("br"))){h=g.parent();g=h.val();h.next().val(g);h.remove()}});c.stripInitialWhitespace&&d.find("li:first-child > :first-child").each(function(){var g=a(this),i=(g.html().match(/^(([\r\n\s\t]|\&nbsp;)+)/)||
[])[1]||"";i.length&&g.parent().siblings().children(":first-child").add(g).each(function(){var h=a(this),k=h.html();k=k.replace(RegExp("^"+i,"gm"),"");h.html(k)})});c.wrapLines?d.css({"overflow-x":"hidden","overflow-y":"hidden","white-space":"pre-wrap","max-height":"none"}):d.css({"overflow-x":"auto","overflow-y":"auto","white-space":"normal","max-height":"500px"});return this}else{c.debug&&window.console.debug("SyntaxHighlighter.highlight: Chosen SyntaxHighlighter is not yet defined. Waiting 1200 ms then trying again.");
setTimeout(function(){e.highlight.apply(e,[b])},1200)}}}})(jQuery);
