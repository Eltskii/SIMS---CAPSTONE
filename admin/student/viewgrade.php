<?php  
     if (!isset($_SESSION['ACCOUNT_ID'])){
      redirect(web_root."admin/index.php");
     }


// Ensure the user has appropriate role to access this page
if (!in_array($_SESSION['ACCOUNT_TYPE'], ['Registrar', 'Administrator'], true)) {
    message("You do not have permission to access this page.", "error");
    redirect("index.php");
}

// Validate and sanitize student ID
$IDNO = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($IDNO <= 0) {
    message("Invalid student ID.", "error");
    redirect("index.php");
}

$student = New Student();
$res = $student->single_student($IDNO);

if (!$res) {
    message("Student not found.", "error");
    redirect("index.php");
}
  
?>

<style>
.student-header-card {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 12px;
    padding: 30px;
    color: white;
    margin-bottom: 25px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.student-name {
    font-size: 28px;
    font-weight: 700;
    margin: 0 0 10px 0;
    display: flex;
    align-items: center;
    gap: 12px;
}

.student-name i {
    font-size: 32px;
    opacity: 0.9;
}

.info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 15px;
    margin-top: 20px;
}

.info-item {
    background: rgba(255, 255, 255, 0.15);
    padding: 15px;
    border-radius: 8px;
    backdrop-filter: blur(10px);
}

.info-label {
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 1px;
    opacity: 0.9;
    margin-bottom: 5px;
    display: flex;
    align-items: center;
    gap: 6px;
}

.info-value {
    font-size: 16px;
    font-weight: 600;
}

.grades-section {
    background: white;
    border-radius: 12px;
    padding: 25px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
}

.section-title {
    font-size: 22px;
    font-weight: 600;
    color: #2d3748;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 10px;
    padding-bottom: 15px;
    border-bottom: 3px solid #667eea;
}

.section-title i {
    color: #667eea;
    font-size: 24px;
}

#grades-table thead th {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 11px;
    letter-spacing: 0.5px;
    padding: 14px 10px;
    border: none;
    white-space: nowrap;
}

#grades-table tbody td {
    vertical-align: middle;
    padding: 12px 10px;
    font-size: 13px;
}

#grades-table tbody tr:hover {
    background-color: #f7fafc;
    transition: background-color 0.2s ease;
}

.grade-value {
    font-weight: 600;
    color: #2d3748;
}

.grade-empty {
    color: #a0aec0;
    font-style: italic;
}

.btn-add-grade {
    background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
    color: white;
    border: none;
    padding: 8px 16px;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 600;
    transition: all 0.3s ease;
    box-shadow: 0 2px 6px rgba(72, 187, 120, 0.3);
}

.btn-add-grade:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(72, 187, 120, 0.4);
    color: white;
    text-decoration: none;
}

.btn-edit-grade {
    background: linear-gradient(135deg, #4299e1 0%, #3182ce 100%);
    color: white;
    border: none;
    padding: 8px 16px;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 600;
    transition: all 0.3s ease;
    box-shadow: 0 2px 6px rgba(66, 153, 225, 0.3);
}

.btn-edit-grade:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(66, 153, 225, 0.4);
    color: white;
    text-decoration: none;
}

.dataTables_wrapper .dataTables_filter input {
    border: 2px solid #e2e8f0;
    border-radius: 6px;
    padding: 6px 12px;
    margin-left: 8px;
}

.dataTables_wrapper .dataTables_filter input:focus {
    border-color: #667eea;
    outline: none;
}

.dataTables_wrapper .dataTables_length select {
    border: 2px solid #e2e8f0;
    border-radius: 6px;
    padding: 6px 12px;
    margin: 0 8px;
}

@media (max-width: 768px) {
    .student-name {
        font-size: 20px;
    }
    
    .info-grid {
        grid-template-columns: 1fr;
    }
    
    .section-title {
        font-size: 18px;
    }
}
</style>

<div class="row">
 <div class="col-lg-12">
    <div class="student-header-card">
        <div class="student-name">
            <i class="fa fa-user-circle"></i>
            <?php echo htmlspecialchars($res->LNAME . ', ' . $res->FNAME . ' ' . $res->MNAME); ?>
        </div>

        <?php 
        $sql = "SELECT sy.*, c.COURSE_NAME, c.COURSE_LEVEL, d.DEPARTMENT_NAME, d.DEPARTMENT_DESC 
                FROM `schoolyr` sy
                JOIN `course` c ON sy.`COURSE_ID` = c.`COURSE_ID`
                JOIN `department` d ON c.`DEPT_ID` = d.`DEPT_ID`
                WHERE sy.`IDNO` = " . intval($IDNO) . " LIMIT 1";
        $mydb->setQuery($sql);
        $cur = $mydb->loadSingleResult();
        
        if (!$cur) {
            // Fallback: get course/dept from student record directly
            if (!empty($res->COURSE_ID)) {
                $sql = "SELECT c.COURSE_NAME, c.COURSE_LEVEL, d.DEPARTMENT_NAME, d.DEPARTMENT_DESC
                        FROM `course` c
                        LEFT JOIN `department` d ON c.`DEPT_ID` = d.`DEPT_ID`
                        WHERE c.`COURSE_ID` = " . intval($res->COURSE_ID);
                $mydb->setQuery($sql);
                $cur = $mydb->loadSingleResult();
            }
        }
        ?>
        
        <div class="info-grid">
            <div class="info-item">
                <div class="info-label">
                    <i class="fa fa-id-card"></i>
                    Student ID
                </div>
                <div class="info-value"><?php echo htmlspecialchars($res->IDNO ?? 'N/A'); ?></div>
            </div>
            
            <div class="info-item">
                <div class="info-label">
                    <i class="fa fa-graduation-cap"></i>
                    Course / Year
                </div>
                <div class="info-value">
                    <?php 
                    if ($cur && isset($cur->COURSE_NAME)) {
                        echo htmlspecialchars($cur->COURSE_NAME . ' - ' . ($res->YEARLEVEL ?? 'N/A'));
                    } else {
                        echo 'Not assigned';
                    }
                    ?>
                </div>
            </div>
            
            <div class="info-item">
                <div class="info-label">
                    <i class="fa fa-building"></i>
                    Department
                </div>
                <div class="info-value">
                    <?php 
                    if ($cur && isset($cur->DEPARTMENT_NAME)) {
                        echo htmlspecialchars($cur->DEPARTMENT_NAME);
                    } else {
                        echo 'Not assigned';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="grades-section">
            <h3 class="section-title">
                <i class="fa fa-list-alt"></i>
                Student Subjects & Grades
            </h3>
            
            <div class="table-responsive">
				<table id="grades-table" class="table table-striped table-bordered table-hover table-responsive" style="font-size:12px" cellspacing="0">
				
				  <thead>
				  	<tr>
				  		<th>ID</th>
				  		<th>
				  		 <!-- <input type="checkbox" name="chkall" id="chkall" onclick="return checkall('selector[]');">  -->
				  		
				  		 Subject</th>
				  		<th>Description</th> 
				  		<th>Unit</th>
				  		<th>First</th>
				  		<th>Second</th>
				  		<th>Third</th> 
				  		<th>Fourth</th>
				  		<th>Average</th>
				  		<th>Remarks</th>
				  		<th>Semester</th>


				  		<th width="10%" >Action</th>
				 
				  	</tr>	
				  </thead> 
				  <tbody>
			  	<?php  
				  	// Show ALL enrolled subjects with LEFT JOIN to grades
				  	// This ensures subjects appear even if no grade record exists yet
						$sql = "SELECT 
                            ss.IDNO,
                            ss.SUBJ_ID,
                            s.SUBJ_CODE,
                            s.SUBJ_DESCRIPTION,
                            s.UNIT,
                            s.SEMESTER,
                            g.GRADE_ID,
                            g.FIRST,
                            g.SECOND,
                            g.THIRD,
                            g.FOURTH,
                            g.AVE,
                            g.REMARKS
                        FROM studentsubjects ss
                        JOIN subject s ON ss.SUBJ_ID = s.SUBJ_ID
                        LEFT JOIN grades g ON g.SUBJ_ID = ss.SUBJ_ID AND g.IDNO = ss.IDNO
                        WHERE ss.IDNO = " . intval($IDNO) . "
                        ORDER BY s.SUBJ_CODE";
				  		$mydb->setQuery($sql);
				  		$cur = $mydb->loadResultList();

						if (empty($cur)) {
                            echo '<tr><td colspan="12" class="text-center"><em>No subjects enrolled for this student.</em></td></tr>';
                        } else {
                            foreach ($cur as $result) {
                                echo '<tr>';
                                echo '<td>' . htmlspecialchars($result->SUBJ_ID) . '</td>';
                                echo '<td>' . htmlspecialchars($result->SUBJ_CODE) . '</td>';
                                echo '<td>' . htmlspecialchars($result->SUBJ_DESCRIPTION) . '</td>';
                                echo '<td>' . htmlspecialchars($result->UNIT) . '</td>';
                                
                                // Display grades or empty if not yet entered
                                $hasGrades = $result->FIRST !== null;
                                $gradeClass = $hasGrades ? 'grade-value' : 'grade-empty';
                                
                                echo '<td class="' . $gradeClass . '">' . ($result->FIRST !== null ? htmlspecialchars($result->FIRST) : '-') . '</td>';
                                echo '<td class="' . $gradeClass . '">' . ($result->SECOND !== null ? htmlspecialchars($result->SECOND) : '-') . '</td>';
                                echo '<td class="' . $gradeClass . '">' . ($result->THIRD !== null ? htmlspecialchars($result->THIRD) : '-') . '</td>';
                                echo '<td class="' . $gradeClass . '">' . ($result->FOURTH !== null ? htmlspecialchars($result->FOURTH) : '-') . '</td>';
                                echo '<td class="' . $gradeClass . '">' . ($result->AVE !== null ? htmlspecialchars($result->AVE) : '-') . '</td>';
                                
                                // Remarks with color coding
                                $remarksClass = '';
                                if ($result->REMARKS !== null) {
                                    $remarksClass = (stripos($result->REMARKS, 'pass') !== false) ? 'text-success' : 'text-danger';
                                }
                                echo '<td class="' . $remarksClass . ' ' . $gradeClass . '">' . ($result->REMARKS !== null ? '<strong>' . htmlspecialchars($result->REMARKS) . '</strong>' : '-') . '</td>';
                                echo '<td>' . htmlspecialchars($result->SEMESTER ?? '') . '</td>';
                                
                                // Action link: pass gid only if grade record exists, otherwise pass 0
                                $gid = $result->GRADE_ID !== null ? intval($result->GRADE_ID) : 0;
                                $btnClass = $gid > 0 ? 'btn-edit-grade' : 'btn-add-grade';
                                $btnIcon = $gid > 0 ? 'edit' : 'plus';
                                $btnText = $gid > 0 ? 'Edit' : 'Add';
                                
                                echo '<td align="center">';
                                echo '<a title="' . $btnText . ' Grades" ';
                                echo 'href="addmodalgrades.php?id=' . intval($result->SUBJ_ID) . '&IDNO=' . intval($result->IDNO) . '&gid=' . $gid . '" ';
                                echo 'data-toggle="lightbox" class="' . $btnClass . '">';
                                echo '<i class="fa fa-' . $btnIcon . '"></i> ';
                                echo $btnText;
                                echo '</a>';
                                echo '</td>';
                                echo '</tr>';
                            }
                        }
				  	?>
				  </tbody>
				</table>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
// Initialize DataTables for grades table
$(document).ready(function() {
    $('#grades-table').DataTable({
        responsive: false,
        "sort": true,
        "order": [[1, 'asc']], // Sort by subject code
        "pageLength": 25,
        "columnDefs": [
            { "orderable": false, "targets": 11 } // Disable sorting on Action column
        ]
    });
});
</script>
