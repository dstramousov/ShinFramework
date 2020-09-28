<?php /* Smarty version 2.6.26, created on 2011-05-16 07:50:34
         compiled from charts.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<body id="page">

	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "back_url.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

    <form action="<?php  echo prep_url(base_url().'/charts.php');  ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="mode" value="interval">

    <h1>Charts demo:</h1>

    <div class="demo">

		<p>
			From: <input id="datepicker_from" name="from" type="text" value="<?php echo $this->_tpl_vars['datefrom']; ?>
" />
			To: <input id="datepicker_to" name="to" type="text" value="<?php echo $this->_tpl_vars['dateto']; ?>
" />
		</p>

		<input type="submit" value="Get data">

        <fieldset>
            <legend style="font-size: 30px; font-weight: bold;">Single Series Charts</legend>

            <h2>Type: Area2D chart</h2>
            <div id="area2d"></div>
            
            <h2>Type: Bar2D chart</h2>
            <div id="bar2d"></div>
            
            <h2>Type: Column2D chart</h2>
            <div id="column2d"></div>
            
            <h2>Type: Column3D chart</h2>
            <div id="column3d"></div>
            
            <h2>Type: Doughnut2D chart</h2>
            <div id="doughnut2d"></div>
            
            <h2>Type: Line2D chart</h2>
            <div id="line2d"></div>
            
            <h2>Type: Pie2D chart</h2>
            <div id="pie2d"></div>
            
            <h2>Type: Pie3D chart</h2>
            <div id="pie3d"></div>
        </fieldset>
        
        <fieldset>
            <legend style="font-size: 30px; font-weight: bold;">Multi-series Charts</legend>

            <h2>Type: Multi-series Column2D</h2>
            <div id="msColumn2D"></div>
            
            <h2>Type: Multi-series Column3D</h2>
            <div id="msColumn3D"></div>
            
            <h2>Type: Multi-series Line2D</h2>
            <div id="msLine2D"></div>
            
            <h2>Type: Multi-series Area2D</h2>
            <div id="msArea2D"></div>
            
            <h2>Type: Multi-series Bar2D</h2>
            <div id="msBar2D"></div>
            
        </fieldset>
        
        <fieldset>
            <legend style="font-size: 30px; font-weight: bold;">Stacked Charts</legend>

            <h2>Type: Stacked Column2D</h2>
            <div id="sColumn2D"></div>
            
            <h2>Type: Stacked Column2D</h2>
            <div id="sColumn3D"></div>
            
            <h2>Type: Stacked Area2D</h2>
            <div id="sArea2D"></div>
            
            <h2>Type: Stacked Bar2D</h2>
            <div id="sBar2D"></div>
            
       </fieldset>
       
       <fieldset>
            <legend style="font-size: 30px; font-weight: bold;">Combined Charts</legend>

            <h2>Type: Multi-Series Column 2D Line Dual Y Chart</h2>
            <div id="MSColumn2DLineDY"></div>
            
            <h2>Type: Multi-Series Column 3D Line Dual Y Chart</h2>
            <div id="MSColumn3DLineDY"></div>
            
       </fieldset>
       
       <fieldset>
            <legend style="font-size: 30px; font-weight: bold;">Funnel Chart</legend>

            <h2>Type: Funnel Chart</h2>
            <div id="funnel"></div>
            
       </fieldset>
       
       <fieldset>
            <legend style="font-size: 30px; font-weight: bold;">Funnel Chart</legend>

            <h2>Type: Financial Chart</h2>
            <div id="financial"></div>
            
       </fieldset>
       
       <fieldset>
            <legend style="font-size: 30px; font-weight: bold;">Gannt Chart</legend>

            <h2>Type: Cannt Chart</h2>
            <div id="gannt"></div>
            
       </fieldset>
  
    </div>
    </form>
    
</body>

</html>