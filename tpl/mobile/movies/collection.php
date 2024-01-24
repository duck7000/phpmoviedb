<script>
  document.getElementById("topMenuSelectHome").className = "top topSelected";
</script>
<div id="topGrayBar">
  <div id="selectbox">
    <ul>
      <li class="selectboxLi">
        <label for="category">Genres</label>
        <select name="category"
                id="category"
                onchange="showList();"
                class="selectList">
          <option value="">- All -</option>
          <?php foreach ($w->_tpl_vars["categories"] as $categories) {
            echo '<option value="' . $categories . '">' . $categories . '</option>';
          } ?>
        </select>
      </li>
      <li class="selectboxLi">
        <label for="sort">Order by</label>
        <select name="sort"
                id="sort"
                onchange="showList();"
                class="selectList">
          <option value="name">Name (A-Z)</option>
          <option value="name DESC">Name (Z-A)</option>
          <option value="year">Year (asc)</option>
          <option value="year DESC">Year (desc)</option>
          <option value="imdbid">IMDbId (0-10)</option>
          <option value="imdbid DESC">IMDbId (10-0)</option>
          <option value="rating">Rating (0-10)</option>
          <option value="rating DESC">Rating (10-0)</option>
          <option value="format">Format (A-Z)</option>
          <option value="format DESC">Format (Z-A)</option>
          <option value="loaned">Loaned (A-Z)</option>
          <option value="loaned DESC">Loaned (Z-A)</option>
          <option value="added">Added (A-Z)</option>
          <option value="added DESC">Added (Z-A)</option>
        </select>
      </li>
      <li class="selectboxLi">
        <label for="show">Show</label>
        <select name="show"
                id="show"
                onchange="showList();"
                class="selectList">
          <option value="">- All -</option>
          <?php foreach ($w->_tpl_vars["showOnly"] as $showOnly) {
            echo '<option value="' . $showOnly . '">' . $showOnly . '</option>';
          } ?>
        </select>
      </li>
      <li class="selectboxLi">
        <label for="amount">Paging</label>
        <select name="amount"
                id="amount"
                onchange="page=0; showList();"
                class="selectList">
          <option value="-1">- No paging -</option>
          <option value="12" selected>12 per page</option>
          <option value="18">18 per page</option>
          <option value="30">30 per page</option>
          <option value="42">42 per page</option>
          <option value="54">54 per page</option>
        </select>
      </li>
      <li class="selectboxLi">
        <label for="view">View</label>
        <select name="view"
                id="view"
                onchange="showList();"
                class="selectList">
          <option value="icon">Icon</option>
          <option value="list" selected>List</option>
        </select>
      </li>
      <li id="selectboxLiSearch">
        <input type="text"
               id="searchfield"
               value=""
               placeholder="Search..."
               onkeyup="page=0; showList();">
      </li>
    </ul>
  </div>
</div>
<div id="list" style="display: none;"></div>
<div id="loading">
  <img src="<?php echo $w->template_include_dir; ?>images/loading.gif"
       alt="Loading"
       title="Loading">
  Loading Movie list...
</div>


<script>
  var cookiesearch = getCookie('searchwords');
  if (cookiesearch) {
    setSearch(cookiesearch);
  }

  var sort = getCookie('sort');
  if (sort) {
    setSort(sort);
  }

  var category = getCookie('category');
  if (category) {
    setCategory(category);
  }

  var show = getCookie('show');
  if (show) {
    setShow(show);
  }

  var view = getCookie('view');
  if (view) {
    setView(view);
  }

  var amount = getCookie('amount');
  if (amount) {
    setAmount(amount);
  }

  var p = getCookie('page');
  if (p) {
    page = p;
  }
  document.getElementById('searchfield').focus();
  document.getElementById('searchfield').value += '';
  showList();
</script>

