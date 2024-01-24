<?php
echo '<div id="listTable">';
    echo '<div id="listTableMain">';
    if (isset($movies) && count($movies) > 0) {
        $count = count($movies);
        foreach ($movies as $key => $movie) {
            echo '<div class="item" onclick="location.href=\'./?go=movie&id=' . $movie->id . '\';">';
                echo '<div id="itemPhotoDiv">';
                    if ($movie->hasPhoto($w->_tpl_vars["photopath"])) {
                        echo '<img src="' . $w->_tpl_vars["photopath"] . $movie->id . '.jpg"
                                   class="itemPhoto"
                                   alt="' . $movie->name . ' (' . $movie->year . ')"
                                   title="' . $movie->name . ' (' . $movie->year . $movie->endYear("endyear") . ')" loading="lazy">';
                    } else {
                        echo '<img src="' . $w->template_include_dir . 'images/noFrontPoster.jpg"
                                   class="itemPhoto"
                                   alt="Front photo not available"
                                   title="Front photo not available" loading="lazy">';
                    }
                echo '</div>';
                
                echo '<div id="itemRowMain">';
                    echo '<div id="itemRow">';
                        echo '<span>' . $movie->name . '</span>';

                        if ($movie->notes != "") {
                            echo '<div class="itemIcons">';
                                echo '<img src="' . $w->template_include_dir . 'images/notes.png"
                                           alt="notes"
                                           title="' . $movie->notes . '">';
                            echo '</div>';
                        }

                        if ($movie->own == "2") {
                            echo '<div class="itemIcons">';
                            echo '<img src="' . $w->template_include_dir . 'images/wishlist.png"
                                       alt="Wish List"
                                       title="Wish List">';
                            echo '</div>';
                        }

                        if ($movie->movietype == "TV Series" || $movie->movietype == "TV Mini Series") {
                            echo '<div class="itemIcons">';
                            echo '<img src="' . $w->template_include_dir . 'images/tv.png"
                                       alt="' . $movie->movietype . '"
                                       title="' . $movie->movietype . '">';
                            echo '</div>';
                        }

                        if ($movie->loaned) {
                            echo '<div class="itemIcons">';
                                echo '<span class="loaned">Loaned</span>';
                            echo '</div>';
                        }

                        echo '<div class="itemAka">';
                            if ($movie->aka !="") {
                                echo $movie->akaList("listPage");
                            }
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
              
                echo '<div id="detailsRow">';
                    echo '<small>';
                        echo '<span title="Year">' . $movie->year . $movie->endYear() . '</span>';
                        echo '<span class="separator">|</span>';
                        if ($movie->listPageRuntime()) {
                            echo '<span title="Duration">' . $movie->listPageRuntime() . ' Min</span>';
                            echo '<span class="separator">|</span>';
                        }
                        if ($movie->rating) {
                            echo '<b title="Rating">' . $movie->rating . '</b>';
                            echo '<span class="separator">|</span>';
                        }
                        echo '<span title="Genres">' . $movie->getList("genres") . '</span>';
                    echo '</small>';
                    echo '<small id="detailsRowRight">';
                        echo $movie->formatColor("format");
                    echo '</small>';
                echo '</div>';
            echo '</div>';

            if ($count - 1 === $key && $w->_tpl_vars["pages"] > 1) {
                echo '<div id="pagingDiv">';
                    echo '<div class="pageSelect">';
                        if ($w->_tpl_vars["startAt"] > 1) {
                            echo '<a href="javascript:void(0);"
                                     onclick="page=0; showList();">
                                <span class="current unselected">1</span>
                            </a>';
                            if ($w->_tpl_vars["startAt"] - 1 >= 2) {
                                echo '<span class="current unselected unselectedHover">...</span>';
                            }
                        }
                        for ($i = $w->_tpl_vars["startAt"]; $i <= $w->_tpl_vars["stopAt"]; $i++) {
                            if ($i == $w->_tpl_vars["page"]) {
                                echo '<span class="current selected">' . $i . '</span>';
                            } else {
                                echo '<a href="javascript:void(0);"
                                         onclick="page=' . $i - 1 . '; showList();">
                                  <span class="current unselected">' . $i . '</span>
                                </a>';
                            }
                        }
                        if ($w->_tpl_vars["stopAt"] + 1 <= $w->_tpl_vars["pages"]) {
                            if ($w->_tpl_vars["stopAt"] + 1 < $w->_tpl_vars["pages"]) {
                                echo '<span class="current unselected unselectedHover">...</span>';
                            }
                            echo '<a href="javascript:void(0);"
                                     onclick="page=' . $w->_tpl_vars["pages"] . '; showList();">
                                <span class="current unselected">' . $w->_tpl_vars["pages"] . '</span>
                            </a>';
                        }
                    echo '</div>';
                echo '</div>';
            }
        }
    } else {
        echo '<div id="noMovies">';
            echo '<div id="noMoviesDiv"> No Movies where found.';
                if (isset($goBack)) {
                    echo '<script>page--; showList();</script>';
                }
            echo '</div>';
        echo '</div>';
    }
    echo '</div>';

    if ($w->_tpl_vars["totalmovies"] > 0) {
        if (isset($movies)) {
            echo '<div id="stats">';
                echo '<div>';
                    echo '<span>Total Titles </span>';
                    echo '<strong>' . $w->_tpl_vars["totalmovies"] . '</strong>';
                    if (count($w->_tpl_vars["numbertypes"]) > 0) {
                        foreach ($w->_tpl_vars["numbertypes"] as $numbertype) {
                            if ($numbertype[1] > 0) {
                                echo '<span id="statsSpan1">|</span>';
                                echo '<strong id="statsStrong1">' . $numbertype[1] . ' </strong>';
                                echo '<span id="statsSpan2">';
                                echo $numbertype[0];
                                if ($numbertype[1] != 1) {
                                    echo ' \'s';
                                }
                                echo '</span>';
                            }
                        }
                    }
                echo '</div>';
            echo '</div>';
        }
    }
echo '</div>';

?>