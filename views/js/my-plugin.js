$(document).ready(function(){
    $(".tbl-users td.clickeable").click(function(){
        var aid = $(this).parent().attr("aid");
            //alert(aid);
            $.ajax({
                url: document.URL,
                type: "POST",
                data: {
                    "type": "details",
                    "id": aid
                },
                complete: function(response){
                    var obj = JSON.parse(response.responseText);
                    console.log(obj);
                    var accordion_id="acc";
                    $("#mymodal div.modal-body").html("");
                    $("#mymodal div.modal-body").append("<div class='accordion' id='"+accordion_id+"'>");

                    $.each(obj, function(k, v){
                        //console.log("Key: " + k);
                        var accordion_tab_id="acc_tab_" + k;
                        var accordion_tar_id="acc_tar_" + k;
                        var html = "";
                        html = html + "<div class='accordion-item'><h2 class='accordion-header' id='"+accordion_tab_id+"'><button class='accordion-button' type='button' data-bs-toggle='collapse' data-bs-target='#"+accordion_tar_id+"' aria-expanded='true' aria-controls='"+accordion_tar_id+"'>" + k +"</button></h2><div id='"+accordion_tar_id+"' class='accordion-collapse collapse show' aria-labelledby='"+accordion_tab_id+"' data-bs-parent='#"+accordion_id+"'><div class='accordion-body'>";

                            if(v !== undefined && v !== null){
                                if(typeof v === "string" || typeof v === "number"){
                                    html = html + v;
                                }else{
                                    console.log(v);
                                    $.each(v, function(k2, v2){
                                        if(v2 !== undefined && v2 !== null){
                                            if(typeof v2 === "string" || typeof v2 === "number"){
                                                html = html + "<p>"+k2+": "+v2+"</p><hr/>";
                                            }else{
                                                html = html + "<p>"+k2+"</p><hr/>";
                                                $.each(v2, function(k3, v3){
                                                    html = html + "<p>"+k3+": "+v3+"</p>";
                                                });
                                            }
                                        }
                                        
                                        //console.log(k2);
                                        //console.log(v2);
                                    });
                                }
                            }

                        $("#mymodal div.modal-body").append(html + "</div></div></div>"); 
                    });
                    $("#mymodal div.modal-body").append("</div>");

                    $('#mymodal').modal('show');
                  // Code
                }
              });
        });
});