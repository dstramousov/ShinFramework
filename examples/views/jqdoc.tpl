{include file="header.tpl"}

<body id="page">

	{include file="back_url.tpl"}
    
    <fieldset>
        <legend style="font-size: 30px; font-weight: bold;">JqDoc menu example</legend>
        
        <table>
            <tr>
                <td style="width: 250px;">
                    <fieldset>
                        <legend style="font-size: 20px; font-weight: bold;">Base example</legend>
                          <div id='menu'>
                            <img src='jqdoc/favourites.png' title='Favourites' alt='' />
                            <img src='jqdoc/pictures.png' title='Pictures' alt='' />
                            <img src='jqdoc/music.png' title='Music' alt='' />
                            <img src='jqdoc/videos.png' title='Videos' alt='' />
                            <img src='jqdoc/uploads.png' title='Uploads' alt='' />
                          </div>
                    </fieldset>
                </td>
                <td style="width: 250px;">
                    <fieldset>
                        <legend style="font-size: 20px; font-weight: bold;">Fade in</legend>
                          <div id='menu3'>
                            <img src='{php} echo prep_url(shinfw_base_url().'/examples/'); {/php}jqdoc/previous.png' title='Previous' alt='jqdoc/previous.png' />
                            <img src='{php} echo prep_url(shinfw_base_url().'/examples/'); {/php}jqdoc/stop.png' title='Stop' alt='jqdoc/stop.png' />
                            <img src='{php} echo prep_url(shinfw_base_url().'/examples/'); {/php}jqdoc/pause.png' title='Pause' alt='jqdoc/pause.png' />
                            <img src='{php} echo prep_url(shinfw_base_url().'/examples/'); {/php}jqdoc/play.png' title='Play' alt='jqdoc/play.png' />
                            <img src='{php} echo prep_url(shinfw_base_url().'/examples/'); {/php}jqdoc/next.png' title='Next' alt='jqdoc/next.png' />
                          </div>
                    </fieldset>
                </td>
            </tr>
            <tr>
                <td style="width: 250px;">
                    <fieldset>
                        <legend style="font-size: 20px; font-weight: bold;">Change image source</legend>
                          <div id='menu4'>
                            <img id='prevBtn' src='{php} echo prep_url(shinfw_base_url().'/examples/'); {/php}jqdoc/previous.png' title='Previous' alt='jqdoc/previous.png' />
                            <img id='stopBtn' src='{php} echo prep_url(shinfw_base_url().'/examples/'); {/php}jqdoc/stop.png' title='Stop' alt='jqdoc/stop.png' />
                            <img id='playBtn' src='{php} echo prep_url(shinfw_base_url().'/examples/'); {/php}jqdoc/play.png' title='Play' alt='jqdoc/play.png' />
                            <img id='nextBtn' src='{php} echo prep_url(shinfw_base_url().'/examples/'); {/php}jqdoc/next.png' title='Next' alt='jqdoc/next.png' />
                          </div>
                          <div id='playerState'>
                            Track : <span id='playTrack'>1</span> of 4; <span id='playState' class='playerStopped'>Stopped</span>...
                          </div>
                    </fieldset>    
                </td>
                <td width="33%">
                    <fieldset>
                        <legend style="font-size: 20px; font-weight: bold;">Horizontal with bordered background</legend>
                          <div id='menu5'>
                            <img src='{php} echo prep_url(shinfw_base_url().'/examples/'); {/php}jqdoc/previous.png' title='Previous' alt='jqdoc/previous.png' />
                            <img src='{php} echo prep_url(shinfw_base_url().'/examples/'); {/php}jqdoc/stop.png' title='Stop' alt='jqdoc/stop.png' />
                            <img src='{php} echo prep_url(shinfw_base_url().'/examples/'); {/php}jqdoc/pause.png' title='Pause' alt='jqdoc/pause.png' />
                            <img src='{php} echo prep_url(shinfw_base_url().'/examples/'); {/php}jqdoc/play.png' title='Play' alt='jqdoc/play.png' />
                            <img src='{php} echo prep_url(shinfw_base_url().'/examples/'); {/php}jqdoc/next.png' title='Next' alt='jqdoc/next.png' />
                          </div>
                    </fieldset>
                </td>
            </tr>
            <tr>
                <td width="33%">
                    <fieldset>
                        <legend style="font-size: 20px; font-weight: bold;">Use setLabel to modify label presentation</legend>
                          <div id='menu6'>
                            <img src='jqdoc/favourites.png' title='Favourites,folder: /favs/' alt='' />
                            <img src='jqdoc/pictures.png' title='Pictures,folder: /pics/' alt='' />
                            <img src='jqdoc/music.png' title='Music,folder: /music/' alt='' />
                            <img src='jqdoc/videos.png' title='Videos,folder: /vids/' alt='' />
                            <img src='jqdoc/uploads.png' title='Uploads,folder: /upload/' alt='' />

                          </div>
                    </fieldset>
                </td>
                <td width="33%">
                    <fieldset>
                        <legend style="font-size: 20px; font-weight: bold;">Sub-menus as labels</legend>
                          <div id='menu7'>
                            <img src='jqdoc/favourites.png' title='Favourites' alt='' />
                            <img src='jqdoc/pictures.png' title='Pictures' alt='' />
                            <img src='jqdoc/music.png' title='Music' alt='' />
                            <img src='jqdoc/videos.png' title='Videos' alt='' />
                            <img src='jqdoc/uploads.png' title='Uploads' alt='' />
                          </div>
                          <ul id='submenus'>
                            <li><!-- Library sub-menu... -->
                              <ul>
                                <li><a href='#'><span>sub-option L1</span></a>
                                  <ul>
                                    <li><a href='#'><span>sub-sub-option L1-S1</span></a></li>
                                    <li><a href='#'><span>sub-sub L1-S2</span></a></li>
                                  </ul>
                                </li>
                                <li><a href='#'><span>sub L2</span></a></li>
                                <li><a href='#'><span>sub-option L3</span></a>
                                  <ul>
                                    <li><a href='#'><span>sub-sub-option L3-S1</span></a></li>
                                    <li><a href='#'><span>sub-sub L3-S2</span></a></li>
                                    <li><a href='#'><span>sub-sub-option L3-S3</span></a>
                                      <ul>
                                        <li><a href='#'><span>sub-sub-sub L3-S3-S1</span></a></li>
                                        <li><a href='#'><span>sub-sub-sub L3-S3-S2</span></a></li>
                                      </ul>
                                    </li>
                                  </ul>
                                </li>
                                <li><a href='#'><span>sub-option L4</span></a></li>
                                <li><a href='#'><span>sub-option L5</span></a></li>
                                <li><a href='#'><span>sub-option L6</span></a></li>
                              </ul>
                            </li>
                            <li><!-- Tunes sub-menu... -->
                              <ul>
                                <li><a href='#'><span>sub-option T1</span></a></li>
                                <li><a href='#'><span>sub-option T2</span></a></li>
                                <li><a href='#'><span>sub-option T3</span></a></li>
                              </ul>
                            </li>
                            <li><!-- Images sub-menu... -->
                              <ul>
                                <li><a href='#'><span>sub-option I1</span></a></li>
                                <li><a href='#'><span>sub-option I2</span></a></li>
                                <li><a href='#'><span>sub-option I3</span></a></li>
                              </ul>
                            </li>
                            <li><!-- Movies sub-menu... -->
                              <ul>
                                <li><a href='#'><span>sub-option M1</span></a></li>
                                <li><a href='#'><span>sub-option M2</span></a></li>
                                <li><a href='#'><span>sub-option M3</span></a></li>
                              </ul>
                            </li>
                            <li><!-- Private sub-menu... -->
                              <ul>
                                <li><a href='#'><span>sub-option P1</span></a>
                                  <ul>
                                    <li><a href='#'><span>sub-sub-option P1-S1</span></a></li>
                                    <li><a href='#'><span>sub-sub P1-S2</span></a></li>
                                  </ul>
                                </li>
                                <li><a href='#'><span>sub-option P2</span></a></li>
                                <li><a href='#'><span>sub-option P3</span></a></li>
                              </ul>
                            </li>
                          </ul>

                    </fieldset>
                </td>
            </tr>
            <tr>
                <td width="33%">
                    <fieldset>
                        <legend style="font-size: 20px; font-weight: bold;">Two menus, one horizontal and one vertical</legend>
                          <div id='menu8'>
                            <img src='jqdoc/favourites.png' title='Favourites' alt='' />
                            <img src='jqdoc/pictures.png' title='Pictures' alt='' />
                            <img src='jqdoc/music.png' title='Music' alt='' />
                            <img src='jqdoc/videos.png' title='Videos' alt='' />
                            <img src='jqdoc/uploads.png' title='Uploads' alt='' />
                          </div>
                          <div id='menu9'>
                            <img src='jqdoc/favourites.png' title='Favourites' alt='' />
                            <img src='jqdoc/pictures.png' title='Pictures' alt='' />
                            <img src='jqdoc/music.png' title='Music' alt='' />
                            <img src='jqdoc/videos.png' title='Videos' alt='' />
                            <img src='jqdoc/uploads.png' title='Uploads' alt='' />
                          </div>
                    </fieldset>
                </td>
                <td width="33%">
                    <fieldset>
                        <legend style="font-size: 20px; font-weight: bold;">Vertical, right-hand edge, labelled</legend>
                          <div id='menu2'>
                            <img src='jqdoc/favourites.png' title='Favourites' alt='' />
                            <img src='jqdoc/pictures.png' title='Pictures' alt='' />
                            <img src='jqdoc/music.png' title='Music' alt='' />
                            <img src='jqdoc/videos.png' title='Videos' alt='' />
                            <img src='jqdoc/uploads.png' title='Uploads' alt='' />
                          </div>
                    </fieldset>
                </td>
                <td width="33%"></td>
            </tr>
        </table>
        
    </fieldset>
    
    {literal}
     <style type="text/css">
     
        fieldset {
            margin-right: 20px;
        }
        
        #menu5 div.jqDock {cursor:pointer; background-color:#660066; border:2px solid #cccccc; border-top:0 none;}
        
        div.jqDockLabel {font-weight:bold; font-style:italic; white-space:nowrap; color:#ffff00; cursor:pointer; text-align:center;}
        div.folderLoc {color:#ffffff; font-style:normal;}
        div.colPurple {color:#cc33cc; font-size:1.5em;}
        
        #submenus {display:none;}
        .jqDockLabel {z-index:999;}
        .jqDockLabel ul {position:absolute; top:-20px; right:2px; padding:0; margin:0;
        list-style-type:none; white-space:nowrap; background-color:#ff9900; border:2px solid #666666;}
        .jqDockLabel li {position:relative; border:0 none; padding:0; margin:0;}
        .jqDockLabel li a {display:block; height:18px; line-height:18px; outline:0 none; position:relative;}
        .jqDockLabel li a.clicked {background-color:#ffff00;}
        .jqDockLabel li a:hover {background-color:#0000cc; color:#ffffff;}
        .jqDockLabel li a.clicked:hover {background-color:#0066cc; color:#ffffff;}
        .jqDockLabel li a span {padding:0 15px 0 5px; display:block;}
        .jqDockLabel a img {position:absolute; top:4px; right:0;}
        /*...and sub-sub-menus...*/
        .jqDockLabel ul ul {left:100%; top:-2px; right:auto; display:none;}
     </style>
    {/literal}
    
    {literal}
        <script type="text/javascript">
        
            $('#menu img').bind('click', function(){
                label = $(this).parent().find('.jqDockLabel .jqDockLabelText').text();
                
                alert('You clicked "' + label + '" <IMG>')
            })
            
            var paused = false, stopped = true, track = 1
            , setPlayState = function(toggle){
                var pp = 'jqdoc/' + (paused || stopped ? 'play' : 'pause'), txt;
                if(toggle){ // SWITCH IMAGES...
                  $('#playBtn').jqDock({src:pp+'.png', altsrc:pp+'.png'});
                }
                txt = stopped ? 'Stopped' : (paused ? 'Paused' : 'Playing');
                $('#playTrack').text(track);
                $('#playState').text(txt)[0].className = 'player' + txt;
              }
            , nextPrevButton = function(){
                var pp, toggle = paused || stopped, next = /next/.test(this.id)
                  , incr = (next && track < 4) ? 1 : ((!next && track > 1) ? -1 : 0);
                if(incr !== 0){
                  track += incr;
                  switch(track){
                    case 1: pp = 'jqdoc/previous.'; break;
                    case 2: if(incr > 0){  pp = 'jqdoc/previous.'; } break;
                    case 3: if(incr < 0){  pp = 'jqdoc/next.'; } break;
                    case 4: pp = 'jqdoc/next.'; break;
                    default:
                  }
                  if(pp){ // SWITCH IMAGES...
                    $(track > 2 ? '#nextBtn' : '#prevBtn')
                        .jqDock({src:pp+'png', altsrc:pp+'png'});
                  }
                  stopped = paused = false;
                  setPlayState(toggle);
                }
              }
            , playPauseButton = function(){
                if(stopped){
                  stopped = false;
                }else{
                  paused = !paused;
                }
                setPlayState(true);
                return false;
              }
            , stopButton = function(){
                var toggle = !paused;
                if(!stopped){
                  stopped = true;
                  paused = false;
                  setPlayState(toggle);
                }
                return false;
              };
          
          $('#menu4').children().each(function(i){
              var n = i;
              if(n == 1){ $(this).click(stopButton); }
              else if(n == 2){ $(this).click(playPauseButton); }
              else{ $(this).click(nextPrevButton); }
            });
            
            
            
            var labelTransform = function(labelText, optionIndex){ //scope (this) is the #menu element
                //all my titles are the same :  a name, then a single comma and the folder location...
                var splitComma = labelText.split(',')
                  , cls = optionIndex < 4 ? '' : ' class="colPurple"'
                  , rtn = '<div' + cls + '>' + splitComma[0] + '</div>';
                rtn += '<div class="folderLoc">' + splitComma[1] + '</div>';
                return rtn;
            }
            
            
            var menuTransform   =   function(txt, i, el){
            //append a clone of the relevant sub-menu to the label, div.jqDockLabel...
            //Note that I don't need to add the inner wrapper - div.jqDockLabelText - 
            //because I can reposition the sub-menus within div.jqDockLabel itself
            $(el).append($('#submenus>li>ul').eq(i).clone(true))
              //...and intercept mousemoves to prevent propagation and stop
              //the dock resizing as the cursor moves over the sub-menus...
              .bind('mousemove', function(){ 
                return false; 
              })
              //put a one-off mouseenter on every sub-menu to (re)set
              //contained anchor widths...
              .find('ul').one('mouseenter', function(){
                $('>li>a', this).each(function(){
                    $(this).width($(this).parent().width());
                  });
                return false;
              }).end()
              //for this example, put a click handler on every sub-menu anchor
              //that simply toggles a class to change background colour...
              .find('a').click(function(){
                $(this).toggleClass('clicked');
                this.blur();
                return false;
              })
              //put a hover on any sub-menu LI that has a child menu, to show/hide
              //that child menu; and allow mouseleave to propagate up so that coming
              //completely off the sub-menu structure will still collapse the dock...
              .next('ul').parent().hover(function(ev){
                var mLeave = ev.type == 'mouseleave';
                $('>ul', this)[mLeave ? 'hide' : 'show']();
                return mLeave;
              })
              //add a visual indicator that a child menu exists...
              .find('>a').append("<"+"img src='images/submenu.gif' alt='' />");
            return false;
          }

         </script> 
    {/literal}
    
</body>

</html>
