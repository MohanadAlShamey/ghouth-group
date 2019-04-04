/*!
 Buttons for DataTables 1.0.3
 ©2015 SpryMedia Ltd - datatables.net/license
*/
(function(r,n,m){var p=function(e,j){var p=0,s=0,k=j.ext.buttons,l=function(a,b){!0===b&&(b={});e.isArray(b)&&(b={buttons:b});this.c=e.extend(!0,{},l.defaults,b);b.buttons&&(this.c.buttons=b.buttons);this.s={dt:new j.Api(a),buttons:[],subButtons:[],listenKeys:"",namespace:"dtb"+p++};this.dom={container:e("<"+this.c.dom.container.tag+"/>").addClass(this.c.dom.container.className)};this._constructor()};e.extend(l.prototype,{action:function(a,b){var c=this._indexToButton(a).conf;if(b===m)return c.action;
        c.action=b;return this},active:function(a,b){this._indexToButton(a).node.toggleClass(this.c.dom.button.active,b===m?!0:b);return this},add:function(a,b){if("string"===typeof a&&-1!==a.indexOf("-")){var c=a.split("-");this.c.buttons[1*c[0]].buttons.splice(1*c[1],0,b)}else this.c.buttons.splice(1*a,0,b);this.dom.container.empty();this._buildButtons(this.c.buttons);return this},container:function(){return this.dom.container},disable:function(a){this._indexToButton(a).node.addClass(this.c.dom.button.disabled);
        return this},destroy:function(){e("body").off("keyup."+this.s.namespace);var a=this.s.buttons,b=this.s.subButtons,c,d,f;c=0;for(a=a.length;c<a;c++){this.removePrep(c);d=0;for(f=b[c].length;d<f;d++)this.removePrep(c+"-"+d)}this.removeCommit();this.dom.container.remove();b=this.s.dt.settings()[0];c=0;for(a=b.length;c<a;c++)if(b.inst===this){b.splice(c,1);break}return this},enable:function(a,b){if(!1===b)return this.disable(a);this._indexToButton(a).node.removeClass(this.c.dom.button.disabled);return this},
    name:function(){return this.c.name},node:function(a){return this._indexToButton(a).node},removeCommit:function(){var a=this.s.buttons,b=this.s.subButtons,c,d;for(c=a.length-1;0<=c;c--)null===a[c]&&(a.splice(c,1),b.splice(c,1),this.c.buttons.splice(c,1));c=0;for(a=b.length;c<a;c++)for(d=b[c].length-1;0<=d;d--)null===b[c][d]&&(b[c].splice(d,1),this.c.buttons[c].buttons.splice(d,1));return this},removePrep:function(a){var b,c=this.s.dt;if("number"===typeof a||-1===a.indexOf("-"))b=this.s.buttons[1*a],
    b.conf.destroy&&b.conf.destroy.call(c.button(a),c,b,b.conf),b.node.remove(),this._removeKey(b.conf),this.s.buttons[1*a]=null;else{var d=a.split("-");b=this.s.subButtons[1*d[0]][1*d[1]];b.conf.destroy&&b.conf.destroy.call(c.button(a),c,b,b.conf);b.node.remove();this._removeKey(b.conf);this.s.subButtons[1*d[0]][1*d[1]]=null}return this},text:function(a,b){var c=this._indexToButton(a),d=this.c.dom.buttonLiner.tag,e=this.s.dt,g=function(a){return"function"===typeof a?a(e,c.node,c.conf):a};if(b===m)return g(c.conf.text);
        c.conf.text=b;d?c.node.children(d).html(g(b)):c.node.html(g(b));return this},toIndex:function(a){var b,c,d,e;d=this.s.buttons;var g=this.s.subButtons;b=0;for(c=d.length;b<c;b++)if(d[b].node[0]===a)return b+"";b=0;for(c=g.length;b<c;b++){d=0;for(e=g[b].length;d<e;d++)if(g[b][d].node[0]===a)return b+"-"+d}},_constructor:function(){var a=this,b=this.s.dt,c=b.settings()[0];c._buttons||(c._buttons=[]);c._buttons.push({inst:this,name:this.c.name});this._buildButtons(this.c.buttons);b.on("destroy",function(){a.destroy()});
        e("body").on("keyup."+this.s.namespace,function(b){if(!n.activeElement||n.activeElement===n.body){var c=String.fromCharCode(b.keyCode).toLowerCase();a.s.listenKeys.toLowerCase().indexOf(c)!==-1&&a._keypress(c,b)}})},_addKey:function(a){a.key&&(this.s.listenKeys+=e.isPlainObject(a.key)?a.key.key:a.key)},_buildButtons:function(a,b,c){var d=this.s.dt;b||(b=this.dom.container,this.s.buttons=[],this.s.subButtons=[]);for(var f=0,g=a.length;f<g;f++){var h=this._resolveExtends(a[f]);if(h)if(e.isArray(h))this._buildButtons(h,
        b,c);else{var i=this._buildButton(h,c!==m?!0:!1);if(i){var q=i.node;b.append(i.inserter);c===m?(this.s.buttons.push({node:q,conf:h,inserter:i.inserter}),this.s.subButtons.push([])):this.s.subButtons[c].push({node:q,conf:h,inserter:i.inserter});h.buttons&&(i=this.c.dom.collection,h._collection=e("<"+i.tag+"/>").addClass(i.className),this._buildButtons(h.buttons,h._collection,f));h.init&&h.init.call(d.button(q),d,q,h)}}}},_buildButton:function(a,b){var c=this.c.dom.button,d=this.c.dom.buttonLiner,f=
        this.c.dom.collection,g=this.s.dt,h=function(b){return"function"===typeof b?b(g,i,a):b};b&&f.button&&(c=f.button);b&&f.buttonLiner&&(d=f.buttonLiner);if(a.available&&!a.available(g,a))return!1;var i=e("<"+c.tag+"/>").addClass(c.className).attr("tabindex",this.s.dt.settings()[0].iTabIndex).attr("aria-controls",this.s.dt.table().node().id).on("click.dtb",function(b){b.preventDefault();!i.hasClass(c.disabled)&&a.action&&a.action.call(g.button(i),b,g,i,a);i.blur()}).on("keyup.dtb",function(b){b.keyCode===
    13&&!i.hasClass(c.disabled)&&a.action&&a.action.call(g.button(i),b,g,i,a)});d.tag?i.append(e("<"+d.tag+"/>").html(h(a.text)).addClass(d.className)):i.html(h(a.text));!1===a.enabled&&i.addClass(c.disabled);a.className&&i.addClass(a.className);a.namespace||(a.namespace=".dt-button-"+s++);d=(d=this.c.dom.buttonContainer)?e("<"+d.tag+"/>").addClass(d.className).append(i):i;this._addKey(a);return{node:i,inserter:d}},_indexToButton:function(a){if("number"===typeof a||-1===a.indexOf("-"))return this.s.buttons[1*
    a];a=a.split("-");return this.s.subButtons[1*a[0]][1*a[1]]},_keypress:function(a,b){var c,d,f,g;f=this.s.buttons;var h=this.s.subButtons,i=function(c,d){if(c.key)if(c.key===a)d.click();else if(e.isPlainObject(c.key)&&c.key.key===a&&(!c.key.shiftKey||b.shiftKey))if(!c.key.altKey||b.altKey)if(!c.key.ctrlKey||b.ctrlKey)(!c.key.metaKey||b.metaKey)&&d.click()};c=0;for(d=f.length;c<d;c++)i(f[c].conf,f[c].node);c=0;for(d=h.length;c<d;c++){f=0;for(g=h[c].length;f<g;f++)i(h[c][f].conf,h[c][f].node)}},_removeKey:function(a){if(a.key){var b=
        e.isPlainObject(a.key)?a.key.key:a.key,a=this.s.listenKeys.split(""),b=e.inArray(b,a);a.splice(b,1);this.s.listenKeys=a.join("")}},_resolveExtends:function(a){for(var b=this.s.dt,c,d,f=function(c){for(var d=0;!e.isPlainObject(c)&&!e.isArray(c);){if("function"===typeof c){if(c=c(b,a),!c)return!1}else if("string"===typeof c){if(!k[c])throw"Unknown button type: "+c;c=k[c]}d++;if(30<d)throw"Buttons: Too many iterations";}return e.isArray(c)?c:e.extend({},c)},a=f(a);a&&a.extend;){var g=f(k[a.extend]);
        if(e.isArray(g))return g;c=g.className;a=e.extend({},g,a);c&&a.className!==c&&(a.className=c+" "+a.className);var h=a.postfixButtons;if(h){a.buttons||(a.buttons=[]);c=0;for(d=h.length;c<d;c++)a.buttons.push(h[c]);a.postfixButtons=null}if(h=a.prefixButtons){a.buttons||(a.buttons=[]);c=0;for(d=h.length;c<d;c++)a.buttons.splice(c,0,h[c]);a.prefixButtons=null}a.extend=g.extend}return a}});l.background=function(a,b,c){c===m&&(c=400);a?e("<div/>").addClass(b).css("display","none").appendTo("body").fadeIn(c):
    e("body > div."+b).fadeOut(c,function(){e(this).remove()})};l.instanceSelector=function(a,b){if(!a)return e.map(b,function(a){return a.inst});var c=[],d=e.map(b,function(a){return a.name}),f=function(a){if(e.isArray(a))for(var h=0,i=a.length;h<i;h++)f(a[h]);else"string"===typeof a?-1!==a.indexOf(",")?f(a.split(",")):(a=e.inArray(e.trim(a),d),-1!==a&&c.push(b[a].inst)):"number"===typeof a&&c.push(b[a].inst)};f(a);return c};l.buttonSelector=function(a,b){for(var c=[],d=function(a,b){var f,g,j=[];e.each(b.s.buttons,
    function(a,b){null!==b&&j.push({node:b.node[0],name:b.name})});e.each(b.s.subButtons,function(a,b){e.each(b,function(a,b){null!==b&&j.push({node:b.node[0],name:b.name})})});f=e.map(j,function(a){return a.node});if(e.isArray(a)||a instanceof e){f=0;for(g=a.length;f<g;f++)d(a[f],b)}else if(null===a||a===m||"*"===a){f=0;for(g=j.length;f<g;f++)c.push({inst:b,idx:b.toIndex(j[f].node)})}else if("number"===typeof a)c.push({inst:b,idx:a});else if("string"===typeof a)if(-1!==a.indexOf(",")){var k=a.split(",");
    f=0;for(g=k.length;f<g;f++)d(e.trim(k[f]),b)}else if(a.match(/^\d+(\-\d+)?$/))c.push({inst:b,idx:a});else if(-1!==a.indexOf(":name")){k=a.replace(":name","");f=0;for(g=j.length;f<g;f++)j[f].name===k&&c.push({inst:b,idx:b.toIndex(j[f].node)})}else e(f).filter(a).each(function(){c.push({inst:b,idx:b.toIndex(this)})});else"object"===typeof a&&a.nodeName&&(g=e.inArray(a,f),-1!==g&&c.push({inst:b,idx:b.toIndex(f[g])}))},f=0,g=a.length;f<g;f++)d(b,a[f]);return c};l.defaults={buttons:["copy","excel","csv",
        "pdf","print"],name:"main",tabIndex:0,dom:{container:{tag:"div",className:"dt-buttons"},collection:{tag:"div",className:"dt-button-collection"},button:{tag:"a",className:"dt-button",active:"active",disabled:"disabled"},buttonLiner:{tag:"span",className:""}}};l.version="1.0.3";e.extend(k,{collection:{text:function(a){return a.i18n("buttons.collection","Collection")},className:"buttons-collection",action:function(a,b,c,d){a=c.offset();b=e(b.table().container());d._collection.addClass(d.collectionLayout).css("display",
            "none").appendTo("body").fadeIn(d.fade);"absolute"===d._collection.css("position")?(d._collection.css({top:a.top+c.outerHeight(),left:a.left}),c=a.left+d._collection.outerWidth(),b=b.offset().left+b.width(),c>b&&d._collection.css("left",a.left-(c-b))):(a=d._collection.height()/2,a>e(r).height()/2&&(a=e(r).height()/2),d._collection.css("marginTop",-1*a));d.background&&l.background(!0,d.backgroundClassName,d.fade);setTimeout(function(){e(n).on("click.dtb-collection",function(a){if(!e(a.target).parents().andSelf().filter(d._collection).length){d._collection.fadeOut(d.fade,
            function(){d._collection.detach()});l.background(false,d.backgroundClassName,d.fade);e(n).off("click.dtb-collection")}})},10)},background:!0,collectionLayout:"",backgroundClassName:"dt-button-background",fade:400},copy:function(a,b){if(b.preferHtml&&k.copyHtml5)return"copyHtml5";if(k.copyFlash&&k.copyFlash.available(a,b))return"copyFlash";if(k.copyHtml5)return"copyHtml5"},csv:function(a,b){if(k.csvHtml5&&k.csvHtml5.available(a,b))return"csvHtml5";if(k.csvFlash&&k.csvFlash.available(a,b))return"csvFlash"},
    excel:function(a,b){if(k.excelHtml5&&k.excelHtml5.available(a,b))return"excelHtml5";if(k.excelFlash&&k.excelFlash.available(a,b))return"excelFlash"},pdf:function(a,b){if(k.pdfHtml5&&k.pdfHtml5.available(a,b))return"pdfHtml5";if(k.pdfFlash&&k.pdfFlash.available(a,b))return"pdfFlash"}});j.Api.register("buttons()",function(a,b){b===m&&(b=a,a=m);return this.iterator(!0,"table",function(c){if(c._buttons)return l.buttonSelector(l.instanceSelector(a,c._buttons),b)},!0)});j.Api.register("button()",function(a,
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            b){var c=this.buttons(a,b);1<c.length&&c.splice(1,c.length);return c});j.Api.register(["buttons().active()","button().active()"],function(a){return this.each(function(b){b.inst.active(b.idx,a)})});j.Api.registerPlural("buttons().action()","button().action()",function(a){return a===m?this.map(function(a){return a.inst.action(a.idx)}):this.each(function(b){b.inst.action(b.idx,a)})});j.Api.register(["buttons().enable()","button().enable()"],function(a){return this.each(function(b){b.inst.enable(b.idx,
    a)})});j.Api.register(["buttons().disable()","button().disable()"],function(){return this.each(function(a){a.inst.disable(a.idx)})});j.Api.registerPlural("buttons().nodes()","button().node()",function(){var a=e();e(this.each(function(b){a=a.add(b.inst.node(b.idx))}));return a});j.Api.registerPlural("buttons().text()","button().text()",function(a){return a===m?this.map(function(a){return a.inst.text(a.idx)}):this.each(function(b){b.inst.text(b.idx,a)})});j.Api.registerPlural("buttons().trigger()",
    "button().trigger()",function(){return this.each(function(a){a.inst.node(a.idx).trigger("click")})});j.Api.registerPlural("buttons().containers()","buttons().container()",function(){var a=e();e(this.each(function(b){a=a.add(b.inst.container())}));return a});j.Api.register("button().add()",function(a,b){1===this.length&&this[0].inst.add(a,b);return this.button(a)});j.Api.register("buttons().destroy()",function(){this.pluck("inst").unique().each(function(a){a.destroy()});return this});j.Api.registerPlural("buttons().remove()",
    "buttons().remove()",function(){this.each(function(a){a.inst.removePrep(a.idx)});this.pluck("inst").unique().each(function(a){a.removeCommit()});return this});var o;j.Api.register("buttons.info()",function(a,b,c){var d=this;if(!1===a)return e("#datatables_buttons_info").fadeOut(function(){e(this).remove()}),clearTimeout(o),o=null,this;o&&clearTimeout(o);e("#datatables_buttons_info").length&&e("#datatables_buttons_info").remove();e('<div id="datatables_buttons_info" class="dt-button-info"/>').html(a?
    "<h2>"+a+"</h2>":"").append(e("<div/>")["string"===typeof b?"html":"append"](b)).css("display","none").appendTo("body").fadeIn();c!==m&&0!==c&&(o=setTimeout(function(){d.buttons.info(!1)},c));return this});j.Api.register("buttons.exportData()",function(a){if(this.context.length){for(var b=new j.Api(this.context[0]),c=e.extend(!0,{},{rows:null,columns:"",modifier:{search:"applied",order:"applied"},orthogonal:"display",stripHtml:!0,stripNewlines:!0,trim:!0},a),d=function(a){if("string"!==typeof a)return a;
    c.stripHtml&&(a=a.replace(/<.*?>/g,""));c.trim&&(a=a.replace(/^\s+|\s+$/g,""));c.stripNewlines&&(a=a.replace(/\n/g," "));return a},a=b.columns(c.columns).indexes().map(function(a){return d(b.column(a).header().innerHTML)}).toArray(),f=b.table().footer()?b.columns(c.columns).indexes().map(function(a){return(a=b.column(a).footer())?d(a.innerHTML):""}).toArray():null,g=b.cells(c.rows,c.columns,c.modifier).render(c.orthogonal).toArray(),h=a.length,i=g.length/h,k=Array(i),l=0,m=0;m<i;m++){for(var n=Array(h),
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     o=0;o<h;o++)n[o]=d(g[l]),l++;k[m]=n}return{header:a,footer:f,body:k}}});e.fn.dataTable.Buttons=l;e.fn.DataTable.Buttons=l;e(n).on("init.dt.dtb",function(a,b){if("dt"===a.namespace){var c=b.oInit.buttons||j.defaults.buttons;c&&!b._buttons&&(new l(b,c)).container()}});j.ext.feature.push({fnInit:function(a){var a=new j.Api(a),b=a.init().buttons;return(new l(a,b)).container()},cFeature:"B"});return l};"function"===typeof define&&define.amd?define(["jquery","datatables"],p):"object"===typeof exports?p(require("jquery"),
    require("datatables")):jQuery&&!jQuery.fn.dataTable.Buttons&&p(jQuery,jQuery.fn.dataTable)})(window,document);