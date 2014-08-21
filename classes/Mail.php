<?php
	
	require_once '../lib/PHPMailer/PHPMailerAutoload.php';

	/*
	 *
	 * Wrapper pour le framework PHPMailer.
	 *
	 */
	class mail {

		/*
		 * Objet PHPMailer.
		 */
		private $_mail;

		public function __construct($senderMail, $senderName) {
			$this->_mail 				= new PHPMailer;
			$this->_mail->setLanguage('fr', '../lib/PHPMailer/language/phpmailer.lang-fr.php');
			$this->_mail->From         	= $senderMail;
			$this->_mail->FromName     	= $senderName;
			$this->_mail->addReplyTo($senderMail, $senderName);

			$this->_mail->isHTML(true);
		}

		public function to($name, $address) {
			$this->_mail->addAddress($address, $name);
		}

		public function subject($subject) {
			$this->_mail->Subject   = utf8_decode($subject);
		}

		public function message($HTMLMessage) {
			$this->_mail->Body      = utf8_decode($HTMLMessage);
			$this->_mail->AltBody   = strip_tags($this->_mail->Body);
		}

		public function send() {
			if(!$this->_mail->send()) {
				echo 'Message could not be sent.';
				echo 'Mailer Error: ' . $this->_mail->ErrorInfo;
			} else {
				echo 'Message has been sent';
			}
		}

	}