(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-74a26cfe","chunk-37341a63"],{"3e24":function(e,t,s){},b606:function(e,t,s){"use strict";s.r(t);var a=function(){var e=this,t=e.$createElement,s=e._self._c||t;return s("div",{attrs:{id:"white"}},[s("div",{staticClass:"container "},[e._m(0),s("div",{staticClass:"row justify-content-center"},[s("div",{staticClass:"col-md-8 col-md-offset-2"},[s("form",{staticClass:"contact-form php-mail-form",attrs:{role:"form",action:"",method:""}},[s("div",{staticClass:"form-group"},[s("input",{directives:[{name:"model",rawName:"v-model",value:e.message.cp_name,expression:"message.cp_name"}],staticClass:"form-control",attrs:{type:"name",name:"name",id:"contact-name",placeholder:"Your name","data-rule":"minlen:4","data-msg":"Please enter at least 4 chars"},domProps:{value:e.message.cp_name},on:{input:function(t){t.target.composing||e.$set(e.message,"cp_name",t.target.value)}}}),s("div",{staticClass:"validate"})]),s("div",{staticClass:"form-group"},[s("input",{directives:[{name:"model",rawName:"v-model",value:e.message.mobile,expression:"message.mobile"}],staticClass:"form-control",attrs:{type:"email",name:"email",id:"contact-email",placeholder:"Your contact information","data-rule":"email","data-msg":"Please enter a valid email"},domProps:{value:e.message.mobile},on:{input:function(t){t.target.composing||e.$set(e.message,"mobile",t.target.value)}}}),s("div",{staticClass:"validate"})]),s("div",{staticClass:"form-group"},[s("input",{directives:[{name:"model",rawName:"v-model",value:e.message.title,expression:"message.title"}],staticClass:"form-control",attrs:{type:"text",name:"subject",id:"contact-subject",placeholder:"Title","data-rule":"minlen:4","data-msg":"Please enter at least 8 chars of subject"},domProps:{value:e.message.title},on:{input:function(t){t.target.composing||e.$set(e.message,"title",t.target.value)}}}),s("div",{staticClass:"validate"})]),s("div",{staticClass:"form-group"},[s("textarea",{directives:[{name:"model",rawName:"v-model",value:e.message.content,expression:"message.content"}],staticClass:"form-control",attrs:{name:"message",id:"contact-message",placeholder:"Please enter the content",rows:"5","data-rule":"required","data-msg":"Please write something for us"},domProps:{value:e.message.content},on:{input:function(t){t.target.composing||e.$set(e.message,"content",t.target.value)}}}),s("div",{staticClass:"validate"})]),s("div",{staticClass:"loading"}),s("div",{staticClass:"error-message"}),s("div",{staticClass:"form-send"},[s("button",{staticClass:"btn btn-large",attrs:{type:"button"},on:{click:e.check}},[e._v("Contact Us")])])])])])])])},i=[function(){var e=this,t=e.$createElement,s=e._self._c||t;return s("div",{staticClass:"row mt justify-content-center"},[s("div",{staticClass:"col-lg-4 col-lg-offset-4 centered"},[s("h3",[e._v("Contact us")]),s("hr")])])}],n={name:"comment",data:function(){return{message:{}}},methods:{check:function(){var e=this;void 0!==e.message.cp_name&&""!==e.message.cp_name?void 0!==e.message.mobile&&""!==e.message.mobile?void 0!==e.message.title&&""!==e.message.title?void 0!==e.message.content&&""!==e.message.content?e.sendMessage():e.$message({message:"Please enter your content",type:"warning"}):e.$message({message:"Please enter your subject",type:"warning"}):e.$message({message:"Please enter your contact information",type:"warning"}):e.$message({message:"Please enter your name",type:"warning"})},sendMessage:function(){var e=this;e.message["type"]=1,e.$ajax.post("/join/join",e.message).then(function(t){1===t.resultCode?(e.$message({message:"".concat(t.resultMsg),type:"success"}),e.message={}):e.$message({message:"".concat(t.resultMsg,",请联系管理员！"),type:"error"})})}}},o=n,c=(s("fb15"),s("2877")),l=Object(c["a"])(o,a,i,!1,null,"2cf7580e",null);t["default"]=l.exports},f63a:function(e,t,s){"use strict";s.r(t);var a=function(){var e=this,t=e.$createElement,s=e._self._c||t;return s("section",{staticClass:"blog-posts"},[s("div",{staticClass:"container"},[s("div",{staticClass:"row"},[s("div",{staticClass:"col"},[s("div",{staticClass:"row"},[e._m(0),e._l(e.shopList,function(t,a){return s("div",{key:a,staticClass:"col-lg-4 col-md-6 col-sm-6"},[s("div",{staticClass:"blog-post"},[s("div",{staticClass:"post-img"},[s("img",{staticClass:"img-fluid",attrs:{src:e.imgUrl+t.path,alt:"image"}})]),s("div",{staticClass:"blog-details"},[s("a",{attrs:{href:"javascript:;"}},[s("h4",{staticClass:"media-heading"},[e._v(e._s(t.name))])]),s("p",[e._v(e._s(t.type_descr))])])])])})],2)])])]),s("comment")],1)},i=[function(){var e=this,t=e.$createElement,s=e._self._c||t;return s("div",{staticClass:"col-12"},[s("div",{staticClass:"section-header"},[s("div",{staticClass:"sec-icon"},[s("i",{staticClass:"ion ion-briefcase"})]),s("div",{staticClass:"sec-title"},[e._v("Product hall")])])])}],n=s("b606"),o={name:"shop",components:{comment:n["default"]},mounted:function(){this.getShopList()},data:function(){return{shopList:[]}},methods:{getShopList:function(){var e=this;this.loading();var t=this;t.$ajax.post("/api/getgoods",{}).then(function(s){1===s.resultCode&&(t.shopList=s.resultData,e.closeLoading())})}}},c=o,l=s("2877"),r=Object(l["a"])(c,a,i,!1,null,"42eb42d0",null);t["default"]=r.exports},fb15:function(e,t,s){"use strict";var a=s("3e24"),i=s.n(a);i.a}}]);
//# sourceMappingURL=chunk-74a26cfe.25ea58d2.js.map