<?php
require "db.php";
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name     = trim($_POST['emp_name'] ?? '');
    $job      = trim($_POST['job_name'] ?? '');
    $salary   = (float)($_POST['salary'] ?? 0);
    $hire     = $_POST['hire_date'] ?? '';
    $deptId   = (int)($_POST['department_id'] ?? 0);
    $deptName = trim($_POST['department_name'] ?? '');

    $stmt = $conn->prepare("INSERT INTO employees (emp_name, job_name, salary, hire_date, department_id, department_name) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssdsis", $name, $job, $salary, $hire, $deptId, $deptName);

    if ($stmt->execute()) {
        $message = "Success! Inserted ID: " . $stmt->insert_id;
    } else {
        $message = "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee Demo Form</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="demo-page">
    <div class="demo-shell">
        <div class="demo-card">
            <h1 class="demo-title">Employee Form Demo</h1>
            <p class="demo-subtitle">Add a new record securely using prepared statements.</p>

            <?php if ($message): ?>
                <div class="demo-msg <?= strpos($message, 'Success') !== false ? 'success' : 'error' ?>">
                    <?= htmlspecialchars($message) ?>
                </div>
            <?php endif; ?>

            <form method="post">
                <div class="demo-grid">
                    <div class="demo-field">
                        <label>Employee Name</label>
                        <input class="demo-input" name="emp_name" required>
                    </div>
                    <div class="demo-field">
                        <label>Job Title</label>
                        <input class="demo-input" name="job_name" required>
                    </div>
                    <div class="demo-field">
                        <label>Salary</label>
                        <input class="demo-input" type="number" step="0.01" name="salary" required>
                    </div>
                    <div class="demo-field">
                        <label>Hire Date</label>
                        <input class="demo-input" type="date" name="hire_date" required>
                    </div>
                    <div class="demo-field">
                        <label>Department ID</label>
                        <input class="demo-input" type="number" name="department_id" required>
                    </div>
                    <div class="demo-field">
                        <label>Department Name</label>
                        <input class="demo-input" name="department_name" required>
                    </div>
                </div>
                <div class="demo-actions">
                    <button class="demo-btn" type="submit">Save Employee</button>
                    <a class="demo-link" href="read_employees.php" style="align-self: center; margin-left: 1rem;">View employee records &rarr;</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>