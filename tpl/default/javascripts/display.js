function display(id) {
    element = document.getElementById(id);
    if (element.style.display == 'none') {
        element.style.display = '';
    } else {
        element.style.display = 'none';
    }
}

function doDisplay(id, show) {
    element = document.getElementById(id);
    if (show) {
        element.style.display = '';
    } else {
        element.style.display = 'none';
    }
}

function visibile(id) {
    element = document.getElementById(id);
    if (element.style.visibility == 'hidden') {
        element.style.visibility = '';
    } else {
        element.style.visibility = 'hidden';
    }
}

function doVisible(id, show) {
    element = document.getElementById(id);
    if (show) {
        element.style.visibility = '';
    } else {
        element.style.visibility = 'hidden';
    }
}

function disable(id, input) {
    element = document.getElementById(id);
    input = document.getElementById(input);
    if (element.style.display == 'none') {
        input.disabled = true;
    } else {
        input.disabled = false;
    }
}

function hyperlink(id) {
    url = document.getElementById('url_'+id);
    if (url.style.display == 'none') {
        url.style.display = '';
    } else {
        url.style.display = 'none';
    }
}

function doLoandate(id, show) {
    if (show) {
        document.getElementById(id).className = 'loandateInit';
    } else {
        document.getElementById(id).className = 'loandateNone';
    }
}