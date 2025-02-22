<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI Calculator</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 flex justify-center items-center min-h-screen">

    <div class="container bg-gray-100 p-10 m-10 max-w-3xl rounded-2xl shadow-lg">
        <h1 class="text-center text-5xl font-serif font-extrabold mb-6 text-gray-900">BMI Calculator</h1>
        <h2 class="text-center text-xl font-serif font-semibold mb-8 bg-gray-900 text-white py-2 tracking-widest">BODY MASS INDEX</h2>

        <div class="flex justify-center">
            <img src="https://img.freepik.com/premium-vector/body-mass-index-weight-control-with-bmi-gauge_664444-1.jpg" alt="BMI Chart" class="h-52 w-auto rounded-lg shadow-md">
        </div>

        <div class="text-center text-sm font-serif mt-10 leading-relaxed">
            <p class="font-extrabold text-lg">Body Mass Index (BMI) – A Detailed Explanation</p>
            <p class="mt-4">BMI is a numerical value derived from weight and height, used to classify individuals into weight categories for potential health risks. Although it does not directly measure body fat, it provides a general assessment of weight status.</p>
        </div>

        <div class="bg-gray-900 text-white text-center p-8 mt-10 rounded-lg shadow-md">
            <div class="flex justify-center">
                <img src="https://cdn-icons-png.flaticon.com/512/3475/3475286.png" alt="BMI Formula" class="h-16 w-16">
            </div>
            <p class="text-lg font-bold underline mt-4">BMI Formula:</p>
            <p class="text-lg mt-2">BMI = Weight (KG) / Height (m)²</p>
        </div>

        <div class="text-center mt-10">
            <h1 class="text-5xl font-extrabold drop-shadow-lg text-orange-700 font-[Dancing Script]">
                It's Time to Check Your Score!!
            </h1>
        </div>

    
        <div class="mt-20 mb-1">
            <form class="space-y-6" method="POST" action="bmi.php" enctype="multipart/form-data">


                <div>
                    <label class="block font-semibold mb-1">Name:</label>
                    <input type="text" name="name" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-400" placeholder="Abhayraj Singh Mandloi">
                </div>

                <div>
                    <label class="block font-semibold mb-1">Age:</label>
                    <input type="number" name="age" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-400"  placeholder="19">
                </div>

                <div>
                    <label class="block font-semibold mb-2">Gender:</label>
                    <div class="flex items-center space-x-6">
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="gender" required value="Male" class="w-5 h-5 accent-blue-500" >
                            <span>Male</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="gender" required value="Female" class="w-5 h-5 accent-pink-500">
                            <span>Female</span>
                        </label>
                    </div>
                </div>

                <div>
                    <label class="block font-semibold mb-1">Profile Image:</label>
                    <input type="file" name="profile" required accept=".png, .jpg, .jpeg" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-400">
                </div>

                <div>
                    <label class="block font-semibold mb-1">Enter your Weight (Kg):</label>
                    <input type="number" step="0.01"  name="weight"  required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-400" placeholder="65.50">
                </div>

                <div>
                    <label class="block font-semibold mb-1">Enter your Height (m):</label>
                    <input type="number" required step="0.01" name="height"  class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-400" placeholder="1.63">
                </div>

                <button type="submit" class="w-full bg-blue-500 text-white font-bold py-3 rounded-lg hover:bg-blue-600 transition-all">
                    Calculate BMI
                </button>
            </form>
        </div>
    </div>

</body>
</html>
 