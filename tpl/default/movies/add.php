<?php
echo '<script>';
    echo 'document.getElementById("topMenuSelectAdd").className = "top topSelected";';
echo '</script>';
echo '<div id="loaderAdd" class="loading"></div>';

echo '<div id="AddMain">';
    echo '<div id="searchForm">';
        echo '<form name="searchform"
              method="GET"
              onsubmit="if(verify(this)) return true; else alert(\'Field Error!\'); return false;">';
            echo '<div class="buttons">';
                echo '<input type="hidden" name="go" value="add">';
                echo '<input class="textfield searchInput1"
                       type="text"
                       name="imdbsearch"
                       id="text_imdbsearch_1"
                       value="'; 
                       if (isset($w->_tpl_vars["imdbsearch"])) {
                           echo $w->_tpl_vars["imdbsearch"];
                       }
                       echo '">';
                echo '<button type="submit"
                        name="submit"
                        class="search">
                  <img src="' . $w->template_include_dir . 'images/icons/search.png" alt="Search icon">
                  Search IMDb
                </button>';
            echo '</div>';
        echo '</form>';
    echo '</div>';

    echo '<script>';
        echo 'document.getElementById(\'text_imdbsearch_1\').focus();';
        echo 'document.getElementById(\'text_imdbsearch_1\').value += \'\';';
    echo '</script>';

    if (isset($w->_tpl_vars["results"]) && count($w->_tpl_vars["results"]) > 0) {
        echo '<div id="resultsList">';
            echo '<table>';
                foreach ($w->_tpl_vars["results"] as $result) {
                    echo '<tr class="resultsColorRow">';
                        echo '<td class="td1">';
                            echo '<a onclick="loader(document.getElementById(\'loaderAdd\'))"
                                href="./?go=add&amp;imdbid=' . $result["imdbid"] . '">';
                                if ($result["known"]) {
                                    echo '<del>' . $result["title"] . '</del>';
                                } else {
                                    echo $result["title"];
                                }
                            echo '</a>';
                            echo '<span> (' . $result["year"] . ')</span>';
                            echo '<span> (' . strtoupper($result["movietype"]) . ')</span>';
                        echo '</td><td class="td2">';
                            echo '<a href="https://www.imdb.com/title/tt' .$result["imdbid"] . '/"
                                target="_blank">
                                <img src="' . $w->template_include_dir . 'images/imdb.png"
                                    alt="Visit IMDb page"
                                    title="Visit IMDb page">
                            </a>';
                        echo '</td>';
                    echo '</tr>';
                }
            echo '</table>';
        echo '</div>';
    } elseif (isset($w->_tpl_vars["imdbsearch"]) && $w->_tpl_vars["imdbsearch"] != "") {
        echo '<div id="noResults">';
            echo '<div><h3>No Results Found!</h3></div>';
        echo '</div>';
    } else {
        if (isset($w->_tpl_vars["known"]) && $w->_tpl_vars["known"] == true) {
            echo '<div id="allReadyKnown">
                <span class="inputerror">WARNING, ALREADY IN DATABASE!</span>
            </div>';
        }

        echo '<div id="mainRight">';
            echo '<div id="controls">';
                echo '<div id="mainRightDiv1">';
                    echo '<button onclick="location.href=\'./\'"
                            type="button"
                            class="controlAnchor">
                        <img src="' . $w->template_include_dir . 'images/icons/back.png"
                            alt="Go Back"
                            title="Go Back">
                    </button>';
                echo '</div>';
            echo '</div>';

            echo '<div id="mainRightPhoto">';
                if (isset($w->_tpl_vars["imgFrontError"])) {
                    echo '<div class="PhotoCoverError">' . $w->_tpl_vars["imgFrontError"] . '</div>';
                }
                if (isset($movie)) {
                    if ($movie->photo()) {
                        echo '<img id="photo"
                            src="' . $movie->photo() . '"
                            alt="' . $movie->title() . '"
                            title="' . $movie->title() . '">';
                    } else {
                        echo '<img id="photo"
                            src="' . $w->template_include_dir . 'images/noFrontPoster.jpg"
                            alt="IMDb photo not available"
                            title="IMDb photo not available">';
                    }
                } else {
                    echo '<img id="photo"
                            src="' . $w->template_include_dir . 'images/noFrontPoster.jpg"
                            alt="IMDb photo not available"
                            title="IMDb photo not available">';
                }
            echo '</div>';
            echo '<div class="browse">';
                echo '<label class="labelCover" for="text_frontCover_0">
                        <img src="' . $w->template_include_dir . 'images/icons/browse.png"
                             alt="browse icon">
                             Browse..
                </label>';
            echo '</div>';

            echo '<div class="searchAnchors">';
                if (isset($movie) && $movie->imdbid()) {
                    echo '<span>';
                    echo '<a href="https://www.google.com/search?q=' .
                                urlencode($movie->title()) . '+' .
                                urlencode($movie->year()) . '+cover&tbm=isch" target="_blank">
                            <img src="' . $w->template_include_dir . 'images/search-img.png"
                                 alt="Search: Google Images"
                                 title="Search: Google Images">
                          </a>';
                    echo '</span>';
                }
            echo '</div>';

            echo '<div id="mainRightCover">';
                if (isset($w->_tpl_vars["imgError"])) {
                    echo '<div class="PhotoCoverError">' . $w->_tpl_vars["imgError"] . '</div>';
                }
                echo '<img id="fullCover"
                    src="' . $w->template_include_dir . 'images/noBackPoster.jpg"
                    alt="No Back Cover"
                    title="No Back Cover">';
            echo '</div>';
            echo '<div class="browse">
                <label class="labelCover" for="text_cover_3">
                    <img src="' . $w->template_include_dir . 'images/icons/browse.png"
                         alt="browse icon">
                         Browse..
                </label>';
            echo '</div>';
            echo '<div class="searchAnchors">';
                if (isset($movie) && $movie->imdbid()) {
                    echo '<span>';
                    echo '<a href="https://www.google.com/search?q=' .
                                urlencode($movie->title()) . '+' .
                                urlencode($movie->year()) . '+cover&tbm=isch" target="_blank">
                            <img src="' . $w->template_include_dir . 'images/search-img.png"
                                 alt="Search: Google Images"
                                 title="Search: Google Images">
                          </a>';
                    echo '</span>';
                }
            echo '</div>';
        echo '</div>';

        echo '<form name="addform"
                    method="POST"
                    action="./?go=add"
                    enctype="multipart/form-data"
                    onsubmit="if(verify(this)) return true; else alert(\'Field Error!\'); return false;">';
            echo '<input accept="image/jpeg, image/webp, image/png"
                         class="visually-hidden"
                         type="file"
                         name="frontCover"
                         id="text_frontCover_0"
                         onchange="uploadImage(document.getElementById(\'text_frontCover_0\'))">';
            echo '<input accept="image/jpeg, image/webp, image/png"
                         class="visually-hidden"
                         type="file" name="cover"
                         id="text_cover_3"
                         onchange="uploadImage(document.getElementById(\'text_cover_3\'))">';
            echo '<div id="mainTitle">';
                echo '<div id="buttonAdd">';
                    echo '<div class="buttons">';
                        echo '<button type="submit"
                                      name="submit"
                                      class="positive"
                                      onclick="loader(document.getElementById(\'loaderAdd\'))">
                            <img src="' .$w->template_include_dir . 'images/icons/tick.png"
                                 alt="">
                                 Add Movie
                        </button>';
                    echo '</div>';
                echo '</div>';
                echo '<div id="mainBase">';
                    echo '<div id="imdbTitle">';
                        echo '<div id="imdb">';
                            echo '<label for="unsignedinteger_imdbid_0">
                                <strong>IMDb id</strong>
                            </label>';
                            echo '<input class="textfield"
                                         type="text"
                                         name="imdbid"
                                         id="unsignedinteger_imdbid_0"
                                         value="';
                                    if (isset($movie)) {
                                        echo $movie->imdbid();
                                    }
                                    echo '">';
                        echo '</div>';

                        echo '<div id="title">';
                            echo '<label for="text_name_1">
                                <strong>Title</strong>
                                <span title="required">*</span>
                            </label>';
                            echo '<input class="textfield"
                                         type="text"
                                         name="name"
                                         id="text_name_1"
                                         autocomplete="off"
                                         autocapitalize="off"
                                         spellcheck="false"
                                         value="';
                                    if (isset($movie)) {
                                        echo $movie->title();
                                    }
                                    echo '">';
                        echo '</div>';
                    echo '</div>';

                    echo '<div id="alsoKnownAs">';
                        echo '<div>';
                            echo '<label for="text_aka_0">
                                <strong>Also Known As</strong>
                                <span>(Country\nTitle\n~\n)</span>
                            </label>';
                            echo '<textarea class="textarea"
                                            name="aka"
                                            autocomplete="off"
                                            autocapitalize="off"
                                            spellcheck="false"
                                            id="text_aka_0">';
                                        if (isset($movie)) {
                                            $akas = $movie->alsoknow();
                                            foreach ($akas as $key => $aka) {
                                                echo $aka["country"] . '&#10;';
                                                echo $aka["title"];
                                                if ($key !== array_key_last($akas)) {
                                                    echo '&#10;~&#10;';
                                                }
                                            }
                                        }
                            echo '</textarea>';
                        echo '</div>';
                    echo '</div>';

                    echo '<div id="typeRow">';
                        echo '<div id="type">';
                            echo '<label for="text_movietype_0">
                                <strong>Type</strong>
                            </label>';
                            echo '<input class="textfield"
                                         type="text"
                                         name="movietype"
                                         id="text_movietype_0"
                                         autocomplete="off"
                                         autocapitalize="off"
                                         spellcheck="false"
                                         value="';
                                    if (isset($movie)) {
                                        echo $movie->movietype();
                                    }
                                    echo '">';
                        echo '</div>';

                        echo '<div id="yearDiv">';
                            echo '<label for="unsignedinteger_year_1">
                                <strong>Year</strong>
                                <span title="required">*</span>
                            </label>';
                            echo '<input class="textfield"
                                         type="text"
                                         name="year"
                                         id="unsignedinteger_year_1"
                                         value="';
                                    if (isset($movie)) {
                                        echo $movie->year();
                                    }
                                    echo '">';
                        echo '</div>';

                        echo '<div id="endyearDiv">';
                            echo '<label for="text_endyear_0">
                                <strong>Endyear</strong>
                            </label>';
                            echo '<input class="textfield"
                                         type="text"
                                         name="endyear"
                                         id="text_endyear_0"
                                         value="';
                                    if (isset($movie)) {
                                        echo $movie->endyear();
                                    }
                                    echo '">';
                        echo '</div>';

                        echo '<div id="top250Div">';
                            echo '<label for="text_top250_0">
                                <strong>Top 250</strong>
                            </label>';
                            echo '<input class="textfield"
                                         type="text"
                                         name="top250"
                                         id="text_top250_0"
                                         value="';
                                    if (isset($movie)) {
                                        echo $movie->top250();
                                    } else {
                                        echo 0;
                                    }
                                    echo '">';
                        echo '</div>';

                        echo '<div id="ratingDiv">';
                            echo '<label for="text_rating_0">
                                <strong>Rating</strong>
                            </label>';
                            echo '<input class="textfield"
                                         type="text"
                                         name="rating"
                                         id="text_rating_0"
                                         value="';
                                    if (isset($movie)) {
                                        echo $movie->rating();
                                    } else {
                                        echo 0;
                                    }
                                    echo '">';
                        echo '</div>';

                        echo '<div id="metascoreDiv">';
                            echo '<label for="text_metacritics_0">
                                <strong>Score</strong>
                            </label>';
                            echo '<input class="textfield"
                                         type="text"
                                         name="metacritics"
                                         id="text_metacritics_0"
                                         value="';
                                    if (isset($movie)) {
                                        echo $movie->metacritic();
                                    } else {
                                        echo 0;
                                    }
                                    echo '">';
                        echo '</div>';
                    echo '</div>';

                    echo '<div id="plotOutline">';
                        echo '<label for="text_plotoutline_0">
                            <strong>Plot Outline</strong>
                        </label>';
                        echo '<textarea class="textarea"
                                        name="plotoutline"
                                        autocomplete="off"
                                        autocapitalize="off"
                                        spellcheck="false"
                                        id="text_plotoutline_0">';
                                    if (isset($movie)) {
                                        echo $movie->plotoutline();
                                    }
                        echo '</textarea>';
                    echo '</div>';

                echo '</div>';
            echo '</div>';

            echo '<div id="mainDetails">';
                echo '<div id="mainDetailsDiv">';
                    echo '<div id="languages">';
                        echo '<label class="mainDetailsLabel" for="text_languages_0">
                            <strong>Languages</strong>
                            <span class="span">(Sep. by linebreak)</span>
                        </label>';
                        echo '<textarea class="textarea textareaTop"
                                        name="languages"
                                        autocomplete="off"
                                        autocapitalize="off"
                                        spellcheck="false"
                                        id="text_languages_0">';
                                    if (isset($movie)) {
                                        $languages = $movie->language();
                                        foreach ($languages as $key => $language) {
                                            echo $language;
                                            if ($key !== array_key_last($languages)) {
                                                echo '&#10;';
                                            }
                                        }
                                    }
                        echo '</textarea>';
                    echo '</div>';

                    echo '<div class="mainDetailsDiv1">';
                        echo '<label class="mainDetailsLabel" for="text_country_0">
                            <strong>Country</strong>
                            <span class="span">(Sep. by linebreak)</span>
                        </label>';
                        echo '<textarea class="textarea textareaTop"
                                        name="country"
                                        autocomplete="off"
                                        autocapitalize="off"
                                        spellcheck="false"
                                        id="text_country_0">';
                                    if (isset($movie)) {
                                        $countries = $movie->country();
                                        foreach ($countries as $key => $country) {
                                            echo $country;
                                            if ($key !== array_key_last($countries)) {
                                                echo '&#10;';
                                            }
                                        }
                                    }
                        echo '</textarea>';
                    echo '</div>';

                    echo '<div class="mainDetailsDiv1">';
                        echo '<label class="mainDetailsLabel" for="text_genres_0">
                            <strong>Genres</strong>
                            <span class="span">(Sep. by linebreak)</span>
                        </label>';
                        echo '<textarea class="textarea textareaTop"
                                        name="genres"
                                        autocomplete="off"
                                        autocapitalize="off"
                                        spellcheck="false"
                                        id="text_genres_0">';
                                    if (isset($movie)) {
                                        $genres = $movie->genre();
                                        foreach ($genres as $key => $genre) {
                                            echo $genre;
                                            if ($key !== array_key_last($genres)) {
                                                echo '&#10;';
                                            }
                                        }
                                    }
                        echo '</textarea>';
                    echo '</div>';

                    echo '<div class="mainDetailsDiv1">';
                        echo '<label class="mainDetailsLabel" for="text_duration_0">
                            <strong>Runtimes</strong>
                            <span class="span">(Time\nDesc\n~\n)</span>
                        </label>';
                        echo '<textarea class="textarea textareaTop"
                                        name="duration"
                                        autocomplete="off"
                                        autocapitalize="off"
                                        spellcheck="false"
                                        id="text_duration_0">';
                                    if (isset($movie)) {
                                        $runtimes = $movie->runtime();
                                        foreach ($runtimes as $key => $runtime) {
                                            echo $runtime["time"];
                                            if (count($runtime["annotations"]) > 0 || $runtime["country"] != "") {
                                                echo '&#10;';
                                            }
                                            foreach ($runtime["annotations"] as $key2 => $annotation) {
                                                if ($annotation != "") {
                                                    echo '(' . $annotation . ')';
                                                    if ($key2 !== array_key_last($runtime["annotations"])) {
                                                        echo ' ';
                                                    }
                                                }
                                            }
                                            if ($runtime["country"] != "") {
                                                if (count($runtime["annotations"]) > 0) {
                                                    echo ' ';
                                                }
                                                echo '(' . $runtime["country"] . ')';
                                            }
                                            if ($key !== array_key_last($runtimes)) {
                                                echo '&#10;~&#10;';
                                            }
                                        }
                                    }
                        echo '</textarea>';
                    echo '</div>';

                    echo '<div id="youtubeTrailer">';
                        echo '<label class="mainDetailsLabel" for="url_trailer_0">';
                            echo '<strong>Trailer URL (ImDb or Youtube)</strong>';
                            echo '<span class="span">(Sep. by linebreak, 3 trailers supported)</span>';
                            if (isset($movie) && $movie != null && $movie->title() != "") {
                                echo '<span>';
                                    echo '<a href="https://www.youtube.com/results?search_query=' .
                                            urlencode($movie->title()) . '+' .
                                            urlencode($movie->year()) . '+trailer" target="_blank">';
                                        echo '<img src="' . $w->template_include_dir . 'images/youtube.png"
                                                   alt="Search: youtube Video"
                                                   title="Search: youtube Video">';
                                    echo '</a>';
                                echo '</span>';
                            }
                        echo '</label>';
                        echo '<textarea class="textarea"
                                        name="trailer"
                                        autocomplete="off"
                                        autocapitalize="off"
                                        spellcheck="false"
                                        id="url_trailer_0">';
                                    if (isset($movie)) {
                                        $trailers = $movie->trailer();
                                        foreach ($trailers as $key => $trailer) {
                                            echo $trailer["videoUrl"];
                                            if ($key !== array_key_last($trailers)) {
                                                echo '&#10;';
                                            }
                                        }
                                    }
                        echo '</textarea>';
                    echo '</div>';

                    echo '<div id="awards">';
                        echo '<label class="mainDetailsLabel" for="url_mainaward_0">
                            <strong>Award</strong>
                            <span class="span">(Award\nNominated\nWins)</span>
                        </label>';
                        echo '<textarea class="textarea"
                                        name="mainaward"
                                        autocomplete="off"
                                        autocapitalize="off"
                                        spellcheck="false"
                                        id="url_mainaward_0">';
                                    if (isset($movie) && count($movie->mainaward()) > 0) {
                                        $mainawards = $movie->mainaward();
                                        if ($mainawards["award"] != "") {
                                            echo $mainawards["award"];
                                        }
                                        if ($mainawards["nominations"] != "") {
                                            echo '&#10;' . $mainawards["nominations"];
                                        }
                                        if ($mainawards["wins"] != "") {
                                            echo '&#10;' . $mainawards["wins"];
                                        }
                                    }
                        echo '</textarea>';
                    echo '</div>';

                    echo '<div id="notesDiv">
                        <label class="mainDetailsLabel" for="text_notes_0">
                            <strong>Notes</strong>
                        </label>
                        <textarea class="textarea textareaNotes"
                                  name="notes"
                                  autocomplete="off"
                                  autocapitalize="off"
                                  spellcheck="false"
                                  id="text_notes_0"></textarea>
                    </div>';

                    echo '<div class="mainDetailsOwn">
                        <div id="mainDetailsDiv2">
                        <label class="mainDetailsLabel">
                            <strong>Own / Wishlist</strong>
                        </label>
                        <div>
                            <input type="radio"
                                   name="own"
                                   id="own_yes"
                                   value="1" checked>
                            <label class="mainDetailsLabel1" for="own_yes">Yes</label>
                        </div>
                        <div class="noWish">
                            <input type="radio"
                                   name="own"
                                   id="own_no"
                                   value="0">
                            <label class="mainDetailsLabel1" for="own_no">No</label>
                        </div>
                        <div class="noWish">
                            <input type="radio"
                                   name="own"
                                   id="wish_list"
                                   value="2">
                            <label for="wish_list">Wish</label>
                        </div>
                        </div>
                    </div>';

                    echo '<div class="mainDetailsLoaned">';
                        echo '<div id="mainDetailsLoanedDiv2">
                            <label class="mainDetailsLabel">
                                <strong>Loaned</strong>
                            </label>
                            <div>
                                <input type="radio"
                                       name="loaned"
                                       id="loaned_no"
                                       value="0"
                                       onclick="doLoandate(\'loan\', false);" checked>
                                <label for="loaned_no">No</label>
                            </div>
                            <div>
                                <input type="radio"
                                       name="loaned"
                                       id="loaned_yes"
                                       value="1"
                                       onclick="doLoandate(\'loan\', true);">
                                <label class="mainDetailsLabel1" for="loaned_yes">Yes</label>
                            </div>
                        </div>';
                        echo '<div id="loan" class="loandateNone">';
                            echo '<div id="loanName">
                                <label class="mainDetailsLabel">
                                    <strong>Name</strong>
                                </label>
                                <input class="textfield"
                                       type="text"
                                       name="loanname"
                                       autocomplete="off"
                                       autocapitalize="off"
                                       spellcheck="false"
                                       id="text_loanname_0"
                                       value="">
                            </div>';

                            echo '<div id="loanDate">';
                                echo '<label class="mainDetailsLabel">
                                    <strong>Date</strong>
                                </label>';
                                echo '<input class="textfield"
                                             type="text"
                                             name="loandate"
                                             id="date_loandate_0"
                                             value="' . date("Y-m-d") . '">';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';

                    echo '<div id="recommendationsDiv">';
                        echo '<label class="mainDetailsLabel" for="text_recommendations_0">
                            <strong>Recommendations</strong>
                            <span class="span">(Pattern: Title\nIMDbid\nYear\nRating\n~\n)</span>
                        </label>';
                        echo '<textarea class="textarea textareaRecommendations"
                                        name="recommendations"
                                        autocomplete="off"
                                        autocapitalize="off"
                                        spellcheck="false"
                                        id="text_recommendations_0">';
                                    if (isset($movie)) {
                                        $recommendations = $movie->recommendation();
                                        foreach ($recommendations as $key => $recommendation) {
                                            echo $recommendation["title"] . '&#10;';
                                            echo $recommendation["imdbid"] . '&#10;';
                                            echo $recommendation["year"] . '&#10;';
                                            echo $recommendation["rating"];
                                            if ($key !== array_key_last($recommendations)) {
                                                echo '&#10;~&#10;';
                                            }
                                        }
                                    }
                        echo '</textarea>';
                    echo '</div>';

                echo '</div>';
            echo '</div>';

            echo '<div id="mainStoryline">';
                echo '<div><h3>Storyline</h3></div>';

                echo '<div id="mainStorylineDiv">';
                    echo '<div id="plotDiv">';
                        echo '<label for="text_plot_0">
                            <strong>Plot</strong>
                            <span>(Pattern: Plot\nWriter\n~\n)</span>
                        </label>';
                        echo '<textarea class="textarea"
                                        name="plot"
                                        autocomplete="off"
                                        autocapitalize="off"
                                        spellcheck="false"
                                        id="text_plot_0">';
                                    if (isset($movie)) {
                                        $plots = $movie->plot();
                                        foreach ($plots as $key => $plot) {
                                            if ($plot["author"] != "") {
                                                echo $plot["plot"] . '&#10;';
                                                echo $plot["author"];
                                            } else {
                                                echo $plot["plot"];
                                            }
                                            if ($key !== array_key_last($plots)) {
                                                echo '&#10;~&#10;';
                                            }
                                        }
                                    }
                        echo '</textarea>';
                    echo '</div>';

                    echo '<div id="keywordsDiv">';
                        echo '<label for="text_keywords_0">
                            <strong>Plot Keywords</strong>
                            <span>(Pattern: Keyword\n)</span>
                        </label>';
                        echo '<textarea class="textarea"
                                        name="keywords"
                                        autocomplete="off"
                                        autocapitalize="off"
                                        spellcheck="false"
                                        id="text_keywords_0">';
                                    if (isset($movie)) {
                                        $keywords = $movie->keyword();
                                        foreach ($keywords as $key => $keyword) {
                                            echo $keyword;
                                            if ($key !== array_key_last($keywords)) {
                                                echo '&#10;';
                                            }
                                        }
                                    }
                        echo '</textarea>';
                    echo '</div>';

                    echo '<div id="taglinesDiv">';
                        echo '<label for="text_taglines_0">
                            <strong>Taglines</strong>
                            <span>(Pattern: Tagline\n)</span>
                        </label>';
                        echo '<textarea class="textarea"
                                        name="taglines"
                                        autocomplete="off"
                                        autocapitalize="off"
                                        spellcheck="false"
                                        id="text_taglines_0">';
                                    if (isset($movie)) {
                                        $taglines = $movie->tagline();
                                        foreach ($taglines as $key => $tagline) {
                                            echo $tagline;
                                            if ($key !== array_key_last($taglines)) {
                                                echo '&#10;';
                                            }
                                        }
                                    }
                        echo '</textarea>';
                    echo '</div>';

                    echo '<div id="certificationsDiv">';
                        echo '<label for="text_certifications_0">
                            <strong>Certifications</strong>
                            <span>(Count\nCert\nCom\n~\n)</span>
                        </label>';
                        echo '<textarea class="textarea"
                                        name="certifications"
                                        autocomplete="off"
                                        autocapitalize="off"
                                        spellcheck="false"
                                        id="text_certifications_0">';
                                    if (isset($movie)) {
                                        $mpaas = $movie->mpaa();
                                        foreach ($mpaas as $key => $mpaa) {
                                            echo $mpaa["country"] . '&#10;';
                                            echo $mpaa["rating"];
                                            if (count($mpaa["comment"]) > 0) {
                                                echo '&#10;(';
                                                foreach ($mpaa["comment"] as $key2 => $comment) {
                                                    echo $comment;
                                                    if ($key2 !== array_key_last($mpaa["comment"])) {
                                                        echo ', ';
                                                    } else {
                                                        echo ')';
                                                    }
                                                }
                                            }
                                            if ($key !== array_key_last($mpaas)) {
                                                echo '&#10;~&#10;';
                                            }
                                        }
                                    }
                        echo '</textarea>';
                    echo '</div>';

                echo '</div>';

            echo '</div>';

            echo '<div id="mainMedia">';
                echo '<div><h3>Media</h3></div>';

                echo '<div id="extraMediaDiv">
                    <label for="text_extramedia_0">
                        <strong>Extra Media</strong>
                        <span>
                        <a href="#anchor"
                           class="trigger"
                           onclick="extraMediaTemplate()">
                            <b>Template</b>
                        </a>
                        </span>
                    </label>
                    <textarea class="textarea"
                              name="extramedia"
                              autocomplete="off"
                              autocapitalize="off"
                              spellcheck="false"
                              id="text_extramedia_0"></textarea>
                </div>';

                echo '<div class="mainMediaDiv">';
                    echo '<div id="runtimeDiv">
                        <label for="unsignedinteger_runtime_0">
                            <strong>Runtime</strong>
                            <span>(Min)</span>
                        </label>
                        <input class="textfield"
                               type="text"
                               name="runtime"
                               id="unsignedinteger_runtime_0"
                               value="0">
                    </div>';

                    echo '<div id="barcodeDiv">
                        <label for="text_barcode_0">
                            <strong>Barcode</strong>
                        </label>
                        <input class="textfield"
                               type="text"
                               name="barcode"
                               autocomplete="off"
                               autocapitalize="off"
                               spellcheck="false"
                               id="text_barcode_0"
                               value="">
                    </div>';

                    echo '<div id="videoDiv">';
                        echo '<label for="text_video_0">
                            <strong>Video</strong>
                        </label>';
                        echo '<input id="text_video_0"
                                     list="videolist"
                                     name="video"
                                     class="textfield"
                                     autocomplete="off"
                                     autocapitalize="off"
                                     spellcheck="false"
                                     value="16:9 Widescreen">';
                        echo '<datalist id="videolist">';
                            foreach ($w->_tpl_vars["optionlistVideo"] as $option) {
                                echo '<option value="' . $option . '">';
                            }
                        echo '</datalist>';
                    echo '</div>';
                echo '</div>';

                echo '<div class="mainMediaDiv mainMediaDiv2">';
                    echo '<div id="mediaSubtitleDiv">';
                        echo '<label for="text_subtitles_0">
                            <strong>Media Subtitle</strong>
                        </label>';
                        echo '<input id="text_subtitles_0"
                                     list="subtitlelist"
                                     name="subtitles"
                                     value="Nederlands"
                                     autocomplete="off"
                                     autocapitalize="off"
                                     spellcheck="false"
                                     class="textfield">';
                        echo '<datalist id="subtitlelist">';
                            foreach ($w->_tpl_vars["optionlistSubtitles"] as $option) {
                                echo '<option value="' . $option . '">';
                            }
                        echo '</datalist>';
                    echo '</div>';

                    echo '<div id="regioncodeDiv">';
                        echo '<label for="text_regioncode_0">
                            <strong>Region Code</strong>
                        </label>';
                        echo '<input class="textfield"
                                     autocomplete="off"
                                     autocapitalize="off"
                                     spellcheck="false"
                                     list="regioncodes"
                                     id="text_regioncode_0"
                                     value="B"
                                     name="regioncode">';
                        echo '<datalist id="regioncodes">';
                            foreach ($w->_tpl_vars["optionlistRegioncode"] as $option) {
                                echo '<option value="' . $option . '">';
                            }
                        echo '</datalist>';
                    echo '</div>';

                    echo '<div id="audio1Div">';
                        echo '<label for="text_audio1_0">
                            <strong>Audio Track 1</strong>
                        </label>';
                        echo '<input id="text_audio1_0"
                                     list="audiotypeslist1"
                                     autocomplete="off"
                                     autocapitalize="off"
                                     spellcheck="false"
                                     name="audio1"
                                     class="textfield"
                                     value="Dolby Digital 5.1">';
                        echo '<datalist id="audiotypeslist1">';
                            foreach ($w->_tpl_vars["optionlistAudiotypes"] as $option) {
                                echo '<option value="' . $option . '">';
                            }
                        echo '</datalist>';
                    echo '</div>';
                echo '</div>';

                echo '<div class="mainMediaDiv mainMediaDiv2">';

                    echo '<div id="externalSubtitleDiv">';
                        echo '<label for="text_externalsubtitles_0">
                            <strong>External Subtitle</strong>
                        </label>';
                        echo '<input id="text_externalsubtitles_0"
                                     list="externalSubtitleList"
                                     autocomplete="off"
                                     autocapitalize="off"
                                     spellcheck="false"
                                     name="externalsubtitles"
                                     value=""
                                     class="textfield">';
                        echo '<datalist id="externalSubtitleList">';
                            foreach ($w->_tpl_vars["optionlistSubtitles"] as $option) {
                                echo '<option value="' . $option . '">';
                            }
                        echo '</datalist>';
                    echo '</div>';

                    echo '<div id="formatDiv">';
                        echo '<label for="text_format_0">
                            <strong>Format</strong>
                        </label>';
                        echo '<input class="textfield"
                                     autocomplete="off"
                                     autocapitalize="off"
                                     spellcheck="false"
                                     list="formats"
                                     id="text_format_0"
                                     name="format"
                                     type="text"
                                     value="MKV">';
                        echo '<datalist id="formats">';
                            foreach ($w->_tpl_vars["optionlistFormats"] as $option) {
                                echo '<option value="' . $option . '">';
                            }
                        echo '</datalist>';
                    echo '</div>';

                    echo '<div id="audio2Div">';
                        echo '<label for="text_audio2_0">
                            <strong>Audio Track 2</strong>
                        </label>';
                        echo '<input id="text_audio2_0"
                                     autocomplete="off"
                                     autocapitalize="off"
                                     spellcheck="false"
                                     list="audiotypeslist2"
                                     name="audio2"
                                     class="textfield"
                                     value="">';
                        echo '<datalist id="audiotypeslist2">';
                            foreach ($w->_tpl_vars["optionlistAudiotypes"] as $option) {
                                echo '<option value="' . $option . '">';
                            }
                        echo '</datalist>';
                    echo '</div>';

                echo '</div>';

                echo '<div class="mainMediaDiv mainMediaDiv2">';

                    echo '<div id="mediacertificationsDiv">';
                        echo '<label for="text_mediacertifications_0">
                            <strong>Certification</strong>
                        </label>';
                        echo '<input id="text_mediacertifications_0"
                                     list="mediacertificationsList"
                                     autocomplete="off"
                                     autocapitalize="off"
                                     spellcheck="false"
                                     name="mediacertifications"
                                     value=""
                                     class="textfield">';
                        echo '<datalist id="mediacertificationsList">';
                            foreach ($w->_tpl_vars["optionlistMediacertifications"] as $option) {
                                echo '<option value="' . $option . '">';
                            }
                        echo '</datalist>';
                    echo '</div>';

                    echo '<div id="mediacountryDiv">';
                        echo '<label for="text_mediacountry_0">
                            <strong>Country of Origin</strong>
                        </label>';
                        echo '<input id="text_mediacountry_0"
                                     list="mediacountryList"
                                     autocomplete="off"
                                     autocapitalize="off"
                                     spellcheck="false"
                                     name="mediacountry"
                                     value=""
                                     class="textfield">';
                        echo '<datalist id="mediacountryList">';
                            foreach ($w->_tpl_vars["optionlistMediacountry"] as $option) {
                                echo '<option value="' . $option . '">';
                            }
                        echo '</datalist>';
                    echo '</div>';

                echo '</div>';

                echo '<div class="mainMediaDiv mainMediaDiv2">';

                    echo '<div id="mediaEditionDiv">';
                        echo '<label for="text_mediaEdition_0">
                            <strong>Edition</strong>
                        </label>';
                        echo '<input id="text_mediaEdition_0"
                                     list="mediaEditionList"
                                     autocomplete="off"
                                     autocapitalize="off"
                                     spellcheck="false"
                                     name="mediaEdition"
                                     value=""
                                     class="textfield">';
                        echo '<datalist id="mediaEditionList">';
                            foreach ($w->_tpl_vars["optionlistMediaEdition"] as $option) {
                                echo '<option value="' . $option . '">';
                            }
                        echo '</datalist>';
                    echo '</div>';

                echo '</div>';

            echo '</div>';

            echo '<div id="mainCastCrew">';
                echo '<div><h3>Cast & Crew</h3></div>';
                echo '<div id="mainCastCrewDiv">';

                    echo '<div id="directorDiv">';
                        echo '<label for="text_director_0">
                            <strong>Director</strong>
                            <span>(Pattern: Name\nImdbid\nRole\n~\n)</span>
                        </label>';
                        echo '<textarea class="textarea"
                                        name="director"
                                        autocomplete="off"
                                        autocapitalize="off"
                                        spellcheck="false"
                                        id="text_director_0">';
                                    if (isset($movie)) {
                                        $directors = $movie->director();
                                        foreach ($directors as $key => $director) {
                                            echo $director["name"] . '&#10;';
                                            echo $director["imdb"];
                                            if (!empty($director["role"])) {
                                                echo '&#10;';
                                                echo $director["role"];
                                            }
                                            if ($key !== array_key_last($directors)) {
                                                echo '&#10;~&#10;';
                                            }
                                        }
                                    }
                        echo '</textarea>';
                    echo '</div>';

                    echo '<div id="castDivEdit">';
                        echo '<label for="text_cast_0">
                            <strong>Cast</strong>
                            <span>(Pattern: Name\nImdbid\nRole\n~\n)</span>
                        </label>';
                        echo '<textarea class="textarea"
                                        name="cast"
                                        autocomplete="off"
                                        autocapitalize="off"
                                        spellcheck="false"
                                        id="text_cast_0">';
                                    if (isset($movie)) {
                                        $casts = $movie->cast();
                                        foreach ($casts as $key => $cast) {
                                            echo $cast["name"] . '&#10;';
                                            echo $cast["imdb"];
                                            if (count($cast["character"]) > 0 || $cast["name_alias"] != "" || $cast["credited"] === false || count($cast["comment"]) > 0) {
                                                echo '&#10;';
                                            }
                                            foreach ($cast["character"] as $keyCharacter => $character) {
                                                echo $character;
                                                if ($keyCharacter !== array_key_last($cast["character"])) {
                                                    echo ' / ';
                                                }
                                            }
                                            if (!empty($cast["name_alias"])) {
                                                if (count($cast["character"]) > 0) {
                                                    echo ' ';
                                                }
                                                echo '(as ' . $cast["name_alias"] . ')';
                                            }
                                            if ($cast["credited"] === false) {
                                                if (count($cast["character"]) > 0) {
                                                    echo ' ';
                                                }
                                                echo '(uncredited)';
                                            }
                                            if (count($cast["comment"]) > 0) {
                                                echo ' ';
                                            }
                                            foreach ($cast["comment"] as $keyComment => $comment) {
                                                echo '(' . $comment . ')';
                                                if ($keyComment !== array_key_last($cast["comment"])) {
                                                    echo ' ';
                                                }
                                            }
                                            if ($key !== array_key_last($casts)) {
                                                echo '&#10;~&#10;';
                                            }
                                        }
                                    }
                        echo '</textarea>';
                    echo '</div>';

                    echo '<div id="writerDiv">';
                        echo '<label for="text_writer_0">
                            <strong>Writer</strong>
                            <span>(Pattern: Name\nImdbid\nRole\n~\n)</span>
                        </label>';
                        echo '<textarea class="textarea"
                                        name="writer"
                                        autocomplete="off"
                                        autocapitalize="off"
                                        spellcheck="false"
                                        id="text_writer_0">';
                                    if (isset($movie)) {
                                        $writers = $movie->writer();
                                        foreach ($writers as $key => $writer) {
                                            echo $writer["name"] . '&#10;';
                                            echo $writer["imdb"];
                                            if (!empty($writer["role"])) {
                                                echo '&#10;';
                                                echo $writer["role"];
                                            }
                                            if ($key !== array_key_last($writers)) {
                                                echo '&#10;~&#10;';
                                            }
                                        }
                                    }
                        echo '</textarea>';
                    echo '</div>';

                    echo '<div id="producerDiv">';
                        echo '<label for="text_producer_0">
                            <strong>Producer</strong>
                            <span>(Pattern: Name\nImdbid\nRole\n~\n)</span>
                        </label>';
                        echo '<textarea class="textarea"
                                        name="producer"
                                        autocomplete="off"
                                        autocapitalize="off"
                                        spellcheck="false"
                                        id="text_producer_0">';
                                    if (isset($movie)) {
                                        $producers = $movie->producer();
                                        foreach ($producers as $key => $producer) {
                                            echo $producer["name"] . '&#10;';
                                            echo $producer["imdb"];
                                            if (!empty($producer["role"])) {
                                                echo '&#10;';
                                                echo $producer["role"];
                                            }
                                            if ($key !== array_key_last($producers)) {
                                                echo '&#10;~&#10;';
                                            }
                                        }
                                    }
                        echo '</textarea>';
                    echo '</div>';

                    echo '<div id="composerDiv">';
                        echo '<label for="text_composer_0">
                            <strong>Composer</strong>
                            <span>(Pattern: Name\nImdbid\n~\n)</span>
                        </label>';
                        echo '<textarea class="textarea"
                                        name="composer"
                                        autocomplete="off"
                                        autocapitalize="off"
                                        spellcheck="false"
                                        id="text_composer_0">';
                                    if (isset($movie)) {
                                        $composers = $movie->composer();
                                        foreach ($composers as $key => $composer) {
                                            echo $composer["name"] . '&#10;';
                                            echo $composer["imdb"];
                                            if (!empty($composer["role"])) {
                                                echo '&#10;';
                                                echo $composer["role"];
                                            }
                                            if ($key !== array_key_last($composers)) {
                                                echo '&#10;~&#10;';
                                            }
                                        }
                                    }
                        echo '</textarea>';
                    echo '</div>';

                    echo '<div id="principalCreditsDiv">';
                        echo '<label for="text_principalCredits_0">
                            <strong>Principal Credits</strong>
                        <span>(Pattern: Category\nName,Imdbid\n~\n)</span>
                        </label>';
                        echo '<textarea class="textarea"
                                        name="principalCredits"
                                        autocomplete="off"
                                        autocapitalize="off"
                                        spellcheck="false"
                                        id="text_principalCredits_0">';
                                    if (isset($movie)) {
                                        $principalCredits = $movie->principalCredits();
                                        foreach ($principalCredits as $key => $principalCredit) {
                                            echo $key . '&#10;';
                                            foreach ($principalCredit as $key2 => $credit) {
                                                echo $credit["name"] . ',' . $credit["imdbid"];
                                                if ($key2 !== array_key_last($principalCredit)) {
                                                    echo '&#10;';
                                                }
                                            }
                                            if ($key !== array_key_last($principalCredits)) {
                                                echo '&#10;~&#10;';
                                            }
                                        }
                                    }
                        echo '</textarea>';
                    echo '</div>';

                echo '</div>';

            echo '</div>';

            echo '<div id="mainDidYouKnow">';
                echo '<div><h3>Did You Know?</h3></div>';

                echo '<div id="mainDidYouKnowDiv">';

                    echo '<div id="triviaDiv">';
                        echo '<label for="text_trivia_0">
                            <strong>Trivia</strong>
                            <span>(Pattern: Trivia\n~\n)</span>
                        </label>';
                        echo '<textarea class="textarea"
                                        name="trivia"
                                        autocomplete="off"
                                        autocapitalize="off"
                                        spellcheck="false"
                                        id="text_trivia_0">';
                                    if (isset($movie)) {
                                        $trivias = $movie->trivia();
                                        foreach ($trivias as $key => $trivia) {
                                            echo $trivia;
                                            if ($key !== array_key_last($trivias)) {
                                                echo '&#10;~&#10;';
                                            }
                                        }
                                    }
                        echo '</textarea>';
                    echo '</div>';

                    echo '<div id="quotesDiv">';
                        echo '<label for="text_quotes_0">
                            <strong>Quotes</strong>
                            <span>(Pattern: Quotes\n~\n)</span>
                        </label>';
                        echo '<textarea class="textarea"
                                        name="quotes"
                                        autocomplete="off"
                                        autocapitalize="off"
                                        spellcheck="false"
                                        id="text_quotes_0">';
                                    if (isset($movie)) {
                                        $quotes = $movie->quote();
                                        foreach ($quotes as $key => $item) {
                                            foreach ($item as $key2 => $quote) {
                                                echo $quote;
                                                if ($key2 !== array_key_last($item)) {
                                                    echo '&#10;';
                                                }
                                            }
                                            if ($key !== array_key_last($quotes)) {
                                                echo '&#10;~&#10;';
                                            }
                                        }
                                    }
                        echo '</textarea>';
                    echo '</div>';

                    echo '<div id="alternateversionsDiv">';
                        echo '<label for="text_alternateversions_0">
                            <strong>Alternate Versions</strong>
                            <span>(Pattern: Alternate Versions\n~\n)</span>
                        </label>';
                        echo '<textarea class="textarea"
                                        name="alternateversions"
                                        autocomplete="off"
                                        autocapitalize="off"
                                        spellcheck="false"
                                        id="text_alternateversions_0">';
                                    if (isset($movie)) {
                                        $alternateversions = $movie->alternateversion();
                                        foreach ($alternateversions as $key => $alternateversion) {
                                            echo $alternateversion;
                                            if ($key !== array_key_last($alternateversions)) {
                                                echo '&#10;~&#10;';
                                            }
                                        }
                                    }
                        echo '</textarea>';
                    echo '</div>';

                    echo '<div id="soundtracksDiv">';
                        echo '<label for="text_soundtracks_0">
                            <strong>Soundtracks</strong>
                            <span>(Pattern: soundtrack\n~\n)</span>
                        </label>';
                        echo '<textarea class="textarea"
                                        name="soundtracks"
                                        autocomplete="off"
                                        autocapitalize="off"
                                        spellcheck="false"
                                        id="text_soundtracks_0">';
                                    if (isset($movie)) {
                                        $soundtracks = $movie->soundtrack();
                                        foreach ($soundtracks as $key => $soundtrack) {
                                        echo $soundtrack["soundtrack"];
                                        if (count($soundtrack["credits"])> 0) {
                                            echo '&#10;';
                                            foreach ($soundtrack["credits"] as $keyCredit => $credit) {
                                                echo $credit;
                                                if ($keyCredit !== array_key_last($soundtrack["credits"])) {
                                                    echo '&#10;';
                                                }
                                            }
                                        }
                                        if ($key !== array_key_last($soundtracks)) {
                                            echo '&#10;~&#10;';
                                        }
                                    }
                                    }
                        echo '</textarea>';
                    echo '</div>';

                    echo '<div id="locationsDiv">';
                        echo '<label for="text_locations_0">
                            <strong>Filming Locations</strong>
                            <span>(Pattern: Location\n~\n)</span>
                        </label>';
                        echo '<textarea class="textarea"
                                        name="locations"
                                        autocomplete="off"
                                        autocapitalize="off"
                                        spellcheck="false"
                                        id="text_locations_0">';
                                    if (isset($movie)) {
                                        $locations = $movie->location();
                                        foreach ($locations as $key => $location) {
                                            echo $location["real"];
                                            if (count($location["movie"]) > 0) {
                                                echo '&#10;(';
                                                foreach ($location["movie"] as $keyMovie => $movieLocation) {
                                                    echo $movieLocation;
                                                    if ($keyMovie !== array_key_last($location["movie"])) {
                                                        echo ', ';
                                                    } else {
                                                        echo ')';
                                                    }
                                                }
                                                if ($key !== array_key_last($locations)) {
                                                    echo '&#10;~&#10;';
                                                }
                                            } else {
                                                if ($key !== array_key_last($locations)) {
                                                    echo '&#10;~&#10;';
                                                }
                                            }
                                        }
                                    }
                        echo '</textarea>';
                    echo '</div>';

                echo '</div>';

            echo '</div>';

            echo '<div id="mainSeasons">';
                echo '<div><h3>Series</h3></div>';

                echo '<div id="episodesDiv">';
                    echo '<label for="text_episodes_0">
                        <strong>Episodes</strong>
                            <span>
                                (Pattern: Season\n#\nEpisode\nImdbid\nTitle\nAirdate\nPlot\n@\n Seasons are separated by ~)
                            </span>
                    </label>';
                    echo '<textarea name="episodes"
                                    id="text_episodes_0"
                                    autocomplete="off"
                                    autocapitalize="off"
                                    spellcheck="false"
                                    class="textarea">';
                                if (isset($movie)) {
                                    $episodes = $movie->episode();
                                    foreach ($episodes as $key => $item) {
                                        echo $key . '&#10;#&#10;';
                                        foreach ($item as $key2 => $episode) {
                                            echo $episode["episode"] . '&#10;';
                                            echo $episode["imdbid"] . '&#10;';
                                            echo $episode["title"] . '&#10;';
                                            echo $episode["airdate"] . '&#10;';
                                            echo $episode["plot"];
                                            if ($key2 !== array_key_last($item)) {
                                                echo '&#10;@&#10;';
                                            }
                                        }
                                        if ($key !== array_key_last($episodes)) {
                                            echo '&#10;~&#10;';
                                        }
                                    }
                                }
                    echo '</textarea>';
                echo '</div>';

            echo '</div>';

            echo '<div>';
                echo '<input type="hidden"
                             name="add"
                             value="0">';
            echo '</div>';

        echo '</form>';
    }
echo '</div>';
?>