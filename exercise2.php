<?php
class PhoneNumberPredictor {
    private $predictions = [];
    
    public function __construct() {
        $this->initPredictions();
    }
    
    private function initPredictions() {
        // ផ្ទុកទិន្នន័យទស្សន៍ទាយពីទំព័រទី 2 ដល់ 5
        $this->predictions = [
            1 => ['status' => 'ល្អណស', 'message' => 'រីកចំរើនល្អអាចទទួលបានជ័យជំនះ'],
            2 => ['status' => 'ធម្មតា', 'message' => 'មានលាភមានបង់មិនទទួលផលអ្វីទេ'],
            3 => ['status' => 'ល្អណាស់', 'message' => 'មានភាពរីកចំរើនអ្វីៗអាចសំរេចបានដូចបំណង'],
            4 => ['status' => 'អាក្រក់', 'message' => 'ផ្លូវអនាគតមានឧបសគ្គច្រើនលំបាកវេទនា'],
            5 => ['status' => 'ល្អណាស់', 'message' => 'រកស៊ីមានបានទទួលបានទាំងកិត្តិយសទាំងផលប្រយោជន៍'],
            6 => ['status' => 'ល្អណាស់', 'message' => 'មានសំណាងច្រើនអាចទទួលបានគុណសម្បត្តិធំ'],
            7 => ['status' => 'ល្អ', 'message' => 'មានចិត្តអត់ធ្មត់ ពិតជាអាចទទួលបានជោគជ័យដ៏ធំ'],
            8 => ['status' => 'ល្អ', 'message' => 'អាចមានឱកាសទទួលបានជោគជ័យ'],
            9 => ['status' => 'អាក្រក់', 'message' => 'ឯកកោ គ្មានអ្នកជួយ ពិបាកទទួលបានជោគជ័យ'],
            10 => ['status' => 'អាក្រក់', 'message' => 'ខាតបង់ទឹកចិត្តនិងកម្លាំង ខិតខំដោយឥតបានផល'],
            11 => ['status' => 'ល្អ', 'message' => 'មានលំនឹងល្អ'],
            12 => ['status' => 'អាក្រក់', 'message' => 'ទន់ខ្សោយ ធ្វើអ្វីក៏មិនបានសម្រេច'],
            13 => ['status' => 'ល្អណាស់', 'message' => 'មានសំណាងល្អ ក្តីសង្ឃឹមច្រើន'],
            14 => ['status' => 'ធម្មតា', 'message' => 'ជ័យជំនះ ឬបរាជ័យ អាស្រ័យលើការតាំងចិត្តរបស់ខ្លួន'],
            15 => ['status' => 'ល្អ', 'message' => 'ជ័យជំនះច្រើន មានការរីកចម្រើន'],
            16 => ['status' => 'ល្អណាស់', 'message' => 'អាចសម្រេចកិច្ចការធំបាន ទទួលទាំងកិត្តិយសទាំងផលប្រយោជន៍'],
            17 => ['status' => 'ល្អ', 'message' => 'មានអ្នកជួយ អាចទទួលបានជោគជ័យ'],
            18 => ['status' => 'ល្អ', 'message' => 'មានភាពរីកចម្រើនច្រើន នឹងបានសម្រេចដូចបំណង'],
            19 => ['status' => 'អាក្រក់', 'message' => 'មានទំនាស់ច្រើន មានឧបសគ្គ'],
            20 => ['status' => 'អាក្រក់', 'message' => 'ឧបសគ្គច្រើន ឈឺច្រើន ពិបាកចិត្តច្រើន'],
            21 => ['status' => 'ល្អ', 'message' => 'ធ្វើការល្អិតល្អន់ មានប្រាថ្នា'],
            22 => ['status' => 'អាក្រក់ណាស់', 'message' => 'ខាតបង់ ធ្វើអ្វីក៏មិនបានសម្រេចដូចបំណង'],
            23 => ['status' => 'ល្អណាស់', 'message' => 'កិត្តិយសល្អ សម្រេចកិច្ចការធំបាន'],
            24 => ['status' => 'ល្អ', 'message' => 'ពឹងផ្អែកលើសមត្ថភាពផ្ទាល់ខ្លួន អាចសម្រេចកិច្ចការបាន'],
            25 => ['status' => 'ល្អណាស់', 'message' => 'មានសំណាងល្អ មានគេជួយ'],
            26 => ['status' => 'អាក្រក់ណាស់', 'message' => 'មានឧបសគ្គច្រើន'],
            27 => ['status' => 'ល្អ', 'message' => 'អាចមានលាភសំណាងនិងជ័យជំនះ'],
            28 => ['status' => 'ល្អណាស់', 'message' => 'រាសីឡើងខ្ពស់ រកស៊ីមានបាន'],
            29 => ['status' => 'អាក្រក់', 'message' => 'សំណាងល្អនិងអាក្រក់ កើតមានឡើងប្រសព្វគ្នា'],
            30 => ['status' => 'ល្អណាស់', 'message' => 'ទទួលបាននូវលាភសំណាងនិងកិត្តិយស'],
            31 => ['status' => 'ល្អណាស់', 'message' => 'មានសំណាង អាចទទួលជោគជ័យ'],
            32 => ['status' => 'ល្អ', 'message' => 'មានប្រាជ្ញា មានភាពវៃឆ្លាតច្រើន'],
            33 => ['status' => 'អាក្រក់ណាស់', 'message' => 'ជួបឧបសគ្គមិនចេះអស់ ពិបាកនឹងទទួលបានជោគជ័យ'],
            34 => ['status' => 'ធម្មតា', 'message' => 'ត្រូវមានលំនឹងចិត្ត កុំប្រកាន់'],
            35 => ['status' => 'អាក្រក់', 'message' => 'ឧបសគ្គច្រើន តែងជួបភាពលំបាក'],
            36 => ['status' => 'ល្អ', 'message' => 'ឧបសគ្គអាចក្លាយជាសំណាង ធ្វើអ្វីៗអាចបានដូចបំណង'],
            37 => ['status' => 'ធម្មតា', 'message' => 'អាចទទួលបាននូវកិត្តិយស តែពិបាកទទួលនូវលាភសំណាង'],
            38 => ['status' => 'ល្អណាស់', 'message' => 'អនាគតភ្លឺស្វាង'],
            39 => ['status' => 'ធម្មតា', 'message' => 'មានសំណាងឬឧបសគ្គ មិនទៀង'],
            40 => ['status' => 'ល្អណាស់', 'message' => 'មានសំណាងល្អ អនាគតល្អ ហើយភ្លឺស្វាង'],
            41 => ['status' => 'អាក្រក់', 'message' => 'ការរកស៊ីត្រូវខាតបង់'],
            42 => ['status' => 'ល្អ', 'message' => 'បើមានចិត្តអត់ធ្មត់ សំណាងអាក្រក់អាចក្លាយជាមានលាភ'],
            43 => ['status' => 'អាក្រក់', 'message' => 'ធ្វើអ្វីៗពិបាកសម្រេចដូចបំណង'],
            44 => ['status' => 'ល្អ', 'message' => 'មានសំណាង មានភាពវៃឆ្លាត'],
            45 => ['status' => 'ល្អណាស់', 'message' => 'ជួបឧបសគ្គមិនចេះអស់'],
            46 => ['status' => 'ល្អណាស់', 'message' => 'មានគេតាមជួយថែរក្សា អាចប្រកបមុខជំនួញបាន'],
            47 => ['status' => 'ល្អណាស់', 'message' => 'មានទាំងកិត្តិយស មានទាំងទ្រព្យសម្បត្តិ'],
            48 => ['status' => 'ធម្មតា', 'message' => 'មានឧបសគ្គ ហើយក៏មានសំណាងដែរ'],
            49 => ['status' => 'ធម្មតា', 'message' => 'មានឧបសគ្គ ហើយក៏មានសំណាងដែរ'],
            50 => ['status' => 'ធម្មតា', 'message' => 'លាភសំណាងនិងឧបសគ្គ មិនដឹងច្បាស់'],
            51 => ['status' => 'ល្អ', 'message' => 'ខិតខំ នឹងទទួលបានជោគជ័យ'],
            52 => ['status' => 'អាក្រក់', 'message' => 'ពេលបានលាភសំណាង នឹងមានឧបសគ្គតាមពីក្រោយ'],
            53 => ['status' => 'ធម្មតា', 'message' => 'ខិតខំប្រឹងត្រូវខ្លាំង តែទទួលបានលទ្ធផលតិចតួច'],
            54 => ['status' => 'អាក្រក់', 'message' => 'ល្អតែសំបកក្រៅ តាមការពិតមានឧបសគ្គ'],
            55 => ['status' => 'អាក្រក់ណាស់', 'message' => 'ជួបឧបសគ្គ មិនចេះអស់ អាចមានគ្រោះថ្នាក់'],
            56 => ['status' => 'ល្អ', 'message' => 'ខិតខំប្រឹងតស៊ូ អាចតស៊ូជាមួយវាសនា'],
            57 => ['status' => 'ធម្មតា', 'message' => 'មានឧបសគ្គច្រើន តែសំណាងល្អនឹងមកពីក្រោយ'],
            58 => ['status' => 'អាក្រក់', 'message' => 'ពេលជួបនឹងបញ្ហា ចិត្តមិត់ ពិបាកសម្រេចចិត្ត'],
            59 => ['status' => 'ធម្មតា', 'message' => 'ចិត្តរាងច្របូល ពិបាកសម្រេចចិត្ត'],
            60 => ['status' => 'អាក្រក់', 'message' => 'ជួបឧបសគ្គច្រើន'],
            61 => ['status' => 'អាក្រក់', 'message' => 'មានហេតុស្មុគស្មាញច្រើន ពិបាកសម្រេចអ្វីដែលបានប៉ង'],
            62 => ['status' => 'ល្អ', 'message' => 'ខិតខំ នឹងទទួលបាននូវផលប្រយោជន៍'],
            63 => ['status' => 'អាក្រក់', 'message' => 'ខំប្រឹង តែគ្មានទទួលបានផលប្រយោជន៍អ្វីឡើយ'],
            64 => ['status' => 'ល្អ', 'message' => 'មានសំណាងល្អ អាចប្រកបមុខជំនួញធំបាន'],
            65 => ['status' => 'ធម្មតា', 'message' => 'ល្អ តែខ្វះទំនុកចិត្តលើខ្លួនឯង'],
            66 => ['status' => 'ល្អណាស់', 'message' => 'ធ្វើអ្វីៗតែងបានសម្រេច ប្រាក់ហូរចូលច្រើន'],
            67 => ['status' => 'ល្អ', 'message' => 'ប្រសិនបើអាចក្តាប់ជាប់នូវឱកាសល្អ អាចទទួលបានជោគជ័យ'],
            68 => ['status' => 'អាក្រក់', 'message' => 'ស្ថានភាពមិននឹងនរ អាចចាញ់ប្រៀបគេ ជួបឧបសគ្គច្រើន'],
            69 => ['status' => 'អាក្រក់', 'message' => 'រកស៊ីខាតបង់ ផ្លូវភាពច្របូកច្របល់ និងឧបសគ្គ'],
            70 => ['status' => 'ធម្មតា', 'message' => 'សំណាងល្អឬអាក្រក់ អាស្រ័យលើការប្រឹងប្រែង'],
            71 => ['status' => 'អាក្រក់', 'message' => 'បានហើយត្រូវបាត់បង់ទៅវិញ ពិបាកសម្រេចតាមបំណង'],
            72 => ['status' => 'ល្អ', 'message' => 'មានសុភមង្គល និងសំណាងល្អ'],
            73 => ['status' => 'ធម្មតា', 'message' => 'បើសិនជារឹងរូស ពិបាកនឹងទទួលជោគជ័យ'],
            74 => ['status' => 'ធម្មតា', 'message' => 'មានសំណាងល្អ ក៏មានសំណាងអាក្រក់ដែរ'],
            75 => ['status' => 'អាក្រក់', 'message' => 'ការងាររកស៊ីខាតបង់ អស់ទ្រព្យសម្បត្តិ'],
            76 => ['status' => 'ល្អ', 'message' => 'ពិបាកមុន ស្រួលក្រោយ'],
            77 => ['status' => 'ធម្មតា', 'message' => 'មានលាភ មានបង់ មិនអាចស្តុកទុក'],
            78 => ['status' => 'ធម្មតា', 'message' => 'អនាគតមិនសូវភ្លឺស្វាង ហើយក៏មិនសូវមានទ្រព្យសម្បត្តិ'],
            79 => ['status' => 'អាក្រក់', 'message' => 'បានហើយតែបែរជាខាតបង់ទៅវិញ ខំប្រឹងឥតប្រយោជន៍'],
            80 => ['status' => 'ល្អណាស់', 'message' => 'អាចទទួលបានជោគជ័យច្រើន']
        ];
    }
    
    public function calculateNumber($phoneNumber) {
        // សម្អាតលេខទូរស័ព្ទ យកតែលេខ
        $cleanNumber = preg_replace('/[^0-9]/', '', $phoneNumber);
        
        // ពិនិត្យថាត្រូវមាន 9 ឬ 10 ខ្ទង់
        $length = strlen($cleanNumber);
        if (empty($cleanNumber) || ($length != 9 && $length != 10)) {
            return null;
        }
        
        // យកតែ 6 ខ្ទង់ចុងក្រោយ
        $lastSixDigits = substr($cleanNumber, -6);
        
        // ចែកនឹង 80
        $divisionResult = $lastSixDigits / 80;
        
        // យកតែលេខទសភាគក្រោយចំនុច 2 ខ្ទង់ដំបូង
        $decimalPart = fmod($divisionResult, 1);
        
        // បំលែងទៅជាប្រភាគទសភាគ 2 ខ្ទង់
        $decimalStr = number_format($decimalPart, 10, '.', '');
        $decimalTwoDigits = substr($decimalStr, 2, 2);
        
        // បង្កើតតម្លៃ 0. (two digits)
        $decimalValue = floatval('0.' . $decimalTwoDigits);
        
        // គុណនឹង 80 វិញ
        $finalNumber = $decimalValue * 80;
        
        // បង្គត់ជាចំនួនគត់
        $result = round($finalNumber);
        
        return (int)$result;
    }
    
    public function getPrediction($phoneNumber) {
        $number = $this->calculateNumber($phoneNumber);
        
        if ($number === null) {
            return [
                'success' => false,
                'message' => 'សូមបញ្ចូលលេខទូរស័ព្ទអោយបាន 9 ឬ 10 ខ្ទង់'
            ];
        }
        
        if (isset($this->predictions[$number])) {
            return [
                'success' => true,
                'number' => $number,
                'status' => $this->predictions[$number]['status'],
                'prediction' => $this->predictions[$number]['message'],
                'original_number' => $phoneNumber,
                'last_six_digits' => substr(preg_replace('/[^0-9]/', '', $phoneNumber), 0)
            ];
        } else {
            return [
                'success' => false,
                //'message' => "លេខ $number មិនមានក្នុងតារាងទស្សន៍ទាយ (តារាងចាប់ផ្តើមពីលេខ 7 ដល់ 80)"
            ];
        }
    }
}

$predictor = new PhoneNumberPredictor();
?>
<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Samrech-Web-Developer</title>
    <!-- custom css -->
    <link rel="stylesheet" href="./exercise2.css">
   
    <script>
        // ការពារមិនឱ្យបញ្ចូលអក្សរតែម្ដង
        function allowOnlyNumbers(event) {
            var key = event.key;
            var allowedKeys = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'Backspace', 'Delete', 'ArrowLeft', 'ArrowRight', 'Tab'];
            
            if (!allowedKeys.includes(key)) {
                event.preventDefault();
                return false;
            }
            return true;
        }
        
        function validateForm() {
            var phone = document.getElementById('phone').value;
            // យកតែលេខ
            var numbersOnly = phone.replace(/[^0-9]/g, '');
            
            if (numbersOnly === '') {
                alert('សូមបញ្ចូលលេខទូរស័ព្ទ');
                return false;
            }
            
            if (numbersOnly.length !== 9 && numbersOnly.length !== 10) {
                alert('សូមបញ្ចូលលេខទូរស័ព្ទអោយបាន 9 ឬ 10 ខ្ទង់');
                return false;
            }
            
            return true;
        }
        
        function formatPhoneNumber(input) {
            // យកតែលេខ
            let numbers = input.value.replace(/[^0-9]/g, '');
            
            // កំណត់ត្រឹម 10 ខ្ទង់ (អនុញ្ញាតអោយតិចជាងបាន)
            if (numbers.length > 10) {
                numbers = numbers.slice(0, 10);
            }
            
            input.value = numbers;
        }
    </script>
</head>
<body>
    <!-- header  -->    
    <header class="header">
        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="exercise1.php">Exercise 1</a>
            <a href="exercise2.php" class="active">Exercise 2</a>
            <a href="exercise3.php">Exercise 3</a>
            <a href="exercise4.php">Exercise 4</a>
        </nav>
    </header>

    <div class="container">
        <div class="calculator-card">
            <h1>ទស្សន៍ទាយលេខទូរស័ព្ទ</h1>
            
            <form method="POST" action="" onsubmit="return validateForm()">
                <div class="form-group">
                    <label for="phone">បញ្ចូលលេខទូរស័ព្ទ៖</label>
                    <input type="text" 
                           id="phone" 
                           name="phone" 
                           placeholder="093927592" 
                           value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>" 
                           onkeydown="allowOnlyNumbers(event)"
                           oninput="formatPhoneNumber(this)"
                           autocomplete="off">
                    <!--<small style="display: block; margin-top: 5px; color: #666;">អាចបញ្ចូលបាន 9 ឬ 10 ខ្ទង់</small>-->
                </div>
                <button type="submit">ទស្សន៍ទាយ</button>
            </form>
            
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['phone'])) {
                $phoneNumber = $_POST['phone'];
                $result = $predictor->getPrediction($phoneNumber);
                
                if ($result['success']) {
                    $statusClass = '';
                    switch ($result['status']) {
                        case 'ល្អណាស់':
                            $statusClass = 'status-very-good';
                            break;
                        case 'ល្អ':
                            $statusClass = 'status-good';
                            break;
                        case 'ធម្មតា':
                            $statusClass = 'status-normal';
                            break;
                        case 'អាក្រក់':
                            $statusClass = 'status-bad';
                            break;
                        case 'អាក្រក់ណាស់':
                            $statusClass = 'status-very-bad';
                            break;
                    }
                    ?>
                    <div class="result show <?php echo $statusClass; ?>">
                        <h3>លទ្ធផលទស្សន៍ទាយ</h3>
                        <p><strong>លេខទូរស័ព្ទ:</strong> <?php echo htmlspecialchars($result['original_number']); ?></p>
                       <!-- <p><strong>6 ខ្ទង់ចុងក្រោយ:</strong> <?php echo $result['last_six_digits']; ?></p>
                        --><p><strong>លេខសម្រាប់ពិនិត្យ:</strong> <?php echo $result['number']; ?></p>
                        <p><strong>ស្ថានភាព:</strong> <?php echo $result['status']; ?></p>
                        <p><strong>ទស្សន៍ទាយ:</strong> <?php echo $result['prediction']; ?></p>
                    </div>
                    
                    <!-- បង្ហាញវិធីគណនា 
                    <div class="info">
                        <h4>វិធីគណនា៖</h4>
                        <?php
                        $cleanNumber = preg_replace('/[^0-9]/', '', $phoneNumber);
                        $lastSix = substr($cleanNumber, -6);
                        $division = $lastSix / 80;
                        $decimalStr = number_format($division, 10, '.', '');
                        $parts = explode('.', $decimalStr);
                        $decimalTwoDigits = substr($parts[1], 0, 2);
                        $decimalValue = '0.' . $decimalTwoDigits;
                        $finalCalc = floatval($decimalValue) * 80;
                        ?>
                        <p>1. លេខទូរស័ព្ទ: <strong><?php echo $cleanNumber; ?></strong> (<?php echo strlen($cleanNumber); ?> ខ្ទង់)</p>
                        <p>2. 6 ខ្ទង់ចុងក្រោយ: <strong><?php echo $lastSix; ?></strong></p>
                        <p>3. <?php echo $lastSix; ?> ÷ 80 = <strong><?php echo number_format($division, 10); ?></strong></p>
                        <p>4. យក 2 ខ្ទង់ដំបូងក្រោយចំនុច: <strong><?php echo $decimalValue; ?></strong></p>
                        <p>5. <?php echo $decimalValue; ?> × 80 = <strong><?php echo round($finalCalc); ?></strong></p>
                        <p>6. លេខសម្រាប់ពិនិត្យ: <strong><?php echo $result['number']; ?></strong></p>
                    </div> -->
                    <?php
                } else {
                    ?>
                    <div class="error-message">
                        <strong>កំហុស៖</strong> <?php echo $result['message']; ?>
                    </div>
                    <?php
                }
            }
            ?>
            
            <div class="info">
                <p style="text-align: center; margin: 0;">※ ទស្សន៍ទាយនេះសម្រាប់ការកម្សាន្តតែប៉ុណ្ណោះ</p>
            </div>
        </div>
    </div>

    <!-- script -->
    <script src="./main.js"></script>
</body>
</html>