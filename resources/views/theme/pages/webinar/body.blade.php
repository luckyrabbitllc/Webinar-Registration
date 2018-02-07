<div class="wrapper" style="padding:0px;overflow: hidden;">
    <div class="page-header page-header-small"
         style="display: block;height:440px !important;background-color:#000;z-index:0;">
        <div id="header-image" class="page-header-image "
             style="float:left; background-size: cover !important; background-color:#000;background:url({{$page->content()->heading->background}});opacity:0.5;z-index:1;">
        </div>
        <div class="container">
            <div class="content-center" style="padding:25px;">
                <h2 class="title"
                    style="font-weight:600 !important;">{!! $page->markdown($page->content()->heading->headline) !!}</h2>
                <h4 class="text-center">{!! $page->markdown($page->content()->heading->intro) !!}</h4>
                <div class="form-group" align="center" style="padding:15px;">
                    <form method="get" enctype="multipart/form-data" action="">
                        <div class="input-group">
                            <input type="text" id="s" name="s" class="form-control"
                                   placeholder="Where should we send your invitation?" autocomplete="off"
                                   aria-label="Search for...">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="registerButton"><i
                                            class="fa fa-envelope"></i>&nbsp; Sign Up
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="section text-center" style="background:none;padding-bottom:0px;">
        <div class="container">
            <div class="row">
                <div class="col-md-8">

                    <div class="card" id="video">
                        <div class="card-body">
                            <?php if($page->content() !== null && $page->content()->content->image !== null && $page->content()->content->video == null){ ?>
                            <div id="featuredImage"
                                 style="background:url('{{ $page->content()->content->image }}');"></div>
                            <?php } ?>

                            <?php if($page->content() !== null && $page->content()->content->video !== null){ ?>
                            <?php $video = $page->content()->content->video; ?>
                            <?php
                                if (strpos($page->content()->content->video, 'youtube') > 0) {
                                    $videotype = 'youtube';
                                } elseif (strpos($url, 'vimeo') > 0) {
                                    $videotype ='vimeo';
                                } else {
                                    $videotype = 'unknown';
                                }
                            ?>
                            <?php
                            if ($videotype == "youtube") {
                                $url = $video;
                                parse_str(parse_url($url, PHP_URL_QUERY), $array);
                                $video = $array['v'];
                            }
                            if ($videotype == "vimeo") {
                                $video = (int)substr(parse_url($video, PHP_URL_PATH), 1);
                            } ?>
                            <video class="afterglow" id="featuredvideo" width="960" height="450"
                                   @if($video == null) src="{{ $page->content()->content->video }}" @endif
                                   @if($video !== null) data-{{ $videotype }}-id="{{ $video }}" @endif
                                   @if($page->content()->content->image !== null) poster="{{ $page->content()->content->image }}" @endif >

                                @if($videotype !== "youtube" && $videotype !== "vimeo")
                                    <source type="video/mp4" src="{{ $page->content()->content->video }}"/>
                                @endif

                            </video>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body" style="text-align:left;">
                            {!! $page->markdown($page->content()->content->description) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    @if($page->content()->content->image !== null && $page->content()->content->video == null)
                    <div class="card" style="padding:0px !important;">
                        <div class="featured-image"
                             style="background:url('{{ $page->content()->content->image }}');height:300px; background-size:cover;background-position:center;">
                        </div>
                    </div>
                    @endif
                    <div class="card" id="topics">
                        <div class="card-body" style="min-height:auto;" >
                            <strong>Topics Covered</strong><br>
                            <div style="text-align:left;" >

                            </div>
                        </div>
                    </div>
                    <div class="card" id="date">
                        <div class="card-body" style="min-height:auto;">
                            <strong>When</strong><br>

                                <div style="text-align:center;">
                                    <br>
                                    <span id="dateText">Jan 31st, 2018 at 4:00 PM</span>
                                </div>
                        </div>
                    </div>
                    <div class="card" id="host">
                        <div class="card-body" style="min-height:auto;">
                            <strong>Hosted By</strong><br>
                            <div style="text-align:left;" >
                                <div style="text-align:center;">
                                    <img src="https://about.gitlab.com/images/team/emilyvonhoffmann-crop.jpg" style="display:inline-block;height:60px;width:60px;border-radius:30px;margin-right:10px;"><br>
                                    <span id="hostName">Emily von Hoffman</span><br>
                                    <span id="hostTitle">UX Lead</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @if(isset($page->content()->call_to_action) && (isset($page->content()->call_to_action->headline) OR isset($page->content()->call_to_action->link) OR isset($page->content()->call_to_action->message)))
        <section class="section text-center" style="background:none;color:#555;">
            <div class="container">
                <div class="row align-items-center text-center">
                    <div class="col-lg-12 text-center">
                        @if(isset($page->content()->call_to_action->headline))
                            <h3>{!! $page->markdown($page->content()->call_to_action->headline) !!}</h3>@endif
                        @if(isset($page->content()->call_to_action->button) && isset($page->content()->call_to_action->link))
                            <a href="{{ $page->content()->call_to_action->link }}"
                               class="btn btn-lg btn-primary btn-round bg-gradient-orange grow">{!! $page->content()->call_to_action->button !!}</a>@endif
                    </div>
                </div>
            </div>
        </section>
    @endif
</div>