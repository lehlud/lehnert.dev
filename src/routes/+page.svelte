<script lang="ts">
    import EMail from "$lib/assets/email.svg";
    import Git from "$lib/assets/git.svg";
    import GitHub from "$lib/assets/github.svg";
    import Instagram from "$lib/assets/instagram.svg";
    import LinkedIn from "$lib/assets/linkedin.svg";
</script>

<main>
    <h1>Hey, I'm Ludwig 🚀</h1>
    <p>Welcome to my digital playground.</p>

    <div class="social-links">
        <a target="_blank" href="https://instagram.com/lehlud">
            <img src={Instagram} alt="" width="25" />
        </a>
        <a target="_blank" href="https://linkedin.com/in/ludwig-lehnert">
            <img src={LinkedIn} alt="" width="25" />
        </a>
        <a target="_blank" href="mailto:info@lehnert.dev">
            <img src={EMail} alt="" width="25" />
        </a>
        <a target="_blank" href="https://gitea.cloud.lehnert.dev/explore/repos">
            <img src={Git} alt="" width="25" />
        </a>
        <a target="_blank" href="https://github.com/lehlud">
            <img src={GitHub} alt="" width="25" />
        </a>
    </div>

    <div class="legal-links">
        <a href="/imprint">Imprint</a>
        <a href="/privacy">Privacy Policy</a>
    </div>
</main>

<style>
    h1 {
        font-size: 3.5rem;
        background: linear-gradient(90deg, #00ffff, #ff00ff);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        animation: glow 3s ease-in-out infinite alternate;
    }

    @keyframes glow {
        from {
            text-shadow: 0 0 10px #00ffff;
        }
        to {
            text-shadow: 0 0 20px #ff00ff;
        }
    }

    p {
        font-size: 1.2rem;
        max-width: 600px;
        margin-top: 1rem;
        color: #ccc;
    }

    .social-links {
        display: flex;
        gap: 0.75rem;
        margin-top: 1.5rem;
    }

    .social-links a {
        padding: 0.75rem;
        font-size: 1rem;
        background: #00ffff;
        color: #1e1e2f;
        border: none;
        border-radius: 999px;
        cursor: pointer;
        transition: background 0.3s ease;

        display: grid;
        place-items: center;
    }

    .social-links a:hover {
        background: #ff00ff;
        color: white;
    }

    .legal-links {
        margin-top: 1rem;
        display: flex;
        gap: 0.5rem;
    }

    .legal-links a {
        color: rgb(255, 255, 255);
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .legal-links a:hover {
        opacity: 0.8;
    }
</style>
