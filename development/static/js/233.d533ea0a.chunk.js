"use strict";(self.webpackChunk_coreui_coreui_free_react_admin_template=self.webpackChunk_coreui_coreui_free_react_admin_template||[]).push([[233],{85535:function(e,n,t){t(72791);n.Z=t.p+"static/media/editPen.a8f48c3329546d08e181e1453a64e6b7.svg"},11687:function(e,n,t){t.d(n,{R4:function(){return a},Y0:function(){return s}});var a="https://troes.io/Development/public/api",s="https://tro.tentoptoday.com/Development/public/api"},97233:function(e,n,t){t.r(n),t.d(n,{default:function(){return y}});var a=t(74165),s=t(15861),i=t(29439),c=t(72791),l=t(74569),r=t.n(l),o=t(57689),d=t(37083),u=t(87309),p=t(32014),m=t(82622),f=t(85535),h=t(86573),x=t(82570),_=t.n(x),j=t(11687),g=t(80184),y=function(){var e=(0,c.useState)(""),n=(0,i.Z)(e,2),t=n[0],l=n[1],x=(0,c.useState)([]),y=(0,i.Z)(x,2),N=y[0],v=y[1],b=(0,c.useState)(!1),w=(0,i.Z)(b,2),S=w[0],Z=w[1],C=(0,c.useState)(!1),k=(0,i.Z)(C,2),E=k[0],A=k[1],T=(0,c.useState)(!1),D=(0,i.Z)(T,2),z=D[0],I=D[1],W=(0,c.useState)([]),L=(0,i.Z)(W,2),P=L[0],Y=L[1],R=(0,c.useState)(""),O=(0,i.Z)(R,2),V=O[0],F=O[1],U=(0,c.useState)(""),J=(0,i.Z)(U,2),M=J[0],G=J[1],X=(0,c.useState)(""),$=(0,i.Z)(X,2),q=$[0],B=$[1],H=(0,c.useState)(""),K=(0,i.Z)(H,2),Q=K[0],ee=K[1],ne=(0,c.useState)(!1),te=(0,i.Z)(ne,2),ae=te[0],se=te[1],ie=(0,c.useState)(!1),ce=(0,i.Z)(ie,2),le=ce[0],re=ce[1],oe=(0,c.useState)(!1),de=(0,i.Z)(oe,2),ue=de[0],pe=de[1],me=(0,c.useState)(!1),fe=(0,i.Z)(me,2),he=fe[0],xe=fe[1],_e=(0,c.useState)(""),je=(0,i.Z)(_e,2),ge=je[0],ye=je[1],Ne=(0,c.useState)(""),ve=(0,i.Z)(Ne,2),be=ve[0],we=ve[1],Se=(0,c.useState)(""),Ze=(0,i.Z)(Se,2),Ce=Ze[0],ke=Ze[1],Ee=(0,c.useState)(""),Ae=(0,i.Z)(Ee,2),Te=Ae[0],De=Ae[1],ze=(0,c.useState)(!1),Ie=(0,i.Z)(ze,2),We=Ie[0],Le=Ie[1],Pe=(0,c.useState)(""),Ye=(0,i.Z)(Pe,2),Re=Ye[0],Oe=Ye[1],Ve=(0,c.useState)(""),Fe=(0,i.Z)(Ve,2),Ue=Fe[0],Je=Fe[1],Me=(0,c.useState)(""),Ge=(0,i.Z)(Me,2),Xe=Ge[0],$e=Ge[1],qe=(0,c.useState)(""),Be=(0,i.Z)(qe,2),He=Be[0],Ke=Be[1],Qe=(0,c.useState)(!1),en=(0,i.Z)(Qe,2),nn=en[0],tn=en[1],an=(0,c.useState)(!1),sn=(0,i.Z)(an,2),cn=sn[0],ln=sn[1],rn=(0,c.useState)(!1),on=(0,i.Z)(rn,2),dn=(on[0],on[1]),un=(0,o.s0)();(0,c.useEffect)((function(){localStorage.getItem("token")||un("/login")}),[]);var pn=function(){console.log(M,"ooooo"),_().isEmail(M)?(Je("green"),ye("Valid Email!")):(Je("red"),ye("Enter valid Email!"))},mn=function(e){G(e.target.value),pn()};(0,c.useEffect)((function(){M&&pn()}),[M]);var fn=function(e){_().isStrongPassword(e,{minLength:6,minLowercase:1,minUppercase:1,minNumbers:1,minSymbols:1})?(we("Strong Password!!"),$e("green"),tn(!0)):(we("Password must have at least 8 characters that include at least 1 lowercase character, 1 uppercase character, 1 number, and 1 special character in (!@#$%^&*)"),tn(!1),$e("red"))};(0,c.useEffect)((function(){Le(!1===nn)}),[q,Q,nn]);var hn=function(e){e.length>=3?ke(""):ke("Admin name must be between 3 and 25 characters.")};(0,c.useEffect)((function(){V&&hn(V)}),[V]);var xn=function(e){ee(e.target.value)};(0,c.useEffect)((function(){q===Q?(De("Correct password!!"),Ke("green")):(De("The password does not match!!"),Ke("red")),""==Q&&De("")}),[Q,q]),(0,c.useEffect)((function(){""==q&&we("")}),[q]),(0,c.useEffect)((function(){""==M&&ye("")}),[M]);(0,c.useEffect)((function(){""==V&&Oe("")}),[V]),(0,c.useEffect)((function(){""==V&&ke("")}),[V]);var _n=function(e){B(e.target.value),fn(q)};(0,c.useEffect)((function(){q&&fn(q)}),[q]);function jn(e){return gn.apply(this,arguments)}function gn(){return(gn=(0,s.Z)((0,a.Z)().mark((function e(n){var t,s;return(0,a.Z)().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:if(ln(!0),Z((function(e){return!e})),n.preventDefault(),t={name:V,email:M,password:q,c_password:Q},!(V&&M&&q&&q===Q)){e.next=14;break}return e.next=7,fetch("".concat(j.Y0,"/register"),{method:"POST",headers:{"Content-Type":"application/json","Access-Control-Allow-Origin":"*"},body:JSON.stringify(t)});case 7:return s=e.sent,e.next=10,s.json();case 10:(s=e.sent).error?(alert(s.error.email),ln(!1)):(re(!0),ln(!1),setTimeout((function(){re(!1)}),2e3),yn()),e.next=17;break;case 14:alert("Invalid details"),ln(!1),dn(!1);case 17:case"end":return e.stop()}}),e)})))).apply(this,arguments)}(0,c.useEffect)((function(){F(""),G(""),B(""),ee(""),ye(""),Le(!0),De(""),we("")}),[S]),(0,c.useEffect)((function(){ye(""),Le(!0),De(""),we("")}),[E]);var yn=function(e){ln(!0),r().get("".concat(j.Y0,"/admin")).then((function(e){console.log(e,"tt"),Y(e.data.customers),ln(!1)})).catch((function(e){return console.log(e)}))};(0,c.useEffect)((function(){yn()}),[]);function Nn(){return(Nn=(0,s.Z)((0,a.Z)().mark((function e(n){var s;return(0,a.Z)().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:if(ln(!0),A((function(e){return!e})),!(V&&M&&q&&q===Q)){e.next=14;break}return e.next=5,fetch("".concat(j.Y0,"/update/").concat(t),{method:"PUT",headers:{"Content-Type":"application/json","Access-Control-Allow-Origin":"*"},body:JSON.stringify({name:V,email:M,password:q,c_password:Q})});case 5:return s=e.sent,e.next=8,s.json();case 8:pe(!0),ln(!1),setTimeout((function(){pe(!1)}),2e3),yn(),e.next=16;break;case 14:alert("Invalid Details"),ln(!1);case 16:case"end":return e.stop()}}),e)})))).apply(this,arguments)}(0,c.useEffect)((function(){F((function(){return N.name})),G((function(){return N.email}))}),[N]);var vn=function(){var e=(0,s.Z)((0,a.Z)().mark((function e(n){return(0,a.Z)().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:ln(!0),I((function(e){return!e})),r().delete("".concat(j.Y0,"/delete/").concat(n)).then((function(){se((function(e){return!e})),xe(!0),ln(!1),setTimeout((function(){xe(!1)}),2e3)})).catch((function(e){return console.log(e)}));case 3:case"end":return e.stop()}}),e)})));return function(n){return e.apply(this,arguments)}}();(0,c.useEffect)((function(){yn()}),[ae]);return(0,g.jsxs)("div",{className:"admin__page",style:{position:"relative"},children:[cn?(0,g.jsx)("div",{style:{display:"flex",justifyContent:"center",alignItems:"center",zIndex:"1000"},children:(0,g.jsx)(d.Z,{size:"large",style:{fontSize:"30px"}})}):"",(0,g.jsxs)("div",{style:{display:"flex",justifyContent:"space-between",alignItems:"center"},children:[(0,g.jsx)("p",{className:"admin__acount",children:"Admin Accounts"}),(0,g.jsxs)("p",{className:"toatl_adminss",children:["Total Admins : ",P.length]})]}),(0,g.jsx)("div",{style:{background:"#fff"},children:(0,g.jsx)("div",{style:{padding:"20px 20px"},children:(0,g.jsxs)("button",{onClick:function(e){Z((function(e){return!e}))},style:{background:"#1890ff",color:"#fff",borderRadius:"15px",padding:"8px 15px",border:"none",fontWeight:"bold"},children:["Register New Admin",(0,g.jsx)("img",{className:"admin__black",src:h.Z,alt:"logo"})]})})}),(0,g.jsx)("div",{className:"show__notShow",style:{display:S?"block":"none"},children:(0,g.jsxs)("form",{onSubmit:jn,children:[(0,g.jsx)("div",{className:"create_admin",children:(0,g.jsx)("p",{children:"Create New Admin"})}),(0,g.jsxs)("div",{id:"form__admin_ADMIN",children:[(0,g.jsx)("p",{className:"nameEmail__admin",style:{paddingTop:"20px"},children:"Name"}),(0,g.jsx)("input",{className:"admin__input",type:"text",name:"name",value:V,placeholder:"Enter Your Name",onChange:function(e){F(e.target.value),hn(V)}}),Ce?(0,g.jsx)("div",{className:"password__span",children:(0,g.jsx)("span",{style:{fontWeight:"400",color:"red"},children:Ce})}):"",(0,g.jsx)("p",{className:"nameEmail__admin",children:"Email"}),(0,g.jsx)("input",{className:"admin__input",type:"email",name:"email",value:M,placeholder:"Enter Your email",onChange:mn}),ge?(0,g.jsx)("span",{id:"email__error",style:{fontWeight:"400",color:"".concat(Ue),paddingLeft:"20px",fontSize:"12px"},children:ge}):"",(0,g.jsx)("p",{className:"nameEmail__admin",children:"Password"}),(0,g.jsx)("input",{className:"admin__input",type:"password",name:"password",value:q,placeholder:" password",onChange:_n}),be?(0,g.jsx)("div",{className:"password__span",children:(0,g.jsx)("span",{style:{fontWeight:"400",color:"".concat(Xe),fontSize:"12px"},children:be})}):"",(0,g.jsx)("p",{className:"nameEmail__admin",children:"Confirm Password"}),(0,g.jsx)("input",{className:"admin__input",type:"password",name:"c_password",value:Q,placeholder:"confirm password",onChange:xn}),xn?(0,g.jsx)("span",{style:{fontWeight:"400",color:"".concat(He),paddingLeft:"20px",fontSize:"12px"},children:Te}):"",(0,g.jsxs)("div",{style:{paddingLeft:"10px"},children:[(0,g.jsx)("button",{type:"submit",className:"create_new__admin",onClick:jn,disabled:We,children:"Create Admin"}),(0,g.jsx)(u.Z,{onClick:function(e){Z((function(e){return!e}))},className:"cancel__create",id:"not_ShowCancel",children:"Cancel"})]})]})]})}),(0,g.jsxs)("div",{className:"show__notShow",style:{display:E?"block":"none"},children:[(0,g.jsx)("div",{className:"create_admin",children:(0,g.jsx)("p",{children:"Edit Admin Details"})}),(0,g.jsxs)("div",{id:"form__admin_Edit",children:[(0,g.jsx)("p",{className:"nameEmail__admin",style:{paddingTop:"20px"},children:"Name"}),(0,g.jsx)("input",{className:"admin__input",type:"text",placeholder:"Chetan",defaultValue:N.name,onChange:function(e){F(e.target.value),V.length<=3?Oe("Admin name must be between 3 and 25 characters."):Oe("")}}),Re?(0,g.jsx)("span",{style:{fontWeight:"400",color:"red",paddingLeft:"20px",fontSize:"12px"},children:Re}):"",(0,g.jsx)("p",{className:"nameEmail__admin",children:"Email"}),(0,g.jsx)("input",{className:"admin__input",type:"email",defaultValue:N.email,onChange:mn,placeholder:"cvinfotech@gmail.com"}),ge?(0,g.jsx)("span",{style:{fontWeight:"400",color:"".concat(Ue),paddingLeft:"20px",fontSize:"12px"},children:ge}):"",(0,g.jsx)("p",{className:"nameEmail__admin",children:"Password"}),(0,g.jsx)("input",{className:"admin__input",type:"password",defaultValue:q,onChange:_n,placeholder:"Generate a new password"}),be?(0,g.jsx)("span",{style:{fontWeight:"400",color:"".concat(Xe),paddingLeft:"20px",fontSize:"12px"},children:be}):"",(0,g.jsx)("p",{className:"nameEmail__admin",children:"Confirm Password"}),(0,g.jsx)("input",{id:"conFirm_password",className:"admin__input",type:"password",placeholder:"Retype new password to confirm",name:"c_password",defaultValue:Q,onChange:xn}),xn?(0,g.jsx)("span",{style:{fontWeight:"400",color:"".concat(He),paddingLeft:"20px",fontSize:"12px"},children:Te}):"",(0,g.jsxs)("div",{style:{paddingLeft:"10px"},children:[(0,g.jsx)("button",{onClick:function(){return function(e){return Nn.apply(this,arguments)}(t)},className:"update_new__admin",disabled:We,children:"Update"}),(0,g.jsx)(u.Z,{onClick:function(e){A((function(e){return!e}))},className:"cancel__create",type:"submit",children:"Cancel"})]})]})]}),(0,g.jsxs)("div",{className:"show__notShow",style:{display:z?"block":"none"},children:[(0,g.jsx)("div",{id:"confirm__delete_Admin",children:(0,g.jsx)("p",{children:"Confirm Delete"})}),(0,g.jsxs)("div",{id:"delete__admin",children:[(0,g.jsx)("p",{children:"Are you sure you want to delete profile"}),(0,g.jsxs)("p",{style:{marginTop:"-10px"},children:["of the admin ",(0,g.jsx)("span",{style:{fontWeight:"bolder"},children:N.name})]}),(0,g.jsx)("p",{style:{marginTop:"-10px"},children:" This process is Irreversible"}),(0,g.jsxs)("div",{id:"handle_Admin_Delete_cancel",children:[(0,g.jsx)("button",{onClick:function(){return vn(t)},type:"submit",className:"delete_new__admin",children:"Delete"}),(0,g.jsx)("button",{onClick:function(){I((function(e){return!e}))},id:"delete__create",type:"submit",children:"Cancel"})]})]})]}),(0,g.jsx)("div",{className:"",style:{marginTop:"10px",overflowX:"auto"},children:(0,g.jsxs)("table",{className:"table",children:[(0,g.jsx)("thead",{className:"admin__information",children:(0,g.jsxs)("tr",{children:[(0,g.jsx)("th",{className:"s_Name",children:(0,g.jsx)(p.Z,{})}),(0,g.jsx)("th",{className:"s_Name",children:"Name"}),(0,g.jsx)("th",{className:"s_Name",children:"Email"}),(0,g.jsx)("th",{className:"s_Name",children:"Time"}),(0,g.jsx)("th",{className:"s_Name",children:"Date"}),(0,g.jsx)("th",{className:"s_Name",children:"Update"}),(0,g.jsx)("th",{className:"s_Name",children:"Delete"})]})}),(0,g.jsx)("tbody",{style:{background:"#fff"},children:P&&P.map((function(e,n){function t(e){return e.toString().padStart(2,"0")}var a,s=[t((a=new Date(e.pwa_date)).getDate()),t(a.getMonth()+1),a.getFullYear()].join("-");return(0,g.jsxs)("tr",{children:[(0,g.jsx)("th",{children:(0,g.jsx)(p.Z,{})}),(0,g.jsx)("td",{children:e.name}),(0,g.jsx)("td",{children:e.email}),(0,g.jsx)("td",{children:e.time}),(0,g.jsx)("td",{children:s}),(0,g.jsx)("td",{children:(0,g.jsx)("button",{onClick:function(){v(e),l(e.id),A((function(e){return!e}))},className:"update__table",children:(0,g.jsx)("img",{src:f.Z,alt:"edit",style:{width:"20px"}})})}),(0,g.jsx)("td",{children:(0,g.jsx)("button",{className:"delte__table",onClick:function(){return v(e),l(e.id),void I((function(e){return!e}))},children:(0,g.jsx)(m.Z,{style:{color:"red",fontWeight:"bolder",fontSize:"18px"}})})})]},n)}))})]})}),(0,g.jsx)("div",{className:"user__detail__popup__Admin",style:{display:le?"block":"none"},children:(0,g.jsxs)("div",{style:{display:"flex",alignItems:"center"},children:[(0,g.jsx)("img",{src:h.Z,alt:"logo",style:{paddingRight:"10px",display:"block",marginTop:"-5px",height:"15px",objectFit:"contain"}}),(0,g.jsx)("p",{className:"admin_registerd__pop",children:"A new admin is registered."})]})}),(0,g.jsx)("div",{className:"user__detail__popup__Admin",style:{display:ue?"block":"none"},children:(0,g.jsxs)("div",{style:{display:"flex",alignItems:"center"},children:[(0,g.jsx)("img",{src:h.Z,alt:"logo",style:{paddingRight:"10px",display:"block",marginTop:"-5px",objectFit:"contain",height:"15px"}}),(0,g.jsx)("p",{className:"admin_registerd__pop",children:"Admin details have been updated."})]})}),(0,g.jsx)("div",{className:"user__detail__popup__Admin",style:{display:he?"block":"none"},children:(0,g.jsxs)("div",{style:{display:"flex",alignItems:"center"},children:[(0,g.jsx)(m.Z,{style:{display:"block",color:"#fff",fontWeight:"bolder",paddingRight:"10px",marginTop:"-5px",fontSize:"18px"}}),(0,g.jsx)("p",{className:"admin_registerd__pop",children:"ID has been deleted."})]})})]})}}}]);
//# sourceMappingURL=233.d533ea0a.chunk.js.map