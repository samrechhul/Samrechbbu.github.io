<?php
class StudentResultCalculator {
    
    public function calculateResult($studentName, $absentDays, $midtermScore, $finalScore) {
        // គណនាពិន្ទុសរុប (Total)
        $totalScore = $midtermScore + $finalScore;
        
        // ត្រួតពិនិត្យលក្ខខណ្ឌអវត្តមាន
        if ($absentDays >= 16) {
            return [
                'success' => true,
                'student_name' => $studentName,
                'midterm_score' => $midtermScore,
                'final_score' => $finalScore,
                'total_score' => $totalScore,
                'absent_days' => $absentDays,
                'result' => 'រៀនសងឡើងវិញ (អវត្តមានច្រើនពេក)',
                'status' => 'fail_retake'
            ];
        } elseif ($absentDays >= 11 && $absentDays <= 15) {
            return [
                'success' => true,
                'student_name' => $studentName,
                'midterm_score' => $midtermScore,
                'final_score' => $finalScore,
                'total_score' => $totalScore,
                'absent_days' => $absentDays,
                'result' => 'ប្រលងសង (អវត្តមានច្រើន)',
                'status' => 'fail_resit'
            ];
        }
        
        // ត្រួតពិនិត្យលក្ខខណ្ឌពិន្ទុ (សម្រាប់អ្នកដែលអវត្តមាន <= 10)
        if ($midtermScore < 20) {
            return [
                'success' => true,
                'student_name' => $studentName,
                'midterm_score' => $midtermScore,
                'final_score' => $finalScore,
                'total_score' => $totalScore,
                'absent_days' => $absentDays,
                'result' => 'រៀនសងឡើងវិញ (ពិន្ទុ Midterm តិចពេក)',
                'status' => 'fail_retake'
            ];
        } elseif ($midtermScore >= 20 && $totalScore < 60) {
            return [
                'success' => true,
                'student_name' => $studentName,
                'midterm_score' => $midtermScore,
                'final_score' => $finalScore,
                'total_score' => $totalScore,
                'absent_days' => $absentDays,
                'result' => 'ប្រលងសង (ពិន្ទុសរុបតិចជាង 60)',
                'status' => 'fail_resit'
            ];
        } elseif ($midtermScore >= 20 && $totalScore >= 60) {
            return [
                'success' => true,
                'student_name' => $studentName,
                'midterm_score' => $midtermScore,
                'final_score' => $finalScore,
                'total_score' => $totalScore,
                'absent_days' => $absentDays,
                'result' => 'ប្រលងជាប់',
                'status' => 'pass'
            ];
        } else {
            // ករណីផ្សេងៗដែលអាចកើតមាន
            return [
                'success' => true,
                'student_name' => $studentName,
                'midterm_score' => $midtermScore,
                'final_score' => $finalScore,
                'total_score' => $totalScore,
                'absent_days' => $absentDays,
                'result' => 'មិនអាចកំណត់លទ្ធផលបាន',
                'status' => 'undefined'
            ];
        }
    }
    
    public function validateInput($studentName, $absentDays, $midtermScore, $finalScore) {
        $errors = [];
        
        if (empty($studentName)) {
            $errors[] = 'សូមបញ្ចូលឈ្មោះនិស្សិត';
        }
        
        if (!is_numeric($absentDays) || $absentDays < 0) {
            $errors[] = 'ចំនួនអវត្តមានត្រូវតែជាលេខ និងមិនអាចតិចជាង 0';
        } elseif ($absentDays > 30) {
            $errors[] = 'ចំនួនអវត្តមានមិនអាចលើសពី 30 ថ្ងៃបានទេ';
        }
        
        if (!is_numeric($midtermScore) || $midtermScore < 0) {
            $errors[] = 'ពិន្ទុ Midterm ត្រូវតែជាលេខ និងមិនអាចតិចជាង 0';
        } elseif ($midtermScore > 60) {
            $errors[] = 'ពិន្ទុ Midterm មិនអាចធំជាង 60 បានទេ';
        }
        
        if (!is_numeric($finalScore) || $finalScore < 0) {
            $errors[] = 'ពិន្ទុ Final ត្រូវតែជាលេខ និងមិនអាចតិចជាង 0';
        } elseif ($finalScore > 40) {
            $errors[] = 'ពិន្ទុ Final មិនអាចធំជាង 40 បានទេ';
        }
        
        return $errors;
    }
}

$calculator = new StudentResultCalculator();

// ចាប់ផ្តើម session សម្រាប់រក្សាទុកប្រវត្តិ
session_start();
if (!isset($_SESSION['calculations'])) {
    $_SESSION['calculations'] = [];
}
?>
<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>គណនាលទ្ធផលនិស្សិត</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        :root {
            --bg-color: #1f242d;
            --second-bg-color: #323946;
            --text-color: #fff;
            --main-color: #0ef; 
        }

        body {
            font-family: 'Khmer OS', 'MoolBoran', 'Leelawadee UI', sans-serif;
            background: var(--bg-color);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            /*max-width: 1200px;
            margin: 0 auto;*/
            width: 100%;
            padding: 92px
        }

        .header {
            background: linear-gradient(135deg, #667eea);
            padding: 1rem 2rem;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .navbar {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            font-weight: 500;
            padding: 10px 20px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .navbar a:hover {
            background: rgba(255,255,255,0.2);
            transform: translateY(-2px);
        }

        .navbar a.active {
            background: rgba(255,255,255,0.3);
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }

        .calculator-card {
            background: white;
            border-radius: 20px;
            padding: 42px;
            margin-top: 42px; /*add*/
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            animation: slideIn 0.5s ease;
        }

        h1 {
            text-align: center;
            color: var(--main-color);
            margin-bottom: 30px;
            font-size: 28px;
            border-bottom: 3px solid var(--second-bg-color);
            padding-bottom: 15px;/*
            display: inline-block;*/
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #666;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 12px 15px;
            font-size: 16px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-family: 'Khmer OS', 'MoolBoran', sans-serif;
        }

        input[type="text"]:focus,
        input[type="number"]:focus {
            border-color: #667eea;
            outline: none;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        input[type="number"] {
            -moz-appearance: textfield;
        }

        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .score-hint {
            display: block;
            margin-top: 5px;
            font-size: 13px;
            color: #666;
        }

        .btn-calculate {
            background: linear-gradient(135deg, #667eea);
            color: white;
            border: none;
            padding: 15px 30px;
            font-size: 18px;
            font-weight: 600;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            transition: all 0.3s ease;
            font-family: 'Khmer OS', 'MoolBoran', sans-serif;
            letter-spacing: 1px;
        }

        .btn-calculate:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .result-card {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            border-radius: 15px;
            padding: 30px;
            margin-top: 40px;
            border-left: 5px solid #667eea;
            animation: slideIn 0.5s ease;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .result-title {
            color: #333;
            margin-bottom: 25px;
            font-size: 24px;
            border-bottom: 2px solid #667eea;
            padding-bottom: 10px;
        }

        .result-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }

        .result-item {
            background: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .result-item strong {
            display: block;
            color: #667eea;
            margin-bottom: 5px;
            font-size: 14px;
        }

        .result-item span {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .final-result {
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            font-size: 28px;
            font-weight: bold;
            margin-top: 20px;
        }

        .final-result.pass {
            background: #d4edda;
            color: #155724;
            border: 2px solid #c3e6cb;
        }

        .final-result.fail-resit {
            background: #fff3cd;
            color: #856404;
            border: 2px solid #ffeeba;
        }

        .final-result.fail-retake {
            background: #f8d7da;
            color: #721c24;
            border: 2px solid #f5c6cb;
        }

        .final-result.undefined {
            background: #e2e3e5;
            color: #383d41;
            border: 2px solid #d6d8db;
        }

        .error-message {
            background: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
            border: 1px solid #f5c6cb;
        }

        .error-message ul {
            margin: 10px 0 0 20px;
        }

        .info-box {
            background: #e7f3ff;
            border-left: 4px solid #2196F3;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
        }

        .info-box h3 {
            color: #0b5e8a;
            margin-bottom: 15px;
        }

        .info-box ul {
            list-style-type: none;
            padding-left: 0;
        }

        .info-box li {
            margin-bottom: 10px;
            padding-left: 25px;
            position: relative;
        }

        .info-box li:before {
            content: "•";
            color: #2196F3;
            font-weight: bold;
            position: absolute;
            left: 5px;
        }

        .limit-info {
            background: #fff3cd;
            border-left: 4px solid #ffc107;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .limit-info h4 {
            color: #856404;
            margin-bottom: 10px;
        }

        .limit-info p {
            color: #856404;
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        th {
            background: linear-gradient(135deg, #667eea);
            color: white;
            padding: 12px;
            font-weight: 600;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #e0e0e0;
            text-align: center;
        }

        tr:hover {
            background: #f5f5f5;
        }

        .status-pass {
            color: #28a745;
            font-weight: bold;
        }

        .status-resit {
            color: #ffc107;
            font-weight: bold;
        }

        .status-retake {
            color: #dc3545;
            font-weight: bold;
        }

        @media (max-width: 768px) {
            .calculator-card {
                padding: 20px;
            }
            
            .result-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
    <script>
        // កំណត់តម្លៃអតិបរមាតាមលក្ខខណ្ឌ
        document.addEventListener('DOMContentLoaded', function() {
            const midtermInput = document.getElementById('midterm_score');
            const finalInput = document.getElementById('final_score');
            const absentInput = document.getElementById('absent_days');

            // ពិនិត្យពេលកំពុងវាយ
            midtermInput.addEventListener('input', function() {
                if (this.value > 60 ) {
                    this.value = 60;
                }
            });

            finalInput.addEventListener('input', function() {
                if (this.value > 40) {
                    this.value = 40;
                }
            });

            absentInput.addEventListener('input', function() {
                if (this.value > 30) {
                    this.value = 30;
                }
            });

            // ពិនិត្យពេលបាត់បង់ focus
            midtermInput.addEventListener('blur', function() {
                if (this.value > 60) {
                    this.value = 60;
                }
            });

            finalInput.addEventListener('blur', function() {
                if (this.value > 40) {
                    this.value = 40;
                }
            });

            absentInput.addEventListener('blur', function() {
                if (this.value >= 30) {
                    this.value = 30;
                }
            });
        });
    </script>
</head>
<body>
    
        <header class="header">
            <nav class="navbar">
                <a href="index.php">Home</a>
                <a href="exercise1.php">Exercise 1</a>
                <a href="exercise2.php">Exercise 2</a>
                <a href="exercise3.php" class="active">Exercise 3</a>
                <a href="exercise4.php">Exercise 4</a>
            </nav>
        </header>

    <div class="container">
        <div class="calculator-card">
            <h1>គណនាលទ្ធផលប្រចាំឆ្នាំនិស្សិត</h1>
            <!--
            <div class="info-box">
                <h3>លក្ខខណ្ឌក្នុងការវាយតម្លៃ៖</h3>
                <ul>
                    <li><strong>អវត្តមាន ≥ 16 ដង:</strong> រៀនសងឡើងវិញ</li>
                    <li><strong>អវត្តមាន 11-15 ដង:</strong> ប្រលងសង</li>
                    <li><strong>អវត្តមាន ≤ 10 ដង:</strong> មានសិទ្ធិប្រលងធម្មតា</li>
                    <li><strong>ពិន្ទុ Midterm < 20:</strong> រៀនសងឡើងវិញ</li>
                    <li><strong>ពិន្ទុ Midterm ≥ 20 និង Total < 60:</strong> ប្រលងសង</li>
                    <li><strong>ពិន្ទុ Midterm ≥ 20 និង Total ≥ 60:</strong> ប្រលងជាប់</li>
                </ul>
            </div>

            <div class="limit-info">
                <h4>កំណត់ចំណាំ៖</h4>
                <p>✅ ពិន្ទុ Midterm អតិបរមា: <strong>60 ពិន្ទុ</strong></p>
                <p>✅ ពិន្ទុ Final អតិបរមា: <strong>40 ពិន្ទុ</strong></p>
                <p>✅ ចំនួនអវត្តមានអតិបរមា: <strong>30 ថ្ងៃ</strong></p>
                <p>✅ ពិន្ទុសរុបអតិបរមា: <strong>100 ពិន្ទុ</strong></p>
            </div>
            -->
            <form method="POST" action="">
                <div class="form-grid">
                    <div class="form-group">
                        <label for="student_name">ឈ្មោះនិស្សិត ៖</label>
                        <input type="text" 
                               id="student_name" 
                               name="student_name" 
                               placeholder="សូមបញ្ចូលឈ្មោះនិស្សិត"
                               value="<?php echo isset($_POST['student_name']) ? htmlspecialchars($_POST['student_name']) : ''; ?>"
                               required>
                    </div>

                    <div class="form-group">
                        <label for="absent_days">ចំនួនអវត្តមាន ៖</label>
                        <input type="number" 
                               id="absent_days" 
                               name="absent_days" 
                               min="0" 
                               max="30"
                               placeholder="ឧ. 10 (អតិបរមា 30)"
                               value="<?php echo isset($_POST['absent_days']) ? htmlspecialchars($_POST['absent_days']) : ''; ?>"
                               required>
                    </div>

                    <div class="form-group">
                        <label for="midterm_score">ពិន្ទុ Midterm (0-60)៖</label>
                        <input type="number" 
                               id="midterm_score" 
                               name="midterm_score" 
                               min="0" 
                               max="60"
                               step="0.01"
                               placeholder="ឧ. 45 (អតិបរមា 60)"
                               value="<?php echo isset($_POST['midterm_score']) ? htmlspecialchars($_POST['midterm_score']) : ''; ?>"
                               required>
                    </div>

                    <div class="form-group">
                        <label for="final_score">ពិន្ទុ Final (0-40)៖</label>
                        <input type="number" 
                               id="final_score" 
                               name="final_score" 
                               min="0" 
                               max="40"
                               step="0.01"
                               placeholder="ឧ. 35 (អតិបរមា 40)"
                               value="<?php echo isset($_POST['final_score']) ? htmlspecialchars($_POST['final_score']) : ''; ?>"
                               required>
                    </div>
                </div>

                <button type="submit" name="calculate" class="btn-calculate">
                    គណនាលទ្ធផល
                </button>
            </form>

            <?php
            if (isset($_POST['calculate'])) {
                $studentName = $_POST['student_name'];
                $absentDays = $_POST['absent_days'];
                $midtermScore = $_POST['midterm_score'];
                $finalScore = $_POST['final_score'];

                // ពិនិត្យសុពលភាពទិន្នន័យ
                $errors = $calculator->validateInput($studentName, $absentDays, $midtermScore, $finalScore);

                if (empty($errors)) {
                    // គណនាលទ្ធផល
                    $result = $calculator->calculateResult($studentName, $absentDays, $midtermScore, $finalScore);

                    if ($result['success']) {
                        $statusClass = '';
                        switch ($result['status']) {
                            case 'pass':
                                $statusClass = 'pass';
                                break;
                            case 'fail_resit':
                                $statusClass = 'fail-resit';
                                break;
                            case 'fail_retake':
                                $statusClass = 'fail-retake';
                                break;
                            default:
                                $statusClass = 'undefined';
                        }
                        ?>
                        <div class="result-card">
                            <h2 class="result-title">លទ្ធផលគណនាសម្រាប់: <?php echo htmlspecialchars($result['student_name']); ?></h2>
                            
                            <div class="result-grid">
                                <div class="result-item">
                                    <strong>ពិន្ទុ Midterm</strong>
                                    <span><?php echo number_format($result['midterm_score'], 2); ?> / 60</span>
                                </div>
                                <div class="result-item">
                                    <strong>ពិន្ទុ Final</strong>
                                    <span><?php echo number_format($result['final_score'], 2); ?> / 40</span>
                                </div>
                                <div class="result-item">
                                    <strong>ពិន្ទុសរុប</strong>
                                    <span><?php echo number_format($result['total_score'], 2); ?> / 100</span>
                                </div>
                                <div class="result-item">
                                    <strong>ចំនួនអវត្តមាន</strong>
                                    <span><?php echo $result['absent_days']; ?> ថ្ងៃ</span>
                                </div>
                            </div>

                            <div class="final-result <?php echo $statusClass; ?>">
                                <?php echo $result['result']; ?>
                            </div>
                        </div>
                        <?php

                        // រក្សាទុកប្រវត្តិការគណនា
                        if (count($_SESSION['calculations']) >= 10) {
                            array_shift($_SESSION['calculations']);
                        }
                        
                        $_SESSION['calculations'][] = [
                            'student_name' => $result['student_name'],
                            'absent_days' => $result['absent_days'],
                            'midterm_score' => $result['midterm_score'],
                            'final_score' => $result['final_score'],
                            'total_score' => $result['total_score'],
                            'result' => $result['result'],
                            'status' => $result['status']
                        ];
                    }
                } else {
                    ?>
                    <div class="error-message">
                        <strong>សូមកែតម្រូវកំហុសខាងក្រោម៖</strong>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li><?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php
                }
            }
            ?>

            <?php if (!empty($_SESSION['calculations'])): ?>
                <h2 style="margin-top: 40px; margin-bottom: 20px;">ប្រវត្តិការគណនាថ្មីៗ</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ឈ្មោះនិស្សិត</th>
                            <th>អវត្តមាន</th>
                            <th>Midterm</th>
                            <th>Final</th>
                            <th>សរុប</th>
                            <th>លទ្ធផល</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach (array_reverse($_SESSION['calculations']) as $calc): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($calc['student_name']); ?></td>
                            <td><?php echo $calc['absent_days']; ?></td>
                            <td><?php echo number_format($calc['midterm_score'], 2); ?></td>
                            <td><?php echo number_format($calc['final_score'], 2); ?></td>
                            <td><?php echo number_format($calc['total_score'], 2); ?></td>
                            <td class="<?php 
                                echo $calc['status'] == 'pass' ? 'status-pass' : 
                                    ($calc['status'] == 'fail_resit' ? 'status-resit' : 'status-retake'); 
                            ?>">
                                <?php echo $calc['result']; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>