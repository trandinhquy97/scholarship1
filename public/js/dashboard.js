$(document).ready(function() {
  var modalConfirm = function(callback){
      console.log("hello");
    $(".btn-upg").on("click", function(){
      console.log("upgrade");
      showAlert("Thay đổi loại tài khoản");
      $(".modal-center").html("<select class=\"form-control\" id=\"sel1\"><option r=\"1\">Sinh viên</option><option r=\"2\">Tổ chức</option><option>Nhân viên</option><option>Người đăng tin</option><option>Quản trị viên</option><option>Kiểm duyệt viên</option></select>");
      //$(".form-control").val($("#rl"+$(this).attr("id")).html());
      $("#modal-btn-yes").attr("meth", "PUT");
      $("#modal-btn-yes").attr("op", "1");

      $("#modal-btn-yes").attr("idi", $(this).attr("id"));
    });

    $(".btn-reset").on("click", function(){
      console.log("reset");
      showAlert("Reset mật khẩu tài khoản");
      $(".modal-center").html("Mật khẩu <input id=\"repass\" type=\"text\">");
      $("#modal-btn-yes").attr("meth", "PUT");
      $("#modal-btn-yes").attr("op", "2");
      $("#modal-btn-yes").attr("idi", $(this).attr("id"));

    });

    
    $(".btn-del").on("click", function(){
      console.log("xoa acc"+$(this).attr("id"));
      if($(".btn"))
      showAlert("Bạn có muốn xóa không?");
      $("#modal-btn-yes").attr("meth", "DELETE");
      $("#modal-btn-yes").attr("idi", $(this).attr("id"));
    });
    $(".btn-del-sl").on("click", function(){
      console.log("xoa scholar"+$(this).attr("id"));
      if($(".btn"))
      showAlert("Bạn có muốn xóa bài viết này không?");
      $("#modal-btn-yes").attr("meth", "DELETE");
      $("#modal-btn-yes").attr("idi", $(this).attr("id"));
    });
    $(".btn-ck-sl").on("click", function(){
      console.log("cf scholar"+$(this).attr("id"));
      if($(".btn"))
      showAlert("Bạn có muốn xác nhận bài viết này không?");
      $("#modal-btn-yes").attr("meth", "POST");
      $("#modal-btn-yes").attr("idi", $(this).attr("id"));
    });
    $(".btn-ignore-sl").on("click", function(){
      console.log("cf scholar"+$(this).attr("id"));
      if($(".btn"))
      showAlert("Xác nhận không duyệt bài viết này?");
      $("#modal-btn-yes").attr("meth", "PUT");
      $("#modal-btn-yes").attr("idi", $(this).attr("id"));
    });
    
    $(".btn-ban").on("click", function(){
      console.log("ban acc"+$(this).attr("id")+$(this).attr("value"));
      if($(this).attr("value") == 1)
        showAlert("Bạn có muốn khóa tài khoản này không?");
      else
        showAlert("Bạn có muốn mở khóa tài khoản này không?")
      $("#modal-btn-yes").attr("meth", "PUT");
      $("#modal-btn-yes").attr("op", "3");
      $("#modal-btn-yes").attr("idi", $(this).attr("id"));
      $("#modal-btn-yes").attr("dt", $(this).attr("value"));
    });

    $("#modal-btn-yes").on("click", function(){
      if($("#modal-btn-yes").attr("meth")==="PUT"){
        op = parseInt($("#modal-btn-yes").attr("op"));
        switch (op) {
          case 1:
            $("#modal-btn-yes").attr("dt", $("#sel1").prop('selectedIndex'));
            break;
          case 2:
            $("#modal-btn-yes").attr("dt", $("#repass").val());
            break;
        }
      }
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

  function refreshTable(obj){
    var st = ["<span class=\"badge-text badge-text-small danger\">Khóa</span>","<span class=\"badge-text badge-text-small success\">Hoạt động</span>"];
    var rl = ["Sinh viên","Tổ chức","Nhân viên","Người đăng tin", "Quản trị viên", "Kiểm duyệt viên"];
    var lk = ["<i class=\"la la-unlock-alt delete\"></i>","<i class=\"la la-lock delete\"></i>"]
    if(obj){
      $("#st"+obj.id).html(st[obj.id_TrangThai]);
      $("#rl"+obj.id).html(rl[obj.kt_Quyen-1]);
      $("#"+obj.id+".btn-ban").html(lk[obj.id_TrangThai]);
      $("#"+obj.id+".btn-ban").attr("value", obj.id_TrangThai);
      console.log("fre"+parseInt(obj.id_TrangThai));
    }
    
  }
  modalConfirm(function(confirm){
    if(confirm){
      // close = "<a class=\"close\" data-dismiss=\"alert\" aria-label=\"close\"></a>";
      $.ajax({
          url: window.location.href,
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          method: $("#modal-btn-yes").attr("meth"), // method is any HTTP method
          data: 
          {
            'idi': $("#modal-btn-yes").attr("idi"), 
            'op': $("#modal-btn-yes").attr("op"), 
            'data': $("#modal-btn-yes").attr("dt")}, // data as js object
          success: function(result) {
            $("#alert-return").html(result[1]);
            switch (result[0]) {
              case 999:
                $("#alert-return").attr("class", "alert alert-success alert-dismissible");
                if($("#modal-btn-yes").attr("meth")==='DELETE' || 
                  (window.location.href.indexOf('approval') != -1 )){
                  location.reload();
                }
                break;
              case 555:
                $("#alert-return").attr("class", "alert alert-danger alert-dismissible");
                break;
            }
            refreshTable(result[2]);
          }
      });
      $("#modal-btn-yes").attr("op");
    }else{

    }
    $(".modal-center").html("");


  });

  
});
