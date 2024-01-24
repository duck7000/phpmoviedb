function loader(loader) {
    loader.style.display = 'initial';
}

function removeCoverLink(coverLink) {
    coverLink.style.display = 'none';
}

function extraMediaTemplate() {
    document.getElementById("text_extramedia_0").value = "Own: \n"
                                                       + "Format: DVD\n"
                                                       + "Runtime: \n"
                                                       + "Region Code: 2\n"
                                                       + "Media Subtitle: Nederlands\n"
                                                       + "External Subtitle: \n"
                                                       + "Video: 16:9 Widescreen\n"
                                                       + "Audio Track 1: Dolby Digital 5.1\n"
                                                       + "Audio Track 2: \n"
                                                       + "Barcode: \n"
                                                       + "Certification: \n"
                                                       + "Country of Origin: \n"
                                                       + "Edition: "
                                                        ;
}

function imdbTrailerTemplate() {
    document.getElementById("url_trailer_0").value = "https://www.imdb.com/video/imdb/*/imdb/embed";
}

function clearFileInput(ctrl) {
    try {
        ctrl.value = null;
    }
    catch(ex) {
    }
    if (ctrl.value) {
        ctrl.parentNode.replaceChild(ctrl.cloneNode(true), ctrl);
    }
}

function uploadImage(fileUpload) {
    if (typeof (fileUpload.files) != "undefined") {
        var type = fileUpload.files[0].type;

        if (type =='image/jpeg' || type =='image/webp' || type =='image/png') {
            var size = fileUpload.files[0].size / 1024 / 1024; // in MB

            if (size > 5) {
                alert('Filesize ' + size + 'KB. exceeds 5 MB!');
                clearFileInput(fileUpload);
                return;
            } else {
                var selectedFile = fileUpload.files[0];
                var reader = new FileReader();

                if (fileUpload.id == "text_cover_0" || fileUpload.id == "text_frontCover_0") {
                    var imgtag = document.getElementById("photo");
                } else {
                    var imgtag = document.getElementById("fullCover");
                }

                imgtag.title = selectedFile.name;

                reader.onload = function(selectedFile) {
                imgtag.src = selectedFile.target.result;
                };

                reader.readAsDataURL(selectedFile);
            }
        } else {
            alert('Only jpg, webp or png files allowed!');
            clearFileInput(fileUpload);
            return;
        }
    } else {
        alert("This browser does not support HTML5.");
    }
}

function moreLess(id, limit) {
    var toggle = document.getElementById("more" + id).innerHTML;
    var none = document.getElementsByClassName(id + "None");
    var init = document.getElementsByClassName(id + "Init");
    var moreId = document.getElementById("more" + id);

    if (toggle == "More") {
        for (var noneLength = none.length - 1; noneLength >= 0; --noneLength) {
            if (noneLength >= limit) {
                none[noneLength].className = id + "None";
            } else {
                none[noneLength].className = id + "Init";
            }
        }
        if (none.length > 0) {
            moreId.innerHTML = 'See all';
        } else {
            moreId.innerHTML = 'Close';
        }
    }

    if (toggle == "See all") {
        for (var noneLength = none.length - 1; noneLength >= 0; --noneLength) {
            none[noneLength].className = id + "Init";
        }
        moreId.innerHTML = 'Close';
    }

    if (toggle == "Close") {
        for (var initLength = init.length - 1; initLength >= 0; --initLength) {
            if (id == "producerDiv" ||
                id == "castDiv" ||
                id == "writerDiv" ||
                id == "directorDiv" ||
                id == "keywords" ||
                id == "composerDiv") {
                if (initLength >= limit) {
                    init[initLength].className = id + "None";
                } else {
                    init[initLength].className = id + "Init";
                }
            } else {
                if (initLength = init.length - 1) {
                    init[initLength].className = id + "None";
                } else {
                    init[initLength].className = id + "Init";
                }
            }
        }
        moreId.innerHTML = 'More';
    }
}

function didYouKnow(id, toggle) {

    if (toggle == "More") {
        var x = document.getElementsByClassName(id + "None");

        for (var i = x.length - 1; i >= 0; --i) {
            x[i].className = id + "Init initArrowLeft";
        }

        var y = document.getElementsByClassName(id + "Init");
        for (var i = y.length - 1; i >= 0; --i) {
            y[i].className = id + "Init initArrowLeft";
            y[i].setAttribute( "onclick", "didYouKnow('" + id + "','Less')" );
        }
    }
    if (toggle == "Less") {
        var x = document.getElementsByClassName(id + "Init");

        for (var i = x.length - 1; i >= 0; --i) {
            if (i = x.length - 1) {
                x[i].className = id + "None";
            } else {
                x[i].className = id + "Init initArrowRight";
                x[i].setAttribute( "onclick", "didYouKnow('" + id + "','More')" );
            }
        }
    }
}

function setAllCheckboxes(divId, sourceCheckbox) {
    divElement = document.getElementById(divId);
    inputElements = divElement.getElementsByTagName('input');
    for (i = 0; i < inputElements.length; i++) {
        if (inputElements[i].type != 'checkbox')
            continue;
        inputElements[i].checked = sourceCheckbox.checked;
    }
}

function createDiv() {
    var div = document.createElement("div");
    div.id = 'playerDiv';
    return div;
}

function createButton() {
    var _button = document.createElement("button");
    _button.innerHTML = 'Close';
    _button.onclick = function()
    {
        var player = document.getElementById("playerDiv");
        player.parentNode.removeChild(player);
        document.getElementById("trailerDiv2").style.display = 'initial';
    }
    return _button;
}

function injectIframe(trailerId, domain) {
    if (domain == 'imdb') {
        var src = 'https://www.imdb.com/video/imdb/vi' + trailerId + '/imdb/embed/?' +
                  'width=675';
    } else if (domain == 'youtube') {
        var src = 'https://www.youtube-nocookie.com/embed/' + trailerId + '?' +
                  'autoplay=1' + '&' +
                  'fs=0' + '&' +
                  'modestbranding=1' + '&' +
                  'rel=0' + '&' +
                  'showinfo=0' + '&' +
                  'controls=1"';
    }
    var frame ='<iframe id="ytplayer"' +
                        'frameborder="0"' +
                        'scrolling="no"' +
                        'width="675"' +
                        'height="408"' +
                        'fs="0"' +
                        'src="' + src + '"></iframe>';
    // create new div
    playerDiv = createDiv();
    // create close button
    playerDivButton = createButton();
    // add frame to div
    playerDiv.innerHTML = frame;
    // append button to div
    playerDiv.appendChild(playerDivButton);
    //append div to existing element
    document.getElementById("trailerDiv1").appendChild(playerDiv);
    document.getElementById("trailerDiv2").style.display = 'none';
    document.getElementById("trailerDiv1").style.marginBottom = '0px';
}

function getTodayDate() {
        var date = new Date();

        var day = date.getDate();
        var month = date.getMonth() + 1;
        var year = date.getFullYear();

        if (month < 10) month = "0" + month;
        if (day < 10) day = "0" + day;

        var today = year + "-" + month + "-" + day;
        return today;
}

function loandateFocus() {
    var setdate = document.getElementById("date_loandate_0").value;
    if(setdate == 'YYYY-MM-DD') {
        document.getElementById("date_loandate_0").value = getTodayDate();
    }
}

function loandateBlur() {
    var value = document.getElementById("date_loandate_0").value;
    if(value == '') {
        document.getElementById("date_loandate_0").value = 'YYYY-MM-DD';
    }
}

function checkRuntime() {
    var value = document.getElementById("unsignedinteger_runtime_0").value;
    if(value == '') {
        document.getElementById("unsignedinteger_runtime_0").value = 0;
    }
}