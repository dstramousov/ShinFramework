{include file="header.tpl"}


    <body id="page">

	{include file="back_url.tpl"}

        <fieldset>
            <legend style="font-size: 30px; font-weight: bold;">Autocomplete example</legend>
            <table>
                <tr>
                    <td>
                        <fieldset>
                            <legend>Default example</legend>
                            <input type="text" id="default_example" value="" name="default_example" />
                        </fieldset>
                    </td>
                    <td>
                        <fieldset>
                            <legend>Remote datasource example</legend>
                            <input type="text" id="remoute_datasource_example" value="" name="remoute_datasource_example" />
                        </fieldset>
                    </td>
                    <td>
                        <fieldset>
                            <legend>Remote with caching example</legend>
                            <input type="text" id="remoute_with_caching_datasource_example" value="" name="remoute_with_caching_datasource_example" />
                        </fieldset>
                    </td>
                    <td>
                        <fieldset>
                            <legend>Remote JSONP datasource - need internat connection</legend>
                            <input type="text" id="remoute_jsonp_with_caching_datasource_example" value="" name="remoute_jsonp_with_caching_datasource_example" />
                        </fieldset>
                    </td>
                </tr>
                <tr>
                    <td>
                        <fieldset>
                            <legend>Combobox example</legend>
                            <select id="combobox">
                                <option value="">Select one...</option>
                                <option value="ActionScript">ActionScript</option>
                                <option value="AppleScript">AppleScript</option>
                                <option value="Asp">Asp</option>
                                <option value="BASIC">BASIC</option>
                                <option value="C">C</option>
                                <option value="C++">C++</option>
                                <option value="Clojure">Clojure</option>
                                <option value="COBOL">COBOL</option>
                                <option value="ColdFusion">ColdFusion</option>
                                <option value="Erlang">Erlang</option>
                                <option value="Fortran">Fortran</option>
                                <option value="Groovy">Groovy</option>
                                <option value="Haskell">Haskell</option>
                                <option value="Java">Java</option>
                                <option value="JavaScript">JavaScript</option>
                                <option value="Lisp">Lisp</option>
                                <option value="Perl">Perl</option>
                                <option value="PHP">PHP</option>
                                <option value="Python">Python</option>
                                <option value="Ruby">Ruby</option>
                                <option value="Scala">Scala</option>
                                <option value="Scheme">Scheme</option>
                            </select>
                        </fieldset>
                    </td>
                    <td>
                        <fieldset>
                            <legend>Custom data and display example</legend>
                            <div id="project-label">Select a project (type "j" for a start):</div>
                                <img id="project-icon" src="{php}echo prep_url(base_url());{/php}/images/transparent_1x1.png"  class="ui-state-default"//>
                                <input type="text" id="project" value="" name="project" />
                                <input type="hidden" id="project-id"/>
                                <p id="project-description"></p>
                            </div>
                        </fieldset>
                    </td>
                    <td>
                        <fieldset>
                            <legend>XML data parsed once example</legend>
                            <input type="text" id="xml_example" value="" name="xml_example" />
                        </fieldset>    
                    </td>
                    <td>
                        <fieldset>
                            <legend>Categories example</legend>
                            <input type="text" id="categories" value="" name="categories" />
                        </fieldset>    
                    </td>
                </tr>
                <tr>
                    <td>
                        Try typing "Jo" to see "John" and "Jörn", <br />
                        then type "Jö" to see only "Jörn". 
                        <fieldset>
                            <legend>Accent folding example</legend>
                            <input type="text" id="accent_folding" value="" name="accent_folding" />
                        </fieldset>
                    </td>
                    <td>
                        <fieldset>
                            <legend>Multiple values example</legend>
                            <input type="text" id="multiple_values" value="" name="multiple_values" />
                        </fieldset>
                    </td>
                    <td>
                        <fieldset>
                            <legend>Multiple, remote example</legend>
                            <input type="text" id="multiple_remote_values" value="" name="multiple_remote_values" />
                        </fieldset>
                    </td>
                </tr>
            </table>
        </fieldset>
        
        {literal}
            <script type="text/javascript">
                var availableTags = ["ActionScript", "AppleScript", "Asp", "BASIC", "C", "C++", "Clojure", "COBOL", "ColdFusion", "Erlang", "Fortran", "Groovy", "Haskell", "Java", "JavaScript", "Lisp", "Perl", "PHP", "Python", "Ruby", "Scala", "Scheme"];
            </script>
            <script type="text/javascript">
                var cache = {};
                
                function caching(request, response){
                    if ( request.term in cache ) {
                        response( cache[ request.term ] );
                        return;
                    }
                
                    $.ajax({
                        url: "autocomplete/suggestions.php",
                        dataType: "json",
                        data: request,
                        success: function( data ) {
                            cache[ request.term ] = data;
                            response( data );
                        }
                    });
        
                }
            </script>
            
            <script type="text/javascript">
                var cache = {};
                
                function remoteJsonp(request, response){
                    $.ajax({
                        url: "http://ws.geonames.org/searchJSON",
                        dataType: "jsonp",
                        data: {
                            featureClass: "P",
                            style: "full",
                            maxRows: 12,
                            name_startsWith: request.term
                        },
                        success: function(data) {
                            response($.map(data.geonames, function(item) {
                                return {
                                    label: item.name + (item.adminName1 ? ", " + item.adminName1 : "") + ", " + item.countryName,
                                    value: item.name
                                }
                            }))
                        }
                    })
                }
            </script>
            
            <script type="text/javascript">
                (function( $ ) {
                    $.widget( "ui.combobox", {
                        _create: function() {
                            var self = this;
                            var select = this.element.hide(),
                                selected = select.children( ":selected" ),
                                value = selected.val() ? selected.text() : "";
                            var input = $( "<input>" )
                                .insertAfter( select )
                                .val( value )
                                .autocomplete({
                                    delay: 0,
                                    minLength: 0,
                                    source: function( request, response ) {
                                        var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
                                        response( select.children( "option" ).map(function() {
                                            var text = $( this ).text();
                                            if ( this.value && ( !request.term || matcher.test(text) ) )
                                                return {
                                                    label: text.replace(
                                                        new RegExp(
                                                            "(?![^&;]+;)(?!<[^<>]*)(" +
                                                            $.ui.autocomplete.escapeRegex(request.term) +
                                                            ")(?![^<>]*>)(?![^&;]+;)", "gi"
                                                        ), "<strong>$1</strong>" ),
                                                    value: text,
                                                    option: this
                                                };
                                        }) );
                                    },
                                    select: function( event, ui ) {
                                        ui.item.option.selected = true;
                                        //select.val( ui.item.option.value );
                                        self._trigger( "selected", event, {
                                            item: ui.item.option
                                        });
                                    },
                                    change: function( event, ui ) {
                                        if ( !ui.item ) {
                                            var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( $(this).val() ) + "$", "i" ),
                                                valid = false;
                                            select.children( "option" ).each(function() {
                                                if ( this.value.match( matcher ) ) {
                                                    this.selected = valid = true;
                                                    return false;
                                                }
                                            });
                                            if ( !valid ) {
                                                // remove invalid value, as it didn't match anything
                                                $( this ).val( "" );
                                                select.val( "" );
                                                return false;
                                            }
                                        }
                                    }
                                })
                                .addClass( "ui-widget ui-widget-content ui-corner-left" );

                            input.data( "autocomplete" )._renderItem = function( ul, item ) {
                                return $( "<li></li>" )
                                    .data( "item.autocomplete", item )
                                    .append( "<a>" + item.label + "</a>" )
                                    .appendTo( ul );
                            };

                            $( "<button>&nbsp;</button>" )
                                .attr( "tabIndex", -1 )
                                .attr( "title", "Show All Items" )
                                .insertAfter( input )
                                .button({
                                    icons: {
                                        primary: "ui-icon-triangle-1-s"
                                    },
                                    text: false
                                })
                                .removeClass( "ui-corner-all" )
                                .addClass( "ui-corner-right ui-button-icon" )
                                .click(function() {
                                    // close if already visible
                                    if ( input.autocomplete( "widget" ).is( ":visible" ) ) {
                                        input.autocomplete( "close" );
                                        return;
                                    }

                                    // pass empty string as value to search for, displaying all results
                                    input.autocomplete( "search", "" );
                                    input.focus();
                                });
                        }
                    });
                })(jQuery);
                
                $("#combobox").combobox();

            </script>
            
            <script type="text/javascript">
                var projects = [
                {
                    value: 'jquery',
                    label: 'jQuery',
                    desc: 'the write less, do more, JavaScript library',
                    icon: 'jquery_32x32.png'
                },
                {
                    value: 'jquery-ui',
                    label: 'jQuery UI',
                    desc: 'the official user interface library for jQuery',
                    icon: 'jqueryui_32x32.png'
                },
                {
                    value: 'sizzlejs',
                    label: 'Sizzle JS',
                    desc: 'a pure-JavaScript CSS selector engine',
                    icon: 'sizzlejs_32x32.png'
                }
            ];
            
            function projectsFocus(event, ui){
                $('#project').val(ui.item.label);
                return false;
            }
            
            function projectsSelect(event, ui){
                $('#project').val(ui.item.label);
                $('#project-id').val(ui.item.value);
                $('#project-description').html(ui.item.desc);
                $('#project-icon').attr('src', 'images/' + ui.item.icon);
                
                return false;
            }
            
            </script>
            
            <script type="text/javascript">
                $.ajax({
                        url: "autocomplete/london.xml",
                        dataType: "xml",
                        success: function(xmlResponse) {
                            var data = $("geoname", xmlResponse).map(function() {
                                return {
                                    value: $("name", this).text() + ", " + ($.trim($("countryName", this).text()) || "(unknown country)"),
                                    id: $("geonameId", this).text()
                                };
                            }).get();
                            
                            {/literal}{$autocomplete}{literal}
                        }
                    })

            </script>
            
            <script type="text/javascript">
                var categories = [
                                    { label: "anders", category: "" },
                                    { label: "andreas", category: "" },
                                    { label: "antal", category: "" },
                                    { label: "annhhx10", category: "Products" },
                                    { label: "annk K12", category: "Products" },
                                    { label: "annttop C13", category: "Products" },
                                    { label: "anders andersson", category: "People" },
                                    { label: "andreas andersson", category: "People" },
                                    { label: "andreas johnson", category: "People" }
                                 ];
                
                $.widget("custom.catcomplete", $.ui.autocomplete, {
                    _renderMenu: function( ul, items ) {
                        var self = this,
                            currentCategory = "";
                        $.each( items, function( index, item ) {
                            if ( item.category != currentCategory ) {
                                ul.append( "<li class='ui-autocomplete-category'>" + item.category + "</li>" );
                                currentCategory = item.category;
                            }
                            self._renderItem( ul, item );
                        });
                    }
                });
                
            </script>
            
            <script type="text/javascript">
                
                var names = [ "Jörn Zaefferer", "Scott González", "John Resig" ];
                var accentMap = {
                                    'á':'a',
                                    'ö':'o'
                                };
                var normalize = function( term ) {
                                                    var ret = '';
                                                    for ( var i = 0; i < term.length; i++ ) {
                                                        ret += accentMap[ term.charAt(i) ] || term.charAt(i);
                                                    }
                                                    return ret;
                                                };
                
                function accentFolding(request, response){
                    var matcher = new RegExp( $.ui.autocomplete.escapeRegex( request.term ), "i" );
                    response( $.grep( names, function( value ) {
                        value = value.label || value.value || value;
                        return matcher.test( value ) || matcher.test( normalize( value ) );
                    }) );
                }
            </script>
            
            <script type="text/javascript">
                
                var availableTags = ["ActionScript", "AppleScript", "Asp", "BASIC", "C", "C++", "Clojure", "COBOL", "ColdFusion", "Erlang", "Fortran", "Groovy", "Haskell", "Java", "JavaScript", "Lisp", "Perl", "PHP", "Python", "Ruby", "Scala", "Scheme"];
                function split(val) {
                    return val.split(/,\s*/);
                }
                
                function extractLast(term) {
                    return split(term).pop();
                }
                
                function multipleSource(request, response){
                    response($.ui.autocomplete.filter(availableTags, extractLast(request.term)));
                }
                
                function multipleFocus(){
                    return false;
                }
                
                function multipleSelect(event, ui){
                    var terms = split( this.value );
                    // remove the current input
                    terms.pop();
                    // add the selected item
                    terms.push( ui.item.value );
                    // add placeholder to get the comma-and-space at the end
                    terms.push("");
                    this.value = terms.join(", ");
                    return false;
                }    
            </script>
            
            <script type="text/javascript">
                
                function split(val) {
                    return val.split(/,\s*/);
                }
                
                function extractLast(term) {
                    return split(term).pop();
                }
                
                function multipleRemoteSource(request, response){
                    $.getJSON("autocomplete/suggestions.php", {
                        term: extractLast(request.term)
                    }, response);
                }
                
                function multipleRemoteSearch(){
                    // custom minLength
                    var term = extractLast(this.value);
                    if (term.length < 2) {
                        return false;
                    }
                } 
                
                function multipleRemoteFocus(){
                    return false;
                }
                
                function multipleRemoteSelect(event, ui){
                    var terms = split( this.value );
                    // remove the current input
                    terms.pop();
                    // add the selected item
                    terms.push( ui.item.value );
                    // add placeholder to get the comma-and-space at the end
                    terms.push("");
                    this.value = terms.join(", ");
                    return false;
                }    
            </script>
        {/literal}
        
        {literal}
        <!-- if need use scrollable -->
        <style type="text/css">
            /*
            .ui-autocomplete {
                max-height: 100px;
                overflow-y: auto;
            }
            /* IE 6 doesn't support max-height
             * we use height instead, but this forces the menu to always be this tall
             */
            * html .ui-autocomplete {
                height: 100px;
            }
            */
        </style>
        
        <style type="text/css">
            #project-icon {
                float:left;
                height:32px;
                width:32px;
            }
        </style>
        
        <style type="text/css">
            .ui-autocomplete-category {
                font-weight:bold;
                padding:.2em .4em;
                margin:.8em 0 .2em;
                line-height:1.5;
            }
        </style>
        {/literal}

    </body>
</html>