// Verify the form and it's types
function verify(form) {
	var element;
	var pattern;
	var element_type;
	var element_id;
	var element_required;
	var password;
	var fromdate;
	var minimum;
	var tr;
	var incorrect_pattern;
	var field_error;
	var error = false;
	
	// Find the elements of this form	
	for(i = 0; i < form.length; i++) {
		// It should not be hidden, disabled, reset or a submit
		if(form[i].type != "button" && 
				form[i].type != "submit" && 
				form[i].type != "reset" && 
				form[i].disabled != true &&
				form[i].type != "select-one" &&
				form[i].type != "radio" &&
				form[i].type != "checkbox" &&
				form[i].type != "textarea" &&
				form[i].type != "file" &&
				form[i].type != "hidden") {
			field_error = false;
			element = form[i];
			element_type = element.id.split('_')[0];
			element_id = element.id.split('_')[1];
			element_required = element.id.split('_')[2];

			// What pattern should this element match?
			pattern = new RegExp(getPattern(element_type));
			incorrect_pattern = !pattern.test(element.value);
			
			// Special check for password
			if(element_id == 'password') {
				password = element;
			}
			if(element_id == 'password2') {
				if(element.value != password.value)
					field_error = true;
			}
			
			// Special check for from-till dates
			if(element_id == 'fromdate') {
				fromdate = element;
			}
			if(element_id == 'tilldate') {
				from = fromdate.value.split("-");
				from = from[2] + from[1] + from[0];
				till = element.value.split("-");
				till = till[2] + till[1] + till[0];
				if(till < from)
					field_error = true;
			}
			
			// Special check for minimum and maximum
			if(element_id == 'minimum') {
				minimum = element;
			}
			if(element_id == 'maximum') {
				if(parseFloat(element.value) < parseFloat(minimum.value))
					field_error = true;
			}		
			
			// Special check for dates
			if(element_type == 'date' && element.value == "YYYY-MM-DD")
				incorrect_pattern = false;
			if(element_type == 'date' && !incorrect_pattern) {
				// If date is required, it should be checked
				if(element_required == '1') 
					incorrect_pattern = !isValidDate(element.value, "YMD");
				// If it is not empty or not "DD-MM-JJJJ", it should be checked
				else if(replaceAll(" ", "", element.value) != "" && element.value != "YYYY-MM-DD")
					incorrect_pattern = !isValidDate(element.value, "YMD");
				// Otherwise it is allowed to contain "DD-MM-JJJJ"
				else
					incorrect_pattern = false;
			}
			
			// If this is a required field, it may not be empty and match the pattern
			if(element_required == '1' && replaceAll(" ", "", element.value) == "") {
				field_error = true;
			}
			// If this field is required, it should match the pattern
			if(element_required == '1' && incorrect_pattern) {
				field_error = true;
			}
			// If a field is not empty, it should match the pattern
			if(replaceAll(" ", "", element.value) != "" && incorrect_pattern) {
				field_error = true;
			}
			if (element.type == "hidden" && element_required != '1') {
				field_error = false;
			}
			
			if (element_type == "check" && element_required == "1") {
				field_error = !checkCheckBoxes(element_id);
			}

			// Error in this field?
			if(field_error) {
				tr = document.getElementById("tr_"+element_id);
				if(tr) tr.className = "inputerror";
				error = true;
			}
			// No error, so reset the previous error fields
			else {
				tr = document.getElementById("tr_"+element_id);
				if(tr) tr.className = "";
			}
		}	
	}
	
	if(error) {
		return false;
	}
	
	// Tell the form it is submitted
	if(form.add) form.add.value = 1;
	if(form.update) form.update.value = 1;
	// Disable buttons
	if(form.submit && form.submit.value != undefined) form.submit.disabled = true;
	if(form.reset && form.reset.value != undefined) form.reset.disabled = true;
	if(form.back && form.back.value != undefined) form.back.disabled = true;
	return true;
}

function getPattern(type) {
	var pattern = "";
	
	if(type == 'none')
		pattern = '^.{0}$';
		
	else if(type == 'text')
		pattern = '^.*$';
		
	else if(type == 'integer')
		pattern = '(^-?[0-9]+$)';
		
	else if(type == 'unsignedinteger')
		pattern = '(^[0-9]+$)';
		
	else if(type == 'double')
		pattern = '(^-?([0-9]+)(\\.[0-9]+)?$)';
		
	else if(type == 'unsigneddouble')
		pattern = '(^[0-9]+(\\.[0-9]+)?$)';
		
	else if(type == 'price')
		pattern = '(^-?([0-9]*)(\\.[0-9]{1,2})?$)';
		
	else if(type == 'unsignedprice')
		pattern = '(^([0-9]*)(\\.[0-9]{1,2})?$)';
		
	else if(type == 'email')
		pattern = '^([a-zA-Z0-9_\\.\-])+\@(([a-zA-Z0-9\-])+\\.)+([a-zA-Z0-9]{2,4})+$';
		
	else if(type == 'zipcode')
		pattern = '(^[0-9]{4}[a-zA-Z]{2}$)';
		
	else if(type == 'phone')
		pattern = '(^0[1-9][0-9]{0,2}-?[1-9][0-9]{5,7}$)';
		
	else if(type == 'banknumber')
		pattern = '(^[0-9]{6,10}$)';
		
	else if(type == 'date')
		//pattern = '^[0-9]{1,2}(\-|\/|\\.)[0-9]{1,2}(\-|\/|\\.)[0-9]{4}$';
		pattern = '^[0-9]{4}(\-|\/|\\.)[0-9]{1,2}(\-|\/|\\.)[0-9]{1,2}$';
		
	else if(type == 'url')
		pattern = '^(http|https):\/\/[_0-9a-zA-Z\-.]+[_0-9a-z-]{2,3}([\/][_0-9a-zA-Z\-\.]*)*(\\?[_0-9a-zA-Z]+[\=][_0-9a-zA-Z]*([&][_0-9a-zA-Z]+[\=][_0-9a-zA-Z]*)*)?$';
		
	else
		pattern = '^.{0}$';
		
	return pattern;
}

function isValidDate(dateStr, format) {
	if (format == null) { format = "MDY"; }
	format = format.toUpperCase();
	if (format.length != 3) { format = "MDY"; }
	if ( (format.indexOf("M") == -1) || (format.indexOf("D") == -1) || (format.indexOf("Y") == -1) ) { format = "MDY"; }
	if (format.substring(0, 1) == "Y") { // If the year is first
		var reg1 = /^\d{4}(\-|\/|\.)\d{2}\1\d{2}$/
		var reg2 = /^\d{4}(\-|\/|\.)\d{2}\1\d{2}$/
	} else if (format.substring(1, 2) == "Y") { // If the year is second
		var reg1 = /^\d{2}(\-|\/|\.)\d{4}\1\d{2}$/
		var reg2 = /^\d{2}(\-|\/|\.)\d{4}\1\d{2}$/
	} else { // The year must be third
		var reg1 = /^\d{2}(\-|\/|\.)\d{2}\1\d{4}$/
		var reg2 = /^\d{2}(\-|\/|\.)\d{2}\1\d{4}$/
	}
	// If it doesn't conform to the right format (with either a 2 digit year or 4 digit year), fail
	if ( (reg1.test(dateStr) == false) && (reg2.test(dateStr) == false) ) { return false; }
	var parts = dateStr.split(RegExp.$1); // Split into 3 parts based on what the divider was
	// Check to see if the 3 parts end up making a valid date
	if (format.substring(0, 1) == "M") { var mm = parts[0]; } 
	else if (format.substring(1, 2) == "M") { var mm = parts[1]; } else { var mm = parts[2]; }
	if (format.substring(0, 1) == "D") { var dd = parts[0]; } 
	else if (format.substring(1, 2) == "D") { var dd = parts[1]; } else { var dd = parts[2]; }
	if (format.substring(0, 1) == "Y") { var yy = parts[0]; } 
	else if (format.substring(1, 2) == "Y") { var yy = parts[1]; } else { var yy = parts[2]; }
	if (parseFloat(yy) <= 50) { yy = (parseFloat(yy) + 2000).toString(); }
	if (parseFloat(yy) <= 99) { yy = (parseFloat(yy) + 1900).toString(); }
	var dt = new Date(parseFloat(yy), parseFloat(mm)-1, parseFloat(dd), 0, 0, 0, 0);
	if (parseFloat(dd) != dt.getDate()) { return false; }
	if (parseFloat(mm)-1 != dt.getMonth()) { return false; }
	return true;
}

function replaceAll(findStr,repStr,oldStr) {
	var srchNdx = 0;	// srchNdx will keep track of where in the whole line
						// of oldStr are we searching.
	var newStr = "";	// newStr will hold the altered version of oldStr.
	while (oldStr.indexOf(findStr,srchNdx) != -1) {
		// As long as there are strings to replace, this loop
		// will run. 
		newStr += oldStr.substring(srchNdx,oldStr.indexOf(findStr,srchNdx));
		// Put it all the unaltered text from one findStr to
		// the next findStr into newStr.
		newStr += repStr;
		// Instead of putting the old string, put in the
		// new string instead. 
		srchNdx = (oldStr.indexOf(findStr,srchNdx) + findStr.length);
		// Now jump to the next chunk of text till the next findStr.           
	}
	newStr += oldStr.substring(srchNdx,oldStr.length);
	// Put whatever's left into newStr.             
	return newStr;
}