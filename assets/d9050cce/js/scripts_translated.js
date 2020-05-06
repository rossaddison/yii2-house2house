function getTranslatedticks (){
    var keys = $('#w2').yiiGridView('getSelectedRows'); 
    $.post({ type: "GET",
             url: '/translated/translated/',
        dataType: "json",
        data: {keylist: keys,
        },
        //success: alert("The following records were translated: " + keys)
        success: $.pjax.reload({container:'#kv-unique-id-43'})    
    });
}

function getGocardlesspayticks (){
    var keys = $('#w0').yiiGridView('getSelectedRows'); 
    $.post({ type: "GET",
             url: '/salesorderdetail/takeoneoffpayment/',
        dataType: "json",
        data: {keylist: keys,               
        },
        success: alert("The following Gocardless customer was sent a one-off advance payment requests:" + keys)
    });  
}