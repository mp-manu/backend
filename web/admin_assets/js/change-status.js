function changeStatus(el){
    var id = $(el).data('id');
    var status = $(el).data('text');
    $.ajax({
        type: "POST",
        url: '/admin/editable/change-question-status',
        data: {id: id, status: status},
        success: function(responese) {
            var s = responese;
            if(s == 1){
                $(el).data("text", s);
                $("#status"+id).removeAttr("class");
                $(el).removeAttr("class");
                $(el).addClass("btn btn-success btn-xs");
                $("#status"+id).addClass("fa fa-check");
            }else{
                $(el).data("text", s);
                $("#status"+id).removeAttr("class");
                $(el).removeAttr("class");
                $(el).addClass("btn btn-danger btn-xs");
                $("#status"+id).addClass("fa fa-times");
            }
        }
    });

}


function changeStatusProccess(el){
    var id = $(el).data('id');
    var status = $(el).data('text');
    $.ajax({
        type: "POST",
        url: '/admin/editable/change-proccess-status',
        data: {id: id, status: status},
        success: function(responese) {
            var s = responese;
            if(s == 1){
                $(el).data("text", s);
                $("#pstatus"+id).removeAttr("class");
                $(el).removeAttr("class");
                $(el).addClass("btn btn-success btn-xs");
                $("#pstatus"+id).addClass("fa fa-check");
            }else{
                $(el).data("text", s);
                $("#pstatus"+id).removeAttr("class");
                $(el).removeAttr("class");
                $(el).addClass("btn btn-danger btn-xs");
                $("#pstatus"+id).addClass("fa fa-times");
            }
        }
    });

}

function changeResultStatus(el){
    var id = $(el).data('id');
    var status = $(el).data('text');
    $.ajax({
        type: "POST",
        url: '/admin/editable/change-result-status',
        data: {id: id, status: status},
        success: function(responese) {
            var s = responese;
            if(s == 1){
                $(el).data("text", s);
                $("#rstatus"+id).removeAttr("class");
                $(el).removeAttr("class");
                $(el).addClass("btn btn-success btn-xs");
                $("#rstatus"+id).addClass("fa fa-check");
            }else{
                $(el).data("text", s);
                $("#rstatus"+id).removeAttr("class");
                $(el).removeAttr("class");
                $(el).addClass("btn btn-danger btn-xs");
                $("#rstatus"+id).addClass("fa fa-times");
            }
        }
    });
}

function changeStatusPriceList(el){
    var id = $(el).data('id');
    var status = $(el).data('text');
    $.ajax({
        type: "POST",
        url: '/admin/editable/change-pricelist-status',
        data: {id: id, status: status},
        success: function(responese) {
            var s = responese;
            if(s == 1){
                $(el).data("text", s);
                $("#prstatus"+id).removeAttr("class");
                $(el).removeAttr("class");
                $(el).addClass("btn btn-success btn-xs");
                $("#prstatus"+id).addClass("fa fa-check");
            }else{
                $(el).data("text", s);
                $("#prstatus"+id).removeAttr("class");
                $(el).removeAttr("class");
                $(el).addClass("btn btn-danger btn-xs");
                $("#prstatus"+id).addClass("fa fa-times");
            }
        }
    });
}