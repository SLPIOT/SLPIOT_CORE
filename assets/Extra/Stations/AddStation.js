$(document).ready(function(){
    $("#txtStationCode").val(generateUUID());
    
});


function generateUUID () { // Public Domain/MIT
    var d = new Date().getTime();
    if (typeof performance !== 'undefined' && typeof performance.now === 'function'){
        d += performance.now(); //use high-precision timer if available
    }
    return 'xxxxxxxx-xxxx-xx'.replace(/[xy]/g, function (c) {
        var r = (d + Math.random() * 16) % 16 | 0;
        d = Math.floor(d / 16);
        return (c === 'x' ? r : (r & 0x3 | 0x8)).toString(16);
        });
}

function insertData(){
    $.ajax({
        type: "POST",
        url: "addStation",
        data: $("#frmStation").serialize(),
        cache: false,
        success:  function(data){
            alert("Data Inserted " + data + " success");
        },
        error: function (error) {
            console.log(error);
            alert("Data Error " + error + " error");
        }
    });
}
