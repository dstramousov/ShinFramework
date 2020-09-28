{include file="header.tpl"}

<body id="page">

	{include file="back_url.tpl"}
    
    <fieldset>
        <legend style="font-size: 30px; font-weight: bold;">Datatables smartinit</legend>
        <div class="messages">
            {$jsMessages}
            {$jsErrors}
        </div>
        <div class="action-input">
            <a href="" id="add_example_button"></a>
        </div>
        <div class="data-list">
            {$domelement}
        </div>

        <div class="item-datatable2">
        </div>

    </fieldset>
    
    <!-- crudd  data -->
    {$crudData}
    <!-- crudd data -->
    
    {literal}
    <style type="text/css">
        table td,th{
            padding: 2px;
        }
        
        th{
            text-align: left;
        }
        
        td input {
            width: 200px !important;
        }
        
        .validatetion-error {
           font-size: 10px;
        }
    </style>
    {/literal}

        {literal}
            <script type="text/javascript">
                
                /**
                * load slave datatable
                */
                function loadItems(idCategory){
                    
                    //destroy all dialogs
                    $('.item-datatable2').load('datatables_smartinit_test21.php', {
                        idItemCat:  idCategory
                    });
                }
                
            </script>
        {/literal}

</body>
</html>
