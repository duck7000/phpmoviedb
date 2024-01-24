<?php
echo '<div id="rightColumn">';
    echo '<div id="rightColumnControls">';

        echo '<div id="controls">';

            echo '<div class="controlTopDiv">';
                $movie->controlButton("back");
            echo '</div>';
            if ($w->_tpl_vars["loggedin"] && $User->isEditor()) {

                echo '<div class="controlTopDiv2">';
                    $movie->controlButton("delete");
                echo '</div>';

                echo '<div class="controlTopDiv2">';
                    $movie->controlButton("edit");
                echo '</div>';
            }

            if ($movie->imdbid) {
                echo '<div class="controlTopDiv2">';
                    $movie->controlButton("imdb");
                echo '</div>';
            }
        echo '</div>';

        if ($movie->loaned) {
            echo '<div id="loanedDiv">';
                echo '<h2>Loaned</h2>';
                echo '<div id="div1">';
                    $movie->loanedList();
                echo '</div>';
            echo '</div>';
        }

        echo '<div id="ratingDiv">';
            echo '<h2>Rating</h2>';
            echo '<div id="ratingValue">';
                echo '<span id="ratingValueScore">' . $movie->rating . '</span>';
                echo '<span class="grey">/10</span>';
            echo '</div>';

            if ($movie->metacritics != 0) {
                echo '<div id="metacritics">';
                    $movie->metacriticsList();
                echo '</div>';
            }
        echo '</div>';

        echo '<div id="backCoverDiv">';
            if ($movie->hasCover($coverpath)) {
                echo '<div class="controlTopDiv2">';
                    $movie->controlButton("download");
                echo '</div>';
            }
            echo '<h2>Cover</h2>';
            echo '<div id="cover">';
                $movie->coverImgList();
            echo '</div>';
        echo '</div>';

        if ($movie->notes != "") {
            echo '<div id="notes">';
                echo '<div id="notesDiv1">';
                    echo '<h2>Notes</h2>';
                echo '</div>';
                echo '<div id="notesDiv2">';
                    echo $movie->getListBr("notes");
                echo '</div>';
            echo '</div>';
        }

        echo '<div id="techSpecs">';
            echo '<h2>Technical Specs</h2>';

            if ($movie->duration) {
                echo '<div id="runtimesDiv">';
                    if ($movie->countRuntimes() > 1) {
                        echo '<h4>Runtimes</h4>';
                    } else {
                        echo '<h4>Runtime</h4>';
                    }
                    echo '<div>';
                        $movie->runtimesList();
                    echo '</div>';
                echo '</div>';
            }

            if ($movie->imdbid) {
                echo '<div id="imdbDiv">';
                    echo '<h4>IMDb Id</h4>';
                    echo '<span class="techSpecsSpan">' . $movie->imdbid . '</span>';
                echo '</div>';
            }

            if ($movie->id) {
                echo '<div id="idDiv">';
                    echo '<h4>DB Id</h4>';
                    echo '<span class="techSpecsSpan">' . $movie->id . '</span>';
                echo '</div>';
            }

            echo '<div id="addedDiv">';
                echo '<h4>Date Added</h4>';
                echo '<span class="techSpecsSpan">';
                    echo $movie->stripAdded("added");
                echo '</span>';
            echo '</div>';

        echo '</div>';

        if ($movie->mainPhotoCheck() === true) {
            echo '<div id="photosRight">';
                echo '<h2>Photos</h2>';
                $movie->mainPhoto();
            echo '</div>';
        }

        if ($movie->locations) {
            echo '<div id="didYouKnowRight">';
                $movie->locationsList();
            echo '</div>';
        }

    echo '</div>';

    echo '<div id="leftColumn">';
        echo '<div id="leftColumnDiv1">';
            echo '<div id="leftColumnDiv2">';

                echo '<div id="leftColumnDiv3">';
                    echo '<div id="leftColumnDiv4">';
                        echo '<h1>' . $movie->name . '</h1>';
                    echo '</div>';
                    echo '<div id="leftColumnDiv5">';
                        echo $movie->subTextTitlebar();
                    echo '</div>';
                echo '</div>';

                echo '<div id="toptabs">';
                    echo '<div id="photo">';
                        $movie->moviepagePhoto();
                    echo '</div>';

                    echo '<div id="toptabsDiv1">';
                        if ($movie->genres) {
                            echo '<div id="topGenres">';
                                $movie->getListGenres();
                            echo '</div>';
                        }

                        if ($movie->plotoutline) {
                            echo '<div id="plotoutline">';
                                echo $movie->plotoutline;
                            echo '</div>';
                        }

                        if ($movie->principalCredits) {
                            echo '<div id="topCast">';
                                $movie->principalCreditsList();
                            echo '</div>';
                        }
                    echo '</div>';
                echo '</div>';

            echo '</div>';
        echo '</div>';


        echo '<div id="yellowBar">';
            $movie->top250();
            $movie->mainAward();
        echo '</div>';

        if ($movie->trailer !="") {
            echo '<div id="trailer">';
                echo '<div id="trailerDiv1">';
                    echo '<h2>Videos</h2>';
                echo '</div>';
                echo '<div id="trailerDiv2">';
                    $movie->trailerImg();
                echo '</div>';
            echo '</div>';
        }

        if ($movie->episodes !="") {
            echo '<div id="episodes">';
                echo '<div id="episodesDiv1">
                    <h2>Episodes</h2>
                </div>';
                echo '<div id="episodesDiv2">';
                    echo '<h4>Seasons</h4>';
                echo '</div>';
                echo '<div id="episodestabs">';
                    $movie->episodesList();
                echo '</div>';
            echo '</div>';
        }

        echo '<div id="castCrew">';
            echo '<div id="castCrewDiv1">
                <h2>Cast & Crew</h2>
            </div>';

            if ($movie->director) {
                echo '<div id="directorDiv">';
                    echo '<h4>Directed by</h4>';
                    $movie->castCrewList("director");
                    if ($movie->castCrewList("director", "more") === true) {
                        echo '<a id="moredirectorDiv"
                                 class="seeMoreLess"
                                 onclick="moreLess(\'directorDiv\', 10);">More</a>';
                    }
                echo '</div>';
            }

            if ($movie->writer) {
                echo '<div id="writerDiv">';
                    echo '<h4>Written by</h4>';
                    $movie->castCrewList("writer");
                    if ($movie->castCrewList("writer", "more") === true) {
                        echo '<a id="morewriterDiv"
                                 class="seeMoreLess"
                                 onclick="moreLess(\'writerDiv\', 10);">More</a>';
                    }
                echo '</div>';
            }

            if ($movie->cast) {
                echo '<div id="castDiv">';
                    echo '<h4>Cast <span>(in credits order)</span></h4>';
                    $movie->castCrewList("cast", "list" , 18);
                    if ($movie->castCrewList("cast", "more", 18) === true) {
                        echo '<div id="castSpan">';
                            echo '<a id="morecastDiv"
                                     class="seeMoreLess"
                                     onclick="moreLess(\'castDiv\', 18);">More</a>';
                        echo '</div>';
                    }
                echo '</div>';
            }

            if ($movie->producer) {
                echo '<div id="producerDiv">';
                    echo '<h4>Produced by</h4>';
                    $movie->castCrewList("producer");
                    if ($movie->castCrewList("producer", "more") === true) {
                        echo '<a id="moreproducerDiv"
                                 class="seeMoreLess"
                                 onclick="moreLess(\'producerDiv\', 10);">More</a>';
                    }
                echo '</div>';
            }

            if ($movie->composer) {
                echo '<div id="composerDiv">';
                    echo '<h4>Music by</h4>';
                    $movie->castCrewList("composer");
                    if ($movie->castCrewList("composer", "more") === true) {
                        echo '<a id="morecomposerDiv"
                                 class="seeMoreLess"
                                 onclick="moreLess(\'composerDiv\', 10);">More</a>';
                    }
                echo '</div>';
            }

        echo '</div>';

        if ($movie->recommendations) {
            echo '<div id="recommendations">';
                echo '<div id="recommendationsDiv1"><h2>More like this</h2></div>';

                echo '<div>';
                    echo '<div class="carousel">';
                        $slides = $movie->recSlides();
                        echo '<input checked="checked"
                                     class="carousel__activator"
                                     id="carousel-slide-activator-1"
                                     name="carousel"
                                     type="radio">
                        <input class="carousel__activator"
                               id="carousel-slide-activator-2"
                               name="carousel"
                               type="radio">
                        <input class="carousel__activator"
                               id="carousel-slide-activator-3"
                               name="carousel"
                               type="radio">';
                        if ($slides != 1) {
                            echo '<div class="carousel__controls">';
                                echo '<label class="carousel__control carousel__control--forward"
                                             for="carousel-slide-activator-2">&#x003E;
                                </label>';
                            echo '</div>';
                            echo '<div class="carousel__controls">';
                                echo '<label class="carousel__control carousel__control--forward"
                                             for="carousel-slide-activator-1">&#x3c;
                                </label>';
                                if ($slides == 3) {
                                    echo '<label class="carousel__control carousel__control--forward"
                                                 for="carousel-slide-activator-3">&#x003E;
                                    </label>';
                                }
                            echo '</div>';
                            echo '<div class="carousel__controls">';
                                echo '<label class="carousel__control carousel__control--forward"
                                             for="carousel-slide-activator-2">&#x3c;
                                </label>';
                            echo '</div>';
                        }
                        echo '<div class="carousel__screen">';
                            echo '<div class="carousel__track">';
                                $movie->recList();
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        }

        echo '<div id="storyline">';
            echo '<div id="storylineDiv1"><h2>Storyline</h2></div>';

            if ($movie->plot) {
                echo '<div id="plot">';
                    $movie->plotList();
                echo '</div>';
            }

            if ($movie->keywords) {
                echo '<div id="keywords">';
                    echo '<div id="keywordsBase">';
                        $movie->keywordsList();
                    echo '</div>';
                    if ($movie->keywordsList("more") === true) {
                        echo '<div id="keywordLink">';
                            echo '<a id="morekeywords"
                                        class="seeMoreLess"
                                        onclick="moreLess(\'keywords\', 10);">More</a>';
                        echo '</div>';
                    }
                echo '</div>';
            }

            if ($movie->taglines) {
                echo '<div id="taglines">';
                    $movie->taglinesList();
                echo '</div>';
            }

            if ($movie->genres) {
                echo '<div id="genres">';
                    if ($movie->langCountryGenresList("genres", "more") === true) {
                        echo '<h4>Genres</h4>';
                    } else {
                        echo '<h4>Genre</h4>';
                    }
                    $movie->langCountryGenresList("genres");
                echo '</div>';
            }

            if ($movie->certifications) {
                echo '<div id="certifications">';
                    echo '<div id="certificationsBase">';
                        $movie->certificationsList();
                    echo '</div>';
                echo '</div>';
            }

        echo '</div>';

        echo '<div id="details">';
            echo '<div id="detailsDiv1"><h2>Details</h2></div>';

            if ($movie->country) {
                echo '<div id="country">';
                    if ($movie->langCountryGenresList("country", "more") === true) {
                        echo '<h4>Countries</h4>';
                    } else {
                        echo '<h4>Country</h4>';
                    }
                    $movie->langCountryGenresList("country");
                echo '</div>';
            }

            if ($movie->languages) {
                echo '<div id="languages">';
                    if ($movie->langCountryGenresList("languages", "more") === true) {
                        echo '<h4>Languages</h4>';
                    } else {
                        echo '<h4>Language</h4>';
                    }
                    echo '<div id="languageDiv">';
                        $movie->langCountryGenresList("languages");
                    echo '</div>';
                echo '</div>';
            }

            if ($movie->aka) {
                echo '<div id="aka">';
                    $movie->akaList();
                echo '</div>';
            }

        echo '</div>';

        echo '<div id="media">';
            echo '<div id="mediaDiv1"><h2>Media</h2></div>';
            echo '<div id="mediaDiv2">';
                $movie->media();
            echo '</div>';
            if ($movie->extramedia) {
                echo '<div id="media2">';
                    echo '<div id="media2Div1"><h2>Media 2</h2></div>';
                    echo '<div id="media2Div2">';
                        $movie->extraMedia();
                    echo '</div>';
                echo '</div>';
            }
        echo '</div>';

        if ($movie->trivia ||
            $movie->quotes ||
            $movie->alternateversions ||
            $movie->soundtracks) {
            echo '<div id="didYouKnow">';
                echo '<div id="didYouKnowDiv1"><h2>Did You Know?</h2></div>';

                if ($movie->trivia) {
                    echo '<div id="triviaBase">';
                        echo '<div id="trivia">';
                            $movie->triviaList();
                        echo '</div>';
                    echo '</div>';
                }

                if ($movie->quotes) {
                    echo '<div id="quotesBase">';
                        echo '<div id="quotes">';
                            $movie->quotesList();
                        echo '</div>';
                    echo '</div>';
                }

                if ($movie->alternateversions) {
                    echo '<div id="alternateversionsBase">';
                        echo '<div id="alternateversions">';
                            $movie->alternateversionsList();
                        echo '</div>';
                    echo '</div>';
                }

                if ($movie->soundtracks) {
                    echo '<div id="soundtracksBase">';
                        echo '<div id="soundtracks">';
                            $movie->soundtracksList();
                        echo '</div>';
                    echo '</div>';
                }

            echo '</div>';
        }

    echo '</div>';

echo '</div>';
echo '<div id="movieFooter"></div>';
?>