<?php
echo '<div id="loaderEdit" class="loading"></div>';

echo '<div id="AddMain">';
    echo '<div id="mainRight">';
        if ($w->_tpl_vars["loggedin"] && $User->isEditor()) {
            echo '<div id="controls">';
                echo '<div id="mainRightDiv1">';
                    $movie->controlButton("editBack");
                echo '</div>';
                echo '<div id="mainRightDiv2">';
                    $movie->controlButton("update");
                echo '</div>';
            echo '</div>';
        }

        echo '<div id="mainRightPhoto">';
            if (isset($w->_tpl_vars["imgFrontError"])) {
                echo '<div class="PhotoCoverError">' . $w->_tpl_vars["imgFrontError"] . '</div>';
            }
            if ($movie->hasPhoto($w->_tpl_vars["photopath"])) {
                echo '<img id="photo"
                           src="' . $w->_tpl_vars["photopath"] . $movie->id . '.jpg"
                           alt="' . $movie->name . '">';
            } else {
                echo '<img id="photo"
                           src="' . $w->template_include_dir . 'images/noFrontPoster.jpg"
                           alt="Front photo not available">';
            }
        echo '</div>';

        echo '<div class="browse">';
            echo '<label class="labelCover" for="text_cover_0">';
                echo '<img src="' . $w->template_include_dir . 'images/icons/browse.png"
                           alt="browse icon">
                           Browse..';
            echo '</label>';
        echo '</div>';

        echo '<div class="searchAnchors">';
            echo '<span>';
                $movie->searchLink();
            echo '</span>';
        echo '</div>';

        echo '<div id="mainRightCover">';
            if (isset($w->_tpl_vars["imgError"])) {
                echo '<div class="PhotoCoverError">' . $w->_tpl_vars["imgError"] . '</div>';
            }
            if ($movie->hasCover($w->_tpl_vars["coverpath"])) {
                echo '<img id="fullCover" src="' . $w->_tpl_vars["coverpath"] . 'tn_' . $movie->id . '.jpg"
                           alt="' . $movie->name . '">';
            } else {
                echo '<img id="fullCover"
                           src="' . $w->template_include_dir . 'images/noBackPoster.jpg"
                           alt="No Back Cover">';
            }
            if ($movie->hasCover($w->_tpl_vars["coverpath"])) {
                echo '<div id="removeCoverLink">';
                    echo '<a href="javascript:void(0);"
                       onclick="if(removeCover(\'' . $movie->id . '\')) location.reload(true)">';
                            echo '<img src="' . $w->template_include_dir . 'images/icons/delete.png"
                                       alt="Remove cover"
                                       title="Remove cover">';
                    echo '</a>';
                echo '</div>';
            }
        echo '</div>';

        echo '<div class="browse">';
            echo '<label class="labelCover" for="text_cover_2">';
                echo '<img src="' . $w->template_include_dir . 'images/icons/browse.png"
                           alt="Browse icon">
                           Browse..';
            echo '</label>';
        echo '</div>';

        echo '<div class="searchAnchors">';
            echo '<span>';
                $movie->searchLink();
            echo '</span>';
        echo '</div>';

    echo '</div>';

    echo '<form name="editform"
                method="POST"
                action="./&#63;go=edit&amp;id=' . $movie->id . '"
                enctype="multipart/form-data"
                onsubmit="if(verify(this)) return true; else alert(\'Field Error!\'); return false;">';
        echo '<input accept="image/jpeg, image/webp, image/png"
                     class="visually-hidden"
                     type="file"
                     name="frontCoverEdit"
                     id="text_cover_0"
                     onchange="uploadImage(document.getElementById(\'text_cover_0\'))">';
        echo '<input accept="image/jpeg, image/webp, image/png"
                     class="visually-hidden"
                     type="file"
                     name="cover"
                     id="text_cover_2"
                     onchange="uploadImage(document.getElementById(\'text_cover_2\'));
                               removeCoverLink(document.getElementById(\'removeCoverLink\'));">';

        echo '<div id="mainTitle">';
            echo '<div id="buttonAdd">';
                echo '<div class="buttons">';
                    echo '<button type="submit"
                                  name="submit"
                                  class="positive">';
                        echo '<img src="' . $w->template_include_dir . 'images/icons/tick.png"
                                   alt="">
                                   Save';
                    echo '</button>';
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
                                     value="' . $movie->imdbid . '">';
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
                                     value="' . $movie->name . '">';
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
                                        id="text_aka_0">' . $movie->aka . '</textarea>';
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
                                     value="' . $movie->movietype . '">';
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
                                     value="' .$movie->year . '">';
                    echo '</div>';

                    echo '<div id="endyearDiv">';
                        echo '<label for="text_endyear_0">
                            <strong>Endyear</strong>
                        </label>';
                        echo '<input class="textfield"
                                     type="text"
                                     name="endyear"
                                     id="text_endyear_0"
                                     value="' .$movie->endyear . '">';
                    echo '</div>';

                    echo '<div id="top250Div">';
                        echo '<label for="text_top250_0">
                            <strong>Top 250</strong>
                        </label>';
                        echo '<input class="textfield"
                                     type="text"
                                     name="top250"
                                     id="text_top250_0"
                                     value="' . $movie->top250 . '">';
                    echo '</div>';

                    echo '<div id="ratingDiv">';
                        echo '<label for="text_rating_0">
                            <strong>Rating</strong>
                        </label>';
                        echo '<input class="textfield"
                                     type="text"
                                     name="rating"
                                     id="text_rating_0"
                                     value="' . $movie->rating . '">';
                    echo '</div>';

                    echo '<div id="metascoreDiv">';
                        echo '<label for="text_metacritics_0">
                            <strong>Score</strong>
                        </label>';
                        echo '<input class="textfield"
                                     type="text"
                                     name="metacritics"
                                     id="text_metacritics_0"
                                     value="' . $movie->metacritics . '">';
                    echo '</div>';

                echo '</div>';

                echo '<div id="plotOutline">';
                    echo '<div>';
                        echo '<label for="text_plotoutline_0">
                            <strong>Plot Outline</strong>
                        </label>';
                        echo '<textarea class="textarea"
                                        name="plotoutline"
                                        autocomplete="off"
                                        autocapitalize="off"
                                        spellcheck="false"
                                        id="text_plotoutline_0">' . $movie->plotoutline . '</textarea>';
                    echo '</div>';
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
                                    id="text_languages_0">' . $movie->languages . '</textarea>';
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
                                    id="text_country_0">' . $movie->country . '</textarea>';
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
                                    id="text_genres_0">' . $movie->genres . '</textarea>';
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
                                    id="text_duration_0">' . $movie->duration . '</textarea>';
                echo '</div>';

                echo '<div id="youtubeTrailer">';
                    echo '<label class="mainDetailsLabel" for="url_trailer_0">';
                        echo '<strong>Trailer URL (ImDb or Youtube)</strong>';
                        echo '<span class="span">(Sep. by linebreak, 3 trailers supported)</span>';
                        echo '<span>';
                            $movie->searchLinkYoutube();
                        echo '</span>';
                        echo '<span id="template">';
                            echo '<a href="#anchor"
                                     class="trigger"
                                     onclick="imdbTrailerTemplate()">';
                                echo '<b>Imdb Template</b>';
                            echo '</a>';
                        echo '</span>';
                    echo '</label>';
                    echo '<textarea class="textarea"
                                    name="trailer"
                                    autocomplete="off"
                                    autocapitalize="off"
                                    spellcheck="false"
                                    id="url_trailer_0">' . $movie->trailer . '</textarea>';
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
                                    id="url_mainaward_0">' . $movie->mainaward . '</textarea>';
                echo '</div>';

                echo '<div id="notesDiv">';
                    echo '<label class="mainDetailsLabel" for="text_notes_0">
                            <strong>Notes</strong>
                    </label>';
                    echo '<textarea class="textarea textareaNotes"
                                    autocomplete="off"
                                    autocapitalize="off"
                                    spellcheck="false"
                                    name="notes"
                                    id="text_notes_0">' . $movie->notes . '</textarea>';
                echo '</div>';

                echo '<div class="mainDetailsOwn">';
                    echo '<div id="mainDetailsDiv2">';

                        echo '<label class="mainDetailsLabel">
                            <strong>Own / Wishlist</strong>
                        </label>';

                        echo '<div>';
                            echo '<input type="radio"
                                         name="own"
                                         id="own_yes"
                                         value="1"';
                                         $movie->ownYes();
                            echo '>';
                            echo '<label class="mainDetailsLabel1"
                                         for="own_yes">Yes</label>';
                        echo '</div>';

                        echo '<div class="noWish">';
                            echo '<input type="radio"
                                         name="own"
                                         id="own_no"
                                         value="0"';
                                         $movie->ownNo();
                            echo '>';
                            echo '<label class="mainDetailsLabel1"
                                         for="own_no">No</label>';
                        echo '</div>';

                        echo '<div class="noWish">';
                            echo '<input type="radio"
                                         name="own"
                                         id="wish_list"
                                         value="2"';
                                         $movie->ownWish();
                            echo '>';
                            echo '<label for="wish_list">Wish</label>';
                        echo '</div>';

                    echo '</div>';
                echo '</div>';

                echo '<div class="mainDetailsLoaned">';
                    echo '<div id="mainDetailsLoanedDiv2">';

                        echo '<label class="mainDetailsLabel">
                            <strong>Loaned</strong>
                        </label>';
                        echo '<div>';

                            echo '<input type="radio"
                                         name="loaned"
                                         id="loaned_no"
                                         value="0"
                                         onclick="doLoandate(\'loan\', false);"';
                                         $movie->loanNo();
                            echo '>';
                            echo '<label for="loaned_no">No</label>';
                        echo '</div>';

                        echo '<div>';
                            echo '<input type="radio"
                                         name="loaned"
                                         id="loaned_yes" 
                                         value="1"
                                         onclick="doLoandate(\'loan\', true);"';
                                         $movie->loanYes();
                            echo '>';
                            echo '<label class="mainDetailsLabel1" for="loaned_yes">Yes</label>';
                        echo '</div>';

                    echo '</div>';

                    echo '<div id="loan"';
                        $movie->loanDisplay();
                    echo '>';

                        echo '<div id="loanName">';
                            echo '<label class="mainDetailsLabel">
                                    <strong>Name</strong>
                                </label>';
                            echo '<input class="textfield"
                                         type="text"
                                         name="loanname"
                                         id="text_loanname_0"
                                         autocomplete="off"
                                         autocapitalize="off"
                                         spellcheck="false"
                                         value="' . $movie->loanname . '">';
                        echo '</div>';

                        echo '<div id="loanDate">';
                            echo '<label class="mainDetailsLabel">
                                <strong>Date</strong>
                            </label>';
                            echo '<input class="textfield"
                                         type="text"
                                         name="loandate"
                                         id="date_loandate_0"
                                         value="' . $movie->loanDateValue() . '"
                                         onfocus="loandateFocus();"
                                         onblur="loandateBlur();">';
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
                                    id="text_recommendations_0">' . $movie->recommendations . '</textarea>';
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
                                    id="text_plot_0">' . $movie->plot . '</textarea>';
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
                                    id="text_keywords_0">' . $movie->keywords . '</textarea>';
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
                                    id="text_taglines_0">' . $movie->taglines . '</textarea>';
                echo '</div>';

                echo '<div id="certificationsDiv">';
                    echo '<label for="text_certifications_0">
                        <strong>Certifications</strong>
                        <span>(Country\nCert\n~\n)</span>
                    </label>';
                    echo '<textarea class="textarea"
                                    name="certifications"
                                    autocomplete="off"
                                    autocapitalize="off"
                                    spellcheck="false"
                                    id="text_certifications_0">' . $movie->certifications . '</textarea>';
                echo '</div>';

            echo '</div>';

        echo '</div>';

        echo '<div id="mainMedia">';
            echo '<div><h3>Media</h3></div>';

            echo '<div id="extraMediaDiv">';
                echo '<label for="text_extramedia_0">
                    <strong>Extra Media</strong>
                    <span>
                        <a href="#anchor"
                           class="trigger"
                           onclick="extraMediaTemplate()">
                            <b>Template</b>
                        </a>
                    </span>
                </label>';
                echo '<textarea class="textarea"
                                name="extramedia"
                                autocomplete="off"
                                autocapitalize="off"
                                spellcheck="false"
                                id="text_extramedia_0">' . $movie->extramedia . '</textarea>';
            echo '</div>';

            echo '<div class="mainMediaDiv">';

                echo '<div id="runtimeDiv">';
                    echo '<label for="unsignedinteger_runtime_0">
                        <strong>Runtime</strong>
                        <span>(Min)</span>
                    </label>';
                    echo '<input class="textfield"
                                 type="text"
                                 name="runtime"
                                 id="unsignedinteger_runtime_0"
                                 onblur="checkRuntime();"
                                 value="' . $movie->runtime. '">';
                echo '</div>';

                echo '<div id="barcodeDiv">';
                    echo '<label for="text_barcode_0">
                        <strong>Barcode</strong>
                    </label>';
                    echo '<input class="textfield"
                                 type="text"
                                 name="barcode"
                                 id="text_barcode_0"
                                 autocomplete="off"
                                 autocapitalize="off"
                                 spellcheck="false"
                                 value="' . $movie->barcode . '">';
                echo '</div>';

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
                                 value="' . $movie->video . '">';
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
                                 autocomplete="off"
                                 autocapitalize="off"
                                 spellcheck="false"
                                 name="subtitles"
                                 class="textfield"
                                 value="' . $movie->subtitles . '">';
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
                                 name="regioncode"
                                 value="' .$movie->regioncode . '">';
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
                                 value="' . $movie->audio1 . '">';
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
                                 class="textfield"
                                 value="' . $movie->externalsubtitles . '">';
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
                                 value="' . $movie->format . '">';
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
                                 value="' . $movie->audio2 . '">';
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
                                 class="textfield"
                                 value="' . $movie->mediacertifications . '">';
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
                                 class="textfield"
                                 value="' . $movie->mediacountry . '">';
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
                                 class="textfield"
                                 value="' . $movie->mediaEdition . '">';
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
                                    id="text_director_0">' . $movie->director . '</textarea>';
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
                                    id="text_cast_0">' . $movie->cast . '</textarea>';
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
                                    id="text_writer_0">' . $movie->writer . '</textarea>';
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
                                    id="text_producer_0">' . $movie->producer . '</textarea>';
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
                                    id="text_composer_0">' . $movie->composer . '</textarea>';
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
                                    id="text_principalCredits_0">' . $movie->principalCredits . '</textarea>';
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
                                    id="text_trivia_0">' . $movie->trivia . '</textarea>';
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
                                    id="text_quotes_0">' . $movie->quotes . '</textarea>';
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
                                    id="text_alternateversions_0">' . $movie->alternateversions . '</textarea>';
                echo '</div>';

                echo '<div id="soundtracksDiv">';
                    echo '<label for="text_soundtracks_0">
                        <strong>Soundtracks</strong>
                        <span>(Pattern: Soundtrack\nCredits\n~\n)</span>
                    </label>';
                    echo '<textarea class="textarea"
                                    name="soundtracks"
                                    autocomplete="off"
                                    autocapitalize="off"
                                    spellcheck="false"
                                    id="text_soundtracks_0">' . $movie->soundtracks . '</textarea>';
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
                                    id="text_locations_0">' . $movie->locations . '</textarea>';
                echo '</div>';

            echo '</div>';

        echo '</div>';

        if ($movie->movietype === "TV Series" || $movie->movietype === "TV Mini Series") {
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
                                    class="textarea">' . $movie->episodes . '</textarea>';
                echo '</div>';

            echo '</div>';
        }

        echo '<div>
            <input type="hidden" name="update" value="0">
        </div>';

    echo '</form>';

echo '</div>';
?>