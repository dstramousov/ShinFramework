<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

		$_setup_required_model_list = array(
						'models' => array(
								array('examples_file_tracking_model', 'examples_file_tracking_model'),
								array('examples_geo_model', 'examples_geo_model'),
								array('examples_panel_model', 'examples_panel_model'),
								array('examples_tag_model', 'examples_tag_model'),
								array('examples_tree_model', 'examples_tree_model'),
                                array('examples_schedule_model', 'examples_schedule_model'),
                                array('examples_customer_master_data_model', 'examples_customer_master_data_model'),
                                array('examples_crmmasterdata_model', null, CT_BASE_CLASS),
                                array('examples_crmmasterdata_extended_model', 'examples_crmmasterdata_extended_model'),
                                array('examples_geoarea_model', 'examples_geoarea_model'),
                                array('examples_geocity_model', 'examples_geocity_model'),
                                array('examples_geocountry_model', 'examples_geocountry_model'),
								array('examples_geoprovince_model', 'examples_geoprovince_model'),
								array('examples_salesforce_model', 'examples_salesforce_model'),								
								array('examples_user_model', 'examples_user_model'),								
								array('examples_file_tracking_data_model', 'examples_file_tracking_data_model'),
							),
						);