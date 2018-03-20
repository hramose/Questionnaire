
$(document).ready(function() {
    $("#saveform").click(function(){
        var questionname = $("#questionname").val();
        var numberofquestions = $("#numberofquestions").val();
        var durationval = $("#duration").val();
        var durationin = $("#durationin").val();
        var duration = durationval+' '+durationin;
        var canresume = '';
        $('input[name="canresume"]:checked').each(function() {
            canresume = this.value;
        });
        $.ajax({
            headers : {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: '/saveQuestion',
            type: 'POST',
            data: {
                'questionname' : questionname,
                'numberofquestions' : numberofquestions,
                'duration': duration,
                'resumeable' : canresume
            },
            success:function(data) {
                if(data.error){
                    new PNotify({
                        title: 'Wrong data',
                        text: "Please Enter Correct Data.",
                        animateSpeed: "normal",
                        animation: "fade",
                        hide: true,
                        type: "error"
                    });
                }
                else
                {
                    new PNotify({
                        title: 'Yaaay!',
                        text: "Successfully Created Questionnaire.",
                        animateSpeed: "normal",
                        animation: "fade",
                        hide: true,
                        type: "success"
                    });
                    var getUrl = window.location;
                    var baseUrl = getUrl .protocol + "//" + getUrl.host + "/questionnaire";
                    window.location.replace(baseUrl);
                }
            }
        });

    });
    $("#updatequestionnaire").click(function(){
        var QuestionnaireId = $("#editid").val();
       var editedname = $("#editedname").val();
       var editednumber = $("#editednumber").val();
       var editedduration = $("#editedduration").val();
       var durationinedit = $("#durationinedit").val();
       var canresumedit = '';
       var published = '';
        $('input[name="canresumeedit"]:checked').each(function() {
            canresumedit = this.value;
        });
        $('input[name="publishededit"]:checked').each(function() {
            published = this.value;
        });
        $.ajax({
            headers : {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: '/saveEditeddata',
            type: 'POST',
            data: {
                'QuestionnaireId' : QuestionnaireId, 'editedname' : editedname, 'editednumber' : editednumber,
                'editedduration' : editedduration, 'durationinedit' : durationinedit, 'canresumedit' : canresumedit,
                'published' : published
            },
            success:function(data) {
                if(data.success)
                {
                    new PNotify({
                        title: 'Yaaay!',
                        text: data.success,
                        animateSpeed: "normal",
                        animation: "fade",
                        hide: true,
                        type: "success"
                    });
                    window.location.reload();
                }
            }
        });
    });
    $("#typeofquestion").on('change', function(){
       if(this.value == 'text')
       {
           $("#questionanswer").css("display", "block");
           $("#mcqsoptions").css("display", "none");
       }
       else if(this.value == 'mcq') {
           $("#mcqsoptions").css("display", "block");
           $("#questionanswer").css("display", "none");
       }
       else
       {
           $("#mcqsoptions").css("display", "none");
           $("#questionanswer").css("display", "none");
       }
    });
    $("#savebtnqa").click(function(){
       var question = $("#question").val();
       var answer = $("#answer").val();
       var id = $("#idofquestion").val();
        $.ajax({
            headers : {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: '/savequestionnairequestion',
            type: 'POST',
            data: {
                'id' : id, 'question': question, 'answer' : answer
            },
            success:function(data) {
                if(data.success)
                {
                    new PNotify({
                        title: 'Yaaay!',
                        text: data.success,
                        animateSpeed: "normal",
                        animation: "fade",
                        hide: true,
                        type: "success"
                    });
                    var getUrl = window.location;
                    var baseUrl = getUrl .protocol + "//" + getUrl.host + "/questionnaire";
                    window.location.replace(baseUrl);
                }
            }
        });
    });
    $("#savebtnmcq").click(function(){
        var question = $("#questionformcqid").val();

        var correctc
        $('input[name="correctchoice"]:checked').each(function() {
            correctchoice = this.value;
        });
        var id = $("#idofquestion").val();
        $.ajax({
            headers : {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: '/savequestionnairequestion',
            type: 'POST',
            data: {
                'id' : id, 'question': question, 'answer' : answer
            },
            success:function(data) {
                if(data.success)
                {
                    new PNotify({
                        title: 'Yaaay!',
                        text: data.success,
                        animateSpeed: "normal",
                        animation: "fade",
                        hide: true,
                        type: "success"
                    });
                    var getUrl = window.location;
                    var baseUrl = getUrl .protocol + "//" + getUrl.host + "/questionnaire";
                    window.location.replace(baseUrl);
                }
            }
        });
    });
});

function editthis(id){
    $.ajax({
        headers : {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: '/editQuestionform',
        type: 'POST',
        data: {
            'id' : id
        },
        success:function(data) {
            $("#editform").modal('toggle');
            $("#editid").val(data.id);
            $("#editedname").val(data.name);
            $("#editednumber").val(data.numberofquestions);
            var duration = data.duration.split(" ");
            $("#editedduration").val(duration[0]);
            $("#durationinedit").val(duration[1]);
            $("input[name=canresumeedit][value=" + data.resumeable + "]").attr('checked', 'checked');
            $("input[name=publishededit][value=" + data.published + "]").attr('checked', 'checked');
        }
    });
}
function deletethis(id)
{
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this Questionnaire!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                headers : {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: '/deleteQuestion',
                type: 'post',
                data: {
                    'id' : id
                },
                success:function(data) {
                    swal("Poof! Your Questionnaire has been deleted!", {
                        icon: "success",
                    });
                    window.location.reload();
                }
            });
        } else {
            swal("Your Questionnaire is safe!");
}
});
}
