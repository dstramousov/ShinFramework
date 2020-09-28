<table align="center" class="generalinformation-table">
    <tr>
        <td valign="bottom">
            <div id="photo-rate" class="photo-rate"></div>
            <div class="user-not-loggedin" id="user-not-loggedin">
                {$lng_label_please} <a href="{php} echo base_url().'/main'; {/php}">{$lng_label_logged_in}</a> {$lng_label_or} <a href="{php} echo base_url().'/joinus'; {/php}">{$lng_label_registrate}</a> 
            </div>
        </td>
        <td class="middle-photo">
            <div>
                <img src="{$img}" alt="" title="" class="preview-photo" />
            </div>
        </td>
        <td valign="bottom">
            <table class="cirsuit-info" border="0">
                <tr>
                    <td style="width:50px;padding-bottom:15px;">
						{include file="web/photographer/facebook_button.tpl"}
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="{$circuit_photo}" alt="Circuit photo" title="Circuit photo" /><br /><br/ >
                    </td>
                </tr>
                <tr>
                    <td class="circuit-name"><span class="circuitdata-header">{$lng_label_circuit_name}</span>&nbsp;{$circuit_name}</td>
                </tr>
                <tr>
                    <td><span class="circuitdata-header">{$lng_label_picture_web_circuit_country}</span>&nbsp;{$circuit_country}</td>
                </tr>
                <tr>
                    <td><span class="circuitdata-header">{$lng_label_picture_web_race_day}</span>&nbsp;{$photoData.raceday}</td>
                </tr>
                <tr>
                    <td><span class="circuitdata-header">{$lng_label_picture_web_shuter_time}</span>&nbsp;{$photoData.racetime}</td>
                </tr>
                <!-- if anon not show this block -->
                {if !empty($photoData.ainfo)}
                <tr>
                    <td><span class="circuitdata-header">{$lng_label_picture_web_cat_license}</span>&nbsp;{$photoData.carLicensePlate}</td>
                </tr>    
                <tr>
                    <td><span class="circuitdata-header">{$lng_label_picture_web_car_number}</span>&nbsp;{$photoData.carNumber}</td>
                </tr>
                <tr>
                    <td><span class="circuitdata-header">{$lng_label_picture_web_car_pilot}</span>&nbsp;{$photoData.carPilot}</td>
                </tr>
                <tr>
                    <td><span class="circuitdata-header">{$lng_label_picture_web_car_brand}</span>&nbsp;{$photoData.carBrandName}</td>
                </tr>
                {/if}
                <!-- if anon not show this block -->
            <tr>
                <td>&nbsp;</td>
            </tr>
            
            <tr>
                <td>{$lng_label_photographerinfo}</td>
            </tr>
            {if !empty($photoData.ainfo)}
            <tr>
                <td><span class="circuitdata-header">{$lng_label_photographerinfo_fn}</span>&nbsp;{$photographer_fullname}</td>
            </tr>
            {/if}
            <tr>
                <td><span class="circuitdata-header">{$lng_label_photographerinfo_nick}</span>&nbsp;{$photographer_nick}</td>
            </tr>
            <tr>
                <td><span class="circuitdata-header">{$lng_label_photographerinfo_at}</span>&nbsp;{$photographer_type}</td>
            </tr>
            </table>
        </td>
    </tr>
  
    <tr>
        <td></td>
        <td class="middle-photo">
            <div class="photo-actions">
                <table width="100%" align="center">
                    <tr>
                        <td align="left">
                            {if !is_null($idUser)}
                                {if $userphotoaction != 'sell'}
                                    <a href="{$urlfordownload}" target="_blank" class="scarica-hires-btn"></a>
                                {/if}
                            {/if}
                        </td>
                        <td align="right">
                            {if !is_null($idUser)}
                                {if $userphotoaction == 'sell'}
                                    {if !in_array($idPhoto, $cart)}
                                        <a href="javascript:void(0)" class="ordina-btn"  onclick="addToCart({$idPhoto}, this)"></a>
                                    {/if}
                                {/if}
                            {/if}
                        </td>
                    </tr>
                </table>
            </div>
        </td>
        <td></td>
    </tr>
</table>

    {literal}
        <script type="text/javascript">

        	$('#facebookimage').attr('content', '{/literal}{$facebook_img_url}{literal}');

            $('#photo-rate').raty({
                    path:       '{/literal}{php} echo SHIN_Core::$_config['core']['app_base_url']; {/php}/images/rate/{literal}',
                    start:      {/literal}{$photoData.score}{literal},
                    onClick:    function(score) {
                        {/literal}
                            {if !empty($idUser)}
                        {literal}
                            
                            // 1. disable raiting for this user
                            $.fn.raty.readOnly(true);
                            
                            // 2. send request
                            $.getJSON({/literal}'{php} echo base_url(); {/php}/setraiting'{literal}, {
                                score:  score,
                                photo:  {/literal}{$photoData.idPhoto}{literal}
                            }, function(json) {
                                $.fn.raty.start(json.score);
                                $('.total-raters').text(json.raters);
                            })
                        {/literal}
                            {else}
                        {literal}
                                $('#photo-rate').hide();
                                $('.user-not-loggedin').show();
                        {/literal}    
                            {/if}
                        {literal}
                    }
            });
        </script>
    {/literal}

{if $isRate == 'true'}
    {literal}
        <script type="text/javascript">
            $.fn.raty.readOnly(true);    
        </script>    
    {/literal}
{/if}

