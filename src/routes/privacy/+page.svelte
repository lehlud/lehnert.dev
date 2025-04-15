<script lang="ts">
    // Optional: add any TS logic here
</script>

<main>
    <h1>Datenschutzerklärung<br />Privacy Policy</h1>
    <div class="legal-section">
        <p><strong>Deutsch:</strong></p>
        <p>
            Wir nehmen den Schutz Ihrer persönlichen Daten sehr ernst. Beim
            Besuch dieser Website werden automatisch Server-Logfiles erfasst
            (z.B. IP-Adresse, Uhrzeit des Zugriffs), die zur Gewährleistung des
            Betriebs und zur Sicherheit der Website notwendig sind. Diese Daten
            werden für maximal 90 Tage gespeichert und danach automatisch
            gelöscht.
        </p>
        <p>
            Diese Website wird über die Hetzner Cloud gehostet. Es gelten
            zusätzlich die Datenschutzbestimmungen der Hetzner Online GmbH: <a
                href="https://www.hetzner.com/de/legal/privacy-policy/"
                target="_blank">Hetzner Datenschutzerklärung</a
            >.
        </p>

        <p><strong>English:</strong></p>
        <p>
            We take the protection of your personal data very seriously. When
            visiting this website, server log files (e.g. IP address, access
            time) are automatically collected for the purpose of operation and
            security. These logs are stored for a maximum of 90 days and then
            automatically deleted.
        </p>
        <p>
            This website is hosted via Hetzner Cloud. The privacy policy of
            Hetzner Online GmbH also applies: <a
                href="https://www.hetzner.com/legal/privacy-policy"
                target="_blank">Hetzner Privacy Policy</a
            >.
        </p>
    </div>
</main>

<style>
    main {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        min-height: 80vh;
        color: white;
        font-family: "Inter", sans-serif;
        text-align: center;
        padding: 2rem;

        pointer-events: none;
    }

    h1 {
        font-size: 2.5rem;
        background: linear-gradient(90deg, #00ffff, #ff00ff);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 1rem;
        animation: glitch 2s infinite;
    }

    @keyframes glitch {
        0% {
            text-shadow:
                2px 0 #ff00c8,
                -2px 0 #00fff9;
        }
        25% {
            text-shadow:
                -2px 0 #ff00c8,
                2px 0 #00fff9;
        }
        50% {
            text-shadow:
                2px 0 #00fff9,
                -2px 0 #ff00c8;
        }
        75% {
            text-shadow:
                -1px 0 #00fff9,
                1px 0 #ff00c8;
        }
        100% {
            text-shadow:
                2px 0 #ff00c8,
                -2px 0 #00fff9;
        }
    }

    .legal-section {
        text-align: left;
        max-width: 700px;
        margin: 2rem auto;
        padding: 1rem 2rem;
        background: rgba(255, 255, 255, 0.05);
        border-left: 4px solid #00ffff;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    }

    .legal-section p {
        font-size: 1rem;
        margin-bottom: 1rem;
        color: #ccc;
        line-height: 1.6;
    }

    a {
        color: white;
    }

    a:hover {
        opacity: 0.8;
    }
</style>
