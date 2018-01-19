/*global $, jQuery, alert, console*/

jQuery(document).ready(function($) {

	'use strict';  

		// hide place holder

	$('[placeholder]').focus(function () {

		$(this).attr("data-text", $(this).attr('placeholder'));

		$(this).attr("placeholder", "");

	}).blur(function () {

		$(this).attr('placeholder', $(this).attr('data-text'));

	});


	$('.confirm').click(function () {

		return confirm('Are You Sure ?');
	});
	
    /* Start Plus And Muins Widget *************************/

    $('.panel-primary .panel-heading > i').click(function () {


        $(this).toggleClass('selected').parent().next().slideToggle(100);

        if ($(this).hasClass("selected")) {

            $(this).removeClass('fa-minus').addClass('fa-plus');
        }        
    });

    /* End Plus And Muins Widget ***************************/   
    /* End Plus And Muins Widget ***************************/ 

    $('.head_table td i').click(function () {

        var classT = $($(this).parent().data('class'));

        $(this).parent().fadeOut(200);

        classT.fadeOut(200);
    });

    /* End Plus And Muins Widget ***************************/ 
	/* Start Send Product Data *****************************/ 

    $('body').on('submit', 'form.add_product', function (event) {

        $.ajax({

            url : $(this).attr("action"),
            type : 'POST',
            cache : false,
            processData : false,
            data : $(this).serialize(),

            beforeSend : function () {

               $('.result-item').html('<i class="fa fa-cog fa-spin fa-3x fa-fw"></i>') 
            }
        })
            .done(function (d) {
                $('.result-item').html(d);
            })

            .fail(function (xhr, status, errorThrown) {
                alert("Sorry, there was a problem!");
                console.log("Error: " + errorThrown);
                console.log("Status: " + status);
                console.dir(xhr);
            });

        event.preventDefault();

    });

    /* End Send Product Data  *****************************/	
    /* Start Delete Product *******************************/ 

    $('body').on('click', 'a.delete_product', function (event) {

        $.ajax({

            url : $(this).attr("href"),
            type : 'POST',
            cache : false,
            processData : false,
            data : $(this).serialize(),

            beforeSend : function () {

               $('.result-item').html('<i class="fa fa-cog fa-spin fa-3x fa-fw"></i>') 
            }
        })
            .done(function (d) {
                $('.result-item').html(d);   
            })

            .fail(function (xhr, status, errorThrown) {
                alert("Sorry, there was a problem!");
                console.log("Error: " + errorThrown);
                console.log("Status: " + status);
                console.dir(xhr);
            });

        var parentTr = $(this).parent().parent('tr');
        parentTr.hide(500);

        event.preventDefault();

    });

    /* End Delete Product ********************************/  
    /* Start Send Add Category Data **********************/ 

    $('body').on('submit', 'form.add_category', function (event) {

        $.ajax({

            url : $(this).attr("action"),
            type : 'POST',
            cache : false,
            processData : false,
            data : $(this).serialize(),

            beforeSend : function () {

               $('.result-item').html('<i class="fa fa-cog fa-spin fa-3x fa-fw"></i>') 
            }
        })
            .done(function (d) {
                $('.result-item').html(d);
            })

            .fail(function (xhr, status, errorThrown) {
                alert("Sorry, there was a problem!");
                console.log("Error: " + errorThrown);
                console.log("Status: " + status);
                console.dir(xhr);
            });

        event.preventDefault();

    });

    /* End Send Add Category Data  ************************/ 
    /* Start Delete Category ******************************/ 

    $('body').on('click', 'a.delete_category', function (event) {

        $.ajax({

            url : $(this).attr("href"),
            type : 'POST',
            cache : false,
            processData : false,
            data : $(this).serialize(),

            beforeSend : function () {

               $('.result-item').html('<i class="fa fa-cog fa-spin fa-3x fa-fw"></i>') 
            }
        })
            .done(function (d) {
                $('.result-item').html(d);   
            })

            .fail(function (xhr, status, errorThrown) {
                alert("Sorry, there was a problem!");
                console.log("Error: " + errorThrown);
                console.log("Status: " + status);
                console.dir(xhr);
            });

        var parentTr = $(this).parent().parent('.cat');
        parentTr.hide(500);

        event.preventDefault();

    });

    /* End Delete Category ********************************/ 
    /* Start Send Add Member Data *************************/ 

    $('body').on('submit', 'form.add_member', function (event) {

        $.ajax({

            url : $(this).attr("action"),
            type : 'POST',
            cache : false,
            processData : false,
            data : $(this).serialize(),

            beforeSend : function () {

               $('.result-item').html('<i class="fa fa-cog fa-spin fa-3x fa-fw"></i>') 
            }
        })
            .done(function (d) {
                $('.result-item').html(d);
            })

            .fail(function (xhr, status, errorThrown) {
                alert("Sorry, there was a problem!");
                console.log("Error: " + errorThrown);
                console.log("Status: " + status);
                console.dir(xhr);
            });

        event.preventDefault();

    });

    /* End Send Add Member Data  ***************************/
    /* Start Delete Member *********************************/ 

    $('body').on('click', 'a.delete_member', function (event) {

        $.ajax({

            url : $(this).attr("href"),
            type : 'POST',
            cache : false,
            contentType : false,
            processData : false,
            data : $(this).serialize(),

            beforeSend : function () {

               $('.result-item').html('<i class="fa fa-cog fa-spin fa-3x fa-fw"></i>') 
            }
        })
            .done(function (d) {
                $('.result-item').html(d);   
            })

            .fail(function (xhr, status, errorThrown) {
                alert("Sorry, there was a problem!");
                console.log("Error: " + errorThrown);
                console.log("Status: " + status);
                console.dir(xhr);
            });

        var parentTr = $(this).parent().parent();
        parentTr.hide(500);

        event.preventDefault();

    });

    /* End Delete Member ************************************/  
    /* Start Delete Comment *********************************/ 

    $('body').on('click', 'a.delete_comment', function (event) {

        $.ajax({

            url : $(this).attr("href"),
            type : 'POST',
            cache : false,
            processData : false,
            data : $(this).serialize(),

            beforeSend : function () {

               $('.result-item').html('<i class="fa fa-cog fa-spin fa-3x fa-fw"></i>') 
            }
        })
            .done(function (d) {
                $('.result-item').html(d);   
            })

            .fail(function (xhr, status, errorThrown) {
                alert("Sorry, there was a problem!");
                console.log("Error: " + errorThrown);
                console.log("Status: " + status);
                console.dir(xhr);
            });

        var parentTr = $(this).parent().parent('tr');
        parentTr.hide(500);

        event.preventDefault();

    });

    /* End Delete Comment **********************************/   
    /* Start Approve Product *******************************/ 

    $('body').on('click', 'a.approve_product', function (event) {

        $.ajax({

            url : $(this).attr("href"),
            type : 'POST',
            cache : false,
            contentType : false,
            processData : false,
            data : $(this).serialize(),

            beforeSend : function () {

            }
        })
            .done(function (d) {
                   
            })

            .fail(function (xhr, status, errorThrown) {
                alert("Sorry, there was a problem!");
                console.log("Error: " + errorThrown);
                console.log("Status: " + status);
                console.dir(xhr);
            });

        $(this).fadeOut(300);
        event.preventDefault();

    });

    /* End Approve Product **********************************/  
    /* Start Approve Member *******************************/ 

    $('body').on('click', 'a.approve_member', function (event) {

        $.ajax({

            url : $(this).attr("href"),
            type : 'POST',
            cache : false,
            contentType : false,
            processData : false,
            data : $(this).serialize(),
            beforeSend : function () {
 
            }
        })
            .done(function (d) {
                   
            })

            .fail(function (xhr, status, errorThrown) {
                alert("Sorry, there was a problem!");
                console.log("Error: " + errorThrown);
                console.log("Status: " + status);
                console.dir(xhr);
            });

        $(this).fadeOut(300);
        event.preventDefault();

    });

    /* End Approve Member **********************************/   
    /* Start Upload Image Member ***************************/ 

    $('body').on('click', 'div#user_custom_Image', function(e) {

        e.preventDefault();

        var imageUploader = wp.media({
            'title'     : 'Upload Author Image',
            'button'    : { 'Text' : 'Set The Image' },
            'multiple'  : false
        });

        imageUploader.open();

        imageUploader.on('select', function() {

            var image   = imageUploader.state().get('selection').first().toJSON();

            var link    = image.url;

            $('input.image_er_link').val(link);

            $('.show_image img').attr('src', link);

        });
    });

    /* End Upload Image Member *****************************/  
    /* Start Upload Multiple Image Member ******************/ 

    var parentImage = $('.show_images');

    $('body').on('click', 'div#user_custom_Images', function(e) {

        e.preventDefault();

        var imageUploader = wp.media({
            'title'     : 'Upload Author Image',
            'button'    : { 'Text' : 'Set The Image' },
            'multiple'  : true
        });

        imageUploader.open();

        imageUploader.on('select', function() {

            var image   = imageUploader.state().get('selection').toJSON();

            var link = [];

            parentImage.html('');

            for (var i = image.length - 1; i >= 0; i--) {

                link[link.length] = image[i]['url'];
                parentImage.append('<img src="' + image[i]['url'] + '" />');
            }

            var st = link.toString();

            $('input.images_er_link').val(st);

        });
    });

    /* End Upload Multiple Image Member ********************/   

});

