var xmlHttp = createXmlHttpRequestObject();
var z="";
function createXmlHttpRequestObject(){
var xmlHttp;

if(window.XMLHttpRequest){
xmlHttp= new XMLHttpRequest();

}else{
    xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
}
return xmlHttp;
}
function check()
{

    var yos=document.getElementsByName("type");
    var len=yos.length;
    for(i=0;i<len;i++)
    {
if(yos[i].checked)
{
 z=yos[i].id;
}
}
   process();
}

function process(){
if(xmlHttp.readyState==0 || xmlHttp.readyState==4){
food = encodeURIComponent(document.getElementById(z).value);
    xmlHttp.open("GET", "foodstore.php?food="+food,true);
    xmlHttp.onreadystatechange = handleServerResponse;
    xmlHttp.send(null);
}else{
    setTimeout('process()',1000);//cekaj 1s pa probaj opet
}
}

function handleServerResponse(){
if(xmlHttp.readyState==4){ 
    if(xmlHttp.status==200){
       var  xmlResponse = xmlHttp.responseXML; //izvlaci se xml sto smo dobili
        root = xmlResponse.documentElement;
        message = root.firstChild.data;
        kat=document.getElementById("underInput");
        kat.innerHTML+= message;
        //setTimeout('process()', 1000);
    }else{
        alert('Someting went wrong !');
    }
}
}