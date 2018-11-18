function addClass(){
    document.getElementById("class-container").style.display="block";
    document.getElementById("add-class").focus();
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
        
        var markup = '<tr><td><input class="vitri" name="vitri[]" type="text" ></td><td><input class="coquan" name="coquan[]" type="text" ></td><td><input class="thoigian" name="thoigian[]" type="number" ></td><td><input class="mucluong" name="mucluong[]" type="text" ></td><td class="col-md-2"><button type="button" class="btn material-icons deleterow" style="padding:0px; background-color: white" onclick="deleteRowNow(event)">delete</button></td></tr>';
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
    else if(!document.getElementById("role-user").checked&&!document.getElementById("role-admin").checked){
        alert("Bạn chưa chọn quyền!");
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
document.getElementById("role-user").onClick(function(e){
    console.log("wtf");
    if (this.checked){
        document.getElementById("user-info").style.display="block";
    }
    else
    {
        document.getElementById("user-info").style.display="none";
    }
});
function isuser(){
    if(document.getElementById("role-user").checked)
    document.getElementById("user-info").style.display="block";
    else{
    document.getElementById("user-info").style.display="none";
}
}

