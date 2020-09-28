<div>
    <form action="" method="post" class="gtrwebsite-dialog" enctype="multipart/form-data">
        <table>
            <tr>
                <td colspan="2">{$gtrwebsite_solution_idSolution_hidden}</td>
            </tr>
            <tr>
                <th>{$lng_label_solution_description}:</th>
                <td>
                    {$gtrwebsite_solution_description_input}<br />
                    <span class="validatetion-error" id="gtrwebsite_solution_description_error"></span>
                </td>
            </tr>
            <tr>
                <th>{$lng_label_solution_posx}:</th>
                <td>
                    {$gtrwebsite_solution_posX_input}<br />
                    <span class="validatetion-error" id="gtrwebsite_solution_posx_error"></span>
                </td>
            </tr>
            <tr>
                <th>{$lng_label_solution_posy}:</th>
                <td>
                    {$gtrwebsite_solution_posY_input}<br />
                    <span class="validatetion-error" id="gtrwebsite_solution_posy_error"></span>
                </td>
            </tr>
            <tr>
                <th>{$lng_label_solution_level}:</th>
                <td>
                    {$gtrwebsite_solution_level_input}<br />
                    <span class="validatetion-error" id="gtrwebsite_solution_level_error"></span>
                </td>
            </tr>
            {if !empty($gtrwebsite_solution_idSolution)}
            <tr>
                <th>{$lng_label_solution_img_old}:</th>
                <td>
                    <img src="{php}echo prep_url(SHIN_Core::$_config['core']['app_base_url'] . '/' . SHIN_Core::$_config['store']['solutions_images'] . '/'.SHIN_Core::$_config['store']['thumbnails_prefix']);{/php}{$gtrwebsite_solution_img}" alt="" title="" />
                </td>
            </tr>
            {/if}
            <tr>
                <th>{$lng_label_item_img}</th>
                <td>
                    <div id="imgUploader"></div><br />
                    <span class="validatetion-error" id="gtrwebsite_solution_img_error"></span>
                </td>
            </tr>
        </fieldset>
    </form>
</div>

{$jsdocready}