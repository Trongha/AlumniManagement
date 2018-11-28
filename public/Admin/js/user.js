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
        
        var markup = '<label class="col-md-3 control-label"></label><div id="one-job"><div class="col-md-9"><input class="vitri form-control" name="vitri[]" placeholder="Vị trí" type="text" required></div><label class="col-md-3 control-label"></label><div class="col-md-9"><input class="coquan form-control" name="coquan[]" placeholder="Cơ quan" type="text" required></div><label class="col-md-3 control-label"></label><div class="col-md-9"><input class="thoigian form-control" placeholder="Thời gian" name="thoigian[]" type="text" required></div><label class="col-md-3 control-label"></label><div class="col-md-9"><input class="mucluong form-control" placeholder="Mức lương(USD)" name="mucluong[]" type="number" class="job-profile" required></div><label class="col-md-3 control-label"></label><div class="col-md-9"><button type="button" class="btn material-icons deleterow" style="padding:0px; background-color: white" onclick="deleteRowNow(event)">delete</button></div></div>';
        $("#job-profile").append(markup);
    });
});
function deleteRowNow(e) {
    var rowToDelete = event.target.parentNode.parentNode;
    rowToDelete.remove();
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
function isuser(){
    var vitri=document.getElementsByClassName("vitri");
    
    var coquan=document.getElementsByClassName("coquan");
    var thoigian=document.getElementsByClassName("thoigian");
    var mucluong= document.getElementsByClassName("mucluong");
    if(document.getElementById("role-user").checked){
    document.getElementById("user-info").style.display="block";
    document.getElementById("name").required=true;
    document.getElementById("dob").required=true;
    document.getElementById("msv").required=true;
    document.getElementById("email").required=true;
    document.getElementsByClassName("vitri").required=true;
    document.getElementsByClassName("coquan").required=true;
    document.getElementsByClassName("thoigian").required=true;
    document.getElementsByClassName("mucluong").required=true;
    
    for (i=0;i<vitri.length;i++){
        vitri[i].required=true;
    }
    for (i=0;i<coquan.length;i++){
        coquan[i].required=true;
    }
    for (i=0;i<thoigian.length;i++){
        thoigian[i].required=true;
    }
    for (i=0;i<mucluong.length;i++){
        mucluong[i].required=true;
    }}
    else{
    document.getElementById("role-admin").checked=true;
    document.getElementById("user-info").style.display="none";
    document.getElementById("name").required=false;
    document.getElementById("dob").required=false;
    document.getElementById("msv").required=false;
    document.getElementById("email").required=false;
    for (i=0;i<vitri.length;i++){
        vitri[i].required=false;
    }
    for (i=0;i<coquan.length;i++){
        coquan[i].required=false;
    }
    for (i=0;i<thoigian.length;i++){
        thoigian[i].required=false;
    }
    for (i=0;i<mucluong.length;i++){
        mucluong[i].required=false;
    }
    
}
}


