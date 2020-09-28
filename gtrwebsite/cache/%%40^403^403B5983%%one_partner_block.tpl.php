<?php /* Smarty version 2.6.26, created on 2010-12-01 10:06:02
         compiled from web/one_partner_block.tpl */ ?>
								<!-- line delimiter begin -->
								<tr>
									<td height="15">
										<img src="<?php echo SHIN_Core::$_config['core']['app_base_url']; ?>/images/web/line1.jpg" width="451" height="3" style="margin-left:3px;" alt="" />
									</td>
								</tr>
								<!-- line delimiter end -->
								<!-- one partner block begin -->
								<tr>
									<td height="120" valign="top">
										<div align="justify">
											<table width="460" height="120" border="0" cellpadding="0" cellspacing="0" onclick="itemClick('partner', <?php echo $this->_tpl_vars['partner_id']; ?>
)">
                      							<tr>
							                        <td valign="middle">
							                        	<div align="justify">
								                        	<!-- name -->
								                        	<font color="#666666" size="2" face="Arial, Helvetica, sans-serif">
									                        	<b><?php echo $this->_tpl_vars['partner_name']; ?>
</b>
															</font>
															<!-- end name-->
															<br/>
								                        	<!-- type -->
								                        	<font color="#666666" size="2" face="Arial, Helvetica, sans-serif">
									                        	<i><?php echo $this->_tpl_vars['partner_type']; ?>
</i>
															</font>
															<!-- type name-->
															<br/>
								                        	<!-- link -->
								                        	<font color="#666666" size="1" face="Arial, Helvetica, sans-serif">
									                        	<?php echo $this->_tpl_vars['partner_link']; ?>

															</font>
															<br/>
															<br/>
															<!-- end link -->
							                        		<font color="#666666" size="2" face="Arial, Helvetica, sans-serif">
																<font color="#000000">
																	<?php echo $this->_tpl_vars['partner_description']; ?>

																</font>
    														</font>
                            							</div>
                            						</td>
                            						<?php echo $this->_tpl_vars['partner_img']; ?>

												</tr>
						                    </table>
										</div>
									</td>
								</tr>
								<!-- one partner block end -->