<?php
require "db.php";
$result = $conn->query("SELECT * FROM employees");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Employees</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="demo-page">
    <div class="demo-shell">
        <div class="demo-card">
            <h1 class="demo-title">Employee Records</h1>
            <p class="demo-subtitle">Current data fetched from the database with output sanitization.</p>

            <table style="width: 100%; border-collapse: collapse; margin-top: 1rem;" border="1">
                <thead>
                    <tr style="text-align: left; color: var(--demo-accent);">
                        <th style="padding: 8px;">ID</th>
                        <th style="padding: 8px;">Name</th>
                        <th style="padding: 8px;">Job</th>
                        <th style="padding: 8px;">Salary</th>
                        <th style="padding: 8px;">Hire Date</th>
                        <th style="padding: 8px;">Department</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result && $result->num_rows > 0): ?>
                        <?php while($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td style="padding: 8px;"><?= htmlspecialchars($row['emp_id']) ?></td>
                                <td style="padding: 8px;"><?= htmlspecialchars($row['emp_name']) ?></td>
                                <td style="padding: 8px;"><?= htmlspecialchars($row['job_name']) ?></td>
                                <td style="padding: 8px;">$<?= htmlspecialchars($row['salary']) ?></td>
                                <td style="padding: 8px;"><?= htmlspecialchars($row['hire_date']) ?></td>
                                <td style="padding: 8px;"><?= htmlspecialchars($row['department_name']) ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" style="padding: 8px; text-align: center;">No records found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <div class="demo-actions" style="margin-top: 1.5rem;">
                <a class="demo-link" href="employee_demo.php">&larr; Back to Add Form</a>
            </div>
        </div>
    </div>
</body>
</html>