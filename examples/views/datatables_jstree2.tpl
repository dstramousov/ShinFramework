{include file="header.tpl"}

<script src="{php}echo SHIN_Core::$_config['core']['app_base_url']; {/php}/jstree/jstree.init.js" type="text/javascript"></script>
<script src="{php}echo SHIN_Core::$_config['core']['app_base_url']; {/php}/jstree/jstree.callback2.js" type="text/javascript"></script>

<body id="page">

{literal}
<script type="text/javascript" language="javascript">

	$(document).ready(function(){

            $("#menulist input").click(function () {
                switch(this.id) {
                    case "create":
                        $("#basic_html2").jstree("create", null, "last", 'Create node', false, true);
                        break;
                    default:
                        $("#basic_html2").jstree(this.id);
                        break;
                }
            });


			$("#basic_html2").delegate("a","dblclick", function(e) {
				var idn = $(this).parent().attr("id");

				$.getJSON({/literal}'{php} echo base_url(); {/php}/jstree_db_usage_with_ui.php?action=getnodeinfo&id=idn'{literal}, {
					id: idn
				}, function(json) {
					$("#idnode").val(json.id);
					$("#node_name").val(json.name);
				})

				$('#dialog-form').dialog('open');
			});

	});

</script>
{/literal}




	{include file="back_url.tpl"}


<table width="100%" border="1" cellpadding="3" cellspacing="3">
    <tr>
        <td id="menulist">
			<input type="button" name="button" value="Create node" id="create" />
			<input type="button" name="button" value="Remove node" id="remove" />
        </td>
    </tr>
    <tr>
        <td>
			<legend style="font-size: 30px; font-weight: bold;">Js Tree with UI example</legend>
			<div id="clickednodeid" style="display:none;"></div>
			<div class="demo source" id="basic_html2"></div>    
        </td>
    </tr>
</table>


<div id="dialog-form" title="Edit node information">
	<form>
		<br/>
            <label for="name">record number</label>
            <input type="text" disabled="disabled" readonly="readonly" name="idnode" id="idnode" value=""/>
		<br/>
            <label for="name">Node name</label>
            <input type="text" name="node_name" id="node_name" />
	</form>
</div>      

    {literal}
    <script type="text/javascript">

	function updateNode(e)
	{
		nodename	= $('#node_name').attr('value');
		idnode		= $('#idnode').attr('value');

		$.getJSON({/literal}'{php} echo base_url(); {/php}/jstree_db_usage_with_ui.php?action=updatenode'{literal}, {  
			name: nodename,
			id: idnode
		}, function(json) {
			$("#nhref_"+idnode).html('<ins class="jstree-icon">&nbsp;</ins>'+nodename);
			$('#dialog-form').dialog('close');
		})
	}

    </script>
    {/literal}

</body>

</html>