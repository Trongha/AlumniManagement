function addClass(){
    document.getElementById("class-container").style.display="block";
    document.getElementById("add-class").focus();
    console.log("ditme");
}

function addmoreClass(){
    var c1 = document.createElement("option");
    var f1 = document.getElementById("add-class").value;
    if(f1!=""){
    c1.innerHTML=f1;
    document.getElementById("class").appendChild(c1).selected="selected";
    document.getElementById("add-class").value="";
    }
    document.getElementById("class-container").style.display="none";
}

function addnewjob(){
    c1=document.createElement("tr");
    c11=document.createElement("td");
    document.getElementById("job-table").appendChild(c1);
    c1.appendChild(c11);
    c11.appendChild("input");

}
$(document).ready(function (){
    $("#newjob").click(function(){
        
        var markup = '<tr><td><input class="vitri" type="text" ></td><td><input class="coquan" type="text" ></td><td><input class="thoigian" type="number" ></td><td><input class="mucluong" type="text" ></td><td class="col-md-2"><button type="button" class="btn material-icons deleterow" style="padding:0px; background-color: white" onclick="deleteRowNow(event)">delete</button></td></tr>';
        $("#job-table tbody").append(markup);
    });
});
function deleteRowNow(e) {
    var rowToDelete = event.target.parentNode.parentNode;
    rowToDelete.remove();
}
function chapnhan(){
    okie=true;
    if(document.getElementById("password").value!=document.getElementById("repassword").value){
        alert("Mật khẩu không trùng khớp!");
        okie=false;
    }
    if(okie){}
    //submit
}
function ChuanhoaTen(ten) {
	dname = ten;
	ss = dname.split(' ');
	dname = "";
	for (i = 0; i < ss.length; i++)
		if (ss[i].length > 0) {
			if (dname.length > 0) dname = dname + " ";
			dname = dname + ss[i].substring(0, 1).toUpperCase();
			dname = dname + ss[i].substring(1).toLowerCase();
		}
	return dname;
}
