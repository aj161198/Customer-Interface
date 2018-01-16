function add(){
	var par = document.getElementById("add");
	var con = document.getElementById("uid");
	var child = document.createElement("div");
	child.innerHTML = con.innerHTML;
	par.appendChild(child);
}
function show(str) {
    if (str == "") {
        document.getElementById("uid_det").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("uid_det").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","fetch.php?q="+str,true);
        xmlhttp.send();
    }
}
function findTotal(){
    var arr = document.getElementsByName('price[]');
    var tot=0;
    for(var i=0;i<arr.length;i++){
        if(parseInt(arr[i].value))
            tot += parseInt(arr[i].value);
    }
    document.getElementById('total').value = tot;
}
function rebate_(){
	var total = document.getElementById("total").value;
	var rebate = document.getElementById("rebate").value;
	var purchase = total - parseInt(rebate);
	document.getElementById('purchase').value = purchase;
	return ;
}