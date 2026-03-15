s<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Samrech-Web-Developer</title>
    <!-- -->
    <link rel="stylesheet" href="./exercise1.css">
    
    <!-- custom css -->
    <link rel="stylesheet" href="./stylexercise1.css">
    
</head>
<body>

    <!-- header  -->
    <header class="header">
        <nav class="navbar">
            <a href="index.php" class="">Home</a>
            <a href="exercise1.php" class="active">Exercise 1</a>
            <a href="exercise2.php">Exercise 2</a>
            <a href="exercise3.php">Exercise 3</a>
            <a href="#contact">Exercise 4</a>
        </nav>
    </header>
    
    <?php
// electricity_calculator_simple.php

class ElectricityBillCalculator {
    private $rates;
    private $serviceCharge;
    
    public function __construct() {
        // តម្លៃក្នុងមួយគីឡូវ៉ាត់ម៉ោង (រៀល)
        $this->rates = [
            ['min' => 0, 'max' => 50, 'rate' => 610],     // 0-50 kWh
            ['min' => 51, 'max' => 100, 'rate' => 720],   // 51-100 kWh
            ['min' => 101, 'max' => 200, 'rate' => 830],  // 101-200 kWh
            ['min' => 201, 'max' => 300, 'rate' => 940],  // 201-300 kWh
            ['min' => 301, 'max' => 400, 'rate' => 1050], // 301-400 kWh
            ['min' => 401, 'max' => PHP_INT_MAX, 'rate' => 1160] // >400 kWh
        ];
        
        $this->serviceCharge = 3800; // ថ្លៃសេវាប្រចាំខែ
    }
    
    public function calculate($oldMeter, $newMeter) {
        // គណនាចំនួនគីឡូវ៉ាត់ម៉ោងដែលប្រើប្រាស់
        $kwh = $newMeter - $oldMeter;
        
        if ($kwh < 0) {
            return ['error' => 'លេខគីឡូថ្មីត្រូវតែធំជាងលេខវាស់ចាស់'];
        }
        
        if ($kwh == 0) {
            return ['error' => 'មិនមានការប្រើប្រាស់អគ្គិសនីទេ'];
        }
        
        return $this->calculateBill($kwh);
    }
    
    private function calculateBill($kwh) {
        $total = 0;
        $remainingKwh = $kwh;
        $details = [];
        
        foreach ($this->rates as $index => $rate) {
            if ($remainingKwh <= 0) break;
            
            $tierRange = $rate['max'] - $rate['min'] + 1;
            $kwhInTier = min($remainingKwh, $tierRange);
            $cost = $kwhInTier * $rate['rate'];
            
            $details[] = [
                'tier' => $index + 1,
                'range' => $rate['max'] == PHP_INT_MAX ? 
                          "{$rate['min']}+ kWh" : 
                          "{$rate['min']}-{$rate['max']} kWh",
                'kwh' => $kwhInTier,
                'rate' => $rate['rate'],
                'cost' => $cost
            ];
            
            $total += $cost;
            $remainingKwh -= $kwhInTier;
        }
        
        $totalWithService = $total + $this->serviceCharge;
        
        return [
            'kwh' => $kwh,
            'old_meter' => $oldMeter ?? null,
            'new_meter' => $newMeter ?? null,
            'details' => $details,
            'energy_cost' => $total,
            'service_charge' => $this->serviceCharge,
            'total' => $totalWithService
        ];
    }
    
    public function formatCurrency($amount) {
        return number_format($amount, 0, ',', ',') . ' រៀល';
    }
}

// ដំណើរការទម្រង់
$result = null;
$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $oldMeter = floatval($_POST['old_meter'] ?? 0);
    $newMeter = floatval($_POST['new_meter'] ?? 0);
    
    $calculator = new ElectricityBillCalculator();
    $result = $calculator->calculate($oldMeter, $newMeter);
    
    if (isset($result['error'])) {
        $error = $result['error'];
        $result = null;
    }
}
?>

<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
   
</head>
<body>
    <div class="container">
        <div class="calculator-card">
            <h1>គណនាថ្លៃអគ្គិសនី</h1>
            <form method="POST" action="">
                <div class="form-group">
                    <label>លេខគីឡូចាស់ (គីឡូវ៉ាត់ម៉ោង):</label>
                    <div class="input-group">
                        <input type="number" 
                               name="old_meter" 
                               min="0" 
                               step="0.01" 
                               required 
                               placeholder="1250.5"
                               value="<?php echo htmlspecialchars($_POST['old_meter'] ?? ''); ?>">
                    </div>
                </div>
                
                <div class="form-group">
                    <label>លេខគីឡូថ្មី (គីឡូវ៉ាត់ម៉ោង):</label>
                    <div class="input-group">
                        <input type="number" 
                               name="new_meter" 
                               min="0" 
                               step="0.01" 
                               required 
                               placeholder="1350.5"
                               value="<?php echo htmlspecialchars($_POST['new_meter'] ?? ''); ?>">
                    </div>
                </div>
                
                <button type="submit">គណនា</button>
            </form>
            
            <?php if ($error): ?>
                <div class="error-message">
                    <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>
            
            <?php if ($result): ?>
                <div class="result-box">
                    <div class="result-header">
                        <h3>លទ្ធផលគណនា</h3>
                        <span class="kwh-badge"><?php echo $result['kwh']; ?> kWh</span>
                    </div>
                    
                    <div class="meter-info">
                        <div class="meter-info-item">
                            <div class="meter-info-label">លេខគីឡូចាស់</div>
                            <div class="meter-info-value"><?php echo number_format($_POST['old_meter'], 2); ?></div>
                        </div>
                        <div class="meter-info-item">
                            <div class="meter-info-label">លេខគីឡូថ្មី</div>
                            <div class="meter-info-value"><?php echo number_format($_POST['new_meter'], 2); ?></div>
                        </div>
                        <div class="meter-info-item">
                            <div class="meter-info-label">ប្រើប្រាស់សរុប</div>
                            <div class="meter-info-value"><?php echo number_format($result['kwh'], 2); ?></div>
                        </div>
                    </div>
                    
                    <h4 style="color: #1e3c72; margin-bottom: 15px;">ព័ត៌មានលម្អិត</h4>
                    
                    <table class="details-table">
                        <thead>
                            <tr>
                                <th>លេខ ID</th>
                                <th>គីឡូ(kWh)</th>
                                <th>បរិមាណប្រើ</th>
                                <th>តម្លៃ/kWh</th>
                                <th>ត្រូវបង់ថ្លៃ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($result['details'] as $detail): ?>
                            <tr>
                                <td><?php echo $detail['tier']; ?></td>
                                <td><?php echo $detail['range']; ?></td>
                                <td><?php echo $detail['kwh']; ?> kWh</td>
                                <td><?php echo number_format($detail['rate']); ?> រៀល</td>
                                <td><?php echo number_format($detail['cost']); ?> រៀល</td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    
                </div>
                
                <a href="exercise1.php" class="reset-btn" onclick="window.location.reload()"> គណនាថ្មី</a>
            <?php endif; ?>
            
        </div>
    </div>
</body>
</html>
    
 <!-- script -->
<script src="./main.js"></script>
</body>
</html>