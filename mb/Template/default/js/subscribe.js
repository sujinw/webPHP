jQuery(function() {    jQuery('.success-subscribe').hide();    jQuery('.error').hide();    jQuery('#emailError').hide();    jQuery('#emailError2').hide();    jQuery(".contactButton").click(function() {        jQuery('.error').hide();        var name = jQuery("input#contactName").val();        if (name == "" || name == "John Doe?") {            jQuery("span#nameError").hide();            jQuery("input#contactName").focus();            return false        }        var email = jQuery("input#contactEmail").val();        if (email == "" || email == "johndoe@domain.com") {            jQuery('#emailError').show();            jQuery('#emailError2').hide();            jQuery("input#contactEmail").focus();            return false        }        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;        if (!emailReg.test(email)) {            jQuery('#emailError').hide();            jQuery('#emailError2').show();            jQuery("input#contactEmail").focus();            return false        }        var msg = jQuery("textarea#contactMessage").val();        if (msg == "") {            jQuery("span#messageError").hide();            jQuery("textarea#contactMessage").focus();            return false        }        var dataString = 'name=' + name + '&email=' + email + '&msg=' + msg;        jQuery.ajax({            type: "POST",            url: "php/subscribe.php",            data: dataString,            success: function() {                jQuery('#contact').fadeOut(0);                jQuery('.success-subscribe').fadeIn();            }        });        return false    })});