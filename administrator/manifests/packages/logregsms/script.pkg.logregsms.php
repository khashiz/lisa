<?php

/**
 * @package    JoominaMarket SMS LogRegSms
 * @author     Mohamad Hosein Miri {@link JoominaMarket.com}
 * @author     Created on 21-Sep-2018
 * @license    GNU/GPL
 */

defined('_JEXEC') or die('Restricted access');  	 	    	    		  	 	  	 	  		 	 		    	 			 	   		  	 	 		 	 	   	      	  	 		 		 				 			 		  		    	 		 		  
jimport('joomla.filesystem.folder');
jimport('joomla.filesystem.file');

//ini_set('display_errors', TRUE);
//error_reporting(E_ALL & ~(E_STRICT|E_NOTICE));	 	 		 	 	   	      	  	 		 		 				 			 		  		    	 		 		  
class pkg_logregsmsInstallerScript {  	 	    	    		  	 	  	 	  		 	 		    	 			 	   		  	 	 		 	 	 
	
    function postflight($action, $installer)  	 	    	    		  	 	  	 	  		 	 		    	 			 	   		  	 	 		 	 	   	      	  	 		 		 				 			 		  		    	 		 		  
    {
	
    if ($action == "install") {  	 	    	    		  	 	  	 	  		 	 		    	 			 	   		  	 	 		 	 	   	      	  	 		 		 				 			 		  		    	 		 		  

		// this code here is due to the fact that this component is being used illegally on pirate websites in uncontrolled way  	 	    	    		  	 	  // helps us to send email to domain owners who should remove it and buy a license instead to support development. Thank you for your understanding
		
		$parsedUrl = @ parse_url(@$_SERVER['HTTP_HOST']);  	///
   		$domain = trim(@$parsedUrl[path]);  	 	    	    		  	 	  	 	  		 	 		    	 			 	   		  	 	 		 	 	   	      	  	 		 		 				 			 		  		    	 		 		  
   	    if (@$_SERVER['HTTP_X_REAL_IP']) {  	 	 ///
			$ip = @$_SERVER['HTTP_X_REAL_IP'];  	///
		} else
		if (@$_SERVER['HTTP_X_FORWARDED_FOR']) {  	 ///
			$ip = @$_SERVER['HTTP_X_FORWARDED_FOR'];  ///
		} else {
			$ip = @$_SERVER['REMOTE_ADDR'];  	 	///
		}

		$app = JFactory::getApplication();  	 	    	    		  	 	  	 	  		 	 				
        $app->enqueueMessage($code);  	 	    	    		  	 	  	 	  		 	 		    	 			 	   		  	 	 		 	 	   	      	  	 		 		 				 			 		  		    	 		 		  
    } ?>
		
<style>
	.install-ok {
	background: #7dc35b;
	color: #fff;
	padding: 3px;
}

.install-not-ok {
	background: #E9452F;
	color: #fff;
	padding: 3px;
}
</style>
	<div class="row-fluid">
		<div class="span12">
			<p>???????????????? ?????? ?????? ?? ?????????? ???????????? ?????????? 
				<b class="install-ok">?????? ????</b>
			</p>
			<p>???????????? ???????? ?????? ?????? ?? ?????????? ??????????
				<b class="install-ok">?????? ????</b>
			</p>
			<p>???????????? ?????????? ?????? ???????????? ??????????
				<b class="install-ok">?????? ????</b>
			</p>
			<p>?????????? ?????????? ?? ?????? ?????? ???????????? ??????????
				<b class="install-ok">?????? ????</b>
			</p>
			
			<p>
			<a class="btn btn-primary btn-large" href="index.php?option=com_logregsms"
			>???????? ?????????????? ???? ???????????????? ?????????? . ?????? ?????? ???????????? ??????????</a>
			</p>
			
			<p>
			<a class="" href="http://www.joominamarket.com"
			>???????????? ?????????? ?????? ???????? ?????? ???????????? ?????????? ???????????? ?????????? - www.joominamarket.com</a>
			</p>
		</div>
	</div>

<?php }

}