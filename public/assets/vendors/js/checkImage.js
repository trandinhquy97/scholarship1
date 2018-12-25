
$(document).on('change','#im',function () {
   $sizeimg = $("#im")[0].files[0].size;
     if($sizeimg >2048000)
     {
         alert("Size of image is over 2048 Kb");
         $("#im").val('');

     }
})