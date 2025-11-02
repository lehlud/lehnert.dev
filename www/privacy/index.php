<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="/favicon.svg" type="image/x-icon">
    <title>Imprint / Datenschutzerklärung</title>
    <style>
        body {
            margin: 0;
            padding: 0.8rem;
            background-color: #000000;
            color: white;
            font-family: 'Courier New', Courier, monospace;
            font-size: 1rem;
            line-height: 1.6;
        }

        .prompt::before {
            content: "ludwig@laptop:~$ ";
            color: #00ff88;
        }

        a {
            color: #00ffff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .comment {
            color: #666;
            font-style: italic;
            margin-bottom: 0;
        }

        .comment+* {
            margin-top: 0;
        }

        .cursor {
            display: inline-block;
            color: white;
            background-color: white;
            animation: blink 1s steps(1) infinite;
            margin-left: 6px;
            user-select: none;
        }

        @keyframes blink {
            50% {
                color: transparent;
                background-color: transparent;
            }
        }
    </style>
</head>

<body>
    <div class="prompt">cat datenschutz.txt</div>

    <p class="comment"># Verantwortliche Stelle</p>
    <p>
        Ludwig Lehnert<br />
        Zedernstr. 41<br />
        90441 Nürnberg<br />
        <a href="mailto:piracy@lehnert.dev">piracy@lehnert.dev</a>
    </p>

    <p class="comment"># Erhobene Daten</p>
    <p>
        Diese Website erhebt keine personenbezogenen Daten über Formulare oder Tracking-Dienste.<br/>
        Es werden keine Cookies verwendet und keine Drittanbieter-Analyse-Tools eingebunden.
    </p>
    
    <p class="comment"># Server-Hosting</p>
    <p>
        Die Website wird bei der Hetzner Online GmbH (Industriestr. 25, 91710 Gunzenhausen, Deutschland) gehostet.<br/>
        Es besteht ein Auftragsverarbeitungsvertrag gemäß Art. 28 DSGVO.
    </p>
    
    <p class="comment"># Zugriffsprotokolle</p>
    <p>
        Beim Zugriff auf die Website speichert der Server automatisch sogenannte Logfiles, die IP-Adresse und Zeitstempel enthalten.<br/>
        Diese Daten werden ausschließlich für Sicherheit, Fehlererkennung und Statistiken genutzt und nach 90 Tagen automatisch gelöscht.
    </p>
    
    <p class="comment"># Ihre Rechte</p>
    <p>
        Sie haben das Recht auf Auskunft, Berichtigung, Löschung, Einschränkung der Verarbeitung sowie ein Widerspruchsrecht.<br/>
        Bitte kontaktieren Sie mich über die oben genannte E-Mail-Adresse.
    </p>
    
    <p class="comment"># Stand</p>
    <p>Stand: 16. April 2025</p>
    
    
    <div class="prompt">cat privacy.txt</div>
    
    <p class="comment"># Controller</p>
    <p>
        Ludwig Lehnert<br/>
        Zedernstr. 41<br/>
        90441 Nuremberg<br/>
        Germany<br/>
        <a href="mailto:piracy@lehnert.dev">piracy@lehnert.dev</a>
    </p>
    
    <p class="comment"># Data Collected</p>
    <p>
        This website does not collect personal data via forms or third-party tracking tools.<br/>
        No cookies or analytics are used.
    </p>
    
    <p class="comment"># Server Hosting</p>
    <p>
        The site is hosted by Hetzner Online GmbH (Industriestr. 25, 91710 Gunzenhausen, Germany).<br/>
        A data processing agreement has been signed in accordance with Art. 28 GDPR.
    </p>
    
    <p class="comment"># Access Logs</p>
    <p>
        When accessing the site, the server automatically stores log files that include your IP address and timestamp.<br/>
        These logs are used solely for security, debugging, and statistical purposes and are automatically deleted after 90 days.
    </p>
    
    <p class="comment"># Your Rights</p>
    <p>
        You have the right to request access to your data, rectify or delete it, restrict processing, and object to certain uses.<br/>
        Feel free to reach out via email.
    </p>
    
    <p class="comment"># Last updated</p>
    <p>Last updated: April 16, 2025</p>

    <div class="prompt"><a href="/">exit</a><span class="cursor">I</span></div>
</body>

</html>