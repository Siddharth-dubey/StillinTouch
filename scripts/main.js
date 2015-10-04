function g(x){
	return document.getElementById(x);
}
function request(){
	var b;
	if(XMLHttpRequest){
	 b=new XMLHttpRequest();
	}
	else
	b=new ActiveXObject("MICROSOFT.XMLHTTP");
return b;
}
function ajax(meth,url,post){
	this.meth=meth;
	this.url=url;
	this.re=request();;
	this.post=post;
	this.open=ajaxconfi;
	this.send=ajaxsend;
}
function ajaxconfi(){
 this.re.open(this.meth,this.url,true);
}
function ajaxsend(){
this.re.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
this.re.send(this.post);
}
function creElem(parent,elem){
var e=document.createElement(elem);
parent.appendChild(e);
return e;
}
function creTN(parent,tn){
var t=document.createTextNode(tn);
parent.appendChild(t);
return t;
}
function parse(from,what,to){
var rx=from.replace(what,to);
return rx;
}
function _(p,e,c){
var arrb=new Array();
var co=0;
var all=p.getElementsByTagName(e);
for(var i=0;i<all.length;i++){
if(all[i].className==c){
arrb[co]=all[i];
co++;
}
}
return arrb;
}
function Ajax(meth,url,send,handle){
if(XMLHttpRequest)
this.re=new XMLHttpRequest();
else if(ActiveXObject)
this.re=new ActiveXObject("Microsoft.XMLHTTP");
this.meth=meth;
switch(this.meth){
case 'GET':
this.url=url+"?"+send;
break;
case 'POST':
this.url=url;
break;
}
var ajax=this;
this.re.open(this.meth,this.url,true);
this.re.onreadystatechange=function(){if(this.readyState==4 && this.status==200){ajax.response=this.responseText;handle();}}
switch(this.meth){
case 'GET':
this.re.send(null);
break;
case 'POST':
this.re.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
this.re.send(send);
break;
}}



