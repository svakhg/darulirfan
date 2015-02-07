

function goodbye(e) {
    if (!e)
        e = window.event;
    e.cancelBubble = true;
    e.returnValue = 'You sure you want to leave?';
    if (e.stopPropagation) {
        e.stopPropagation();
        e.preventDefault();
    }
}
//    window.onbeforeunload = goodbye;

function setfocus(objID) {
    if (!isNaN(objID)) {
        objID = 'level3_id';
    }
    document.getElementById(objID).focus();
}
function print(data)
{
	var a = window.open ('',  '',"status=1,scrollbars=1, width=700,height=800");
	a.document.write(document.getElementById(data).innerHTML.replace(/<a\/?[^>]+>/gi, ''));
	a.document.close();
	a.focus();
	a.print();
	a.close();
}