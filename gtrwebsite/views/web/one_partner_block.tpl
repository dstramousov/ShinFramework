								<!-- line delimiter begin -->
								<tr>
									<td height="15">
										<img src="{php}echo SHIN_Core::$_config['core']['app_base_url'];{/php}/images/web/line1.jpg" width="451" height="3" style="margin-left:3px;" alt="" />
									</td>
								</tr>
								<!-- line delimiter end -->
								<!-- one partner block begin -->
								<tr>
									<td height="120" valign="top">
										<div align="justify">
											<table width="460" height="120" border="0" cellpadding="0" cellspacing="0" onclick="itemClick('partner', {$partner_id})">
                      							<tr>
							                        <td valign="middle">
							                        	<div align="justify">
								                        	<!-- name -->
								                        	<font color="#666666" size="2" face="Arial, Helvetica, sans-serif">
									                        	<b>{$partner_name}</b>
															</font>
															<!-- end name-->
															<br/>
								                        	<!-- type -->
								                        	<font color="#666666" size="2" face="Arial, Helvetica, sans-serif">
									                        	<i>{$partner_type}</i>
															</font>
															<!-- type name-->
															<br/>
								                        	<!-- link -->
								                        	<font color="#666666" size="1" face="Arial, Helvetica, sans-serif">
									                        	{$partner_link}
															</font>
															<br/>
															<br/>
															<!-- end link -->
							                        		<font color="#666666" size="2" face="Arial, Helvetica, sans-serif">
																<font color="#000000">
																	{$partner_description}
																</font>
    														</font>
                            							</div>
                            						</td>
                            						{$partner_img}
												</tr>
						                    </table>
										</div>
									</td>
								</tr>
								<!-- one partner block end -->
