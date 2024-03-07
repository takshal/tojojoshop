<!DOCTYPE html>
<html>
<head>
    <title>tojojo's Bug Bounty Labs</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
         <link rel="stylesheet" href="assets/style.css">
</head>
<body>
      <main>
        <div class="container px-4 py-5" id="custom-cards">
            <div class="row border-bottom pb-2">
                <div class="col">
                    <img src="assets/logo-main.png" alt="Logo" height="100px" width="100px">
                    <h2 class="d-inline">tojojo's Bug Bounty Labs</h2>
                </div>
                <div class="col text-end">
                    <a href="/capstone/index.php" class="btn btn-outline-secondary me-2" data-bs-toggle="modal"
                        data-bs-target="#instructionsModal">Instructions</a>
                </div>
            </div>
           <br>
            
           <!DOCTYPE html>

    <div class="container mt-5"></div>
        
           
 <p>Dear hacker, welcome to our lab! Remember, hacking is not just about technical skills, it's also about mindset. Take a break, relax, and let your creativity flow. Explore our challenges, think outside the box, and most importantly, have fun!</p>
                    <p>Here are a few tips to get you started:</p>
                    <ul>
                        <li>Stay curious and keep learning.</li>
                        <li>Think like an attacker to find vulnerabilities.</li>
                        <li>Collaborate with fellow hackers to solve challenges.</li>
                    </ul>
                    <p>Happy hacking! Good Luck</p>
           
                
             

            

           
        
        <div>
            <p class="small text-center">Don't forget to take regular breaks, you got this :)</p>
            <p class="small text-center">tojojo's Practical Bug Bounty Labs Version 1.0</p>
        </div>
        <!-- instructions modal -->
    
        </div>
    </main>


    <script>
    window.onload = function() {
        for (let i = 1; i <= 19; i++) {
            if (localStorage.getItem('checkbox' + i) === 'true') {
                document.getElementById('checkbox' + i).checked = true;
                document.getElementById('card' + i).classList.add('bg-green');
            }
        }
    }

    function updateBackground(cardId, checkboxId) {
        var card = document.getElementById(cardId);
        var checkbox = document.getElementById(checkboxId);

        if (checkbox.checked == true) {
            card.classList.add('bg-green');
            card.classList.remove('bg-grey');
            localStorage.setItem(checkboxId, 'true');
        } else {
            card.classList.add('bg-grey');
            card.classList.remove('bg-green');
            localStorage.setItem(checkboxId, 'false');
        }
    }
    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>