<?php  
     if (!isset($_SESSION['IDNO'])){
      redirect(web_root."index.php");
     }
 
  $student = New Student();
  $res = $student->single_student($_SESSION['IDNO']);
  
?>

<style>
	.form-inline .form-control{
		margin-right: 10px;
	}
	
	.grade-passed {
		background-color: #d4edda !important;
		color: #155724;
		font-weight: 600;
	}
	
	.grade-failed {
		background-color: #f8d7da !important;
		color: #721c24;
		font-weight: 600;
	}
	
	.grade-inc {
		background-color: #fff3cd !important;
		color: #856404;
		font-weight: 600;
	}
	
	.grade-badge {
		display: inline-block;
		padding: 5px 12px;
		border-radius: 6px;
		font-weight: 700;
		font-size: 14px;
	}
	
	.remarks-badge {
		display: inline-block;
		padding: 4px 10px;
		border-radius: 12px;
		font-size: 11px;
		font-weight: 600;
		text-transform: uppercase;
		letter-spacing: 0.5px;
	}
	
	.remarks-passed {
		background-color: #28a745;
		color: white;
	}
	
	.remarks-failed {
		background-color: #dc3545;
		color: white;
	}
	
	.remarks-inc {
		background-color: #ffc107;
		color: #212529;
	}
	
	#example tbody tr {
		transition: all 0.2s ease;
	}
	
	#example tbody tr:hover {
		transform: translateX(4px);
		box-shadow: 0 2px 8px rgba(0,0,0,0.08);
	}
</style>
 
<div class="row">
      <div class="col-lg-12"> 
            <div class="section-header">
              <h3><i class="fa fa-star"></i>Academic Performance</h3>
            </div>
       		</div>
        	<!-- /.col-lg-12 -->
   		 	    <form action="controller.php?action=delete" Method="POST">
			      <div class="table-responsive">			
				<table id="example" class="table table-striped table-bordered table-hover" style="font-size:14px" cellspacing="0">
				
				  <thead>
				  	<tr>
				  		 <th>Subject</th>
				  		<th>Description</th> 
				  		<th>Units</th> 
				  		<th>Grade</th>
				  		<th>Remarks</th>
				  		<th>Year & Sem</th> 
				  	</tr>	
				  </thead>
				  <tbody>
				  	<?php  
				  	// Updated to use LEFT JOIN with grades table to show all subjects even without grades
				  	// Query now uses the 'grades' table (FIRST/SECOND/THIRD/FOURTH) instead of 'tblgrades'

						$studentId = intval($_SESSION['IDNO']);
						$sql = "
						SELECT 
						  s.SUBJ_CODE,
						  s.SUBJ_DESCRIPTION,
						  s.UNIT,
						  MAX(g.AVE) as AVE,
						  MAX(g.REMARKS) as REMARKS,
						  MAX(g.FIRST) as FIRST,
						  MAX(g.SECOND) as SECOND,
						  MAX(g.THIRD) as THIRD,
						  MAX(g.FOURTH) as FOURTH,
						  ss.LEVEL,
						  ss.SEMESTER
						FROM studentsubjects ss
						JOIN subject s ON ss.SUBJ_ID = s.SUBJ_ID
						LEFT JOIN grades g ON g.SUBJ_ID = ss.SUBJ_ID AND g.IDNO = ss.IDNO AND (g.REMARKS IS NULL OR g.REMARKS != 'Drop')
						WHERE ss.IDNO = {$studentId}
						GROUP BY s.SUBJ_CODE, s.SUBJ_DESCRIPTION, s.UNIT, ss.LEVEL, ss.SEMESTER
						ORDER BY s.SUBJ_CODE
						";
				  		$mydb->setQuery($sql);

				  		$cur = $mydb->loadResultList();

						if (empty($cur)) {
							echo '<tr><td colspan="6" style="border:none; padding: 0;">';
							echo '<div class="empty-state">';
							echo '<i class="fa fa-inbox"></i>';
							echo '<h4>No Grades Available Yet</h4>';
							echo '<p>Your grades will appear here once they are entered by the registrar.</p>';
							echo '</div></td></tr>';
						}

						foreach ($cur as $result) {
							switch ($result->LEVEL) {
								case 1:
									$Level ='1st Year';
									break;
								case 2:
									$Level ='2nd Year';
									break;
								case 3:
									$Level ='3rd Year';
									break;
								case 4:
									$Level ='4th Year';
									break;
								default:
									$Level ='1st Year';
	
									break;
							}
							
							// Determine grade class and remarks styling
							$gradeClass = '';
							$remarksClass = '';
							$remarksText = '';
							$gradeDisplay = '';
							
							// Check if grade exists
							if (!empty($result->AVE) && !empty($result->REMARKS)) {
								$remarksText = htmlspecialchars($result->REMARKS);
								$gradeDisplay = htmlentities($result->AVE);
								
								if (stripos($result->REMARKS, 'pass') !== false) {
									$gradeClass = 'grade-passed';
									$remarksClass = 'remarks-passed';
								} elseif (stripos($result->REMARKS, 'fail') !== false) {
									$gradeClass = 'grade-failed';
									$remarksClass = 'remarks-failed';
								} elseif (stripos($result->REMARKS, 'inc') !== false || stripos($result->REMARKS, 'conditional') !== false) {
									$gradeClass = 'grade-inc';
									$remarksClass = 'remarks-inc';
								}
							} else {
								// No grade entered yet
								$gradeDisplay = '<span style="color: #a0aec0; font-style: italic;">Not graded</span>';
								$remarksText = '<span style="color: #a0aec0; font-style: italic;">Pending</span>';
							}

				  		echo '<tr class="' . $gradeClass . '">';
				  		echo '<td><strong>'. htmlentities($result->SUBJ_CODE).'</strong></td>';
				  		echo '<td>'. htmlentities($result->SUBJ_DESCRIPTION).'</td>';
				  		echo '<td class="text-center">' . htmlentities($result->UNIT).'</td>'; 
				  		echo '<td class="text-center">' . $gradeDisplay . '</td>'; 
				  		echo '<td class="text-center">' . ($remarksClass ? '<span class="remarks-badge ' . $remarksClass . '">' . $remarksText . '</span>' : $remarksText) . '</td>'; 
				  		
				  		// Display semester info if available
				  		$semesterInfo = '';
				  		if (isset($result->LEVEL) && isset($result->SEMESTER)) {
				  			$semesterInfo = $Level . ' - Sem ' . htmlentities($result->SEMESTER);
				  		} elseif (isset($result->SEMESTER)) {
				  			$semesterInfo = 'Sem ' . htmlentities($result->SEMESTER);
				  		} else {
				  			$semesterInfo = '<span style="color: #a0aec0;">Current</span>';
				  		}
				  		echo '<td class="text-center"><small>'. $semesterInfo .'</small></td>';
				  		echo '</tr>';
				  	}
				  	?>
				  </tbody>
					
				</table>
 
				<!-- <div class="btn-group">
				  <a href="index.php?view=add" class="btn btn-default">New</a>
				  <button type="submit" class="btn btn-default" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button>
				</div>
 -->
			</div>
				</form>
	

</div> <!---End of container-->