<slot />

<style>
    :global(html, body) {
        width: 100%;
        height: 100%;
    }

    :global(*) {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    :global(main) {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background: linear-gradient(135deg, #1e1e2f, #252547);
        color: white;
        font-family: "Inter", sans-serif;
        text-align: center;
        padding: 2rem;
    }
</style>
