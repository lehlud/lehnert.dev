<script lang="ts">
</script>

<main>
    <h1>404</h1>

    <p>
        Oops! The page you're looking for doesn't exist. It might have been
        abducted by aliens 🛸
    </p>

    <a class="btn" href="/">Beam me back</a>
</main>

<style>
    main {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background: radial-gradient(
            ellipse at center,
            #1e1e2f 0%,
            #0f0f1a 100%
        );
        color: white;
        text-align: center;
        font-family: "Inter", sans-serif;
        overflow: hidden;
    }

    h1 {
        font-size: 6rem;
        margin: 0;
        background: linear-gradient(90deg, #ff0066, #00ffff);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
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

    p {
        font-size: 1.25rem;
        margin: 1rem 0 2rem;
        color: #ccc;
        max-width: 600px;
    }

    .btn {
        text-decoration: none;
        background: #00ffff;
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 999px;
        font-size: 1rem;
        color: #1e1e2f;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .btn:hover {
        background: #ff0066;
        color: white;
    }
</style>
