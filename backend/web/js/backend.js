/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function() {

	"use strict";

	/*================*/
	/* 01 - VARIABLES */
	/*================*/
    
    $('#product-id_group').on('change', function(){
        
        $('#product-id_category').empty();
        
        var sel = $(this).val();
        var cat = $('#product-id_category');
     
        $.ajax({
            url: '/backend/web/index.php?r=product%2Fajax-category',
            type: "GET",
            data: 'id='+sel,
            success: function (data) {
                cat.append("<option value>Выберите категорию....</option>");
                $.each(data.category, function(k,v) {
                    $.each(v,function(k,v)
                    {
                       cat.append("<option value="+k+">"+v+"</option>"); 
                    });
                    
                });
            }
        });
     
    })

});


