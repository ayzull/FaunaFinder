<?php
require 'inc/sess.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Form | Fauna Finder</title>
    <link rel='stylesheet' type='text/css' media='screen' href='css/Packages-page/book.css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    require 'inc/header.php';
    ?>

    <main>
        <div class="tickets">
            <h2>Ticket Form</h2>
            <p>Please take a moment to fill out the form.</p>
            <form action="payment.php" method="POST" id="paymentform">
                <label for="package">Select Package:</label>
                <select name="package" id="package" onchange="checkField()">
                    <option value="" selected>Select Package</option>
                    <option value="basic">Basic</option>
                    <option value="annual">Annual Pass</option>
                </select><br>
                <div class="form-container"></div>
                <div id="total-amount" style="display: none;">
                    <label for="total">Total Amount:</label>
                    <input type="text" name="total" value="0.00" id="total" readonly><br>
                </div>
                <input type="submit" value="Proceed">
            </form>
        </div>
    </main>

    <?php
    require 'inc/footer.php';
    ?>

    <script type="text/javascript">
        let adult = 40;
        let children = 20;
        let old = 30;
        let annual = 200;

        function onCalculate() {
            var package = $('#package option:selected').val();

            if (package == "basic") {
                var adultqty = $('#adult').val() || 0;
                var childqty = $('#children').val() || 0;
                var oldqty = $('#old').val() || 0;

                let adulttotal = parseFloat(adultqty) * parseFloat(adult);
                let childtotal = parseFloat(childqty) * parseFloat(children);
                let oldtotal = parseFloat(oldqty) * parseFloat(old);
                var final = parseFloat(adulttotal) + parseFloat(childtotal) + parseFloat(oldtotal);

            } else if (package == "annual") {
                var totalqty = $('#totalqty').val();
                var final = parseFloat(annual) * parseFloat(totalqty);

            } else {
                var final = 0;
            }

            $('#total').val(parseFloat(final).toFixed(2));
        }

        function checkField() {
            var package = $('#package option:selected').val();
            var formHTML = "";

            if (package == "basic") {
                formHTML += `
                    <div class="form-section">
                        <label for="date">Select Date:</label>
                        <input id="date" type="date" name="date"><br>
                    </div>
                    <div class="form-section">
                        <label for="adult">Number of Adult * :</label>
                        <input type="number" name="adult" value="0" min="0" id="adult" onchange="onCalculate()" onkeyup="onCalculate()"><br>
                    </div>
                    <div class="form-section">
                        <label for="children">Number of Children:</label>
                        <input type="number" name="children" value="0" min="0" id="children" onchange="onCalculate()" onkeyup="onCalculate()"><br>
                    </div>
                    <div class="form-section">
                        <label for="senior">Number of Senior Citizen:</label>
                        <input type="number" name="senior" value="0" min="0" id="old" onchange="onCalculate()" onkeyup="onCalculate()"><br>
                    </div>`;
            } else if (package == "annual") {
                formHTML += `
                    <div class="form-section">
                        <label for="totalqty">Total Quantity:</label>
                        <input type="number" name="totalqty" value="0" id="totalqty" onchange="onCalculate()" onkeyup="onCalculate()"><br>
                    </div>`;
            }

            $('.form-container').html(formHTML);

            if (package == "basic" || package == "annual") {
                $('#total-amount').show();
            } else {
                $('#total-amount').hide();
            }

            $('#total').val('0.00');


        }

        
        $('#paymentform').submit(function (e) {
            e.preventDefault();
            var total = $('#total').val();
            const dateInput = document.getElementById("date");
            if (dateInput.value === "") {
                alert("Please select a date.");
            }
            else if (parseFloat(total) <= 0) {
                alert("Please select a valid quantity");
            } else {
                document.getElementById("paymentform").submit();
            }
        });
    </script>
</body>

</html>