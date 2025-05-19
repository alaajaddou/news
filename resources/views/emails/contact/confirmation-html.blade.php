<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Thank You - Alaa M. Jaddou</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8fafc;
            color: #1a202c;
            padding: 40px;
        }
        .email-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            max-width: 600px;
            margin: auto;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        h1 {
            color: #1a202c;
        }
        a.button {
            display: inline-block;
            padding: 12px 24px;
            background-color: #1a202c;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
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
    <h1>Thank You, {{ $contact->name }}</h1>
    <p>We've received your message and are thrilled you reached out to <strong>Alaa M. Jaddou</strong>.</p>
    <p>Our team will review your inquiry and get back to you as soon as possible.</p>
    <p>If you need urgent assistance, you can contact us directly at <a href="mailto:info@alaajaddou.com">info@alaajaddou.com</a>.</p>

    <a href="{{ config('app.url') }}" class="button">Visit Our Website</a>

    <p class="footer">Thanks again,<br><strong>Alaa M. Jaddou Team</strong></p>
</div>
</body>
</html>