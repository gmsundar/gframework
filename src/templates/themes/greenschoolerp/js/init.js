var name = "#floatMenu";
var menuYloc = null;



$(document).ready(function(){



    // Initialise Tabs
    $("#tabs").tabs();

    // Initialise Tabs
    $("#tabs-statistic").tabs();

    // Initialise FancyBox Modal window:

    // Table row odd
    $(".tab tr:odd").addClass("odd");


    // Show filter
    $(".show-filter").toggle(function(){    
        $(this).addClass("active");
        $(this).text("hidden filter");
        $(".filter").slideDown("slow");
    }, function() {
        $(this).removeClass("active");
        $(this).text("show filter");
        $(".filter").slideUp("slow");
    } 
    ); 

    // Show gallery tools ico
    $(".gallery .item").hover(function(){     
        $(this).find(".tools").show(); 
    }, function() { 
        $(this).find(".tools").hide(); 
    } 
    );

    // Clear value input filter
    $('input, textarea').each(function () {
        if ($(this).val() == '') {
            $(this).val($(this).attr('Title'));
        }
    }).focus(function () {
        $(this).removeClass('inputerror');
        if ($(this).val() == $(this).attr('Title')) {
            $(this).val('');
        }
    }).blur(function () {
        if ($(this).val() == '') {
            $(this).val($(this).attr('Title'));
        }
    });


    // Sidebar Accordion Menu
    $(".mainmenu li ul").hide();
    $(".mainmenu li.active a").parent().find("ul").slideToggle("slow");
	
    $(".mainmenu a").click(function () {
       
        $(".mainmenu li").removeClass('active');
        $(this).parent().addClass('active');
        $(this).parent().siblings().find("ul").slideUp("600");
        $(this).next().slideToggle("600");
        return false;
    }
    );

    $(".mainmenu li .submenu a").click(function () {
        console.log($(this).attr('id'));
        $.cookie("geocurrentsubmenu", $(this).attr('id'));
        console.log($.cookie("geocurrentsubmenu"));
        $(".mainmenu li").removeClass('active');
        $(this).parent().parent().parent().addClass('active');
        $(this).parent().addClass('active');
        window.location.href=(this.href);
        return false;
    }
    );

    $(".mainmenu li a.link").click(function () {
       
        window.location.href=(this.href);
        return false;
    }
    );
    //set menu open

    var selectedmenuid=$('#'+$.cookie("geocurrentsubmenu")).parent().parent().parent().attr('id');
    $('#'+selectedmenuid+'> a').parent().addClass('active');
    $('#'+selectedmenuid+'> a').parent().siblings().find("ul").slideUp("600");
    $('#'+selectedmenuid+'> a').next().slideDown();
    //      
    // Close form message
    $(".form-message").click(function () { 
        $(this).fadeTo(500, 0, function () { // Links with the class "close" will close parent
            $(this).slideUp(300);
        });      
        return false;
    }
    );

    // Initialise float menu

    if($('#floatMenu').length>0){
        menuYloc = parseInt($(name).css("top").substring(0,$(name).css("top").indexOf("px")))
    }
    $(window).scroll(function () {
        var offset = menuYloc+$(document).scrollTop()-"92"+"px";
        $(name).animate({
            top:offset
        },{
            duration:500, 
            queue:false
        });
        if ($(document).scrollTop() <= '96') {
            var offset = "0";
            $(name).animate({
                top:offset
            },{
                duration:500, 
                queue:false
            });
        }
    });

// File upload
  

});