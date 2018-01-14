<?php

	class queries extends DB{


		public function token(){
			return config::get('session/token');
		}


		public function insert($table,$params, $values){
			$dbconn = DB::getInstance();

			$query = 'INSERT INTO '. $table. ' ('.implode(', ', $params). ') VALUES("'. implode('", "', $values). '")'; 
			try {
			 	$final = $dbconn->pdo->prepare($query);
			 	$final->execute();
			 	echo '<script>alert("Inserted Successfully");</script>';
			 } catch (PDOException $e) {
			 	echo 'Error in Query <br>'. $e;
			 } 

		}

		public function iinnsseertt($table,$params, $values){
			$dbconn = DB::getInstance();

			$query = 'INSERT INTO '. $table. ' ('.implode(', ', $params). ') VALUES("'. implode('", "', $values). '")'; 
			try {
			 	$final = $dbconn->pdo->prepare($query);
			 	$final->execute();
			 	echo '<script>alert("Inserted Successfully");</script>';
			 	return $dbconn->pdo->lastInsertId();
			 } catch (PDOException $e) {
			 	echo 'Error in Query <br>'. $e;
			 } 

		}


		public function insertSession($session, $semester){
			$dbconn = DB::getInstance();

			$table = 'session';
			$query = 'INSERT INTO '.$table.'(id, admin_id, session, semester, created_at) VALUES (:id, :admin_id, :session, :semester, :created_at)';

			try{
				$final = $dbconn->pdo->prepare($query);
					$preparation  = array(
									 ':id' => '',
									 ':admin_id' => 1,
									 ':session' =>$session,
									 ':semester' =>$semester,
									 ':created_at' => date('y-m-d h:i:s')
						);

					$final->execute($preparation);

					 	echo '<script>alert("Current Session and Semester Added");</script>';
			}catch(PDOException $e){
				echo 'Error in Query <br>'. $e;
			}
		}

		public function insertCourse($table, $course_title, $course_code,  $level, $department, $semester, $course_status, $units){
			$dbconn = DB::getInstance();

			$query = 'INSERT INTO '.$table. '(id, course_title, course_code, level, department, semester, course_status, units) 
						VALUES (:id, :course_title, :course_code,  :level, :department, :semester, :course_status, :units)';

				try{
				 	$final = $dbconn->pdo->prepare($query);
					 	$preparation = array(':id' =>'',
					 					':course_title' => $course_title,
					 					':course_code' => $course_code,
					 					':level' => $level,
					 					':department' => $department,
					 					':semester' => $semester,
					 					':course_status' => $course_status,
					 					':units' => $units
					 		);

					 	$final->execute($preparation);

					 	echo '<script>alert("Course added Successfully");</script>';

					 }catch(PDOException $e){
				 	echo 'Error in Query <br>'. $e;
				 }
		}

		public function Select($smt,$table,$param1,$value1,$condition,$param2,$value2){
				 $dbconn = DB::getInstance();

				 if(empty($condition)){
				 	 $query = 'SELECT '.$smt.'  FROM '.$table.' WHERE '. $param1.'  = :value1';
					 try{
					 	$final = $dbconn->pdo->prepare($query);
					 	$preparation = array(':value1' => $value1);
					 	$final->execute($preparation);

					 	while ($results = $final->fetch(PDO::FETCH_ASSOC)) {
					 		# code...
					 		return $results;
					 	}

					 }catch(PDOException $e){
				 	echo 'Error in Query <br>'. $e;
				 }
				}
				 elseif(!empty($condition)){
				 	$query = 'SELECT '.$smt.'  FROM '.$table.' WHERE '. $param1.'  = :value1 '.	$condition.' '.$param2. ' = :value2 ';
				 try{
				 	$final = $dbconn->pdo->prepare($query);
					 	$preparation = array(':value1' => $value1,
					 					':value2' => $value2
					 		);

					 	$final->execute($preparation);

					 	$results = $final->fetch();
						 return $results;

					 }catch(PDOException $e){
				 	echo 'Error in Query <br>'. $e;
				 }
				 
				
			} 
				
		}

		public function selectMore($smt,$table,$param1,$value1,$condition,$param2,$value2,$condition2,$param3,$value3){
				 $dbconn = DB::getInstance();

				 	$query = 'SELECT '.$smt.'  FROM '.$table.' WHERE '. $param1.'  = :value1 '.	$condition.' '.$param2. ' = :value2 '.	$condition2.' '.$param3. ' = :value3 ';
				 try{
				 	$final = $dbconn->pdo->prepare($query);
					 	$preparation = array(':value1' => $value1,
					 					':value2' => $value2,
					 					':value3' => $value3
					 		);

					 	$final->execute($preparation);

						 return $final;

					 }catch(PDOException $e){
				 	echo 'Error in Query <br>'. $e;
				 }
				
		}

		public function selectall ($smt, $table){
			 $dbconn = DB::getInstance();

				 	 $query = 'SELECT ' . $smt .' FROM '.$table;
					 try{
					 	$final = $dbconn->pdo->prepare($query);
					 	$final->execute();

					 	
					 		return $final;
					 	

					 }catch(PDOException $e){
				 	echo 'Error in Query <br>'. $e;
				 }

		}


	public function Update($table, $id, $values, $pagename){
      $dbconn = DB::getInstance();

      foreach ($values as $key => $value) {
      	if (!empty($value)) {

      		$query = 'UPDATE '. $table.' SET '.$key.' = "'.$value.'", updated_at = :updated_at WHERE id = :id';

	        try{
	          $final = $dbconn->pdo->prepare($query);

	            $preparation = array(
	                ':updated_at' =>  date('y-m-d h:i:s'),
	                ':id' =>  $id
	              );

	            $final->execute($preparation);

	            echo '<script>
			              alert("Correct Details Updated Successfully");
					 	  window.location = "'.$pagename.'" ;
		              </script>';

	           }catch(PDOException $e){
	          echo 'Error in Query <br>'. $e;
	         }
      	}
        
      }

    }
    public function UpdateProfile($table, $id, $nUsername,$newPasswordC, $nTelephone,$nEmail,$imageName,$pagename){
			$dbconn = DB::getInstance();

			if(empty($nUsername)){
				$username_query = '';
			}else{
				$username_query = 'username = "'. $nUsername. '", ';
			}

			if(empty($newPasswordC)){
				$password_query = '';
			}else{
				$password_query = 'password = "'. $newPasswordC. '", ';
			}

			if(empty($nTelephone)){
				$telephone_query = '';
			}else{
				$telephone_query = 'telephone = "'. $nTelephone. '", ';
			}

			if(empty($nEmail)){
				$email_query = '';
			}else{
				$email_query = 'email = "'. $nEmail. '", ';
			}

			if(empty($imageName)){
				$image_query = '';
			}else{
				$image_query = 'image_name = "'. $imageName.'", ';
			}


			if (empty($username_query) && empty($password_query) && empty($telephone_query) && empty($email_query) && empty($image_query)){
				echo '<script>alert("Nothing Was Updated")</script>';
			}else{
				$query = 'UPDATE '. $table.' SET '. $username_query. $password_query. $telephone_query. $email_query. $image_query. 'updated_at = :updated_at WHERE id = :id';

				try{
				 	$final = $dbconn->pdo->prepare($query);

				 		$preparation = array(
				 				':updated_at' =>  date('y-m-d h:i:s'),
				 				':id' => $id
				 			);

					 	$final->execute($preparation);

					 	echo '<script>

					 		alert("Correct Details Updated Successfully");
					 	  	window.location = "'.$pagename.'" ;

					 		</script>';

					 }catch(PDOException $e){
				 	echo 'Error in Query <br>'. $e;
				 }
			}
		}



		public function selectt($smt,$table,$param1,$value1,$condition,$param2,$value2){
				 $dbconn = DB::getInstance();

				 if(empty($condition)){
				 	 $query = 'SELECT '.$smt.'  FROM '.$table.' WHERE '. $param1.'  = :value1';
					 try{
					 	$final = $dbconn->pdo->prepare($query);
					 	$preparation = array(':value1' => $value1);
					 	$final->execute($preparation);

					 	return $final;

					 }catch(PDOException $e){
				 	echo 'Error in Query <br>'. $e;
				 }
				}
				 elseif(!empty($condition)){
				 	$query = 'SELECT '.$smt.'  FROM '.$table.' WHERE '. $param1.'  = :value1 '.	$condition.' '.$param2. ' = :value2 ';
				 try{
				 	$final = $dbconn->pdo->prepare($query);
					 	$preparation = array(':value1' => $value1,
					 					':value2' => $value2
					 		);

					 	$final->execute($preparation);

						 return $final;

					 }catch(PDOException $e){
				 	echo 'Error in Query <br>'. $e;
				 }
				 
				
			} 
				
		}

		public function registerCourses($table, $admin_id, $studentId, $courses){
			$dbconn = DB::getInstance();


			if($count = count($courses)){
				$i = 1;
				$a = 13 - $count;
				while ($i <= $a) {
					
					$extraColumn[$i] = '""';
					$i++;
				}
				
				$values = '';
				$x = 1;
				

				/*session and semester*/
				$result = self::selectall('*', 'session');
				$results = $result->fetchall(PDO::FETCH_ASSOC);
					 $last = array_pop($results);
					 $session = $last['session'];
					 $semester = $last['semester'];
				/*end of session and semester*/
				
				  $query = 'INSERT INTO '.$table. ' (id, admin_id, student_id, session, semester, course1, course2, course3, course4, course5, course6, course7, course8, course9, course10, course11, course12, course13) VALUES (:id, :admin_id, :studentId, :session,  :semester, "'
					.implode('", "', $courses).'", '
					.implode(', ', $extraColumn).')';

					

				try{
				 	$final = $dbconn->pdo->prepare($query);
					 	$preparation = array(':id' =>'',
					 					':admin_id' => $admin_id,
					 					':studentId' => $studentId,
					 					':session' => $session,
					 					':semester' => $semester
					 		);

					 	$final->execute($preparation);

					 	echo '<script>alert("Successful !!!");</script>';

					 }catch(PDOException $e){
				 	echo 'Error in Query <br>'. $e;
				 }			

			}

		}

		public function registerCoursesAdvanced($table, $admin_id, $session, $semester, $studentId, $courses, $status){
			$dbconn = DB::getInstance();


			if($count = count($courses)){
				$i = 1;
				$a = 13 - $count;
				while ($i <= $a) {
					
					$extraColumn[$i] = '""';
					$i++;
				}
				
				$values = '';
				$x = 1;
				
				
				  $query = 'INSERT INTO '.$table. ' (id, admin_id, student_id, session, semester, course1, course2, course3, course4, course5, course6, course7, course8, course9, course10, course11, course12, course13, status) VALUES (:id, :admin_id, :studentId, :session,  :semester, "'
					.implode('", "', $courses).'", '
					.implode(', ', $extraColumn).',
					:status)';

					

				try{
				 	$final = $dbconn->pdo->prepare($query);
					 	$preparation = array(':id' =>'',
					 					':admin_id' => $admin_id,
					 					':studentId' => $studentId,
					 					':session' => $session,
					 					':semester' => $semester,
					 					':status' => $status,
					 		);

					 	$final->execute($preparation);

					 	echo '<script>alert("Successful !!!");</script>';

					 }catch(PDOException $e){
				 	echo 'Error in Query <br>'. $e;
				 }			

			}

		}

		public function CGPA($result, $courses){

			$units = array();
			$passedUnits = array();
			$gradePoints = array();
			$grades = array(); 
			$i = 0;
			foreach ($result as $key => $value) {
				  if ($value < 40) {
				  	$grade = "F";
				  	$points = 0;
				  }elseif ($value > 39 &&  $value < 50) {
				  	$grade = "D";
				  	$points = 2;
				  }elseif ($value > 49 &&  $value < 60) {
				  	$grade = "C";
				  	$points = 3;
				  }elseif ($value > 59 &&  $value < 70) {
				  	$grade = "B";
				  	$points = 4;
				  }elseif ($value > 69) {
				  	$grade = "A";
				  	$points = 5;
				  }
				  /*to get the units*/

				  $unit = self::Select('units', 'courses', 'course_code', $courses[$i],'','','');
				 $unit = $unit['units'];
				$units[] = $unit;

				  /*the array for the grade*/
				  $gradePoint = $points * $unit;

				  if($points !== 0){
				  	$passedUnits[] = $unit;
				  }

				 /*to add values to an array **array_push** */
				  array_push($gradePoints, $gradePoint);
				 /*or you use this second one too*/
				  $grades[] = $grade;

				   $i++;
			 
			}

			/*TO sum the values in the array */
			$totalGradePoints = array_sum($gradePoints);
			$totalUnits = array_sum($units);
			$totalPassedUnits = array_sum($passedUnits);
			$GPA = $totalGradePoints / $totalUnits;

			$arrayOfInfo = array(
					'units' => $units,
					'total units' => $totalUnits,
					'total passed units' => $totalPassedUnits,
					'grades' => $grades,
					'total grade points' => $totalGradePoints,
					'gpa' => $GPA,
				);

			return $arrayOfInfo;

		}

		public function sendMessage($senderName, $phoneNumbers, $message){
			$apikey = '0d41bfb198b62fccc06da7e679ec9acd786c3a93';
			$url = "http://api.ebulksms.com:8080/sendsms.json";
			$username = 'ojumahfavour24@gmail.com';
			$flash = 0 ; 
			$message = stripslashes($message);
			$phoneArray = explode(',', $phoneNumbers);
			foreach ($phoneArray as $key => $value) {
				$mobileNumber = trim($value);
				if (substr($mobileNumber, 0,1) == '0') {
					$mobileNumber = '234'. substr($mobileNumber, 1);
				}elseif (substr($mobileNumber, 0,1) == '+') {
					$mobileNumber = substr($mobileNumber, 1);
				}
				$generatedId = uniqid('int_', false);
				$generatedId = substr($generatedId, 0, 30);
				$recipent['gsm'][] = array('msidn' => $mobileNumber, 'msgid' => $generatedId);
			}
			$message = array(
			'sender' => $senderName,
			'messagetext' => $message,
			'flash' => "{$flash}",
			);
			$request = array('SMS' => array(
				'auth' => array(
				'username' => $username,
				'apikey' => $apikey
				),
				'message' => $message,
				'recipients' => $recipent
				)
			);
			$json_data = json_encode($request);
			if ($json_data) {
				$response = self::doPostRequest($url, $json_data, array('Content-Type: application/json'));
				$result = json_decode($response);
				return $result->response->status;
			} else {
				return false;
			}
		}

		public function doPostRequest($url, $data, $headers = array()) {
			$php_errormsg = '';
			if (is_array($data)) {
				echo $data = http_build_query($data, '', '&');
			}
			$params = array('http' => array(
							'method' => 'POST',
							'content' => $data)
			);
			if ($headers !== null) {
				$params['http']['header'] = $headers;
			}
			$ctx = stream_context_create($params);
			$fp = fopen($url, 'rb', false, $ctx);
			if (!$fp) {
				return "Error: gateway is inaccessible";
			}
			//stream_set_timeout($fp, 0, 250);
			try {
				$response = stream_get_contents($fp);
				if ($response === false) {
					throw new Exception("Problem reading data from $url, $php_errormsg");
				}
				return $response;
			} catch (Exception $e) {
				$response = $e->getMessage();
				return $response;
			}
		}


	}
	