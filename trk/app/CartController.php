<?php

/**
 * trk/app/CartController.php
 *
 * Realise front-end logic. 
 *
 */

require "CommonController.php";

class CartController extends CommonController {
    
    /**
    * Constructor
    * 
    * @access public
    * @param null
    * @return null
    */
    function __construct() {
       
        parent::__construct();
        
        if(!SHIN_Core::$_current_lang)
        {
            $_current_language = '';
            if(SHIN_Core::$_libs['session']->userdata('language')){
                $_current_language = SHIN_Core::$_libs['session']->userdata('language');
            } 
            
            if($_current_language == '') {$_current_language = SHIN_Core::$_config['lang']['language'];}
            ////////////////////////////////////////////////////////////////////

            SHIN_Core::$_language->load('app', $_current_language);
            SHIN_Core::$_current_lang = $_current_language;
            SHIN_Core::log('debug', '[LANGUAGE] Current language: '.SHIN_Core::$_current_lang);
        }
        
        $this->_getRandomPhoto(); 
    }
    
    /**
    * add photo to cart
    * 
    * @access public
    * @return json object
    * @param null
    * 
    */
    public function addToCart(){
        
        $idPhoto    =   SHIN_Core::$_input->globalarr('idPhoto');
        
        if(!empty($idPhoto)) {
            // init needed libs
            $nedded_libs = array('libs' => array('SHIN_Session'));
                                 
            SHIN_Core::postInit($nedded_libs);
            
            $sessionCart    =   SHIN_Core::$_libs['session']->userdata('cart');
            if(!empty($sessionCart)) {
                if(!in_array($idPhoto, $sessionCart)) {
                    array_push($sessionCart, $idPhoto);
                }
            } else {
                $sessionCart    =   array($idPhoto);
            }
            
            SHIN_Core::$_libs['session']->set_userdata(array('cart' => $sessionCart));
            
            echo json_encode(array('result' => true, 'count' => count($sessionCart))); exit();
                
        }
        
        echo json_encode(array('result' => false)); exit();
    }
    
    /**
    * delete photo from cart
    * 
    * @access public
    * @return json object
    * @param null
    * 
    */
    public function deleteFromCart(){
        
        $idPhoto    =   SHIN_Core::$_input->globalarr('idPhoto');
        
        if(!empty($idPhoto)) {
            
            // init needed libs
            $nedded_libs = array('libs' => array('SHIN_Session'));
                                 
            SHIN_Core::postInit($nedded_libs);
            
            $sessionCart    =   SHIN_Core::$_libs['session']->userdata('cart'); 
            if(in_array($idPhoto, $sessionCart)) {
                // 1. delete photo from the cart
                foreach($sessionCart as $key => $item) {
                    if($item == $idPhoto) {
                        unset($sessionCart[$key]);
                    }
                }
                
                // 2. save new cart in session
                SHIN_Core::$_libs['session']->set_userdata(array('cart' => $sessionCart));
                
                echo json_encode(array('result' => true, 'count' => count($sessionCart))); exit(); 
            }    
        }
        
            echo json_encode(array('result' => false)); exit();    
    }
    
    /**
    * show cart items
    * 
    * @access public
    * @return rendered template
    * @param null
    * 
    */
    public function showCart(){
        
        // init needed libs
        $nedded_libs = array('libs'     => array('SHIN_Session',
                                                 'SHIN_Mailer'),
                             'models'   => array(array('trk_photo_model', 'trk_photo_model')));
                             
        SHIN_Core::postInit($nedded_libs);
        
        $cart   =   SHIN_Core::$_libs['session']->userdata('cart');
        
        if(!empty($cart)) {
            
            $this->_initSearchForm();
            $this->_printTopBlock();
            
            SHIN_Core::$_libs['templater']->assign('cartList', SHIN_Core::$_models['trk_photo_model']->getPhotoByIds($cart));
                    
        } else {
            redirect(base_url() . '/main', 'refresh'); die();    
        }
        
        return 'web/cart/show-cart';    
    }
    
    /**
    * send cart items to owners
    * 
    * @access public
    * @return rendered template
    * @param null
    * 
    */
    public function sendCart(){
        
        // init needed libs
        $nedded_libs = array('libs' => array('SHIN_Session',
                                             'SHIN_Mailer'),
											 'models'   => array(array('trk_user_model', 'trk_user_model')));
                             
        SHIN_Core::postInit($nedded_libs);
        
        $cart   =   SHIN_Core::$_libs['session']->userdata('cart');
        
        if(!empty($cart)) {
            
            $query              = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->query('SELECT sys_user.idUser,
                                                                                                  sys_user.email, 
                                                                                                  sys_user.username, 
                                                                                                  trk_photo.idPhoto,
                                                                                                  trk_photo.sysname
                                                                                           FROM sys_user, trk_photo
                                                                                           WHERE sys_user.idUser = trk_photo.userId AND trk_photo.idPhoto IN (' . implode(', ', $cart) . ') ORDER BY email');
            $result           = $query->result_array();  
			
            $photographerList = array();
			
			$current_email	= '';
			$sendmail_sight	= FALSE;
            
            foreach($result as $record)
			{
                array_push($photographerList, array(
														'username' => $record['username'], 
														'idPhoto' => $record['idPhoto'], 
														'sysname' => $record['sysname'], 
														'email' => $record['email'], 
														'idUser' => $record['idUser'])
						  );    
            }
			
            $alreadySended  =   array();
            $orderedPictures=   array();
			
			$_send_mail_sight = FALSE;
			$f_t = TRUE;
			$current_mail = '';
			$current_id = NULL;
			$current_name = NULL;
            
            $body   =   SHIN_Core::$_language->line('lng_label_up_user_wants');
            $str    =   '';
            $__ID   =   NULL;
            $__USERNAME   =   NULL;
			
			$mail	= SHIN_Core::$_libs['mailer'];
			$mail->Encoding = 'quoted-printable';
			$_body	= $mail->getFile("views/web/mails/for_order.tpl");
			$_body	= str_replace('lng_label_site_description', SHIN_Core::$_language->line('lng_label_site_description'), $_body);
			$_body	= str_replace('lng_label_regards', SHIN_Core::$_language->line('lng_label_regards'), $_body);
			$_body	= str_replace('lng_label_if_not_for_admin', SHIN_Core::$_language->line('lng_label_if_not_for_admin'), $_body);					
			
            foreach($photographerList as $photos)
			{			
				$__ID = $photos['idUser'];
				$__USERNAME = $photos['username'];
				
				if($f_t){$current_name = $photos['username'];$current_id = $photos['idUser'];$current_mail = $photos['email'];$f_t = FALSE;}
				
				if($current_mail != $photos['email'] )
				{
					$__user = SHIN_Core::$_models['trk_user_model']->get_instance();
					$__user->fetchByID($current_id);
					if($__user->isDefinite()){
						$body .= "<br />".SHIN_Core::$_language->line('lng_label_up_owner');
						$body .= "<br />".SHIN_Core::$_language->line('lng_label_up_name').": ".$__user->sys_user_name."<br /><br />";
						$body .= "<br />".SHIN_Core::$_language->line('lng_label_up_surname').": ".$__user->sys_user_lastname."<br /><br />";
						$body .= "<br />".SHIN_Core::$_language->line('lng_label_up_email').": ".$__user->sys_user_email."<br /><br />";
					}
  								
					// send mail to photographer 
					SHIN_Core::$_libs['mailer']->AddAddress($current_mail, 'Photographer');
					SHIN_Core::$_libs['mailer']->Subject = 'Cart message';
					$_body	= str_replace('mailbo', $body, $_body);					
					SHIN_Core::$_libs['mailer']->MsgHTML($_body);                    
                
					$result = SHIN_Core::$_libs['mailer']->Send();                
					$alreadySended[$current_name]  =   $result;
                
					SHIN_Core::$_libs['mailer']->ClearAddresses();
					
					$body   =   SHIN_Core::$_language->line('lng_label_up_user_wants');
					$str    =   '';
					$current_mail = $photos['email'];
					$current_id = $photos['idUser'];
					$current_name = $photos['username'];
				}

                $str = '<a href="' . base_url() . '/showphoto?photo=' . $photos['sysname'] .'">' . $photos['sysname'] . '</a><br />';
				$uploaded_photo_name = substr($photos['sysname'], 32, strlen($photos['sysname']));
				$str .= SHIN_Core::$_language->line('lng_label_up_upphoto_name').': '.$uploaded_photo_name.'<br/><br/>';
				
                $body .= $str;

                $body .= "<br />".SHIN_Core::$_language->line('lng_label_up_user_info').": <br />";
                $body .= "<br />".SHIN_Core::$_language->line('lng_label_up_name').": ".SHIN_Core::$_user->name."<br />";
                $body .= "<br />".SHIN_Core::$_language->line('lng_label_up_surname').": ".SHIN_Core::$_user->lastname."<br />";
                $body .= "<br />".SHIN_Core::$_language->line('lng_label_up_email').": ".SHIN_Core::$_user->email."<br /><br />";
                //////////////////////////////////
				
				if(!isset($orderedPictures[$__USERNAME])) {
					$orderedPictures[$__USERNAME] = 1;
				} else {
					$orderedPictures[$__USERNAME]++;
				}
            }
			
			// send last mail 
			$__user = SHIN_Core::$_models['trk_user_model']->get_instance();
			$__user->fetchByID($__ID);
			if($__user->isDefinite()){
				$body .= "<br />".SHIN_Core::$_language->line('lng_label_up_owner');
				$body .= "<br />".SHIN_Core::$_language->line('lng_label_up_name').": ".$__user->sys_user_name."<br /><br />";
				$body .= "<br />".SHIN_Core::$_language->line('lng_label_up_surname').": ".$__user->sys_user_lastname."<br /><br />";
				$body .= "<br />".SHIN_Core::$_language->line('lng_label_up_email').": ".$__user->sys_user_email."<br /><br />";
			}
  								
			// send mail to photographer 
			SHIN_Core::$_libs['mailer']->AddAddress($current_mail, 'Photographer');
			SHIN_Core::$_libs['mailer']->Subject = 'Cart message';
			$_body	= str_replace('mailbo', $body, $_body);					
			SHIN_Core::$_libs['mailer']->MsgHTML($_body);                    
                
			$result = SHIN_Core::$_libs['mailer']->Send();
			$alreadySended[$__USERNAME]  =   $result;
			SHIN_Core::$_libs['mailer']->ClearAddresses();
			//////////////////////////////////////////
            
            // reset cart
            $this->_resetCart();
            $this->_printTopBlock();
            			
            SHIN_Core::$_libs['templater']->assign('alreadySended',   $alreadySended);
            SHIN_Core::$_libs['templater']->assign('orderedPictures', $orderedPictures);
            
            return 'web/cart/send-cart';    
        } else {
            redirect(base_url().'/main', 'refresh'); die();        
        }
    }
    
    /**
    * reset cart
    * 
    * @access private
    * @param null
    * @return null
    * 
    */
    private function _resetCart(){
        
        // init needed libs
        $nedded_libs = array('libs' => array('SHIN_Session'));
                             
        SHIN_Core::postInit($nedded_libs);
        
        SHIN_Core::$_libs['session']->set_userdata(array('cart' => null));    
    }
    
}