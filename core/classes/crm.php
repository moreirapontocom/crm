<?
error_reporting(E_ALL);
ini_set('display_errors', -1);

// UTILS
include_once('utils.php');

class crm {

	private $query;
	private $limit;
	private $field;
	private $value;













	// COUNT CUSTOMERS
	public function countCustomers() {
		$totalCustomers = $this->getCustomers(1);
		return $totalCustomers;
	}

	// GET CUSTOMERS
	public function getCustomers($count='') {
		include($_SERVER['DOCUMENT_ROOT'].'/core/settings/db.php');

		$this->query = "SELECT * FROM customers ORDER BY name ASC";
		$rs = $db->Execute($this->query);

		$totalResults = $rs->RecordCount();

		if ( $count == 0 || empty($count) ) {
			if ( $totalResults > 0 ) {
				$i=0;
				while (!$rs->EOF) {
					$id = $rs->fields['id'];
					$ni = $rs->fields['ni'];
					$source = $rs->fields['source'];
					$name = $rs->fields['name'];
					$email = $rs->fields['email'];
					$phone = $rs->fields['phone'];
					$web = $rs->fields['web'];
					$obs = $rs->fields['obs'];
                    $dateSignup = $rs->fields['dateSignup'];
                    
                    $dateSignup = substr($dateSignup, 0, 10);
					
					$result[] = array(
						'i'			=> $i,
						'id'		=> $id,
						'ni'		=> $ni,
						'source'	=> $source,
						'name'		=> $name,
						'email'		=> $email,
						'phone'		=> $phone,
						'web'		=> $web,
						'obs'		=> $obs,
						'dateSignup'=> $dateSignup
					);
					$rs->MoveNext();
					$i++;
				}
				$result = $result;
			}
			// $totalResults > 0

			return $result;
		}
		// end if count == 0
		
		else
			return $totalResults;
	}
	// end GET CUSTOMERS
	
	// GET CUSTOMER
    public function getCustomer($idCustomer='') {
        include($_SERVER['DOCUMENT_ROOT'].'/core/settings/db.php');

        $this->query = "SELECT * FROM customers WHERE id = '".$idCustomer."' LIMIT 1";
        $rs = $db->Execute($this->query);

        $totalResults = $rs->RecordCount();

        if ( $totalResults > 0 ) {
            while (!$rs->EOF) {
                $id = $rs->fields['id'];
                $ni = $rs->fields['ni'];
                $source = $rs->fields['source'];
                $name = $rs->fields['name'];
                $email = $rs->fields['email'];
                $phone = $rs->fields['phone'];
                $web = $rs->fields['web'];
                $obs = $rs->fields['obs'];
                $dateSignup = $rs->fields['dateSignup'];
                
                $dateSignup = strftime("%d/%m/%Y %H:%M:%S", strtotime( $dateSignup ));
                $dateSignup = substr($dateSignup, 0, 10);
                
                $result[] = array(
                    'id'        => $id,
                    'ni'        => $ni,
                    'source'    => $source,
                    'name'      => $name,
                    'email'     => $email,
                    'phone'     => $phone,
                    'web'       => $web,
                    'obs'       => $obs,
                    'dateSignup'=> $dateSignup
                );
                $rs->MoveNext();
            }
            $result = $result;
            
            return $result;
        } else
            return $totalResults;
    }
    // end GET CUSTOMER
    
    // UPDATE CUSTOMER
    public function updateCustomer($idCustomer='',$ni='',$name='',$email='',$phone='',$web='',$obs='') {
        include($_SERVER['DOCUMENT_ROOT'].'/core/settings/db.php');
        
        $idCustomer = trim($idCustomer);
        $idCustomer = addslashes($idCustomer);
        $idCustomer = htmlspecialchars($idCustomer);
        
        $ni = trim($ni);
        $ni = addslashes($ni);
        $ni = htmlspecialchars($ni);
        
        $name = trim($name);
        $name = addslashes($name);
        $name = htmlspecialchars($name);
        
        $email = trim($email);
        $email = addslashes($email);
        $email = htmlspecialchars($email);
        
        $phone = trim($phone);
        $phone = addslashes($phone);
        $phone = htmlspecialchars($phone);
        
        $web = trim($web);
        $web = addslashes($web);
        $web = htmlspecialchars($web);
        
        $obs = trim($obs);
        $obs = addslashes($obs);
        $obs = htmlspecialchars($obs);

        $this->query = "UPDATE customers SET ni = '".$ni."', name = '".$name."', email = '".$email."', phone = '".$phone."', web = '".$web."', obs = '".$obs."' WHERE id = '".$idCustomer."'";
        $rs = $db->Execute($this->query);

        $totalResults = $rs->RecordCount();

        if ( $totalResults > 0 ) {
            while (!$rs->EOF) {
                $id = $rs->fields['id'];
                $ni = $rs->fields['ni'];
                $source = $rs->fields['source'];
                $name = $rs->fields['name'];
                $email = $rs->fields['email'];
                $phone = $rs->fields['phone'];
                $web = $rs->fields['web'];
                $obs = $rs->fields['obs'];
                $dateSignup = $rs->fields['dateSignup'];
                
                $dateSignup = strftime("%d/%m/%Y %H:%M:%S", strtotime( $dateSignup ));
                $dateSignup = substr($dateSignup, 0, 10);
                
                $result[] = array(
                    'id'        => $id,
                    'ni'        => $ni,
                    'source'    => $source,
                    'name'      => $name,
                    'email'     => $email,
                    'phone'     => $phone,
                    'web'       => $web,
                    'obs'       => $obs,
                    'dateSignup'=> $dateSignup
                );
                $rs->MoveNext();
            }
            $result = $result;
            
            return $result;
        } else
            return $totalResults;
    }
    // end UPDATE CUSTOMER



















	// COUNT HISTORY
	public function countHistory($idCustomer='') {
		$totalHistory = $this->getHistory(1,$idCustomer);
		return $totalHistory;
	}
	
	// GET HISTORY
	public function getHistory($count='',$idCustomer='') {
		include($_SERVER['DOCUMENT_ROOT'].'/core/settings/db.php');
		
		$idCustomer = trim($idCustomer);
		$idCustomer = addslashes($idCustomer);
		$idCustomer = htmlspecialchars($idCustomer);

		$this->query = "SELECT * FROM history WHERE idCustomer = '".$idCustomer."' ORDER BY id DESC";
		$rs = $db->Execute($this->query);

		$totalResults = $rs->RecordCount();

		if ( $count == 0 || empty($count) ) {
			if ( $totalResults > 0 ) {
				$i = 0;
				while (!$rs->EOF) {
					$id = $rs->fields['id'];
					$idCustomer = $rs->fields['idCustomer'];
					$dateHistory = $rs->fields['dateHistory'];
					$content = $rs->fields['content'];
					$nextStep = $rs->fields['nextStep'];
                    $nextStepFinished = $rs->fields['nextStepFinished'];
                    $nextStepFinishedDate = $rs->fields['nextStepFinishedDate'];
                    
                    $dateHistory = strftime("%d/%m/%Y %H:%M:%S", strtotime( $dateHistory ));
					
					$result[] = array(
						'i'				      => $i,
						'id'		 	      => $id,
						'idCustomer'	      => $idCustomer,
						'dateHistory'	      => $dateHistory,
						'content'		      => $content,
						'nextStep'		      => $nextStep,
						'nextStepFinished'    => $nextStepFinished
					);
					$rs->MoveNext();
					$i++;
				}
				$result = $result;
			} else
                $result = 0;
			// $totalResults > 0

			return $result;
		}
		// end if count == 0
		
		else
			return $totalResults;
	}
	// end GET HISTORY
	
	// ADD HISTORY
	public function addHistory($idCustomer='',$content='',$nextStep='') {
		include($_SERVER['DOCUMENT_ROOT'].'/core/settings/db.php');
		
		$idCustomer = trim($idCustomer);
		$idCustomer = addslashes($idCustomer);
		$idCustomer = htmlspecialchars($idCustomer);
		
		$content = trim($content);
		$content = addslashes($content);
		$content = htmlspecialchars($content);
		
		$nextStep = trim($nextStep);
		$nextStep = addslashes($nextStep);
		$nextStep = htmlspecialchars($nextStep);

		$this->query = "INSERT INTO history (idCustomer,content,nextStep) VALUES ('".$idCustomer."','".$content."','".$nextStep."')";
		$rs = $db->Execute($this->query);

		if ( $rs )
			return true;
		else
			return false;
	}
	// end ADD HISTORY
	
	// UPDATE HISTORY NEXT STEP STATUS
    public function updateNextStepStatus($idHistory='') {
        include($_SERVER['DOCUMENT_ROOT'].'/core/settings/db.php');

        $idHistory = trim($idHistory);
        $idHistory = addslashes($idHistory);
        $idHistory = htmlspecialchars($idHistory);

        $this->query = "UPDATE history SET nextStepFinished = '1', nextStepFinishedDate = '".date("Y-m-d H:i:s")."' WHERE id = '".$idHistory."'";
        $rs = $db->Execute($this->query);

        if ( $rs )
            return true;
        else
            return false;
    }
    // end UPDATE HISTORY NEXT STEP STATUS
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    // COUNT NEXT STEPS HISTORY
    public function countNextSteps() {
        $totalNextSteps = $this->getNextSteps(1);
        return $totalNextSteps;
    }
    
    // GET NEXT STEPS HISTORY
    public function getNextSteps($count='') {
        include($_SERVER['DOCUMENT_ROOT'].'/core/settings/db.php');

        $this->query = "SELECT history.id AS history_id,history.idCustomer AS history_idCustomer,history.dateHistory AS history_dateHistory,history.content AS history_content,history.nextStep AS history_nextStep,history.nextStepFinished AS history_nextStepFinished,history.nextStepFinishedDate AS history_nextStepFinishedDate,customers.id AS customers_id,customers.ni AS customers_ni,customers.source AS customers_source,customers.name AS customers_name,customers.email AS customers_email,customers.phone AS customers_phone,customers.web AS customers_web,customers.obs AS customers_obs,customers.dateSignup AS customers_dateSignup FROM history INNER JOIN customers ON history.idCustomer = customers.id WHERE history.nextStep <> '' AND history.nextStepFinished = 0 AND history.nextStepFinishedDate = '0000-00-00 00:00:00' ORDER BY history.id ASC";
        $rs = $db->Execute($this->query);

        $totalResults = $rs->RecordCount();

        if ( $count == 0 || empty($count) ) {
            if ( $totalResults > 0 ) {
                $i = 0;
                while (!$rs->EOF) {
                    $history_id = $rs->fields['history_id'];
                    $history_idCustomer = $rs->fields['history_idCustomer'];
                    $history_dateHistory = $rs->fields['history_dateHistory'];
                    $history_content = $rs->fields['history_content'];
                    $history_nextStep = $rs->fields['history_nextStep'];
                    $history_nextStepFinished = $rs->fields['history_nextStepFinished'];
                    $history_nextStepFinishedDate = $rs->fields['history_nextStepFinishedDate'];
                    $customers_id = $rs->fields['customers_id'];
                    $customers_ni = $rs->fields['customers_ni'];
                    $customers_source = $rs->fields['customers_source'];
                    $customers_name = $rs->fields['customers_name'];
                    $customers_email = $rs->fields['customers_email'];
                    $customers_phone = $rs->fields['customers_phone'];
                    $customers_web = $rs->fields['customers_web'];
                    $customers_obs = $rs->fields['customers_obs'];
                    $customers_dateSignup = $rs->fields['customers_dateSignup'];
                    
                    $history_dateHistory = strftime("%d/%m/%Y %H:%M:%S", strtotime( $history_dateHistory ));
                    $history_dateHistory = substr($history_dateHistory, 0, 10);
    
                    $result[] = array(
                        'i'                             => $i,
                        'history_id'                    => $history_id,
                        'history_idCustomer'            => $history_idCustomer,
                        'history_dateHistory'           => $history_dateHistory,
                        'history_content'               => $history_content,
                        'history_nextStep'              => $history_nextStep,
                        'history_nextStepFinished'      => $history_nextStepFinished,
                        'history_nextStepFinishedDate'  => $history_nextStepFinishedDate,
                        'customers_id'                  => $customers_id,
                        'customers_ni'                  => $customers_ni,
                        'customers_source'              => $customers_source,
                        'customers_name'                => $customers_name,
                        'customers_email'               => $customers_email,
                        'customers_phone'               => $customers_phone,
                        'customers_web'                 => $customers_web,
                        'customers_obs'                 => $customers_obs,
                        'customers_dateSignup'          => $customers_dateSignup
                    );
                    $rs->MoveNext();
                    $i++;
                }
                $result = $result;
            } else
                $result = 0;
        } else
            $result = $totalResults; // if count

        return $result;

    }
    // end GET NEXT STEPS HISTORY














    // ADD CUSTOMER
    public function addCustomer($ni='',$source='',$name='',$email='',$phone='',$web='',$obs='') {
        include($_SERVER['DOCUMENT_ROOT'].'/core/settings/db.php');
        
        $ni = trim($ni);
        $ni = addslashes($ni);
        $ni = htmlspecialchars($ni);
        
        $source = trim($source);
        $source = addslashes($source);
        $source = htmlspecialchars($source);
        
        $name = trim($name);
        $name = addslashes($name);
        $name = htmlspecialchars($name);
        
        $email = trim($email);
        $email = addslashes($email);
        $email = htmlspecialchars($email);
        
        $phone = trim($phone);
        $phone = addslashes($phone);
        $phone = htmlspecialchars($phone);
        
        $phone = trim($phone);
        $phone = addslashes($phone);
        $phone = htmlspecialchars($phone);
        
        $obs = trim($obs);
        $obs = addslashes($obs);
        $obs = htmlspecialchars($obs);

        $this->query = "INSERT INTO customers (ni,source,name,email,phone,web,obs) VALUES ('".$ni."','".$source."','".$name."','".$email."','".$phone."','".$web."','".$obs."')";
        $rs = $db->Execute($this->query);

        if ( $rs )
            return true;
        else
            return false;
    }
    // end ADD CUSTOMER
	
	
} // end class
?>