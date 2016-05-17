//js for google fonts

WebFontConfig ={google: { families: [ 'Great+Vibes::latin,latin-ext' ] }};
  					(function() {
    					var wf = document.createElement('script');
						 wf.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
						 wf.type = 'text/javascript';
						 wf.async = 'true';
						 var s = document.getElementsByTagName('script')[0];
						 s.parentNode.insertBefore(wf, s);
						  })();


// validation function
function Validation(input) 
{
	    "use strict";
	
	 this.input = document.getElementById(input);
	 
}
Validation.prototype.isempty = function () 
{
	"use strict";

	return  this.input.value.length < 1; 	
}

Validation.prototype.isemail = function ()
{
	"use strict";

	var regex = /^[A-Za-z0-9._-]+@[A-Za-z0-9.-]+\.[A-Za-z0-9.-]+$/;
	return this.input.value === regex;
}

Validation.prototype.minvalue = function () 
{
	"use strict";

	var minlength = 2;
	return this.input.value.length < minlength;	
}

Validation.prototype.maxvalue = function ()
{
	"use strict";

	var maxvalue = 50;
	return this.input.value > maxvalue;	
}

Validation.prototype.Notanumber = function ()
{
	return !isNaN(this.input.value);	
}

// validate e-mail and contact form using JS using a object to do this for each input
        		
function checkemail()		
    {
    	email.isempty() ? $(email.input).css("border-color","red") : $(email.input).css("border-color","green");
    	email.isemail() ? $(email.input).css("border-color","red") : $(email.input).css("border-color","green");
		mailinglistemail.isempty() ? $(mailinglistemail.input).css("border-color","red") : $(mailinglistemail.input).css("border-color","green");
    	mailinglistemail.isemail() ? $(mailinglistemail.input).css("border-color","red") : $(mailinglistemail.input).css("border-color","green");
    }		
        		
function checkname() 
	{
		personname.isempty() ? $(personname.input).css("border-color","red") : $(personname.input).css("border-color","green");
		personname.minvalue()? $(personname.input).css("border-color","red") : $(personname.input).css("border-color","green");
		personname.Notanumber() ? $(personname.input).css("border-color","red") : $(personname.input).css("border-color","green"); 
	}
function checksubject()
	{
		subject.isempty() ? $(subject.input).css("border-color","red") : $(subject.input).css("border-color","green");
		subject.minvalue() ? $(subject.input).css("border-color","red") : $(subject.input).css("border-color","green");			
	}
function checkcomments() 
	{
		comments.isempty()? $(comments.input).css("border-color","red") : $(comments.input).css("border-color","green");
		comments.minvalue ? $(comments.input).css("border-color","red") : $(comments.input).css("border-color","green");
	}
     			
// javascript variables
var personname = new Validation("personname");
var subject = new Validation("subject");
var comments = new Validation("comments");
var email = new Validation("contactemail");
var mailinglistemail = new Validation("mailinglistemail");
var myform = document.forms.myform;
var contactform = document.forms.contactform;
 //end of validation for javascript
 
//jquery 

$(document).ready(function()
	{				
	//validate and do something when user clicks button
		$(contactform).submit(function()
		{
			event.preventDefault();
			checkcomments();
			checkemail();
			checkname();
		});
		
		$(contactform).submit(function()
		{
			event.preventDefault();
			checkemail();
		})
		//if javascript is enabled do not use php to validate			
			$('#contactform').attr('action', "");				
			
		// checks to see if the user clicked the subscribe button and hides the contact form if it is enabled			
			$("#subscribe").click(function () 
				{
				$('#contactform').hide('slow');
				$('#mailinglist').toggle('slow');
				});
				// shows when clicked the contact me function and hides the form..
			$('#contactme').click(function () 
		 	{
		 		$('#mailinglist').hide('slow');
				$('#contactform').toggle('slow');
		 	});	
});				 


