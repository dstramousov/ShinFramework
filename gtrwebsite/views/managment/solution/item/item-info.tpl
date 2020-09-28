<div>
    <form action="" method="post" class="gtrwebsite-dialog">
        <table>
            <tr>
                <td colspan="2">
                    {$gtrwebsite_solutionitem_idItem_old}
                    {$gtrwebsite_solutionitem_idSolution_old}
                </td>
            </tr>
            <tr>
                <th>{$lng_label_solutionitem_id}:</th>
                <td>
                    {$gtrwebsite_solutionitem_idSolution_input}<br />
                    <span class="validatetion-error" id="gtrwebsite_solutionitem_idSolution_error"></span>
                </td>
            </tr>
            <tr>
                <th>{$lng_label_solutionitem_id_item}:</th>
                <td>
                    {$gtrwebsite_solutionitem_idItem_input}<br />
                    <span class="validatetion-error" id="gtrwebsite_solutionitem_idItem_error"></span>
                </td>
            </tr>
         </fieldset>
    </form>
</div>

{$jsdocready}