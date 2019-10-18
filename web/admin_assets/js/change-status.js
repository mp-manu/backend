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

function changeStatusInfo(el){
    var id = $(el).data('id');
    var status = $(el).data('text');
    $.ajax({
        type: "POST",
        url: '/admin/editable/change-serviceinfo-status',
        data: {id: id, status: status},
        success: function(responese) {
            var s = responese;
            if(s == 1){
                $(el).data("text", s);
                $("#istatus"+id).removeAttr("class");
                $(el).removeAttr("class");
                $(el).addClass("btn btn-success btn-xs");
                $("#istatus"+id).addClass("fa fa-check");
            }else{
                $(el).data("text", s);
                $("#istatus"+id).removeAttr("class");
                $(el).removeAttr("class");
                $(el).addClass("btn btn-danger btn-xs");
                $("#istatus"+id).addClass("fa fa-times");
            }
        }
    });
}


$("#info-form").on( "click", function() {
    var status = 'question-form';
    var content = document.getElementById("frm-content");
    $.ajax({
        type: "POST",
        url: '/admin/services/get-info-form',
        data: {status: status},
        success: function(response) {
            content.innerHTML = response;
            $("#question-form").hide();
        }

    });
});

$("#question-form").on( "click", function() {
    var status = 'question-form';
    var content = document.getElementById("frm-content");
    $.ajax({
        type: "POST",
        url: '/admin/services/get-question-form',
        data: {status: status},
        success: function(response) {
            content.innerHTML = response;
            $("#question-form").hide();
        }

    });
});



$("#proccess-form").on( "click", function() {
    var status = 'question-form';
    var content = document.getElementById("frm-content");
    $.ajax({
        type: "POST",
        url: '/admin/services/get-question-form',
        data: {status: status},
        success: function(response) {
            content.innerHTML = response;
            $("#question-form").hide();
        }

    });
});

$("#result-form").on( "click", function() {
    var status = 'question-form';
    var content = document.getElementById("frm-content");
    $.ajax({
        type: "POST",
        url: '/admin/services/get-question-form',
        data: {status: status},
        success: function(response) {
            content.innerHTML = response;
            $("#question-form").hide();
        }

    });
});

$("#price-list").on( "click", function() {
    var status = 'question-form';
    var content = document.getElementById("frm-content");
    $.ajax({
        type: "POST",
        url: '/admin/services/get-question-form',
        data: {status: status},
        success: function(response) {
            content.innerHTML = response;
            $("#question-form").hide();
        }

    });
});