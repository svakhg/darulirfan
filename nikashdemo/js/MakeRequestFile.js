

//Create a boolean variable to check for a valid Internet Explorer instance.
var xmlhttp = false;
//Check if we are using IE.
try {
//If the Javascript version is greater than 5.
    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
//alert ("You are using Microsoft Internet Explorer.");
} catch (e) {
//If not, then use the older active x object.
    try {
//If we are using Internet Explorer.
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
//alert ("You are using Microsoft Internet Explorer");
    } catch (E) {
//Else we must be using a non-IE browser.
        xmlhttp = false;
    }
}
//If we are using a non-IE browser, create a javascript instance of the object.
if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
    xmlhttp = new XMLHttpRequest();
//alert ("You are not using Microsoft Internet Explorer");
}

function makerequestPost(str, objID, method)
{
//    alert(method);
    //var obj = document.getElementById(objID);
    if (str) {
        xmlhttp.open("POST", method + "/" + str);
        xmlhttp.onreadystatechange = function()
        {
            //alert(xmlhttp.readyState);
//        alert(xmlhttp.responseText);
//	alert(xmlhttp.status);
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {
                document.getElementById(objID).innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.send(null);
    }
}

function makerequestGet(serverPage, objID)
{

    xmlhttp.open("GET", serverPage);
    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById(objID).innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.send(null);
    document.getElementById(objID).innerHTML = "Loading...";

}
function makerequestVoucher(serverPage, objID,v_no_name)
{
    //--------extra content for payment_method
    if (objID == 'payment_method') {
        document.getElementById('voucher_no').value = v_no_name+1;
//        document.getElementById('voucher_no').value += v_no_name;
    }
    //------end

    xmlhttp.open("GET", serverPage);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
//            var data = JSON.parse(hr.responseText);
//                for (var obj in data) {
//                    division.innerHTML += data[obj].ProLevel3 + ' - ';
//                    division.innerHTML += data[obj].ProDebit + ' - ';
//                    division.innerHTML += data[obj].ProCredit + '<hr/>';
            document.getElementById(objID).innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.send(null);
    document.getElementById(objID).innerHTML = "Loading...";

}
//
//function ajax_get_json() {
//        var division = document.getElementById("load_td");
////        division.innerHTML="<table></table>";
//
//        var voucher_no = document.getElementById('voucher_no').value;
//        var level3 = document.getElementById('level3_id').value;
//        var debit = document.getElementById('debit').value;
//        var credit = document.getElementById('credit').value;
////        alert(debit);
////        alert(credit);
//
//        var hr = new XMLHttpRequest();
//        var url = "<?php echo base_url(); ?>json/voucher_json.php";
//        hr.open("POST", url, true);
//        hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//        hr.onreadystatechange = function() {
//            if (hr.readyState == 4 && hr.status == 200) {
//                var data = JSON.parse(hr.responseText);
//                division.innerHTML = '';
//                for (var obj in data) {
//                    division.innerHTML += data[obj].ProLevel3 + ' - ';
//                    division.innerHTML += data[obj].ProDebit + ' - ';
//                    division.innerHTML += data[obj].ProCredit + '<hr/>';
//
//
//
//                    document.getElementById('debit').value = '';
//                    document.getElementById('credit').value = ''
//                }
//            }
//        }
//        hr.send("voucher_no=" + voucher_no + "&level3=" + level3 + "&debit=" + debit + "&credit=" + credit);
//        division.innerHTML = "Requesting...";
//    }