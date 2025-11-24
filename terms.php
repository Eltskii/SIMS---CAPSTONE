<?php
require_once("include/initialize.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms and Conditions - BSU Bokod SIMS</title>
    <link href="<?php echo web_root; ?>css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f5f5f5;
            padding: 20px;
        }
        .container {
            max-width: 900px;
            background: white;
            padding: 40px;
            margin: 20px auto;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #0056b3;
            border-bottom: 3px solid #0056b3;
            padding-bottom: 10px;
            margin-bottom: 30px;
        }
        h2 {
            color: #0056b3;
            margin-top: 30px;
            margin-bottom: 15px;
            font-size: 1.5em;
        }
        h3 {
            color: #495057;
            margin-top: 20px;
            margin-bottom: 10px;
            font-size: 1.2em;
        }
        .section {
            margin-bottom: 25px;
        }
        ul, ol {
            margin-left: 20px;
        }
        li {
            margin-bottom: 8px;
        }
        .important {
            background-color: #fff3cd;
            border-left: 4px solid #ffc107;
            padding: 15px;
            margin: 20px 0;
        }
        .highlight {
            background-color: #d1ecf1;
            border-left: 4px solid #0c5460;
            padding: 15px;
            margin: 20px 0;
        }
        .footer-note {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #dee2e6;
            font-size: 0.9em;
            color: #6c757d;
            text-align: center;
        }
        .btn-close {
            position: fixed;
            top: 20px;
            right: 20px;
        }
        @media print {
            .btn-close {
                display: none;
            }
        }
    </style>
</head>
<body>
    <button onclick="window.close()" class="btn btn-default btn-close">
        <i class="fa fa-times"></i> Close
    </button>

    <div class="container">
        <h1>Terms and Conditions</h1>
        <p><strong>Benguet State University - Bokod Campus</strong><br>
        Student Information Management System (SIMS)</p>
        <p><em>Last Updated: November 2025</em></p>

        <div class="important">
            <strong>Important:</strong> By enrolling in Benguet State University - Bokod Campus and using this Student Information Management System, you agree to comply with and be bound by the following terms and conditions. Please read these terms carefully.
        </div>

        <div class="section">
            <h2>1. Acceptance of Terms</h2>
            <p>By accessing and using the BSU-Bokod Student Information Management System ("the System"), you acknowledge that you have read, understood, and agree to be bound by these Terms and Conditions, as well as the university's policies and the Data Privacy Act of 2012 (Republic Act No. 10173).</p>
        </div>

        <div class="section">
            <h2>2. Data Collection and Privacy</h2>
            
            <h3>2.1 Information We Collect</h3>
            <p>The university collects and processes the following personal information:</p>
            <ul>
                <li><strong>Personal Details:</strong> Full name, date of birth, gender, civil status, nationality, religion</li>
                <li><strong>Contact Information:</strong> Home address, phone number, email address</li>
                <li><strong>Academic Information:</strong> Course enrollment, subjects, grades, schedules, academic status</li>
                <li><strong>Family Information:</strong> Parent/guardian names and contact details, emergency contacts</li>
                <li><strong>Educational Background:</strong> Previous schools attended, transcripts</li>
                <li><strong>Photographs:</strong> Student ID photos and other institutional purposes</li>
                <li><strong>Login Credentials:</strong> Username and password for system access</li>
            </ul>

            <h3>2.2 Purpose of Data Collection</h3>
            <p>Your information is collected for the following purposes:</p>
            <ul>
                <li>Student enrollment and registration</li>
                <li>Academic records management</li>
                <li>Grade processing and transcript generation</li>
                <li>Schedule management and class assignments</li>
                <li>Communication regarding academic matters</li>
                <li>Compliance with educational regulations and reporting requirements</li>
                <li>Emergency contact and student welfare</li>
                <li>Statistical analysis and institutional research (anonymized)</li>
            </ul>

            <h3>2.3 Data Protection and Security</h3>
            <p>BSU-Bokod is committed to protecting your personal information:</p>
            <ul>
                <li>Data is stored securely on university-controlled servers</li>
                <li>Access is restricted to authorized personnel only</li>
                <li>Passwords are encrypted and protected</li>
                <li>Regular security updates and monitoring are implemented</li>
                <li>Physical and digital safeguards are in place</li>
            </ul>

            <h3>2.4 Data Sharing and Disclosure</h3>
            <p>Your personal information may be shared with:</p>
            <ul>
                <li><strong>University Personnel:</strong> Faculty, registrar, department heads, and authorized staff for academic purposes</li>
                <li><strong>Authorized Third Parties:</strong> CHED, TESDA, or other regulatory bodies as required by law</li>
                <li><strong>Parents/Guardians:</strong> For students under 18 or with parental consent</li>
            </ul>
            <p>We will NOT sell, rent, or trade your personal information to third parties for commercial purposes.</p>

            <h3>2.5 Your Data Privacy Rights</h3>
            <p>Under the Data Privacy Act of 2012, you have the right to:</p>
            <ul>
                <li><strong>Access:</strong> Request a copy of your personal data</li>
                <li><strong>Correction:</strong> Request correction of inaccurate or incomplete data</li>
                <li><strong>Objection:</strong> Object to processing of your data in certain circumstances</li>
                <li><strong>Erasure:</strong> Request deletion of data after graduation (subject to retention policies)</li>
                <li><strong>Portability:</strong> Request a copy of your data in a structured format</li>
            </ul>
            <p>To exercise these rights, contact the university's Data Protection Officer at: <strong>[dpo@bsu.edu.ph]</strong></p>
        </div>

        <div class="section">
            <h2>3. Account Responsibilities</h2>
            
            <h3>3.1 Account Security</h3>
            <p>You are responsible for:</p>
            <ul>
                <li>Maintaining the confidentiality of your username and password</li>
                <li>Not sharing your login credentials with anyone</li>
                <li>Logging out after each session, especially on shared computers</li>
                <li>Notifying the registrar immediately if you suspect unauthorized access</li>
                <li>Changing your password regularly and using strong passwords</li>
            </ul>

            <h3>3.2 Accurate Information</h3>
            <p>You agree to:</p>
            <ul>
                <li>Provide accurate, complete, and up-to-date information during enrollment</li>
                <li>Update your information promptly when changes occur</li>
                <li>Notify the registrar of any errors in your academic records</li>
            </ul>
        </div>

        <div class="section">
            <h2>4. Acceptable Use Policy</h2>
            
            <h3>4.1 Permitted Use</h3>
            <p>You may use the System for:</p>
            <ul>
                <li>Viewing your academic records, grades, and schedules</li>
                <li>Enrolling in subjects (during enrollment periods)</li>
                <li>Updating personal contact information</li>
                <li>Communicating with university staff for academic purposes</li>
            </ul>

            <h3>4.2 Prohibited Activities</h3>
            <p>You must NOT:</p>
            <ul>
                <li>Attempt to access other students' accounts or information</li>
                <li>Share your login credentials with others</li>
                <li>Use automated tools (bots, scripts) to access the system</li>
                <li>Attempt to hack, compromise, or disrupt the system</li>
                <li>Upload malicious files, viruses, or malware</li>
                <li>Use the system for any illegal or unauthorized purpose</li>
                <li>Impersonate another person or falsify information</li>
                <li>Copy, modify, or reverse engineer any part of the system</li>
            </ul>
        </div>

        <div class="section">
            <h2>5. Academic Records</h2>
            
            <h3>5.1 Grade Accuracy</h3>
            <p>While we strive for accuracy:</p>
            <ul>
                <li>Grades displayed are for reference only until officially released</li>
                <li>Official transcripts must be requested from the registrar</li>
                <li>You must report grade discrepancies within 30 days of posting</li>
            </ul>

            <h3>5.2 Enrollment Records</h3>
            <ul>
                <li>Enrollment confirmation is official only after payment verification</li>
                <li>Subject schedules are subject to change without prior notice</li>
                <li>You are responsible for verifying your enrolled subjects before the deadline</li>
            </ul>
        </div>

        <div class="section">
            <h2>6. System Availability and Maintenance</h2>
            <p>The university reserves the right to:</p>
            <ul>
                <li>Perform scheduled and emergency maintenance</li>
                <li>Temporarily suspend access for upgrades or repairs</li>
                <li>Modify system features and functionality</li>
                <li>Discontinue services with reasonable notice</li>
            </ul>
            <p>We will make reasonable efforts to notify users of planned downtime.</p>
        </div>

        <div class="section">
            <h2>7. Intellectual Property</h2>
            <p>All content, design, software, and materials in the System are:</p>
            <ul>
                <li>Owned by Benguet State University or its licensors</li>
                <li>Protected by intellectual property laws</li>
                <li>Not to be copied, modified, or distributed without permission</li>
            </ul>
        </div>

        <div class="section">
            <h2>8. Limitation of Liability</h2>
            <p>To the extent permitted by law:</p>
            <ul>
                <li>The university is not liable for any indirect, incidental, or consequential damages</li>
                <li>The system is provided "as is" without warranties of any kind</li>
                <li>The university is not responsible for data loss due to user error or device failure</li>
                <li>Technical issues or system downtime do not exempt students from academic deadlines</li>
            </ul>
        </div>

        <div class="section">
            <h2>9. Disciplinary Actions</h2>
            <p>Violation of these terms may result in:</p>
            <ul>
                <li>Suspension or termination of system access</li>
                <li>Referral to the student disciplinary committee</li>
                <li>Academic sanctions as per university policies</li>
                <li>Legal action if violations constitute criminal offenses</li>
            </ul>
        </div>

        <div class="section">
            <h2>10. Data Retention</h2>
            <p>Your data will be retained:</p>
            <ul>
                <li><strong>Active Students:</strong> Throughout your enrollment</li>
                <li><strong>Graduates:</strong> Academic records retained permanently for transcript requests</li>
                <li><strong>Non-returning Students:</strong> Minimum of 5 years as per CHED requirements</li>
                <li><strong>Personal Details:</strong> May be anonymized or deleted after retention period</li>
            </ul>
        </div>

        <div class="section">
            <h2>11. Amendments</h2>
            <p>The university reserves the right to:</p>
            <ul>
                <li>Modify these Terms and Conditions at any time</li>
                <li>Notify users of significant changes via email or system announcement</li>
                <li>Continued use after changes constitutes acceptance of new terms</li>
            </ul>
        </div>

        <div class="section">
            <h2>12. Governing Law</h2>
            <p>These Terms and Conditions are governed by:</p>
            <ul>
                <li>The Data Privacy Act of 2012 (R.A. 10173)</li>
                <li>CHED Memorandum Orders and policies</li>
                <li>BSU Code of Student Conduct</li>
                <li>Philippine laws and regulations</li>
            </ul>
        </div>

        <div class="highlight">
            <h3>Contact Information</h3>
            <p><strong>For questions about these Terms and Conditions:</strong></p>
            <ul>
                <li><strong>University Registrar:</strong> registrar@bsu.edu.ph</li>
                <li><strong>Data Protection Officer:</strong> dpo@bsu.edu.ph</li>
                <li><strong>Student Affairs:</strong> studentaffairs@bsu.edu.ph</li>
                <li><strong>Technical Support:</strong> itsupport@bsu.edu.ph</li>
            </ul>
            <p><strong>Benguet State University - Bokod Campus</strong><br>
            Bokod, Benguet, Philippines</p>
        </div>

        <div class="important">
            <strong>Acknowledgment:</strong> By clicking "I Agree" during enrollment or login, you acknowledge that you have read, understood, and agree to be bound by these Terms and Conditions.
        </div>

        <div class="footer-note">
            <p>&copy; <?php echo date('Y'); ?> Benguet State University - Bokod Campus. All Rights Reserved.</p>
            <p>This document is for official use by BSU-Bokod students and authorized personnel only.</p>
        </div>
    </div>

    <script src="<?php echo web_root; ?>jquery/jquery.min.js"></script>
    <script src="<?php echo web_root; ?>js/bootstrap.min.js"></script>
</body>
</html>
