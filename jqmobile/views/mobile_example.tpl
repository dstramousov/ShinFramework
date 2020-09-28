{include file="header.tpl"}
<div data-role="page" id="mainpage">

    <div data-role="header">
        <h1>Mobile test1</h1>
    </div><!-- /header -->

    <div data-role="content">    
        <table width="100%" border="1">
            <tr>
                <td colspan="4">{$nav_str_up}</td>
            </tr>
            <tr>
                <td>Id</td>
                <td>Customer</td>
                <td>Bill</td>
                <td>Note</td>
            </tr>
            <tr>
                {section name=id loop=$jqmobile_example_id}
                    <td>{$jqmobile_example_id[id]}</td>
                    <td>{$jqmobile_example_customer[id]}</td>
                    <td>{$jqmobile_example_bill[id]}</td>
                    <td>{$jqmobile_example_note[id]}</td>
                <tr></tr>    
                {/section}
            </tr>
            <tr>
                <td colspan="4">{$nav_str_down}</td>
            </tr>
        </table>
        <a href="#newcustomer" data-rel="dialog" data-role="button" data-inline="true" data-transition="pop">Add New Customer</a>        
    </div><!-- /content -->

    <div data-role="footer">
        <h4>Shin PHP Framework 0.9</h4>
    </div><!-- /footer -->
</div>
<!-- /page -->


<div data-role="page" id="newcustomer">
    <div data-role="header">
        <h1>Mobile test1</h1>
    </div><!-- /header -->
    <div data-role="content">    
        <form action="" method="post">
            <table width="100%" border="1">
                <tr>
                    <th><label for="name">Customer:</label></th>
                    <td>
                        <div data-role="fieldcontain">
                            <input type="text" name="customer" id="customer" value=""  /><br />
                            <span class="validatetion-error" id="jqmobile_example_customer_error"></span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th><label for="name">Bill:</label></th>
                    <td>
                        <div data-role="fieldcontain">
                            <input type="text" name="bill" id="bill" value=""  /><br />
                            <span class="validatetion-error" id="jqmobile_example_bill_error"></span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th><label for="name">Notes:</label></th>
                    <td>
                        <div data-role="fieldcontain">
                            <input type="text" name="notes" id="notes" value=""  /><br />
                            <span class="validatetion-error" id="jqmobile_example_note_error"></span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="button" name="add" value="Add customer" id="add" onclick="sendData();" />
                    </td>
                </tr>
            </table>
         </form>        
    </div><!-- /content -->
    <div data-role="footer">
        <h4>Shin PHP Framework 0.9</h4>
    </div><!-- /footer -->
</div>

{literal}
<script type="text/javascript">
    function sendData() {
        
        var customer    =   $('#customer').val();
        var bill        =   $('#bill').val();
        var notes       =   $('#notes').val();
        
        
        $.getJSON('{/literal}{php} echo base_url().'/example/validate'; {/php}{literal}', {
            jqmobile_example_customer: customer,
            jqmobile_example_bill:     bill,
            jqmobile_example_note:     notes    
        }, function(json){
            
            $('.validatetion-error').hide();
            
            if(json.result) {
                $.getJSON('{/literal}{php} echo base_url().'/add'; {/php}{literal}', {
                    customer:   $('#customer').val(),
                    bill:       $('#bill').val(),
                    notes:      $('#notes').val()    
                }, function(json){
                    if(json.result){
                        window.location = '{/literal}{php} echo base_url().'/table'; {/php}{literal}';
                    }    
                })
            } else {
                
                for(index in json.errors) {
                    $('#' + index + '_error').text(json.errors[index]).show();
                }    
            }    
        })
    } 
</script>
{/literal}

{include file="footer.tpl"}