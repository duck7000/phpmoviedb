function getSearch() {
    var element = document.getElementById('searchfield');
    if (element) {
        return element.value.trim();
    }
    return '';
}

function setSearch(search) {
    var element = document.getElementById('searchfield');

    if (element) {
        element.value = search;
    }
}

function getSort() {
    var sortSelect = document.getElementById('sort');

    if (sortSelect) {
        return sortSelect.options[sortSelect.selectedIndex].value;
    }
}

function setSort(sort) {
    var sortSelect = document.getElementById('sort');
    if (!sortSelect) {
        return;
    }

    for (i = 0; i < sortSelect.options.length; i++) {
        if (sortSelect.options[i].value == sort || sortSelect.options[i].text == sort) {
            sortSelect.selectedIndex = i;
            break;
        }
    }
}

function getCategory() {
    var categorySelect = document.getElementById('category');

    if (categorySelect) {
        return categorySelect.options[categorySelect.selectedIndex].value;
    }
}

function setCategory(category) {
    var categorySelect = document.getElementById('category');
    if (!categorySelect) {
        return;
    }

    for (i = 0; i < categorySelect.options.length; i++) {
        if (categorySelect.options[i].value == category || categorySelect.options[i].text == category) {
            categorySelect.selectedIndex = i;
            break;
        }
    }
}

function getShow() {
    var showSelect = document.getElementById('show');

    if (showSelect) {
        return showSelect.options[showSelect.selectedIndex].value;
    }
}

function setShow(show) {
    var showSelect = document.getElementById('show');
    if (!showSelect) {
        return;
    }

    for (i = 0; i < showSelect.options.length; i++) {
        if (showSelect.options[i].value == show || showSelect.options[i].text == show) {
            showSelect.selectedIndex = i;
            break;
        }
    }
}

function getView() {
    var viewSelect = document.getElementById('view');

    if (viewSelect) {
        return viewSelect.options[viewSelect.selectedIndex].value;
    }
}

function setView(view) {
    var viewSelect = document.getElementById('view');
    if (!viewSelect) {
        return;
    }

    for (i = 0; i < viewSelect.options.length; i++) {
        if (viewSelect.options[i].value == view || viewSelect.options[i].text == view) {
            viewSelect.selectedIndex = i;
            break;
        }
    }
}

function getAmount() {
    var amountSelect = document.getElementById('amount');

    if (amountSelect) {
        return amountSelect.options[amountSelect.selectedIndex].value;
    }
}

function setAmount(amount) {
    var amountSelect = document.getElementById('amount');
    if (!amountSelect) {
        return;
    }

    for (i = 0; i < amountSelect.options.length; i++) {
        if (amountSelect.options[i].value == amount || amountSelect.options[i].text == amount) {
            amountSelect.selectedIndex = i;
            break;
        }
    }
}

/**
 * Delete movie after confirm.
 */
function deleteMovie(id) {
    if (confirm('Are you sure you want to remove this movie?')) {
        window.location.href='./?delete=' + id;
    }
}

/**
 * Delete cover after confirm.
 */
function removeCover(id) {
    if (confirm('Are you sure you want to remove this cover?')) {
        window.location.href='./?go=edit&id=' + id + '&removecover=1';
    }
}