function addClick(){
    document.getElementById("form-container").style.display="block";
}function closeClick(){
    document.getElementById("form-container").style.display="none";
}

function addClass(){
    document.getElementById("class-container").style.display="block";
    document.getElementById("add-class").focus();
}

function addmoreClass(){
    var c1 = document.createElement("option");
    var f1 = document.getElementById("add-class").value;
    c1.innerHTML=f1;
    document.getElementById("class").appendChild(c1).selected="selected";
    document.getElementById("class-container").style.display="none";
    document.getElementById("add-class").value="";
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
        var markup = '<tr><td><input id="vitri" type="text" class="job-profile"></td> <td><input id="coquan" type="text" class="job-profile"></td><td><input id="thoigian" type="number" class="job-profile"></td><td><input id="mucluong" type="text" class="job-profile"></td><td class="col-md-2"><button type="button" class="btn material-icons deleterow" style="padding:0px">delete</button></td></tr>';
        $("#job-table tbody").append(markup);
    });
});
