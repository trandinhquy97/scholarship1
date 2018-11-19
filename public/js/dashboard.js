$(document).ready(function() {
  var modalConfirm = function(callback){
      console.log("hello");
    $(".btn-reset").on("click", function(){
      console.log("reset");
    });

    
    $(".btn-del").on("click", function(){
      console.log("xoa acc"+$(this).attr("id"));
      showAlert("Bạn có muốn xóa tài khoản này không?");
      $("#modal-btn-yes").attr("op", "del");
      $("#modal-btn-yes").attr("idi", $(this).attr("id"));
    });
    $(".btn-ban").on("click", function(){
      console.log("ban acc"+$(this).attr("id"));
      showAlert("Bạn có muốn khóa tài khoản này không?");
      $("#modal-btn-yes").attr("op", "ban");
      $("#modal-btn-yes").attr("idi", $(this).attr("id"));
    });

    $("#modal-btn-yes").on("click", function(){
      callback(true);
      $("#mi-modal").modal('hide');
    });
    
    $("#modal-btn-no").on("click", function(){
      callback(false);
      $("#mi-modal").modal('hide');
    });

    function showAlert(mess){
          $("#myModalLabel").html(mess);
          $("#mi-modal").modal('show');
    }
    
  };
  modalConfirm(function(confirm){
    if(confirm){
      close = "<a class=\"close\" data-dismiss=\"alert\" aria-label=\"close\"></a>";
      $.get(window.location.href+"/"+$("#modal-btn-yes").attr("op")+"/"+$("#modal-btn-yes").attr("idi"), function(res){
        $("#alert-return").html(res[1]);
        switch (res[0]) {
        case 999:
          $("#alert-return").attr("class", "alert alert-success alert-dismissible");
          break;
        case 555:
          $("#alert-return").attr("class", "alert alert-fail alert-dismissible");
          break;
        }
      });
      console.log("xóa")
      $("#modal-btn-yes").attr("op");
    }else{

    }
  });

  
});
