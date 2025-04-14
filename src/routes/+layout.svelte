<slot />

<style>
    :global(html, body) {
        min-width: 100%;
        min-height: 100%;
    }

    :global(*) {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    :global(body) {
        background: linear-gradient(
            135deg,
            #1e1e2f 0,
            #252547 100vh,
            #252547 100%
        );
    }

    :global(main) {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        min-height: 80vh;
        color: white;
        font-family: "Inter", sans-serif;
        text-align: center;
        padding: 2rem;
    }
</style>
