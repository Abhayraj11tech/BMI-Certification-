<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI Certification</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 flex justify-center items-center min-h-screen">

<div class="w-[800px] rounded-2xl shadow-lg bg-white mt-[100px] mb-[100px]">
    <div class="bg-gradient-to-r from-blue-500 to-blue-900 h-[180px] p-10 text-white font-bold rounded-t-2xl mt[100px]">
        <div class="text-2xl mt-[60px]">BMI Certification</div>
        <div class="font-normal"><?php echo date('F j, Y'); ?></div>
    </div>

    <div class="bg-white p-10 rounded-b-2xl">
        <div class="flex items-center space-x-6 bg-white">
            <?php
                $profilePath = "No file uploaded"; 
                if (isset($_FILES['profile']) && $_FILES['profile']['error'] == 0) {
                    $targetDir = "uploads/";
                    if (!is_dir($targetDir)) {
                        mkdir($targetDir, 0777, true);
                    }

                    $fileName = basename($_FILES["profile"]["name"]);
                    $targetFile = $targetDir . $fileName;
                    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
                    $allowedTypes = ['jpg', 'jpeg', 'png'];

                    if (in_array($fileType, $allowedTypes)) {
                        if (move_uploaded_file($_FILES["profile"]["tmp_name"], $targetFile)) {
                            $profilePath = $targetFile;
                        } else {
                            $profilePath = "Upload failed";
                        }
                    } else {
                        $profilePath = "Invalid file type";
                    }
                }
                if ($profilePath !== "No file uploaded" && $profilePath !== "Upload failed" && $profilePath !== "Invalid file type") {
                    echo "<img src='$profilePath' alt='Profile Image' class='w-[100px] h-[100px] rounded-full border border-gray-300'>";
                } else {
                    echo "<p>$profilePath</p>";
                }
            ?>

            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $name = $_POST['name'] ?? 'Not provided';
                    $age = $_POST['age'] ?? 'Not provided';
                    $gender = $_POST['gender'] ?? 'Not provided';
                    $weight = isset($_POST['weight']) ? floatval($_POST['weight']) : 0;
                    $height = isset($_POST['height']) ? floatval($_POST['height']) : 0;

                    $bmi = ($height > 0) ? round($weight / ($height * $height), 2) : "Invalid height";

                    echo "
                    <div class='mt-[-35px]'>
                        <h1 class='text-3xl font-semibold text-black mt-10 ml-8'>$name</h1>
                        <div class='grid grid-cols-2 gap-x-12 mt-3 text-sm text-gray-600 '>
                            <div>
                                <p class='text-xs ml-8'>Age</p>
                                <p class='font-medium text-black ml-8'>$age years</p>
                            </div>
                            <div>
                                <p class='text-xs ml-[180px] mt-[-2px]'>Gender</p>
                                <p class='font-medium text-black ml-[180px]'>$gender</p>
                            </div>
                            <div>
                                <p class='text-xs ml-[30px] mt-5 ' >Height</p>
                                <p class='font-medium text-black ml-[30px]'>$height m</p>
                            </div>
                            <div>
                                <p class='text-xs ml-[180px] mt-5'>Weight</p>
                                <p class='font-medium text-black ml-[180px]'>$weight kg</p>
                            </div>
                           
                        </div>
                    </div>";
                } else {
                    echo "<p class='text-red-500'>Invalid Request Method</p>";
                }
            ?>
        </div>
    </div>

    <div class="bg-white mt-[-20px] rounded-4xl">
        <div class="bg-sky-100 p-10 m-10 mt-12 rounded-2xl ">
           <h1 class="text-center mt-[-10px] font-bold text-[20px]">BMI Score</h1> 
           <h1 class="text-center mt-[-10px] font-bold">
           <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                
                    $weight = isset($_POST['weight']) ? floatval($_POST['weight']) : 0;
                    $height = isset($_POST['height']) ? floatval($_POST['height']) : 0;

                    $bmi = ($height > 0) ? round($weight / ($height * $height), 2) : "Invalid height";
                    echo"<h1 class='text-[40px] mt-5 text-center text-green-600 font-bold'>$bmi</h1>";
                    if($bmi <= 18.5){
                        echo"<h1 class='text-[20px] mt-[-5px]  text-green-600 font-bold text-center'>Underweight</h1>";
                    }
                    else if($bmi>=18.5 && $bmi<=24.9){
                        echo"<h1 class='text-[20px] mt-[-5px] text-green-600 font-bold text-center'>Normal</h1>";

                    }
                    else if($bmi>=25 && $bmi<=29.9){
                        echo"<h1 class='text-[20px] mt-[-5px]  text-green-600 font-bold text-center'>Overweight</h1>";

                    }
                    else if($bmi>=30 && $bmi<=34.9){
                        echo"<h1 class='text-[20px] mt-[-5px] text-green-600 font-bold text-center'>Obesity Class I</h1>";

                    }
                    else if($bmi>=35 && $bmi<=39.9){
                        echo"<h1 class='text-[20px] mt-[-5px] text-green-600 font-bold text-center'>Obesity Class II</h1>";

                    }
                    else{
                        echo"<h1 class='text-[20px] mt-[-5px] text-green-600 font-bold text-center'>Obesity Class III(Severe)</h1>";

                    }
                }
                else{
                    echo "Invalid";
                }
                echo"<hr class='mt-10 text-gray-900'>";


            ?>
           </h1> 
           <div>
                <h1 class="mt-10">
                <b class="ml-10 mt-[-100px] mb-[100px]">Next Milestone</b>
                <img src="https://cdn.jsdelivr.net/npm/lucide-static@0.344.0/icons/target.svg" alt="" class="mt-[-23px]">
                </h1>
                <p class="ml-10">
                      <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                
                         $weight = isset($_POST['weight']) ? floatval($_POST['weight']) : 0;
                         $height = isset($_POST['height']) ? floatval($_POST['height']) : 0;

                         $bmi = ($height > 0) ? round($weight / ($height * $height), 2) : "Invalid height"; 
                         }
                        else{
                            echo "Invalid";
                        }

                        if($bmi <= 18.5){
                            echo"<h1 class=' ml-[40px]'>Gaining healthy weight while improving muscle mass and energy levels.</h1>";
                        }
                        else if($bmi>=18.5 && $bmi<=24.9){
                            echo"<h1 class=' ml-[40px] '>Maintaining current BMI while improving strength and endurance.</h1>";
                        }
                        else if($bmi>=25 && $bmi<=29.9){
                            echo"<h1 class=' ml-[40px]'> Reducing body fat while enhancing fitness and stamina.</h1>";
                        }
                        else{
                            echo"<h1 class=' ml-[40px]'> Achieving a healthier BMI through gradual weight loss and increased activity.</h1>";
                        }
                      ?>
                </p>
           </div>
           <div>
                <h1 class="mt-10">
                <b class="ml-10 mt-[-100px] mb-[100px]">Personalized Recommendation</b>
                <img src="https://cdn.jsdelivr.net/npm/lucide-static@0.344.0/icons/sparkles.svg" alt="" class="mt-[-23px]">
                </h1>
                <p class="ml-10">
                <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                
                         $weight = isset($_POST['weight']) ? floatval($_POST['weight']) : 0;
                         $height = isset($_POST['height']) ? floatval($_POST['height']) : 0;

                         $bmi = ($height > 0) ? round($weight / ($height * $height), 2) : "Invalid height"; 
                         }
                        else{
                            echo "Invalid";
                        }

                        if($bmi <= 18.5){
                            echo"<h1 class=' ml-[40px]'>Increase calorie intake with nutrient-dense foods and engage in strength training for healthy weight gain.</h1>";
                        }
                        else if($bmi>=18.5 && $bmi<=24.9){
                            echo"<h1 class=' ml-[40px] '>Maintain your healthy weight through balanced nutrition and regular exercise. Focus on toning and overall fitness.</h1>";
                        }
                        else if($bmi>=25 && $bmi<=29.9){
                            echo"<h1 class=' ml-[40px]'>Adopt a calorie-controlled diet and incorporate regular physical activity to promote gradual fat loss.</h1>";
                        }
                        else{
                            echo"<h1 class=' ml-[40px]'> Prioritize sustainable weight loss with a structured diet plan and consistent exercise routine.</h1>";
                        }
                      ?>                </p>
           </div>
           <div>
                <h1 class="mt-10">
                <b class="ml-10 mt-[-100px] mb-[100px]">Recommended Activities</b>
                <img src="https://cdn.jsdelivr.net/npm/lucide-static@0.344.0/icons/sparkles.svg" alt="" class="mt-[-23px]">
                </h1>
                
                <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                
                         $weight = isset($_POST['weight']) ? floatval($_POST['weight']) : 0;
                         $height = isset($_POST['height']) ? floatval($_POST['height']) : 0;

                         $bmi = ($height > 0) ? round($weight / ($height * $height), 2) : "Invalid height"; 
                         }
                        else{
                            echo "Invalid";
                        }

                        if($bmi <= 18.5){
                            echo"<h1 class=' ml-[40px]'><ul class='ml-1'> <li>🔹Strength training for muscle gain</li> <li>🔹 Calorie-dense meal planning</li> <li>🔹 Yoga for flexibility</li> </ul></h1>";
                        }
                        else if($bmi>=18.5 && $bmi<=24.9){
                            echo"<h1 class=' ml-[40px]'>
<ul class='ml-1'> 
<li>🔹Mix of cardio and strength training</li> <li>🔹Flexibility exercises</li> <li>🔹Sports activities</li> </ul>                            </h1>";
                        }
                        else if($bmi>=25 && $bmi<=29.9){
                            echo"<h1 class=' ml-[40px]'>
                          <ul class='ml-1'> <li>🔹Low-impact cardio (walking, swimming, cycling)</li> <li>🔹Strength training for fat loss</li> <li>🔹Core strengthening exercises</li> </ul>
                            </h1>";
                        }
                        else{
                            echo"<h1 class=' ml-[40px]'> 
                           <ul class='ml-1'> <li>🔹Walking and water aerobics</li> <li>🔹Gradual strength training</li> <li>🔹Gentle yoga and stretching</li> </ul>
                            </h1>";
                        }
                      ?>                      

           </div>
           
        </div>
    </div>
    <div class="mb-10  bg-orange-500">
    <img src="https://cdn.jsdelivr.net/npm/lucide-static@0.344.0/icons/flashlight.svg" alt="Torch Icon" class="w-6 h-6 ml-10">
    <h1 class="ml-20 mt-[-25px] text-[17px] font-[dancing]">"Every step forward is a step toward achieving something bigger and better than your current situation."</h1>
    </div>

    
    <div class="mb-25 mt-10">
        <div class="ml-10 text-[20px] font-bold mt-10">Fitness Tips</div>
        <div class="flex mt-10 ml-10  ">
            <div class="font-bold text-[18px] bg-slate-100 rounded-3xl w-[700px] p-10">
            <img src="https://cdn.jsdelivr.net/npm/lucide-static@0.344.0/icons/dumbbell.svg" alt="Torch Icon" class="w-6 h-6 ml-20 mb-3 mt-[-8px]">

                Regular Exercise <br> <p class="text-[15px] mt-2 font-normal">Aim for 150 minutes of moderate activity weekly</p>
        </div>
            <div class="ml-[100px] text-[18px] font-bold bg-slate-100 rounded-3xl w-[700px] p-10 mr-10">
            <img src="https://cdn.jsdelivr.net/npm/lucide-static@0.344.0/icons/utensils.svg" alt="Torch Icon" class="w-6 h-6 ml-20 mb-3 mt-[-8px]"> 
            Balanced Diet
            <p class="text-[15px] mt-2 font-normal">
Focus on whole foods and portion control</p>
            </div>
        </div>
        </div>
        <div class="ml-10 text-[20px] font-bold mb-10"></div>
        <div class="flex mt-10 ml-10 mb-20 ">
            <div class="font-bold text-[18px] bg-slate-100 rounded-3xl w-[700px] p-10">
            <img src="https://cdn.jsdelivr.net/npm/lucide-static@0.344.0/icons/trending-up.svg" alt="Torch Icon" class="w-6 h-6 ml-20 mb-3 mt-[-8px]">

            Set Goals <br> <p class="text-[15px] mt-2 font-normal">Create achievable fitness milestones</p>
        </div>
            <div class="ml-[100px] text-[18px] font-bold bg-slate-100 rounded-3xl w-[700px] p-10 mr-10">
            <img src="https://cdn.jsdelivr.net/npm/lucide-static@0.344.0/icons/activity.svg" alt="Torch Icon" class="w-6 h-6 ml-20 mb-3 mt-[-8px]">

            Strength Training
            <p class="text-[15px] mt-2 font-normal">
            Include resistance exercises 2-3 times per week</p>
            </div>
        </div>

        </div>
        </div>
        </div>
    </div>


</div>

</body>
</html>
