$(document).ready(function(){
    $("#signin").click(function(){
        let username = $("#username").val()
        let password = $("#password").val()
        $.ajax({
            type : "POST",
            url : "sys/main.php",
            data : {
                "type" : "login",
                "username" : username,
                "password" : password
            },
            beforeSend : function(){
                $("#fail-msg").html("โปรดเติมข้อมูลให้ครบ")
                if(username.length == 0){
                    $("#username").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(password.length == 0){
                    $("#password").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                }
            }
        })
        .done(function(data){
            if(data == "success"){
                $("#success-msg").html("Logged in!")
                $("#success-box").fadeIn()
                setTimeout(function(){
                    window.location.href="backend.index.php";
                }, 1000);
            } else if (data = "wrong"){
                $("#fail-msg").html("Username or Password is incorrect!")
                $("#fail-box").fadeIn()
                setTimeout(function(){
                    $("#fail-box").fadeOut()
                }, 1000);
            } else {
                $("#fail-msg").html("Something went wrong !")
                $("#fail-box").fadeIn()
                setTimeout(function(){
                    $("#fail-box").fadeOut()
                }, 1000);
            }
        })
    })
    $("#add-task").click(function(){
        let addname = $("#add-name").val()
        let addowner = $("#add-owner").val()
        let adddeadline = $("#add-deadline").val()
        let adddetail = $("#add-detail").val()

        $.ajax({
            type : "POST",
            url : "sys/main.php",
            data : {
                "type" : "addtask",
                "addname" : addname,
                "addowner" : addowner,
                "adddeadline" : adddeadline,
                "adddetail" : adddetail
            },
            beforeSend : function(){
                $("#fail-msg").html("โปรดเติมข้อมูลให้ครบ")
                if(addname.length == 0){
                    $("#add-name").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(addowner.length == 0){
                    $("#add-owner").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(adddeadline.length == 0){
                    $("#add-deadline").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(adddetail.length == 0){
                    $("#add-detail").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                }
            }
        })
        .done(function(data){
            if(data == "success"){
                $("#success-msg").html("Saved !")
                $("#success-box").fadeIn()
                setTimeout(function(){
                    window.location.href="backend.index.php";
                }, 1000);
            } else {
                $("#fail-msg").html("Something went wrong !")
                $("#fail-box").fadeIn()
                setTimeout(function(){
                    $("#fail-box").fadeOut()
                }, 1000);
            }
        })
    })
    $("#edit-task").click(function(){
        let editid = $("#edit-id").val()
        let editname = $("#edit-name").val()
        let editowner = $("#edit-owner").val()
        let editdeadline = $("#edit-deadline").val()
        let editdetail = $("#edit-detail").val()

        $.ajax({
            type : "POST",
            url : "sys/main.php",
            data : {
                "type" : "edittask",
                "editid" : editid,
                "editname" : editname,
                "editowner" : editowner,
                "editdeadline" : editdeadline,
                "editdetail" : editdetail
            },
            beforeSend : function(){
                $("#fail-msg").html("โปรดเติมข้อมูลให้ครบ")
                if(editname.length == 0){
                    $("#edit-name").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(editowner.length == 0){
                    $("#edit-owner").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(editdeadline.length == 0){
                    $("#edit-deadline").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                } else if(editdetail.length == 0){
                    $("#edit-detail").css("border", "2px solid red")
                    $("#fail-box").fadeIn()
                    setTimeout(function(){
                        $("#fail-box").fadeOut()
                    }, 1000);
                    return false;
                }
            }
        })
        .done(function(data){
            if(data == "success"){
                $("#success-msg").html("Saved !")
                $("#success-box").fadeIn()
                setTimeout(function(){
                    window.location.href="backend.index.php";
                }, 1000);
            } else {
                $("#fail-msg").html("Something went wrong !")
                $("#fail-box").fadeIn()
                setTimeout(function(){
                    $("#fail-box").fadeOut()
                }, 1000);
            }
        })
    })
    $.ajax({
        data : {
            "type" : "getTaskList"
        },
        url : "sys/main.php",
        type : "POST",
        success: function(data){
            for(i = 1; i <= data; i++){
                $("#btn-done-task-" + i).click(function(){
                    var donetaskid = event.target.id
                    var donetaskid = donetaskid.split("-")
                    var donetaskid = donetaskid[3]
                    $.ajax({
                        data : {
                            "type" : "donetask",
                            "id" : donetaskid
                        },
                        type : "POST",
                        url : "sys/main.php"
                    })
                    .done(function(result){
                        console.log(result)
                        if(result == "success"){
                            $("#success-msg").html("Saved !")
                            $("#success-box").fadeIn()
                            setTimeout(function(){
                                window.location.href="backend.index.php";
                            }, 1000);
                        } else {
                            $("#fail-msg").html("Something went wrong !")
                            $("#fail-box").fadeIn()
                            setTimeout(function(){
                                $("#fail-box").fadeOut()
                            }, 1000);
                        }
                    })
                })
            }
        }
    })
})