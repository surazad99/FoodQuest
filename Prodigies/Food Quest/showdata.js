function showdata(){
	var string;
	string=document.getElementById("search").value;
	if(string=="lassi")
	{
	window.open('showdata.html');
	}
	else
	{
		document.write("error");
	}

}
function edit(){
	document.write("inside edit");
}
function delete(){
	document.write("inside delete");
}

