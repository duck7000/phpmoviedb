function getCookieExtension () {
   return "Films";  //of return "Cds"
}

function setCookie(name, value, expires, path, domain) {
    // set time, it's in milliseconds
    var today = new Date();
    var newName = name + getCookieExtension();
    today.setTime(today.getTime());

    // Expires in minutes.
    if (expires) {
        expires = expires * 60 * 1000;
    }
    var expires_date = new Date(today.getTime() + expires);

    document.cookie = newName + "=" + escape( value.toString().trim() ) +
    ( ( expires ) ? ";expires=" + expires_date.toGMTString() : "" ) + 
    ( ( path ) ? ";path=" + path : "" ) + 
    ( ( domain ) ? ";domain=" + domain : "" );
}

function getCookie(name) {
    var newName = name + getCookieExtension() ;
    var start = document.cookie.indexOf( newName + "=" );
    var len = start + newName.length + 1;
    if (!start && (newName != document.cookie.substring(0, newName.length))) {
        return null;
    }
    if (start == -1) {
        return null;
    }

    var end = document.cookie.indexOf(";", len);
    if (end == -1) {
        end = document.cookie.length;
    }
    return unescape(document.cookie.substring(len, end));
}

String.prototype.trim = function() {
    a = this.replace(/^\s+/, '');
    return a.replace(/\s+$/, '');
};