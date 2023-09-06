<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Our Website</title>
</head>
<body>
    <h1>Welcome to Our Website</h1>
    <p>Dear Collector,</p>
    <p>I hope this message finds you well. This Email request an urgent waste collection for the bin located at {{$data['address']}}. The bin is currently full, and we kindly request your immediate attention to empty it.</p>
    <p>Bin Location: {{$data['address']}}</p>
    <p>Bin Type/Size: {{$data['category']}}</p>
    <p>Date and Time of Notice: {{$data['time']}}</p>
    <p>Best regards,</p>
    <p>Your System Team</p>
</body>
</html>
