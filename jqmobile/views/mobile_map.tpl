{include file="header.tpl"}
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>

<div data-role="page" id="mainpage">

    <div data-role="header">
        <h1>Mobile test2</h1>
    </div><!-- /header -->

    <div data-role="content">    
        <table width="100%" border="1">
            <tr>
                <td colspan="4">{$nav_str_up}</td>
            </tr>
            <tr>
                <td>Id</td>
                <td>Customer</td>
                <td>Lat</td>
                <td>Lng</td>
            </tr>
            <tr>
                {section name=id loop=$jqmobile_map_example_id}
                    <td>{$jqmobile_map_example_id[id]}</td>
                    <td><a href="#map-page-{$jqmobile_map_example_id[id]}">{$jqmobile_map_example_customer[id]}</a></td>
                    <td>{$jqmobile_map_example_lat[id]}</td>
                    <td>{$jqmobile_map_example_lng[id]}</td>
                <tr></tr>    
                {/section}
            </tr>
            <tr>
                <td colspan="4">{$nav_str_down}</td>
            </tr>
        </table>
    </div><!-- /content -->

    <div data-role="footer">
        <h4>Shin PHP Framework 0.9</h4>
    </div><!-- /footer -->
</div>
<!-- /page -->

{section name=id loop=$jqmobile_map_example_id}
    <!-- map data -->
    <div data-role="page" id="map-page-{$jqmobile_map_example_id[id]}" customer="{$jqmobile_map_example_customer[id]}" lat="{$jqmobile_map_example_lat[id]|replace:',':'.'}" lng="{$jqmobile_map_example_lng[id]|replace:',':'.'}">

        <div data-role="header">
            <h1 id="header"></h1>
        </div><!-- /header -->

        <div data-role="content">    
            <div id="map_canvas_{$jqmobile_map_example_id[id]}" style="width:100%; height:480px;"></div>
        </div><!-- /content -->

        <div data-role="footer">
            <h4>Shin PHP Framework 0.9</h4>
        </div><!-- /footer -->
    
        {literal}
            <script type="text/javascript">
                $('#map-page-{/literal}{$jqmobile_map_example_id[id]}{literal}').live('pageshow',function(event, ui){
                    
                    var lat         =   $(this).attr('lat');
                    var lng         =   $(this).attr('lng');
                    var customer    =   $(this).attr('customer');
                    
                    $('#map-page-{/literal}{$jqmobile_map_example_id[id]}{literal} #header').html(customer);
                    
                    initialize({/literal}{$jqmobile_map_example_id[id]}{literal}, lat, lng, customer);  
                
                });
            </script>
        {/literal}
    
    </div><!-- /page -->
    <!-- map data -->
{/section}
{literal}
    <script type="text/javascript">
        function initialize(id, lat, lng) {
                  
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
    </script>
{/literal}

{include file="footer.tpl"}