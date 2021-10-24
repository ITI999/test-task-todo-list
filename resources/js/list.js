$(document).ready(function (){


    $('.update-status').click(function (e){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        let id = this.value;
        $.ajax({
            url: "../task/check/" + id,
            method: "POST",
            success: function (data){
                if(!data){
                    // console.log("#title-" + id);
                    $("#title-" + id).removeClass("complete-task");
                } else {
                    $("#title-" + id).addClass("complete-task");
                }
            },
            error: function (error){
                e.preventDefault();
            }
        });

    });
});
