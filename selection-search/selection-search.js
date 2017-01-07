function getSelectionText() {
    var text = "";
    if (window.getSelection) {
        text = window.getSelection().toString();
    } else if (document.selection && document.selection.type != "Control") {
        text = document.selection.createRange().text;
    }
    return text;
}

function fadeIn(el) {
    el.className = 'fade';
}

function fadeOut(el) {
    el.className = '';
}

var pageX = 0;
var pageY = 0;
var selectedText = "";


document.addEventListener("mouseup", function() {
    var newSel = getSelectionText();

    if (newSel != '') {
        selectedText = newSel;
        searchpopup.style.left = (pageX + 5).toString() + "px";
        searchpopup.style.top = (pageY - 40).toString() + "px";
        fadeIn(searchpopup);
    } else {
        fadeOut(searchpopup);
    }
}, false);

document.addEventListener("mousedown", function(e) {
    pageX = e.pageX;
    pageY = e.pageY;
}, false);

var callback = function() {
    var searchpopup = document.getElementById("searchpopup");
    searchpopup.addEventListener('click', function() {
        var url = "/search?q=";
        if (selectedText != '') {
            url = url.concat(selectedText);
            window.open(url);
        }
    });
};
if (
    document.readyState === "complete" ||
    (document.readyState !== "loading" && !document.documentElement.doScroll)
) {
    callback();
} else {
    document.addEventListener("DOMContentLoaded", callback);
};