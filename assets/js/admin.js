
;(function($){
    $(document).ready(function () {
       $("#post-formats-select .post-format").on("click",function () {
           if($(this).attr("id")=="post-format-image"){
               $("#_gabtoli_image_information").show();
           }else {
               $("#_gabtoli_image_information").hide();

           }
       });
        if(gabtoli_pf.format!='image'){
            $("#_gabtoli_image_information").hide();
        }

    });
})(jQuery);