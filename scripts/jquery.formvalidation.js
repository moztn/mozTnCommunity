/*
 * jQuery Form Validation plug-in version 1.1.1
 * Last Update : June 06, 2008
 * New features:
 * Error list in the alert msg
 * Alias to field name
 *
 * Bug Fixed:
 * defval to work with LabelIn plugin
 *
 * Copyright (c) 2007 E-wave web design
 *   http://www.ewave.com.au/
 *
 * Licensed under the GPL license:
 *   http://www.gnu.org/licenses/gpl.html
 *
 * @requires jQuery v 1.2.1 or later
 * @name	formValidation
 * @usage		$('#form1').formValidation({
 *		newmask : /[0-9]{1}-[0-9]{1}/,	// 1-1
 *		err_class : "invalidInput"
 * });
 * 
 * HTML
 * <form id="form1">
 * <input id="input1" type="text" required="true" mask="email"></input>
 * <input id="input2" type="text" required="true" mask="email" equal="input2"></input>
 * <input type="submit" value="Submit>
 * </form>
 *
 * Description
 * Validate form fields accordiing to 4 keys
 * required - check that text field is not empty. checkbox checked, and select val is not empty
 * equal - checks that field value equal to another field with this id
 * mask - compre value to mask using reg exp
 * defval - ignore default value
 *
 * Prevent Submit and Display alert when not validate and change class of field to invalid class
 * 
 * @param String version
 * 	Plugin Version	
 * 
 * @param String err_class
 * 	invalid input class name	
 * 
 * @param String displayAlert
 * 	display alert when submit form is invalid	
 *  default true
 * 
 * @param String err_message
 * 	alert message	
 * 
 * @param reg-exp email
 * 	email pattern
 * 
 * @param reg-exp domain
 * 	domain pattern
 * 
 * @param reg-exp phone
 * 	phone pattern
 * 
 * @param reg-exp zip
 * 	zip pattern
 * 
 * @param reg-exp numeric
 * 	numeric pattern
 * 
 * @param reg-exp image
 * 	image file name pattern
 * 
 * @param reg-exp pdf
 * 	pdf file name pattern
 * 
 */
(function() {

	jQuery.fn.formValidation = function(settings, err_msgs) {

	var iForm = this;
	var err_list = '';

	settings = jQuery.extend({
		version				: '1.1.1',
		pseudo 				: /^[a-zA-Z0-9]{3,}$/gi,
		email				: /^([\w.])+\@(([\w])+\.)[a-zA-Z0-9]{2,}/,
		txt					: /^[a-zA-Z\sa-zA-Z]{3,}$/,
		domain				: /^(http:\/\/)|(https:\/\/)([\w]+\.){1,}[A-Z]{2,4}\b/gi,
		password			: /[\w]{3,12}/gi,
		phone				: /[0-9]{8}$/gi,
		zip					: /^[0-9]{4,}$/gi,
		prix		  		: /^[0-9.]+$/gi,
	    numeric		   		: /^[0-9]+$/gi,
		image				: /[\w]+\.(gif|jpg|bmp|png|jpeg)$/gi,
		video				: /[\w]+\.(flv|FLV)$/gi,
		ewvt				: /[\w]+\.(htm|html|php|txt)$/gi,
		media				: /[\w]+\.(avi|mov|mpeg|wmv)$/gi,
		pdf					: /[\w]+\.(pdf)$/gi,
		enable				: false,
		err_class			: "invalidInput",
		err_list			: false,
		alias				: 'name',
		defval				: 'defval',
		err_message		    : "<strong>Merci de bien remplir tous les champs mentionnés!</strong>",
		display_alert	 	: true	//onsubmit if invalid form display an error message
	}, settings);
	
	err_msgs = jQuery.extend({ 
		required	: 'est requis',
		mask			: 'est un champ invalide',
		equal			: 'est différent de'
	}, err_msgs);
	

	
	return iForm.submit( function () {
			settings['enable'] = true;
			err_list = '';
			var frm = true;
			$(this).find('*').filter("input, select, textarea").each(function() {
				ret = isValid($(this));
				if (!ret)
					frm = ret;
			});
			if (!frm && settings['display_alert']){
				$("form .error").html(settings['err_message'] + err_list);
				if ($("form .error").is(":hidden")){
          $("form .error").slideDown("slow");
        }
      }
      else{
      if ($("form .notice").is(":hidden")){
          $("form .notice").slideDown("slow");
        }
      }

			return frm;
		}).find('*').filter("input, select, textarea").each(function() {
		$(this).click(function() {
			isValid($(this));
		}).change(function() {
			isValid($(this));
		}).keyup(function() {
			isValid($(this));
		}).focus(function() {
			isValid($(this));
		}).blur(function() {
			isValid($(this));
		});
	});
		
		
		
		
	function isValid(obj) { // check if field is valid
		if (!settings['enable'])
			return true;
			
		if (required(obj) && mask(obj) && equal(obj)) {
			obj.removeClass(settings['err_class']);
			return true;
		} else {
			obj.addClass(settings['err_class']);
			return false;
		}
	}
	//field is required
	function required(obj) {						
		if (!(obj.attr('required') == "true"))	//if not required return true
			return true;
		if(obj.is("input[@type=checkbox]")) {		//if checkbox and checked
			var jobj = document.getElementById(obj.attr('id'));	
			if (jobj.checked)
				return true;
		} else if((obj.is("input") || obj.is("select")) || obj.is("textarea") && (!obj.is("button"))) // if not empty
			if (obj.val() != '' && (!(defval(obj))))
				return true;
		if (settings['err_list'])	
			err_list += '<br />&raquo; "' + obj.attr(settings['alias']) + '" ' + err_msgs['required'] + '\n';
			
		return false;
	}
	//compare field to mask provided in the extend array
	function mask(obj) { 
		tname = obj.attr('mask');	//read mask name from input field
		if (tname == undefined || obj.val() == '')
			return true;

		tmask = settings[obj.attr('mask')];	// get mask pattern from settings
		
		ret = tmask.test(obj.val());			//test reg exp
		ret1 = tmask.exec(obj.val());		
		if (ret)
			return true;

		if (settings['err_list'])
			err_list += '<br />&raquo; "' + obj.attr(settings['alias']) + '" ' + err_msgs['mask'] + '\n';
		
		return false;				
	}
	//copare field to another field read from the equal attribute
	function equal(obj) { 
		tname = obj.attr('equal');		//get comparison field
		tval = $('#'+tname).val();
		
		if (tname == undefined)
			return true;
		
		if (tval == obj.val())
			return true;
		
		if (settings['err_list'])	
			err_list += '<br />&raquo; "' + obj.attr(settings['alias']) + '" ' + err_msgs['equal'] + ' ' + tname + '\n';
		return false;
	}
	//compare field with defval attr, make sure that val was altered
	function defval(obj) { 
		tdefval = obj.attr(settings['defval']);		//get comparison field
		tval = obj.val();
		
		if (tdefval == undefined)
			return false;
		
		if (tval != tdefval)
			return false;

		return true;
	}
}
})(jQuery);   


