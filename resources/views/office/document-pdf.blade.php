<html>
<head>
    <meta charset="utf-8">
    <style>
{{--     It generates PDF document dynamically and requires inline CSS   --}}
        body {
            font-family: DejaVu Sans, sans-serif;
        }
    </style>
</head>
<body>
{!! app_clean_html_content($document->content) !!}
</body>
</html>
