<?
//session_start();

class sendEmail {
    private $var_from_name;
	private $var_from_email;
	private $var_to_name;
	private $var_to_email;
	private $var_subject;
	private $var_body;
	private $var_alt_body;
	private $var_cc_name;
	private $var_cc_email;
	private $var_bcc_name;
	private $var_bcc_email;
	private $var_attach;
    
	public function from($v_from_name,$v_from_email) {
		$this->var_from_name = $v_from_name;
		$this->var_from_email = $v_from_email;
	}
    
	public function to($v_to_name,$v_to_email) {
		$this->var_to_name[] = $v_to_name;
		$this->var_to_email[] = $v_to_email;
	}
    
	public function subject($v_subject) {
		$this->var_subject = $v_subject;
	}
    
	public function body($v_body) {
		$this->var_body = $v_body;
	}
    
	public function alt_body($v_alt_body) {
		$this->var_alt_body = $v_alt_body;
	}
	
    public function cc($v_cc_name,$v_cc_email) {
		$this->var_cc_name[] = $v_cc_name;
		$this->var_cc_email[] = $v_cc_email;
	}
	
    public function bcc($v_bcc_name,$v_bcc_email) {
		$this->var_bcc_name[] = $v_bcc_name;
		$this->var_bcc_email[] = $v_bcc_email;
	}
	
    public function attach($v_attach) {
		$this->var_attach = $v_attach;
	}
	
    public function go() {

		$body_content = '
			<table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin:10px;color:#333333;font-family:Arial, Tahoma;padding: 10px;">
				<tr>
					<td>
						'.$this->var_body.'
						<br /><br />
						Equipe <b><span style="color: #DD4814;">eu</span><span style="color: #141313;">conto</span></b>.<br />
						<a href="http://euconto.com">http://euconto.com/</a>
					</td>
				</tr>
			</table>
		';
        
		require_once($_SERVER['DOCUMENT_ROOT'].'/core/library/phpmailer/class.phpmailer.php');
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPAuth = true;
//		$mail->SMTPSecure = 'ssl'; // On-line
//		$mail->Port       = 465; // On-line
		$mail->Port = 25; // Off-line
		$mail->Host = 'mail.euconto.com';
		$mail->Username = 'euconto@euconto.com';
		$mail->Password = 'euconto123@';
		$mail->IsHTML(true);
		$mail->From = $this->var_from_email;
		$mail->FromName = $this->var_from_name;

		//Loop for recipients
		$totalTo = count($this->var_to_name);
        for ($i_to = 0; $i_to < $totalTo; $i_to++) {
			$mail->AddAddress($this->var_to_email[$i_to],$this->var_to_name[$i_to]);
		}

		//Loop for copied recipients
		$totalCc = count($this->var_cc_name);
        for ($i_cc = 0; $i_cc < $totalCc; $i_cc++) {
			$mail->AddCC($this->var_cc_email[$i_cc],$this->var_cc_name[$i_cc]);
		}

		//Loop for hidden recipients
		$totalBcc = count($this->var_bcc_name);
        for ($i_bcc = 0; $i_bcc < $totalBcc; $i_bcc++) {
			$mail->AddBCC($this->var_bcc_email[$i_bcc],$this->var_bcc_name[$i_bcc]);
		}
        
		$mail->AddReplyTo($this->var_from_email,$this->var_from_name);
		$mail->Subject = $this->var_subject;
		$mail->AltBody = $this->alt_body;
		$mail->MsgHTML($body_content);

		if (isset($this->var_attach)) {
			$mail->AddAttachment($this->var_attach);
		}
		
		$mail->Send();
	}
}
?>
