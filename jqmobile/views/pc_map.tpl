{include file="header.tpl"}
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<div class="customer-list">
    {$ssstylemustbehere}
</div>

{literal}
    <script type="text/javascript">
    
    
        var dialogCount = 1;

        function openDialog(lat, lng, customer) {
         
             // add dialog div into DOM 
             $('body').append('<div id="dialog_' + dialogCount + '"><div id="map_canvas_' + dialogCount + '" style="height: 400px; width: 100%;"></div>');
             
             // add dialog plugin
             makeDialog(dialogCount, lat, lng, customer);
             
             $("#dialog_" + dialogCount).dialog('open');
              
             dialogCount++;    
         
        }

        function makeDialog(id, lat, lng, customer) {
         
             $("#dialog_" + id).dialog({
                  title:      'Location of ' + customer,
                  modal:      false, 
                  height: 550,
                  width: 430,
                  position:   'center', 
                  resizable:  true,
                  autoOpen:   false,
                  position:   [100 + (id * 10), 100 + (id * 10)], 
                  buttons: {'Cancel': function() {
                   $(this).dialog('close');
                  }},
                  open: function(){
                    
                      var myLatlng = new google.maps.LatLng(lat, lng);
                      var myOptions = {
                        zoom: 4,
                        center: myLatlng,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                      }
                      
                      map = new google.maps.Map(document.getElementById("map_canvas_" + id), myOptions);
                      
                      var marker = new google.maps.Marker({
                          position: myLatlng, 
                          map: map
                      });
                      
                  }
             });    
        }
        
        function openMap(lat, lng) {
            
            $('#map-dialog').dialog({
                open: function(){
                    
                    init();
                            
                    var location = new google.maps.LatLng(lat, lng);
                    var marker   = new google.maps.Marker({
                                                              position: location, 
                                                              map:      map,
                                                              icon:     null
                                                           });

                    map.setCenter(location);    
                }
            });
            
            $('#map-dialog').dialog('open');
        }
        
        function closeMap(){
            $('#map-dialog').dialog('close');
        }
    </script>
{/literal}

{include file="footer.tpl"}
