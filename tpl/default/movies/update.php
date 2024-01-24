<?php
echo '<div id="loaderUpdate" class="loading"></div>';

echo '<div id="AddMain">';

    echo '<div id="mainRightUpdate">';

        if ($w->_tpl_vars["loggedin"] && $User->isEditor()) {
            echo '<div id="controls">';
                echo '<div id="mainRightDiv1">';
                    echo '<button onclick="location.href=\'./&#63;go=movie&amp;id=' . $_GET["id"] . '\'"
                                  type="button"
                                  class="controlAnchor">';
                        echo '<img src="' . $w->template_include_dir . 'images/icons/back.png"
                             alt="Go Back"
                             title="Go Back">';
                    echo '</button>';
                echo '</div>';
            echo '</div>';
        }

        echo '<div id="mainRightPhoto">';
            if (isset($imdbmovie) && $imdbmovie->photo()) {
                echo '<img id="photo"
                           src="' . $imdbmovie->photo() . '"
                           alt="' . $imdbmovie->title() . '">';
            } else {
                echo '<img id="photo"
                           src="' . $w->template_include_dir . 'images/noFrontPoster.jpg"
                           alt="IMDb photo not available">';
            }
        echo '</div>';

    echo '</div>';

    echo '<form name="updatefrom"
                method="POST"
                action="./?go=update&amp;id=' . $w->_tpl_vars["mymovie"]->id . '"
                enctype="multipart/form-data"
                onsubmit="if(verify(this)) return true; else alert(\'Field Error!\'); return false;">';
        echo '<div id="mainTitle">';

            echo '<div id="buttonAdd">';
                echo '<div class="buttons">';
                    echo '<button onclick="loader(document.getElementById(\'loaderUpdate\'));"
                                  type="submit"
                                  name="submit"
                                  class="update">';
                        echo '<img src="' . $w->template_include_dir . 'images/icons/tick.png"
                                   alt="browse icon">
                                   Update';
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
                                     value="';
                                if (isset($imdbmovie)) {
                                    echo $imdbmovie->imdbid();
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
                                     value="';
                                if (isset($imdbmovie)) {
                                    echo $imdbmovie->title();
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
                                    if (isset($imdbmovie)) {
                                        $akas = $imdbmovie->alsoknow();
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
                                     autocomplete="off"
                                     autocapitalize="off"
                                     spellcheck="false"
                                     id="text_movietype_0"
                                     value="';
                                if (isset($imdbmovie)) {
                                    echo $imdbmovie->movietype();
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
                                if (isset($imdbmovie)) {
                                    echo $imdbmovie->year();
                                }
                                echo '">';
                    echo '</div>';

                    echo '<div id="endyearDiv">';
                        echo  '<label for="text_endyear_0">
                            <strong>Endyear</strong>
                        </label>';
                        echo '<input class="textfield"
                                     type="text"
                                     name="endyear"
                                     id="text_endyear_0"
                                     value="';
                                if (isset($imdbmovie)) {
                                    echo $imdbmovie->endyear();
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
                                if (isset($imdbmovie)) {
                                    echo $imdbmovie->top250();
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
                                if (isset($imdbmovie)) {
                                    echo $imdbmovie->rating();
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
                                if (isset($imdbmovie)) {
                                    echo $imdbmovie->metacritic();
                                } else {
                                    echo 0;
                                }
                                echo '">';
                    echo '</div>';

                echo '</div>';

                echo '<div id="plotOutline">';
                    echo '<div>';
                        echo '<label for="text_plotoutline_0">
                            <strong>Plot Outline</strong>
                        </label>';
                        echo '<textarea class="textarea"
                                        name="plotoutline"
                                        id="text_plotoutline_0">';
                                    if (isset($imdbmovie)) {
                                        echo $imdbmovie->plotoutline();
                                    }
                        echo '</textarea>';
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
                                    id="text_languages_0">';
                                if (isset($imdbmovie)) {
                                    $languages = $imdbmovie->language();
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
                                if (isset($imdbmovie)) {
                                    $countries = $imdbmovie->country();
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
                                if (isset($imdbmovie)) {
                                    $genres = $imdbmovie->genre();
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
                                if (isset($imdbmovie)) {
                                    $runtimes = $imdbmovie->runtime();
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

                if ($settings["trailer"] == true) {
                    echo '<div id="youtubeTrailer">';
                        echo '<label class="mainDetailsLabel" for="url_trailer_0">
                            <strong>Trailer URL (ImDb or Youtube)</strong>
                            <span class="span">(Sep. by linebreak)</span>
                        </label>';
                        echo '<textarea class="textarea"
                                        name="trailer"
                                        autocomplete="off"
                                        autocapitalize="off"
                                        spellcheck="false"
                                        id="url_trailer_0">';
                                    if (isset($imdbmovie) && count($imdbmovie->trailer()) > 0) {
                                        $trailers = $imdbmovie->trailer();
                                        foreach ($trailers as $key => $trailer) {
                                            echo $trailer["videoUrl"];
                                            if ($key !== array_key_last($trailers)) {
                                                echo '&#10;';
                                            }
                                        }
                                    }
                        echo '</textarea>';
                    echo '</div>';
                }
                
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
                                if (isset($imdbmovie) && count($imdbmovie->mainaward()) > 0) {
                                    $mainawards = $imdbmovie->mainaward();
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
                                if (isset($imdbmovie)) {
                                    $recommendations = $imdbmovie->recommendation();
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
                                if (isset($imdbmovie)) {
                                    $plots = $imdbmovie->plot();
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
                                if (isset($imdbmovie)) {
                                    $keywords = $imdbmovie->keyword();
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
                                if (isset($imdbmovie)) {
                                    $taglines = $imdbmovie->tagline();
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
                                if (isset($imdbmovie)) {
                                    $mpaas = $imdbmovie->mpaa();
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
                                if (isset($imdbmovie)) {
                                    $directors = $imdbmovie->director();
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
                                if (isset($imdbmovie)) {
                                    $casts = $imdbmovie->cast();
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
                                if (isset($imdbmovie)) {
                                    $writers = $imdbmovie->writer();
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
                                if (isset($imdbmovie)) {
                                    $producers = $imdbmovie->producer();
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
                                if (isset($imdbmovie)) {
                                    $composers = $imdbmovie->composer();
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
                                if (isset($imdbmovie)) {
                                    $principalCredits = $imdbmovie->principalCredits();
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
                                if (isset($imdbmovie)) {
                                    $trivias = $imdbmovie->trivia();
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
                                if (isset($imdbmovie)) {
                                    $quotes = $imdbmovie->quote();
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
                                if (isset($imdbmovie)) {
                                    $alternateversions = $imdbmovie->alternateversion();
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
                                if (isset($imdbmovie)) {
                                    $soundtracks = $imdbmovie->soundtrack();
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
                                if (isset($imdbmovie)) {
                                    $locations = $imdbmovie->location();
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

        if (isset($imdbmovie)) {
            if ($imdbmovie->movietype() === "TV Series" || $imdbmovie->movietype() === "TV Mini Series") {
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
                                    if (isset($imdbmovie)) {
                                        $episodes = $imdbmovie->episode();
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
            }
        }

        echo '<div>';
            echo '<input type="hidden"
                            name="update"
                            value="0">';
        echo '</div>';

    echo '</form>';

echo '</div>';
?>