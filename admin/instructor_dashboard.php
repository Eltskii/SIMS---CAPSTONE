<?php
// This file is included by home.php when an instructor is logged in
// $instructorData array is already populated with all necessary information
?>

<style>
.instructor-card {
    background: white;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    margin-bottom: 20px;
    overflow: hidden;
}

.instructor-card-header {
    background: linear-gradient(135deg, #3498db, #2980b9);
    color: white;
    padding: 15px 20px;
    font-weight: 600;
    font-size: 16px;
}

.instructor-card-header i {
    margin-right: 8px;
}

.instructor-card-body {
    padding: 20px;
}

.schedule-item {
    border-left: 4px solid #3498db;
    padding: 12px 15px;
    margin-bottom: 12px;
    background: #f8f9fa;
    border-radius: 6px;
    transition: all 0.3s ease;
}

.schedule-item:hover {
    background: #e9ecef;
    transform: translateX(5px);
}

.schedule-time {
    font-weight: 700;
    color: #2c3e50;
    font-size: 15px;
}

.schedule-details {
    color: #7f8c8d;
    font-size: 13px;
    margin-top: 4px;
}

.class-item {
    border: 1px solid #e9ecef;
    border-radius: 8px;
    padding: 15px;
    margin-bottom: 15px;
    transition: all 0.3s ease;
}

.class-item:hover {
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    border-color: #3498db;
}

.class-header {
    font-weight: 700;
    color: #2c3e50;
    font-size: 16px;
    margin-bottom: 8px;
}

.class-info {
    color: #7f8c8d;
    font-size: 14px;
    margin-bottom: 10px;
}

.class-actions {
    margin-top: 12px;
}

.pending-grade-item {
    border-left: 4px solid #f39c12;
    padding: 12px 15px;
    margin-bottom: 12px;
    background: #fff3cd;
    border-radius: 6px;
}

.grade-status {
    font-size: 13px;
    color: #856404;
}

.empty-state {
    text-align: center;
    padding: 40px 20px;
    color: #95a5a6;
}

.empty-state i {
    font-size: 48px;
    margin-bottom: 15px;
    opacity: 0.5;
}
</style>

<!-- Stats Cards -->
<div class="row admin-stats">
    <!-- Total Classes -->
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="panel panel-primary">
            <div class="panel-body">
                <div class="stat-icon"><i class="fa fa-graduation-cap"></i></div>
                <div class="stat-value"><?php echo $instructorData['total_classes'] ?? 0; ?></div>
                <p class="stat-label">My Classes</p>
            </div>
            <div class="panel-footer">
                Teaching Assignments
            </div>
        </div>
    </div>

    <!-- Total Students -->
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="panel panel-green">
            <div class="panel-body">
                <div class="stat-icon"><i class="fa fa-users"></i></div>
                <div class="stat-value"><?php echo $instructorData['total_students'] ?? 0; ?></div>
                <p class="stat-label">Total Students</p>
            </div>
            <div class="panel-footer">
                Across All Classes
            </div>
        </div>
    </div>

    <!-- Subjects Teaching -->
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="panel panel-yellow">
            <div class="panel-body">
                <div class="stat-icon"><i class="fa fa-book"></i></div>
                <div class="stat-value"><?php echo $instructorData['total_subjects'] ?? 0; ?></div>
                <p class="stat-label">Subjects</p>
            </div>
            <div class="panel-footer">
                Different Subjects
            </div>
        </div>
    </div>

    <!-- Grading Progress -->
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="panel panel-info">
            <div class="panel-body">
                <div class="stat-icon"><i class="fa fa-check-circle"></i></div>
                <div class="stat-value"><?php echo $instructorData['grade_progress'] ?? 0; ?>%</div>
                <p class="stat-label">Grading Progress</p>
            </div>
            <div class="panel-footer">
                Grades Submitted
            </div>
        </div>
    </div>
</div>

<!-- Today's Schedule -->
<div class="instructor-card">
    <div class="instructor-card-header">
        <i class="fa fa-calendar-day"></i> 📅 My Schedule Today - <?php echo date('l, F j, Y'); ?>
    </div>
    <div class="instructor-card-body">
        <?php if (!empty($instructorData['today_schedule'])): ?>
            <?php foreach ($instructorData['today_schedule'] as $class): ?>
                <div class="schedule-item">
                    <div class="schedule-time">
                        ⏰ <?php echo htmlspecialchars($class->sched_time); ?>
                    </div>
                    <div class="schedule-details">
                        <strong><?php echo htmlspecialchars($class->SUBJ_CODE); ?></strong> - <?php echo htmlspecialchars($class->SUBJ_DESCRIPTION); ?>
                        <br>
                        📚 <?php echo htmlspecialchars($class->COURSE_NAME); ?> (Level <?php echo $class->COURSE_LEVEL; ?>) - Section <?php echo htmlspecialchars($class->SECTION); ?>
                        <br>
                        🚪 Room: <?php echo htmlspecialchars($class->sched_room); ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="empty-state">
                <i class="fa fa-coffee"></i>
                <p><strong>No classes today!</strong></p>
                <p>Enjoy your day off or catch up on grading.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="row">
    <!-- My Classes -->
    <div class="col-lg-8 col-md-12">
        <div class="instructor-card">
            <div class="instructor-card-header">
                <i class="fa fa-chalkboard"></i> 🎓 My Classes
            </div>
            <div class="instructor-card-body">
                <?php if (!empty($instructorData['all_classes'])): ?>
                    <?php foreach ($instructorData['all_classes'] as $class): ?>
                        <div class="class-item">
                            <div class="class-header">
                                <?php echo htmlspecialchars($class->SUBJ_CODE); ?> - <?php echo htmlspecialchars($class->SUBJ_DESCRIPTION); ?>
                            </div>
                            <div class="class-info">
                                <span title="Course">📚 <?php echo htmlspecialchars($class->COURSE_NAME); ?><?php 
                                    if (!empty($class->COURSE_MAJOR) && $class->COURSE_MAJOR != 'None') {
                                        echo ' - ' . htmlspecialchars($class->COURSE_MAJOR);
                                    }
                                ?> (Level <?php echo $class->COURSE_LEVEL; ?>)</span>
                                <br>
                                <span title="Section">👥 Section <?php echo htmlspecialchars($class->SECTION); ?></span> • 
                                <span title="Students">🧑‍🎓 <?php echo $class->student_count; ?> students</span>
                                <br>
                                <span title="Schedule">📅 <?php echo htmlspecialchars($class->sched_day); ?></span> • 
                                <span title="Time">⏰ <?php echo htmlspecialchars($class->sched_time); ?></span> • 
                                <span title="Room">🚪 <?php echo htmlspecialchars($class->sched_room); ?></span>
                            </div>
                            <div class="class-actions">
                                <a href="<?php echo web_root; ?>admin/instructor/grade_entry.php?subj_id=<?php echo $class->SUBJ_ID; ?>&section=<?php echo urlencode($class->SECTION); ?>" class="btn btn-sm btn-success">
                                    <i class="fa fa-star"></i> Enter/View Grades
                                </a>
                                <a href="<?php echo web_root; ?>admin/instructor/grade_entry.php" class="btn btn-sm btn-info">
                                    <i class="fa fa-graduation-cap"></i> All Grades
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="empty-state">
                        <i class="fa fa-inbox"></i>
                        <p><strong>No classes assigned</strong></p>
                        <p>You don't have any classes assigned for this semester.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Pending Grades -->
    <div class="col-lg-4 col-md-12">
        <div class="instructor-card">
            <div class="instructor-card-header">
                <i class="fa fa-exclamation-triangle"></i> ⚠️ Pending Grade Submissions
            </div>
            <div class="instructor-card-body">
                <?php if (!empty($instructorData['pending_grades'])): ?>
                    <?php foreach ($instructorData['pending_grades'] as $pending): ?>
                        <a href="<?php echo web_root; ?>admin/instructor/grade_entry.php?subj_id=<?php echo $pending->SUBJ_ID; ?>&section=<?php echo urlencode($pending->SECTION); ?>" style="text-decoration:none; display:block;">
                            <div class="pending-grade-item" style="cursor:pointer; transition: all 0.2s ease;" onmouseover="this.style.backgroundColor='#ffe69c'" onmouseout="this.style.backgroundColor='#fff3cd'">
                                <div style="font-weight:600; color:#856404; margin-bottom:6px;">
                                    <?php echo htmlspecialchars($pending->SUBJ_CODE); ?>
                                </div>
                                <div class="grade-status">
                                    <?php echo htmlspecialchars($pending->COURSE_NAME); ?> - Section <?php echo htmlspecialchars($pending->SECTION); ?>
                                    <br>
                                    <strong><?php echo $pending->graded_students; ?> / <?php echo $pending->total_students; ?></strong> students graded
                                </div>
                                <div style="margin-top:8px; font-size:12px; color:#856404;">
                                    <i class="fa fa-arrow-right"></i> Click to enter grades
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="empty-state">
                        <i class="fa fa-check-circle" style="color: #27ae60;"></i>
                        <p style="color: #27ae60;"><strong>All caught up!</strong></p>
                        <p style="color: #7f8c8d;">No pending grade submissions.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="instructor-card">
            <div class="instructor-card-header">
                <i class="fa fa-bolt"></i> 🚀 Quick Actions
            </div>
            <div class="instructor-card-body">
                <a href="<?php echo web_root; ?>admin/instructor/grade_entry.php" class="btn btn-block btn-success">
                    <i class="fa fa-star"></i> Enter/Manage Grades
                </a>
            </div>
        </div>
    </div>
</div>
