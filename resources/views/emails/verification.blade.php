@props(['url'])

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Coronatime - Verify email</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    </head>

    <body style="width:100%; font-family: Inter, sans-serif">
        <main style="width:100%; padding:0 1.25rem;">
            <figure style="width:100%; margin:auto;">
                <img src="{{ $message->embed(public_path() . '/images/dashboard.png')}}" alt="Coronatime dashboard page" style="display:block; width:100%; max-width:32.5rem; margin:auto;">
            </figure>
            
            <section style="width:100%; max-width:32.5rem; margin:3.5rem auto 0;">
                <h1 style="color:#000000; font-size:1.5rem; text-align:center; font-weight:900;">Confirmation email</h1>
                <h2 style="color:#000000; margin-top:1rem; font-size:1.125rem; text-align:center;">click this button to verify your email</h2>
                <a href="{{ $url }}" style="background-color:#22c55e; color:#ffffff; display:block; width:100%; max-width:24rem; margin:2.5rem auto 0; padding:1.125rem 0; font-size:0.875rem; text-align:center; font-weight:900; text-decoration:none; border-radius:0.5rem;" >
                    VERIFY EMAIL
                </a>
            </section>
        </main>
    </body>
</html>