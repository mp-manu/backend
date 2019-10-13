function f(el) {
    var id = $(el).data('id');
    var status = $(el).data('text');
    $.ajax({
        type: "POST",
        url: '/request/change-call-status',
        data: {call_id: id, status: status},
        success: function(responese) {
            var s = responese;
            if(!s){
                alert('Невозможно изменить статус!');
            }else{
                $(el).data("text", s);
                if(s == 1){
                    $(el).text("В ожидании");
                    $(el).removeAttr("class");
                    $(el).addClass("label label-md label-warning");
                }else if(s == 0){
                    $(el).text("Выполнено");
                    $(el).removeAttr("class");
                    $(el).addClass("label label-md label-success");
                }else{
                    $(el).text("Отказано");
                    $(el).removeAttr("class");
                    $(el).addClass("label label-md label-danger");
                }

            }
        }
    });
}

function order(el) {
    var id = $(el).data('id');
    var status = $(el).data('text');
    $.ajax({
        type: "POST",
        url: '/request/change-order-status',
        data: {order_id: id, status: status},
        success: function(responese) {
            var s = responese;
            if(!s){
                alert('Невозможно изменить статус!');
            }else{
                $(el).data("text", s);
                if(s == 1){
                    $(el).text("В ожидании");
                    $(el).removeAttr("class");
                    $(el).addClass("label label-md label-warning");
                }else if(s == 0){
                    $(el).text("Выполнено");
                    $(el).removeAttr("class");
                    $(el).addClass("label label-md label-success");
                }else{
                    $(el).text("Отказано");
                    $(el).removeAttr("class");
                    $(el).addClass("label label-md label-danger");
                }

            }
        }
    });
}


function contact(el) {
    var id = $(el).data('id');
    var status = $(el).data('text');

    $.ajax({
        type: "POST",
        url: '/request/change-contact-status',
        data: {contact_id: id, status: status},
        success: function(responese) {
            var s = responese;
            if(!s){
                alert('Невозможно изменить статус!');
            }else{
                $(el).data("text", s);
                if(s == 1){
                    $(el).text("В ожидании");
                    $(el).removeAttr("class");
                    $(el).addClass("label label-md label-warning");
                }else if(s == 0){
                    $(el).text("Прочитано");
                    $(el).removeAttr("class");
                    $(el).addClass("label label-md label-success");
                }else{
                    $(el).text("Отказано");
                    $(el).removeAttr("class");
                    $(el).addClass("label label-md label-danger");
                }

            }
        }
    });
}



function question(el) {
    var id = $(el).data('id');
    var status = $(el).data('text');
    var text =  $('textarea#answer').val();


    $.ajax({
        type: "POST",
        url: '/request/change-question-status',
        data: {question_id: id, status: status, answer: text},
        success: function(responese) {
            var s = responese;
            if(!s){
                alert('Невозможно отправить ответ!');
            }else{
                $(el).data("text", s);
                if(s == 1){
                    $(el).text("В ожидании");
                    $(el).removeAttr("class");
                    $(el).addClass("label label-md label-warning");
                    $('textarea#answer').removeAttr("readonly");
                }else if(s == 0){
                    $(el).text("Отвечено");
                    $(el).removeAttr("class");
                    $(el).addClass("label label-md label-success");
                    $('textarea#answer').attr("readonly", "true");
                }else{
                    $(el).text("Отказано");
                    $(el).removeAttr("class");
                    $(el).addClass("label label-md label-danger");
                }

            }
        }
    });
}