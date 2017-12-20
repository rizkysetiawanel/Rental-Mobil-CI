function updateInv() {
    $.ajax({
        url: bu+'cpublic/checkinv', //php          
        data: "", //the data "caller=name1&&callee=name2"
        dataType: false, //data format   
        success: function (data) {
            
        }
    });
}

$(document).ready(updateInv);
setInterval(updateInv, 10000);