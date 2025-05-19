<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Contact Message - Alaa M. Jaddou</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8fafc;
            color: #1a202c;
            padding: 40px;
        }
        .email-container {
            padding: 30px;
            border-radius: 8px;
            margin: auto;
        }
        h1 {
            color: #1a202c;
        }
        .info {
            background-color: #edf2f7;
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
        }
        .info p {
            margin: 5px 0;
        }
        .footer {
            margin-top: 30px;
            font-size: 0.9em;
            color: #718096;
        }
    </style>
</head>
<body>
<div class="email-container">
    <h1>New Contact Message</h1>
    <p>You've received a new message from the contact form on your website.</p>

    <div class="info">
        <p><strong>Name:</strong> {{ $contact->name }}</p>
        <p><strong>Email:</strong> {{ $contact->email }}</p>
        <p><strong>Message:</strong></p>
        <p>{{ $contact->message }}</p>
    </div>

    <p class="footer">This message was sent from the contact form on <strong>alaajaddou.com</strong>.</p>
</div>
</body>
</html>