<?php /* Smarty version 2.6.26, created on 2010-12-01 10:06:02
         compiled from web/one_news_block.tpl */ ?>
							<!-- begin of news block -->
							<tr>
								<td valign="top">
									<table width="271" height="100%" border="0" cellpadding="0" cellspacing="10" onclick="itemClick('news', <?php echo $this->_tpl_vars['news_id']; ?>
)">
										<tr>
											<td valign="top">
												<div align="center">
													<p align="justify">
							                        	<font color="#666666" size="2" face="Arial, Helvetica, sans-serif">
								                        	<b><?php echo $this->_tpl_vars['news_title']; ?>
</b>
														</font>
														<br/>
														<font color="#666666" size="2" face="Arial, Helvetica, sans-serif">
															<?php echo $this->_tpl_vars['news_bodyLong']; ?>
                            							
														</font>
														<br/>
							                        	<font color="#666666" size="2" face="Arial, Helvetica, sans-serif">
								                        	<?php echo $this->_tpl_vars['news_link']; ?>

														</font>
														<br/>
														<?php echo $this->_tpl_vars['news_img']; ?>

                            						</p>
												</div>
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td height="3">
									<img src="<?php echo SHIN_Core::$_config['core']['app_base_url']; ?>/images/web/line2.jpg" width="230" height="3" hspace="3" style="margin-left:26px;" alt="">
								</td>
							</tr>
							<!-- end of news block -->