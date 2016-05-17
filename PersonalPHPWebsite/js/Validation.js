function Validation(input) 
{
	 this.input = document.getElementById(input);
	 
}
Validation.prototype.isempty = function () 
{
	return  this.input.value === ""; 	
}

Validation.prototype.isemail = function ()
{
	var regex = /^[A-Za-z0-9._-]+@[A-Za-z0-9.-]+\.[A-Za-z0-9.-]+$/;
	return this.input.value === regex;
}

Validation.prototype.minvalue = function () 
{
	var minlength = 2;
	return this.input.value.length < minlength;	
}

Validation.prototype.maxvalue = function ()
{
	var maxvalue = 50;
	return this.input.value > maxvalue;	
}

Validation.prototype.Notanumber = function ()
{
	return isNaN(this.input.value);	
}


var values = {
					"minlength" : 2,
					"maxlength" : 250,
					"regex" : /^[A-Za-z0-9._-]+@[A-Za-z0-9.-]+\.[A-Za-z0-9.-]+$/
				};