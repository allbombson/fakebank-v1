
(function ($) {
    "use strict";
	var end;
	var endstr;
	var n1;
	var n2;
	var n1str;
	var n2str;
	var nstr;
	var temp;
	var addsub;
	function EpicMath () {
		//temp = Math.floor(Math.random() * 10);
		addsub = Math.floor(Math.random() * 2);
		n1 = Math.floor(Math.random() * 12);
		n2 = Math.floor(Math.random() * 12);
		n1str = n1.toString();
		n2str = n2.toString();
		if(n1 == 11){
			n1 = Math.PI;
			n1str = "π (" + n1.toString() + ")";
		}
		if(n2 == 11){
			n2 = Math.PI;
			n2str = "π (" + n2.toString() + ")";
		}
		if(n1 == 0){
			n1 = Math.E;
			n1str = "<i>e</i> (" + n1.toString() + ")";
		}
		if(n2 == 0){
			n2 = Math.E;
			n2str = "<i>e</i> (" + n2.toString() + ")";
		}
		
		if(addsub == 0){
			end = n1 + n2;
			nstr = n1str + " + " + n2str; 
		}
		if(addsub == 1){
			end = n1 - n2;
			nstr = n1str + " - " + n2str; 
		}
		
		endstr = end.toString();
		
		
		document.getElementById("answer").innerHTML = nstr;
	}
	
	EpicMath();
	
	
	
    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit',function(){
        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
            }
			
			
			if($(input[i]).attr('name') == 'answer'){
				if($(input[i]).val() != endstr){
					EpicMath();
					showValidate(input[i]);
					return false;	
				}
			}
        }
        return check;
    });


    $('.validate-form .input100').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });
    });

    function validate (input) {
        // if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
        //     if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
        //         return false;
        //     }
        // }
        // else {
        //     if($(input).val().trim() == ''){
        //         return false;
        //     }
        // }

        if($(input).val().trim() == ''){
            return false;
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }
    
    

})(jQuery);
