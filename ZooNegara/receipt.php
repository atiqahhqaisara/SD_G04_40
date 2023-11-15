<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Receipt</title>
    <!-- Add your styling here -->
</head>
<body>

<div>
    <h1>Payment Receipt</h1>

    <p><strong>Name:</strong> <?php echo $fullName; ?></p>
    <p><strong>Email:</strong> <?php echo $email; ?></p>
    <p><strong>Phone:</strong> <?php echo $phone; ?></p>
    <p><strong>Grand Total:</strong> <?php echo number_format($grandTotal / 100, 2); ?> MYR</p>

    <h2>Transaction Details</h2>
    <p><strong>Bill Code:</strong> <?php echo $billcode; ?></p>
    <!-- Add more transaction details as needed -->

    <p>Thank you for your payment. Your transaction has been processed successfully.</p>
</div>

</body>
</html>
