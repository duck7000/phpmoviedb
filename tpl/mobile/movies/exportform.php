<script>
  document.getElementById("topMenuSelectExport").className = "top topSelected";
</script>


<div id="updateForm">
  <form id="frm2"
        name="exportform"
        method="POST"
        action="./&#63;go=export"
        enctype="multipart/form-data">
    <div id="div1">
      <div id="div2">
        <div class="buttons">
          <button type="submit"
                  name="submit"
                  class="positive">
            <img src="<?php echo $w->template_include_dir; ?>images/icons/tick.png"
                 alt="browse icon">Export Selection</button>
        </div>
        <p><b>Export to CSV with column separator set to Semicolon.</b></p><br>
      </div>
      <input class="textfield updateAll"
             onClick="setAllCheckboxes('column', this);"
             type="checkbox"
             id="checkAll">
      <label id="checkAllLabel" for="checkAll">Select All Fields</label>
      <div id="column">
        <div class="columns">
          <div class="main">
            <div class="editPageTd">
              <input class="textfield updateAll"
                     type="checkbox"
                     name="id"
                     value="id"
                     id="id">
              <label for="id">DB ID</label>
            </div>
            <div class="editPageTd">
              <input class="textfield updateAll"
                     type="checkbox"
                     name="added"
                     value="added"
                     id="added">
              <label for="added">Date Added</label>
            </div>
            <div class="editPageTd">
              <input class="textfield updateAll"
                     type="checkbox"
                     name="imdbid"
                     value="imdbid"
                     id="imdbid" checked>
              <label for="imdbid">IMDbId</label>
            </div>
            <div class="editPageTd">
              <input class="textfield updateAll"
                     type="checkbox"
                     name="name"
                     value="name"
                     id="name" checked>
              <label for="name">Title</label>
            </div>
            <div class="editPageTd">
              <input class="textfield updateAll"
                     type="checkbox"
                     name="year"
                     value="year"
                     id="year" checked>
              <label for="year">Year</label>
            </div>
            <div class="editPageTd">
              <input class="textfield updateAll"
                     type="checkbox"
                     name="endyear"
                     value="endyear"
                     id="endyear" checked>
              <label for="endyear">Endyear</label>
            </div>
            <div class="editPageTd">
              <input class="textfield updateAll"
                     type="checkbox"
                     name="movietype"
                     value="movietype"
                     id="movietype" checked>
              <label for="movietype">Movie Type</label>
            </div>
            <div class="editPageTd">
              <input class="textfield updateAll"
                     type="checkbox"
                     name="notes"
                     value="notes"
                     id="notesExp">
              <label for="notesExp">Notes</label>
            </div>
            <div class="editPageTd">
              <input class="textfield updateAll"
                     type="checkbox"
                     name="headcast"
                     value="headcast"
                     id="headcast">
              <label for="headcast">Stars</label>
            </div>
          </div>
        </div>

        <div class="columns">
          <div class="main">
            <div class="editPageTd">
              <input class="textfield updateAll"
                     type="checkbox"
                     name="barcode"
                     value="barcode"
                     id="barcode">
              <label for="barcode">Barcode</label>
            </div>
            <div class="editPageTd">
              <input class="textfield updateAll"
                     type="checkbox"
                     name="regioncode"
                     value="regioncode"
                     id="regioncode">
              <label for="regioncode">Region Code</label>
            </div>
            <div class="editPageTd">
              <input class="textfield updateAll"
                     type="checkbox"
                     name="format"
                     value="format"
                     id="format">
              <label for="format">Format</label>
            </div>
            <div class="editPageTd">
              <input class="textfield updateAll"
                     type="checkbox"
                     name="subtitles"
                     value="subtitles"
                     id="subtitles">
              <label for="subtitles">Subtitles</label>
            </div>
            <div class="editPageTd">
              <input class="textfield updateAll"
                     type="checkbox"
                     name="externalsubtitles"
                     value="externalsubtitles"
                     id="externalsubtitles">
              <label for="externalsubtitles">External Subtitles</label>
            </div>
            <div class="editPageTd">
              <input class="textfield updateAll"
                     type="checkbox"
                     name="audio1"
                     value="audio1"
                     id="audio1">
              <label for="audio1">Audio 1</label>
            </div>
            <div class="editPageTd">
              <input class="textfield updateAll"
                     type="checkbox"
                     name="audio2"
                     value="audio2"
                     id="audio2">
              <label for="audio2">Audio 2</label>
            </div>
            <div class="editPageTd">
              <input class="textfield updateAll"
                     type="checkbox"
                     name="video"
                     value="video"
                     id="video">
              <label for="video">Video</label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>