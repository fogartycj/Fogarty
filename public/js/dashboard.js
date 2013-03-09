jQuery(document).ready(function($) {

  /* $('#username').click(function() {
       $('#username').next().css('display', 'none');
       $('#username').next().css('background', "url('../img/loader.gif')");
       $('#username').next().fadeIn();
   });

   $('#username').blur(function() {
      $('#username').next().fadeOut('', function(){
          $('#username').next().css('background', "url('../img/success.png')");
          $('#username').next().fadeIn();
      });
   });*/

    $('#username').blur(function() {
        var form_data = {
            username: $("#username").val()
        };
        $.ajax({
            type: "POST",
            url: 'dashboard',
            data: form_data,
            success: function(response) {
                $('#username').next().css('background', "url('../img/success.png')");
            }

        });
    });

    $('#profile').click(function(e) {
        e.preventDefault();

        $.ajax({
            type: "GET",
            url: 'dashboard/',
            success: function(response) {
                $.cookie('npdash_loc', 'dashboard');
                var $data = $(response);
                var $html = $data.find(".dashboard_content").html();
                $('.dashboard_content').fadeOut('', function() {
                    $('.dashboard_content').html($html);
                    $('.dashboard_content').fadeIn();
                });
            }
        });
    });

   $('#callfeatures').click(function(e) {
       e.preventDefault();

       $.ajax({
            type: "GET",
            url: 'dashboard/features',
            success: function(response) {
                $.cookie('npdash_loc', 'dashboard/features');
                var $data = $(response);
                var $html = $data.find(".dashboard_content").html();
                $('.dashboard_content').fadeOut('', function() {
                    $('.dashboard_content').html($html);
                    $('.dashboard_content').fadeIn();
                });
            }

       });
   });

});