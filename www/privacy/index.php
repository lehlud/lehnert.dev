<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Privacy Policy</title>

    <style>
        :root {
            --accent: #00ffe0;
            --accent2: #ff79c6;
            --bg: linear-gradient(135deg, #0f0f1f, #000010);
            --glass: rgba(255, 255, 255, 0.06);
            --glass-border: rgba(255, 255, 255, 0.12);
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 2rem 1rem;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--bg);
            color: #e0e0e0;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 2rem;
            min-height: 100vh;
        }

        .glass-box {
            background: var(--glass);
            border: 1px solid var(--glass-border);
            border-radius: 1rem;
            padding: 2rem 2rem;
            width: 100%;
            max-width: 720px;
            backdrop-filter: blur(12px);
            box-shadow: 0 0 20px rgba(0, 255, 255, 0.05), 0 4px 20px rgba(0, 0, 0, 0.3);
            animation: fadeIn 0.8s ease-out both;
        }

        h1 {
            color: var(--accent);
            font-size: 1.6rem;
            margin-bottom: 1rem;
            text-shadow: 0 0 8px rgba(0, 255, 255, 0.4);
        }

        h2 {
            color: var(--accent2);
            font-size: 1.1rem;
            margin-top: 2rem;
        }

        p {
            line-height: 1.7;
            margin: 0.8rem 0;
        }

        a {
            color: var(--accent);
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .footer-note {
            font-size: 0.85rem;
            color: #999;
            text-align: right;
            margin-top: 2rem;
        }

        .divider {
            height: 2px;
            width: 60px;
            background: var(--accent);
            opacity: 0.4;
            border-radius: 100px;
            margin: 0 auto;
        }

        @media (max-width: 480px) {
            body {
                padding: 1.5rem 1rem;
            }

            .glass-box {
                padding: 1.5rem 1.2rem;
            }

            h1 {
                font-size: 1.4rem;
            }

            h2 {
                font-size: 1rem;
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>

    <div class="glass-box">
        <h1>Datenschutzerklärung</h1>

        <h2>Verantwortliche Stelle</h2>
        <p>Ludwig Lehnert<br>Zedernstr. 41<br>90441 Nürnberg<br>E-Mail: <a
                href="mailto:privacy@lehnert.dev">privacy@lehnert.dev</a></p>

        <h2>Erhobene Daten</h2>
        <p>Diese Website erhebt keine personenbezogenen Daten über Formulare oder Tracking-Dienste. Es werden keine
            Cookies verwendet und keine Drittanbieter-Analyse-Tools eingebunden.</p>

        <h2>Server-Hosting</h2>
        <p>Die Website wird bei der Hetzner Online GmbH (Industriestr. 25, 91710 Gunzenhausen, Deutschland) gehostet. Es
            besteht ein Auftragsverarbeitungsvertrag gemäß Art. 28 DSGVO.</p>

        <h2>Zugriffsprotokolle</h2>
        <p>Beim Zugriff auf die Website speichert der Server automatisch sogenannte Logfiles, die IP-Adresse und
            Zeitstempel enthalten. Diese Daten werden ausschließlich für Sicherheit, Fehlererkennung und Statistiken
            genutzt und nach 90 Tagen automatisch gelöscht.</p>

        <h2>Ihre Rechte</h2>
        <p>Sie haben das Recht auf Auskunft, Berichtigung, Löschung, Einschränkung der Verarbeitung sowie ein
            Widerspruchsrecht. Bitte kontaktieren Sie mich über die oben genannte E-Mail-Adresse.</p>

        <div class="footer-note">Stand: 16. April 2025</div>
    </div>

    <div class="divider"></div>

    <div class="glass-box">
        <h1>Privacy Policy</h1>

        <h2>Controller</h2>
        <p>Ludwig Lehnert<br>Zedernstr. 41<br>90441 Nuremberg, Germany<br>Email: <a
                href="mailto:privacy@lehnert.dev">privacy@lehnert.dev</a></p>

        <h2>Data Collected</h2>
        <p>This website does not collect personal data via forms or third-party tracking tools. No cookies or analytics
            are used.</p>

        <h2>Server Hosting</h2>
        <p>The site is hosted by Hetzner Online GmbH (Industriestr. 25, 91710 Gunzenhausen, Germany). A data processing
            agreement has been signed in accordance with Art. 28 GDPR.</p>

        <h2>Access Logs</h2>
        <p>When accessing the site, the server automatically stores log files that include your IP address and
            timestamp. These logs are used solely for security, debugging, and statistical purposes and are
            automatically deleted after 90 days.</p>

        <h2>Your Rights</h2>
        <p>You have the right to request access to your data, rectify or delete it, restrict processing, and object to
            certain uses. Feel free to reach out via email.</p>

        <div class="footer-note">Last updated: April 16, 2025</div>
    </div>

</body>

</html>