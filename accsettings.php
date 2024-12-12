<?php
include 'config.php';
$email = $_SESSION['email'];
$sql = "SELECT * FROM `users` WHERE `email` = '$email'";
$result = mysqli_query($conn, $sql);
while ($row = $result->fetch_assoc()) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Anek+Devanagari:wght@100..800&family=Faculty+Glyphic&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Orbitron:wght@400..900&family=SUSE:wght@100..800&display=swap');

        *{
          font-family: "Open Sans", sans-serif;
          font-optical-sizing: auto;
          font-weight: 500;
          font-style: normal;
          font-size: 17px;
          font-variation-settings:
            "wdth" 100;
        }
    .switch {
        position: relative;
        display: inline-block;
        width: 34px;
        height: 20px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: .4s;
        border-radius: 34px;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 16px;
        width: 16px;
        left: 2px;
        bottom: 2px;
        background-color: white;
        border-radius: 50%;
        transition: .4s;
    }

    input:checked + .slider {
        background-color: #2196F3;
    }

    input:checked + .slider:before {
        transform: translateX(14px);
    }
</style>
<body class="bg-gray-900 text-white">

    <div class="flex">
        <!-- Sidebar -->
        <div id="sidebar" class="bg-gray-800 w-64 h-fit p-4 fixed inset-y-0 left-0 transform -translate-x-full md:translate-x-0 transition duration-200 ease-in-out">
            <h1 class="text-xl font-bold mb-6">Octa Invest</h1>
            <div class="mb-4">
                <p class="text-2xl capitalize py-5">Welcome, <?php echo $row['first-name']; ?>!</p>
            </div>
            <nav>
                <ul class="flex flex-col gap-5 pt-10">
                    <li class="mb-2 pb-3 border-b-2 border-white"><a href="./usedash.php" class="flex items-center hover:text-gray-400"><i class="fas fa-tachometer-alt mr-2"></i> Dashboard</a></li>
                    <li class="mb-2 pb-3 border-b-2 border-white"><a href="#" class="flex items-center hover:text-gray-400"><i class="fas fa-file-alt mr-2"></i> P/L record</a></li>
                    <li class="mb-2 pb-3 border-b-2 border-white"><a href="./usertrac.html" class="flex items-center hover:text-gray-400"><i class="fas fa-history mr-2"></i> Transactions history</a></li>
                    <li class="mb-2 pb-3 border-b-2 border-white"><a href="./funds.html" class="flex items-center hover:text-gray-400"><i class="fas fa-dollar-sign mr-2"></i> Deposit/Withdraw</a></li>
                    <li class="mb-2 pb-3 border-b-2 border-white"><a href="./invplan.html" class="flex items-center hover:text-gray-400"><i class="fas fa-dollar-sign mr-2"></i> Investment Plans</a></li>
                    <li class="mb-2 pb-3 border-b-2 border-white"><a href="./userref.html" class="flex items-center hover:text-gray-400"><i class="fas fa-link mr-2"></i> Referral Links</a></li>
                    <li class="mb-2 pb-3 border-b-2 border-white"><a href="./accsettings.php" class="flex items-center hover:text-gray-400"><i class="fas fa-gear mr-2"></i> Settings</a></li>
                </ul>
            </nav>
        </div>

        <!-- Overlay -->
        <div id="overlay" class="fixed inset-0 bg-black opacity-50 hidden"></div>

        <!-- Main Content -->
        <div class="flex-1 p-6 md:ml-64">
            <button id="hamburger" class="md:hidden text-white">
                <i class="fas fa-bars text-2xl"></i>
            </button>
            <h2 class="text-2xl font-bold mb-6">Account Profile Information</h2>
            <div class="bg-gray-700 p-6 rounded-lg shadow-lg">
                <div class="flex items-center mb-4">
                    <div class="w-16 h-16 bg-gray-600 rounded-full mr-4"></div>
                    <div>
                        <h3 class="text-xl font-bold capitalize"><?php echo $row['first-name'] ?> <?php echo $row['last-name'] ?></h3>
                        <p class="text-sm text-gray-400">OCTA INVEST USER</p>
                    </div>
                </div>

                <div class="mb-4 flex flex-col gap-2 py-5">
                    <p><strong>Email:</strong> <?php echo $row['email'] ?></p>
                    <p><strong>Country:</strong> <?php echo $row['country'] ?></p>
                    <p><strong>Phone:</strong> <?php echo $row['phone-no'] ?></p>
                    <p><strong>Date of Birth:</strong> June 12, 1986</p>
                </div>

                <div class="flex items-center mb-6">
                    <p class="mr-4">Dashboard Style:</p>
                    <label class="switch">
                        <input type="checkbox">
                        <span class="slider round"></span>
                    </label>
                </div>

                <button class="bg-blue-600 hover:bg-blue-500 text-white py-2 px-4 rounded">Update Picture</button>
                <button class="bg-green-600 hover:bg-green-500 text-white py-2 px-4 rounded ml-4">Update Info</button>
            </div>
        </div>
    </div>

    <script>
        const hamburger = document.getElementById('hamburger');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        hamburger.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        });

        overlay.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        });
    </script>

</body>
</html>
<?php
}
?>