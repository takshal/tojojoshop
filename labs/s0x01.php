<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tojojo shop Bug Bounty Labs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<style> .my-color{background-color:#fff3cd}</style>
<body>

    <main>
        <div class="container px-4 py-5" id="custom-cards">
            <div class="row justify-content-end">
                <div class="col-auto">
                    <a href="/tojojoshop/instructions.php" class="btn btn-outline-secondary" data-bs-toggle="modal"
                        data-bs-target="#instructionsModal">Instructions</a>
                </div>
            </div>
            <h2 class="pb-2 border-bottom"><a href="../index.php">Labs</a> / SSRF 0x01</h2>

            <div class="p-5 mb-4 bg-light rounded-3">
                <h2>Price comparison</h2>
                <div class="mb-4 bg-light rounded-3">
                    <div class="row">
                        <div class="col-6">
                            <img src="../assets/headphones.png" class="img-fluid">
                        </div>
                        <div class="col-6">
                            <h3>AuraSync™ Neural Harmonizers</h3>
<p>Embark on an odyssey through the uncharted territories of sound with the AuraSync™ Neural Harmonizers. Crafted for the visionary pioneers of auditory exploration, these devices transcend conventional headphones—they're conduits to a symphony of new experiences.</p>
<h4>Infinite Connectivity:</h4>
<p>Powered by Quantum Link technology, the CyberGuardian ensures your connection remains impervious to surveillance. Whether you're navigating digital mazes or bypassing security barriers, rest assured your anonymity is safeguarded.</p>
<h4>Neural Fusion Experience:</h4>
<p>Prepare to be enveloped in a tapestry of sensations with our innovative Neural Fusion technology. These harmonizers transcend mere wearables; they become extensions of your consciousness, syncing effortlessly with your thoughts and instincts.</p>                            <p>RRP: $199</p>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="mb-3">
                            <button data-url="http://localhost/tojojoshop/labs/api/thirdparty/amazoom.php" class="btn btn-secondary check-price-btn" style="width: 10em">Check
                                price</button> Amazoom online market place
                        </div>
                        <div class="mb-3">
                            <button data-url="http://localhost/tojojoshop/labs/api/thirdparty/allbuymyself.php" class="btn btn-secondary check-price-btn" style="width: 10em">Check
                                price</button> AllBuyMyself shopping
                        </div>
                        <div class="mb-3">
                            <button data-url="http://localhost/tojojoshop/labs/api/thirdparty/checkmeout.php" class="btn btn-secondary check-price-btn" style="width: 10em">Check
                                price</button> CheckMeOut market
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let buttons = document.querySelectorAll('.check-price-btn');

            buttons.forEach(button => {
                button.addEventListener('click', async (e) => {
                    e.preventDefault();
                    let url = button.getAttribute('data-url');

                    let response = await fetch('/tojojoshop/labs/api/vendors_0x01.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            url: url
                        })
                    });

                    let data = await response.json();
                    if (data.status === 'success') {
                        let priceMatch = data.content.match(/"price":(\d+\.\d+)/);
                        if (priceMatch && priceMatch[1]) {
                            let price = parseFloat(priceMatch[1]);
                            button.classList.remove('btn-secondary');
                            button.classList.add('btn-success');
                            button.textContent = `$${price.toFixed(2)}`;
                        } else {
                            button.textContent = 'Error';
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>