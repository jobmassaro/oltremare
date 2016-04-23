<?php
include_once 'config.inc.php';
function secure_session_start() {
    $session_name = 'sec_session_id'; 
    $secure = SECURE;
    $httponly = true;
    if (ini_set('session.use_only_cookies', 1) === FALSE) {
        header("Location: ../error.php");
        exit();
    }
    $cookieParams = session_get_cookie_params();
    session_set_cookie_params($cookieParams["lifetime"],
    $cookieParams["path"], 
    $cookieParams["domain"], 
    $secure,
    $httponly);
    session_name($session_name);
    session_start();
    session_regenerate_id();
}

function login_with_email($email, $password, $mysqli, $prefix){
if($stmt = $mysqli->prepare("SELECT id, name, surname, password, user_level FROM ".$prefix."members WHERE email = ? LIMIT 1")) {
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($user_id, $fullname, $username, $db_password, $user_level);
        $stmt->fetch();
        if($stmt->num_rows == 1){
						//BRUTE-FORCE CHECK
            if(checkbrute($user_id, $mysqli) == true){
                //ACCOUNT IS LOCKED OUT
								$error = '2';
                return $error;
            }else{
                if(password_verify($password, $db_password)) {
									//PASSWORD VERIFIED
                  $user_browser = $_SERVER['HTTP_USER_AGENT'];
                  $user_id = preg_replace("/[^0-9]+/", "", $user_id);
                  $_SESSION['user_id'] = $user_id;
									$_SESSION['name'] = $name;
                                    $_SESSION['surname'] = $surname;
									$_SESSION['email_address'] = $email;
									$_SESSION['user_level'] = $user_level;
                  $username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username);
                  $_SESSION['username'] = $username;
									//SET BROWSER INFORMATION
									$stmtB = $mysqli->prepare("UPDATE ".$prefix."members SET browser = ? WHERE id=$user_id"); 
									$stmtB->bind_param('s', $user_browser);
									$stmtB->execute();
									$stmtB->close();
										//LOGIN COMPLETE
                    return true;
                }else{
									//INCORRECT PASSWORD SUPPLIED
                   $now = time();
                   $mysqli->query("INSERT INTO ".$prefix."login_attempts(user_id, time) VALUES ('$user_id', '$now')");
                   $error = '1';
                	 return $error;
                }
            }
        }else{
					$error = '1';
          return $error;
        }
    }
}

function login_with_username($username, $password, $mysqli, $prefix){
if($stmt = $mysqli->prepare("SELECT id, name, surname, email, password, user_level FROM ".$prefix."members WHERE username = ? LIMIT 1")) {
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($user_id, $name, $surname, $email, $db_password, $user_level);
        $stmt->fetch();
        
        if($stmt->num_rows == 1){
            //BRUTE-FORCE CHECK
            if(checkbrute($user_id, $mysqli, $prefix) == true){
                //ACCOUNT IS LOCKED OUT
								$error = '2';
                return $error;
            }else{
                if(password_verify($password, $db_password)) {
									//PASSWORD VERIFIED
                  $user_browser = $_SERVER['HTTP_USER_AGENT'];
                  $user_id = preg_replace("/[^0-9]+/", "", $user_id);
                  $_SESSION['user_id'] = $user_id;
						      		$_SESSION['name'] = $name;
                                    $_SESSION['surname'] = $surname;
									$_SESSION['email_address'] = $email;
									$_SESSION['user_level'] = $user_level;
                  $username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username);
                  $_SESSION['username'] = $username;
                    //SET BROWSER INFORMATION
					$stmtB = $mysqli->prepare("UPDATE ".$prefix."members SET browser = ? WHERE id=$user_id"); 
					$stmtB->bind_param('s', $user_browser);
					$stmtB->execute();
					$stmtB->close();
					//LOGIN COMPLETE
                    return true;
                }else{
									//INCORRECT PASSWORD SUPPLIED
                   $now = time();
                   $mysqli->query("INSERT INTO ".$prefix."login_attempts(user_id, time) VALUES ('$user_id', '$now')");
                   $error = '1';
                	 return $error;
                }
            }
        }else{
					$error = '1';
          return $error;
        }
    }
}

function checkbrute($user_id, $mysqli, $prefix) {
    $now = time();
    $attempts_timeframe = $now - (5 * 60);
    if($stmt = $mysqli->prepare("SELECT time FROM ".$prefix."login_attempts WHERE user_id = ? AND time > ' $attempts_timeframe'")) {
        $stmt->bind_param('i', $user_id);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 1) {
            return true;
        } else {
            return false;
        }
    }
}


function login_check($mysqli, $prefix) {
    if(isset($_SESSION['user_id'], $_SESSION['username'])){
				$get_settings = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT require_email_activation FROM ".$prefix."rl_settings WHERE id = 1"));
				$require_email = $get_settings['require_email_activation'];
        $user_id = $_SESSION['user_id'];
        $username = $_SESSION['username'];
        $user_browser = $_SERVER['HTTP_USER_AGENT'];
        if($stmt = $mysqli->prepare("SELECT browser, email_confirmed FROM ".$prefix."members WHERE id = ? LIMIT 1")){
            $stmt->bind_param('i', $user_id);
            $stmt->execute();
            $stmt->store_result();
            if($stmt->num_rows == 1){
							$stmt->bind_result($browser, $email_confirmed);
							$stmt->fetch();
								//EMAIL VERIFICATION REQUIRED ROUTE
								if($require_email=='1'){
									if($email_confirmed=='1'){
										if($user_browser==$browser){
											//success
											return true;
										}else{
											$error = 'login.php';
											return $error;
										}
									} else{
										$error = 'verify-email.php';
										return $error;
									}
								}else{
								//NO EMAIL VERIFICATION REQUIRED
									if($user_browser==$browser){
										return true;
									}
								}	
						}
				}
		}else{
			//NO SESSION DATA
			$error = 'login.php';
			return $error;
		}
}
  

function randomizer($length = 100) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
