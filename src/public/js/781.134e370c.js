"use strict";(self["webpackChunkteleport"]=self["webpackChunkteleport"]||[]).push([[781],{5999:function(e,t,l){l.d(t,{Z:function(){return a}});var n=l(9269),o=l(4300);function a(){return(0,n.f3)(o.Ng)}},4781:function(e,t,l){l.r(t),l.d(t,{default:function(){return j}});var n=l(9269),o=l(6237),a=l(3201),s=(l(4719),l(2201));const r={class:"row q-mb-lg q-col-gutter-lg"},u={class:"col-6 q-mb-md"},i={class:"col-6"};var c={__name:"TableFilter",props:{filter:Object},emits:["update:filter"],setup(e,{emit:t}){const l=e,a=(0,s.tv)(),c=(0,o.iH)(l.filter.name),d=(0,o.iH)(l.filter.phone);return(0,n.YP)([c,d],(([e,l])=>{t("update:filter",{name:e,phone:l});const n={name:c.value,phone:d.value};Object.keys(n).forEach((e=>{n[e]||delete n.key})),a.push({query:n})})),(e,t)=>{const l=(0,n.up)("q-input");return(0,n.wg)(),(0,n.iD)("form",r,[(0,n._)("div",u,[(0,n.Wm)(l,{outlined:"",label:"Имя пользователя",modelValue:c.value,"onUpdate:modelValue":t[0]||(t[0]=e=>c.value=e),dense:""},null,8,["modelValue"])]),(0,n._)("div",i,[(0,n.Wm)(l,{mask:"+7 (###) ## ## ###",outlined:"",label:"Телефон пользователя",modelValue:d.value,"onUpdate:modelValue":t[1]||(t[1]=e=>d.value=e),dense:""},null,8,["modelValue"])])])}}},d=l(6931),m=l(1410),p=l.n(m);const f=c;var v=f;p()(c,"components",{QInput:d.Z});var b=l(6957),w=l(5999);const g={key:0},h={key:1};var k={__name:"UsersView",setup(e){const t=(0,b.oR)(),l=t.state.users.usersData,r=(0,s.yj)();let u=(0,o.iH)(l);const i=(0,w.Z)(),c={id:"Идентификатор",name:"ФИО",phone:"Телефон",balance:"Баланс",status:"Статус"};function d(e,t){switch(t){case"id":return e[t]+1;default:return e[t]}}function m(e){const t=Object.entries(e);let l="";for(const n of t)l+=`<div style="border-bottom: 1px dashed #666;" class="row justify-between q-mb-md">\n      <b>${n[0]}</b>\n      <span>${n[1]}</span>\n    </div>`;i.dialog({title:e.name,message:l,html:!0})}const{password:p,...f}=l[0],k=Object.keys(f).map((e=>({name:e,required:!0,label:c[e],align:"left",field:t=>d(t,e),format:e=>`${e}`,sortable:!0}))),q=r.query,y=(0,o.iH)(q);return(0,n.YP)(y,(({name:e,phone:t})=>{u.value=l.filter((l=>(!e||l.name.indexOf(e)+1)&&(!t||l.phone.indexOf(t)+1)))})),(e,t)=>{const l=(0,n.up)("q-toggle"),s=(0,n.up)("q-tr"),r=(0,n.up)("q-table");return(0,n.wg)(),(0,n.iD)(n.HY,null,[(0,n.Wm)(v,{filter:y.value,"onUpdate:filter":t[0]||(t[0]=e=>y.value=e)},null,8,["filter"]),(0,n.Wm)(r,{title:"Cписок пользователей",rows:(0,o.SU)(u),columns:(0,o.SU)(k),"row-key":"name"},{body:(0,n.w5)((e=>[(0,n.Wm)(s,{onClick:t=>m(e.row),class:"cursor-pointer"},{default:(0,n.w5)((()=>[((0,n.wg)(!0),(0,n.iD)(n.HY,null,(0,n.Ko)(e.cols,(t=>((0,n.wg)(),(0,n.iD)(n.HY,{key:t.name},["status"===t.name?((0,n.wg)(),(0,n.iD)("td",g,[(0,n.Wm)(l,{modelValue:e.row.status,"onUpdate:modelValue":t=>e.row.status=t},null,8,["modelValue","onUpdate:modelValue"])])):((0,n.wg)(),(0,n.iD)("td",h,(0,a.zw)(t.value),1))],64)))),128))])),_:2},1032,["onClick"])])),_:1},8,["rows","columns"])],64)}}},q=l(1961),y=l(3856),V=l(64),_=(0,y.L)({name:"QTr",props:{props:Object,noHover:Boolean},setup(e,{slots:t}){const l=(0,n.Fl)((()=>"q-tr"+(void 0===e.props||!0===e.props.header?"":" "+e.props.__trClass)+(!0===e.noHover?" q-tr--no-hover":"")));return()=>(0,n.h)("tr",{class:l.value},(0,V.KR)(t.default))}}),H=l(6362);const U=k;var j=U;p()(k,"components",{QTable:q.Z,QTr:_,QToggle:H.Z})}}]);
//# sourceMappingURL=781.134e370c.js.map