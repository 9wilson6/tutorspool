$(function(){
setInterval(function() {
      let interval="xxl";
        $("#messageBox").load("../chat.php", {
           project_id: project_id,
           user_type: user_type,
           interval: interval
        });
        // alert(project_id+"user"+user_type);
    
    }, 500);

 $('#messageBox').stop().animate({ scrollTop: $('#messageBox')[0].scrollHeight});

 $('textarea').keyup(function(){
    // alert(user_type);
    $.post("../chat.php", {
           project_id: project_id,
           user_type: user_type,
           event: "keylistener"
        });   
 });
 
 
});
