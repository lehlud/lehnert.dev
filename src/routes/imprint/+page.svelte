<script lang="ts">
    // Optional: add any TS logic here
</script>

<main>
    <h1>Impressum<br />Imprint</h1>
    <div class="legal-section">
        <p><b>Angaben gemäß § 5 TMG:</b></p>
        <p>
            Ludwig Lehnert <br />
            Zedernstr. 41 <br />
            90441 Nürnberg <br />
            Deutschland
        </p>
        <p>
            <b>Kontakt:</b> <br />
            <!-- Telefon: [Ihre Telefonnummer] <br /> -->
            E-Mail: info@lehnert.dev
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
</style>
