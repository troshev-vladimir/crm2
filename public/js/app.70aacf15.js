(function(){"use strict";var e={8946:function(e,t,n){var r=n(5102),o=n(9269);function a(e,t,n,r,a,u){const i=(0,o.up)("router-view"),s=(0,o.up)("q-layout");return(0,o.wg)(),(0,o.j4)(s,{class:"text-body1"},{default:(0,o.w5)((()=>[((0,o.wg)(),(0,o.j4)((0,o.LL)(u.layout()),null,{default:(0,o.w5)((()=>[(0,o.Wm)(i)])),_:1}))])),_:1})}var u=n(6237),i=n(6957),s={__name:"DefaultLayout",setup(e){const t=(0,i.oR)();return(e,n)=>{const r=(0,o.up)("q-btn"),a=(0,o.up)("q-header"),i=(0,o.up)("router-view"),s=(0,o.up)("q-page"),c=(0,o.up)("q-page-container"),l=(0,o.up)("q-footer");return(0,o.wg)(),(0,o.iD)(o.HY,null,[(0,o.Wm)(a,{class:"q-pa-md"},{default:(0,o.w5)((()=>[(0,o.Wm)(r,{class:"q-px-xl q-py-xs bg-indigo-13 q-mr-md",push:"",label:"Выйти",onClick:n[0]||(n[0]=e=>(0,u.SU)(t).dispatch("user/exit"))})])),_:1}),(0,o.Wm)(c,null,{default:(0,o.w5)((()=>[(0,o.Wm)(s,{class:"q-pa-lg"},{default:(0,o.w5)((()=>[(0,o.Wm)(i)])),_:1})])),_:1}),(0,o.Wm)(l,{class:"q-pa-md"})],64)}}},c=n(7454),l=n(4686),f=n(6974),d=n(8906),p=n(830),m=n(1410),h=n.n(m);const v=s;var g=v;function y(e,t){const n=(0,o.up)("router-view"),r=(0,o.up)("q-page"),a=(0,o.up)("q-page-container");return(0,o.wg)(),(0,o.j4)(a,null,{default:(0,o.w5)((()=>[(0,o.Wm)(r,null,{default:(0,o.w5)((()=>[(0,o.Wm)(n)])),_:1})])),_:1})}h()(s,"components",{QHeader:c.Z,QBtn:l.Z,QPageContainer:f.Z,QPage:d.Z,QFooter:p.Z});var b=n(7617);const w={},k=(0,b.Z)(w,[["render",y]]);var q=k;h()(w,"components",{QPageContainer:f.Z,QPage:d.Z});var C={components:{EmptyLayout:q,DefaultLayout:g},methods:{layout(){return this.$route.meta.layout}}},O=n(2446);const P=(0,b.Z)(C,[["render",a]]);var _=P;h()(C,"components",{QLayout:O.Z});n(4719);var j=n(2201);const E=[{path:"/auth",name:"auth",component:()=>n.e(457).then(n.bind(n,457)),meta:{layout:"EmptyLayout"}},{path:"/",name:"users",component:()=>Promise.all([n.e(961),n.e(781)]).then(n.bind(n,4781)),meta:{layout:"DefaultLayout"}},{path:"/crm",name:"crm",component:()=>n.e(963).then(n.bind(n,7963)),meta:{layout:"EmptyLayout"},children:[{path:"debt",name:"report-debt",component:()=>Promise.all([n.e(961),n.e(395)]).then(n.bind(n,4395))},{path:"summary",name:"report-summary",component:()=>Promise.all([n.e(961),n.e(508)]).then(n.bind(n,508))},{path:"calendar",name:"report-calendar",component:()=>Promise.all([n.e(961),n.e(651)]).then(n.bind(n,651))}]}],L=(0,j.p7)({history:(0,j.PO)("/"),routes:E});var Z=L;const x={namespaced:!0,state:()=>({isAuth:!1}),mutations:{authorize(e){e.isAuth=!0},unauthorize(e){e.isAuth=!1}},actions:{exit(e){e.commit("unauthorize"),Z.push({name:"auth"})}}};var A=x;const S={namespaced:!0,state:()=>({usersData:[{id:0,name:"test",password:"test",phone:"+7 (231) 22 23 321",balance:33,status:!0}]}),mutations:{registerUser(e,t){const n=e.usersData,r=n[n.length-1].id+1;e.usersData.push({...t,id:r,balance:0,status:!0})}},actions:{}};var D=S,T=(0,i.MT)({state:{},getters:{},mutations:{},actions:{},modules:{user:A,users:D}}),N=n(8029),W=n(4525),Q=n.n(W),B=n(6666),F=n(5905),M={plugins:{Notify:B.Z,Dialog:F.Z},config:{notify:{position:"top"}},iconSet:Q()};(0,r.ri)(_).use(Z).use(N.Z,M).use(T).mount("#app")}},t={};function n(r){var o=t[r];if(void 0!==o)return o.exports;var a=t[r]={exports:{}};return e[r](a,a.exports,n),a.exports}n.m=e,function(){var e=[];n.O=function(t,r,o,a){if(!r){var u=1/0;for(l=0;l<e.length;l++){r=e[l][0],o=e[l][1],a=e[l][2];for(var i=!0,s=0;s<r.length;s++)(!1&a||u>=a)&&Object.keys(n.O).every((function(e){return n.O[e](r[s])}))?r.splice(s--,1):(i=!1,a<u&&(u=a));if(i){e.splice(l--,1);var c=o();void 0!==c&&(t=c)}}return t}a=a||0;for(var l=e.length;l>0&&e[l-1][2]>a;l--)e[l]=e[l-1];e[l]=[r,o,a]}}(),function(){n.n=function(e){var t=e&&e.__esModule?function(){return e["default"]}:function(){return e};return n.d(t,{a:t}),t}}(),function(){n.d=function(e,t){for(var r in t)n.o(t,r)&&!n.o(e,r)&&Object.defineProperty(e,r,{enumerable:!0,get:t[r]})}}(),function(){n.f={},n.e=function(e){return Promise.all(Object.keys(n.f).reduce((function(t,r){return n.f[r](e,t),t}),[]))}}(),function(){n.u=function(e){return"js/"+e+"."+{395:"f295f920",457:"4ec9a8fc",508:"2959e0a5",651:"f9c21838",781:"134e370c",961:"f0902f5c",963:"76cce643"}[e]+".js"}}(),function(){n.miniCssF=function(e){return"css/"+e+"."+{395:"7000adc9",508:"9d612d9c",651:"35d38201",963:"6c070df2"}[e]+".css"}}(),function(){n.g=function(){if("object"===typeof globalThis)return globalThis;try{return this||new Function("return this")()}catch(e){if("object"===typeof window)return window}}()}(),function(){n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)}}(),function(){var e={},t="teleport:";n.l=function(r,o,a,u){if(e[r])e[r].push(o);else{var i,s;if(void 0!==a)for(var c=document.getElementsByTagName("script"),l=0;l<c.length;l++){var f=c[l];if(f.getAttribute("src")==r||f.getAttribute("data-webpack")==t+a){i=f;break}}i||(s=!0,i=document.createElement("script"),i.charset="utf-8",i.timeout=120,n.nc&&i.setAttribute("nonce",n.nc),i.setAttribute("data-webpack",t+a),i.src=r),e[r]=[o];var d=function(t,n){i.onerror=i.onload=null,clearTimeout(p);var o=e[r];if(delete e[r],i.parentNode&&i.parentNode.removeChild(i),o&&o.forEach((function(e){return e(n)})),t)return t(n)},p=setTimeout(d.bind(null,void 0,{type:"timeout",target:i}),12e4);i.onerror=d.bind(null,i.onerror),i.onload=d.bind(null,i.onload),s&&document.head.appendChild(i)}}}(),function(){n.r=function(e){"undefined"!==typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})}}(),function(){n.p="/"}(),function(){if("undefined"!==typeof document){var e=function(e,t,n,r,o){var a=document.createElement("link");a.rel="stylesheet",a.type="text/css";var u=function(n){if(a.onerror=a.onload=null,"load"===n.type)r();else{var u=n&&("load"===n.type?"missing":n.type),i=n&&n.target&&n.target.href||t,s=new Error("Loading CSS chunk "+e+" failed.\n("+i+")");s.code="CSS_CHUNK_LOAD_FAILED",s.type=u,s.request=i,a.parentNode.removeChild(a),o(s)}};return a.onerror=a.onload=u,a.href=t,n?n.parentNode.insertBefore(a,n.nextSibling):document.head.appendChild(a),a},t=function(e,t){for(var n=document.getElementsByTagName("link"),r=0;r<n.length;r++){var o=n[r],a=o.getAttribute("data-href")||o.getAttribute("href");if("stylesheet"===o.rel&&(a===e||a===t))return o}var u=document.getElementsByTagName("style");for(r=0;r<u.length;r++){o=u[r],a=o.getAttribute("data-href");if(a===e||a===t)return o}},r=function(r){return new Promise((function(o,a){var u=n.miniCssF(r),i=n.p+u;if(t(u,i))return o();e(r,i,null,o,a)}))},o={143:0};n.f.miniCss=function(e,t){var n={395:1,508:1,651:1,963:1};o[e]?t.push(o[e]):0!==o[e]&&n[e]&&t.push(o[e]=r(e).then((function(){o[e]=0}),(function(t){throw delete o[e],t})))}}}(),function(){var e={143:0};n.f.j=function(t,r){var o=n.o(e,t)?e[t]:void 0;if(0!==o)if(o)r.push(o[2]);else{var a=new Promise((function(n,r){o=e[t]=[n,r]}));r.push(o[2]=a);var u=n.p+n.u(t),i=new Error,s=function(r){if(n.o(e,t)&&(o=e[t],0!==o&&(e[t]=void 0),o)){var a=r&&("load"===r.type?"missing":r.type),u=r&&r.target&&r.target.src;i.message="Loading chunk "+t+" failed.\n("+a+": "+u+")",i.name="ChunkLoadError",i.type=a,i.request=u,o[1](i)}};n.l(u,s,"chunk-"+t,t)}},n.O.j=function(t){return 0===e[t]};var t=function(t,r){var o,a,u=r[0],i=r[1],s=r[2],c=0;if(u.some((function(t){return 0!==e[t]}))){for(o in i)n.o(i,o)&&(n.m[o]=i[o]);if(s)var l=s(n)}for(t&&t(r);c<u.length;c++)a=u[c],n.o(e,a)&&e[a]&&e[a][0](),e[a]=0;return n.O(l)},r=self["webpackChunkteleport"]=self["webpackChunkteleport"]||[];r.forEach(t.bind(null,0)),r.push=t.bind(null,r.push.bind(r))}();var r=n.O(void 0,[998],(function(){return n(8946)}));r=n.O(r)})();
//# sourceMappingURL=app.70aacf15.js.map