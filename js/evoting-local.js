/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).on("click", ".open-confirmDialog", function () {
    var castID = $(this).data('id');
    var pname = $(this).data('pname');
    var concode = $(this).data('concode');
    var pscode = $(this).data('ps');
    $(".modal-footer #castPid").val(castID);
    $(".modal-footer #pname").val(pname);
    $(".modal-footer #concode").val(concode);
    $(".modal-footer #pscode").val(pscode);
});

function explode () {
        $("#castDiv").addClass("enableDiv");
    }
    
function LockAndPlay() {
    $("#castDiv").addClass("disableDiv"); 
    var audio = document.getElementById("audio");
    audio.play();
    setTimeout(explode, 5000);
}
document.getElementById("Print").onclick = function(){
    printElement(document.getElementById("dataTable-result"));
};
function printElement(elem){
    var domClone = elem.cloneNode(true);
    var $printSection = document.getElementById("printSection");
    if(!$printSection){
        var $printSection = document.createElement("div");
        $printSection.id = "printSection";
        document.body.appendChild($printSection);
    }
    $printSection.innerHTML = "";
    $printSection.appendChild(domClone);
    window.print();
}