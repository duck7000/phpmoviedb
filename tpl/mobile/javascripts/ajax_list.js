var oldSearch;
var oldSort;
var oldCategory;
var oldShow;
var oldView;
var oldAmount;
var oldPage;

// What page?
var page = 0;

function showList() {
    // If nothing has changed, return.
    if (getSearch() == oldSearch &&
        getSort() == oldSort &&
        getCategory() == oldCategory &&
        getShow() == oldShow &&
        getView() == oldView &&
        getAmount() == oldAmount &&
        page == oldPage) {
        return;
    }

    // Save current vars.
    oldSearch = getSearch();
    oldSort = getSort();
    oldCategory = getCategory();
    oldShow = getShow();
    oldView = getView();
    oldAmount = getAmount();
    oldPage = page;

    /* Show loading screen */
    doDisplay('list', false);
    doDisplay('loading', true);
    // Do ajax call.
    showListAjax();
}

function showListAjax() {
    search = getSearch();
    sort = getSort();
    category = getCategory();
    show = getShow();
    view = getView();
    amount = getAmount();

    /* Save cookie */
    var expires = 7 * 24 * 60; // 1 week in minutes.
    var path = "/";
    var domain = "";
    setCookie('searchwords', search, expires, path, domain);
    setCookie('sort', sort, expires, path, domain);
    setCookie('category', category, expires, path, domain);
    setCookie('show', show, expires, path, domain);
    setCookie('view', view, expires, path, domain);
    setCookie('amount', amount, expires, path, domain);
    setCookie('page', page, expires, path, domain);

    // Do ajax call.
    if (view == "icon") {
        var viewpage = view;
    } else {
        var viewpage = "list";
    }

    var url = "index.php?go=" + viewpage + "&search=" + search +
                                           "&sort=" + sort +
                                           "&category=" + category +
                                           "&show=" + show +
                                           "&page=" + page +
                                           "&amount=" + amount;
    new Ajax.Updater("list", url, {
            onSuccess: function(response) {
                /* Hide loading screen */
                doDisplay('loading', false);
                doDisplay('list', true);
            }
        });
}
