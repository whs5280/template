(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-2d0c0ec1"],{"449d":function(t,s,a){"use strict";a.r(s);var i=function(){var t=this,s=t.$createElement,a=t._self._c||s;return a("section",{staticClass:"products"},[a("div",{staticClass:"container"},[a("div",{staticClass:"row"},[t._m(0),t._l(t.productsList,function(s,i){return a("div",{key:i,staticClass:"col-lg-4 col-md-4 col-sm-6"},[a("div",{staticClass:"product-wrap"},[a("div",{staticClass:"img-wrap"},[a("img",{staticStyle:{width:"20rem",height:"15rem"},attrs:{src:t.imgUrl+s.path,alt:"Product Item"}}),a("div",{staticClass:"product-overlay"},[a("a",{staticClass:"icon-wrap",attrs:{href:"javascript:;"},on:{click:function(s){return t.$router.push({name:"Shop"})}}},[a("i",{staticClass:"ion ion-android-cart"})])])])])])}),a("div",{staticClass:"col-12"},[a("div",{staticClass:"see-more"},[a("a",{staticClass:"btn btn-primary main-btn bg-main",attrs:{href:"javascript:;"},on:{click:t.more}},[t._v("show more")])])])],2)])])},c=[function(){var t=this,s=t.$createElement,a=t._self._c||s;return a("div",{staticClass:"col-12"},[a("div",{staticClass:"section-header"},[a("div",{staticClass:"sec-icon"},[a("i",{staticClass:"ion ion-android-list"})]),a("div",{staticClass:"sec-title"},[t._v("Product display\n                    ")])])])}],o={name:"products",data:function(){return{productsList:[]}},mounted:function(){this.getShop()},methods:{more:function(){},getShop:function(){var t=this;t.$ajax.post("/api/homepagegoods",{}).then(function(s){1===s.resultCode&&(t.productsList=s.resultData)})}}},r=o,e=a("2877"),n=Object(e["a"])(r,i,c,!1,null,"a89f7380",null);s["default"]=n.exports}}]);
//# sourceMappingURL=chunk-2d0c0ec1.1fabd8dc.js.map