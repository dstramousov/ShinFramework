<?php if (!defined('BASEPATH')) exit('Base path is not defined');
/**
 * @package        ShinPHP framework
 * @author        
 * @copyright    
 * @license        
 * @link        
 * @since        Version 0.1
 * @filesource   shinfw/libraries/SHIN_Maps.php
 */


/**
 * ShinPHP framework google maps library
 *
 * @package      ShinPHP framework
 * @subpackage   Library
 * @author        
 * @link         shinfw/libraries/SHIN_Maps.php
 */

class SHIN_Maps extends SHIN_Libs
{

    /**
    * Allow to show map with markers  
    * 
    */
    var $allowMarkers = false;
    
    /**
    * Allow to show map with AJAX markers  
    * 
    */
    var $allowAjaxMarkers = false;
    
    /**
    * Allow to show map with direction logic  
    * 
    */
    var $allowDirection =   false;
    
    /**
    * Allow to show overlays on the map  
    * 
    */
    var $allowOverlay   =   false;
    
    /**
    * Allow to automaticly build polygons from markers that was retrived from JSON
    * 
    * @var mixed
    */
    var $allowBuildPolygon  =   false;
    
    /**
    * Allow to automaticly build polylines from markers that was retrived from JSON
    * 
    * @var mixed
    */
    var $allowBuildPolyline  =   false;
    
    /**
    * Allow show street view
    * 
    * @var mixed
    */
    var $allowShowStreetView =  false;
    
    /**
    * Allow show street view  events
    * 
    * @var mixed
    */
    var $allowShowStreetViewEvents = false;
   
    /**
    * Allow show street view service
    * 
    * @var mixed
    */
    var $allowShowStreetViewService  =   false;   
    
    /**
    * array of JavaScript code for each event
    * 
    * @var array
    */
    var $events = array();
    
    /**
    * array of JavaScript code for function
    * 
    * @var array
    */
    var $functions = array();
    
    /**
    * array of JavaScript code
    * 
    * @var array
    */
    var $code   =   array();
    
    /**
    * array of additional params
    * 
    * @var array
    */
    var $options    =   array();
    
    
    /**
     * Constructor. Init accordion with default values from config file.
     *
     * @access public
     * @params NULL.
     * @return NULL.
     */
    public function __construct($css_file = false)
    {   
        parent::__construct('maps', $css_file); 
    
		Console::logSpeed('SHIN_Maps begin work, Time taken to get to line: '.__FILE__.'::'.__LINE__);
		Console::logMemory($this, 'SHIN_Maps. Size of class: ');		        
    }

    /**
     * Return body of JS with all filled parameters.
     *
     * @access protected
     * @params NULL
     * @return NULL.
     */
    protected function _body()
    {
        $gMapsWrapper       =   $this->gMapsMainWrapper();
        $gMapsJsCode        =   $this->gMapsBaseJsInit();
        
        $injectedCode       =   $gMapsJsCode . $gMapsWrapper;   
        
        SHIN_Core::$_libs['templater']->assign($this->sh_Options['container'], $injectedCode);
        
        if(!empty($this->sh_Options['viewContainer'])) {
            $gMapsPanoWrapper   =   $this->gMapsPanoWrapper();
        
            SHIN_Core::$_libs['templater']->assign($this->sh_Options['viewContainer'], $gMapsPanoWrapper);
        }
    
        return null;
    }          

    /**
    * Function return main html wrapper for gmaps
    * 
    * @access protected
    * @param null
    * @return string
    * 
    */
    protected function gMapsMainWrapper(){
        
        return sprintf('<div id="%s" style="width:%spx; height:%spx;"></div>', $this->sh_Options['container'], $this->sh_Options['width'], $this->sh_Options['height']);    
    
    }
    
    /**
    * Function return main html wrapper for street view
    * 
    * @access protected
    * @param null
    * @return string
    * 
    */
    protected function gMapsPanoWrapper(){
        
        return sprintf('<div id="%s" style="width:%spx; height:%spx;"></div>', $this->sh_Options['viewContainer'], $this->sh_Options['pWidth'], $this->sh_Options['pHeight']);    
        
    }
    
    /**
    * init all JavaScript for this component
    * 
    * @access protected
    * @param null
    * @return string
    * 
    */
    protected function gMapsBaseJsInit(){
        
        $this->_gMapsAddEventListenerCode();
        $this->_gMapsAddPlaceMarkerFunc();
        
        // add autodetect location code
        if($this->sh_Options['autodetect_location']){
            $this->_gMapsAddAutodetectCode();    
        }
        
        $jsCode =     '
                        
                            var centerLatitude    = ' . $this->sh_Options['centerLatitude'] . ';
                            var centerLongitude   = ' . $this->sh_Options['centerLongitude'] . ';
                            var startZoom         = ' . $this->sh_Options['zoom'] . ';
                            var mapTypeId         = google.maps.MapTypeId.' . $this->sh_Options['type'] . ';
                            
                            // config view options
                            var disableDefaultUI  = ' . $this->sh_Options['disableDefaultUI'] . ';
                            var navigationControl = ' . $this->sh_Options['navigationControl'] . ';
                            var mapTypeControl    = ' . $this->sh_Options['mapTypeControl'] . ';
                            var scaleControl      = ' . $this->sh_Options['scaleControl'] . ';
                            var streetViewControl = ' . $this->sh_Options['streetViewControl'] . ';
                            
                            var mapTypeControlOptions = {
                                style:      google.maps.MapTypeControlStyle.' . $this->sh_Options['type_control_style'] . ',
                                position:   google.maps.ControlPosition.' . $this->sh_Options['type_control_position'] . '
                            }
                            
                            var navigationControlOptions = {
                                style:      google.maps.MapTypeControlStyle.' . $this->sh_Options['navigation_control_style'] . ',
                                position:   google.maps.ControlPosition.' . $this->sh_Options['navigation_control_position'] . '
                            }
                            
                            var scaleControlOptions = {
                                position:   google.maps.ControlPosition.' . $this->sh_Options['scale_position'] . '
                            }
                            
                            
                            var latlng            = new google.maps.LatLng(centerLatitude, centerLongitude);
                            var directionsService = new google.maps.DirectionsService();
                            var directionsDisplay = new google.maps.DirectionsRenderer();
    
                            var markers         = [];
                            var origin          = null;
                            var destination     = null;
                            var waypoints       = [];
                            var jsonMarkers     = Array();
                                
                            var map;
                            var panorama;
                            var service;
                            
                            function init() {
                                
                                var myOptions = {
                                  zoom:                     startZoom,
                                  center:                   latlng,
                                  mapTypeId:                mapTypeId,
                                  disableDefaultUI:         disableDefaultUI,
                                  navigationControl:        navigationControl,
                                  mapTypeControl:           mapTypeControl,
                                  scaleControl:             scaleControl,
                                  mapTypeControlOptions:    mapTypeControlOptions,
                                  navigationControlOptions: navigationControlOptions,
                                  scaleControlOptions:      scaleControlOptions,
                                  streetViewControl:        streetViewControl 
                                };
                            
                                map = new google.maps.Map(document.getElementById("' . $this->sh_Options['container'] . '"), myOptions);
                                          ' . $this->_showPanel() . '
                                          directionsDisplay.setMap(map);
                                service = new google.maps.StreetViewService();
    
                                
                            ';
    
        if($this->allowShowStreetView && !empty($this->sh_Options['viewContainer'])) {
            
                $jsCode .=  "\n
                                var panoramaOptions = {
                                    position: latlng,
                                    pov: {
                                      heading: " . $this->sh_Options['heading'] . ",
                                      pitch: " . $this->sh_Options['pitch'] . ",
                                      zoom: " . $this->sh_Options['sZoom'] . "
                                    }
                                };
                                
                                panorama = new  google.maps.StreetViewPanorama(document.getElementById('" . $this->sh_Options['viewContainer'] . "'), panoramaOptions);
                                map.setStreetView(panorama);
                ";
            
        }
        
            $jsCode .= $this->_getMapEvents();
            $jsCode .= $this->_getMapCode();
            
        
        if($this->allowBuildPolygon) {
                $jsCode .=      "  \n
                                   coords = new google.maps.Polygon({
                                       paths: jsonMarkers,
                                       strokeColor: '" . (isset($options['params']['strokeColor'])    ? $options['params']['strokeColor']    : $this->sh_Options['strokeColor']) . "',
                                       strokeOpacity: " . (isset($options['params']['strokeOpacity']) ? $options['params']['strokeOpacity']  : $this->sh_Options['strokeOpacity']) . ",
                                       strokeWeight: " . (isset($options['params']['strokeWeight'])   ? $options['params']['strokeWeight']   : $this->sh_Options['strokeWeight']) . ",
                                       fillColor: '" .   (isset($options['params']['fillColor'])      ? $options['params']['fillColor']      : $this->sh_Options['fillColor']) . "',
                                       fillOpacity: " .  (isset($options['params']['fillOpacity'])    ? $options['params']['fillOpacity']    : $this->sh_Options['fillOpacity']) . "
                                   });
                                   
                                   coords.setMap(map); 
                                ";                        
        }
            
        if($this->allowBuildPolyline) {
                $jsCode .=      "
                                   coords = new google.maps.Polyline({
                                       path: jsonMarkers,
                                       strokeColor: '" . (isset($options['params']['strokeColor'])    ? $options['params']['strokeColor']    : $this->sh_Options['strokeColor']) . "',
                                       strokeOpacity: " . (isset($options['params']['strokeOpacity']) ? $options['params']['strokeOpacity']  : $this->sh_Options['strokeOpacity']) . ",
                                       strokeWeight: " . (isset($options['params']['strokeWeight'])   ? $options['params']['strokeWeight']   : $this->sh_Options['strokeWeight']) . "
                                   });
                               
                                   coords.setMap(map);
                                ";
            }                    
            
        if($this->allowAjaxMarkers) {
            $jsCode .=      '$.getJSON("' . $this->sh_Options['get_marker_ajax_url'] . '", {},
                             function(json){
                                for(index in json) {
                                    jsonMarkerPosition = new google.maps.LatLng(json[index].lat, json[index].lng); 
                                    
                                    jsonMarkers.push(jsonMarkerPosition);
                                    placeJsonMarker(jsonMarkerPosition);    
                                }';
            
            $jsCode .=       '})';
        }
        
        
        $jsCode .=          '}
                            
                            ' . $this->_getMapFunctions() . '
                            
                            window.onload   = init;
                            
                    ';
        
        return SHIN_Core::$_jsmanager->renderCustomCode($jsCode); 
    }
    
    /**
    * Function return needed code of events
    * 
    * @access protected
    * @param null
    * @return string
    * 
    */
    protected function _getMapEvents() {
        
        $code   =   '';
        foreach($this->events as $event){
            $code .= $event . "\n";     
        }
        
        return $code;    
    }
    
    /**
    * Function return needed code of functions
    * 
    * @access protected
    * @param null
    * @return string
    * 
    */
    protected function _getMapFunctions(){
        
        $code   =   '';
        foreach($this->functions as $function){
            $code .=    $function . "\n";
        }
        
        return $code;    
    }
    
    /**
    * Function return needed js code
    * 
    * @access protected
    * @param null
    * @return string
    * 
    */
    protected function _getMapCode(){
        
        $code   =   '';
        foreach($this->code as $jsCode){
            $code .=    $jsCode . "\n";
        }
        
        return $code;    
    }
    
    /**
    * Function add JavaScript code of autodetect location
    * 
    * @access protected
    * @param null
    * @return NULL
    * 
    */
    protected function _gMapsAddAutodetectCode(){
        
        $this->code[]  =   '// Try W3C Geolocation (Preferred)
                              if(navigator.geolocation) {
                                browserSupportFlag = true;
                                navigator.geolocation.getCurrentPosition(function(position) {
                                  initialLocation = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
                                  map.setCenter(initialLocation);
                                  map.setZoom(17);
                                }, function() {
                                  handleNoGeolocation(browserSupportFlag);
                                });
                              // Try Google Gears Geolocation
                              } else if (google.gears) {
                                browserSupportFlag = true;
                                var geo = google.gears.factory.create("beta.geolocation");
                                geo.getCurrentPosition(function(position) {
                                  initialLocation = new google.maps.LatLng(position.latitude,position.longitude);
                                  map.setCenter(initialLocation);
                                  map.setZoom(17);
                                }, function() {
                                  handleNoGeoLocation(browserSupportFlag);
                                });
                              // Browser doesn\'t support Geolocation
                              } else {
                                browserSupportFlag = false;
                                handleNoGeolocation(browserSupportFlag);
                              }';
        
        $this->functions[] = 'function handleNoGeolocation(errorFlag) {
                                if (errorFlag == true) {
                                  alert("Geolocation service failed.");
                                } else {
                                  alert("Your browser doesn\'t support geolocation.");
                                }
                                
                                map.setCenter(latlng);
                                
                              }';  
    }
    
    /**
    * Function add JavaScript code of PlaceMarker function
    * 
    * @access protected
    * @param null
    * @return NULL
    * 
    */
    protected function _gMapsAddPlaceMarkerFunc(){
        
        if($this->allowAjaxMarkers && !empty($this->sh_Options['set_marker_ajax_url'])) {
            $this->functions[] =  ' function placeJsonMarker(location) {
                                        var marker = new google.maps.Marker({
                                          position: location, 
                                          map: map,
                                          ' . (!empty($this->sh_Options['icon']) ? 'icon: "' . $this->sh_Options['icon']  .'"' : 'icon: ""' ) . '
                                        });
                                    }
                                    
                                    function placeMarker(location) {
                                      var marker = new google.maps.Marker({
                                          position: location, 
                                          map: map,
                                          ' . (!empty($this->sh_Options['icon']) ? 'icon: "' . $this->sh_Options['icon'] . '"' : 'icon: ""' ) . '
                                      });

                                      map.setCenter(location);
                                      
                                      data  =   {
                                        lat:    location.lat(),
                                        lng:    location.lng()      
                                      }
                                      
                                      $.ajax({
                                        type:   "POST",
                                        url:    "' . $this->sh_Options['set_marker_ajax_url'] . '",
                                        data:    data
                                      });
                                      
                                      markers.push(marker);
                                  }';
                                  
        } elseif($this->allowAjaxMarkers && empty($this->sh_Options['set_marker_ajax_url'])) {
            
            $this->functions[] =  ' function placeJsonMarker(location) {
                                        var marker = new google.maps.Marker({
                                          position: location, 
                                          map: map,
                                          ' . (!empty($this->sh_Options['icon']) ? 'icon: "' . $this->sh_Options['icon']  .'"' : 'icon: ""' ) . '
                                        });
                                    }
                                    
                                    ';
                                      
        } elseif($this->allowMarkers || $this->allowDirection) {
            $this->functions[] =  'function placeMarker(location) {
                                      var marker = new google.maps.Marker({
                                          position: location, 
                                          map: map,
                                          ' . (!empty($this->sh_Options['icon']) ? 'icon: "' . $this->sh_Options['icon'] . '"' : 'icon: ""' ) . '
                                      });

                                      map.setCenter(location);
                                      
                                      markers.push(marker);
                                }';    
        }
            
    }
    
    /**
    * Function return JavaScript code that show direction panel
    * 
    * @access protected
    * @param null
    * @return string
    * 
    */
    protected function _showPanel(){
        if(isset($this->options['direction']['showPanel']) && $this->options['direction']['showPanel']){
            return 'directionsDisplay.setPanel(document.getElementById("' . $this->options['direction']['panelContainer'] . '"));';
        }
    }
    
    /**
    * Function add some base JavaScript function
    * 
    * @access public
    * @param array $param - key of this array is type of predefined function (reset|direction), 
    *                       value of this array is user function name
    * @return NULL
    */
    public function addButtonLogic($param){
        
        foreach($param as $type => $funcName){
            switch($type){
                case 'reset':
                    $this->functions[]  =   'function ' . $funcName . '() {
                                                clearMarkers();
                                                clearWaypoints();
                                                
                                                if(directionsDisplay != undefined){
                                                    directionsDisplay.setMap(null);
                                                    directionsDisplay.setPanel(null);
                                                    directionsDisplay = new google.maps.DirectionsRenderer();
                                                    directionsDisplay.setMap(map);
                                                    directionsDisplay.setPanel(document.getElementById("' . (isset($this->options['direction']['panelContainer']) ? $this->options['direction']['panelContainer'] : '') . '"));
                                                }
                                             }';
                    
                    $this->functions[]  =    'function clearWaypoints() {
                                                markers             = [];
                                                origin              = null;
                                                destination         = null;
                                                waypoints           = [];
                                                directionsVisible   = false;
                                              }';
                    
                    $this->functions[]  =    'function clearMarkers() {
                                                for (var i = 0; i < markers.length; i++) {
                                                  markers[i].setMap(null);
                                                }
                                              }';
                    
                    $clearFunctionName       =  $funcName;  
                    break;
                
                case 'direction':
                    if($this->allowDirection) {
                        $data  =    'function ' . $funcName . '() {
                                        if (origin == null) {
                                          alert("Click on the map to add a start point");
                                          return;
                                        };
                                        
                                        if (destination == null) {
                                          alert("Click on the map to add an end point");
                                          return;
                                        };';
                        
                        if(isset($this->options['direction']['updateContainer'])){
                            $data .= 'var mode;
                                        switch (document.getElementById("' . $this->options['direction']['updateContainer'] . '").value) {
                                          case "bicycling":
                                            mode = google.maps.DirectionsTravelMode.BICYCLING;
                                            break;
                                          case "driving":
                                            mode = google.maps.DirectionsTravelMode.DRIVING;
                                            break;
                                          case "walking":
                                            mode = google.maps.DirectionsTravelMode.WALKING;
                                            break;
                                        };';
                        } else {
                            $data .= ' var mode = google.maps.DirectionsTravelMode.' . $this->sh_Options['travel_mode'] .';'; 
                        }                            
                                                    
                                                    
                        $data  .=      ' var request = {
                                            origin:         origin,
                                            destination:    destination,
                                            waypoints:      waypoints,
                                            travelMode:     mode
                                         };
                                                    
                                         directionsService.route(request, function(response, status) {
                                          if (status == google.maps.DirectionsStatus.OK) {
                                            directionsDisplay.setDirections(response);
                                          }
                                         });
                                        
                                        ' . $clearFunctionName . '();
                                         directionsVisible = true;
                                     }';
                        
                        $this->functions[]  =   $data;
                    }
                    
                    break;
                
                case 'update':
                        $this->functions[]  =   'function updateMode() {
                                                    if (directionsVisible) {
                                                      calcRoute();
                                                    }
                                                 }';
                    break;
            }
        }
        
    }
    
    /**
    * Function add JavaScript code for event listener
    * 
    * @param null
    * @access protected
    * @return NULL
    */
    protected function _gMapsAddEventListenerCode(){
        if($this->allowDirection){
            $this->events[] =   'google.maps.event.addListener(map, "click", function(event) {
                                  if (origin == null) {
                                    origin = event.latLng;
                                    placeMarker(origin);
                                  } else if (destination == null) {
                                    destination = event.latLng;
                                    placeMarker(destination);
                                  } else {
                                    if (waypoints.length < ' . $this->sh_Options['number_way_points'] . ') {
                                      waypoints.push({ location: destination, stopover: true });
                                      destination = event.latLng;
                                      placeMarker(destination);
                                    } else {
                                      alert("Maximum number of waypoints reached");
                                    }
                                  }
                                 })';    
        } elseif(($this->allowAjaxMarkers && !empty($this->sh_Options['set_marker_ajax_url'])) || $this->allowMarkers) {
            $this->events[] =   'google.maps.event.addListener(map, "click", function(event) {
                                  placeMarker(event.latLng);
                                 })';    
        } elseif($this->allowShowStreetViewEvents) {
            
            if(isset($this->sh_Options['panoCell']) && !empty($this->sh_Options['panoCell'])) {
                $this->events[] =   '
            
                                    google.maps.event.addListener(panorama, "pano_changed", function() {
                                        var panoCell = document.getElementById("' . $this->sh_Options['panoCell'] . '");
                                        panoCell.innerHTML = panorama.getPano();
                                    });
                                   ';       
            }
            
            if(isset($this->sh_Options['linksTable']) && !empty($this->sh_Options['linksTable'])) {
                $this->events[] =   'google.maps.event.addListener(panorama, "links_changed", function() {
                                        var linksTable = document.getElementById("' . $this->sh_Options['linksTable'] . '");
                                        while(linksTable.hasChildNodes()) {
                                          linksTable.removeChild(linksTable.lastChild);
                                        };
                                        var links =  panorama.getLinks();
                                        for (var i in links) {
                                          var row = document.createElement("tr");
                                          linksTable.appendChild(row);
                                          var labelCell = document.createElement("td");
                                          labelCell.innerHTML = "<b>Link: " + i + "</b>";
                                          var valueCell = document.createElement("td");
                                          valueCell.innerHTML = links[i].description;
                                          linksTable.appendChild(labelCell);
                                          linksTable.appendChild(valueCell);
                                        }
                                    });';    
            }
            
            if(isset($this->sh_Options['postitionCell']) && !empty($this->sh_Options['postitionCell'])) {
                $this->events[] =   'google.maps.event.addListener(panorama, "position_changed", function() {
                                        var positionCell = document.getElementById("' . $this->sh_Options['postitionCell'] . '");
                                        positionCell.firstChild.nodeValue = panorama.getPosition();
                                    });';
            }
            
            if(isset($this->sh_Options['headingCell']) && !empty($this->sh_Options['headingCell']) && isset($this->sh_Options['pitchCell']) && !empty($this->sh_Options['pitchCell'])) {
                $this->events[] =   'google.maps.event.addListener(panorama, "pov_changed", function() {
                                        var headingCell     = document.getElementById("' . $this->sh_Options['headingCell'] . '");
                                        var pitchCell       = document.getElementById("' . $this->sh_Options['pitchCell'] . '");
                                        headingCell.firstChild.nodeValue = panorama.getPov().heading;
                                        pitchCell.firstChild.nodeValue   = panorama.getPov().pitch;
                                    });';
            }
        } elseif($this->allowShowStreetViewService) {
            $this->events[] =   'google.maps.event.addListener(map, "click", function(event) {
                                    service.getPanoramaByLocation(event.latLng, 50, processSVData);
                                });';
            
            $this->functions[] = 'function processSVData(data, status) {
                                    if (status == google.maps.StreetViewStatus.OK) {
                                      var marker = new google.maps.Marker({
                                        position: data.location.latLng,
                                        map: map,
                                        title: data.location.description
                                      });
                                      
                                      panorama.setPano(data.location.pano);
                                      panorama.setPov({
                                        heading: 270,
                                        pitch: 0,
                                        zoom: 1
                                      });
                                      panorama.setVisible(true);
                                      
                                      google.maps.event.addListener(marker, "click", function() {
                                      
                                        var markerPanoID = data.location.pano;
                                        // Set the Pano to use the passed panoID
                                        panorama.setPano(markerPanoID);
                                        panorama.setPov({
                                          heading: 270,
                                          pitch: 0,
                                          zoom: 1
                                        });
                                        panorama.setVisible(true);
                                      });
                                    } else {
                                      alert("Street View data not found for this location.");
                                    }
                                  }';
        }
                
    } 
    
    /**
    * Function set markers allowed parameter
    * 
    * @param boolean $param
    * @access public
    * @return NULL
    */
    public function gMapsSetAllowMarkers($param){
        $this->allowMarkers =   $param;
    }
    
    /**
    * Function set ajax markers allowed parameter
    * 
    * @param boolean $param
    * @access public
    * @return NULL
    */
    public function gMapsSetAllowAjaxMarkers($param){
        $this->allowAjaxMarkers =   $param;
    }
    
    /**
    * Function set autobuild polygons parameter
    * 
    * @param boolean $param
    * @access public
    * @return NULL
    */
    public function gMapsSetAllowBuildPolygon($param){
        $this->allowBuildPolygon    =   $param;
    }
    
    /**
    * Function set autobuild polylines parameter
    * 
    * @param boolean $param
    * @access public
    * @return NULL
    */
    public function gMapsSetAllowBuildPolyLine($param){
        $this->allowBuildPolyline    =   $param;
    }
    
    /**
    * Function set direction allowed parameter and receive some init options
    * 
    * @param boolean $param
    * @param array $options - options array
    * @access public
    * @return null
    */
    public function gMapsSetAllowDirections($param, $options = array()){
        $this->allowDirection       =   $param;
        $this->options['direction'] =   $options;
    }
    
    /**
    * Function set street view allowed parameter
    * 
    * @param boolean $param
    * @param array $options - options array
    * @access public
    * @return null
    */
    public function gMapsSetAllowStreetView($param) {
        $this->allowShowStreetView  =   $param;
    }
    
    /**
    * Function set street view events allowed parameter
    * 
    * @param boolean $param
    * @param array $options - options array
    * @access public
    * @return null
    */
    public function gMapsSetAllowStreetViewEvents($param){
         $this->allowShowStreetViewEvents  =   $param;    
    }
    
    /**
    * Function set street view service allowed parameter
    * 
    * @param boolean $param
    * @param array $options - options array
    * @access public
    * @return null
    */
    public function gMapsSetAllowStreetViewService($param) {
        $this->allowShowStreetViewService  =   $param;    
    } 
    
     /**
    * Function set direction allowed parameter and receive some init options
    * 
    * @param boolean $param
    * @param array $options - options array
    * @access public
    * @return null
    */
    public function gMapsSetAllowOverlay($param, $options){
        $this->allowOverlay         =   $param;
        $this->options['overlay']   =   $options;
        
        if($this->allowOverlay){
            $type   =   $options['params']['type'];
            
            if($type == 'polygon') {
                if(isset($options['data']) && count($options['data']) > 0) {
                    $jsCode = '';
                    foreach($options['data'] as $coords) {
                        $jsCode .= sprintf('new google.maps.LatLng(%s, %s), ', $coords[0], $coords[1]);    
                    }
                    $jsCode =   'var polygonCoords = [' . substr($jsCode, 0, -2) . '];';
                }
                
                $jsCode .=  "\n// Construct the polygon
                               // Note that we don't specify an array or arrays, but instead just
                               // a simple array of LatLngs in the paths property
                               coords = new google.maps.Polygon({
                                   paths: polygonCoords,
                                   strokeColor: '" . (isset($options['params']['strokeColor'])    ? $options['params']['strokeColor']    : $this->sh_Options['strokeColor']) . "',
                                   strokeOpacity: " . (isset($options['params']['strokeOpacity']) ? $options['params']['strokeOpacity']  : $this->sh_Options['strokeOpacity']) . ",
                                   strokeWeight: " . (isset($options['params']['strokeWeight'])   ? $options['params']['strokeWeight']   : $this->sh_Options['strokeWeight']) . ",
                                   fillColor: '" .   (isset($options['params']['fillColor'])      ? $options['params']['fillColor']      : $this->sh_Options['fillColor']) . "',
                                   fillOpacity: " .  (isset($options['params']['fillOpacity'])    ? $options['params']['fillOpacity']    : $this->sh_Options['fillOpacity']) . "
                               });
                               
                               coords.setMap(map);";
                               
                $this->code[] = $jsCode;
            
            } elseif($type == 'polyline') {
                
                if(isset($options['data']) && count($options['data']) > 0) {
                    $jsCode = '';
                    foreach($options['data'] as $coords) {
                        $jsCode .= sprintf('new google.maps.LatLng(%s, %s), ', $coords[0], $coords[1]);    
                    }
                    $jsCode =   'var polylineCoords = [' . substr($jsCode, 0, -2) . '];';
                }
                
                $jsCode .=  "\n// Construct the polyline
                               // Note that we don't specify an array or arrays, but instead just
                               // a simple array of LatLngs in the paths property
                               coords = new google.maps.Polyline({
                                   path: polylineCoords,
                                   strokeColor: '" . (isset($options['params']['strokeColor'])    ? $options['params']['strokeColor']    : $this->sh_Options['strokeColor']) . "',
                                   strokeOpacity: " . (isset($options['params']['strokeOpacity']) ? $options['params']['strokeOpacity']  : $this->sh_Options['strokeOpacity']) . ",
                                   strokeWeight: " . (isset($options['params']['strokeWeight'])   ? $options['params']['strokeWeight']   : $this->sh_Options['strokeWeight']) . "
                                });
                               
                               coords.setMap(map);";
                $this->code[] = $jsCode;    
            }    
        }    
    }
    
    /**
     * Function make geocoding requests and retrive lat lng for currect address
     * 
     * @param array $addressList - address list
     * @access public
     * @return array
     */
    public function batchGeolocalization($addressList){
        
        $geocodingUrl = $this->sh_Options['geocoding_url'];
        
        foreach($addressList as &$address){
            $url = $geocodingUrl . $address['data'] . '&sensor=false';
            
            $xmlResponse = simplexml_load_file($url);
            
            if($xmlResponse->status == 'OK') {
                if(isset($xmlResponse->result->geometry->location->lat) && isset($xmlResponse->result->geometry->location->lng)) {
                    $address['lat']     = (float)$xmlResponse->result->geometry->location->lat;
                    $address['lng']     = (float)$xmlResponse->result->geometry->location->lng;
                    $address['error']   = '';
                } else {
                    $address['lat']     = 0;
                    $address['lng']     = 0;
                    $address['error']   = $xmlResponse->status;
                }
            } else {
                $address['error']   = $xmlResponse->status;   
            }
        }
        
        return $addressList;     
            
    }
    
} // End of class 

/* End of file SHIN_Maps.php */
/* Location: shinfw/libraries/SHIN_Maps.php */               
